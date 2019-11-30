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
	
			// Display Header
		
		// -------------------------------------------------------------
	
	$header_primary_args = [
		'indentlevel'=>1,
		'title'=>$this->domain_object->primary_domain . ' System Status : Dump MySQL Tables',
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
			
			// Display 'Back to Master C.' Link
		
		// -------------------------------------------------------------
	
	$return_to_master_c_args = [
		'indentlevel'=>1,
		'title'=>'Return to the Master Control Program',
		'image'=>'master-c-icon.jpg',
		'divmouseover'=>'The Grand Master C.',
		'imagemouseover'=>'Master C is in the house!',
		'level'=>3,
		'divclass'=>'width-400px border-2px margin-left-20px margin-top-5px background-color-gray13',
		'textclass'=>'margin-0px horizontal-center vertical-center',
		'imagedivclass'=>'border-2px margin-5px background-color-gray10',
		'imageclass'=>'border-1px height-75px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
		'rightimageenable'=>0,
		'link'=>'master-c.php',
	];
	
	$header->display($return_to_master_c_args);
	
			// Display PHP Info
		
		// -------------------------------------------------------------
	
	$divider->displaystart($divider_padding_start_args);
	
	$version_list_display_args = [
		'options'=>[
			'indentlevel'=>1,
			'tableheaders'=>0,
			'tableclass'=>'width-50percent horizontal-center border-2px background-color-gray13',
			'rowclass'=>'border-1px horizontal-left',
			'cellclass'=>[
				'border-1px vertical-top',
				'border-1px width-100percent vertical-top',
			],
		],
		'list'=>[
			[
				'Instructions:', 'Select the Table(s) to Dump.',
			],
		],
	];
	$generic_list->Display($version_list_display_args);
	
	$divider->displayend($divider_end_args);
		
			// Display Selected Tables
		
		// -------------------------------------------------------------
	
	if($this->StatusDataArray)
	{
		$divider->displaystart($divider_padding_start_args);
		
		$version_list_display_args = [
			'options'=>[
				'indentlevel'=>1,
				'tableheaders'=>0,
				'tableclass'=>'width-50percent horizontal-center border-2px background-color-gray13',
				'rowclass'=>'border-1px horizontal-left',
				'cellclass'=>[
					'border-1px vertical-top',
					'border-1px width-100percent vertical-top',
				],
			],
			'list'=>[
				[
					'<nobr>Selected Tables:</nobr>', implode($this->SelectedMySQLTables, ', ') . '.',
				],
			],
		];
		$generic_list->Display($version_list_display_args);
		
		$divider->displayend($divider_end_args);
	}
		
			// Start Form Box
		
		// -------------------------------------------------------------
	
	$divider_padding_start_args = [
		'class'=>'horizontal-center width-25percent margin-top-5px border-2px',
		'indentlevel'=>1,
	];
	
	$divider->displaystart($divider_padding_start_args);
	
			// Start Form
		
		// -------------------------------------------------------------
	
	$start_form_args = [
		'action'=>0,
		'method'=>'post',
		'files'=>0,
		'formclass'=>'margin-0px',
		'indentlevel'=>1,
	];
	
	$form->StartForm($start_form_args);
	
			// Display Form
		
		// -------------------------------------------------------------
	
	$type_args = [
		type=>'select',
		multiple=>1,
		size=>10,
		name=>'MySQLTables[]',
		indentlevel=>5,
		options=>$this->mysql_tables_select,
	];
	
	$form->DisplayFormField($type_args);
		
			// End Form Box
		
		// -------------------------------------------------------------
	
	$divider_end_args = [
		indentlevel=>1,
	];
	$divider->displayend($divider_end_args);
		
			// Submit Button
		
		// -------------------------------------------------------------
		
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
		'class'=>'margin-5px',
	];
	
	$form->DisplayFormField($type_args);
	
	$element_text_args = [
		text=>'</center>',
		indentlevel=>5,
	];
	$text->Display($element_text_args);
		
			// End Form
		
		// -------------------------------------------------------------
	
	$end_form_args = [
		indentlevel=>1,
	];
	$form->EndForm($end_form_args);
		
			// Display Results
		
		// -------------------------------------------------------------
		
	if($this->StatusDataArray)
	{
	#	print_r($this->StatusDataArray);
		foreach ($this->StatusDataArray as $table_name => $table_records)
		{
					// Start Results Display Box
				
				// -------------------------------------------------------------
			
			$divider_padding_start_args = [
				'class'=>'horizontal-center width-70percent margin-top-5px margin-bottom-5px border-2px',
				'indentlevel'=>1,
			];
			
			$divider->displaystart($divider_padding_start_args);
			
					// Display Table Title
				
				// -------------------------------------------------------------
				
			$element_text_args = [
				text=>'<h3>' . $table_name . '</h3>',
				indentlevel=>5,
			];
			$text->Display($element_text_args);
			
					// Start Results Display Box
				
				// -------------------------------------------------------------
			
			$divider_padding_start_args = [
				'class'=>'margin-5px horizontal-left border-1px',
				'indentlevel'=>1,
			];
			
			$divider->displaystart($divider_padding_start_args);
			
					// Table Start for Records List
				
				// -------------------------------------------------------------
			
			$table_start_args = [
				tableclass=>'width-100percent',
				tableborder=>'2',
				indentlevel=>2,
				cellwidth=>'25%',
			];
			
			$table->DisplayComponent_StartTable($table_start_args);
			
					// Display Record Field Names
				
				// -------------------------------------------------------------
			
			if($table_records[0])
			{
			
				$first_table_record = $table_records[0];
				
				$display_start = 0;
				
				foreach ($first_table_record as $key => $value)
				{
					reset($first_table_record);
					if($key === key($first_table_record))
					{
					}
					else
					{
						$separate_cells_and_rows_args = [
							cellwidth=>'25%',
							indentlevel=>2,
						];
						$table->DisplayComponent_SeparateCells($separate_cells_and_rows_args);
					}
					
					print('<b>' . $key . '</b>');
				}
					
				$separate_cells_and_rows_args = [
					cellwidth=>'25%',
					indentlevel=>2,
				];
				$table->DisplayComponent_SeparateCellsAndRows($separate_cells_and_rows_args);
				
			#	print("<PRE>");
			#	print_r($table_records);
			#	print("</PRE>");
			}
			
					// Display Records
				
				// -------------------------------------------------------------
			
			foreach ($table_records as $table_record)
			{
			#	print("BT: $table_record");
				foreach ($table_record as $record_field => $record_value)
				{
					reset($table_record);
					if($record_field === key($table_record))
					{
					}
					else
					{
						$separate_cells_and_rows_args = [
							cellwidth=>'25%',
							indentlevel=>2,
						];
						$table->DisplayComponent_SeparateCells($separate_cells_and_rows_args);
					}
					
					print($record_value);
				}
					
				$separate_cells_and_rows_args = [
					cellwidth=>'25%',
					indentlevel=>2,
				];
				$table->DisplayComponent_SeparateCellsAndRows($separate_cells_and_rows_args);
			}
			
					// Table End for Records List
				
				// -------------------------------------------------------------
			
			$table_end_args = [
				indentlevel=>2,
			];
			$table->DisplayComponent_EndTable($table_end_args);
			
					// End Results Display Box
				
				// -------------------------------------------------------------
			
			$divider->displayend($divider_end_args);
			
					// End Results Display Box
				
				// -------------------------------------------------------------
			
			$divider->displayend($divider_end_args);
		}
	}
	
?>