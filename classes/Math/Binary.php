<?php

	class Binary
	{
		public function IncrementBinaryValue($args)
		{
			$binary_value = $args[binary];
			$binary_value_length = strlen($binary_value);
			
			for ($i = $binary_value_length - 1; $i > (-1); $i--)
			{
				$bit = $binary_value[$i];
				
				if($bit == '0')
				{
					$incremented_binary = substr($binary_value, 0, $i) . '1' . str_repeat('0',(strlen(substr($binary_value, $i + 1, $binary_value_length))));
					return $incremented_binary;
				}
			}
			
			return FALSE;
		}
		
		public function DecrementBinaryValue($args)
		{
			$binary_value = $args[binary];
			$binary_value_length = strlen($binary_value);
			
			for ($i = $binary_value_length - 1; $i > (-1); $i--)
			{
				$bit = $binary_value[$i];
				
				if($bit == '1')
				{
					$decremented_binary = substr($binary_value, 0, $i) . '0' . str_repeat('1',(strlen(substr($binary_value, $i + 1, $binary_value_length))));
					return $decremented_binary;
				}
			}
			
			return FALSE;
		}
		
		public function BitKeyValues($args)
		{
			$values = $args[values];
			$base_object = $args[baseobject];
			
			$get_bit_length_args = array(
				bitoptions=>$values,
				baseobject=>$base_object,
			);
			
			$bit_length = $this->GetBitLength($get_bit_length_args);
			
			$bit_word_starting_key = str_repeat('0', $bit_length);
			
			$keyed_values = array();
			$value_keys = array();
			
			foreach ($values as $value)
			{
				$keyed_values[$bit_word_starting_key] = $value;
				$value_keys[$value] = $bit_word_starting_key;
				
				$increment_binary_value_args = [
					binary=>$bit_word_starting_key,
				];
				
				$bit_word_starting_key = $this->IncrementBinaryValue($increment_binary_value_args);
			}
			
			return [
				'keyedvalues'=>$keyed_values,
				'valuekeys'=>$value_keys,
				'bitlength'=>$bit_length,
			];
			
			#print("LENGTH!" . $bit_length . "!");
		}
		
		public function GetBitLength($args)
		{
			$bit_options = $args[bitoptions];
			$base_object = $args[baseobject];
			
			$bit_options_count = count($bit_options);
			
		#	print_r($base_object);
			
			$is_base2_number_args = array(
				number=>$bit_options_count,
			);
			
			$base = $base_object->IsBase2Number($is_base2_number_args);
			
			$bit_length = FALSE;
			
			if($base)
			{
				$bit_length = $base;
			}
			else
			{
				# BT: HANDLE NON-BASE CASE
			}
			
		#	print_r($base);
			
			return $bit_length;
		}
	}
	
?>