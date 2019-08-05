<?php

/**
 * ApplicationRequest form.
 sfDoctrineFormGenerator *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ApplicationRequestForm extends BaseApplicationRequestForm
{
  public function configure()
  {

      $labels = [
          'name' => 'Your name',
          'email' => 'Your email',
          'channel' => 'Your youtube channel',
          'comment' => 'Your comment or question'
      ];
      $fields = array_keys($labels);
      $this->useFields($fields);
      foreach($labels as $key => $value){
          $this->widgetSchema->setLabel($key,$value);
      }
  }
}
