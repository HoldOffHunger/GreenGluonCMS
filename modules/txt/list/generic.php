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
			
			foreach($list as $list_item)
			{
				print(' * ' . $list_item . "\n");
			}
		}
			
				// Antiquated Functions for HTML backward compatibility
			
			// -------------------------------------------------------------
		
		public function DisplayList($args)
		{
		}
		
		public function DisplayList_DisplayItem($args)
		{
		}
			
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