<?php
	
			// HTML Displaying
		
		// -------------------------------------------------------------
	
	if($this->script_format_lower == 'html')
	{
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
		
		$robots_file_divider = [
			'class'=>'width-100percent horizontal-left margin-5px',
		];
		
		$divider_instruction_area_start_args = [
			'class'=>'width-50percent border-1px horizontal-center margin-top-22px',
		];
		
				// Get Info Header Language
			
			// -------------------------------------------------------------
		
		if($this->language_object->getLanguageCode() == 'en')
		{
			$robots_instructions_text = 'This is the human-readable version of our robots.txt file.  The <a href="' . $primary_url . '/robots.txt">Robots.txt File</a> is what actual search engines will crawl.  An alternate <a href="' . $primary_url . '/robots.xml">Robots.xml File</a> has also been provided if you need something more machine-readable.  The XML version also has a <a href="' . $primary_url . '/robots.xml?humanreadable=1">Robots.xml Human-Readable File</a>.';
		}
		else
		{
			$robots_instructions_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesRobotsInstructions']);
			
			if($robots_instructions_language_translations[$this->language_object->getLanguageCode()])
			{
				$robots_instructions_text = $robots_instructions_language_translations[$this->language_object->getLanguageCode()];
			}
			else
			{
				$robots_instructions_text = 'This is the human-readable version of our robots.txt file.  The <a href="' . $primary_url . '/robots.txt">Robots.txt File</a> is what actual search engines will crawl.  An alternate <a href="' . $primary_url . '/robots.xml">Robots.xml File</a> has also been provided if you need something more machine-readable.  The XML version also has a <a href="' . $primary_url . '/robots.xml?humanreadable=1">Robots.xml Human-Readable File</a>.';
			}
		}
		
				// Link to Actual Robots File
			
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
				$robots_instructions_text,
			]],
		];
		$generic_list->Display($version_list_display_args);
		
				// Describe Robots File
			
			// -------------------------------------------------------------
		
		$version_list_display_args = array(
			'options'=>array(
				'indentlevel'=>0,
				'tableheaders'=>0,
				'tableclass'=>'width-90percent horizontal-center border-2px background-color-' . $third_color . ' margin-top-14px',
				'rowclass'=>'border-1px horizontal-left',
				'cellclass'=>array(
					'border-1px vertical-top',
					'border-1px width-100percent vertical-top',
				),
			),
			'list'=>$this->robots,
		);
		$generic_list->Display($version_list_display_args);
		
				// Get Info Header Language
			
			// -------------------------------------------------------------
		
		if($this->language_object->getLanguageCode() == 'en')
		{
			$robots_filename_text = 'Robots.txt File';
		}
		else
		{
			$robots_filename_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesRobotsFilename']);
			
			if($robots_filename_language_translations[$this->language_object->getLanguageCode()])
			{
				$robots_filename_text = $robots_filename_language_translations[$this->language_object->getLanguageCode()];
			}
			else
			{
				$robots_filename_text = 'Robots.txt File';
			}
		}
		
				// Display Robots File
			
			// -------------------------------------------------------------
		
		$divider->displaystart($divider_instruction_area_start_args);
		
		$element_text_args = [
			text=>'<center><h2 class="margin-5px font-family-tahoma">' . $robots_filename_text . ' :</h2></center>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$divider->displaystart($robots_file_divider);
		
		$element_text_args = [
			text=>
				'<code><pre>' . $this->robots_txt_file . '</pre></code>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$divider->displayend($divider_end_args);
		
		$divider->displayend($divider_end_args);
		
				// Display Final Ending Navigation
			
			// -------------------------------------------------------------
		
		$bottom_navigation_args = [
			'thispage'=>'',
		];
		$navigation->DisplayBottomNavigation($bottom_navigation_args);
	}
	
			// TXT Displaying
		
		// -------------------------------------------------------------
	
	elseif($this->script_format_lower == 'txt')
	{
				// Standard Requires
			
			// -------------------------------------------------------------
	
		require('../modules/spacing.php');
		
		require('../modules/html/text.php');
		$text = new module_text;
		
		#print("robots.txt, please");
		
		$element_text_args = [
			text=>$this->robots_txt_file,
		];
		$text->Display($element_text_args);
	}
	
	elseif($this->script_format_lower == 'xml')
	{
				// Display Robots Data
			
			// -------------------------------------------------------------
		
		require('../modules/spacing.php');
		
		require('../modules/' . $this->script_format_lower . '/list/generic.php');
		$generic_list = new module_genericlist;
		
		$version_list_display_args = array(
			'options'=>array(
				'indentlevel'=>0,
				'tableheaders'=>0,
				'tableclass'=>'width-90percent horizontal-center border-2px background-color-B7CEEC margin-top-14px',
				'rowclass'=>'border-1px horizontal-left',
				'cellclass'=>array(
					'border-1px vertical-top',
					'border-1px width-100percent vertical-top',
				),
				'humanreadable'=>$this->humanreadable,
			),
			'list'=>$this->robots,
		);
		$generic_list->Display($version_list_display_args);
	}
	
	
	
	#print("<PRE>");
	#print_r($this->all_domains);
	#print_r($this->primary_host_record['AlternateDomain']);
	#print_r($this->domain_object);
	#print("</PRE>");
	
?>