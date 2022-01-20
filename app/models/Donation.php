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

        // Get pending donations
        public function getDonations($status){
            $this->dbAdapter->query('SELECT *,
                                    donations.id as donationId,
                                    users.id as userId,
                                    donations.user_id as donationUser,
                                    requests.filename as requestFilename,
                                    donations.filename as donationFileName
                                    From donations 
                                    INNER JOIN users
                                    ON donations.user_id = users.id
                                    INNER JOIN requests
                                    ON donations.request_id = requests.id
                                    WHERE donations.status = :status');
            $this->dbAdapter->bind(':status',$status);
            if($this->dbAdapter->execute()){
                return $this->dbAdapter->resultSet();
            }else{
                return NULL;
            }
        }

        // Get the donations according to the request id
        public function getDonationsForRequest($request_id){
            $this->dbAdapter->query('SELECT *,
                                    donations.id as donationId,
                                    users.id as userId,
                                    donations.user_id as donationUser
                                    From donations 
                                    INNER JOIN users
                                    ON donations.user_id = users.id
                                    WHERE donations.request_id = :request_id AND status=:status');
            $this->dbAdapter->bind(':request_id',$request_id);
            $this->dbAdapter->bind(':status','confirm');
            $results = $this->dbAdapter->resultSet();
            return $results;
        }
    }
?>