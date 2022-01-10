<?php
    class Notification{
        private $db;
        public function __construct(){
            $this->dbAdapter = new DatabaseAdapter();
        }

        // Get the notifications according to the status
        public function getNotifications($userId,$status){
            $this->dbAdapter->query('SELECT * FROM notifications WHERE user_id = :user_id AND status = :status');
            $this->dbAdapter->bind(':user_id',$userId);
            $this->dbAdapter->bind(':status',$status);
            try{
                $result = $this->db->resultSet();
                return $result;
            }catch(Exception $e){
                return false;
            }
        }
    }
?>