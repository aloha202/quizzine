<?php

/**
 * Quizz form base class.
 * sfDoctrineFormGenerator 
 * @method Quizz getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseQuizzForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'          => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'name'        => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'description' => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'display'     => new sfWidgetFormChoice(array('choices' => array('one' => 'one', 'all' => 'all'))),
      
        
        
       
            
            
              'is_active'   => new sfWidgetFormInputCheckbox(),
      
        
        
       
            
            
              'created_at'  => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'updated_at'  => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      
        
        
       
            
            
              'slug'        => new sfWidgetFormInputText(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'description' => new sfValidatorString(array('required' => false)),
                  
              'display'     => new sfValidatorChoice(array('choices' => array(0 => 'one', 1 => 'all'), 'required' => false)),
                  
              'is_active'   => new sfValidatorBoolean(array('required' => false)),
                  
              'created_at'  => new sfValidatorDateTime(),
                  
              'updated_at'  => new sfValidatorDateTime(),
                  
              'user_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
                  
              'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          ));

    $this->widgetSchema->setNameFormat('quizz[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
         unset($this['created_at'], $this['updated_at']);
           
     
         
  }

  public function getModelName()
  {
    return 'Quizz';
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
