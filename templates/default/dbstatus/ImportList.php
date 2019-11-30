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
		'class'=>'',
	];
	
	$divider_end_args = [
		'indentlevel'=>1,
	];
	
			// Display Header
		
		// -------------------------------------------------------------
	
	$header_primary_args = [
		'indentlevel'=>1,
		'title'=>$this->domain_object->primary_domain . ' System Status : Import List',
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
	];
	
	$header->display($header_primary_args);
	
			// Display List Items
		
		// -------------------------------------------------------------
	
	if($this->import_status)
	{
		$list_message = 'Your list and its items were imported.  The results are detailed below.';
	}
	else
	{
		$list_message = 'Import a list using one of the options below.';
	}
	
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
				'<nobr>Lists :</nobr>', $list_message,
			],
		],
	];
	$generic_list->Display($version_list_display_args);
	
	$divider->displayend($divider_end_args);
	
			// Display Parent Record Info
		
		// -------------------------------------------------------------
	
	$other_list_actions = ' &bull; <a href="dbstatus.php?action=EditList&LookupListid=' . $this->lookup_list['id'] . '">Edit This list</a><br> &bull; <a href="dbstatus.php?action=ViewAllLists">View All Lists</a><br> &bull; <a href="dbstatus.php?action=ViewAllListsAndItems">View All Lists And Items</a>';
	
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
				'<nobr>Other List Actions:</nobr>', $other_list_actions,
			],
		],
	];
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
			// Display Saved Results
		
		// -------------------------------------------------------------
	
	if($this->import_status)
	{
	#	print("BT: Title???...|" . $this->title . "|<BR><BR>");
				// Display List Title
			
			// -------------------------------------------------------------
		
		$divider->displaystart($divider_padding_start_args);
		
		$version_list_display_args = [
			'options'=>[
				'indentlevel'=>1,
				'tableheaders'=>0,
				'tableclass'=>'width-90percent horizontal-center border-2px background-color-gray13 margin-top-5px',
				'rowclass'=>'border-1px horizontal-left',
				'cellclass'=>[
					'border-1px vertical-top',
					'border-1px width-100percent vertical-top',
				],
			],
			'list'=>[
				[
					'<nobr>Lists Imported :</nobr>', 'There were ' . count($this->imported_lookup_lists) . ' lists and '  . count($this->imported_lookup_list_items) . ' list items imported.',
				],
			],
		];
		$generic_list->Display($version_list_display_args);
		
		$divider->displayend($divider_end_args);
		
				// Display List Items
			
			// -------------------------------------------------------------
		
		$divider->displaystart($divider_padding_start_args);
		
		$version_list_display_args = [
			'options'=>[
				'indentlevel'=>1,
				'tableheaders'=>0,
				'tableclass'=>'width-90percent horizontal-center border-2px background-color-gray13 margin-top-5px',
				'rowclass'=>'border-1px horizontal-left',
				'cellclass'=>[
					'border-1px vertical-top',
					'border-1px width-100percent vertical-top',
				],
			],
			'list'=>$this->imported_lookup_list_counts_display,
		];
		$generic_list->Display($version_list_display_args);
		
		$divider->displayend($divider_end_args);
		
	//	print("<PRE>");
	//	print_r($this->lookup_list_items);
	//	print("</PRE>");
	}
	
			// Display Form
		
		// -------------------------------------------------------------
	
	else
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
		
				// Display List Title
			
			// -------------------------------------------------------------
		
		$divider_padding_start_args = [
			'class'=>'horizontal-left',
			'indentlevel'=>1,
		];
		
		$divider->displaystart($divider_padding_start_args);
		
		$element_text_args = [
			text=>'<span class="margin-left-5px">Client : </span>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$type_args = [
			type=>'text',
			name=>'Client',
			size=>60,
			indentlevel=>5,
			maxlength=>255,
			'class'=>'margin-5px border-2px',
		];
		
		$form->DisplayFormField($type_args);
		
		$clear_float_divider_end_args = [
			'indentlevel'=>5,
		];
		
		$divider->displayend($clear_float_divider_end_args);
		
				// Display List Title
			
			// -------------------------------------------------------------
		
		$divider_padding_start_args = [
			'class'=>'horizontal-left',
			'indentlevel'=>1,
		];
		
		$divider->displaystart($divider_padding_start_args);
		
		$element_text_args = [
			text=>'<span class="margin-left-5px" title="Leave blank if you want to import all lists.">Title :</span>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$type_args = [
			type=>'text',
			name=>'Title',
			size=>60,
			indentlevel=>5,
			maxlength=>255,
			'class'=>'margin-5px border-2px',
		];
		
		$form->DisplayFormField($type_args);
		
		$clear_float_divider_end_args = [
			'indentlevel'=>5,
		];
		
		$divider->displayend($clear_float_divider_end_args);
		
				// Display Form Save Button : Import
			
			// -------------------------------------------------------------
		
		$element_text_args = [
			text=>'<center>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$type_args = [
			type=>'submit',
			name=>'ImportList',
			'class'=>'margin-5px',
			value=>'Import List',
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
			value=>'ImportList',
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
	}
	
?>