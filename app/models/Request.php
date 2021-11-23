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

        // Get all the requests
        public function getApprovedRequests(){
            $this->db->query('SELECT *,
                              requests.id as requestId,
                              users.id as userId
                              FROM requests
                              INNER JOIN users
                              ON requests.user_id = users.id
                              ORDER BY requests.created_at DESC');
            $results = $this->db->resultSet();
            return $results;
        }

        

    }
?>