<?php
    /*
    * Base Controller class
    * Load the models and views
    */
    class Controller{
        // Load model
        public function model($model){
            // Require the required model file
            require_once '../app/models/'.$model.'.php';

            // Initialize the model
            return new $model();
        }

        // Load the view
        public function view($view,$data=[]){
            // Check the view file is available
            if(file_exists('../app/views/'.$view.'.php')){
                require_once '../app/views/'.$view.'.php';
            }else{
                // View does not exit
                die('View does not exit');
            }
        }
    }
?>