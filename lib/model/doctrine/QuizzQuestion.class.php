<?php

/**
 * QuizzQuestion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    cms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class QuizzQuestion extends BaseQuizzQuestion
{
    public function hasCorrectAnswer(){
        foreach($this->getAnswers() as $Answer){
            if($Answer->is_correct){
                return true;
            }
        }
        return false;
    }

    public function getCorrectAnswer(){
        foreach($this->getAnswers() as $Answer){
            if($Answer->is_correct){
                return $Answer;
            }
        }
        return null;
    }
}