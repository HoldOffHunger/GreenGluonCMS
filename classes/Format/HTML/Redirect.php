<?php

	class HTML_Redirect
	{
		public $cleanser;
		public $domain_object;
		public $script_file;
		public $formats;
		public $language;
		
		public $url_cleansed;
		public $base_directory;
		
		public function __construct ($args)
		{
			$this->cleanser = $args[cleanser];
			$this->domain_object = $args[domainobject];
			$this->script_file = $args[scriptfile];
			$this->formats = $args[formats];
			$this->language = $args[language];
			
			$cleanser_args = array(
				'input'=>mb_substr(
					$_SERVER[REDIRECT_URL],
					0,
					1000,
					'UTF-8'),
			);
			
			$this->url_cleansed = $this->cleanser->CleanseInput($cleanser_args)[cleansedinput];
			$this->base_directory = $this->SetBaseDirectory();
		}
		
		public function GetAllVersionURLs()
		{
			$all_versions_array = array();
			
			foreach($this->formats->GetListOfAlternateVersionFormats() as $key => $value)
			{
				$url_query = $this->cleanser->CleanseInput_GetQuery();
				if($url_query)
				{
					$all_versions_array[$key] = ($this->base_directory . "/view." . $value . "?" . $url_query);
				}
				else
				{
					$all_versions_array[$key] = ($this->base_directory . "/view." . $value);
				}
			}
			
			return($all_versions_array);
		}
		
		public function PrintAllVersionURLs($args)
		{
			$script = $args['script'];
			$domain_object = $this->domain_object;
			
			foreach($this->GetAllVersionURLs() as $media => $url)
			{
				require('../format/html/basics/spacing/tab.html');
				require('../format/html/head/alternate_versions_line.php');
				require('../format/html/basics/spacing/return.html');
			}
			
			if(!$script->primary_host_record['NotReadyForLanguages']) {
				require('../format/html/basics/spacing/return.html');
				
				foreach($this->language->GetListOfLanguageCodes() as $language_code => $language_name)
				{
					require('../format/html/basics/spacing/tab.html');
					require('../format/html/head/alternate_versions_line.php');
					require('../format/html/basics/spacing/return.html');
				}
			}
		}
		
		public function SetBaseDirectory()
		{
			$redirect_url_explosion = explode('/', $this->url_cleansed);
			$redirect_url_useful = $redirect_url_explosion;
			$throwaway_item = array_pop($redirect_url_useful);
			$redirect_url_useful_imploded = implode('/', $redirect_url_useful);
			return $redirect_url_useful_imploded;
		}
		
		public function RedirectToSecuredConnection($args)
		{
			return header('Location:' . $this->RedirectToSecuredConnection_RedirectURL(), TRUE, 307);
		}
		
		public function Redirect_SetArgs($args)
		{
			$args[desiredscript] = 'redirect.php';
			$args[scriptname] = 'redirect.php';
			$args[scriptfile] = 'redirect';
			$args[scriptclassname] = 'redirect';
			$args[scriptobject] = 'redirect';
			$args[scriptlocation] = '../scripts/redirect.php';
			$args[scriptformat] = 'HTML';
			
			return $args;
		}
		
		public function RedirectToSecuredConnection_RedirectURL()
		{
			$url = $_SERVER[REQUEST_URI];
			$primary_domain_args = array(
				secure=>1,
				www=>1,
				lowercased=>1,
			);
			$full_redirect_url = $this->domain_object->GetPrimaryDomain($primary_domain_args) . $url;
			return $full_redirect_url;
		}
		
		public function RedirectToLogin($args)
		{
			return header('Location:' . $this->RedirectToLogin_RedirectURL(), TRUE, 307);
		}
		
		public function RedirectToLogin_RedirectURL()
		{
			$script_location = $_SERVER[REQUEST_URI];
			
			$url_directory = dirname($script_location);
			if($url_directory == '/')
			{
				$url_directory = '';
			}
			
			$primary_domain_args = array(
				secure=>1,
				www=>1,
				lowercased=>1,
			);
			
			$url = $url_directory . '/login.php';
			$full_redirect_url = $this->domain_object->GetPrimaryDomain($primary_domain_args) . $url;
			return $full_redirect_url;
		}
	}

?>