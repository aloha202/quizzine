<?php

/**
 * Testaurus form base class.
 * sfDoctrineFormGenerator 
 * @method Testaurus getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseTestaurusForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'                    => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'name'                  => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'description'           => new sfWidgetFormTextarea(),
      
        
        
       
            
            
                      'image' => $this->getObject()->getImage() ? new sfWidgetFormInputImageBuilder(array(
            'thumbs' => sfConfig::get('app_testaurus_thumbs'),
            'callback' => sfContext::getInstance()->getController()->genUrl(sfConfig::get('app_testaurus_callback') . '?model=Testaurus&id=' . $this->getObject()->getId()),
            'file_src' => $this->getObject()->getPhotoPath(),
            'template' => '<div rel="jcrop">%file%</div>'
        )) : new sfWidgetFormInputFile,        
      
        
        
       
            
            
              
        'attach' => new sfWidgetFormInputFileEditable(array(
            'file_src' => '/uploads/' . sfInflector::underscore(get_class($this->getObject())) .  '/' . $this->getObject()->getAttach(),
            'template' => $this->getObject()->getAttach() ? "%input%<a href='%file%' class='download'>{$this->getObject()->getAttachName()}</a><br />%delete%%delete_label%" : "%input%"
        )),
      
        
        
       
            
            
              'attach_name'           => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'attach_mime'           => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'meta_title'            => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'meta_description' => new sfWidgetFormTextarea(array(), array('class' => 'mceNoEditor')),        
      
        
        
       
            
            
              'meta_keywords' => new sfWidgetFormTextarea(array(), array('class' => 'mceNoEditor')), 
      
        
        
       
            
            
              'geo_lat'               => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'geo_lng'               => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'geo_country'           => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'geo_city'              => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'geo_address'           => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'geo_address_formatted' => new sfWidgetFormInputText(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'name'                  => new sfValidatorString(array('max_length' => 255)),
                  
              'description'           => new sfValidatorString(array('required' => false)),
                  
              'image' => new sfValidatorFile(array(
         'path' => sfConfig::get('sf_web_dir') . '/uploads/testaurus',
         'required' => false,
         'mime_types' => 'web_images',
        )),
        'image_delete' => new sfValidatorPass,
                  
              
                   
        'attach' => new sfValidatorFile(array(
            'path' => sfConfig::get('sf_web_dir') . '/uploads/testaurus/',
            'mime_types' => array(  0 => 'application/x-rar-compressed',  1 => 'application/octet-stream',  2 => 'application/zip',),
            'required' => false
        )),     
        'attach_delete' => new sfValidatorPass,
                  
              'attach_name'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'attach_mime'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'meta_title'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'meta_description'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'meta_keywords'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'geo_lat'               => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'geo_lng'               => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'geo_country'           => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'geo_city'              => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'geo_address'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'geo_address_formatted' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          ));

    $this->widgetSchema->setNameFormat('testaurus[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           unset($this['attach_name'], $this['attach_mime']);
           
           
     
          unset($this['geo_lat'], $this['geo_lng'], $this['geo_country'], $this['geo_city'], $this['geo_address'], $this['geo_address_formatted']);
        $this->widgetSchema['gmaps'] = new myWidgetFormGmaps(array(
        ));
        $this->validatorSchema['gmaps'] = new myValidatorGeo(array('required' => false));
         
  }

  public function getModelName()
  {
    return 'Testaurus';
  }
    public function updateObject($values = null)
    {
        $object = parent::updateObject($values);
                if(!empty($this->values['gmaps'])){
          $object->setGeoLat($this->values['gmaps']['lat']);
          $object->setGeoLng($this->values['gmaps']['lng']);      
          $object->setGeoCity($this->values['gmaps']['city']);            
          $object->setGeoCountry($this->values['gmaps']['country']);                  
          $object->setGeoAddress($this->values['gmaps']['address']);                        
          $object->setGeoAddressFormatted($this->values['gmaps']['address_formatted']);                        
        }        
                return $object;
    }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();
    foreach($this->embeddedTextBlocks as $block_name){
        $TextBlock = Q::c('TextBlock', 'b')
            ->where('b.special_mark = ?', $block_name)
            ->fetchOne();
        if($TextBlock){
            $this->setDefault($block_name, $TextBlock->text);
        }
    }    
          if($this->getObject()->hasGeo()){
          $this->setDefault('gmaps', array(
              'lat' => $this->getObject()->getGeoLat(), 
              'lng' => $this->getObject()->getGeoLng(),
              'city' => $this->getObject()->getGeoCity(),
              'country' => $this->getObject()->getGeoCountry(),              
              'address' => $this->getObject()->getGeoAddress(),                            
              'address_formatted' => $this->getObject()->getGeoAddressFormatted(),                                          
          ));
      }    
      }
  

  protected function doSave($con = null)
  {
    
        if (!empty($this->values['attach'])) {
        if ($this->values['attach'] instanceof sfValidatedFile) {
            $this->getObject()->setAttachName($this->values['attach']->getOriginalName());
            $this->getObject()->setAttachMime($this->values['attach']->getType());
        }
    }    
        
    
    parent::doSave($con);
    
    foreach($this->embeddedTextBlocks as $block_name){
        $TextBlock = Q::c('TextBlock', 'b')
            ->where('b.special_mark = ?', $block_name)
            ->fetchOne();
        if($TextBlock){
            $TextBlock->text = $this->values[$block_name];
            $TextBlock->save();
        }
    }
  }



}
