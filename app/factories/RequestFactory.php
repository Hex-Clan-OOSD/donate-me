<?php
    class RequestFactory{
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

        function getRequestDescription(){
            return $this->request->description;
        }

        function getCollectedAmount(){
            return $this->request->collected_amount;
        }
    }
?>