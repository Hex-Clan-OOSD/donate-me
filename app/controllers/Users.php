<?php
    
    class Users extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
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
                }else{
                    // Check whether the email is already in the database
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = "Email is already taken";
                    }
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
                        // Hashed the Password
                        $hash_password = password_hash($data['password'],PASSWORD_DEFAULT);
                        $result = $this->userModel->registerUser($data['first_name'],$data['last_name'],$data['email'],
                        $hash_password,'user');
                        if($result){
                            flash('register_success','You are registered sucessfully!');
                            redirect('users/signin');
                        }else{
                            die("Error in adding the user!");
                        }
                        
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
                         // Check whether the user is availble
                        if(!$this->userModel->findUserByEmail($data['email'])){
                            $data['email_err'] = "No user found!";
                        }else{
                            $loggedInUser = $this->userModel->signInTheUser($data['email'],$data['password']);
                            if($loggedInUser){
                                $this->createUserSession($loggedInUser);
                            }else{
                                $data['password_err'] = 'Password Incorrect';
                                $this->view('users/signin',$data);
                            }
                        }
                        
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

        public function signout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['first_name']);
            unset($_SESSION['last_name']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_role']);
            session_destroy();
            redirect('users/signin');
        }

        private function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['first_name'] = $user->first_name;
            $_SESSION['last_name'] = $user->last_name;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_role'] = $user->role;
            
            // Redirect to the protected page
            redirect('pages/index');
        }


    }
    
?>