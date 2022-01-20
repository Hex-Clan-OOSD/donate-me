<?php
    class Donations extends Controller{
        public function __construct(){
            if(!isLoggedIn()){
                flash('not_sign_in','You are not authorized! Sign in to continue!','alert alert-danger');
                redirect('users/signin'); 
            }else{
                $this->donationModel = $this->model('Donation');
                $this->requestModel = $this->model('Request');
                $this->notificationModel = $this->model('Notification');
                error_reporting(E_ERROR | E_PARSE);
            }
        }

        

        // Add a donation
        public function adddonation($request_id){
            $request = $this->requestModel->getRequest($request_id);
            if($_SERVER['REQUEST_METHOD']=='POST'){
                // Process the form
               
                // Sanitize the POST data
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                $data = [
                    'amount'=>trim($_POST['amount']),
                    'amount_err'=>'',
                    'file_err'=>'',
                    'request'=>$request,
                ];

                if(empty($data['amount'])){
                    $data['amount_err'] = 'Amount is required!';
                }else if(!is_numeric($data['amount_err'])){
                    $data['amount_err'] = "Invalid value!";
                }

                // File handling 
                $filename = $_FILES["evidence-image"]["name"];
                $tempname = $_FILES["evidence-image"]["tmp_name"];
                $error = $_FILES["evidence-image"]["error"];
                $file_type = $_FILES["evidence-image"]["type"];
                $file_ext = explode(".",$file_type);
                $file_actual_ext = strtolower(end($file_ext));
                $allowed = array('image/jpg','image/jpeg','image/png');
                
                if(empty($filename)){
                    $data['file_err'] = "Select an evidence image!";
                }else{
                    if(in_array($file_actual_ext,$allowed)){
                        if($error === 0){
                            $file_destination = UPLOAD_IMAGE_PATH_DONATIONS.$filename;
                            $result = move_uploaded_file($tempname,$file_destination);
                            if($result){
                                $data['file_err'] = "";
                            }else{
                                $data['file_err'] = "Error in uploading the file!";
                            }
                        }else{
                            // Error message when uploading image
                            $data['file_err'] = "Error in uploading the file!";
                        }
                    }else{
                        $data['file_err'] = "Different file type!";
                    }   
                }

                if(empty($data['amount_err']) && empty($data['file_err'])){
                    $result =  $this->donationModel->addDonation($request_id,$_SESSION['user_id'],$data['amount'],'pending',$filename);
                    if($result){
                        // Move to to the page
                    }else{
                        flash('request_add_err','Error in adding the request. Try again!','alert alert-danger');
                        $this->view('donations/adddonation',$data);
                    }
                }else{
                    flash('request_added','Donation added successfully!');
                     // Init data
                    $data = [
                    'amount'=>'',
                    'amount_err'=>'',
                    'file_err'=>'',
                    'request'=>$request,
                ];
                    $this->view('donations/adddonation',$data);
                }
            }else{
                $data = [
                    'amount'=>'',
                    'amount_err'=>'',
                    'file_err'=>'',
                    'request'=>$request,
                ];
                $this->view('donations/adddonation',$data);

            }

        }
        
        // Get the pending donations
        public function pendingdonations(){
            if(!isAdmin()){
                redirect('requests');
            }else{
                $data = $this->donationModel->getDonations('pending');
                
                $this->view('donations/pending',$data);
            }
        }
    }
?>