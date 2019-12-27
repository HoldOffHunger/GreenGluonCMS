<?php

	class module_form extends module_spacing
	{
		public function StartForm ($args)
		{
			$action = $args[action];
			$method = $args[method];
			$files = $args[files];
			
			$formid = $args[formid];
			$formclass = $args[formclass];
			
			$indent_level = $args[indentlevel];
			
			$indent_args = array(
				indentlevel=>$indent_level,
			);
			$this->DisplayIndent($indent_args);
			
			print('<form');
			
			if($formid)
			{
				print(' id="' . $formid . '"');
			}
			
			if($formclass)
			{
				print(' class="' . $formclass . '"');
			}
			
			if($action)
			{
				print(' action="' . $action . '"');
			}
			
			if(strcasecmp($method, 'get'))	# returns 0 if equal
			{
				print(' method="post"');
			}
			else
			{
				print(' method="get"');
				
			}
			
			if($files)
			{
				print(' enctype="multipart/form-data"');
			}
			
			print('>');
			
			$this->DisplayDoubleLineBreak();
		}
		
		public function EndForm ($args)
		{
			$indent_level = $args[indentlevel];
			
			$indent_args = array(
				indentlevel=>$indent_level,
			);
			$this->DisplayIndent($indent_args);
			
			print('</form>');
			
			$this->DisplayDoubleLineBreak();
		}
		
		public function DisplayFormField ($args)
		{
			$form_element_type = $args['type'];
			$form_element_title = $args['title'];
			$form_element_value = $args['value'];
			
			$form_element_name = $args['name'];
			$form_element_size = $args['size'];
			$form_element_cols = $args['cols'];
			$form_element_rows = $args['rows'];
			$form_element_multiple = $args['multiple'];
			$form_element_options = $args['options'];
			$form_element_maxlength = $args['maxlength'];
			
			$form_element_id = $args['id'];
			$form_element_class = $args['class'];
			$form_element_checked = $args['checked'];
			$form_element_selected = $args['selected'];
			$form_element_disabled = $args['disabled'];
			$form_element_readonly = $args['readonly'];
			$form_element_autofocus = $args['autofocus'];
			
			if($form_element_type)
			{
				$indent_level = $args[indentlevel];
				
				$indent_args = array(
					indentlevel=>$indent_level,
				);
				$this->DisplayIndent($indent_args);
				switch($form_element_type)
				{
					case 'textarea':
						print('<textarea');
						break;
					
					case 'select':
						print('<select ');
						break;
					
					case 'button':
						print('<button ');
						break;
					
					default:
						print('<input type="' . $form_element_type . '"');
						break;
				}
				
				if($form_element_title)
				{
					$form_element_title = str_replace('&', '&amp;', $form_element_title);
					$form_element_title = str_replace('"', '&quot;', $form_element_title);
					$form_element_title = str_replace('<', '&lt;', $form_element_title);
					$form_element_title = str_replace('>', '&gt;', $form_element_title);
					
					print(' title="' . $form_element_title . '"');
				}
				
				if($form_element_name)
				{
					print(' name="' . $form_element_name . '"');
				}
				
				if($form_element_size)
				{
					print(' size="' . $form_element_size . '"');
				}
				
				if($form_element_cols)
				{
					print(' cols="' . $form_element_cols . '"');
				}
				
				if($form_element_rows)
				{
					print(' rows="' . $form_element_rows . '"');
				}
				
				if($form_element_id)
				{
					print(' id="' . $form_element_id . '"');
				}
				
				if($form_element_class)
				{
					print(' class="' . $form_element_class . '"');
				}
				
				if($form_element_checked)
				{
					print(' checked="checked"');
				}
				
				if($form_element_selected)
				{
					print(' selected="selected"');
				}
				
				if($form_element_disabled)
				{
					print(' disabled="disabled"');
				}
				
				if($form_element_readonly)
				{
					print(' readonly="readonly"');
				}
				
				if($form_element_multiple)
				{
					print(' multiple="multiple"');
				}
				
				if($form_element_autofocus) {
					print(' autofocus');
				}
				
				$form_element_value_insert = str_replace('&', '&amp;', $form_element_value);
				$form_element_value_insert = str_replace('"', '&quot;', $form_element_value_insert);
				$form_element_value_insert = str_replace('<', '&lt;', $form_element_value_insert);
				$form_element_value_insert = str_replace('>', '&gt;', $form_element_value_insert);
				
				switch($form_element_type)
				{
					case 'textarea':
						print('>');
						
						if($form_element_value_insert)
						{
							print($form_element_value_insert);
						}
						
						print('</textarea>');
						break;
						
					case 'button':
						print('>');
						
						if($form_element_value_insert)
						{
							print($form_element_value_insert);
						}
						
						print('</button>');
						break;
					
					case 'select':
						print('>');
						
						$this->DisplayDoubleLineBreak();
						
						$option_indent_level = $indent_level + 1;
						
						foreach($form_element_options as $option_key => $options)
						{
							$indent_args = array(
								indentlevel=>$option_indent_level,
							);
							$this->DisplayIndent($indent_args);
							
							$option_value = $options[optionvalue];
							$option_title = $options[optiontitle];
							$option_mouseover = $options[optionmouseover];
							
							print('<option');
							
							print(' value="');
							
							$option_value_insert = str_replace('&', '&amp;', $option_value);
							$option_value_insert = str_replace('"', '&quot;', $option_value_insert);
							$option_value_insert = str_replace('<', '&lt;', $option_value_insert);
							$option_value_insert = str_replace('>', '&gt;', $option_value_insert);
							
							print($option_value_insert);
							print('"');
							
							if($option_mouseover)
							{
								$option_mouseover = str_replace('&', '&amp;', $option_mouseover);
								$option_mouseover = str_replace('"', '&quot;', $option_mouseover);
								$option_mouseover = str_replace('<', '&lt;', $option_mouseover);
								$option_mouseover = str_replace('>', '&gt;', $option_mouseover);
								
								print(' title="' . $option_mouseover . '"');
							}
							
							if($option_value == $form_element_selected)
							{
								print(' selected="SELECTED"');
							}
							
							print('>');
							
							print($option_title);
							
							print('</option>');
							
							$this->DisplayDoubleLineBreak();
						}
						
						$indent_args = array(
							indentlevel=>$indent_level,
						);
						$this->DisplayIndent($indent_args);
						
						print('</select>');
						
						break;
					
					default:
						if($form_element_value_insert)
						{
							print(' value="' . $form_element_value_insert . '"');
						}
						
						print('>');
						break;
				}
				
				$this->DisplayDoubleLineBreak();
				
				return TRUE;
			}
			
			return FALSE;
		}
	}
?>