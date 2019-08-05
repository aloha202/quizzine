<?php

/**
 * user_user actions.
 *
 * @package    cms
 * @subpackage user_user
 * @author     Your name here
 * @version    SVN: $Id: components.class.php 23810 2009-11-12 11:07:44Z Alex.Radyuk $
 */
require_once sfConfig::get('sf_cache_dir') . '/' 
        . sfContext::getInstance()->getConfiguration()->getApplication() . '/'
        . sfConfig::get('sf_environment') . '/'
        . 'modules/autoUser_user/actions/components.class.php';

class user_userComponents extends autoUser_userComponents
{
}