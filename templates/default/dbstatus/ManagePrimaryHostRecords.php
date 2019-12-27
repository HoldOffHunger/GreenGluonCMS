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
		'class'=>'',
	);
	
	$divider_end_args = array(
		'indentlevel'=>1,
	);
	
			// Display Header
		
		// -------------------------------------------------------------
	
	$header_primary_args = array(
		'indentlevel'=>1,
		'title'=>$this->domain_object->primary_domain . ' System Status : Manage Primary Host Records',
		'image'=>'system-status-icon.jpg',
		'divmouseover'=>'The Grand Master C.',
		'imagemouseover'=>'Master C is in the house!',
		'level'=>1,
		'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-gray13',
		'textclass'=>'margin-0px horizontal-center vertical-center padding-top-22px margin-bottom-10px',
		'imagedivclass'=>'border-2px margin-5px background-color-gray10',
		'imageclass'=>'border-1px height-75px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
		'rightimageenable'=>1,
	);
	
	$header->display($header_primary_args);
	
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
				'<nobr>Primary Host:</nobr>', $this->domain_object->primary_domain,
			],
			[
				'<nobr>Total Primary Host Records:</nobr>', count($this->primary_host_records),
			],
		],
	);
	$generic_list->Display($version_list_display_args);
	
	$divider->displayend($divider_end_args);
	
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
				'<nobr>Active Options:</nobr>', 'Author, BaseTemplate, Classification, Contact, Contributor, Copyright, Creator, NewsKeywords, PublicReleaseDate, Publisher, Rights, Subject, ApplicationName, PrimaryImageLeft, PrimaryImageRight.  You may <a href="#" onclick="return false;" name="generate-primary-host-records" class="generate-primary-host-records" id="generate-primary-host-records">Auto-Generate Base Primary Host Records</a> if not all are configured yet.',
			],
		],
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
			// Display Form Elements : Start
		
		// -------------------------------------------------------------
	
	$divider_padding_start_args = array(
		'class'=>'horizontal-center width-80percent margin-top-5px border-2px',
		'indentlevel'=>1,
	);
	
	$divider->displaystart($divider_padding_start_args);
	
	$start_form_args = [
		'action'=>0,
		'method'=>'post',
		'files'=>0,
		'formclass'=>'margin-0px',
		'indentlevel'=>1,
	];
	
	$form->StartForm($start_form_args);
	
			// Start Field
			// -------------------------------------------------------
	
	$left_div_args = [
		'class'=>'horizontal-left',
		'indentlevel'=>6,
	];
	
	$divider->displaystart($left_div_args);
	
			// Preset Check if Displayed
			// -------------------------------------------------------
	
	$records_displayed = 0;
	
	foreach ($this->primary_host_records as $primary_host_record)
	{
		if($primary_host_record && strlen($primary_host_record['RecordKey']))
		{
			if(is_array($primary_host_record['RecordValue']))
			{
				$primary_host_record_values = $primary_host_record['RecordValue'];
				
				foreach($primary_host_record_values as $primary_host_record_value)
				{
					if($records_displayed)
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
						type=>'text',
						name=>'RecordKey[]',
						'class'=>'margin-top-5px margin-left-5px recordkey',
						size=>60,
						indentlevel=>5,
						maxlength=>255,
						value=>$primary_host_record['RecordKey'],
					);
					
					$form->DisplayFormField($type_args);
					
							// Display Field
							// -------------------------------------------------------
					
					$type_args = array(
						type=>'text',
						name=>'RecordValue[]',
						'class'=>'margin-top-5px margin-left-5px',
						size=>60,
						indentlevel=>5,
						maxlength=>255,
						value=>$primary_host_record_value['RecordValue'],
					);
					
					$form->DisplayFormField($type_args);
					
					if(!$records_displayed)
					{
								// Display 'Add' Button
								// -------------------------------------------------------
						
						$type_args = array(
							'type'=>'button',
							'id'=>'add-record-button',
							'class'=>'float-right margin-top-5px margin-right-5px',
							'value'=>'Add Record',
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
							'id'=>'delete-record-button',
							'class'=>'float-right margin-top-5px margin-right-5px delete-record-button',
							'value'=>'Remove',
							'indentlevel'=>5,
						);
						
						$form->DisplayFormField($type_args);
					}
					
							// Finish Field
							// -------------------------------------------------------
					
					if($records_displayed)
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
					
					$records_displayed = 1;
				}
			}
			elseif(strlen($primary_host_record['RecordValue']))
			{
				if($records_displayed)
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
					type=>'text',
					name=>'RecordKey[]',
					'class'=>'margin-top-5px margin-left-5px recordkey',
					size=>60,
					indentlevel=>5,
					maxlength=>255,
					value=>$primary_host_record['RecordKey'],
				);
				
				$form->DisplayFormField($type_args);
				
						// Display Field
						// -------------------------------------------------------
				
				$type_args = array(
					type=>'text',
					name=>'RecordValue[]',
					'class'=>'margin-top-5px margin-left-5px',
					size=>60,
					indentlevel=>5,
					maxlength=>255,
					value=>$primary_host_record['RecordValue'],
				);
				
				$form->DisplayFormField($type_args);
				
				if(!$records_displayed)
				{
							// Display 'Add' Button
							// -------------------------------------------------------
					
					$type_args = array(
						'type'=>'button',
						'id'=>'add-record-button',
						'class'=>'float-right margin-top-5px margin-right-5px',
						'value'=>'Add Record',
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
						'id'=>'delete-record-button',
						'class'=>'float-right margin-top-5px margin-right-5px delete-record-button',
						'value'=>'Remove',
						'indentlevel'=>5,
					);
					
					$form->DisplayFormField($type_args);
				}
				
						// Finish Field
						// -------------------------------------------------------
				
				if($records_displayed)
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
				
				$records_displayed = 1;
			}
		}
	}
	
			// Display Field if Not Yet Displayed
			// -------------------------------------------------------
	
	if(!$records_displayed)
	{
				// Display Field
				// -------------------------------------------------------
		
		$type_args = array(
			type=>'text',
			name=>'RecordKey[]',
			'class'=>'margin-top-5px margin-left-5px',
			size=>60,
			indentlevel=>5,
			maxlength=>255,
		);
		
		$form->DisplayFormField($type_args);
		
				// Display Field
				// -------------------------------------------------------
		
		$type_args = array(
			type=>'text',
			name=>'RecordValue[]',
			'class'=>'margin-top-5px margin-left-5px',
			size=>60,
			indentlevel=>5,
			maxlength=>255,
		);
		
		$form->DisplayFormField($type_args);
		
				// Display 'Add' Button
				// -------------------------------------------------------
		
		$type_args = array(
			'type'=>'button',
			'id'=>'add-record-button',
			'class'=>'float-right margin-top-5px margin-right-5px',
			'value'=>'Add Record',
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
		'id'=>'hidden-record-input',
		'class'=>'display-none',
		'indentlevel'=>6,
	];
	
	$divider->displaystart($clear_float_divider_start_args);
	
			// Display Hidden Input
			// -------------------------------------------------------
	
	$type_args = array(
		'type'=>'text',
		'name'=>'RecordKey-Hidden',
		'class'=>'margin-top-5px margin-left-5px',
		'size'=>60,
		'indentlevel'=>7,
		maxlength=>255,
	);
	
	$form->DisplayFormField($type_args);
	
	$type_args = array(
		'type'=>'text',
		'name'=>'RecordValue-Hidden',
		'class'=>'margin-top-5px margin-left-5px',
		'size'=>60,
		'indentlevel'=>7,
		maxlength=>255,
	);
	
	$form->DisplayFormField($type_args);
	
			// Display 'Delete' Button
			// -------------------------------------------------------
	
	$type_args = array(
		'type'=>'button',
		'id'=>'delete-record-button',
		'class'=>'float-right margin-top-5px margin-right-5px delete-record-button',
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
		'id'=>'record-list',
		'indentlevel'=>5,
	];
	
	$divider->displaystart($clear_float_divider_start_args);
	
	$clear_float_divider_end_args = [
		'indentlevel'=>5,
	];
	
	$divider->displayend($clear_float_divider_end_args);
	
			// Display Form Save Button : Save
		
		// -------------------------------------------------------------
	
	$element_text_args = [
		text=>'<center>',
		indentlevel=>5,
	];
	$text->Display($element_text_args);
	
	$type_args = [
		type=>'submit',
		name=>'Save',
		'class'=>'margin-5px',
		value=>'Save',
		indentlevel=>5,
	];
	
	$form->DisplayFormField($type_args);
	
	$element_text_args = [
		text=>'</center>',
		indentlevel=>5,
	];
	$text->Display($element_text_args);
	
		// Hidden Action
		// -----------------------------------------------------
	
	$type_args = [
		type=>'hidden',
		name=>'action',
		value=>'ManagePrimaryHostRecords',
		indentlevel=>5,
	];
	
	$form->DisplayFormField($type_args);
	
			// Display Form Elements : End
		
		// -------------------------------------------------------------
	
	$divider_end_args = [
		indentlevel=>1,
	];
	$divider->displayend($divider_end_args);
	
	$end_form_args = [
		indentlevel=>1,
	];
	$form->EndForm($end_form_args);
	
	$divider_end_args = [
		indentlevel=>1,
	];
	$divider->displayend($divider_end_args);
	
?>