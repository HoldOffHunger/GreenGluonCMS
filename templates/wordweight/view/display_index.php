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
	
			// Mouseover Values
		
		// -------------------------------------------------------------
	
	$div_mouseover = '';
	$image_mouseover = '';
	
	if($this->entry['quote'] && $this->entry['quote'][0])
	{
		$random_quote = $this->entry['quote'][array_rand($this->entry['quote'], 1)];
		
		$div_mouseover = '&quot;' . str_replace('"', '\'', $random_quote['Quote']) . '&quot; -- ' . str_replace('"', '\'', $random_quote['Source']);
	}
	
	if($this->entry['description'] && $this->entry['description'][0])
	{
		$description = $this->entry['description'][0];
		
		$image_mouseover = str_replace('"', '\'', $description['Description']);
	}
	
	if(!$div_mouseover)
	{
		if($this->primary_host_record['Classification'])
		{
			$div_mouseover = str_replace('"', '\'', $this->primary_host_record['Classification']);
		}
	}
	
	if(!$image_mouseover)
	{
		if($this->primary_host_record['Subject'])
		{
			$image_mouseover = str_replace('"', '\'', $this->primary_host_record['Subject']);
		}
	}
	
			// Display Header
		
		// -------------------------------------------------------------
		
	$header_primary_args = [
		'title'=>'WordWeight.com : <br>' . $this->master_record['Subtitle'],
		'image'=>$this->primary_host_record['PrimaryImageLeft'],
		'rightimage'=>$this->primary_host_record['PrimaryImageRight'],
		'divmouseover'=>$div_mouseover,
		'imagemouseover'=>$image_mouseover,
		'level'=>1,
		'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-gray13',
		'textclass'=>'padding-0px margin-0px horizontal-center vertical-center padding-top-22px',
		'imagedivclass'=>'border-2px margin-5px background-color-gray10',
		'imageclass'=>'border-1px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
	#	'rightimageenable'=>1,
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
	
	if($this->authentication_object->user_session['UserAdmin.id']) {
		require('../modules/html/entry-controls.php');
		$entry_controls = new module_entrycontrols;
		$entry_controls->Display(['that'=>$this]);
	}
			
			// Introduction
		
		// -------------------------------------------------------------
	
	print('<center>');
	print('<div class="horizontal-center width-70percent">');
	print('<div class="border-2px background-color-gray15 margin-5px float-left">');
	
	print('<strong>');
	print(str_replace('<p>', '<p class="horizontal-left margin-5px font-family-tahoma">', $this->entry['textbody'][0]['Text']));
	
	print('<p class="horizontal-left margin-5px font-family-tahoma">');
	
	#$definitions_count = $this->dictionary->GetDefinitionsCount([]);
	#$words_count = $this->dictionary->GetWordsCount([]);
	#$dictionaries_count = $this->dictionary->GetDictionariesCount([]);
	
	print('We currently maintain ' . number_format($definitions_count) . ' definitions for ' . number_format($words_count) . ' words');
	print('.');
#	print(' across ' . number_format($dictionaries_count) . ' dictionaries.');
	
	print('</strong>');
	print('</p>');
	
	print('</div>');
	print('</div>');
	print('</center>');
							
	$clear_float_divider_start_args = [
		'class'=>'clear-float',
		'indentlevel'=>5,
	];
	
	$divider->displaystart($clear_float_divider_start_args);
	
	$clear_float_divider_end_args = [
		'indentlevel'=>5,
	];
	
	$divider->displayend($clear_float_divider_end_args);
	
	print('<center>');
	
	print('<form class="margin-0px" method="post">');
	
	print('<div class="border-2px background-color-gray15 margin-5px horizontal-left width-50percent">');
	print('<div style="margin:5px;padding:5px;border:black 2px solid;background-color:#FFFFFF;" class="header-3 padding-0px margin-5px horizontal-left font-family-tahoma">');
	
	print('<center>');
	
	if($this->search_term)
	{
		print("Sorry, no results for " . $this->search_term . ".  Please try again!");
		print('<BR><BR>');
	}
	
	print('Search : <input type="text" name="search" size="60">');
	
	print('<br><br>');
	
	print('<input type="submit" value="Lookup Definition">');
	print('</center>');
	
	print('</div>');
	print('</div>');
	
	print('</form>');
	
	print('<div class="border-2px background-color-gray15 margin-5px horizontal-left width-70percent">');
	print('<div style="margin:5px;padding:5px;border:black 2px solid;background-color:#FFFFFF;" class="header-3 padding-0px margin-5px horizontal-left font-family-tahoma">');
	
	print('<center>');
	print('<div class="border-2px background-color-gray13 margin-5px" style="display: inline-block;">');
	print('<div class="margin-5px">');
	print('<center><h3 class="margin-0px">Some Random Definitions!</h3></center>');
	print('</div>');
	print('</div>');
	print('</center>');
	
	print('<br>');
	
	$random_definitions = $this->dictionary->LookUpRandomWords([]);
	
	foreach ($random_definitions as $random_word => $random_definition)
	{
		print('<div id="header_backgroundimageurl" class="border-2px background-color-gray13 margin-5px" style="display: inline-block;">');
		print('<div class="margin-5px">');
		print('<a href="' . urlencode(ucwords($random_word)) . '/view.php">');
		print(ucwords($random_word));
		print('</a>');
		print('</div>');
		print('</div>');
	}
	
	print('</div>');
	print('</div>');
	
	print('</center>');
	
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
	
			// Display Similar Sites
		
		// -------------------------------------------------------------
	
	require('../modules/html/similarsites-satellites.php');
	
	$similar_site_args = [
		site=>$this->domain_object->primary_domain_lowercased,
		language=>$this->language_object,
	];
	$similar_sites = new module_similarsites_satellites($similar_site_args);
	
	$similar_sites->display();
	
			// Share Package
		
		// -------------------------------------------------------------
	
	require('../modules/html/socialmediasharelinks.php');
	$social_media_share_links_args = [
		'globals'=>$this->globals,
		'textonly'=>$this->mobile_friendly,
		'languageobject'=>$this->language_object,
		'divider'=>$divider,
		'domainobject'=>$this->domain_object,
		'socialmedia'=>$this->social_media,
		'sharewithtext'=>'Share With',
		'socialmediasharelinkargs'=>[
			url=>$this->domain_object->GetPrimaryDomain([insecure=>1, lowercase=>1, www=>1]) . '/',
			title=>$this->header_title_text,
			desc=>$image_mouseover,
			provider=>$this->domain_object->primary_domain_lowercased,
		],
	];
	$social_media_share_links = new module_socialmediasharelinks($social_media_share_links_args);
	
				// Start Display Share Options
			
			// -------------------------------------------------------------

	print('<center>');
	print('<div class="margin-5px horizontal-center width-80percent">');
	print('<div class="margin-5px border-2px background-color-gray13 float-left">');
	print('<div class="margin-5px horizontal-left font-family-arial float-left">');
		
			// Display "Share" Text
			// -------------------------------------------------------

	print('<table border="0" class="padding-0px margin-0px">');
	print('<tr valign="top">');
	print('<td valign="top">');
	print('<div class="font-family-tahoma font-size-150percent margin-10px border-2px background-color-gray10"><span class="margin-5px"><nobr>' . 'Share' . ' :</nobr></span></div>');
	print('</td>');
	print('<td>');
		
				// Display Social Networking Options
			
			// -------------------------------------------------------------
	
	$social_media_share_links->display();

				// Conclude Table
				// -------------------------------------------------------

	print('</td>');
	print('</tr>');
	print('</table>');
	
				// End Display Share Options
			
			// -------------------------------------------------------------
	
	print('</div>');
	print('</div>');
	print('</div>');
	print('</center>');
		
				// Finish Textbody Header
			
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
	
			// Display Final Ending Navigation
		
		// -------------------------------------------------------------
	
	$bottom_navigation_args = [
		'thispage'=>'Home',
	];
	$navigation->DisplayBottomNavigation($bottom_navigation_args);
	
?>