<?php

	class module_genericlist extends module_spacing
	{
			// Display List
		
		// -------------------------------------------------------------
		
		public function Display ($args)
		{
			$options = $args['options'];
			$list = $args['list'];
#			print_r($list);
			$indent_level = $options['indentlevel'];
			$table_headers = $options['tableheaders'];
			$table_class = $options['tableclass'];
			$row_class = $options['rowclass'];
			$cell_class = $options['cellclass'];
			
			$table_start_args = array(
				'indentlevel'=>$indent_level,
				'tableclass'=>$table_class,
			);
			
			$this->Display_TableStart($table_start_args);
			
			$table_body_args = array(
				'indentlevel'=>$indent_level,
				'tableheaders'=>$table_headers,
				'rowclass'=>$row_class,
				'cellclass'=>$cell_class,
				'list'=>$list,
			);
			
			$this->Display_TableBody($table_body_args);
			
			$table_end_args = array(
				'indentlevel'=>$indent_level,
			);
			
			$this->Display_TableEnd($table_end_args);
		}
		
		public function Display_TableBody($args)
		{
			$indent_level = $args['indentlevel'];
			$table_headers = $args['tableheaders'];
			$row_class = $args['rowclass'];
			$cell_class = $args['cellclass'];
			$list = $args['list'];
			
			if($table_headers)
			{
				$table_row_start_args = array(
					'indentlevel'=>$indent_level,
					'rowclass'=>$row_class,
				);
				
				$this->Display_RowStart($table_row_start_args);
				
				$table_header_row = $list[0];
				unset($list[0]);
				
				$table_header_row_args = array(
					'headerrow'=>$table_header_row,
					'indentlevel'=>$indent_level,
				);
				
				if(is_array($cell_class))
				{
					$table_header_row_args['cellclass'] = array_shift($cell_class);
				}
				else
				{
					$table_header_row_args['cellclass'] = $cell_class;
				}
				
				$this->Display_TableBodyHeader($table_header_row_args);
				
				$table_row_end_args = array(
					'indentlevel'=>$indent_level,
				);
				
				$this->Display_RowEnd($table_row_end_args);
				
				$cell_class = $args['cellclass'];
			}
			
			foreach ($list as $item)
			{
				$table_row_start_args = array(
					'indentlevel'=>$indent_level,
					'rowclass'=>$row_class,
				);
				
				$this->Display_RowStart($table_row_start_args);
				
				foreach ($item as $cell)
				{
					$table_cell_start_args = array(
						'indentlevel'=>$indent_level,
					);
					
					if(is_array($cell_class))
					{
						$table_cell_start_args['cellclass'] = array_shift($cell_class);
					}
					else
					{
						$table_cell_start_args['cellclass'] = $cell_class;
					}
					$table_cell_start_args['contents'] = $cell;
					
					$this->Display_CellStart($table_cell_start_args);
					
					$table_cell_contents_args = array(
						'indentlevel'=>$indent_level,
						'contents'=>$cell,
					);
					
					$this->Display_CellContents($table_cell_contents_args);
					
					$table_cell_end_args = array(
						'indentlevel'=>$indent_level,
					);
					
					$this->Display_CellEnd($table_cell_end_args);
				}
				
				$table_row_end_args = array(
					'indentlevel'=>$indent_level,
				);
				
				$this->Display_RowEnd($table_row_end_args);
				
				$cell_class = $args['cellclass'];
			}
		}
		
		public function Display_CellContents($args)
		{
			$indent_level = $args['indentlevel'];
			$contents = $args['contents'];
			
			$indent_args = array(
				indentlevel=>$indent_level + 3,
			);
			$this->DisplayIndent($indent_args);
			
			if(is_array($contents))
			{
				print($contents['contents']);
			}
			else
			{
				if(!strlen($contents))
				{
					$contents = '&nbsp;';
				}
				
				print($contents);
			}
			
			$this->DisplayDoubleLineBreak();
		}
		
		public function Display_CellStart($args)
		{
			$indent_level = $args['indentlevel'];
			$cell_class = $args['cellclass'];
			$contents = $args['contents'];
			
			$indent_args = array(
				indentlevel=>$indent_level + 2,
			);
			$this->DisplayIndent($indent_args);
			
			print('<td');
			
			if($cell_class)
			{
				print(' class="' . $cell_class . '"');
			}
			
			if(is_array($contents))
			{
				$mouseover = $contents['mouseover'];
				
				if($mouseover)
				{
					$mouseover = str_replace('"', '&quot;', $mouseover);
					print(' title="' . $mouseover . '"');
				}
			}
			
			print('>');
			
			$this->DisplayDoubleLineBreak();
		}
		
		public function Display_CellEnd($args)
		{
			$indent_level = $args['indentlevel'];
			
			$indent_args = array(
				indentlevel=>$indent_level + 2,
			);
			$this->DisplayIndent($indent_args);
			
			print('</td>');
			
			$this->DisplayDoubleLineBreak();
		}
		
		public function Display_RowStart($args)
		{
			$indent_level = $args['indentlevel'];
			$row_class = $args['rowclass'];
			
			$indent_args = array(
				indentlevel=>$indent_level + 1,
			);
			$this->DisplayIndent($indent_args);
			
			print('<tr');
			
			if($row_class)
			{
				print(' class="' . $row_class . '"');
			}
			
			print('>');
			
			$this->DisplayDoubleLineBreak();
		}
		
		public function Display_RowEnd($args)
		{
			$indent_level = $args['indentlevel'];
			
			$indent_args = array(
				indentlevel=>$indent_level + 1,
			);
			$this->DisplayIndent($indent_args);
			
			print('</tr>');
			
			$this->DisplayDoubleLineBreak();
		}
		
		public function Display_TableBodyHeader($args)
		{
			$header_row = $args['headerrow'];
			$indent_level = $args['indentlevel'];
			$cell_class = $args['cellclass'];
			
			foreach ($header_row as $item)
			{
				$indent_args = array(
					indentlevel=>$indent_level + 2,
				);
				$this->DisplayIndent($indent_args);
				
				print('<th');
				
				if($cell_class)
				{
					print(' class="' . $cell_class . '"');
				}
				
				print('>');
				
				$this->DisplayDoubleLineBreak();
				
				$indent_args = array(
					indentlevel=>$indent_level + 3,
				);
				$this->DisplayIndent($indent_args);
				
				print($item);
				
				$this->DisplayDoubleLineBreak();
				
				$indent_args = array(
					indentlevel=>$indent_level + 2,
				);
				$this->DisplayIndent($indent_args);
				
				print('</th>');
				
				$this->DisplayDoubleLineBreak();
			}
		}
		
		public function Display_TableStart($args)
		{
			$indent_level = $args['indentlevel'];
			$table_class = $args['tableclass'];
			
			$indent_args = array(
				indentlevel=>$indent_level,
			);
			$this->DisplayIndent($indent_args);
			
			print('<table');
			
			if($table_class)
			{
				print(' class="' . $table_class . '"');
			}
			
			print('>');
			
			$this->DisplayDoubleLineBreak();
		}
		
		public function Display_TableEnd($args)
		{
			$indent_level = $args['indentlevel'];
			
			$indent_args = array(
				indentlevel=>$indent_level,
			);
			$this->DisplayIndent($indent_args);
			
			print('</table>');
			
			$this->DisplayDoubleLineBreak();
		}
	}
?>