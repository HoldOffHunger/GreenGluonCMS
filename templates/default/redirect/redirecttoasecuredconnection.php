<?php
		
		$header_primary_args = array(
			'title'=>'Redirecting to a Secured Connection',
			'image'=>'',
			'divmouseover'=>'The Grand Master C.',
			'imagemouseover'=>'Master C is in the house!',
			'level'=>1,
			'divclass'=>'horizontal-center width-70percent border-2px margin-top-5px background-color-gray13 margin-top-14px',
			'textclass'=>'no-padding-no-margin horizontal-center vertical-center',
			'imagedivclass'=>'border-2px margin-5px background-color-gray10',
			'imageclass'=>'',
			'domainobject'=>$this->domain_object,
			'leftimageenable'=>1,
			'rightimageenable'=>1,
		);
		
		require('../modules/spacing.php');
		require('../modules/html/header.php');
		$header = new module_header;
		
			// Display
		
		// -------------------------------------------------------------
		
		$header->display($header_primary_args);

?>