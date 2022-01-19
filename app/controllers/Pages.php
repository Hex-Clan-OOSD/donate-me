<?php
require_once (APPROOT . '/views/inc/navbar.php');
 class Pages extends Controller{
     public function __construct(){
        $this->requestModel = $this->model('Request');
        $this->userModel = $this->model('User');
        $this->donationModel = $this->model('Donation');
        error_reporting(~E_NOTICE);
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
            $verifiedUsers = $this->userModel->getUsersByRoleAndStatus("user","confirm");
            $pendingUsers = $this->userModel->getUsersByRoleAndStatus("user","pending");
            $verifiedDonations = $this->donationModel->getDonations("confirm");
            $pendingDonations = $this->donationModel->getDonations("pending");
            $data = [
                "verified-users-count"=>sizeof($verifiedUsers),
                "pending-users-count"=>sizeof($pendingUsers),
                "verified-requests-count"=>$this->requestModel->getRequestCountToStatus('confirm'),
                "pending-requests-count"=>$this->requestModel->getRequestCountToStatus('pending'),
                "verified-donations-count"=>sizeof($verifiedDonations),
                "pending-donations-count"=>sizeof($pendingDonations),
            ];
            $navbar = new AdminUserNavbar();
            $this->view('pages/admin_landing',$data);
        }else{
            redirect('pages/index');
        }
    }
    
    public function settings(){
        if(isLoggedIn()){
            if(isAdmin()){
                $navbar = new AdminUserNavbar();
            }else{
                $navbar = new NormalUserNavbar();
            }
        }
        $this->view('pages/settings');
    }
    

 }