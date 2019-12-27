<?php

	class OPDS
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
			$this->mimetype = new MIMEType();
			$this->format_object = new Formats();
			
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
			require('../classes/Networking/MIMEType.php');
			require('../classes/Format/Formats.php');
			require('../scripts/Format/' . $this->script_format . '/basicscript.php');
		}
		
			// Display OPDS
			// -----------------------------------------------
		
		public function Display()
		{
			if(!$this->PrepareScriptForOPDSConversion())
			{
				return FALSE;
			}
			$this->script->DisplayTemplates();
			$this->SetOPDSFileName();
			$this->SetOPDSDisplayFileName();
			
			$opds_output = $this->GenerateOPDS();
			
			$this->SetOPDSHeadersForHTTP();
			
			return print($opds_output);
		}
		
		public function GenerateOPDS()
		{
			$opds_header = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
			
			$opds_header .= '<feed xmlns="http://www.w3.org/2005/Atom"' . "\n";
			$opds_header .= '      xmlns:dc="http://purl.org/dc/terms/"' . "\n";
			$opds_header .= '      xmlns:opds="http://opds-spec.org/2010/catalog">' . "\n\n";
			
			$opds_header .= '  <id>' . $this->script->master_record['Code'] . '</id>' . "\n\n";
			
			$opds_header .= '  <title>' . $this->script->master_record['Title'] . '</title>' . "\n";
			$opds_header .= '  <updated>' . $this->script->primary_host_record['PublicReleaseDate'] . '</updated>' . "\n";
			$opds_header .= '  <author>' . "\n";
			$opds_header .= '    <name>' . $this->script->primary_host_record['Creator'] . '</name>' . "\n";
			$opds_header .= '    <uri>' . $this->domain_object->GetPrimaryDomain([insecure=>1, lowercase=>1, www=>1]) . '</uri>' . "\n";
			$opds_header .= '  </author>' . "\n";
			
			$id = $this->SetID();
			$title = $this->SetTitle();
			$author = $this->SetAuthor();
			$description = $this->SetDescription();
			
			$opds_body = '';
			$opds_body .= '  <entry>' . "\n";
			$opds_body .= '    <title>' . $title . '</title>' . "\n";
			$opds_body .= '    <id>' . $title . '</id>' . "\n";
			$opds_body .= '    <updated>' . $this->script->record_to_use['LastModificationDate'] . '</updated>' . "\n";
			$opds_body .= '    <author>' . "\n";
			$opds_body .= '      <name>' . $author . '</name>' . "\n";
			$opds_body .= '    </author>' . "\n";
			$opds_body .= '    <dc:language>en</dc:language>' . "\n";
			$opds_body .= '    <dc:issued>' . $this->script->record_to_use['OriginalCreationDate'] . '</dc:issued>' . "\n";
			$opds_body .= '    <category label="' . $this->script->subject . '">' . "\n";
			$opds_body .= '    <summary>' . $description . '</summary>' . "\n";
			
			$valid_record_fields = [
				'privacypolicy'=>TRUE,
				'termsofservice'=>TRUE,
			];
			
			$record_fields = array_keys($this->script->record_to_use);
			$record_fields_count = count($record_fields);
			
			for($i = 0; $i < $record_fields_count; $i++) {
				$record_field = $record_fields[$i];
				
				if($valid_record_fields[$record_field]) {
					$opds_body .= '    <' . $record_field . '>' . $this->script->record_to_use[$record_field] . '</' . $record_field . '>' . "\n";
				}
			}
			
			$base_url = $this->domain_object->GetPrimaryDomain([insecure=>1, lowercase=>0, www=>1]);
			$url_end_piece = preg_replace('/view\.opds$/i', '', $_SERVER['REDIRECT_URL']);
			$base_url .= $url_end_piece;
			
			$opds_body .= '    <link rel="self"' . "\n";
			$opds_body .= '          href="' . $base_url . 'view.php"' . "\n";
			$opds_body .= '          type="text/html; charset=utf-8">' . "\n";
			
			$extension_mimetypes = $this->mimetype->GetMIMETypeCodes();
			$supported_formats = $this->format_object->GetListOfSupportedFormatExtensions();
			
			foreach($supported_formats as $supported_format_name => $supported_format_extension)
			{
				if($supported_format_name != 'HTML')
				{
					$actual_extension_pieces = explode('?', $supported_format_extension);
					$actual_extension = $actual_extension_pieces[0];
					$opds_body .= '    <link rel="http://opds-spec.org/acquisition"' . "\n";
					$opds_body .= '          href="' . $base_url . 'view.' . $supported_format_extension . '"' . "\n";
					$opds_body .= '          type="' . $extension_mimetypes[$actual_extension] . '">' . "\n";
				}
			}
			
			$images = $this->script->record_to_use['image'];
			$image_count = count($images);
			
			for($i = 0; $i < $image_count; $i++)
			{
				$image = $images[$i];
				
				$image_extension_pieces = explode('.', $image['FileName']);
				$image_extension = $image_extension_pieces[(count($image_extension_pieces) - 1)];
				
				$opds_body .= '    <link rel="http://opds-spec.org/image"' . "\n";
				$opds_body .= '          href="' . $this->domain_object->GetPrimaryDomain([insecure=>1, lowercase=>0, www=>1]) . '/image/' . $image['FileName'] . '"' . "\n";
				$opds_body .= '          type="' . $extension_mimetypes[$image_extension] . '">' . "\n";
				
				$image_icon_extension_pieces = explode('.', $image['IconFileName']);
				$image_icon_extension = $image_extension_pieces[(count($image_extension_pieces) - 1)];
				
				$opds_body .= '    <link rel="http://opds-spec.org/image/thumbnail"' . "\n";
				$opds_body .= '          href="' . $this->domain_object->GetPrimaryDomain([insecure=>1, lowercase=>0, www=>1]) . '/image/' . $image['IconFileName'] . '"' . "\n";
				$opds_body .= '          type="' . $extension_mimetypes[$image_icon_extension] . '">' . "\n";
			}
			
			$opds_body .= '  </entry>' . "\n";
			
			$opds_footer = '</feed>' . "\n";
			
			$opds_document =
				$opds_header .
				$opds_body .
				$opds_footer
			;
			
			return $this->opds_output = $opds_document;
		}
		
		public function SetID()
		{
			$id = $this->domain_object->host;
			$id .= '_';
			$id .= $this->opds_filename;
			
			return $this->id = $id;
		}
		
		public function SetTitle()
		{
			$title = '';
			
			if($this->script->record_to_use['Title'])
			{
				$title = $this->script->record_to_use['Title'];
			}
			
			if($this->script->record_to_use['Subtitle'])
			{
				if($title)
				{
					$title .= ' : ';
				}
				
				$title .= $this->script->record_to_use['Subtitle'];
			}
			
			return $this->title = $title;
		}
		
		public function SetAuthor()
		{
			$author_text = '';
			if($this->script->record_to_use['textbody'])
			{
				$textbody_count = count($this->script->record_to_use['textbody']);
				if($textbody_count)
				{
					$textbody = $this->script->record_to_use['textbody'][0];
					
					if($textbody['Source'])
					{
						$author_text .= 'From : ' . $textbody['Source'] . '.';
					}
				}
			}
			
			return $this->author = $author_text;
		}
		
		public function SetDescription()
		{
			$description_text = '';
			
			if($this->script->record_to_use['description'])
			{
				$description_count = count($this->script->record_to_use['description']);
				if($description_count)
				{
					$description = $this->script->record_to_use['description'][0];
					$description_text .= $description['Description'];
				}
			}
			
			return $this->description = $description_text;
		}
		
		public function SetOPDSHeadersForHTTP()
		{
			header("Content-type: application/xml");
			header('Content-Disposition:inline;filename=' . urlencode($this->opds_display_filename) . '.opds');
		}
		
		public function SetOPDSFileName()
		{
			$opds_filename = $this->script->record_to_use['id'];
			
			if($this->script->record_to_use['textbody'])
			{
				$textbody_count = count($this->script->record_to_use['textbody']);
				
				if($textbody_count)
				{
					$textbody_for_use = $this->script->record_to_use['textbody'][0];
					if($textbody_for_use && $textbody_for_use['id'])
					{
						$opds_filename .= '_' . $textbody_for_use['id'];
					}
				}
			}
			
			return $this->opds_filename = $opds_filename;
		}
		
		public function SetOPDSDisplayFileName()
		{
			$opds_filename = $this->script->entry['id'];
			
			if($this->desired_action == 'exportuser') {
				$opds_filename = 'user-' . $this->script->user['id'];
			} elseif($this->script_classname == 'privacy') {
				$language_code = $this->language->GetLanguageCode();
				$opds_filename = 'privacy-policy_' . $language_code;
			} elseif($this->script_classname == 'terms') {
				$language_code = $this->language->GetLanguageCode();
				$opds_filename = 'terms-and-conditions_' . $language_code;
			} else {
				if($this->script->entry['textbody'])
				{
					$textbody_count = count($this->script->entry['textbody']);
					
					if($textbody_count)
					{
						$textbody_for_use = $this->script->entry['textbody'][0];
						if($textbody_for_use && $textbody_for_use['id'])
						{
							$opds_filename .= '_' . $textbody_for_use['id'];
						}
					}
				}
			}
			
			return $this->opds_display_filename = $opds_display_filename;
		}
		
		public function PrepareScriptForOPDSConversion()
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
			$source_file_location = '../data/opds/' . $this->domain_object->host . '/' . $this->opds_filename . '.html';
			
			return $this->source_file_location = $source_file_location;
		}
		
		public function SetOPDSFileLocation()
		{
			$opds_file_location = '../data/opds/' . $this->domain_object->host . '/' . $this->opds_filename . '.opds';
			
			return $this->opds_file_location = $opds_file_location;
		}
	}
	
?>