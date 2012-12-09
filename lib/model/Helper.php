<?php
class Helper
{
    /**
     * Возвращает код активации пользователя,
     * который отправляется после регистрации на email
     * @param type $login - логин пользователя
     * @param type $email - email пользователя
     * @return string - activation token 
     */
    public static function getUserActivationToken($login, $email)
    {
        $activateToken = sfConfig::get('app_sf_guard_plugin_activate_token');
        $token = strtolower(md5($login.$activateToken.$email));
        return $token;
    }
    
    
    /**
     * Получает расширение файла по имени файла
     * @param type $filename - имя файла
     * @return string - file extension 
     */
    public static function getFileExtension($filename) {
        $res = array();
        $pattern = "/.*\.([a-z0-9]+)$/i";
        preg_match_all($pattern, $filename, $res);
        return strtolower($res[1][0]);
    }
    
    
    /**
     * Проверяет расширение файла на безопасное
     * @param type $ext - расширение файла
     * @return boolean 
     */
    public static function isSecurityFileExtension($ext) {
        $security_extensions = array(
            'jpg', 'bmp', 'png', 'gif', 'jpeg',
            'doc', 'docx', 'rar', 'zip', 'txt'
        );
        
        foreach($security_extensions as $extension) {
            if($ext == $extension) {
                return true;
            }
        }
        
        return false;
    }
    
    
    /**
     * Изменение размера изображений на пропорциональный
     * @param type $source
     * @param type $new_image
     * @param type $width
     * @param type $height 
     */
    public static function resizeImage($source, $new_image, $width, $height)
    {
        $size = GetImageSize($source);
        $new_height = $height;
        $new_width = $width;

        if ($size[0] < $size[1])
            $new_width=($size[0]/$size[1])*$height;
        else
            $new_height=($size[1]/$size[0])*$width;
            $new_width=($new_width > $width)?$width:$new_width;
            $new_height=($new_height > $height)?$height:$new_height;
            $image_p = @imagecreatetruecolor($new_width, $new_height);
        if ($size[2]==2)
        {
            $image_cr = imagecreatefromjpeg($source);
        }
        else if ($size[2]==3)
        {
            $image_cr = imagecreatefrompng($source);
        }
        else if ($size[2]==1)
        {
            $image_cr = imagecreatefromgif($source);
        }
        
        imagecopyresampled($image_p, $image_cr, 0, 0, 0, 0, $new_width, $new_height, $size[0], $size[1]);
        
        if ($size[2]==2)
        {
            imagejpeg($image_p, $new_image, 75);
            return true;
        }
        else if ($size[2]==1)
        {
            imagegif($image_p, $new_image);
            return true;
        }
        else if ($size[2]==3)
        {
            imagepng($image_p, $new_image);
            return true;
        }
        
        return false;
    }
}
?>
