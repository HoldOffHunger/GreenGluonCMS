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
		'title'=>'Search ' . $this->master_record['Title'],
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
	print('This search looks through ' . number_format($this->child_record_stats['ChildRecordCount']) . ' documents, containing ' . number_format($this->child_record_stats['ChildWordCount']) . ' words or ' . number_format($this->child_record_stats['ChildCharacterCount']) . ' characters.');
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
	print('<h2 class="horizontal-left margin-5px font-family-arial">Search :');
	
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
			'title'=>'Viewing : ' . $this->search_record_start_index . ' to ' . $this->search_record_end_index . ' of ' . $this->search_results_count . ' Search Results',
			'imagemouseover'=>$this->total_pages . ' Total Pages Available',
			'divmouseover'=>$this->total_results_viewed . ' Items Viewed, ' . $this->total_results_left . ' Remaining to Be Viewed',
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
		
				// View Browsing Per-Page Setting
			
			// -------------------------------------------------------------
		
		$start_form_args = [
			'action'=>0,
			'method'=>'post',
			'files'=>1,
			'formclass'=>'margin-0px',
			'indentlevel'=>1,
		];
		
		$form->StartForm($start_form_args);
		
		$browsing_options = 'Results Per Page : <select id="perpage" name="perpage">';
		
		for($i = 10; $i <= 200; $i += 10)
		{
			$browsing_options .= '<option value="' . $i . '"';
			
			if($i == $this->perpage && !$this->custom_per_page_selected)
			{
				$browsing_options .= ' SELECTED="SELECTED"';
			}
			
			$browsing_options .= '>' . $i . '</option>';
		}
		
		$browsing_options .= '<option value="custom"';
		if($this->custom_per_page_selected)
		{
			$browsing_options .= ' SELECTED="SELECTED"';
		}
		$browsing_options .= '>Custom</option>';
		$browsing_options .= '</select> ';
		$browsing_options .= '<input id="CustomPerPage" name="CustomPerPage" type="text" size="5" value="' . $this->perpage . '"> ';
		$browsing_options .= '<input type="submit" value="Update"> ';
		$browsing_options .= '<input type="hidden" name="page" value="1">';
		$browsing_options .= '<input type="hidden" name="search" value="' . htmlentities($this->search_term) . '">';
		
		$header_secondary_args = [
			'title'=>$browsing_options,
			'divmouseover'=>'Adjust results per page here.',
			'level'=>3,
			'divclass'=>'width-33percent border-2px background-color-gray13 margin-5px float-right',
			'textclass'=>'font-family-arial padding-0px margin-5px horizontal-center vertical-center',
			'imagedivclass'=>'border-2px margin-5px background-color-gray10',
			'imageclass'=>'border-1px',
			'domainobject'=>$this->domain_object,
			'leftimageenable'=>0,
			'rightimageenable'=>0,
		];
		$header->display($header_secondary_args);
		
		$end_form_args = array(
			indentlevel=>1,
		);
		$form->EndForm($end_form_args);
		
				// Finish Search Counts
			
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
		
				// View Selected Record List Pages
			
			// -------------------------------------------------------------
		
		$total_page_urls = '';
		
		for($i = 1; $i <= $this->total_pages; $i++)
		{
			if($i != $this->page)
			{
				$total_page_urls .= ' <a href="search.php?search=' . urlencode($this->search_term) . '&page=' . $i . '&perpage=' . $this->perpage . '">';
			}
			
			$total_page_urls .= $i;
			
			if($i != $this->page)
			{
				$total_page_urls .= '</a>' . ' ';
			}
		}
		
		print('<div class="horizontal-center width-95percent">');
		
		$header_secondary_args = [
			'title'=>$total_page_urls,
			'divmouseover'=>'Navigate to another page of results by using these links.',
			'level'=>3,
			'divclass'=>'width-100percent border-2px background-color-gray13',
			'textclass'=>'padding-0px margin-5px horizontal-center vertical-center font-family-arial',
			'imagedivclass'=>'border-2px margin-5px background-color-gray10',
			'imageclass'=>'border-1px',
			'domainobject'=>$this->domain_object,
			'leftimageenable'=>0,
			'rightimageenable'=>0,
		];
		$header->display($header_secondary_args);
		
		print('</div>');
		
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
			print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
			
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
			print(implode('/', str_split($display_image['FileDirectory'])));
			print('/');
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
			
			if(count($parent_codes) > 1)
			{
				$last_parent = $entry['parents'][count($parent_codes) - 2];
				
				if($last_parent && $last_parent['Title'])
				{
					$full_child_title .= ' (From ';
					
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
					
					$full_child_title .= $full_entry_title;
					
					$full_child_title .= ')';
				}
			}
			
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
			
			print('<p class="horizontal-left margin-5px font-family-arial">');
			print($entry['matchedtext']);
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
			
			print('</div>');
		}
		
		print('</div>');
		
				// View Selected Record List Pages
			
			// -------------------------------------------------------------
		
		print('<div class="horizontal-center width-95percent margin-top-5px">');
		
		$header_secondary_args = [
			'title'=>$total_page_urls,
			'divmouseover'=>'Navigate to another page of results by using these links.',
			'level'=>3,
			'divclass'=>'width-100percent border-2px background-color-gray13',
			'textclass'=>'padding-0px margin-5px horizontal-center vertical-center font-family-arial',
			'imagedivclass'=>'border-2px margin-5px background-color-gray10',
			'imageclass'=>'border-1px',
			'domainobject'=>$this->domain_object,
			'leftimageenable'=>0,
			'rightimageenable'=>0,
		];
		$header->display($header_secondary_args);
		
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