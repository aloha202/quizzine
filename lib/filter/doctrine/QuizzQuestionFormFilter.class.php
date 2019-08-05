<?php

/**
 * QuizzQuestion filter form.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class QuizzQuestionFormFilter extends BaseQuizzQuestionFormFilter
{
  public function configure()
  {
      $this->widgetSchema['quizz_id']->setOption('query', Q::c('Quizz', 'q')
          ->where('q.user_id = ?', $this->getUser()->getGuardUser()->getId()))
          ->setOption('add_empty', false);
  }
}
