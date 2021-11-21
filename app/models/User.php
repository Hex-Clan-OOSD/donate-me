<?php
    class User{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        // Find the user by email
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email',$email);
            $row = $this->db->singleRow();

            if($this->db->rowCount()>0){
                return true;
            }else{
                return false;
            }
        }

        //Register the user
        public function registerUser($firstName,$lastName,$email,$password,$role){
            $this->db->query('INSERT INTO users (first_name,last_name,email,password,role) 
            VALUES (:first_name,:last_name,:email,:password,:role)');
            $this->db->bind(':first_name',$firstName);
            $this->db->bind(':last_name',$lastName);
            $this->db->bind(':email',$email);
            $this->db->bind(':last_name',$lastName);
            $this->db->bind(':password',$password);
            $this->db->bind(':role',$role);
            if($this->db->execute()){
                return true;
            }
            return false;
        }
    }
?>