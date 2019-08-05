<?php

/**
 * UserConfigDesign form.
 sfDoctrineFormGenerator *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UserConfigDesignForm extends BaseUserConfigDesignForm
{
  public function configure()
  {
      unset($this['user_id']);

      $colors = P::getColorPalette();
      
      $fields = array(
              'header1_color',
        'header2_color',
        'header3_color',
        'header4_color',
        'link_color',
        'text_color',
        'top_background_color',
        'top_text_color',
          'top_text2_color',
        'bottom_background_color',
        'bottom_background_color2',
        'bottom_text_color',
          'bottom_text2_color',
        'button1_background_color',
        'button1_text_color',
        'button2_background_color',
        'button2_text_color',
        'bottom_link_color',
          'quizz_text_color'
      );
      foreach($fields as $name){
          $this->widgetSchema[$name] = new sfWidgetFormSelect(array(
              'choices' => $colors
          ));
      }
  }
}
