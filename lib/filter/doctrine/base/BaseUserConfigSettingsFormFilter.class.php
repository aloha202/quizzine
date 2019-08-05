<?php

/**
 * UserConfigSettings filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUserConfigSettingsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'                          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'receive_notification_quizz_taken' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'top_logo_image'                   => new sfWidgetFormFilterInput(),
      'logo_text'                        => new sfWidgetFormFilterInput(),
      'html_title'                       => new sfWidgetFormFilterInput(),
      'homepage_text'                    => new sfWidgetFormFilterInput(),
      'card_info'                        => new sfWidgetFormFilterInput(),
      'footer_info'                      => new sfWidgetFormFilterInput(),
      'email'                            => new sfWidgetFormFilterInput(),
      'phone'                            => new sfWidgetFormFilterInput(),
      'skype'                            => new sfWidgetFormFilterInput(),
      'facebook'                         => new sfWidgetFormFilterInput(),
      'website'                          => new sfWidgetFormFilterInput(),
      'youtube'                          => new sfWidgetFormFilterInput(),
      'image'                            => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id'                          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'receive_notification_quizz_taken' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'top_logo_image'                   => new sfValidatorPass(array('required' => false)),
      'logo_text'                        => new sfValidatorPass(array('required' => false)),
      'html_title'                       => new sfValidatorPass(array('required' => false)),
      'homepage_text'                    => new sfValidatorPass(array('required' => false)),
      'card_info'                        => new sfValidatorPass(array('required' => false)),
      'footer_info'                      => new sfValidatorPass(array('required' => false)),
      'email'                            => new sfValidatorPass(array('required' => false)),
      'phone'                            => new sfValidatorPass(array('required' => false)),
      'skype'                            => new sfValidatorPass(array('required' => false)),
      'facebook'                         => new sfValidatorPass(array('required' => false)),
      'website'                          => new sfValidatorPass(array('required' => false)),
      'youtube'                          => new sfValidatorPass(array('required' => false)),
      'image'                            => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_config_settings_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserConfigSettings';
  }

  public function getFields()
  {
    return array(
      'id'                               => 'Number',
      'user_id'                          => 'ForeignKey',
      'receive_notification_quizz_taken' => 'Boolean',
      'top_logo_image'                   => 'Text',
      'logo_text'                        => 'Text',
      'html_title'                       => 'Text',
      'homepage_text'                    => 'Text',
      'card_info'                        => 'Text',
      'footer_info'                      => 'Text',
      'email'                            => 'Text',
      'phone'                            => 'Text',
      'skype'                            => 'Text',
      'facebook'                         => 'Text',
      'website'                          => 'Text',
      'youtube'                          => 'Text',
      'image'                            => 'Text',
    );
  }
}
