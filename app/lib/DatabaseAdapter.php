<?php
class DatabaseAdapter{
        private $database;

        public function __construct()
        {
            $this->database = new Database();
        }

        // Prepare statement with the queryies
        public function query($sql){
            $this->database->query($sql);
        }

        // Binding the values
        public function bind($param,$value,$type=null){
            $this->database->bind($param,$value,$type);
        }

        // Execute the prepared statement
        public function execute(){
            return $this->database->execute();
        }

        // Get the result set as array of objects
        public function resultSet(){
            return $this->database->resultSet();
        }

        // Get a single record as an object
        public function singleRow(){
            return $this->database->singleRow();
        }

        // Get the row Count
        public function rowCount(){
            return $this->database->rowCount();
        }
    

    }
?>