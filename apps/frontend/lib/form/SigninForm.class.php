<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SinginForm
 *
 * @author Алекс
 */
class SigninForm extends sfGuardFormSignin{
    
    public function configure()
    {
        $this->widgetSchema->setFormFormatterName('Materialize');
        
       // $this->widgetSchema->setLabel('remember', 'Запомнить меня на этом компьютере');
        
        $this->widgetSchema->setLabel('username', 'Логин (Ваш Email)');
        $this->useFields(array('username', 'password'));
        
        
        if($this->getInvalidAttemptsCount() >= MyConfig::getInteger('auth_invalid_signin_attempt_captcha')){
            $this->captcha('Введите код');
        }       
        if($this->getInvalidAttemptsCount() >= MyConfig::getInteger('auth_invalid_signin_attempt_ipban')){
            ProjectHelper::banIpAddress('Invalid signin attempt');
        }
    }
    
}
