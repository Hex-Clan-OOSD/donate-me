<?php
 class Pages extends Controller{
     public function __construct(){
        $this->loginModel = $this->model('User');
     }
     public function index(){
         if(isLoggedIn()){
            redirect('requests');
         }
         $this->view('pages/index' );
         
     }
    

 }