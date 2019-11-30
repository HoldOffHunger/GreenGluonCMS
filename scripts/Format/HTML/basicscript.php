<?php

	class basicscript
	{
		public $html_format_data;
		public $navigation;
		
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
		public $dictionary;
		public $time;
		public $cookie;
		public $formats_object;
		public $version_object;
		public $redirect_object;
		
		public function Display()
		{
			return TRUE;
		}
		
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
			$this->google_api = $args[googleapi];
			
			$this->authentication_object = $args[authenticationobject];
			$this->cleanser_object = $args[cleanserobject];
			$this->query_object = $args[queryobject];
			$this->db_access_object = $args['dbaccessobject'];
			$this->domain_object = $args['domainobject'];
			$this->globals = $args['globals'];
			$this->language_object = $args['languageobject'];
			$this->dictionary = $args['dictionary'];
			$this->time = $args['time'];
			$this->cookie = $args['cookie'];
			$this->formats_object = $args['formatsobject'];
			$this->version_object = $args['versionobject'];
			$this->redirect_object = $args['redirectobject'];
			$this->SetScriptAttributes();
			
			$this->errors = [];
			$this->admin_errors = [];
			
			$this->mobile_friendly = $this->Param('mobilefriendly');
		}
		
		public function SetScriptAttributes()
		{
			return TRUE;
		}
		
		public function GetGoodFunctionName()
		{
			return $this->good_function_name;
		}
		
			// Security Data
		
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
		
			// Requires
			
		public function DisplayTemplates()
		{
			return $this->HandleRequires();
		}
		
		public function HTMLTitle()
		{
			if($this->entry && $this->entry['id']) {
				$template_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '_' . $this->entry['Code'] . '_title.php';
				
				if(is_file($template_location) == TRUE)
				{
					return require($template_location);
				}
			}
			
			if($this->object_parent)
			{
				$template_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '_childof_' . $this->object_parent . '_title.php';
				
				if(is_file($template_location) == TRUE)
				{
					return require($template_location);
				}
			} elseif ($this->parent)
			{
				$template_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '_childof_' . $this->parent['Code'] . '_title.php';
				
				if(is_file($template_location) == TRUE)
				{
					return require($template_location);
				}
			} elseif(count($this->object_list) == 1)
			{
				$template_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '_childof_' . $this->master_record['Code'] . '_title.php';
				
#				print($template_location);
				if(is_file($template_location) == TRUE)
				{
					return require($template_location);
				}
			}
			
			if(count($this->object_list) >= 2)
			{
				if(count($this->object_list) == 2)
				{
					$grandparent_code = $this->master_record['Code'];
				}
				else
				{
					$grandparent_code = $this->object_list[count($this->object_list) - 3];
				}
				
				$template_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '_grandchildof_' . $grandparent_code . '_title.php';
				
				if(is_file($template_location) == TRUE)
				{
					return require($template_location);
				}
			}
			
			if(count($this->object_list) >= 3)
			{
				if(count($this->object_list) == 3)
				{
					$grandparent_code = $this->master_record['Code'];
				}
				else
				{
					$grandparent_code = $this->object_list[count($this->object_list) - 3];
				}
				
				$template_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '_greatgrandchildof_' . $grandparent_code . '_title.php';
				
				if(is_file($template_location) == TRUE)
				{
					return require($template_location);
				}
			}
			$template_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '_title.php';
			
			if(is_file($template_location) == TRUE)
			{
				return require($template_location);
			}
			
			$template_location = '../templates/default/' . $this->script_file . '/' . $this->desired_action . '_title.php';
			
			if(is_file($template_location) == TRUE)
			{
				return require($template_location);
			}
			
			return print($this->html_format_data['title']);
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
				if($this->entry && $this->entry['id'] && $this->entry['Code'] != 'index') {
					$template_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '_' . $this->entry['Code'] . '.php';
					
					if(is_file($template_location) == TRUE)
					{
						return require($template_location);
					}
				}
			}
			
			if($this->object_parent)
			{
				$template_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '_childof_' . $this->object_parent . '.php';
				
				if(is_file($template_location) == TRUE)
				{
					return require($template_location);
				}
			} elseif ($this->parent)
			{
				$template_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '_childof_' . $this->parent['Code'] . '.php';
				
				if(is_file($template_location) == TRUE)
				{
					return require($template_location);
				}
			} elseif(count($this->object_list) == 1)
			{
				$template_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '_childof_' . $this->master_record['Code'] . '.php';
				
#				print($template_location);
				if(is_file($template_location) == TRUE)
				{
					return require($template_location);
				}
			}
			
			if(count($this->object_list) >= 2)
			{
				if(count($this->object_list) == 2)
				{
					$grandparent_code = $this->master_record['Code'];
				}
				else
				{
					$grandparent_code = $this->object_list[count($this->object_list) - 3];
				}
				
				$template_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '_grandchildof_' . $grandparent_code . '.php';
				
				if(is_file($template_location) == TRUE)
				{
					return require($template_location);
				}
			}
			
			if(count($this->object_list) >= 3)
			{
				if(count($this->object_list) == 3)
				{
					$grandparent_code = $this->master_record['Code'];
				}
				else
				{
					$grandparent_code = $this->object_list[count($this->object_list) - 3];
				}
				
				$template_location = '../templates/' . $this->domain_object->host . '/' . $this->script_file . '/' . $this->desired_action . '_greatgrandchildof_' . $grandparent_code . '.php';
				
				if(is_file($template_location) == TRUE)
				{
					return require($template_location);
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
		
		public function GetNonLineBreakGoodFunctionName()
		{
			return '<nobr>' . $this->GetGoodFunctionName() . ':</nobr>';
		}
		
		public function NonBreakingSpace()
		{
			return '&nbsp;';
		}
		
		public function Quote()
		{
			return '&quot;';
		}
		
		public function Bullet()
		{
			return '&bullet;';
		}
		
		public function PreFormattedStart()
		{
			return '<PRE>';
		}
		
		public function PreFormattedEnd()
		{
			return '</PRE>';
		}
		
		public function FormatNewLines($args)
		{
			$text_to_format = $args[texttoformat];
			
			$formatted_text = $text_to_format;
			
			$formatted_text = str_replace("\n", "<br>\n", $formatted_text);
			
			return $formatted_text;
		}
		
		public function FormatTabs($args)
		{
			$text_to_format = $args[texttoformat];
			
			$formatted_text = $text_to_format;
			
			$non_breaking_space = $this->NonBreakingSpace();
			$formatted_text = str_replace("\t", str_repeat($non_breaking_space, 4), $formatted_text);
			
			return $formatted_text;
		}
		
		public function HyperlinkizeText($args)
		{
			$text_to_hyperlinkize = $args['text'];
			
			$hyperlinkized_text = $text_to_hyperlinkize;
			
				// Pre-Parse Data Preseting
				// -----------------------------------------------------
			
			$number_of_letters_in_current_url = 0;
			$current_url_start_position = 0;
			$inside_url = 0;
			$inside_html = 0;
			
				// Pre-Parse Data Gathering
				// -----------------------------------------------------
			
			$hyperlinkized_text_length = strlen($hyperlinkized_text);
			
				// Parse Data
				// -----------------------------------------------------
			
			for($i_parse_text = 0; $i_parse_text < $hyperlinkized_text_length; $i_parse_text++)
			{
					// Are We Inside a URL?
					// -----------------------------------------------------
				
				if($inside_url == 1)
				{
						// Cut Up Data To Test
						// -----------------------------------------------------
						
					$current_testing_characters_1 = substr($hyperlinkized_text, $i_parse_text, 1);
					$current_testing_characters_2 = substr($hyperlinkized_text, $i_parse_text, 2);
					
						// Did We Hit the End of the Link?
						// -----------------------------------------------------
					
					if(	($current_testing_characters_1 == " ")				||
						($current_testing_characters_1 == "\n")				||
						($current_testing_characters_1 == "\r")				||
						($current_testing_characters_1 == "\s")				||
						($current_testing_characters_1 == "\t")				||
						($current_testing_characters_1 == "<")				||
						($current_testing_characters_1 == ">")				||
						($current_testing_characters_2 == ". ")				||
						($current_testing_characters_2 == ".\n")			||
						($current_testing_characters_2 == ".\r")			||
						($current_testing_characters_2 == ".\s")			||
						($current_testing_characters_2 == ".\t")			||
						($current_testing_characters_2 == ".<")				||
						(($i_parse_text + 1) == ($hyperlinkized_text_length))		)
					{
							// Did We Hit the End of the Text?
							// -----------------------------------------------------
						
						if(($i_parse_text + 1) == ($hyperlinkized_text_length))
						{
							$extra_increment = 1;
						}
						else
						{
							$extra_increment = 0;
						}
						
							// Break Out of URL Parsing
							// -----------------------------------------------------
							
						$inside_url = 0;
						
						if($number_of_letters_in_current_url > 8)
						{
								// Grab Link, Text-Before, Text-After
								// -----------------------------------------------------
							
							$url_to_hyperlinkize = substr($hyperlinkized_text, $current_url_start_position, ($i_parse_text - $current_url_start_position) + $extra_increment);
							$text_before_hyperlinkize = substr($hyperlinkized_text, 0, $current_url_start_position);
							$text_after_hyperlinkize = substr($hyperlinkized_text, $i_parse_text + $extra_increment, $hyperlinkized_text_length - $i_parse_text);
							
								// Hyperlinkize URL
								// -----------------------------------------------------
							
							$url_hyperlinkized = "<a href=\"$url_to_hyperlinkize\" target=\"_blank\">$url_to_hyperlinkize</a>";
							
								// Reconcat Data
								// -----------------------------------------------------
								
							$hyperlinkized_text = $text_before_hyperlinkize . $url_hyperlinkized . $text_after_hyperlinkize;
							$i_parse_text = $current_url_start_position + strlen($url_hyperlinkized);
							
								// Re-Determine Length of Text to Hyperlinkize
								// -----------------------------------------------------
								
							$hyperlinkized_text_length = strlen($hyperlinkized_text);
						}
					}
					else
					{
							// Increment URL Size
							// -----------------------------------------------------
						
						$number_of_letters_in_current_url++;
					}
				}
				else
				{
					if(!$inside_html)
					{
						$current_testing_characters_1 = strtolower(substr($hyperlinkized_text, $i_parse_text, 1));
						
						if($current_testing_characters_1 == '<')
						{
							$inside_html = 1;
						}
					}
					else
					{
						$current_testing_characters_1 = strtolower(substr($hyperlinkized_text, $i_parse_text, 1));
						
						if($current_testing_characters_1 == '>')
						{
							$inside_html = 0;
						}
					}
					
					if(!$inside_html)
					{
							// Cut Up Data To Test
							// -----------------------------------------------------
							
						$current_testing_characters_6 = substr($hyperlinkized_text, $i_parse_text, 6);
						$current_testing_characters_7 = strtolower(substr($hyperlinkized_text, $i_parse_text, 7));
						$current_testing_characters_8 = strtolower(substr($hyperlinkized_text, $i_parse_text, 8));
						
							// Did We Hit a Link?
							// -----------------------------------------------------
						
						if($current_testing_characters_8 == "https://")
						{
							$current_url_start_position = $i_parse_text;
							$inside_url = 1;
							$i_parse_text += 7;
							$number_of_letters_in_current_url = 8;
						}
						elseif($current_testing_characters_7 == "http://")
						{
							$current_url_start_position = $i_parse_text;
							$inside_url = 1;
							$i_parse_text += 6;
							$number_of_letters_in_current_url = 7;
						}
						elseif($current_testing_characters_6 == "ftp://")
						{
							$current_url_start_position = $i_parse_text;
							$inside_url = 1;
							$i_parse_text += 5;
							$number_of_letters_in_current_url = 6;
						}
					}
				}
			}
			
			return $hyperlinkized_text;
		}
		
			// Head Data
		
		public function GetHTMLFormatData()
		{
			if($this->html_format_data)
			{
				return $this->html_format_data;
			}
			
			$this->html_format_data = [
					// Title Tag
				'title'=>$this->GetHTMLFormatData_Title(),
				
					// Basic HTTP Equiv Tags
				'contenttype'=>$this->GetHTMLFormatData_ContentType(),
				'contentlanguage'=>$this->GetHTMLFormatData_ContentLanguage(),
				'contentscripttype'=>$this->GetHTMLFormatData_ContentScriptType(),
				'contentstyletype'=>$this->GetHTMLFormatData_ContentStyleType(),
				
					// Article Information Tags
				'description'=>$this->GetHTMLFormatData_Description(),
				'abstract'=>$this->GetHTMLFormatData_Abstract(),
				'keywords'=>$this->GetHTMLFormatData_Keywords(),
				'newskeywords'=>$this->GetHTMLFormatData_NewsKeywords(),
				'classification'=>$this->GetHTMLFormatData_Classification(),
				
					// Author Information Tags
				'author'=>$this->GetHTMLFormatData_Author(),
				'contact'=>$this->GetHTMLFormatData_Contact(),
				'replyto'=>$this->GetHTMLFormatData_ReplyTo(),
				'webauthor'=>$this->GetHTMLFormatData_WebAuthor(),
				'copyright'=>$this->GetHTMLFormatData_Copyright(),
				
					// Language Tags
				'language'=>$this->GetHTMLFormatData_Language(),
				
					// Search Engine Data Tags
				'robots'=>$this->GetHTMLFormatData_Robots(),
				'cachecontrol'=>$this->GetHTMLFormatData_CacheControl(),
				'pragma'=>$this->GetHTMLFormatData_Pragma(),
				'distribution'=>$this->GetHTMLFormatData_Distribution(),
				'revisitafter'=>$this->GetHTMLFormatData_RevisitAfter(),
				'expires'=>$this->GetHTMLFormatData_Expires(),
				'noemailcollection'=>$this->GetHTMLFormatData_NoEmailCollection(),
				'googlebot'=>$this->GetHTMLFormatData_GoogleBot(),
				'slurp'=>$this->GetHTMLFormatData_Slurp(),
				
					// Classification Tags
				'doctype'=>$this->GetHTMLFormatData_DocType(),
				'docclass'=>$this->GetHTMLFormatData_DocClass(),
				'docrights'=>$this->GetHTMLFormatData_DocRights(),
				'resourcetype'=>$this->GetHTMLFormatData_ResourceType(),
				'rating'=>$this->GetHTMLFormatData_Rating(),
				
					// Server and Technical Credits Tags
				'designer'=>$this->GetHTMLFormatData_Designer(),
				'generator'=>$this->GetHTMLFormatData_Generator(),
				'publisher'=>$this->GetHTMLFormatData_Publisher(),
				'progid'=>$this->GetHTMLFormatData_ProgID(),
				
					// Server and Technical Details Tags
				'template'=>$this->GetHTMLFormatData_Template(),
				'viewport'=>$this->GetHTMLFormatData_ViewPort(),
				
					// Dublin Core Tags
				'dctitle'=>$this->GetHTMLFormatData_DCTitle(),
				'dccreator'=>$this->GetHTMLFormatData_DCCreator(),
				'dcsubject'=>$this->GetHTMLFormatData_DCSubject(),
				'dcdescription'=>$this->GetHTMLFormatData_DCDescription(),
				'dcpublisher'=>$this->GetHTMLFormatData_DCPublisher(),
				'dccontributor'=>$this->GetHTMLFormatData_DCContributor(),
				'dcdate'=>$this->GetHTMLFormatData_DCDate(),
				'dctype'=>$this->GetHTMLFormatData_DCType(),
				'dcformat'=>$this->GetHTMLFormatData_DCFormat(),
				'dcidentifier'=>$this->GetHTMLFormatData_DCIdentifier(),
				'dcsource'=>$this->GetHTMLFormatData_DCSource(),
				'dclanguage'=>$this->GetHTMLFormatData_DCLanguage(),
				'dcrelation'=>$this->GetHTMLFormatData_DCRelation(),
				'dccoverage'=>$this->GetHTMLFormatData_DCCoverage(),
				'dcrights'=>$this->GetHTMLFormatData_DCRights(),
				
					// WebApp Information Tags
				'applicationname'=>$this->GetHTMLFormatData_ApplicationName(),
				
					// CSS Style Sheets Tags
				'cssstylesheets'=>$this->GetHTMLFormatData_CSSStyleSheets(),
				
					// Javascript Tags
				'javascript'=>$this->GetHTMLFormatData_Javascript(),
			];
			
			return $this->html_format_data;
		}
		
		public function GetHTMLFormatData_Title()
		{
			if($this->entry && $this->entry['id'])
			{
				$header_text = '';
				
				if($this->entry['Title'])
				{
					$header_text .= $this->entry['Title'];
				}
				
				if($this->entry['Subtitle'])
				{
					if(strlen($header_text) > 0)
					{
						$header_text .= ' : ';
					}
					
					$header_text .= $this->entry['Subtitle'];
				}
				
				return $this->header_title_text = $header_text;
			}
			
			if(($this->master_record) && $this->master_record['id'])
			{
				if($this->language_object->getLanguageCode() == 'en')
				{
					$header_title_text = $this->master_record['Title'];
					
					if($this->master_record['Subtitle'])
					{
						if(strlen($header_title_text) > 0)
						{
							$header_title_text .= ' : ';
						}
						
						$header_title_text .= $this->master_record['Subtitle'];
					}
				}
				else
				{
					$main_header_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesMainHeader']);
					
					if($main_header_language_translations[$this->language_object->getLanguageCode()])
					{
						$header_title_text = $main_header_language_translations[$this->language_object->getLanguageCode()];
					}
					else
					{
						$header_title_text = $this->master_record['Title'];
						
						if($this->master_record['Subtitle'])
						{
							if(strlen($header_title_text) > 0)
							{
								$header_title_text .= ' : ';
							}
							
							$header_title_text .= $this->master_record['Subtitle'];
						}
					}
				}
				return $this->header_title_text = $header_title_text;
			}
			return FALSE;
		}
		
		public function GetHTMLFormatData_ContentType()
		{
			return 'text/css/javascript/php; charset=UTF-8';
		}
		
		public function GetHTMLFormatData_ContentLanguage()
		{
			return strtoupper($this->language_object->getLanguageCode());
		}
		
		public function GetHTMLFormatData_ContentScriptType()
		{
			return 'text/php';
		}
		
		public function GetHTMLFormatData_ContentStyleType()
		{
			return 'text/css';
		}
		
			// Description
		
		public function GetHTMLFormatData_Description()
		{
			if($this->entry && $this->entry['id']) {
				if($this->entry['description'])
				{
					$descriptions = $this->entry['description'];
					$description_count = count($descriptions);
					if($description_count)
					{
						$description = $descriptions[0];
						return $description['Description'];
					}
				}
			}
			
			if($this->master_record && $this->master_record['id'])
			{
				if($this->language_object->getLanguageCode() == 'en')
				{
					$description_text = $this->master_record['description'][0]['Description'];
				}
				else
				{
					$main_description_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesMainInstructionsContent']);
					
					if($main_description_language_translations[$this->language_object->getLanguageCode()])
					{
						$description_text = $main_description_language_translations[$this->language_object->getLanguageCode()];
					}
					else
					{
						$description_text = $this->master_record['description'][0]['Description'];
					}
				}
				return $this->description_text = $description_text;
			}
			return FALSE;
		}
		
		public function GetHTMLFormatData_Abstract()
		{
			if($this->entry && $this->entry['id']) {
				if($this->entry['description'])
				{
					$descriptions = $this->entry['description'];
					$description_count = count($descriptions);
					if($description_count)
					{
						$description = $descriptions[0];
						return $description['Description'];
					}
				}
			}
			
			if($this->master_record && $this->master_record['id'])
			{
				if($this->language_object->getLanguageCode() == 'en')
				{
					$abstract_text = $this->master_record['description'][0]['Description'] . ' ' . '\'' . $this->master_record['quote'][0]['Quote'] . '\'';
				}
				else
				{
					$abstract_text = $this->description_text;
					
					$main_quote_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesMainImageQuote']);
					
					if($main_quote_language_translations[$this->language_object->getLanguageCode()])
					{
						$abstract_text .= ' ' . '\'' . $main_quote_language_translations[$this->language_object->getLanguageCode()] . '\'';
					}
					else
					{
						$abstract_text = $this->master_record['description'][0]['Description'] . ' ' . '\'' . $this->master_record['quote'][0]['Quote'] . '\'';
					}
				}
				return $this->abstract_text = $abstract_text;
			}
			
			return FALSE;
		}
		
		public function GetHTMLFormatData_Keywords()
		{
			if($this->entry && $this->entry['id'])
			{
				if($this->entry['tag'])
				{
					$tags = $this->entry['tag'];
					$tag_count = count($tags);
					if($tag_count)
					{
						$display_tags = [];
						
						for($i = 0; $i < $tag_count; $i++)
						{
							$tag = $tags[$i];
							
							$display_tags[] = $tag['Tag'];
						}
						
						return implode(', ', $display_tags);
					}
				}
			}
			
			if($this->master_record && $this->master_record['id'])
			{
				if($this->language_object->getLanguageCode() == 'en')
				{
					$keywords = [];
					
					$tags = $this->master_record['tag'];
					
					if($tags && count($tags))
					{
						foreach($tags as $tag)
						{
							$keywords[] = $tag['Tag'];
						}
						
						$keywords_text = implode(', ', $keywords);
					}
				}
				else
				{
					$main_description_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesMainKeywords']);
					
					if($main_description_language_translations[$this->language_object->getLanguageCode()])
					{
						$keywords_text = $main_description_language_translations[$this->language_object->getLanguageCode()];
					}
					else
					{
						$keywords = [];
						
						$tags = $this->master_record['tag'];
						
						if($tags && count($tags))
						{
							foreach($tags as $tag)
							{
								$keywords[] = $tag['Tag'];
							}
							
							$keywords_text = implode(', ', $keywords);
						}
					}
				}
				return $keywords_text;
			}
			
			return FALSE;
		}
		
		public function GetHTMLFormatData_NewsKeywords()
		{
			$primary_host_record = $this->primary_host_record;
			
			if($this->language_object->getLanguageCode() == 'en')
			{
				$news_keywords_text = $primary_host_record['NewsKeywords'];
			}
			else
			{
				$main_news_keyword_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesMainNewsKeywords']);
				
				if($main_news_keyword_language_translations[$this->language_object->getLanguageCode()])
				{
					$news_keywords_text = $main_news_keyword_language_translations[$this->language_object->getLanguageCode()];
				}
				else
				{
					$news_keywords_text = $primary_host_record['NewsKeywords'];
				}
			}
			
			return $news_keywords_text;
			
			return FALSE;
		}
		
		public function GetHTMLFormatData_Classification()
		{
			if(!$this->parent['id'])
			{
				$primary_host_record = $this->primary_host_record;
				
				if($this->language_object->getLanguageCode() == 'en')
				{
					$classification_text = $primary_host_record['Classification'];
				}
				else
				{
					$main_classification_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesMainClassification']);
					
					if($main_classification_language_translations[$this->language_object->getLanguageCode()])
					{
						$classification_text = $main_classification_language_translations[$this->language_object->getLanguageCode()];
					}
					else
					{
						$classification_text = $primary_host_record['Classification'];
					}
				}
				return $this->classification = $classification_text;
			}
			elseif($this->parent && $this->parent['id'])
			{
				$classification = $this->parent['Title'];
				
				if($this->parent['Subtitle'])
				{
					if($classification)
					{
						$classification .= ' : ';
					}
					
					$classification .= $this->parent['Subtitle'];
				}
				return $this->classification = $classification;
			}
			
			return FALSE;
		}
		
			// Creator
		
		public function GetHTMLFormatData_Author()
		{
			if ($this->entry && $this->entry['id'])
			{
				$textbodies = $this->entry['textbody'];
				$textbody_count = count($textbodies);
				
				if($textbody_count)
				{
					$textbody = $textbodies[0];
					if($textbody['Source'])
					{
						return 'From : ' . str_replace('"', '&quot;', $textbody['Source']);
					}
				}
			}
			
			if($this->primary_host_record)
			{
				$primary_host_record = $this->primary_host_record;
				
				return $primary_host_record['Author'];
			}
			
			
			return FALSE;
		}
		
		public function GetHTMLFormatData_Contact()
		{
			$primary_host_record = $this->primary_host_record;
			
			return $primary_host_record['Contact'];
		}
		
		public function GetHTMLFormatData_ReplyTo()
		{
			$primary_host_record = $this->primary_host_record;
			
			return $primary_host_record['Contact'];
		}
		
		public function GetHTMLFormatData_WebAuthor()
		{
			return $this->GetHTMLFormatData_Author();
		}
		
		public function GetHTMLFormatData_Copyright()
		{
			$primary_host_record = $this->primary_host_record;
			
			return $primary_host_record['Copyright'];
		}
		
			// Language
		
		public function GetHTMLFormatData_Language()
		{
			return $this->language_object->GetListOfNativeLanguageNames()[$this->language_object->getLanguageCode()];
		}
		
			// Search Engine Data
		
		public function GetHTMLFormatData_Robots()
		{
			if(!$this->IsSecure() && $this->IsAccessible()) {
				return 'index,follow';
			} else {
				return 'noindex,nofollow';
			}
		}
		
		public function GetHTMLFormatData_CacheControl()
		{
			if(!$this->IsSecure() && $this->IsAccessible()) {
				return 'public';
			} else {
				return 'no-cache';
			}
		}
		
		public function GetHTMLFormatData_Pragma()
		{
			if(!$this->IsSecure() && $this->IsAccessible()) {
				return 'option';
			} else {
				return 'no-cache';
			}
		}
		
		public function GetHTMLFormatData_Distribution()
		{
			if(!$this->IsSecure() && $this->IsAccessible()) {
				return 'global';
			} else {
				return 'iu';	# "Internal Use"
			}
		}
		
		public function GetHTMLFormatData_RevisitAfter()
		{
			if(!$this->IsSecure() && $this->IsAccessible()) {
				return '7 days';
			} else {
				return 'never';
			}
		}
		
		public function GetHTMLFormatData_Expires()
		{
			if($this->IsSecure() && $this->IsAccessible()) {
				return 'thu, 01 Jan 1970 00:00:00 GMT';
			} else {
				return '';
			}
		}
		
		public function GetHTMLFormatData_NoEmailCollection()
		{
			$primary_domain_args = array(
				'secure'=>0,
				'www'=>1,
				'lowercased'=>1,
			);
			return $this->domain_object->GetPrimaryDomain($primary_domain_args) . '/no-email-collection.php';
		}
		
		public function GetHTMLFormatData_GoogleBot()
		{
			if(!$this->IsSecure() && $this->IsAccessible()) {
				return 'index,follow';
			} else {
				return 'noindex,nofollow,nosnippet,noodp,noarchive,noimageindex,unavailable_after: 01-Jan-1970 00:00:00 EST';
			}
		}
		
		public function GetHTMLFormatData_Slurp()
		{
			if(!$this->IsSecure() && $this->IsAccessible()) {
				return 'index,follow';
			} else {
				return 'noindex,nofollow,noydir,noodp';
			}
		}
		
			// Classifications
		
		public function GetHTMLFormatData_DocType()
		{
			if(!$this->IsSecure() && $this->IsAccessible()) {
				return 'eZine';
			} else {
				return 'Admin-Only';
			}
		}
		
		public function GetHTMLFormatData_DocClass()
		{
			if(!$this->IsSecure() && $this->IsAccessible()) {
				return 'Published';
			} else {
				return 'Private';
			}
		}
		
		public function GetHTMLFormatData_DocRights()
		{
			if(!$this->IsSecure() && $this->IsAccessible()) {
				return 'Public';
			} else {
				return 'Private';
			}
		}
		
		public function GetHTMLFormatData_ResourceType()
		{
			return 'document';
		}
		
		public function GetHTMLFormatData_Rating()
		{
			if(!$this->IsSecure() && $this->IsAccessible()) {
				return 'general';
			} else {
				return 'admin';
			}
		}
		
			// Server Information and Credits
		
		public function GetHTMLFormatData_Designer()
		{
			return $this->version_object->GetSoftwareDesigner();
		}
		
		public function GetHTMLFormatData_Generator()
		{
			return $this->version_object->GetSoftwareNameAcronymAndVersion();
		}
		
		public function GetHTMLFormatData_Publisher()
		{
			return $this->version_object->GetSoftwareNameAndAcronym();
		}
		
		public function GetHTMLFormatData_ProgID()
		{
			return $this->version_object->GetSoftwareAcronymAndVersion();
		}
		
			// Template
		
		public function GetHTMLFormatData_Template()
		{
			if(!$this->parent['id'])
			{
				$primary_host_record = $this->primary_host_record;
				
				if($primary_host_record['BaseTemplate'])
				{
					return $primary_host_record['BaseTemplate'];
				}
			}
			
			return 'html-templates/base-template.html';
		}
		
		public function GetHTMLFormatData_ViewPort()
		{
			return 'width=device-width, initial-scale=1';
		}
		
			// Dublin Core Classifications
		
		public function GetHTMLFormatData_DCTitle()
		{
			if(!$this->parent['id'] && $this->master_record && $this->master_record['id'])
			{
				return $this->header_title_text;
			}
			elseif ($this->entry && $this->entry['id'])
			{
				return $this->GetHTMLFormatData_Title();
			}
			
			return FALSE;
		}
		
		public function GetHTMLFormatData_DCCreator()
		{
			if($primary_host_record['Creator'])
			{
				return $primary_host_record['Creator'];
			}
			
			return FALSE;
		}
		
		public function GetHTMLFormatData_DCSubject()
		{
			return $this->classification;
		}
		
		public function GetHTMLFormatData_DCDescription()
		{
			return $this->GetHTMLFormatData_Abstract();
		}
		
		public function GetHTMLFormatData_DCPublisher()
		{
			$primary_host_record = $this->primary_host_record;
			
			if($primary_host_record['Publisher'])
			{
				return $primary_host_record['Publisher'];
			}
		
			return FALSE;
		}
		
		public function GetHTMLFormatData_DCContributor()
		{
			$primary_host_record = $this->primary_host_record;
			
			if($primary_host_record['Contributor'])
			{
				return $primary_host_record['Contributor'];
			}
			
			return FALSE;
		}
		
		public function GetHTMLFormatData_DCDate()
		{
			if($this->entry && $this->entry['id'])
			{
				return $this->entry['OriginalCreationDate'];
			}
			
			if($primary_host_record)
			{
				$primary_host_record = $this->primary_host_record;
				
				if($primary_host_record['PublicReleaseDate'])
				{
					return $primary_host_record['PublicReleaseDate'];
				}
			}
			
			return '1970-01-01';
		}
		
		public function GetHTMLFormatData_DCType()
		{
			return 'Text';
		}
		
		public function GetHTMLFormatData_DCFormat()
		{
			return 'TXT / HTML / XHTML / CSS / PHP';
		}
		
		public function GetHTMLFormatData_DCIdentifier()
		{
			if(!$this->parent['id'] && $this->master_record && $this->master_record['id'])
			{
				return $this->master_record['Code'];
			}
			elseif($this->entry && $this->entry['id'])
			{
				return $this->entry['id'];
			}
			
			return 'Anarchist Identifier';
		}
		
		public function GetHTMLFormatData_DCSource()
		{
			$primary_domain_args = array(
				'secure'=>0,
				'www'=>1,
				'lowercased'=>1,
			);
			return $this->domain_object->GetPrimaryDomain($primary_domain_args);
		}
		
		public function GetHTMLFormatData_DCLanguage()
		{
			return $this->language_object->getLanguageCode();
		}
		
		public function GetHTMLFormatData_DCRelation()
		{
			$primary_domain_args = array(
				'secure'=>0,
				'www'=>1,
				'lowercased'=>1,
			);
			return $this->domain_object->GetPrimaryDomain($primary_domain_args);
		}
		
		public function GetHTMLFormatData_DCCoverage()
		{
			if(!$this->IsSecure()) {
				return 'eternity';
			} else {
				return 'nocoverage';
			}
		}
		
		public function GetHTMLFormatData_DCRights()
		{
			if(!$this->IsSecure()) {
				$primary_host_record = $this->primary_host_record;
				
				if($primary_host_record['Rights'])
				{
					return $primary_host_record['Rights'];
				}
				
				return 'CopyLeft';
			} else {
				return 'Admin-Only';
			}
		}
		
			// Web Application
		
		public function GetHTMLFormatData_ApplicationName()
		{
			$primary_host_record = $this->primary_host_record;
			
			if($primary_host_record['ApplicationName'])
			{
				return $primary_host_record['ApplicationName'];
			}
			
			return FALSE;
		}
		
			// CSS Style Sheets
		
		public function GetHTMLFormatData_CSSStyleSheets()
		{
			return array('css/style/sheet/location.css');
		}
		
			// JavaScript
		
		public function GetHTMLFormatData_Javascript()
		{
			return array('javascript/location.js');
		}
		
			// Header Location Extras
			// -----------------------------------------------
		
		public function HTMLHeadDisplayExtra_Start()
		{
		}
		
		public function HTMLHeadDisplayExtra_Title()
		{
		}
		
		public function HTMLHeadDisplayExtra_HTTPEquivalents()
		{
		}
		
		public function HTMLHeadDisplayExtra_ArticleInformation()
		{
		}
		
		public function HTMLHeadDisplayExtra_AuthorInformation()
		{
		}
		
		public function HTMLHeadDisplayExtra_LanguageInformation()
		{
		}
		
		public function HTMLHeadDisplayExtra_SearchEngineData()
		{
		}
		
		public function HTMLHeadDisplayExtra_Classifications()
		{
		}
		
		public function HTMLHeadDisplayExtra_ServerAndTechnicalCredits()
		{
		}
		
		public function HTMLHeadDisplayExtra_ServerAndTechnicalDetails()
		{
		}
		
		public function HTMLHeadDisplayExtra_DublinCore()
		{
		}
		
		public function HTMLHeadDisplayExtra_AlternateVersions()
		{
		}
		
		public function HTMLHeadDisplayExtra_CSS()
		{
		}
		
		public function HTMLHeadDisplayExtra_Javascript()
		{
		}
		
			// HTML Spacing
			// -----------------------------------------------
		
		public function DisplayDoubleReturns()
		{
			require('../html/basics/spacing/return.html');
			require('../html/basics/spacing/return.html');
		}
	}

?>