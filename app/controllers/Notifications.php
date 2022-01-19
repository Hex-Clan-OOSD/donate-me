<?php 
    class Notifications extends Controller{
        public function __construct(){
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

        // Add a notification
        
    }
    
?>