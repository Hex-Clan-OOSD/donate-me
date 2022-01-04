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

    public function landinguser(){
        if(isLoggedIn() && !isAdmin()){
            $navbar = new NormalUserNavbar();
            $data = [
                 'navbar'=>$navbar,
             ];
             $this->view('pages/index',$data );
        }else if(isLoggedIn() && isAdmin()){
            $navbar = new AdminUserNavbar();
            $data = [
                 'navbar'=>$navbar,
             ];
             $this->view('pages/index',$data );
        }else{
            redirect('pages/index');
        }
    }
    

 }