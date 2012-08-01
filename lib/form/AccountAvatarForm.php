<?php
class AccountAvatarForm extends sfForm {
    public function configure() {
        $this->widgetSchema['avatar'] = new sfWidgetFormInputFile();
        $this->validatorSchema['avatar'] = new sfValidatorFile(array(
          'required'    => true,
          'path'          => sfConfig::get('sf_upload_dir').'/UserFiles/'. sfContext::getInstance()->getUser()->getUsername().'/',
          'max_size'   => 512 * 1024,
          'mime_types' => 'web_images',
        ),
        array(
            'max_size'      => 'Неверный размер файла',
            'mime_types'  => 'Неверный формат файла',
            'no_tmp_dir'   => 'Не удалось создать temp-директорию проекта',
            'cant_write'    => 'Нет доступа для записи',
            'extension'     => 'Неверное расширение файла'
        ));
    }
}
?>