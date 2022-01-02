<?php
    class Request{
        private $dbAdapter;
        public function __construct(){
            $this->dbAdapter = new DatabaseAdapter();
        }

        // Add the request
        public function addRequest($title,$description,$amount,$user_id){
            $this->dbAdapter->query('INSERT INTO requests (title,description,total_amount,collected_amount,user_id,status)
            VALUES (:title,:description,:total_amount,:collected_amount,:user_id,:status)');
            $this->dbAdapter->bind(':title',$title);
            $this->dbAdapter->bind(':description',$description);
            $this->dbAdapter->bind(':total_amount',$amount);
            $this->dbAdapter->bind(':collected_amount',0);
            $this->dbAdapter->bind(':user_id',$user_id);
            $this->dbAdapter->bind(':status','pending');
            if($this->dbAdapter->execute()){
                return true;
            }
            return false;

        }

        // Get all pending requests
        public function getUnverifiedRequests(){
            $this->dbAdapter->query('SELECT *,
                                    requests.id as requestId,
                                    users.id as userId
                                    From requests 
                                    INNER JOIN users
                                    ON requests.user_id = users.id
                                    WHERE requests.status = :status');
            $this->dbAdapter->bind(':status','pending');
            $results = $this->dbAdapter->resultSet();
            return $results;
        }

        // Get all the requests
        public function getApprovedRequests(){
            $this->dbAdapter->query('SELECT *,
                              requests.id as requestId,
                              users.id as userId
                              FROM requests
                              INNER JOIN users
                              ON requests.user_id = users.id
                              ORDER BY requests.created_at DESC');
            $results = $this->dbAdapter->resultSet();
            return $results;
        }

        

    }
?>