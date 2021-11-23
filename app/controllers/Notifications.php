<?php 
    class Notifications extends Controller{
        public function __construct(){
            if(!isLoggedIn()){
                redirect('');
            }else{
                $this->notificationModel = $this->model('Notification');;
            }
        }

        // Render the notification index view
        public function index(){
            $this->view('notifications/index' );
        }
        
    }
    
?>