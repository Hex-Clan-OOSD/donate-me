<?php
    
    class Users extends Controller{
        public function __construct(){
            
        }

        public function register(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD']=='POST'){
                // Process the form
               
                // Sanitize the POST data
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);


                 // Init data
                 $data = [
                    'first_name' => trim($_POST['first_name']),
                    'last_name' => trim($_POST['last_name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'first_name_err' => '',
                    'last_name_err' => '',
                    'email_err' => '',
                    'password_err' =>'',
                    'confirm_password_err' => '',
                ];

                 // Validate the First Name
                if(empty($data['first_name'])){
                    $data['first_name_err'] = "First Name is Required!";
                }
                 // Validate the Last Name
                if(empty($data['last_name'])){
                    $data['last_name_err'] = "Last Name is Required!";
                }
                // Validate the email
                if(empty($data['email'])){
                    $data['email_err'] = "Email is Required!";
                }
                // Validate the Password
                if(empty($data['password'])){
                    $data['password_err'] = "Password is Required!";
                }elseif(strlen($data['password'])<8){
                    $data['password_err'] = "Password must be at least 8 characters!";
                }
                // Validate the Confirm Password
                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = "Confirm Password is Required!";
                }else{
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = "Passwords do not match!";
                    }
                }

                // Make sure that all the errors are empty
                if(empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['email_err']) && 
                    empty($data['password_err']) && empty($data['confirm_password_err'])){
                        // Validation sucessful
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
                        die("SUCCESS");
                }else{
                    // Load the view with errors
                    
                    $this->view('users/register',$data);
                }
                

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
               
                // Sanitize the POST data
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                 // Init data
                 $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),  
                    'email_err' => '',
                    'password_err' => '',
                ];

                // Validate the email
                if(empty($data['email'])){
                    $data['email_err'] = "Email is Required!";
                }
                // Validate the Password
                if(empty($data['password'])){
                    $data['password_err'] = "Password is Required!";
                }elseif(strlen($data['password'])<8){
                    $data['password_err'] = "Password must be at least 8 characters!";
                }
                if(empty($data['email_err']) && empty($data['password_err'])){
                        // Validation sucessful
                        $data = [
                            
                            'email' => '',
                            'password' => '',
                           
                        ];
                        die("SUCCESS");
                }else{
                    // Load the view with errors
                    $this->view('users/signin',$data);
                }
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