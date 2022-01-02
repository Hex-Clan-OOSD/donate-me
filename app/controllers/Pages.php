<?php
require_once (APPROOT . '/views/inc/navbar.php');
 class Pages extends Controller{
     public function __construct(){
        
     }
     public function index(){
         $navbar = new AnonymousUserNavbar();
         $data = [
             'navbar'=>$navbar,
         ];
         $this->view('pages/index',$data );
         
     }
    

 }