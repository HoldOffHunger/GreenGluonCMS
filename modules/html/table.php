<?php

	class module_table extends module_spacing
	{
			// Table-Level Components
		
		// -------------------------------------------------------------
		
		public function DisplayComponent_StartTable ($args)
		{
			$table_id = $args[tableid];
			$table_class = $args[tableclass];
			$table_title = $args[title];
			
			$table_align = $args[tablealign];
			$table_bgcolor = $args[tablebgcolor];
			$table_border = $args[tableborder];
			$table_cellpadding = $args[tablecellpadding];
			$table_cellspacing = $args[tablecellspacing];
			$table_width = $args[tablewidth];
			
			$indent_level = $args[indentlevel];
			$indent_args = array(
				indentlevel=>$indent_level,
			);
			$this->DisplayIndent($indent_args);
			
			print('<table');
			
			if($table_id)
			{
				print(' id="' . $table_id . '"');
			}
			
			if($table_class)
			{
				print(' class="' . $table_class . '"');
			}
			
			if($table_title)
			{
				print(' title="' . $table_title . '"');
			}
			
			if($table_align)
			{
				print(' align="' . $table_align . '"');
			}
			
			if($table_bgcolor)
			{
				print(' bgcolor="' . $table_bgcolor . '"');
			}
			
			if($table_border)
			{
				print(' border="' . $table_border . '"');
			}
			
			if($table_cellpadding)
			{
				print(' cellpadding="' . $table_cellpadding . '"');
			}
			
			if($table_cellspacing)
			{
				print(' cellspacing="' . $table_cellspacing . '"');
			}
			
			if($table_width)
			{
				print(' width="' . $table_width . '"');
			}
			
			print('>');
			
			$this->DisplayDoubleLineBreak();
			
			$this->DisplayComponent_RowStart($args);
			
			$this->DisplayComponent_CellStart($args);
		}
		
		public function DisplayComponent_EndTable ($args)
		{
			$this->DisplayComponent_CellEnd($args);
			
			$this->DisplayComponent_RowEnd($args);
			
			$indent_level = $args[indentlevel];
			$indent_args = array(
				indentlevel=>$indent_level,
			);
			$this->DisplayIndent($indent_args);
			
			print('</table>');
			
			$this->DisplayDoubleLineBreak();
		}
	
			// Script-Level Components
		
		// -------------------------------------------------------------
		
		public function DisplayComponent_SeparateCells ($args)
		{
			$this->DisplayComponent_CellEnd($args);
			
			$this->DisplayComponent_CellStart($args);
		}
		
		public function DisplayComponent_SeparateCellsAndRows ($args)
		{
			$this->DisplayComponent_CellEnd($args);
			
			$this->DisplayComponent_RowEnd($args);
			
			$this->DisplayComponent_RowStart($args);
			
			$this->DisplayComponent_CellStart($args);
		}
		
		public function DisplayComponent_SeparateCellsAndHeaderRow ($args)
		{
			$this->DisplayComponent_HeaderEnd($args);
			
			$this->DisplayComponent_RowEnd($args);
			
			$this->DisplayComponent_RowStart($args);
			
			$this->DisplayComponent_CellStart($args);
		}
		
		public function DisplayComponent_SeparateRows ($args)
		{
			$this->DisplayComponent_RowEnd($args);
			
			$this->DisplayComponent_RowStart($args);
		}
		
		public function DisplayComponent_SeparateHeaderRow ($args)
		{
			$this->DisplayComponent_HeaderEnd($args);
			
			$this->DisplayComponent_RowStart($args);
		}
	
			// Module-Level Components
		
		// -------------------------------------------------------------
		
		public function DisplayComponent_CellStart ($args)
		{
			$headers = $args[headers];
			
			$cell_id = $args[cellid];
			$cell_class = $args[cellclass];
			$cell_title = $args[celltitle];
			
			$cell_align = $args[cellalign];
			$cell_bgcolor = $args[cellbgcolor];
			$cell_colspan = $args[cellcolspan];
			$cell_headers = $args[cellheaders];			# BT: To optimize!
			$cell_height = $args[cellheight];
			$cell_rowspan = $args[cellrowspan];
			$cell_valign = $args[cellvalign];
			$cell_width = $args[cellwidth];
			
			$indent_level = $args[indentlevel];
			
			$indent_args = array(
				indentlevel=>$indent_level + 2,
			);
			$this->DisplayIndent($indent_args);
			
			if($headers)
			{
				print('<th');
			}
			else
			{
				print('<td');
			}
			
			if($cell_id)
			{
				print(' id="' . $cell_id . '"');
			}
			
			if($cell_class)
			{
				print(' class="' . $cell_class . '"');
			}
			
			if($cell_title)
			{
				print(' title="' . $cell_title . '"');
			}
			
			if($cell_align)
			{
				print(' align="' . $cell_align . '"');
			}
			
			if($cell_bgcolor)
			{
				print(' bgcolor="' . $cell_bgcolor . '"');
			}
			
			if($cell_colspan)
			{
				print(' colspan="' . $cell_colspan . '"');
			}
			
			if($cell_headers)
			{
				print(' headers="' . $cell_headers . '"');
			}
			
			if($cell_height)
			{
				print(' height="' . $cell_height . '"');
			}
			
			if($cell_rowspan)
			{
				print(' rowspan="' . $cell_rowspan . '"');
			}
			
			if($cell_valign)
			{
				print(' valign="' . $cell_valign . '"');
			}
			
			if($cell_width)
			{
				print(' width="' . $cell_width . '"');
			}
			
			print('>');
			
			$this->DisplayDoubleLineBreak();
		}
		
		public function DisplayComponent_RowStart ($args)
		{
			$row_id = $args[rowid];
			$row_class = $args[rowclass];
			$row_title = $args[rowtitle];
			
			$row_align = $args[rowalign];
			$row_bgcolor = $args[bgcolor];
			$row_valign = $args[valign];
			
			$indent_level = $args[indentlevel];
			
			$indent_args = array(
				indentlevel=>$indent_level + 1,
			);
			$this->DisplayIndent($indent_args);
			
			print('<tr');
			
			if($row_id)
			{
				print(' id="' . $row_id . '"');
			}
			
			if($row_class)
			{
				print(' class="' . $row_class . '"');
			}
			
			if($row_title)
			{
				print(' title="' . $row_title . '"');
			}
			
			if($row_align)
			{
				print(' align="' . $row_align . '"');
			}
			
			if($row_bgcolor)
			{
				print(' bgcolor="' . $row_bgcolor . '"');
			}
			
			if($row_valign)
			{
				print(' valign="' . $row_valign . '"');
			}
			
			print('>');
			
			$this->DisplayDoubleLineBreak();
		}
		
		public function DisplayComponent_HeaderEnd ($args)
		{
			$indent_level = $args[indentlevel];
			
			$indent_args = array(
				indentlevel=>$indent_level + 2,
			);
			$this->DisplayIndent($indent_args);
			
			print('</th>');
			
			$this->DisplayDoubleLineBreak();
		}
		
		public function DisplayComponent_CellEnd ($args)
		{
			$indent_level = $args[indentlevel];
			
			$indent_args = array(
				indentlevel=>$indent_level + 2,
			);
			$this->DisplayIndent($indent_args);
			
			print('</td>');
			
			$this->DisplayDoubleLineBreak();
		}
		
		public function DisplayComponent_RowEnd ($args)
		{
			$indent_level = $args[indentlevel];
			
			$indent_args = array(
				indentlevel=>$indent_level + 1,
			);
			$this->DisplayIndent($indent_args);
			
			print('</tr>');
			
			$this->DisplayDoubleLineBreak();
		}
	}
?>