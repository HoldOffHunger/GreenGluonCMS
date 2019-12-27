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
	
	require('../modules/html/languages.php');
	$languages_args = [
		'languageobject'=>$this->language_object,
		'divider'=>$divider,
		'domainobject'=>$this->domain_object,
	];
	$languages = new module_languages($languages_args);
	
	require('../modules/html/navigation.php');
	$navigation_args = [
		'globals'=>$this->globals,
		'languageobject'=>$this->language_object,
		'divider'=>$divider,
		'domainobject'=>$this->domain_object,
	];
	$navigation = new module_navigation($navigation_args);
	
			// Display Header
		
		// -------------------------------------------------------------
		
	if($this->primary_host_record['PrimaryColor']) {
		$primary_color = $this->primary_host_record['PrimaryColor'];
	} else {
		$primary_color = '6495ED';
	}
	
	$header_primary_args = [
		'title'=>'Social Media Share Center',
		'image'=>$this->primary_host_record['PrimaryImageLeft'],
		'rightimage'=>$this->primary_host_record['PrimaryImageRight'],
		'divmouseover'=>$div_mouseover,
		'imagemouseover'=>'&quot;' . $quote_text . '&quot;',
		'level'=>1,
		'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-' . $primary_color,
		'textclass'=>'padding-0px margin-0px horizontal-center vertical-center padding-top-22px',
		'imagedivclass'=>'border-2px margin-5px background-color-gray10',
		'imageclass'=>'border-1px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
	#	'rightimageenable'=>1,
	];
	
	$header->display($header_primary_args);
	
			// Basic Divider Arguments
		
		// -------------------------------------------------------------
	
	$divider_navigation_args = [
		'class'=>'width-95percent horizontal-center margin-top-14px border-2px',
	];
	
	$divider_instruction_area_start_args = [
		'class'=>'width-50percent border-1px horizontal-center margin-top-22px',
	];
	
			// Get About Info Language
		
		// -------------------------------------------------------------
	
	$about_header_title_text = 'Social Sharing';
	$about_content_text = 'Share Lineup';
	
			// Display About Info
		
		// -------------------------------------------------------------
		
				// Display About Info : Start
			
			// -------------------------------------------------------------
	
	$divider->displaystart($divider_instruction_area_start_args);
		
				// Display About Info : Content
			
			// -------------------------------------------------------------
	
	$element_text_args = [
		text=>'<center><h2 class="margin-5px font-family-tahoma">' . $about_header_title_text . ' :</h2></center>',
		indentlevel=>5,
	];
	$text->Display($element_text_args);
	
	print('<div class="padding-5px horizontal-left font-family-arial">');
	
	print('<p>Instagram : </p>');
	
	print('<ul>');
	
	print('<li>');
	print('<a href="socialmedia.php?action=login_instagram">');
	print('Login');
	print('</a>');
	print('</li>');
	
	print('<li>');
	print('<a href="socialmedia.php?action=post_instagram">');
	print('Post');
	print('</a>');
	print('</li>');

	print('</ul>');
		
				// Display About Info : End
			
			// -------------------------------------------------------------
	
	print('</div>');
	
	$divider->displayend($divider_end_args);
	
			// Display Final Ending Navigation
		
		// -------------------------------------------------------------
	
	$bottom_navigation_args = [
		'thispage'=>'',
	];
	$navigation->DisplayBottomNavigation($bottom_navigation_args);
	
?>