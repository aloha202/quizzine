<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Page', 'doctrine');

/**
 * BasePage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $content
 * @property boolean $is_module_page
 * @property string $module_name
 * @property boolean $is_content_editable
 * @property string $special_mark
 * @property boolean $is_redirect
 * @property string $redirect_route
 * @property integer $redirect_timeout
 * @property string $layout
 * @property boolean $is_visible_for_admin
 * @property Doctrine_Collection $MenuItems
 * 
 * @method string              getName()                 Returns the current record's "name" value
 * @method string              getContent()              Returns the current record's "content" value
 * @method boolean             getIsModulePage()         Returns the current record's "is_module_page" value
 * @method string              getModuleName()           Returns the current record's "module_name" value
 * @method boolean             getIsContentEditable()    Returns the current record's "is_content_editable" value
 * @method string              getSpecialMark()          Returns the current record's "special_mark" value
 * @method boolean             getIsRedirect()           Returns the current record's "is_redirect" value
 * @method string              getRedirectRoute()        Returns the current record's "redirect_route" value
 * @method integer             getRedirectTimeout()      Returns the current record's "redirect_timeout" value
 * @method string              getLayout()               Returns the current record's "layout" value
 * @method boolean             getIsVisibleForAdmin()    Returns the current record's "is_visible_for_admin" value
 * @method Doctrine_Collection getMenuItems()            Returns the current record's "MenuItems" collection
 * @method Page                setName()                 Sets the current record's "name" value
 * @method Page                setContent()              Sets the current record's "content" value
 * @method Page                setIsModulePage()         Sets the current record's "is_module_page" value
 * @method Page                setModuleName()           Sets the current record's "module_name" value
 * @method Page                setIsContentEditable()    Sets the current record's "is_content_editable" value
 * @method Page                setSpecialMark()          Sets the current record's "special_mark" value
 * @method Page                setIsRedirect()           Sets the current record's "is_redirect" value
 * @method Page                setRedirectRoute()        Sets the current record's "redirect_route" value
 * @method Page                setRedirectTimeout()      Sets the current record's "redirect_timeout" value
 * @method Page                setLayout()               Sets the current record's "layout" value
 * @method Page                setIsVisibleForAdmin()    Sets the current record's "is_visible_for_admin" value
 * @method Page                setMenuItems()            Sets the current record's "MenuItems" collection
 * 
 * @package    cms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('page');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('content', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('is_module_page', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('module_name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('is_content_editable', 'boolean', null, array(
             'type' => 'boolean',
             'default' => true,
             ));
        $this->hasColumn('special_mark', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('is_redirect', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('redirect_route', 'string', 32, array(
             'type' => 'string',
             'default' => '/',
             'length' => 32,
             ));
        $this->hasColumn('redirect_timeout', 'integer', 2, array(
             'type' => 'integer',
             'default' => 5,
             'length' => 2,
             ));
        $this->hasColumn('layout', 'string', 32, array(
             'type' => 'string',
             'length' => 32,
             ));
        $this->hasColumn('is_visible_for_admin', 'boolean', null, array(
             'type' => 'boolean',
             'default' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('MenuItem as MenuItems', array(
             'local' => 'id',
             'foreign' => 'page_id'));

        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'unique' => true,
             'fields' => 
             array(
              0 => 'name',
             ),
             'canUpdate' => true,
             'builder' => 'ProjectHelper::slug_builder',
             ));
        $meta0 = new Doctrine_Template_Meta();
        $redirect3010 = new Doctrine_Template_Redirect301(array(
             'field' => 'slug',
             'route' => 'page_show',
             ));
        $this->actAs($sluggable0);
        $this->actAs($meta0);
        $this->actAs($redirect3010);
    }
}