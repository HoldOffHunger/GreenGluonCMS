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
	
			// Display Parent Record Info
		
		// -------------------------------------------------------------
	
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
		'list'=>[
			[
				'<nobr>Adding Entry To:</nobr>', $this->GetHyperlinkedEntryView([entry=>$this->parent, entrylist=>$this->record_list]),
			],
			[
				'<nbr>Status:</nobr>', $this->save_status,
			],
		],
	);
	$generic_list->Display($version_list_display_args);
	
	$divider->displayend($divider_end_args);
	
			// Display Admin Errors
		
		// -------------------------------------------------------------
	
	$error_header_displayed = 0;
	
	if($this->authentication_object->CheckAuthenticationForCurrentObject_IsAdmin() && $this->admin_errors)
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
	
	if($this->errors)
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
	
			// Display Form Elements : Start
		
		// -------------------------------------------------------------
	
	$divider_padding_start_args = array(
		'class'=>'horizontal-center width-80percent margin-top-5px border-2px',
		'indentlevel'=>1,
	);
	
	$divider->displaystart($divider_padding_start_args);
	
			// Display Form Save Results
		
		// -------------------------------------------------------------
	
	if($this->saveattemptresults)
	{
				// Display Record Creation IDs
			
			// -------------------------------------------------------------
	
		if($this->authentication_object->CheckAuthenticationForCurrentObject_IsAdmin())
		{
					// Display Div : Start
				
				// -------------------------------------------------------------
	
			$divider_padding_start_args = array(
				'class'=>'horizontal-center width-70percent',
				'indentlevel'=>1,
			);
			$divider->displaystart($divider_padding_start_args);
			
					// Display IDs
				
				// -------------------------------------------------------------
			
			#print_r($this->GetCreatedRecordsList());
			
			#print("sup?");
			
			$version_list_display_args = array(
				'options'=>array(
					'indentlevel'=>1,
					'tableheaders'=>0,
					'tableclass'=>'width-100percent horizontal-center border-2px background-color-gray13 margin-5px',
					'rowclass'=>'border-1px horizontal-left',
					'cellclass'=>array(
						'border-1px vertical-top',
						'border-1px width-100percent vertical-top',
					),
				),
				'list'=>$this->GetCreatedRecordsList(),
			);
			$generic_list->Display($version_list_display_args);
			
					// Display Div : End
				
				// -------------------------------------------------------------
				
			$divider_end_args = array(
				indentlevel=>1,
			);
			$divider->displayend($divider_end_args);
		}
		
				// Display Form Elements : Standard Elements
			
			// -------------------------------------------------------------
		
		$elements = [
			'Title',
			'Subtitle',
			'List Title',
			'Code',
			'Entry Translation',
			'Availability Dates',
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
		];
		
		foreach ($elements as $element)
		{
				// Start Table Display
				// ----------------------------------------
				
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
			
				// Display Record Fields
				// ----------------------------------------
			
			switch($element) {
				case 'Title':
					$element_text_args = [
						text=>$this->entry['Title'],
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					break;
					
				case 'Subtitle':
					$element_text_args = [
						text=>$this->entry['Subtitle'],
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					break;
					
				case 'List Title':
					$element_text_args = [
						text=>$this->entry['ListTitle'],
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					break;
					
				case 'Code':
					$element_text_args = [
						text=>$this->entry['Code'],
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					break;
					
				case 'Entry Translation':
					$printable_entry_translations = [];
					foreach ($this->entrytranslation as $entry_translation)
					{
						if($entry_translation['Title'])
						{
							$printable_entry_translations[] = $entry_translation['Title'] . ': ' . $entry_translation['Subtitle'] . ' (Language: ' . $entry_translation['Language'] . ')';
						}
					}
					
					if(count($printable_entry_translations))
					{
						$element_text = implode('<br>', $printable_entry_translations);
					}
					else
					{
						$element_text = 'N/A';
					}
					
					$element_text_args = [
						text=>$element_text,
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					break;
					
				case 'Availability Dates':
					$printable_availability_dates = [];
					
					foreach ($this->availabilitydaterange as $availabilitydaterange)
					{
						$availability_start_date = $availabilitydaterange['AvailabilityStart'];
						$availability_end_date = $availabilitydaterange['AvailabilityEnd'];
						
						$printable_availability_dates[] = $availability_start_date . ' to ' . $availability_end_date;
					}
					
					$element_text_args = [
						text=>implode('<br>', $printable_availability_dates),
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					break;
					
				case 'Description':
					$printable_descriptions = [];
					foreach ($this->description as $description)
					{
						$description_description = $description['Description'];
						
						if($description_description)
						{
							$printable_descriptions[] = $description_description . ' (Language: ' . $description['Language'] . ')';
						}
					}
					
					if(count($printable_descriptions))
					{
						$element_text = implode('<br>', $printable_descriptions);
					}
					else
					{
						$element_text = 'N/A';
					}
					
					$element_text_args = [
						text=>$element_text,
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					break;
					
				case 'Quote':
					$printable_quotes = [];
					foreach ($this->quote as $quote)
					{
						$quote_quote = $quote['Quote'];
						
						if($quote_quote)
						{
							$printable_quotes[] = $quote_quote . ' (Language: ' . $quote['Language'] . ')';
						}
					}
					
					if(count($printable_quotes))
					{
						$element_text = implode('<br>', $printable_quotes);
					}
					else
					{
						$element_text = 'N/A';
					}
					
					$element_text_args = [
						text=>$element_text,
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					break;
					
				case 'Text Body':
					$printable_texts = [];
					foreach ($this->textbody as $textbody)
					{
						$textbody_text = $textbody['Text'];
						
						if($textbody_text)
						{
							$printable_texts[] = $textbody_text . ' (Language: ' . $textbody['Language'] . ')';
						}
					}
					
					if(count($printable_texts))
					{
						$element_text = implode('<br>', $printable_texts);
					}
					else
					{
						$element_text = 'N/A';
					}
					
					$element_text_args = [
						text=>$element_text,
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					break;
				
				case 'Image':
					$printable_images = [];
					foreach($this->image as $image)
					{
						if($image['Title'])
						{
							$image_text = $image['Title'] . ' (' . $image['FileName'] . ')';
							
							$printable_images[] = $image_text;
						}
					}
					
					if(count($printable_images))
					{
						$element_text = implode('<br>', $printable_images);
					}
					else
					{
						$element_text = 'N/A';
					}
					
					$element_text_args = [
						text=>$element_text,
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					break;
				
				case 'Image Translation':
					$printable_image_translations = [];
					foreach($this->imagetranslation as $image_translation)
					{
						if($image_translation['FileName'])
						{
							$image_translation_text = $image_translation['Title'] . ' (' . $image_translation['FileName'] . ' ~ ' . $image_translation['Language'] . ')';
							
							$printable_image_translations[] = $image_translation_text;
						}
					}
					
					if(count($printable_image_translations))
					{
						$element_text = implode('<br>', $printable_image_translations);
					}
					else
					{
						$element_text = 'N/A';
					}
					
					$element_text_args = [
						text=>$element_text,
						indentlevel=>5,
					];
					
					$text->Display($element_text_args);
					
					break;
				
				case 'Tag':
					$printable_tags = [];
					
					foreach ($this->tag as $tag)
					{
						$tag_text = $tag['Tag'];
						if($tag_text)
						{
							$tag_text = '&bull; ' . $tag_text;
							
							if($tag['Language'])
							{
								$tag_text .= ' (' . $tag['Language'] . ')';
							}
							
							$printable_tags[] = $tag_text;
						}
					}
					
					if(count($printable_tags))
					{
						$element_text = implode('<br>', $printable_tags);
					}
					else
					{
						$element_text = 'N/A';
					}
					
					$element_text_args = [
						text=>$element_text,
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					break;
					
				case 'Link':
					$printable_links = [];
					
					foreach ($this->link as $link)
					{
						$link_url = $link['URL'];
						
						if($link_url)
						{
							$link_text = $link['Title'];
							
							$link_display = '';
							
							if($link_url)
							{
								$link_display .= '&bull; <a href="' . $link_url . '" target="_blank">';
							}
							
							$link_display .= $link_text;
							
							if($link['Language'])
							{
								$link_display .= ' (' . $link['Language'] . ')';
							}
							
							if($link_url)
							{
								$link_display .= '</a>';
							}
							
							$printable_links[] = $link_display;
						}
					}
					
					if(count($printable_links))
					{
						$element_text = implode('<br>', $printable_links);
					}
					else
					{
						$element_text = 'N/A';
					}
					
					$element_text_args = [
						text=>$element_text,
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					break;
				
				case 'Event Date':
					$printable_event_dates = [];
					
					foreach ($this->eventdate as $eventdate)
					{
						$event_date_time = $eventdate['EventDateTime'];
						
						if($event_date_time)
						{
							$event_date_time_printable = '&bull; ' . $event_date_time . ' (' . $eventdate['Title'] . ' ~ ' . $eventdate['Language'] . ')';
							$printable_event_dates[] = $event_date_time_printable;
						}
					}
					
					if(count($printable_event_dates))
					{
						$element_text = implode('<br>', $printable_event_dates);
					}
					else
					{
						$element_text = 'N/A';
					}
					
					$element_text_args = [
						text=>$element_text,
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					break;
				
				case 'Association':
					$printable_associations = [];
					
					foreach ($this->association as $association)
					{
						$association_text = $association['ChosenEntryid'];
						if($association_text)
						{
							$association_text = '&bull; ' . $association_text;
							
							if($association['Type'] || $association['SubType'])
							{
								
								$association_text .= ' (';
								
								if($association['Type'])
								{
									$association_text .= $association['Type'];
									
									if($association['SubType'])
									{
										$association_text .= ' ~ ';
									}
								}
								
								if($association['SubType'])
								{
									$association_text .= $association['SubType'];
								}
								
								$association_text .= ')';
								
								$printable_associations[] = $association_text;
							}
						}
					}
					
					if(count($printable_associations))
					{
						$element_text = implode('<br>', $printable_associations);
					}
					else
					{
						$element_text = 'N/A';
					}
					
					$element_text_args = [
						text=>$element_text,
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					break;
				
				case 'Definition':
					$printable_definitions = [];
					
					foreach ($this->definition as $definition)
					{
						$term_text = $definition['Term'];
						if($tag_text)
						{
							$term_text = '&bull; ' . $term_text . ' : ' . $definition['Definition'];
							
							$printable_definitions[] = $term_text;
						}
					}
					
					if(count($printable_definitions))
					{
						$element_text = implode('<br>', $printable_definitions);
					}
					else
					{
						$element_text = 'N/A';
					}
					
					$element_text_args = [
						text=>$element_text,
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					break;
			}
			
				// End Table Display
				// ----------------------------------------
			
			$table_end_args = [
				indentlevel=>2,
			];
			$table->DisplayComponent_EndTable($table_end_args);
		}
	}
	else
	
			// Re-Display Form
		
		// -------------------------------------------------------------
	
	{
		$start_form_args = [
			'action'=>0,
			'method'=>'post',
			'files'=>1,
			'formclass'=>'margin-0px',
			'indentlevel'=>1,
		];
		
		$form->StartForm($start_form_args);
		
				// Display Form Elements : Standard Elements
			
			// -------------------------------------------------------------
		
		$elements = [
			'Title',
			'Subtitle',
			'List Title',
			'Code',
			'Entry Translation',
			'Availability Dates',
			'Description',
			'Quote',
			'Text Body',
			'Image',
			'Image Translation',
			'Tag',
			'Link',
			'Event Date',
			'Association',
			'Save',
		];
		
		foreach ($elements as $element)
		{
			if($element != 'Save')
			{
				$table_start_args = [
					id=>$element,
					tableclass=>'width-100percent blank-element',
					tableborder=>'3',
					indentlevel=>2,
					cellvalign=>'top',
				];
				$table->DisplayComponent_StartTable($table_start_args);
				
				$element_text_args = [
					text=>$element,
					indentlevel=>5,
				];
				$text->Display($element_text_args);
				
				$separate_cells_args = [
					cellwidth=>'80%',
					indentlevel=>2,
					cellvalign=>'top',
				];
				$table->DisplayComponent_SeparateCells($separate_cells_args);
			}
			else
			{
				$table_start_args = [
					id=>$element,
					tableclass=>'width-100percent blank-element',
					tableborder=>'3',
					indentlevel=>2,
					cellvalign=>'top',
					cellcolspan=>2,
				];
				$table->DisplayComponent_StartTable($table_start_args);
			}
			
			switch($element) {
				case 'Title':
					$type_args = array(
						type=>'text',
						name=>'Title',
						size=>60,
						indentlevel=>5,
						value=>$this->entry['Title'],
						maxlength=>255,
					);
					
					$form->DisplayFormField($type_args);
				
					break;
				
				case 'Subtitle':
					$type_args = array(
						type=>'text',
						name=>'Subtitle',
						size=>60,
						indentlevel=>5,
						value=>$this->entry['Subtitle'],
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
						value=>$this->entry['ListTitle'],
						maxlength=>255,
					);
					
					$form->DisplayFormField($type_args);
					
					break;
					
				case 'Code':
					$type_args = array(
						type=>'text',
						name=>'Code',
						size=>60,
						indentlevel=>5,
						value=>$this->entry['Code'],
						maxlength=>255,
					);
					
					$form->DisplayFormField($type_args);
					
					break;
					
				case 'Entry Translation':
							// Preset Check if Displayed
							// -------------------------------------------------------
					
					$entry_translations_displayed = 0;
					
					foreach ($this->entrytranslation as $entry_translation)
					{
						if($entry_translation && strlen($entry_translation['Title']))
						{
							if($entry_translations_displayed)
							{
										// Start Field
										// -------------------------------------------------------
								
								$clear_float_divider_start_args = [
									'class'=>'input-divider',
									'indentlevel'=>6,
								];
								
								$divider->displaystart($clear_float_divider_start_args);
							}
								
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
								value=>$entry_translation['Title'],
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
								value=>$entry_translation['Subtitle'],
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
								value=>$entry_translation['ListTitle'],
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
								selected=>$entry_translation['Language'],
								indentlevel=>5,
							];
							
							$form->DisplayFormField($language_args);
							
							if(!$entry_translations_displayed)
							{
										// Display 'Add' Button
										// -------------------------------------------------------
								
								$type_args = array(
									'type'=>'button',
									'id'=>'add-entry-translation-button',
									'class'=>'float-right',
									'value'=>'Add Entry Translation',
									'indentlevel'=>5,
								);
								
								$form->DisplayFormField($type_args);
							}
							else
							{
										// Display 'Delete' Button
										// -------------------------------------------------------
								
								$type_args = array(
									'type'=>'button',
									'id'=>'delete-entry-translation-button',
									'class'=>'float-right',
									'value'=>'Remove',
									'indentlevel'=>5,
								);
								
								$form->DisplayFormField($type_args);
							}
							
									// Finish Field
									// -------------------------------------------------------
							
							if($entry_translations_displayed)
							{
								$clear_float_divider_end_args = [
									'indentlevel'=>6,
								];
								
								$divider->displayend($clear_float_divider_end_args);
							}
							
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
							
							$entry_translations_displayed = 1;
						}
					}
					
							// Display Field if Not Yet Displayed
							// -------------------------------------------------------
					
					if(!$entry_translations_displayed)
					{
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
							'id'=>'add-entry-translation-button',
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
					}
					
							// Start Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'hidden-entry-translation-input',
						'class'=>'display-none',
						'indentlevel'=>6,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
							// Display Hidden Input
							// -------------------------------------------------------
							
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
						text=>'ListTitle : ',
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
						'id'=>'delete-entry-translation-button',
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
						'id'=>'entry-translation-list',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
					break;
					
				case 'Availability Dates':
					foreach ($this->availabilitydaterange as $availabilitydaterange)
					{
						$availability_start_args = array(
							'type'=>'text',
							'name'=>'AvailabilityStartDate[]',
							'size'=>20,
							'indentlevel'=>5,
							'class'=>'datepicker',
							'value'=>$availabilitydaterange[AvailabilityStartDate],
						);
						
						$form->DisplayFormField($availability_start_args);
						
						$availability_start_args = array(
							type=>'text',
							name=>'AvailabilityStartTime[]',
							size=>20,
							indentlevel=>5,
							'class'=>'timepicker',
							'value'=>$availabilitydaterange[AvailabilityStartTime],
						);
						
						$form->DisplayFormField($availability_start_args);
						
						$element_text_args = [
							text=>'<br>',
							indentlevel=>5,
						];
						$text->Display($element_text_args);
						
						$availability_end_args = array(
							type=>'text',
							name=>'AvailabilityEndDate[]',
							size=>20,
							indentlevel=>5,
							'class'=>'datepicker',
							'value'=>$availabilitydaterange[AvailabilityEndDate],
						);
						
						$form->DisplayFormField($availability_end_args);
						
						$availability_end_args = array(
							type=>'text',
							name=>'AvailabilityEndTime[]',
							size=>20,
							indentlevel=>5,
							'class'=>'timepicker',
							'value'=>$availabilitydaterange[AvailabilityEndTime],
						);
						
						$form->DisplayFormField($availability_end_args);
					}
					
					break;
					
				case 'Description':
							// Preset Check if Displayed
							// -------------------------------------------------------
					
					$descriptions_displayed = 0;
					
					foreach ($this->description as $description)
					{
						if($description && strlen($description['Description']))
						{
							if($descriptions_displayed)
							{
										// Start Field
										// -------------------------------------------------------
								
								$clear_float_divider_start_args = [
									'class'=>'input-divider',
									'indentlevel'=>6,
								];
								
								$divider->displaystart($clear_float_divider_start_args);
							}
								
										// Display Field
										// -------------------------------------------------------
							
							$type_args = array(
								type=>'textarea',
								name=>'Description[]',
								cols=>60,
								rows=>5,
								indentlevel=>5,
								value=>$description['Description'],
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
								value=>$description['Source'],
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
								selected=>$description['Language'],
								indentlevel=>5,
							];
							
							$form->DisplayFormField($language_args);
							
							if(!$descriptions_displayed)
							{
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
							}
							else
							{
										// Display 'Delete' Button
										// -------------------------------------------------------
								
								$type_args = array(
									'type'=>'button',
									'id'=>'delete-description-button',
									'class'=>'float-right',
									'value'=>'Remove',
									'indentlevel'=>5,
								);
								
								$form->DisplayFormField($type_args);
							}
							
									// Finish Field
									// -------------------------------------------------------
							
							if($descriptions_displayed)
							{
								$clear_float_divider_end_args = [
									'indentlevel'=>6,
								];
								
								$divider->displayend($clear_float_divider_end_args);
							}
							
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

							
							$descriptions_displayed = 1;
						}
					}
					
							// Display Field if Not Yet Displayed
							// -------------------------------------------------------
					
					if(!$descriptions_displayed)
					{
								// Display Field
								// -------------------------------------------------------
								
						$type_args = array(
							type=>'textarea',
							name=>'Description[]',
							cols=>60,
							rows=>5,
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
					}
					
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
						'class'=>'float-left',
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
							// Preset Check if Displayed
							// -------------------------------------------------------
					
					$quotes_displayed = 0;
					
					foreach ($this->quote as $quote)
					{
						if($quote && strlen($quote['Quote']))
						{
							if($quotes_displayed)
							{
										// Start Field
										// -------------------------------------------------------
								
								$clear_float_divider_start_args = [
									'class'=>'input-divider',
									'indentlevel'=>6,
								];
								
								$divider->displaystart($clear_float_divider_start_args);
							}
								
										// Display Field
										// -------------------------------------------------------
							
							$type_args = array(
								type=>'textarea',
								name=>'Quote[]',
								cols=>60,
								rows=>5,
								indentlevel=>5,
								maxlength=>512,
								value=>$quote['Quote'],
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
								value=>$quote['Source'],
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
								selected=>$quote['Language'],
								indentlevel=>5,
							];
							
							$form->DisplayFormField($language_args);
							
							if(!$quotes_displayed)
							{
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
							}
							else
							{
										// Display 'Delete' Button
										// -------------------------------------------------------
								
								$type_args = array(
									'type'=>'button',
									'id'=>'delete-quote-button',
									'class'=>'float-right',
									'value'=>'Remove',
									'indentlevel'=>5,
								);
								
								$form->DisplayFormField($type_args);
							}
							
									// Finish Field
									// -------------------------------------------------------
							
							if($quotes_displayed)
							{
								$clear_float_divider_end_args = [
									'indentlevel'=>6,
								];
								
								$divider->displayend($clear_float_divider_end_args);
							}
							
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

							
							$quotes_displayed = 1;
						}
					}
					
							// Display Field if Not Yet Displayed
							// -------------------------------------------------------
					
					if(!$quotes_displayed)
					{
									// Display Field
									// -------------------------------------------------------
						
						$type_args = array(
							type=>'textarea',
							name=>'Quote[]',
							cols=>60,
							rows=>5,
							indentlevel=>5,
							maxlength=>512,
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
					}
					
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
						
								// Display Field
								// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Source : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = array(
						type=>'text',
						name=>'quote_Source-Hidden',
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
							// Preset Check if Displayed
							// -------------------------------------------------------
					
					$text_bodies_displayed = 0;
					
					foreach ($this->textbody as $textbody)
					{
						if($textbody && strlen($textbody['Text']))
						{
							if($text_bodies_displayed)
							{
										// Start Field
										// -------------------------------------------------------
								
								$clear_float_divider_start_args = [
									'class'=>'input-divider',
									'indentlevel'=>6,
								];
								
								$divider->displaystart($clear_float_divider_start_args);
							}
								
										// Display Field
										// -------------------------------------------------------
							
							$type_args = array(
								type=>'textarea',
								name=>'Text[]',
								cols=>60,
								rows=>20,
								indentlevel=>5,
								maxlength=>512,
								value=>$textbody['Text'],
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
								value=>$textbody['Source'],
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
								name=>'textbody_Language[]',
								options=>$this->SelectableLanguages,
								selected=>$textbody['Language'],
								indentlevel=>5,
							];
							
							$form->DisplayFormField($language_args);
							
							if(!$text_bodies_displayed)
							{
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
							}
							else
							{
										// Display 'Delete' Button
										// -------------------------------------------------------
								
								$type_args = array(
									'type'=>'button',
									'id'=>'delete-text-button',
									'class'=>'float-right',
									'value'=>'Remove',
									'indentlevel'=>5,
								);
								
								$form->DisplayFormField($type_args);
							}
							
									// Finish Field
									// -------------------------------------------------------
							
							if($text_bodies_displayed)
							{
								$clear_float_divider_end_args = [
									'indentlevel'=>6,
								];
								
								$divider->displayend($clear_float_divider_end_args);
							}
							
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

							
							$text_bodies_displayed = 1;
						}
					}
					
							// Display Field if Not Yet Displayed
							// -------------------------------------------------------
					
					if(!$text_bodies_displayed)
					{
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
					}
					
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
							// Preset Check if Displayed
							// -------------------------------------------------------
					
					$images_displayed = 0;
					
					foreach ($this->image as $image)
					{
						if($image && strlen($image['FileName']))
						{
							if($images_displayed)
							{
										// Start Field
										// -------------------------------------------------------
								
								$clear_float_divider_start_args = [
									'class'=>'input-divider',
									'indentlevel'=>6,
								];
								
								$divider->displaystart($clear_float_divider_start_args);
							}
							
									// Display Field
									// -------------------------------------------------------
							
							$element_text_args = [
								text=>'Title : ',
								indentlevel=>5,
							];
							$text->Display($element_text_args);
							
							$type_args = array(
								type=>'text',
								name=>'image_Title[]',
								size=>40,
								indentlevel=>5,
								value=>$image['Title'],
								maxlength=>255,
							);
							
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
								value=>$image['FileName'],
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
								value=>$image['Description'],
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
							
									// Display Buttons
									// -------------------------------------------------------
							
							if(!$images_displayed)
							{
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
							}
							else
							{
										// Display 'Delete' Button
										// -------------------------------------------------------
								
								$type_args = array(
									'type'=>'button',
									'id'=>'delete-image-button',
									'class'=>'float-right',
									'value'=>'Remove',
									'indentlevel'=>5,
								);
								
								$form->DisplayFormField($type_args);
							}
							
									// Finish Field
									// -------------------------------------------------------
							
							if($images_displayed)
							{
								$clear_float_divider_end_args = [
									'indentlevel'=>6,
								];
								
								$divider->displayend($clear_float_divider_end_args);
							}
							
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

							
							$images_displayed = 1;
						}
					}
					
							// Display Field if Not Yet Displayed
							// -------------------------------------------------------
					
					if(!$images_displayed)
					{
								// Display Field
								// -------------------------------------------------------
						
						$element_text_args = [
							text=>'Title : ',
							indentlevel=>5,
						];
						$text->Display($element_text_args);
						
						$type_args = array(
							type=>'text',
							name=>'image_Title[]',
							size=>40,
							indentlevel=>5,
							maxlength=>255,
						);
						
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
					}
					
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
							// Preset Check if Displayed
							// -------------------------------------------------------
					
					$image_translations_displayed = 0;
					
					foreach ($this->imagetranslation as $image_translation)
					{
						if($image_translation && strlen($image_translation['Title']))
						{
							if($image_translations_displayed)
							{
										// Start Field
										// -------------------------------------------------------
								
								$clear_float_divider_start_args = [
									'class'=>'input-divider',
									'indentlevel'=>6,
								];
								
								$divider->displaystart($clear_float_divider_start_args);
							}
							
									// Display Field
									// -------------------------------------------------------
							
							$element_text_args = [
								text=>'Title : ',
								indentlevel=>5,
							];
							$text->Display($element_text_args);
							
							$type_args = array(
								type=>'text',
								name=>'imagetranslation_Title[]',
								size=>40,
								indentlevel=>5,
								value=>$image_translation['Title'],
								maxlength=>255,
							);
							
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
								value=>$image_translation['FileName'],
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
								value=>$image_translation['Description'],
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
								selected=>$image_translation['Language'],
								indentlevel=>5,
							];
							
							$form->DisplayFormField($language_args);
							
									// Display Buttons
									// -------------------------------------------------------
							
							if(!$image_translations_displayed)
							{
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
							}
							else
							{
										// Display 'Delete' Button
										// -------------------------------------------------------
								
								$type_args = array(
									'type'=>'button',
									'id'=>'delete-image-translation-button',
									'class'=>'float-right',
									'value'=>'Remove',
									'indentlevel'=>5,
								);
								
								$form->DisplayFormField($type_args);
							}
							
									// Finish Field
									// -------------------------------------------------------
							
							if($image_translations_displayed)
							{
								$clear_float_divider_end_args = [
									'indentlevel'=>6,
								];
								
								$divider->displayend($clear_float_divider_end_args);
							}
							
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
							
							$image_translations_displayed = 1;
						}
					}
					
							// Display Field if Not Yet Displayed
							// -------------------------------------------------------
					
					if(!$image_translations_displayed)
					{
								// Display Field
								// -------------------------------------------------------
						
						$element_text_args = [
							text=>'Title : ',
							indentlevel=>5,
						];
						$text->Display($element_text_args);
						
						$type_args = array(
							type=>'text',
							name=>'imagetranslation_Title[]',
							size=>40,
							indentlevel=>5,
							maxlength=>255,
						);
						
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
					}
					
							// Start Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'hidden-image-translation-input',
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
						name=>'imagetranslation_Language[]',
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
							// Preset Check if Displayed
							// -------------------------------------------------------
					
					$tags_displayed = 0;
					
					foreach ($this->tag as $tag)
					{
						if($tag && strlen($tag['Tag']))
						{
							if($tags_displayed)
							{
										// Start Field
										// -------------------------------------------------------
								
								$clear_float_divider_start_args = [
									'class'=>'input-divider',
									'indentlevel'=>6,
								];
								
								$divider->displaystart($clear_float_divider_start_args);
							}
							
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
								value=>$tag['Tag'],
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
								selected=>$tag['Language'],
								indentlevel=>5,
							];
							
							$form->DisplayFormField($language_args);
							
							if(!$tags_displayed)
							{
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
							}
							else
							{
										// Display 'Delete' Button
										// -------------------------------------------------------
								
								$type_args = array(
									'type'=>'button',
									'id'=>'delete-tag-button',
									'class'=>'float-right',
									'value'=>'Remove',
									'indentlevel'=>5,
								);
								
								$form->DisplayFormField($type_args);
							}
							
									// Finish Field
									// -------------------------------------------------------
							
							if($tags_displayed)
							{
								$clear_float_divider_end_args = [
									'indentlevel'=>6,
								];
								
								$divider->displayend($clear_float_divider_end_args);
							}
							
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

							
							$tags_displayed = 1;
						}
					}
					
							// Display Field if Not Yet Displayed
							// -------------------------------------------------------
					
					if(!$tags_displayed)
					{
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
							value=>'en',
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
					}
					
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
							// Preset Check if Displayed
							// -------------------------------------------------------
					
					$links_displayed = 0;
					
					foreach ($this->link as $link)
					{
						if($link && strlen($link['URL']))
						{
							if($links_displayed)
							{
										// Start Field
										// -------------------------------------------------------
								
								$clear_float_divider_start_args = [
									'class'=>'input-divider',
									'indentlevel'=>6,
								];
								
								$divider->displaystart($clear_float_divider_start_args);
							}
							
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
								value=>$link['Title'],
								maxlength=>255,
							];
							
							$form->DisplayFormField($type_args);
							
									// Display Field
									// -------------------------------------------------------
							
							$element_text_args = [
								text=>'URL : ',
								indentlevel=>5,
							];
							$text->Display($element_text_args);
							
							$type_args = array(
								type=>'text',
								name=>'URL[]',
								size=>40,
								indentlevel=>5,
								value=>$link['URL'],
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
								name=>'link_Language[]',
								options=>$this->SelectableLanguages,
								selected=>$link['URL'],
								indentlevel=>5,
							];
							
							$form->DisplayFormField($language_args);
							
							if(!$links_displayed)
							{
										// Display 'Add' Button
										// -------------------------------------------------------
								
								$type_args = array(
									'type'=>'button',
									'id'=>'add-url-button',
									'class'=>'float-right',
									'value'=>'Add URL',
									'indentlevel'=>5,
								);
								
								$form->DisplayFormField($type_args);
							}
							else
							{
										// Display 'Delete' Button
										// -------------------------------------------------------
								
								$type_args = array(
									'type'=>'button',
									'id'=>'delete-url-button',
									'class'=>'float-right',
									'value'=>'Remove',
									'indentlevel'=>5,
								);
								
								$form->DisplayFormField($type_args);
							}
							
									// Finish Field
									// -------------------------------------------------------
							
							if($links_displayed)
							{
								$clear_float_divider_end_args = [
									'indentlevel'=>6,
								];
								
								$divider->displayend($clear_float_divider_end_args);
							}
							
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

							
							$links_displayed = 1;
						}
					}
					
							// Display Field if Not Yet Displayed
							// -------------------------------------------------------
					
					if(!$links_displayed)
					{
								// Display Field
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
						
								// Display Field
								// -------------------------------------------------------
						
						$element_text_args = [
							text=>'URL : ',
							indentlevel=>5,
						];
						$text->Display($element_text_args);
						
						$type_args = array(
							type=>'text',
							name=>'URL[]',
							size=>40,
							indentlevel=>5,
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
							name=>'link_Language[]',
							options=>$this->SelectableLanguages,
							selected=>'en',
							indentlevel=>5,
						];
						
						$form->DisplayFormField($language_args);
						
								// Display 'Add' Button
								// -------------------------------------------------------
						
						$type_args = array(
							'type'=>'button',
							'id'=>'add-url-button',
							'class'=>'float-right',
							'value'=>'Add URL',
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
					}
					
							// Start Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'hidden-url-input',
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
						name=>'link_Title-Hidden[]',
						size=>40,
						indentlevel=>5,
						maxlength=>255,
					];
					
					$form->DisplayFormField($type_args);
					
							// Display Field
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
						'id'=>'delete-url-button',
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
						'id'=>'url-list',
						'indentlevel'=>5,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
					$clear_float_divider_end_args = [
						'indentlevel'=>5,
					];
					
					$divider->displayend($clear_float_divider_end_args);
					
					break;
				
				case 'Event Date':
							// Preset Check if Displayed
							// -------------------------------------------------------
					
					$event_dates_displayed = 0;
					
					foreach ($this->eventdate as $eventdate)
					{
						if($eventdate && strlen($eventdate['EventDateTime']))
						{
							if($event_dates_displayed)
							{
										// Start Field
										// -------------------------------------------------------
								
								$clear_float_divider_start_args = [
									'class'=>'input-divider',
									'indentlevel'=>6,
								];
								
								$divider->displaystart($clear_float_divider_start_args);
							}
							
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
								value=>$eventdate['EventDate'],
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
								value=>$eventdate['EventTime'],
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
								value=>$eventdate['Title'],
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
								value=>$eventdate['Description'],
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
								selected=>$eventdate['Language'],
								indentlevel=>5,
							];
							
							$form->DisplayFormField($language_args);
							
							if(!$event_dates_displayed)
							{
										// Display 'Add' Button
										// -------------------------------------------------------
								
								$type_args = array(
									'type'=>'button',
									'id'=>'add-event-date-button',
									'class'=>'float-right',
									'value'=>'Add Event Date',
									'indentlevel'=>5,
								);
								
								$form->DisplayFormField($type_args);
							}
							else
							{
										// Display 'Delete' Button
										// -------------------------------------------------------
								
								$type_args = array(
									'type'=>'button',
									'id'=>'delete-event-date-button',
									'class'=>'float-right',
									'value'=>'Remove',
									'indentlevel'=>5,
								);
								
								$form->DisplayFormField($type_args);
							}
							
									// Finish Field
									// -------------------------------------------------------
							
							if($event_dates_displayed)
							{
								$clear_float_divider_end_args = [
									'indentlevel'=>6,
								];
								
								$divider->displayend($clear_float_divider_end_args);
							}
							
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
							
							$event_dates_displayed = 1;
						}
					}
					
							// Display Field if Not Yet Displayed
							// -------------------------------------------------------
					
					if(!$event_dates_displayed)
					{
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
						
						$type_args = array(
							'type'=>'button',
							'id'=>'add-event-date-button',
							'class'=>'float-right',
							'value'=>'Add Event Date',
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
					}
					
							// Start Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'hidden-event-date-input',
						'class'=>'display-none',
						'indentlevel'=>6,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
							// Display Title Field
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
							// Preset Check if Displayed
							// -------------------------------------------------------
					
					$associations_displayed = 0;
					
					foreach ($this->association as $association)
					{
						if($association && strlen($association['ChosenEntryid']))
						{
							if($associations_displayed)
							{
										// Start Field
										// -------------------------------------------------------
								
								$clear_float_divider_start_args = [
									'class'=>'input-divider',
									'indentlevel'=>6,
								];
								
								$divider->displaystart($clear_float_divider_start_args);
							}
							
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
								value=>$association['ChosenEntryid'],
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
								value=>$association['Type'],
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
								value=>$association['SubType'],
							];
							
							$form->DisplayFormField($type_args);
							
							if(!$tags_displayed)
							{
										// Display 'Add' Button
										// -------------------------------------------------------
								
								$type_args = array(
									'type'=>'button',
									'id'=>'add-association-button',
									'class'=>'float-right',
									'value'=>'Add Association',
									'indentlevel'=>5,
								);
								
								$form->DisplayFormField($type_args);
							}
							else
							{
										// Display 'Delete' Button
										// -------------------------------------------------------
								
								$type_args = array(
									'type'=>'button',
									'id'=>'delete-association-button',
									'class'=>'float-right',
									'value'=>'Remove',
									'indentlevel'=>5,
								);
								
								$form->DisplayFormField($type_args);
							}
							
									// Finish Field
									// -------------------------------------------------------
							
							if($tags_displayed)
							{
								$clear_float_divider_end_args = [
									'indentlevel'=>6,
								];
								
								$divider->displayend($clear_float_divider_end_args);
							}
							
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
							
							$associations_displayed = 1;
						}
					}
					
							// Display Field if Not Yet Displayed
							// -------------------------------------------------------
					
					if(!$associations_displayed)
					{
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
						
						$type_args = array(
							'type'=>'button',
							'id'=>'add-association-button',
							'class'=>'float-right',
							'value'=>'Add Association',
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
					}
					
							// Start Hidden Field
							// -------------------------------------------------------
					
					$clear_float_divider_start_args = [
						'id'=>'hidden-association-input',
						'class'=>'display-none',
						'indentlevel'=>6,
					];
					
					$divider->displaystart($clear_float_divider_start_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$element_text_args = [
						text=>'Entry ID Associated With : ',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'text',
						name=>'ChosenEntryid-Hidden',
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
						name=>'association_Type-Hidden',
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
				
				case 'Save':
					$element_text_args = [
						text=>'<center>',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					$type_args = [
						type=>'submit',
						name=>'Save',
						value=>'Save',
						indentlevel=>5,
					];
					
					$form->DisplayFormField($type_args);
					
					$type_args = [
						type=>'hidden',
						name=>'action',
						value=>'Save',
						indentlevel=>5,
					];
					
					$form->DisplayFormField($type_args);
					
					$element_text_args = [
						text=>'</center>',
						indentlevel=>5,
					];
					$text->Display($element_text_args);
					
					break;
			}
			
			$table_end_args = [
				indentlevel=>2,
			];
			$table->DisplayComponent_EndTable($table_end_args);
		}
	}
	
			// Display Form Elements : End
		
		// -------------------------------------------------------------
	
	$end_form_args = [
		indentlevel=>1,
	];
	$form->EndForm($end_form_args);
	
	$divider_end_args = [
		indentlevel=>1,
	];
	$divider->displayend($divider_end_args);
	
?>