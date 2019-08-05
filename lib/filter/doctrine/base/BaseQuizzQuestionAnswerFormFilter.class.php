<?php

/**
 * QuizzQuestionAnswer filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseQuizzQuestionAnswerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'quizz_question_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('QuizzQuestion'), 'add_empty' => true)),
      'name'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_correct'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'quizz_question_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('QuizzQuestion'), 'column' => 'id')),
      'name'              => new sfValidatorPass(array('required' => false)),
      'is_correct'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('quizz_question_answer_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'QuizzQuestionAnswer';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'quizz_question_id' => 'ForeignKey',
      'name'              => 'Text',
      'is_correct'        => 'Boolean',
    );
  }
}
