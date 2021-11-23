<?php
 class Requests extends Controller{
     public function __construct(){
        if(!isLoggedIn()){
            flash('not_sign_in','You are not authorized! Sign in to continue!','alert alert-danger');
            redirect('users/signin');
        }else{
            $this->userModel = $this->model('Request');
        }
     }
     public function index(){
        $dateObj   = DateTime::createFromFormat('!m', date("m"));
        $monthName = $dateObj->format('F');
        $message = "Have a Good Night!";
        $time = date('H');
        $requests = $this->userModel->getApprovedRequests();
        if($time < 20){
            $message = "Have a Good Day!";
        }
         $data = [
             'name'=>$_SESSION['first_name']." ".$_SESSION['last_name'],
             'date'=>date("l").", ".date("d")." ".$monthName." ".date("Y"),
             'message'=>$message,
             'requests' => $requests,
         ];
         $this->view('requests/index',$data);   
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

            if(empty($data['title_err']) && empty($data['amount_err']) && empty($data['description_err'])){
                // Data is validated

                $result = $this->userModel->addRequest($data['title'],$data['description'],$data['amount'],$_SESSION['user_id']);
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
            ];
            $this->view('requests/add',$data);
        }
         
     }

 }