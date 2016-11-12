<?php

/*
 * Simple Controller to deal with any 404 page not found.
 * 
 */
	class Fourofour extends Controller{

		private $meta_title = '404 Error';

		public function index(){
			$this->loadView('header',array('meta_title'=> $this->meta_title));
			$this->loadView('fourofour');
			$this->loadView('footer');
		}	
	}
?>
