<?php
    class Request{
        private $dbAdapter;
        public function __construct(){
            $this->dbAdapter = new DatabaseAdapter();
        }

        // Get the user requests for user id
        public function getUserRequests($user_id){
            $this->dbAdapter->query('SELECT * from requests WHERE user_id = :user_id');
            $this->dbAdapter->bind(':user_id',$user_id);
            $results = $this->dbAdapter->resultSet();
            return $results;
        }

        // Get the total collected donation amount
        public function getTotalCollectedAmount(){
            $this->dbAdapter->query('SELECT collected_amount from requests');
            $results = $this->dbAdapter->resultSet();
            return $results;
        }

        // Add the request
        public function addRequest($title,$description,$amount,$user_id,$file_name){
            $this->dbAdapter->query('INSERT INTO requests (title,description,total_amount,collected_amount,user_id,status,filename)
            VALUES (:title,:description,:total_amount,:collected_amount,:user_id,:status,:filename)');
            $this->dbAdapter->bind(':title',$title);
            $this->dbAdapter->bind(':description',$description);
            $this->dbAdapter->bind(':total_amount',$amount);
            $this->dbAdapter->bind(':collected_amount',0);
            $this->dbAdapter->bind(':user_id',$user_id);
            $this->dbAdapter->bind(':status','pending');
            $this->dbAdapter->bind(':filename',$file_name);
            if($this->dbAdapter->execute()){
                return true;
            }
            return false;

        }

        // Update the collected amount of the request
        public function updateCollectedAmount($request_id,$collected_amount,$status){
            $this->dbAdapter->query('UPDATE requests SET collected_amount=:collected_amount,status=:status WHERE id=:id');
            $this->dbAdapter->bind(':collected_amount',$collected_amount);
            $this->dbAdapter->bind(':id',$request_id);
            $this->dbAdapter->bind(':status',$status);
            $result = $this->dbAdapter->execute();
            return $result;
        }

        // Get the request
        public function getRequest($request_id){
            $this->dbAdapter->query('SELECT *,
                                    requests.id as requestId,
                                    users.id as userId
                                    From requests 
                                    INNER JOIN users
                                    ON requests.user_id = users.id
                                    WHERE requests.id=:id');
            $this->dbAdapter->bind(':id',$request_id);
            return $this->dbAdapter->singleRow();
        }

        // Confirm the requests
        public function handleRequest($request_id,$status){
            $this->dbAdapter->query('UPDATE requests SET status=:status WHERE id=:id');
            $this->dbAdapter->bind(':status',$status);
            $this->dbAdapter->bind(':id',$request_id);
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
        public function getApprovedRequests($user_id){
            $this->dbAdapter->query('SELECT *,
                              requests.id as requestId,
                              users.id as userId
                              FROM requests
                              INNER JOIN users
                              ON requests.user_id = users.id
                              WHERE requests.status = :status AND requests.user_id != :user_id
                              ORDER BY requests.created_at DESC');
            $this->dbAdapter->bind(':status','confirm');
            $this->dbAdapter->bind(':user_id',$user_id);
            $results = $this->dbAdapter->resultSet();
            return $results;
        }

        // Get the request count
        public function getRequestCount(){
            $this->dbAdapter->query('SELECT * from requests');
            $this->dbAdapter->execute();
            return $this->dbAdapter->rowCount();
        }
        

    }
?>