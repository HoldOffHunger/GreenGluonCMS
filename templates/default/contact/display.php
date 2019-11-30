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
	
			// Get Info Header Language
		
		// -------------------------------------------------------------
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$div_mouseover = $this->master_record['description'][0]['Description'];
	}
	else
	{
		$instructions_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesMainInstructionsContent']);
		
		if($instructions_language_translations[$this->language_object->getLanguageCode()])
		{
			$div_mouseover = $instructions_language_translations[$this->language_object->getLanguageCode()];
		}
		else
		{
			$div_mouseover = $this->master_record['description'][0]['Description'];
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
	
			// Display Header
		
		// -------------------------------------------------------------
		
	if($this->primary_host_record['PrimaryColor'])
	{
		$primary_color = $this->primary_host_record['PrimaryColor'];
	}
	else
	{
		$primary_color = '6495ED';
	}
	
	$header_primary_args = [
		'title'=>$this->header_title_text,
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
	
			// Get Contact Info Language
		
		// -------------------------------------------------------------
			
					// "Contact Us"
				
				// -------------------------------------------------------------
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$contact_us_title_text = 'Contact Us';
	}
	else
	{
		$contact_us_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesContactUs']);
		
		if($contact_us_language_translations[$this->language_object->getLanguageCode()])
		{
			$contact_us_title_text = $contact_us_language_translations[$this->language_object->getLanguageCode()];
		}
		else
		{
			$contact_us_title_text = 'Contact Us';
		}
	}
			
					// "Site Creator"
				
				// -------------------------------------------------------------
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$site_creator_text = 'Site Creator';
	}
	else
	{
		$contact_site_creator_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesSiteCreator']);
		
		if($contact_site_creator_language_translations[$this->language_object->getLanguageCode()])
		{
			$site_creator_text = $contact_site_creator_language_translations[$this->language_object->getLanguageCode()];
		}
		else
		{
			$site_creator_text = 'Site Creator';
		}
	}
			
					// "Site Created On"
				
				// -------------------------------------------------------------
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$site_created_on_text = 'Site Created On';
	}
	else
	{
		$contact_site_created_on_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesSiteCreatedOn']);
		
		if($contact_site_created_on_language_translations[$this->language_object->getLanguageCode()])
		{
			$site_created_on_text = $contact_site_created_on_language_translations[$this->language_object->getLanguageCode()];
		}
		else
		{
			$site_created_on_text = 'Site Created On';
		}
	}
			
					// "Contact Creator"
				
				// -------------------------------------------------------------
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$contact_creator_text = 'Contact Creator';
	}
	else
	{
		$contact_creator_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesContactCreator']);
		
		if($contact_creator_language_translations[$this->language_object->getLanguageCode()])
		{
			$contact_creator_text = $contact_creator_language_translations[$this->language_object->getLanguageCode()];
		}
		else
		{
			$contact_creator_text = 'Contact Creator';
		}
	}
	
			// Display About Info
		
		// -------------------------------------------------------------
	
	$divider->displaystart($divider_instruction_area_start_args);
	
	$element_text_args = [
		text=>'<center><h2 class="margin-5px font-family-tahoma">' . $contact_us_title_text . ' :</h2></center>',
		indentlevel=>5,
	];
	$text->Display($element_text_args);
	
	$contact_creator_value = $this->primary_host_record['Contact'];
	if(strpos($contact_creator_value, '@') !== false) {
		$contact_creator_value = '<a href="mailto:' . $contact_creator_value . '">' . $contact_creator_value . '</a>';
	}
	
	$element_text_args = [
		text=>
			'<div class="padding-5px horizontal-left font-family-arial">' .
			'<p class="margin-0px margin-top-5px"><strong>' . $site_creator_text . ' :</strong> ' . $this->primary_host_record['Creator'] . '</p>' .
			'<p class="margin-0px margin-top-5px"><strong>' . $site_created_on_text . ' :</strong> ' . $this->primary_host_record['PublicReleaseDate'] . '</p>' .
			'<p class="margin-0px margin-top-5px"><strong>' . $contact_creator_text . ' :</strong> ' . $contact_creator_value . '</p>' .
			'</div>',
		indentlevel=>5,
	];
	$text->Display($element_text_args);
	
	$divider->displayend($divider_end_args);
	
			// Display Final Ending Navigation
		
		// -------------------------------------------------------------
	
	$bottom_navigation_args = [
		'thispage'=>'Contact',
	];
	$navigation->DisplayBottomNavigation($bottom_navigation_args);
	
?>