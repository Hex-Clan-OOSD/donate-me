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
         ];
         $this->view('pages/index',$data );
    }

    public function landinguser(){
        $requestCount = $this->requestModel->getRequestCount();
        $collectedAmountSet = $this->requestModel->getTotalCollectedAmount();
        $collectedAmount = 0;
        foreach ($collectedAmountSet as $item) {
            $collectedAmount += $item->collected_amount;
        }
        if(isLoggedIn() && !isAdmin()){
            $navbar = new NormalUserNavbar();
            $data = [
                 'navbar'=>$navbar,
                 'req_count'=>$requestCount,
                 'amount'=>$collectedAmount,
             ];
             $this->view('pages/index',$data );
        }else if(isLoggedIn() && isAdmin()){
            $navbar = new AdminUserNavbar();
            $data = [
                 'navbar'=>$navbar,
                 'req_count'=>$requestCount,
                 'amount'=>$collectedAmount,
             ];
             $this->view('pages/index',$data );
        }else{
            redirect('pages/index');
        }
    }
    

 }