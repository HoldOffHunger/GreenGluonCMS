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
		'title'=>$this->domain_object->primary_domain . ' System Status : Detect and Fix British Spellings',
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
			
			// Display Instructions
		
		// -------------------------------------------------------------
	
	$primary_url = $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]);
	
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
			'Note: This will detect records with British spellings and correct them to their American equivalent.',
		]],
	];
	$generic_list->Display($version_list_display_args);
	
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
	
			// Display Form Save Button : Options
		
		// -------------------------------------------------------------
	
	$record_types = [
		'Entry',
		'TextBody',
		'Tag',
		'Link',
		'Description',
		'Image',
		'Quote',
		'EventDate',
		'Definition',
		'Association',
	];
	$record_types_count = count($record_types);
	
	print('<table border="1" width="100%">');
	print('<tr><td width="99%">Record Type : </td><td><select name="record-type">');
	for($i = 0; $i < $record_types_count; $i++) {
		$record_type = $record_types[$i];
		print('<option value="' . $record_type . '"');
		
		if($record_type == $this->recordtype) {
			print(' SELECTED="SELECTED"');
		}
		
		print('>' . $record_type . '</option>');
	}
	
	print('<tr><td>Specific Record (0 for all) :</td><td><input name="specific-record" value="');
	if($this->specificrecord) {
		print($this->specificrecord);
	} else {
		print('0');
	}
	print('"></td></tr>');
	print('</table>');
	
			// Display Form Save Button : Save
		
		// -------------------------------------------------------------
	
	$element_text_args = [
		text=>'<center>',
		indentlevel=>5,
	];
	$text->Display($element_text_args);
	
	$type_args = [
		type=>'submit',
		name=>'fix-broken-records',
		'class'=>'margin-5px',
		value=>'Fix Broken Records',
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
		name=>'fix',
		value=>'1',
		indentlevel=>5,
	];
	
	$form->DisplayFormField($type_args);
	
		// End Form
		// -----------------------------------------------------
	
	$end_form_args = [
		indentlevel=>1,
	];
	$form->EndForm($end_form_args);
	
			// Display Form Elements : End
		
		// -------------------------------------------------------------
	
	$divider_end_args = [
		indentlevel=>1,
	];
	$divider->displayend($divider_end_args);
	
		// Show Conversion Results
		// -----------------------------------------------------
	
	if($this->fixresults) {
		$divider_padding_start_args = array(
			'class'=>'horizontal-center width-90percent margin-top-5px border-2px',
			'indentlevel'=>1,
		);
		
		$divider->displaystart($divider_padding_start_args);
		
		print('<table border="1" width="100%">');
		print('<tr><td width="100%">');
		print('<ul style="margin:0px;">');
		
		foreach($this->fixresults as $fixed_table => $fixed_table_ids) {
			foreach($fixed_table_ids as $fixed_table_id => $fixed_record) {
				print('<li>' . $fixed_table . ' : id ' . $fixed_table_id . '</li>');
			}
		}
		
		print('</ul>');
		print('</td></tr>');
		print('</table>');
		
		$divider_end_args = [
			indentlevel=>1,
		];
		$divider->displayend($divider_end_args);
	}
	
?>