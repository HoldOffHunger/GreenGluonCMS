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
		'languageobject'=>$this->language_object,
		'divider'=>$divider,
		'text'=>$text,
		'domainobject'=>$this->domain_object,
		'callingtemplate'=>$this,
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
		'languageobject'=>$this->language_object,
		'divider'=>$divider,
		'domainobject'=>$this->domain_object,
		'socialmedia'=>$this->social_media,
		'sharetext'=>$this->share_text,
		'sharewithtext'=>$this->share_with_text,
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
		$list_one_main_header_text = 'List to Remove Spacing From';
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
			$list_one_main_header_text = 'List to Remove Spacing From';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$list_two_main_header_text = 'List with Spacing Handled';
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
			$list_two_main_header_text = 'List with Spacing Handled';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$list_one_content_text = 'Type or copy-and-paste your text into this text box.';
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
			$list_one_content_text = 'Type or copy-and-paste your text into this text box.';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$list_two_content_text = 'Then your list with spacing removed will appear in this text box.';
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
			$list_two_content_text = 'Then your list with spacing removed will appear in this text box.';
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
		$main_button_language_text = 'Remove Spacing';
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
			$main_button_language_text = 'Remove Spacing';
		}
	}
	
				// Display 'Sort' Button
				// -------------------------------------------------------
	
	$type_args = [
		'type'=>'button',
		'id'=>'remove-spacing-button',
		'class'=>'remove-spacing-button margin-5px',
		'value'=>$main_button_language_text,
		'indentlevel'=>5,
	];
	
	$form->DisplayFormField($type_args);
	
	print('<br>'); 
	
				// Get SortOrder Language
				// -------------------------------------------------------
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$first_feature_option_text = 'Remove Spaces';
	}
	else
	{
		$option_list = $this->getListAndItems(['ListTitle'=>'LanguagesMainFirstFeatureOptionOneTitle']);
		
		if($option_list[$this->language_object->getLanguageCode()])
		{
			$first_feature_option_text = $option_list[$this->language_object->getLanguageCode()];
		}
		else
		{
			$first_feature_option_text = 'Remove Spaces';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$first_feature_option_mouseover = 'This will remove all spaces (" ") that appear in the first text area.';
	}
	else
	{
		$option_list = $this->getListAndItems(['ListTitle'=>'LanguagesMainFirstFeatureOptionOneMouseover']);
		
		if($option_list[$this->language_object->getLanguageCode()])
		{
			$first_feature_option_mouseover = $option_list[$this->language_object->getLanguageCode()];
		}
		else
		{
			$first_feature_option_mouseover = 'This will remove all spaces (" ") that appear in the first text area.';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$second_feature_option_text = 'Remove Tabs/Indents';
	}
	else
	{
		$option_list = $this->getListAndItems(['ListTitle'=>'LanguagesMainFirstFeatureOptionTwoTitle']);
		
		if($option_list[$this->language_object->getLanguageCode()])
		{
			$second_feature_option_text = $option_list[$this->language_object->getLanguageCode()];
		}
		else
		{
			$second_feature_option_text = 'Remove Tabs/Indents';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$second_feature_option_mouseover = 'This will remove all tabs or indents ("\t") that appear in the first text area.';
	}
	else
	{
		$option_list = $this->getListAndItems(['ListTitle'=>'LanguagesMainFirstFeatureOptionTwoMouseover']);
		
		if($option_list[$this->language_object->getLanguageCode()])
		{
			$second_feature_option_mouseover = $option_list[$this->language_object->getLanguageCode()];
		}
		else
		{
			$second_feature_option_mouseover = 'This will remove all tabs or indents ("\t") that appear in the first text area.';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$third_feature_option_text = 'Remove Newlines/Carriage-Returns';
	}
	else
	{
		$option_list = $this->getListAndItems(['ListTitle'=>'LanguagesMainFirstFeatureOptionThreeTitle']);
		
		if($option_list[$this->language_object->getLanguageCode()])
		{
			$third_feature_option_text = $option_list[$this->language_object->getLanguageCode()];
		}
		else
		{
			$third_feature_option_text = 'Remove Newlines/Carriage-Returns';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$third_feature_option_mouseover = 'This will remove all newlines and carriage returns ("\n" and "\r") that appear in the first text area.';
	}
	else
	{
		$option_list = $this->getListAndItems(['ListTitle'=>'LanguagesMainFirstFeatureOptionThreeMouseover']);
		
		if($option_list[$this->language_object->getLanguageCode()])
		{
			$third_feature_option_mouseover = $option_list[$this->language_object->getLanguageCode()];
		}
		else
		{
			$third_feature_option_mouseover = 'This will remove all newlines and carriage returns ("\n" and "\r") that appear in the first text area.';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$fourth_feature_option_text = 'Remove Spaces and Tabs/Indents';
	}
	else
	{
		$option_list = $this->getListAndItems(['ListTitle'=>'LanguagesMainFirstFeatureOptionFourTitle']);
		
		if($option_list[$this->language_object->getLanguageCode()])
		{
			$fourth_feature_option_text = $option_list[$this->language_object->getLanguageCode()];
		}
		else
		{
			$fourth_feature_option_text = 'Remove Spaces and Tabs/Indents';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$fourth_feature_option_mouseover = 'This will remove all spaces and tabs/indents ("\t") that appear in the first text area.';
	}
	else
	{
		$option_list = $this->getListAndItems(['ListTitle'=>'LanguagesMainFirstFeatureOptionFourMouseover']);
		
		if($option_list[$this->language_object->getLanguageCode()])
		{
			$fourth_feature_option_mouseover = $option_list[$this->language_object->getLanguageCode()];
		}
		else
		{
			$fourth_feature_option_mouseover = 'This will remove all spaces and tabs/indents ("\t") that appear in the first text area.';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$fifth_feature_option_text = 'Remove Spaces and Newlines/Carriage-Returns';
	}
	else
	{
		$option_list = $this->getListAndItems(['ListTitle'=>'LanguagesMainFirstFeatureOptionFiveTitle']);
		
		if($option_list[$this->language_object->getLanguageCode()])
		{
			$fifth_feature_option_text = $option_list[$this->language_object->getLanguageCode()];
		}
		else
		{
			$fifth_feature_option_text = 'Remove Spaces and Newlines/Carriage-Returns';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$fifth_feature_option_mouseover = 'This will remove all spaces (" ") and newlines/carriage-returns ("\n" and "\r") that appear in the first text area.';
	}
	else
	{
		$option_list = $this->getListAndItems(['ListTitle'=>'LanguagesMainFirstFeatureOptionFiveMouseover']);
		
		if($option_list[$this->language_object->getLanguageCode()])
		{
			$fifth_feature_option_mouseover = $option_list[$this->language_object->getLanguageCode()];
		}
		else
		{
			$fifth_feature_option_mouseover = 'This will remove all spaces (" ") and newlines/carriage-returns ("\n" and "\r") that appear in the first text area.';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$sixth_feature_option_text = 'Remove Tabs/Indents and Newlines/Carriage-Returns';
	}
	else
	{
		$option_list = $this->getListAndItems(['ListTitle'=>'LanguagesMainFirstFeatureOptionSixTitle']);
		
		if($option_list[$this->language_object->getLanguageCode()])
		{
			$sixth_feature_option_text = $option_list[$this->language_object->getLanguageCode()];
		}
		else
		{
			$sixth_feature_option_text = 'Remove Tabs/Indents and Newlines/Carriage-Returns';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$sixth_feature_option_mouseover = 'This will remove all tabs/idents ("\t") and newlines/carriage-returns ("\n" and "\r") that appear in the first text area.';
	}
	else
	{
		$option_list = $this->getListAndItems(['ListTitle'=>'LanguagesMainFirstFeatureOptionSixMouseover']);
		
		if($option_list[$this->language_object->getLanguageCode()])
		{
			$sixth_feature_option_mouseover = $option_list[$this->language_object->getLanguageCode()];
		}
		else
		{
			$sixth_feature_option_mouseover = 'This will remove all tabs/idents ("\t") and newlines/carriage-returns ("\n" and "\r") that appear in the first text area.';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$seventh_feature_option_text = 'Remove Spaces, Tabs/Indents, and Newlines/Carriage-Returns';
	}
	else
	{
		$option_list = $this->getListAndItems(['ListTitle'=>'LanguagesMainFirstFeatureOptionSevenTitle']);
		
		if($option_list[$this->language_object->getLanguageCode()])
		{
			$seventh_feature_option_text = $option_list[$this->language_object->getLanguageCode()];
		}
		else
		{
			$seventh_feature_option_text = 'Remove Spaces, Tabs/Indents, and Newlines/Carriage-Returns';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$seventh_feature_option_mouseover = 'This will remove all spaces, tabs/idents ("\t"), and newlines/carriage-returns ("\n" and "\r") that appear in the first text area.';
	}
	else
	{
		$option_list = $this->getListAndItems(['ListTitle'=>'LanguagesMainFirstFeatureOptionSevenMouseover']);
		
		if($option_list[$this->language_object->getLanguageCode()])
		{
			$seventh_feature_option_mouseover = $option_list[$this->language_object->getLanguageCode()];
		}
		else
		{
			$seventh_feature_option_mouseover = 'This will remove all spaces, tabs/idents ("\t"), and newlines/carriage-returns ("\n" and "\r") that appear in the first text area.';
		}
	}
	
				// Display 'Sort' Order
				// -------------------------------------------------------
	
	$extension_args = [
		type=>'select',
		name=>'spacing-type',
		'id'=>'spacing-type',
		'class'=>'sort-order margin-5px',
		options=>[
			[
				'optionvalue'=>'remove-spaces',
				'optiontitle'=>$first_feature_option_text,
				'optionmouseover'=>$first_feature_option_mouseover,
			],
			[
				'optionvalue'=>'remove-tabs',
				'optiontitle'=>$second_feature_option_text,
				'optionmouseover'=>$second_feature_option_mouseover,
			],
			[
				'optionvalue'=>'remove-newlines',
				'optiontitle'=>$third_feature_option_text,
				'optionmouseover'=>$third_feature_option_mouseover,
			],
			[
				'optionvalue'=>'remove-spaces-and-tabs',
				'optiontitle'=>$fourth_feature_option_text,
				'optionmouseover'=>$fourth_feature_option_mouseover,
			],
			[
				'optionvalue'=>'remove-spaces-and-newlines',
				'optiontitle'=>$fifth_feature_option_text,
				'optionmouseover'=>$fifth_feature_option_mouseover,
			],
			[
				'optionvalue'=>'remove-tabs-and-newlines',
				'optiontitle'=>$sixth_feature_option_text,
				'optionmouseover'=>$sixth_feature_option_mouseover,
			],
			[
				'optionvalue'=>'remove-spaces-and-tabs-and-newlines',
				'optiontitle'=>$seventh_feature_option_text,
				'optionmouseover'=>$seventh_feature_option_mouseover,
			],
		],
		indentlevel=>5,
	];
	
	$form->DisplayFormField($extension_args);
	
				// End Div
				// -------------------------------------------------------
	
	$divider->displayend($divider_end_args);
	
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