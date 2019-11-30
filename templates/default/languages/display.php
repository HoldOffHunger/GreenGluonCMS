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
		'rightimageenable'=>1,
	];
	
	$header->display($header_primary_args);
	
			// Basic Divider Arguments
		
		// -------------------------------------------------------------
	
	$divider_navigation_args = [
		'class'=>'width-95percent horizontal-center margin-top-14px border-2px',
	];
	
	$divider_language_description_args = [
		'class'=>'margin-5px display-inline-block horizontal-left float-left',
	];
	
	$divider_instruction_area_start_args = [
		'class'=>'width-70percent border-1px horizontal-center margin-top-22px',
	];
	
			// Get Contact Info Language
		
		// -------------------------------------------------------------
			
					// "Select Language"
				
				// -------------------------------------------------------------
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$select_language_title_text = 'Select Language';
	}
	else
	{
		$select_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesSelectLanguageTitle']);
		
		if($select_language_translations[$this->language_object->getLanguageCode()])
		{
			$select_language_title_text = $select_language_translations[$this->language_object->getLanguageCode()];
		}
		else
		{
			$select_language_title_text = 'Select Language';
		}
	}
	
			// Display About Info
		
		// -------------------------------------------------------------
	
	$divider->displaystart($divider_instruction_area_start_args);
	
	$element_text_args = [
		text=>'<center><h2 class="margin-5px font-family-tahoma">' . $select_language_title_text . ' :</h2></center>',
		indentlevel=>5,
	];
	$text->Display($element_text_args);
	
			// Display Language Options
		
		// -------------------------------------------------------------
	
	$languages->displaytiny();
			
			if($this->language_object->getLanguageCode() == 'en')
			{
				$and_text = 'And';
			}
			else
			{
				$and_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesAnd']);
				
				if($and_language_translations[$this->language_object->getLanguageCode()])
				{
					$and_text = $and_language_translations[$this->language_object->getLanguageCode()];
				}
				else
				{
					$and_text = 'And';
				}
			}
			
			if($this->language_object->getLanguageCode() == 'en')
			{
				$other_country_text = 'other country';
			}
			else
			{
				$other_country_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesOtherCountry']);
				
				if($other_country_language_translations[$this->language_object->getLanguageCode()])
				{
					$other_country_text = $other_country_language_translations[$this->language_object->getLanguageCode()];
				}
				else
				{
					$other_country_text = 'other country';
				}
			}
			
			if($this->language_object->getLanguageCode() == 'en')
			{
				$other_countries_text = 'other countries';
			}
			else
			{
				$other_countries_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesOtherCountries']);
				
				if($other_countries_language_translations[$this->language_object->getLanguageCode()])
				{
					$other_countries_text = $other_countries_language_translations[$this->language_object->getLanguageCode()];
				}
				else
				{
					$other_countries_text = 'other countries';
				}
			}
			
			$current_language_code = $this->language_object->getLanguageCode();
			
			$language_codes = $this->language_object->GetListOfLanguageCodes_any([languagecode=>$current_language_code]);
			$language_codes_alternate_list = $this->language_object->GetCountryCodeList();
			$language_flags = $this->language_object->GetListOfLanguageFlags();
			$translated_country_names_full_list = $this->country->GetTranslatedCountryNames([language=>$current_language_code]);
			
						// Display Languages
						// -------------------------------------------------------
			
			foreach($this->language_object->GetListOfNativeLanguageNames() as $native_language_key => $native_language_name)
			{
							// Gather Data
							// -------------------------------------------------------
							
				$english_language_name = $language_codes[$native_language_key];
				$language_flag_filename = $language_flags[$native_language_key];
				
							// Start Div
							// -------------------------------------------------------
				
				$divider_language_area_start_args = [
					'class'=>'border-1px margin-10px horizontal-left',
				];
				
				$divider->displaystart($divider_language_area_start_args);
				
							// Start Div
							// -------------------------------------------------------
				
				$divider_language_area_start_args = [
					'class'=>'display-inline-block horizontal-center float-left',
				];
				
				$divider->displaystart($divider_language_area_start_args);
				
							// Display Language Option
							// -------------------------------------------------------
				
				print('<p class="font-family-tahoma margin-5px">');
				
				if($current_language_code == $native_language_key)
				{
					print('<strong>');
				}
				else
				{
					print('<a href="' . str_replace('/', '', $_SERVER['SCRIPT_URL']) . '?language=' . $native_language_key . '">');
				}
				
				print('<img src="' . $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/image/flags/' . $language_flag_filename . '" style="margin:0px;">');
				
				print('<br>');
				
				print($native_language_name);
				
				if($native_language_name != $english_language_name)
				{
					print('<br>' . $english_language_name);
				}
				
				if($current_language_code == $native_language_key)
				{
					print('</strong>');
				}
				else
				{
					print('</a>');
				}
				
				print('</p>');
				#print($native_language_key . "|" . $native_language_name . "|" . $language_flag_filename . "<BR><BR>");
				
							// End Div
							// -------------------------------------------------------
				
				$divider->displayend($divider_end_args);
				
				$divider_language_code_args = [
					'class'=>'margin-5px display-inline-block horizontal-left',
				];
				
				$divider->displaystart($divider_language_code_args);
				print('<ul class="padding-0px margin-10px font-family-tahoma">');
				
				$translated_country_names = $translated_country_names_full_list[$native_language_key];
				$max_country_names = 8;
				
				if(count($translated_country_names) > $max_country_names)
				{
					$new_translated_country_names = [];
					
					$country_count_index = 0;
					$last_translated_country_names = [];
					
					foreach($translated_country_names as $translated_country_name)
					{
						$country_count_index++;
						
						if($country_count_index <= $max_country_names)
						{
							$new_translated_country_names[] = $translated_country_name;
						}
						else
						{
							$last_translated_country_names[] = $translated_country_name;
						}
					}
					
					if(count($last_translated_country_names))
					{
						
						if(count($last_translated_country_names) > 1)
						{
							$country_label = $other_countries_text;
						}
						else
						{
							$country_label = $other_country_text;
						}
						
						$new_translated_country_names[] =
							'<span title="' . implode(', ', $last_translated_country_names) . '">' .
							$and_text . ' ' . count($last_translated_country_names) . ' ' . $country_label .
							'</span>'
						;
					}
					
					$translated_country_names = $new_translated_country_names;
				}
				
				foreach($translated_country_names as $translated_country_name)
				{
					if($current_language_code != $native_language_key)
					{
						print('<a href="' . str_replace('/', '', $_SERVER['SCRIPT_URL']) . '?language=' . $native_language_key . '">');
					}
					
					print('<li class="margin-0px">');
					print($translated_country_name);
					print('</li>');
					
					if($current_language_code != $native_language_key)
					{
						print('</a>');
					}
				}
				print('</ul>');
				
				$divider->displayend($divider_end_args);
				
							// Start Div
							// -------------------------------------------------------
				
				$divider_language_area_start_args = [
					'class'=>'width-100percent horizontal-center',
				];
				
				$divider->displaystart($divider_language_area_start_args);
				
				$divider_language_area_start_args = [
					'class'=>'border-2px display-inline-block margin-10px background-color-gray13',
				];
				
				$divider->displaystart($divider_language_area_start_args);
				
				print('<p class="margin-5px font-family-arial">');
				print('<strong>');
				print(implode(' / ', $language_codes_alternate_list[$native_language_key]));
			#	print('sup?');
				print('</strong>');
				print('</p>');
				
				$divider->displayend($divider_end_args);
				
				$divider->displayend($divider_end_args);
			
						// Start Div
						// -------------------------------------------------------
			
				$divider_language_area_start_args = [
					'class'=>'clear-float',
				];
			
				$divider->displaystart($divider_language_area_start_args);
			
						// End Div
						// -------------------------------------------------------
			
				$divider->displayend($divider_end_args);
				
				$divider->displayend($divider_end_args);
			}
			
					// Display Language Options
				
				// -------------------------------------------------------------
			
			$languages->displaytiny();
			
						// End Div
						// -------------------------------------------------------
			
			$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
			// Display Final Ending Navigation
		
		// -------------------------------------------------------------
	
	$bottom_navigation_args = [
		'thispage'=>'Languages',
	];
	$navigation->DisplayBottomNavigation($bottom_navigation_args);
	
?>