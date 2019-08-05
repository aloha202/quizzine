<?php

/**
 * UserConfigDesign form base class.
 * sfDoctrineFormGenerator 
 * @method UserConfigDesign getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseUserConfigDesignForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'                       => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'user_id'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      
        
        
       
            
            
              'header1_color'            => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'header2_color'            => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'header3_color'            => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'header4_color'            => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'link_color'               => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'text_color'               => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'top_background_color'     => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'top_text_color'           => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'top_text2_color'          => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'bottom_background_color'  => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'bottom_background_color2' => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'bottom_text_color'        => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'bottom_text2_color'       => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'button1_background_color' => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'button1_text_color'       => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'button2_background_color' => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'button2_text_color'       => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'bottom_link_color'        => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'quizz_text_color'         => new sfWidgetFormInputText(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'user_id'                  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
                  
              'header1_color'            => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'header2_color'            => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'header3_color'            => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'header4_color'            => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'link_color'               => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'text_color'               => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'top_background_color'     => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'top_text_color'           => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'top_text2_color'          => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'bottom_background_color'  => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'bottom_background_color2' => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'bottom_text_color'        => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'bottom_text2_color'       => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'button1_background_color' => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'button1_text_color'       => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'button2_background_color' => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'button2_text_color'       => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'bottom_link_color'        => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'quizz_text_color'         => new sfValidatorString(array('max_length' => 32, 'required' => false)),
          ));

    $this->widgetSchema->setNameFormat('user_config_design[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
           
     
         
  }

  public function getModelName()
  {
    return 'UserConfigDesign';
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
