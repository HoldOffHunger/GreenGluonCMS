<?php

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
	
	$header_primary_args = [
		'title'=>'Search URLs at ' . $this->master_record['Title'],
		'image'=>$this->primary_host_record['PrimaryImageLeft'],
		'rightimage'=>$this->primary_host_record['PrimaryImageRight'],
		'imagemouseover'=>$primary_image_text,
		'level'=>1,
		'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-gray13',
		'textclass'=>'margin-0px horizontal-center vertical-center padding-top-22px margin-bottom-22px',
		'imagedivclass'=>'border-2px margin-5px background-color-gray10' . $width_attribute,
		'imageclass'=>$vertical_attribute,
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
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
	
			// Display Searched Content Size
		
		// -------------------------------------------------------------
	
	print('<center>');
	print('<div class="horizontal-center width-50percent">');
	print('<div class="border-2px background-color-gray15 margin-5px float-left">');
	
	print('<strong>');
	print(str_replace('<p>', '<p class="horizontal-left margin-5px font-family-tahoma">', $this->entry['textbody'][0]['Text']));
	print('</strong>');
	
	print('<p class="horizontal-left margin-5px font-family-tahoma">');
	print('This search looks through ' . number_format($this->child_record_stats['ChildRecordCount']) . ' URLs.');
	print(' (Last Updated: ');
	$date_epoch_time = strtotime($this->child_record_stats['LastModificationDate']);
	$full_date = date("F d, Y; H:i:s", $date_epoch_time);
	print($full_date);
	print('.)');
	print('</p>');
	
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
	
			// Start Form
		
		// -------------------------------------------------------------
	
	$start_form_args = [
		'method'=>'post',
		'files'=>1,
		'formclass'=>'margin-0px',
		'indentlevel'=>1,
	];
	
	$form->StartForm($start_form_args);
	
			// Display Form
		
		// -------------------------------------------------------------
	
	print('<center>');
	print('<div class="horizontal-center width-70percent">');
	print('<div class="border-2px background-color-gray15 margin-5px horizontal-center">');
	print('<h2 class="horizontal-left margin-5px font-family-arial">Enter URL :');
	
	$type_args = [
		type=>'text',
		name=>'search',
		value=>$this->search_term,
		'class'=>'autofocus',
		size=>100,
		indentlevel=>5,
	];
	
	$form->DisplayFormField($type_args);
	
			// Search Button
		
		// -------------------------------------------------------------
	
	$type_args = [
		type=>'submit',
		name=>'submit',
		value=>'Search',
		'class'=>'float-right',
		indentlevel=>5,
	];
	
	$form->DisplayFormField($type_args);
	
	print('</h2>');
	print('</div>');
	print('</div>');
	
	print('</center>');
	
			// Finish About Header
		
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
	
			// End Form
		
		// -------------------------------------------------------------
	
	$end_form_args = [
		indentlevel=>1,
	];
	$form->EndForm($end_form_args);
	
			// Display Search Results
		
		// -------------------------------------------------------------
	
	if($this->search_term)
	{
				// Display Search Counts
			
			// -------------------------------------------------------------
			
		$header_secondary_args = [
			'title'=>'Viewing : ' . $this->search_results_count . ' Search Results',
			'level'=>3,
			'divclass'=>'width-33percent border-2px background-color-gray13 margin-5px float-left',
			'textclass'=>'font-family-arial padding-0px margin-5px horizontal-center vertical-center',
			'imagedivclass'=>'border-2px margin-5px background-color-gray10',
			'imageclass'=>'border-1px',
			'domainobject'=>$this->domain_object,
			'leftimageenable'=>0,
			'rightimageenable'=>0,
		];
		$header->display($header_secondary_args);
		
				// Finish About Header
			
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
		
		
				// View Selected Record List
			
			// -------------------------------------------------------------
		
	#	print_r($this->search_results);
		
	#	print('<br><br>');
		
	#	print_r($this->entries);
		
		$entry_display = [];
		
		for($i = 0; $i < count($this->entries); $i++)
		{
			$entry = $this->entries[$i];
			
			$sort_key = str_pad($entry['score'], 30, '0', STR_PAD_LEFT);
			
			if($entry['ListTitle'])
			{
				$sort_key .= $entry['ListTitle'];
			}
			elseif($entry['Title'])
			{
				$sort_key .= $entry['Title'];
			}
			
			$sort_key .= $entry['Code'];
			
			$entry_display[$sort_key] = $entry;
		}
		
		uksort($entry_display, "strnatcasecmp");
		print('<div class="horizontal-center width-90percent">');
		
		foreach(array_reverse($entry_display) as $entry)
		{
			print('<div class="horizontal-left width-100percent background-color-gray14 border-2px margin-top-5px font-family-tahoma">');
			
			unset($display_image);
			
			if($entry['image'])
			{
				$entry_images = $entry['image'];
				$entry_image_count = count($entry_images);
				if($entry_image_count)
				{
					shuffle($entry_images);
					$entry_image = $entry_images[0];
					$display_image = $entry_image;
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
			
			$parent_codes = [];
			foreach($entry['parents'] as $parent)
			{
				$parent_codes[] = $parent['Code'];
			}
			
			$parent_code_url = implode('/', $parent_codes);
			
			if(count($parent_codes) == 1)
			{
				$extra_action = 'index';
			}
			else
			{
				$extra_action = '';
			}
			
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<div class="height-100px width-100px background-color-gray0">');
			print('<div class="vertical-specialcenter">');
			print('<a href="' . $parent_code_url . '/view.php');
			if($extra_action)
			{
				print('&action=' . $extra_action);
			}
			print('">');
			print('<img width="');
			print(ceil($display_image['IconPixelWidth'] / 2));
			print('" height="');
			print(ceil($display_image['IconPixelHeight'] / 2));
			print('" src="');
			print($this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]));
			print('/image/');
			print($display_image['IconFileName']);
			print('">');
			print('</a>');
			print('</div>');
			print('</div>');
			print('</div>');
			print('</div>');
			
			$title_max = 50;
			
			if(count($parent_codes) > 1)
			{
				$title_max = 30;
			}
			
			if($entry['Title'])
			{
				$full_child_title = $entry['Title'];
			}
			else
			{
				$full_child_title = $entry['ListTitle'];
			}
			
			$child_title_source = $full_child_title;
			
			$popup_title = 0;
			if(strlen($full_child_title) > $title_max)
			{
				$full_child_title = substr($full_child_title, 0, $title_max) . '...';
				$popup_title = 1;
			}
			
			$entry_title = '<a href="';
			$entry_title .= $parent_code_url;
			$entry_title .= '/view.php';
			
			if($extra_action)
			{
				$entry_title .= '&action=' . $extra_action;
			}
			
			$entry_title .= '"';
			
			if($popup_title)
			{
				$entry_title .= ' title="' . str_replace('"', '&quot;', $child_title_source) . '"';
			}
			
			$entry_title .= '>';
			
			$entry_title .= $full_child_title;
			
			$entry_title .= '</a>';
			
			$div_mouseover = '';
			
			if($entry['textbody'])
			{
				$text_bodies = $entry['textbody'];
				$text_body_count = count($text_bodies);
				if($text_body_count)
				{
					$first_textbody = $text_bodies[0];
					
					$div_mouseover .= number_format($first_textbody['WordCount']) . ' Words / ' . number_format($first_textbody['CharacterCount']) . ' Characters';
				}
			}
			
			$header_secondary_args = [
				'title'=>$entry_title,
				'divmouseover'=>$div_mouseover,
				'level'=>2,
				'divclass'=>'border-2px background-color-gray15 margin-5px float-left',
				'textclass'=>'padding-0px margin-5px horizontal-left font-family-tahoma',
				'imagedivclass'=>'border-2px margin-5px background-color-gray10',
				'imageclass'=>'border-1px',
				'domainobject'=>$this->domain_object,
				'leftimageenable'=>0,
				'rightimageenable'=>0,
			];
			$header->display($header_secondary_args);
			
			if(count($parent_codes) > 1)
			{
				$last_parent = $entry['parents'][count($parent_codes) - 2];
				
				if($last_parent && $last_parent['Title'])
				{
					print(' (From ');
					
					$full_entry_title = $last_parent['Title'];
					
					if(strlen($full_entry_title) > $title_max)
					{
						if(!$popup_title)
						{
							$popup_title = 1;
							$child_title_source = '(From ' . $full_entry_title . ')';
						}
						else
						{
							$child_title_source .= ' (From ' . $full_entry_title . ')';
						}
						$full_entry_title = substr($full_entry_title, 0, $title_max) . '...';
					}
					
					print($full_entry_title);
					
					print(') -- ');
				}
			}
			
			if($entry['quote'])
			{
				$entry_quotes = $entry['quote'];
				$entry_quotes_count = count($entry_quotes);
				$max_limit = $entry_quotes_count;
				if($max_limit > 3)
				{
					$max_limit = 3;
				}
				shuffle($entry_quotes);
				for($i = 0; $i < $max_limit; $i++)
				{
					$quote = $entry_quotes[$i];
					if($quote && $quote['Quote'])
					{
						print('<em>"');
						print(str_replace('"', '\'', $quote['Quote']));
						print('"</em>');
						
						if($quote['Source'])
						{
							$source = $quote['Source'];
							
							print(' (From : ' . $source . '.)');
						}
					}
				}
			}
			
			print('<BR><BR>');
			
			print('<div class="float-right font-family-courier font-size-150percent">');
			print('<a href="' . $entry['link'][0]['URL'] . '" target="_blank">');
			print($entry['link'][0]['URL']);
			print('</a>');
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
		}
		
		print('</div>');
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
		'thispage'=>'Search',
	];
	$navigation->DisplayBottomNavigation($bottom_navigation_args);
	
?>