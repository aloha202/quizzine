<?php

class myUser extends sfGuardSecurityUser {

    protected $quizzHost;
	public function productIsVoted($product) {
		$voted = $this->getAttribute('product.voted', array());
		return in_array($product->getId(), $voted);
	}

	public function productSetVoted($product) {
		if (!$this->productIsVoted($product)) {
			$voted = $this->getAttribute('product.voted', array());
			$voted[] = $product->getId();
			$this->setAttribute('product.voted', $voted);
		}
		return $this;
	}

	public function isDemoEditor() {
		return $this->isAuthenticated()
				&& $this->hasCredential('editor');
	}

	public function signIn($user, $remember = false, $con = null) {
		$this->setAttribute('user_id', $user->getId(), 'sfGuardSecurityUser');
		$this->setAuthenticated(true);
		$this->clearCredentials();
		$this->addCredentials($user->getAllPermissionNames());

		// save last login
		$user->setLastLogin(date('Y-m-d H:i:s'));
		$user->save($con);
		$UserCookie = $this->getUserCookie();
		$UserCookie->user_id = $user->getId();
		$UserCookie->keep_logged_in = true;
		$UserCookie->save();
		
		$data = array(
			'User' => $user,
			'UserCookie' => $UserCookie
		);
		$this->dispatcher->notify(new sfEvent($this, 'user.signin', $data));		
	}

	public function signOut() {
		$this->getAttributeHolder()->removeNamespace('sfGuardSecurityUser');
		$this->user = null;
		$this->clearCredentials();
		$this->setAuthenticated(false);
		
		$UserCookie = $this->getUserCookie();
		$UserCookie->keep_logged_in = false;
		$UserCookie->save();
	}

	public function getSigninRedirect() {
		$redirect = $this->getAttribute('signin_redirect');
		$this->setAttribute('signin_redirect', null);
		return $redirect;
	}

	public function setSigninRedirect($redirect) {
		$this->setAttribute('signin_redirect', $redirect);
	}

	public function getProcessFormRedirect($form_class) {
		$redirect = $this->getAttribute($form_class . '_redirect');
		$this->setAttribute($form_class . '_redirect', null);
		return $redirect;
	}

	public function setProcessFormRedirect($form_class, $redirect) {
		$this->setAttribute($form_class . '_redirect', $redirect);
	}

	protected $UserCookie = null;
	protected $user_cookie_name = 'my_application_user_cookie';

	public function getUserCookie($create_new = false) {
		if (!$this->UserCookie) {
			if ($user_cookie_id = $this->getAttribute('__user_cookie_id', null)) {
				$this->UserCookie = Q::f('UserCookie', $user_cookie_id);
			}
			if (!empty($_COOKIE[$this->user_cookie_name])) {
				$UserCookie = Q::c('UserCookie', 'c')
						->where('c.cookie = ?', $_COOKIE[$this->user_cookie_name])
						->fetchOne()
				;
				if ($UserCookie) {
					$this->setAttribute('__user_cookie_id', $UserCookie->getId());
					$this->UserCookie = $UserCookie;
				}
			}
			if (!$this->UserCookie && $create_new) {
				$this->UserCookie = new \UserCookie;
				srand();
				$this->UserCookie->cookie = sha1(microtime()) . md5(rand());
				$this->UserCookie->save();
				$this->setAttribute('__user_cookie_id', $this->UserCookie->getId());
				$age = 3600 * 24 * 30 * 12; //almost a year
				sfContext::getInstance()->getResponse()->setCookie($this->user_cookie_name, $this->UserCookie->cookie, time() + $age);
			}
		}
		return $this->UserCookie;
	}
	
	public function processUserCookie() {
		$UserCookie = $this->getUserCookie(true);
		if(!$this->isAuthenticated()){
			if($UserCookie->user_id && $UserCookie->keep_logged_in){
				$this->signIn($UserCookie->getUser(), true);
			}
		}
	}
	
	public function forgetUserCookie() {
		$UserCookie = $this->getUserCookie();
		if($UserCookie){
			$age = 3600 * 24;
			sfContext::getInstance()->getResponse()->setCookie($this->user_cookie_name, null, time() - $age);
			$UserCookie->delete();
		}
	}

	public function setQuizzHost($user){
	    $this->quizzHost = $user;
	    if($user){
	        $this->setCulture($user->getLang());
        }
    }
    public function getQuizzHost(){
	    return $this->quizzHost;
    }

    public function getRealCulture(){
        $cult = $this->getCulture();
        $expl = explode('_', $cult);
        return $expl[0];
    }

    public function forgetQuizzHost(){
        $this->setCulture("en");
        $this->quizzHost = null;
    }

}
