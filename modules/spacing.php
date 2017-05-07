<?php

	class module_spacing
	{
		public function DisplayDoubleLineBreak ()
		{
			$this->DisplayLineBreak();
			$this->DisplayLineBreak();
		}
		
		public function DisplayLineBreak ()
		{
			print("\n");
		}
		
		public function DisplayIndent ($args)
		{
			$indent_level = $args[indentlevel];
			
			$indent_printable = str_repeat("\t", $indent_level);
			
			print($indent_printable);
		}
	}
?>