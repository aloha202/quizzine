<?php

/**
 * UserConfigDesign filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUserConfigDesignFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'header1_color'            => new sfWidgetFormFilterInput(),
      'header2_color'            => new sfWidgetFormFilterInput(),
      'header3_color'            => new sfWidgetFormFilterInput(),
      'header4_color'            => new sfWidgetFormFilterInput(),
      'link_color'               => new sfWidgetFormFilterInput(),
      'text_color'               => new sfWidgetFormFilterInput(),
      'top_background_color'     => new sfWidgetFormFilterInput(),
      'top_text_color'           => new sfWidgetFormFilterInput(),
      'top_text2_color'          => new sfWidgetFormFilterInput(),
      'bottom_background_color'  => new sfWidgetFormFilterInput(),
      'bottom_background_color2' => new sfWidgetFormFilterInput(),
      'bottom_text_color'        => new sfWidgetFormFilterInput(),
      'bottom_text2_color'       => new sfWidgetFormFilterInput(),
      'button1_background_color' => new sfWidgetFormFilterInput(),
      'button1_text_color'       => new sfWidgetFormFilterInput(),
      'button2_background_color' => new sfWidgetFormFilterInput(),
      'button2_text_color'       => new sfWidgetFormFilterInput(),
      'bottom_link_color'        => new sfWidgetFormFilterInput(),
      'quizz_text_color'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id'                  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'header1_color'            => new sfValidatorPass(array('required' => false)),
      'header2_color'            => new sfValidatorPass(array('required' => false)),
      'header3_color'            => new sfValidatorPass(array('required' => false)),
      'header4_color'            => new sfValidatorPass(array('required' => false)),
      'link_color'               => new sfValidatorPass(array('required' => false)),
      'text_color'               => new sfValidatorPass(array('required' => false)),
      'top_background_color'     => new sfValidatorPass(array('required' => false)),
      'top_text_color'           => new sfValidatorPass(array('required' => false)),
      'top_text2_color'          => new sfValidatorPass(array('required' => false)),
      'bottom_background_color'  => new sfValidatorPass(array('required' => false)),
      'bottom_background_color2' => new sfValidatorPass(array('required' => false)),
      'bottom_text_color'        => new sfValidatorPass(array('required' => false)),
      'bottom_text2_color'       => new sfValidatorPass(array('required' => false)),
      'button1_background_color' => new sfValidatorPass(array('required' => false)),
      'button1_text_color'       => new sfValidatorPass(array('required' => false)),
      'button2_background_color' => new sfValidatorPass(array('required' => false)),
      'button2_text_color'       => new sfValidatorPass(array('required' => false)),
      'bottom_link_color'        => new sfValidatorPass(array('required' => false)),
      'quizz_text_color'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_config_design_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserConfigDesign';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'user_id'                  => 'ForeignKey',
      'header1_color'            => 'Text',
      'header2_color'            => 'Text',
      'header3_color'            => 'Text',
      'header4_color'            => 'Text',
      'link_color'               => 'Text',
      'text_color'               => 'Text',
      'top_background_color'     => 'Text',
      'top_text_color'           => 'Text',
      'top_text2_color'          => 'Text',
      'bottom_background_color'  => 'Text',
      'bottom_background_color2' => 'Text',
      'bottom_text_color'        => 'Text',
      'bottom_text2_color'       => 'Text',
      'button1_background_color' => 'Text',
      'button1_text_color'       => 'Text',
      'button2_background_color' => 'Text',
      'button2_text_color'       => 'Text',
      'bottom_link_color'        => 'Text',
      'quizz_text_color'         => 'Text',
    );
  }
}
