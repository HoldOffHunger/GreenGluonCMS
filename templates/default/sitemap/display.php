<?php
		
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
	
	if($this->script_format_lower == 'html')
	{
		require('../modules/' . $this->script_format_lower . '/languages.php');
		$languages_args = [
			'languageobject'=>$this->language_object,
			'divider'=>$divider,
			'domainobject'=>$this->domain_object,
		];
		$languages = new module_languages($languages_args);
		
		require('../modules/' . $this->script_format_lower . '/navigation.php');
		$navigation_args = [
			'languageobject'=>$this->language_object,
			'divider'=>$divider,
			'text'=>$text,
			'domainobject'=>$this->domain_object,
			'callingtemplate'=>$this,
		];
		$navigation = new module_navigation($navigation_args);
	}
	
			// Basic Divider Arguments
		
		// -------------------------------------------------------------
	
	$divider_navigation_args = [
		'class'=>'width-95percent horizontal-center margin-top-14px border-2px',
	];
	
	$divider_instruction_area_start_args = [
		'class'=>'width-50percent border-1px horizontal-center margin-top-22px',
	];
	
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
	
			// Get Instructions Language
		
		// -------------------------------------------------------------
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$sitemap_instructions_text = 'This is the site map.  You will find a list of every page on this site here.  The <a href="' . $primary_url . '/sitemap.xml">XML Sitemap</a> and a <a href="' . $primary_url . '/sitemap.xml?humanreadable=1">Human-Readable XML Sitemap</a> are also available, as well as a <a href="' . $primary_url . '/sitemap.txt">TXT Sitemap</a>.';
	}
	else
	{
		$sitemap_header_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesSitemapInstructions']);
		
		if($sitemap_header_language_translations[$this->language_object->getLanguageCode()])
		{
			$sitemap_instructions_text = $sitemap_header_language_translations[$this->language_object->getLanguageCode()];
		}
		else
		{
			$sitemap_instructions_text = 'This is the site map.  You will find a list of every page on this site here.  The <a href="' . $primary_url . '/sitemap.xml">XML Sitemap</a> and a <a href="' . $primary_url . '/sitemap.xml?humanreadable=1">Human-Readable XML Sitemap</a> are also available, as well as a <a href="' . $primary_url . '/sitemap.txt">TXT Sitemap</a>.';
		}
	}
	
			// Display Final Ending Navigation
		
		// -------------------------------------------------------------
	
	if($this->script_format_lower == 'html')
	{
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
				$sitemap_instructions_text,
			]],
		];
		$generic_list->Display($version_list_display_args);
	}
	
			// Display Sitemap
		
		// -------------------------------------------------------------
	
	$version_list_display_args = array(
		'options'=>array(
			'indentlevel'=>1,
			'tableheaders'=>0,
			'tableclass'=>'width-90percent horizontal-center border-2px background-color-' . $third_color . ' margin-top-14px',
			'rowclass'=>'border-1px horizontal-left',
			'cellclass'=>array(
				'border-1px vertical-top',
				'border-1px width-100percent vertical-top',
			),
			'humanreadable'=>$this->humanreadable,
		),
		'list'=>$this->sitemap,
	);
	$generic_list->Display($version_list_display_args);
	
			// Display Final Ending Navigation
		
		// -------------------------------------------------------------
	
	if($this->script_format_lower == 'html')
	{
		$bottom_navigation_args = [
			'thispage'=>'Sitemap',
		];
		$navigation->DisplayBottomNavigation($bottom_navigation_args);
	}
	
?>