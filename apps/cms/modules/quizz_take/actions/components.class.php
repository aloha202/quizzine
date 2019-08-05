<?php

/**
 * quizz_take actions.
 *
 * @package    cms
 * @subpackage quizz_take
 * @author     Your name here
 * @version    SVN: $Id: components.class.php 23810 2009-11-12 11:07:44Z Alex.Radyuk $
 */
require_once sfConfig::get('sf_cache_dir') . '/' 
        . sfContext::getInstance()->getConfiguration()->getApplication() . '/'
        . sfConfig::get('sf_environment') . '/'
        . 'modules/autoQuizz_take/actions/components.class.php';

class quizz_takeComponents extends autoQuizz_takeComponents
{
    public function executeResultsCount(){
        $this->new_count = Q::c('QuizzTake', 't')
            ->where('t.quizz_id = ?', $this->quizzId)
            ->andWhere('t.is_backend_viewed = ?', false)
            ->count()
            ;
        $this->count = Q::c('QuizzTake', 't')
            ->where('t.quizz_id = ?', $this->quizzId)
            ->count()
        ;
    }
}