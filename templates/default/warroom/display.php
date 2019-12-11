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
		'title'=>$this->domain_object->primary_domain . ' System Status : The War Room',
		'image'=>'system-status-icon.jpg',
		'divmouseover'=>'Hey, no fighting!',
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
			'Note: Detected a total of ' . number_format($this->primary_hosts_count) . ' hosts.',
		]],
	];
	$generic_list->Display($version_list_display_args);
	
			// Display Errors
		
		// -------------------------------------------------------------
		
	print('<div class="horizontal-center width-70percent margin-top-5px margin-bottom-5px border-2px">');
	print('<h3>Errors</h3>');
	print('</div>');
	
	$errors = $this->errors;
	
	$primary_hosts = $this->primary_hosts;
	$primary_hosts_count = $this->primary_hosts_count;
//	print_r($this->errors);
#	print_r(array_keys($this->errors));
	for($i = 0; $i < $primary_hosts_count; $i++) {
		$primary_host = $primary_hosts[$i];
		$primary_host_errors = $errors[$primary_host];
		
#		print($primary_host);
#		print("<BR>");
#		print_r($primary_host_errors);
#		print("<BR><BR>");
		
		$client_errors = [[
			'id',
			'Date',
			'URL',
			'Error Message',
			'Action',
			'Resolved',
		]];
		$primary_host_errors_count = count($primary_host_errors);
		
		for($j = 0; $j < $primary_host_errors_count; $j++) {
			$primary_host_error = $primary_host_errors[$j];
			
			$error = [
				$primary_host_error['id'],
				'<nobr>' . $primary_host_error['OriginalCreationDate'] . '</nobr>',
				'<a href="' . htmlspecialchars($primary_host_error['URL']) . '" target="_blank">' . $primary_host_error['URL'] . '</a>',
				$primary_host_error['ErrorMessage'],
				'<nobr>' . '<a href="warroom.php?action=viewError&client=' . $primary_host . '&id=' . $primary_host_error['id'] . '">View</a>' . ' | ' .
				'<a href="warroom.php?action=resolveError&client=' . $primary_host . '&id=' . $primary_host_error['id'] . '">Resolved</a>' . '</nobr>',
				$primary_host_error['Resolved'],
			];
			
			$client_errors[] = $error;
		}
		
		if($primary_host_errors_count > 0) {
		
					// Display Header
				
				// -------------------------------------------------------------
			
			$header_primary_args = [
				'indentlevel'=>1,
				'title'=>$primary_host,
				'divmouseover'=>'Hey, no fighting!',
				'imagemouseover'=>'Master C is in the house!',
				'level'=>3,
				'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-gray13',
				'textclass'=>'margin-0px horizontal-center vertical-center padding-top-22px margin-bottom-10px',
				'imagedivclass'=>'border-2px margin-5px background-color-gray10',
				'imageclass'=>'border-1px height-75px',
				'domainobject'=>$this->domain_object,
				'leftimageenable'=>1,
				'rightimageenable'=>1,
			];
			
			$header->display($header_primary_args);
			
			$version_list_display_args = [
				'options'=>[
					'indentlevel'=>1,
					'tableheaders'=>0,
					'tableclass'=>'width-70percent horizontal-center border-2px background-color-gray13 margin-top-14px',
					'rowclass'=>'border-1px horizontal-left',
					'cellclass'=>[
						'border-1px vertical-top',
						'border-1px vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px vertical-top',
						'border-1px vertical-top',
						'border-1px vertical-top',
						'border-1px vertical-top',
					],
				],
				'list'=>$client_errors,
			];
			$generic_list->Display($version_list_display_args);
		}
	}
	
			// Display Issues
		
		// -------------------------------------------------------------
		
	print('<div class="horizontal-center width-70percent margin-top-5px margin-bottom-5px border-2px">');
	print('<h3>Issues</h3>');
	print('</div>');
	
	$issues = $this->issues;
	
	$primary_hosts = $this->primary_hosts;
	$primary_hosts_count = $this->primary_hosts_count;
//	print_r($this->errors);
#	print_r(array_keys($this->errors));
	for($i = 0; $i < $primary_hosts_count; $i++) {
		$primary_host = $primary_hosts[$i];
		$primary_host_issues = $issues[$primary_host];
		
#		print($primary_host);
#		print("<BR>");
#		print_r($primary_host_errors);
#		print("<BR><BR>");
		
		$client_errors = [[
			'id',
			'Date',
			'URL',
			'Error Message',
			'Action',
			'Resolved',
		]];
		$primary_host_issues_count = count($primary_host_issues);
		
		for($j = 0; $j < $primary_host_issues_count; $j++) {
			$primary_host_issue = $primary_host_issues[$j];
			
			$issue = [
				$primary_host_issue['id'],
				'<nobr>' . $primary_host_issue['OriginalCreationDate'] . '</nobr>',
				'<a href="' . htmlspecialchars($primary_host_issue['URL']) . '" target="_blank">' . $primary_host_issue['URL'] . '</a>',
				$primary_host_issue['ErrorMessage'],
				'<nobr>' . '<a href="warroom.php?action=viewError&client=' . $primary_host . '&id=' . $primary_host_error['id'] . '">View</a>' . ' | ' .
				'<a href="warroom.php?action=resolveError&client=' . $primary_host . '&id=' . $primary_host_issue['id'] . '">Resolved</a>' . '</nobr>',
				$primary_host_issue['Resolved'],
			];
			
			$client_issues[] = $issue;
		}
		
		if($primary_host_issues_count > 0) {
		
					// Display Header
				
				// -------------------------------------------------------------
			
			$header_primary_args = [
				'indentlevel'=>1,
				'title'=>$primary_host,
				'divmouseover'=>'Hey, no fighting!',
				'imagemouseover'=>'Master C is in the house!',
				'level'=>3,
				'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-gray13',
				'textclass'=>'margin-0px horizontal-center vertical-center padding-top-22px margin-bottom-10px',
				'imagedivclass'=>'border-2px margin-5px background-color-gray10',
				'imageclass'=>'border-1px height-75px',
				'domainobject'=>$this->domain_object,
				'leftimageenable'=>1,
				'rightimageenable'=>1,
			];
			
			$header->display($header_primary_args);
			
			$version_list_display_args = [
				'options'=>[
					'indentlevel'=>1,
					'tableheaders'=>0,
					'tableclass'=>'width-70percent horizontal-center border-2px background-color-gray13 margin-top-14px',
					'rowclass'=>'border-1px horizontal-left',
					'cellclass'=>[
						'border-1px vertical-top',
						'border-1px vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px vertical-top',
						'border-1px vertical-top',
						'border-1px vertical-top',
						'border-1px vertical-top',
					],
				],
				'list'=>$client_issues,
			];
			$generic_list->Display($version_list_display_args);
		}
	}

			// Display Comments
		
		// -------------------------------------------------------------
		
	print('<div class="horizontal-center width-70percent margin-top-5px margin-bottom-5px border-2px">');
	print('<h3>Comments</h3>');
	print('</div>');
	
	$comments = $this->comments;
	
	$primary_hosts = $this->primary_hosts;
	$primary_hosts_count = $this->primary_hosts_count;
	for($i = 0; $i < $primary_hosts_count; $i++) {
		$primary_host = $primary_hosts[$i];
		$primary_host_comments = $comments[$primary_host];
		
		$client_comments = [[
			'id',
			'Approved',
			'Rejected',
			'IPAddress',
			'Comment',
			'Action',
		]];
		$primary_host_errors_count = count($primary_host_comments);
		
		for($j = 0; $j < $primary_host_comments_count; $j++) {
			$primary_host_comment = $primary_host_comments[$j];
			
			$comment = [
				$primary_host_comment['id'],
				$primary_host_comment['Approved'],
				$primary_host_comment['Rejected'],
				$primary_host_comment['IPAddress'],
				html_entities($primary_host_comment['Comment']),
				'<a href="warroom.php?action=viewComment&client=' . $primary_host . '&id=' . $primary_host_comment['id'] . '">View</a>' . ' | ' .
				'<a href="warroom.php?action=acceptComment&client=' . $primary_host . '&id=' . $primary_host_comment['id'] . '">Accept</a>' . ' | ' .
				'<a href="warroom.php?action=rejectComment&client=' . $primary_host . '&id=' . $primary_host_comment['id'] . '">Reject</a>',
			];
			
			$client_comments[] = $comment;
		}
		
		if($primary_host_comments_count > 0) {
					// Display Header
				
				// -------------------------------------------------------------
			
			$header_primary_args = [
				'indentlevel'=>1,
				'title'=>$primary_host,
				'divmouseover'=>'Hey, no fighting!',
				'imagemouseover'=>'Master C is in the house!',
				'level'=>3,
				'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-gray13',
				'textclass'=>'margin-0px horizontal-center vertical-center padding-top-22px margin-bottom-10px',
				'imagedivclass'=>'border-2px margin-5px background-color-gray10',
				'imageclass'=>'border-1px height-75px',
				'domainobject'=>$this->domain_object,
				'leftimageenable'=>1,
				'rightimageenable'=>1,
			];
			
			$header->display($header_primary_args);
		
			$version_list_display_args = [
				'options'=>[
					'indentlevel'=>1,
					'tableheaders'=>0,
					'tableclass'=>'width-70percent horizontal-center border-2px background-color-gray13 margin-top-14px',
					'rowclass'=>'border-1px horizontal-left',
					'cellclass'=>[
						'border-1px vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
					],
				],
				'list'=>$client_comments,
			];
			$generic_list->Display($version_list_display_args);
		}
	}
	
			// Display Suggestions
		
		// -------------------------------------------------------------
		
	print('<div class="horizontal-center width-70percent margin-top-5px margin-bottom-5px border-2px">');
	print('<h3>Suggestions</h3>');
	print('</div>');
	
	$suggestions = $this->suggestions;
	
	$primary_hosts = $this->primary_hosts;
	$primary_hosts_count = $this->primary_hosts_count;
	for($i = 0; $i < $primary_hosts_count; $i++) {
		$primary_host = $primary_hosts[$i];
		$primary_host_suggestions = $suggestions[$primary_host];
		
		$client_suggestions = [[
			'id',
			'Suggestion Type',
			'Suggestion',
			'Explanation',
			'Approved',
			'Rejected',
			'IPAddress',
			'Action',
		]];
		$primary_host_suggestions_count = count($primary_host_suggestions);
		
		for($j = 0; $j < $primary_host_suggestions_count; $j++) {
			$primary_host_suggestion = $primary_host_suggestions[$j];
			
			$suggestion = [
				$primary_host_suggestion['id'],
				html_entities($primary_host_suggestion['SuggestionType']),
				html_entities($primary_host_suggestion['Suggestion']),
				html_entities($primary_host_suggestion['Explanation']),
				$primary_host_suggestion['Approved'],
				$primary_host_suggestion['Rejected'],
				$primary_host_suggestion['IPAddress'],
				'<a href="warroom.php?action=viewSuggestion&client=' . $primary_host . '&id=' . $primary_host_suggestion['id'] . '">View</a>' . ' | ' .
				'<a href="warroom.php?action=acceptSuggestion&client=' . $primary_host . '&id=' . $primary_host_suggestion['id'] . '">Accept</a>' . ' | ' .
				'<a href="warroom.php?action=rejectSuggestion&client=' . $primary_host . '&id=' . $primary_host_suggestion['id'] . '">Reject</a>',
			];
			
			$client_suggestion[] = $suggestion;
		}
		
		if($primary_host_comments_count > 0) {		
					// Display Header
				
				// -------------------------------------------------------------
			
			$header_primary_args = [
				'indentlevel'=>1,
				'title'=>$primary_host,
				'divmouseover'=>'Hey, no fighting!',
				'imagemouseover'=>'Master C is in the house!',
				'level'=>3,
				'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-gray13',
				'textclass'=>'margin-0px horizontal-center vertical-center padding-top-22px margin-bottom-10px',
				'imagedivclass'=>'border-2px margin-5px background-color-gray10',
				'imageclass'=>'border-1px height-75px',
				'domainobject'=>$this->domain_object,
				'leftimageenable'=>1,
				'rightimageenable'=>1,
			];
			
			$header->display($header_primary_args);
		
			$version_list_display_args = [
				'options'=>[
					'indentlevel'=>1,
					'tableheaders'=>0,
					'tableclass'=>'width-70percent horizontal-center border-2px background-color-gray13 margin-top-14px',
					'rowclass'=>'border-1px horizontal-left',
					'cellclass'=>[
						'border-1px vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
						'border-1px width-100percent vertical-top',
					],
				],
				'list'=>$client_suggestions,
			];
			$generic_list->Display($version_list_display_args);
		}
	}
	
?>