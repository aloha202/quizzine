<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('EmailTemplate', 'doctrine');

/**
 * BaseEmailTemplate
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $subject
 * @property string $message
 * 
 * @method string        getName()    Returns the current record's "name" value
 * @method string        getSubject() Returns the current record's "subject" value
 * @method string        getMessage() Returns the current record's "message" value
 * @method EmailTemplate setName()    Sets the current record's "name" value
 * @method EmailTemplate setSubject() Sets the current record's "subject" value
 * @method EmailTemplate setMessage() Sets the current record's "message" value
 * 
 * @package    cms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEmailTemplate extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('email_template');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('subject', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('message', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}