<?php

	class TEX
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
			if(!$this->PrepareScriptForTEXConversion())
			{
				return FALSE;
			}
			
			$this->SetTEXFileName();
			$this->SetTEXDisplayFileName();
			
			$source_file_location = $this->SetSourceFileLocation();
			$latex_file_location = $this->SetTEXFileLocation();
			
			$this->SetTitle();
			$this->SetAuthor();
			$this->SetDescription();
			$latex_input = $this->SetHTMLForTEXConversion();
			
			if(!$latex_input)
			{
				return FALSE;
			}
			
			$old_latex_input = '';
			
			if(is_file($source_file_location))
			{
				$old_latex_input = file_get_contents($source_file_location);
			}
			
			if(!is_file($latex_file_location) || $old_latex_input != $latex_input)
			{
				$latex_output = $this->ConvertHTMLToTEX();
				
				$file_handle_for_source = fopen($latex_file_location, 'w+');
				fwrite($file_handle_for_source, $latex_output);
				fclose($file_handle_for_source);
				
				$file_handle_for_source = fopen($source_file_location, 'w+');
				fwrite($file_handle_for_source, $latex_input);
				fclose($file_handle_for_source);
			}
			$this->SetTEXHeadersForHTTP();
			
			return readfile($latex_file_location);
		}
		
		public function ConvertHTMLToTEX()
		{
			$tex_output = $this->tex_input;
			
			$tex_output = str_replace('<h1>', '\section{', $tex_output);
			$tex_output = str_replace('</h1>', '}' . "\n", $tex_output);
			
			$tex_output = str_replace('<h2>', '\subsection{', $tex_output);
			$tex_output = str_replace('</h2>', '}' . "\n", $tex_output);
			
			$tex_output = str_replace('<blockquote>', '\begin{displayquote}' . "\n", $tex_output);
			$tex_output = str_replace('</blockquote>', "\n" . '\end{displayquote}', $tex_output);
			
			$tex_output = str_replace('<b>', '\textbf{', $tex_output);
			$tex_output = str_replace('</b>', '}', $tex_output);
			
			$tex_output = str_replace('<i>', '\textit{', $tex_output);
			$tex_output = str_replace('</i>', '}', $tex_output);
			
			$tex_output = str_replace('<u>', '\underline{', $tex_output);
			$tex_output = str_replace('</u>', '}', $tex_output);
			
			$tex_output = str_replace('<s>', 'sout{', $tex_output);
			$tex_output = str_replace('</s>', '}', $tex_output);
			
			$tex_output = html_entity_decode($tex_output);
			$tex_output = strip_tags($tex_output);
			
			$tex_document_header =
				'\documentclass{article}' . "\n\n" .
				'\usepackage{ulem}' . "\n" .
				'\usepackage{csquotes}' . "\n\n" .
				'\begin{document}' . "\n\n" .
				'\title{' . $this->title . '}' . "\n" .
				'\author{From: ' . $this->author . '}' . "\n\n" .
				'\maketitle' . "\n\n" .
				'\begin{abstract}' . "\n" .
				$this->description . "\n" .				# BT:!!!!
				'\end{abstract}' . "\n\n"
			;
			
			$tex_document_footer =
				'\end{document}';
			;
			
			$tex_document =
				$tex_document_header .
				$tex_output .
				$tex_document_footer;
			
			return $this->tex_output = $tex_document;
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
						$author_text .= 'From : ' . $textbody['Source'] . '. ';
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
					
					if($description['Source'])
					{
						$description_text .= ' (From : ' . $description['Source'] . '.)';
					}
				}
			}
			
			return $this->description = $description_text;
		}
		
		public function SetHTMLForTEXConversion()
		{
			$this->script->DisplayTemplates();
			
			return $this->tex_input = $this->script->html_for_tex;
		}
		
		public function SetTEXHeadersForHTTP()
		{
			header("Content-type: application/x-tex");
			header('Content-Disposition:inline;filename=' . urlencode($this->tex_display_filename) . '.tex');
		}
		
		public function SetTEXFileName()
		{
			$tex_filename = $this->script->record_to_use['id'];
			
			if($this->script->record_to_use['textbody'])
			{
				$textbody_count = count($this->script->record_to_use['textbody']);
				
				if($textbody_count)
				{
					$textbody_for_use = $this->script->record_to_use['textbody'][0];
					if($textbody_for_use && $textbody_for_use['id'])
					{
						$tex_filename .= '_' . $textbody_for_use['id'];
					}
				}
			}
			
			return $this->tex_filename = $tex_filename;
		}
		
		public function SetTEXDisplayFileName()
		{
			$tex_display_filename = '';
			
			if($this->script->record_to_use && $this->script->record_to_use['Code'])
			{
				$tex_display_filename = $this->script->record_to_use['Code'];
			}
			else
			{
				$tex_display_filename = 'portable-file';
			}
			
			return $this->tex_display_filename = $tex_display_filename;
		}
		
		public function PrepareScriptForTEXConversion()
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
			$source_file_location = '../data/tex/' . $this->domain_object->host . '/' . $this->tex_filename . '.html';
			
			return $this->source_file_location = $source_file_location;
		}
		
		public function SetTEXFileLocation()
		{
			$tex_file_location = '../data/tex/' . $this->domain_object->host . '/' . $this->tex_filename . '.tex';
			
			return $this->tex_file_location = $tex_file_location;
		}
	}
	
?>