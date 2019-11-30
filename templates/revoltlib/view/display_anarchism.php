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
	
	require('../modules/html/navigation.php');
	$navigation_args = [
		'globals'=>$this->globals,
		'languageobject'=>$this->language_object,
		'divider'=>$divider,
		'domainobject'=>$this->domain_object,
	];
	$navigation = new module_navigation($navigation_args);
	
			// Display Header
		
		// -------------------------------------------------------------
	
	$header_primary_args = [
		'title'=>$this->header_title_text,
		'image'=>'marina_ginesta-icon.jpg',
		'divmouseover'=>'The Grand Master C.',
		'imagemouseover'=>'Master C is in the house!',
		'level'=>1,
		'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-gray13',
		'textclass'=>'padding-0px margin-0px horizontal-center vertical-center padding-top-22px',
		'imagedivclass'=>'border-2px margin-5px background-color-gray10',
		'imageclass'=>'border-1px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
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
	
			// View Selected Record List
		
		// -------------------------------------------------------------
	
	//print("BT: INDEX view.php script, display.php template<BR><BR>");
	
	$header_secondary_args = [
		'title'=>'Total People : ' . count($this->children) ,
	//	'image'=>$this->primary_host_record['PrimaryImageLeft'],
	//	'rightimage'=>$this->primary_host_record['PrimaryImageRight'],
		'imagemouseover'=>'Master C is in the house!',
		'level'=>3,
		'divclass'=>'width-33percent border-2px background-color-gray13 margin-5px',
		'textclass'=>'padding-0px margin-5px horizontal-center vertical-center',
		'imagedivclass'=>'border-2px margin-5px background-color-gray10',
		'imageclass'=>'border-1px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>0,
		'rightimageenable'=>0,
	];
	$header->display($header_secondary_args);
	
	$child_display = [];
	
	for($i = 0; $i < count($this->children); $i++)
	{
		$child = $this->children[$i];
		$child_display[$child['ListTitle']] = $child;
	}
	
	uksort($child_display, "strnatcasecmp");
	
	print('<div class="horizontal-center width-90percent">');
	
	foreach($child_display as $child)
	{
		$child_title =
			'<a href="' . $child['Code'] . '/view.php">' .
			$child['ListTitle'] .
			'</a>';
		
		$header_secondary_args = [
			'title'=>$child_title,
		//	'image'=>$this->primary_host_record['PrimaryImageLeft'],
		//	'rightimage'=>$this->primary_host_record['PrimaryImageRight'],
			'imagemouseover'=>'Master C is in the house!',
			'level'=>2,
			'divclass'=>'width-100percent border-2px background-color-gray13 margin-5px',
			'textclass'=>'padding-0px margin-5px horizontal-left',
			'imagedivclass'=>'border-2px margin-5px background-color-gray10',
			'imageclass'=>'border-1px',
			'domainobject'=>$this->domain_object,
			'leftimageenable'=>0,
			'rightimageenable'=>0,
		];
		$header->display($header_secondary_args);
	}
	
	print('</div>');
	
	/*
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
	*/
	
			// Display Final Ending Navigation
		
		// -------------------------------------------------------------
	
	$bottom_navigation_args = [
		'thispage'=>'',
	];
	$navigation->DisplayBottomNavigation($bottom_navigation_args);
	
?>