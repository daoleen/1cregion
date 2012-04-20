<?php
class Helper
{
    public static function getUserActivationToken($login, $email)
    {
        $activateToken = sfConfig::get('app_sf_guard_plugin_activate_token');
        $token = strtolower(md5($login.$activateToken.$email));
        return $token;
    }
}
?>
