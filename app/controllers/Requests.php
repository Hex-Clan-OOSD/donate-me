<?php
require_once (APPROOT . '/views/inc/navbar.php');
require_once (APPROOT . '/factories/RequestFactory.php');
 class Requests extends Controller{
     public function __construct(){
        if(!isLoggedIn()){
            flash('not_sign_in','You are not authorized! Sign in to continue!','alert alert-danger');
            redirect('users/signin');
        }else{
            $this->requestModel = $this->model('Request');
            $this->notificationModel = $this->model('Notification');
            $this->donationModel = $this->model('Donation');
        }
     }
     public function index(){
        $dateObj   = DateTime::createFromFormat('!m', date("m"));
        $monthName = $dateObj->format('F');
        $message = "Have a Good Night!";
        $time = date('H');
        $requests = $this->requestModel->getApprovedRequests(getLoggedInUserId());
        if($time < 20){
            $message = "Have a Good Day!";
        }
         $data = [
             'name'=>$_SESSION['first_name']." ".$_SESSION['last_name'],
             'date'=>date("l").", ".date("d")." ".$monthName." ".date("Y"),
             'message'=>$message,
             'requests' => $requests,
         ];
         $unreadNotifications = $this->notificationModel->getNotifications($_SESSION['user_id'],'unread');
         $_SESSION['not_unr'] = sizeof($unreadNotifications);
         $navbar = new NormalUserNavbar();
         $this->view('requests/index',$data);   
     }

     public function  myrequests(){
         $data = array();
         $requests = $this->requestModel->getUserRequests(getLoggedInUserId());
         foreach ($requests as $request) {
             $donations = $this->donationModel->getDonationsForRequest($request->id);
             $requestItem = new RequestFactory($donations,$request);
             array_push($data,$requestItem);
         }
         $this->view('requests/myrequests',$data);
     }

     public function confirm($request_id){
         if(!isAdmin()){
             redirect('/signin');
         }else{
             $request = $this->requestModel->getRequest($request_id);
             if($_SERVER['REQUEST_METHOD']=='POST'){
                 if($_POST["request-button"] == 'confirm'){
                     $result = $this->requestModel->handleRequest($request_id,'confirm');
                     $this->notificationModel->addNotification('You request confimed!',
                        'Congratulations!!! You request of '.$request->title.' was approved!',$request->userId);
                     if($result){
                         redirect('requests/pendingrequests');
                     }else{
                         echo 'Error Occured';
                     }
                }else{
                    $result = $this->requestModel->handleRequest($request_id,'reject');
                    $this->notificationModel->addNotification('You request rejected!',
                        'You request of '.$request->title.' was rejected! Please try to submit it again with proper evidenced!',$request->userId);
                     if($result){
                         redirect('requests/pendingrequests');
                     }else{
                         echo 'Error Occured';
                     }
                }
            }else{

            }
        }
        
         
     }

     public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            // Process the form
           
            // Sanitize the POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'title'=>trim($_POST['title']),
                'amount'=>trim($_POST['amount']),
                'description'=>trim($_POST['description']),
                'title_err' => '',
                'amount_err' => '',
                'description_err' => '',
                'file_err' => '',
            ];

            // Validate the title
            if(empty($data['title'])){
                $data['title_err'] = "Title is required!";
            }elseif (strlen($data['title'])>50){
                $data['title_err'] = "Title cannot be more than 50 characters!";
            }

            // Validate the amount
            if(empty($data['amount'])){
                $data['amount_err'] = "Amount is required!";
            }

            // Validate the description
            if(empty($data['description'])){
                $data['description_err'] = "Description is required!";
            }

            // File handling 
            $filename = $_FILES["evidence-image"]["name"];
            $tempname = $_FILES["evidence-image"]["tmp_name"];
            $error = $_FILES["evidence-image"]["error"];
            $file_type = $_FILES["evidence-image"]["type"];
            $file_ext = explode(".",$file_type);
            $file_actual_ext = strtolower(end($file_ext));
            $allowed = array('image/jpg','image/jpeg','image/png');
            
            if(empty($filename)){
                $data['file_err'] = "Select an evidence image!";
            }else{
                if(in_array($file_actual_ext,$allowed)){
                    if($error === 0){
                        $new_file_name = uniqid('',true).'.'.$file_actual_ext;
                        // Change this path
                        $file_destination = UPLOAD_IMAGE_PATH.$filename;
                        $result = move_uploaded_file($tempname,$file_destination);
                        if($result){
                            $data['file_err'] = "";
                        }else{
                            $data['file_err'] = "Error in uploading the file!";
                        }
                    }else{
                        // Error message when uploading image
                        $data['file_err'] = "Error in uploading the file!";
                    }
                }else{
                    $data['file_err'] = "Different file type!";
                }   
            }

            if(empty($data['title_err']) && empty($data['amount_err']) && empty($data['description_err']) && empty($data['file_err'])){
                // Data is validated
                $result = $this->requestModel->addRequest($data['title'],$data['description'],$data['amount'],$_SESSION['user_id'],$filename);
                if(!$result){
                    flash('request_add_err','Error in adding the request. Try again!','alert alert-danger');
                    $this->view('requests/add',$data);
                }else{
                    flash('request_added','Request added successfully!');
                     // Init data
                    $data = [
                        'title'=>'',
                        'amount'=>'',
                        'description'=>'',
                        'title_err' => '',
                        'amount_err' => '',
                        'description_err' => '',
                        'file_err'=>'',
                    ];
                    $this->view('requests/add',$data);
                }
            }else{

                // Render the view with the errors
                $this->view('requests/add',$data); 
            }

        }else{

            // Init data
            $data = [
                'title'=>'',
                'amount'=>'',
                'description'=>'',
                'title_err' => '',
                'amount_err' => '',
                'description_err' => '',
                'file_err'=>'',
            ];
            $this->view('requests/add',$data);
        }
         
     }

     public function pendingrequests(){
        if(!isLoggedIn()){
            flash('not_sign_in','You are not authorized! Sign in to continue!','alert alert-danger');
            redirect('users/signin');
        }if(!isAdmin()){
            redirect('requests');
        }else{
            $requests = $this->requestModel->getUnverifiedRequests();
            $data = [
                'requests'=>$requests,
            ];
            $this->view('requests/pending',$data);
        }
     }

 }