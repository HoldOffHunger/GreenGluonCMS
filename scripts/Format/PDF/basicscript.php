<?php

	class basicscript
	{
		public $desired_script;
		public $desired_action;
		
		public $object_code;
		public $object_parent;
		public $object_list;
		
		public $script_location;
		public $script_name;
		public $script_file;
		public $script_extension;
		public $script_format;
		public $script_format_lower;
		public $script_args;
		
		public $authentication_object;
		public $cleanser_object;
		public $query_object;
		public $db_access_object;
		public $domain_object;
		public $language_object;
		public $time;
		public $cookie;
		public $formats_object;
		public $version_object;
		public $redirect_object;
		
		public function __construct($args)
		{
			$this->navigation = 1;
			
			$this->desired_script = $args[desiredscript];
			$this->desired_action = $args[desiredaction];
			
			$this->format_object = $args[formatobject];
			
			$this->object_code = $args[objectcode];
			$this->object_parent = $args[objectparent];
			$this->object_list = $args[objectlist];
			
			$this->script_location = $args[scriptlocation];
			$this->script_name = $args[scriptname];
			$this->script_file = $args[scriptfile];
			$this->script_extension = $args[scriptextension];
			$this->script_format = $args[scriptformat];
			$this->script_format_lower = $args[scriptformatlower];
			$this->script_args = $args[scriptargs];
			
			$this->authentication_object = $args[authenticationobject];
			$this->cleanser_object = $args[cleanserobject];
			$this->query_object = $args[queryobject];
			$this->db_access_object = $args[dbaccessobject];
			$this->domain_object = $args[domainobject];
			$this->language_object = $args[languageobject];
			$this->time = $args[time];
			$this->cookie = $args[cookie];
			$this->formats_object = $args[formatsobject];
			$this->version_object = $args[versionobject];
			$this->redirect_object = $args[redirectobject];
			
			$this->errors = [];
			$this->admin_errors = [];
		}
		
			// Security Data
			// -------------------------------------------------------
		
		public function IsSecure()
		{
			return FALSE;
		}
		
		public function IsAccessible()
		{
			return TRUE;
		}
		
		public function RequiresLogin()
		{
			return FALSE;
		}
		
		public function AdminOnly()
		{
			return FALSE;
		}
		
			// Display Info
			// -------------------------------------------------------
		
		public function SetDocumentAttributes()
		{
			$record_to_use = $this->SetRecordToUseForMetadata();
			
			$pdf_data = [];
			$pdf_data['Title'] = $this->SetMetadata_Title();
			$pdf_data['Author'] = $this->SetMetadata_Author();
			$pdf_data['Subject'] = $this->SetMetadata_Subject();
			$pdf_data['Keywords'] = $this->SetMetadata_Keywords();
			
			$this->pdf_data = $pdf_data;
			
			return TRUE;
		}
		
		public function SetRecordToUseForMetadata()
		{
			$record_to_use = false;
			
			if($this->entry)
			{
				$record_to_use = $this->entry;
			}
			elseif($this->master_record)
			{
				$record_to_use = $this->master_record;
			}
			
			return $this->record_to_use = $record_to_use;
		}
		
		public function SetMetadata_Title()
		{
			$title = '';
			$record_to_use = $this->record_to_use;
			
			if($record_to_use)
			{
				if($record_to_use['Title'])
				{
					$title .= $record_to_use['Title'];
				}
				
				if($record_to_use['Subtitle'])
				{
					if($title)
					{
						$title .= ' : ';
					}
					
					$title .= $record_to_use['Subtitle'];
				}
			}
			
			return $title;
		}
		
		public function SetMetadata_Author()
		{
			$author = '';
			$record_to_use = $this->record_to_use;
			
			if($record_to_use)
			{
				if($record_to_use['textbody'])
				{
					$textbody = $record_to_use['textbody'];
					
					$textbody_to_use = $textbody[0];
					
					$author .= 'From : ' . $textbody_to_use['Source'] . '.';
				}
			}
			
			return $author;
		}
		
		public function SetMetadata_Subject()
		{
			$subject = '';
			$record_to_use = false;
			
			$parent_code = $this->object_parent;
			
			$record_count = count($this->record_list);
			
			for($i = 0; $i < $record_count; $i++)
			{
				$record = $this->record_list[$i];
				
				if($record['Code'] == $parent_code)
				{
					$record_to_use = $record;
					$i = $record_count;
				}
			}
			
			if($record_to_use)
			{
				if($record_to_use['Title'])
				{
					$subject .= $record_to_use['Title'];
				}
				
				if($record_to_use['Subtitle'])
				{
					if($subject)
					{
						$subject .= ' : ';
					}
					
					$subject .= $record_to_use['Subtitle'];
				}
			}
			else
			{
				$primary_host_record = $this->primary_host_record;
				
				if($primary_host_record)
				{
					if($primary_host_record['Subject'])
					{
						$subject .= $primary_host_record['Subject'];
					}
					
					if($primary_host_record['Classification'])
					{
						if($subject)
						{
							$subject .= ', ';
						}
						
						$subject .= $primary_host_record['Classification'];
					}
					
					if($primary_host_record['NewsKeywords'])
					{
						if($subject)
						{
							$subject .= ', ';
						}
						
						$subject .= $primary_host_record['NewsKeywords'];
					}
				}
			}
			
			return $subject;
		}
		
		public function SetMetadata_Keywords()
		{
			$keywords = '';
			$record_to_use = $this->record_to_use;
			
			if($record_to_use)
			{
				if($record_to_use['tag'])
				{
					$tags = $record_to_use['tag'];
					$tag_count = count($tags);
					
					$tag_display = [];
					
					for($i = 0; $i < $tag_count; $i++)
					{
						$tag = $tags[$i];
						
						$tag_display[] = $tag['Tag'];
					}
					
					$keywords = implode(', ', $tag_display);
				}
			}
			
			return $keywords;
		}
		
			// Display Info
			// -------------------------------------------------------
		
		public function Display()
		{
			return TRUE;
		}
			
		public function DisplayTemplates()
		{
			return $this->HandleRequires();
		}
		
		public function HandleRequires()
		{
			if(count($this->object_list) < 1) {
				$template_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '_index.php';
				
				if(is_file($template_location) == TRUE)
				{
					return require($template_location);
				}
			}
			else
			{
				if($this->entry && $this->entry['id']) {
					$template_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '_' . $this->entry['Code'] . '.php';
					
					if(is_file($template_location) == TRUE)
					{
						return require($template_location);
					}
					
					if($this->object_parent) {
						$template_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '_childof_' . $this->object_parent . '.php';
						
						if(is_file($template_location) == TRUE)
						{
							return require($template_location);
						}
					}
					
					if(count($this->object_list) > 2)
					{
						$grandparent_code = $this->object_list[count($this->object_list) - 3];
						
						$template_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '_grandchildof_' . $grandparent_code . '.php';
						
						if(is_file($template_location) == TRUE)
						{
							return require($template_location);
						}
					}
				}
			}
			$template_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '.php';
			
			if(is_file($template_location) == TRUE)
			{
				return require($template_location);
			}
			
			$template_location = '../templates/default/' . $this->script_file . '/' . $this->desired_action . '.php';
			
			if(is_file($template_location) == TRUE)
			{
				return require($template_location);
			}
			
			return FALSE;
		}
	}

?>