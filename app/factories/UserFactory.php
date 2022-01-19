<?php
    interface IUser{
        public function getFullName();
        public function getAddress();
        public function getRole();
        public function getCityTown();  
    }

    class NormalUser implements IUser{
        private $userObject;

        function __construct($user){
            $this->userObject = $user;
        }

        public function getFullName(){
            $fullName = $this->userObject->first_name+" "+$this->userObject->last_name;
            return $fullName;
        }

        public function getAddress(){
            $address = $this->userObject->address_line_1+" "+$this->userObject->address_line_2;
            return $address;
        }

        public function getRole(){
            return $this->userObject->role;
        }

        public function getCityTown(){
            return $this->userObject->city_town;
        }
    }

    class AdminUer implements IUser{
        private $userObject;

        function __construct($user){
            $this->userObject = $user;
        }

        public function getFullName(){
            $fullName = $this->userObject->first_name+" "+$this->userObject->last_name;
            return $fullName;
        }

        public function getAddress(){
            
        }

        public function getRole(){
            $this->userObject->role;
        }

        public function getCityTown(){
            return $this->userObject->city_town;
        }
    }

    class UserFactory{
        function getUser($userObject){
            if($userObject->role == 'admin'){
                return new AdminUer($userObject);
            }else{
                return new NormalUser($userObject);
            }
        }
    }
?>