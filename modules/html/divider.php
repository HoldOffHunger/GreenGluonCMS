<?php

	class module_divider extends module_spacing
	{
		public function displaystart ($args)
		{
			$indent_level = $args[indentlevel];
			
			$indent_args = array(
				indentlevel=>$indent_level,
			);
			$this->DisplayIndent($indent_args);
			
			print('<div');
			
			if($args['id'])
			{
				print(' id="' . $args['id'] . '"');
			}
			
			if($args['class'])
			{
				print(' class="' . $args['class'] . '"');
			}
			
			if($args['title'])
			{
				print(' title="' . $args['title'] . '"');
			}
			
			print('>');
			
			$this->DisplayDoubleLineBreak();
		}
		
		public function displayend ($args)
		{
			$indent_level = $args[indentlevel];
			
			$indent_args = array(
				indentlevel=>$indent_level,
			);
			$this->DisplayIndent($indent_args);
			
			print('</div>');
			
			$this->DisplayDoubleLineBreak();
		}
	}
?>