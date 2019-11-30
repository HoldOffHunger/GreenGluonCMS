<?php

	class style extends basicscript
	{
		public $desired_style;
		public $desired_parameter;
		public $desired_classname;
		public $attributes_and_values;
		
		public function Display()
		{
		#	$this->Display_DefinitionStart();
			$this->Display_Attributes();
		#	$this->Display_DefinitionEnd();
			
			return TRUE;
		}
		
		public function IsAccessible()
		{
			if($this->script_extension == 'css')
			{
				if(!$this->format_object->OneCSSFilePerPage())
				{
						// functionalize
					$css_styles_with_parameters = $this->CSSStylesWithParameters();
					$requested_css_url = $_SERVER['REQUEST_URI'];
					
					$requested_css_url_explosion = explode('.css', $requested_css_url);
					array_pop($requested_css_url_explosion);
					$requested_css_url_path = implode('', $requested_css_url_explosion);
					
					$requested_css_url_explosion = explode('-', $requested_css_url_path);
					$requested_css_parameter = array_pop($requested_css_url_explosion);
					$requested_css_url_base = implode('-', $requested_css_url_explosion);
					
				//	print(" (((" . $requested_css_url_base . ")))");
					
					if(in_array($requested_css_url_base, $css_styles_with_parameters))
					{
						$this->desired_style = $requested_css_url_base;
						$this->desired_parameter = $requested_css_parameter;
						
						$this->SetClassName();
					#	$requested_css_url_explosion = explode('/', $requested_css_url);
					#	$this->desired_classname = array_pop($requested_css_url_explosion);
					}
					else
					{
						$css_styles_without_parameters = $this->CSSStylesWithoutParameters();
						
						if(in_array($requested_css_url_path, $css_styles_without_parameters))
						{
							$this->desired_style = $requested_css_url_path;
							$this->desired_parameter = FALSE;
							
							$this->SetClassName();
						}
						else
						{
							$this->desired_style = FALSE;
							$this->desired_parameter = FALSE;
						}
					}
					
					if($this->desired_style)
					{
						$this->SetAttributesAndValues();
						return $this->attributes_and_values;
					}
				}
				else
				{
					foreach([$this->domain_object->host, 'default'] as $option)
					{
						$script_css_location = '../templates/' . $option . '/' . $this->object_code . '/' . $this->script_file . '_css.php';
					#	print("BT: " . $script_css_location);
				#		print_r($this->object_type);
						if(is_file($script_css_location) == TRUE)
						{
							$css_files = file($script_css_location);
					#		print("BT!");
							if(strlen($css_files[0]) > 0)
							{
								$this->script_css_file_locations = $css_files;
								return TRUE;
							}
						}
					}
				}
			}
			
			return FALSE;
		}
		
		public function SetClassname()
		{
			$css_base_url = $this->desired_style;
		#	print("CSS BASE URL: " . $css_base_url . "|");
			$css_base_url_explosion = explode('/', $css_base_url);
			if($this->desired_parameter)
			{
				$this->desired_classname = array_pop($css_base_url_explosion) . '-' . $this->desired_parameter;
			}
			else
			{
				$this->desired_classname = array_pop($css_base_url_explosion);
			}
		}
		
		public function SetAttributesAndValues()
		{
			$display_attributes_function = $this->desired_style;
			$display_attributes_function = str_replace('/','_',$display_attributes_function);
			$display_attributes_function = str_replace('-','',$display_attributes_function);
			$display_attributes_function = 'Display_Attributes' . $display_attributes_function;
			
			$this->attributes_and_values = $this->$display_attributes_function();
		}
		
		public function Display_DefinitionStart()
		{
			require($this->CSS_ClassDefinitionLocation());
			
			print($this->desired_classname);
			$this->DisplaySingleReturn();
			
			require($this->CSS_DefinitionStartLocation());
			$this->DisplaySingleReturn();
		}
		
		public function Display_DefinitionEnd()
		{
			require($this->CSS_DefinitionEndLocation());
			$this->DisplaySingleReturn();
		}
		
		public function Display_Attributes()
		{
			print('.document-image-holder {');
			print("\n");
			
			print("\t");
			print('margin:10px; border:1px solid black;');
			
			print("\n");
			print('}');
			print("\n\n");
			
			print('.document-image-holder-left {');
			print("\n");
			
			print("\t");
			print('float:left;');
			
			print("\n");
			print('}');
			print("\n\n");
			
			print('.document-image-holder-right {');
			print("\n");
			
			print("\t");
			print('float:right;');
			
			print("\n");
			print('}');
			print("\n\n");
			
			print('.document-image {');
			print("\n");
			
			print("\t");
			print('margin-top:2px;');
			print('margin-bottom:2px;');
			print('display:block;');
			
			print('margin-left:auto;');
			print('margin-right:auto;');
			
	#						'margin-left'=>'auto',
	#						'margin-right'=>'auto',
			
			print("\n");
			print('}');
			print("\n\n");
			
			if(!$this->format_object->OneCSSFilePerPage()) {
				$definitions_array = [];
				$class_definition = file_get_contents($this->CSS_ClassDefinitionLocation());
				$class_definition_separator = file_get_contents($this->CSS_ClassSeparatorLocation());
				$class_definition_spacing = file_get_contents('../format/html/basics/spacing/return.html');
				foreach ($this->attributes_and_values as $definition)
				{
					if(is_array($definition))
					{
						$definitions_to_display = $class_definition . implode($definitions_array, $class_definition_separator . $class_definition_spacing . $class_definition) . $class_definition_spacing;
						print($definitions_to_display);
						
						require($this->CSS_DefinitionStartLocation());
						$this->DisplaySingleReturn();
						foreach ($definition as $key => $value)
						{
							$attribute_args = [
								'desiredstyle'=>$key,
								'desiredvalue'=>$value,
							];
							$this->Display_Attribute($attribute_args);
						}
						
						require($this->CSS_DefinitionEndLocation());
						$this->DisplayDoubleReturns();
						
						unset($definitions_array);
						$definitions_array = [];
					}
					else
					{
						array_push($definitions_array, $definition);
					#	require($this->CSS_ClassDefinitionLocation());
						
					#	print ($definition);
					#	print($this->desired_classname);
					#	$this->DisplaySingleReturn();
					}
				}
			}
			else
			{
				$definitions_array = [];
				$class_definition = file_get_contents($this->CSS_ClassDefinitionLocation());
				$class_definition_separator = file_get_contents($this->CSS_ClassSeparatorLocation());
				$class_definition_spacing = file_get_contents('../format/html/basics/spacing/return.html');
			#	print("yeah, you know it");
			#	print_r($this->script_css_file_locations);
				$css_styles_with_parameters = $this->CSSStylesWithParameters();
				$css_styles_without_parameters = $this->CSSStylesWithoutParameters();
				foreach ($this->script_css_file_locations as $script_css_file_location)
				{
				#	print(" FILE ??? " . $script_css_file_location . "\n\n");
					if(strlen($script_css_file_location) > 0)
					{
						# BT: HERE!!!!
						$script_css_file_location = '/css/' . $script_css_file_location;
						$script_css_file_location_explosion = explode('.css', $script_css_file_location);
						array_pop($script_css_file_location_explosion);
						$script_css_file_url_path = implode('', $script_css_file_location_explosion);
						
						$script_css_file_url_path_explosion = explode('-', $script_css_file_url_path);
						$script_css_parameter = array_pop($script_css_file_url_path_explosion);
						$script_css_url_base = implode('-', $script_css_file_url_path_explosion);
						
						if(in_array($script_css_url_base, $css_styles_with_parameters))
						{
							$this->desired_style = $script_css_url_base;
							$this->desired_parameter = $script_css_parameter;
							
							$this->SetClassName();
						}
						else
						{
							if(in_array($script_css_file_url_path, $css_styles_without_parameters))
							{
								$this->desired_style = $script_css_file_url_path;
								$this->desired_parameter = FALSE;
								
								$this->SetClassName();
							}
							else
							{
								$this->desired_style = FALSE;
								$this->desired_parameter = FALSE;
							}
						}
						
						if($this->desired_style)
						{
						#	print("BT?");
							$this->SetAttributesAndValues();
						#	print("BT:!");
							foreach ($this->attributes_and_values as $definition)
							{
								if(is_array($definition))
								{
									$definitions_to_display = $class_definition . implode($definitions_array, $class_definition_separator . $class_definition_spacing . $class_definition) . $class_definition_spacing;
									print($definitions_to_display);
									
									require($this->CSS_DefinitionStartLocation());
									$this->DisplaySingleReturn();
									foreach ($definition as $key => $value)
									{
										$attribute_args = [
											'desiredstyle'=>$key,
											'desiredvalue'=>$value,
										];
										$this->Display_Attribute($attribute_args);
									}
									
									require($this->CSS_DefinitionEndLocation());
									$this->DisplayDoubleReturns();
									
									unset($definitions_array);
									$definitions_array = [];
								}
								else
								{
									array_push($definitions_array, $definition);
								#	require($this->CSS_ClassDefinitionLocation());
									
								#	print ($definition);
								#	print($this->desired_classname);
								#	$this->DisplaySingleReturn();
								}
							}
						}
					}
				}
			}
			
			return TRUE;
		}
		
		public function Display_Attribute($args)
		{
			$desired_style = $args[desiredstyle];
			$desired_value = $args[desiredvalue];
			
			$this->DisplaySingleTab();
			print($desired_style);
			require($this->CSS_AttributeDefinitionLocation());
			print($desired_value);
			require($this->CSS_AttributeEndLocation());
			$this->DisplaySingleReturn();
		}
		
			// CSS-Type File Information ~ Attributes
			// -----------------------------------------------
			
				// Attribute Helpers
				// -----------------------------------------------
		
		public function Display_Attributes_GetPixelOrPercentage()
		{
			$last_two_chars = substr($this->desired_parameter, -2, 2);
			
			if($last_two_chars == 'px')
			{
				$pixel_count_string_length = strlen($this->desired_parameter);
				$pixel_count_string = substr($this->desired_parameter, 0, $pixel_count_string_length - 2);
				
				$cleanse_count_args = [
					'input'=>$pixel_count_string,
				];
				
				$pixel_count = $this->cleanser_object->CleanseInput_Integer($cleanse_count_args)[cleansedinput];
				
				return [
					'number'=>$pixel_count,
					'symbol'=>'px',
				];
			}
			else
			{
				$last_seven_chars = substr($this->desired_parameter, -7, 7);
				
				if($last_seven_chars == 'percent')
				{
					$percent_count_string_length = strlen($this->desired_parameter);
					$percent_count_string = substr($this->desired_parameter, 0, $percent_count_string_length - 7);
					
					$cleanse_count_args = [
						'input'=>$percent_count_string,
					];
					
					$percent_count = $this->cleanser_object->CleanseInput_Integer($cleanse_count_args)[cleansedinput];
					
					return [
						'number'=>$percent_count,
						'symbol'=>'%',
					];
				}
			}
			
			return FALSE;
		}
		
		public function Display_Attributes_IsValidHTMLHexNumber()
		{
			if(ctype_xdigit($this->desired_parameter) && strlen($this->desired_parameter) == 6)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		
		public function Display_Attributes_SimplePixelOrPercentageDisplay($args)
		{
			$classname = $args[classname];
			$syntax = $args[syntax];
			$pixels_or_percentage = $this->Display_Attributes_GetPixelOrPercentage();
			
			if($pixels_or_percentage)
			{
				return [
					$classname,
					[
						$syntax=>$pixels_or_percentage[number] . $pixels_or_percentage[symbol],
					],
				];
			}
			
			return FALSE;
		}
			
				// Parameter Attributes
				// -----------------------------------------------
				
					// Parameter Attributes :: Background Color
					// -----------------------------------------------
		
		public function Display_Attributes_css_backgroundcolor_backgroundcolor()
		{
			if($this->Display_Attributes_IsValidHTMLHexNumber())
			{
				return [
					'background-color-' . $this->desired_parameter,
					[
						'background-color'=>'#' . $this->desired_parameter,
					],
				];
			}
			else
			{
				$colors_and_numbers = preg_split('/([0-9]+)/', $this->desired_parameter, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
				
				$color_assignments = [];
				
				foreach ($colors_and_numbers as $color_or_value)
				{
					if($key)
					{
						$color_assignments[$key] = $color_or_value;
						unset ($key);
					}
					else
					{
						$key = $color_or_value;
					}
				}
				
				$color_hex_string;
				
				foreach (['red','green','blue','gray'] as $color)
				{
					if(isset($color_assignments[$color]))
					{
						$string_hexed = dechex((int)$color_assignments[$color]);
						switch($color)
						{
							case 'gray':
								$color_hex_string = str_repeat($string_hexed, 6);
								break;
								
							default:
								$color_hex_string .= str_repeat($string_hexed, 2);
						}
					}
					else
					{
						$color_hex_string .= '00';
					}
				}
				
				return [
					'background-color-' . $this->desired_parameter,
					[
						'background-color'=>'#' . $color_hex_string,
					],
				];
			}
			
			return FALSE;
		}
				
					// Parameter Attributes :: Color
					// -----------------------------------------------
		
		public function Display_Attributes_css_color_color()
		{
			if($this->Display_Attributes_IsValidHTMLHexNumber())
			{
				return [
					'color-' . $this->desired_parameter,
					[
						'color'=>'#' . $this->desired_parameter,
					],
				];
			}
			else
			{
				$colors_and_numbers = preg_split('/([0-9]+)/', $this->desired_parameter, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
				
				$color_assignments = [];
				
				foreach ($colors_and_numbers as $color_or_value)
				{
					if($key)
					{
						$color_assignments[$key] = $color_or_value;
						unset ($key);
					}
					else
					{
						$key = $color_or_value;
					}
				}
				
				$color_hex_string;
				
				foreach (['red','green','blue','gray'] as $color)
				{
					if(isset($color_assignments[$color]))
					{
						$string_hexed = dechex((int)$color_assignments[$color]);
						switch($color)
						{
							case 'gray':
								$color_hex_string = str_repeat($string_hexed, 6);
								break;
								
							default:
								$color_hex_string .= str_repeat($string_hexed, 2);
						}
					}
					else
					{
						$color_hex_string .= '00';
					}
				}
				
				return [
					'color-' . $this->desired_parameter,
					[
						'color'=>'#' . $color_hex_string,
					],
				];
			}
			
			return FALSE;
		}
				
					// Parameter Attributes :: Border
					// -----------------------------------------------
		
		public function Display_Attributes_css_border_border()
		{
			$pixels_or_percentage = $this->Display_Attributes_GetPixelOrPercentage();
			
			if($pixels_or_percentage)
			{
				return [
					'classname'=>'border-' . $this->desired_parameter,
					[
						'border-width'=>$pixels_or_percentage[number] . $pixels_or_percentage[symbol],
						'border-style'=>'solid',
						'border-color'=>'#000000',
					],
				];
			}
			
			return FALSE;
		}
		
		public function Display_Attributes_css_border_bordertop()
		{
			$pixels_or_percentage = $this->Display_Attributes_GetPixelOrPercentage();
			
			if($pixels_or_percentage)
			{
				return [
					'classname'=>'border-top-' . $this->desired_parameter,
					[
						'border-top-width'=>$pixels_or_percentage[number] . $pixels_or_percentage[symbol],
						'border-top-style'=>'solid',
						'border-top-color'=>'#000000',
					],
				];
			}
			
			return FALSE;
		}
		
		public function Display_Attributes_css_border_borderbottom()
		{
			$pixels_or_percentage = $this->Display_Attributes_GetPixelOrPercentage();
			
			if($pixels_or_percentage)
			{
				return [
					'classname'=>'border-bottom-' . $this->desired_parameter,
					[
						'border-bottom-width'=>$pixels_or_percentage[number] . $pixels_or_percentage[symbol],
						'border-bottom-style'=>'solid',
						'border-bottom-color'=>'#000000',
					],
				];
			}
			
			return FALSE;
		}
		
		public function Display_Attributes_css_border_borderright()
		{
			$pixels_or_percentage = $this->Display_Attributes_GetPixelOrPercentage();
			
			if($pixels_or_percentage)
			{
				return [
					'classname'=>'border-right-' . $this->desired_parameter,
					[
						'border-right-width'=>$pixels_or_percentage[number] . $pixels_or_percentage[symbol],
						'border-right-style'=>'solid',
						'border-right-color'=>'#000000',
					],
				];
			}
			
			return FALSE;
		}
		
		public function Display_Attributes_css_border_borderleft()
		{
			$pixels_or_percentage = $this->Display_Attributes_GetPixelOrPercentage();
			
			if($pixels_or_percentage)
			{
				return [
					'classname'=>'border-left-' . $this->desired_parameter,
					[
						'border-left-width'=>$pixels_or_percentage[number] . $pixels_or_percentage[symbol],
						'border-left-style'=>'solid',
						'border-left-color'=>'#000000',
					],
				];
			}
			
			return FALSE;
		}
				
					// Parameter Attributes :: Cursor
					// -----------------------------------------------
		
		public function Display_Attributes_css_cursor_cursor()
		{
			switch($this->desired_parameter)
			{
				case 'pointer':
				case 'hand':
					return [
						'classname'=>'cursor-' . $this->desired_parameter,
						[
							'cursor'=>'pointer',
						],
					];
					
					break;
			}
			
			return FALSE;
		}
					// Parameter Attributes :: Display
					// -----------------------------------------------
		
		public function Display_Attributes_css_display_display()
		{
			switch($this->desired_parameter)
			{
				case 'none':
					return [
						'display-' . $this->desired_parameter,
						[
							'display'=>$this->desired_parameter,
						],
					];
					
					break;
			}
			
			return FALSE;
		}
					// Parameter Attributes :: Divider
					// -----------------------------------------------
		
		public function Display_Attributes_css_divider_overflow()
		{
			switch($this->desired_parameter)
			{
				case 'auto':
					return [
						'overflow-' . $this->desired_parameter,
						[
							'overflow'=>$this->desired_parameter,
						],
					];
					
					break;
			}
			
			return FALSE;
		}
				
					// Parameter Attributes :: Font
					// -----------------------------------------------
		
		public function Display_Attributes_css_font_header()
		{
			switch($this->desired_parameter)
			{
				case '1':
				case '2':
				case '3':
				case '4':
				case '5':
				case '6':
					return [
						'header-' . $this->desired_parameter,
						[
							'font-family'=>'Tahoma',
						],
					];
					break;
			}
			
			return FALSE;
		}
		
		public function Display_Attributes_css_font_fontsize()
		{
			$pixels_or_percentage = $this->Display_Attributes_GetPixelOrPercentage();
			
			if($pixels_or_percentage)
			{
				return [
					'classname'=>'font-size-' . $this->desired_parameter,
					[
						'font-size'=>$pixels_or_percentage[number] . $pixels_or_percentage[symbol],
					],
				];
			}
			
			return FALSE;
		}
		
		public function Display_Attributes_css_font_fontfamily()
		{
			switch($this->desired_parameter)
			{
				case 'arial':
					$font_name = 'Arial';
					break;
					
				case 'courier':
					$font_name = 'Courier';
					break;
					
				case 'couriernew':
					$font_name = 'Courier New';
					break;
					
				case 'impact':
					$font_name = 'Impact';
					break;
					
				case 'tahoma':
					$font_name = 'Tahoma';
					break;
					
				case 'timesnewroman':
					$font_name = 'Times New Roman';
					break;
					
				case 'verdana':
					$font_name = 'Verdana';
					break;
			}
			
			if(strlen($font_name))
			{
				return [
					'font-family-' . $this->desired_parameter,
					[
						'font-family'=>$font_name,
					],
				];
			}
			
			return FALSE;
		}
				
					// Parameter Attributes :: Height
					// -----------------------------------------------
		
		public function Display_Attributes_css_height_height()
		{
			$simple_args = [
				'classname'=>'height-' . $this->desired_parameter,
				'syntax'=>'height',
			];
			
			return $this->Display_Attributes_SimplePixelOrPercentageDisplay($simple_args);
		}
				
					// Parameter Attributes :: Location
					// -----------------------------------------------
		
		public function Display_Attributes_css_spacing_wordbreak()
		{
			switch($this->desired_parameter)
			{
				case 'breakall':
					return [
						'word-break-break-all',
						[
							'word-break'=>'break-all',
						],
					];
					break;
			}
			
			return FALSE;
		}
		
		public function Display_Attributes_css_location_float()
		{
			switch($this->desired_parameter)
			{
				case 'left':
				case 'right':
					return [
						'float-' . $this->desired_parameter,
						[
							'float'=>$this->desired_parameter,
						],
					];
					break;
			}
			
			return FALSE;
		}
		
		public function Display_Attributes_css_location_horizontal()
		{
			switch($this->desired_parameter)
			{
				case 'center':
					return [
						'horizontal-center',
						[
							'margin-left'=>'auto',
							'margin-right'=>'auto',
							'text-align'=>'center',
						],
					];
					break;
				
				case 'left':
					return [
						'horizontal-left',
						[
							'margin-left'=>'0px',
							'margin-right'=>'auto',
							'text-align'=>'left',
						],
					];
					break;
					
				case 'right':
					return [
						'horizontal-right',
						[
							'margin-left'=>'auto',
							'margin-right'=>'0px',
							'text-align'=>'right',
						],
					];
					break;
			}
			
			return FALSE;
		}
		
		public function Display_Attributes_css_location_vertical()
		{
			switch($this->desired_parameter)
			{
				case 'center':
					return [
						'vertical-center',
						[
							'vertical-align'=>'middle',
						],
					];
					break;
					
				case 'specialcenter':
					return [
						'vertical-specialcenter',
						[
							'position'=>'relative',
							'top'=>'50%',
							'transform'=>'translateY(-50%);',
						],
					];
					break;
					
				case 'top':
					return [
						'vertical-top',
						[
							'vertical-align'=>'text-top',
						],
					];
					break;
					
				case 'bottom':
					return [
						'vertical-bottom',
						[
							'vertical-align'=>'text-bottom',
						],
					];
					break;
			}
			
			return FALSE;
		}
				
					// Parameter Attributes :: Spacing
					// -----------------------------------------------
		
		public function Display_Attributes_css_spacing_margin()
		{
			$simple_args = [
				'classname'=>'margin-' . $this->desired_parameter,
				'syntax'=>'margin',
			];
			
			return $this->Display_Attributes_SimplePixelOrPercentageDisplay($simple_args);
		}
		
		public function Display_Attributes_css_spacing_margintop()
		{
			$simple_args = [
				'classname'=>'margin-top-' . $this->desired_parameter,
				'syntax'=>'margin-top',
			];
			
			return $this->Display_Attributes_SimplePixelOrPercentageDisplay($simple_args);
		}
		
		public function Display_Attributes_css_spacing_marginbottom()
		{
			$simple_args = [
				'classname'=>'margin-bottom-' . $this->desired_parameter,
				'syntax'=>'margin-bottom',
			];
			
			return $this->Display_Attributes_SimplePixelOrPercentageDisplay($simple_args);
		}
		
		public function Display_Attributes_css_spacing_marginright()
		{
			$simple_args = [
				'classname'=>'margin-right-' . $this->desired_parameter,
				'syntax'=>'margin-right',
			];
			
			return $this->Display_Attributes_SimplePixelOrPercentageDisplay($simple_args);
		}
		
		public function Display_Attributes_css_spacing_marginleft()
		{
			$simple_args = [
				'classname'=>'margin-left-' . $this->desired_parameter,
				'syntax'=>'margin-left',
			];
			
			return $this->Display_Attributes_SimplePixelOrPercentageDisplay($simple_args);
		}
		
		public function Display_Attributes_css_text_textindent()
		{
			$simple_args = [
				'classname'=>'text-indent-' . $this->desired_parameter,
				'syntax'=>'text-indent',
			];
			
			return $this->Display_Attributes_SimplePixelOrPercentageDisplay($simple_args);
		}
			
					// Parameter Attributes :: Padding
					// -----------------------------------------------
		
		public function Display_Attributes_css_spacing_padding()
		{
			$simple_args = [
				'classname'=>'padding' . '-' . $this->desired_parameter,
				'syntax'=>'padding',
			];
			
			return $this->Display_Attributes_SimplePixelOrPercentageDisplay($simple_args);
		}
		
		public function Display_Attributes_css_spacing_paddingtop()
		{
			$simple_args = [
				'classname'=>'padding-top' . '-' . $this->desired_parameter,
				'syntax'=>'padding-top',
			];
			
			return $this->Display_Attributes_SimplePixelOrPercentageDisplay($simple_args);
		}
		
		public function Display_Attributes_css_spacing_paddingbottom()
		{
			$simple_args = [
				'classname'=>'padding-bottom' . '-' . $this->desired_parameter,
				'syntax'=>'padding-bottom',
			];
			
			return $this->Display_Attributes_SimplePixelOrPercentageDisplay($simple_args);
		}
		
		public function Display_Attributes_css_spacing_paddingright()
		{
			$simple_args = [
				'classname'=>'padding-right' . '-' . $this->desired_parameter,
				'syntax'=>'padding-right',
			];
			
			return $this->Display_Attributes_SimplePixelOrPercentageDisplay($simple_args);
		}
		
		public function Display_Attributes_css_spacing_paddingleft()
		{
			$simple_args = [
				'classname'=>'padding-left' . '-' . $this->desired_parameter,
				'syntax'=>'padding-left',
			];
			
			return $this->Display_Attributes_SimplePixelOrPercentageDisplay($simple_args);
		}
			
					// Parameter Attributes :: Width
					// -----------------------------------------------
		
		public function Display_Attributes_css_width_width()
		{
			$simple_args = [
				'classname'=>'width-' . $this->desired_parameter,
				'syntax'=>'width',
			];
			
			return $this->Display_Attributes_SimplePixelOrPercentageDisplay($simple_args);
		}
		
				// Non-Parameter Attributes
				// -----------------------------------------------
				
					// Non-Parameter Attributes :: Font
					// -----------------------------------------------
		
		public function Display_Attributes_css_font_noselect()
		{
			return [
				'noselect',
				[
					'user-select'=>'none',
					'-webkit-touch-callout'=>'none',
					'-webkit-user-select'=>'none',
					'-khtml-user-select'=>'none',
					'-moz-user-select'=>'none',
					'-ms-user-select'=>'none',
				],
			];
		}
				
					// Non-Parameter Attributes :: Image
					// -----------------------------------------------
		
		public function Display_Attributes_css_image_flipimage()
		{
			return [
				'flip-image',
				[
					'-moz-transform'=>'scaleX(-1)',
					'-o-transform'=>'scaleX(-1)',
					'-webkit-transform'=>'scaleX(-1)',
					'transform'=>'scaleX(-1)',
					'filter'=>'FlipH',
					'-ms-filter'=>'"FlipH"',
				],
			];
		}
				
					// Non-Parameter Attributes :: List
					// -----------------------------------------------
		
		public function Display_Attributes_css_list_arrow()
		{
			return [
				'list-item-noarrow-image-level-1',
				'list-item-noarrow-image-level-2',
				'list-item-noarrow-image-level-3',
				'list-item-noarrow-image-level-4',
				'list-item-noarrow-image-level-5',
				'list-item-noarrow-image-level-6',
				[
					'margin'=>'4px',
					'vertical-align'=>'middle',
				],
				'list-item-arrow-image-level-1',
				'list-item-arrow-image-level-2',
				'list-item-arrow-image-level-3',
				'list-item-arrow-image-level-4',
				'list-item-arrow-image-level-5',
				'list-item-arrow-image-level-6',
				[
					'margin'=>'4px',
					'vertical-align'=>'middle',
				],
				'list-item-row-text-level-1',
				'list-item-row-text-level-2',
				'list-item-row-text-level-3',
				'list-item-row-text-level-4',
				'list-item-row-text-level-5',
				'list-item-row-text-level-6',
				[
					'vertical-align'=>'middle',
				],
				'list-item-link-level-1',
				'list-item-link-level-2',
				'list-item-link-level-3',
				'list-item-link-level-4',
				'list-item-link-level-5',
				'list-item-link-level-6',
				[
					'text-decoration'=>'none',
				],
			];
		}
		
		public function Display_Attributes_css_list_hideable()
		{
			return [
				'list-level-1',
				'list-level-2',
				'list-level-3',
				'list-level-4',
				'list-level-5',
				'list-level-6',
				[
					'width'=>'90%',
					'margin-left'=>'auto',
					'margin-right'=>'auto',
					'list-style'=>'none',
					'list-style-type'=>'none',
					'list-style-position'=>'inside',
					'padding'=>'0',
					'background-color'=>'#CCCCCC',
				],
				'list-level-1',
				[
					'width'=>'100%',
					'border-style'=>'solid',
					'border-width'=>'1px',
					'border-color'=>'#000000',
				],
				'list-level-2',
				'list-level-3',
				'list-level-4',
				'list-level-5',
				'list-level-6',
				[
					'width'=>'99%',
					'display'=>'none',
					'margin-left'=>'auto',
					'margin-right'=>'auto',
					'margin-top'=>'2px',
					'margin-bottom'=>'2px',
					'border-style'=>'solid',
					'border-width'=>'1px',
					'border-color'=>'#000000',
				],
				'list-item-row-level-1',
				'list-item-row-level-2',
				'list-item-row-level-3',
				'list-item-row-level-4',
				'list-item-row-level-5',
				'list-item-row-level-6',
				[
					'margin'=>'3px',
					'border-style'=>'solid',
					'border-width'=>'1px',
					'border-color'=>'#000000',
					'background-color'=>'#FFFFFF',
					'cursor'=>'pointer',
				],
				'list-item-row-text-level-1',
				[
					'margin'=>'5px 5px 5px 0px',
					'font-family'=>'"Arial"',
					'font-size'=>'1.6em',
				],
				'list-item-row-text-level-2',
				'list-item-row-text-level-3',
				'list-item-row-text-level-4',
				'list-item-row-text-level-5',
				'list-item-row-text-level-6',
				[
					'margin'=>'3px 3px 3px 0px',
					'font-family'=>'"Arial"',
					'font-size'=>'1.2em',
				],
			];
		}
				
					// Non-Parameter Attributes :: Location
					// -----------------------------------------------
		
		public function Display_Attributes_css_location_clearfloat()
		{
			return [
				'clear-float',
				[
					'clear'=>'both',
				],
			];
		}
		
		public function Display_Attributes_css_location_displayinlineblock()
		{
			return [
				'display-inline-block',
				[
					'display'=>'inline-block',
				],
			];
		}
		
		public function Display_Attributes_css_location_wordwrap()
		{
			return [
				'word-wrap',
				[
					'white-space'=>'pre-wrap',
					'word-wrap'=>'break-word',       /* Internet Explorer 5.5+ */
				],
			];
		}
		
			// CSS-Type File Information ~ Definition Accessors
			// -----------------------------------------------
		
		public function CSSStylesWithParameters()
		{
			$styles_with_parameters = $this->CSSStylesWithParameters_Definitions();
			$styles_with_parameters_and_directories = [];
			
			foreach($styles_with_parameters as $style_with_parameter) {
				$styles_with_parameters_and_directories[] = $this->CSSDirectory() . $style_with_parameter;
			}
			
			return $styles_with_parameters_and_directories;
		}
		
		public function CSSStylesWithoutParameters()
		{
			$styles_without_parameters = $this->CSSStylesWithoutParameters_Definitions();
			$styles_without_parameters_and_directories = [];
			
			foreach($styles_without_parameters as $style_without_parameter) {
				$styles_without_parameters_and_directories[] = $this->CSSDirectory() . $style_without_parameter;
			}
			
			return $styles_without_parameters_and_directories;
		}
		
			// CSS-Type File Information ~ Definitions
			// -----------------------------------------------
		
		public function CSSStylesWithParameters_Definitions()
		{
			return [
				'background-color/background-color',
				'color/color',
				'border/border',
				'border/border-top',
				'border/border-bottom',
				'border/border-right',
				'border/border-left',
				'cursor/cursor',
				'display/display',
				'divider/overflow',
				'font/header',
				'font/font-size',
				'font/font-family',
				'height/height',
				'location/float',
				'location/horizontal',
				'location/vertical',
				'spacing/margin',
				'spacing/margin-top',
				'spacing/margin-bottom',
				'spacing/margin-right',
				'spacing/margin-left',
				'spacing/padding',
				'spacing/padding-top',
				'spacing/padding-bottom',
				'spacing/padding-right',
				'spacing/padding-left',
				'spacing/word-break',
				'text/text-indent',
				'width/width',
			];
		}
		
		public function CSSStylesWithoutParameters_Definitions()
		{
			return [
				'font/noselect',
				'image/flip-image',
				'list/arrow',
				'list/hideable',
				'location/clear-float',
				'location/display-inline-block',
				'location/word-wrap',
			];
		}
		
			// CSS-Type File Information ~ Public Location
			// -----------------------------------------------
		
		public function CSSDirectory()
		{
			return '/css/';
		}
		
			// Templates for CSS Objects
			// -----------------------------------------------
		
		public function CSS_ClassDefinitionLocation()
		{
			return '../format/css/class_definition.php';
		}
		
		public function CSS_ClassSeparatorLocation()
		{
			return '../format/css/class_separator.php';
		}
		
		public function CSS_DefinitionStartLocation()
		{
			return '../format/css/definition_start.php';
		}
		
		public function CSS_DefinitionEndLocation()
		{
			return '../format/css/definition_end.php';
		}
		
		public function CSS_AttributeDefinitionLocation()
		{
			return '../format/css/attribute_definition.php';
		}
		
		public function CSS_AttributeEndLocation()
		{
			return '../format/css/attribute_end.php';
		}
	}

?>