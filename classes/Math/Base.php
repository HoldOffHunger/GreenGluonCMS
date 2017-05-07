<?php

	class Base
	{
		public $binary_object;
		
			// Base Functions
			// -----------------------------------------------------------------
		
		public function ConvertBase($args)
		{
			$value = $args[value];
			
			$starting_base = $args[startingbase];
			$ending_base = $args[endingbase];
			
			$alphabets_args = array(
				startingbase=>$starting_base,
				endingbase=>$ending_base,
			);
			
			$alphabets = $this->GetAlphabets($alphabets_args);
			
			if($alphabets)
			{
				$starting_base_alphabet = $alphabets[startingalphabet];
				$ending_base_alphabet = $alphabets[endingalphabet];
				
				$starting_base_alphabet_value_keys = $alphabets[startingalphabetvaluekeys];
				$ending_base_alphabet_value_keys = $alphabets[endingaphabetvaluekeys];
				
				$starting_base_alphabet_bit_length = $alphabets[startingalphabetbitlength];
				$ending_base_alphabet_bit_length = $alphabets[endingalphabetbitlength];
				
				$value_length = strlen($value);
				
				$binary_string = '';
				for($i = 0; $i < $value_length; $i++)
				{
					$binary_string .= $starting_base_alphabet_value_keys[$value[$i]];
				}
				
				$binary_string_array = str_split($binary_string, $ending_base_alphabet_bit_length);
				
				$converted_value = '';
				
				foreach ($binary_string_array as $ending_base_chunk)
				{
					$converted_value .= $ending_base_alphabet[$ending_base_chunk];
				}
				
				return $converted_value;
			}
			
			return FALSE;
		}
		
		public function IsBase2Number($args)
		{
			$number = $args[number];
			
			$number_halved = $number;
			$iterations = 1;
			
			while($number_halved > 2)
			{
				$number_halved = $number_halved / 2;
				$iterations++;
			}
			
			if($number_halved == 2)
			{
				return $iterations;
			}
			
			return FALSE;
		}
		
			// Helper Functions
			// -----------------------------------------------------------------
		
		public function GetAlphabets($args)
		{
			$starting_base = $args[startingbase];
			$ending_base = $args[endingbase];
			
			$starting_base_alphabet_function = $starting_base . 'Alphabet';
			$ending_base_alphabet_function = $ending_base . 'Alphabet';
			
			if(method_exists($this, $starting_base_alphabet_function) && method_exists($this, $ending_base_alphabet_function))
			{
				$this->binary_object = new Binary();
				
				$starting_base_alphabet = $this->$starting_base_alphabet_function();
				$ending_base_alphabet = $this->$ending_base_alphabet_function();
				
				$starting_base_bit_key_args = array(
					alphabet=>$starting_base_alphabet,
				);
				
				$starting_base_alphabet_keyed_results = $this->BitKeyAlphabet($starting_base_bit_key_args);
				
				$keyed_starting_base_alphabet = $starting_base_alphabet_keyed_results[keyedvalues];
				$keyed_starting_base_alphabet_values = $starting_base_alphabet_keyed_results[valuekeys];
				$keyed_starting_base_bit_length = $starting_base_alphabet_keyed_results[bitlength];
				
				$ending_base_bit_key_args = array(
					alphabet=>$ending_base_alphabet,
				);
				
				$ending_base_alphabet_keyed_results = $this->BitKeyAlphabet($ending_base_bit_key_args);
				
				$keyed_ending_base_alphabet = $ending_base_alphabet_keyed_results[keyedvalues];
				$keyed_ending_base_alphabet_values = $ending_base_alphabet_keyed_results[valuekeys];
				$keyed_ending_base_bit_length = $ending_base_alphabet_keyed_results[bitlength];
				
				return [
					startingalphabet=>$keyed_starting_base_alphabet,
					endingalphabet=>$keyed_ending_base_alphabet,
					startingalphabetvaluekeys=>$keyed_starting_base_alphabet_values,
					endingalphabetvaluekeys=>$keyed_ending_base_alphabet_values,
					startingalphabetbitlength=>$keyed_starting_base_bit_length,
					endingalphabetbitlength=>$keyed_ending_base_bit_length,
				];
			}
			
			return FALSE;
		}
		
		public function BitKeyAlphabet($args)
		{
			$alphabet = $args[alphabet];
			
			$bit_key_values_args = array(
				values=>$alphabet,
				baseobject=>$this,
			);
			
			$bit_keyed_alphabet = $this->binary_object->BitKeyValues($bit_key_values_args);
			
			return $bit_keyed_alphabet;
		}
		
			// Predefined Alphabets
			// -----------------------------------------------------------------
		
		public function Base64Alphabet()
		{
			return [
				'0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
				'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
				'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
				'+', '=',
			];
		}
		
		public function Base32Alphabet()
		{
			return [
				'0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
				'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v',
			];
		}
		
		public function HexadecimalAlphabet()
		{
			return [
				'0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
				'a', 'b', 'c', 'd', 'e', 'f',
			];
		}
		
		public function EightBitAlphabet()
		{
			return [
				'0', '1', '2', '3', '4', '5', '6', '7',
			];
		}
		
		public function BinaryAlphabet()
		{
			return [
				'0', '1',
			];
		}
	}
	
?>