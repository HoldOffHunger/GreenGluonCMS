<?php

	class ClientSideIncludes
	{
		public $desired_action;
		public $script_file;
		public $domain_object;
		
		public function __construct($args)
		{
			$this->desired_action = $args[desiredaction];
			$this->script_file = $args[scriptfile];
			$this->domain_object = $args[domainobject];
			$this->secure_script = $args[securescript];
			$this->language = $args[language];
			$this->google_api = $args[googleapi];
		}
		
		public function Headers($args)
		{
			$include_type = $args[includetype];
			$header_location = $args[headerlocation];
			$include_location = $args[includelocation];
			$unavailable_location = $args[unavailablelocation];
			
			$includes_file_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '_' . $include_type . '.php';
			
			if(is_file($includes_file_location) == FALSE)
			{
				$includes_file_location = '../templates/default/' . $this->script_file . '/' . $this->desired_action . '_' . $include_type . '.php';
			}
			
			if(is_file($includes_file_location) == TRUE)
			{
				$include_files = file($includes_file_location);
				$include_file_locations = array();
				
				if(count($include_files))
				{
					require('../format/html/basics/spacing/return.html');
					require('../format/html/head/' . $include_type . '_header.php');
					require('../format/html/basics/spacing/return.html');
					foreach ($include_files as $include_file)
					{
						$include_file = trim($include_file);
						$include_file_location = $include_type . '/' . $include_file;
						
						$primary_domain_args = array(
							'secure'=>$this->secure_script,
							'www'=>1,
							'lowercased'=>1,
						);
						
						$include_file_location_pieces = explode('.', $include_file_location);
						
						$total_count = count($include_file_location_pieces);
						$include_file_location_pieces[$total_count - 2] = $include_file_location_pieces[$total_count - 2] . '_' . $this->language->GetLanguageCode();
						$new_include_file_location = implode('.', $include_file_location_pieces);
						$full_new_include_file_location = '../clonefrom.com/' . $new_include_file_location;
						
						if(is_file($full_new_include_file_location))
						{
							$include_file_location = $this->domain_object->GetPrimaryDomain($primary_domain_args) . '/' . $new_include_file_location;
						}
						else
						{
							$cloned_include_file_location = '../clonefrom.com/' . $include_file_location;
							if(!is_file($cloned_include_file_location))
							{
								$include_file_location = $include_file;
							}
							else
							{
								$include_file_location = $this->domain_object->GetPrimaryDomain($primary_domain_args) . '/' . $include_file_location;
							}
						}
						print("\n\t");
						require('../format/html/head/' . $include_type . '_include.php');
					}
					
					if($_SERVER['HTTPS'] == 'on' && $this->google_api->client_id)
					{
						print("\n\t" . '<script src="https://apis.google.com/js/platform.js" async defer></script>');
						
						print("\n\t" . '<meta name="google-signin-client_id" content="' . $this->google_api->client_id . '">');
					}
				}
				else
				{
					$headers_unavailable_args = array(
						type=>$include_type,
						unavailablelocation=>$unavailable_location,
					);
					$this->Headers_Unavailable($headers_unavailable_args);
				}
			}
			else
			{
				$headers_unavailable_args = array(
					type=>$include_type,
					unavailablelocation=>$unavailable_location,
				);
				$this->Headers_Unavailable($headers_unavailable_args);
			}
		}
		
		public function Headers_DisplayRealFiles($args)
		{
			$include_type = $args[includetype];
			
			$includes_file_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '_' . $include_type . '.php';
			
			if(is_file($includes_file_location) == FALSE)
			{
				$includes_file_location = '../templates/default/' . $this->script_file . '/' . $this->desired_action . '_' . $include_type . '.php';
			}
			
			if(is_file($includes_file_location) == TRUE)
			{
				$include_files = file($includes_file_location);
				$include_url_locations = [];
				
				foreach($include_files as $include_file)
				{
					$include_file = trim($include_file);
					$include_file_location = $include_type . '/' . $include_file;
					
					if(is_file($include_file_location))
					{
						$include_url_locations[] = $this->domain_object->GetPrimaryDomain($primary_domain_args) . '/' . $include_file_location;
					}
					else
					{
						$default_include_file_location = '../clonefrom.com/' . $include_file_location;
						
						if(is_file($default_include_file_location))
						{
							$include_url_locations[] = $this->domain_object->GetPrimaryDomain($primary_domain_args) . '/' . $include_file_location;
						}
						else
						{
							if(filter_var($include_file, FILTER_VALIDATE_URL))
							{
								$include_url_locations[] = $include_file;
							}
						}
					}
				}
				
				foreach ($include_url_locations as $include_url_location)
				{
					$primary_domain_args = array(
						'secure'=>$this->secure_script,
						'www'=>1,
						'lowercased'=>1,
					);
					$include_file_location = $include_url_location;
					print("\n\t");
					require('../format/html/head/' . $include_type . '_include.php');
				}
			}
		}
		
		public function Headers_Simple($args)
		{
			$include_type = $args[includetype];
			$header_location = $args[headerlocation];
			$include_location = $args[includelocation];
			$unavailable_location = $args[unavailablelocation];
			
			$includes_file_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '_' . $include_type . '.php';
			
			if(is_file($includes_file_location) == FALSE)
			{
				$includes_file_location = '../templates/default/' . $this->script_file . '/' . $this->desired_action . '_' . $include_type . '.php';
			}
			
			if(is_file($includes_file_location) == TRUE)
			{
				$include_files = file($includes_file_location);
				if(strlen($include_files[0]) > 0)
				{
					require('../format/html/basics/spacing/return.html');
					require('../format/html/head/' . $include_type . '_header.php');
					require('../format/html/basics/spacing/return.html');
					
					$primary_domain_args = array(
						'secure'=>$this->secure_script,
						'www'=>1,
						'lowercased'=>1,
					);
					$include_file = $include_type . '/' . $this->script_file . '/' . $this->desired_action . '.' . $include_type;
					#print("BT: INCLUDE: " . $include_file);
					$include_file_location = $this->domain_object->GetPrimaryDomain($primary_domain_args) . '/' . $include_file;
					print("\n\t");
					require('../format/html/head/' . $include_type . '_include.php');
					
					$display_real_files_args = [
						includetype=>$include_type,
					];
					
					$this->Headers_DisplayRealFiles($display_real_files_args);
				}
			}
			else
			{
				$headers_unavailable_args = array(
					type=>$include_type,
					unavailablelocation=>$unavailable_location,
				);
				$this->Headers_Unavailable($headers_unavailable_args);
			}
		}
		
		public function Headers_Unavailable($args)
		{
			$type = $args[type];
			$unavailable_location = $args[unavailablelocation];
			require('../format/html/basics/spacing/return.html');
			require('../format/html/head/' . $type . '_header.php');
			$this->DisplayDoubleReturns();
			require($unavailable_location);
		}
		
			// HTML Spacing
			// -----------------------------------------------
		
		public function DisplayDoubleReturns()
		{
			require('../format/html/basics/spacing/return.html');
			require('../format/html/basics/spacing/return.html');
		}
	}
	
?>