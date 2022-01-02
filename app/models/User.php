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
        public function registerUser($firstName,$lastName,$email,$password,$role,
            $phone_number,$address_line_1,$address_line_2, $city_town,$postal_code,$state){
            $this->db->query('INSERT INTO users (first_name,last_name,email,password,role,phone_number,
            address_line_1,address_line_2,city_town,postal_code,state) 
            VALUES (:first_name,:last_name,:email,:password,:role,:phone_number,:address_line_1,
            :address_line_2,:city_town,:postal_code,:state)');
            $this->db->bind(':first_name',$firstName);
            $this->db->bind(':last_name',$lastName);
            $this->db->bind(':email',$email);
            $this->db->bind(':last_name',$lastName);
            $this->db->bind(':password',$password);
            $this->db->bind(':role',$role);
            $this->db->bind(':phone_number',$phone_number);
            $this->db->bind(':address_line_1',$address_line_1);
            $this->db->bind(':address_line_2',$address_line_2);
            $this->db->bind(':city_town',$city_town);
            $this->db->bind(':postal_code',$postal_code);
            $this->db->bind(':state',$state);
            if($this->db->execute()){
                return true;
            }
            return false;
        }

        //Sign in the user
        public function signInTheUser($email,$password){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email',$email);
            $row = $this->db->singleRow();
            if(password_verify($password,$row->password)){
                return $row;
            }else{
                return false;
            }
        }

        
    }
?>