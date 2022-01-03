<?php
    class Donation{
        private $dbAdapter;
        public function __construct(){
            $this->dbAdapter = new DatabaseAdapter();
        }

        // Donation adding
        public function addDonation($request_id,$user_id,$amount,$status){
            $this->dbAdapter->query('INSERT INTO donations (request_id,user_id,amount,status) 
            VALUES (:request_id,:user_id,:amount,:status)');
            $this->dbAdapter->bind(':request_id',$request_id);
            $this->dbAdapter->bind(':user_id',$user_id);
            $this->dbAdapter->bind(':amount',$amount);
            $this->dbAdapter->bind(':status',$status);
            if($this->dbAdapter->execute()){
                return true;
            }
            return false;
        }
    }
?>