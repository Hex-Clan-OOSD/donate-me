<?php
    
    class Users extends Controller{
        public function __construct(){
            
        }

        public function register(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD']=='POST'){
                // Process the form
            }else{
                // Init data
                $data = [
                    'first_name' => '',
                    'last_name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'first_name_err' => '',
                    'last_name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                $this->view('users/register',$data);
                
            }
        }

        public function signin(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD']=='POST'){
                // Process the form
            }else{
                // Init data
                $data = [
                   
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                    
                ];

                $this->view('users/signin',$data);
                
            }
            
        }
    }
    
?>