<?php

/**
 * PortfolioWork form.
 *
 * @package    1CRegion.ru
 * @subpackage form
 * @author     Alex Kozlov <alexssource@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PortfolioWorkForm extends BasePortfolioWorkForm
{
  public function configure()
  {
      unset($this['user_id'], $this['created_at'], $this['updated_at']);
      
      $this->widgetSchema['image'] = new sfWidgetFormInputFile();
      $this->validatorSchema['image'] = new sfValidatorFile(array(
          'required'    => false,
          'mime_types'  => 'web_images',
          'path'        => sfConfig::get('sf_upload_dir').'/UserFiles',
      ));
      
      $this->widgetSchema['file_src'] = new sfWidgetFormInputFile();
      $this->validatorSchema['file_src'] = new sfValidatorFile(array(
          'required'    => false,
          'path'        => sfConfig::get('sf_upload_dir').'/UserFiles',
      ));
      
      $this->getWidgetSchema()->setLabels(array(
              'name'        => 'Название',
              'description' => 'Описание',
              'category_id' => 'Категория',
              'image'       => 'Изображение',
              'link'        => 'Адрес проекта',
              'cost'        => 'Стоимость',
              'term'        => 'Сроки',
              'file_src'    => 'Вложить файл'
      ))
      ->setHelps(array(
              'name'        => 'Введите название работы',
              'description' => 'Введите описание работы',
              'category_id' => 'Выберити из списка категорию',
              'image'       => 'Вы можете загрузить изображение',
              'link'        => 'Адрес сайта разработанного проекта',
              'cost'        => 'Стоимость выполнения работы',
              'term'        => 'Срок, за который работа была выполнена',
              'file_src'    => 'Можно загрузить файл работы'
      ));
  }
  
  public function getStylesheets() {
      return array('project_form.css' => null, 'portfolio_form.css' => null);
  }
}
