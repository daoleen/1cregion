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
      unset($this['created_at'], $this['updated_at'], $this['slug'], $this['owner_id'], $this['is_active']);
      
      $year_now = date('Y');
      
      // settings for widgets
      $this->widgetSchema['small_description'] = new sfWidgetFormTextarea(array(), array('class' => 'textarea_small'));
      $this->widgetSchema['description'] = new sfWidgetFormTextarea(array(), array('class' => 'textarea_description'));
      $this->widgetSchema['file_src'] = new sfWidgetFormInputFile();
      $this->widgetSchema['office_country_id']->setOption('add_empty', 'Выберите страну');
      $this->widgetSchema['office_region_id']->setOption('add_empty', 'Выберите регион');
      $this->widgetSchema['office_city_id']->setOption('add_empty', 'Выберите город');
      $this->widgetSchema['budget_currency_id']->setOption('add_empty', 'Выберите валюту');
      $this->widgetSchema['expires_at'] = new WidgetFormDateNorm(array('format' => '%day%/%month%/%year%', 'years' => array($year_now => $year_now, $year_now+1 => $year_now+1), 'can_be_empty' => true, 'empty_values' => array('day' => date('d'), 'month' => date('m'), 'year' => $year_now+1)));
      $this->widgetSchema['budget'] = new sfWidgetFormInputText(array(), array('class' => 'input_small'));
      $this->widgetSchema['term'] = new sfWidgetFormInputText(array(), array('class' => 'input_small'));
      
      // settings for validators
      $this->validatorSchema['name']->setMessages(array(
          'required' => 'Поле, обязательное для заполнения',
          'max_length' => 'Максимальная длина поля 80 символов'
      ));
      $this->validatorSchema['small_description']->setMessages(array(
          'required' => 'Поле, обязательное для заполнения',
          'max_length' => 'Максимальная длина поля 100 символов'
      ));
      $this->validatorSchema['description']->setMessage('required', 'Поле "Описание" обязательно для заполнения');
      $this->validatorSchema['expires_at'] = new sfValidatorDate(array('min' => date('m/d/Y')), array('invalid' => 'Неверно выбрана дата'));
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
          'office_region_id' => 'Регион',
          'office_city_id' => 'Город',
          'is_budget_by_agreement' => 'Бюджет по договоренности',
          'budget' => 'Бюджет',
          'budget_currency_id' => 'Валюта',
          'budget_type' => 'Порядок оплаты',
          'is_security_deal' => 'Использовать безопасную сделку',
          'expires_at' => 'Действителен до',
          'term' => 'Срок выполнения',
          'term_options' => 'Период'
      ));
      
      $this->getWidgetSchema()->setHelps(array(
          'name'    => 'Введите название проекта',
          'small_description' => 'Не более 100 символов',
          'file_src' => 'Возможные форматы: gif, png, jpeg',
          'category_id' => 'Выберите специализацию проекта',
          'work_type' => 'Выберите тип работы',
          'office_country_id' => 'Выберите вашу страну',
          'office_region_id' => 'Выберите ваш регион',
          'office_city_id' => 'Выберите свой город',
          'is_budget_by_agreement' => 'Указывать бюджет необязательно',
          'budget' => 'Вещественное число',
          'is_security_deal' => 'Желаете ли воспользоваться сервисом безопасных сделок',
          'expires_at' => 'По истечении данного срока проект закрывается',
          'term' => 'Укажите срок и период выполнения',
      ));
  }
  
  public function getStylesheets() {
      return array('project_form.css' => null);
  }
}