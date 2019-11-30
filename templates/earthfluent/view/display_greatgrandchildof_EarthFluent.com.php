<?php
	
			// Format-Universal Formatting
		
		// -------------------------------------------------------------
	
	$definitions = $this->dictionary->LookupWords([words=>[$this->entry['Title']]])[strtolower($this->entry['Title'])];
	$definitions_count = count($definitions);
	
				// Child Record Counts
			
			// -------------------------------------------------------------
			
	$quiz_mode = $this->Param('quizmode');
	$previous_quizzes = (int)$this->Param('previousquizzes');
	$future_quizzes = $this->Param('futurequizzes');
	
	if($previous_quizzes < 1 || $previous_quizzes > 10)
	{
		$previous_quizzes = 0;
	}
		
				// Child Record Counts
			
			// -------------------------------------------------------------
		
	$image_count = count($this->entry['image']);
	$tag_count = count($this->entry['tag']);
	$description_count = count($this->entry['description']);
	$quote_count = count($this->entry['quote']);
	$textbody_count = count($this->entry['textbody']);
	$association_count = count($this->entry['association']);
	$eventdate_count = count($this->entry['eventdate']);
	$link_count = count($this->entry['link']);
	$children_count = count($this->children);
	
	$younger_sibling_count = count($this->younger_siblings);
	$older_sibling_count = count($this->older_siblings);
	
				// Timeframe
	
			// -------------------------------------------------------------
	
	if($this->entry['eventdate'])
	{
		$entry_event_count = count($this->entry['eventdate']);
		for($i = 0; $i < $entry_event_count; $i++)
		{
			$entry_event = $this->entry['eventdate'][$i];
			
			if($entry_event['Title'] == 'Publication')
			{
				$publication_event = $entry_event;
			}
			
			if($publication_event)
			{
				$i = $entry_event_count;
			}
		}
		if($publication_event)
		{
			if($publication_event['EventDateTime'] != '0000-00-00 00:00:00')
			{
				$event_date_pieces = explode('-', $publication_event['EventDateTime']);
				$year = $event_date_pieces[0];
				$time_frame .= $year;
			}
			else
			{
				$time_frame .= '?';
			}
		}
	}
		
				// Simple Formats
			
			// -------------------------------------------------------------
			
	if(	($this->script_format_lower == 'pdf') ||
		($this->script_format_lower == 'rtf') ||
		($this->script_format_lower == 'epub') ||
		($this->script_format_lower == 'daisy') ||
		($this->script_format_lower == 'sgml') ||
		($this->script_format_lower == 'tex') ||
		($this->script_format_lower == 'html' && $this->Param('printerfriendly')) ||
		($this->script_format_lower == 'html' && $this->Param('invertedcolors'))
	)
	{	
		$html_document = '';
		$html_document .= '<h1>';
		$html_document .= $this->entry['Title'];
		$html_document .= '</h1>';
		
		$html_document .= "\n";
		
		if($this->entry['Subtitle'])
		{
			$html_document .= '<h2>';
			$html_document .= $this->entry['Subtitle'];
			$html_document .= '</h2>';
			$html_document .= "\n";
		}
		
		if($time_frame)
		{
			$html_document .= '<p>';
			$html_document .= $time_frame;
			$html_document .= '</p>';
			$html_document .= "\n";
		}
		
		if($this->entry['association'] && $association_count)
		{
			$html_document .= '<p><b>People :</b></p>';
			$html_document .= "\n";

			$associations = $this->entry['association'];
			
			for($i = 0; $i < $association_count; $i++)
			{
				$association = $associations[$i];
				$child = $association['entry'];
				
				$html_document .= '<p>';
				$html_document .= $association['SubType'];
				$html_document .= ' : ';
				$html_document .= $child['Title'];
				$html_document .= '</p>';
			}
		}
		
		if($this->entry['description'] && $description_count)
		{
			$description = $this->entry['description'][0];
			$html_document .= '<p><b>Description :</b> ';
			$html_document .= $description['Description'];
			
			if($description['Source'])
			{
				$html_document .= ' (From : ';
				$html_document .= $description['Source'];
				$html_document .= ')';
			}
			
			$html_document .= '</p>';
			$html_document .= "\n";
		}
		
		if($this->entry['tag'] && $tag_count)
		{
			$html_document .= '<p><b>Tags :</b> ';
			
			$tags = $this->entry['tag'];
			$display_tags = [];
			
			for($i = 0; $i < $tag_count; $i++)
			{
				$tag = $tags[$i];
				
				$display_tags[] = $tag['Tag'];
			}
			
			$html_document .= implode(', ', $display_tags);
			
			$html_document .= '.</p>';
			$html_document .= "\n";
		}
		
		if($this->entry['quote'] && $quote_count)
		{
			$html_document .= '<p><b>Quotes :</b></p>';
			$html_document .= "\n";
			
			$quotes = $this->entry['quote'];
			
			for($i = 0; $i < $quote_count; $i++)
			{
				$quote = $quotes[$i];
				
				$html_document .= '<blockquote><i>"';
				$html_document .= str_replace('"', '\'', $quote['Quote']);
				$html_document .= '"</i>';
				
				if($quote['Source'])
				{
					$html_document .= ' (From : ';
					$html_document .= $quote['Source'];
					$html_document .= '.)';
				}
				
				$html_document .= '</blockquote>';
				$html_document .= "\n";
			}
		}
		
		if($this->entry['textbody'] && $textbody_count)
		{
			$html_document .= '<p><b>Text :</b></p>';
			$html_document .= "\n";
			
			$textbodies = $this->entry['textbody'];
			
			for($i = 0; $i < $textbody_count; $i++)
			{
				$textbody = $textbodies[$i];
				
				$html_document .= $textbody['Text'];
				$html_document .= "\n";
				
				if($textbody['Source'])
				{
					$html_document .= '<p>From : ';
					$html_document .= $textbody['Source'];
					$html_document .= '.</p>';
					$html_document .= "\n";
				}
			}
		}
		
		if($this->children && $children_count)
		{
			$this->SetFullChildRecords();
			$children_count = count($this->children);
			
			if($children_count)
			{
				$html_document .= '<p><b>Sections (TOC) :</b></p>';
				$html_document .= "\n";
				
				$child_display = [];
				
				foreach($this->children as $child)
				{
					$sort_key = $child['ListTitle'];
					
					if(!$sort_key)
					{
						$sort_key = $child['Title'];
					}
					
					$child_display[$sort_key] = $child;
				}
				
				
				uksort($child_display, "strnatcasecmp");
				
				foreach($child_display as $child)
				{
					$html_document .= '    <p>&bull; ' . $child['Title'];
					
					if($child['Subtitle'])
					{
						$html_document .= ' : ' . $child['Subtitle'];
					}
					
					if($child['textbody'])
					{
						$html_document .= '<br>';
						$html_document .= "\n";
						$html_document .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
						$html_document .= number_format($child['textbody'][0][WordCount]) . ' Words; ';
						$html_document .= number_format($child['textbody'][0][CharacterCount]) . ' Characters';
					}
					
					$html_document .= "</p>";
				}
				
				$html_document .= '<p><b>Sections (Content) :</b></p>';
				$html_document .= "\n";
				
				foreach($child_display as $child)
				{
					$html_document .= '<p>&bull; ' . $child['Title'] . "";
					
					if($child['Subtitle'])
					{
						$html_document .= ' : ' . $child['Subtitle'];
					}
					
					$html_document .= '</p>';
					
					$html_document .= $child['textbody'][0]['Text'];
				}
			}
		}
		
		if($this->entry['eventdate'] && $eventdate_count)
		{
			$event_dates = $this->entry['eventdate'];
			
			$html_document .= '<p><b>Chronology :</b></p>';
			$html_document .= "\n";
			
			for($i = 0; $i < $eventdate_count; $i++)
			{
				$event_date = $event_dates[$i];
				
				$date_epoch_time = strtotime($event_date['EventDateTime']);
				
				$html_document .= '<blockquote><b>';
				
				$html_document .= date("F d, Y", $date_epoch_time);
				$html_document .= ' :</b> ';
				
				$html_document .= $this->entry['Title'];
				$html_document .= ' -- ';
				$html_document .= $event_date['Title'];
				
				$html_document .= '.';
				$html_document .= '</blockquote>';
				
				$html_document .= "\n";
			}
		}
		
		if($this->entry['link'] && $link_count)
		{
			$links = $this->entry['link'];
			
			$html_document .= '<p><b>Links :</b></p>';
			$html_document .= "\n";
			
			
			for($i = 0; $i < $link_count; $i++)
			{
				$link = $links[$i];
				
				$html_document .= '<blockquote> &bull; <b>';
				$html_document .= $link['Title'];
				$html_document .= '</b>';
				$html_document .= '<br>';
				$html_document .= '<a href="';
				$html_document .= $link['URL'];
				$html_document .= '">';
				$html_document .= $link['URL'];
				$html_document .= '</a>';
				$html_document .= '</blockquote>';
				$html_document .= "\n";
			}
		}
		
		$html_document .= '<p>';
		
		if($this->script_format_lower == 'pdf')
		{
			$html_document .= 'PDF';
		}
		elseif($this->script_format_lower == 'html')
		{
			$html_document .= 'HTML';
		}
		
		$html_document .= ' file generated from : ';
		$html_document .= '</p>';
		$html_document .= "\n";
		
		$html_document .= '<blockquote><b>';
		$html_document .= $this->domain_object->GetPrimaryDomain([insecure=>1, lowercase=>0, www=>1]) . '/';
		$html_document .= '</b></blockquote>';
	}
	
			// TXT Format
		
		// -------------------------------------------------------------

	if($this->script_format_lower == 'txt')
	{
		$standard_indent = '     ';
		$standard_header_underscore = '----------------------------------';
		$text_document = $this->entry['Title'];
		
		if($this->entry['Subtitle'])
		{
			$text_document .= ' : ';
			$text_document .= "\n";
			$text_document .= $this->entry['Subtitle'];
		}
		
		$text_document .= "\n";
		$text_document .= $standard_header_underscore . $standard_header_underscore;
		
		$text_document .= "\n\n";
		
		if($time_frame)
		{
			$text_document .= $time_frame;
			$text_document .= "\n\n";
		}
		
		if($this->entry['association'] && $association_count)
		{
			$text_document .= 'People :';
			$text_document .= "\n";
			$text_document .= $standard_header_underscore;
			$text_document .= "\n\n";

			$associations = $this->entry['association'];
			
			for($i = 0; $i < $association_count; $i++)
			{
				$association = $associations[$i];
				$child = $association['entry'];
				
				$text_document .= $association['SubType'];
				$text_document .= ' : ';
				$text_document .= $child['Title'];
				$text_document .= "\n\n";
			}
		}
		
		if($this->entry['description'] && $description_count)
		{
			$description = $this->entry['description'][0];
			$text_document .= "Description :";
			$text_document .= "\n";
			$text_document .= $standard_header_underscore;
			$text_document .= "\n\n";
			
			$text_document .= $description['Description'];
			$text_document .= "\n\n";
			
			if($description['Source'])
			{
				$text_document .= $standard_indent;
				$text_document .= 'From : ';
				$text_document .= $description['Source'];
				$text_document .= "\n\n";
			}
		}
		
		if($this->entry['tag'] && $tag_count)
		{
			$text_document .= 'Tags :';
			$text_document .= "\n";
			$text_document .= $standard_header_underscore;
			$text_document .= "\n\n";
			
			$tags = $this->entry['tag'];
			$tags_to_display = [];
			
			for($i = 0; $i < $tag_count; $i++)
			{
				$tag = $tags[$i];
				$tags_to_display[] = $tag['Tag'];
			}
			
			$text_document .= implode(', ', $tags_to_display);
			
			$text_document .= '.';
			$text_document .= "\n\n";
		}
		
		if($this->entry['quote'] && $quote_count)
		{
			$text_document .= 'Quotes :';
			$text_document .= "\n";
			$text_document .= $standard_header_underscore;
			$text_document .= "\n\n";
			
			$quotes = $this->entry['quote'];
			
			for($i = 0; $i < $quote_count; $i++)
			{
				$quote = $quotes[$i];
				
				$text_document .= '"';
				$text_document .= str_replace('"', '\'', $quote['Quote']);
				$text_document .= '"';
				$text_document .= "\n\n";
				
				if($quote['Source'])
				{
					$text_document .= $standard_indent;
					$text_document .= 'From : ' . $quote['Source'];
					$text_document .= "\n\n";
				}
			}
		}
		
		if($this->entry['textbody'] && $textbody_count)
		{
			$text_document .= 'Text :';
			$text_document .= "\n";
			$text_document .= $standard_header_underscore;
			$text_document .= "\n\n";
			
			$text_body = $this->entry['textbody'][0];
			
			$text_document .= html_entity_decode(strip_tags($text_body['Text']));
			$text_document .= "\n\n";
			
			if($text_body['Source'])
			{
				$text_document .= $standard_indent;
				$text_document .= 'From : ' . $text_body['Source'];
				$text_document .= "\n\n";
			}
		}
		
		if($this->children && $children_count)
		{
			$this->SetFullChildRecords();
			$children_count = count($this->children);
			
			if($children_count)
			{
				$text_document .= 'Sections (TOC) :';
				$text_document .= "\n";
				$text_document .= $standard_header_underscore;
				$text_document .= "\n\n";
				
				$child_display = [];
				
				foreach($this->children as $child)
				{
					$sort_key = $child['ListTitle'];
					
					if(!$sort_key)
					{
						$sort_key = $child['Title'];
					}
					
					$child_display[$sort_key] = $child;
				}
				
				
				uksort($child_display, "strnatcasecmp");
				
				foreach($child_display as $child)
				{
					$text_document .= '    * ' . $child['Title'];
					
					if($child['Subtitle'])
					{
						$text_document .= ' : ' . $child['Subtitle'];
					}
					
					if($child['textbody'])
					{
						$text_document .= "\n";
						$text_document .= '        ';
						$text_document .= number_format($child['textbody'][0][WordCount]) . ' Words; ';
						$text_document .= number_format($child['textbody'][0][CharacterCount]) . ' Characters';
					}
					
					$text_document .= "\n\n";
				}
				
				$text_document .= 'Sections (Content) :';
				$text_document .= "\n";
				$text_document .= $standard_header_underscore;
				$text_document .= "\n\n";
				
				foreach($child_display as $child)
				{
					$text_document .= '* ' . $child['Title'];
					
					if($child['Subtitle'])
					{
						$text_document .= ' : ' . $child['Subtitle'];
					}
					
					$text_document .= "\n\n";
					
					$text_document .= strip_tags($child['textbody'][0]['Text']);
					
					$text_document .= "\n\n";
				}
			}
		}
		
		if($this->entry['eventdate'] && $eventdate_count)
		{
			$event_dates = $this->entry['eventdate'];
			
			$text_document .= 'Events :';
			$text_document .= "\n";
			$text_document .= $standard_header_underscore;
			
			for($i = 0; $i < $eventdate_count; $i++)
			{
				$text_document .= "\n\n";
				$text_document .= $standard_indent;
				$text_document .= $this->entry['Title'];
				$text_document .= ' -- ';
				$event_date = $event_dates[$i];
				$text_document .= $event_date['Title'];
				$text_document .= ' : ';
				$date_epoch_time = strtotime($event_date['EventDateTime']);
				$text_document .= date("F d, Y", $date_epoch_time);
			}
			
			$text_document .= "\n\n";
		}
		
		if($this->entry['link'] && $link_count)
		{
			$links = $this->entry['link'];
			
			$text_document .= 'Links :';
			$text_document .= "\n";
			$text_document .= $standard_header_underscore;
			
			for($i = 0; $i < $link_count; $i++)
			{
				$link = $links[$i];
				
				$text_document .= "\n\n";
				$text_document .= $standard_indent;
				$text_document .= $link['Title'];
				$text_document .= ' --';
				$text_document .= "\n";
				$text_document .= $link['URL'];
			}
			
			$text_document .= "\n\n";
		}
		
		$text_document .= 'About This Textfile :';
		$text_document .= "\n";
		$text_document .= $standard_header_underscore;
		$text_document .= "\n\n";
		
		$text_document .= $standard_indent;
		$text_document .= 'Text file generated from : ';
		$text_document .= "\n";
		$text_document .= $this->domain_object->GetPrimaryDomain([insecure=>1, lowercase=>0, www=>1]) . '/';
		
		if($this->Param('wrapped'))
		{
			$text_document = wordwrap($text_document, 75, "\n", FALSE);
		}
		
		print($text_document);
	}
	
			// PDF Format
		
		// -------------------------------------------------------------
			
	if ($this->script_format_lower == 'pdf')
	{
		$this->html_for_pdf = $html_document;
	}
	
			// RTF Format
		
		// -------------------------------------------------------------
			
	if ($this->script_format_lower == 'rtf')
	{
		$this->html_for_rtf = $html_document;
	}
	
			// EPub Format
		
		// -------------------------------------------------------------
			
	if ($this->script_format_lower == 'epub')
	{
		$this->html_for_epub = $html_document;
	}
	
			// DAISY Format
		
		// -------------------------------------------------------------
			
	if ($this->script_format_lower == 'daisy')
	{
		$this->html_for_daisy = $html_document;
	}
	
			// SGML Format
		
		// -------------------------------------------------------------
			
	if ($this->script_format_lower == 'sgml')
	{
		$this->html_for_sgml = $html_document;
	}
	
			// XML Format
		
		// -------------------------------------------------------------
			
	if ($this->script_format_lower == 'xml')
	{
		$this->data_for_xml = $this->SetRecordToUseForMetadata();
	}
	
			// TEX Format
		
		// -------------------------------------------------------------
			
	if ($this->script_format_lower == 'tex')
	{
		$this->html_for_tex = $html_document;
	}
	
			// Printer-Friendly HTML Format
		
		// -------------------------------------------------------------

	if($this->script_format_lower == 'html' && $this->Param('printerfriendly'))
	{
		print('<div class="font-family-arial">');
		
		print($html_document);
		
		print('</div>');
	}
	
			// Inverted-Colors HTML Format
		
		// -------------------------------------------------------------

	elseif($this->script_format_lower == 'html' && $this->Param('invertedcolors'))
	{
		print('<div class="font-family-arial">');
		
		print($html_document);
		
		print('</div>');
	}
	
			// HTML Format
		
		// -------------------------------------------------------------
			
	elseif ($this->script_format_lower == 'html')
	{
				// Standard Requires
			
			// -------------------------------------------------------------
	
		require('../modules/spacing.php');
		
		require('../modules/html/text.php');
		$text = new module_text;
		
		require('../modules/html/form.php');
		$form = new module_form;
		
		require('../modules/html/divider.php');
		$divider = new module_divider;
		
		require('../modules/html/table.php');
		$table = new module_table;
		
		require('../modules/html/list/generic.php');
		$generic_list = new module_genericlist;
		
		require('../modules/html/header.php');
		$header = new module_header;
		
		require('../modules/html/navigation.php');
		$navigation_args = [
			'globals'=>$this->globals,
			'languageobject'=>$this->language_object,
			'divider'=>$divider,
			'domainobject'=>$this->domain_object,
		];
		$navigation = new module_navigation($navigation_args);
		
				// Share Package
			
			// -------------------------------------------------------------
		
		require('../modules/html/socialmediasharelinks.php');
		$social_media_share_links_args = [
			'globals'=>$this->globals,
			'textonly'=>$this->mobile_friendly,
			'languageobject'=>$this->language_object,
			'divider'=>$divider,
			'domainobject'=>$this->domain_object,
			'socialmedia'=>$this->social_media,
			'sharewithtext'=>$this->share_with_text,
			'socialmediasharelinkargs'=>[
				url=>$this->domain_object->GetPrimaryDomain([insecure=>1, lowercase=>1, www=>1]) . '/?id=' . $this->entry['assignment'][0]['id'],
				title=>$this->header_title_text,
				desc=>$instructions_content_text,
				provider=>$this->domain_object->primary_domain_lowercased,
			],
		];
		$social_media_share_links = new module_socialmediasharelinks($social_media_share_links_args);
		
				// Display Header
			
			// -------------------------------------------------------------
		
		$primary_image = false;
		
	#	print_r($this->parent['image']);
	
		if(!$this->entry['image'] && !count($this->entry['image']))
		{
			$this->entry['image'] = $this->parent['image'];
		}
		
		if(!$this->mobile_friendly)
		{
			$width_attribute = '';
			$vertical_attribute = '';
			
			if($this->entry)
			{
				$image_count = count($this->entry['image']);
				
				if($image_count)
				{
					$primary_image = implode('/', str_split($this->entry['image'][0]['FileDirectory'])) . '/' . $this->entry['image'][0]['IconFileName'];
					$primary_image_text = $this->entry['image'][0]['Title'];
					$width_attribute = ' width-200px height-200px';
					$vertical_attribute = ' vertical-specialcenter';
				}
			}
			
			if(!$primary_image)
			{
				$primary_image = $this->primary_host_record['PrimaryImageLeft'];
				$primary_image_text = $this->primary_host_record['Classification'];
			}
			
					// Mouseover Values
				
				// -------------------------------------------------------------
			
			$div_mouseover = '';
			
			if($this->entry['quote'] && $this->entry['quote'][0])
			{
				$random_quote = $this->entry['quote'][array_rand($this->entry['quote'], 1)];
				
				$div_mouseover = '&quot;' . str_replace('"', '\'', $random_quote['Quote']) . '&quot;';
				
				if($random_quote['Source'])
				{
					$div_mouseover .= ' -- ' . str_replace('"', '\'', $random_quote['Source']);
				}
			}
			
			if(!$div_mouseover)
			{
				if($this->primary_host_record['Subject'])
				{
					$div_mouseover = str_replace('"', '\'', $this->primary_host_record['Subject']);
				}
			}
		}
		
		$header_style = '';
		$float_right = '';
		
		if($image_count > 1)
		{
			$header_style = 'background-image:url(\'';
			$random_image = rand(1, $image_count -1);
			
			$header_style .= $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]);
			$header_style .= '/image/';
			$header_style .= implode('/', str_split($this->entry['image'][$random_image]['FileDirectory']));
			$header_style .= '/';
			$header_style .= $this->entry['image'][$random_image]['FileName'];
			$header_style .= '\');';
			
			$float_right = $this->entry['image'][$random_image]['Description'];
		}
		
		$this->entry['Title'] = ucwords($this->entry['Title']);
		
		$header_primary_args = [
			'title'=>'How do I Say and Write <br>&quot;' . $this->entry['Title'] . '&quot; in ' . $this->record_list[0]['Title'] . '?',
			'image'=>$primary_image,
			'rightimage'=>$primary_image,
			'divmouseover'=>$div_mouseover,
			'imagemouseover'=>$primary_image_text,
			'level'=>1,
			'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-gray13 active-background-image',
			'textclass'=>'margin-0px horizontal-center vertical-center padding-top-22px margin-bottom-22px',
			'imagedivclass'=>'border-2px margin-5px background-color-gray10' . $width_attribute,
			'imageclass'=>$vertical_attribute,
			'domainobject'=>$this->domain_object,
			'leftimageenable'=>1,
			'style'=>$header_style,
			'floatright'=>$float_right,
			'headerstyle'=>'display: inline-block;margin-top:20px;',
		#	'rightimageenable'=>1,
		];
		
		$header->display($header_primary_args);
		
				// Basic Divider Arguments
			
			// -------------------------------------------------------------
		
		$divider_one_third_start_args = [
			'class'=>'width-33percent float-left',
		];
		
		$divider_case_start_args = [
			'class'=>'width-100percent height-400px overflow-auto',
		];
		
		$divider_frame_start_args = [
			'class'=>'width-100percent border-2px',
		];
		
		$divider_padding_start_args = [
			'class'=>'margin-5px padding-5px',
		];
		
		$divider_end_args = [
			'indentlevel'=>1,
		];
		
				// Admin Controls
			
			// -------------------------------------------------------------
		
		if($this->authentication_object->user_session['UserAdmin.id'])
		{
			print('<div class="horizontal-center width-95percent margin-top-5px border-2px">');
					// "Controls" Header
				
				// -------------------------------------------------------------
				
			print('<center>');
			print('<div class="horizontal-center width-95percent">');
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<h2 class="horizontal-left margin-5px font-family-arial">');
			print('Controls for Entry ' . $this->entry['id']);
			print('</h2>');
			print('</div>');
			print('</div>');
			print('</center>');
			
					// Finish Admin Controls
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// "Add" / "Edit" Option
				
				// -------------------------------------------------------------
			
			print('<div class="horizontal-center width-95percent margin-top-5px">');
			
			print('<div class="float-left margin-5px border-2px background-color-gray13">');
			print('<p class="font-family-arial margin-5px">');
			print('<a href="modify.php?action=Edit">EDIT</a>');
			print('</p>');
			print('</div>');
			
			print('<div class="float-left margin-5px border-2px background-color-gray13">');
			print('<p class="font-family-arial margin-5px">');
			print('<a href="modify.php?action=Add">ADD CHILD</a>');
			print('</p>');
			print('</div>');
			
			print('</div>');
			
					// Finish Admin Controls
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
			print('</div>');
		}
		
				// Breadcrumb Trails
			
			// -------------------------------------------------------------
		
		print('<div class="horizontal-center width-95percent margin-top-5px">');
		print('<div class="float-left border-2px background-color-gray13">');
		print('<p class="font-family-arial margin-5px">');
		
		if($this->master_record)
		{
			$record_list_count = count($this->record_list);
			if($record_list_count)
			{
				print('<a href="' . $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '">');
			}
			print($this->master_record['Title']);
			
			if($record_list_count)
			{
				print('</a>');
			}
			
			$link_list = '';
			
			for($i = 0; $i < $record_list_count; $i++)
			{
				$record = $this->record_list[$i];
				if($record['id'] != $this->entry['id'])
				{
					print(' &gt;&gt; ');
					
					$link_list .= '/' . $record['Code'];
					
					print('<a href="' . $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . $link_list . '/view.php');
					
					if($i == 0)
					{
						print('?action=index');
					}
					
					print('">');
					
					print($record['Title']);
					
					print('</a>');
				}
			}
			
			print(' &gt;&gt; ');
			
			if($quiz_mode)
			{
				print('<a href="view.php">');
			}
			
			if($this->entry['Title'])
			{
				print(ucwords($this->entry['Title']));
			}
			elseif($this->entry['ListTitle'])
			{
				print($this->entry['ListTitle']);
			}
			
			if($this->entry['Subtitle'])
			{
				print(' : ' . $this->entry['Subtitle']);
			}
			
			if($quiz_mode)
			{
				print('</a>');
				print(' &gt;&gt; ');
				print(' Quiz Mode');
				
				if($previous_quizzes && $future_quizzes)
				{
					print(' (with Past and Future Quizzes)');
				}
				elseif($previous_quizzes)
				{
					print(' (with Past Quizzes)');
				}
				elseif($previous_quizzes)
				{
					print(' (with Future Quizzes)');
				}
			}
		}
		print('</p>');
		print('</div>');
		print('</div>');
		
				// Finish Breadcrumb Trails
			
			// -------------------------------------------------------------
								
		$clear_float_divider_start_args = [
			'class'=>'clear-float',
			'indentlevel'=>5,
		];
		
		$divider->displaystart($clear_float_divider_start_args);
		
		$clear_float_divider_end_args = [
			'indentlevel'=>5,
		];
		
		$divider->displayend($clear_float_divider_end_args);
		
				// View Navigation
			
			// -------------------------------------------------------------
		
		print('<div class="border-2px background-color-gray15 margin-5px float-left">');
		
		print('<ul type="1" class="margin-5px font-family-arial">');
		
		if($this->entry['association'] && $association_count)
		{
			print('<li><a href="#association">People</a></li>');
		}
		
		if($this->entry['description'] && $description_count && !$quiz_mode)
		{
			print('<li><a href="#description">What You\'ll Be Able To Learn</a></li>');
		}
		
		if($this->entry['quote'] && $quote_count)
		{
			print('<li><a href="#quote">Soon You\'ll Know How to Say This</a></li>');
		}
		
		if($this->entry['textbody'] && $textbody_count)
		{
			print('<li><a href="#textbody">Lesson Instructions</a></li>');
		}
		
		print('<li><a href="#say">How do I Say &quot;' . $this->entry['Title'] . '&quot; in ' . $this->record_list[0]['Title'] . '?</a></li>');
		print('<li><a href="#write">How do I Write &quot;' . $this->entry['Title'] . '&quot; in ' . $this->record_list[0]['Title'] . '?</a></li>');
		print('<li><a href="#pronunciation">How do I Pronounce &quot;' . $this->entry['entrytranslation'][0]['Title'] . '&quot; in ' . $this->record_list[0]['Title'] . '?</a></li>');
		
		if($definitions_count)
		{
			print('<li><a href="#definition">Definitions</a></li>');
		}
		
		print('<li><a href="#googlecse">Images</a></li>');
		print('<li><a href="#lesson">Lesson</a></li>');
		print('<li><a href="#quiz">Quiz</a></li>');
		
		if($younger_sibling_count || $older_sibling_count)
		{
			print('<li><a href="#siblings">Learning Navigation</a></li>');
		}
		
		if($this->entry['eventdate'] && $eventdate_count)
		{
			print('<li><a href="#eventdate">Chronology</a></li>');
		}
		
		print('<li><a href="#share">Share</a></li>');
		
		if($this->entry['link'] && $link_count)
		{
			print('<li><a href="#link">Links</a></li>');
		}
		
		if(!$quiz_mode)
		{
			print('<li><a href="#comments">Comments</a></li>');
		}
		
		print('</ul>');
		
		print('</div>');
		
				// View Times
			
			// -------------------------------------------------------------
		
		if($time_frame)
		{
			$header_secondary_args = [
				'title'=>$time_frame,
				'divmouseover'=>'This is the date of publication or authorship.',
				'level'=>2,
				'divclass'=>'border-2px background-color-gray13 margin-5px float-right',
				'textclass'=>'padding-0px margin-5px horizontal-left font-family-tahoma',
				'imagedivclass'=>'border-2px margin-5px background-color-gray10',
				'imageclass'=>'border-1px',
				'domainobject'=>$this->domain_object,
				'leftimageenable'=>0,
				'rightimageenable'=>0,
			];
			$header->display($header_secondary_args);
		}
		
				// Finish Date and Images
			
			// -------------------------------------------------------------
								
		$clear_float_divider_start_args = [
			'class'=>'clear-float',
			'indentlevel'=>5,
		];
		
		$divider->displaystart($clear_float_divider_start_args);
		
		$clear_float_divider_end_args = [
			'indentlevel'=>5,
		];
		
		$divider->displayend($clear_float_divider_end_args);
		
				// Display Textbody
			
			// -------------------------------------------------------------
		
		if($this->entry['association'] && $association_count)
		{
					// Association Header
				
				// -------------------------------------------------------------
				
			print('<a name="association"></a>');
			
			print('<center>');
			print('<div class="horizontal-center width-95percent">');
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<h2 class="horizontal-left margin-5px font-family-arial">');
			print('People');
			print('</h2>');
			print('</div>');
			print('</div>');
			print('</center>');
			
					// Finish Textbody Header
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// Author Info
				
				// -------------------------------------------------------------
			
			#print("<PRE>");
			#print_r($this->entry['association']);
			#print("</PRE>");
			
			$associations = $this->entry['association'];
			
			for($i = 0; $i < $association_count; $i++)
			{
				$association = $associations[$i];
				
				$child = $association['entry'];
				
				print('<div class="horizontal-center width-90percent">');
			
				print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
				
				unset($display_image);
				
				if($child['image'])
				{
					$child_images = $child['image'];
					$child_image_count = count($child_images);
					if($child_image_count)
					{
						shuffle($child_images);
						$child_image = $child_images[0];
						$display_image = $child_image;
					}
				}
				
				if(!$display_image)
				{
					$display_image = [
						IconFileName=>$this->primary_host_record['PrimaryImageLeft'],
						IconPixelWidth=>200,
						IconPixelHeight=>200,
					];
				}
				
				print('<div class="border-2px background-color-gray15 margin-5px float-left">');
				print('<div class="border-2px background-color-gray15 margin-5px float-left">');
				print('<div class="height-100px width-100px background-color-gray0">');
				print('<div class="vertical-specialcenter">');
				print('<a href="../../people/' . $child['Code'] . '/view.php">');
				print('<img width="');
				print(ceil($display_image['IconPixelWidth'] / 2));
				print('" height="');
				print(ceil($display_image['IconPixelHeight'] / 2));
				print('" src="');
				print($this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]));
				print('/image/');
				print(implode('/', str_split($display_image['FileDirectory'])));
				print('/');
				print($display_image['IconFileName']);
				print('">');
				print('</a>');
				print('</div>');
				print('</div>');
				print('</div>');
				print('</div>');
				
				$popup_title = 0;
				$mouseover_title = '';
				$title_max = 30;
				
				$first_child_title = $association['SubType'];
				
				if(strlen($first_child_title) > $title_max)
				{
					$mouseover_title = $first_child_title;
					$first_child_title = substr($first_child_title, 0, $title_max) . '...';
					$popup_title = 1;
				}
				
				$second_child_title = $child['Title'];
				
				if(strlen($second_child_title) > $title_max)
				{
					if($mouseover_title)
					{
						$mouseover_title .= ' : ';
					}
					
					$mouseover_title .= $second_child_title;
					$second_child_title = substr($second_child_title, 0, $title_max) . '...';
					$popup_title = 1;
				}
				
				$child_title = '<a href="../../people/' . $child['Code'] . '/view.php"';
				
				if($popup_title)
				{
					$child_title .= ' title="' . str_replace('"', '&quot;', $mouseover_title) . '"';
				}
				
				$child_title .= '>';
				
				$child_title .= $first_child_title;
				
				$child_title .= ' : ';
				$child_title .= $second_child_title;
				$child_title .= '</a>';
				
				$div_mouseover = '';
				
				if($child['textbody'])
				{
					$text_bodies = $child['textbody'];
					
					$text_body_count = count($text_bodies);
					if($text_body_count)
					{
						$first_textbody = $text_bodies[0];
						
						$div_mouseover .= number_format($first_textbody['WordCount']) . ' Words / ' . number_format($first_textbody['CharacterCount']) . ' Characters';
					}
				}
				
				$header_secondary_args = [
					'title'=>$child_title,
					'divmouseover'=>$div_mouseover,
					'level'=>3,
					'divclass'=>'border-2px background-color-gray15 margin-5px float-left',
					'textclass'=>'padding-0px margin-5px horizontal-left font-family-tahoma',
					'imagedivclass'=>'border-2px margin-5px background-color-gray10',
					'imageclass'=>'border-1px',
					'domainobject'=>$this->domain_object,
					'leftimageenable'=>0,
					'rightimageenable'=>0,
				];
				$header->display($header_secondary_args);
				
				print('<p class="horizontal-left margin-5px font-family-arial">');
				
				$time_frame = '';
				
				if($child['eventdate'])
				{
					$child_event_count = count($child['eventdate']);
					for($j = 0; $j < $child_event_count; $j++)
					{
						$child_event = $child['eventdate'][$j];
						
						if($child_event['Title'] == 'Birth Day')
						{
							$birth_event = $child_event;
						}
						elseif($child_event['Title'] == 'Death Day')
						{
							$death_event = $child_event;
						}
						
						if($birth_event && $death_event)
						{
							$j = $child_event_count;
						}
					}
					
					if($birth_event || $death_event)
					{
						$time_frame .= ' (';
						
						if($birth_event && $birth_event['id'])
						{
							if($birth_event['EventDateTime'] != '0000-00-00 00:00:00')
							{
								$birth_event_date_pieces = explode('-', $birth_event['EventDateTime']);
								$birth_year = $birth_event_date_pieces[0];
								$time_frame .= $birth_year;
							}
							else
							{
								$time_frame .= '?';
							}
						}
						
						$time_frame .= ' - ';
						
						if($death_event && $death_event['id'])
						{
							if($death_event['EventDateTime'] != '0000-00-00 00:00:00')
							{
								$death_event_date_pieces = explode('-', $death_event['EventDateTime']);
								$death_year = $death_event_date_pieces[0];
								$time_frame .= $death_year;
							}
							else
							{
								$time_frame .= '?';
							}
						}
						
						$time_frame .= ') ';
						
						unset($birth_event);
						unset($death_event);
					}
				}
				
				if($time_frame)
				{
					print($time_frame);
				}
				
				if($child['Subtitle'])
				{
					if($time_frame)
					{
						print(' ~ ');
					}
					
					print('<strong>');
					print($child['Subtitle']);
					print('</strong>');
				}
				
				if($child['description'])
				{
					$description = $child['description'][0];
					
					if($description && $description['Description'])
					{
						print('<em>');
						if($time_frame || $child['Subtitle'])
						{
							print(' : ');
						}
						
						print($description['Description']);
						print(' ');
						print('</em>');
						
						if($description['Source'])
						{
							$source = $description['Source'];
							
							if(strlen($source) > 50)
							{
								$source = substr($source, 0, 50) . '...';
							}
							
							print(' (From : ' . $source . '.)');
						}
					}
				}
				
				if($child['quote'])
				{
					$child_quotes = $child['quote'];
					$child_quotes_count = count($child_quotes);
					$max_limit = $child_quotes_count;
					if($max_limit > 3)
					{
						$max_limit = 3;
					}
					shuffle($child_quotes);
					for($j = 0; $j < $max_limit; $j++)
					{
						$quote = $child_quotes[$j];
						if($quote && $quote['Quote'])
						{
							print(' <br>&bull; ');
							print('"');
							print(str_replace('"', '\'', $quote['Quote']));
							print('"');
							
							if($quote['Source'])
							{
								$source = $quote['Source'];
								
								if(strlen($source) > 50)
								{
									$source = substr($source, 0, 50) . '...';
								}
								
								print(' (From : ' . $source . '.)');
							}
						}
					}
				}
				else
				{
					if($child['textbody'])
					{
						$text_bodies = $child['textbody'];
						
						$text_body_count = count($text_bodies);
						if($text_body_count)
						{
							$text_display = $text_bodies[0]['FirstThousandCharacters'];
							
							$text_display = strip_tags($text_display);
							
							if(strlen($text_display) > 750)
							{
								$text_display = substr($text_display, 0, 750) . '...';
							}
							
							if($text_display)
							{
								print('<br>');
								print($text_display);
								
								if($text_bodies[0]['Source'])
								{
									$source = $text_bodies[0]['Source'];
									
									if(strlen($source) > 50)
									{
										$source = substr($source, 0, 50) . '...';
									}
									
									print(' (From : ' . $source . '.)');
								}
							}
						}
					}
				}
				
				print('</p>');
				
						// Finish Float
					
					// -------------------------------------------------------------
										
				$clear_float_divider_start_args = [
					'class'=>'clear-float',
					'indentlevel'=>5,
				];
				
				$divider->displaystart($clear_float_divider_start_args);
				
				$clear_float_divider_end_args = [
					'indentlevel'=>5,
				];
				
				$divider->displayend($clear_float_divider_end_args);
				
						// Tags
					
					// -------------------------------------------------------------
				
				if($child['tag'])
				{
					$person_tag_count = count($child['tag']);
					
					if($person_tag_count)
					{
						$tags = $child['tag'];
						$max_limit = $person_tag_count;
						if($max_limit > 10)
						{
							$max_limit = 10;
						}
						shuffle($tags);
						
						for($j = 0; $j < $max_limit; $j++)
						{
							$tag = $tags[$j];
							print('<div class="border-2px background-color-gray15 margin-left-5px margin-bottom-5px float-left">');
							print('<span class="horizontal-left margin-5px font-family-arial">');
							print('<a href="../../people/view.php?action=browseByTag&tag=' . urlencode($tag['Tag']) . '">');
							print($tag['Tag']);
							print(' (');
							print($this->tag_counts['associations']['people'][$tag['Tag']]);
							print(')');
							print('</a>');
							print('</span>');
							print('</div>');
						}
						
								// Finish Float
							
							// -------------------------------------------------------------
												
						$clear_float_divider_start_args = [
							'class'=>'clear-float',
							'indentlevel'=>5,
						];
						
						$divider->displaystart($clear_float_divider_start_args);
						
						$clear_float_divider_end_args = [
							'indentlevel'=>5,
						];
						
						$divider->displayend($clear_float_divider_end_args);
					}
				}
				
				print('</div>');
			
				print('</div>');
			}
		}
		
				// Display Description
			
			// -------------------------------------------------------------
		
		if($this->entry['description'] && $description_count && !$quiz_mode)
		{
					// Description Header
				
				// -------------------------------------------------------------
				
			print('<a name="description"></a>');
			
			print('<center>');
			print('<div class="horizontal-center width-95percent">');
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<h2 class="horizontal-left margin-5px font-family-arial">');
			print('What You\'ll Be Able to Learn');
			print('</h2>');
			print('</div>');
			print('</div>');
			print('</center>');
			
					// Finish Description Header
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// Display Description
				
				// -------------------------------------------------------------
			
			$description = $this->entry['description'][0];
			print('<center>');
			print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-90percent">');
			print('<div class="border-2px background-color-gray15 margin-5px horizontal-left">');
			print('<p class="horizontal-left margin-5px font-family-arial">');
			print($description['Description']);
			print('</p>');
			
			if($description['Source'])
			{
				print('<div class="float-right border-2px margin-5px background-color-gray13">');
				print('<p class="horizontal-left margin-5px font-family-arial">');
				print('From : ');
				print($this->HyperlinkizeText(['text'=>$description['Source']]));
				print('</p>');
				print('</div>');
				
						// Finish Floated Box
					
					// -------------------------------------------------------------
										
				$clear_float_divider_start_args = [
					'class'=>'clear-float',
					'indentlevel'=>5,
				];
				
				$divider->displaystart($clear_float_divider_start_args);
				
				$clear_float_divider_end_args = [
					'indentlevel'=>5,
				];
				
				$divider->displayend($clear_float_divider_end_args);
			}
			
			print('</div>');
			print('</div>');
			print('</center>');
		}
		
				// Display Quotes
			
			// -------------------------------------------------------------
		
		if($this->entry['quote'] && $quote_count)
		{
					// Quote Header
				
				// -------------------------------------------------------------
				
			print('<a name="quote"></a>');
			
			print('<center>');
			print('<div class="horizontal-center width-95percent">');
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<h2 class="horizontal-left margin-5px font-family-arial">');
			print('Soon You\'ll Know How to Say This');
			print('</h2>');
			print('</div>');
			print('</div>');
			print('</center>');
			
					// Finish Quote Header
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// Display Quote
				
				// -------------------------------------------------------------
			
			print('<center>');
			print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-90percent">');
			
			for($i = 0; $i < $quote_count; $i++)
			{
				$quote = $this->entry['quote'][$i];
				print('<div class="border-2px background-color-gray15 margin-5px horizontal-left">');
				print('<blockquote class="margin-top-0px margin-bottom-0px"><p class="horizontal-left margin-5px font-family-arial"><em>"<quote>');
				print(str_replace('"', '\'', $quote['Quote']));
				print('</quote>"</em></p></blockquote>');
				
				if($quote['Source'])
				{
					print('<div class="float-right border-2px margin-5px background-color-gray13">');
					print('<p class="horizontal-left margin-5px font-family-arial">');
					print('From : ');
					print($this->HyperlinkizeText(['text'=>$quote['Source']]));
					print('</p>');
					print('</div>');
					
							// Finish Floated Box
						
						// -------------------------------------------------------------
											
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
				}
				
				print('</div>');
			}
			
			print('</div>');
			print('</center>');
		}
		
				// Display Textbody
			
			// -------------------------------------------------------------
		
		if($this->entry['textbody'] && $textbody_count)
		{
					// Textbody Header
				
				// -------------------------------------------------------------
				
			print('<a name="textbody"></a>');
			
			print('<center>');
			print('<div class="horizontal-center width-95percent">');
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<h2 class="horizontal-left margin-5px font-family-arial">');
			print('Lesson Instructions');
			print('</h2>');
			print('</div>');
			print('</div>');
			print('</center>');
			
					// Finish Textbody Header
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// Finish Textbody Header
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// Display Textbody
				
				// -------------------------------------------------------------
			
			print('<center>');
			
			for($i = 0; $i < $textbody_count; $i++)
			{
				$textbody = $this->entry['textbody'][$i];
				print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-90percent">');
				print('<div class="border-2px background-color-gray15 margin-5px horizontal-left font-family-arial">');
				
				print('<div class="horizontal-center width-90percent">');
				
				print('<div class="float-left border-2px margin-5px background-color-gray13 margin-left-20px">');
				print('<p class="horizontal-left margin-5px font-family-arial">');
				print($this->entry['Title']);
				print('</p>');
				print('</div>');
				print('</div>');
					
							// Finish Floated Box
						
						// -------------------------------------------------------------
											
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
				
				print('<div class="margin-5px horizontal-left font-family-arial text-to-play-as-audio">');
				print($this->HyperlinkizeText(['text'=>$textbody['Text']]));
				print('</div>');
				
				if($textbody['Source'])
				{
					print('<div class="float-right border-2px margin-5px background-color-gray13">');
					print('<p class="horizontal-left margin-5px font-family-arial">');
					print('From : ');
					print($this->HyperlinkizeText(['text'=>$textbody['Source']]));
					print('</p>');
					print('</div>');
					
							// Finish Floated Box
						
						// -------------------------------------------------------------
											
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
				}
				
				print('</div>');
				print('</div>');
			}
			
			print('</center>');
		}
		
				// Display Children
			
			// -------------------------------------------------------------
		
		if($this->children && $children_count && !$quiz_mode)
		{
					// Textbody Header
				
				// -------------------------------------------------------------
				
			print('<a name="children"></a>');
			
			print('<center>');
			print('<div class="horizontal-center width-95percent">');
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<h2 class="horizontal-left margin-5px font-family-arial">');
			print('Words');
			print('</h2>');
			print('</div>');
			print('</div>');
			print('</center>');
			
					// Finish Textbody Header
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// No-JS/Chrome Warning
				
				// -------------------------------------------------------------
				
						// No-JS Warning
					
					// -------------------------------------------------------------
			
			print("\n\n");
			
			print('<noscript>');
			
			print('<div class="horizontal-center width-70percent">');
			print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
			
			print('<div class="float-left border-2px margin-5px background-color-gray15">');
			print('<span class="horizontal-left margin-5px font-family-tahoma font-size-125percent">');
			print('<nobr>');
			print('<b>JavaScript Error :</b>');
			print('</nobr>');
			print('</span>');
			print('</div>');
			
			print('<p class="horizontal-left margin-5px font-family-tahoma">');
			print('Your JavaScript is turned off.  You will not be able to hear the audio in this section.  Please enable JavaScript to enjoy the full features of EarthFluent.com.');
			print('</p>');
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
			print('</div>');
			print('</div>');
			
			print('</noscript>');
				
						// No-Chrome Warning
					
					// -------------------------------------------------------------
			
			print('<div class="horizontal-center width-70percent google-chrome-warning" style="display:none;">');
			print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
			
			print('<div class="float-left border-2px margin-5px background-color-gray15">');
			print('<span class="horizontal-left margin-5px font-family-tahoma font-size-125percent">');
			print('<nobr>');
			print('<b>Browser Error :</b>');
			print('</nobr>');
			print('</span>');
			print('</div>');
			
			print('<p class="horizontal-left margin-5px font-family-tahoma">');
			print('You are not using Google Chrome.  Please use Google Chrome to get the full audio and voice functionality of Earthfluent.com.');
			print('</p>');
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
			print('</div>');
			print('</div>');
			
			print("\n\n");
			
					// Display Children
				
				// -------------------------------------------------------------
			
			$child_display = [];
			
			foreach($this->children as $child)
			{
				$sort_key = $child['ListTitle'];
				
				if(!$sort_key)
				{
					$sort_key = $child['Title'];
				}
				
				$child_display[$sort_key] = $child;
			}
			
			
			uksort($child_display, "strnatcasecmp");
			
			print('<div class="horizontal-center width-90percent">');
			foreach($child_display as $child)
			{
				print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
				
				unset($display_image);
				
				if($child['image'])
				{
					$child_images = $child['image'];
					$child_image_count = count($child_images);
					if($child_image_count)
					{
						shuffle($child_images);
						$child_image = $child_images[0];
						$display_image = $child_image;
					}
				}
				
				if(!$display_image)
				{
					$display_image = [
						IconFileName=>$this->primary_host_record['PrimaryImageLeft'],
						IconPixelWidth=>200,
						IconPixelHeight=>200,
					];
				}
				
				print('<div class="border-2px background-color-gray15 margin-5px float-left">');
				print('<div class="border-2px background-color-gray15 margin-5px float-left">');
				print('<div class="background-color-gray0" style="width:200px;height:50px;">');
				print('<div class="vertical-specialcenter">');
			#	print('<a href="' . $child['Code'] . '/view.php">');
				print('<img width="');
				print(200);
				print('" height="');
				print(50);
				print('" src="');
				print($this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]));
				print('/image/');
				print($display_image['IconFileName']);
				print('">');
			#	print('</a>');
				print('</div>');
				print('</div>');
				print('</div>');
				print('</div>');
				
				$title_max = 50;
				$title_popup = 0;
				
				if($child['Subtitle'])
				{
					$title_max = 30;
				}
				
				$full_child_title = $child['Title'];
				
				if(strlen($full_child_title) > $title_max)
				{
					$full_child_title = substr($full_child_title, 0, $title_max) . '...';
					$title_popup = 1;
				}
				
				if($child['Subtitle'])
				{
					$full_child_title .= ' : ';
					
					$full_child_subtitle = $child['Subtitle'];
					
					if(strlen($full_child_subtitle) > $title_max)
					{
						$full_child_subtitle = substr($full_child_subtitle, 0, $title_max) . '...';
					}
					
					$full_child_title .= $full_child_subtitle;
					$title_popup = 1;
				}
				
			#	$child_title = '<a href="' . $child['Code'] . '/view.php"';
				$child_title = '<span';
				if($title_popup)
				{
					$popup_title = $child['Title'];
					
					if($child['Subtitle'])
					{
						$popup_title .= ' : ';
						$popup_title .= $child['Subtitle'];
					}
					$child_title .= ' title="' . str_replace('"', '&quot;', $popup_title) . '"';
				}
				
				$child_title .= '>';
				
				$child_title .= $full_child_title;
				
				$child_title .= '</span>';
			#	$child_title .= '</a>';
				
				$div_mouseover = '';
				
				if($child['textbody'])
				{
					$text_bodies = $child['textbody'];
					
					$text_body_count = count($text_bodies);
					if($text_body_count)
					{
						$first_textbody = $text_bodies[0];
						
						$div_mouseover .= number_format($first_textbody['WordCount']) . ' Words / ' . number_format($first_textbody['CharacterCount']) . ' Characters';
					}
				}
				
						// Listen to the English Word
						// -----------------------------------------------
				
				print('<div id="header_backgroundimageurl" class="border-2px background-color-gray15 margin-5px float-left">');
				print('<table>');
				print('<tr><td>');
				print('<button id="listen-to-phrase-english-' . $child['id'] . '" class="font-family-arial font-size-150percent listen-to-phrase">► Listen</button>');
				print('</td><td>');
				print('<div class="span-header-3"><h3 style="margin:5px;padding:5px;display: inline-block;border:black 2px solid;background-color:#FFFFFF;" class="header-3 padding-0px margin-5px horizontal-left font-family-tahoma"><span>' . $child['Title'] . '</span></h3></div>');
				print('</td></tr>');
				print('</table>');
				print('</div>');
				
				print('<input type="hidden" id="listen-to-phrase-english-'  . $child['id'] . '-word" value="' . $child['Title'] . '">');
				
						// Listen to the Foreign Word
						// -----------------------------------------------
				
				print('<div id="header_backgroundimageurl" class="border-2px background-color-gray15 margin-5px float-left">');
				print('<table>');
				print('<tr><td>');
				print('<button id="listen-to-phrase-nonenglish-' . $child['id'] . '" class="font-family-arial font-size-150percent listen-to-phrase">► Listen</button>');
				print('</td><td>');
				print('<div class="span-header-3"><h3 style="margin:5px;padding:5px;display: inline-block;border:black 2px solid;background-color:#FFFFFF;" class="header-3 padding-0px margin-5px horizontal-left font-family-tahoma"><span>' . $child['entrytranslation'][0]['Title'] . '</span></h3></div>');
				print('</td></tr>');
				print('</table>');
				print('</div>');
				
				print('<input type="hidden" id="listen-to-phrase-nonenglish-' . $child['id'] . '-word" value="' . $child['entrytranslation'][0]['Title'] . '">');
				
						// Display Times (N/A)
						// -----------------------------------------------
				
				print('<p class="horizontal-left margin-5px font-family-arial">');
				
				$time_frame = '';
				
				if($child['eventdate'])
				{
					$child_event_count = count($child['eventdate']);
					for($i = 0; $i < $child_event_count; $i++)
					{
						$child_event = $child['eventdate'][$i];
							
						if($child_event['Title'] == 'Publication')
						{
							$publication_event = $child_event;
						}
						
						if($publication_event)
						{
							$i = $child_event_count;
						}
					}
					
					if($publication_event)
					{
						if($publication_event['EventDateTime'] != '0000-00-00 00:00:00')
						{
							$event_date_pieces = explode('-', $publication_event['EventDateTime']);
							$year = $event_date_pieces[0];
							$time_frame .= $year;
						}
						else
						{
							$time_frame .= '?';
						}
						
						unset($publication_event);
					}
				}
				
				print('<strong>');
				
				if($time_frame)
				{
					print($time_frame);
				}
				
				if($child['textbody'] && count($child['textbody']))
				{
					if($time_frame)
					{
						print(' ~ ');
					}
					
					$first_textbody = $child['textbody'][0];
					
					print('(');
					print(number_format($first_textbody['WordCount']));
					print(' Words / ');
					print(number_format($first_textbody['CharacterCount']));
					print(' Characters');
					print(')');
				}
				print('</strong> ');
				
				if($child['description'])
				{
					$description = $child['description'][0];
					
					if($description && $description['Description'])
					{
						print('<em>');
						if($time_frame || $child['Subtitle'])
						{
							print(' : ');
						}
						
						print($description['Description']);
						print(' ');
						print('</em>');
						
						if($description['Source'])
						{
							$source = $description['Source'];
							
							if(strlen($source) > 50)
							{
								$source = substr($source, 0, 50) . '...';
							}
							
							print(' (From : ' . $source . '.)');
						}
					}
				}
				
				if($child['quote'])
				{
					$child_quotes = $child['quote'];
					$child_quotes_count = count($child_quotes);
					$max_limit = $child_quotes_count;
					if($max_limit > 3)
					{
						$max_limit = 3;
					}
					shuffle($child_quotes);
					for($i = 0; $i < $max_limit; $i++)
					{
						$quote = $child_quotes[$i];
						if($quote && $quote['Quote'])
						{
							print(' <br>&bull; ');
							print('"');
							print(str_replace('"', '\'', $quote['Quote']));
							print('"');
							
							if($quote['Source'])
							{
								$source = $quote['Source'];
								
								if(strlen($source) > 50)
								{
									$source = substr($source, 0, 50) . '...';
								}
								
								print(' (From : ' . $source . '.)');
							}
						}
					}
				}
				else
				{
					if($child['textbody'])
					{
						$text_bodies = $child['textbody'];
						
						$text_body_count = count($text_bodies);
						if($text_body_count)
						{
							$text_display = $text_bodies[0]['FirstThousandCharacters'];
							
							$text_display = strip_tags($text_display);
							
							if(strlen($text_display) > 750)
							{
								$text_display = substr($text_display, 0, 750) . '...';
							}
							
							if($text_display)
							{
								print('<br>');
								print($text_display);
								
								if($text_bodies[0]['Source'])
								{
									$source = $text_bodies[0]['Source'];
									
									if(strlen($source) > 50)
									{
										$source = substr($source, 0, 50) . '...';
									}
									
									print(' (From : ' . $source . '.)');
								}
							}
						}
					}
				}
				
				print('</p>');
				
						// Finish Float
					
					// -------------------------------------------------------------
										
				$clear_float_divider_start_args = [
					'class'=>'clear-float',
					'indentlevel'=>5,
				];
				
				$divider->displaystart($clear_float_divider_start_args);
				
				$clear_float_divider_end_args = [
					'indentlevel'=>5,
				];
				
				$divider->displayend($clear_float_divider_end_args);
				
						// Tags
					
					// -------------------------------------------------------------
				
				if($child['tag'])
				{
					$tag_count = count($child['tag']);
					
					if($tag_count)
					{
						$tags = $child['tag'];
						$max_limit = $tag_count;
						if($max_limit > 10)
						{
							$max_limit = 10;
						}
						shuffle($tags);
						
						for($i = 0; $i < $max_limit; $i++)
						{
							$tag = $tags[$i];
							print('<div class="border-2px background-color-gray15 margin-left-5px margin-bottom-5px float-left">');
							print('<span class="horizontal-left margin-5px font-family-arial">');
							print('<a href="view.php?action=browseByTag&tag=' . urlencode($tag['Tag']) . '">');
							print($tag['Tag']);
							print('</a>');
							print('</span>');
							print('</div>');
						}
								// Finish Float
							
							// -------------------------------------------------------------
												
						$clear_float_divider_start_args = [
							'class'=>'clear-float',
							'indentlevel'=>5,
						];
						
						$divider->displaystart($clear_float_divider_start_args);
						
						$clear_float_divider_end_args = [
							'indentlevel'=>5,
						];
						
						$divider->displayend($clear_float_divider_end_args);
					}
				}
				
				print('</div>');
			}
			print('</div>');
		}
		
						// Display Say
			
			// -------------------------------------------------------------
			
		if(1)
		{
					// Quote Header
				
				// -------------------------------------------------------------
				
			print('<a name="say"></a>');
			
			print('<center>');
			print('<div class="horizontal-center width-95percent">');
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<h2 class="horizontal-left margin-5px font-family-arial">');
			print('How do I Say &quot;' . $this->entry['Title'] . '&quot; in ' . $this->record_list[0]['Title'] . '?');
			print('</h2>');
			print('</div>');
			print('</div>');
			print('</center>');
					// Finish Textbody Header
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// No-JS/Chrome Warning
				
				// -------------------------------------------------------------
				
						// No-JS Warning
					
					// -------------------------------------------------------------
			
			print("\n\n");
			
			print('<noscript>');
			
			print('<div class="horizontal-center width-70percent">');
			print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
			
			print('<div class="float-left border-2px margin-5px background-color-gray15">');
			print('<span class="horizontal-left margin-5px font-family-tahoma font-size-125percent">');
			print('<nobr>');
			print('<b>JavaScript Error :</b>');
			print('</nobr>');
			print('</span>');
			print('</div>');
			
			print('<p class="horizontal-left margin-5px font-family-tahoma">');
			print('Your JavaScript is turned off.  You will not be able to hear the audio in this section.  Please enable JavaScript to enjoy the full features of EarthFluent.com.');
			print('</p>');
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
			print('</div>');
			print('</div>');
			
			print('</noscript>');
				
						// No-Chrome Warning
					
					// -------------------------------------------------------------
			
			print('<div class="horizontal-center width-70percent google-chrome-warning" style="display:none;">');
			print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
			
			print('<div class="float-left border-2px margin-5px background-color-gray15">');
			print('<span class="horizontal-left margin-5px font-family-tahoma font-size-125percent">');
			print('<nobr>');
			print('<b>Browser Error :</b>');
			print('</nobr>');
			print('</span>');
			print('</div>');
			
			print('<p class="horizontal-left margin-5px font-family-tahoma">');
			print('You are not using Google Chrome.  Please use Google Chrome to get the full audio and voice functionality of Earthfluent.com.');
			print('</p>');
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
			print('</div>');
			print('</div>');
			
			print("\n\n");
			
					// Listen to the Foreign Word
					// -----------------------------------------------
			
			print('<div class="horizontal-center width-90percent">');
			
			print('<div id="header_backgroundimageurl" class="border-2px background-color-gray15 margin-5px float-left">');
			print('<table>');
			print('<tr><td>');
			print('<button id="listen-to-phrase-nonenglish-' . $child['id'] . '" class="font-family-arial font-size-150percent listen-to-phrase">► Listen</button>');
			print('</td><td>');
			print('<div class="span-header-3"><h3 style="margin:5px;padding:5px;display: inline-block;border:black 2px solid;background-color:#FFFFFF;" class="header-3 padding-0px margin-5px horizontal-left font-family-tahoma"><span>Click to Hear how to Say &quot;' . $this->entry['Title'] . '&quot; in ' . $this->record_list[0]['Title'] . '</span></h3></div>');
			print('</td></tr>');
			print('</table>');
			print('</div>');
			
			print('<input type="hidden" id="listen-to-phrase-nonenglish-' . $child['id'] . '-word" value="' . $this->entry['entrytranslation'][0]['Title'] . '">');
			
					// Finish Textbody Header
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
			print('</div>');
		}
		
						// Display Write
			
			// -------------------------------------------------------------
			
		if(1)
		{
					// Quote Header
				
				// -------------------------------------------------------------
				
			print('<a name="write"></a>');
			
			print('<center>');
			print('<div class="horizontal-center width-95percent">');
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<h2 class="horizontal-left margin-5px font-family-arial">');
			print('How do I Write &quot;' . $this->entry['Title'] . '&quot; in ' . $this->record_list[0]['Title'] . '?');
			print('</h2>');
			print('</div>');
			print('</div>');
			print('</center>');
			
					// Finish Textbody Header
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// See the Foreign Word
					// -----------------------------------------------
			
			print('<div class="horizontal-center width-90percent">');
			
			$this->entry['entrytranslation'][0]['Title'] = mb_convert_case($this->entry['entrytranslation'][0]['Title'], MB_CASE_TITLE, "UTF-8");
			
			print('<div id="header_backgroundimageurl" class="border-2px background-color-gray15 margin-5px float-left">');
			print('<div class="span-header-3"><h4 style="margin:5px;padding:5px;display: inline-block;border:black 2px solid;background-color:#FFFFFF;" class="header-3 padding-0px margin-5px horizontal-left font-family-tahoma"><span>&quot;' . $this->entry['Title'] . '&quot; in ' . $this->record_list[0]['Title'] . ' : <strong style="font-size:300%;">' . $this->entry['entrytranslation'][0]['Title'] . '</strong></span></h4></div>');
			print('</div>');
			
			print('<input type="hidden" id="listen-to-phrase-nonenglish-' . $child['id'] . '-word" value="' . $this->entry['entrytranslation'][0]['Title'] . '">');
			
			
			print('<div style="float:right;width:500px;height:100px;">');
			
			print('</div>');
			
					// Finish Textbody Header
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
			print('</div>');
		}
		
				// Display Pronunciation
			
			// -------------------------------------------------------------
		
		if(1)
		{
					// Textbody Header
				
				// -------------------------------------------------------------
				
			print('<a name="pronunciation"></a>');
			
			print('<center>');
			print('<div class="horizontal-center width-95percent">');
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<h2 class="horizontal-left margin-5px font-family-arial">');
			print('Test Your Pronunciation');
			print('</h2>');
			print('</div>');
			print('</div>');
			print('</center>');
			
					// Finish Textbody Header
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// No-JS/Chrome Warning
				
				// -------------------------------------------------------------
				
						// No-Chrome Warning
					
					// -------------------------------------------------------------
			
			print('<div class="horizontal-center width-70percent google-chrome-warning" style="display:none;">');
			print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
			
			print('<div class="float-left border-2px margin-5px background-color-gray15">');
			print('<span class="horizontal-left margin-5px font-family-tahoma font-size-125percent">');
			print('<nobr>');
			print('<b>Browser Error :</b>');
			print('</nobr>');
			print('</span>');
			print('</div>');
			
			print('<p class="horizontal-left margin-5px font-family-tahoma">');
			print('You are not using Google Chrome.  Please use Google Chrome to get full audio and voice functionality of Earthfluent.com.');
			print('</p>');
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
			print('</div>');
			print('</div>');
			
			print("\n\n");
			
					// Hidden Language Information
				
				// -------------------------------------------------------------
			
			print('<input type="hidden" id="language-name" value="' . $this->record_list[0]['Code'] . '">');
			
					// Input Area
				
				// -------------------------------------------------------------
			
			print('<div id="wrapper" style="text-align: center">');
			print('<div style="margin:5px;padding:5px;display: inline-block;border:black 2px solid;background-color:#FFFFFF;" class="header-3 padding-0px margin-5px font-family-tahoma horizontal-center">');
			print('<input type="text" id="pronunciation-area" size="60">');
			print('&nbsp;&nbsp;');
			
			print('<div id="recording-indicator" style="border: 1px solid black;display: inline-block; display:none;">');
			print('<div style="margin:5px;">');
			print('<span style="color:#FF0000">');
			print('<img src="');
			print($this->domain_object->GetPrimaryDomain);
			print('/image/bouncing-red-ball.gif');
			print('">');
			print('&nbsp;');
			print('<strong>');
			print('RECORDING');
			print('</strong>');
			print('</span>');
			print('</div>');
			print('</div>');
			
			print('&nbsp;&nbsp;');
			print('<input type="button" id="speak-button" value="Speak">');
			print('</div>');
			print('</div>');
			
					// Display Accent
				
				// -------------------------------------------------------------
				
			print('<div id="accent-wrapper" style="text-align: center;display:none;">');
			print('<div style="margin:5px;padding:5px;display: inline-block;border:black 2px solid;background-color:#FFFFFF;" class="header-3 padding-0px margin-5px font-family-tahoma horizontal-center">');
			
			print('<span>');
			print('What accent are you practicing?');
			print('</span>');
			
			print('&nbsp;');
			
			print('<select id="language-accent-to-speak">');
			print('</select>');
			
			print('</div>');
			print('</div>');
			
					// Display Self
				
				// -------------------------------------------------------------
			
			print('<div class="horizontal-center width-50percent">');
			print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
			
			print('<div id="pronounce-nonenglish-word-' . $this->entry['id'] . '" class="border-2px background-color-gray15 margin-5px float-left">');
			print('<input type="hidden" id="pronounce-nonenglish-' . $this->entry['id'] . '-word" class="pronounce-nonenglish-words-hidden" value="' . $this->entry['entrytranslation'][0]['Title'] . '">');
			print('<table style="margin:5px;">');
			print('<tr><td>');
			print('</td><td>');
			print('<div class="span-header-3"><h3 style="margin:5px;padding:5px;display: inline-block;border:black 2px solid;background-color:#FFFFFF;" class="header-3 padding-0px margin-5px horizontal-left font-family-tahoma"><span>' . $this->entry['entrytranslation'][0]['Title'] . '</span></h3></div>');
			print('</td></tr>');
			print('</table>');
			print('</div>');
			
					// Finish Float
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
				
			print('</div>');
			print('</div>');
			
			print('<center>');
			print('<div style="margin:5px;">');
			
			
			print('</div>');
			print('</center>');
		}
		
						// Display Definitions
			
			// -------------------------------------------------------------
			
		if($definitions_count)
		{
					// Quote Header
				
				// -------------------------------------------------------------
				
			print('<a name="definition"></a>');
			
			print('<center>');
			print('<div class="horizontal-center width-95percent">');
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<h2 class="horizontal-left margin-5px font-family-arial">');
			print('Definitions');
			print('</h2>');
			print('</div>');
			print('</div>');
			print('</center>');
			
					// Finish Textbody Header
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// See the Definition
					// -----------------------------------------------
			
			print('<div class="horizontal-center width-90percent">');
			
			for($i = 0; $i < $definitions_count; $i++)
			{
				$definition = $definitions[$i];
				print('<div class="border-2px background-color-gray15 margin-5px horizontal-left">');
				
				print('<div class="span-header-3"><p style="margin:5px;padding:5px;border:black 2px solid;background-color:#FFFFFF;" class="header-3 padding-0px margin-5px horizontal-left font-family-tahoma"><span>');
				
				if($definition['Pronunciation'])
				{
					print('<strong>Pronunciation : </strong>' . $definition['Pronunciation']);
					print('<br>');
				}
				
				if($definition['PartOfSpeech'])
				{
					print('<strong>Part of Speech : </strong>' . $definition['PartOfSpeech']);
					print('<br>');
				}
				
				if($definition['Etymology'])
				{
					print('<strong>Etymology : </strong>' . $definition['Etymology']);
					print('<br>');
				}
				
				if($definition['Definition'])
				{
					print('<strong>Definition : </strong>' . str_replace("\n", "<BR>\n", $definition['Definition']));
					print('<br>');
				}
				
				if($definition['DictionaryTitle'])
				{
					print('<strong>Source : </strong>' .  $definition['DictionaryTitle']);
				}
				
				print('</span></p></div>');
				print('</div>');
			}
			
			print('</div>');
		}
		
						// Display Images
			
			// -------------------------------------------------------------
		
		if(1)
		{
					// Quote Header
				
				// -------------------------------------------------------------
				
			print('<a name="googlecse"></a>');
			
			print('<center>');
			print('<div class="horizontal-center width-95percent">');
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<h2 class="horizontal-left margin-5px font-family-arial">');
			print('Images');
			print('</h2>');
			print('</div>');
			print('</div>');
			print('</center>');
			
					// Finish Textbody Header
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// No-JS/Chrome Warning
				
				// -------------------------------------------------------------
				
						// No-JS Warning
					
					// -------------------------------------------------------------
			
			print("\n\n");
			
			print('<noscript>');
			
			print('<div class="horizontal-center width-70percent">');
			print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
			
			print('<div class="float-left border-2px margin-5px background-color-gray15">');
			print('<span class="horizontal-left margin-5px font-family-tahoma font-size-125percent">');
			print('<nobr>');
			print('<b>JavaScript Error :</b>');
			print('</nobr>');
			print('</span>');
			print('</div>');
			
			print('<p class="horizontal-left margin-5px font-family-tahoma">');
			print('Your JavaScript is turned off.  You will not be able to hear the audio in this section.  Please enable JavaScript to enjoy the full features of EarthFluent.com.');
			print('</p>');
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
			print('</div>');
			print('</div>');
			
			print('</noscript>');
				
						// Ad-Block Warning
					
					// -------------------------------------------------------------
			
			print('<div class="horizontal-center width-70percent adblock-warning" style="display:none;">');
			print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
			
			print('<div class="float-left border-2px margin-5px background-color-gray15">');
			print('<span class="horizontal-left margin-5px font-family-tahoma font-size-125percent">');
			print('<nobr>');
			print('<b>Ad-Blocker Error :</b>');
			print('</nobr>');
			print('</span>');
			print('</div>');
			
			print('<p class="horizontal-left margin-5px font-family-tahoma">');
			print('The image search comes from Google, which sometimes displays ads in exchange for allowing others to use their free image search.  Please disable your ad-blocker to take the quiz or the lesson.');
			print('</p>');
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
			print('</div>');
			print('</div>');
			
			print("\n\n");
			
					// Display Lesson Words
				
				// -------------------------------------------------------------
			
			print('<center>');
			print('<div class="horizontal-center">');
			
			print('<div id="header_backgroundimageurl" class="border-2px background-color-gray15 margin-5px" style="display: inline-block;">');
			print('<button id="listen-to-phrase-nonenglish-' . $this->entry['id'] . '" class="font-family-arial font-size-150percent learn-phrase">Fetch Images for ' . ucwords($this->entry['Title']) . '</button>');
			print('</div>');
			
			print('<input type="hidden" id="listen-to-phrase-english-' . $this->entry['id'] . '-word" value="' . $this->entry['Title'] . '">');
			
			print('</div>');
			print('</center>');
			
					// Display Search
				
				// -------------------------------------------------------------
			
			print('<center>');
			print('<div class="horizontal-center width-80percent">');
			
			print('<gcse:searchbox></gcse:searchbox>');
			print('<gcse:searchresults defaultToImageSearch="true"></gcse:searchresults>');
			
			print('</div>');
			print('</center>');
		}
		
						// Display Lesson
			
			// -------------------------------------------------------------
		
		if(1)
		{
					// Quote Header
				
				// -------------------------------------------------------------
				
			print('<a name="lesson"></a>');
			
			print('<center>');
			print('<div class="horizontal-center width-95percent">');
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<h2 class="horizontal-left margin-5px font-family-arial">');
			print('Lesson');
			print('</h2>');
			print('</div>');
			print('</div>');
			print('</center>');
			
					// Finish Textbody Header
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// No-JS/Chrome Warning
				
				// -------------------------------------------------------------
				
						// No-JS Warning
					
					// -------------------------------------------------------------
			
			print("\n\n");
			
			print('<noscript>');
			
			print('<div class="horizontal-center width-70percent">');
			print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
			
			print('<div class="float-left border-2px margin-5px background-color-gray15">');
			print('<span class="horizontal-left margin-5px font-family-tahoma font-size-125percent">');
			print('<nobr>');
			print('<b>JavaScript Error :</b>');
			print('</nobr>');
			print('</span>');
			print('</div>');
			
			print('<p class="horizontal-left margin-5px font-family-tahoma">');
			print('Your JavaScript is turned off.  You will not be able to hear the audio in this section.  Please enable JavaScript to enjoy the full features of EarthFluent.com.');
			print('</p>');
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
			print('</div>');
			print('</div>');
			
			print('</noscript>');
				
						// Ad-Block Warning
					
					// -------------------------------------------------------------
			
			print('<div class="horizontal-center width-70percent adblock-warning" style="display:none;">');
			print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
			
			print('<div class="float-left border-2px margin-5px background-color-gray15">');
			print('<span class="horizontal-left margin-5px font-family-tahoma font-size-125percent">');
			print('<nobr>');
			print('<b>Ad-Blocker Error :</b>');
			print('</nobr>');
			print('</span>');
			print('</div>');
			
			print('<p class="horizontal-left margin-5px font-family-tahoma">');
			print('The image search comes from Google, which sometimes displays ads in exchange for allowing others to use their free image search.  Please disable your ad-blocker to take the quiz or the lesson.');
			print('</p>');
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
			print('</div>');
			print('</div>');
			
			print("\n\n");
				
						// No-Chrome Warning
					
					// -------------------------------------------------------------
			
			print('<div class="horizontal-center width-70percent google-chrome-warning" style="display:none;">');
			print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
			
			print('<div class="float-left border-2px margin-5px background-color-gray15">');
			print('<span class="horizontal-left margin-5px font-family-tahoma font-size-125percent">');
			print('<nobr>');
			print('<b>Browser Error :</b>');
			print('</nobr>');
			print('</span>');
			print('</div>');
			
			print('<p class="horizontal-left margin-5px font-family-tahoma">');
			print('You are not using Google Chrome.  Please use Google Chrome to get the full audio and voice functionality of Earthfluent.com.');
			print('</p>');
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
			print('</div>');
			print('</div>');
			
			print("\n\n");
			
					// Display This Lesson Link
				
				// -------------------------------------------------------------
			
			print('<center>');
			print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-90percent">');
			print('<div class="border-2px background-color-gray15 margin-5px horizontal-left">');
			
			print('<div class="border-2px background-color-gray15 margin-5px">');
			print('<div class="horizontal-left margin-5px">');
			print('<span class="font-family-arial font-size-125percent">');
			print('<a href="../view.php">');
			print('Take the '  . $this->record_list[0]['Title'] . '-Speaking Lesson for ' . $this->entry['Title'] . ' Now!');
			print('</a>');
			print('</span>');
			
			print('<div class="border-2px background-color-gray15 margin-5px float-right font-family-tahoma font-size-150percent">');
			print('<div class="margin-5px">');
			print('4 Questions');
			print('</div>');
			print('</div>');
			
			$this_quiz_words = [];
			
			$this_quiz_words[] = $this->entry['Title'];
			
			foreach($this->younger_siblings as $child)
			{
				$this_quiz_words[] = $child['Title'];
			}
			
			foreach($this->older_siblings as $child)
			{
				$this_quiz_words[] = $child['Title'];
			}
			
			print(' <span class="font-family-tahoma">');
			print('<strong>Words Covered :</strong> ');
			print('<em>');
			print(implode(', ', $this_quiz_words));
			print('.');
			print('</em>');
			print('</span>');
			
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
			print('</div>');
			print('</div>');
			
			print('</div>');
			print('</div>');
			print('</center>');
		}
		
						// Display Quiz
			
			// -------------------------------------------------------------
		
		if(1)
		{
					// Quote Header
				
				// -------------------------------------------------------------
				
			print('<a name="quiz"></a>');
			
			print('<center>');
			print('<div class="horizontal-center width-95percent">');
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<h2 class="horizontal-left margin-5px font-family-arial">');
			print('Quiz');
			print('</h2>');
			print('</div>');
			print('</div>');
			print('</center>');
			
					// Finish Textbody Header
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// No-JS/Chrome Warning
				
				// -------------------------------------------------------------
				
						// No-JS Warning
					
					// -------------------------------------------------------------
			
			print("\n\n");
			
			print('<noscript>');
			
			print('<div class="horizontal-center width-70percent">');
			print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
			
			print('<div class="float-left border-2px margin-5px background-color-gray15">');
			print('<span class="horizontal-left margin-5px font-family-tahoma font-size-125percent">');
			print('<nobr>');
			print('<b>JavaScript Error :</b>');
			print('</nobr>');
			print('</span>');
			print('</div>');
			
			print('<p class="horizontal-left margin-5px font-family-tahoma">');
			print('Your JavaScript is turned off.  You will not be able to hear the audio in this section.  Please enable JavaScript to enjoy the full features of EarthFluent.com.');
			print('</p>');
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
			print('</div>');
			print('</div>');
			
			print('</noscript>');
				
						// Ad-Block Warning
					
					// -------------------------------------------------------------
			
			print('<div class="horizontal-center width-70percent adblock-warning" style="display:none;">');
			print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
			
			print('<div class="float-left border-2px margin-5px background-color-gray15">');
			print('<span class="horizontal-left margin-5px font-family-tahoma font-size-125percent">');
			print('<nobr>');
			print('<b>Ad-Blocker Error :</b>');
			print('</nobr>');
			print('</span>');
			print('</div>');
			
			print('<p class="horizontal-left margin-5px font-family-tahoma">');
			print('The image search comes from Google, which sometimes displays ads in exchange for allowing others to use their free image search.  Please disable your ad-blocker to take the quiz or the lesson.');
			print('</p>');
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
			print('</div>');
			print('</div>');
			
			print("\n\n");
			
			print('<script type="text/javascript">');
			print('var adblock = true;');
			print('</script>');
			
			print("\n\n");
			
			print('<script type="text/javascript" src="' . $this->domain_object->GetPrimaryDomain . '/javascript/adframe.js"></script>');
			print('<script type="text/javascript">');
			print('if(adblock) {');
			print('$(".adblock-warning").show();');
			print('}');
			print('</script>');
			
						// No-Chrome Warning
					
					// -------------------------------------------------------------
			
			print('<div class="horizontal-center width-70percent google-chrome-warning" style="display:none;">');
			print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
			
			print('<div class="float-left border-2px margin-5px background-color-gray15">');
			print('<span class="horizontal-left margin-5px font-family-tahoma font-size-125percent">');
			print('<nobr>');
			print('<b>Browser Error :</b>');
			print('</nobr>');
			print('</span>');
			print('</div>');
			
			print('<p class="horizontal-left margin-5px font-family-tahoma">');
			print('You are not using Google Chrome.  Please use Google Chrome to get the full audio and voice functionality of Earthfluent.com.');
			print('</p>');
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
			print('</div>');
			print('</div>');
			
			print("\n\n");
			
					// Display This Quiz Link
				
				// -------------------------------------------------------------
			
			print('<center>');
			print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-90percent">');
			print('<div class="border-2px background-color-gray15 margin-5px horizontal-left">');
			
			print('<div class="border-2px background-color-gray15 margin-5px">');
			print('<div class="horizontal-left margin-5px">');
			print('<span class="font-family-arial font-size-125percent">');
			print('<a href="../view.php?quizmode=1">');
			print('Take the ' . $this->record_list[0]['Title'] . '-Speaking Quiz for ' . $this->entry['Title'] . ' Now!');
			print('</a>');
			print('</span>');
			
			print('<div class="border-2px background-color-gray15 margin-5px float-right font-family-tahoma font-size-150percent">');
			print('<div class="margin-5px">');
			print('4 Questions');
			print('</div>');
			print('</div>');
			
			$this_quiz_words = [];
			
			$this_quiz_words[] = $this->entry['Title'];
			
			foreach($this->younger_siblings as $child)
			{
				$this_quiz_words[] = $child['Title'];
			}
			
			foreach($this->older_siblings as $child)
			{
				$this_quiz_words[] = $child['Title'];
			}
			
			print(' <span class="font-family-tahoma">');
			print('<strong>Words Covered :</strong> ');
			print('<em>');
			print(implode(', ', $this_quiz_words));
			print('.');
			print('</em>');
			print('</span>');
			
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
			print('</div>');
			print('</div>');
			
			print('</div>');
			print('</div>');
			print('</center>');
			
			print('<center>');
			print('<div style="margin:5px;">');
			
			print('</div>');
			print('</center>');
		}
		
						// Display Siblings
			
			// -------------------------------------------------------------
		
		if($younger_sibling_count || $older_sibling_count)
		{
					// Quote Header
				
				// -------------------------------------------------------------
				
			print('<a name="siblings"></a>');
			
			print('<center>');
			print('<div class="horizontal-center width-95percent">');
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<h2 class="horizontal-left margin-5px font-family-arial">');
			print('Learning Navigation');
			print('</h2>');
			print('</div>');
			print('</div>');
			print('</center>');
			
					// Finish Textbody Header
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// Start Next/Last Styling
				
				// -------------------------------------------------------------
				
			print('<center>');
			print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-90percent">');
			
					// Display Table Start
				
				// -------------------------------------------------------------
			
			print('<table width="100%">');
			print('<tr>');
			
					// Display Last Entry
				
				// -------------------------------------------------------------
			
			print('<td width="33%" class="width-33percent">');
			
			print('<center>');
			print('<span class="font-family-arial font-size-150percent margin-10px border-2px background-color-gray15">');
			print('<div style="display:inline;" class="margin-10px">');
			print('&lt;&lt; Last Word in Lesson');
			print('</div>');
			print('</span>');
			print('</center>');
			
					// Clear Float
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// Last Entry?
				
				// -------------------------------------------------------------
			
			if($younger_sibling_count)
			{
				$oldest_young_sibling = $this->younger_siblings[0];
				$sibling_descriptions = $oldest_young_sibling['description'];
				
				if(count($sibling_descriptions))
				{
					$first_sibling_description = $sibling_descriptions[0];
					$last_sibling_mouseover_text = str_replace('"', '&quot;', $first_sibling_description['Description']);
				}
				
				$younger_sibling_text = '<a href="../' . $oldest_young_sibling['Code'] . '/view.php">';
				$younger_sibling_text .= $oldest_young_sibling['Title'];
				$younger_sibling_text .= '</a>';
			}
			else
			{
				$younger_sibling_text = 'This is the first lesson.';
			}
			
			print('<div id="header_backgroundimageurl" class="border-2px background-color-gray15 margin-5px"');
			if($last_sibling_mouseover_text)
			{
				print(' title="' . $last_sibling_mouseover_text . '"');
			}
			print('>');
			print('<div class="margin-10px">');
			print('<span class="font-family-tahoma font-size-125percent">');
			
			print($younger_sibling_text);
			
			print('</span>');
			print('</div>');
			print('</div>');
			
					// End Displaying Last Entry
				
				// -------------------------------------------------------------
			
			print('</td>');
			
					// Display Current Entry
				
				// -------------------------------------------------------------
			
			print('<td width="33%" class="width-33percent">');
			
			print('<center>');
			print('<span class="font-family-arial font-size-150percent margin-10px border-2px background-color-gray15">');
			print('<div style="display:inline;" class="margin-10px">');
			print('Current Word in Lesson');
			print('</div>');
			print('</span>');
			print('</center>');
			
					// Clear Float
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// This Entry?
				
				// -------------------------------------------------------------
			
			if($description_count)
			{
				$first_description = $this->entry['description'][0];
				
				$current_navigation_item_mouseover = str_replace('"', '&quot;', $first_description['Description']);
			}
			
			print('<div id="header_backgroundimageurl" class="border-2px background-color-gray15 margin-5px"');
			
			if($current_navigation_item_mouseover)
			{
				print(' title="' . $current_navigation_item_mouseover . '"');
			}
			
			print('>');
			print('<div class="margin-10px">');
			print('<span class="font-family-tahoma font-size-125percent">');
			
			print($this->entry['Title']);
			
			print('</span>');
			print('</div>');
			print('</div>');
			
					// End Displaying Last Entry
				
				// -------------------------------------------------------------
				
			print('</td>');
			
					// Display Next Entry
				
				// -------------------------------------------------------------
			
			print('<td width="33%" class="width-33percent">');
			
			print('<center>');
			print('<span class="font-family-arial font-size-150percent margin-10px border-2px background-color-gray15">');
			print('<div style="display:inline;" class="margin-10px">');
			print('Next Word in Lesson &gt;&gt;');
			print('</div>');
			print('</span>');
			print('</center>');
			
					// Clear Float
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// Last Entry?
				
				// -------------------------------------------------------------
			
			if($older_sibling_count)
			{
				$youngest_old_sibling = $this->older_siblings[0];
				$sibling_descriptions = $youngest_old_sibling['description'];
				if(count($sibling_descriptions))
				{
					$first_sibling_description = $sibling_descriptions[0];
					$next_sibling_mouseover_text = str_replace('"', '&quot;', $first_sibling_description['Description']);
				}
				
				$next_sibling_text = '<a href="../' . $youngest_old_sibling['Code'] . '/view.php">';
				$next_sibling_text .= $youngest_old_sibling['Title'];
				$next_sibling_text .= '</a>';
			}
			else
			{
				$next_sibling_text = 'This is the last lesson.';
			}
			
			print('<div id="header_backgroundimageurl" class="border-2px background-color-gray15 margin-5px"');
			if($next_sibling_mouseover_text)
			{
				print(' title="' . $next_sibling_mouseover_text . '"');
			}
			print('>');
			print('<div class="margin-10px">');
			print('<span class="font-family-tahoma font-size-125percent">');
			
			print($next_sibling_text);
			
			print('</span>');
			print('</div>');
			print('</div>');
			
					// End Displaying Last Entry
				
				// -------------------------------------------------------------
				
			print('</td>');
			
					// Display Last/Next Ten Header
				
				// -------------------------------------------------------------
			
			print('</tr>');
			
			print('<tr>');
			print('<td colspan="3">');
			
			print('<center>');
			print('<span class="font-family-arial font-size-150percent margin-10px border-2px background-color-gray15">');
			print('<div style="display:inline;" class="margin-10px">');
			print('Your Overall Progress');
			print('</div>');
			print('</span>');
			
			print('<div class="margin-10px border-2px background-color-gray15 width-70percent horizontal-left">');
			print('<ul class="font-family-arial font-size-125percent" type="disc">');
			
			if($younger_sibling_count)
			{
				for($i = 0; $i < $younger_sibling_count; $i++)
				{
					$younger_sibling = $this->younger_siblings[$i];
					
					print('<li>');
					print('<a href="../' . $younger_sibling['Code'] . '/view.php">');
					print($younger_sibling['Title']);
					
					$younger_sibling_descriptions = $younger_sibling['description'];
					$younger_sibling_description_count = count($younger_sibling_descriptions);
					
					if($younger_sibling_description_count && $younger_sibling_descriptions[0]['Description'])
					{
						print(' - ');
						
						print('<em>');
						print($younger_sibling_descriptions[0]['Description']);
						print('</em>');
					}
					
					print('</a>');
					print('</li>');
				}
			}
			
			print('<li>');
			print($this->entry['Title']);
			
			if($description_count && $this->entry['description'][0]['Description'])
			{
				print(' - ');
				
				print('<em>');
				print($this->entry['description'][0]['Description']);
				print('</em>');
			}
			
			print('</li>');
			if($older_sibling_count)
			{
				for($i = 0; $i < $older_sibling_count; $i++)
				{
					$older_sibling = $this->older_siblings[$i];
					
					print('<li>');
					print('<a href="../' . $older_sibling['Code'] . '/view.php">');
					print($older_sibling['Title']);
					
					$older_sibling_descriptions = $older_sibling['description'];
					$older_sibling_description_count = count($older_sibling_descriptions);
					
					if($older_sibling_description_count && $older_sibling_descriptions[0]['Description'])
					{
						print(' - ');
						
						print('<em>');
						print($older_sibling_descriptions[0]['Description']);
						print('</em>');
					}
					
					print('</a>');
					print('</li>');
				}
			}
			
			print('</ul>');
			print('</div>');
			
			print('</center>');
			
			print('</td>');
			print('</tr>');
			
					// Display Table End
				
				// -------------------------------------------------------------
			
			print('</tr>');
			print('</table>');
			
					// End Next/Last Styling
				
				// -------------------------------------------------------------
			
			print('</div>');
			print('</center>');
		}
		
		
				// Display Event Dates
			
			// -------------------------------------------------------------
		
		if($this->entry['eventdate'] && $eventdate_count)
		{
					// Quote Header
				
				// -------------------------------------------------------------
				
			print('<a name="eventdate"></a>');
			
			print('<center>');
			print('<div class="horizontal-center width-95percent">');
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<h2 class="horizontal-left margin-5px font-family-arial">');
			print('Chronology');
			print('</h2>');
			print('</div>');
			print('</div>');
			print('</center>');
			
					// Finish Textbody Header
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// Display Event Dates
				
				// -------------------------------------------------------------
			
			print('<center>');
			print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-90percent">');
			print('<div class="border-2px background-color-gray15 margin-5px horizontal-left font-family-arial">');
			
			for($i = 0; $i < $eventdate_count; $i++)
			{
				$eventdate = $this->entry['eventdate'][$i];
				print('<div class="margin-5px horizontal-left font-family-arial">');
				
				$date_time_pieces = explode(' ', $eventdate['EventDateTime']);
				$event_date = $date_time_pieces[0];
				$event_time = $date_time_pieces[1];
				
				print('<div class="float-left border-2px margin-5px background-color-gray13">');
				print('<div class="margin-5px">');
				
				print('<strong>');
				
				if($event_date != '0000-00-00')
				{
					$date_epoch_time = strtotime($event_date);
					print(date("F d, Y", $date_epoch_time));
				}
				
				print(' ');
				
				if($event_time != '00:00:00')
				{
					print($event_time);
				}
				
				print(' : </strong>');
				print('</div>');
				print('</div>');
				
				print($this->entry['Title']);
				print(' -- ');
				print($eventdate['Title']);
				
				print('.');
					
							// Finish Floated Box
						
						// -------------------------------------------------------------
											
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
				
				print('</div>');
				
				if(($i + 1) != $eventdate_count)
				{
					print('<hr width="95%">');
				}
			}
			print('</div>');
			print('</div>');
			
			print('</center>');
		}
		
				// Display Share Links
			
			// -------------------------------------------------------------
				
					// Share Links Header
				
				// -------------------------------------------------------------
				
		print('<a name="share"></a>');
		
		print('<center>');
		print('<div class="horizontal-center width-95percent">');
		print('<div class="border-2px background-color-gray15 margin-5px float-left">');
		print('<h2 class="horizontal-left margin-5px font-family-arial">');
		print('Share');
		print('</h2>');
		print('</div>');
		print('</div>');
		print('</center>');
			
					// Finish Share Links Header
				
				// -------------------------------------------------------------
									
		$clear_float_divider_start_args = [
			'class'=>'clear-float',
			'indentlevel'=>5,
		];
		
		$divider->displaystart($clear_float_divider_start_args);
		
		$clear_float_divider_end_args = [
			'indentlevel'=>5,
		];
		
		$divider->displayend($clear_float_divider_end_args);
			
					// Start Display Share Options
				
				// -------------------------------------------------------------
		
		print('<center>');
		print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-90percent">');
		print('<div class="border-2px background-color-gray15 margin-5px horizontal-left font-family-arial">');
		print('<div class="margin-5px horizontal-left font-family-arial">');
		
					// Display "Share" Text
				
				// -------------------------------------------------------------
		
		print('<div class="float-left border-2px margin-5px background-color-gray13">');
		print('<div class="margin-5px">');
		print('<strong>Permalink for Sharing :</strong>');
		print('</div>');
		print('</div>');
			
					// Finish "Share" Text
				
				// -------------------------------------------------------------
									
		$clear_float_divider_start_args = [
			'class'=>'clear-float',
			'indentlevel'=>5,
		];
		
		$divider->displaystart($clear_float_divider_start_args);
		
		$clear_float_divider_end_args = [
			'indentlevel'=>5,
		];
		
		$divider->displayend($clear_float_divider_end_args);
			
					// Display Permalink
				
				// -------------------------------------------------------------
		
		print('<center>');
		print('<div class="margin-5px horizontal-center width-90percent">');
		print('<div class="margin-5px border-2px background-color-gray13 float-left">');
		print('<div class="margin-5px horizontal-left font-family-arial float-left">');
		print('<input class="select-input-contents" type="text" size="100" value="');
		print($this->domain_object->GetPrimaryDomain([insecure=>1, lowercase=>1, www=>1]));
		print('/?id=');
		print($this->entry['assignment'][0]['id']);
		print('">');
		print('</div>');
		
		$clear_float_divider_start_args = [
			'class'=>'clear-float',
			'indentlevel'=>5,
		];
		
		$divider->displaystart($clear_float_divider_start_args);
		
		$clear_float_divider_end_args = [
			'indentlevel'=>5,
		];
		
		$divider->displayend($clear_float_divider_end_args);
		print('</div>');
		
		$clear_float_divider_start_args = [
			'class'=>'clear-float',
			'indentlevel'=>5,
		];
		
		$divider->displaystart($clear_float_divider_start_args);
		
		$clear_float_divider_end_args = [
			'indentlevel'=>5,
		];
		
		$divider->displayend($clear_float_divider_end_args);
		print('</div>');
		print('</center>');
		
					// Display Social Networking Options
				
				// -------------------------------------------------------------
		
		$social_media_share_links->display();
		
					// End Display Share Options
				
				// -------------------------------------------------------------
				
		print('</div>');
		print('</div>');
		print('</div>');
		print('</center>');
		
				// Display Links
			
			// -------------------------------------------------------------
		
		if($this->entry['link'] && $link_count)
		{
					// Quote Header
				
				// -------------------------------------------------------------
				
			print('<a name="link"></a>');
			
			print('<center>');
			print('<div class="horizontal-center width-95percent">');
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<h2 class="horizontal-left margin-5px font-family-arial">');
			print('Links');
			print('</h2>');
			print('</div>');
			print('</div>');
			print('</center>');
			
					// Finish Textbody Header
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// Display Links
				
				// -------------------------------------------------------------
			
			print('<center>');
			print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-90percent">');
			
			for($i = 0; $i < $link_count; $i++)
			{
				$link = $this->entry['link'][$i];
				
				print('<div class="border-2px background-color-gray15 margin-5px horizontal-left font-family-arial">');
				print('<div class="margin-5px horizontal-left font-family-arial">');
				
				print('<a href="' . $link['URL'] . '">');
				if($link['Title'])
				{
					print(' &bull; ' . $link['Title']);
				}
				else
				{
					print($link['URL']);
				}
				print('</a>');
							
				print('</div>');
				print('</div>');
			}
			print('</div>');
			
			print('</center>');
		}				// Comments Header
			
			// -------------------------------------------------------------
		
		if(!$quiz_mode)
		{
			print('<a name="comments"></a>');
			
			print('<center>');
			print('<div class="horizontal-center width-95percent">');
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<h2 class="horizontal-left margin-5px font-family-arial">');
			print('Comments');
			print('</h2>');
			print('</div>');
			print('</div>');
			print('</center>');
			
					// Finish Textbody Header
				
				// -------------------------------------------------------------
									
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
					// Display Comment Form
				
				// -------------------------------------------------------------
				
			if($_SERVER['HTTPS'] == 'on')
			{
				$start_form_args = [
					'action'=>'view.php#comments',
					'method'=>'post',
					'formid'=>'comment-form',
					'formclass'=>'margin-0px',
					'indentlevel'=>1,
				];
				
				$form->StartForm($start_form_args);
				
				if($this->authentication_object->user_session)
				{
					print('<center>');
					print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-50percent font-family-tahoma">');
					
					$username = '';
					
					if($this->authentication_object->user_session['User.Username'])
					{
						$username = $this->authentication_object->user_session['User.Username'];
					}
					else
					{
						$username = $this->authentication_object->user_session['User.EmailAddress'];
					}
					
					print('<p>Logged in as : <b>' . $username . '</b> (<a href="view.php?logout=true#comments">Logout</a>)</p>');
					
					print('</div>');
					
					if($this->username_record_conflict)
					{
						print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-70percent font-family-tahoma">');
						
						$username = '';
						
						if($this->authentication_object->user_session['User.Username'])
						{
							$username = $this->authentication_object->user_session['User.Username'];
						}
						else
						{
							$username = $this->authentication_object->user_session['User.EmailAddress'];
						}
						
						print('<p class="margin-10px horizontal-left">We\'re sorry.  The following username is already taken :<br><br><em>' . str_replace("\n", "<br>\n", strip_tags($this->Param('Username'))) . '</em></p>');
						
						print('</div>');
					}
					
					if($this->comment_results)
					{
						print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-70percent font-family-tahoma">');
						
						$username = '';
						
						if($this->authentication_object->user_session['User.Username'])
						{
							$username = $this->authentication_object->user_session['User.Username'];
						}
						else
						{
							$username = $this->authentication_object->user_session['User.EmailAddress'];
						}
						
						print('<p class="margin-10px horizontal-left">Thank you for your comment!  The following was received and will be published after review.<br><br><em>' . str_replace("\n", "<br>\n", strip_tags($this->comment_results['Comment'])) . '</em></p>');
						
						print('</div>');
					}
					print('<div id="error-box" class="border-2px background-color-gray13 margin-5px horizontal-center width-70percent font-family-tahoma" style="display:none;">');
					
					print('<p id="validation-error-message" class="margin-10px horizontal-left"></p>');
					
					print('</div>');
				
							// Display Likes/Dislikes
						
						// -------------------------------------------------------------
					
					$like_mouseover_value = '';
					$cursor_class = '';
					
					if($_SERVER['HTTPS'] != 'on' || !$this->authentication_object->user_session)
					{
						$like_mouseover_value = 'You must login before you are allowed to upvote or downvote.';
					}
					else
					{
						$like_mouseover_value = 'Let your feelings be known!  Like or dislike this here.';
						$cursor_class = 'cursor-pointer';
					}
					
					print('<center>');
					print('<div class="horizontal-center width-70percent" title="' . $like_mouseover_value . '">');
					
					print('<div class="border-2px background-color-gray15 margin-5px float-left">');
					print('<div id="thumbs-up-button-container" class="border-2px background-color-gray15 margin-5px float-left');
					if($cursor_class)
					{
						print(' ' . $cursor_class);
					}
					print('">');
					print('<div class="height-100px width-100px background-color-gray15">');
					print('<div class="vertical-specialcenter">');
					print('<img id="thumbs-up-button" width="90" height="90" src="');
					print($this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]));
					print('/image/');
					print('thumbs-up-right.jpg');
					print('"');
					print('>');
					print('</div>');
					print('</div>');
					print('<nobr><span id="total-likes" class="font-family-tahoma">');
					print(number_format($this->likes_count));
					print('</span>');
					print('<span class="font-family-tahoma"> Likes</span>');
					print('</nobr>');
					print('</div>');
					print('</div>');
					
					print('<div class="border-2px background-color-gray15 margin-5px float-left">');
					print('<div id="thumbs-down-button-container" class="border-2px background-color-gray15 margin-5px float-left');
					if($cursor_class)
					{
						print(' ' . $cursor_class);
					}
					print('">');
					print('<div class="height-100px width-100px background-color-gray15">');
					print('<div class="vertical-specialcenter">');
					print('<img id="thumbs-down-button" width="90" height="90" src="');
					print($this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]));
					print('/image/');
					print('thumbs-down-right.jpg');
					print('"');
					print('>');
					print('</div>');
					print('</div>');
					print('<nobr>');
					print('<span id="total-dislikes" class="font-family-tahoma">');
					print(number_format($this->dislikes_count));
					print('</span>');
					print('<span class="font-family-tahoma"> Dislikes</span>');
					print('</nobr>');
					print('</div>');
					print('</div>');
					
					print('<div class="border-2px background-color-gray15 margin-5px float-right" title="Click here to see users who liked this.">');
					print('<div class="background-color-gray15 margin-5px float-left');
					print('<span class="font-family-tahoma">');
					print('<a href="view.php?action=viewUserLikes" class="font-family-tahoma">');
					print('Who Liked This?');
					print('</a>');
					print('</span>');
					print('</div>');
					print('</div>');
					
					print('</div>');
					print('</center>');
					
							// Finish Textbody Header
						
						// -------------------------------------------------------------
											
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
			
					print('<div class="width-90percent">');
					print('<div class="border-2px background-color-gray13 margin-5px font-family-tahoma float-left">');
					print('<div class="g-signin2" data-onsuccess="onSignIn"></div>');
					
					if(!$this->authentication_object->user_session['User.Username'])
					{
						print('<p class="margin-5px horizontal-left"><b>Username : </b>');
						print('<input id="Username" class="Username" name="Username" type="text" size="80">');
						print(' <span title="This will be viewable to the public, unlike your E-mail Address.">(Publicly Viewable)</span> <span style="color:FF0000;vertical-align:top;margin:10px;">*</span>');
						print('</p>');
					}
					
					print('<nobr>');
					
					$comment_value = '';
					
					if($this->username_record_conflict)
					{
						$comment_value = $this->Param('Comments');
					}
					
					$type_args = [
						type=>'textarea',
						id=>'Comments',
						name=>'Comments',
						cols=>120,
						rows=>10,
						indentlevel=>5,
						value=>$comment_value,
					];
					
					$form->DisplayFormField($type_args);
					print(' <span style="color:FF0000;vertical-align:top;margin:10px;">*</span>');
					print('</nobr>');
					
					print('<br>');
					
					$type_args = [
						type=>'submit',
						id=>'submit',
						name=>'Comment',
						value=>'Comment',
						indentlevel=>5,
					];
					
					$form->DisplayFormField($type_args);
					
					print('</div>');
					print('</div>');
					print('</center>');
					
							// Finish Textbody Header
						
						// -------------------------------------------------------------
											
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
							
			#		print_r($this->authentication_object->user_account);
			#		print_r($this->authentication_object->user_session);
				}
				else
				{
					print('<center>');
					print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-50percent font-family-tahoma">');
					print('<p>Login through Google to Comment or Like/Dislike :</p>');
					
					print('<div class="horizontal-center width-50percent margin-top-5px margin-bottom-5px">');
					print('<div class="g-signin2" data-onsuccess="onSignIn"></div>');
					print('</div>');
					
					print('<input type="hidden" name="google_token_id" id="google_token_id" class="google_token_id">');
					print('<div style="display:none;">');
					$type_args = [
						type=>'submit',
						id=>'submit',
						name=>'Comment',
						value=>'Comment',
						indentlevel=>5,
					];
					
					$form->DisplayFormField($type_args);
					print('</div>');
					
					print('</div>');
					print('</center>');
					
							// Display Likes/Dislikes
						
						// -------------------------------------------------------------
					
					$like_mouseover_value = '';
					$cursor_class = '';
					
					if($_SERVER['HTTPS'] != 'on' || !$this->authentication_object->user_session)
					{
						$like_mouseover_value = 'You must login before you are allowed to upvote or downvote.';
					}
					else
					{
						$like_mouseover_value = 'Let your feelings be known!  Like or dislike this here.';
						$cursor_class = 'cursor-pointer';
					}
					
					print('<center>');
					print('<div class="horizontal-center width-70percent" title="' . $like_mouseover_value . '">');
					
					print('<div class="border-2px background-color-gray15 margin-5px float-left">');
					print('<div id="thumbs-up-button-container" class="border-2px background-color-gray15 margin-5px float-left');
					if($cursor_class)
					{
						print(' ' . $cursor_class);
					}
					print('">');
					print('<div class="height-100px width-100px background-color-gray15">');
					print('<div class="vertical-specialcenter">');
					print('<img width="90" height="90" src="');
					print($this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]));
					print('/image/');
					print('thumbs-up-right.jpg');
					print('"');
					print('>');
					print('</div>');
					print('</div>');
					print('<span class="font-family-tahoma"><nobr>');
					print(number_format($this->likes_count));
					print(' Likes</nobr></span>');
					print('</div>');
					print('</div>');
					
					print('<div class="border-2px background-color-gray15 margin-5px float-left">');
					print('<div class="border-2px background-color-gray15 margin-5px float-left');
					if($cursor_class)
					{
						print(' ' . $cursor_class);
					}
					print('">');
					print('<div class="height-100px width-100px background-color-gray15">');
					print('<div class="vertical-specialcenter">');
					print('<img width="90" height="90" src="');
					print($this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]));
					print('/image/');
					print('thumbs-down-right.jpg');
					print('"');
					print('>');
					print('</div>');
					print('</div>');
					print('<span id="total-dislikes" class="font-family-tahoma"><nobr>');
					print(number_format($this->dislikes_count));
					print(' Dislikes');
					print('</nobr></span>');
					print('</div>');
					print('</div>');
					
					print('<div class="border-2px background-color-gray15 margin-5px float-right" title="Click here to see users who liked this.">');
					print('<div class="background-color-gray15 margin-5px float-left');
					print('<span class="font-family-tahoma">');
					print('<a href="view.php?action=viewUserLikes" class="font-family-tahoma">');
					print('Who Liked This?');
					print('</a>');
					print('</span>');
					print('</div>');
					print('</div>');
					
					print('</div>');
					print('</center>');
					
							// Finish Textbody Header
						
						// -------------------------------------------------------------
											
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
				}
				
				$end_form_args = [
					indentlevel=>1,
				];
				$form->EndForm($end_form_args);
			}
			else
			{		
				print('<center>');
				print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-50percent font-family-tahoma">');
				
				$new_url = str_replace('/view.php', '/view.php#comments', $_SERVER['SCRIPT_URL']);
				print('<p><b><a href="' . $this->domain_object->GetPrimaryDomain([secure=>1, lowercase=>0, www=>1]) . $new_url . '">Login to Comment</a></b></p>');
				
				print('</div>');
				print('</center>');
				
						// Display Likes/Dislikes
					
					// -------------------------------------------------------------
				
				$like_mouseover_value = '';
				$cursor_class = '';
				
				if($_SERVER['HTTPS'] != 'on' || !$this->authentication_object->user_session)
				{
					$like_mouseover_value = 'You must login before you are allowed to upvote or downvote.';
				}
				else
				{
					$like_mouseover_value = 'Let your feelings be known!  Like or dislike this here.';
					$cursor_class = 'cursor-pointer';
				}
				
				print('<center>');
				print('<div class="horizontal-center width-70percent" title="' . $like_mouseover_value . '">');
				
				print('<div class="border-2px background-color-gray15 margin-5px float-left">');
				print('<div class="border-2px background-color-gray15 margin-5px float-left');
				if($cursor_class)
				{
					print(' ' . $cursor_class);
				}
				print('">');
				print('<div class="height-100px width-100px background-color-gray15">');
				print('<div class="vertical-specialcenter">');
				print('<img width="90" height="90" src="');
				print($this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]));
				print('/image/');
				print('thumbs-up-right.jpg');
				print('"');
				print('>');
				print('</div>');
				print('</div>');
				print('<span id="total-dislikes" class="font-family-tahoma"><nobr>');
				print(number_format($this->likes_count));
				print(' Likes</nobr></span>');
				print('</div>');
				print('</div>');
				
				print('<div class="border-2px background-color-gray15 margin-5px float-left">');
				print('<div class="border-2px background-color-gray15 margin-5px float-left');
				if($cursor_class)
				{
					print(' ' . $cursor_class);
				}
				print('">');
				print('<div class="height-100px width-100px background-color-gray15">');
				print('<div class="vertical-specialcenter">');
				print('<img width="90" height="90" src="');
				print($this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]));
				print('/image/');
				print('thumbs-down-right.jpg');
				print('"');
				print('>');
				print('</div>');
				print('</div>');
				print('<span id="total-dislikes" class="font-family-tahoma"><nobr>');
				print(number_format($this->dislikes_count));
				print(' Dislikes');
				print('</nobr></span>');
				print('</div>');
				print('</div>');
				
				print('<div class="border-2px background-color-gray15 margin-5px float-right" title="Click here to see users who liked this.">');
				print('<div class="background-color-gray15 margin-5px float-left');
				print('<span class="font-family-tahoma">');
				print('<a href="view.php?action=viewUserLikes" class="font-family-tahoma">');
				print('Who Liked This?');
				print('</a>');
				print('</span>');
				print('</div>');
				print('</div>');
				
				print('</div>');
				print('</center>');
					
							// Finish Textbody Header
						
						// -------------------------------------------------------------
											
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
			}
			
			print('<input type="hidden" name="userid" id="userid" class="userid" value="' . $this->authentication_object->user_session['User.id'] . '">' . "\n\n");
			print('<input type="hidden" name="usersessionid" id="usersessionid" class="usersessionid" value="' . $this->authentication_object->user_session['CookieToken'] . '">' . "\n\n");
			print('<input type="hidden" name="logout" id="logout" class="logout" value="' . $this->Param('logout') . '">' . "\n\n");
			
			if($this->user_likedislike && $this->user_likedislike['id'])
			{
				print('<input type="hidden" id="likeordislike" class="likeordislike" name="likeordislike" value="');
				print($this->user_likedislike['LikeOrDislike']);
				print('">');
			}
			
					// Display Comments
				
				// -------------------------------------------------------------
			
			print('<center>');
			
			if($this->comments && is_array($this->comments) && count($this->comments))
			{
				print('<div class="horizontal-center width-80percent">');
				print('<div class="border-2px background-color-gray13 margin-5px horizontal-left width-50percent font-family-tahoma">');
				print('<p class="margin-5px"><nobr>Total Comments : ' . count($this->comments) . '</nobr></p>');
				print('</div>');
				print('</div>');
				
				foreach($this->comments as $comment)
				{
					print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-90percent font-family-tahoma">');
					print('<div class="horizontal-left margin-5px">');
					
					print('<div class="border-2px background-color-gray15 margin-5px float-left">');
					print('<p class="horizontal-left margin-5px font-family-arial">');
					print('Posted By : ');
					print('<a href="' . $this->domain_object->GetPrimaryDomain([lowercase=>0, www=>1]) . '/users.php?action=viewuser&user=' . urlencode($comment['user']['Username']) . '">');
					print($comment['user']['Username']);
					print('</a>');
					print('</p>');
					print('</div>');
					
					print('<div class="border-2px background-color-gray15 margin-5px float-right">');
					print('<p class="horizontal-right margin-5px font-family-arial">');
					print('Original Post Date : ');
					$date_epoch_time = strtotime($comment['OriginalCreationDate']);
					$full_date = date("F d, Y; H:i:s", $date_epoch_time);
					print($full_date);
					print('</p>');
					print('</div>');
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
					$comments_text = strip_tags($comment['Comment']);	
					$comments_text = $this->HyperlinkizeText(['text'=>$comments_text]);
					$comments_text = str_replace("\n", "<BR>\n", $comments_text);
					print($comments_text);
					
					print('</div>');
					print('</div>');
				}
			}
			else
			{
				print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-90percent font-family-tahoma">');
				print('<div class="horizontal-left margin-5px">');
				print('<p class="margin-0px"><b>No comments so far.  You can be the first!</b></p>');
				print('</div>');
				print('</div>');
			}
			
			print('</center>');
		}
		
				// DEBUG
			
			// -------------------------------------------------------------
		
	#	print("BT: INDEX view.php script, display.php template, CHILDOF-people<BR><BR>");
		
		/*
		print("<PRE>RECORD LIST:");
		print_r($this->record_list);
		print("\n\nMASTER RECORD:\n\n");
		print_r($this->master_record);
		print("\n\nPARENT:\n\n");
		print_r($this->parent);
		print("\n\nENTRY:\n\n");
		print_r($this->entry);
		print("\n\nCHILDREN:\n\n");
		print_r($this->children);
		print("</PRE>");
		*/
		
				// Display Final Ending Navigation
			
			// -------------------------------------------------------------
		
		$bottom_navigation_args = [
			'thispage'=>'',
		];
		$navigation->DisplayBottomNavigation($bottom_navigation_args);
		
		print('<input type="hidden" id="language" value="' . $this->record_list[0]['Code'] . '">');
	}
?>