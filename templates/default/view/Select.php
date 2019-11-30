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
	
	$divider_padding_start_args = [
		'class'=>'margin-5px padding-5px',
	];
	
	$divider_end_args = [
		'indentlevel'=>1,
	];
	
			// Display Parent Record Info
		
		// -------------------------------------------------------------
	
	$divider->displaystart($divider_padding_start_args);
	
	$version_list_display_args = [
		'options'=>[
			'indentlevel'=>1,
			'tableheaders'=>0,
			'tableclass'=>'width-70percent horizontal-center border-2px background-color-gray13 margin-top-5px',
			'rowclass'=>'border-1px horizontal-left',
			'cellclass'=>[
				'border-1px vertical-top',
				'border-1px width-100percent vertical-top',
			],
		],
		'list'=>[
			[
				'Select an entry, using the "' . $this->by . '" as the field to search.',
			],
		],
	];
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
					'There was an error with your selection.',
				],
			],
		];
		$generic_list->Display($version_list_display_args);
		
		$divider->displayend($divider_end_args);
		
		foreach($this->admin_errors_display as $admin_error_to_display)
		{
			$divider->displaystart($divider_padding_start_args);
			
			$version_list_display_args = [
				'options'=>[
					'indentlevel'=>1,
					'tableheaders'=>0,
					'tableclass'=>'width-70percent horizontal-center border-2px background-color-gray13 margin-top-5px',
					'rowclass'=>'border-1px horizontal-left',
					'cellclass'=>[
						'border-1px vertical-top',
						'border-1px width-100percent vertical-top',
					],
				],
				'list'=>$admin_error_to_display,
			];
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
			
			$version_list_display_args = [
				'options'=>[
					'indentlevel'=>1,
					'tableheaders'=>0,
					'tableclass'=>'width-70percent horizontal-center border-2px background-color-gray13 margin-top-5px',
					'rowclass'=>'border-1px horizontal-left',
					'cellclass'=>[
						'border-1px vertical-top',
						'border-1px width-100percent vertical-top',
					],
				],
				'list'=>$error_to_display,
			];
			$generic_list->Display($version_list_display_args);
			
			$divider->displayend($divider_end_args);
		}
	}
	
	if($this->fieldname_validity)
	{
				// Display Form Elements : Start
			
			// -------------------------------------------------------------
		
		$divider_padding_start_args = [
			'class'=>'horizontal-center width-80percent margin-top-5px border-2px',
			'indentlevel'=>1,
		];
		
		$divider->displaystart($divider_padding_start_args);
		
		$start_form_args = [
			'action'=>0,
			'method'=>'post',
			'files'=>0,
			'formclass'=>'margin-0px',
			'indentlevel'=>1,
		];
		
		$form->StartForm($start_form_args);
		
				// Display Form Elements : Standard Elements
			
			// -------------------------------------------------------------
			
					// Display Form Elements : ID Text Input
				
				// -------------------------------------------------------------
			
		$table_start_args = [
			id=>$element,
			tableclass=>'width-100percent blank-element',
			tableborder=>'3',
			indentlevel=>2,
			cellvalign=>'top',
		];
		$table->DisplayComponent_StartTable($table_start_args);
		
		$element_text_args = [
			text=>'<nobr>Select by ' . $this->by . '</nobr>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$separate_cells_args = [
			cellwidth=>'99%',
			indentlevel=>2,
			cellvalign=>'top',
		];
		$table->DisplayComponent_SeparateCells($separate_cells_args);
		
		switch($this->by)
		{
			case 'id':
			case 'Code':
			case 'Tag':
			case 'AvailabilityStart':
			case 'AvailabilityEnd':
				$field_width = 40;
				break;
			
			default:
			case 'Title':
			case 'Description':
			case 'Quote':
			case 'Link':
			case 'TextBody':
				$field_width = 80;
				break;
		}
		
		$type_args = [
			type=>'text',
			name=>'fieldname',
			value=>$this->fieldname,
			size=>$field_width,
			indentlevel=>5,
		];
		
		$form->DisplayFormField($type_args);
			
					// Display Form Elements : Action
				
				// -------------------------------------------------------------
		
		$separate_cells_args = [
			indentlevel=>2,
			cellvalign=>'top',
		];
		$table->DisplayComponent_SeparateCells($separate_cells_args);
		
		$element_text_args = [
			text=>'<nobr>Action: ',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$type_args = [
			type=>'select',
			name=>'urlaction',
			options=>[
				[
					optiontitle=>'Edit',
					optionvalue=>'edit',
					optionmouseover=>'Generated URLs will link to the edit page of the entry.',
				],
				[
					optiontitle=>'View',
					optionvalue=>'view',
					optionmouseover=>'Generated URLs will link to the view page of the entry.',
				],
			],
			selected=>$this->urlaction,
			indentlevel=>5,
		];
		
		$form->DisplayFormField($type_args);
		
		$element_text_args = [
			text=>'</nobr>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
					// Display Form Elements : Match Like
				
				// -------------------------------------------------------------
		
		if($this->by != 'id')
		{
			$separate_cells_args = [
				indentlevel=>2,
				cellvalign=>'top',
			];
			$table->DisplayComponent_SeparateCells($separate_cells_args);
			
			$element_text_args = [
				text=>'<nobr>Match Like',
				indentlevel=>5,
			];
			$text->Display($element_text_args);
			
			$type_args = [
				type=>'checkbox',
				name=>'matchlike',
				value=>'1',
				checked=>$this->matchlike,
			];
			
			$form->DisplayFormField($type_args);
			
			$element_text_args = [
				text=>'</nobr>',
				indentlevel=>5,
			];
			$text->Display($element_text_args);
		}
		
		$table_end_args = [
			indentlevel=>2,
		];
		$table->DisplayComponent_EndTable($table_end_args);
			
					// Display Form Elements : Select Button
				
				// -------------------------------------------------------------
		
		$table_start_args = [
			id=>$element,
			tableclass=>'width-100percent blank-element',
			tableborder=>'3',
			indentlevel=>2,
			cellvalign=>'top',
		];
		$table->DisplayComponent_StartTable($table_start_args);
	
		$element_text_args = [
			text=>'<center>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$type_args = [
			type=>'submit',
			name=>'Select',
			value=>'Select',
			indentlevel=>5,
		];
		
		$form->DisplayFormField($type_args);
		
		$element_text_args = [
			text=>'</center>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$table_end_args = [
			indentlevel=>2,
		];
		$table->DisplayComponent_EndTable($table_end_args);
		
				// Display Form Elements : Hidden Args
			
			// -------------------------------------------------------------
		
		$type_args = [
			type=>'hidden',
			name=>'by',
			value=>$this->by,
			indentlevel=>5,
		];
		
		$form->DisplayFormField($type_args);
		
		$type_args = [
			type=>'hidden',
			name=>'action',
			value=>'Select',
			indentlevel=>5,
		];
		
		$form->DisplayFormField($type_args);
		
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
	}
	
			// Display Search Result Information
		
		// -------------------------------------------------------------
	
	if($this->select)
	{
		$divider_padding_start_args = [
			'class'=>'horizontal-center width-90percent margin-top-5px border-2px',
		];
		
		$divider->displaystart($divider_padding_start_args);
			
		if(count($this->StatusDataArray))
		{
					// Display PHP Info
				
				// -------------------------------------------------------------
			
			$divider_padding_start_args = [
				'class'=>'horizontal-center width-95percent margin-top-5px margin-bottom-5px',
			];
			
			$divider->displaystart($divider_padding_start_args);
			
			$version_list_display_args = [
				'options'=>[
					'indentlevel'=>1,
					'tableheaders'=>0,
					'tableclass'=>'width-100percent horizontal-center border-2px background-color-gray13',
					'rowclass'=>'border-1px horizontal-left',
					'cellclass'=>[
						'border-1px width-100percent vertical-top',
					],
				],
				'list'=>$this->StatusDataArray,
			];
			
			$generic_list->Display($version_list_display_args);
			
			$divider->displayend($divider_end_args);
		}
		else
		{
			$element_text_args = [
				text=>'<center><h3>There were no search results.</h3></center>',
				indentlevel=>5,
			];
			$text->Display($element_text_args);
		}
		
		$divider->displayend($divider_end_args);
	}
	
?>