<?php

			// Define Standard Class Folder
			// -----------------------------------------------------------------
	
	$folder_location_prefix = '../classes/';
	
			// Define Standard Classes
			// -----------------------------------------------------------------
	
	$standard_classes = [
		
				// API
				// -----------------------------------------------------------------
		
		'API/Google',
		
				// Charsets
				// -----------------------------------------------------------------
		
		'Charset/HTMLEntities',
		'Charset/UTF8Characters',
		
				// Database
				// -----------------------------------------------------------------
		
		'Database/DBAccess',
		'Database/Time',
		'Database/TimeMySQL',
		'Database/EscapeMySQL',
		
				// Development
				// -----------------------------------------------------------------
				
		'Development/Version',
		
				// Errors
				// -----------------------------------------------------------------
		
		'Error/ErrorLogging',
		'Error/IssueLogging',
		
				// Format
				// -----------------------------------------------------------------
		
		'Format/Language',
		
				// Language
				// -----------------------------------------------------------------
		
		'Language/Dictionary',
		
				// Networking
				// -----------------------------------------------------------------
		
		'Networking/Cookie',
		'Networking/Domain',
		'Networking/IPAddress',
		'Networking/Handler',
		'Networking/Query',
		
				// Math
				// -----------------------------------------------------------------
		
	//	'Math/NumberTheory',
	//	'Math/Random',
		'Math/Base',
		'Math/Binary',
		
				// Security
				// -----------------------------------------------------------------
	
		'Security/Authentication',
		'Security/HandleInput',
		'Security/PhishingCharacters',
	//	'Security/RSA',
	
	];
	
			// Call Standard Classes
			// -----------------------------------------------------------------
	

	foreach($standard_classes as $class)
	{
		require($folder_location_prefix . $class . '.php');
	}
	
?>