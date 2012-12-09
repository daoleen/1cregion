<?php

/**
 * services actions for working with Ajax
 *
 * @package    1CRegion.ru
 * @subpackage services
 * @author     Alex Kozlov <alexssource@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class servicesActions extends sfActions
{   
    /**
     * Загрузка аватарки
     * @param sfWebRequest $request 
     */
    public function executeAvatarupload(sfWebRequest $request) {
        $file = $request->getFiles("avatar");        
        $directory = sfConfig::get('sf_upload_dir').'/UserFiles/avatars/';
        $file_ext = Helper::getFileExtension($file["name"]);
        
        if(!Helper::isSecurityFileExtension($file_ext)) {
            die("Security alert");
        }
        
        $new_filename = md5($file['name'].time()).'.'.$file_ext;
        $new_filepath = $directory.$new_filename;
        //$res = move_uploaded_file($file['tmp_name'], $new_filepath);
        $width = sfConfig::get('app_avatar_width');
        $height = sfConfig::get('app_avatar_height');
        $res = Helper::resizeImage($file['tmp_name'], $new_filepath, $width, $height);
        
        
        // Обновление аватарки пользователя в БД
        if($res) {
            $user_account = $this->getUser()->getGuardUser()->Account;
            
            // Проверка, есть ли у юзера уже аватар
            // Если есть, то удаляем старый
            if($oldAvatar = $user_account->getAvatar()) {
                unlink($directory.$oldAvatar);
            }
            
            $user_account->setAvatar($new_filename);
            $user_account->save();
        }
        
        
        // Отобразим для клиента каталог и имя картинки
        $this->text = json_encode(array(
            'status'    => $res,
            'filename'  => $new_filename,
            'directory' => sfConfig::get('app_avatar_dir'),
        ));
    }
}
