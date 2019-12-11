<?php
		
			// Standard Requires
		
		// -------------------------------------------------------------
	
	require('../modules/spacing.php');
	
	require('../modules/html/list/hideable-arrow.php');
	$hideable = new module_hideable;
	
	require('../modules/html/divider.php');
	$divider = new module_divider;
	
	require('../modules/html/header.php');
	$header = new module_header;
	
	require('../modules/html/list/generic.php');
	$generic_list = new module_genericlist;
	
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
	
	$header_primary_args = [
		'title'=>'Master Control Program',
		'image'=>'master-c-icon.jpg',
		'divmouseover'=>'The Grand Master C.',
		'imagemouseover'=>'Master C is in the house!',
		'level'=>1,
		'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-' . $primary_color,
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
	
	$divider_padding_special_start_args = [
		'class'=>'margin-top-5px margin-right-5px margin-left-5px padding-5px margin-bottom-2px',
	];
	
	$divider_end_args = [
		'indentlevel'=>1,
	];
	
			// Display Quick-Options Panel
		
		// -------------------------------------------------------------
	
	$version_list_display_args = [
		'options'=>[
			'indentlevel'=>1,
			'tableheaders'=>0,
			'tableclass'=>'width-100percent horizontal-center border-2px background-color-gray13 margin-top-5px font-family-tahoma',
			'rowclass'=>'border-1px horizontal-left',
			'cellclass'=>[
				'border-1px width-25percent vertical-top link-clickable cursor-pointer',
				'border-1px width-25percent vertical-top link-clickable cursor-pointer',
				'border-1px width-25percent vertical-top link-clickable cursor-pointer',
				'border-1px width-25percent vertical-top link-clickable cursor-pointer',
			],
		],
		'list'=>[
			[
				'&bull; <a href="/">Home</a>',
				'&bull; <a href="logout.php">Logout</a>',
				'&bull; <a href="login.php">Login</a>',
				'&bull; <a href="user-panel.php">User Panel</a>',
			],
		],
	];
	$generic_list->Display($version_list_display_args);
	
			// Display Column #2 : Administration
		
		// -------------------------------------------------------------
		
				// Column #2, Administration : List Args
			
			// -------------------------------------------------------------
	
	$user_hideable_args = [
		'options'=>[
			'domainobject'=>$this->domain_object,
		],
		'list'=>[
			[
				'text'=>'Administration',
				'link'=>' ',
				'mouseover'=>'Administration',
				[
					'text'=>'View All Domains',
					'link'=>'admin.php?action=ViewAllDomains',
					'mouseover'=>'View All Domains',
				],
			],
			[
				'text'=>'War Room',
				'link'=>' ',
				'mouseover'=>'No Fighting!',
				[
					'text'=>'This Host',
					'link'=>' ',
					'mouseover'=>'No Fighting!',
					[
						'text'=>'This Host',
						'link'=>'warroom.php?host=' . $this->domain_object->host,
						'mouseover'=>'View War Room for This Host',
					],
					[
						'text'=>'This Host - 100 Most Recent',
						'link'=>'warroom.php?limit=100&host=' . $this->domain_object->host,
						'mouseover'=>'View War Room for This Host',
					],
					[
						'text'=>'This Host - 1,000 Most Recent',
						'link'=>'warroom.php?limit=1000&host=' . $this->domain_object->host,
						'mouseover'=>'View War Room for This Host',
					],
				],
				[
					'text'=>'All Hosts',
					'link'=>' ',
					'mouseover'=>'No Fighting!',
					[
						'text'=>'All Hosts',
						'link'=>'warroom.php',
						'mouseover'=>'View War Room for All Hosts',
					],
					[
						'text'=>'All Hosts - 100 Most Recent',
						'link'=>'warroom.php?limit=100',
						'mouseover'=>'View War Room for All Hosts',
					],
					[
						'text'=>'All Hosts - 1,000 Most Recent',
						'link'=>'warroom.php?limit=1000',
						'mouseover'=>'View War Room for All Hosts',
					],
				],
			],
		],
	];
		
				// Column #1, Administration : Secondary Header Args
			
			// -------------------------------------------------------------
	
	$header_secondary_panel01_args = [
		'title'=>'Admin',
		'image'=>'master-c/admin-icon.jpg',
		'divmouseover'=>'Toolage',
		'imagemouseover'=>'Toolage Imageryage!',
		'level'=>2,
		'divclass'=>'horizontal-center width-100percent border-bottom-1px background-color-gray13',
		'textclass'=>'margin-0px padding-0px vertical-center padding-top-14px',
		'imagedivclass'=>'background-color-gray10 margin-5px',
		'imageclass'=>'border-1px width-50px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
		'rightimageenable'=>1,
	];
		
				// Column #1, 3rd Party : Display
			
			// -------------------------------------------------------------
	
	$divider->displaystart($divider_one_third_start_args);
	
	$divider->displaystart($divider_padding_special_start_args);
	
	$divider->displaystart($divider_frame_start_args);
	
	$header->display($header_secondary_panel01_args);
	
	$divider->displaystart($divider_case_start_args);
	
	$divider->displaystart($divider_padding_start_args);
	
	$hideable->display($user_hideable_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
			// Display Column #1 : Entry Management
		
		// -------------------------------------------------------------
		
				// Column #1, Tools : List Args
			
			// -------------------------------------------------------------
	
	$entry_hideable_args = [
		'options'=>[
			'domainobject'=>$this->domain_object,
		],
		'list'=>[
			[
				'text'=>'Modify Entries',
				'link'=>' ',
				'mouseover'=>'Modify Entries',
				[
					'text'=>'Add Entry',
					'link'=>'modify.php?action=Add',
					'mouseover'=>'Add an Entry',
				],
				[
					'text'=>'Import Entries',
					'link'=>'import.php',
					'mouseover'=>'Import Entries',
				],
			],
			[
				'text'=>'Select Entries',
				'link'=>' ',
				'mouseover'=>'Select Entries',
				[
					'text'=>'Select Entry by id',
					'link'=>'view.php?action=Select&by=id',
					'mouseover'=>'Select Entry by Code',
				],
				[
					'text'=>'Select Entry by Title',
					'link'=>'view.php?action=Select&by=Title',
					'mouseover'=>'Select Entry by Code',
				],
				[
					'text'=>'Select Entry by Code',
					'link'=>'view.php?action=Select&by=Code',
					'mouseover'=>'Select Entry by Code',
				],
				[
					'text'=>'Select Entry by Description',
					'link'=>'view.php?action=Select&by=Description',
					'mouseover'=>'Select Entry by Description',
				],
				[
					'text'=>'Select Entry by Quote',
					'link'=>'view.php?action=Select&by=Quote',
					'mouseover'=>'Select Entry by Quote',
				],
				[
					'text'=>'Select Entry by Link',
					'link'=>'view.php?action=Select&by=Link',
					'mouseover'=>'Select Entry by Link',
				],
				[
					'text'=>'Select Entry by TextBody',
					'link'=>'view.php?action=Select&by=TextBody',
					'mouseover'=>'Select Entry by Text Body',
				],
				[
					'text'=>'Select Entry by Tag',
					'link'=>'view.php?action=Select&by=Tag',
					'mouseover'=>'Select Entry by Tag',
				],
				[
					'text'=>'Select Entry by AvailabilityStart',
					'link'=>'view.php?action=Select&by=AvailabilityStart',
					'mouseover'=>'Select Entry by Availability Start',
				],
				[
					'text'=>'Select Entry by AvailabilityEnd',
					'link'=>'view.php?action=Select&by=AvailabilityEnd',
					'mouseover'=>'Select Entry by Availability End',
				],
				[
					'text'=>'Select Entry by Level',
					'link'=>'view.php?action=Select&by=Level',
					'mouseover'=>'Select Entry by Level',
				],
			],
			[
				'text'=>'Cleanup Entries',
				'link'=>' ',
				'mouseover'=>'Cleanup Entries',
				[
					'text'=>'Get Cleanup DB MySQL',
					'link'=>'dbstatus.php?action=GetCleanupDBMySQL',
					'mouseover'=>'Add an Entry',
				],
			],
			[
				'text'=>'Detect Entry Errors',
				'link'=>' ',
				'mouseover'=>'Detect Entry Errors',
				[
					'text'=>'Entries',
					'link'=>' ',
					'mouseover'=>'Detect Entry Errors',
					[
						'text'=>'Entry Symmetry Check',
						'link'=>'dbstatus.php?action=EntrySymmetryCheck',
						'mouseover'=>'Check Entry Symmetry',
					],
					[
						'text'=>'Entry Code Length Check',
						'link'=>'dbstatus.php?action=DetectEntryCodeLength',
						'mouseover'=>'Check Entry Code Length',
					],
				],
				[
					'text'=>'TextBodies',
					'link'=>' ',
					'mouseover'=>'Detect TextBody Errors',
					[
						'text'=>'Detect Missing TextBodies',
						'link'=>'dbstatus.php?action=DetectMissingTextBodies',
						'mouseover'=>'Detect Missing TextBodies',
					],
				],
				[
					'text'=>'Descriptions',
					'link'=>' ',
					'mouseover'=>'Detect Description Errors',
					[
						'text'=>'Detect Missing Descriptions',
						'link'=>'dbstatus.php?action=DetectMissingDescriptions',
						'mouseover'=>'Detect Missing Descriptions',
					],
				],
				[
					'text'=>'Quotes',
					'link'=>' ',
					'mouseover'=>'Detect Quote Errors',
					[
						'text'=>'Detect Missing Quotes',
						'link'=>'dbstatus.php?action=DetectMissingQuotes',
						'mouseover'=>'Detect Missing Quotes',
					],
				],
				[
					'text'=>'Images',
					'link'=>' ',
					'mouseover'=>'Detect Image Errors',
					[
						'text'=>'Detect Blank Image Fields',
						'link'=>'dbstatus.php?action=DetectBlankImageFields',
						'mouseover'=>'Detect Blank Image Fields',
					],
					[
						'text'=>'Detect Missing Image Files',
						'link'=>'dbstatus.php?action=DetectMissingImageFiles',
						'mouseover'=>'Detect Missing Image Files',
					],
					[
						'text'=>'Detect Missing Images',
						'link'=>'dbstatus.php?action=DetectMissingImages',
						'mouseover'=>'Detect Missing Images',
					],
				],
				[
					'text'=>'Dates',
					'link'=>' ',
					'mouseover'=>'Detect Date Errors',
					[
						'text'=>'Detect Missing Dates',
						'link'=>'dbstatus.php?action=DetectMissingDates',
						'mouseover'=>'Detect Missing Dates',
					],
				],
				[
					'text'=>'Tags',
					'link'=>' ',
					'mouseover'=>'Detect Tag Errors',
					[
						'text'=>'Detect Missing Tags',
						'link'=>'dbstatus.php?action=DetectMissingTags',
						'mouseover'=>'Detect Missing Tags',
					],
				],
				[
					'text'=>'Associations',
					'link'=>' ',
					'mouseover'=>'Detect Association Errors',
					[
						'text'=>'Detect Missing Associations',
						'link'=>'dbstatus.php?action=DetectMissingAssociations',
						'mouseover'=>'Detect Missing Associations',
					],
				],
				[
					'text'=>'Links',
					'link'=>' ',
					'mouseover'=>'Detect Link Errors',
					[
						'text'=>'Detect White Space Chars in URL\'s',
						'link'=>'dbstatus.php?action=DetectWhiteSpaceURLs',
						'mouseover'=>'Check White Space Link Errors',
					],
					[
						'text'=>'Detect "*" Chars in Archive URL\'s',
						'link'=>'dbstatus.php?action=ArchiveURLDetect',
						'mouseover'=>'Check Archive Link Errors',
					],
					[
						'text'=>'Detect !"*" Chars in Archives URL\'s',
						'link'=>'dbstatus.php?action=ArchivesURLDetect',
						'mouseover'=>'Check Archives Link Errors',
					],
					[
						'text'=>'Detect " ~ " Sequences in URL\'s',
						'link'=>'dbstatus.php?action=CustomDelimitedDBSDetect',
						'mouseover'=>'Check Sequence Link Errors',
					],
					[
						'text'=>'Detect Deactivated Site Links in URL\'s',
						'link'=>'dbstatus.php?action=DeactivatedSiteDetect',
						'mouseover'=>'Detect Deactivated Site Links (myspace, yahoo, etc.)',
					],
					[
						'text'=>'Detect Copy/Paste Issues in URL\'s',
						'link'=>'dbstatus.php?action=CopyPasteIssuesURLsDetect',
						'mouseover'=>'Detect Copy/Paste Issues',
					],
					[
						'text'=>'Detect Missing Links',
						'link'=>'dbstatus.php?action=DetectMissingLinks',
						'mouseover'=>'Detect Missing Links',
					],
				],
			],
			[
				'text'=>'Fix Entry Errors',
				'link'=>' ',
				'mouseover'=>'Fix Entry Errors',
				[
					'text'=>'Entries',
					'link'=>' ',
					'mouseover'=>'Fix Entry Errors',
					[
						'text'=>'Detect and Fix Blank List Titles',
						'link'=>'dbstatus.php?action=DetectAndFixBlankListTitles',
						'mouseover'=>'Fix Entry Errors',
					],
					[
						'text'=>'Detect and Fix British Spellings',
						'link'=>'dbstatus.php?action=DetectAndFixBritishSpellings',
						'mouseover'=>'Fix British Spellings',
					],
				],
				[
					'text'=>'Images',
					'link'=>' ',
					'mouseover'=>'Fix Image Errors',
					[
						'text'=>'Fix Blank Image Fields',
						'link'=>'dbstatus.php?action=FixBlankImageFields',
						'mouseover'=>'Fix Blank Image Fields',
					],
					[
						'text'=>'Fix Missing Images',
						'link'=>'dbstatus.php?action=FixMissingImages',
						'mouseover'=>'Fix Missing Images',
					],
				],
			],
			[
				'text'=>'Modify Lists',
				'link'=>' ',
				'mouseover'=>'Modify Lists',
				[
					'text'=>'Create List',
					'link'=>'dbstatus.php?action=CreateList',
					'mouseover'=>'Create List',
				],
				[
					'text'=>'Import List',
					'link'=>'dbstatus.php?action=ImportList',
					'mouseover'=>'Import List',
				],
				[
					'text'=>'View All Lists',
					'link'=>'dbstatus.php?action=ViewAllLists',
					'mouseover'=>'View All List Names',
				],
				[
					'text'=>'View All Lists with Items',
					'link'=>'dbstatus.php?action=ViewAllListsAndItems',
					'mouseover'=>'View All Lists and Items',
				],
			],
		],
	];
		
				// Column #1, Tools : Secondary Header Args
			
			// -------------------------------------------------------------
	
	$header_secondary_panel01_args = [
		'title'=>'Entries',
		'image'=>'master-c/entries-icon.jpg',
		'divmouseover'=>'Toolage',
		'imagemouseover'=>'Toolage Imageryage!',
		'level'=>2,
		'divclass'=>'horizontal-center width-100percent border-bottom-1px background-color-gray13',
		'textclass'=>'margin-0px padding-0px vertical-center padding-top-14px',
		'imagedivclass'=>'background-color-gray10 margin-5px',
		'imageclass'=>'border-1px width-50px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
		'rightimageenable'=>1,
	];
		
				// Column #1, Tools : Display
			
			// -------------------------------------------------------------
	
	$divider->displaystart($divider_one_third_start_args);
	
	$divider->displaystart($divider_padding_special_start_args);
	
	$divider->displaystart($divider_frame_start_args);
	
	$header->display($header_secondary_panel01_args);
	
	$divider->displaystart($divider_case_start_args);
	
	$divider->displaystart($divider_padding_start_args);
	
	$hideable->display($entry_hideable_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
			// Display Column #2 : User Management
		
		// -------------------------------------------------------------
		
				// Column #2, Users : List Args
			
			// -------------------------------------------------------------
	
	$user_hideable_args = [
		'options'=>[
			'domainobject'=>$this->domain_object,
		],
		'list'=>[
			[
				'text'=>'User Management',
				'link'=>' ',
				'mouseover'=>'User Management',
				[
					'text'=>'View All Users',
					'link'=>'userstatus.php?action=ViewAllUsers',
					'mouseover'=>'View All Users',
				],
			],
			[
				'text'=>'Comments',
				'link'=>' ',
				'mouseover'=>'Comment System',
				[
					'text'=>'Review Pending Comments',
					'link'=>'userstatus.php?action=ReviewComments',
					'mouseover'=>'Review Pending Comments',
				],
				[
					'text'=>'Review Rejected Comments',
					'link'=>'userstatus.php?action=ReviewRejectedComments',
					'mouseover'=>'Review Rejected Comments',
				],
				[
					'text'=>'Review Accepted Comments',
					'link'=>'userstatus.php?action=ReviewAcceptedComments',
					'mouseover'=>'Review Accepted Comments',
				],
			],
			[
				'text'=>'Suggestions',
				'link'=>' ',
				'mouseover'=>'Suggestion System',
				[
					'text'=>'Review Pending Suggestions',
					'link'=>'userstatus.php?action=ReviewSuggestions',
					'mouseover'=>'Review Pending Suggestions',
				],
				[
					'text'=>'Review Rejected Suggestions',
					'link'=>'userstatus.php?action=ReviewRejectedSuggestions',
					'mouseover'=>'Review Rejected Suggestions',
				],
				[
					'text'=>'Review Accepted Suggestions',
					'link'=>'userstatus.php?action=ReviewAcceptedSuggestions',
					'mouseover'=>'Review Accepted Suggestions',
				],
			],
			[
				'text'=>'Site Statistics',
				'link'=>' ',
				'mouseover'=>'Site Statistics',
				[
					'text'=>'Page Statistics',
					'link'=>'userstatus.php?action=PageStatistics',
					'mouseover'=>'Page Statistics',
				],
			],
		],
	];
		
				// Column #1, Tools : Secondary Header Args
			
			// -------------------------------------------------------------
	
	$header_secondary_panel01_args = [
		'title'=>'Users',
		'image'=>'master-c/users-icon.jpg',
		'divmouseover'=>'Toolage',
		'imagemouseover'=>'Toolage Imageryage!',
		'level'=>2,
		'divclass'=>'horizontal-center width-100percent border-bottom-1px background-color-gray13',
		'textclass'=>'margin-0px padding-0px vertical-center padding-top-14px',
		'imagedivclass'=>'background-color-gray10 margin-5px',
		'imageclass'=>'border-1px width-50px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
		'rightimageenable'=>1,
	];
		
				// Column #1, Tools : Display
			
			// -------------------------------------------------------------
	
	$divider->displaystart($divider_one_third_start_args);
	
	$divider->displaystart($divider_padding_special_start_args);
	
	$divider->displaystart($divider_frame_start_args);
	
	$header->display($header_secondary_panel01_args);
	
	$divider->displaystart($divider_case_start_args);
	
	$divider->displaystart($divider_padding_start_args);
	
	$hideable->display($user_hideable_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
			// Display Column #2 : 3rd Party Management
		
		// -------------------------------------------------------------
		
				// Column #2, 3rd Party : List Args
			
			// -------------------------------------------------------------
	
	$user_hideable_args = [
		'options'=>[
			'domainobject'=>$this->domain_object,
		],
		'list'=>[
			[
				'text'=>'Primary Host Management',
				'link'=>' ',
				'mouseover'=>'Primary Host Management',
				[
					'text'=>'Clone Primary Host Database',
					'link'=>'dbstatus.php?action=ClonePrimaryHostDatabase',
					'mouseover'=>'Clone Primary Host Database',
				],
				[
					'text'=>'Update Primary Host Information',
					'link'=>$this->domain_object->GetPrimaryDomain([www=>1, lowercased=>1]) . '/modify.php?action=Edit',
					'mouseover'=>'Update Primary Host Information',
				],
				[
					'text'=>'View All Primary Hosts',
					'link'=>'dbstatus.php?action=ViewAllPrimaryHosts',
					'mouseover'=>'Clone Primary Host Database',
				],
				[
					'text'=>'View Primary Host Status',
					'link'=>'dbstatus.php?action=ViewPrimaryHostStatus',
					'mouseover'=>'View Primary Host Status',
				],
				[
					'text'=>'View Primary Host SEO Status',
					'link'=>'dbstatus.php?action=ViewPrimaryHostSEOStatus',
					'mouseover'=>'View All Primary Host SEO Status',
				],
				[
					'text'=>'Manage Primary Host Records',
					'link'=>'dbstatus.php?action=ManagePrimaryHostRecords',
					'mouseover'=>'Manage Primary Host Records',
				],
			],
			[
				'text'=>'Vendor Management',
				'link'=>' ',
				'mouseover'=>'Vendor Management',
				[
					'text'=>'View All Vendors',
					'link'=>'dbstatus.php?action=ViewAllVendors',
					'mouseover'=>'View All Vendors',
				],
				[
					'text'=>'Generate Search Engine Sitemap-Submission Links',
					'link'=>'dbstatus.php?action=GenerateSearchEngineSitemapSubmissionLinks',
					'mouseover'=>'Generate Search Engine Sitemap-Submission Links',
				],
			],
		],
	];
		
				// Column #1, 3rd Party : Secondary Header Args
			
			// -------------------------------------------------------------
	
	$header_secondary_panel01_args = [
		'title'=>'3rd Parties',
		'image'=>'tools-icon.jpg',
		'divmouseover'=>'Toolage',
		'imagemouseover'=>'Toolage Imageryage!',
		'level'=>2,
		'divclass'=>'horizontal-center width-100percent border-bottom-1px background-color-gray13',
		'textclass'=>'margin-0px padding-0px vertical-center padding-top-14px',
		'imagedivclass'=>'background-color-gray10 margin-5px',
		'imageclass'=>'border-1px width-50px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
		'rightimageenable'=>1,
	];
		
				// Column #1, 3rd Party : Display
			
			// -------------------------------------------------------------
	
	$divider->displaystart($divider_one_third_start_args);
	
	$divider->displaystart($divider_padding_special_start_args);
	
	$divider->displaystart($divider_frame_start_args);
	
	$header->display($header_secondary_panel01_args);
	
	$divider->displaystart($divider_case_start_args);
	
	$divider->displaystart($divider_padding_start_args);
	
	$hideable->display($user_hideable_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
			// Display Column #2 : System Testing
		
		// -------------------------------------------------------------
		
				// Column #2, System Testing : List Args
			
			// -------------------------------------------------------------
	
	$systems_hideable_args = [
		'options'=>[
			'domainobject'=>$this->domain_object,
		],
		'list'=>[
			[
				'text'=>'PHP Tests',
				'link'=>' ',
				'mouseover'=>'PHP Tests and Experiments',
				[
					'text'=>'Run PHPInfo()',
					'link'=>'systemstatus.php?action=PHPInfo',
					'mouseover'=>'Run and display the results of the \'phpinfo()\' function.',
				],
				[
					'text'=>'Run PHPCredits()',
					'link'=>'systemstatus.php?action=PHPCredits',
					'mouseover'=>'Run and display the results of the \'phpcredits()\' function.',
				],
				[
					'text'=>'Run PHPVersion()',
					'link'=>'systemstatus.php?action=PHPVersion',
					'mouseover'=>'Run and display the results of the \'phpversion()\' function.',
				],
				[
					'text'=>'Run PHP_UName()',
					'link'=>'systemstatus.php?action=PHPUname',
					'mouseover'=>'Run and display the results of the \'php_uname()\' function.',
				],
				[
					'text'=>'Run PHP_SAPI_Name()',
					'link'=>'systemstatus.php?action=PHPSapiName',
					'mouseover'=>'Run and display the results of the \'php_sapi_name()\' function.',
				],
				[
					'text'=>'Run PHP_INI_Scanned_Files()',
					'link'=>'systemstatus.php?action=PHPINIScannedFiles',
					'mouseover'=>'Run and display the results of the \'php_ini_scanned_files()\' function.',
				],
				[
					'text'=>'Run PHP_INI_Loaded_File()',
					'link'=>'systemstatus.php?action=PHPINILoadedFile',
					'mouseover'=>'Run and display the results of the \'php_ini_loaded_file()\' function.',
				],
				[
					'text'=>'Run Memory_Get_Usage()',
					'link'=>'systemstatus.php?action=MemoryGetUsage',
					'mouseover'=>'Run and display the results of the \'memory_get_usage()\' function.',
				],
				[
					'text'=>'Run Memory_Get_Peak_Usage()',
					'link'=>'systemstatus.php?action=MemoryGetPeakUsage',
					'mouseover'=>'Run and display the results of the \'memory_get_peak_usage()\' function.',
				],
				[
					'text'=>'Run INI_Get_All()',
					'link'=>'systemstatus.php?action=INIGetAll',
					'mouseover'=>'Run and display the results of the \'ini_get_all()\' function.',
				],
				[
					'text'=>'Run GetRUsage()',
					'link'=>'systemstatus.php?action=GetRUsage',
					'mouseover'=>'Run and display the results of the \'getrusage()\' function.',
				],
				[
					'text'=>'Run GetOpt()',
					'link'=>'systemstatus.php?action=GetOpt',
					'mouseover'=>'Run and display the results of the \'getopt()\' function.',
				],
				[
					'text'=>'Run Get_Magic_Quotes_Runtime()',
					'link'=>'systemstatus.php?action=GetMagicQuotesRuntime',
					'mouseover'=>'Run and display the results of the \'get_magic_quotes_runtime()\' function.',
				],
				[
					'text'=>'Run Get_Magic_Quotes_GPC()',
					'link'=>'systemstatus.php?action=GetMagicQuotesGPC',
					'mouseover'=>'Run and display the results of the \'get_magic_quotes_gpc()\' function.',
				],
				[
					'text'=>'Run Get_Include_Path()',
					'link'=>'systemstatus.php?action=GetIncludePath',
					'mouseover'=>'Run and display the results of the \'get_include_path()\' function.',
				],
				[
					'text'=>'Run Get_CFG_Var()',
					'link'=>'systemstatus.php?action=GetCFGVar',
					'mouseover'=>'Run and display the results of the \'get_cfg_var()\' function.',
				],
				[
					'text'=>'Run GC_Enabled()',
					'link'=>'systemstatus.php?action=GCEnabled',
					'mouseover'=>'Run and display the results of the \'gc_enabled()\' function.',
				],
			],
			[
				'text'=>'Server Tests',
				'link'=>' ',
				'mouseover'=>'Server Tests and Experiments',
				[
					'text'=>'Run Sys_Get_Temp_Dir()',
					'link'=>'systemstatus.php?action=SysGetTempDir',
					'mouseover'=>'Run and display the results of the \'sys_get_temp_dir()\' function.',
				],
				[
					'text'=>'Run GetMyUID()',
					'link'=>'systemstatus.php?action=GetMyUID',
					'mouseover'=>'Run and display the results of the \'get_my_uid()\' function.',
				],
				[
					'text'=>'Run GetMyInode()',
					'link'=>'systemstatus.php?action=GetMyInode',
					'mouseover'=>'Run and display the results of the \'getmyinode()\' function.',
				],
				[
					'text'=>'Run GetMyGid()',
					'link'=>'systemstatus.php?action=GetMyGid',
					'mouseover'=>'Run and display the results of the \'getmygid()\' function.',
				],
				[
					'text'=>'Run GetLastMod()',
					'link'=>'systemstatus.php?action=GetLastMod',
					'mouseover'=>'Run and display the results of the \'getlastmod()\' function.',
				],
				[
					'text'=>'Run Get_Current_User()',
					'link'=>'systemstatus.php?action=GetCurrentUser',
					'mouseover'=>'Run and display the results of the \'get_current_user()\' function.',
				],
				[
					'text'=>'Run CLI_Get_Process_Title()',
					'link'=>'systemstatus.php?action=CLIGetProcessTitle',
					'mouseover'=>'Run and display the results of the \'cli_get_process_title()\' function.',
				],
				[
					'text'=>'Run GetAllHeaders()',
					'link'=>'systemstatus.php?action=GetAllHeaders',
					'mouseover'=>'Run and display the results of the \'get_all_headers()\' function.',
				],
				[
					'text'=>'Run Apache_Response_Headers()',
					'link'=>'systemstatus.php?action=ApacheResponseHeaders',
					'mouseover'=>'Run and display the results of the \'apache_response_headers()\' function.',
				],
				[
					'text'=>'Run Apache_Request_Headers()',
					'link'=>'systemstatus.php?action=ApacheRequestHeaders',
					'mouseover'=>'Run and display the results of the \'apache_request_headers()\' function.',
				],
				[
					'text'=>'Run Apache_Lookup_URI()',
					'link'=>'systemstatus.php?action=ApacheLookupURI',
					'mouseover'=>'Run and display the results of the \'apache_lookup_uri()\' function.',
				],
				[
					'text'=>'Run Apache_GetEnv()',
					'link'=>'systemstatus.php?action=ApacheGetEnv',
					'mouseover'=>'Run and display the results of the \'apache_getenv()\' function.',
				],
				[
					'text'=>'Run Apache_Get_Version()',
					'link'=>'systemstatus.php?action=ApacheGetVersion',
					'mouseover'=>'Run and display the results of the \'apache_get_version()\' function.',
				],
				[
					'text'=>'Run Apache_Get_Modules()',
					'link'=>'systemstatus.php?action=ApacheGetModules',
					'mouseover'=>'Run and display the results of the \'apache_get_modules()\' function.',
				],
			],
			[
				'text'=>'Networking Tests',
				'link'=>' ',
				'mouseover'=>'Networking Tests and Experiments',
				[
					'text'=>'Run INet_PTon()',
					'link'=>'systemstatus.php?action=INetPTon',
					'mouseover'=>'Run and display the results of the \'inet_pton()\' function.',
				],
				[
					'text'=>'Run INet_NTop()',
					'link'=>'systemstatus.php?action=INetNTop',
					'mouseover'=>'Run and display the results of the \'inet_ntop()\' function.',
				],
				[
					'text'=>'Run IP2Long()',
					'link'=>'systemstatus.php?action=IP2Long',
					'mouseover'=>'Run and display the results of the \'ip2long()\' function.',
				],
				[
					'text'=>'Run Long2IP()',
					'link'=>'systemstatus.php?action=Long2IP',
					'mouseover'=>'Run and display the results of the \'long2ip()\' function.',
				],
				[
					'text'=>'Run HTTP_Response_Code()',
					'link'=>'systemstatus.php?action=HTTPResponseCode',
					'mouseover'=>'Run and display the results of the \'http_response_code()\' function.',
				],
				[
					'text'=>'Run Headers_Sent()',
					'link'=>'systemstatus.php?action=HeadersSent',
					'mouseover'=>'Run and display the results of the \'headers_sent()\' function.',
				],
				[
					'text'=>'Run Headers_List()',
					'link'=>'systemstatus.php?action=HeadersList',
					'mouseover'=>'Run and display the results of the \'headers_list()\' function.',
				],
				[
					'text'=>'Run GetServByPort()',
					'link'=>'systemstatus.php?action=GetServByPort',
					'mouseover'=>'Run and display the results of the \'getservbyport()\' function.',
				],
				[
					'text'=>'Run GetServByName()',
					'link'=>'systemstatus.php?action=GetServByName',
					'mouseover'=>'Run and display the results of the \'getservbyname()\' function.',
				],
				[
					'text'=>'Run GetProtoByNumber()',
					'link'=>'systemstatus.php?action=GetProtoByNumber',
					'mouseover'=>'Run and display the results of the \'getprotobynumber()\' function.',
				],
				[
					'text'=>'Run GetProtoByName()',
					'link'=>'systemstatus.php?action=GetProtoByName',
					'mouseover'=>'Run and display the results of the \'getprotobyname()\' function.',
				],
				[
					'text'=>'Run GetMXRR()',
					'link'=>'systemstatus.php?action=GetMXRR',
					'mouseover'=>'Run and display the results of the \'getmxrr()\' function.',
				],
				[
					'text'=>'Run GetHostName()',
					'link'=>'systemstatus.php?action=GetHostName',
					'mouseover'=>'Run and display the results of the \'gethostname()\' function.',
				],
				[
					'text'=>'Run GetHostByNameL()',
					'link'=>'systemstatus.php?action=GetHostByNameL',
					'mouseover'=>'Run and display the results of the \'gethostbynamel()\' function.',
				],
				[
					'text'=>'Run GetHostByName()',
					'link'=>'systemstatus.php?action=GetHostByName',
					'mouseover'=>'Run and display the results of the \'gethostbyname()\' function.',
				],
				[
					'text'=>'Run GetHostByAddr()',
					'link'=>'systemstatus.php?action=GetHostByAddr',
					'mouseover'=>'Run and display the results of the \'gethostbyaddr()\' function.',
				],
				[
					'text'=>'Run DNS_Get_Record()',
					'link'=>'systemstatus.php?action=DNSGetRecord',
					'mouseover'=>'Run and display the results of the \'dns_get_record()\' function.',
				],
				[
					'text'=>'Run CheckDNSRR()',
					'link'=>'systemstatus.php?action=CheckDNSRR',
					'mouseover'=>'Run and display the results of the \'checkdnsrr()\' function.',
				],
			],
			[
				'text'=>'Programming Tests',
				'link'=>' ',
				'mouseover'=>'Programming Tests and Experiments',
				[
					'text'=>'View $_COOKIE',
					'link'=>'systemstatus.php?action=ViewCookieVariable',
					'mouseover'=>'Run and display the results of the print_r($_COOKIE) function.',
				],
				[
					'text'=>'View $_SERVER',
					'link'=>'systemstatus.php?action=ViewServerVariable',
					'mouseover'=>'Run and display the results of the print_r($_SERVER) function.',
				],
				[
					'text'=>'View $_POST',
					'link'=>'systemstatus.php?action=ViewPostVariable',
					'mouseover'=>'Run and display the results of the print_r($_POST) function.',
				],
				[
					'text'=>'View $_GET',
					'link'=>'systemstatus.php?action=ViewGetVariable',
					'mouseover'=>'Run and display the results of the print_r($_GET) function.',
				],
				[
					'text'=>'Run Extension_Loaded()',
					'link'=>'systemstatus.php?action=ExtensionLoaded',
					'mouseover'=>'Run and display the results of the \'extension_loaded()\' function.',
				],
				[
					'text'=>'Run Assert_Options()',
					'link'=>'systemstatus.php?action=AssertOptions',
					'mouseover'=>'Run and display the results of the \'assert_options()\' function.',
				],
				[
					'text'=>'Run Get_Extension_Funcs()',
					'link'=>'systemstatus.php?action=GetExtensionFuncs',
					'mouseover'=>'Run and display the results of the \'get_extension_funcs()\' function.',
				],
				[
					'text'=>'Run Get_Defined_Constants()',
					'link'=>'systemstatus.php?action=GetDefinedConstants',
					'mouseover'=>'Run and display the results of the \'get_defined_constants()\' function.',
				],
				[
					'text'=>'Run Get_Required_Files()',
					'link'=>'systemstatus.php?action=GetRequiredFiles',
					'mouseover'=>'Run and display the results of the \'get_required_files()\' function.',
				],
				[
					'text'=>'Run Get_Loaded_Extensions()',
					'link'=>'systemstatus.php?action=GetLoadedExtensions',
					'mouseover'=>'Run and display the results of the \'get_loaded_extensions()\' function.',
				],
				[
					'text'=>'Run Get_Included_Files()',
					'link'=>'systemstatus.php?action=GetIncludedFiles',
					'mouseover'=>'Run and display the results of the \'get_included_files()\' function.',
				],
				[
					'text'=>'Run Trait_Exists()',
					'link'=>'systemstatus.php?action=TraitExists',
					'mouseover'=>'Run and display the results of the \'trait_exists()\' function.',
				],
				[
					'text'=>'Run Property_Exists()',
					'link'=>'systemstatus.php?action=PropertyExists',
					'mouseover'=>'Run and display the results of the \'property_exists()\' function.',
				],
				[
					'text'=>'Run Method_Exists()',
					'link'=>'systemstatus.php?action=MethodExists',
					'mouseover'=>'Run and display the results of the \'method_exists()\' function.',
				],
				[
					'text'=>'Run Is_Subclass_Of()',
					'link'=>'systemstatus.php?action=IsSubclassOf',
					'mouseover'=>'Run and display the results of the \'is_subclass_of()\' function.',
				],
				[
					'text'=>'Run Interface_Exists()',
					'link'=>'systemstatus.php?action=InterfaceExists',
					'mouseover'=>'Run and display the results of the \'interface_exists()\' function.',
				],
				[
					'text'=>'Run Get_Parent_Class()',
					'link'=>'systemstatus.php?action=GetParentClass',
					'mouseover'=>'Run and display the results of the \'get_parent_class()\' function.',
				],
				[
					'text'=>'Run Get_Declared_Traits()',
					'link'=>'systemstatus.php?action=GetDeclaredTraits',
					'mouseover'=>'Run and display the results of the \'get_declared_traits()\' function.',
				],
				[
					'text'=>'Run Get_Declared_Interfaces()',
					'link'=>'systemstatus.php?action=GetDeclaredInterfaces',
					'mouseover'=>'Run and display the results of the \'get_declared_interfaces()\' function.',
				],
				[
					'text'=>'Run Get_Declared_Classes()',
					'link'=>'systemstatus.php?action=GetDeclaredClasses',
					'mouseover'=>'Run and display the results of the \'get_declared_classes()\' function.',
				],
				[
					'text'=>'Run Get_Class_Vars()',
					'link'=>'systemstatus.php?action=GetClassVars',
					'mouseover'=>'Run and display the results of the \'get_class_vars()\' function.',
				],
				[
					'text'=>'Run Get_Class_Methods()',
					'link'=>'systemstatus.php?action=GetClassMethods',
					'mouseover'=>'Run and display the results of the \'get_class_methods()\' function.',
				],
				[
					'text'=>'Run Get_Called_Class()',
					'link'=>'systemstatus.php?action=GetCalledClass',
					'mouseover'=>'Run and display the results of the \'get_called_class()\' function.',
				],
				[
					'text'=>'Run Class_Exists()',
					'link'=>'systemstatus.php?action=ClassExists',
					'mouseover'=>'Run and display the results of the \'class_exists()\' function.',
				],
				[
					'text'=>'Run Get_Defined_Functions()',
					'link'=>'systemstatus.php?action=GetDefinedFunctions',
					'mouseover'=>'Run and display the results of the \'get_defined_functions()\' function.',
				],
				[
					'text'=>'Run Function_Exists()',
					'link'=>'systemstatus.php?action=FunctionExists',
					'mouseover'=>'Run and display the results of the \'function_exists()\' function.',
				],
				[
					'text'=>'Run Func_Num_Args()',
					'link'=>'systemstatus.php?action=FuncNumArgs',
					'mouseover'=>'Run and display the results of the \'func_num_args()\' function.',
				],
				[
					'text'=>'Run Func_Get_Args()',
					'link'=>'systemstatus.php?action=FuncGetArgs',
					'mouseover'=>'Run and display the results of the \'func_get_args()\' function.',
				],
				[
					'text'=>'Run Is_String()',
					'link'=>'systemstatus.php?action=IsString',
					'mouseover'=>'Run and display the results of the \'is_string()\' function.',
				],
				[
					'text'=>'Run Is_Scalar()',
					'link'=>'systemstatus.php?action=IsScalar',
					'mouseover'=>'Run and display the results of the \'is_scalar()\' function.',
				],
				[
					'text'=>'Run Is_Resource()',
					'link'=>'systemstatus.php?action=IsResource',
					'mouseover'=>'Run and display the results of the \'is_resource()\' function.',
				],
				[
					'text'=>'Run Is_Object()',
					'link'=>'systemstatus.php?action=IsObject',
					'mouseover'=>'Run and display the results of the \'is_object()\' function.',
				],
				[
					'text'=>'Run Is_Numeric()',
					'link'=>'systemstatus.php?action=IsNumeric',
					'mouseover'=>'Run and display the results of the \'is_numeric()\' function.',
				],
				[
					'text'=>'Run Is_Null()',
					'link'=>'systemstatus.php?action=IsNull',
					'mouseover'=>'Run and display the results of the \'is_null()\' function.',
				],
				[
					'text'=>'Run Is_Long()',
					'link'=>'systemstatus.php?action=IsLong',
					'mouseover'=>'Run and display the results of the \'is_long()\' function.',
				],
				[
					'text'=>'Run Is_Float()',
					'link'=>'systemstatus.php?action=IsFloat',
					'mouseover'=>'Run and display the results of the \'is_float()\' function.',
				],
				[
					'text'=>'Run Is_Double()',
					'link'=>'systemstatus.php?action=IsDouble',
					'mouseover'=>'Run and display the results of the \'is_double()\' function.',
				],
				[
					'text'=>'Run Is_Callable()',
					'link'=>'systemstatus.php?action=IsCallable',
					'mouseover'=>'Run and display the results of the \'is_callable()\' function.',
				],
				[
					'text'=>'Run Is_Bool()',
					'link'=>'systemstatus.php?action=IsBool',
					'mouseover'=>'Run and display the results of the \'is_bool()\' function.',
				],
				[
					'text'=>'Run Is_Array()',
					'link'=>'systemstatus.php?action=IsArray',
					'mouseover'=>'Run and display the results of the \'is_array()\' function.',
				],
				[
					'text'=>'Run IntVal()',
					'link'=>'systemstatus.php?action=IntVal',
					'mouseover'=>'Run and display the results of the \'intval()\' function.',
				],
				[
					'text'=>'Run GetType()',
					'link'=>'systemstatus.php?action=GetType',
					'mouseover'=>'Run and display the results of the \'gettype()\' function.',
				],
				[
					'text'=>'Run Get_Resource_Type()',
					'link'=>'systemstatus.php?action=GetResourceType',
					'mouseover'=>'Run and display the results of the \'get_resource_type()\' function.',
				],
				[
					'text'=>'Run Get_Defined_Vars()',
					'link'=>'systemstatus.php?action=GetDefinedVars',
					'mouseover'=>'Run and display the results of the \'get_defined_vars()\' function.',
				],
				[
					'text'=>'Run FloatVal()',
					'link'=>'systemstatus.php?action=FloatVal',
					'mouseover'=>'Run and display the results of the \'floatval()\' function.',
				],
				[
					'text'=>'Run Empty()',
					'link'=>'systemstatus.php?action=EmptyFunc',
					'mouseover'=>'Run and display the results of the \'empty()\' function.',
				],
				[
					'text'=>'Run BoolVal()',
					'link'=>'systemstatus.php?action=BoolVal',
					'mouseover'=>'Run and display the results of the \'boolval()\' function.',
				],
			],
			[
				'text'=>'Cryptography Tests',
				'link'=>' ',
				'mouseover'=>'Cryptography Tests and Experiments',
				[
					'text'=>'Hash Extension',
					'link'=>' ',
					'mouseover'=>'Hash-Extension Cryptography Tests and Experiments',
					[
						'text'=>'Hash_Algos()',
						'link'=>'systemstatus.php?action=HashAlgos',
						'mouseover'=>'Run and display the results of the \'hash_algos()\' function.',
					],
					[
						'text'=>'Hash()',
						'link'=>'systemstatus.php?action=Hash',
						'mouseover'=>'Run and display the results of the \'hash()\' function.',
					],
					[
						'text'=>'Hash_File()',
						'link'=>'systemstatus.php?action=HashFile',
						'mouseover'=>'Run and display the results of the \'hash_file()\' function.',
					],
				],
				[
					'text'=>'MHash Extension',
					'link'=>' ',
					'mouseover'=>'MHash-Extension Cryptography Tests and Experiments',
					[
						'text'=>'MHash_Count()',
						'link'=>'systemstatus.php?action=MHashCount',
						'mouseover'=>'Run and display the results of the \'mhash_count()\' function.',
					],
					[
						'text'=>'MHash_Get_Block_Size()',
						'link'=>'systemstatus.php?action=MHashGetBlockSize',
						'mouseover'=>'Run and display the results of the \'mhash_get_block_size()\' function.',
					],
					[
						'text'=>'MHash_Get_Hash_Name()',
						'link'=>'systemstatus.php?action=MHashGetHashName',
						'mouseover'=>'Run and display the results of the \'mhash_get_hash_name()\' function.',
					],
					[
						'text'=>'MHash()',
						'link'=>'systemstatus.php?action=MHash',
						'mouseover'=>'Run and display the results of the \'mhash()\' function.',
					],
				],
				[
					'text'=>'MCrypt Extension',
					'link'=>' ',
					'mouseover'=>'MCrypt-Extension Cryptography Tests and Experiments',
					[		// BT: Implement me!
						'text'=>'MCrypt_Create_IV()',
						'link'=>'systemstatus.php?action=MCryptCreateIV',
						'mouseover'=>'Run and display the results of the \'mcrypt_create_iv()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Decrypt()',
						'link'=>'systemstatus.php?action=MCryptDecrypt',
						'mouseover'=>'Run and display the results of the \'mcrypt_decrypt()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_ECB()',
						'link'=>'systemstatus.php?action=MCryptECB',
						'mouseover'=>'Run and display the results of the \'mcrypt_ecb()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Enc_Get_Algorithms_Name()',
						'link'=>'systemstatus.php?action=MCryptEncGetAlgorithmsName',
						'mouseover'=>'Run and display the results of the \'mcrypt_enc_get_algorithms_name()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Enc_Get_Block_Size()',
						'link'=>'systemstatus.php?action=MCryptEncGetBlockSize',
						'mouseover'=>'Run and display the results of the \'mcrypt_enc_get_block_size()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Enc_Get_IV_Size()',
						'link'=>'systemstatus.php?action=MCryptEncGetIVSize',
						'mouseover'=>'Run and display the results of the \'mcrypt_enc_get_iv_size()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Enc_Get_Key_Size()',
						'link'=>'systemstatus.php?action=MCryptEncGetKeySize',
						'mouseover'=>'Run and display the results of the \'mcrypt_enc_get_key_size()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Enc_Get_Modes_Name()',
						'link'=>'systemstatus.php?action=MCryptEncGetModesName',
						'mouseover'=>'Run and display the results of the \'mcrypt_enc_get_modes_name()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Enc_Get_Supported_Key_Sizes()',
						'link'=>'systemstatus.php?action=MCryptEncGetSupportedKeySizes',
						'mouseover'=>'Run and display the results of the \'mcrypt_enc_get_supported_key_sizes()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Enc_Is_Block_Algorithm_Mode()',
						'link'=>'systemstatus.php?action=MCryptEncIsBlockAlgorithmMode',
						'mouseover'=>'Run and display the results of the \'mcrypt_enc_is_block_algorithm_mode()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Enc_Is_Block_Algorithm()',
						'link'=>'systemstatus.php?action=MCryptEncIsBlockAlgorithm',
						'mouseover'=>'Run and display the results of the \'mcrypt_enc_is_block_algorithm()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Enc_Is_Block_Mode()',
						'link'=>'systemstatus.php?action=MCryptEncIsBlockMode',
						'mouseover'=>'Run and display the results of the \'mcrypt_enc_is_block_mode()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Enc_Self_Test()',
						'link'=>'systemstatus.php?action=MCryptEncSelfTest',
						'mouseover'=>'Run and display the results of the \'mcrypt_enc_self_test()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Encrypt()',
						'link'=>'systemstatus.php?action=MCryptEncrypt',
						'mouseover'=>'Run and display the results of the \'mcrypt_encrypt()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Generic()',
						'link'=>'systemstatus.php?action=MCryptGeneric',
						'mouseover'=>'Run and display the results of the \'mycrypt_generic()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Get_Block_Size()',
						'link'=>'systemstatus.php?action=MCryptGetBlockSize',
						'mouseover'=>'Run and display the results of the \'mycrypt_get_block_size()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Get_Cipher_Name()',
						'link'=>'systemstatus.php?action=MCryptGetCipherName',
						'mouseover'=>'Run and display the results of the \'mycrypt_get_cipher_name()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Get_IV_Size()',
						'link'=>'systemstatus.php?action=MCryptGetIVSize',
						'mouseover'=>'Run and display the results of the \'mycrypt_get_iv_size()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Get_Key_Size()',
						'link'=>'systemstatus.php?action=MCryptGetKeySize',
						'mouseover'=>'Run and display the results of the \'mycrypt_get_key_size()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_List_Algorithms()',
						'link'=>'systemstatus.php?action=MCryptListAlgorithms',
						'mouseover'=>'Run and display the results of the \'mycrypt_list_algorithms()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_List_Modes()',
						'link'=>'systemstatus.php?action=MCryptListModes',
						'mouseover'=>'Run and display the results of the \'mycrypt_list_modes()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Module_Get_Algo_Block_Size()',
						'link'=>'systemstatus.php?action=MCryptModuleGetAlgoBlockSize',
						'mouseover'=>'Run and display the results of the \'mycrypt_module_get_algo_block_size()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Module_Get_Algo_Key_Size()',
						'link'=>'systemstatus.php?action=MCryptModuleGetAlgoKeySize',
						'mouseover'=>'Run and display the results of the \'mycrypt_module_get_algo_key_size()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Module_Get_Supported_Key_Sizes()',
						'link'=>'systemstatus.php?action=MCryptModuleGetSupportedKeySizes',
						'mouseover'=>'Run and display the results of the \'mycrypt_module_get_supported_key_sizes()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Module_Is_Block_Algorithm_Mode()',
						'link'=>'systemstatus.php?action=MCryptModuleIsBlockAlgorithmMode',
						'mouseover'=>'Run and display the results of the \'mycrypt_module_is_block_algorithm_mode()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Module_Is_Block_Algorithm()',
						'link'=>'systemstatus.php?action=MCryptModuleIsBlockAlgorithm',
						'mouseover'=>'Run and display the results of the \'mycrypt_module_is_block_algorithm()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Module_Is_Block_Mode()',
						'link'=>'systemstatus.php?action=MCryptModuleIsBlockMode',
						'mouseover'=>'Run and display the results of the \'mycrypt_module_is_block_mode()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Module_Open()',
						'link'=>'systemstatus.php?action=MCryptModuleOpen',
						'mouseover'=>'Run and display the results of the \'mycrypt_module_open()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MCrypt_Module_Self_Test()',
						'link'=>'systemstatus.php?action=MCryptModuleSelfTest',
						'mouseover'=>'Run and display the results of the \'mycrypt_module_self_test()\' function.',
					],
					[		// BT: Implement me!
						'text'=>'MDecrypt_Generic()',
						'link'=>'systemstatus.php?action=MDecryptGeneric',
						'mouseover'=>'Run and display the results of the \'mdecrypt_generic()\' function.',
					],
				],
				[
					'text'=>'CSPRNG Extension',
					'link'=>' ',
					'mouseover'=>'CSPRNG-Extension Cryptography Tests and Experiments',
					[
						'text'=>'Random_Bytes()',
						'link'=>'systemstatus.php?action=RandomBytes',
						'mouseover'=>'Run and display the results of the \'random_bytes()\' function.',
					],
					[
						'text'=>'Random_Int()',
						'link'=>'systemstatus.php?action=RandomInt',
						'mouseover'=>'Run and display the results of the \'random_int()\' function.',
					],
				],
			],
			[
				'text'=>'BCE Tests',
				'link'=>' ',
				'mouseover'=>'BCE Tests and Experiments',
				[
					'text'=>'Show Master Variables',
					'link'=>'systemstatus.php?action=ShowMasterVariables',
					'mouseover'=>'Shows the master variables.',
				],
				[
					'text'=>'Base::ConvertBase()',
					'link'=>'systemstatus.php?action=BaseConvertBase',
					'mouseover'=>'Run and display the results of the \'ConvertBase()\' function.',
				],
				[
					'text'=>'Binary::IncrementBinaryValue()',
					'link'=>'systemstatus.php?action=BinaryIncrementBinaryValue',
					'mouseover'=>'Run and display the results of the \'IncrementBinaryValue()\' function.',
				],
				[
					'text'=>'Binary::DecrementBinaryValue()',
					'link'=>'systemstatus.php?action=BinaryDecrementBinaryValue',
					'mouseover'=>'Run and display the results of the \'DecrementBinaryValue()\' function.',
				],
			],
		],
	];
		
				// Column #2, System Testing : Secondary Header Args
			
			// -------------------------------------------------------------
	
	$header_secondary_panel02_args = [
		'title'=>'Systems',
		'image'=>'diagnostics-icon.jpg',
		'divmouseover'=>'diag',
		'imagemouseover'=>'diag-yo mousevoer!',
		'level'=>2,
		'divclass'=>'horizontal-center width-100percent border-bottom-1px background-color-gray13',
		'textclass'=>'margin-0px padding-0px vertical-center padding-top-14px',
		'imagedivclass'=>'background-color-gray10 margin-5px',
		'imageclass'=>'border-1px width-50px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
		'rightimageenable'=>1,
	];
		
				// Column #2, System Testing : Display
			
			// -------------------------------------------------------------
	
	$divider->displaystart($divider_one_third_start_args);
	
	$divider->displaystart($divider_padding_special_start_args);
	
	$divider->displaystart($divider_frame_start_args);
	
	$header->display($header_secondary_panel02_args);
	
	$divider->displaystart($divider_case_start_args);
	
	$divider->displaystart($divider_padding_start_args);
	
	$hideable->display($systems_hideable_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
			// Display Column #3 : DB
		
		// -------------------------------------------------------------
		
				// Column #3, DB : List Args
			
			// -------------------------------------------------------------

	$db_hideable_args = [
		'options'=>[
			'domainobject'=>$this->domain_object,
		],
	'list'=>[
			[
				'text'=>'BCE Database Tools',
				'link'=>' ',
				'mouseover'=>'BCE Database Tools',
				[
					'text'=>'Dump Tables',
					'link'=>'dbstatus.php?action=DumpTables',
					'mouseover'=>'Dump Selected Table(s) Records',
				],
				[
					'text'=>'Show Tables List (Names)',
					'link'=>'dbstatus.php?action=ShowTablesListNames',
					'mouseover'=>'View Raw Table Data',
				],
				[
					'text'=>'Show Tables List (Schemas)',
					'link'=>'dbstatus.php?action=ShowTablesListSchemas',
					'mouseover'=>'View Raw Table Data',
				],
				[
					'text'=>'View MySQL Equivalent of DB',
					'link'=>'dbstatus.php?action=MySQLDBEquivalent',
					'mouseover'=>'Generate MySQL Equivalent of Current DB Schema',
				],
			],
			[
				'text'=>'MySQL Information Functions',
				'link'=>' ',
				'mouseover'=>'MySQL STATUS Tables',
				[
					'text'=>'View MySQL Databases',
					'link'=>'dbstatus.php?action=ViewMySQLDatabases',
					'mouseover'=>'View MySQL Databases',
				],
				[
					'text'=>'View MySQL INFORMATION_SCHEMA Tables',
					'link'=>'dbstatus.php?action=ViewMySQLInformationSchemaTables',
					'mouseover'=>'View MySQL INFORMATION_SCHEMA Tables',
				],
				[
					'text'=>'View MySQL Character Sets Table',
					'link'=>'dbstatus.php?action=ViewMySQLCharacterSetsTable',
					'mouseover'=>'View MySQL Character Sets Table',
				],
				[
					'text'=>'View MySQL Collations Table',
					'link'=>'dbstatus.php?action=ViewMySQLCollationsTable',
					'mouseover'=>'View MySQL Collations Table',
				],
				[
					'text'=>'View MySQL Collation Character Set Applicability Table',
					'link'=>'dbstatus.php?action=ViewMySQLCollationCharacterSetApplicabilityTable',
					'mouseover'=>'View MySQL Collation Character Set Applicability Table',
				],
				[
					'text'=>'View MySQL Columns Table',
					'link'=>'dbstatus.php?action=ViewMySQLColumnsTable',
					'mouseover'=>'View MySQL Columns Table',
				],
				[
					'text'=>'View MySQL Column Privileges Table',
					'link'=>'dbstatus.php?action=ViewMySQLColumnPrivilegesTable',
					'mouseover'=>'View MySQL Column Privileges Table',
				],
				[
					'text'=>'View MySQL Engines Table',
					'link'=>'dbstatus.php?action=ViewMySQLEnginesTable',
					'mouseover'=>'View MySQL Engines Table',
				],
				[
					'text'=>'View MySQL Events Table',
					'link'=>'dbstatus.php?action=ViewMySQLEventsTable',
					'mouseover'=>'View MySQL Events Table',
				],
				[
					'text'=>'View MySQL Files Table',
					'link'=>'dbstatus.php?action=ViewMySQLFilesTable',
					'mouseover'=>'View MySQL Files Table',
				],
				[
					'text'=>'View MySQL Status Table',
					'link'=>'dbstatus.php?action=ViewMySQLStatusTable',
					'mouseover'=>'View MySQL Status Table',
				],
				[
					'text'=>'View MySQL Session Status Table',
					'link'=>'dbstatus.php?action=ViewMySQLSessionStatusTable',
					'mouseover'=>'View MySQL Session Status Table',
				],
				[
					'text'=>'View MySQL Global Status Table',
					'link'=>'dbstatus.php?action=ViewMySQLGlobalStatusTable',
					'mouseover'=>'View MySQL Global Status Table',
				],
				[
					'text'=>'View MySQL Global Variables Table',
					'link'=>'dbstatus.php?action=ViewMySQLGlobalVariablesTable',
					'mouseover'=>'View MySQL Global Variables Table',
				],
				[
					'text'=>'View MySQL Optimizer Trace Table',
					'link'=>'dbstatus.php?action=ViewMySQLOptimizerTraceTable',
					'mouseover'=>'View MySQL Optimizer Trace Table',
				],
				[
					'text'=>'View MySQL Session Variables Table',
					'link'=>'dbstatus.php?action=ViewMySQLSessionVariablesTable',
					'mouseover'=>'View MySQL Session Variables Table',
				],
				[
					'text'=>'View MySQL Key Column Usage Table',
					'link'=>'dbstatus.php?action=ViewMySQLKeyColumnUsageTable',
					'mouseover'=>'View MySQL Key Column Usage Table',
				],
				[
					'text'=>'View MySQL Parameters Table',
					'link'=>'dbstatus.php?action=ViewMySQLParametersTable',
					'mouseover'=>'View MySQL Parameters Table',
				],
				[
					'text'=>'View MySQL Partitions Table',
					'link'=>'dbstatus.php?action=ViewMySQLPartitionsTable',
					'mouseover'=>'View MySQL Parameters Table',
				],
				[
					'text'=>'View MySQL Plugins Table',
					'link'=>'dbstatus.php?action=ViewMySQLPluginsTable',
					'mouseover'=>'View MySQL Plugins Table',
				],
				[
					'text'=>'View MySQL Process List Table',
					'link'=>'dbstatus.php?action=ViewMySQLProcessListTable',
					'mouseover'=>'View MySQL Process List Table',
				],
				[
					'text'=>'View MySQL Profiling Table',
					'link'=>'dbstatus.php?action=ViewMySQLProfilingTable',
					'mouseover'=>'View MySQL Profiling Table',
				],
				[
					'text'=>'View MySQL Referential Constraints Table',
					'link'=>'dbstatus.php?action=ViewMySQLReferentialConstraintsTable',
					'mouseover'=>'View MySQL Referential Constraints Table',
				],
				[
					'text'=>'View MySQL Routines Table',
					'link'=>'dbstatus.php?action=ViewMySQLRoutinesTable',
					'mouseover'=>'View MySQL Routines Table',
				],
				[
					'text'=>'View MySQL Schema Privileges Table',
					'link'=>'dbstatus.php?action=ViewMySQLSchemaPrivilegesTable',
					'mouseover'=>'View MySQL Schema Privileges Table',
				],
				[
					'text'=>'View MySQL Schemata',
					'link'=>'dbstatus.php?action=ViewMySQLSchemataTable',
					'mouseover'=>'View MySQL Schemata Table',
				],
				[
					'text'=>'View MySQL Statistics Table',
					'link'=>'dbstatus.php?action=ViewMySQLStatisticsTable',
					'mouseover'=>'View MySQL Schema Statistics Table',
				],
				[
					'text'=>'View MySQL Tables Table',
					'link'=>'dbstatus.php?action=ViewMySQLTablesTable',
					'mouseover'=>'View MySQL Schema Tables Table',
				],
				[
					'text'=>'View MySQL Table Spaces Table',
					'link'=>'dbstatus.php?action=ViewMySQLTableSpacesTable',
					'mouseover'=>'View MySQL Schema TableSpaces Table',
				],
				[
					'text'=>'View MySQL Table Constraints Table',
					'link'=>'dbstatus.php?action=ViewMySQLTableConstraintsTable',
					'mouseover'=>'View MySQL Schema Table Constraints Table',
				],
				[
					'text'=>'View MySQL Table Privileges Table',
					'link'=>'dbstatus.php?action=ViewMySQLTablePrivilegesTable',
					'mouseover'=>'View MySQL Schema Table Privileges Table',
				],
				[
					'text'=>'View MySQL Triggers Table',
					'link'=>'dbstatus.php?action=ViewMySQLTriggersTable',
					'mouseover'=>'View MySQL Schema Triggers Table',
				],
				[
					'text'=>'View MySQL User Privileges Table',
					'link'=>'dbstatus.php?action=ViewMySQLUserPrivilegesTable',
					'mouseover'=>'View MySQL User Privileges Table',
				],
				[
					'text'=>'View MySQL Views Table',
					'link'=>'dbstatus.php?action=ViewMySQLViewsTable',
					'mouseover'=>'View MySQL Views Table',
				],
				[
					'text'=>'View MySQL Function Status Table',
					'link'=>'dbstatus.php?action=ViewMySQLFunctionStatusTable',
					'mouseover'=>'View MySQL Function Status Table',
				],
				[
					'text'=>'View MySQL Collation Table',
					'link'=>'dbstatus.php?action=ViewMySQLCollationTable',
					'mouseover'=>'View MySQL Collation Table',
				],
				[
					'text'=>'View MySQL Open Tables Table',
					'link'=>'dbstatus.php?action=ViewMySQLOpenTablesTable',
					'mouseover'=>'View MySQL Open Tables Table',
				],
				[
					'text'=>'View MySQL Procedure Status Table',
					'link'=>'dbstatus.php?action=ViewMySQLProcedureStatusTable',
					'mouseover'=>'View MySQL Procedure Status Table',
				],
				[
					'text'=>'View MySQL Table Status Table',
					'link'=>'dbstatus.php?action=ViewMySQLTableStatusTable',
					'mouseover'=>'View MySQL Table Status Table',
				],
				[
					'text'=>'View MySQL Variables Table',
					'link'=>'dbstatus.php?action=ViewMySQLVariablesTable',
					'mouseover'=>'View MySQL Variables Table',
				],
			],
				
				/*
				
* http://dev.mysql.com/doc/refman/5.5/en/status-table.html
http://dev.mysql.com/doc/refman/5.5/en/innodb-i_s-tables.html
http://dev.mysql.com/doc/refman/5.5/en/mysql-cluster-i_s-tables.html
* http://dev.mysql.com/doc/refman/5.5/en/extended-show.html
http://dev.mysql.com/doc/refman/5.5/en/innodb-i_s-tables.html
https://dev.mysql.com/doc/refman/5.0/en/information-functions.html#function_version
https://dev.mysql.com/doc/refman/5.0/en/installation-version.html
http://stackoverflow.com/questions/1493722/mysql-command-for-showing-current-configuration-variables
http://dev.mysql.com/doc/refman/5.7/en/server-options.html
http://dev.mysql.com/doc/refman/5.7/en/server-configuration-defaults.html
http://dev.mysql.com/doc/refman/5.7/en/server-status-variables.html
				
				*/
			[
				'text'=>'MySQL Schema Information',
				'link'=>' ',
				'mouseover'=>'MySQL Schema Information',
				[
					'text'=>'Dump Tables',
					'link'=>'dbstatus.php?action=DumpTables',
					'mouseover'=>'Dump Selected Table(s) Records',
				],
			],
		],
	];
		
				// Column #3, DB : Secondary Header Args
			
			// -------------------------------------------------------------
	
	$header_secondary_panel03_args = [
		'title'=>'DB',
		'image'=>'db-icon.jpg',
		'divmouseover'=>'dub buh',
		'imagemouseover'=>'dub buhhhhh mousevoer!',
		'level'=>2,
		'divclass'=>'horizontal-center width-100percent border-bottom-1px background-color-gray13',
		'textclass'=>'padding-0px margin-0px vertical-center padding-top-14px',
		'imagedivclass'=>'background-color-gray10 margin-5px',
		'imageclass'=>'border-1px width-50px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
		'rightimageenable'=>1,
	];
		
				// Column #3, DB : Display
			
			// -------------------------------------------------------------
	
	$divider->displaystart($divider_one_third_start_args);
	
	$divider->displaystart($divider_padding_special_start_args);
	
	$divider->displaystart($divider_frame_start_args);
	
	$header->display($header_secondary_panel03_args);
	
	$divider->displaystart($divider_case_start_args);
	
	$divider->displaystart($divider_padding_start_args);
	
	$hideable->display($db_hideable_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
		
				// Extra Blank Space
			
			// -------------------------------------------------------------
	
	print('<div class="clear-float"></div>');
	$divider->displaystart($divider_padding_special_start_args);
	
	$divider->displayend($divider_end_args);
	
?>