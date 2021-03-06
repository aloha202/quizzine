<?php

/**
 * BaseApplicationRequest
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $email
 * @property string $channel
 * @property string $comment
 * 
 * @method string             getName()    Returns the current record's "name" value
 * @method string             getEmail()   Returns the current record's "email" value
 * @method string             getChannel() Returns the current record's "channel" value
 * @method string             getComment() Returns the current record's "comment" value
 * @method ApplicationRequest setName()    Sets the current record's "name" value
 * @method ApplicationRequest setEmail()   Sets the current record's "email" value
 * @method ApplicationRequest setChannel() Sets the current record's "channel" value
 * @method ApplicationRequest setComment() Sets the current record's "comment" value
 * 
 * @package    cms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseApplicationRequest extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('application_request');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('channel', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('comment', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $event0 = new Doctrine_Template_Event(array(
             'create' => 
             array(
              'frontend' => 'application_request_create',
             ),
             ));
        $backendviewed0 = new Doctrine_Template_BackendViewed();
        $this->actAs($timestampable0);
        $this->actAs($event0);
        $this->actAs($backendviewed0);
    }
}