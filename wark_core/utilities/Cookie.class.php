<?php
	/*
	 * 
	 * Simple class for handling cookies.
	 * 
	 */
	 
	 
	class Cookie {
		/**
		 * [$c_name description]
		 * @var [type]
		 */
		private $c_name = null;
		private $c_expire = null;
		private $c_value = null;
		private $c_path = null;
		private $c_domain = null;
		
		public function __construct($c_name,$c_value = null,$c_expire =  null, $c_path = null, $c_domain = null){
			if($c_value != null){
				$this->setCookie($c_name,$c_value,$c_expire,$c_path,$c_domain);
			}
		}
		
		/**
		 * [setCookie description]
		 * @param [type] $c_name
		 * @param [type] $c_value
		 * @param [type] $c_expire
		 * @param [type] $c_path
		 * @param [type] $c_domain
		 */
		public function setCookie($c_name,$c_value,$c_expire =  null, $c_path = null, $c_domain = null){
				$this->c_name = $c_name;
				$this->c_value = $c_value;
				if($c_expire){
					$this->c_expire = $c_expire;
				}
				if($c_path){
					$this->c_path = $c_path;
				}
				if($c_domain){
					$this->c_domain = $c_domain;
				}
				
				
				
				return setcookie($c_name, $c_value,$c_expire,$c_path,$c_domain);
		}
		
		/**
		 * [readCookie description]
		 * @param  [type] $c_name
		 * @return [type]
		 */
		public function readCookie($c_name){
			if(isset($_COOKIE[$c_name])){
				return $_COOKIE[$c_name];
			}else{
				return false;
			}
		}
		
		/**
		 * [eraseCookie description]
		 * @param  [type] $c_name
		 * @return [type]
		 */
		public function eraseCookie($c_name){
			if(isset($_COOKIE[$c_name])){
				return setcookie($c_name, "", time()-3600);
			}else{
				return false;
			}
		}
	}