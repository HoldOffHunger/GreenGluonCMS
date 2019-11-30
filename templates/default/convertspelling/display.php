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
	
			// Basic Divider Arguments
		
		// -------------------------------------------------------------
	
	$divider_padding_start_args = [
		'class'=>'',
	];
	
	$divider_end_args = [
		'indentlevel'=>1,
	];
	
			// Display Header
		
		// -------------------------------------------------------------
	
	$header_primary_args = [
		'indentlevel'=>1,
		'title'=>$this->domain_object->primary_domain . ' British/American Spelling converter',
		'image'=>$this->primary_host_record['PrimaryImageRight'],
		'divmouseover'=>'Convert British or American Spellings',
	#	'imagemouseover'=>'Master C is in the house!',
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
	
			// Display List Items
		
		// -------------------------------------------------------------

				// Display Instructions
			
			// -------------------------------------------------------------
	
	print('<p class="font-family-arial">Convert British spellings to American spellings, or vice versa.</p>');
	
	print('<p class="font-family-arial">Note: There is a 100,000-character limit to this form.</p>');

				// Start Form
			
			// -------------------------------------------------------------
	
	print('<form METHOD="POST">');

				// Direction
			
			// -------------------------------------------------------------
	
	print('<p class="font-family-arial">');
	print('Select Conversion Direction : ');
	print('<select name="direction">');
	print('<option value="british-to-american">Convert British spellings to American Spellings</option>');
	print('<option value="american-to-british">Convert American spellings to British Spellings</option>');
	print('</select>');
	print('</p>');

				// Text Area
			
			// -------------------------------------------------------------
	
	print('<center>');
	print('<textarea name="text" cols="75" rows="20">');
	
	if($this->text) {
		print($this->text);
	} else {
		print('For example : Labourers of the World, Unite!');
	}
	
	print('</textarea>');
	print('</center>');

				// Output
			
			// -------------------------------------------------------------
	
	if($this->text) {
		print('<p class="font-family-arial">Results :</p>');
		
		print('<div class="font-family-arial">');
		print($this->converted_text);
		print('</div>');
	}
	
	print('<input type="submit" value="Convert Spelling">');
	
				// End Form
			
			// -------------------------------------------------------------
	
	print('</form>');
	
?>