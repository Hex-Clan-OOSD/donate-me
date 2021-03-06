<?php
require_once (APPROOT . '/factories/UserFactory.php');
    class User{
        private $dbAdapter;
        public function __construct(){
            $this->dbAdapter = new DatabaseAdapter();
        }

        // Get unverified users
        public function getUsersByRoleAndStatus($role,$status){
            $this->dbAdapter->query('SELECT * FROM users WHERE role=:role AND verified=:verified');
            $this->dbAdapter->bind(':role',$role);
            $this->dbAdapter->bind(':verified',$status);
            $results = $this->dbAdapter->resultSet();
            $users = [];
            $i = 0;
            $userFactory = new UserFactory();
            foreach ($results as $user) {
                $result_user = $userFactory->getUser($user);   
                $users[$i] = $result_user;
                $i += 1;
            }
            return $users;
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
            if($role == 'admin'){
                $this->dbAdapter->bind(':verified','confirm');
            }else{
                $this->dbAdapter->bind(':verified','pending');
            }
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

        // Change the password of the user
        public function changePassword($userEmail,$new_password){
            $this->dbAdapter->query('UPDATE users SET password = :new_password WHERE email = :email');
            $this->dbAdapter->bind(':email',$userEmail);
            $this->dbAdapter->bind(':new_password',$new_password);
            if($this->dbAdapter->execute()){
                return true;
            }
            return false;
        }

        // Change the email of the user
        public function changeEmail($user_email,$new_email){
            $this->dbAdapter->query('UPDATE users SET email = :new_email WHERE email = :user_email');
            $this->dbAdapter->bind(':new_email',$new_email);
            $this->dbAdapter->bind(':user_email',$user_email);
            if($this->dbAdapter->execute()){
                return true;
            }
            return false;
        }

        // Change the phone number of the user
        public function changePhoneNumber($user_email,$phone_number){
            $this->dbAdapter->query('UPDATE users SET phone_number = :new_phone_number WHERE email = :user_email');
            $this->dbAdapter->bind(':new_phone_number',$phone_number);
            $this->dbAdapter->bind(':user_email',$user_email);
            if($this->dbAdapter->execute()){
                return true;
            }
            return false;
        }

        
    }
?>