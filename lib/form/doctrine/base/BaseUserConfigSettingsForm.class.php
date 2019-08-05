<?php

/**
 * UserConfigSettings form base class.
 * sfDoctrineFormGenerator 
 * @method UserConfigSettings getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseUserConfigSettingsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'                               => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'user_id'                          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      
        
        
       
            
            
              'receive_notification_quizz_taken' => new sfWidgetFormInputCheckbox(),
      
        
        
       
            
            
              'top_logo_image'                   => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'logo_text'                        => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'html_title'                       => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'homepage_text'                    => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'card_info'                        => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'footer_info'                      => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'email'                            => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'phone'                            => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'skype'                            => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'facebook'                         => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'website'                          => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'youtube'                          => new sfWidgetFormInputText(),
      
        
        
       
            
            
                      'image' => $this->getObject()->getImage() ? new sfWidgetFormInputImageBuilder(array(
            'thumbs' => sfConfig::get('app_user_config_settings_thumbs'),
            'callback' => sfContext::getInstance()->getController()->genUrl(sfConfig::get('app_user_config_settings_callback') . '?model=UserConfigSettings&id=' . $this->getObject()->getId()),
            'file_src' => $this->getObject()->getPhotoPath(),
            'template' => '<div rel="jcrop">%file%</div>'
        )) : new sfWidgetFormInputFile,        
      
        
        
    ));

    $this->setValidators(array(
            
              'id'                               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'user_id'                          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
                  
              'receive_notification_quizz_taken' => new sfValidatorBoolean(array('required' => false)),
                  
              'top_logo_image'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'logo_text'                        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'html_title'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'homepage_text'                    => new sfValidatorString(array('required' => false)),
                  
              'card_info'                        => new sfValidatorString(array('required' => false)),
                  
              'footer_info'                      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'email'                            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'phone'                            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'skype'                            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'facebook'                         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'website'                          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'youtube'                          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'image' => new sfValidatorFile(array(
         'path' => sfConfig::get('sf_web_dir') . '/uploads/user_config_settings',
         'required' => false,
         'mime_types' => 'web_images',
        )),
        'image_delete' => new sfValidatorPass,
          ));

    $this->widgetSchema->setNameFormat('user_config_settings[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
           
     
         
  }

  public function getModelName()
  {
    return 'UserConfigSettings';
  }
    public function updateObject($values = null)
    {
        $object = parent::updateObject($values);
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
      }
  

  protected function doSave($con = null)
  {
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
