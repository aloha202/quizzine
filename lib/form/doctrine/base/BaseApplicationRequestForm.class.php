<?php

/**
 * ApplicationRequest form base class.
 * sfDoctrineFormGenerator 
 * @method ApplicationRequest getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseApplicationRequestForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'                => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'name'              => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'email'             => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'channel'           => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'comment'           => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'created_at'        => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'updated_at'        => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'is_backend_viewed' => new sfWidgetFormInputCheckbox(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'name'              => new sfValidatorString(array('max_length' => 255)),
                  
              'email'             => new sfValidatorString(array('max_length' => 255)),
                  
              'channel'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'comment'           => new sfValidatorString(array('required' => false)),
                  
              'created_at'        => new sfValidatorDateTime(),
                  
              'updated_at'        => new sfValidatorDateTime(),
                  
              'is_backend_viewed' => new sfValidatorBoolean(array('required' => false)),
          ));

    $this->widgetSchema->setNameFormat('application_request[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
         unset($this['created_at'], $this['updated_at']);
           
     
         
  }

  public function getModelName()
  {
    return 'ApplicationRequest';
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
