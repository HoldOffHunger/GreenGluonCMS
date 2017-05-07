<?php

	class module_text extends module_spacing
	{
				// Script-Level Components
			
			// -------------------------------------------------------------
		
		//header, span, p, etc.?
		
		public function Display ($args)
		{
			$indent_level = $args[indentlevel];
			$indent_args = array(
				indentlevel=>$indent_level,
			);
			$this->DisplayIndent($indent_args);
			
			$text = $args[text];
			
			print($text);
			
			$this->DisplayDoubleLineBreak();
		}
	} 

?>