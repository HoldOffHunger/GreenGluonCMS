<?php

	class XML
	{
		public $desired_script;
		public $desired_action;
		public $desired_function;
		
		public $object_code;
		public $object_list;
		
		public $script_name;
		public $script_classname;
		public $script_file;
		public $script_extension;
		public $script_format;
		public $script_args;
		
		public $authentication_object;
		public $cleanser_object;
		public $query_object;
		public $db_access_object;
		public $domain_object;
		public $language;
		public $time;
		public $cookie;
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
			
			$this->authentication_object = $args[authentication];
			$this->cleanser_object = $args[cleanser];
			$this->query_object = $args[query];
			$this->db_access_object = $args[dbaccess];
			$this->domain_object = $args[domain];
			$this->language = $args[language];
			$this->time = $args[time];
			$this->cookie = $args[cookie];
			$this->desired_script = $args[desiredscript];
			$this->desired_action = $args[desiredaction];
			$this->desired_function = $args[desiredfunction];
			
			$this->object_code = $args[objectcode];
			$this->object_parent = $args[objectparent];
			$this->object_list = $args[objectlist];
			
			$this->script_name = $args[scriptname];
			$this->script_file = $args[scriptfile];
			$this->script_classname = $args[scriptclassname];
			$this->script_extension = $args[scriptextension];
			$this->script_format = $args[scriptformat];
			$this->script_format_lower = $args[scriptformatlower];
			$this->script_args = $args[scriptargs];
			
			$constructor_args = [
				'desiredscript'=>$this->desired_script,
				'desiredaction'=>$this->desired_action,
				'objectcode'=>$this->object_code,
				'objectparent'=>$this->object_parent,
				'objectlist'=>$this->object_list,
				'scriptlocation'=>$this->script_location,
				'scriptname'=>$this->script_name,
				'scriptfile'=>$this->script_file,
				'scriptextension'=>$this->script_extension,
				'scriptformat'=>$this->script_format,
				'scriptformatlower'=>$this->script_format_lower,
				'scriptargs'=>$this->script_args,
				'authenticationobject'=>$this->authentication_object,
				'cleanserobject'=>$this->cleanser_object,
				'queryobject'=>$this->query_object,
				'dbaccessobject'=>$this->db_access_object,
				'domainobject'=>$this->domain_object,
				'languageobject'=>$this->language,
				'time'=>$this->time,
				'cookie'=>$this->cookie,
				'formatsobject'=>$this->formats_object,
				'versionobject'=>$this->version_object,
				'redirectobject'=>$this->redirect_object,
			];
			
			$this->Construct_Requires();
			
			require($this->script_location);
			$this->script = new $this->script_classname($constructor_args);
		}
		
			// Construct ~ Requires
			// -----------------------------------------------
		
		public function Construct_Requires()
		{
			require('../scripts/Format/' . $this->script_format . '/basicscript.php');
		}
		
		public function CanAccess()
		{
			return ($this->script && $this->script->IsAccessible());
		}
		
			// Display XML
			// -----------------------------------------------
		
		public function Display()
		{
			header("Content-type: application/xml");
			
			$this->script->Display();
			
			$this->StartXML();
			$this->script->DisplayTemplates();
			
			if($this->script->data_for_xml)
			{
				$xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
				$this->array_to_xml($this->script->data_for_xml,$xml_data);
				$xml = $xml_data->asXML();
				
				$xml = str_replace('<?xml version="1.0"?>', '', $xml);
				
				print($xml);
			}
			
			$this->FinishXML();
			
			return TRUE;
		}
		
		public function array_to_xml( $data, &$xml_data ) {
		    foreach( $data as $key => $value ) {
		        if( is_numeric($key) ){
		            $key = 'item'.$key; //dealing with <0/>..<n/> issues
		        }
		        if( is_array($value) ) {
		            $subnode = $xml_data->addChild($key);
		            $this->array_to_xml($value, $subnode);
		        } else {
		            $xml_data->addChild("$key",htmlspecialchars("$value"));
		        }
		     }
		}
		
		public function StartXML()
		{
			require('../format/xml/start.php');
			if($this->query_object->Parameter([parameter=>'humanreadable']))
			{
				require('../format/html/basics/spacing/return.html');
			}
		}
		
		public function FinishXML()
		{
			if($this->query_object->Parameter([parameter=>'humanreadable']))
			{
				require('../format/html/basics/spacing/return.html');
			}
		}
	}

?>