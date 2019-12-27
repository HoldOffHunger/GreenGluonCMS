<?php

	class Cookie
	{
		public $domain;
		public $time;
		public $cleanser;
		
		public $cookie;
		
		public function __construct($args)
		{
			$this->domain = $args[domain];
			$this->time = $args[time];
			$this->cleanser = $args[cleanser];
			
			$this->cookie = array();
			foreach ($_COOKIE as $cookie_key => $cookie_value)
			{
				$cleanser_args = array(
					'input'=>$cookie_key,
				);
				
				$cleansed_key = $this->cleanser->CleanseInput_EscapeBitVariableChars($cleanse_input_utf8_args)[cleansedinput];
				
				$cleanser_args = array(
					'input'=>$cookie_value,
				);
				
				$cleansed_value = $this->cleanser->CleanseInput_EscapeBitVariableChars($cleanse_input_utf8_args)[cleansedinput];
				
				$this->cookie[$cleansed_key] = $cleansed_value;
			}
			
			$this->cookie = $_COOKIE;
		}
		
		public function SetCookie($args)
		{
			$cookie_key = $args[key];
			$cookie_value = $args[value];
			$secure = $args[secure];
			
			if(isset($cookie_value))
			{
				if(!$secure)
				{
					$secure = FALSE;
					$cookie_time = $this->InsecureCookieExpirationTime();
				}
				else
				{
					$cookie_time = $this->SecureCookieExpirationTime();
				}
			}
			else
			{
				$cookie_time = $this->DeleteCookieExpirationTime();
			}
			
			setcookie(
				$cookie_key,
				$cookie_value,
				$cookie_time,
				$this->CookiePath(),
				$this->domain->primary_domain_lowercased,
				$secure,
				$this->CookieHTTPOnlyOption()
			);
		}
		
		public function GetCookie($args)
		{
			$cookie_key = $args[cookie];
			return $this->cookie[$cookie_key];
		}
		
		public function SecureCookieExpirationTime()
		{
			return $this->time->time + (4* 60 * 60);
		}
		
		public function InsecureCookieExpirationTime()
		{
			return $this->time->time + (10 * 365 * 24 * 60 * 60);
		}
		
		public function DeleteCookieExpirationTime()
		{
			return (-1) * ($this->time->time + (10 * 365 * 24 * 60 * 60));
		}
		
		public function CookiePath()
		{
			return '/';
		}
		
		public function CookieHTTPOnlyOption()
		{
			return FALSE;
		}
	}

?>