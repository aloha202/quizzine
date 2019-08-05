<?php

/**
 * Testaurus filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTestaurusFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'           => new sfWidgetFormFilterInput(),
      'image'                 => new sfWidgetFormFilterInput(),
      'attach'                => new sfWidgetFormFilterInput(),
      'attach_name'           => new sfWidgetFormFilterInput(),
      'attach_mime'           => new sfWidgetFormFilterInput(),
      'meta_title'            => new sfWidgetFormFilterInput(),
      'meta_description'      => new sfWidgetFormFilterInput(),
      'meta_keywords'         => new sfWidgetFormFilterInput(),
      'geo_lat'               => new sfWidgetFormFilterInput(),
      'geo_lng'               => new sfWidgetFormFilterInput(),
      'geo_country'           => new sfWidgetFormFilterInput(),
      'geo_city'              => new sfWidgetFormFilterInput(),
      'geo_address'           => new sfWidgetFormFilterInput(),
      'geo_address_formatted' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'                  => new sfValidatorPass(array('required' => false)),
      'description'           => new sfValidatorPass(array('required' => false)),
      'image'                 => new sfValidatorPass(array('required' => false)),
      'attach'                => new sfValidatorPass(array('required' => false)),
      'attach_name'           => new sfValidatorPass(array('required' => false)),
      'attach_mime'           => new sfValidatorPass(array('required' => false)),
      'meta_title'            => new sfValidatorPass(array('required' => false)),
      'meta_description'      => new sfValidatorPass(array('required' => false)),
      'meta_keywords'         => new sfValidatorPass(array('required' => false)),
      'geo_lat'               => new sfValidatorPass(array('required' => false)),
      'geo_lng'               => new sfValidatorPass(array('required' => false)),
      'geo_country'           => new sfValidatorPass(array('required' => false)),
      'geo_city'              => new sfValidatorPass(array('required' => false)),
      'geo_address'           => new sfValidatorPass(array('required' => false)),
      'geo_address_formatted' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('testaurus_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'Testaurus';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'name'                  => 'Text',
      'description'           => 'Text',
      'image'                 => 'Text',
      'attach'                => 'Text',
      'attach_name'           => 'Text',
      'attach_mime'           => 'Text',
      'meta_title'            => 'Text',
      'meta_description'      => 'Text',
      'meta_keywords'         => 'Text',
      'geo_lat'               => 'Text',
      'geo_lng'               => 'Text',
      'geo_country'           => 'Text',
      'geo_city'              => 'Text',
      'geo_address'           => 'Text',
      'geo_address_formatted' => 'Text',
    );
  }
}
