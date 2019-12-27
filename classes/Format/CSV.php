<?php

	class CSV
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
		
			// Display JSON
			// -----------------------------------------------
		
		public function Display()
		{
			if(!$this->PrepareScriptForCSVConversion())
			{
				return FALSE;
			}
			$this->script->DisplayTemplates();
			
			$this->SetCSVHeadersForHTTP();
			
			return print($this->GenerateCSV());
		}
		
		public function SetCSVHeadersForHTTP()
		{
			header('Content-type: text/csv');
			header('Content-Disposition: inline; filename=' . $this->csv_display_filename . '-' . $this->csv_filename . '.csv');
		}
		
		public function GenerateCSV()
		{
			$data = [
				[
					'RecordType',
					'Recordid',
					'FieldName',
					'FieldValue',
				],
			];
			
			foreach($this->script->record_to_use as $record_key => $record_value)
			{
				if($record_value)
				{
					if(is_array($record_value))
					{
						foreach($record_value as $child_index => $child)
						{
							foreach($child as $child_field => $child_key)
							{
								$data[] = [
									$record_key,
									$child['id'],
									$child_field,
									$child_key,
								];
							}
						}
					}
					else
					{
						$data[] = [
							'Entry',
							$this->script->record_to_use['id'],
							$record_key,
							$record_value,
						];
					}
				}
			}
			
			$escaped_data = $this->EscapeDataForCSV([data=>$data]);
			
			return $escaped_data;
		}
		
		public function EscapeDataForCSV($args)
		{
			$data = $args['data'];
			$fp = fopen('php://temp', 'w+');
			
			foreach ($data as $fields) {
				// Add row to CSV buffer
				fputcsv($fp, $fields);
			}
			rewind($fp); // Set the pointer back to the start
			$csv_contents = stream_get_contents($fp); // Fetch the contents of our CSV
			fclose($fp); // Close our pointer and free up memory and /tmp space
			return $csv_contents;
		}
		
		public function PrepareScriptForCSVConversion()
		{
			$desired_action = $this->desired_action;
			$display_results = $this->script->$desired_action();
			
			if(!$display_results)
			{
				return FALSE;
			}
			
			if(!$this->script->SetRecordToUseForMetadata())
			{
				return FALSE;
			}
			
			$this->SetCSVFileName();
			$this->SetCSVDisplayFileName();
			
			return TRUE;
		}
		
		public function SetCSVFileName()
		{
			$csv_filename = $this->script->record_to_use['id'];
			
			if($this->script->record_to_use['textbody'])
			{
				$textbody_count = count($this->script->record_to_use['textbody']);
				
				if($textbody_count)
				{
					$textbody_for_use = $this->script->record_to_use['textbody'][0];
					if($textbody_for_use && $textbody_for_use['id'])
					{
						$csv_filename .= '_' . $textbody_for_use['id'];
					}
				}
			}
			
			return $this->csv_filename = $csv_filename;
		}
		
		public function SetCSVDisplayFileName()
		{
			$csv_display_filename = '';
			
			if($this->script->entry && $this->script->entry['Code'])
			{
				$csv_display_filename = $this->script->entry['Code'];
			}
			else
			{
				$csv_display_filename = 'portable-file';
			}
			
			return $this->csv_display_filename = $csv_display_filename;
		}
	}
	
?>