<?php

/**
 * Account form.
 *
 * @package    1CRegion.ru
 * @subpackage form
 * @author     Alex Kozlov <alexssource@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AccountForm extends BaseAccountForm
{
  public function configure()
  {
      unset($this['visitors'], $this['avatar']);
      
      $year_now = date('Y');
      $year_start = $year_now - 101;
      $years = array();
      
      for($i = $year_start; $i <= $year_now-17; $i++) {
          $years[$i] = $i;
      }
      
      $this->widgetSchema['birthday'] = new WidgetFormDateNorm(array('format' => '%day%/%month%/%year%', 'years' => $years, 'can_be_empty' => true));
      $this->widgetSchema['categories_list']->setAttribute('class', 'large_input_block');
      $this->widgetSchema['other_info']->setAttribute('class', 'large_input_block');
      
      $this->getWidgetSchema()->setLabels(array(
          'birthday' => 'Дата рождения',
          'other_contacts' => 'Другие контакты'
      ));
      
      
      $this->validatorSchema['email'] = new sfValidatorEmail(array('trim' => true));
  }
  
  public function getStylesheets() {
      return array('account_form.css' => null);
  }
}
