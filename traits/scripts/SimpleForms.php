<?php

	trait SimpleForms {	
				# GenerateEntryListTitle ()
			# GIVEN :
		#	A Test: An Other  Test -- The Last Test, Part 14, Section 138, Sub-Section Theta 55
			# RETURNS :
		#	Test, A: Other Test, An -- Last Test, Part 00014, Section 00138, Sub-Section Theta 00055, The
	
		public function GenerateEntryListTitle($args)
		{
			$entry = $args['entry'];
			
			if(!$entry || !$entry['id'])
			{
				$entry = $this->entry;
			}
			
			$list_title = $entry['Title'];
			
			return $this->GenerateEntryListTitle_SubTitle(['title'=>$list_title]);
		}
		
		public function GenerateEntryListTitle_ExpandNumbers($args)
		{
			$list_title = $args['title'];
			
			$list_pieces = explode(' ', $list_title);
			$list_pieces_count = count($list_pieces);
			
			$acceptable_pieces = [
				',',
				'!',
				'?',
				'.',
			];
			
			$acceptable_pieces_count = count($acceptable_pieces);
			
			for($i = 0; $i < $list_pieces_count; $i++)
			{
				$list_piece = $list_pieces[$i];
				
				for($j = 0; $j < $acceptable_pieces_count; $j++)
				{
					$acceptable_piece = $acceptable_pieces[$j];
					
					$list_pieces_explosion = explode($acceptable_piece, $list_piece);
					$list_pieces_explosion_count = count($list_pieces_explosion);
					
					for($k = 0; $k < $list_pieces_explosion_count; $k++)
					{
						$list_pieces_explosion_subpiece = $list_pieces_explosion[$k];
						
						if(is_numeric($list_pieces_explosion_subpiece))
						{
							$list_pieces_explosion_subpiece_int = (int)$list_pieces_explosion_subpiece;
							
							if($list_pieces_explosion_subpiece == $list_pieces_explosion_subpiece_int && strlen($list_pieces_explosion_subpiece_int) < 5)
							{
							#	print("BT: equal?" . $list_piece . ' | ' . $list_piece_int . '|<BR><BR>');
								$new_list_pieces_explosion_subpiece = str_pad($list_pieces_explosion_subpiece, 5, '0', STR_PAD_LEFT);
								
								$list_pieces_explosion[$k] = $new_list_pieces_explosion_subpiece;
							}
						}
					}
					
					$list_piece = implode($acceptable_piece, $list_pieces_explosion);
				}
				
				$list_pieces[$i] = $list_piece;
			}
			
			$list_title = implode(' ', $list_pieces);
			
			return $list_title;
		}
		
		public function GenerateEntryListTitle_SubTitle($args)
		{
			$list_title = $args['title'];
			
			$list_title = preg_replace('/\s+/', ' ', $list_title);
			
			$list_title = $this->GenerateEntryListTitle_ExpandNumbers(['title'=>$list_title]);
			
			$special_delimiter = ' _~!~_ ';
			
			$title_operators = [
				'a',
				'an',
				'the',
			];
			$title_operators_count = count($title_operators);
			
			$explosion_operators = [
				' -- ',
				' - ',
				': ',
			];
			$explosion_operators_count = count($explosion_operators);
			
			$all_list_title_pieces = [$list_title];
			$all_list_title_piece_count = count($all_list_title_pieces);
			
			for($i = 0; $i < $explosion_operators_count; $i++)
			{
				$explosion_operator = $explosion_operators[$i];
				
				$new_all_list = [];
				
				for($j = 0; $j < $all_list_title_piece_count; $j++)
				{
					$list_title_piece = $all_list_title_pieces[$j];
					
					$new_title_pieces = explode($explosion_operator, $list_title_piece);
					$new_title_pieces_count = count($new_title_pieces);
					
					if($new_title_pieces_count <= 1)
					{
						$new_all_list[] = $list_title_piece;
					}
					else
					{
						for($k = 0; $k < $new_title_pieces_count; $k++)
						{
							$new_title_piece = $new_title_pieces[$k];
							if($k + 1 < $new_title_pieces_count)
							{
								$new_all_list[] = $new_title_piece . $special_delimiter . $explosion_operator;
							}
							else
							{
								$new_all_list[] = $new_title_piece;
							}
						}
					}
				}
				
				$all_list_title_pieces = $new_all_list;
				$all_list_title_piece_count = count($all_list_title_pieces);
			}
			
			$full_title_text = '';
			
			for($i = 0; $i < $all_list_title_piece_count; $i++)
			{
				$list_piece = $all_list_title_pieces[$i];
				
				$list_piece_subpieces = explode(' ', $list_piece);
				$first_list_subpiece = $list_piece_subpieces[0];
				$first_list_subpiece_comparable = strtolower($first_list_subpiece);
				
				$found = 0;
				
				for($j = 0; $j < $title_operators_count; $j++)
				{
					$title_operator = $title_operators[$j];
					
					if($title_operator == $first_list_subpiece_comparable)
					{
						$found = 1;
						$j = $title_operators_count;
					}
				}
				
				if($found)
				{
					$first_title_piece_subpiece = $list_piece_subpieces[0];
					unset($list_piece_subpieces[0]);
				}
			
				$new_title_piece = implode(' ', $list_piece_subpieces);
				
				$new_title_piece_reexplode = explode($special_delimiter, $new_title_piece);
				$new_title_piece_reexplode_count = count($new_title_piece_reexplode);
				
				$phrase_separator = FALSE;
				if($new_title_piece_reexplode_count > 1)
				{
					$phrase_separator = $new_title_piece_reexplode[$new_title_piece_reexplode_count - 1];
					
					unset($new_title_piece_reexplode[$new_title_piece_reexplode_count - 1]);
				}
				$new_title_piece = implode($special_delimiter, $new_title_piece_reexplode);
				
				if($found)
				{
					$new_title_piece .= ', ' . $first_title_piece_subpiece;
				}
				
				if($phrase_separator)
				{
					$new_title_piece .= $phrase_separator;
				}
				
				$full_title_text .= $new_title_piece;
			}
			
			return $full_title_text;
		}
		
		public function GenerateEntryCode()
		{
			$pieces = [];
			
			$current_length = 0;
			$max_length = 60;
			
			$values = [
				$this->entry['Title'],
				$this->entry['Subtitle'],
			];
			
			foreach($this->tag as $tag)
			{
				$values[] = $tag['Tag'];
			}
			
			$values[] = $this->quote['Quote'];
			$values[] = $this->description['Description'];
			
			for($i = 0; $i < count($values); $i++)
			{
				$value = $values[$i];
				if(strlen($value))
				{
					$new_value = $value;
					$new_value = preg_replace('/[^\p{L}\p{N}\s]/u', '', $new_value);
					$new_value_pieces = preg_split('/\s+/', $new_value);
					
					foreach($new_value_pieces as $new_value_piece)
					{
						if($current_length < $max_length)
						{
							$formatted_piece = $this->TransliterateString(mb_strtolower(trim($new_value_piece), 'UTF-8'));
							if((strlen($formatted_piece) + $current_length + 1) <= $max_length)
							{
								$pieces[] = $formatted_piece;
						#		print("FORMATTED PIECE???...|" . $formatted_piece . "|");
								$current_length += strlen($formatted_piece) + 1;
							}
						}
						
					}
				}
				
				if($current_length >= $max_length)
				{
					$i = count($values);
				}
			}
			
			return implode('-', $pieces);
		}
		
		function TransliterateString($txt) {
			$transliteration_table = array('á' => 'a', 'Á' => 'A', 'à' => 'a', 'À' => 'A', 'ă' => 'a', 'Ă' => 'A', 'â' => 'a', 'Â' => 'A', 'å' => 'a', 'Å' => 'A', 'ã' => 'a', 'Ã' => 'A', 'ą' => 'a', 'Ą' => 'A', 'ā' => 'a', 'Ā' => 'A', 'ä' => 'ae', 'Ä' => 'AE', 'æ' => 'ae', 'Æ' => 'AE', 'ḃ' => 'b', 'Ḃ' => 'B', 'ć' => 'c', 'Ć' => 'C', 'ĉ' => 'c', 'Ĉ' => 'C', 'č' => 'c', 'Č' => 'C', 'ċ' => 'c', 'Ċ' => 'C', 'ç' => 'c', 'Ç' => 'C', 'ď' => 'd', 'Ď' => 'D', 'ḋ' => 'd', 'Ḋ' => 'D', 'đ' => 'd', 'Đ' => 'D', 'ð' => 'dh', 'Ð' => 'Dh', 'é' => 'e', 'É' => 'E', 'è' => 'e', 'È' => 'E', 'ĕ' => 'e', 'Ĕ' => 'E', 'ê' => 'e', 'Ê' => 'E', 'ě' => 'e', 'Ě' => 'E', 'ë' => 'e', 'Ë' => 'E', 'ė' => 'e', 'Ė' => 'E', 'ę' => 'e', 'Ę' => 'E', 'ē' => 'e', 'Ē' => 'E', 'ḟ' => 'f', 'Ḟ' => 'F', 'ƒ' => 'f', 'Ƒ' => 'F', 'ğ' => 'g', 'Ğ' => 'G', 'ĝ' => 'g', 'Ĝ' => 'G', 'ġ' => 'g', 'Ġ' => 'G', 'ģ' => 'g', 'Ģ' => 'G', 'ĥ' => 'h', 'Ĥ' => 'H', 'ħ' => 'h', 'Ħ' => 'H', 'í' => 'i', 'Í' => 'I', 'ì' => 'i', 'Ì' => 'I', 'î' => 'i', 'Î' => 'I', 'ï' => 'i', 'Ï' => 'I', 'ĩ' => 'i', 'Ĩ' => 'I', 'į' => 'i', 'Į' => 'I', 'ī' => 'i', 'Ī' => 'I', 'ĵ' => 'j', 'Ĵ' => 'J', 'ķ' => 'k', 'Ķ' => 'K', 'ĺ' => 'l', 'Ĺ' => 'L', 'ľ' => 'l', 'Ľ' => 'L', 'ļ' => 'l', 'Ļ' => 'L', 'ł' => 'l', 'Ł' => 'L', 'ṁ' => 'm', 'Ṁ' => 'M', 'ń' => 'n', 'Ń' => 'N', 'ň' => 'n', 'Ň' => 'N', 'ñ' => 'n', 'Ñ' => 'N', 'ņ' => 'n', 'Ņ' => 'N', 'ó' => 'o', 'Ó' => 'O', 'ò' => 'o', 'Ò' => 'O', 'ô' => 'o', 'Ô' => 'O', 'ő' => 'o', 'Ő' => 'O', 'õ' => 'o', 'Õ' => 'O', 'ø' => 'oe', 'Ø' => 'OE', 'ō' => 'o', 'Ō' => 'O', 'ơ' => 'o', 'Ơ' => 'O', 'ö' => 'oe', 'Ö' => 'OE', 'ṗ' => 'p', 'Ṗ' => 'P', 'ŕ' => 'r', 'Ŕ' => 'R', 'ř' => 'r', 'Ř' => 'R', 'ŗ' => 'r', 'Ŗ' => 'R', 'ś' => 's', 'Ś' => 'S', 'ŝ' => 's', 'Ŝ' => 'S', 'š' => 's', 'Š' => 'S', 'ṡ' => 's', 'Ṡ' => 'S', 'ş' => 's', 'Ş' => 'S', 'ș' => 's', 'Ș' => 'S', 'ß' => 'SS', 'ť' => 't', 'Ť' => 'T', 'ṫ' => 't', 'Ṫ' => 'T', 'ţ' => 't', 'Ţ' => 'T', 'ț' => 't', 'Ț' => 'T', 'ŧ' => 't', 'Ŧ' => 'T', 'ú' => 'u', 'Ú' => 'U', 'ù' => 'u', 'Ù' => 'U', 'ŭ' => 'u', 'Ŭ' => 'U', 'û' => 'u', 'Û' => 'U', 'ů' => 'u', 'Ů' => 'U', 'ű' => 'u', 'Ű' => 'U', 'ũ' => 'u', 'Ũ' => 'U', 'ų' => 'u', 'Ų' => 'U', 'ū' => 'u', 'Ū' => 'U', 'ư' => 'u', 'Ư' => 'U', 'ü' => 'ue', 'Ü' => 'UE', 'ẃ' => 'w', 'Ẃ' => 'W', 'ẁ' => 'w', 'Ẁ' => 'W', 'ŵ' => 'w', 'Ŵ' => 'W', 'ẅ' => 'w', 'Ẅ' => 'W', 'ý' => 'y', 'Ý' => 'Y', 'ỳ' => 'y', 'Ỳ' => 'Y', 'ŷ' => 'y', 'Ŷ' => 'Y', 'ÿ' => 'y', 'Ÿ' => 'Y', 'ź' => 'z', 'Ź' => 'Z', 'ž' => 'z', 'Ž' => 'Z', 'ż' => 'z', 'Ż' => 'Z', 'þ' => 'th', 'Þ' => 'Th', 'µ' => 'u', 'а' => 'a', 'А' => 'a', 'б' => 'b', 'Б' => 'b', 'в' => 'v', 'В' => 'v', 'г' => 'g', 'Г' => 'g', 'д' => 'd', 'Д' => 'd', 'е' => 'e', 'Е' => 'E', 'ё' => 'e', 'Ё' => 'E', 'ж' => 'zh', 'Ж' => 'zh', 'з' => 'z', 'З' => 'z', 'и' => 'i', 'И' => 'i', 'й' => 'j', 'Й' => 'j', 'к' => 'k', 'К' => 'k', 'л' => 'l', 'Л' => 'l', 'м' => 'm', 'М' => 'm', 'н' => 'n', 'Н' => 'n', 'о' => 'o', 'О' => 'o', 'п' => 'p', 'П' => 'p', 'р' => 'r', 'Р' => 'r', 'с' => 's', 'С' => 's', 'т' => 't', 'Т' => 't', 'у' => 'u', 'У' => 'u', 'ф' => 'f', 'Ф' => 'f', 'х' => 'h', 'Х' => 'h', 'ц' => 'c', 'Ц' => 'c', 'ч' => 'ch', 'Ч' => 'ch', 'ш' => 'sh', 'Ш' => 'sh', 'щ' => 'sch', 'Щ' => 'sch', 'ъ' => '', 'Ъ' => '', 'ы' => 'y', 'Ы' => 'y', 'ь' => '', 'Ь' => '', 'э' => 'e', 'Э' => 'e', 'ю' => 'ju', 'Ю' => 'ju', 'я' => 'ja', 'Я' => 'ja');
			return str_replace(array_keys($transliteration_table), array_values($transliteration_table), $txt);
		}
		
		public function FormatSavedRecordFromQuery_Base_SingleLine($args)
		{
			$text_for_newline_formatting_args = [
				texttoformat=>$args[texttoformat],
			];
			
			$text_for_tab_formatting_args = [
				texttoformat=>$this->FormatNewLines($text_for_newline_formatting_args),
			];
			
			return $this->FormatTabs($text_for_tab_formatting_args);
		}
		
		public function CleanseForDisplay($input)
		{
			$cleanse_input_args = [
				input=>$input,
				convertentities=>1,
			];
			
			$cleansed_data = $this->cleanser_object->utf8_characters->CleanseInput_UTF8($cleanse_input_args)[cleansedinput];
			
			return $cleansed_data;
		}
		
		public function Param($parameter)
		{
			$cleansed_input = $this->query_object->Parameter([parameter=>$parameter]);
			
			if(is_array($cleansed_input))
			{
				$cleansed_input_pieces = [];
				
				foreach ($cleansed_input as $cleansed_input_piece)
				{
					$cleansed_input_pieces[] = $this->CleanseWhiteSpace($cleansed_input_piece);
				}
				$cleansed_input = $cleansed_input_pieces;
			}
			else
			{
				$cleansed_input = $this->CleanseWhiteSpace($cleansed_input);
			}
			
			return $cleansed_input;
		}
		
		public function CleanseWhiteSpace($text)
		{
			return trim($text);
		}
		
		public function EscapeHTML($text)
		{
			$text = str_replace('>', '&gt;', $text);
			$text = str_replace('<', '&lt;', $text);
			$text = str_replace('"', '&quot;', $text);
			
			return $text;
		}
		
		public function FormatOptionsForForm($args)
		{
			$options = $args[options];
			$label_key = $args[labelkey];
			$record_Type = $args[recordtype];
			
			$optionslist = [];
			
			foreach ($options as $option)
			{
				$label = $option[$label_key];
				$optionslist[] = [
					'optionvalue'=>$label,
					'optiontitle'=>$label,
					'optionmouseover'=>'Assign Object as a ' . $label . ' ' . $record_type . '.',
				];
			}
			
			return $optionslist;
		}
		
		public function IFrameDisplayWithoutNavigation()
		{
			$this->navigation = 0;
			return TRUE;
		}
		
		public function DisplayOnePieceOfData()
		{
			$function = $this->php_command->CallableFunctionName;
			$data = $function();
			return $this->SetOnePieceOfDataForDisplay([pieceofdata=>$data]);
		}
		
		public function DisplayNumberedArrayOfData()
		{
			$function = $this->php_command->CallableFunctionName;
			$data = $function();
			
			$number_list_args = array(
				arrayofstrings=>$data,
			);
			
			return $this->StatusDataArray = $this->NumberArrayOfStrings($number_list_args);
		}
		
		public function DisplaySingleResultFunctionForOnePieceOfInput()
		{
			$set_input_and_function_results = array(
				'displaytext'=>$this->GetGoodFunctionName(),
				'parameter'=>$this->php_command->Parameters,
				'function'=>$this->php_command->CallableFunctionName,
			);
			
			return $this->SetInputAndFunctionResults($set_input_and_function_results);
		}
		
		public function DisplayListFunctionForOnePieceOfInput()
		{
			$set_input_and_function_results = array(
				'displaytext'=>$this->GetGoodFunctionName(),
				'parameter'=>$this->php_command->Parameters,
				'function'=>$this->php_command->CallableFunctionName,
			);
			
			return $this->SetInputAndFunctionListResults($set_input_and_function_results);
		}
		
		public function DisplayKeyedArrayOfData()
		{
			$function = $this->php_command->CallableFunctionName;
			$data = $function();
			
			$keyed_list_args = array(
				'list'=>$data,
			);
			
			return $this->StatusDataArray = $this->DisplayListFromKeys($keyed_list_args);
		}
		
		public function SetOnePieceOfDataForDisplay($args)
		{
			$piece_of_data = $args[pieceofdata];
			
			if(strlen($piece_of_data) < 1)
			{
				$piece_of_data = '0';
			}
			
			return $this->StatusDataArray = array(
				array(
					$this->GetNonLineBreakGoodFunctionName(),
					$piece_of_data,
				),
			);
		}
		
		public function DisplayListFromKeys($args)
		{
			$list = $args['list'];
			$list_returnable = array();
			
			foreach ($list as $listkey => $listvalue)
			{
				$list_returnable[] = array(
					$listkey,
					$listvalue,
				);
			}
			
			return $list_returnable;
		}
		
		public function NumberArrayOfStrings($args)
		{
			$array_of_strings = $args[arrayofstrings];
			$array_of_strings_returnable = array();
			
			$i = 1;
			
			foreach ($array_of_strings as $file)
			{
				$array_of_strings_returnable[] = array(
					$i,
					$file,
				);
				$i++;
			}
			
			return $array_of_strings_returnable;
		}
		
		public function SetInputAndMethodResults($args)
		{
			$parameter = $args['parameter'];
			$object = $args['object'];
			$function = $args['function'];
			$display_text = $args['displaytext'];
			$arguments = $args['arguments'];
			
			if(is_array($parameter))
			{
				$this->SubmittedValue = array();
				
				foreach($parameter as $param)
				{
					$param_results = $this->query_object->Parameter([parameter=>$param]);
					
					if(isset($param_results))
					{
						$this->SubmittedValue[] = $param_results;
					}
				}
				
				if(!count($this->SubmittedValue))
				{
					unset($this->SubmittedValue);
				}
			}
			else
			{
				$this->SubmittedValue = $this->query_object->Parameter([parameter=>$parameter]);
			}
			
			if(isset($this->SubmittedValue))
			{
				if(is_array($this->SubmittedValue))
				{
					$this->SubmittedValuePrintable = array();
					
					$parameter_i = 0;
					foreach($this->SubmittedValue as $value)
					{
						$this->SubmittedValuePrintable[$display_text[$parameter_i]] = $value;
						$parameter_i++;
					}
					
					$this->StatusDataArray = array();
					$param_display_text = implode(' / ', $display_text);
					
					$object_function_args = array();
					
					$i = 0;
					foreach($arguments as $argument_key => $argument_value)
					{
						$object_function_args[$argument_key] = $this->SubmittedValue[$i];
						$i++;
					}
					
					$get_function_results = $object->$function($object_function_args);
					
					if(!$get_function_results)
					{
						$get_function_results = 0;
					}
					
					$this->StatusDataArray[] = array(
						'<nobr>' . $param_display_text . ':</nobr>',
						$get_function_results,
					);
				}
				else
				{
					$this->SubmittedValuePrintable = $this->cleanser_object->EscapeHTML([input=>$this->SubmittedValue])[cleansedinput];
				
					$get_function_results = $object->$function([$arguments=>$this->SubmittedValue]);
					
					if(!$get_function_results)
					{
						$get_function_results = 0;
					}
					
					$this->StatusDataArray = array(
						array(
							'<nobr>' . $display_text . ':</nobr>',
							$get_function_results,
						),
					);
				}
			}
			
			return $this->StatusDataArray;
		}
		
		public function SetInputAndFunctionResults($args)
		{
			$parameter = $args['parameter'];
			$function = $args['function'];
			$display_text = $args['displaytext'];
			$arguments = $args['arguments'];
			
			if(is_array($parameter))
			{
				$this->SubmittedValue = array();
				
				foreach($parameter as $param)
				{
					$param_results = $this->query_object->Parameter([parameter=>$param]);
					
					if(isset($param_results))
					{
						$this->SubmittedValue[] = $param_results;
					}
				}
				
				if(!count($this->SubmittedValue))
				{
					unset($this->SubmittedValue);
				}
			}
			else
			{
				$this->SubmittedValue = $this->query_object->Parameter([parameter=>$parameter]);
			}
			
			if(isset($this->SubmittedValue))
			{
				if(is_array($this->SubmittedValue))
				{
					$this->SubmittedValuePrintable = array();
					
					$parameter_i = 0;
					foreach($this->SubmittedValue as $value)
					{
						$this->SubmittedValuePrintable[$display_text[$parameter_i]] = $value;
						$parameter_i++;
					}
					
					$this->StatusDataArray = array();
					$param_display_text = implode(' / ', $display_text);
					switch(count($parameter))
					{
						case 1:
							$get_function_results = $function($this->SubmittedValue[0]);
							break;
							
						case 2:
							$get_function_results = $function($this->SubmittedValue[0], $this->SubmittedValue[1]);
							break;
							
						case 3:
							$get_function_results = $function($this->SubmittedValue[0], $this->SubmittedValue[1], $this->SubmittedValue[2]);
							break;
							
						case 4:
							$get_function_results = $function($this->SubmittedValue[0], $this->SubmittedValue[1], $this->SubmittedValue[2], $this->SubmittedValue[3]);
							break;
					}
					
					if(!$get_function_results)
					{
						$get_function_results = 0;
					}
					
					$this->StatusDataArray[] = array(
						'<nobr>' . $param_display_text . ':</nobr>',
						$get_function_results,
					);
				}
				else
				{
					$this->SubmittedValuePrintable = $this->cleanser_object->EscapeHTML([input=>$this->SubmittedValue])[cleansedinput];
					
					if($arguments)
					{
						$get_function_results = array();
						
						foreach ($arguments as $argument)
						{
							$get_function_results[] = array(
								'<nobr>' . $display_text . ' (' . $argument . '):</nobr>',
								$function($this->SubmittedValue, $argument),
							);
						}
						
						$this->StatusDataArray = $get_function_results;
					}
					else
					{
						$get_function_results = $function($this->SubmittedValue);
						
						if(!$get_function_results)
						{
							$get_function_results = 0;
						}
						
						$this->StatusDataArray = array(
							array(
								'<nobr>' . $display_text . ':</nobr>',
								$get_function_results,
							),
						);
					}
				}
			}
			
			return TRUE;
		}
		
		public function SetInputAndFunctionArrayResults($args)
		{
			$parameter = $args['parameter'];
			$function = $args['function'];
			$arrays = $args['arrays'];
			
			$this->SubmittedValue = $this->query_object->Parameter([parameter=>$parameter]);
			
			if(isset($this->SubmittedValue))
			{
				$this->SubmittedValuePrintable = $this->cleanser_object->EscapeHTML([input=>$this->SubmittedValue])[cleansedinput];
				
				$array_of_results = array();
				$get_function_results = array();
				
				switch($arrays)
				{
					case 5:
						$function($this->SubmittedValue, $array_of_results[], $array_of_results[], $array_of_results[], $array_of_results[], $array_of_results[]);
						
						for($i = 0; $i < count($array_of_results[0]); $i++)
						{
							$get_function_results[] = array(
								$array_of_results[0][$i],
								$array_of_results[1][$i],
								$array_of_results[2][$i],
								$array_of_results[3][$i],
								$array_of_results[4][$i],
							);
						}
						
						break;
					case 4:
						$function($this->SubmittedValue, $array_of_results[], $array_of_results[], $array_of_results[], $array_of_results[]);
						
						for($i = 0; $i < count($array_of_results[0]); $i++)
						{
							$get_function_results[] = array(
								$array_of_results[0][$i],
								$array_of_results[1][$i],
								$array_of_results[2][$i],
								$array_of_results[3][$i],
							);
						}
						
						break;
						
					case 3:
						$function($this->SubmittedValue, $array_of_results[], $array_of_results[], $array_of_results[]);
						
						for($i = 0; $i < count($array_of_results[0]); $i++)
						{
							$get_function_results[] = array(
								$array_of_results[0][$i],
								$array_of_results[1][$i],
								$array_of_results[2][$i],
							);
						}
						
						break;
						
					case 2:
						$function($this->SubmittedValue, $array_of_results[], $array_of_results[]);
						
						for($i = 0; $i < count($array_of_results[0]); $i++)
						{
							$get_function_results[] = array(
								$array_of_results[0][$i],
								$array_of_results[1][$i],
							);
						}
						
						break;
						
					case 1:
					default:
						$function($this->SubmittedValue, $array_of_results[]);
						
						for($i = 0; $i < count($array_of_results[0]); $i++)
						{
							$get_function_results[] = array(
								$array_of_results[0][$i],
							);
						}
				}
				
				$this->StatusDataArray = $get_function_results;
			}
			
			return $this->StatusDataArray;
		}
		
		public function SetInputAndFunctionListResults($args)
		{
			$parameter = $args['parameter'];
			$function = $args['function'];
			$desired_output = $args['desiredoutput'];
			
			$this->SubmittedValue = $this->query_object->Parameter([parameter=>$parameter]);
			if(isset($this->SubmittedValue))
			{
				$this->SubmittedValuePrintable = $this->cleanser_object->EscapeHTML([input=>$this->SubmittedValue])[cleansedinput];
				
				$get_function_results = $function($this->SubmittedValue);
				$get_function_results_returned = array();
				
				if(!$get_function_results)
				{
					$get_function_results_returned[] = array('0');
				}
				else
				{
					foreach($get_function_results as $item_key => $item)
					{
						$item_key_useful = $item_key;
						
						if(!$item_key)
						{
							$item_key_useful = 0;
						}
						
						$item_useful = $item;
						
						if(!$item)
						{
							$item_useful = 0;
						}
						
						if($desired_output == 'key')
						{
							$get_function_results_returned[] = array(
								$item_key_useful,
							);
						}
						elseif($desired_output == 'list')
						{
							$get_function_results_returned[] = array(
								$item_key_useful,
								$item_useful,
							);
						}
						else
						{
							$get_function_results_returned[] = array(
								$item_useful,
							);
						}
					}
				}
				
				$this->StatusDataArray = $get_function_results_returned;
			}
			
			return $this->StatusDataArray;
		}
	}

?>