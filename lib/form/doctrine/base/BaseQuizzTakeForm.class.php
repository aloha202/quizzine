<?php

/**
 * QuizzTake form base class.
 * sfDoctrineFormGenerator 
 * @method QuizzTake getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseQuizzTakeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'                    => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'quizz_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Quizz'), 'add_empty' => false)),
      
        
        
       
            
            
              'info'                  => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'questions_count'       => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'correct_answers_count' => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'percentage'            => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'created_at'            => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'updated_at'            => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'user_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      
        
        
       
            
            
              'user_cookie_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UserCookie'), 'add_empty' => true)),
      
        
        
       
            
            
              'is_backend_viewed'     => new sfWidgetFormInputCheckbox(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'quizz_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Quizz'))),
                  
              'info'                  => new sfValidatorString(array('required' => false)),
                  
              'questions_count'       => new sfValidatorInteger(array('required' => false)),
                  
              'correct_answers_count' => new sfValidatorInteger(array('required' => false)),
                  
              'percentage'            => new sfValidatorInteger(array('required' => false)),
                  
              'created_at'            => new sfValidatorDateTime(),
                  
              'updated_at'            => new sfValidatorDateTime(),
                  
              'user_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
                  
              'user_cookie_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UserCookie'), 'required' => false)),
                  
              'is_backend_viewed'     => new sfValidatorBoolean(array('required' => false)),
          ));

    $this->widgetSchema->setNameFormat('quizz_take[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
         unset($this['created_at'], $this['updated_at']);
           
     
         
  }

  public function getModelName()
  {
    return 'QuizzTake';
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
