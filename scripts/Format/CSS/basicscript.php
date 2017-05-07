<?php

	class basicscript
	{
		public $desired_script;
		public $desired_action;
		
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
		public $language_object;
		public $formats_object;
		public $version_object;
		public $redirect_object;
		
		public function Display()
		{
			return TRUE;
		}
		
		public function __construct($args)
		{
			$this->desired_script = $args[desiredscript];
			$this->desired_action = $args[desiredaction];
			
			$this->format_object = $args[formatobject];
			$this->object_code = $args[objectcode];
			$this->object_list = $args[objectlist];
			
			$this->script_location = $args[scriptlocation];
			$this->script_name = $args[scriptname];
			$this->script_file = $args[scriptfile];
			$this->script_extension = $args[scriptextension];
			$this->script_format = $args[scriptformat];
			$this->script_args = $args[scriptargs];
			
			$this->cleanser_object = $args[cleanserobject];
			$this->db_access_object = $args[dbaccessobject];
			$this->domain_object = $args[domainobject];
			$this->language_object = $args[languageobject];
			$this->formats_object = $args[formatsobject];
			$this->version_object = $args[versionobject];
			$this->redirect_object = $args[redirectobject];
		}
		
			// Security Data
		
		public function IsSecure()
		{
			return FALSE;
		}
		
		public function IsAccessible()
		{
			return FALSE;
		}
		
		public function RequiresLogin()
		{
			return FALSE;
		}
		
		public function AdminOnly()
		{
			return FALSE;
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
	}

?>