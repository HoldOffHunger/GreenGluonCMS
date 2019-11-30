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
	
	print('<p class="horizontal-left margin-5px font-family-tahoma">');
	print('Search by entry Code for an entry to transfer to.');
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
	
			// Display Results
		
		// -------------------------------------------------------------
	
	print('<center>');
	print('<div class="horizontal-center width-50percent">');
	print('<div class="border-2px background-color-gray15 margin-5px horizontal-center">');
	print('<h2 class="horizontal-left margin-5px font-family-arial">Transfer Results : ');
	
	if($this->conflicting_entry_count) {
		print("FAIL");
	} else {
		print("SUCCESS");
	}
	
	print('</h2>');
	print('</div>');
	print('</div>');
	print('</center>');
	
			// Display Results - 2
		
		// -------------------------------------------------------------
	
	print('<center>');
	print('<div class="horizontal-center width-70percent">');
	print('<div class="border-2px background-color-gray15 margin-5px horizontal-left">');
	print('<h2 class="horizontal-left margin-5px font-family-arial">Transfer Results : </h2>');
	
	if($this->conflicting_entry_count) {
		print("Could not make a transfer, because the transfer-to parent already has a child with this Code.");
	} else {
		print("New record, excellent!");
		print("<BR><BR>");
		
		$record_list = $this->record_list;
		
		$old_parent_codes = [];
		$old_parent_titles = [];
		
		foreach($record_list as $old_parent) {
			if($old_parent['Code'] != $this->entry['Code']) {
				$old_parent_codes[] = $old_parent['Code'];
				$old_parent_titles[] = $old_parent['Title'];
			}
		}
		
		$full_parent_code = implode('/', $old_parent_codes);
		$full_parent_title = implode(' / ', $old_parent_titles);
		
		print('Old Parent : <a href="/');
		print($full_parent_code);
		print('/view.php?action=index" target="_blank">');
		print($full_parent_title);
		print('</a>');
		print('<BR><BR>');
		
		print('Old Location : <a href="/');
		print($full_parent_code);
		print('/' . $this->entry['Code']);
		print('/view.php?action=index" target="_blank">');
		print($full_parent_title);
		print(' / ' . $this->entry['Title']);
		print('</a>');
		print('<BR><BR>');
		
		$parent_results = $this->new_parent_results;
		$parents = $parent_results['parents'];
		
		$parent_codes = [];
		$parent_titles = [];
		
		foreach($parents as $parent) {
			$parent_codes[] = $parent['Code'];
			$parent_titles[] = $parent['Title'];
		}
		
		$full_parent_code = implode('/', $parent_codes);
		$full_parent_title = implode(' / ', $parent_titles);
		
		print('New Parent : <a href="/');
		print($full_parent_code);
		print('/view.php?action=index" target="_blank">');
		print($full_parent_title);
		print('</a>');
		print('<BR><BR>');
		
		$parent_codes[] = $this->entry['Code'];
		$parent_titles[] = $this->entry['Title'];
		
		$full_parent_code = implode('/', $parent_codes);
		$full_parent_title = implode(' / ', $parent_titles);
		
		print('New Location : <a href="/');
		print($full_parent_code);
		print('/view.php?action=index" target="_blank">');
		print($full_parent_title);
		print('</a>');
		print('<BR><BR>');
		
		print('New Assignment : <BR>');
		print("<PRE>");
		print_r($this->entry_update);
		print("</PRE>");
	}
	
	print('</h2>');
	print('</div>');
	print('</div>');
	print('</center>');
	
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