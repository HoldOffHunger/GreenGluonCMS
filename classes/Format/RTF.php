<?php

	class RTF
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
		#	require('../app/rtf-generator/class_rtf.php');
			
			require('../scripts/Format/' . $this->script_format . '/basicscript.php');
		}
		
			// Display RTF
			// -----------------------------------------------
		
		public function Display()
		{
			
			if(!$this->PrepareScriptForRTFConversion())
			{
				return FALSE;
			}
			
			$this->SetRTFFileName();
			$this->SetRTFDisplayFileName();
			
			$source_file_location = $this->SetSourceFileLocation();
			$rtf_file_location = $this->SetRTFFileLocation();
			
			$rtf_input = $this->SetHTMLForRTFConversion();
			
			if(!$rtf_input)
			{
				return FALSE;
			}
			
			$old_rtf_input = '';
			
			if(is_file($source_file_location))
			{
				$old_rtf_input = file_get_contents($source_file_location);
			}
			
			if(!is_file($rtf_file_location) || $old_rtf_input != $rtf_input)
			{
				$rtf_output = $this->ConvertHTMLToRTF();
				
				$file_handle_for_source = fopen($rtf_file_location, 'w+');
				fwrite($file_handle_for_source, $rtf_output);
				fclose($file_handle_for_source);
				
				$file_handle_for_source = fopen($source_file_location, 'w+');
				fwrite($file_handle_for_source, $rtf_input);
				fclose($file_handle_for_source);
			}
			
			$this->SetRTFHeadersForHTTP();
			return readfile($rtf_file_location);
			
			/*
			
			$this->SetPDFFileName();
			$this->SetPDFDisplayFileName();
			$source_file_location = $this->SetSourceFileLocation();
			$pdf_file_location = $this->SetPDFFileLocation();
			
			if(!$pdf_input)
			{
				return FALSE;
			}
			
			
			$old_pdf_input = '';
			
			if(is_file($source_file_location))
			{
				$old_pdf_input = file_get_contents($source_file_location);
			}
			
			if(!is_file($pdf_file_location) || $old_pdf_input != $pdf_input)
			{
				$pdf_object = $this->SetPDFObject();
				
				$this->WriteHTMLToPDF();
				
				$pdf_object->Output($pdf_file_location, "F", TRUE);
						
				$file_handle_for_source = fopen($source_file_location, 'w+');
				fwrite($file_handle_for_source, $pdf_input);
				fclose($file_handle_for_source);
			}
			
			return readfile($pdf_file_location);
			*/
		}
		
		public function ConvertHTMLToRTF()
		{
				# http://www.biblioscape.com/rtf15_spec.htm
			$rtf_output = $this->rtf_input;
			
			$rtf_output = str_replace('<h1>', '\fs48 ', $rtf_output);
			$rtf_output = str_replace('</h1>', '\par ', $rtf_output);
			
			$rtf_output = str_replace('<h2>', '\fs40\par ', $rtf_output);
			$rtf_output = str_replace('</h2>', '\par ', $rtf_output);
			
			$rtf_output = str_replace('<p>', '\fs16\par ', $rtf_output);
			$rtf_output = str_replace('</p>', '\par ', $rtf_output);
			$rtf_output = str_replace('<br>', '\par ', $rtf_output);
			
			$rtf_output = str_replace('<blockquote>', '\par\fs16\li200\ri200 ', $rtf_output);
			$rtf_output = str_replace('</blockquote>', '\par\li0\ri0 ', $rtf_output);
			
			$rtf_output = str_replace('<b>', '\b ', $rtf_output);
			$rtf_output = str_replace('</b>', '\b0 ', $rtf_output);
			$rtf_output = str_replace('<strong>', '\b ', $rtf_output);
			$rtf_output = str_replace('</strong>', '\b0 ', $rtf_output);
			
			$rtf_output = str_replace('<i>', '\i ', $rtf_output);
			$rtf_output = str_replace('</i>', '\i0 ', $rtf_output);
			$rtf_output = str_replace('<em>', '\i ', $rtf_output);
			$rtf_output = str_replace('</em>', '\i0 ', $rtf_output);
			
			$rtf_output = str_replace('<u>', '\ul ', $rtf_output);
			$rtf_output = str_replace('</u>', '\ulnone ', $rtf_output);
			
			$rtf_output = str_replace('&bull;', '\bullet ', $rtf_output);
			
			$rtf_output = html_entity_decode($rtf_output);
			$rtf_output = strip_tags($rtf_output);	# URLs and anything else
			
				// decode entities
			
			$full_rtf_document =
				'{\rtf1\ansi\ansicpg1252\deff0{\fonttbl{\f0\fswiss\fprq2\fcharset0 Tahoma;}{\f1\froman\fprq2\fcharset0 Times New Roman;}}' . "\n" .
				'{\*\generator Msftedit 5.41.15.1515;}\viewkind4\uc1\pard\lang1033\f0' . "\n" .
				$rtf_output .
				'}';
			
			return $this->rtf_output = $full_rtf_document;
		}
		
		public function SetHTMLForRTFConversion()
		{
			$this->script->DisplayTemplates();
			
			return $this->rtf_input = $this->script->html_for_rtf;
		}
		
		public function SetRTFHeadersForHTTP()
		{
			header('Content-Disposition:inline;filename=' . urlencode($this->rtf_display_filename) . '.rtf');
			header("Content-type: text/richtext");
		}
		
		public function SetRTFFileName()
		{
			$rtf_filename = $this->script->entry['id'];
			
			if($this->script->entry['textbody'])
			{
				$textbody_count = count($this->script->entry['textbody']);
				
				if($textbody_count)
				{
					$textbody_for_use = $this->script->entry['textbody'][0];
					if($textbody_for_use && $textbody_for_use['id'])
					{
						$rtf_filename .= '_' . $textbody_for_use['id'];
					}
				}
			}
			
			return $this->rtf_filename = $rtf_filename;
		}
		
		public function SetRTFDisplayFileName()
		{
			$rtf_display_filename = '';
			
			if($this->script->entry && $this->script->entry['Code'])
			{
				$rtf_display_filename = $this->script->entry['Code'];
			}
			else
			{
				$rtf_display_filename = 'portable-file';
			}
			
			return $this->rtf_display_filename = $rtf_display_filename;
		}
		
		public function PrepareScriptForRTFConversion()
		{
			$desired_action = $this->desired_action;
			$display_results = $this->script->$desired_action();
			
			if(!$display_results)
			{
				return FALSE;
			}
			
			return TRUE;
		}
		
		public function SetSourceFileLocation()
		{
			$source_file_location = '../data/rtf/' . $this->domain_object->host . '/' . $this->rtf_filename . '.html';
			
			return $this->source_file_location = $source_file_location;
		}
		
		public function SetRTFFileLocation()
		{
			$rtf_file_location = '../data/rtf/' . $this->domain_object->host . '/' . $this->rtf_filename . '.rtf';
			
			return $this->rtf_file_location = $rtf_file_location;
		}
	}
	
?>