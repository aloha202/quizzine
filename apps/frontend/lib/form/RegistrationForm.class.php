<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistrationForm
 *
 * @author Алекс
 */
class RegistrationForm extends ProfileForm {

    public function configure() {
        parent::configure();

        $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
        $this->validatorSchema['password'] = new sfValidatorString();
        $this->widgetSchema['password_again'] = new sfWidgetFormInputPassword();
        $this->validatorSchema['password_again'] = clone $this->validatorSchema['password'];

        $this->widgetSchema->setLabel('password_again', 'Повторите пароль');


        
        $this->embedCaptcha('Введите код с картинки');

        /*
        $this->widgetSchema['agree'] = new sfWidgetFormInputCheckbox(array(), array(
        ));
        $this->validatorSchema['agree'] = new sfValidatorBoolean(array(), array(
           'required' => _cnf::__('Вы должны принять условия пользовательского соглашения') 
        ));
        $this->widgetSchema->setLabel('agree', 'Я принимаю условия');
        */
        
        $this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_again', array(), array('invalid' => 'Пароли не совпадают')));
        
        foreach (array('password', 'password_again',  'email') as $field) {
            $this->setRequired($field);
        }        
    }

    public function updateDefaultsFromObject() {
        parent::updateDefaultsFromObject();
    }

    public function doSave($conn = null) {


        $user = new sfGuardUser();
        $user->fromArray(array(
            'email_address' => $this->values['email'],
            'username' => $this->values['email'],
            'salt' => md5(time()),
            'is_active' => false
        ));
        $user->setPassword($this->values['password']);
        $user->save();

        $this->getObject()->setUserId($user->getId());
        parent::doSave($conn);

        $quizzHost = sfContext::getInstance()->getUser()->getQuizzHost();
        $url = sfContext::getInstance()->getController()->genUrl('@activate?username=' . $quizzHost->getUsername());

        SiteEvent::fire('registration', $this->getObject(), array(
            'link' => '<a href="http://' . sfContext::getInstance()->getRequest()->getHost() . $url . '?code=' . $user->getSalt() . '">' . T::__('ссылке') . '</a>'
        ));
        
        if(MyConfig::isTrue('auth_signin_after_register'))
            $this->getUser()->signIn($user);
    }

}
