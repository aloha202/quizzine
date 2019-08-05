<?php

/**
 * QuizzQuestion form base class.
 * sfDoctrineFormGenerator 
 * @method QuizzQuestion getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseQuizzQuestionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'          => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'quizz_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Quizz'), 'add_empty' => false)),
      
        
        
       
            
            
              'name'        => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'answer_mode' => new sfWidgetFormChoice(array('choices' => array('select' => 'select', 'select_other' => 'select_other', 'other' => 'other'))),
      
        
        
       
            
            
              'comment'     => new sfWidgetFormTextarea(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'quizz_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Quizz'))),
                  
              'name'        => new sfValidatorString(),
                  
              'answer_mode' => new sfValidatorChoice(array('choices' => array(0 => 'select', 1 => 'select_other', 2 => 'other'), 'required' => false)),
                  
              'comment'     => new sfValidatorString(array('required' => false)),
          ));

    $this->widgetSchema->setNameFormat('quizz_question[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
           
     
         
  }

  public function getModelName()
  {
    return 'QuizzQuestion';
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
