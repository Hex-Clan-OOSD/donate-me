<?php
 class Request extends Controller{
     public function __construct(){
        if(!isLoggedIn()){
            redirect('users/signin');
            flash('not_sign_in','You are not authorized! Sign in to continue!','alert alert-danger');
        }
     }
     public function index(){
        $dateObj   = DateTime::createFromFormat('!m', date("m"));
        $monthName = $dateObj->format('F');
        $message = "Have a good night!";
        $time = date('H');
        if($time < 20){
            $message = "Have a good day!";
        }
         $data = [
             'name'=>$_SESSION['first_name']." ".$_SESSION['last_name'],
             'date'=>date("l").", ".date("d")." ".$monthName." ".date("Y"),
             'message'=>$message,
         ];
         $this->view('request/index',$data);   
     }
     public function add(){
         $this->view('request/add');
     }

 }