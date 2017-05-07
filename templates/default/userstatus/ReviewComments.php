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
		'class'=>'margin-5px padding-5px',
	];
	
	$divider_end_args = [
		'indentlevel'=>1,
	];
	
			// Display Header
		
		// -------------------------------------------------------------
	
	$header_primary_args = array(
		'indentlevel'=>1,
		'title'=>$this->domain_object->primary_domain . ' System Page : Review Comments',
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
	
			// Start Div
		
		// -------------------------------------------------------------

	print('<center>');
	
			// Start Form
		
		// -------------------------------------------------------------

	$start_form_args = [
		'action'=>0,
		'method'=>'post',
		'formclass'=>'margin-0px',
		'indentlevel'=>1,
	];
	
	$form->StartForm($start_form_args);
	
			// Display Comments
		
		// -------------------------------------------------------------
	
	foreach($this->comments as $comment)
	{
		print('<div class="border-2px background-color-gray13 margin-5px horizontal-center width-90percent font-family-tahoma">');
		print('<div class="horizontal-left margin-5px">');
		
		print('<p class="margin-5px">Comment ' . $comment['id'] . ' / User ' . $comment['user']['id'] . ' / Entry ' . $comment['entry']['id'] . ' (Language: ' . $comment['Language'] . ')<br>');
		
		$date_epoch_time = strtotime($comment['OriginalCreationDate']);
		$full_date = date("F d, Y; H:i:s", $date_epoch_time);
		
		print('Date : ' . $full_date . '<br>');
		
		print('IP Address : ' . $comment['IPAddress'] . '<br>');
		
		print('User : <a href="' . $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/users.cgi?action=viewuser&user=' . urlencode($comment['user']['Username']) . '">' . $comment['user']['Username'] . ' (' . $comment['user']['EmailAddress'] . ')</a><br>');
		
		$parent_codes = [];
		$parents = $comment['entry']['parents'];
		
		foreach($parents as $parent_key => $parent)
		{
			$parent_codes[] = $parent['Code'];
			
			if($parent['id'] != $comment['entry']['id'])
			{
				$last_parent = $parent;
			}
		}
		
		print('Entry : <a href="' . $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/' . implode('/', $parent_codes) . '/view.php">' .  $comment['entry']['Title']);
		
		if($last_parent && $last_parent['id'])
		{
			print(' (of ' . $last_parent['Title'] . ')');
		}
		
		print('</a>');
		
		print('</p>');
		
		$comment_text = str_replace("\n", '<br>', strip_tags($comment['Comment']));
		print('<blockquote>');
		print($comment_text);
		print('</blockquote>');
		
		print('<input type="radio" name="accept_reject_comment_' . $comment['id'] . '" value="Accept">');
		print('Accept');
		print('<br>');
		print('<input type="radio" name="accept_reject_comment_' . $comment['id'] . '" value="Reject">');
		print('Reject');
		print('<br>');
		print('<input type="radio" name="accept_reject_comment_' . $comment['id'] . '" value="Clear">');
		print('Clear (No Decision)');
		
		print('</div>');
		print('</div>');
		
	#	print("BT: Comment Entry!!!  <BR><BR><PRE>");
	#	print_r($comment['entry']);
	#	print("</PRE>");
	}
	
			// Submit Button
		
		// -------------------------------------------------------------
	
	if(count($this->comments) < 1)
	{
		print('<br>');
	}
	
	$type_args = [
		type=>'submit',
		name=>'submit',
		value=>'Save Changes to Comments',
		indentlevel=>5,
	];
				
	$form->DisplayFormField($type_args);
	
			// Finish Form
		
		// -------------------------------------------------------------
		
	$end_form_args = [
		indentlevel=>1,
	];
	$form->EndForm($end_form_args);
	
			// Finish Div
		
		// -------------------------------------------------------------
	
	print('</center>');
	
?>