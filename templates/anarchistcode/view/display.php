<?php

#print_r($this->globals);
		
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
	
			// Description / Quote Languages
		
		// -------------------------------------------------------------
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$instructions_content_text = $this->master_record['description'][0]['Description'];
	}
	else
	{
		$instruction_content_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesMainInstructionsContent']);
		
		if($instruction_content_language_translations[$this->language_object->getLanguageCode()])
		{
			$instructions_content_text = $instruction_content_language_translations[$this->language_object->getLanguageCode()];
		}
		else
		{
			$instructions_content_text = $this->master_record['description'][0]['Description'];
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$quote_text = $this->master_record['quote'][0]['Quote'];
	}
	else
	{
		$image_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesMainImageQuote']);
		
		if($image_language_translations[$this->language_object->getLanguageCode()])
		{
			$quote_text = $image_language_translations[$this->language_object->getLanguageCode()];
		}
		else
		{
			$quote_text = $this->master_record['quote'][0]['Quote'];
		}
	}
	
			// Share Package
		
		// -------------------------------------------------------------
	
	require('../modules/html/socialmediasharelinks.php');
	$social_media_share_links_args = [
		'globals'=>$this->globals,
		'languageobject'=>$this->language_object,
		'divider'=>$divider,
		'domainobject'=>$this->domain_object,
		'socialmedia'=>$this->social_media,
		'socialmediasharelinkargs'=>[
			url=>$this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]),
			title=>$this->header_title_text,
			desc=>$instructions_content_text,
			provider=>$this->domain_object->primary_domain_lowercased,
		],
	];
	$social_media_share_links = new module_socialmediasharelinks($social_media_share_links_args);
	
			// Display Header
		
		// -------------------------------------------------------------
	
	$header_primary_args = [
		'title'=>$this->header_title_text,
		'image'=>$this->primary_host_record['PrimaryImageLeft'],
		'divmouseover'=>$instructions_content_text,
		'imagemouseover'=>'&quot;' . $quote_text . '&quot;',
		'level'=>1,
		'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-6495ED',
		'textclass'=>'padding-0px margin-0px horizontal-center vertical-center padding-top-22px margin-bottom-10px',
		'imagedivclass'=>'border-2px margin-5px background-color-gray10',
		'imageclass'=>'border-1px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
	];
	
	$header->display($header_primary_args);
	
			// Basic Divider Arguments
		
		// -------------------------------------------------------------
	
	$divider_main_area_start_args = [
		'class'=>'width-90percent horizontal-center padding-top-22px',
	];
	
	$divider_secondary_area_start_args = [
		'class'=>'width-90percent horizontal-center',
	];
	
	$divider_instruction_area_start_args = [
		'class'=>'width-50percent border-1px horizontal-center margin-top-22px',
	];
	
	$divider_instruction_area_text_args = [
		'class'=>'width-95percent horizontal-left',
	];
	
	$divider_note_args = [
		'class'=>'width-50percent horizontal-center float-left',
	];
	
	$divider_end_args = [
		'indentlevel'=>1,
	];
	
			// Get Instructions Language
		
		// -------------------------------------------------------------
	
	$mission_label_text = 'Mission';
	
			// Display Instructions
		
		// -------------------------------------------------------------
	
	$divider->displaystart($divider_instruction_area_start_args);
	
	$divider->displaystart($divider_instruction_area_text_args);
	
	$element_text_args = [
		text=>'<div class="padding-5px"><span class="font-family-tahoma"><b>' . $mission_label_text . ' :</b> ' . $instructions_content_text . '</span></div>',
		indentlevel=>5,
	];
	$text->Display($element_text_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
			// Children
		
		// -------------------------------------------------------------
	
	print('<center>');
	print('<div class="horizontal-center width-70percent">');
	
	for($i = 0; $i < count($this->children); $i++) {
		$child = $this->children[$i];
		
		$child_title =
			'<a href="/' . $child['Code'] . '/view.php">' .
			$child['Title'] .
			'</a>';
		
		print('<center>');
		print('<div class="horizontal-center width-95percent">');
		print('<div class="border-2px background-color-gray15 margin-5px float-left width-100percent">');

		print('<div class="border-2px background-color-gray0 margin-5px float-left">');
		print('<div class="border-2px background-color-gray0 margin-2px float-left">');
		print('<div class="background-color-gray0">');
		print('<a href="' . $child['Code'] . '/view.php">');
		print('<img src="');
		print($this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]));
		print('/image/');
		print(implode('/', str_split($child['image'][0]['FileDirectory'])));
		print('/');
		print($child['image'][0]['IconFileName']);
		print('">');
		print('</a>');
		print('</div>');
		print('</div>');
		print('</div>');
		
		print('<h2 class="horizontal-left margin-5px font-family-arial font-size-250percent">');
		print('<strong>');
		print('<a href="' . $child['Code'] . '/view.php">');
		print($child_title);
		print('</a>');
		print('</strong>');
		print('</h2>');
		
		if($child['description'][0]['Description'])
		{
			print('<p class="horizontal-left font-family-arial margin-5px">');
			
			print('<b>' . $child['description'][0]['Description'] . '</b><br>');
			
			print('</p>');
		}
		
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
	}
	
	print('</div>');
	print('</center>');
	
			// Display Social Media Options
		
		// -------------------------------------------------------------
	
	$social_media_share_links->display();
	
			// Display Language Options
		
		// -------------------------------------------------------------
	
	$languages->display();
	
			// Display Final Ending Navigation
		
		// -------------------------------------------------------------
	
	$bottom_navigation_args = [
		'thispage'=>'Home',
	];
	$navigation->DisplayBottomNavigation($bottom_navigation_args);
	
?>