<?php
	
			// HTML Displaying
		
		// -------------------------------------------------------------
		
	if(	($this->script_format_lower == 'pdf') ||
		($this->script_format_lower == 'rtf') ||
		($this->script_format_lower == 'epub') ||
		($this->script_format_lower == 'daisy') ||
		($this->script_format_lower == 'sgml') ||
		($this->script_format_lower == 'tex') ||
		($this->script_format_lower == 'json') ||
		($this->script_format_lower == 'xml') ||
		($this->script_format_lower == 'txt') ||
		($this->script_format_lower == 'csv') ||
		($this->script_format_lower == 'opds') ||
		($this->script_format_lower == 'rdf') ||
		($this->script_format_lower == 'html' && $this->Param('printerfriendly')) ||
		($this->script_format_lower == 'html' && $this->Param('invertedcolors'))
	) {
		$html_document = '';
		
		$html_paragraphs = $this->getTermsOfServiceParagraphs();
		
		$html_document = implode("\n", $html_paragraphs);
		
		$html_document = '<h1>' . $this->GetHTMLFormatData_Title() . '</h1>' . "\n" . $html_document;
		
		if($this->script_format_lower == 'pdf') {
			$this->html_for_pdf = $html_document;
		} elseif($this->script_format_lower == 'tex') {
			$this->html_for_tex = $html_document;
		} elseif($this->script_format_lower == 'rtf') {
			$this->html_for_rtf = $html_document;
		} elseif($this->script_format_lower == 'opds' || $this->script_format_lower == 'rdf') {
			$this->record_to_use['termsofservice'] = $html_document;
		} elseif($this->script_format_lower == 'json') {
			$this->record_to_use['termsofservice'] = $html_document;
		} elseif($this->script_format_lower == 'xml' || $this->script_format_lower == 'csv') {
			$this->record_to_use['termsofservice'] = $html_document;
			$this->data_for_xml = $this->record_to_use;
		} elseif ($this->script_format_lower == 'daisy') {
			$this->html_for_daisy = $html_document;
		} elseif ($this->script_format_lower == 'sgml') {
			$this->html_for_sgml = $html_document;
		} elseif($this->script_format_lower == 'epub') {
			$this->record_to_use = $this->primary_host_record;
			$this->html_for_epub = $html_document;
		} elseif($this->script_format_lower == 'txt') {
			$text_document = strip_tags($html_document);
			
			if($this->Param('wrapped'))
			{
				$text_document = wordwrap($text_document, 75, "\n", FALSE);
			}
			
			print($text_document);
		} elseif($this->script_format_lower == 'html' && $this->Param('printerfriendly')) {
			print('<div class="font-family-arial">');
			
			print($html_document);
			
			print('</div>');
		} elseif($this->script_format_lower == 'html' && $this->Param('invertedcolors')) {
			print('<div class="font-family-arial">');
			
			print($html_document);
			
			print('</div>');
		}
	} elseif($this->script_format_lower == 'html') {
	
				// Standard Requires
			
			// -------------------------------------------------------------
	
		require('../modules/spacing.php');
		
		require('../modules/' . $this->script_format_lower . '/text.php');
		$text = new module_text;
		
		require('../modules/' . $this->script_format_lower . '/form.php');
		$form = new module_form;
		
		require('../modules/' . $this->script_format_lower . '/divider.php');
		$divider = new module_divider;
		
		require('../modules/' . $this->script_format_lower . '/table.php');
		$table = new module_table;
		
		require('../modules/' . $this->script_format_lower . '/list/generic.php');
		$generic_list = new module_genericlist;
		
		require('../modules/' . $this->script_format_lower . '/header.php');
		$header = new module_header;
		
		require('../modules/' . $this->script_format_lower . '/languages.php');
		$languages_args = [
			'languageobject'=>$this->language_object,
			'divider'=>$divider,
			'domainobject'=>$this->domain_object,
		];
		$languages = new module_languages($languages_args);
		
		require('../modules/' . $this->script_format_lower . '/navigation.php');
		$navigation_args = [
			'globals'=>$this->globals,
			'languageobject'=>$this->language_object,
			'divider'=>$divider,
			'domainobject'=>$this->domain_object,
		];
		$navigation = new module_navigation($navigation_args);
		
				// Get Info Header Language
			
			// -------------------------------------------------------------
			
		switch($this->language_object->getLanguageCode()) {
			default:
			case 'en':
				$terms_header_title_text = 'Terms and Conditions';
				break;
			
			case 'de':
				$terms_header_title_text = 'Geschäftsbedingungen';
				break;
				
			case 'es':
				$terms_header_title_text = 'Términos y Condiciones';
				break;
			
			case 'fr':
				$terms_header_title_text = 'Termes et conditions';
				break;
				
			case 'ja':
				$terms_header_title_text = '規約と条件';
				break;
				
			case 'it':
				$terms_header_title_text = 'Termini e condizioni';
				break;
				
			case 'nl':
				$terms_header_title_text = 'Voorwaarden';
				break;
				
			case 'pl':
				$terms_header_title_text = 'Regulamin';
				break;
			
			case 'pt':
				$terms_header_title_text = 'Termos e Condições';
				break;
				
			case 'ru':
				$terms_header_title_text = 'Условия и положения';
				break;
			
			case 'tr':
				$terms_header_title_text = 'Şartlar ve koşullar';
				break;
				
			case 'zh':
				$terms_header_title_text = '条款和条件';
				break;
		}
		
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
		
		if($this->primary_host_record['ThirdColor'])
		{
			$third_color = $this->primary_host_record['ThirdColor'];
		}
		else
		{
			$third_color = 'B7CEEC';
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
		
		$file_divider = [
			'class'=>'width-100percent horizontal-left margin-5px font-family-arial',
		];
		
		$divider_instruction_area_start_args = [
			'class'=>'width-50percent border-1px horizontal-center margin-top-22px',
		];
		
				// Get Info Header Language
			
			// -------------------------------------------------------------
		
		switch($this->language_object->getLanguageCode()) {
			default:
			case 'en':
				$terms_instructions_text = 'These are the terms and conditions for ' . $this->master_record['Code'] . '.';
				break;
				
			case 'de':
				$terms_instructions_text = 'Dies sind die Bedingungen für ' . $this->master_record['Code'] . '.';
				break;
				
			case 'es':
				$terms_instructions_text = 'Estos son los términos y condiciones de ' . $this->master_record['Code'] . '.';
				break;
			
			case 'fr':
				$terms_instructions_text = 'Ce sont les termes et conditions pour ' . $this->master_record['Code'] . '.';
				break;
				
			case 'ja':
				$terms_instructions_text = 'これらは' . $this->master_record['Code'] . 'の利用規約です。';
				break;
				
			case 'it':
				$terms_instructions_text = 'Questi sono i termini e le condizioni per ' . $this->master_record['Code'] . '.';
				break;
				
			case 'nl':
				$terms_instructions_text = 'Dit zijn de algemene voorwaarden voor ' . $this->master_record['Code'] . '.';
				break;
				
			case 'pl':
				$terms_instructions_text = 'Są to warunki ' . $this->master_record['Code'] . '.';
				break;
			
			case 'pt':
				$terms_instructions_text = 'Estes são os termos e condições para ' . $this->master_record['Code'] . '.';
				break;
				
			case 'ru':
				$terms_instructions_text = 'Это условия ' . $this->master_record['Code'] . '.';
				break;
			
			case 'tr':
				$terms_instructions_text = 'Bunlar ' . $this->master_record['Code'] . ' için şartlar ve koşullar.';
				break;
				
			case 'zh':
				$terms_instructions_text = '这些是' . $this->master_record['Code'] . '的条款和条件。';
				break;
		}
		
				// Privacy Policy Instructions
			
			// -------------------------------------------------------------
		
		$primary_url = $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]);
		
		$version_list_display_args = [
			'options'=>[
				'indentlevel'=>1,
				'tableheaders'=>0,
				'tableclass'=>'width-70percent horizontal-center border-2px background-color-' . $third_color . ' margin-top-14px',
				'rowclass'=>'border-1px horizontal-left',
				'cellclass'=>[
					'border-1px vertical-top',
					'border-1px width-100percent vertical-top',
				],
			],
			'list'=>[[
				$terms_instructions_text,
			]],
		];
		$generic_list->Display($version_list_display_args);
		
				// Start Top Bar
			
			// -------------------------------------------------------------
		
		print('<div class="horizontal-center width-95percent margin-top-5px">');
		
				// Breadcrumbs Info
			
			// -------------------------------------------------------------
		
		require('../modules/html/breadcrumbs.php');
		$breadcrumbs = new module_breadcrumbs(['that'=>$this, 'title'=>'Terms of Service']);
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
			
				// Alternate Formats Info
			
			// -------------------------------------------------------------
			
		require('../modules/html/alternateformats.php');
		$auth = new module_alternateformats(['that'=>$this]);
		$auth->Display();
			
				// Get Info Header Language
			
			// -------------------------------------------------------------
			
		switch($this->language_object->getLanguageCode()) {
			default:
			case 'en':
				$terms_instructions_header = $this->master_record['Code'] . ' Terms and Conditions';
				break;
				
			case 'de':
				$terms_instructions_header = $this->master_record['Code'] . '-Nutzungsbedingungen';
				break;
				
			case 'es':
				$terms_instructions_header = 'Términos y condiciones de ' . $this->master_record['Code'];
				break;
			
			case 'fr':
				$terms_instructions_header = 'Conditions générales ' . $this->master_record['Code'];
				break;
				
			case 'ja':
				$terms_instructions_header = $this->master_record['Code'] . 'の利用規約';
				break;
				
			case 'it':
				$terms_instructions_header = 'Termini e condizioni ' . $this->master_record['Code'];
				break;
				
			case 'nl':
				$terms_instructions_header = $this->master_record['Code'] . ' Algemene voorwaarden';
				break;
				
			case 'pl':
				$terms_instructions_header = 'Warunki ' . $this->master_record['Code'];
				break;
			
			case 'pt':
				$terms_instructions_header = 'Termos e Condições ' . $this->master_record['Code'];
				break;
				
			case 'ru':
				$terms_instructions_header = 'Условия использования ' . $this->master_record['Code'];
				break;
			
			case 'tr':
				$terms_instructions_header = $this->master_record['Code'] . ' Şartlar ve Koşullar';
				break;
				
			case 'zh':
				$terms_instructions_header = $this->master_record['Code'] . '条款和条件';
				break;
		}
		
				// Display Terms Policy File
			
			// -------------------------------------------------------------
		
		$divider->displaystart($divider_instruction_area_start_args);
		
		$element_text_args = [
			text=>'<center><h2 class="margin-5px font-family-tahoma">' . $terms_instructions_header . ' :</h2></center>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$divider->displaystart($file_divider);
		
		$privacy_policy_text = $this->getTermsOfService();
		$privacy_policy_text = str_replace('<p>', '<p class="margin-top-10px margin-bottom-0px text-indent-25px">', $privacy_policy_text);
		print('<div class="text-to-play-as-audio">');
		print($privacy_policy_text);
		print('</div>');
		
		$text->Display($element_text_args);
		
		$divider->displayend($divider_end_args);
		
		$divider->displayend($divider_end_args);
	
				// Display Language Options
			
			// -------------------------------------------------------------
		
		$languages->display();
		
				// Display Final Ending Navigation
			
			// -------------------------------------------------------------
		
		$bottom_navigation_args = [
			'thispage'=>'Privacy',
		];
		$navigation->DisplayBottomNavigation($bottom_navigation_args);
	}
	
?>