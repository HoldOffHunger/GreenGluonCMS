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
		
	if($this->primary_host_record['PrimaryColor'])
	{
		$primary_color = $this->primary_host_record['PrimaryColor'];
	}
	else
	{
		$primary_color = '6495ED';
	}
	
	$header_primary_args = array(
		'indentlevel'=>1,
		'title'=>'Login to ' . $this->domain_object->primary_domain,
		'image'=>'master-c-icon.jpg',
		'divmouseover'=>'The Grand Master C.',
		'imagemouseover'=>'Master C is in the house!',
		'level'=>1,
		'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-' . $primary_color,
		'textclass'=>'margin-0px horizontal-center vertical-center padding-top-22px',
		'imagedivclass'=>'border-2px margin-5px background-color-gray10',
		'imageclass'=>'border-1px height-75px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
		'rightimageenable'=>1,
	);
	
			// Display Header
		
		// -------------------------------------------------------------
	
	$header->display($header_primary_args);
	
			// Display Message
		
		// -------------------------------------------------------------
		
				// Determine Message
			
			// -------------------------------------------------------------
	
	if($this->login_results['status'] == 'Success')
	{
		$message = 'Logged in successfully!';
	}
	else
	{
		$message = 'Login failed!  Redirecting to login screen.';
	}
		
				// Show Message
			
			// -------------------------------------------------------------
	
	$version_list_display_args = [
		'options'=>[
			'indentlevel'=>1,
			'tableheaders'=>0,
			'tableclass'=>'width-50percent horizontal-center border-2px background-color-gray13 margin-top-5px font-family-tahoma',
			'rowclass'=>'border-1px horizontal-left',
			'cellclass'=>[
				'border-1px vertical-top horizontal-center font-size-150percent',
				'border-1px width-100percent vertical-top horizontal-center',
			],
		],
		'list'=>[
			[
				$message,
			],
		],
	];
	
	$generic_list->Display($version_list_display_args);
		
				// Extra Linking
			
			// -------------------------------------------------------------
		
	if($this->login_results['status'] == 'Success' && $this->login_results['useraccount']['UserAdmin.id'])
	{
				// Display Quick-Options Panel
			
			// -------------------------------------------------------------
		
		$version_list_display_args = [
			'options'=>[
				'indentlevel'=>1,
				'tableheaders'=>0,
				'tableclass'=>'width-100percent horizontal-center border-2px background-color-gray13 margin-top-5px font-family-tahoma',
				'rowclass'=>'border-1px horizontal-left',
				'cellclass'=>[
					'border-1px width-33percent vertical-top link-clickable cursor-pointer',
					'border-1px width-33percent vertical-top link-clickable cursor-pointer',
					'border-1px width-33percent vertical-top link-clickable cursor-pointer',
				],
			],
			'list'=>[
				[
					'&bull; <a href="logout.php">Logout</a>',
					'&bull; <a href="master-c.php">Master Control Program</a>',
					'&bull; <a href="user-panel.php">User Panel</a>',
				],
			],
		];
		$generic_list->Display($version_list_display_args);
	}
		
?>