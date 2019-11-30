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
	
	$primary_image = false;
	
	if(!$this->mobile_friendly)
	{
		$width_attribute = '';
		$vertical_attribute = '';
		
		if($this->entry)
		{
			$image_count = count($this->entry['image']);
			
			if($image_count)
			{
				$primary_image = implode('/', str_split($this->entry['image'][0]['FileDirectory'])) . '/' . $this->entry['image'][0]['IconFileName'];
				$primary_image_text = $this->entry['image'][0]['Title'];
				$width_attribute = ' width-200px height-200px';
				$vertical_attribute = ' vertical-specialcenter';
			}
		}
		
		if(!$primary_image)
		{
			$primary_image = $this->primary_host_record['PrimaryImageLeft'];
			$primary_image_text = $this->primary_host_record['Classification'];
		}

				// Mouseover Values
			
			// -------------------------------------------------------------
		
		$div_mouseover = '';
		
		if($this->entry['quote'] && $this->entry['quote'][0])
		{
			$random_quote = $this->entry['quote'][array_rand($this->entry['quote'], 1)];
			
			$div_mouseover = '&quot;' . str_replace('"', '\'', $random_quote['Quote']) . '&quot; -- ' . str_replace('"', '\'', $random_quote['Source']);
		}
		
		if(!$div_mouseover)
		{
			if($this->primary_host_record['Subject'])
			{
				$div_mouseover = str_replace('"', '\'', $this->primary_host_record['Subject']);
			}
		}
	}
	
	$header_primary_args = [
		'title'=>'Definitions from ' . $this->header_title_text,
		'image'=>$primary_image,
		'rightimage'=>$primary_image,
		'divmouseover'=>$div_mouseover,
		'imagemouseover'=>$primary_image_text,
		'level'=>1,
		'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-gray13',
		'textclass'=>'margin-0px horizontal-center vertical-center padding-top-22px margin-bottom-22px',
		'imagedivclass'=>'border-2px margin-5px background-color-gray10' . $width_attribute,
		'imageclass'=>$vertical_attribute,
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
	
			// Breadcrumb Trails
		
		// -------------------------------------------------------------
	
	print('<div class="horizontal-center width-95percent margin-top-5px">');
	print('<div class="float-left border-2px background-color-gray13">');
	print('<p class="font-family-arial margin-5px">');
	
	if($this->master_record)
	{
		$record_list_count = count($this->record_list);
		if($record_list_count)
		{
			print('<a href="' . $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '">');
		}
		print($this->master_record['Title']);
		
		if($record_list_count)
		{
			print('</a>');
		}
		
		$link_list = '';
		
		for($i = 0; $i < $record_list_count; $i++)
		{
			$record = $this->record_list[$i];
			
			print(' &gt;&gt; ');
			
			$link_list .= '/' . $record['Code'];
			
			print('<a href="' . $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . $link_list . '/view.php');
			
			if($i == 0)
			{
				print('?action=index');
			}
			
			print('">');
			
			print($record['Title']);
			
			print('</a>');
		}
		
		print(' &gt;&gt; Definitions');
	}
	print('</p>');
	print('</div>');
	print('</div>');
	
			// Finish Breadcrumb Trails
		
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
	
			// View Navigation
		
		// -------------------------------------------------------------
	
	print('<center>');
	print('<div class="width-90percent horizontal-center">');
	print('<center>');
	print('<div class="border-2px background-color-gray15 margin-5px width-90percent horizontal-center">');
	print('<div class="horizontal-left">');
	
	$definitions_count = count($this->definitions_found);
	
	if($definitions_count)
	{
		foreach($this->definitions_found as $word => $definition)
		{
				// View Word
			
			// -------------------------------------------------------------
			
			print('<center>');
			print('<div class="width-90percent">');
			
			$header_secondary_args = [
				'title'=>$word,
				'divmouseover'=>$word . ' defined (Metaphone : ' . metaphone($word) . '; Soundex : ' . soundex($word) . ')',
				'level'=>2,
				'divclass'=>'border-2px background-color-gray13 margin-5px float-left',
				'textclass'=>'padding-0px margin-5px horizontal-left font-family-tahoma',
				'imagedivclass'=>'border-2px margin-5px background-color-gray10',
				'imageclass'=>'border-1px',
				'domainobject'=>$this->domain_object,
				'leftimageenable'=>0,
				'rightimageenable'=>0,
			];
			$header->display($header_secondary_args);
			
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
			print('</center>');
			
				// View Definition(s)
			
			// -------------------------------------------------------------
		
			print('<ol class="margin-10px font-family-tahoma horizontal-left">');
			foreach($definition as $single_definition)
			{
				print('<li>');
				print($single_definition);
				print('</li>');
			}
			print('</ol>');
		}
	}
	else
	{
		print('<p class="margin-10px font-family-tahoma horizontal-left">');
		print('Hrm, sorry, we weren\'t able to find any definitions from this text. =\\');
		print('</p>');
	}
	
	print('</div>');
	print('</div>');
	print('</center>');
	print('</div>');
	print('</center>');
	
			// Display Final Ending Navigation
		
		// -------------------------------------------------------------
	
	$bottom_navigation_args = [
		'thispage'=>'',
	];
	$navigation->DisplayBottomNavigation($bottom_navigation_args);
	
?>