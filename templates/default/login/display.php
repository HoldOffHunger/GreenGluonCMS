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
	
	require('../modules/html/header.php');
	$header = new module_header;
	
			// Display Header
		
		// -------------------------------------------------------------
	
	if($this->primary_host_record['PrimaryColor']) {
		$primary_color = $this->primary_host_record['PrimaryColor'];
	} else {
		$primary_color = '6495ED';
	}
	
	$header_primary_args = [
		'indentlevel'=>1,
		'title'=>'Login to ' . $this->domain_object->primary_domain,
		'image'=>'master-c-icon.jpg',
		'divmouseover'=>'The Grand Master C.',
		'imagemouseover'=>'Master C is in the house!',
		'level'=>1,
		'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-' . $primary_color,
		'textclass'=>'margin-0px horizontal-center vertical-center padding-top-22px',
		'imagedivclass'=>'border-2px margin-5px background-color-gray10',
		'imageclass'=>'border-1px height-75px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
		'rightimageenable'=>1,
	];
	
	$header->display($header_primary_args);
		
			// Display Login Failure Message
		
		// -------------------------------------------------------------
	
	if($this->query_object->Parameter(['parameter'=>'failure'])) {
		$divider_padding_start_args = [
			'class'=>'horizontal-center width-40percent margin-top-5px border-2px background-color-red15',
			'indentlevel'=>1,
		];
		
		$divider->displaystart($divider_padding_start_args);
		
		print('<b>Login attempt failed.  Please try again.</b>');
		
		$divider_end_args = [
			'indentlevel'=>1,
		];
		$divider->displayend($divider_end_args);
	}
	
			// Display Form Dividers
		
		// -------------------------------------------------------------
	
	$divider_padding_start_args = [
		'class'=>'horizontal-center width-80percent margin-top-5px border-2px',
		'indentlevel'=>1,
	];
	
	$divider->displaystart($divider_padding_start_args);
		
			// Display Form Elements : Start
		
		// -------------------------------------------------------------
	
	print('<FORM method="POST" class="margin-0px">');
		
			// Display Form Elements : Fields
		
		// -------------------------------------------------------------
	
	$divider_fields_args = [
		'class'=>'horizontal-center width-80percent margin-top-5px margin-bottom-5px',
		'indentlevel'=>1,
	];
	
	$divider->displaystart($divider_fields_args);
	
	$table_start_args = [
		'id'=>'user-login-credentials-table',
		'tableclass'=>'width-100percent margin-5px font-family-tahoma',
		'tableborder'=>'3',
		'indentlevel'=>2,
	];
	
	$table->DisplayComponent_StartTable($table_start_args);
	
	print('Username');
	
	$separate_cells_args = [
		'cellwidth'=>'99%',
		'indentlevel'=>2,
	];
	$table->DisplayComponent_SeparateCells($separate_cells_args);
	
	$username_args = [
		'type'=>'text',
		'name'=>'username',
		'indentlevel'=>5,
		'size'=>40,
		'autofocus'=>true,
	];
	
	$form->DisplayFormField($username_args);
	
	$separate_cells_and_rows_args = [
		'indentlevel'=>2,
	];
	$table->DisplayComponent_SeparateCellsAndRows($separate_cells_and_rows_args);
	
	print('Password');
	
	$table->DisplayComponent_SeparateCells($separate_cells_args);
	
	$password_args = [
		'type'=>'password',
		'name'=>'password',
		'indentlevel'=>5,
		'size'=>40,
	];
	
	$form->DisplayFormField($password_args);
	
	$separate_cells_and_rows_args = [
		'cellcolspan'=>2,
		'indentlevel'=>2,
	];
	$table->DisplayComponent_SeparateCellsAndRows($separate_cells_and_rows_args);
	
	$divider_fields_args = [
		'class'=>'horizontal-center',
		'indentlevel'=>1,
	];
	
	$divider->displaystart($divider_fields_args);
	
	print('<input type="submit" value="Login" id="submit" />');
	
	$divider_end_args = [
		'indentlevel'=>1,
	];
	$divider->displayend($divider_end_args);
	
	$table_end_args = [
		'indentlevel'=>2,
	];
	$table->DisplayComponent_EndTable($table_end_args);
	
	$divider_end_args = [
		'indentlevel'=>1,
	];
	$divider->displayend($divider_end_args);
	
			// Display Form Elements : Google Login
		
		// -------------------------------------------------------------
	
	print('<BR>');
	
	print('<center>');
	print('<div class="g-signin2" data-onsuccess="onSignIn"></div>');
	print('</center>');
	
	print('<BR>');
	
			// Display Form Elements : Hidden
		
		// -------------------------------------------------------------
	
	$hidden_action_args = [
		'name'=>'action',
		'value'=>'Authenticate',
		'type'=>'hidden',
		'indentlevel'=>1,
	];
	
	$form->DisplayFormField($hidden_action_args);
	
	print('<input type="hidden" name="google_token_id" id="google_token_id" class="google_token_id">');
	print('<input type="hidden" id="redirect" name="redirect" value="' . $this->param('redirect') . '">');
	
			// Display Form Elements : End
		
		// -------------------------------------------------------------
	
	print('</form>');
	print('</div>');

?>