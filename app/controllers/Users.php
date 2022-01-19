<?php
    require_once (APPROOT . '/views/inc/navbar.php');
    class Users extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
            $this->notificationModel = $this->model('Notification');;
        }

        public function addadmin(){
            if(!isAdmin()){
                redirect('users/signin');
            }else{
                $navigationbar = new AdminUserNavbar();
                $this->view('users/addadmin');
            }
        }

        public function verifyUser($user_id){
            if(!isAdmin()){
                redirect('/signin');
            }else{
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    if($_POST["accept-button"]=='confirm'){
                        $result = $this->userModel->handleUser($user_id,'confirm');
                        if($result){
                            $this->notificationModel->addNotification("Your account Verified","Congratulations your account verified. So you can add requests and donation to the Web Site!",$user_id);
                            redirect('users/userverifications');
                        }else{
                            echo 'An error occured!';
                        }
                    }else{
                       $result = $this->userModel->handleUser($user_id,'rejected'); 
                       if($result){
                           $this->notificationModel->addNotification("Your account Rejected","Sorry your account was rejected from our confimation process and your account will be deleted within next 30 days!. Thank you!",$user_id);
                            redirect('users/userverifications');
                        }else{
                            echo 'An error occured!';
                        }
                    }
                }else{
                    echo 'Error occured!';
                }
            }

        }

        public function admin(){
            if(!isLoggedIn()){
                flash('not_sign_in','You are not authorized! Sign in to continue!','alert alert-danger');
                redirect('users/signin');
            }else{
                if(isAdmin()){
                    redirect('pages/landinguser');
                }else{
                    redirect('');
                }
                
            }
        }

        public function userverifications(){
            if(!isLoggedIn()){
                flash('not_sign_in','You are not authorized! Sign in to continue!','alert alert-danger');
                redirect('users/signin');
            }else{
                $data = $this->userModel->getUsersByRoleAndStatus("user","pending");
                $this->view('users/verifications',$data);
            }
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
                    'phone_number' => trim($_POST['phone_number']),
                    'address_line_1' => trim($_POST['address_line_1']),
                    'address_line_2' => trim($_POST['address_line_2']),
                    'city_town' => trim($_POST['city_town']),
                    'postal_code' => trim($_POST['postal_code']),
                    'state' => trim($_POST['state']),
                    'first_name_err' => '',
                    'last_name_err' => '',
                    'email_err' => '',
                    'password_err' =>'',
                    'confirm_password_err' => '',
                    'phone_number_err' => '',
                    'address_line_1_err' => '',
                    'address_line_2_err' => '',
                    'city_town_err' => '',
                    'postal_code_err' => '',
                    'state_err' => '',
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

                // Make sure that all the errors are empty
                if(empty($data['first_name_err']) && empty($data['last_name_err']) &&empty($data['email_err']) && 
                    empty($data['password_err']) && empty($data['confirm_password_err']) && 
                    empty($data['phone_number_err']) && empty($data['address_line_1_err']) && 
                    empty($data['address_line_2_err']) && empty($data['city_town_err']) &&
                        empty($data['postal_code_err']) && empty($data['state_err'])){
                        // Validation sucessful
                        // Hashed the Password
                        $hash_password = password_hash($data['password'],PASSWORD_DEFAULT);
                        $result = $this->userModel->registerUser($data['first_name'],$data['last_name'],$data['email'],
                        $hash_password,'user',$data['phone_number'],$data['address_line_1'],$data['address_line_2'],
                        $data['city_town'],$data['postal_code'],$data['state']);
                        if($result){
                            // When sign in user session get created
                            $user = $this->userModel->signInTheUser($data['email'],$data['password']);
                            if($user){
                                $this->createUserSession($user);
                                // Redirect to the protected page
                                if(isAdmin()){
                                    redirect('users/admin');
                                }
                                redirect('requests/index'); 
                            }else{
                                // Show a flash message that the database is not connected
                            }
                            
                        }else{
                            // Todo : Show a flash message
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
                    'phone_number' => '',
                    'address_line_1' => '',
                    'address_line_2' => '',
                    'city_town' => '',
                    'postal_code' => '',
                    'state' => '',
                    'first_name_err' => '',
                    'last_name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'phone_number_err' => '',
                    'address_line_1_err' => '',
                    'address_line_2_err' => '',
                    'city_town_err' => '',
                    'postal_code_err' => '',
                    'state_err' => '',
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
                                // Redirect to the protected page
                                // If the user is an admin user then the user is navigate to a protected admin page
                                if($loggedInUser->role == 'admin'){
                                    redirect('users/admin');
                                }else{
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

        public function signout(){
            unset($_SESSION['not_unr']);
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