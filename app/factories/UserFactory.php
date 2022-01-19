<?php
    interface IUser{
        public function getId();
        public function getFullName();
        public function getAddress();
        public function getRole();
        public function getCityTown();
        public function getState();
        public function getPostalCode();  
        public function getPhoneNumber();
    }

    class NormalUser implements IUser{
        private $userObject;

        function __construct($user){
            $this->userObject = $user;
        }

        public function getId(){
            return $this->userObject->id;
        }

        public function getFullName(){
            $fullName = $this->userObject->first_name;
            $fullName = $fullName." ".$this->userObject->last_name;
            return $fullName;
        }

        public function getAddress(){
            $address = $this->userObject->address_line_1;
            $address = $address." ".$this->userObject->address_line_2;
            return $address;
        }

        public function getRole(){
            return $this->userObject->role;
        }

        public function getCityTown(){
            return $this->userObject->city_town;
        }

        public function getState(){
            return $this->userObject->state;
        }

        public function getPostalCode(){
            return $this->userObject->postal_code;
        }

        public function getPhoneNumber(){
            return $this->userObject->phone_number;
        }
    }

    class AdminUer implements IUser{
        private $userObject;

        function __construct($user){
            $this->userObject = $user;
        }

        public function getId(){
            return $this->userObject->id;
        }

        public function getFullName(){
            $fullName = $this->userObject->first_name;
            $fullName = $fullName." ".$this->userObject->last_name;
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

         public function getState(){
            return $this->userObject->state;
        }

        public function getPostalCode(){
            return $this->userObject->postal_code;
        }

        public function getPhoneNumber(){
            return $this->userObject->phone_number;
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