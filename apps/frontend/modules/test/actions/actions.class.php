<?php

/**
 * test actions.
 *
 * @package    cms
 * @subpackage test
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class testActions extends myActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */

    public function executeIndex(sfWebRequest $request) {

            if (!class_exists('Swift_SmtpTransport')) {
                require_once sfConfig::get('sf_lib_dir') . '/vendor/vendor/swiftmailer/swift_required.php';
            }

            $transport = Swift_SmtpTransport::newInstance('162.243.233.25', 7777)
					->setUsername('jason')
					->setPassword('123')
					;

            $mMailer = Swift_Mailer::newInstance($transport);

            $mEmail = Swift_Message::newInstance();

            $mEmail->setSubject("Hello, dear Guest!");
            $mEmail->setTo('randomguest@gmail.com');
            $mEmail->setFrom(array('ourhotel@resort.org' => 'Your staff'));
            $mEmail->setBody('<p>Hello, dear Guest! Here is our new Offer for you</p>', 'text/html'); //body html	

            $mMailer->send($mEmail);
			
			die;
    }
    
    public function executeForm(sfWebRequest $request)
    {
        $this->form = new TestForm;
        
        $this->processForm2($this->form, $request, 'Saved');
    }

}
