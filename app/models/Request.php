<?php
    class Request{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        // Add the request
        public function addRequest($title,$description,$amount,$user_id){
            $this->db->query('INSERT INTO requests (title,description,total_amount,collected_amount,user_id,status)
            VALUES (:title,:description,:total_amount,:collected_amount,:user_id,:status)');
            $this->db->bind(':title',$title);
            $this->db->bind(':description',$description);
            $this->db->bind(':total_amount',$amount);
            $this->db->bind(':collected_amount',0);
            $this->db->bind(':user_id',$user_id);
            $this->db->bind(':status','pending');
            if($this->db->execute()){
                return true;
            }
            return false;

        }

    }
?>