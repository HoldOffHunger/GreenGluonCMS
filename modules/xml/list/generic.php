<?php

	class module_genericlist extends module_spacing
	{
				// Display List
			
			// -------------------------------------------------------------
			
		public function Display($args)
		{
			$options = $args['options'];
			$list = $args['list'];
			
			$indent_level = $options['indentlevel'];
			$human_readable = $options['humanreadable'];
			
			$this->DisplayList(['list'=>$list, 'humanreadable'=>$human_readable, indentlevel=>$indent_level]);
		}
		
		public function DisplayList($args)
		{
			$list = $args['list'];
			$indent_level = $args['indentlevel'];
			$human_readable = $args['humanreadable'];
			
			foreach($list as $list_key => $list_items)
			{
				$this->DisplayList_DisplayItem([listitems=>$list_items, 'humanreadable'=>$human_readable, indentlevel=>$indent_level]);
			}
		}
		
		public function DisplayList_DisplayItem($args)
		{
			$list_items = $args['listitems'];
			$indent_level = $args['indentlevel'];
			$human_readable = $args['humanreadable'];
			
			foreach($list_items as $list_key => $list_item)
			{
				if(is_array($list_item))
				{
					$next_index = $indent_level;
					if(!is_int($list_key))
					{
						if($human_readable)
						{
							$this->DisplayIndent([indentlevel=>$indent_level]);
						}
						
						print('<' . $list_key . '>');
						
						if($human_readable)
						{
							$this->DisplayDoubleLineBreak();
						}
						
						$next_index++;
					}
					
					$this->DisplayList_DisplayItem(['listitems'=>$list_item, 'humanreadable'=>$human_readable, indentlevel=>$next_index]);
					
					if(!is_int($list_key))
					{
						if($human_readable)
						{
							$this->DisplayIndent([indentlevel=>$indent_level]);
						}
						
						$list_key_usable = explode(' ', $list_key)[0];
						
						print('</' . $list_key_usable . '>');
						
						if($human_readable)
						{
							$this->DisplayDoubleLineBreak();
						}
					}
				}
				else
				{
					if($human_readable)
					{
						$this->DisplayIndent([indentlevel=>$indent_level]);
					}
					
					print('<' . $list_key  . '>' . $list_item . '</' . $list_key . '>');
					
					if($human_readable)
					{
						$this->DisplayDoubleLineBreak();
					}
				}
			}
		}
			
				// Antiquated Functions for HTML backward compatibility
			
			// -------------------------------------------------------------
			
		public function Display_TableBody($args)
		{
		}
		
		public function Display_CellContents($args)
		{
		}
		
		public function Display_CellStart($args)
		{
		}
		
		public function Display_CellEnd($args)
		{
		}
		
		public function Display_RowStart($args)
		{
		}
		
		public function Display_RowEnd($args)
		{
		}
		
		public function Display_TableBodyHeader($args)
		{
		}
		
		public function Display_TableStart($args)
		{
		}
		
		public function Display_TableEnd($args)
		{
		}
	}
?>