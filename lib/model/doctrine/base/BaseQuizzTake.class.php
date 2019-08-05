<?php

/**
 * BaseQuizzTake
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $quizz_id
 * @property string $info
 * @property integer $questions_count
 * @property integer $correct_answers_count
 * @property integer $percentage
 * @property Quizz $Quizz
 * 
 * @method integer   getQuizzId()               Returns the current record's "quizz_id" value
 * @method string    getInfo()                  Returns the current record's "info" value
 * @method integer   getQuestionsCount()        Returns the current record's "questions_count" value
 * @method integer   getCorrectAnswersCount()   Returns the current record's "correct_answers_count" value
 * @method integer   getPercentage()            Returns the current record's "percentage" value
 * @method Quizz     getQuizz()                 Returns the current record's "Quizz" value
 * @method QuizzTake setQuizzId()               Sets the current record's "quizz_id" value
 * @method QuizzTake setInfo()                  Sets the current record's "info" value
 * @method QuizzTake setQuestionsCount()        Sets the current record's "questions_count" value
 * @method QuizzTake setCorrectAnswersCount()   Sets the current record's "correct_answers_count" value
 * @method QuizzTake setPercentage()            Sets the current record's "percentage" value
 * @method QuizzTake setQuizz()                 Sets the current record's "Quizz" value
 * 
 * @package    cms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseQuizzTake extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('quizz_take');
        $this->hasColumn('quizz_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('info', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('questions_count', 'integer', 2, array(
             'type' => 'integer',
             'unsigned' => true,
             'length' => 2,
             ));
        $this->hasColumn('correct_answers_count', 'integer', 2, array(
             'type' => 'integer',
             'unsigned' => true,
             'length' => 2,
             ));
        $this->hasColumn('percentage', 'integer', 2, array(
             'type' => 'integer',
             'unsigned' => true,
             'length' => 2,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Quizz', array(
             'local' => 'quizz_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $user0 = new Doctrine_Template_User();
        $event0 = new Doctrine_Template_Event(array(
             'create' => 
             array(
              'frontend' => 'quizz_take_create',
             ),
             ));
        $backendviewed0 = new Doctrine_Template_BackendViewed();
        $this->actAs($timestampable0);
        $this->actAs($user0);
        $this->actAs($event0);
        $this->actAs($backendviewed0);
    }
}