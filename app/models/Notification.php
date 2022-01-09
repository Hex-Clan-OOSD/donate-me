<?php
    class Notification{
        private $dbAdapter;
        public function __construct(){
            $this->dbAdapter = new DatabaseAdapter();
        }

        public function addNotification($title,$description,$user_id){
            $this->dbAdapter->query('INSERT INTO notifications (title,description,user_id)
            VALUES (:title,:description,:user_id)');
            $this->dbAdapter->bind(':title',$title);
            $this->dbAdapter->bind(':description',$description);
            $this->dbAdapter->bind(':user_id',$user_id);
            if($this->dbAdapter->execute()){
                return true;
            }
            return false;

        }

        // Get the notifications according to the status
        public function getNotifications($userId){
            $this->dbAdapter->query('SELECT * FROM notifications WHERE user_id = :user_id');
            $this->dbAdapter->bind(':user_id',$userId);
            try{
                $result = $this->dbAdapter->resultSet();
                return $result;
            }catch(Exception $e){
                return false;
            }
        }
    }
?>