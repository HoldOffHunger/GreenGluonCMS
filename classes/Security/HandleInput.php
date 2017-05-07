<?php

	class HandleInput
	{
		public function __construct()
		{
			$html_entity_characters = new HTMLEntities();
			$this->html_entity_characters = $html_entity_characters;
			
			$utf8_characters = new UTF8Characters();
			$this->utf8_characters = $utf8_characters;
			
			$phishing_characters = new PhishingCharacters();
			$this->phishing_characters = $phishing_characters;
		}
		
		public function CleanseInput($args)
		{
			$input = $args[input];
			
				// Handle Input
			
			$cleansed_input = $input;
			
				// HTML Entities
			
			$cleanse_input_html_entities_args = array(
				'input'=>$cleansed_input,
				'format'=>$this->CleanseInput_Format(),
			);
			
			$cleansed_input = $this->html_entity_characters->CleanseInput_HTMLEntities($cleanse_input_html_entities_args)[cleansedinput];
			
				// UTF-8 Conversion
				
			$cleanse_escape_bit_variable_chars = array(
				'input'=>$cleansed_input,
			);
				
			$cleansed_input = $this->CleanseInput_EscapeBitVariableChars($cleanse_escape_bit_variable_chars)[cleansedinput];
			
				// Phishing Characters Conversion
			
			$cleanse_input_phishing_characters_args = array(
				'input'=>$cleansed_input,
			);
			
			$cleansed_input = $this->phishing_characters->CleanseInput_PhishingCharacters($cleanse_input_phishing_characters_args)[cleansedinput];
			
				// Return Results
			
			$cleanse_input_results = array(
				'cleansedinput'=>$cleansed_input,
			);
			
			return $cleanse_input_results;
		}
		
		public function CleanseInput_EscapeBitVariableChars($args)
		{
			$input = $args[input];
			
			$cleanse_input_utf8_args = array(
				'input'=>$input,
				'format'=>$this->CleanseInput_Format(),
			);
			
			$cleansed_input = $this->utf8_characters->CleanseInput_UTF8($cleanse_input_utf8_args)[cleansedinput];
			
			return array(
				cleansedinput=>$cleansed_input,
			);
		}
		
		public function CleanseInput_Integer($args)
		{
			$input = $args[input];
			
			$cleansed_input = $input;
			
			$cleansed_input = (int)$cleansed_input;
			
			$cleanse_input_results = array(
				'cleansedinput'=>$cleansed_input,
			);
			
			return $cleanse_input_results;
		}
		
		public function EscapeHTML($args)
		{
			$input = $args[input];
			
			$cleansed_input = $input;
			
			$cleansed_input = htmlentities($cleansed_input, ENT_QUOTES | ENT_HTML401, $this->CleanseInput_Format());
			
			$cleanse_input_results = ['cleansedinput'=>$cleansed_input];
			
			return $cleanse_input_results;
		}
		
		public function CleanseInput_Filename($args)
		{
			$input = $args[input];
			
			$cleansed_input = $input;
			
			$cleansed_input = str_replace('/', '', $cleansed_input);
			
			$cleanse_input_results = array(
				'cleansedinput'=>$cleansed_input,
			);
			
			return $cleanse_input_results;
		}
		
		public function CleanseInput_GetQuery()
		{
			$query = $_GET;
			unset($query[url]);
			
			$query_string_array = array();
			
			foreach($query as $key => $value)
			{
				$getquery_cleansing_key_args = array(
					'input'=>$key,
				);
				
				$cleansed_key = $this->CleanseInput_GetQuery_Cleanse($getquery_cleansing_key_args)[cleansedinput];
				
				$getquery_cleansing_value_args = array(
					'input'=>$value,
				);
				
				$cleansed_value = $this->CleanseInput_GetQuery_Cleanse($getquery_cleansing_value_args)[cleansedinput];
				
				$cleansed_key_to_value = $cleansed_key . "=" . $cleansed_value;
				
				$query_string_array[] = $cleansed_key_to_value;
			}
			
			$query_string = implode("&", $query_string_array);
			
			return ($query_string);
		}
		
		public function CleanseInput_GetQuery_Cleanse($args)
		{
			$input = $args[input];
			
				// Handle Input
			
			$cleansed_input = $input;
			
				// HTML Entities
			
			$cleanse_input_html_entities_args = array(
				'input'=>$cleansed_input,
				'format'=>$this->CleanseInput_Format(),
			);
			
			$cleansed_input = $this->html_entity_characters->CleanseInput_HTMLEntities($cleanse_input_html_entities_args)[cleansedinput];
			
				// UTF-8 Conversion
			
			$cleanse_input_utf8_args = array(
				'input'=>$cleansed_input,
				'format'=>$this->CleanseInput_Format(),
			);
			
			$cleansed_input = $this->utf8_characters->CleanseInput_UTF8($cleanse_input_utf8_args);
			$cleansed_input = $cleansed_input[cleansedinput];
			
				// Return Results
			
			$cleanse_input_results = array(
				'cleansedinput'=>$cleansed_input,
			);
			
			return $cleanse_input_results;
		}
		
		public function CleanseInput_Format()
		{
			return 'UTF-8';
		}
	}

?>