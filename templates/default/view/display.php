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
	
			// Display Header
		
		// -------------------------------------------------------------
	
	$header_primary_args = [
		'title'=>'Master Control Program',
		'image'=>'master-c-icon.jpg',
		'divmouseover'=>'The Grand Master C.',
		'imagemouseover'=>'Master C is in the house!',
		'level'=>1,
		'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-gray13',
		'textclass'=>'padding-0px margin-0px horizontal-center vertical-center padding-top-22px',
		'imagedivclass'=>'border-2px margin-5px background-color-gray10',
		'imageclass'=>'border-1px height-75px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
		'rightimageenable'=>1,
	];
	
	$header->display($header_primary_args);
	
			// Basic Divider Arguments
		
		// -------------------------------------------------------------
	
	$divider_one_third_start_args = [
		'class'=>'width-33percent float-left',
	];
	
	$divider_case_start_args = [
		'class'=>'width-100percent height-400px overflow-auto',
	];
	
	$divider_frame_start_args = [
		'class'=>'width-100percent border-2px',
	];
	
	$divider_padding_start_args = [
		'class'=>'margin-5px padding-5px',
	];
	
	$divider_end_args = [
		'indentlevel'=>1,
	];
		
			// Admin Controls
		
		// -------------------------------------------------------------
	
	if($this->authentication_object->user_session['UserAdmin.id']) {
		require('../modules/html/entry-controls.php');
		$entry_controls = new module_entrycontrols;
		$entry_controls->Display(['that'=>$this]);
	}
	
			// View Selected Record List
		
		// -------------------------------------------------------------
	
	print('<PRE>');
	print('Green Gluon CMS installed and running properly : <a href="login.php">Login</a>.');
	print('</PRE>');
	
	print('<center>');
	print('<table style="border:1px solid black;width:1000px;">');
	
	foreach($this->entry as $field => $value) {
		print('<tr>');
		print('<td style="border:1px solid black;" width="1">' . $field . '</td>');
		
		print('<td style="border:1px solid black;">');
		if(is_array($value)) {
			if($value['id']) {
				print('<table style="border:1px solid black; margin-top:1px;">');
				foreach($value as $valuefield => $valuevalue) {
					print('<tr>');
					
					print('<td style="border:1px solid black;">');
					print($valuefield);
					print('</td>');
					
					print('<td style="border:1px solid black;">');
					print($valuevalue);
					print('</td>');
					
					print('</tr>');
				}
				print('</table>');
			} else {
				foreach($value as $index => $record) {
					$number = $index + 1;
					print('# ');
					print($number);
					print('<BR><BR>');
					
					print('<table style="border:1px solid black;">');
					foreach($record as $valuefield => $valuevalue) {
						print('<tr>');
						
						print('<td style="border:1px solid black;">');
						print($valuefield);
						print('</td>');
						
						print('<td style="border:1px solid black;">');
						print($valuevalue);
						print('</td>');
						
						print('</tr>');
					}
					print('</table>');
				}
			}
		} else {
			print($value);
		}
		print('</td>');
		print('</tr>');
	}
	
	print('</table>');
	print('</center>');
	
	/*
	if($this->authentication_object->user_session['UserAdmin.id'])
	{
		print("BT: view.php script, display.php template<BR><BR>");
		print("<PRE>RECORD LIST:");
		print_r($this->record_list);
		print("\n\nMASTER RECORD:\n\n");
		print_r($this->master_record);
		print("</PRE>");
		
		print("BT: view.php script, display.php template<BR><BR>");
		print("BT: <a href='modify.php?action=Edit'>EDIT</a><BR><BR>");
		print("<PRE>RECORD LIST:");
		print_r($this->record_list);
		print("\n\nMASTER RECORD:\n\n");
		print_r($this->master_record);
		print("\n\nPARENT:\n\n");
		print_r($this->parent);
		print("\n\nENTRY:\n\n");
		print_r($this->entry);
		print("\n\nCHILDREN:\n\n");
		print_r($this->children);
		print("</PRE>");
		
	}
		*/
	
?>