<?php
 class Request extends Controller{
     public function __construct(){
        if(!isLoggedIn()){
            redirect('users/signin');
            flash('not_sign_in','You are not authorized! Sign in to continue!','alert alert-danger');
        }
     }
     public function index(){
         $data = [
             'name'=>$_SESSION['first_name']." ".$_SESSION['last_name'],
             'date'=>date("l"),
         ];
         $this->view('request/index',$data);   
     }
     public function add(){
         $this->view('request/add');
     }

 }