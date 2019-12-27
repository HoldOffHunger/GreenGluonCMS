<?php

	class module_header extends module_spacing
	{
		public function display ($args) {
			$title = $args[title];
			$image = $args[image];
			$level = $args[level];
			$domain_object = $args[domainobject];
			$div_mouseover = $args[divmouseover];
			$text_class = $args[textclass];
			$text_span_class = $args[textspanclass];
			$image_mouseover = $args[imagemouseover];
			$image_class = $args[imageclass];
			$image_div_class = $args[imagedivclass];
			$class = $args['divclass'];
			$indent_level = $args[indentlevel];
			$left_image_enable = $args[leftimageenable];
			$right_image_enable = $args[rightimageenable];
			$link = $args[link];
			$style = $args['style'];
			$header_style = $args['headerstyle'];
			$float_right = $args['floatright'];
			
			if($link)
			{
				if($class)
				{
					$class .= ' linked-header cursor-pointer';
				}
				else
				{
					$class = 'linked-header cursor-pointer';
				}
			}
			
			if($header_style)
			{
				$header_text_style = ' style="' . $header_style . '"';
			}
			elseif($level == 1)
			{
				$header_text_style = ' style="display: inline-block;margin-top:15px;"';
			}
			else
			{
				$header_text_style = '';
			}
			
			if($class)
			{
				$class_text = ' class="' . $class . '"';
			}
			else
			{
				$class_text = '';
			}
			
			if($style)
			{
				$style_text = ' style="' . $style . '"';
			}
			else
			{
				$style_text = '';
			}
			
			if($div_mouseover)
			{
				$div_text = ' title="' . $div_mouseover . '"';
			}
			else
			{
				$div_text = '';
			}
			
			$indent_args = array(
				indentlevel=>$indent_level,
			);
			$this->DisplayIndent($indent_args);
			
			print('<div id="header_backgroundimageurl" ' . $class_text . $style_text . $div_text . '>');
			$this->DisplayDoubleLineBreak();
			
			if($image && ($left_image_enable || $right_image_enable))
			{
				print('<table width="100%"><tr><td width="1">');
				
				if($left_image_enable) {
					print('<center>');
					$this->display_Image($args);
					print('</center>');
					print('</td><td>');
				}
			}
			
			if($text_span_class)
			{
				$text_span_class = ' ' . $text_span_class;
			}
			
			if($text_class)
			{
				$text_class = ' ' . $text_class;
			}
			
			$indent_args = array(
				indentlevel=>$indent_level + 1,
			);
			$this->DisplayIndent($indent_args);
			
			print('<div' . $header_text_style . ' class="span-header-' . $level . $text_span_class . '">');
			
			print('<h' . $level . ' style="margin:5px;padding:5px;display: inline-block;border:black 2px solid;background-color:#FFFFFF;" class="header-' . $level . $text_class . '">');
			
			if($link)
			{
				print('<a href="' . $link . '" class="header-link-url">');
			}
			
			print($title);
			
			if($link)
			{
				print('</a>');
			}
			
			print('</h' . $level . '>');
			print('</div>');
			
			$this->DisplayDoubleLineBreak();
			
			if($float_right)
			{
				print('<div class="border-2px background-color-gray15 margin-5px float-right">');
				print('<p class="margin-5px font-family-arial horizontal-right font-size-85percent"><strong>');
				print('<span id="header_backgroundimagetext" class="active-background-image-text">');
				print($float_right);
				print('</span>');
				print('</strong></p>');
				print('</div>');
			}
			
			if($image && ($left_image_enable || $right_image_enable))
			{
				if($right_image_enable)
				{
					print('</td><td width="1">');
					print('<center>');
					$this->display_Image($args);
					print('</center>');
					print('</td>');
				} else {
					print('</td>');
				}
				print('</tr></table>');
			}
			
			$this->DisplayDoubleLineBreak();
			
			$indent_args = array(
				indentlevel=>$indent_level,
			);
			$this->DisplayIndent($indent_args);
			
			print('</div>');
			
			$this->DisplayDoubleLineBreak();
		}
		
		public function display_Image ($args)
		{
			$image = $args[image];
			$domain_object = $args[domainobject];
			$div_mouseover = $args[divmouseover];
			$text_class = $args[textclass];
			$text_span_class = $args[textspanclass];
			$image_mouseover = $args[imagemouseover];
			$image_class = $args[imageclass];
			$image_div_class = $args[imagedivclass];
			$left_image_enable = $args[leftimageenable];
			$right_image_enable = $args[rightimageenable];
			$right_image = $args[rightimage];
			
			if($image_mouseover)
			{
				$image_text = ' title="' . $image_mouseover . '"';
			}
			else
			{
				$image_text = '';
			}
			
			if($image_div_class)
			{
				$image_divclass_text = ' class="' . $image_div_class . '"';
			}
			else
			{
				$image_divclass_text = '';
			}
			
			if($image_class)
			{
				$left_image_class_text = ' class="' . $image_class . '"';
				$right_image_class_text = ' class="flip-image ' . $image_class . '"';
			}
			else
			{
				$left_image_class_text = '';
				$right_image_class_text = ' class="flip-image"';
			}
			
			$primary_domain_args = array(
				'secure'=>0,
				'www'=>1,
				'lowercased'=>1,
			);
			
			$indent_level = $args[indentlevel];
			
			$primary_domain = $domain_object->GetPrimaryDomain($primary_domain_args);
			
			$opening_div_args = array(
				indentlevel=>$indent_level,
			);
			
			$padding_div_args = array(
				indentlevel=>$indent_level,
				imagedivclasstext=>$image_divclass_text,
			);
			
			if($left_image_enable || $right_image_enable)
			{
				$this->display_Image_LeftImageOpeningDiv($opening_div_args);
				
				$this->display_Image_ImagePaddingDiv($padding_div_args);
				
				$image_tag_args = array(
					indentlevel=>$indent_level,
					primarydomain=>$primary_domain,
					image=>$image,
					imagetext=>$image_text,
					imageclasstext=>$left_image_class_text,
				);
				
				$this->display_Image_ImageTag($image_tag_args);
				
				$closing_div_args = array(
					indentlevel=>$indent_level,
				);
				$this->display_Image_ClosingDivs($closing_div_args);
			}
		}
		
		public function display_Image_LeftImageOpeningDiv ($args)
		{
			$indent_level = $args[indentlevel];
			
			$indent_args = array(
				indentlevel=>$indent_level + 1,
			);
			$this->DisplayIndent($indent_args);
			
			print('<div class="float-left padding-5-px">');
			$this->DisplayDoubleLineBreak();
		}
		
		public function display_Image_RightImageOpeningDiv ($args)
		{
			$indent_level = $args[indentlevel];
			
			$indent_args = array(
				indentlevel=>$indent_level + 1,
			);
			$this->DisplayIndent($indent_args);
			
			print('<div class="float-right padding-5-px">');
			$this->DisplayDoubleLineBreak();
		}
		
		public function display_Image_ImagePaddingDiv ($args)
		{
			$image_divclass_text = $args[imagedivclasstext];
			$indent_level = $args[indentlevel];
			
			$indent_args = array(
				indentlevel=>$indent_level + 2,
			);
			$this->DisplayIndent($indent_args);
			
			print('<div' . $image_divclass_text . '>');
			$this->DisplayDoubleLineBreak();
		}
		
		public function display_Image_ImageTag ($args)
		{
			$primary_domain = $args[primarydomain];
			$image = $args[image];
			$image_text = $args[imagetext];
			$image_class_text = $args[imageclasstext];
			
			$indent_level = $args[indentlevel];
			
			$indent_args = array(
				indentlevel=>$indent_level + 3,
			);
			$this->DisplayIndent($indent_args);
			
			print('<img src="' . $primary_domain . '/image/' . $image . '"' . $image_text . $image_class_text . '>');
			$this->DisplayDoubleLineBreak();
		}
		
		public function display_Image_ClosingDivs ($args)
		{
			$indent_level = $args[indentlevel];
			
			$indent_args = array(
				indentlevel=>$indent_level + 2,
			);
			
			$this->DisplayIndent($indent_args);
			print('</div>');
			$this->DisplayDoubleLineBreak();
			
			$indent_args = array(
				indentlevel=>$indent_level + 1,
			);
			
			$this->DisplayIndent($indent_args);
			print('</div>');
			$this->DisplayDoubleLineBreak();
		}
	}
?>