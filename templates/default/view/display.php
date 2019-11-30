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
	
	if($this->authentication_object->user_session['UserAdmin.id'])
	{
		print('<div class="horizontal-center width-95percent margin-top-5px border-2px">');
				// "Controls" Header
			
			// -------------------------------------------------------------
			
		print('<center>');
		print('<div class="horizontal-center width-90percent">');
		print('<div class="border-2px background-color-gray15 margin-5px float-left">');
		print('<h2 class="horizontal-left margin-5px font-family-arial">');
		print('Controls for Entry ' . $this->entry['id']);
		print('</h2>');
		print('</div>');
		print('</div>');
		print('</center>');
		
				// Finish Admin Controls
			
			// -------------------------------------------------------------
								
		$clear_float_divider_start_args = [
			'class'=>'clear-float',
			'indentlevel'=>5,
		];
		
		$divider->displaystart($clear_float_divider_start_args);
		
		$clear_float_divider_end_args = [
			'indentlevel'=>5,
		];
		
		$divider->displayend($clear_float_divider_end_args);
		
				// "Add" / "Edit" Option
			
			// -------------------------------------------------------------
		
		print('<div class="horizontal-center width-95percent margin-top-5px">');
		
		print('<div class="float-left margin-5px border-2px background-color-gray13">');
		print('<p class="font-family-arial margin-5px">');
		print('<a href="modify.php?action=Edit">EDIT</a>');
		print('</p>');
		print('</div>');
		
		print('<div class="float-left margin-5px border-2px background-color-gray13">');
		print('<p class="font-family-arial margin-5px">');
		print('<a href="modify.php?action=Add">ADD</a>');
		print('</p>');
		print('</div>');
		
		print('<div class="float-left margin-5px border-2px background-color-gray13">');
		print('<p class="font-family-arial margin-5px">');
		print('<a href="transfer.php">TRANSFER</a>');
		print('</p>');
		print('</div>');
		
		print('</div>');
	
				// Section
			
			// -------------------------------------------------------------
								
		$clear_float_divider_start_args = [
			'class'=>'clear-float',
			'indentlevel'=>5,
		];
		
		$divider->displaystart($clear_float_divider_start_args);
		
		$clear_float_divider_end_args = [
			'indentlevel'=>5,
		];
		
		$divider->displayend($clear_float_divider_end_args);
		
				// "View" / "Index" Option
			
			// -------------------------------------------------------------
		
		print('<div class="horizontal-center width-95percent margin-top-5px">');
		
		print('<div class="float-left margin-5px border-2px background-color-gray13">');
		print('<p class="font-family-arial margin-5px">');
		print('<a href="view.php">VIEW</a>');
		print('</p>');
		print('</div>');
		
		print('<div class="float-left margin-5px border-2px background-color-gray13">');
		print('<p class="font-family-arial margin-5px">');
		print('<a href="view.php?action=index">INDEX</a>');
		print('</p>');
		print('</div>');
		
		print('</div>');
		
				// Finish Admin Controls
			
			// -------------------------------------------------------------
								
		$clear_float_divider_start_args = [
			'class'=>'clear-float',
			'indentlevel'=>5,
		];
		
		$divider->displaystart($clear_float_divider_start_args);
		
		$clear_float_divider_end_args = [
			'indentlevel'=>5,
		];
		
		$divider->displayend($clear_float_divider_end_args);
		
		print('</div>');
	}
	
			// View Selected Record List
		
		// -------------------------------------------------------------
	
	print('<BR><BR><PRE>');
	print('Green Gluon CMS installed and running properly.');
	print('</PRE>');
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