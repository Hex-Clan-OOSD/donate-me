<?php
require_once (APPROOT . '/views/inc/navbar.php');
 class Pages extends Controller{
     public function __construct(){
        $this->requestModel = $this->model('Request');
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
            $navbar = new AdminUserNavbar();
            
             $this->view('pages/admin_landing');
        }else{
            redirect('pages/index');
        }
    }
    

 }