<?php
    class Donations extends Controller{
        public function __construct(){
            
        }
        
        public function pendingdonations(){
            if(!isLoggedIn()){
                flash('not_sign_in','You are not authorized! Sign in to continue!','alert alert-danger');
                redirect('users/signin');  
            }elseif(!isAdmin()){
                redirect('requests');
            }else{
                $this->view('donations/pending');
            }
        }
    }
?>