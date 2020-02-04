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
		'sharewithtext'=>$this->share_with_text,
		'socialmediasharelinkargs'=>[
			url=>$this->domain_object->GetPrimaryDomain([insecure=>1, lowercase=>1, www=>1]) . '/?id=' . $this->entry['assignment'][0]['id'],
			title=>$this->header_title_text,
			desc=>$instructions_content_text,
			provider=>$this->domain_object->primary_domain_lowercased,
		],
	];
	$social_media_share_links = new module_socialmediasharelinks($social_media_share_links_args);
	
			// Display Header
		
		// -------------------------------------------------------------
	
	$header_primary_args = [
		'title'=>'Make a URL Suggestion for ' . $this->entry['Title'],
		'image'=>$this->primary_host_record['PrimaryImageLeft'],
		'rightimage'=>$this->primary_host_record['PrimaryImageRight'],
		'imagemouseover'=>$primary_image_text,
		'level'=>1,
		'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-gray13',
		'textclass'=>'margin-0px horizontal-center vertical-center padding-top-22px margin-bottom-22px',
		'imagedivclass'=>'border-2px margin-5px background-color-gray10' . $width_attribute,
		'imageclass'=>$vertical_attribute,
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
	#	'rightimageenable'=>1,
	];
	
	$header->display($header_primary_args);
		
				// Start Top Bar
			
			// -------------------------------------------------------------
		
		print('<div class="horizontal-center width-95percent margin-top-5px">');
		
				// Breadcrumbs Info
			
			// -------------------------------------------------------------
		
		$breadcrumbs_title = 'Make a Suggestion';
		
		require('../modules/html/breadcrumbs.php');
		$breadcrumbs = new module_breadcrumbs(['that'=>$this, 'title'=>$breadcrumbs_title]);
		$breadcrumbs->Display();
		
				// Login Info
			
			// -------------------------------------------------------------
			
		require('../modules/html/auth.php');
		$auth = new module_auth(['that'=>$this]);
		$auth->Display();
		
				// End Top Bar
			
			// -------------------------------------------------------------
		
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

			// Display Form Only for Users
		
		// -------------------------------------------------------------
		
	if($_SERVER['HTTPS'] == 'on')
	{
		if($this->authentication_object->user_session)
		{
			if(!$this->suggestion_record) {
						// Start Form
					
					// -------------------------------------------------------------
				
				$start_form_args = [
					'method'=>'post',
					'files'=>1,
					'formclass'=>'margin-0px',
					'indentlevel'=>1,
				];
				
				$form->StartForm($start_form_args);
				
						// Display Form
					
					// -------------------------------------------------------------
				
				print('<center>');
				print('<div class="horizontal-center width-70percent">');
				print('<div class="border-2px background-color-gray15 margin-5px horizontal-left">');
				print('<h2 class="horizontal-left margin-5px font-family-arial">');
				
						// Display Parent
					
					// -------------------------------------------------------------
					
				print('Suggestions For : ' . $this->parent['Title'] . ' > ' . $this->entry['Title']);
					
					if($this->authentication_object->user_session['User.Username']) {
						$username = $this->authentication_object->user_session['User.Username'];
					} else {
						$username = $this->authentication_object->user_session['User.EmailAddress'];
					}
				
				print('</h2>');
				
				print('<h2 class="horizontal-left margin-5px font-family-arial">');
				
						// Display Form
					
					// -------------------------------------------------------------
				
				print('Enter URL : ');
				
				if(!$this->suggestion && array_key_exists('suggestion', $_POST)) {
					print('(<span style="color:red;"><b>URL is a required field.</b></span>)');
				}
				
				print('<input type="text" name="suggestion" value="' . $this->suggestion . '" class="autofocus" size="100" maxlength="511">');
				
				print('<input type="hidden" name="suggestiontype" value="URL"/>');
				
						// Display Explanation
					
					// -------------------------------------------------------------
					
				print('<BR><BR>');
					
				print('Explanation : <textarea name="suggestionexplanation" cols="80" rows="5" maxlength="1023"></textarea>');
					
				print('<BR><BR>');
				
						// Suggestion Button
					
					// -------------------------------------------------------------
				
				$type_args = [
					'type'=>'submit',
					'name'=>'submit',
					'value'=>'Submit Suggestion',
					'class'=>'float-right',
					'indentlevel'=>5,
				];
				
				$form->DisplayFormField($type_args);
				
				print('</h2>');
				
						// Finish About Header
					
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
				
				print('</div>');
				print('</div>');
				
				print('</center>');
				
						// End Form
					
					// -------------------------------------------------------------
				
				$end_form_args = [
					'indentlevel'=>1,
				];
				$form->EndForm($end_form_args);
			} else {
						// Display Form
					
					// -------------------------------------------------------------
				
				print('<center>');
				print('<div class="horizontal-center width-70percent">');
				print('<div class="border-2px background-color-gray15 margin-5px horizontal-left">');
				print('<h2 class="horizontal-left margin-5px font-family-arial">');
				
						// Display Parent
					
					// -------------------------------------------------------------
					
				print('Suggestion Received For : ' . $this->parent['Title']);
				print('</h2>');
					
				print('<BR><BR>');
				
						// Admin Controls
					
					// -------------------------------------------------------------
				
				if($this->authentication_object->user_session['UserAdmin.id']) {
					print('<CODE>');
					
					print('ADMIN, Suggestion Definition ::');
					print('<BR><BR>');
					
					print('<BLOCKQUOTE>');
					print('<PRE>');
					print_r($this->suggestion_definition);
					print('</PRE>');
					print('</BLOCKQUOTE>');
					
					print('ADMIN, Suggestion Record ::');
					print('<BR><BR>');
					
					print('<BLOCKQUOTE>');
					print('<PRE>');
					print_r($this->suggestion_record);
					print('</PRE>');
					print('</BLOCKQUOTE>');
					
					print('</CODE>');
				}
				
				print('<h2 class="horizontal-left margin-5px font-family-arial">');
				
						// Display Form
					
					// -------------------------------------------------------------
					
				print('URL : ');
				
				print(trim(html_entity_decode(strip_tags($this->suggestion))));
				
						// Display Explanation
					
					// -------------------------------------------------------------
					
				print('<BR><BR>');
					
				print('Explanation : ');
				
				print(trim(html_entity_decode(strip_tags($this->suggestionexplanation))));
				
						// Display Thank You
					
					// -------------------------------------------------------------
				
				print('<BR><BR>');
				print('<CENTER>Thank you!  Your suggestion has been received!</CENTER>');
				
				print('</h2>');
				
						// Finish About Header
					
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
				
				print('</div>');
				print('</div>');
				
				print('</center>');
			}
		} else {
			print('<center>');
			print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-50percent font-family-tahoma">');
			print('<p>Login through Google to Make a Suggestion :</p>');
			
			print('<div class="horizontal-center width-50percent margin-top-5px margin-bottom-5px">');
			print('<div class="g-signin2" data-onsuccess="onSignIn"></div>');
			print('</div>');
			
			print('<form TYPE="POST">');
			print('<div style="display:none;">');
			print('<input type="hidden" name="google_token_id" id="google_token_id" class="google_token_id">');
			$type_args = [
				'type'=>'submit',
				'id'=>'submit',
				'name'=>'Comment',
				'value'=>'Comment',
				'indentlevel'=>5,
			];

			print('<input type="hidden" name="userid" id="userid" class="userid" value="' . $this->authentication_object->user_session['User.id'] . '">' . "\n\n");
			print('<input type="hidden" name="usersessionid" id="usersessionid" class="usersessionid" value="' . $this->authentication_object->user_session['CookieToken'] . '">' . "\n\n");
			print('<input type="hidden" name="logout" id="logout" class="logout" value="' . $this->Param('logout') . '">' . "\n\n");
			
			$form->DisplayFormField($type_args);
			
			print('</form>');
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
		}
		
		$end_form_args = [
			indentlevel=>1,
		];
		$form->EndForm($end_form_args);
	} else {
		print('<center>');
		print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-50percent font-family-tahoma">');
		
		$new_url = str_replace('/view.php', '/view.php#comments', $_SERVER['SCRIPT_URL']);
		print('<p><b><a href="' . $this->domain_object->GetPrimaryDomain(['secure'=>1, 'lowercase'=>0, 'www'=>1]) . $new_url . '">Login to Comment</a></b></p>');
		
		print('</div>');
		print('</center>');
	}
	
			// Display Final Ending Navigation
		
		// -------------------------------------------------------------
	
	$bottom_navigation_args = [
		'thispage'=>'Suggestions',
	];
	$navigation->DisplayBottomNavigation($bottom_navigation_args);
	
?>