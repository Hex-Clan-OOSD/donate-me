<?php
 class Request extends Controller{
     public function __construct(){
        if(!isLoggedIn()){
            redirect('users/signin');
            flash('not_sign_in','You are not authorized! Sign in to continue!','alert alert-danger');
        }
     }
     public function index(){
         $this->view('request/index');   
     }
     

 }