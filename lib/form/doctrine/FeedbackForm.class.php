<?php

/**
 * Feedback form.
 *
 * @package    1CRegion.ru
 * @subpackage form
 * @author     Alex Kozlov <alexssource@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FeedbackForm extends BaseFeedbackForm
{
  public function configure()
  {
      unset($this['user_id'], $this['owner_id'], $this['created_at'], $this['updated_at']);
      
      $this->widgetSchema['comment'] = new sfWidgetFormTextarea();
      $this->widgetSchema['feedback_type'] = new sfWidgetFormChoice(array('choices' => array('positive' => 'Положительный', 'negative' => 'Отрицательный')));
  }
}
