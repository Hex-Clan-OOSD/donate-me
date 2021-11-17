<!-- Singleton Design pattern is used in here -->
<?php
class Database
{
    private $serverName = "localhost";
    private $serverUser = "root";
    private $serverPassword = "";
    private static $dbObject;
    private function __construct() {

    }
    private function connect(){
        $conn = new mysqli($this->serverName,$this->serverUser,$this->serverPassword);
        if ($conn->connect_error) {
            return false;
        }
        return true;
    }
    public static function getDbObject() {
        if (!isset(self::$dbObject)) {
            self::$dbObject = new Database();
            self::$dbObject->connect();
        }
         
        return self::$dbObject;
    }

}
?>