<?php 
    class Notifications extends Controller{
        public function __construct(){
            error_reporting(~E_NOTICE);
            if(!isLoggedIn()){
                redirect('');
            }else{
                $this->notificationModel = $this->model('Notification');
            }
        }

        // Render the notification index view
        public function index(){
            $notifications = $this->notificationModel->getNotificationsByStatus(getLoggedInUserId(),"unread");
            $data = [
                'notifications'=>$notifications,
            ];
            $this->view('notifications/index',$data);
        }

        // Make the notification read
        public function markAsRead($notification_id){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $result = $this->notificationModel->updateNotification('read',$notification_id);
                if($result){
                    setTheUnreadNotifications($this->notificationModel->getUnreadNotificationsCount(getLoggedInUserId()));
                    redirect('notifications');
                }else{
                    // Error occured
                }
            }
        }
        
    }
    
?>