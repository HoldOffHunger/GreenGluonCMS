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
	
	if($this->primary_host_record['PrimaryColor'])
	{
		$primary_color = $this->primary_host_record['PrimaryColor'];
	}
	else
	{
		$primary_color = '6495ED';
	}
	
	$header_primary_args = array(
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
	);
	
	$header->display($header_primary_args);
		
			// Display Login Failure Message
		
		// -------------------------------------------------------------
	
	if($this->query_object->Parameter(array('parameter'=>'failure')))
	{
		$divider_padding_start_args = array(
			'class'=>'horizontal-center width-40percent margin-top-5px border-2px background-color-red15',
			'indentlevel'=>1,
		);
		
		$divider->displaystart($divider_padding_start_args);
		
		$failure_text_args = array(
			text=>'<b>Login attempt failed.  Please try again.</b>',
			indentlevel=>2,
		);
		$text->Display($failure_text_args);
		
		$divider_end_args = array(
			indentlevel=>1,
		);
		$divider->displayend($divider_end_args);
	}
	
			// Display Form Dividers
		
		// -------------------------------------------------------------
	
	$divider_padding_start_args = array(
		'class'=>'horizontal-center width-80percent margin-top-5px border-2px',
		'indentlevel'=>1,
	);
	
	$divider->displaystart($divider_padding_start_args);
		
			// Display Form Elements : Start
		
		// -------------------------------------------------------------
	
	$start_form_args = array(
		'action'=>0,
		'method'=>'post',
		'files'=>0,
		'formclass'=>'margin-0px',
		'indentlevel'=>1,
	);
	
	$form->StartForm($start_form_args);
		
			// Display Form Elements : Fields
		
		// -------------------------------------------------------------
	
	$divider_fields_args = array(
		'class'=>'horizontal-center width-80percent margin-top-5px margin-bottom-5px',
		'indentlevel'=>1,
	);
	
	$divider->displaystart($divider_fields_args);
	
	$table_start_args = array(
		id=>'user-login-credentials-table',
		tableclass=>'width-100percent margin-5px font-family-tahoma',
		tableborder=>'3',
		indentlevel=>2,
	);
	
	$table->DisplayComponent_StartTable($table_start_args);
	
	$username_text_args = array(
		text=>'Username',
		indentlevel=>5,
	);
	$text->Display($username_text_args);
	
	$separate_cells_args = array(
		cellwidth=>'99%',
		indentlevel=>2,
	);
	$table->DisplayComponent_SeparateCells($separate_cells_args);
	
	$username_args = array(
		type=>'text',
		name=>'username',
		indentlevel=>5,
		size=>40,
		autofocus=>true,
	);
	
	$form->DisplayFormField($username_args);
	
	$separate_cells_and_rows_args = array(
		indentlevel=>2,
	);
	$table->DisplayComponent_SeparateCellsAndRows($separate_cells_and_rows_args);
	
	$password_text_args = array(
		text=>'Password',
		indentlevel=>5,
	);
	$text->Display($password_text_args);
	
	$table->DisplayComponent_SeparateCells($separate_cells_args);
	
	$password_args = array(
		type=>'password',
		name=>'password',
		indentlevel=>5,
		size=>40,
	);
	
	$form->DisplayFormField($password_args);
	
	$separate_cells_and_rows_args = array(
		cellcolspan=>2,
		indentlevel=>2,
	);
	$table->DisplayComponent_SeparateCellsAndRows($separate_cells_and_rows_args);
	
	$divider_fields_args = array(
		'class'=>'horizontal-center',
		'indentlevel'=>1,
	);
	
	$divider->displaystart($divider_fields_args);
	
	$login_args = array(
		value=>'Login',
		type=>'submit',
		indentlevel=>5,
	);
	
	$form->DisplayFormField($login_args);
	
	$divider_end_args = array(
		indentlevel=>1,
	);
	$divider->displayend($divider_end_args);
	
	$table_end_args = array(
		indentlevel=>2,
	);
	$table->DisplayComponent_EndTable($table_end_args);
	
	$divider_end_args = array(
		indentlevel=>1,
	);
	$divider->displayend($divider_end_args);
	
	$hidden_action_args = array(
		name=>'action',
		value=>'Authenticate',
		type=>'hidden',
		indentlevel=>1,
	);
	
	$form->DisplayFormField($hidden_action_args);
	
			// Display Form Elements : End
		
		// -------------------------------------------------------------
	
	$end_form_args = array(
		indentlevel=>1,
	);
	$form->EndForm($end_form_args);
	
	$divider_end_args = array(
		indentlevel=>1,
	);
	$divider->displayend($divider_end_args);

?>