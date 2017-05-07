<?php

	class module_iframe extends module_spacing
	{
		public function display ($args)
		{
			$url = $args[url];
			$class = $args['class'];
			$scrolling = $args[scrolling];
			$indent_level = $args[indentlevel];
			$auto_adjust_height = $args[autoadjustheight];
			
			$indent_args = array(
				indentlevel=>$indent_level,
			);
			$this->DisplayIndent($indent_args);
			
			print('<iframe');
			
			if($url)
			{
				print(' src="' . $url . '"');
			}
			
			$class_text = $class;
			
			if($auto_adjust_height)
			{
				if($class_text)
				{
					$class_text .= ' iframe-full-height';
				}
				else
				{
					$class_text = 'iframe-full-height';
				}
			}
			
			if($class_text)
			{
				print(' class="' . $class_text . '"');
			}
			
			if($scrolling)
			{
				print(' scrolling="' . $scrolling . '"');
			}
			
			print('>');
			
			print('</iframe>');
			
			$this->DisplayDoubleLineBreak();
		}
	}

?>