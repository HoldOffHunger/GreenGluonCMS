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
	
			// Share Languages
		
		// -------------------------------------------------------------
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$this->share_text = 'Share';
	}
	else
	{
		$share_languages = $this->getListAndItems(['ListTitle'=>'LanguagesShare']);
		
		if($share_languages[$this->language_object->getLanguageCode()])
		{
			$this->share_text = $share_languages[$this->language_object->getLanguageCode()];
		}
		else
		{
			$this->share_text = 'Share';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$this->share_with_text = 'Share With';
	}
	else
	{
		$share_with_languages = $this->getListAndItems(['ListTitle'=>'LanguagesShareWith']);
		
		if($share_with_languages[$this->language_object->getLanguageCode()])
		{
			$this->share_with_text = $share_with_languages[$this->language_object->getLanguageCode()];
		}
		else
		{
			$this->share_with_text = 'Share With';
		}
	}
	
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
		'rightimage'=>$this->primary_host_record['PrimaryImageRight'],
		'divmouseover'=>$instructions_content_text,
		'imagemouseover'=>'&quot;' . $quote_text . '&quot;',
		'level'=>1,
		'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-6495ED',
		'textclass'=>'padding-0px margin-0px horizontal-center vertical-center padding-top-22px margin-bottom-10px',
		'imagedivclass'=>'border-2px margin-5px background-color-gray10',
		'imageclass'=>'border-1px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
		'rightimageenable'=>1,
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
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$instructions_label_text = 'Instructions';
	}
	else
	{
		$instruction_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesMainInstructionsHeader']);
		
		if($instruction_language_translations[$this->language_object->getLanguageCode()])
		{
			$instructions_label_text = $instruction_language_translations[$this->language_object->getLanguageCode()];
		}
		else
		{
			$instructions_label_text = 'Instructions';
		}
	}
	
			// Display Instructions
		
		// -------------------------------------------------------------
	
	$divider->displaystart($divider_instruction_area_start_args);
	
	$divider->displaystart($divider_instruction_area_text_args);
	
	$element_text_args = array(
		text=>'<div class="padding-5px"><span class="font-family-tahoma"><b>' . $instructions_label_text . ' :</b> ' . $instructions_content_text . '</span></div>',
		indentlevel=>5,
	);
	$text->Display($element_text_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
			// Get Status Language
		
		// -------------------------------------------------------------
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$status_label_text = 'Status';
	}
	else
	{
		$status_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesMainStatusHeader']);
		
		if($status_language_translations[$this->language_object->getLanguageCode()])
		{
			$status_label_text = $status_language_translations[$this->language_object->getLanguageCode()];
		}
		else
		{
			$status_label_text = 'Status';
		}
	}
	
			// Get Status Language
		
		// -------------------------------------------------------------
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$status_content_text = 'Waiting for User';
	}
	else
	{
		$status_content_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesMainActivityHeader']);
		
		if($status_content_language_translations[$this->language_object->getLanguageCode()])
		{
			$status_content_text = $status_content_language_translations[$this->language_object->getLanguageCode()];
		}
		else
		{
			$status_content_text = 'Waiting for User';
		}
	}
	
			// Display Status
		
		// -------------------------------------------------------------
	
	$divider->displaystart($divider_instruction_area_start_args);
	
	$divider->displaystart($divider_instruction_area_text_args);
	
	$element_text_args = array(
		text=>'<div class="padding-5px"><span class="font-family-tahoma"><b>' . $status_label_text . ' :</b> <span id="status-text">' . $status_content_text . '</span>.</span></div>',
		indentlevel=>5,
	);
	$text->Display($element_text_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
			// Get Input / Output Areas Language
		
		// -------------------------------------------------------------
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$list_one_main_header_text = 'List to Remove Blanks From';
	}
	else
	{
		$list_one_main_header_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesMainList1Header']);
		
		if($list_one_main_header_language_translations[$this->language_object->getLanguageCode()])
		{
			$list_one_main_header_text = $list_one_main_header_language_translations[$this->language_object->getLanguageCode()];
		}
		else
		{
			$list_one_main_header_text = 'List to Remove Blanks From';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$list_two_main_header_text = 'List with Blanks Handled';
	}
	else
	{
		$list_two_main_header_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesMainList2Header']);
		
		if($list_two_main_header_language_translations[$this->language_object->getLanguageCode()])
		{
			$list_two_main_header_text = $list_two_main_header_language_translations[$this->language_object->getLanguageCode()];
		}
		else
		{
			$list_two_main_header_text = 'List with Blanks Handled';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$list_one_content_text = 'Type or copy-and-paste your list into this text box.';
	}
	else
	{
		$list_one_main_content_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesMainList1Content']);
		
		if($list_one_main_content_language_translations[$this->language_object->getLanguageCode()])
		{
			$list_one_content_text = $list_one_main_content_language_translations[$this->language_object->getLanguageCode()];
		}
		else
		{
			$list_one_content_text = 'Type or copy-and-paste your list into this text box.';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$list_two_content_text = 'Then your list with blanks removed will appear in this text box.';
	}
	else
	{
		$list_two_main_content_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesMainList2Content']);
		
		if($list_two_main_content_language_translations[$this->language_object->getLanguageCode()])
		{
			$list_two_content_text = $list_two_main_content_language_translations[$this->language_object->getLanguageCode()];
		}
		else
		{
			$list_two_content_text = 'Then your list with blanks removed will appear in this text box.';
		}
	}
	
			// Display Input / Output Areas
		
		// -------------------------------------------------------------
	
	$table_start_args = array(
		id=>$element,
		tableclass=>'horizontal-center padding-top-22px',
		tablewidth=>'1',
		tableborder=>'0',
		indentlevel=>2,
		cellvalign=>'top',
	);
	$table->DisplayComponent_StartTable($table_start_args);
	
	$element_text_args = array(
		text=>'<center><h4 class="margin-0px padding-0px font-family-tahoma">' . $list_one_main_header_text . '</h4></center>',
		indentlevel=>5,
	);
	$text->Display($element_text_args);
	
	$separate_cells_args = [
		cellwidth=>'80%',
		indentlevel=>2,
		cellvalign=>'top',
	];
	$table->DisplayComponent_SeparateCells($separate_cells_args);
	
	$element_text_args = array(
		text=>'<center><h4 class="margin-0px padding-0px font-family-tahoma">' . $list_two_main_header_text . '</h4></center>',
		indentlevel=>5,
	);
	$text->Display($element_text_args);
	
	$separate_cells_args = [
		cellwidth=>'80%',
		indentlevel=>2,
		cellvalign=>'top',
	];
	$table->DisplayComponent_SeparateCellsAndRows($separate_cells_args);
	
	$type_args = [
		'type'=>'textarea',
		'name'=>'input-area',
		'id'=>'input-area',
		'class'=>'input-area lined',
		'value'=>$list_one_content_text,
		'cols'=>50,
		'rows'=>30,
		'indentlevel'=>5,
	];
	
	$form->DisplayFormField($type_args);
	
	$separate_cells_args = [
		cellwidth=>'80%',
		indentlevel=>2,
		cellvalign=>'top',
	];
	$table->DisplayComponent_SeparateCells($separate_cells_args);
	
	$type_args = [
		'type'=>'textarea',
		'name'=>'output-area',
		'id'=>'output-area',
		'class'=>'output-area lined',
		'value'=>$list_two_content_text,
		'cols'=>50,
		'rows'=>30,
		'indentlevel'=>5,
	];
	
	$form->DisplayFormField($type_args);
	
	$table_end_args = array(
		indentlevel=>2,
	);
	$table->DisplayComponent_EndTable($table_end_args);
	
			// Sort Button and Order Columns
		
		// -------------------------------------------------------------
	
				// Start Div
				// -------------------------------------------------------
	
	$divider->displaystart($divider_main_area_start_args);
	
				// Get 'Sort' Button Language
				// -------------------------------------------------------
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$main_button_language_text = 'Remove Blanks';
	}
	else
	{
		$main_button_language_text = $this->getListAndItems(['ListTitle'=>'LanguagesMainButtonText']);
		
		if($main_button_language_text[$this->language_object->getLanguageCode()])
		{
			$main_button_language_text = $main_button_language_text[$this->language_object->getLanguageCode()];
		}
		else
		{
			$main_button_language_text = 'Remove Blanks';
		}
	}
	
				// Display 'Sort' Button
				// -------------------------------------------------------
	
	$type_args = [
		'type'=>'button',
		'id'=>'remove-blanks-button',
		'class'=>'remove-blanks-button margin-5px',
		'value'=>$main_button_language_text,
		'indentlevel'=>5,
	];
	
	$form->DisplayFormField($type_args);
	
				// End Div
				// -------------------------------------------------------
	
	$divider->displayend($divider_end_args);
	
			// Display Trim Option
		
		// -------------------------------------------------------------
	
				// Start Div
				// -------------------------------------------------------
	
	$divider->displaystart($divider_secondary_area_start_args);
	
				// Get Trim Language
				// -------------------------------------------------------
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$trim_option_content = 'Trim Whitespace from Items in List';
	}
	else
	{
		$trim_option_list = $this->getListAndItems(['ListTitle'=>'LanguagesMainTrimOption']);
		
		if($trim_option_list[$this->language_object->getLanguageCode()])
		{
			$trim_option_content = $trim_option_list[$this->language_object->getLanguageCode()];
		}
		else
		{
			$trim_option_content = 'Trim Whitespace from Items in List';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$trim_description_content = 'This option will remove starting and trailing white space characters from each item in the resulting list.';
	}
	else
	{
		$trim_description_list = $this->getListAndItems(['ListTitle'=>'LanguagesMainTrimDescription']);
		
		if($trim_description_list[$this->language_object->getLanguageCode()])
		{
			$trim_description_content = $trim_description_list[$this->language_object->getLanguageCode()];
		}
		else
		{
			$trim_description_content = 'This option will remove starting and trailing white space characters from each item in the resulting list.';
		}
	}
	
				// Display Text
				// -------------------------------------------------------
	
	$element_text_args = array(
		text=>'<span class="font-family-arial" title="' . $trim_description_content . '">' . $trim_option_content . '</span>',
		indentlevel=>5,
	);
	$text->Display($element_text_args);
	
	$type_args = [
		'type'=>'checkbox',
		'name'=>'trim-whitespace',
		'id'=>'trim-whitespace',
		'class'=>'trim-whitespace',
		'value'=>'1',
		'indentlevel'=>5,
	];
	
	$form->DisplayFormField($type_args);
	
				// End Div
				// -------------------------------------------------------
	
	$divider->displayend($divider_end_args);
	
			// Display Similar Sites
		
		// -------------------------------------------------------------
	
	require('../modules/html/similarsites-satellites.php');
	
	$similar_site_args = [
		site=>$this->domain_object->primary_domain_lowercased,
		language=>$this->language_object,
	];
	$similar_sites = new module_similarsites_satellites($similar_site_args);
	
	$similar_sites->display();
	
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