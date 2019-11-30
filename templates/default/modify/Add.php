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
	
			// Basic Divider Arguments
		
		// -------------------------------------------------------------
	
	$divider_padding_start_args = array(
		'class'=>'margin-5px padding-5px',
	);
	
	$divider_end_args = array(
		'indentlevel'=>1,
	);
	
			// Display Parent Record Info
		
		// -------------------------------------------------------------
	
	$divider->displaystart($divider_padding_start_args);
	
	$info_list = [
			[
				'<nobr>Adding Entry To:</nobr>', $this->GetHyperlinkedEntryView([entry=>$this->entry, entrylist=>$this->record_list]),
			],
		];
	
	$last_added_entry = $this->last_added_entry;
	
	if($last_added_entry && $last_added_entry['id'])
	{
		$last_added_entry_url = '<a href="' . $last_added_entry['Code'] . '/view.php">' . $last_added_entry['Title'];
		if($last_added_entry['Subtitle']) {
			$last_added_entry_url .= ' : ' . $last_added_entry['Subtitle'];
		}
		$last_added_entry_url .= '</a>';
		
		$info_list[] = [
			'<nobr>Last Added Entry:</nobr>', $last_added_entry_url,
		];
	}
	
	$version_list_display_args = array(
		'options'=>array(
			'indentlevel'=>1,
			'tableheaders'=>0,
			'tableclass'=>'width-70percent horizontal-center border-2px background-color-gray13 margin-top-5px',
			'rowclass'=>'border-1px horizontal-left',
			'cellclass'=>array(
				'border-1px vertical-top',
				'border-1px width-100percent vertical-top',
			),
		),
		'list'=>$info_list,
	);
	$generic_list->Display($version_list_display_args);
	
	$divider->displayend($divider_end_args);
	
			// Display Admin Errors
		
		// -------------------------------------------------------------
	
	$error_header_displayed = 0;
	
	if($this->authentication_object->CheckAuthenticationForCurrentObject_IsAdmin() && count($this->admin_errors))
	{
		$error_header_displayed = 1;
		$divider->displaystart($divider_padding_start_args);
		
		$version_list_display_args = [
			'options'=>[
				'indentlevel'=>1,
				'tableheaders'=>0,
				'tableclass'=>'width-50percent horizontal-center border-2px background-color-gray13 margin-top-5px',
				'rowclass'=>'border-1px horizontal-left',
				'cellclass'=>[
					'border-1px vertical-top horizontal-center font-size-150percent',
					'border-1px width-100percent vertical-top horizontal-center',
				],
			],
			'list'=>[
				[
					'There was an error with your submission.',
				],
			],
		];
		$generic_list->Display($version_list_display_args);
		
		$divider->displayend($divider_end_args);
		
		foreach($this->admin_errors_display as $admin_error_to_display)
		{
			$divider->displaystart($divider_padding_start_args);
			
			$version_list_display_args = array(
				'options'=>array(
					'indentlevel'=>1,
					'tableheaders'=>0,
					'tableclass'=>'width-70percent horizontal-center border-2px background-color-gray13 margin-top-5px',
					'rowclass'=>'border-1px horizontal-left',
					'cellclass'=>array(
						'border-1px vertical-top',
						'border-1px width-100percent vertical-top',
					),
				),
				'list'=>$admin_error_to_display,
			);
			$generic_list->Display($version_list_display_args);
			
			$divider->displayend($divider_end_args);
		}
	}
	
			// Display Errors
		
		// -------------------------------------------------------------
	
	if(count($this->errors))
	{
		if(!$error_header_displayed)
		{
			$divider->displaystart($divider_padding_start_args);
			
			$version_list_display_args = [
				'options'=>[
					'indentlevel'=>1,
					'tableheaders'=>0,
					'tableclass'=>'width-50percent horizontal-center border-2px background-color-gray13 margin-top-5px',
					'rowclass'=>'border-1px horizontal-left',
					'cellclass'=>[
						'border-1px vertical-top horizontal-center font-size-150percent',
						'border-1px width-100percent vertical-top horizontal-center',
					],
				],
				'list'=>[
					[
						'There was an error with your submission.',
					],
				],
			];
			$generic_list->Display($version_list_display_args);
			
			$divider->displayend($divider_end_args);
		}
		
		foreach($this->errors_display as $error_to_display)
		{
			$divider->displaystart($divider_padding_start_args);
			
			$version_list_display_args = array(
				'options'=>array(
					'indentlevel'=>1,
					'tableheaders'=>0,
					'tableclass'=>'width-70percent horizontal-center border-2px background-color-gray13 margin-top-5px',
					'rowclass'=>'border-1px horizontal-left',
					'cellclass'=>array(
						'border-1px vertical-top',
						'border-1px width-100percent vertical-top',
					),
				),
				'list'=>$error_to_display,
			);
			$generic_list->Display($version_list_display_args);
			
			$divider->displayend($divider_end_args);
		}
	}
	
	if(count($this->admin_errors) || count($this->errors))
	{
				// Display Form Elements : Start
			
			// -------------------------------------------------------------
		
		$divider_padding_start_args = array(
			'class'=>'horizontal-center width-80percent margin-top-5px border-2px',
			'indentlevel'=>1,
		);
		
		$divider->displaystart($divider_padding_start_args);
		
				// Display Form Elements : Unavailable Message
			
			// -------------------------------------------------------------
			
		$table_start_args = array(
			id=>$element,
			tableclass=>'width-100percent blank-element',
			tableborder=>'3',
			indentlevel=>2,
			cellvalign=>'top',
		);
		$table->DisplayComponent_StartTable($table_start_args);
		
		$element_text_args = array(
			text=>'<center><h4>Form Unavailable</h4></center>',
			indentlevel=>5,
		);
		$text->Display($element_text_args);
		
		$table_end_args = array(
			indentlevel=>2,
		);
		$table->DisplayComponent_EndTable($table_end_args);
		
				// Display Form Elements : End
			
			// -------------------------------------------------------------
		
		$divider_end_args = array(
			indentlevel=>1,
		);
		$divider->displayend($divider_end_args);
	}
	else
	{
				// Display Form Elements : Start
			
			// -------------------------------------------------------------
		
		$divider_padding_start_args = array(
			'class'=>'horizontal-center width-80percent margin-top-5px border-2px',
			'indentlevel'=>1,
		);
		
		$divider->displaystart($divider_padding_start_args);
		
		$start_form_args = array(
			'action'=>0,
			'method'=>'post',
			'files'=>1,
			'formclass'=>'margin-0px',
			'indentlevel'=>1,
		);
		
		$form->StartForm($start_form_args);
		
				// Display Form Elements : Standard Elements
			
			// -------------------------------------------------------------
		
		$elements = [
			'Title',
			'Subtitle',
			'List Title',
			'Code',
			'Entry Translation',
			'Availability Start',
			'Availability End',
			'Description',
			'Quote',
			'Text Body',
			'Image',
			'Image Translation',
			'Tag',
			'Link',
			'Event Date',
			'Association',
			'Definition',
			'Save',
		];
		
		foreach ($elements as $element)
		{
			if($element != 'Save')
			{
				$table_start_args = array(
					id=>$element,
					tableclass=>'width-100percent blank-element',
					tableborder=>'3',
					indentlevel=>2,
					cellvalign=>'top',
				);
				$table->DisplayComponent_StartTable($table_start_args);
				
				$element_text_args = array(
					text=>$element,
					indentlevel=>5,
				);
				$text->Display($element_text_args);
				
				$separate_cells_args = array(
					cellwidth=>'80%',
					indentlevel=>2,
					cellvalign=>'top',
				);
				$table->DisplayComponent_SeparateCells($separate_cells_args);
			}
			else
			{
				$table_start_args = array(
					id=>$element,
					tableclass=>'width-100percent blank-element',
					tableborder=>'3',
					indentlevel=>2,
					cellvalign=>'top',
					cellcolspan=>2,
				);
				$table->DisplayComponent_StartTable($table_start_args);
			}
			
			switch($element) {
				case 'Title':
					$type_args = array(
						type=>'text',
						name=>'Title',
						size=>60,
						indentlevel=>5,
						maxlength=>255,
						autofocus=>true,
					);
					
					$form->DisplayFormField($type_args);
				
					break;
				
				case 'Subtitle':
					$type_args = array(
						type=>'text',
						name=>'Subtitle',
						size=>60,
						indentlevel=>5,
						maxlength=>255,
					);
					
					$form->DisplayFormField($type_args);
					
					break;
				
				case 'List Title':
					$type_args = array(
						type=>'text',
						name=>'ListTitle',
						size=>60,
						indentlevel=>5,
						maxlength=>255,
					);
					
					$form->DisplayFormField($type_args);
					
					break;
					
				case 'Entry Translation':
							// Display Field
							// -------------------------------------------------------
							
					$element_text_args = [
						text=>'Title : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'entrytranslation_Title[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
							
					$element_text_args = [
						text=>'Subtitle : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'entrytranslation_Subtitle[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
							
					$element_text_args = [
						text=>'List Title : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'entrytranslation_ListTitle[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Language : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$language_args = [
						type=>'select',
						name=>'entrytranslation_Language[]',
						options=>$this->SelectableLanguages,
						selected=>'en',
						indentlevel=>5,
					];
					
					$form->DisplayFormField($language_args);
					
							// Display 'Add' Button
							// -------------------------------------------------------
					
					$type_args = array(
						'type'=>'button',
						'id'=>'add-entrytranslation-button',
						'class'=>'float-right',
						'value'=>'Add Entry Translation',
						'indentlevel'=>5,
					);
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Start Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'hidden-entrytranslation-input',
						'class'=>'display-none',
						'indentlevel'=>6,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
							// Display Field
							// -------------------------------------------------------
							
					$element_text_args = [
						text=>'Title : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'entrytranslation_Title-Hidden',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
							
					$element_text_args = [
						text=>'Subtitle : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'entrytranslation_Subtitle-Hidden',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
							
					$element_text_args = [
						text=>'List Title : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'entrytranslation_ListTitle-Hidden',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Language : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$language_args = [
						type=>'select',
						name=>'entrytranslation_Language-Hidden',
						options=>$this->SelectableLanguages,
						selected=>'en',
						indentlevel=>5,
					];
					
					$form->DisplayFormField($language_args);
					
							// Display 'Delete' Button
							// -------------------------------------------------------
					
					$type_args = array(
						'type'=>'button',
						'id'=>'delete-entrytranslation-button',
						'class'=>'float-right',
						'value'=>'Remove',
						'indentlevel'=>7,
					);
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>7,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>7,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Finish Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_end_args = [
						'indentlevel'=>6,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Establish Bottom Hidden Div for JS-Showing
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'entrytranslation-list',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
				
					break;
					
				case 'Code':
					$type_args = array(
						type=>'text',
						name=>'Code',
						size=>60,
						indentlevel=>5,
						maxlength=>255,
					);
					
					$form->DisplayFormField($type_args);
					
					break;
					
				case 'Availability Start':
					$availability_start_args = array(
						type=>'text',
						name=>'AvailabilityStartDate[]',
						size=>20,
						indentlevel=>5,
						'class'=>'datepicker',
					);
					
					$form->DisplayFormField($availability_start_args);
					
					$availability_start_args = array(
						type=>'text',
						name=>'AvailabilityStartTime[]',
						size=>20,
						indentlevel=>5,
						'class'=>'timepicker',
					);
					
					$form->DisplayFormField($availability_start_args);
				
					break;
					
				case 'Availability End':
					$availability_end_args = array(
						type=>'text',
						name=>'AvailabilityEndDate[]',
						size=>20,
						indentlevel=>5,
						'class'=>'datepicker',
					);
					
					$form->DisplayFormField($availability_end_args);
					
					$availability_end_args = array(
						type=>'text',
						name=>'AvailabilityEndTime[]',
						size=>20,
						indentlevel=>5,
						'class'=>'timepicker',
					);
					
					$form->DisplayFormField($availability_end_args);
				
					break;
					
				case 'Description':
							// Display Field
							// -------------------------------------------------------
							
					$type_args = array(
						type=>'textarea',
						name=>'Description[]',
						cols=>60,
						rows=>5,
						indentlevel=>5,
						maxlength=>512,
						'class'=>'float-left',
					);
					
					$form->DisplayFormField($type_args);
						
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Source : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = array(
						type=>'text',
						name=>'description_Source[]',
						size=>30,
						indentlevel=>5,
						maxlength=>512,
					);
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Language : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$language_args = [
						type=>'select',
						name=>'description_Language[]',
						options=>$this->SelectableLanguages,
						selected=>'en',
						indentlevel=>5,
					];
					
					$form->DisplayFormField($language_args);
					
							// Display 'Add' Button
							// -------------------------------------------------------
					
					$type_args = array(
						'type'=>'button',
						'id'=>'add-description-button',
						'class'=>'float-right',
						'value'=>'Add Description',
						'indentlevel'=>5,
					);
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Start Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'hidden-description-input',
						'class'=>'display-none',
						'indentlevel'=>6,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
							// Display Hidden Input
							// -------------------------------------------------------
							
					$type_args = array(
						type=>'textarea',
						name=>'Description-Hidden',
						cols=>60,
						rows=>5,
						indentlevel=>5,
						maxlength=>512,
						'class'=>'float-left',
					);
					
					$form->DisplayFormField($type_args);
							
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Source : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = array(
						type=>'text',
						name=>'description_Source-Hidden',
						size=>30,
						indentlevel=>5,
						maxlength=>512,
					);
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Language : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$language_args = [
						type=>'select',
						name=>'description_Language-Hidden',
						options=>$this->SelectableLanguages,
						selected=>'en',
						indentlevel=>5,
					];
					
					$form->DisplayFormField($language_args);
					
							// Display 'Delete' Button
							// -------------------------------------------------------
					
					$type_args = array(
						'type'=>'button',
						'id'=>'delete-description-button',
						'class'=>'float-right',
						'value'=>'Remove',
						'indentlevel'=>7,
					);
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>7,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>7,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Finish Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_end_args = [
						'indentlevel'=>6,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Establish Bottom Hidden Div for JS-Showing
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'description-list',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
					break;
					
				case 'Quote':
							// Display Field
							// -------------------------------------------------------
							
					$type_args = array(
						type=>'textarea',
						name=>'Quote[]',
						cols=>60,
						rows=>5,
						indentlevel=>5,
						maxlength=>512,
						'class'=>'float-left',
					);
					
					$form->DisplayFormField($type_args);
						
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Source : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = array(
						type=>'text',
						name=>'quote_Source[]',
						size=>30,
						indentlevel=>5,
						maxlength=>512,
					);
					
					$form->DisplayFormField($type_args);
						
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Language : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$language_args = [
						type=>'select',
						name=>'quote_Language[]',
						options=>$this->SelectableLanguages,
						selected=>'en',
						indentlevel=>5,
					];
					
					$form->DisplayFormField($language_args);
					
							// Display 'Add' Button
							// -------------------------------------------------------
					
					$type_args = array(
						'type'=>'button',
						'id'=>'add-quote-button',
						'class'=>'float-right',
						'value'=>'Add Quote',
						'indentlevel'=>5,
					);
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Start Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'hidden-quote-input',
						'class'=>'display-none',
						'indentlevel'=>6,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
							// Display Hidden Input
							// -------------------------------------------------------
							
					$type_args = array(
						type=>'textarea',
						name=>'Quote-Hidden',
						cols=>60,
						rows=>5,
						indentlevel=>5,
						'class'=>'float-left',
					);
					
					$form->DisplayFormField($type_args);
					
					$element_text_args = [
						text=>'Language : ',
						indentlevel=>5,
						'class'=>'float-left',
					];
					$text->Display($element_text_args);
					
					$language_args = [
						type=>'select',
						name=>'quote_Language-Hidden',
						options=>$this->SelectableLanguages,
						selected=>'en',
						indentlevel=>5,
					];
					
					$form->DisplayFormField($language_args);
					
							// Display 'Delete' Button
							// -------------------------------------------------------
					
					$type_args = array(
						'type'=>'button',
						'id'=>'delete-quote-button',
						'class'=>'float-right',
						'value'=>'Remove',
						'indentlevel'=>7,
					);
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>7,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>7,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Finish Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_end_args = [
						'indentlevel'=>6,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Establish Bottom Hidden Div for JS-Showing
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'quote-list',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
					break;
					
				case 'Text Body':
							// Display Field
							// -------------------------------------------------------
							
					$type_args = array(
						type=>'textarea',
						name=>'Text[]',
						cols=>60,
						rows=>20,
						indentlevel=>5,
						'class'=>'float-left',
					);
					
					$form->DisplayFormField($type_args);
						
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Source : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = array(
						type=>'text',
						name=>'textbody_Source[]',
						size=>30,
						indentlevel=>5,
						maxlength=>512,
					);
					
					$form->DisplayFormField($type_args);
						
							// Display Field
							// -------------------------------------------------------
					
					print("<br>");
					$element_text_args = [
						text=>'Strip URLS : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = array(
						type=>'checkbox',
						name=>'textbody_StripURLs[]',
						value=>'1',
						size=>30,
						indentlevel=>5,
						maxlength=>512,
						checked=>'CHECKED',
					);
					
					$form->DisplayFormField($type_args);
						
							// Display Field
							// -------------------------------------------------------
					
					print("<br>");
					$element_text_args = [
						text=>'Americanize Vocabulary : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = array(
						type=>'checkbox',
						name=>'textbody_AmericanizeVocabulary[]',
						value=>'1',
						size=>30,
						indentlevel=>5,
						maxlength=>512,
						checked=>'CHECKED',
					);
					
					$form->DisplayFormField($type_args);
					print("<br>");
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Language : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$language_args = [
						type=>'select',
						name=>'textbody_Language[]',
						options=>$this->SelectableLanguages,
						selected=>'en',
						indentlevel=>5,
					];
					
					$form->DisplayFormField($language_args);
					
							// Display 'Add' Button
							// -------------------------------------------------------
					
					$type_args = array(
						'type'=>'button',
						'id'=>'add-text-button',
						'class'=>'float-right',
						'value'=>'Add Text',
						'indentlevel'=>5,
					);
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Start Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'hidden-text-input',
						'class'=>'display-none',
						'indentlevel'=>6,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
							// Display Hidden Input
							// -------------------------------------------------------
							
					$type_args = array(
						type=>'textarea',
						name=>'Text-Hidden',
						cols=>60,
						rows=>20,
						indentlevel=>5,
						'class'=>'float-left',
					);
					
					$form->DisplayFormField($type_args);
						
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Source : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = array(
						type=>'text',
						name=>'textbody_Source-Hidden',
						size=>30,
						indentlevel=>5,
						maxlength=>512,
					);
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Language : ',
						indentlevel=>5,
						'class'=>'float-left',
					];
					$text->Display($element_text_args);
					
					$language_args = [
						type=>'select',
						name=>'textbody_Language-Hidden',
						options=>$this->SelectableLanguages,
						selected=>'en',
						indentlevel=>5,
					];
					
					$form->DisplayFormField($language_args);
					
							// Display 'Delete' Button
							// -------------------------------------------------------
					
					$type_args = array(
						'type'=>'button',
						'id'=>'delete-text-button',
						'class'=>'float-right',
						'value'=>'Remove',
						'indentlevel'=>7,
					);
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>7,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>7,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Finish Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_end_args = [
						'indentlevel'=>6,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Establish Bottom Hidden Div for JS-Showing
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'text-list',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
					break;
			
				case 'Image':
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Title : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'image_Title[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Filename : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'image_FileName[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Description : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'image_Description[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'File : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
							
					$type_args = array(
						type=>'file',
						name=>'Image[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					);
					
					$form->DisplayFormField($type_args);
					
							// Display 'Add' Button
							// -------------------------------------------------------
					
					$type_args = array(
						'type'=>'button',
						'id'=>'add-image-button',
						'class'=>'float-right',
						'value'=>'Add Image',
						'indentlevel'=>5,
					);
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Start Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'hidden-image-input',
						'class'=>'display-none',
						'indentlevel'=>6,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
							// Display Hidden Input
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Title : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'image_Title-Hidden',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Filename : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'image_FileName-Hidden',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Description : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'image_Description-Hidden',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'File : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
							
					$type_args = array(
						type=>'file',
						name=>'Image-Hidden',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					);
					
					$form->DisplayFormField($type_args);
					
							// Display 'Delete' Button
							// -------------------------------------------------------
					
					$type_args = array(
						'type'=>'button',
						'id'=>'delete-image-button',
						'class'=>'float-right',
						'value'=>'Remove',
						'indentlevel'=>7,
					);
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>7,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>7,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Finish Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_end_args = [
						'indentlevel'=>6,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Establish Bottom Hidden Div for JS-Showing
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'image-list',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
					break;
					
				case 'Image Translation':
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Title : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'imagetranslation_Title[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Filename : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'imagetranslation_FileName[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Description : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'imagetranslation_Description[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Language : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$language_args = [
						type=>'select',
						name=>'imagetranslation_Language[]',
						options=>$this->SelectableLanguages,
						selected=>'en',
						indentlevel=>5,
					];
					
					$form->DisplayFormField($language_args);
					
							// Display 'Add' Button
							// -------------------------------------------------------
					
					$type_args = array(
						'type'=>'button',
						'id'=>'add-image-translation-button',
						'class'=>'float-right',
						'value'=>'Add Image Translation',
						'indentlevel'=>5,
					);
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Start Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'hidden-image-translation-input',
						'class'=>'display-none',
						'indentlevel'=>6,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Title : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'imagetranslation_Title-Hidden',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Filename : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'imagetranslation_FileName-Hidden',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Description : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'imagetranslation_Description-Hidden',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Language : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$language_args = [
						type=>'select',
						name=>'imagetranslation_Language-Hidden',
						options=>$this->SelectableLanguages,
						selected=>'en',
						indentlevel=>5,
					];
					
					$form->DisplayFormField($language_args);
					
							// Display 'Delete' Button
							// -------------------------------------------------------
					
					$type_args = array(
						'type'=>'button',
						'id'=>'delete-image-translation-button',
						'class'=>'float-right',
						'value'=>'Remove',
						'indentlevel'=>7,
					);
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>7,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>7,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Finish Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_end_args = [
						'indentlevel'=>6,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Establish Bottom Hidden Div for JS-Showing
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'image-translation-list',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
					break;
				
				case 'Tag':
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Tag : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
							
					$type_args = array(
						type=>'text',
						name=>'Tag[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					);
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Language : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$language_args = [
						type=>'select',
						name=>'tag_Language[]',
						options=>$this->SelectableLanguages,
						selected=>'en',
						indentlevel=>5,
					];
					
					$form->DisplayFormField($language_args);
					
							// Display 'Add' Button
							// -------------------------------------------------------
					
					$type_args = array(
						'type'=>'button',
						'id'=>'add-tag-button',
						'class'=>'float-right',
						'value'=>'Add Tag',
						'indentlevel'=>5,
					);
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Start Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'hidden-tag-input',
						'class'=>'display-none',
						'indentlevel'=>6,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
							// Display Hidden Input
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Tag : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = array(
						'type'=>'text',
						'name'=>'Tag-Hidden',
						'size'=>40,
						'indentlevel'=>7,
						'maxlength'=>255,
					);
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Language : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$language_args = [
						type=>'select',
						name=>'tag_Language-Hidden',
						options=>$this->SelectableLanguages,
						selected=>'en',
						indentlevel=>5,
					];
					
					$form->DisplayFormField($language_args);
					
							// Display 'Delete' Button
							// -------------------------------------------------------
					
					$type_args = array(
						'type'=>'button',
						'id'=>'delete-tag-button',
						'class'=>'float-right',
						'value'=>'Remove',
						'indentlevel'=>7,
					);
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>7,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>7,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Finish Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_end_args = [
						'indentlevel'=>6,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Establish Bottom Hidden Div for JS-Showing
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'tag-list',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
					break;
					
				case 'Link':
							// Display Title Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Title : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'link_Title[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display URL Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'URL : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
							
					$type_args = [
						type=>'text',
						name=>'URL[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Language : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$language_args = [
						type=>'select',
						name=>'link_Language[]',
						options=>$this->SelectableLanguages,
						selected=>'en',
						indentlevel=>5,
					];
					
					$form->DisplayFormField($language_args);
					
							// Display 'Add' Button
							// -------------------------------------------------------
					
					$type_args = [
						'type'=>'button',
						'id'=>'add-link-button',
						'class'=>'float-right',
						'value'=>'Add Link',
						'indentlevel'=>5,
					];
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Start Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'hidden-link-input',
						'class'=>'display-none',
						'indentlevel'=>6,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
							// Display Hidden Input
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Title : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = array(
						'type'=>'text',
						'name'=>'link_Title-Hidden',
						'size'=>40,
						'indentlevel'=>7,
						'maxlength'=>255,
					);
					
					$form->DisplayFormField($type_args);
					
							// Display Hidden Input
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'URL : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = array(
						'type'=>'text',
						'name'=>'URL-Hidden',
						'size'=>40,
						'indentlevel'=>7,
						'maxlength'=>255,
					);
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Language : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$language_args = [
						type=>'select',
						name=>'link_Language-Hidden',
						options=>$this->SelectableLanguages,
						selected=>'en',
						indentlevel=>5,
					];
					
					$form->DisplayFormField($language_args);
					
							// Display 'Delete' Button
							// -------------------------------------------------------
					
					$type_args = array(
						'type'=>'button',
						'id'=>'delete-link-button',
						'class'=>'float-right',
						'value'=>'Remove',
						'indentlevel'=>7,
					);
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>7,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>7,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Finish Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_end_args = [
						'indentlevel'=>6,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Establish Bottom Hidden Div for JS-Showing
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'link-list',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
					break;
					
				case 'Event Date':
							// Display Title Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Date : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'EventDate[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
						'class'=>'datepicker',
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Title Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Time : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'EventTime[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Title Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Title : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'eventdate_Title[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Title Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Description : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'eventdate_Description[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Title Field
							// -------------------------------------------------------
							
					$element_text_args = [
						text=>'Language : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$language_args = [
						type=>'select',
						name=>'eventdate_Language[]',
						options=>$this->SelectableLanguages,
						selected=>'en',
						indentlevel=>5,
					];
					
					$form->DisplayFormField($language_args);
					
							// Display 'Add' Button
							// -------------------------------------------------------
					
					$type_args = [
						'type'=>'button',
						'id'=>'add-event-date-button',
						'class'=>'float-right',
						'value'=>'Add Event Date',
						'indentlevel'=>5,
					];
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Start Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'hidden-event-date-input',
						'class'=>'display-none',
						'indentlevel'=>6,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
							// Display Hidden Input
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Date : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'EventDate-Hidden',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
						'class'=>'datepicker',
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Title Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Time : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'EventTime-Hidden',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Title Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Title : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'eventdate_Title-Hidden',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Title Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Description : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'eventdate_Description-Hidden',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Title Field
							// -------------------------------------------------------
							
					$element_text_args = [
						text=>'Language : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$language_args = [
						type=>'select',
						name=>'eventdate_Language-Hidden',
						options=>$this->SelectableLanguages,
						selected=>'en',
						indentlevel=>5,
					];
					
					$form->DisplayFormField($language_args);
					
							// Display 'Delete' Button
							// -------------------------------------------------------
					
					$type_args = array(
						'type'=>'button',
						'id'=>'delete-event-date-button',
						'class'=>'float-right',
						'value'=>'Remove',
						'indentlevel'=>7,
					);
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>7,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>7,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Finish Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_end_args = [
						'indentlevel'=>6,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Establish Bottom Hidden Div for JS-Showing
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'event-date-list',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
					break;
					
				case 'Association':
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Entry ID Associated With : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'ChosenEntryid[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Type : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'association_Type[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'SubType : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'association_SubType[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display 'Add' Button
							// -------------------------------------------------------
					
					$type_args = [
						'type'=>'button',
						'id'=>'add-association-button',
						'class'=>'float-right',
						'value'=>'Add Association',
						'indentlevel'=>5,
					];
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Start Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'hidden-association-input',
						'class'=>'display-none',
						'indentlevel'=>6,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
							// Display Title Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Entry ID Associated With : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'ChosenEntryid-Hidden',
						size=>10,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Title Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Type : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'association_Type-Hidden',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Title Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'SubType : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'association_SubType-Hidden',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display 'Delete' Button
							// -------------------------------------------------------
					
					$type_args = array(
						'type'=>'button',
						'id'=>'delete-association-button',
						'class'=>'float-right',
						'value'=>'Remove',
						'indentlevel'=>7,
					);
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>7,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>7,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Finish Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_end_args = [
						'indentlevel'=>6,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Establish Bottom Hidden Div for JS-Showing
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'association-list',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
					break;
					
				case 'Definition':
							// Autogen?
							// -------------------------------------------------------
				
					$element_text_args = [
						text=>'Autogenerate Definitions : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = array(
						type=>'checkbox',
						name=>'autogenerate-definitions',
						value=>1,
						indentlevel=>5,
						maxlength=>512,
					);
					
					$form->DisplayFormField($type_args);
					
					print('<br>');
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Definition : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'Term[]',
						size=>20,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
					$type_args = [
						type=>'text',
						name=>'definition_Definition[]',
						size=>60,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display 'Add' Button
							// -------------------------------------------------------
					
					$type_args = array(
						'type'=>'button',
						'id'=>'add-definition-button',
						'class'=>'float-right',
						'value'=>'Add Definition',
						'indentlevel'=>5,
					);
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Start Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'hidden-definition-input',
						'class'=>'display-none',
						'indentlevel'=>6,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
							// Display Hidden Input
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Definition : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = array(
						'type'=>'text',
						'name'=>'Term-Hidden',
						'size'=>20,
						'indentlevel'=>7,
						'maxlength'=>255,
					);
					
					$form->DisplayFormField($type_args);
					
					$type_args = array(
						'type'=>'text',
						'name'=>'definition_Definition-Hidden',
						'size'=>60,
						'indentlevel'=>7,
						'maxlength'=>255,
					);
					
					$form->DisplayFormField($type_args);
					
							// Display 'Delete' Button
							// -------------------------------------------------------
					
					$type_args = array(
						'type'=>'button',
						'id'=>'delete-definition-button',
						'class'=>'float-right',
						'value'=>'Remove',
						'indentlevel'=>7,
					);
					
					$form->DisplayFormField($type_args);
					
							// Clear Float
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'class'=>'clear-float',
						'indentlevel'=>7,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>7,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Finish Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_end_args = [
						'indentlevel'=>6,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
							// Establish Bottom Hidden Div for JS-Showing
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'definition-list',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
					break;
				
				case 'Save':
					$element_text_args = array(
						text=>'<center>',
						indentlevel=>5,
					);
					$text->Display($element_text_args);
					
					$type_args = array(
						type=>'submit',
						name=>'Save',
						value=>'Save',
						indentlevel=>5,
					);
					
					$form->DisplayFormField($type_args);
					
					$type_args = array(
						type=>'hidden',
						name=>'action',
						value=>'Save',
						indentlevel=>5,
					);
					
					$form->DisplayFormField($type_args);
					
					$element_text_args = array(
						text=>'</center>',
						indentlevel=>5,
					);
					$text->Display($element_text_args);
					
					break;
			}
			
			$table_end_args = array(
				indentlevel=>2,
			);
			$table->DisplayComponent_EndTable($table_end_args);
		}
		
				// Display Form Elements : End
			
			// -------------------------------------------------------------
		
		$end_form_args = array(
			indentlevel=>1,
		);
		$form->EndForm($end_form_args);
		
		$divider_end_args = array(
			indentlevel=>1,
		);
		$divider->displayend($divider_end_args);
	}
	
?>