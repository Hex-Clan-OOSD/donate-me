<?php
 class Pages extends Controller{
     public function __construct(){
        $this->loginModel = $this->model('User');
     }
     public function index(){
         $this->view('pages/index' );
         
     }
     public function login(){
         $this->view('pages/login');
     }

 }