<?php

/**
 * BaseQuizz
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $description
 * @property enum $display
 * @property boolean $is_active
 * @property Doctrine_Collection $Questions
 * @property Doctrine_Collection $QuizzTakes
 * 
 * @method string              getName()        Returns the current record's "name" value
 * @method string              getDescription() Returns the current record's "description" value
 * @method enum                getDisplay()     Returns the current record's "display" value
 * @method boolean             getIsActive()    Returns the current record's "is_active" value
 * @method Doctrine_Collection getQuestions()   Returns the current record's "Questions" collection
 * @method Doctrine_Collection getQuizzTakes()  Returns the current record's "QuizzTakes" collection
 * @method Quizz               setName()        Sets the current record's "name" value
 * @method Quizz               setDescription() Sets the current record's "description" value
 * @method Quizz               setDisplay()     Sets the current record's "display" value
 * @method Quizz               setIsActive()    Sets the current record's "is_active" value
 * @method Quizz               setQuestions()   Sets the current record's "Questions" collection
 * @method Quizz               setQuizzTakes()  Sets the current record's "QuizzTakes" collection
 * 
 * @package    cms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseQuizz extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('quizz');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('display', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'one',
              1 => 'all',
             ),
             'default' => 'one',
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('QuizzQuestion as Questions', array(
             'local' => 'id',
             'foreign' => 'quizz_id'));

        $this->hasMany('QuizzTake as QuizzTakes', array(
             'local' => 'id',
             'foreign' => 'quizz_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $user0 = new Doctrine_Template_User(array(
             'apps' => 
             array(
              0 => 'cms',
             ),
             'cookie' => false,
             ));
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'unique' => false,
             'fields' => 
             array(
              0 => 'name',
             ),
             'canUpdate' => true,
             'builder' => 'ProjectHelper::slug_builder',
             ));
        $this->actAs($timestampable0);
        $this->actAs($user0);
        $this->actAs($sluggable0);
    }
}