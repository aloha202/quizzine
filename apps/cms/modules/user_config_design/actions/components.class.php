<?php

/**
 * user_config_design actions.
 *
 * @package    cms
 * @subpackage user_config_design
 * @author     Your name here
 * @version    SVN: $Id: components.class.php 23810 2009-11-12 11:07:44Z Alex.Radyuk $
 */
require_once sfConfig::get('sf_cache_dir') . '/' 
        . sfContext::getInstance()->getConfiguration()->getApplication() . '/'
        . sfConfig::get('sf_environment') . '/'
        . 'modules/autoUser_config_design/actions/components.class.php';

class user_config_designComponents extends autoUser_config_designComponents
{
}