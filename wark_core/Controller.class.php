<?php

/*
 * This is the core controller class this will be extended by other controllers.
 * 
 */
 
 	class Controller{
 		/**
 		 * [$db description]
 		 * @var [type]
 		 */
		private $template = null;
 		private $template_vars = array();

 		/**
 		 * [__construct description]
 		 * @param [type] $db
 		 */
 		public function __construct(){
 		}
		
		/**
		 * [loadView description]
		 * @param  [type]  $view
		 * @param  [type]  $view_vars
		 * @param  boolean $buffer
		 * @return [type]
		 */
		public function loadView($view, $view_vars = null, $buffer = false){
			/*
			 * This is a mechanism to load the view we wish to display.
			 */
			$view_file = DEPLOY_DIR . VIEW_DIR . $view . VIEW_SUFFIX; // string for file	
			if(file_exists($view_file)){ // if the file exists
				if($buffer == true){
					return file_get_contents($view_file);
				}else{
					require_once($view_file);
				}
			}else{ // otherwise lets get an error
				echo "view file does not exist :: $view_file";
			}
		}
		
		/**
		 * [loadModel description]
		 * @param  [type] $model
		 * @return [type]
		 */
		public function loadModel($model){
			/*
			 * This is a mechanism to load the correct model
			 */
			$model = ucfirst($model);	// we want to upercase our model (if it isn't already');
			$model_file = DEPLOY_DIR . MODEL_DIR . $model . MODEL_SUFFIX;	// the file string.
			if(file_exists($model_file)){ // check to see if it exists
				require_once($model_file);	
				return Model::factory($model);	
			}else{
				echo "model file does not exist :: $model_file";
			}			
		}
		
		/**
		 * [redirect description]
		 * @param  [type] $uri
		 * @return [type]
		 */
		public function redirect($uri){
			/*
			 * a simple redirect (if we need it);
			 */	
			header("location:$uri");
			die();
		}

		public function jsonResponse(array $output)
		{
			header('Content-Type: application/json');
			echo json_encode($output);
		}
 	}
