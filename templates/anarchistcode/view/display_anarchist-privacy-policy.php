<?php
	
			// Privacy Policy Text
		
		// -------------------------------------------------------------

	require('../traits/scripts/PrivacyPolicy.php');
	
	class priv extends basicscript {
		use PrivacyPolicy;
		
		public function __construct($args) {
			$this->language_object = $args['languageobject'];
		}
	}
	$privacy_policy = new priv([
		'languageobject'=>$this->language_object,
	]);
	$html_paragraphs = $privacy_policy->getPrivacyPolicyParagraphs();
	
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
		
		$html_document = implode("\n", $html_paragraphs);
		
		$html_document = '<h1>' . $this->GetHTMLFormatData_Title() . '</h1>' . "\n" . $html_document;
		
		if($this->script_format_lower == 'pdf') {
			$this->html_for_pdf = $html_document;
		} elseif($this->script_format_lower == 'tex') {
			$this->html_for_tex = $html_document;
		} elseif($this->script_format_lower == 'rtf') {
			$this->html_for_rtf = $html_document;
		} elseif($this->script_format_lower == 'opds' || $this->script_format_lower == 'rdf') {
			$this->record_to_use['privacypolicy'] = $html_document;
		} elseif($this->script_format_lower == 'json') {
			$this->record_to_use['privacypolicy'] = $html_document;
		} elseif($this->script_format_lower == 'xml' || $this->script_format_lower == 'csv') {
			$this->record_to_use['privacypolicy'] = $html_document;
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
		
		$primary_image = false;
		
		if(!$this->mobile_friendly)
		{
			$width_attribute = '';
			$vertical_attribute = '';
			
			if($this->entry)
			{
				$image_count = count($this->entry['image']);
				
				if($image_count)
				{
					$primary_image = implode('/', str_split($this->entry['image'][0]['FileDirectory'])) . '/' . $this->entry['image'][0]['IconFileName'];
					$primary_image_text = $this->entry['image'][0]['Title'];
					$width_attribute = ' width-200px height-200px';
					$vertical_attribute = ' vertical-specialcenter';
				}
			}
			
			if(!$primary_image)
			{
				$primary_image = $this->primary_host_record['PrimaryImageLeft'];
				$primary_image_text = $this->primary_host_record['Classification'];
			}
		}
		
		$header_primary_args = [
			'title'=>$this->header_title_text,
			'image'=>$primary_image,
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
				$privacy_instructions_text = 'This is the privacy policy for Anarchism.';
				break;
				
			case 'de':
				$privacy_instructions_text = 'Dies ist die Datenschutzrichtlinie für ' . $this->master_record['Code'] . '.';
				break;
				
			case 'es':
				$privacy_instructions_text = 'Esta es la política de privacidad de ' . $this->master_record['Code'] . '.';
				break;
			
			case 'fr':
				$privacy_instructions_text = 'Ceci est la politique de confidentialité de ' . $this->master_record['Code'] . '.';
				break;
				
			case 'ja':
				$privacy_instructions_text = 'これは' . $this->master_record['Code'] . 'のプライバシーポリシーです。';
				break;
				
			case 'it':
				$privacy_instructions_text = 'Questa è la politica sulla privacy di ' . $this->master_record['Code'] . '.';
				break;
				
			case 'nl':
				$privacy_instructions_text = 'Dit is het privacybeleid voor ' . $this->master_record['Code'] . '.';
				break;
				
			case 'pl':
				$privacy_instructions_text = 'To jest polityka prywatności ' . $this->master_record['Code'] . '.';
				break;
			
			case 'pt':
				$privacy_instructions_text = 'Esta é a política de privacidade do ' . $this->master_record['Code'] . '.';
				break;
				
			case 'ru':
				$privacy_instructions_text = 'Это политика конфиденциальности для ' . $this->master_record['Code'] . '.';
				break;
			
			case 'tr':
				$privacy_instructions_text = 'Bu, ' . $this->master_record['Code'] . ' için gizlilik politikasıdır.';
				break;
				
			case 'zh':
				$privacy_instructions_text = '这是' . $this->master_record['Code'] . '的隐私政策。';
				break;
		}
		
				// Privacy Policy Instructions
			
			// -------------------------------------------------------------
		
		$primary_url = $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]);
		
		$version_list_display_args = [
			'options'=>[
				'indentlevel'=>1,
				'tableheaders'=>0,
				'tableclass'=>'font-family-arial width-70percent horizontal-center border-2px background-color-' . $third_color . ' margin-top-14px',
				'rowclass'=>'border-1px horizontal-left',
				'cellclass'=>[
					'border-1px vertical-top',
					'border-1px width-100percent vertical-top',
				],
			],
			'list'=>[[
				$privacy_instructions_text,
			]],
		];
		$generic_list->Display($version_list_display_args);
	
			// Breadcrumb Trails
		
		// -------------------------------------------------------------
	
	print('<div class="horizontal-center width-95percent margin-top-5px">');
	print('<div class="float-left border-2px background-color-gray13">');
	print('<p class="font-family-arial margin-5px">');
	
	if($this->master_record)
	{
		print('<a href="' . $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '">');
		print($this->master_record['Title']);
		print('</a>');
		
		print(' &gt;&gt; ');
		
		print($this->header_title_text);
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
			
	print('<div class="horizontal-center width-90percent margin-top-5px">');
			
			print('<div class="horizontal-center width-80percent margin-top-5px">');
			
			$full_user_name = urlencode($this->user['Username']);
			
			$formats = [
				[
					text=>'Mobile<br>Version',
					image=>'mobile-icon.jpg',
					url=>'view.php?mobilefriendly=1',
				],
				[
					text=>'PDF<br>File',
					image=>'pdf-file-icon.jpg',
					url=>'view.pdf',
				],
				[
					text=>'Printer<br>Friendly',
					image=>'printer-friendly-icon.jpg',
					url=>'view.php?printerfriendly=1',
				],
				[
					text=>'Plaintext<br>File',
					image=>'plaintext-format-icon.jpg',
					url=>'view.txt',
				],
				[
					text=>'Wrapped<br>Plaintext',
					image=>'wrapped-plaintext-format-icon.jpg',
					url=>'view.txt?wrapped=1',
				],
				[
					text=>'Inverted<br>Colors',
					image=>'colors-inverted-icon.jpg',
					url=>'view.php?invertedcolors=1',
				],
				[
					text=>'RTF<br>File',
					image=>'rtf-file-icon.jpg',
					url=>'view.rtf',
				],
				[
					text=>'Epub<br>File',
					image=>'epub-file-icon.jpg',
					url=>'view.epub',
				],
				[
					text=>'DAISY<br>Format',
					image=>'daisy-format-icon.jpg',
					url=>'view.daisy',
				],
				[
					text=>'SGML<br>Format',
					image=>'sgml-format-icon.jpg',
					url=>'view.sgml',
				],
				[
					text=>'JSON<br>Format',
					image=>'json-format-icon.jpg',
					url=>'view.json',
				],
				[
					text=>'XML<br>Format',
					image=>'xml-format-icon.jpg',
					url=>'view.xml',
				],
				[
					text=>'CSV<br>Format',
					image=>'csv-format-icon.jpg',
					url=>'view.csv',
				],
				[
					text=>'Latex<br>Format',
					image=>'latex-format-icon.jpg',
					url=>'view.tex',
				],
				[
					text=>'OPDS<br>Format',
					image=>'opds-format-icon.jpg',
					url=>'view.opds',
				],
				[
					text=>'RDF<br>Format',
					image=>'rdf-format-icon.jpg',
					url=>'view.rdf',
				],
			];
			
			if($this->mobile_friendly)
			{
				$formats[0] = [
					text=>'Standard<br><nobr>PC Format</nobr>',
					image=>'',
					url=>'view.php',
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
			
			print("</div>");
			
	print("</div>");
			
				// Get Info Header Language
			
			// -------------------------------------------------------------
			
		switch($this->language_object->getLanguageCode()) {
			default:
			case 'en':
				$privacy_instructions_header = $this->master_record['Code'] . ' Privacy Policy';
				break;
				
			case 'de':
				$privacy_instructions_header = $this->master_record['Code'] . '-Datenschutzrichtlinie';
				break;
				
			case 'es':
				$privacy_instructions_header = 'Política de privacidad de ' . $this->master_record['Code'];
				break;
			
			case 'fr':
				$privacy_instructions_header = 'Politique de confidentialité de ' . $this->master_record['Code'];
				break;
				
			case 'ja':
				$privacy_instructions_header = $this->master_record['Code'] . 'プライバシーポリシー';
				break;
				
			case 'it':
				$privacy_instructions_header = 'Informativa sulla privacy di ' . $this->master_record['Code'];
				break;
				
			case 'nl':
				$privacy_instructions_header = $this->master_record['Code'] . ' Privacybeleid';
				break;
				
			case 'pl':
				$privacy_instructions_header = 'Polityka prywatności XYZ ' . $this->master_record['Code'];
				break;
			
			case 'pt':
				$privacy_instructions_header = 'Política de Privacidade ' . $this->master_record['Code'];
				break;
				
			case 'ru':
				$privacy_instructions_header = 'Политика конфиденциальности ' . $this->master_record['Code'];
				break;
			
			case 'tr':
				$privacy_instructions_header = $this->master_record['Code'] . ' Gizlilik Politikası';
				break;
				
			case 'zh':
				$privacy_instructions_header = $this->master_record['Code'] . '隐私政策';
				break;
		}
		
				// Display Privacy Policy File
			
			// -------------------------------------------------------------
		
		$divider->displaystart($divider_instruction_area_start_args);
		
		$element_text_args = [
			text=>'<center><h2 class="margin-5px font-family-tahoma">' . $privacy_instructions_header . ' :</h2></center>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$divider->displaystart($file_divider);
		
		$privacy_policy_text = implode("\n", $html_paragraphs);
		$privacy_policy_text = str_replace('<p>', '<p class="margin-top-10px margin-bottom-0px text-indent-25px">', $privacy_policy_text);
		$element_text_args = [
			text=>$privacy_policy_text,
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$divider->displayend($divider_end_args);
		
		$divider->displayend($divider_end_args);
	
				// Display Language Options
			
			// -------------------------------------------------------------
		
		$languages->display();
		
				// Display Final Ending Navigation
			
			// -------------------------------------------------------------
		
		$bottom_navigation_args = [];
		$navigation->DisplayBottomNavigation($bottom_navigation_args);
	}
	
?>