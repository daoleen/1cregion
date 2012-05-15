<?php

/**
 * Project form.
 *
 * @package    1CRegion.ru
 * @subpackage form
 * @author     Alex Kozlov <alexssource@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProjectForm extends BaseProjectForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at'], $this['slug'], $this['owner_id']);
      
      // settings for widgets
      $this->widgetSchema['small_description'] = new sfWidgetFormTextarea();
      $this->widgetSchema['description'] = new sfWidgetFormTextarea(array(), array('cols' => 50, 'rows' => 10));
      $this->widgetSchema['file_src'] = new sfWidgetFormInputFile();
      $this->widgetSchema['office_country_id']->setOption('add_empty', 'Выберите страну');
      $this->widgetSchema['office_city_id']->setOption('add_empty', 'Выберите город');
      $this->widgetSchema['budget_currency_id']->setOption('add_empty', 'Выберите валюту');
      $this->widgetSchema['expires_at'] = new sfWidgetFormDate(); // array('format' => '%day%/%month%/%year%', 'years' => array($year = date('Y'), $year+sfConfig::get('app_count_years_to_expired',1)), 'can_be_empty' => false));
      
      
      // settings for validators
      $this->validatorSchema['name']->setMessages(array(
          'required' => 'Поле, обязательное для заполнения',
          'max_length' => 'Максимальная длина поля 80 символов'
      ));
      $this->validatorSchema['small_description']->setMessages(array(
          'required' => 'Поле, обязательное для заполнения',
          'max_length' => 'Максимальная длина поля 100 символов'
      ));
      $this->validatorSchema['description']->setMessage('required', 'Поле, обязательное для заполнения');
      $this->validatorSchema['expires_at'] = new sfValidatorDate(array('min' => date('Y/m/d')), array('invalid' => 'Неверно выбрана дата.<br />Это должно быть в будущем'));
      $this->validatorSchema['file_src'] = new sfValidatorFile(
        array(
          'required'    => false,
          'path'          => sfConfig::get('sf_upload_dir').'/ProjectFiles',
          'max_size'   => 512 * 1024 //, sfContext::getInstance()->getConfiguration()->getApplicationConfiguration('frontend', 'all', false);
        ),
        array(
            'max_size'      => 'Неверный размер файла',
            'mime_types'  => 'Неверный формат файла',
            'no_tmp_dir'   => 'Не удалось создать temp-директорию проекта',
            'cant_write'    => 'Нет доступа для записи',
            'extension'     => 'Неверное расширение файла'
        )
      );
      
      
      // translation for labels
      $this->getWidgetSchema()->setLabels(array(
          'name' => 'Название',
          'small_description' => 'Краткое описание',
          'description' => 'Описание',
          'file_src' => 'Прикрепить файл',
          'category_id' => 'Специализация',
          'work_type' => 'Тип работы',
          'office_country_id' => 'Страна',
          'office_city_id' => 'Город',
          'is_budget_by_agreement' => 'Бюджет по договоренности',
          'budget' => 'Бюджет',
          'budget_currency_id' => 'Валюта',
          'budget_type' => 'Порядок оплаты',
          'is_security_deal' => 'Использовать безопасную сделку',
          'expires_at' => 'Действителен до'
      ));
  }
}