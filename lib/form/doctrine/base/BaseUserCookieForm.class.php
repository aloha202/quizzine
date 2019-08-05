<?php

/**
 * UserCookie form base class.
 * sfDoctrineFormGenerator 
 * @method UserCookie getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseUserCookieForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'             => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'cookie'         => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      
        
        
       
            
            
              'keep_logged_in' => new sfWidgetFormInputCheckbox(),
      
        
        
       
            
            
              'created_at'     => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'updated_at'     => new sfWidgetFormDateTime(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'cookie'         => new sfValidatorString(array('max_length' => 80, 'required' => false)),
                  
              'user_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
                  
              'keep_logged_in' => new sfValidatorBoolean(array('required' => false)),
                  
              'created_at'     => new sfValidatorDateTime(),
                  
              'updated_at'     => new sfValidatorDateTime(),
          ));

    $this->widgetSchema->setNameFormat('user_cookie[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
         unset($this['created_at'], $this['updated_at']);
           
     
         
  }

  public function getModelName()
  {
    return 'UserCookie';
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
