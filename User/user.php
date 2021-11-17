<?php
class User{
    private static $userObj;
    private $isLogged;
    private function __construct() {
        $this->isLogged = false;
    }
    public static function getUserObject() {
        if (!isset(self::$userObj)) {
            echo "Object created";
            self::$userObj = new User();

        }
        return self::$userObj;
    }
    public function getLogStatus(){
        return $this->isLogged;
    }
    public function setLogged(){
        $this->isLogged = true;
    }
}
?>