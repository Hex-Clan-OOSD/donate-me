<?php
    /*
    * PDO database class
    * Connec to the Database
    * Create prepared statements
    * Bind values
    * Return rows and results
    */

    class Database{
        private $host = DB_HOST;
        private $user = DB_USER;
        private $password = DB_PASSWORD;
        private $dbname = DB_NAME;

        private $database_handler;
        private $statement;
        private $error;

        public function __construct(){
            // Set the DSN
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            );

            // Initialize the PDO instance
            try{
                $this->database_handler = new PDO($dsn,$this->user,$this->password,$options);
            }catch (PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        // Prepare statement with the queryies
        public function query($sql){
            $this->statement = $this->database_handler->prepare($sql);
        }

        // Binding the values
        public function bind($param,$value,$type=null){
            if(is_null($type)){
                switch(true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }

            $this->statement->bindValue($param,$value,$type);
        }

        // Execute the prepared statement
        public function execute(){
            return $this->statement->execute();
        }

        // Get the result set as array of objects
        public function resultSet(){
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        }

        // Get a single record as an object
        public function singleRow(){
            $this->execute();
            return $this->statement->fetch(PDO::FETCH_OBJ);
        }

        // Get the row Count
        public function rowCount(){
            return $this->statement->rowCount();
        }
    }
?>