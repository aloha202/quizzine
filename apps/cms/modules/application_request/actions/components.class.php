<?php

/**
 * application_request actions.
 *
 * @package    cms
 * @subpackage application_request
 * @author     Your name here
 * @version    SVN: $Id: components.class.php 23810 2009-11-12 11:07:44Z Alex.Radyuk $
 */
require_once sfConfig::get('sf_cache_dir') . '/' 
        . sfContext::getInstance()->getConfiguration()->getApplication() . '/'
        . sfConfig::get('sf_environment') . '/'
        . 'modules/autoApplication_request/actions/components.class.php';

class application_requestComponents extends autoApplication_requestComponents
{
}