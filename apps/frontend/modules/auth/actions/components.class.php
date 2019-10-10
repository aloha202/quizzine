<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of components
 *
 * @author Алекс
 */
class authComponents extends sfComponents{
    
    public function executeForm()
    {
        $this->form = new SigninForm;
    }
    
    public function executeBlock()
    {

        $this->user = null;
        if($this->getUser()->isAuthenticated()){
            $this->user = $this->getUser()->getGuardUser();
        }

    }

    
}
