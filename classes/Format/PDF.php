<?php

	class PDF {
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
		
		public function __construct($args) {
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
		
		public function CanAccess() {
			return ($this->script && $this->script->IsAccessible());
		}
		
			// Construct ~ Requires
			// -----------------------------------------------
		
		public function Construct_Requires() {
			require('../app/php-html-to-pdf/php-html-to-pdf.php');
			
			require('../scripts/Format/' . $this->script_format . '/basicscript.php');
			require('../classes/Format/Formats.php');
		}
		
			// Display PDF
			// -----------------------------------------------
		
		public function Display() {
			if(!$this->PrepareScriptForPDFConversion()) {
				return FALSE;
			}
			
			$this->SetPDFFileName();
			$this->SetPDFDisplayFileName();
			
			$source_file_location = $this->SetSourceFileLocation();
			$pdf_file_location = $this->SetPDFFileLocation();
			
			$pdf_input = $this->SetHTMLForPDFConversion();
			
			if(!$pdf_input) {
				return FALSE;
			}
			
			$this->SetPDFHeadersForHTTP();
			
			$old_pdf_input = '';
			
			if(is_file($source_file_location)) {
				$old_pdf_input = file_get_contents($source_file_location);
			}
			if($_GET['forceregen'] || !is_file($pdf_file_location) || $old_pdf_input != $pdf_input) {
				$pdf_object = $this->SetPDFObject();
				
				$this->WriteHTMLToPDF();
				
				$pdf_object->Output($pdf_file_location, "F", TRUE);
						
				$file_handle_for_source = fopen($source_file_location, 'w+');
				fwrite($file_handle_for_source, $pdf_input);
				fclose($file_handle_for_source);
			}
			
			return readfile($pdf_file_location);
		}
		
		public function SetPDFHeadersForHTTP() {
			header('Content-type: application/pdf');
			header('Content-Disposition:inline;filename=' . urlencode($this->pdf_display_filename) . '.pdf');
			
			return TRUE;
		}
		
		public function WriteHTMLToPDF() {
			$pdf_input = $this->pdf_input;
			
			$this->pdf_object->WriteHTML([
				'html'=>$pdf_input,
				'language'=>$this->language->GetLanguageCode(),
			]);
			
			return TRUE;
		}
		
		public function PrepareScriptForPDFConversion() {
			$desired_action = $this->desired_action;
			$display_results = $this->script->$desired_action();
			
			if(!$display_results) {
				return FALSE;
			}
			
			return TRUE;
		}
		
		public function SetHTMLForPDFConversion() {
			$this->script->DisplayTemplates();
			
			return $this->pdf_input = html_entity_decode($this->script->html_for_pdf);
		}
		
		public function SetPDFFileName() {
			$pdf_filename = $this->script->entry['id'];
			
			if($this->desired_action == 'exportuser') {
				$pdf_filename = 'user-' . $this->script->user['id'];
			} elseif($this->script_classname == 'privacy') {
				$language_code = $this->language->GetLanguageCode();
				$pdf_filename = 'privacy-policy_' . $language_code;
			} elseif($this->script_classname == 'terms') {
				$language_code = $this->language->GetLanguageCode();
				$pdf_filename = 'terms-and-conditions_' . $language_code;
			} else {
				if($this->script->entry['textbody'])
				{
					$textbody_count = count($this->script->entry['textbody']);
					
					if($textbody_count)
					{
						$textbody_for_use = $this->script->entry['textbody'][0];
						if($textbody_for_use && $textbody_for_use['id'])
						{
							$pdf_filename .= '_' . $textbody_for_use['id'];
						}
					}
				}
			}
			
			return $this->pdf_filename = $pdf_filename;
		}
		
		public function SetPDFDisplayFileName() {
			$pdf_display_filename = '';
			
			if($this->script->entry && $this->script->entry['Code']) {
				$pdf_display_filename = $this->script->entry['Code'];
			} else {
				if($this->desired_action == 'exportuser') {
					$pdf_display_filename = 'user-export';
				} elseif($this->script_classname == 'privacy') {
					$language_code = $this->language->GetLanguageCode();
					$pdf_display_filename = 'privacy-policy_' . $language_code;
				} elseif($this->script_classname == 'terms') {
					$language_code = $this->language->GetLanguageCode();
					$pdf_display_filename = 'terms-and-conditions_' . $language_code;
				} else {
					$pdf_display_filename = 'portable-file';
				}
			}
			
			return $this->pdf_display_filename = $pdf_display_filename;
		}
		
		public function SetSourceFileLocation() {
			$source_file_location = '../data/pdf/' . $this->domain_object->host . '/' . $this->pdf_filename . '.html';
			
			return $this->source_file_location = $source_file_location;
		}
		
		public function SetPDFFileLocation() {
			$pdf_file_location = '../data/pdf/' . $this->domain_object->host . '/' . $this->pdf_filename . '.pdf';
			
			return $this->pdf_file_location = $pdf_file_location;
		}
		
		public function SetPDFObject() {
			$meta_data = $this->SetPDFObject_MetaData();
			$pdf_object = new HTMLtoPDF($meta_data);
			$this->pdf_object = $pdf_object;
			
			return $this->pdf_object = $pdf_object;
		}
		
		public function SetPDFObject_MetaData() {
			$this->script->SetDocumentAttributes();
			$pdf_data = $this->script->pdf_data;
			
			$pdf_data['Creator'] = $this->version_object->GetSoftwareName() . ', v. ' . $this->version_object->GetSoftwareVersion();
			
			return $pdf_data;
		}
	}
	
?>