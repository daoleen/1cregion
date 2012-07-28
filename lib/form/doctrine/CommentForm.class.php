<?php

/**
 * Comment form.
 *
 * @package    1CRegion.ru
 * @subpackage form
 * @author     Alex Kozlov <alexssource@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CommentForm extends BaseCommentForm
{
  public function configure()
  {
      unset(
              $this['user_id'], $this['is_active'], 
              $this['is_candidate'], $this['is_performer'], 
              $this['created_at'], $this['updated_at']
        );
      
      $this->setWidget('project_id', new sfWidgetFormInputHidden());
      
      // Styles for controls
      $this->widgetSchema['cost']->setAttribute('class', 'control_small_text');
      $this->widgetSchema['term']->setAttribute('class', 'control_small_text');
      $this->widgetSchema['comment']->setAttribute('class', 'control_text_area');
      
      // Labels for controls
      $this->getWidgetSchema()->setLabels(array(
          'cost' => 'Стоимость',
          'term' => 'Срок',
          'is_security_deal' => 'Желаю использовать сервис безопасных сделок'
      ));
  }
  
  public function getStylesheets() {
      return array('comment_form.css' => null);
  }
}
