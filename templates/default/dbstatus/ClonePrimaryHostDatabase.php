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
	
			// Display Clone Results
		
		// -------------------------------------------------------------
	
	if($this->clone_success)
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
			'list'=>[
				[
					$this->clone_results,
				],
			],
		];
		$generic_list->Display($version_list_display_args);
		
		$divider->displayend($divider_end_args);
	}
	
			// Cloning Information
		
		// -------------------------------------------------------------
	
	else
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
			'list'=>[
				[
					'Enter the name of a new database to be cloned from the primary database.  For DreamHost, you will manually need to create the database using the PHP admin tools.',
				],
			],
		];
		$generic_list->Display($version_list_display_args);
		
		$divider->displayend($divider_end_args);
	}
	
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
	
			// Display Clone Success
		
		// -------------------------------------------------------------
	
	if($this->clone_success)
	{
				// Display Results : Start
			
			// -------------------------------------------------------------
		
		$divider_padding_start_args = [
			'class'=>'horizontal-center width-80percent margin-top-5px border-2px',
			'indentlevel'=>1,
		];
		
		$divider->displaystart($divider_padding_start_args);
		
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
		
					// Display Form Elements : Clone From Hostname
				
				// -------------------------------------------------------------
		
		$element_text_args = [
			text=>'<nobr>Clone From Hostname</nobr>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$separate_cells_args = [
			cellwidth=>'99%',
			indentlevel=>2,
			cellvalign=>'top',
		];
		$table->DisplayComponent_SeparateCells($separate_cells_args);
		
		$element_text_args = [
			text=>$this->clone_from,
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$separate_cells_args = [
			indentlevel=>2,
			cellvalign=>'top',
		];
		$table->DisplayComponent_SeparateCellsAndRows($separate_cells_args);
		
					// Display Form Elements : Clone To Hostname
				
				// -------------------------------------------------------------
		
		$element_text_args = [
			text=>'<nobr>New Hostname</nobr>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$separate_cells_args = [
			cellwidth=>'99%',
			indentlevel=>2,
			cellvalign=>'top',
		];
		$table->DisplayComponent_SeparateCells($separate_cells_args);
		
		$element_text_args = [
			text=>$this->new_host_to_clone,
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$separate_cells_args = [
			indentlevel=>2,
			cellvalign=>'top',
		];
		$table->DisplayComponent_SeparateCellsAndRows($separate_cells_args);
		
					// Display Form Elements : Insert
				
				// -------------------------------------------------------------
		
		$element_text_args = [
			text=>'<nobr>Insert Master Admin Account</nobr>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$separate_cells_args = [
			cellwidth=>'99%',
			indentlevel=>2,
			cellvalign=>'top',
		];
		$table->DisplayComponent_SeparateCells($separate_cells_args);
		
		$element_text_args = [
			text=>$this->insert_master_admin_account,
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$separate_cells_args = [
			indentlevel=>2,
			cellvalign=>'top',
		];
		$table->DisplayComponent_SeparateCellsAndRows($separate_cells_args);
		
					// Display Form Elements : Clone Files
				
				// -------------------------------------------------------------
		
		$element_text_args = [
			text=>'<nobr>Clone Files from /clonefrom.com/*/ ?</nobr>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$separate_cells_args = [
			cellwidth=>'99%',
			indentlevel=>2,
			cellvalign=>'top',
		];
		$table->DisplayComponent_SeparateCells($separate_cells_args);
		
		$element_text_args = [
			text=>$this->clone_files_from_clonefrom,
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		print('</td>');
		print('</tr>');
		
					// Display Form Elements : Clone Stats
				
				// -------------------------------------------------------------
		
		print('<tr>');
		print('<td>');
		
		$element_text_args = [
			text=>'<nobr>Clone Stat-Folder into /stats/HOSTNAME.com/ ?</nobr>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		print('</td>');
		print('<td>');
		
		$element_text_args = [
			text=>$this->clone_stats_from_clonefrom,
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		print('</td>');
		print('</tr>');
		
					// Display Form Elements : Clone Stats
				
				// -------------------------------------------------------------
		
		print('<tr>');
		print('<td>');
		
		$element_text_args = [
			text=>'<nobr>Clone Stat-Folder into /stats/HOSTNAME.com/ ?</nobr>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		print('</td>');
		print('<td>');
		
		$element_text_args = [
			text=>$this->clone_stats_from_clonefrom,
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		print('</td>');
		print('</tr>');
		
					// Display Form Elements : Clone Data
				
				// -------------------------------------------------------------
		
		print('<tr>');
		print('<td>');
		
		$element_text_args = [
			text=>'<nobr>Clone Data-Folder into /data/*/HOSTNAME.com/ ?</nobr>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		print('</td>');
		print('<td>');
		
		print(var_export($this->clone_data_folders, TRUE));
		
		print('</td>');
		print('</tr>');
		
				// Display Results : End
			
			// -------------------------------------------------------------
		
		$divider_end_args = [
			indentlevel=>1,
		];
		$divider->displayend($divider_end_args);
	}
	
			// Display Clone Failure
		
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
		
				// Display Form Elements : Standard Elements
			
			// -------------------------------------------------------------
		
					// Display Form Elements : Old Hostname Input
				
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
			text=>'<nobr>Clone From Hostname</nobr>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$separate_cells_args = [
			cellwidth=>'99%',
			indentlevel=>2,
			cellvalign=>'top',
		];
		$table->DisplayComponent_SeparateCells($separate_cells_args);
		
		$type_args = [
			type=>'text',
			name=>'clonefrom',
			value=>'clonefrom',
			size=>80,
			indentlevel=>5,
		];
		
		$form->DisplayFormField($type_args);
		
		$separate_cells_args = [
			indentlevel=>2,
			cellvalign=>'top',
		];
		$table->DisplayComponent_SeparateCellsAndRows($separate_cells_args);
		
					// Display Form Elements : New Hostname Input
				
				// -------------------------------------------------------------
			
		$element_text_args = [
			text=>'<nobr>New Hostname (All Lowercase)</nobr>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$separate_cells_args = [
			cellwidth=>'99%',
			indentlevel=>2,
			cellvalign=>'top',
		];
		$table->DisplayComponent_SeparateCells($separate_cells_args);
		
		$type_args = [
			type=>'text',
			name=>'newhost',
			value=>$this->fieldname,
			size=>80,
			indentlevel=>5,
		];
		
		$form->DisplayFormField($type_args);
		
		$separate_cells_args = [
			indentlevel=>2,
			cellvalign=>'top',
		];
		$table->DisplayComponent_SeparateCellsAndRows($separate_cells_args);
		
					// Display Form Elements : Insert
				
				// -------------------------------------------------------------
		
		$element_text_args = [
			text=>'<nobr>Insert Master Admin Account</nobr>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$separate_cells_args = [
			cellwidth=>'99%',
			indentlevel=>2,
			cellvalign=>'top',
		];
		$table->DisplayComponent_SeparateCells($separate_cells_args);
		
		$type_args = [
			type=>'checkbox',
			name=>'insert_master_admin_account',
			value=>1,
			size=>80,
			indentlevel=>5,
			checked=>TRUE,
		];
		
		$form->DisplayFormField($type_args);
		
		$separate_cells_args = [
			indentlevel=>2,
			cellvalign=>'top',
		];
		$table->DisplayComponent_SeparateCellsAndRows($separate_cells_args);
		
					// Display Form Elements : Clone Files
				
				// -------------------------------------------------------------
		
		$element_text_args = [
			text=>'<nobr>Clone Files from /clonefrom.com/*/ ?</nobr>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		$separate_cells_args = [
			cellwidth=>'99%',
			indentlevel=>2,
			cellvalign=>'top',
		];
		
		print('</td><td>');
		
		$type_args = [
			type=>'checkbox',
			name=>'clone_files_from_clonefrom',
			value=>1,
			size=>80,
			indentlevel=>5,
			checked=>TRUE,
		];
		
		$form->DisplayFormField($type_args);
		
		$separate_cells_args = [
			indentlevel=>2,
			cellvalign=>'top',
			cellcolspan=>2,
		];
		
		print('</td></tr>');
		
					// Display Form Elements : Create Stats Folder
				
				// -------------------------------------------------------------
		
		print('<tr><td>');
		$element_text_args = [
			text=>'<nobr>Clone Stat-Folder into /stats/HOSTNAME.com/ ?</nobr>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		print('</td><td>');
		
		$type_args = [
			type=>'checkbox',
			name=>'clone_stats_from_clonefrom',
			value=>1,
			size=>80,
			indentlevel=>5,
			checked=>TRUE,
		];
		
		$form->DisplayFormField($type_args);
		
		$separate_cells_args = [
			indentlevel=>2,
			cellvalign=>'top',
			cellcolspan=>2,
		];
		
		print('</td></tr>');
		
					// Display Form Elements : Create Data Folder
				
				// -------------------------------------------------------------
		
		print('<tr><td>');
		$element_text_args = [
			text=>'<nobr>Clone Data-Folder into /data/*/HOSTNAME.com/ folders ?</nobr>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
		
		print('</td><td>');
		
		$type_args = [
			type=>'checkbox',
			name=>'clone_data_folders',
			value=>1,
			size=>80,
			indentlevel=>5,
			checked=>TRUE,
		];
		
		$form->DisplayFormField($type_args);
		
		$separate_cells_args = [
			indentlevel=>2,
			cellvalign=>'top',
			cellcolspan=>2,
		];
		
		print('</td></tr>');
			
					// Display Form Elements : Select Button
				
				// -------------------------------------------------------------
		
		
		print('<tr><td colspan="2">');
		
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
			name=>'Clone',
			value=>'Clone',
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
			name=>'action',
			value=>'ClonePrimaryHostDatabase',
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
	
?>