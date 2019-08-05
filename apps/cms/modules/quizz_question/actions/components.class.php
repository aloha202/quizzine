<?php

/**
 * quizz_question actions.
 *
 * @package    cms
 * @subpackage quizz_question
 * @author     Your name here
 * @version    SVN: $Id: components.class.php 23810 2009-11-12 11:07:44Z Alex.Radyuk $
 */
require_once sfConfig::get('sf_cache_dir') . '/' 
        . sfContext::getInstance()->getConfiguration()->getApplication() . '/'
        . sfConfig::get('sf_environment') . '/'
        . 'modules/autoQuizz_question/actions/components.class.php';

class quizz_questionComponents extends autoQuizz_questionComponents
{
}