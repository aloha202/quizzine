<?php

/**
 * QuizzQuestion filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseQuizzQuestionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'quizz_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Quizz'), 'add_empty' => true)),
      'name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'answer_mode' => new sfWidgetFormChoice(array('choices' => array('' => '', 'select' => 'select', 'select_other' => 'select_other', 'other' => 'other'))),
      'comment'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'quizz_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Quizz'), 'column' => 'id')),
      'name'        => new sfValidatorPass(array('required' => false)),
      'answer_mode' => new sfValidatorChoice(array('required' => false, 'choices' => array('select' => 'select', 'select_other' => 'select_other', 'other' => 'other'))),
      'comment'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('quizz_question_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'QuizzQuestion';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'quizz_id'    => 'ForeignKey',
      'name'        => 'Text',
      'answer_mode' => 'Enum',
      'comment'     => 'Text',
    );
  }
}
