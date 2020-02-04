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
		'title'=>$this->domain_object->primary_domain . ' System Status : Detect Bad Text',
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
			
			// Display Instructions
		
		// -------------------------------------------------------------
	
	$primary_url = $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]);
	
	$note = 'Note: This will detect bad text.  Total filters: ' . number_format($this->misspellingscount) . '. Total entries (estimate): ' . number_format($this->entry_end - $this->entry_start) . '.';
	
	$version_list_display_args = [
		'options'=>[
			'indentlevel'=>1,
			'tableheaders'=>0,
			'tableclass'=>'width-70percent horizontal-center border-2px background-color-gray13 margin-top-14px',
			'rowclass'=>'border-1px horizontal-left',
			'cellclass'=>[
				'border-1px vertical-top',
				'border-1px width-100percent vertical-top',
			],
		],
		'list'=>[[
			$note,
		]],
	];
	$generic_list->Display($version_list_display_args);
	
	if($this->search_results_count) {
		$version_list_display_args = [
			'options'=>[
				'indentlevel'=>1,
				'tableheaders'=>0,
				'tableclass'=>'width-50percent horizontal-center border-2px background-color-gray13 margin-top-14px',
				'rowclass'=>'border-1px horizontal-left',
				'cellclass'=>[
					'border-1px vertical-top',
					'border-1px width-100percent vertical-top',
				],
			],
			'list'=>[[
				'<nobr>Search Results</nobr>', number_format($this->search_results_count),
			]],
		];
		$generic_list->Display($version_list_display_args);
	}
	
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
	
			// Display Form Save Button : Save
		
		// -------------------------------------------------------------
	
	$element_text_args = [
		'text'=>'<center>',
		'indentlevel'=>5,
	];
	$text->Display($element_text_args);
	
	print('<select name="algorithm" id="algorithm">');
	
	print('<option value="standard"');
	if($this->algorithm == 'standard') {
		print('selected');
	}
	print('>Standard Algorithm</option>');
	
	print('<option value="intensive"');
	if($this->algorithm == 'intensive') {
		print('selected');
	}
	print('>Intensive Algorithm</option>');
	
	print('</select>');
	
	print('<BR>');
	
	print('<select name="type" id="type">');
	
	print('<option value="Entry_Title"');
	if($this->type == 'Entry_Title') {
		print('selected');
	}
	print('>Entry: Title</option>');
	
	print('<option value="Entry_Subtitle"');
	if($this->type == 'Entry_Subtitle') {
		print('selected');
	}
	print('>Entry: Subtitle</option>');
	
	print('<option value="Entry_ListTitle"');
	if($this->type == 'Entry_ListTitle') {
		print('selected');
	}
	print('>Entry: ListTitle</option>');
	
	print('<option value="Entry_ListTitleSortKey"');
	if($this->type == 'Entry_ListTitleSortKey') {
		print('selected');
	}
	print('>Entry: ListTitleSortKey</option>');
	
	print('<option value="Entry_Code"');
	if($this->type == 'Entry_Code') {
		print('selected');
	}
	print('>Entry: Code</option>');
	
	print('<option value="TextBody_Text"');
	if($this->type == 'TextBody_Text') {
		print('selected');
	}
	print('>TextBody: Text</option>');
	
	print('</select>');
	
	print('<br>');
	
	print('First Correction To Test : ');
	print('<input type="text" name="correction-id-start" value="' . $this->correction_start_id . '"> (first: 1)');
	print('<br>');
	
	print('Last Correction To Test : ');
	print('<input type="text" name="correction-id-last" value="' . $this->correction_end_id . '"> (normal-last: ' . $this->misspellingscount . '; intensive-last: ' . $this->intensivemisspellingscount . ')');
	print('<br>');
	
	print('First Entry To Test : ');
	print('<input type="text" name="entry-id-start" value="' . $this->maxmin['min'] . '">');
	print('<br>');
	
	print('Last Entry To Test : ');
	print('<input type="text" name="entry-id-last" value="' . $this->maxmin['max'] . '">');
	print('<br>');
	
	$type_args = [
		'type'=>'submit',
		'name'=>'fix-broken-records',
		'class'=>'margin-5px',
		'value'=>'Detect Bad-Text Records',
		'indentlevel'=>5,
	];
	
	$form->DisplayFormField($type_args);
	
	$element_text_args = [
		'text'=>'</center>',
		'indentlevel'=>5,
	];
	$text->Display($element_text_args);
			
			// Display Instructions
		
		// -------------------------------------------------------------
	
	$primary_url = $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]);
	
	if(count($this->search_results) > 0) {
		$version_list_display_args = [
			'options'=>[
				'indentlevel'=>1,
				'tableheaders'=>0,
				'tableclass'=>'width-70percent horizontal-center border-2px background-color-gray13 margin-top-14px',
				'rowclass'=>'border-1px horizontal-left',
				'cellclass'=>[
					'border-1px vertical-top',
					'border-1px width-100percent vertical-top',
					'border-1px width-100percent vertical-top',
					'border-1px width-100percent vertical-top',
					'border-1px width-100percent vertical-top',
					'border-1px width-100percent vertical-top',
					'border-1px width-100percent vertical-top',
					'border-1px width-100percent vertical-top',
					'border-1px width-100percent vertical-top',
					'border-1px width-100percent vertical-top',
					'border-1px width-100percent vertical-top',
					'border-1px width-100percent vertical-top',
					'border-1px width-100percent vertical-top',
					'border-1px width-100percent vertical-top',
					'border-1px width-100percent vertical-top',
					'border-1px width-100percent vertical-top',
					'border-1px width-100percent vertical-top',
				],
			],
			'list'=>array_merge(
				$this->search_header,
				$this->search_results
			),
		];
		$generic_list->Display($version_list_display_args);
	}
	
		// Hidden Action
		// -----------------------------------------------------
	
	$type_args = [
		type=>'hidden',
		name=>'fix',
		value=>'1',
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
	
?>