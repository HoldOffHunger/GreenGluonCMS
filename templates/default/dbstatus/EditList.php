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
	
			// Display Header
		
		// -------------------------------------------------------------
	
	$header_primary_args = array(
		'indentlevel'=>1,
		'title'=>$this->domain_object->primary_domain . ' System Status : Edit List',
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
			
			// Display 'Back to Master C.' Link
		
		// -------------------------------------------------------------
	
	$return_to_master_c_args = array(
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
	);
	
	$header->display($return_to_master_c_args);
	
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
				'<nobr>Other List Actions:</nobr>', ' &bull; <a href="dbstatus.php?action=CreateList">Create List</a><br> &bull; <a href="dbstatus.php?action=ViewAllLists">View All Lists</a><br> &bull; <a href="dbstatus.php?action=ViewAllListsAndItems">View All Lists and Items</a>',
			],
		],
	);
	$generic_list->Display($version_list_display_args);
	
	$divider->displayend($divider_end_args);
	
			// Delete Information
		
		// -------------------------------------------------------------
	
	if($this->delete)
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
			'list'=>[
				[
					'<nobr>Delete Completed:</nobr>', 'The lookup list has been deleted as requested.  The information removed is displayed below.',
				],
			],
		);
		$generic_list->Display($version_list_display_args);
		
		$divider->displayend($divider_end_args);
	}
	
			// Display List
		
		// -------------------------------------------------------------
		
	$lookup_list = $this->lookup_list;
	
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
				'border-1px vertical-top',
			],
		],
		'list'=>[
			[
				'<nobr>' . 'LookupList' . $lookup_list['id'] . ' : ' .'</nobr>',
				$lookup_list['Title'],
			],
		],
	];
	$generic_list->Display($version_list_display_args);
	
	$divider->displayend($divider_end_args);
	
			// Display Form Elements : Start
		
		// -------------------------------------------------------------
	
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
	
	if(!$this->delete)
	{
		$divider_padding_start_args = array(
			'class'=>'horizontal-center width-80percent margin-top-5px border-2px',
			'indentlevel'=>1,
		);
		
		$divider->displaystart($divider_padding_start_args);
		
		$divider_padding_start_args = array(
			'class'=>'horizontal-left',
			'indentlevel'=>1,
		);
		
		$divider->displaystart($divider_padding_start_args);
		
		$element_text_args = [
			text=>'<span class="margin-left-5px">List Title</span>',
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
			value=>$lookup_list['Title'],
		];
		
		$form->DisplayFormField($type_args);
		
		$clear_float_divider_end_args = [
			'indentlevel'=>5,
		];
		
		$divider->displayend($clear_float_divider_end_args);
			
		$clear_float_divider_end_args = [
			'indentlevel'=>5,
		];
		
		$divider->displayend($clear_float_divider_end_args);
	}
	
			// Display List Items
		
		// -------------------------------------------------------------
	
	$lookup_list_items = $this->lookup_list_items;
	
	if(count($lookup_list_items))
	{
		if(!$this->delete)
		{
			$first_lookup_list_item = array_shift($lookup_list_items);
			
					// Start Field
					// -------------------------------------------------------
			
			$left_div_args = [
				'class'=>'horizontal-left',
				'indentlevel'=>6,
			];
			
			$divider->displaystart($left_div_args);
					// Display Field
					// -------------------------------------------------------
			
			$type_args = array(
				type=>'text',
				name=>'ItemKey[]',
				'class'=>'margin-top-5px margin-left-5px',
				size=>60,
				indentlevel=>5,
				maxlength=>255,
				value=>$first_lookup_list_item['ItemKey'],
			);
			
			$form->DisplayFormField($type_args);
			
					// Display Field
					// -------------------------------------------------------
			
			$type_args = array(
				type=>'text',
				name=>'ItemValue[]',
				'class'=>'margin-top-5px margin-left-5px',
				size=>60,
				indentlevel=>5,
				maxlength=>255,
				value=>$first_lookup_list_item['ItemValue'],
			);
			
			$form->DisplayFormField($type_args);
			
					// Display 'Add' Button
					// -------------------------------------------------------
			
			$type_args = array(
				'type'=>'button',
				'id'=>'add-item-button',
				'class'=>'float-right margin-top-5px margin-right-5px',
				'value'=>'Add Item',
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
		
		foreach($lookup_list_items as $lookup_list_item)
		{
					// Start Field
					// -------------------------------------------------------
			
			$left_div_args = [
				'class'=>'horizontal-left input-divider',
				'indentlevel'=>6,
			];
			
			$divider->displaystart($left_div_args);
		
					// Display Field
					// -------------------------------------------------------
			
			if($this->delete)
			{
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
							$lookup_list_item['ItemKey'],
							$lookup_list_item['ItemValue'],
						],
					],
				];
				$generic_list->Display($version_list_display_args);
				
				$divider->displayend($divider_end_args);
			}
			else
			{
					// Display Field
					// -------------------------------------------------------
					
				$type_args = array(
					type=>'text',
					name=>'ItemKey[]',
					'class'=>'margin-top-5px margin-left-5px',
					size=>60,
					indentlevel=>5,
					maxlength=>255,
					value=>$lookup_list_item[ItemKey],
				);
				
				$form->DisplayFormField($type_args);
			
					// Display Field
					// -------------------------------------------------------
			
				$type_args = array(
					type=>'text',
					name=>'ItemValue[]',
					'class'=>'margin-top-5px margin-left-5px',
					size=>60,
					indentlevel=>5,
					maxlength=>255,
					value=>$lookup_list_item[ItemValue],
				);
				
				$form->DisplayFormField($type_args);
				
						// Display 'Add' Button
						// -------------------------------------------------------
				
				$type_args = array(
					'type'=>'button',
					'id'=>'delete-item-button',
					'class'=>'float-right margin-top-5px margin-right-5px delete-item-button',
					'value'=>'Remove',
					'indentlevel'=>5,
				);
				
				$form->DisplayFormField($type_args);
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
			
					// End Display
					// -------------------------------------------------------
			
			$clear_float_divider_end_args = [
				'indentlevel'=>5,
			];
			
			$divider->displayend($clear_float_divider_end_args);
		}
	}
	elseif(!$this->delete)
	{
				// Start Field
				// -------------------------------------------------------
		
		$left_div_args = [
			'class'=>'horizontal-left',
			'indentlevel'=>6,
		];
		
		$divider->displaystart($left_div_args);
	
				// Display Field
				// -------------------------------------------------------
		
		$type_args = array(
			type=>'text',
			name=>'ItemKey[]',
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
			name=>'ItemValue[]',
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
			'id'=>'add-item-button',
			'class'=>'float-right margin-top-5px margin-right-5px',
			'value'=>'Add Item',
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
	
			// Start Hidden Field and Save Buttons
			// -------------------------------------------------------
	
	if(!$this->delete)
	{
				// Start Hidden Field
				// -------------------------------------------------------
				
		$clear_float_divider_start_args = [
			'id'=>'hidden-item-input',
			'class'=>'display-none',
			'indentlevel'=>6,
		];
		
		$divider->displaystart($clear_float_divider_start_args);
		
				// Display Hidden Input
				// -------------------------------------------------------
		
		$type_args = array(
			'type'=>'text',
			'name'=>'ItemKey-Hidden',
			'class'=>'margin-top-5px margin-left-5px',
			'size'=>60,
			'indentlevel'=>7,
			maxlength=>255,
		);
		
		$form->DisplayFormField($type_args);
		
		$type_args = array(
			'type'=>'text',
			'name'=>'ItemValue-Hidden',
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
			'id'=>'delete-item-button',
			'class'=>'float-right margin-top-5px margin-right-5px delete-item-button',
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
			'id'=>'item-list',
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
			name=>'Save List',
			'class'=>'margin-5px',
			value=>'Save List',
			indentlevel=>5,
		];
		
		$form->DisplayFormField($type_args);
		
		$type_args = [
			type=>'submit',
			name=>'DeleteList',
			'class'=>'margin-5px confirm',
			value=>'Delete List',
			indentlevel=>5,
		];
		
		$form->DisplayFormField($type_args);
		
		$element_text_args = [
			text=>'</center>',
			indentlevel=>5,
		];
		$text->Display($element_text_args);
	}
	
			// Display Form Elements : End
		
		// -------------------------------------------------------------
	
	$end_form_args = [
		indentlevel=>1,
	];
	$form->EndForm($end_form_args);
	
?>