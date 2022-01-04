<?php
    class User{
        private $dbAdapter;
        public function __construct(){
            $this->dbAdapter = new DatabaseAdapter();
        }

        // Get unverified users
        public function getUnVerifiedUsers(){
            $this->dbAdapter->query('SELECT * FROM users WHERE role=:role AND verified=:verified');
            $this->dbAdapter->bind(':role','user');
            $this->dbAdapter->bind(':verified','pending');
            $results = $this->dbAdapter->resultSet();
            return $results;
        }

        // Verify the user
        public function handleUser($user_id,$status){
            $this->dbAdapter->query('UPDATE users SET verified= :status WHERE id = :userId');
            $this->dbAdapter->bind(':status',$status);
            $this->dbAdapter->bind(':userId',$user_id);
            if($this->dbAdapter->execute()){
                return true;
            }
            return false;
        }

        // Find the user by email
        public function findUserByEmail($email){
            $this->dbAdapter->query('SELECT * FROM users WHERE email = :email');
            $this->dbAdapter->bind(':email',$email);
            $row = $this->dbAdapter->singleRow();

            if($this->dbAdapter->rowCount()>0){
                return true;
            }else{
                return false;
            }
        }

        //Register the user
        public function registerUser($firstName,$lastName,$email,$password,$role,
            $phone_number,$address_line_1,$address_line_2, $city_town,$postal_code,$state){
            $this->dbAdapter->query('INSERT INTO users (first_name,last_name,email,password,role,phone_number,
            address_line_1,address_line_2,city_town,postal_code,state,verified) 
            VALUES (:first_name,:last_name,:email,:password,:role,:phone_number,:address_line_1,
            :address_line_2,:city_town,:postal_code,:state,:verified)');
            $this->dbAdapter->bind(':first_name',$firstName);
            $this->dbAdapter->bind(':last_name',$lastName);
            $this->dbAdapter->bind(':email',$email);
            $this->dbAdapter->bind(':last_name',$lastName);
            $this->dbAdapter->bind(':password',$password);
            $this->dbAdapter->bind(':role',$role);
            $this->dbAdapter->bind(':phone_number',$phone_number);
            $this->dbAdapter->bind(':address_line_1',$address_line_1);
            $this->dbAdapter->bind(':address_line_2',$address_line_2);
            $this->dbAdapter->bind(':city_town',$city_town);
            $this->dbAdapter->bind(':postal_code',$postal_code);
            $this->dbAdapter->bind(':state',$state);
            $this->dbAdapter->bind(':verified','pending');
            if($this->dbAdapter->execute()){
                return true;
            }
            return false;
        }

        //Sign in the user
        public function signInTheUser($email,$password){
            $this->dbAdapter->query('SELECT * FROM users WHERE email = :email');
            $this->dbAdapter->bind(':email',$email);
            $row = $this->dbAdapter->singleRow();
            if(password_verify($password,$row->password)){
                return $row;
            }else{
                return false;
            }
        }

        
    }
?>