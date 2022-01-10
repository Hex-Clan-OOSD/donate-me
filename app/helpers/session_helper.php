<?php
    session_start();

    // Flash messahe helper
    // Ex:- flash('register_success','You are now registered','alert alert_danger');
    // Display in the view - <?php echo flash('register_success)
    function flash($name = '',$message = '',$class = 'alert alert-success'){
        if(!empty($name) && !empty($message)){
            if(!empty($_SESSION[$name])){
                unset($_SESSION[$name]);
            }
            if(!empty($_SESSION[$name. '_class'])){
                unset($_SESSION[$name. '_class']);
            }
            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;
            
        }elseif(empty($message) && !empty($_SESSION[$name])){
            $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class']:'';
            echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name. '_class']);
        }
    }

    // Helper function to get whether a user is logged in or not
    function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }
        return false;
    }

    // Helper function to get whether a user is an Admin or a Normal User
    function isAdmin(){
        if(isset($_SESSION['user_role'])){
            if($_SESSION['user_role'] == 'admin'){
                return true;
            }
            return false;
        }else{
            return false;
        }
    }

    function getLoggedInUserId(){
        return $_SESSION['user_id'];
    }

?>