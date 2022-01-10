<?php
    class Donation{
        private $dbAdapter;
        public function __construct(){
            $this->dbAdapter = new DatabaseAdapter();
        }

        // Donation adding
        public function addDonation($request_id,$user_id,$amount,$status,$filename){
            $this->dbAdapter->query('INSERT INTO donations (request_id,user_id,amount,status,filename) 
            VALUES (:request_id,:user_id,:amount,:status,:filename)');
            $this->dbAdapter->bind(':request_id',$request_id);
            $this->dbAdapter->bind(':user_id',$user_id);
            $this->dbAdapter->bind(':amount',$amount);
            $this->dbAdapter->bind(':status',$status);
            $this->dbAdapter->bind(':filename',$filename);
            if($this->dbAdapter->execute()){
                return true;
            }
            return false;
        }
    }
?>