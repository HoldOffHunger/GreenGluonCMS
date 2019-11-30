<?php
	
			// Format-Universal Formatting
		
		// -------------------------------------------------------------
		
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
				url=>$this->domain_object->GetPrimaryDomain([insecure=>1, lowercase=>1, www=>1]) . '/' . $this->word . '/',
				title=>$this->header_title_text,
				desc=>$instructions_content_text,
				provider=>$this->domain_object->primary_domain_lowercased,
			],
		];
		$social_media_share_links = new module_socialmediasharelinks($social_media_share_links_args);
		
				// Display Header
			
			// -------------------------------------------------------------
		
		$primary_image = false;
		
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
		
		$header_primary_args = [
			'title'=>$this->word . ' : Definition',
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
		
				// Display Image Information for JS
			
			// -------------------------------------------------------------
		
		if($image_count > 1)
		{
			$images_randomized = $this->entry['image'];
			unset($images_randomized[0]);
			shuffle($images_randomized);
			$random_images_rebuilt = [];
			
			foreach($images_randomized as $image_randomized)
			{
				$random_images_rebuilt[] = $image_randomized;
			}
			
			$random_images_rebuilt_count = count($random_images_rebuilt);
			
			for($j = 0; $j < $random_images_rebuilt_count; $j++)
			{
				$image = $random_images_rebuilt[$j];
				
				print('<input type="hidden" class="background-img-url" id="');
				print('header_backgroundimageurl_' . $j);
				print('" value="');
				print($this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]));
				print('/image/');
				print(implode('/', str_split($image['FileDirectory'])));
				print('/');
				print($image['FileName']);
				print('">');
				
				print('<input type="hidden" class="background-img-text" id="');
				print('header_backgroundimagetext_' . $j);
				print('" value="');
				print(str_replace('"', '&quot;', $image['Description']));
				print('">');
			}
		}
		
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
			
			print('<a href="' . $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '">');
			
			print($this->master_record['Title']);
			
			print('</a>');
		}
		
		print(' &gt;&gt; ');
		
		print($this->word);
		
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
		
		print('<li><a href="#definitions">Definitions of ' . $this->word . '</a></li>');
		
		print('<li><a href="#search">Search</a></li>');
		
		print('<li><a href="#random">Random Words</a></li>');
		
		print('<li><a href="#share">Share</a></li>');
		
#		print('<li><a href="#comments">Comments</a></li>');
		
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
		
				// Display Share Links
			
			// -------------------------------------------------------------
				
					// Share Links Header
				
				// -------------------------------------------------------------
				
		print('<a name="definitions"></a>');
		
		print('<center>');
		print('<div class="horizontal-center width-95percent">');
		print('<div class="border-2px background-color-gray15 margin-5px float-left">');
		print('<h2 class="horizontal-left margin-5px font-family-arial">');
		print('Definitions of ');
		print($this->word);
		print('</h2>');
		print('</div>');
		print('</div>');
		print('</center>');
			
					// Finish Definitions Header
				
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
		
		$definitions_count = count($this->definitions);
		for($i = 0; $i < $definitions_count; $i++)
		{
			$definition = $this->definitions[$i];
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
		
				// Display Share Links
			
			// -------------------------------------------------------------
				
					// Share Links Header
				
				// -------------------------------------------------------------
				
		print('<a name="search"></a>');
		
		print('<center>');
		print('<div class="horizontal-center width-95percent">');
		print('<div class="border-2px background-color-gray15 margin-5px float-left">');
		print('<h2 class="horizontal-left margin-5px font-family-arial">');
		print('Search');
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
		
		print('<center>');
		
		
	
	print('<form class="margin-0px" method="post" action="http://www.wordweight.com/">');
	
	print('<div class="border-2px background-color-gray15 margin-5px horizontal-left width-50percent">');
	print('<div style="margin:5px;padding:5px;border:black 2px solid;background-color:#FFFFFF;" class="header-3 padding-0px margin-5px horizontal-left font-family-tahoma">');
	
	print('<center>');
	
	if($this->search_term)
	{
		print("Sorry, no results for " . $this->search_term . ".  Please try again!");
		print('<BR><BR>');
	}
	
	print('Search : <input type="text" name="search" size="60">');
	
	print('<br><br>');
	
	print('<input type="submit" value="Lookup Definition">');
	print('</center>');
	
	print('</div>');
	print('</div>');
	
	print('</form>');
		
		
		print('</center>');
		
				// Display Random Words
			
			// -------------------------------------------------------------
				
					// Share Links Header
				
				// -------------------------------------------------------------
				
		print('<a name="random"></a>');
		
		print('<center>');
		print('<div class="horizontal-center width-95percent">');
		print('<div class="border-2px background-color-gray15 margin-5px float-left">');
		print('<h2 class="horizontal-left margin-5px font-family-arial">');
		print('Random Words');
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
	
	print('<center>');
	print('<div class="border-2px background-color-gray15 margin-5px horizontal-left width-70percent">');
	print('<div style="margin:5px;padding:5px;border:black 2px solid;background-color:#FFFFFF;" class="header-3 padding-0px margin-5px horizontal-left font-family-tahoma">');
	
	print('<center>');
	print('<div class="border-2px background-color-gray13 margin-5px" style="display: inline-block;">');
	print('<div class="margin-5px">');
	print('<center><h3 class="margin-0px">Some Random Definitions!</h3></center>');
	print('</div>');
	print('</div>');
	print('</center>');
	
	print('<br>');
	
	$random_definitions = $this->dictionary->LookUpRandomWords([]);
	
	foreach ($random_definitions as $random_word => $random_definition)
	{
		print('<div id="header_backgroundimageurl" class="border-2px background-color-gray13 margin-5px" style="display: inline-block;">');
		print('<div class="margin-5px">');
		print('<a href="' . urlencode(ucwords($random_word)) . '/view.php">');
		print(ucwords($random_word));
		print('</a>');
		print('</div>');
		print('</div>');
	}
	
	print('</div>');
	print('</div>');
	print('</center>');
	
			// Display Similar Sites
		
		// -------------------------------------------------------------
	
	require('../modules/html/similarsites-satellites.php');
	
	$similar_site_args = [
		site=>$this->domain_object->primary_domain_lowercased,
		language=>$this->language_object,
	];
	$similar_sites = new module_similarsites_satellites($similar_site_args);
	
	$similar_sites->display();
		
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
		print('/');
		print($this->word);
		print('/');
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
		
		//print("<script type='text/javascript'>
		//		$(window).load( function() {
		//			responsiveVoice.speak(\"$message\", \"UK English Female\");
		//		});
		//</script>");
	}
?>