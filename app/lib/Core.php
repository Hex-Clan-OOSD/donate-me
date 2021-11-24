<?php
    /*
    * App core class
    * It create the URL and loads the core controllers
    * URL format - /controller/method/params
    */
    class Core{
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct(){
            // print_r($this->getURL());
            $url = $this->getURL();

            // Check whether the controller is available
            if(isset($url) and file_exists('../app/controllers/'. ucwords($url[0]).'.php')){
                // If the controller exists then set it as the current controller
                $this->currentController = ucwords($url[0]);

                // Remove the 0 index
                unset($url[0]);
            }

            // Require the controller
            require_once '../app/controllers/'.$this->currentController.'.php';

            // Initialize the controller
            $this->currentController = new $this->currentController;

            // Check for the function of the URL
            if(isset($url) and isset($url[1])){
                // Check whether the method exist in controller
                if(method_exists($this->currentController,$url[1])){
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                }
            }
            
            //Get the params
            $this->params = $url ? array_values($url):[];

            //Call a callback with array of params
            call_user_func_array([$this->currentController,$this->currentMethod],$this->params);
        }
        
        public function getURL(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'],'/');
                $url = filter_var($url,FILTER_SANITIZE_URL);
                $url = explode('/',$url);
                return $url;
            }
            return null;
        }
    }
?>