<?php
/**
 * Clase para recuperar la informacion del usuario actual
 */
class UserInfo
{
    private static $instance;
    private $count = 0;

    private function __construct()
    {
    }

    public static function singleton()
    {
        if (!isset(self::$instance)) {
            $className = __CLASS__;
            self::$instance = new $className;
        }
        return self::$instance;
    }

    public function increment()
    {
        return $this->count++;
    }

    public function __clone()
    {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

    public function __wakeup()
    {
        trigger_error('Unserializing is not allowed.', E_USER_ERROR);
    }

    function user() 
    {
        return Yii::app()->getModule('user')->user();
    }
    function isAdmin() 
    {
        return Yii::app()->getModule('user')->isAdmin();
    }
}
?>