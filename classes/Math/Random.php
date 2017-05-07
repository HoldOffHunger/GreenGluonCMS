<?php

	class Random
	{
		public function GetRandomString($args)
		{
			$string_length = $args[stringlength];
			
			if(!$string_length)
			{
				$string_length = 1;
			}
			
			$get_array_options_args = array(
				usenumbers=>$args[usenumbers],
				uselowercaseletters=>$args[uselowercaseletters],
				useuppercaseletters=>$args[useuppercaseletters],
			);
			
			$options = $this->GetRandomString_OptionsArray($get_array_options_args);
			
			$random_string = '';
			
			for($i = 0; $i < $string_length; $i++)
			{
				$random_option_key = array_rand($options, 1);
				$random_string .= $options[$random_option_key];
			}
			
			return $random_string;
		}
		
		public function GetRandomString_OptionsArray($args)
		{
			$use_numbers = $args[usenumbers];
			$use_lower_case_letters = $args[uselowercaseletters];
			$use_upper_case_letters = $args[useuppercaseletters];
			
			$array_of_options = array();
			
			if($use_numbers)
			{
				$array_of_options = array_merge($array_of_options, $this->GetNumbersArray());
			}
			
			if($use_lower_case_letters)
			{
				$array_of_options = array_merge($array_of_options, $this->GetLowerCaseLettersArray());
			}
			
			if($use_upper_case_letters)
			{
				$array_of_options = array_merge($array_of_options, $this->GetUpperCaseLettersArray());
			}
			
			return $array_of_options;
		}
		
		public function GetNumbersArray()
		{
			return array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
		}
		
		public function GetLowerCaseLettersArray()
		{
			return array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
		}
		
		public function GetUpperCaseLettersArray()
		{
			return array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
		}
	}
	
?>