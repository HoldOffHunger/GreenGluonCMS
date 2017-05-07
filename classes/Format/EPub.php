<?php

	class EPub
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
			if(!$this->PrepareScriptForEPubConversion())
			{
				return FALSE;
			}
			
			$this->SetEPubFileName();
			$this->SetEPubDisplayFileName();
		
			$source_file_location = $this->SetSourceFileLocation();
			$epub_file_location = $this->SetEPubFileLocation();
			
			$epub_input = $this->SetHTMLForEPub();
			
			if(!$epub_input)
			{
				return FALSE;
			}
		
			$old_epub_input = '';
			
			if(is_file($source_file_location))
			{
				$old_epub_input = file_get_contents($source_file_location);
			}
			
			if(!is_file($pdf_file_location) || $old_pdf_input != $pdf_input)
			{
				$epub_output = $this->ConvertHTMLToEPub();
				
				$file_handle_for_source = fopen($source_file_location, 'w+');
				fwrite($file_handle_for_source, $epub_output);
				fclose($file_handle_for_source);
			}
			
			$this->SetEPubHeadersForHTTP();
			
			return readfile($epub_file_location);
		}
		
		public function ConvertHTMLToEPub()
		{
			$epub_input = $this->epub_input;
			
			$epub_document =
				'<html>' . "\n\n" .
				'<head>' . "\n\n" .
				'<title>' . "\n\n" .
				
				'</title>' . "\n\n" .
				'</head>' . "\n\n" .
				'<body>' . "\n\n" .
				$epub_input .
				'</body>' . "\n\n" .
				'</html>';
			
			$zip_file = new ZipArchive;
			$zip_file->open($this->epub_file_location, ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE);
			$zip_file->addEmptyDir('EPUB/');
			$zip_file->addEmptyDir('EPUB/css/');
			$zip_file->addEmptyDir('META-INF/');
			$zip_file->addFromString('META-INF/container.xml', $this->SetContainerXML());
			$zip_file->addFromString('EPUB/css/view.css', $this->SetCSSFile());
			$zip_file->addFromString('EPUB/package.opf', $this->SetPackageOPF());
			$zip_file->addFromString('EPUB/' . $this->epub_filename . '.xhtml', $epub_document);
			$zip_file->addFromString('mimetype', $this->SetMimeTypeFile());
			$zip_file->close();
		}
		
		public function SetContainerXML()
		{
			return $this->container_xml =
				'<?xml version="1.0" encoding="UTF-8"?>' . "\n" .
				'<container xmlns="urn:oasis:names:tc:opendocument:xmlns:container" version="1.0">' . "\n" .
				"\t" . '<rootfiles>' . "\n" .
				"\t\t" . '<rootfile full-path="EPUB/package.opf" media-type="application/oebps-package+xml"/>' . "\n" .
				"\t" . '</rootfiles>' . "\n" .
				'</container>' . "\n";
		}
		
		public function SetPackageOPF()
		{
			$primary_host_record = $this->script->primary_host_record;
			
			$package_opf =
				'<?xml version="1.0" encoding="UTF-8"?>' . "\n\n" .
				'<package xmlns="http://www.idpf.org/2007/opf" version="3.0" unique-identifier="id">' . "\n\n" .
				"\t" . '<metadata xmlns:dc="http://purl.org/dc/elements/1.1/">' . "\n\n" .
				
				"\t\t" . '<dc:title id="title">';
			
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
			
			$package_opf .= $title;
				
			$package_opf .= '</dc:title>' . "\n" .
				"\t\t" . '<dc:creator id="creator">';
			
			if($this->script->record_to_use['textbody'])
			{
				$textbody_count = count($this->script->record_to_use['textbody']);
				if($textbody_count)
				{
					$textbody = $this->script->record_to_use['textbody'][0];
					
					if($textbody['Source'])
					{
						$package_opf .= 'From : ' . $textbody['Source'] . '. ';
					}
				}
			}
			
			$package_opf .= ' EPub file created using software made by : ' . $primary_host_record['Creator'] . '.';
			
			$package_opf .= '</dc:creator>' . "\n" .
				"\t\t" . '<dc:subject id="subject">';
			
			$subject = $primary_host_record['Subject'];
			
			if($primary_host_record['NewsKeywords'])
			{
				if($subject)
				{
					$subject .= ', ';
				}
				
				$subject .= $primary_host_record['NewsKeywords'];
			}
			
			$package_opf .= $subject;
			
			$package_opf .= '</dc:subject>' . "\n\n" .
				
			$package_opf .= "\t\t" . '<dc:description id="description">';
			
			if($this->script->record_to_use['description'])
			{
				$description_count = count($this->script->record_to_use['description']);
				if($description_count)
				{
					$description = $this->script->record_to_use['description'][0];
					
					$package_opf .= $description['Description'];
					
					if($description['Source'])
					{
						$package_opf .= ' (From : ' . $description['Source'] . '.)';
					}
				}
			}
				
			$package_opf .= '</dc:description>' . "\n" .
				"\t\t" . '<dc:publisher id="publisher">';
			
			$package_opf .= $primary_host_record['Publisher'];
			
			$package_opf .= '</dc:publisher>' . "\n" .
				"\t\t" . '<dc:contributor id="contributor">';
			
			$package_opf .= $primary_host_record['Contributor'];
			
			$package_opf .= '</dc:contributor>' . "\n" .
				"\t\t" . '<dc:date id="date">';
			
			$package_opf .= $this->script->record_to_use['OriginalCreationDate'];
			
			$package_opf .= '</dc:date>' . "\n" .
				"\t\t" . '<dc:type id="text">Text</dc:type>' . "\n" .
				"\t\t" . '<dc:format id="format">TXT / HTML / XHTML / CSS / EPUB</dc:format>' . "\n" .
				"\t\t" . '<dc:identifier id="identifier">';
			
			$package_opf .= $this->domain_object->host;
			$package_opf .= '_';
			$package_opf .= $this->epub_filename;
			
			$package_opf .= '</dc:identifier>' . "\n" .
				"\t\t" . '<dc:source id="source">';
			
			$package_opf .= $this->domain_object->GetPrimaryDomain([insecure=>1, lowercase=>1, www=>1]);
			
			$package_opf .= '/</dc:source>' . "\n" .
				"\t\t" . '<dc:language id="language">en-US</dc:language>' . "\n\n" .
				
				"\t\t" . '<dc:relation id="relation">';
			
			$package_opf .= $this->domain_object->GetPrimaryDomain([insecure=>1, lowercase=>1, www=>1]);
			
			$package_opf .= '</dc:relation>' . "\n"  .
				"\t\t" . '<dc:coverage id="coverage">eternity</dc:coverage>' . "\n" .
				"\t\t" . '<dc:rights id="rights">';
				
			$package_opf .= $primary_host_record['Rights'];
			
			$package_opf .= '</dc:rights>' . "\n\n" .
				
				"\t" . '</metadata>' . "\n\n" .
				
				"\t" . '<manifest>' . "\n\n" .
				
				"\t\t" . '<item href="css/view.css" id="css1" media-type="text/css"/>' . "\n" .
				"\t\t" . '<item href="' . $this->epub_filename . '.xhtml" id="document" media-type="application/xhtml+xml"/>' . "\n\n" .
				
				"\t" . '<spine>' . "\n\n" .
				
				"\t\t" . '<itemref idref="document"/>' . "\n\n" .
				
				"\t" . '</spine>' . "\n\n" .
				
				'</package>' . "\n";
				
			return $this->package_opf = $package_opf;
		}
		
		public function SetMimeTypeFile()
		{
			return $this->mimetype_file =
				'application/epub+zip';
		}
		
		public function SetCSSFile()
		{
			$url = $this->domain_object->GetPrimaryDomain([insecure=>1, lowercase=>1, www=>1]);
			$url .= '/css/view/display.css';
			$css = file_get_contents($url);
			
			return $this->css = $css;
		}
		
		public function SetHTMLForEPub()
		{
			$this->script->DisplayTemplates();
			
			return $this->epub_input = $this->script->html_for_epub;
		}
		
		public function SetEPubHeadersForHTTP()
		{
			header('Content-Disposition:inline;filename=' . urlencode($this->epub_display_filename) . '.epub');
			header('Content-type: application/epub+zip');
		}
		
		public function SetEPubFileName()
		{
			$epub_filename = $this->script->entry['id'];
			
			if($this->script->entry['textbody'])
			{
				$textbody_count = count($this->script->entry['textbody']);
				
				if($textbody_count)
				{
					$textbody_for_use = $this->script->entry['textbody'][0];
					if($textbody_for_use && $textbody_for_use['id'])
					{
						$epub_filename .= '_' . $textbody_for_use['id'];
					}
				}
			}
			
			return $this->epub_filename = $epub_filename;
		}
		
		public function SetEPubDisplayFileName()
		{
			$epub_display_filename = '';
			
			if($this->script->entry && $this->script->entry['Code'])
			{
				$epub_display_filename = $this->script->entry['Code'];
			}
			else
			{
				$epub_display_filename = 'portable-file';
			}
			
			return $this->epub_display_filename = $epub_display_filename;
		}
		
		public function PrepareScriptForEPubConversion()
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
			$source_file_location = '../data/epub/' . $this->domain_object->host . '/' . $this->epub_filename . '.html';
			
			return $this->source_file_location = $source_file_location;
		}
		
		public function SetEPubFileLocation()
		{
			$epub_file_location = '../data/epub/' . $this->domain_object->host . '/' . $this->epub_filename . '.epub';
			
			return $this->epub_file_location = $epub_file_location;
		}
	}
	
?>