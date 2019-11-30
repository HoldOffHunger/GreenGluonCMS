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
		'title'=>$this->domain_object->primary_domain . ' System Status : Generate Search Engine Sitemap Submission Links',
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
			'Note: Generated a total of ' . $this->sitemap_submission_links_count . ' links.',
		]],
	];
	$generic_list->Display($version_list_display_args);
	
			// Display PHP Info
		
		// -------------------------------------------------------------
	
	$language_codes = $this->language_object->GetListOfLanguageCodes();
	$native_language_codes = $this->language_object->GetListOfNativeLanguageNames();
	
	foreach($this->sitemap_submission_links as $primary_host => $site_map_links)
	{
				// Display Primary Host
			
			// -------------------------------------------------------------
		
		$return_to_master_c_args = [
			'indentlevel'=>1,
			'title'=>$primary_host,
			'image'=>'master-c-icon.jpg',
			'divmouseover'=>'The Grand Master C.',
			'imagemouseover'=>'Master C is in the house!',
			'level'=>2,
			'divclass'=>'horizontal-center width-400px border-2px background-color-gray13 margin-top-5px',
			'textclass'=>'margin-0px',
			'imagedivclass'=>'border-2px margin-5px background-color-gray10',
			'imageclass'=>'border-1px height-75px',
			'domainobject'=>$this->domain_object,
			'leftimageenable'=>0,
			'rightimageenable'=>0,
		];
		
		$header->display($return_to_master_c_args);
		
		foreach($language_codes as $language_code => $language_name)
		{
					// Display Primary Host
				
				// -------------------------------------------------------------
				
			print("<center>");
			
			$return_to_master_c_args = [
				'indentlevel'=>1,
				'title'=>'<nobr>' . strtoupper($language_code) . ' : ' . $language_name . ' / ' . $native_language_codes[$language_code] . '</nobr>',
				'image'=>'master-c-icon.jpg',
				'divmouseover'=>'The Grand Master C.',
				'imagemouseover'=>'Master C is in the house!',
				'level'=>3,
				'divclass'=>'horizontal-center display-inline-block border-2px background-color-gray13 margin-top-5px',
				'textclass'=>'margin-0px',
				'imagedivclass'=>'border-2px margin-5px background-color-gray10',
				'imageclass'=>'border-1px height-75px',
				'domainobject'=>$this->domain_object,
				'leftimageenable'=>0,
				'rightimageenable'=>0,
			];
			
			$header->display($return_to_master_c_args);
				
			print("</center>");
			
					// Display Links
				
				// -------------------------------------------------------------
			
			$divider->displaystart($divider_padding_start_args);
			
			$version_list_display_args = [
				'options'=>[
					'indentlevel'=>1,
					'tableheaders'=>0,
					'tableclass'=>'width-95percent horizontal-center border-2px background-color-gray13',
					'rowclass'=>'border-1px horizontal-left',
					'cellclass'=>[
						'border-1px vertical-top',
						'border-1px vertical-top',
						'border-1px width-100percent vertical-top',
					],
				],
				'list'=>$site_map_links[$language_code],
			];
			$generic_list->Display($version_list_display_args);
			
			$divider->displayend($divider_end_args);
		}
	}
	
?>