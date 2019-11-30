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
		'title'=>'Search by Entry Code to Find New Parent',
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
	print('<h2 class="horizontal-left margin-5px font-family-arial">Entry Code :');
	
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
	
			// Action
		
		// -------------------------------------------------------------
	
	print('<input type="hidden" name="action" value="search" />');
	
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