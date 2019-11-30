<?php
	
		// Sort Comments for Display
	
	$comment_display = [];
	
	for($i = 0; $i < count($this->comments); $i++)
	{
		$child = $this->comments[$i];
		
		$sort_key = $child['OriginalCreationDate'];
		
		if(!$sort_key)
		{
			$sort_key = $child['OriginalCreationDate'];
		}
		
		$comment_display[$sort_key] = $child;
	}
	
	uksort($comment_display, "strnatcasecmp");
	
		// Sort Likes/Dislikes for Display
	
	$likedislike_display = [];
	
	for($i = 0; $i < count($this->likedislikes); $i++)
	{
		$child = $this->likedislikes[$i];
		
		$sort_key = $child['OriginalCreationDate'];
		
		if(!$sort_key)
		{
			$sort_key = $child['OriginalCreationDate'];
		}
		
		$likedislike_display[$sort_key] = $child;
	}
	
	uksort($likedislike_display, "strnatcasecmp");
	
		// Handle Multi-Formats
	
	$html_document = '';
	
	if(	($this->script_format_lower == 'pdf') ||
		($this->script_format_lower == 'rtf') ||
		($this->script_format_lower == 'epub') ||
		($this->script_format_lower == 'daisy') ||
		($this->script_format_lower == 'sgml') ||
		($this->script_format_lower == 'tex') ||
		($this->script_format_lower == 'xml') ||
		($this->script_format_lower == 'csv') ||
		($this->script_format_lower == 'sgml') ||
		($this->script_format_lower == 'json') ||
		($this->script_format_lower == 'opds') ||
		($this->script_format_lower == 'txt') ||
		($this->script_format_lower == 'rdf') ||
		($this->script_format_lower == 'html' && $this->Param('printerfriendly')) ||
		($this->script_format_lower == 'html' && $this->Param('invertedcolors'))
	) {
		$html_document .= '<h1>';
		$html_document .= 'User Export For : ';
		$html_document .= $this->user['Username'];
		$html_document .= '</h1>';
		
		$html_document .= "\n";
		
		$html_document .= '<h2>';
		$html_document .= 'User # : ' . $this->user['id'];
		$html_document .= '</h2>';
		
		$html_document .= "\n";
			
		$date_time_pieces = explode(' ', $this->user['OriginalCreationDate']);
		$event_date = $date_time_pieces[0];
		$event_time = $date_time_pieces[1];
		$date_epoch_time = strtotime($event_date);
		$full_date = date("F d, Y", $date_epoch_time);
		
		$html_document .= '<p><b>Joined the Community on :</b> ' . $full_date . '</p>';
		
		$html_document .= "\n";
		
		$html_document .= '<h3>';
		$html_document .= 'Comments : ';
		$html_document .= $this->comments_count;
		$html_document .= '</h3>';
		
		$html_document .= "\n";
		
		$type_nicename = 'Comment';
		
		foreach(array_reverse($comment_display) as $comment)
		{
			$entry = $comment['entry'];
			
			$html_document .= '<p>' . $type_nicename . ' id : ' . $comment['id'];
			
			$html_document .=  ' ; ' . $type_nicename . ' Posted on : ' . $comment['OriginalCreationDate'];
			
			$html_document .=  ' ; ' . $type_nicename . ' Entryid : ' . $entry['id'];
			
			$html_document .= '</p>';
			
			$html_document .= "\n";
			
			$html_document .= '<p>';
			
			$parent_codes = [];
			
			for($i = 0; $i < count($entry['parents']); $i++) {
				$parent = $entry['parents'][$i];
				
				$parent_codes[] = $parent['Title'];
			}
			
			$html_document .= implode(' :: ', $parent_codes);
			
			$html_document .= "\n";
			
			$html_document .= htmlspecialchars($comment['Comment']);
			
			$html_document .= '</p>';
			
			$html_document .= "\n";
		}
		
		$html_document .= "\n";
		
		$html_document .= '<h3>';
		$html_document .= 'Likes/Dislikes : ';
		$html_document .= $this->likes_count;
		$html_document .= '</h3>';
		
		$html_document .= "\n";
		
		$type_nicename = 'Like/Dislike';
		
		foreach(array_reverse($likedislike_display) as $comment)
		{
			$entry = $comment['entry'];
			
			$html_document .= '<p>' . $type_nicename . ' id : ' . $comment['id'] . ' ; ';
			
			$html_document .= 'Liked or Disliked : ';
			
			if($comment['LikeOrDislike'] == 1) {
				$html_document .= 'Liked';
			} else {
				'Disliked';
			}
			
			$html_document .=  ' ; ' . $type_nicename . ' Posted on : ' . $comment['OriginalCreationDate'];
			
			$html_document .=  ' ; ' . $type_nicename . ' Entryid : ' . $entry['id'];
			
			$html_document .= '</p>';
			
			$html_document .= "\n";
			
			$html_document .= '<p>';
			
			$parent_codes = [];
			
			for($i = 0; $i < count($entry['parents']); $i++) {
				$parent = $entry['parents'][$i];
				
				$parent_codes[] = $parent['Title'];
			}
			
			$html_document .= implode(' :: ', $parent_codes);
			
			$html_document .= '</p>';
			
			$html_document .= "\n";
		}
	}
	
	if($this->script_format_lower == 'txt') {
		$text_document = strip_tags($html_document);
		
		if($this->Param('wrapped'))
		{
			$text_document = wordwrap($text_document, 75, "\n", FALSE);
		}
		
		print($text_document);
	} elseif ($this->script_format_lower == 'pdf') {
		$this->html_for_pdf = $html_document;
	} elseif($this->script_format_lower == 'epub') {
		$this->record_to_use = $this->primary_host_record;
		$this->html_for_epub = $html_document;
	} elseif ($this->script_format_lower == 'daisy') {
		$this->html_for_daisy = $html_document;
	} elseif($this->script_format_lower == 'tex') {
		$this->html_for_tex = $html_document;
	} elseif($this->script_format_lower == 'opds' || $this->script_format_lower == 'rdf') {
		$this->record_to_use['comments'] = $comment_display;
		$this->record_to_use['likesdislikes'] = $likedislike_display;
		$this->record_to_use['userdata'] = $html_document;
	} elseif($this->script_format_lower == 'xml' || $this->script_format_lower == 'csv') {
		$this->record_to_use['comments'] = $comment_display;
		$this->record_to_use['likesdislikes'] = $likedislike_display;
		$this->record_to_use['userdata'] = $html_document;
		$this->data_for_xml = $this->record_to_use;
	} elseif ($this->script_format_lower == 'rtf') {
		$this->html_for_rtf = $html_document;
	} elseif ($this->script_format_lower == 'sgml') {
		$this->html_for_sgml = $html_document;
	} elseif($this->script_format_lower == 'json') {
		$this->record_to_use['comments'] = $comment_display;
		$this->record_to_use['likesdislikes'] = $likedislike_display;
		$this->record_to_use['userdata'] = $html_document;
	} elseif($this->script_format_lower == 'html' && $this->Param('printerfriendly')) {
		print('<div class="font-family-arial">');
		
		print($html_document);
		
		print('</div>');
	} elseif ($this->script_format_lower == 'html') {
		
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
	
	$header_primary_args = [
		'title'=>'Export User : ' . $this->user['Username'],
		'image'=>'3/f/0/k/marina_ginesta-icon.jpg',
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
		
		$link_list = '';
		
		for($i = 0; $i < $record_list_count; $i++)
		{
			$record = $this->record_list[$i];
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
		
		print(' &gt;&gt; ');
		print('<a href="users.php?action=viewuser');
		if(!$this->Param('userid'))
		{
			print('&user=' . urlencode($this->user['Username']));
		}
		else
		{
			print('&userid=' . $this->user['id']);
		}
		print('">');
		print($this->user['Username']);
		print('</a>');
		
		print(' &gt;&gt; Export User');
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
	
			
						// All Formats
					
					// -------------------------------------------------------------
			
			$full_user_name = urlencode($this->user['Username']);
			
			$formats = [
				[
					text=>'Mobile<br>Version',
					image=>'mobile-icon.jpg',
					url=>'users.php?action=exportuser&mobilefriendly=1&user=' . $full_user_name,
				],
				[
					text=>'PDF<br>File',
					image=>'pdf-file-icon.jpg',
					url=>'users.pdf?action=exportuser&user=' . $full_user_name,
				],
				[
					text=>'Printer<br>Friendly',
					image=>'printer-friendly-icon.jpg',
					url=>'users.php?action=exportuser&printerfriendly=1&user=' . $full_user_name,
				],
				[
					text=>'Plaintext<br>File',
					image=>'plaintext-format-icon.jpg',
					url=>'users.txt?action=exportuser&user=' . $full_user_name,
				],
				[
					text=>'Wrapped<br>Plaintext',
					image=>'wrapped-plaintext-format-icon.jpg',
					url=>'users.txt?action=exportuser&wrapped=1&user=' . $full_user_name,
				],
				[
					text=>'Inverted<br>Colors',
					image=>'colors-inverted-icon.jpg',
					url=>'users.php?action=exportuser&invertedcolors=1&user=' . $full_user_name,
				],
				[
					text=>'RTF<br>File',
					image=>'rtf-file-icon.jpg',
					url=>'users.rtf?action=exportuser&user=' . $full_user_name,
				],
				[
					text=>'Epub<br>File',
					image=>'epub-file-icon.jpg',
					url=>'users.epub?action=exportuser&user=' . $full_user_name,
				],
				[
					text=>'DAISY<br>Format',
					image=>'daisy-format-icon.jpg',
					url=>'users.daisy?action=exportuser&user=' . $full_user_name,
				],
				[
					text=>'SGML<br>Format',
					image=>'sgml-format-icon.jpg',
					url=>'users.sgml?action=exportuser&user=' . $full_user_name,
				],
				[
					text=>'JSON<br>Format',
					image=>'json-format-icon.jpg',
					url=>'users.json?action=exportuser&user=' . $full_user_name,
				],
				[
					text=>'XML<br>Format',
					image=>'xml-format-icon.jpg',
					url=>'users.xml?action=exportuser&user=' . $full_user_name,
				],
				[
					text=>'CSV<br>Format',
					image=>'csv-format-icon.jpg',
					url=>'users.csv?action=exportuser&user=' . $full_user_name,
				],
				[
					text=>'Latex<br>Format',
					image=>'latex-format-icon.jpg',
					url=>'users.tex?action=exportuser&user=' . $full_user_name,
				],
				[
					text=>'OPDS<br>Format',
					image=>'opds-format-icon.jpg',
					url=>'users.opds?action=exportuser&user=' . $full_user_name,
				],
				[
					text=>'RDF<br>Format',
					image=>'rdf-format-icon.jpg',
					url=>'users.rdf?action=exportuser&user=' . $full_user_name,
				],
			];
			
			if($this->mobile_friendly)
			{
				$formats[0] = [
					text=>'Standard<br><nobr>PC Format</nobr>',
					image=>'',
					url=>'users.php?action=exportuser&user=' . $full_user_name,
				];
			}
			
			$formats_count = count($formats);
			
			for($i = 0; $i < $formats_count; $i++)
			{
				$format = $formats[$i];
				
				print('<div class="border-2px background-color-gray15 margin-5px float-left">');
				print('<div class="margin-5px font-family-arial">');
				
				if(!$this->mobile_friendly)
				{
					print('<div class="margin-2px">');
					print('<a href="');
					print($format['url']);
					print('">');
					print('<img src="');
					print($this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]));
					print('/image/');
					print($format['image']);
					print('">');
					print('</a>');
					print('</div>');
				}
				
				print('<p class="margin-0px font-family-arial font-size-75percent">');
				print('<a href="');
				print($format['url']);
				print('">');
				print($format['text']);
				print('</a>');
				print('</p>');
				print('</div>');
				print('</div>');
			}
			
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
	
			// View Browsing Numbers
		
		// -------------------------------------------------------------
	
	print('<center>');
	print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-90percent font-family-tahoma">');
	print('<div class="horizontal-left margin-5px">');
			
		$date_time_pieces = explode(' ', $this->user['OriginalCreationDate']);
		$event_date = $date_time_pieces[0];
		$event_time = $date_time_pieces[1];
		$date_epoch_time = strtotime($event_date);
		$full_date = date("F d, Y", $date_epoch_time);
		
		print('<p><b>Joined the Community on :</b> ' . $full_date . '</p>');
	
	print('</div>');
	print('</div>');
	print('</center>');
	
			// View Browsing Numbers
		
		// -------------------------------------------------------------
	
	$header_secondary_args = [
		'title'=>'View Comments : ' . $this->comments_count . ' Comments',
		'imagemouseover'=>$this->total_pages . ' Total Pages Available',
		'divmouseover'=>$this->total_children_viewed . ' Items Viewed, ' . $this->total_children_left . ' Remaining to Be Viewed',
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
	
			// Finish Top Two Displays
		
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
	
	print('<div class="horizontal-center width-95percent">');
	
	$header_secondary_args = [
		'title'=>'Start Comments',
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
	
			// View Selected Record List Pages
		
		// -------------------------------------------------------------
	
	$type_nicename = 'Comment';
	
	foreach(array_reverse($comment_display) as $comment)
	{
		$entry = $comment['entry'];
		
		print('<center><div class="horizontal-center width-90percent">');
	
		print('<div class="horizontal-left width-100percent background-color-gray14 border-2px margin-top-5px font-family-arial">');
		
		print('<div class="horizontal-center width-90percent">');
		print('<div class="horizontal-left width-100percent">');
		
		print('<p>' . $type_nicename . ' id : ' . $comment['id'] . '</p>');
		print('<p>' . $type_nicename . ' Posted on : ' . $comment['OriginalCreationDate'] . '</p>');
		print('<p>' . $type_nicename . ' Last edited on : ' . $comment['LastModificationDate'] . '</p>');
		print('<p>' . $type_nicename . ' Entry id : ' . $entry['id'] . '</p>');
		print('<p>' . $type_nicename . ' Entry : ');
		
		print('<a href="/');
		
		$parent_codes = [];
		
		for($i = 0; $i < count($entry['parents']); $i++) {
			$parent = $entry['parents'][$i];
			
			$parent_codes[] = $parent['Code'];
		}
		
		print(implode('/', $parent_codes));
		
		print('/view.php">');
		
		print($entry['Title']);
		
		if($entry['Subtitle']) {
			print(' : ');
			print($entry['Subtitle']);
		}
		
		print('</a>');
		print('</p>');
		print('<p>' . $type_nicename . ' : ' . htmlspecialchars($comment['Comment']) . '</p>');
		
	#	print_r($comment);
		
		print('</div>');
		print('</div>');
		#print_r($comment);
		
		print('</div>');
		print('</div>');
	}
	
	#print_r($child_display);
	
			// View Selected Record List Pages
		
		// -------------------------------------------------------------
	
	print('<div class="horizontal-center width-95percent">');
	
	$header_secondary_args = [
		'title'=>'End Comments',
		'divmouseover'=>'Navigate to another page of results by using these links.',
		'level'=>3,
		'divclass'=>'width-100percent border-2px background-color-gray13 margin-top-5px',
		'textclass'=>'padding-0px margin-5px horizontal-center vertical-center font-family-arial',
		'imagedivclass'=>'border-2px margin-5px background-color-gray10',
		'imageclass'=>'border-1px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>0,
		'rightimageenable'=>0,
	];
	$header->display($header_secondary_args);
	
	print('</div>');
	
			// View Browsing Numbers
		
		// -------------------------------------------------------------
	
	$header_secondary_args = [
		'title'=>'View Likes/Dislikes : ' . $this->likes_count . ' Likes/Dislikes',
		'imagemouseover'=>$this->total_pages . ' Total Pages Available',
		'divmouseover'=>$this->total_children_viewed . ' Items Viewed, ' . $this->total_children_left . ' Remaining to Be Viewed',
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
	
			// Finish Top Two Displays
		
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
	
	print('<div class="horizontal-center width-95percent">');
	
	$header_secondary_args = [
		'title'=>'Start Likes/Dislikes',
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
	
			// View Selected Record List Pages
		
		// -------------------------------------------------------------
	
	$type_nicename = 'Like/Dislike';
	
	foreach(array_reverse($likedislike_display) as $comment)
	{
		$entry = $comment['entry'];
		
		print('<center><div class="horizontal-center width-90percent">');
	
		print('<div class="horizontal-left width-100percent background-color-gray14 border-2px margin-top-5px font-family-arial">');
		
		print('<div class="horizontal-center width-90percent">');
		print('<div class="horizontal-left width-100percent">');
		
		print('<p>' . $type_nicename . ' id : ' . $comment['id'] . '</p>');
		print('<p>');
		print('Liked or Disliked : ');
		
		if($comment['LikeOrDislike'] == 1) {
			print('Liked');
		} else {
			print('Disliked');
		}
		
		print('</p>');
		print('<p>' . $type_nicename . ' Posted on : ' . $comment['OriginalCreationDate'] . '</p>');
		print('<p>' . $type_nicename . ' Entry id : ' . $entry['id'] . '</p>');
		print('<p>' . $type_nicename . ' Entry : ');
		
		print('<a href="/');
		
		$parent_codes = [];
		
		for($i = 0; $i < count($entry['parents']); $i++) {
			$parent = $entry['parents'][$i];
			
			$parent_codes[] = $parent['Code'];
		}
		
		print(implode('/', $parent_codes));
		
		print('/view.php">');
		
		print($entry['Title']);
		
		if($entry['Subtitle']) {
			print(' : ');
			print($entry['Subtitle']);
		}
		
		print('</a>');
		print('</p>');
		
	#	print_r($comment);
		
		print('</div>');
		print('</div>');
		#print_r($comment);
		
		print('</div>');
		print('</div>');
	}
	
	#print_r($child_display);
	
			// View Selected Record List Pages
		
		// -------------------------------------------------------------
	
	print('<div class="horizontal-center width-95percent">');
	
	$header_secondary_args = [
		'title'=>'End Likes/Dislikes',
		'divmouseover'=>'Navigate to another page of results by using these links.',
		'level'=>3,
		'divclass'=>'width-100percent border-2px background-color-gray13 margin-top-5px',
		'textclass'=>'padding-0px margin-5px horizontal-center vertical-center font-family-arial',
		'imagedivclass'=>'border-2px margin-5px background-color-gray10',
		'imageclass'=>'border-1px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>0,
		'rightimageenable'=>0,
	];
	$header->display($header_secondary_args);
	
	print('</div>');
	
			// Display Final Ending Navigation
		
		// -------------------------------------------------------------
	
	$bottom_navigation_args = [
		'thispage'=>'',
	];
	$navigation->DisplayBottomNavigation($bottom_navigation_args);
	
	/*
	print("BT: view.php script, display.php template<BR><BR>");
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
	}
	
?>