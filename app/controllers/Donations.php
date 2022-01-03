<?php
    class Donations extends Controller{
        public function __construct(){
            if(!isLoggedIn()){
                flash('not_sign_in','You are not authorized! Sign in to continue!','alert alert-danger');
                redirect('users/signin'); 
            }else{
                $this->donationModel = $this->model('Donation');
            }
        }

        // Add a donation
        public function adddonation($request_id){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                // Process the form
               
                // Sanitize the POST data
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                $data = [
                    'amount'=>trim($_POST['amount']),
                    'amount_err'=>''
                ];

                if(empty($data['amount'])){
                    $data['amount_err'] = 'Amount is required!';
                }else if(!is_numeric($data['amount_err'])){
                    $data['amount_err'] = "Invalid value!";
                }

                if(empty($data['amount_err'])){
                    $result =  $this->donationModel->addDonation($request_id,$_SESSION['user_id'],$data['amount'],'pending');
                    if($result){
                        // Move to to the page
                    }else{

                    }
                }else{
                    // Render the page with the errors
                }
            }else{
                // Render the view
            }

        }
        
        // Get the pending donations
        public function pendingdonations(){
            if(!isAdmin()){
                redirect('requests');
            }else{
                $this->view('donations/pending');
            }
        }
    }
?>