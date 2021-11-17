<!-- Singleton Design pattern is used in here -->
<?php
class Database
{
    private $serverName = "localhost";
    private $serverUser = "root";
    private $serverPassword = "";
    private $dbName = "donate_me";
    private static $dbObject;
    private $conn;
    private function __construct() {
    }
    private function connect(){
        $this->conn = new mysqli($this->serverName,$this->serverUser,$this->serverPassword,$this->dbName);
        if ($this->conn->connect_error) {
            echo "Connection error!";
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
    public function loginUser($username,$password){
        $sql = "SELECT id,name,password,role FROM users WHERE username='$username'";
        $result = $this->conn->query($sql);
        if(!$result){
            return false;
        }
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                return $row['password']==$password;
            }
        } else {
            return false;
        }
    }


}
?>