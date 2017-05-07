<?php

	class UTF8Characters
	{
		public function SystemCharSet()
		{
			return 'UTF-8';
		}
		
		public function SetCharSet($format)
		{
			if(!(strlen($format)))
			{
				$format = $this->SystemCharSet();
			}
			
			return $format;
		}
		
		public function CleanseInput_UTF8($args)
		{
			$input = $args[input];
			$format = $this->SetCharSet($args[format]);
			$convertentities = $args[convertentities];
			
			if($convertentities)
			{
				$conversion_bit_mask = $this->CleanseInput_UTF8_Formatting();
			}
			else
			{
				$conversion_bit_mask = $this->CleanseInput_UTF8NoEntities_Formatting();
			}
			
			$cleansed_input = mb_encode_numericentity($input, $conversion_bit_mask, $format);
			
			$cleansed_input_results = [
				'cleansedinput'=>$cleansed_input,
			];
			
			return $cleansed_input_results;
		}
		
		public function CleanseInput_UTF8_Formatting()
		{
			$standard_offset = $this->CleanseInput_UTF8_Formatting_StandardOffset();
			$standard_mask = $this->CleanseInput_UTF8_Formatting_StandardMask();
			
			return [
					// Handle Chars 0x00 to 0x1f = Control Chars
				0x0000, 0x0009, $standard_offset, $standard_mask,
				
				0x000B, 0x000C, $standard_offset, $standard_mask,
				
				0x000D, 0x001F, $standard_offset, $standard_mask,
			
					// Handle Char 0x22 = Quote
				0x0022, 0x0022, $standard_offset, $standard_mask,
			
					// Handle Char 0x26 = Ampersand
				0x0026, 0x0026, $standard_offset, $standard_mask,
			
					// Handle Char 0x3c = Lesser-Than Sign
				0x003c, 0x003c, $standard_offset, $standard_mask,
			
					// Handle Char 0x3e = Greater-Than Sign
				0x003e, 0x003e, $standard_offset, $standard_mask,
			
					// Handle Chars 0x007f to 0xc2bb = Don't Convert Fractions and Inverted Question Marks
				0x007f, 0x00bb, $standard_offset, $standard_mask,
			
					// Handle Chars 0x007f to 0xffff = All Other Chars
				0x00c0, 0xffff, $standard_offset, $standard_mask,
			];
		}
		
		public function CleanseInput_UTF8NoEntities_Formatting()
		{
			$standard_offset = $this->CleanseInput_UTF8_Formatting_StandardOffset();
			$standard_mask = $this->CleanseInput_UTF8_Formatting_StandardMask();
			
			return [
					// Handle Chars 0x00 to 0x1f = Control Chars
			#	0x0000, 0x0009, $standard_offset, $standard_mask,
				
			#	0x000B, 0x000C, $standard_offset, $standard_mask,
				
			#	0x000D, 0x001F, $standard_offset, $standard_mask,
				0x0000, 0x0000, $standard_offset, $standard_mask,
			];
		}
		
		public function CleanseInput_UTF8_Formatting_StandardOffset()
		{
			return 0;
		}
		
		public function CleanseInput_UTF8_Formatting_StandardMask()
		{
			return 0xffff;
		}
	}
	
?>