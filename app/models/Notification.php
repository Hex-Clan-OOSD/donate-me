<?php
    class Notification{
        private $dbAdapter;
        public function __construct(){
            $this->dbAdapter = new DatabaseAdapter();
        }

        // Get the notifications according to the status
        public function getNotifications($userId,$status){
            $this->dbAdapter->query('SELECT * FROM notifications WHERE user_id = :user_id AND status = :status');
            $this->dbAdapter->bind(':user_id',$userId);
            $this->dbAdapter->bind(':status',$status);
            try{
                $result = $this->dbAdapter->resultSet();
                return $result;
            }catch(Exception $e){
                return false;
            }
        }

        // Get the notifications by the status
        public function getNotificationsByStatus($userId,$status){
            $this->dbAdapter->query('SELECT * FROM notifications WHERE user_id = :user_id and status = :status');
            $this->dbAdapter->bind(':user_id',$userId);
            $this->dbAdapter->bind(':status',$status);
            try{
                $result = $this->dbAdapter->resultSet();
                return $result;
            }catch(Exception $e){
                return false;
            }
        }

        // Update a notification status
        public function updateNotification($status,$id){
            $this->dbAdapter->query('UPDATE notifications SET status=:status WHERE id=:id');
            $this->dbAdapter->bind(':status',$status);
            $this->dbAdapter->bind(':id',$id);
            try{
                if($this->dbAdapter->execute()){
                    return true;
                }else{
                    return false;
                }
            }catch (Exception $e){
                return false;
            }
        }

        // Get the unread notifications count
        public function getUnreadNotificationsCount($user_id){
            $this->dbAdapter->query('SELECT * FROM notifications WHERE user_id = :user_id AND status=:status');
            $this->dbAdapter->bind(':status','unread');
            $this->dbAdapter->bind(':user_id',$user_id);
            try{
                $this->dbAdapter->execute();
                return $this->dbAdapter->rowCount();
            }catch (Exception $e){
                return false;
            }
        }
    }
?>