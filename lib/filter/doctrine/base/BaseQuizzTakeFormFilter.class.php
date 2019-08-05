<?php

/**
 * QuizzTake filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseQuizzTakeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'quizz_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Quizz'), 'add_empty' => true)),
      'info'                  => new sfWidgetFormFilterInput(),
      'questions_count'       => new sfWidgetFormFilterInput(),
      'correct_answers_count' => new sfWidgetFormFilterInput(),
      'percentage'            => new sfWidgetFormFilterInput(),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'user_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'user_cookie_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UserCookie'), 'add_empty' => true)),
      'is_backend_viewed'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'quizz_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Quizz'), 'column' => 'id')),
      'info'                  => new sfValidatorPass(array('required' => false)),
      'questions_count'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'correct_answers_count' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'percentage'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'user_id'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'user_cookie_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('UserCookie'), 'column' => 'id')),
      'is_backend_viewed'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('quizz_take_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'QuizzTake';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'quizz_id'              => 'ForeignKey',
      'info'                  => 'Text',
      'questions_count'       => 'Number',
      'correct_answers_count' => 'Number',
      'percentage'            => 'Number',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
      'user_id'               => 'ForeignKey',
      'user_cookie_id'        => 'ForeignKey',
      'is_backend_viewed'     => 'Boolean',
    );
  }
}
