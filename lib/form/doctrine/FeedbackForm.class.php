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
      //unset($this['user_id'], $this['owner_id'], $this['project_id'], $this['created_at'], $this['updated_at']);
      unset($this['created_at'], $this['updated_at']);
      
      $this->widgetSchema['comment'] = new sfWidgetFormTextarea();
      $this->widgetSchema['feedback_type'] = new sfWidgetFormChoice(array('choices' => array('positive' => 'Положительный', 'negative' => 'Отрицательный')));
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['owner_id'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['project_id'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['ball'] = new sfWidgetFormChoice(array('choices' => array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10)));
           
      $this->validatorSchema['ball'] = new sfValidatorAnd(array(
          $this->validatorSchema['ball'],
          new sfValidatorChoice(array('choices' => array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10)))
      ));
      
      $this->validatorSchema['comment'] = new sfValidatorString(array('required' => true, 'trim' => true));
      
      
      $this->getWidgetSchema()->setLabels(array(
          'comment' => 'Комментарий',
          'feedback_type'   => 'Тип отзыва',
          'ball'    => 'Оценка',
          'cost'    => 'Стоимость'
      ));
      
      $this->getWidgetSchema()->setHelps(array(
          'comment' => 'Введите Ваш комментарий для пользователя',
          'feedback_type'   => 'Выберите из списка тип отзыва',
          'ball'    => 'Выберите оценку, на которую по вашему мнению был выполнен проект',
          'cost'    => 'Введите стоимость разработки проекта'
      ));
  }
  
  public function getStylesheets() {
      return array('feedback_form.css' => null);
  }
}
