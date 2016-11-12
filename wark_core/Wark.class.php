<?php 

    class Wark
    {

        public function __construct()
        {

        }

        public function go($route)
        {

            $method = null;
            $method_val = null;
            if($route){ 
                $route = explode('/',$_GET['route']);
                $controller = $route[0];
                if(isset($route[1])){
                    $method = $route[1];
                }

                if(isset($route[2])){
                    $method_val = $route[2];
                }
            }else{
                if(defined('DEFAULT_CONTROLLER')){
                    $controller = DEFAULT_CONTROLLER;
                }else{
                    $controller = 'home'; // this is our default view if nothing is passed. 
                }
                
            }    
            //Load the controller
            $controller_file = DEPLOY_DIR . CONTROLLER_DIR.ucfirst($controller).CONTROLLER_SUFFIX;
            
            if(!file_exists($controller_file)){ // check to see if the controller file exists, if it doesn't then we load the 404 page.
                $controller_file = DEPLOY_DIR . CONTROLLER_DIR.'Fourofour'.CONTROLLER_SUFFIX;
                $controller = 'Fourofour';
            }
            
            
            include_once($controller_file);
            $ctrlObj = new $controller();


            if($method){
                if(method_exists($ctrlObj,$method)){
                    $ctrlObj->$method($method_val);
                    exit();
                }else{
                    $ctrlObj->index();
                }
                
            }else{
                $ctrlObj->index($method_val);   
            }            
        }
    }
