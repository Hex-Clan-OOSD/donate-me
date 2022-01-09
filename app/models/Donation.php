<?php
    class Donation{
        private $dbAdapter;
        public function __construct(){
            $this->dbAdapter = new DatabaseAdapter();
        }

        // Handle the status of a donation
        public function handleDonation($donation_id,$status){
            $this->dbAdapter->query('UPDATE donations SET status=:status WHERE id=:id');
            $this->dbAdapter->bind(':status',$status);
            $this->dbAdapter->bind(':id',$donation_id);
            if($this->dbAdapter->execute()){
                return true;
            }
            return false;
        }

        // Getting a single donation
        public function getADonation($donation_id){
            $this->dbAdapter->query('SELECT * from donations WHERE id=:id');
            $this->dbAdapter->bind(':id',$donation_id);
            $this->dbAdapter->execute();
            $result = $this->dbAdapter->singleRow();
            return $result;
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
                                    donations.user_id as donationUser
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