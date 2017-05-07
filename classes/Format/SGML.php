<?php

	class SGML
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
			$this->version_object = $args[versionobject];
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
		
		public function CanAccess()
		{
			return ($this->script && $this->script->IsAccessible());
		}
		
			// Construct ~ Requires
			// -----------------------------------------------
		
		public function Construct_Requires()
		{
			require('../scripts/Format/' . $this->script_format . '/basicscript.php');
		}
		
			// Display SGML
			// -----------------------------------------------
		
		public function Display()
		{
			if(!$this->PrepareScriptForSGMLConversion())
			{
				return FALSE;
			}
			
			$this->SetSGMLFileName();
			$this->SetSGMLDisplayFileName();
			
			$source_file_location = $this->SetSourceFileLocation();
			$sgml_file_location = $this->SetSGMLFileLocation();
			
			$sgml_input = $this->SetHTMLForSGMLConversion();
			
			if(!$sgml_input)
			{
				return FALSE;
			}
			
			$old_sgml_input = '';
			
			if(is_file($source_file_location))
			{
				$old_sgml_input = file_get_contents($source_file_location);
			}
			
			if(!is_file($sgml_file_location) || $old_sgml_input != $sgml_input)
			{
				$sgml_output = $this->ConvertHTMLToSGML();
				
				$file_handle_for_source = fopen($sgml_file_location, 'w+');
				fwrite($file_handle_for_source, $sgml_output);
				fclose($file_handle_for_source);
				
				$file_handle_for_source = fopen($source_file_location, 'w+');
				fwrite($file_handle_for_source, $sgml_input);
				fclose($file_handle_for_source);
			}
			
			$this->SetSGMLHeadersForHTTP();
			
			return readfile($sgml_file_location);
		}
		
		public function ConvertHTMLToSGML()
		{
			$sgml_output = $this->sgml_input;
			
			$sgml_output = str_replace('<h1>', '<header-level-1>', $sgml_output);
			$sgml_output = str_replace('</h1>', '</header-level-1>', $sgml_output);
			
			$sgml_output = str_replace('<h2>', '<header-level-2>', $sgml_output);
			$sgml_output = str_replace('</h2>', '</header-level-2>', $sgml_output);
			
			$sgml_output = str_replace('<h3>', '<header-level-3>', $sgml_output);
			$sgml_output = str_replace('</h3>', '</header-level-3>', $sgml_output);
			
			$sgml_output = str_replace('<h4>', '<header-level-4>', $sgml_output);
			$sgml_output = str_replace('</h4>', '</header-level-4>', $sgml_output);
			
			$sgml_output = str_replace('<h5>', '<header-level-5>', $sgml_output);
			$sgml_output = str_replace('</h5>', '</header-level-5>', $sgml_output);
			
			$sgml_output = str_replace('<h6>', '<header-level-6>', $sgml_output);
			$sgml_output = str_replace('</h6>', '</header-level-6>', $sgml_output);
			
			$sgml_output = str_replace('<h7>', '<header-level-7>', $sgml_output);
			$sgml_output = str_replace('</h7>', '</header-level-7>', $sgml_output);
			
			$sgml_output = str_replace('<p>', '<paragraph>', $sgml_output);
			$sgml_output = str_replace('</p>', '</paragraph>', $sgml_output);
			
			$sgml_output = str_replace('<br>', '<linebreak></linebreak>', $sgml_output);
			
			$sgml_output = str_replace('<b>', '<bold>', $sgml_output);
			$sgml_output = str_replace('</b>', '</bold>', $sgml_output);
			
			$sgml_output = str_replace('<i>', '<italic>', $sgml_output);
			$sgml_output = str_replace('</i>', '</italic>', $sgml_output);
			
			$sgml_output = str_replace('<i>', '<italic>', $sgml_output);
			$sgml_output = str_replace('</i>', '</italic>', $sgml_output);
			
			$sgml_output = str_replace('<u>', '<underline>', $sgml_output);
			$sgml_output = str_replace('</u>', '</underline>', $sgml_output);
			
			$sgml_output = str_replace('<s>', '<strikethrough>', $sgml_output);
			$sgml_output = str_replace('</s>', '</strikethrough>', $sgml_output);
			
			$sgml_document = '<sgml>' . $sgml_output . '</sgml>';
			
			return $this->sgml_output = $sgml_document;
		}
		
		public function SetHTMLForSGMLConversion()
		{
			$this->script->DisplayTemplates();
			
			return $this->sgml_input = $this->script->html_for_sgml;
		}
		
		public function SetSGMLHeadersForHTTP()
		{
			header("Content-type: text/sgml");
			header('Content-Disposition:inline;filename=' . urlencode($this->sgml_display_filename) . '.sgml');
		}
		
		public function SetSGMLFileName()
		{
			$sgml_filename = $this->script->record_to_use['id'];
			
			if($this->script->record_to_use['textbody'])
			{
				$textbody_count = count($this->script->record_to_use['textbody']);
				
				if($textbody_count)
				{
					$textbody_for_use = $this->script->record_to_use['textbody'][0];
					if($textbody_for_use && $textbody_for_use['id'])
					{
						$sgml_filename .= '_' . $textbody_for_use['id'];
					}
				}
			}
			
			return $this->sgml_filename = $sgml_filename;
		}
		
		public function SetSGMLDisplayFileName()
		{
			$sgml_display_filename = '';
			
			if($this->script->record_to_use && $this->script->record_to_use['Code'])
			{
				$sgml_display_filename = $this->script->record_to_use['Code'];
			}
			else
			{
				$sgml_display_filename = 'portable-file';
			}
			
			return $this->sgml_display_filename = $sgml_display_filename;
		}
		
		public function PrepareScriptForSGMLConversion()
		{
			$desired_action = $this->desired_action;
			$display_results = $this->script->$desired_action();
			
			if(!$display_results)
			{
				return FALSE;
			}
			
			if(!$this->script->SetDocumentAttributes())
			{
				return FALSE;
			}
			
			return TRUE;
		}
		
		public function SetSourceFileLocation()
		{
			$source_file_location = '../data/sgml/' . $this->domain_object->host . '/' . $this->sgml_filename . '.html';
			
			return $this->source_file_location = $source_file_location;
		}
		
		public function SetSGMLFileLocation()
		{
			$sgml_file_location = '../data/sgml/' . $this->domain_object->host . '/' . $this->sgml_filename . '.sgml';
			
			return $this->sgml_file_location = $sgml_file_location;
		}
	}
	
?>