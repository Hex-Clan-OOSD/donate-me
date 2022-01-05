<?php
    class Request{
        private $dbAdapter;
        public function __construct(){
            $this->dbAdapter = new DatabaseAdapter();
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

        // Get the request count
        public function getRequestCount(){
            $this->dbAdapter->query('SELECT * from requests');
            $this->dbAdapter->execute();
            return $this->dbAdapter->rowCount();
        }
        

    }
?>