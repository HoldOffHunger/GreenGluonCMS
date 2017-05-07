<?php

	class RDF
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
		
			// Display RDF
			// -----------------------------------------------
		
		public function Display()
		{
			if(!$this->PrepareScriptForRDFConversion())
			{
				return FALSE;
			}
			$this->SetRDFFileName();
			$this->SetRDFDisplayFileName();
			
			$rdf_output = $this->GenerateRDF();
			
			$this->SetRDFHeadersForHTTP();
			
			return print($rdf_output);
		}
		
		public function GenerateRDF()
		{
			$rdf_header = '';
			
			$rdf_header .= '<?xml version="1.0"?>' . "\n\n";
			
			$base_url = $this->domain_object->GetPrimaryDomain([insecure=>1, lowercase=>0, www=>1]);
			$url_end_piece = preg_replace('/view\.rdf$/i', '', $_SERVER['REDIRECT_URL']);
			$base_url .= $url_end_piece;
			
			$rdf_header .= '<rdf:RDF' . "\n";
			$rdf_header .= 'xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"' . "\n";
			$rdf_header .= 'xmlns:entry="' . $base_url . 'view.php">' . "\n\n";
			
			$rdf_body = '';
			
			$rdf_body .= '<rdf:Description' . "\n";
			$rdf_body .= 'rdf:about="' . $base_url . 'view.php">' . "\n\n";
			
			$rdf_body .= '  <entry:id>' . $this->script->record_to_use['id'] . '</entry:id>' . "\n";
			$rdf_body .= '  <entry:Code>' . $this->script->record_to_use['Code'] . '</entry:Code>' . "\n";
			$rdf_body .= '  <entry:Title>' . $this->script->record_to_use['Title'] . '</entry:Title>' . "\n";
			$rdf_body .= '  <entry:Subtitle>' . $this->script->record_to_use['Subtitle'] . '</entry:Subtitle>' . "\n";
			$rdf_body .= '  <entry:ListTitle>' . $this->script->record_to_use['ListTitle'] . '</entry:ListTitle>' . "\n";
			$rdf_body .= '  <entry:OriginalCreationDate>' . $this->script->record_to_use['OriginalCreationDate'] . '</entry:OriginalCreationDate>' . "\n";
			$rdf_body .= '  <entry:LastModificationDate>' . $this->script->record_to_use['LastModificationDate'] . '</entry:LastModificationDate>' . "\n";
			
			$rdf_body .= "\n";
			
			$tag_count = count($this->script->record_to_use['tag']);
			
			if($tag_count)
			{
				$tags = $this->script->record_to_use['tag'];
				
				$rdf_body .= '  <entry:tag>' . "\n";
				$rdf_body .= '    <rdf:Bag>' . "\n";
				
				for($i = 0; $i < $tag_count; $i++)
				{
					$tag = $tags[$i];
					
					$rdf_body .= '      <rdf:li>' . "\n";
					$rdf_body .= '        <entry:tag:id>' . $tag['id'] . '</entry:tag:id>' . "\n";
					$rdf_body .= '        <entry:tag:Tag>' . $tag['Tag'] . '</entry:tag:Tag>' . "\n";
					$rdf_body .= '        <entry:tag:Language>' . $tag['Language'] . '</entry:tag:Language>' . "\n";
					$rdf_body .= '        <entry:tag:OriginalCreationDate>' . $tag['OriginalCreationDate'] . '</entry:tag:OriginalCreationDate>' . "\n";
					$rdf_body .= '        <entry:tag:LastModificationDate>' . $tag['LastModificationDate'] . '</entry:tag:LastModificationDate>' . "\n";
					$rdf_body .= '      </rdf:li>' . "\n";
				}
				
				$rdf_body .= '    </rdf:Bag>' . "\n";
				$rdf_body .= '  </entry:tag>' . "\n\n";
			}
			
			$image_count = count($this->script->record_to_use['image']);
			
			if($image_count)
			{
				$images = $this->script->record_to_use['image'];
				
				$rdf_body .= '  <entry:image>' . "\n";
				$rdf_body .= '    <rdf:bag>' . "\n";
				
				for($i = 0; $i < $image_count; $i++)
				{
					$image = $images[$i];
					
					$rdf_body .= '      <rdf:li>' . "\n";
					$rdf_body .= '        <entry:image:id>' . $image['id'] . '</entry:image:id>' . "\n";
					$rdf_body .= '        <entry:image:FileURL>' . $this->domain_object->GetPrimaryDomain([insecure=>1, lowercase=>0, www=>1]) . '/image/' . $image['FileName'] . '</entry:image:FileURL>' . "\n";
					$rdf_body .= '        <entry:image:IconFileURL>' . $this->domain_object->GetPrimaryDomain([insecure=>1, lowercase=>0, www=>1]) . '/image/' . $image['IconFileName'] . '</entry:image:IconFileURL>' . "\n";
					$rdf_body .= '        <entry:image:PixelWidth>' . $image['PixelWidth'] . '</entry:image:PixelWidth>' . "\n";
					$rdf_body .= '        <entry:image:PixelHeight>' . $image['PixelHeight'] . '</entry:image:PixelHeight>' . "\n";
					$rdf_body .= '        <entry:image:IconPixelWidth>' . $image['IconPixelWidth'] . '</entry:image:IconPixelWidth>' . "\n";
					$rdf_body .= '        <entry:image:IconPixelHeight>' . $image['IconPixelHeight'] . '</entry:image:IconPixelHeight>' . "\n";
					$rdf_body .= '        <entry:image:OriginalCreationDate>' . $image['OriginalCreationDate'] . '</entry:image:OriginalCreationDate>' . "\n";
					$rdf_body .= '        <entry:image:LastModificationDate>' . $image['LastModificationDate'] . '</entry:image:LastModificationDate>' . "\n";
					$rdf_body .= '      </rdf:li>' . "\n";
				}
				
				$rdf_body .= '    </rdf:bag>' . "\n";
				$rdf_body .= '  </entry:image>' . "\n\n";
			}
			
			$description_count = count($this->script->record_to_use['description']);
			
			if($description_count)
			{
				$descriptions = $this->script->record_to_use['description'];
				
				$rdf_body .= '  <entry:description>' . "\n";
				$rdf_body .= '    <rdf:bag>' . "\n";
				
				for($i = 0; $i < $description_count; $i++)
				{
					$description = $descriptions[$i];
					
					$rdf_body .= '      <rdf:li>' . "\n";
					$rdf_body .= '        <entry:description:id>' . $description['id'] . '</entry:description:id>' . "\n";
					$rdf_body .= '        <entry:description:Description>' . $description['Description'] . '</entry:description:Description>' . "\n";
					$rdf_body .= '        <entry:description:Source>' . $description['Source'] . '</entry:description:Source>' . "\n";
					$rdf_body .= '        <entry:description:Language>' . $description['Language'] . '</entry:description:Language>' . "\n";
					$rdf_body .= '        <entry:description:OriginalCreationDate>' . $description['OriginalCreationDate'] . '</entry:description:OriginalCreationDate>' . "\n";
					$rdf_body .= '        <entry:description:LastModificationDate>' . $description['LastModificationDate'] . '</entry:description:LastModificationDate>' . "\n";
					$rdf_body .= '      </rdf:li>' . "\n";
				}
				
				$rdf_body .= '    </rdf:bag>' . "\n";
				$rdf_body .= '  </entry:description>' . "\n\n";
			}
			
			$quote_count = count($this->script->record_to_use['quote']);
			
			if($quote_count)
			{
				$quotes = $this->script->record_to_use['quote'];
				
				$rdf_body .= '  <entry:quote>' . "\n";
				$rdf_body .= '    <rdf:bag>' . "\n";
				
				for($i = 0; $i < $quote_count; $i++)
				{
					$quote = $quotes[$i];
					
					$rdf_body .= '      <rdf:li>' . "\n";
					$rdf_body .= '        <entry:quote:id>' . $quote['id'] . '</entry:quote:id>' . "\n";
					$rdf_body .= '        <entry:quote:Quote>' . $quote['Description'] . '</entry:quote:Quote>' . "\n";
					$rdf_body .= '        <entry:quote:Source>' . $quote['Source'] . '</entry:quote:Source>' . "\n";
					$rdf_body .= '        <entry:quote:Language>' . $quote['Language'] . '</entry:quote:Language>' . "\n";
					$rdf_body .= '        <entry:quote:OriginalCreationDate>' . $quote['OriginalCreationDate'] . '</entry:quote:OriginalCreationDate>' . "\n";
					$rdf_body .= '        <entry:quote:LastModificationDate>' . $quote['LastModificationDate'] . '</entry:quote:LastModificationDate>' . "\n";
					$rdf_body .= '      </rdf:li>' . "\n";
				}
				
				$rdf_body .= '    </rdf:bag>' . "\n";
				$rdf_body .= '  </entry:quote>' . "\n\n";
			}
			
			$textbody_count = count($this->script->record_to_use['textbody']);
			
			if($textbody_count)
			{
				$textbodies = $this->script->record_to_use['textbody'];
				
				$rdf_body .= '  <entry:text>' . "\n";
				$rdf_body .= '    <rdf:bag>' . "\n";
				
				for($i = 0; $i < $textbody_count; $i++)
				{
					$textbody = $textbodies[$i];
					
					$rdf_body .= '      <rdf:li>' . "\n";
					$rdf_body .= '        <entry:text:id>' . $textbody['id'] . '</entry:text:id>' . "\n";
					$rdf_body .= '        <entry:text:Text>' . $textbody['Text'] . '</entry:text:Text>' . "\n";
					$rdf_body .= '        <entry:text:Source>' . $textbody['Source'] . '</entry:text:Source>' . "\n";
					$rdf_body .= '        <entry:text:Language>' . $textbody['Language'] . '</entry:text:Language>' . "\n";
					$rdf_body .= '        <entry:text:WordCount>' . $textbody['WordCount'] . '</entry:text:WordCount>' . "\n";
					$rdf_body .= '        <entry:text:CharacterCount>' . $textbody['CharacterCount'] . '</entry:text:CharacterCount>' . "\n";
					$rdf_body .= '        <entry:text:OriginalCreationDate>' . $textbody['OriginalCreationDate'] . '</entry:text:OriginalCreationDate>' . "\n";
					$rdf_body .= '        <entry:text:LastModificationDate>' . $textbody['LastModificationDate'] . '</entry:text:LastModificationDate>' . "\n";
					$rdf_body .= '      </rdf:li>' . "\n";
				}
				
				$rdf_body .= '    </rdf:bag>' . "\n";
				$rdf_body .= '  </entry:text>' . "\n\n";
			}
			
			$eventdate_count = count($this->script->record_to_use['eventdate']);
			
			if($eventdate_count)
			{
				$eventdates = $this->script->record_to_use['eventdate'];
				
				$rdf_body .= '  <entry:event>' . "\n";
				$rdf_body .= '    <rdf:bag>' . "\n";
				
				for($i = 0; $i < $eventdate_count; $i++)
				{
					$eventdate = $eventdates[$i];
					
					$rdf_body .= '      <rdf:li>' . "\n";
					$rdf_body .= '        <entry:event:id>' . $eventdate['id'] . '</entry:event:id>' . "\n";
					$rdf_body .= '        <entry:event:EventDateTime>' . $eventdate['EventDateTime'] . '</entry:event:EventDateTime>' . "\n";
					$rdf_body .= '        <entry:event:Title>' . $eventdate['Title'] . '</entry:event:Title>' . "\n";
					$rdf_body .= '        <entry:event:Description>' . $eventdate['Description'] . '</entry:event:Description>' . "\n";
					$rdf_body .= '        <entry:event:Language>' . $eventdate['Language'] . '</entry:event:Language>' . "\n";
					$rdf_body .= '        <entry:event:OriginalCreationDate>' . $eventdate['OriginalCreationDate'] . '</entry:event:OriginalCreationDate>' . "\n";
					$rdf_body .= '        <entry:event:LastModificationDate>' . $eventdate['LastModificationDate'] . '</entry:event:LastModificationDate>' . "\n";
					$rdf_body .= '      </rdf:li>' . "\n";
				}
				
				$rdf_body .= '    </rdf:bag>' . "\n";
				$rdf_body .= '  </entry:event>' . "\n\n";
			}
			
			$link_count = count($this->script->record_to_use['link']);
			
			if($link_count)
			{
				$links = $this->script->record_to_use['link'];
				
				$rdf_body .= '  <entry:link>' . "\n";
				$rdf_body .= '    <rdf:bag>' . "\n";
				
				for($i = 0; $i < $link_count; $i++)
				{
					$link = $links[$i];
					
					$rdf_body .= '      <rdf:li>' . "\n";
					$rdf_body .= '        <entry:link:id>' . $link['id'] . '</entry:link:id>' . "\n";
					$rdf_body .= '        <entry:link:Title>' . $link['Title'] . '</entry:link:Title>' . "\n";
					$rdf_body .= '        <entry:link:URL>' . $link['URL'] . '</entry:link:URL>' . "\n";
					$rdf_body .= '        <entry:link:Language>' . $link['URL'] . '</entry:link:Language>' . "\n";
					$rdf_body .= '        <entry:link:OriginalCreationDate>' . $link['OriginalCreationDate'] . '</entry:link:OriginalCreationDate>' . "\n";
					$rdf_body .= '        <entry:link:LastModificationDate>' . $link['LastModificationDate'] . '</entry:link:LastModificationDate>' . "\n";
					$rdf_body .= '      </rdf:li>' . "\n";
				}
				
				$rdf_body .= '    </rdf:bag>' . "\n";
				$rdf_body .= '  </entry:link>' . "\n\n";
			}
			
			$rdf_body .= '</rdf:Description>' . "\n\n";
			
			$rdf_footer = '</rdf:RDF>' . "\n";
			
			$rdf_document =
				$rdf_header .
				$rdf_body .
				$rdf_footer
			;
			
			return $this->rdf_output = $rdf_document;
		}
		
		public function SetID()
		{
			$id = $this->domain_object->host;
			$id .= '_';
			$id .= $this->rdf_filename;
			
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
		
		public function SetRDFHeadersForHTTP()
		{
			header("Content-type: application/rdf+xml");
			header('Content-Disposition:inline;filename=' . urlencode($this->rdf_display_filename) . '.rdf');
		}
		
		public function SetRDFFileName()
		{
			$rdf_filename = $this->script->record_to_use['id'];
			
			if($this->script->record_to_use['textbody'])
			{
				$textbody_count = count($this->script->record_to_use['textbody']);
				
				if($textbody_count)
				{
					$textbody_for_use = $this->script->record_to_use['textbody'][0];
					if($textbody_for_use && $textbody_for_use['id'])
					{
						$rdf_filename .= '_' . $textbody_for_use['id'];
					}
				}
			}
			
			return $this->rdf_filename = $rdf_filename;
		}
		
		public function SetRDFDisplayFileName()
		{
			$rdf_display_filename = '';
			
			if($this->script->record_to_use && $this->script->record_to_use['Code'])
			{
				$rdf_display_filename = $this->script->record_to_use['Code'];
			}
			else
			{
				$rdf_display_filename = 'portable-file';
			}
			
			return $this->rdf_display_filename = $rdf_display_filename;
		}
		
		public function PrepareScriptForRDFConversion()
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
			$source_file_location = '../data/rdf/' . $this->domain_object->host . '/' . $this->rdf_filename . '.html';
			
			return $this->source_file_location = $source_file_location;
		}
		
		public function SetRDFFileLocation()
		{
			$rdf_file_location = '../data/rdf/' . $this->domain_object->host . '/' . $this->rdf_filename . '.rdf';
			
			return $this->rdf_file_location = $rdf_file_location;
		}
	}
	
?>