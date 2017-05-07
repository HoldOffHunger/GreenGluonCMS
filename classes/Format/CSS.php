<?php

	class CSS
	{
		public $desired_script;
		public $desired_action;
		public $desired_function;
		
		public $object_code;
		public $object_list;
		
		public $script_location;
		public $script_name;
		public $script_file;
		public $script_extension;
		public $script_format;
		public $script_args;
		
		public $cleanser_object;
		public $db_access_object;
		public $domain_object;
		public $language;
		public $formats_object;
		public $version_object;
		public $redirect_object;
		public $css_object;
		public $javascript_object;
		public $clientsideincludes_object;
		public $navigation_object;
		
		public function __construct($args)
		{
			$this->script_location = $args[scriptlocation];
			
			$this->cleanser_object = $args[cleanser];
			$this->db_access_object = $args[dbaccess];
			$this->domain_object = $args[domain];
			$this->language = $args[language];
			$this->desired_script = $args[desiredscript];
			$this->desired_action = $args[desiredaction];
			$this->desired_function = $args[desiredfunction];
			
			$this->object_code = $args[objectcode];
			$this->object_list = $args[objectlist];
			
			$this->script_name = $args[scriptname];
			$this->script_file = $args[scriptfile];
			$this->script_extension = $args[scriptextension];
			$this->script_format = $args[scriptformat];
			
			if($this->script_extension == 'css')
			{
				if($args[firstcall])
				{
					$this->Construct_Requires();
				}
				
				$constructor_args = array(
					'formatobject'=>$this,
					'desiredscript'=>$this->desired_script,
					'desiredaction'=>$this->desired_action,
					'objectcode'=>$this->object_code,
					'objectlist'=>$this->object_list,
					'scriptlocation'=>$this->script_location,
					'scriptname'=>$this->script_name,
					'scriptfile'=>$this->script_file,
					'scriptextension'=>$this->script_extension,
					'scriptformat'=>$this->script_format,
					'scriptargs'=>$this->script_args,
					'cleanserobject'=>$this->cleanser_object,
					'dbaccessobject'=>$this->db_access_object,
					'domainobject'=>$this->domain_object,
					'languageobject'=>$this->language,
					'formatsobject'=>$this->formats_object,
					'versionobject'=>$this->version_object,
					'redirectobject'=>$this->redirect_object,
				);
				
				$this->script = new style($constructor_args);
			}
		#	print("BT is IN CSS constructicator!!!");
		}
		
			// Construct ~ Requires
			// -----------------------------------------------
		
		public function Construct_Requires()
		{
			require('../scripts/Format/CSS/basicscript.php');
			require('../scripts/style.php');
		}
		
		public function CanAccess()
		{
			return $this->script->isAccessible();
		}
		
			// Render CSS Objects
			// -----------------------------------------------
			
		public function Display()
		{
			header("Content-type: text/css");
			
			return $this->script->Display();
		}
		
			// Headers for HTML Objects
			// -----------------------------------------------
		
		public function CSS_HeaderLocation()
		{
			return '../format/html/head/css_include.php';
		}
		
		public function CSS_IncludeLocation()
		{
			return '../format/html/head/css_include.php';
		}
		
		public function CSS_UnavailableLocation()
		{
			return '../format/html/head/unavailable.php';
		}
		
			// HTML Spacing
			// -----------------------------------------------
		
		public function DisplaySingleTab()
		{
			require('../format/html/basics/spacing/tab.html');
		}
		
		public function DisplaySingleReturn()
		{
			require('../format/html/basics/spacing/return.html');
		}
		
		public function DisplayDoubleReturns()
		{
			require('../format/html/basics/spacing/return.html');
			require('../format/html/basics/spacing/return.html');
		}
		
		public function OneCSSFilePerPage()
		{
			return 1;
		}
	}

?>