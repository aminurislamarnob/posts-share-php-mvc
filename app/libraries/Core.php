<?php
/*
* App Core Class
* Creates URL & loads core controller
* URL FORMAT - /controller/method/params
*/

class Core{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){

        $url = $this->getUrl();

        //look in controllers for first value
        if( file_exists('../app/controllers/'.ucwords($url[0]).'.php') ){
            
            $this->currentController = ucwords($url[0]);

            // Unset 0 Index
            unset($url[0]); //unset so that we can get all params last
        }

        //require the controllers
        require_once('../app/controllers/'.$this->currentController.'.php');

        //instantiate the current controller class
        $this->currentController = new $this->currentController;


        //check for second part of the url
        if(isset($url[1])){
            //check to see if method exists in the controller
            if( method_exists($this->currentController, $url[1]) ){
                $this->currentMethod = $url[1];

                //unset index 1
                unset($url[1]); //unset so that we can get all params last
            }
        }

        //get params
        $this->params = $url ? array_values($url) : []; //array_values return indexed array of values.


        //call a callback with array of params
        //call $this->currentMethod with params inside $this->currentController class.
       call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

//        print_r($url);
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}