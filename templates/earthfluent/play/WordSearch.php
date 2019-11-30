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
		
				// View WordSearch
			
			// -------------------------------------------------------------
			
		print('<div>');
		
			print('<input type="hidden" id="language-name" value="' . $this->parent['Code'] . '">');
	?>
	
<style>
/**
* Wordfind.js 0.0.1
* (c) 2012 Bill, BunKat LLC.
* Wordfind is freely distributable under the MIT license.
* For all details and documentation:
*     http://github.com/bunkat/wordfind
*/

p {
  font: 22pt sans-serif;
  margin: 20px 20px 0px 20px;
}

/**
* Styles for the puzzle
*/
#puzzle {
  border: 1px solid black;
  padding: 20px;
  float: left;
  margin: 30px 20px;
}

#puzzle div {
  width: 100%;
  margin: 0 auto;
}

/* style for each square in the puzzle */
#puzzle .puzzleSquare {
  height: 30px;
  width: 30px;
  text-transform: uppercase;
  background-color: white;
  border: 0;
  font: 1em sans-serif;
}

button::-moz-focus-inner {
  border: 0;
}

/* indicates when a square has been selected */
#puzzle .selected {
  background-color: orange;
}

/* indicates that the square is part of a word that has been found */ 
#puzzle .found {
  background-color: blue;
  color: white;
}

#puzzle .solved {
  background-color: purple;
  color: white;
}

/* indicates that all words have been found */
#puzzle .complete {
  background-color: green;
}

/**
* Styles for the word list
*/
#words {
  padding-top: 20px;
  -moz-column-count: 2;
  -moz-column-gap: 20px;
  -webkit-column-count: 2;
  -webkit-column-gap: 20px;
  column-count: 2;
  column-gap: 20px;
  width: 300px;
}

#words ul {
  list-style-type: none;
}

#words li {
  padding: 3px 0;
  font: 1em sans-serif;
}

/* indicates that the word has been found */
#words .wordFound {
  text-decoration: line-through;
  color: gray;
}

/**
* Styles for the button
*/
#solve {
  margin: 0 30px;
}

</style>
<div id='puzzle'></div>
<div id='words'></div>	
<script>

$(document).ready(function(event){

  var words = [
               <?php
			
			$previous_quizzes = (int)$this->Param('previousquizzes');
			$future_quizzes = (int)$this->Param('futurequizzes');
			
			$younger_sibling_count = count($this->younger_siblings);
			$older_sibling_count = count($this->older_siblings);

			$new_children = $this->children;
			
			if($previous_quizzes)
			{
				$max_younger_sibling_iteration = $younger_sibling_count;
				
				if($max_younger_sibling_iteration > $previous_quizzes)
				{
					$max_younger_sibling_iteration = $previous_quizzes;
				}
				
				for($i = $younger_sibling_count - 1; $i >= $younger_sibling_count - $max_younger_sibling_iteration && $i >= 0; $i--)
				{
					$younger_sibling = $this->younger_siblings[$i];
					$younger_sibling_children = $younger_sibling['children'];
					foreach($younger_sibling_children as $younger_sibling_child)
					{
						$new_children[] = $younger_sibling_child;
					}
				}
			}
			
			if($future_quizzes)
			{
				foreach($this->older_siblings as $older_sibling)
				{
					$older_sibling_children = $older_sibling['children'];
					foreach($older_sibling_children as $older_sibling_child)
					{
						$new_children[] = $older_sibling_child;
					}
				}
			}
			
			$new_children_count = count($new_children);
			
               		$longestword = 0;
			foreach($new_children as $child) {
				$word = $child['entrytranslation'][0]['Title'];
				$word = str_replace(' ', '', $word);
				$word = str_replace(',', '', $word);
				$word = str_replace(';', '', $word);
				$word = str_replace('\'', '\\\'', $word);
				print('\'' . $word . '\', ');
				if(strlen($child['entrytranslation'][0]['Title']) > $longestword) {
					$longestword = mb_strlen($child['entrytranslation'][0]['Title']);
				}
			}
			
			$longestmax = $longestword;
			
			if($longestmax < 8) {
				$longestmax = 8;
			}
               ?>];

  // start a word find game
  var gamePuzzle = wordfindgame.create(words, '#puzzle', '#words', {height: <?php print($longestmax); ?>, width: <?php print($longestmax); ?>});

  $('#solve').click( function() {
    wordfindgame.solve(gamePuzzle, words);
  });
});
</script>
	
	<?php
		print('</div>');
	}
		
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
	
#	print_r($this->younger_siblings);
?>