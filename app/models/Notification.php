<?php
    class Notification{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        // Get the notifications according to the status
        public function getNotifications($userId,$status){
            $this->db->query('SELECT * FROM notifications WHERE user_id = :user_id AND status = :status');
            $this->db->bind(':user_id',$userId);
            $this->db->bind(':status',$status);
            try{
                $result = $this->db->resultSet();
                return $result;
            }catch(Exception $e){
                return false;
            }
        }
    }
?>