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
	
	$divider_padding_start_args = array(
		'class'=>'margin-5px padding-5px',
	);
	
	$divider_end_args = array(
		'indentlevel'=>1,
	);
	
			// Display Header
		
		// -------------------------------------------------------------
	
	$header_primary_args = array(
		'indentlevel'=>1,
		'title'=>$this->domain_object->primary_domain . ' System Status : Archive URL Detect',
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
	);
	
	$header->display($header_primary_args);
			
			// Display 'Back to Master C.' Link
		
		// -------------------------------------------------------------
	
	$return_to_master_c_args = array(
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
	);
	
	$header->display($return_to_master_c_args);
			
			// Display Instructions
		
		// -------------------------------------------------------------
	
	$results_count = count($this->StatusDataArray);
	
	if($results_count)
	{
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
				'Note: Examined a total number of ' . number_format($this->entry_code_count) . ' entry records.  A total of ' . number_format(count($this->StatusDataArray)) . ' archive-url issue records were discovered.',
			]],
		];
		$generic_list->Display($version_list_display_args);
	}
	
			// Display Form Elements : Start
		
		// -------------------------------------------------------------
	
	$divider_padding_start_args = array(
		'class'=>'horizontal-center width-80percent margin-top-5px border-2px',
		'indentlevel'=>1,
	);
	
	$divider->displaystart($divider_padding_start_args);
	
	$start_form_args = [
		'action'=>0,
		'method'=>'post',
		'files'=>0,
		'formclass'=>'margin-0px',
		'indentlevel'=>1,
	];
	
	$form->StartForm($start_form_args);
	
			// Display Form Save Button : Save
		
		// -------------------------------------------------------------
	
	$element_text_args = [
		text=>'<center>',
		indentlevel=>5,
	];
	$text->Display($element_text_args);
	
	print('<b>Check DB? :</b>');
	
	$type_args = [
		type=>'submit',
		name=>'do-detection',
		'class'=>'margin-5px',
		value=>'Detect DB Issues',
		indentlevel=>5,
	];
	
	$form->DisplayFormField($type_args);
	
	$element_text_args = [
		text=>'</center>',
		indentlevel=>5,
	];
	$text->Display($element_text_args);
	
			// Display Form Elements : End
		
		// -------------------------------------------------------------
	
	$end_form_args = [
		indentlevel=>1,
	];
	$form->EndForm($end_form_args);
	
	$divider_end_args = [
		indentlevel=>1,
	];
	$divider->displayend($divider_end_args);
	
			// Display Results
		
		// -------------------------------------------------------------

	if($this->do_detection)
	{
				// Display Results : Start
			
			// -------------------------------------------------------------
		
		$divider_padding_start_args = array(
			'class'=>'horizontal-center width-80percent margin-top-5px border-2px',
			'indentlevel'=>1,
		);
		$divider->displaystart($divider_padding_start_args);
		
				// Display Results : Entries
			
			// -------------------------------------------------------------
		
		print('<div style="text-align:left;" class="width-100percent"><ul style="text-align:left;">');
		
		$printable_results = [];
		
		if($results_count > 0) {
			for($i = 0; $i < $results_count; $i++)
			{
				$entry = $this->StatusDataArray[$i];
				$parents = $entry['parents'];
				
			#	print_r($parents);
				
				$link = $entry['badlink'];
				
				$printable_piece = '';
				
				#print('<li>');
				$printable_piece .= '<li>';
				
				#print('<a href="');
				$printable_piece .= '<a href="';
				
				$parents_count = count($parents);
				
				$parent_titles = [];
				$parent_codes = [];
				
				for($j = 0; $j < $parents_count; $j++) {
					$parent = $parents[$j];
					$parent_titles[] = $parent['Title'];
					$parent_codes[] = $parent['Code'];
				}
				
				#print(implode('/', $parent_codes));
				$printable_piece .= implode('/', $parent_codes);
				
				#print('/modify.php?action=Edit" target="_blank">');
				$printable_piece .= '/modify.php?action=Edit" target="_blank">';
				
			#	print(implode(' / ', $parent_titles));
				$printable_piece .= implode(' / ', $parent_titles);
				
			#	print('Link #' . $link['id']);
			#	print(' : ');
			#	print($link['URL']);
			#	print('</a>');
				$printable_piece .= '</a>';
				
			#	print('</li>');
				$printable_piece .= '</li>';
				
				$printable_results[] = $printable_piece;
			}
		} else {
			print('<li>Nothing found.</li>');
		}
		
		sort($printable_results);
		print(implode('', $printable_results));
		
		print('</ul></div>');
	
				// Display Results : End
			
			// -------------------------------------------------------------
		
		$divider_end_args = [
			indentlevel=>1,
		];
		$divider->displayend($divider_end_args);
	}
	
?>