<?php

    interface IRequest{
        public function getDonations();
        public function getRequestId();
        public function getRequestTitle();
        public function getRequestDescription();
        public function getCollectedAmount();
        public function getOwnerFullName();
        public function getOWnerPhoneNumber();
        public function getOwnerAddress();
        public function getOwnerCityTown();
        public function getOwnerState();
        public function getOwnerPostalCode();
        public function getTotalAmount();
        public function getFileName();
    }

    class MoneyRequest implements IRequest{
        private $donations;
        private $request;

        function __construct($donations,$request){
            $this->donations = $donations;
            $this->request = $request;
        }

        function getDonations(){
            return $this->donations;
        }

        function getRequestId(){
            return $this->request->id;
        }

        public function getRequestTitle(){
            return $this->request->title;
        }

        function getRequestDescription(){
            return $this->request->description;
        }

        function getCollectedAmount(){
            return $this->request->collected_amount;
        }

        public function getOwnerFullName(){
            $fullName = $this->request->first_name;
            $fullName = $fullName." ".$this->request->last_name;
            return $fullName;
        }

        public function getOWnerPhoneNumber(){
            return $this->request->phone_number;
        }

        public function getOwnerAddress(){
            $address = $this->request->address_line_1;
            $address = $address." ".$this->request->address_line_2;
            return $address;
        }

        public function getOwnerCityTown(){
            return $this->request->city_town;
        }

        public function getOwnerState(){
            return $this->request->state;
        }

        public function getOwnerPostalCode(){
            return $this->request->postal_code;
        }

        public function getTotalAmount(){
            return $this->request->total_amount;
        }

        public function getFileName(){
            return $this->request->filename;
        }
    }

    class GoodRequest implements IRequest{
        private $donations;
        private $request;
        function __construct($donations,$request){
            $this->donations = $donations;
            $this->request = $request;
        }

        function getDonations(){
            return $this->donations;
        }

        function getRequestId(){
            return $this->request->id;
        }

        public function getRequestTitle(){
            return $this->request->title;
        }

        function getRequestDescription(){
            return $this->request->description;
        }

        function getCollectedAmount(){
            return $this->request->collected_amount;
        }

        public function getOwnerFullName(){
            $fullName = $this->request->first_name;
            $fullName = $fullName." ".$this->request->last_name;
            return $fullName;
        }

        public function getOWnerPhoneNumber(){
            return $this->request->phone_number;
        }

        public function getOwnerAddress(){
            $address = $this->request->address_line_1;
            $address = $address." ".$this->request->address_line_2;
            return $address;
        }

        public function getOwnerCityTown(){
            return $this->request->city_town;
        }

        public function getOwnerState(){
            return $this->request->state;
        }

        public function getOwnerPostalCode(){
            return $this->request->postal_code;
        }

        public function getTotalAmount(){
            return $this->request->total_amount;
        }

        public function getFileName(){
            return $this->request->filename;
        }
    }

    class RequestFactory{
        function getRequest($request,$donations=[]){
            if($request->req_type == 'money'){
                return new MoneyRequest($donations,$request);
            }
            return new GoodRequest($donations,$request);
        }
    }
?>