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
                }elseif(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
                    $data['email_err'] = "Invalid Email!";
                }else{
                    // Check whether the email is already in the database
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = "Email is already taken";
                    }
                }
                // Validate the Password
                if(empty($data['password'])){
                    $data['password_err'] = "Password is Required!";
                }elseif(strlen($data['password'])<=8){
                    $data['password_err'] = "Password must be at least 8 characters!";
                }elseif(strlen($data['password'])>15){
                    $data['password_err'] = "Password cannot be more than 15 characters!";
                }elseif(!preg_match("#[0-9]+#",$data['password'])){
                    $data['password_err'] = "Password Must Contain At Least 1 number!";
                }else if(!preg_match("#[A-Z]+#",$data['password'])){
                    $data['password_err'] = "Password Must Contain At Least 1 Capital character!";
                }else if(!preg_match("#[a-z]+#",$data['password'])){
                    $data['password_err'] = "Password Must Contain At Least 1 Lowercase character!";
                }else if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$data['password'])){
                    $data['password_err'] = "Password Must Contain At Least 1 special character!";
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
                            $user = $this->userModel->signInTheUser($data['email'],$data['password']);
                            if($user){
                                $this->createUserSession($user);
                                if(empty($user->phone_number)){
                                    redirect('users/moredetails');
                                }else{
                                    // Redirect to the protected page
                                    redirect('requests/index');
                                }
                                
                            }
                            
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
                }elseif(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
                    $data['email_err'] = "Invalid Email!";
                }
               
                // Validate the Password
                if(empty($data['password'])){
                    $data['password_err'] = "Password is Required!";
                }elseif(strlen($data['password'])<=8){
                    $data['password_err'] = "Password must be at least 8 characters!";
                }elseif(strlen($data['password'])>15){
                    $data['password_err'] = "Password cannot be more than 15 characters!";
                }elseif(!preg_match("#[0-9]+#",$data['password'])){
                    $data['password_err'] = "Password Must Contain At Least 1 number!";
                }else if(!preg_match("#[A-Z]+#",$data['password'])){
                    $data['password_err'] = "Password Must Contain At Least 1 Capital character!";
                }else if(!preg_match("#[a-z]+#",$data['password'])){
                    $data['password_err'] = "Password Must Contain At Least 1 Lowercase character!";
                }else if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$data['password'])){
                    $data['password_err'] = "Password Must Contain At Least 1 special character!";
                }

               
                if(empty($data['email_err']) && empty($data['password_err'])){
                        // Validation sucessful
                         // Check whether the user is availble
                        if(!$this->userModel->findUserByEmail($data['email'])){
                            $data['email_err'] = "No user found!";
                            // Load the view with errors
                            $this->view('users/signin',$data);
                        }else{
                            $loggedInUser = $this->userModel->signInTheUser($data['email'],$data['password']);
                            if($loggedInUser){
                                $this->createUserSession($loggedInUser);
                                if(empty($loggedInUser->phone_number)){
                                    redirect('users/moredetails'); 
                                }else{
                                    // Redirect to the protected page
                                    redirect('requests/index');
                                }  
                            }else{
                                $data['password_err'] = 'Password Incorrect';
                                // Load the view with errors
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

        // Get the other details of the user
        public function moredetails(){
            if(!isset($_SESSION['user_id'])){
                redirect('');
            }
            if($_SERVER['REQUEST_METHOD']=='POST'){
                // Process the form
               
                // Sanitize the POST data
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                $data = [
                    'phone_number' => trim($_POST['phone_number']),
                    'address_line_1' => trim($_POST['address_line_1']),
                    'address_line_2' => trim($_POST['address_line_2']),
                    'city_town' => trim($_POST['city_town']),
                    'postal_code' => trim($_POST['postal_code']),
                    'state' => trim($_POST['state']),
                    'phone_number_err' => '',
                    'address_line_1_err' => '',
                    'address_line_2_err' => '',
                    'city_town_err' => '',
                    'postal_code_err' => '',
                    'state_err' => '',
                ];

                // Phone number validation
                if(empty($data['phone_number'])){
                    $data['phone_number_err'] = "Phone number is required!";
                }elseif(strlen($data['phone_number'])!=10){
                    $data['phone_number_err'] = "Invalid phone number!";
                }

                // Address line validation
                if(empty($data['address_line_1'])){
                    $data['address_line_1_err'] = "Address line 1 is required!";
                }
                if(empty($data['address_line_2'])){
                    $data['address_line_2_err'] = "Address line 2 is required!";
                }

                // City town validation
                if(empty($data['city_town'])){
                    $data['city_town_err'] = "City/Town is required!";
                }

                // Postal code validation
                if(empty($data['postal_code'])){
                    $data['postal_code_err'] = "Postal Code is required!";
                }

                // State validation
                if(empty($data['state'])){
                    $data['state_err'] = "State is required!";
                }

                if(empty($data['phone_number_err']) && empty($data['address_line_1_err']) && 
                    empty($data['address_line_2_err']) && empty($data['city_town_err']) &&
                        empty($data['postal_code_err']) && empty($data['state_err'])){
                    
                    // Validation sucessfull

                    // Add to the database
                    $result = $this->userModel->addOtherDetails($data['phone_number'],$data['address_line_1'],
                        $data['address_line_2'],$data['city_town'],$data['postal_code'],$data['state'],$_SESSION['user_id']);
                    
                    if($result){
                        // Redirect to the protected page
                        redirect('requests/index');
                    }

                }else{
                    $this->view('users/moredetails',$data);
                }

            }else{
                $data = [
                    'phone_number' => '',
                    'address_line_1' => '',
                    'address_line_2' => '',
                    'city_town' => '',
                    'postal_code' => '',
                    'state' => '',
                    'phone_number_err' => '',
                    'address_line_1_err' => '',
                    'address_line_2_err' => '',
                    'city_town_err' => '',
                    'postal_code_err' => '',
                    'state_err' => '',
                ];
                $this->view('users/moredetails',$data);
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
            
            
        }


    }
    
?>