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
	
			// Mouseover Values
		
		// -------------------------------------------------------------
	
	$div_mouseover = '';
	$image_mouseover = '';
	
	if($this->entry['quote'] && $this->entry['quote'][0])
	{
		$random_quote = $this->entry['quote'][array_rand($this->entry['quote'], 1)];
		
		$div_mouseover = '&quot;' . str_replace('"', '\'', $random_quote['Quote']) . '&quot; -- ' . str_replace('"', '\'', $random_quote['Source']);
	}
	
	if($this->entry['description'] && $this->entry['description'][0])
	{
		$description = $this->entry['description'][0];
		
		$image_mouseover = str_replace('"', '\'', $description['Description']);
	}
	
	if(!$div_mouseover)
	{
		if($this->primary_host_record['Classification'])
		{
			$div_mouseover = str_replace('"', '\'', $this->primary_host_record['Classification']);
		}
	}
	
	if(!$image_mouseover)
	{
		if($this->primary_host_record['Subject'])
		{
			$image_mouseover = str_replace('"', '\'', $this->primary_host_record['Subject']);
		}
	}
	
			// Display Header
		
		// -------------------------------------------------------------
	
	$primary_image = implode('/', str_split($this->entry['image'][0]['FileDirectory'])) . '/' . $this->entry['image'][0]['IconFileName'];
	$header_primary_args = [
		'title'=>$this->header_title_text,
		'image'=>$primary_image,
		'divmouseover'=>$div_mouseover,
		'imagemouseover'=>$image_mouseover,
		'level'=>1,
		'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-gray13',
		'textclass'=>'padding-0px margin-0px horizontal-center vertical-center padding-top-22px',
		'imagedivclass'=>'border-2px margin-5px background-color-gray10',
		'imageclass'=>'border-1px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
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
	
	if($this->authentication_object->user_session['UserAdmin.id']) {
		require('../modules/html/entry-controls.php');
		$entry_controls = new module_entrycontrols;
		$entry_controls->Display(['that'=>$this]);
	}
		
				// Start Top Bar
			
			// -------------------------------------------------------------
		
		print('<div class="horizontal-center width-95percent margin-top-5px">');
		
				// Breadcrumbs Info
			
			// -------------------------------------------------------------
		
		require('../modules/html/breadcrumbs.php');
		$breadcrumbs = new module_breadcrumbs(['that'=>$this]);
		$breadcrumbs->Display();
		
				// Login Info
			
			// -------------------------------------------------------------
			
		require('../modules/html/auth.php');
		$auth = new module_auth(['that'=>$this]);
		$auth->Display();
		
				// End Top Bar
			
			// -------------------------------------------------------------
		
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
	
			// View Selected Record List
		
		// -------------------------------------------------------------
	
	//print("BT: INDEX view.php script, display.php template<BR><BR>");
	
	$header_secondary_args = [
		'title'=>'Total Sub-Directories : ' . count($this->children) ,
	//	'image'=>$this->primary_host_record['PrimaryImageLeft'],
	//	'rightimage'=>$this->primary_host_record['PrimaryImageRight'],
		'imagemouseover'=>'Master C is in the house!',
		'level'=>3,
		'divclass'=>'width-33percent border-2px background-color-gray13 margin-5px',
		'textclass'=>'padding-0px margin-5px horizontal-center vertical-center font-family-arial',
		'imagedivclass'=>'border-2px margin-5px background-color-gray10',
		'imageclass'=>'border-1px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>0,
		'rightimageenable'=>0,
	];
	$header->display($header_secondary_args);
			
			// Introduction
		
		// -------------------------------------------------------------
	
	print('<center>');
	print('<div class="horizontal-center width-70percent">');
	print('<div class="border-2px background-color-gray15 margin-5px float-left ">');
	
	print('<strong>');
	
	print('<p class="horizontal-left margin-5px font-family-tahoma" title="');
	
	print(' (Last Updated: ');
	$date_epoch_time = strtotime($this->child_record_stats['LastModificationDate']);
	$full_date = date("F d, Y; H:i:s", $date_epoch_time);
	print($full_date);
	print('.)');
	
	print('">');
	
	print(str_replace('<p>', '<p class="horizontal-left margin-5px font-family-tahoma">', $this->entry['description'][0]['Description']));
	
	print('<BR><BR>');
	
	print('This directory contains ' . number_format($this->child_record_stats['ChildRecordCount']) . ' links.');
	
	print('</strong>');
	print('</p>');
	
	print('</div>');
	print('</div>');
	print('</center>');
							
	$clear_float_divider_start_args = [
		'class'=>'clear-float',
		'indentlevel'=>5,
	];
	
	$divider->displaystart($clear_float_divider_start_args);
	
	$clear_float_divider_end_args = [
		'indentlevel'=>5,
	];
	
	$divider->displayend($clear_float_divider_end_args);
	
	
	$child_display = [];
	
	for($i = 0; $i < count($this->children); $i++)
	{
		$child = $this->children[$i];
		$child_display[$child['ListTitle']] = $child;
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
		print('<div class="height-100px width-100px background-color-gray0">');
		print('<div class="vertical-specialcenter">');
		print('<a href="' . $child['Code'] . '/view.php?action=index">');
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
		
		$child_title = '<a href="' . $child['Code'] . '/view.php?action=index">';
		
		$child_title .= $child['Title'];
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
		else
		{
			$grand_children = $child['children'];
			
			if($grand_children && is_array($grand_children))
			{
				$grand_children_count = count($grand_children);
				
				if($grand_children_count)
				{	
					unset($grand_child);
					$full_grand_child_display = [];
					foreach($grand_children as $single_grand_child)
					{
						$full_grand_child_display[] = $single_grand_child['Title'];
					}
					
					$div_mouseover = implode(', ', $full_grand_child_display) . '...';
				}
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
		
		if($time_frame)
		{
			print($time_frame);
		}
		
		if($child['Subtitle'] || $child['association'][0]['entry']['Title'])
		{
			if($time_frame)
			{
				print(' ~ ');
			}
			
			print('<strong>');
			print('<a href="' . $child['Code'] . '/view.php?action=index">');
			
			if($child['Title'] && $child['Subtitle'])
			{
				print(' : ');
			}
			if($child['Subtitle'])
			{
				print($child['Subtitle']);
			}
			print('</a>');
			
			if($child['association'][0]['entry']['Title'])
			{
				print(', by ');
				print('<a href="../people/' . $child['association'][0]['entry']['Code'] . '/view.php?action=index">');
				print($child['association'][0]['entry']['Title']);
				print('</a>');
			}
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
			$printed = 0;
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
						$printed = 1;
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
			
			if(!$printed)
			{
				$grand_children = $child['children'];
				
				if($grand_children && is_array($grand_children))
				{
					$grand_children_count = count($grand_children);
					
					if($grand_children_count)
					{
						$grand_child_display = [];
						
						for($i = 0; $i < count($grand_children); $i++)
						{
							$new_child = $grand_children[$i];
							
							$sort_key = $child['ListTitle'];
							
							if(!$sort_key)
							{
								$sort_key = $child['Title'];
							}
							
							$grand_child_display[$sort_key] = $new_child;
						}
						
						uksort($grand_child_display, "strnatcasecmp");
						
						unset($grand_child);
						foreach($grand_child_display as $single_grand_child)
						{
							if(!$grand_child)
							{
								$grand_child = $single_grand_child['textbody'][0];
							}
						}
						print(strip_tags($grand_child['FirstThousandCharacters']));
						
						if(strlen($grand_child['FirstThousandCharacters']) == 1000)
						{
							print('...');
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
					print('<a href="/view.php?action=browseByTag&tag=' . urlencode($tag['Tag']) . '">');
					print($tag['Tag']);
				
					print(' (');
					print(number_format($this->tag_counts[$tag['Tag']]));
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
	}
	
	print('</div>');
	
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
		'sharewithtext'=>'Share With',
		'socialmediasharelinkargs'=>[
			url=>$this->domain_object->GetPrimaryDomain([insecure=>1, lowercase=>1, www=>1]) . '/anarchism.php?action=index',
			title=>$this->header_title_text,
			desc=>$image_mouseover,
			provider=>$this->domain_object->primary_domain_lowercased,
		],
	];
	$social_media_share_links = new module_socialmediasharelinks($social_media_share_links_args);
	
				// Start Display Share Options
			
			// -------------------------------------------------------------

	print('<center>');
	print('<div class="margin-5px horizontal-center width-80percent">');
	print('<div class="margin-5px border-2px background-color-gray13 float-left">');
	print('<div class="margin-5px horizontal-left font-family-arial float-left">');
		
			// Display "Share" Text
			// -------------------------------------------------------

	print('<table border="0" class="padding-0px margin-0px">');
	print('<tr valign="top">');
	print('<td valign="top">');
	print('<div class="font-family-tahoma font-size-150percent margin-10px border-2px background-color-gray10"><span class="margin-5px"><nobr>' . 'Share' . ' :</nobr></span></div>');
	print('</td>');
	print('<td>');
		
				// Display Social Networking Options
			
			// -------------------------------------------------------------
	
	$social_media_share_links->display();

				// Conclude Table
				// -------------------------------------------------------

	print('</td>');
	print('</tr>');
	print('</table>');
	
				// End Display Share Options
			
			// -------------------------------------------------------------
	
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
	
			// Display Final Ending Navigation
		
		// -------------------------------------------------------------
	
	$bottom_navigation_args = [
		'thispage'=>'',
	];
	$navigation->DisplayBottomNavigation($bottom_navigation_args);
	
?>