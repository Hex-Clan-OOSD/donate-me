<?php
require_once (APPROOT . '/views/inc/navbar.php');
 class Pages extends Controller{

     public function __construct(){
        $this->requestModel = $this->model('Request');
        $this->userModel = $this->model('User');
        $this->donationModel = $this->model('Donation');
        error_reporting(~E_NOTICE);
     }

     public function index(){
         $navbar = new AnonymousUserNavbar();
         $requestCount = $this->requestModel->getRequestCount();
         $data = [
             'navbar'=>$navbar,
             'req_count'=>$requestCount,
             'amount'=>$this->requestModel->getTotalCollectedAmount(),
             'recent_requests'=>$this->requestModel->getRecentRequests(),
         ];
         
         $this->view('pages/index',$data );
    }

    public function landinguser(){
        $requestCount = $this->requestModel->getRequestCount();
        $collectedAmount = $this->requestModel->getTotalCollectedAmount();
        if(isLoggedIn() && !isAdmin()){
            $navbar = new NormalUserNavbar();
            $data = [
                 'navbar'=>$navbar,
                 'req_count'=>$requestCount,
                 'amount'=>$collectedAmount,
                 'recent_requests'=>$this->requestModel->getRecentRequests(),
             ];
             $this->view('pages/index',$data );
        }else if(isLoggedIn() && isAdmin()){
            $verifiedUsers = $this->userModel->getUsersByRoleAndStatus("user","confirm");
            $pendingUsers = $this->userModel->getUsersByRoleAndStatus("user","pending");
            $verifiedDonations = $this->donationModel->getDonations("confirm");
            $pendingDonations = $this->donationModel->getDonations("pending");
            $data = [
                "verified-users-count"=>sizeof($verifiedUsers),
                "pending-users-count"=>sizeof($pendingUsers),
                "verified-requests-count"=>$this->requestModel->getRequestCountToStatus('confirm'),
                "pending-requests-count"=>$this->requestModel->getRequestCountToStatus('pending'),
                "verified-donations-count"=>sizeof($verifiedDonations),
                "pending-donations-count"=>sizeof($pendingDonations),
            ];
            $navbar = new AdminUserNavbar();
            $this->view('pages/admin_landing',$data);
        }else{
            redirect('pages/index');
        }
    }
    
    public function settings($settingType=""){
        if(isLoggedIn()){
            if(isAdmin()){
                $navbar = new AdminUserNavbar();
            }else{
                $navbar = new NormalUserNavbar();
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            // Sanitize the post
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            

            if($settingType == "changePassword"){
                // Init data
                $data = [
                    'current_password' => trim($_POST['current_password']),
                    'new_password' => trim($_POST['new_password']),  
                    'confirm_new_password' => trim($_POST['confirm_new_password']), 
                    'new_username' => '', 
                    'new_phone_number' => '',
                    'current_password_err' => '',
                    'new_password_err' => '',
                    'confirm_new_password_err' =>'',
                    'new_username_err' => '',
                    'new_phone_number_err' => '',
                ];
                // Validate Data
                if(empty($data['current_password'])){
                    $data['current_password_err'] = "Current Password Required";
                }else{
                    $result = $this->userModel->signInTheUser($_SESSION['user_email'],$data['current_password']);
                    if($result == false){
                        $data['current_password_err'] = "Wrong password entered!";
                    }
                }
    
                if(empty($data['new_password'])){
                    $data['new_password_err'] = "New Password Required";
                }else{
                    // Validate the Password
                    if(empty($data['new_password'])){
                        $data['new_password_err'] = "Password is Required!";
                    }elseif(strlen($data['new_password'])<=8){
                        $data['new_password_err'] = "Password must be at least 8 characters!";
                    }elseif(strlen($data['new_password'])>15){
                        $data['new_password_err'] = "Password cannot be more than 15 characters!";
                    }elseif(!preg_match("#[0-9]+#",$data['new_password'])){
                        $data['new_password_err'] = "Password Must Contain At Least 1 number!";
                    }else if(!preg_match("#[A-Z]+#",$data['new_password'])){
                        $data['new_password_err'] = "Password Must Contain At Least 1 Capital character!";
                    }else if(!preg_match("#[a-z]+#",$data['new_password'])){
                        $data['new_password_err'] = "Password Must Contain At Least 1 Lowercase character!";
                    }else if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$data['new_password'])){
                        $data['new_password_err'] = "Password Must Contain At Least 1 special character!";
                    }
                }
    
                if(empty($data['confirm_new_password'])){
                    $data['confirm_new_password_err'] = "Confirm Password is required";
                }else{
                    if($data['new_password'] != $data['confirm_new_password']){
                        $data['confirm_new_password_err'] = "Passwords do not match!";
                    }
                }
                
                if(empty($data['current_password_err']) && empty($data['new_password_err']) && empty($data['confirm_new_password_err'])){
                    // Validation successfull
                    $hash_password = password_hash($data['new_password'],PASSWORD_DEFAULT);
                    $result = $this->userModel->changePassword($_SESSION['user_email'],$hash_password);
                   
                    if($result){
                        $data['current_password'] = '';
                        $data['new_password'] = '';
                        $data['confirm_new_password'] = '';
                        flash('password-changed','Password changed succesfully!');
                    }else{

                        $data['current_password_err'] = "Error in changing the passwords";
                        $data['new_password_err'] = "Error in changing the passwords";
                        $data['confirm_new_password_err'] = "Error in changing the passwords";
                    }
                }
            }elseif($settingType == 'changeEmail'){
                $data = [
                    'current_password' => '',
                    'new_password' => '',  
                    'confirm_new_password' => '', 
                    'new_username' => trim($_POST['new_username']), 
                    'new_phone_number' => '',
                    'current_password_err' => '',
                    'new_password_err' => '',
                    'confirm_new_password_err' =>'',
                    'new_username_err' => '',
                    'new_phone_number_err' => '',
                ];
                // Validate the email
                if(empty($data['new_username'])){
                    $data['new_username_err'] = "Email is Required!";
                }elseif(!filter_var($data['new_username'],FILTER_VALIDATE_EMAIL)){
                    $data['new_username_err'] = "Invalid Email!";
                }elseif($this->userModel->findUserByEmail($data['new_username'])){
                    $data['new_username_err'] = "User already exists for this email !";
                }else{
                    // Validation successfull
                    $result = $this->userModel->changeEmail($_SESSION['user_email'],$data['new_username']);
                    if($result){
                        $data['new_username'] = "";
                        flash('email-changed',"Email changed succesfully!");
                        $_SESSION['user_email'] = $data['new_username'];
                    }else{
                        $data['new_username_err'] = "Error in changing the email";
                    }
                }
               
            }elseif($settingType == 'changePhoneNumber'){
                $data = [
                    'current_password' => '',
                    'new_password' => '',  
                    'confirm_new_password' => '', 
                    'new_username' => '', 
                    'new_phone_number' => trim($_POST['new_phone_number']),
                    'current_password_err' => '',
                    'new_password_err' => '',
                    'confirm_new_password_err' =>'',
                    'new_username_err' => '',
                    'new_phone_number_err' => '',
                ];

                // Phone number validation
                if(empty($data['new_phone_number'])){
                    $data['new_phone_number_err'] = "Phone number is required!";
                }elseif(strlen($data['new_phone_number'])!=10){
                    $data['phone_number_err'] = "Invalid phone number!";
                }else{
                    $result = $this->userModel->changePhoneNumber($_SESSION['user_email'],$data['new_phone_number']);
                    if($result){
                        flash('phone_number_changed','Phone number changed succesfully!');

                    }else{
                        $data['phone_number_err'] = "Error in changing the phone number";
                    }
                }
            }
            $this->view('pages/settings',$data);
        }else{
            $data = [
                    'current_password' => '',
                    'new_password' => '',  
                    'confirm_new_password' => '', 
                    'new_username' => '', 
                    'new_phone_number' => '',
                    'current_password_err' => '',
                    'new_password_err' => '',
                    'confirm_new_password_err' =>'',
                    'new_username_err' => '',
                    'new_phone_number_err' => '',
            ];
            
            $this->view('pages/settings',$data);
        }
    }

    
    

 }