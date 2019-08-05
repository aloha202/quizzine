<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SocialUser', 'doctrine');

/**
 * BaseSocialUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property decimal $facebook_user_id
 * @property string $facebook_user_info
 * @property decimal $vkontakte_user_id
 * @property string $vkontakte_user_info
 * @property decimal $google_user_id
 * @property string $google_user_info
 * @property decimal $mailru_user_id
 * @property string $mailru_user_info
 * @property decimal $yandex_user_id
 * @property string $yandex_user_info
 * @property decimal $twitter_user_id
 * @property string $twitter_user_info
 * @property integer $user_id
 * @property string $email
 * @property sfGuardUser $User
 * 
 * @method decimal     getFacebookUserId()      Returns the current record's "facebook_user_id" value
 * @method string      getFacebookUserInfo()    Returns the current record's "facebook_user_info" value
 * @method decimal     getVkontakteUserId()     Returns the current record's "vkontakte_user_id" value
 * @method string      getVkontakteUserInfo()   Returns the current record's "vkontakte_user_info" value
 * @method decimal     getGoogleUserId()        Returns the current record's "google_user_id" value
 * @method string      getGoogleUserInfo()      Returns the current record's "google_user_info" value
 * @method decimal     getMailruUserId()        Returns the current record's "mailru_user_id" value
 * @method string      getMailruUserInfo()      Returns the current record's "mailru_user_info" value
 * @method decimal     getYandexUserId()        Returns the current record's "yandex_user_id" value
 * @method string      getYandexUserInfo()      Returns the current record's "yandex_user_info" value
 * @method decimal     getTwitterUserId()       Returns the current record's "twitter_user_id" value
 * @method string      getTwitterUserInfo()     Returns the current record's "twitter_user_info" value
 * @method integer     getUserId()              Returns the current record's "user_id" value
 * @method string      getEmail()               Returns the current record's "email" value
 * @method sfGuardUser getUser()                Returns the current record's "User" value
 * @method SocialUser  setFacebookUserId()      Sets the current record's "facebook_user_id" value
 * @method SocialUser  setFacebookUserInfo()    Sets the current record's "facebook_user_info" value
 * @method SocialUser  setVkontakteUserId()     Sets the current record's "vkontakte_user_id" value
 * @method SocialUser  setVkontakteUserInfo()   Sets the current record's "vkontakte_user_info" value
 * @method SocialUser  setGoogleUserId()        Sets the current record's "google_user_id" value
 * @method SocialUser  setGoogleUserInfo()      Sets the current record's "google_user_info" value
 * @method SocialUser  setMailruUserId()        Sets the current record's "mailru_user_id" value
 * @method SocialUser  setMailruUserInfo()      Sets the current record's "mailru_user_info" value
 * @method SocialUser  setYandexUserId()        Sets the current record's "yandex_user_id" value
 * @method SocialUser  setYandexUserInfo()      Sets the current record's "yandex_user_info" value
 * @method SocialUser  setTwitterUserId()       Sets the current record's "twitter_user_id" value
 * @method SocialUser  setTwitterUserInfo()     Sets the current record's "twitter_user_info" value
 * @method SocialUser  setUserId()              Sets the current record's "user_id" value
 * @method SocialUser  setEmail()               Sets the current record's "email" value
 * @method SocialUser  setUser()                Sets the current record's "User" value
 * 
 * @package    cms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSocialUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('social_user');
        $this->hasColumn('facebook_user_id', 'decimal', 21, array(
             'type' => 'decimal',
             'length' => 21,
             'scale' => '0',
             ));
        $this->hasColumn('facebook_user_info', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('vkontakte_user_id', 'decimal', 21, array(
             'type' => 'decimal',
             'length' => 21,
             'scale' => '0',
             ));
        $this->hasColumn('vkontakte_user_info', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('google_user_id', 'decimal', 21, array(
             'type' => 'decimal',
             'length' => 21,
             'scale' => '0',
             ));
        $this->hasColumn('google_user_info', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('mailru_user_id', 'decimal', 21, array(
             'type' => 'decimal',
             'length' => 21,
             'scale' => '0',
             ));
        $this->hasColumn('mailru_user_info', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('yandex_user_id', 'decimal', 21, array(
             'type' => 'decimal',
             'length' => 21,
             'scale' => '0',
             ));
        $this->hasColumn('yandex_user_info', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('twitter_user_id', 'decimal', 21, array(
             'type' => 'decimal',
             'length' => 21,
             'scale' => '0',
             ));
        $this->hasColumn('twitter_user_info', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}