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
		'title'=>$this->user['Username'],
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
	
			// About Header
		
		// -------------------------------------------------------------
		
	print('<a name="about"></a>');
	
	print('<center>');
	print('<div class="horizontal-center width-95percent">');
	print('<div class="border-2px background-color-gray15 margin-5px float-left">');
	print('<h2 class="horizontal-left margin-5px font-family-arial">');
	print('About');
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
	
			// About Info
		
		// -------------------------------------------------------------
	
	print('<center>');
	print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-90percent font-family-tahoma">');
	print('<div class="horizontal-left margin-5px">');
	
	$date_time_pieces = explode(' ', $this->user['OriginalCreationDate']);
	$event_date = $date_time_pieces[0];
	$event_time = $date_time_pieces[1];
	$date_epoch_time = strtotime($event_date);
	$full_date = date("F d, Y", $date_epoch_time);
	
	print('<p class="margin-0px">');
	print('<b>Joined the Community on :</b> ' . $full_date . '.');
	print('</p>');
	
	print('</div>');
	print('</div>');
	print('</center>');
	
			// Comments Header
		
		// -------------------------------------------------------------
		
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
	
			// Display Comments
		
		// -------------------------------------------------------------
	
	print('<center>');
	
	if($this->comments && is_array($this->comments) && count($this->comments))
	{
		print('<div class="horizontal-center width-70percent">');
		print('<div class="border-2px background-color-gray13 margin-5px horizontal-left width-33percent font-family-tahoma">');
		print('<p class="margin-5px"><nobr>Total Comments : ' . $this->comments_count . '</nobr></p>');
		print('</div>');
		print('</div>');
		
		foreach($this->comments as $comment)
		{
			print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-90percent font-family-tahoma">');
			
			unset($display_image);
			
			if($comment['entry']['image'])
			{
				$entry_images = $comment['entry']['image'];
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
			
			print('<div class="horizontal-left margin-5px">');
			
			$parent_codes = [];
			foreach($comment['entry']['parents'] as $parent)
			{
				$parent_codes[] = $parent['Code'];
			}
			
			if(count($parent_codes) > 1)
			{
				$last_parent = $comment['entry']['parents'][count($parent_codes) - 2];
			}
			elseif(count($parent_codes))
			{
				$last_parent = $comment['entry']['parents'][0];
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
			$new_parent_codes = $parent_codes;
			unset($new_parent_codes[count($new_parent_codes) - 1]);
			$parents_parent_code_url = implode('/', $new_parent_codes);
			
			print('<div class="border-2px background-color-gray15 margin-5px float-left horizontal-center">');
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
			
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<p class="horizontal-left margin-5px font-family-arial">');
			print('Posted On : ');
		
			$title_max = 50;
			
			if($last_parent && $last_parent['id'])
			{
				$title_max = 30;
			}
			
			$full_comment_title = $comment['entry']['Title'];
			
			$title_popup = 0;
			
			if(strlen($full_comment_title) > $title_max)
			{
				$full_comment_title = substr($full_comment_title, 0, $title_max) . '...';
				$title_popup = 1;
			}
			
			if($last_parent && $last_parent['id'])
			{
				$full_comment_title .= ' (in ';
				
				$full_comment_subtitle = $last_parent['Title'];
				
				if(strlen($full_comment_subtitle) > $title_max)
				{
					$full_comment_subtitle = substr($full_comment_subtitle, 0, $title_max) . '...';
					$title_popup = 1;
				}
				
				$full_comment_title .= $full_comment_subtitle;
				$full_comment_title .= ')';
			}
			
			print('<a href="' . $this->domain_object->GetPrimaryDomain([lowercase=>0, www=>1]) . '/' . implode('/', $parent_codes) . '/view.php"');
			
			if($title_poup)
			{
				print(' title="');
				print($comment['entry']['Title']);
				print(' (in ');
				print($last_parent['Title']);
				print(')');
				print('"');
			}
			
			print('>');
			
			print($full_comment_title);
			
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
			
			$comments_text = strip_tags($comment['Comment']);	
			$comments_text = $this->HyperlinkizeText(['text'=>$comments_text]);
			$comments_text = str_replace("\n", "<BR>\n", $comments_text);
			
			print($comments_text);
			
			$clear_float_divider_start_args = [
				'class'=>'clear-float',
				'indentlevel'=>5,
			];
			
			$divider->displaystart($clear_float_divider_start_args);
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
			
			$tags = $comment['entry']['tag'];
			$tag_count = count($tags);
			
			if($tag_count)
			{
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
					print($this->tag_counts[$tag['Tag']]);
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
			
			print('</div>');
			print('</div>');
		}
		
		if($this->comments_count > 3)
		{
			print('<div class="horizontal-center width-50percent">');
			print('<div class="horizontal-center width-100percent background-color-gray13 border-2px margin-top-5px">');
			print('<h3 class="margin-5px">');
			print('<a href="users.php?action=browseComments&');
			if(!$this->Param('userid'))
			{
				print('user=' . urlencode($this->user['Username']));
			}
			else
			{
				print('userid=' . $this->user['id']);
			}
			print('">');
			print('<span class="font-family-tahoma">');
			print('Browse All ' . $this->comments_count . ' Comments');
			print('</span>');
			print('</a>');
			print('</h3>');
			print('</div>');
			print('</div>');
		}
	}
	else
	{
		print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-90percent font-family-tahoma">');
		print('<div class="horizontal-left margin-5px">');
		print('No comments posted.');
		print('</div>');
		print('</div>');
	}
	
	print('</center>');
	
			// LikesDislikes Header
		
		// -------------------------------------------------------------
		
	print('<a name="likedislikes"></a>');
	
	print('<center>');
	print('<div class="horizontal-center width-95percent">');
	print('<div class="border-2px background-color-gray15 margin-5px float-left">');
	print('<h2 class="horizontal-left margin-5px font-family-arial">');
	print('Likes and Dislikes');
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
	
			// Display LikeDislikes
		
		// -------------------------------------------------------------
	
	print('<center>');
	
	if($this->likedislikes && is_array($this->likedislikes) && count($this->likedislikes))
	{
		print('<div class="horizontal-center width-70percent">');
		print('<div class="border-2px background-color-gray13 margin-5px horizontal-left width-33percent font-family-tahoma">');
		print('<p class="margin-5px"><nobr>Total Likes : ' . $this->likes_count . '</nobr></p>');
		print('</div>');
		print('</div>');
		
		print('<div class="horizontal-center width-70percent" title="Dislikes are not publicly browseable.">');
		print('<div class="border-2px background-color-gray13 margin-5px horizontal-left width-33percent font-family-tahoma">');
		print('<p class="margin-5px"><nobr>Total Dislikes : ' . $this->dislikes_count . '</nobr></p>');
		print('</div>');
		print('</div>');
		
		print('<div class="horizontal-center width-90percent">');
		
		foreach($this->likedislikes as $likedislike)
		{
			$entry = $likedislike['entry'];
			$parents = $entry['parents'];
			$parents_count = count($parents);
			
			$first_parent = $parents[$parents_count - 2];
			
			if(!$first_parent)
			{
				$first_parent = $parents[$parents_count - 1];
			}
			
			print('<div class="horizontal-center width-100percent background-color-gray13 border-2px margin-top-5px">');
			
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
			
			if(count($parent_codes) > 1)
			{
				$last_parent = $entry['parents'][count($parent_codes) - 2];
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
			$new_parent_codes = $parent_codes;
			unset($new_parent_codes[count($new_parent_codes) - 1]);
			$parents_parent_code_url = implode('/', $new_parent_codes);
			
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
				$full_like_title = $entry['Title'];
			}
			else
			{
				$full_like_title = $entry['ListTitle'];
			}
			
			$original_full_like_title = $full_like_title;
			
			$title_popup = 0;
			
			if(strlen($full_like_title) > $title_max)
			{
				$full_like_title = substr($full_like_title, 0, $title_max) . '...';
				$title_popup = 1;
			}
			
			if(count($parent_codes) > 1)
			{
				if($last_parent && $last_parent['Title'])
				{
					$last_parent_title = $last_parent['Title'];
					
					if(strlen($last_parent_title) > $title_max)
					{
						$last_parent_title = substr($last_parent_title, 0, $title_max) . '...';
						$title_popup = 1;
					}
					
					$full_like_title .= ' (From ';
					$full_like_title .= $last_parent_title;
					$full_like_title .= ')';
				}
			}
			else
			{
				unset($last_parent);
			}
			
			$entry_title = '<a href="';
			$entry_title .= $parent_code_url;
			$entry_title .= '/view.php';
			
			if($extra_action)
			{
				$entry_title .= '&action=' . $extra_action;
			}
			
			$entry_title .= '"';
			
			if($title_popup)
			{
				$entry_title .= ' title="';
				$entry_title .= $original_full_like_title;
				
				if($last_parent)
				{
					$entry_title .= ' (From ';
					$entry_title .= $last_parent['Title'];
					$entry_title .= ')';
				}
				
				$entry_title .= '"';
			}
			
			$entry_title .= '>';
			
			$entry_title .= $full_like_title;
			
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
			
			print('<div class="border-2px background-color-gray15 margin-5px float-right">');
			print('<p class="horizontal-right margin-5px font-family-arial">');
			print('Liked On : ');
			$date_epoch_time = strtotime($likedislike['OriginalCreationDate']);
			$full_date = date("F d, Y; H:i:s", $date_epoch_time);
			print($full_date);
			print('</p>');
			print('</div>');
			
			print('<p class="horizontal-left margin-5px font-family-arial">');
			
			$time_frame = '';
			
			if($entry['eventdate'])
			{
				$entry_event_count = count($entry['eventdate']);
				for($i = 0; $i < $entry_event_count; $i++)
				{
					$entry_event = $entry['eventdate'][$i];
						
					if($entry_event['Title'] == 'Publication')
					{
						$publication_event = $entry_event;
					}
					elseif($entry_event['Title'] == 'Birth Day')
					{
						$birth_event = $entry_event;
					}
					elseif($entry_event['Title'] == 'Death Day')
					{
						$death_event = $entry_event;
					}
					
					if($publication_event || ($birth_event && $death_event))
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
					
					unset($publication_event);
				}
				elseif($birth_event || $death_event)
				{
					$time_frame .= '(';
					
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
			
			print('<strong>');
			
			if($time_frame)
			{
				print($time_frame);
			}
			
			if($entry['textbody'] && count($entry['textbody']))
			{
				if($time_frame)
				{
					print(' ~ ');
				}
				
				$first_textbody = $entry['textbody'][0];
				
				print('(');
				print(number_format($first_textbody['WordCount']));
				print(' Words / ');
				print(number_format($first_textbody['CharacterCount']));
				print(' Characters');
				print(')');
			}
			print('</strong> ');
			
			if($entry['description'])
			{
				$description = $entry['description'][0];
				
				if($description && $description['Description'])
				{
					print('<em>');
					if($time_frame || $entry['Subtitle'])
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
				if($entry['textbody'])
				{
					$text_bodies = $entry['textbody'];
					
					$text_body_count = count($text_bodies);
					if($text_body_count)
					{
						$text_display = $text_bodies[0]['FirstThousandCharacters'];
						if(!$text_display)
						{
							$text_display = $text_bodies[0]['Text'];
						}
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
					$grand_children = $entry['children'];
					if($grand_children && is_array($grand_children))
					{
						$grand_children_count = count($grand_children);
						
						if($grand_children_count)
						{
							$grand_child_display = [];
							
							for($i = 0; $i < count($grand_children); $i++)
							{
								$entry = $grand_children[$i];
								
								$sort_key = $entry['ListTitle'];
								
								if(!$sort_key)
								{
									$sort_key = $entry['Title'];
								}
								
								$grand_child_display[$sort_key] = $entry;
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
							
							$text_display = $grand_child['FirstThousandCharacters'];
							if(!$text_display)
							{
								$text_display = $grand_child[0]['Text'];
							}
							$text_display = strip_tags($text_display);
							
							if(strlen($text_display) > 750)
							{
								$text_display = substr($text_display, 0, 750) . '...';
							}
							print($text_display);
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
			
			if($entry['tag'])
			{
				$tag_count = count($entry['tag']);
				
				if($tag_count)
				{
					$tags = $entry['tag'];
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
						print($this->tag_counts[$tag['Tag']]);
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
		
		if($this->likes_count > 3)
		{
			print('<div class="horizontal-center width-50percent">');
			print('<div class="horizontal-center width-100percent background-color-gray13 border-2px margin-top-5px">');
			print('<h3 class="margin-5px">');
			print('<a href="users.php?action=browseLikes&');
			if(!$this->Param('userid'))
			{
				print('user=' . urlencode($this->user['Username']));
			}
			else
			{
				print('userid=' . $this->user['id']);
			}
			print('">');
			print('<span class="font-family-tahoma">');
			print('Browse All ' . $this->likes_count . ' Likes');
			print('</span>');
			print('</a>');
			print('</h3>');
			print('</div>');
			print('</div>');
		}
	}
	else
	{
		print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-90percent font-family-tahoma">');
		print('<div class="horizontal-left margin-5px">');
		print('No likes or dislikes.');
		print('</div>');
		print('</div>');
	}
	
	print('</center>');
	
			// DEBUG
		
		// -------------------------------------------------------------
	
#	print("BT: INDEX view.php script, display.php template, entryOF-people<BR><BR>");
	
	/*
	print("<PRE>RECORD LIST:");
	print_r($this->record_list);
	print("\n\nMASTER RECORD:\n\n");
	print_r($this->master_record);
	print("\n\nPARENT:\n\n");
	print_r($this->parent);
	print("\n\nENTRY:\n\n");
	print_r($this->entry);
	print("\n\nentryREN:\n\n");
	print_r($this->entryren);
	print("</PRE>");
	*/
	
			// Display Final Ending Navigation
		
		// -------------------------------------------------------------
	
	$bottom_navigation_args = [
		'thispage'=>'',
	];
	$navigation->DisplayBottomNavigation($bottom_navigation_args);
	
?>