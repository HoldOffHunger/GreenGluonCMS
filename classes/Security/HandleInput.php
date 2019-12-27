<?php

	class HandleInput {
		public function __construct() {
			$html_entity_characters = new HTMLEntities();
			$this->html_entity_characters = $html_entity_characters;
			
			$utf8_characters = new UTF8Characters();
			$this->utf8_characters = $utf8_characters;
			
			$phishing_characters = new PhishingCharacters();
			$this->phishing_characters = $phishing_characters;
		}
		
		public function FormatTitleOuput($args) {
			$text = $args['text'];
			
			if(strlen($text) > 50) {
				$text = substr($text, 0, 50);
				$text = rtrim($text);
				$text .= '...';
			}
			
			return $text;
		}
		
		public function FormatListOutput($args) {
			if(!$this->ValidToFormatListOutput($args)) {
				return $text;
			}
			
			$text = $args['text'];
			
			$text = $this->StripBCMLCode([text=>$text]);
			$text = $this->StripCitationMarks([text=>$text]);
			$text = $this->StripCitationNumbers([text=>$text]);
			$text = $this->StripExcessiveDashes([text=>$text]);
			$text = $this->SwapHTMLWithSpaces([text=>$text]);
			$text = $this->StripTags([text=>$text]);
			$text = $this->DecodeHTMLEntities([text=>$text]);
			$text = $this->SwapMultipleSpacesWithSingleSpaces([text=>$text]);
			$text = $this->HandlePossibleUTF8Corruption([text=>$text]);
			$text = $this->TrimText([text=>$text]);
			$text = $this->AppendTruncatingPeriods([text=>$text]);
			
			return $text;
		}
		
		public function ValidToFormatListOutput($args) {
			$text = $args['text'];
			
			if(strlen($text) < 1) {
				return FALSE;
			}
			
			return TRUE;
		}
		
		public function StripBCMLCode($args) {
			$text = $args['text'];
			
			$text = preg_replace('/Image::(\d+)/', ' ', $text);
			
			return $text;
		}
		
		public function StripCitationMarks($args) {
			$text = $args['text'];
			
			$text = preg_replace('/[\*†‡¶]/', '', $text);
			
			return $text;
		}
		
		public function StripCitationNumbers($args) {
			$text = $args['text'];
			
			$text = preg_replace("/\[[\d\s]+\]/", '', $text);
			$text = preg_replace("/\([\d\s]+\)/", '', $text);
			
			return $text;
		}
		
		public function StripExcessiveDashes($args) {
			$text = $args['text'];
			
			$text = $this->StripCommonDashes([text=>$text]);
			$text = $this->StripUncommonDashes([text=>$text]);
			
			return $text;
		}
		
		public function StripCommonDashes($args) {
			$text = $args['text'];
			
			$text = preg_replace("/[-]{4,1000}/", ' ', $text);
			$text = preg_replace("/[_]{2,1000}/", ' ', $text);
			
			return $text;
		}
		
		public function StripUncommonDashes($args) {
			$text = $args['text'];
			
			$text = preg_replace("/[—]{4,1000}/", ' ', $text);
			$text = preg_replace("/[–]{4,1000}/", ' ', $text);
			
			return $text;
		}
		
		public function SwapHTMLWithSpaces($args) {
			$text = $args['text'];
			
			$preformat = $this->GetReplaceableHTMLAndTextSpacing();
			
			$text = str_replace($preformat, ' ', $text);
			
			return $text;
		}
		
		public function GetReplaceableHTMLAndTextSpacing() {
			$replaceable_whitespacing = [];
			
			$replaceable_whitespacing = array_merge($replaceable_whitespacing, $this->GetReplaceableHTMLSpacing());
			$replaceable_whitespacing = array_merge($replaceable_whitespacing, $this->GetReplaceableTextSpacing());
			
			return $replaceable_whitespacing;
		}
		
		public function GetReplaceableHTMLSpacing() {
			$replaceable_tags = $this->GetReplaceableHTMLTags();
			$replaceable_tags_count = count($replaceable_tags);
			
			$replaceable_html = [];
			
			for($i = 0; $i < $replaceable_tags_count; $i++) {
				$replaceable_tag = $replaceable_tags[$i];
				$replaceable_html[] = '<' . $replaceable_tag . '>';
				$replaceable_html[] = '<' . $replaceable_tag . ' >';
				$replaceable_html[] = '<' . $replaceable_tag . '/>';
				$replaceable_html[] = '<' . $replaceable_tag . ' />';
			}
			
			return $replaceable_html;
		}
		
		public function GetReplaceableHTMLTags() {
			$replaceable = [
				'hr',
				'br',
				'p',
			];
			
			return $replaceable;
		}
		
		public function GetReplaceableTextSpacing() {
			$replaceable = [
				"\t",
				"\n",
				"\r",
				'&nbsp;',
			];
			
			return $replaceable;
		}
		
		public function StripTags($args) {	
			$text = $args['text'];
			
			$text = strip_tags($text);
			
			return $text;
		}
		
		public function DecodeHTMLEntities($args) {
			$text = $args['text'];
			
			$text = html_entity_decode($text);
			
			return $text;
		}
		
		public function SwapMultipleSpacesWithSingleSpaces($args) {
			$text = $args['text'];
			
			$text = preg_replace('!\s+!', ' ', $text);
			
			return $text;
		}
		
		public function HandlePossibleUTF8Corruption($args) {
			$text = $args['text'];
			
			$text = preg_replace('/[[:^print:]]/', "", $text);
			
			return $text;
		}
		
		public function TrimText($args) {
			$text = $args['text'];
			
			$text = trim($text);
			
			return $text;
		}
		
		public function AppendTruncatingPeriods($args) {
			$text = $args['text'];
			
			$text_length = strlen($text);
			
			$last_char = $text[$text_length - 1];
			
			if($last_char != '.' && $last_char != '!' && $last_char != '?') {
				$text .= '...';
			}
			
			return $text;
		}
		
		public function CleanseInput($args) {
			$input = $args[input];
			
				// Handle Input
			
			$cleansed_input = $input;
			
				// HTML Entities
			
			$cleanse_input_html_entities_args = [
				'input'=>$cleansed_input,
				'format'=>$this->CleanseInput_Format(),
			];
			
			$cleansed_input = $this->html_entity_characters->CleanseInput_HTMLEntities($cleanse_input_html_entities_args)[cleansedinput];
			
				// UTF-8 Conversion
				
			$cleanse_escape_bit_variable_chars = [
				'input'=>$cleansed_input,
			];
				
			$cleansed_input = $this->CleanseInput_EscapeBitVariableChars($cleanse_escape_bit_variable_chars)[cleansedinput];
			
				// Phishing Characters Conversion
			
			$cleanse_input_phishing_characters_args = [
				'input'=>$cleansed_input,
			];
			
			$cleansed_input = $this->phishing_characters->CleanseInput_PhishingCharacters($cleanse_input_phishing_characters_args)[cleansedinput];
			
				// Return Results
			
			$cleanse_input_results = [
				'cleansedinput'=>$cleansed_input,
			];
			
			return $cleanse_input_results;
		}
		
		public function CleanseInput_EscapeBitVariableChars($args) {
			$input = $args[input];
			
			$cleanse_input_utf8_args = [
				'input'=>$input,
				'format'=>$this->CleanseInput_Format(),
			];
			
			$cleansed_input = $this->utf8_characters->CleanseInput_UTF8($cleanse_input_utf8_args)[cleansedinput];
			
			return [
				cleansedinput=>$cleansed_input,
			];
		}
		
		public function CleanseInput_Integer($args) {
			$input = $args[input];
			
			$cleansed_input = $input;
			
			$cleansed_input = (int)$cleansed_input;
			
			$cleanse_input_results = [
				'cleansedinput'=>$cleansed_input,
			];
			
			return $cleanse_input_results;
		}
		
		public function EscapeHTML($args) {
			$input = $args[input];
			
			$cleansed_input = $input;
			
			$cleansed_input = htmlentities($cleansed_input, ENT_QUOTES | ENT_HTML401, $this->CleanseInput_Format());
			
			$cleanse_input_results = ['cleansedinput'=>$cleansed_input];
			
			return $cleanse_input_results;
		}
		
		public function CleanseInput_Filename($args) {
			$input = $args[input];
			
			$cleansed_input = $input;
			
			$cleansed_input = str_replace('/', '', $cleansed_input);
			
			$cleanse_input_results = [
				'cleansedinput'=>$cleansed_input,
			];
			
			return $cleanse_input_results;
		}
		
		public function CleanseInput_GetQuery() {
			$query = $_GET;
			unset($query[url]);
			
			$query_string_array = [];
			
			foreach($query as $key => $value)
			{
				$getquery_cleansing_key_args = [
					'input'=>$key,
				];
				
				$cleansed_key = $this->CleanseInput_GetQuery_Cleanse($getquery_cleansing_key_args)[cleansedinput];
				
				$getquery_cleansing_value_args = [
					'input'=>$value,
				];
				
				$cleansed_value = $this->CleanseInput_GetQuery_Cleanse($getquery_cleansing_value_args)[cleansedinput];
				
				$cleansed_key_to_value = $cleansed_key . "=" . $cleansed_value;
				
				$query_string_array[] = $cleansed_key_to_value;
			}
			
			$query_string = implode("&", $query_string_array);
			
			return ($query_string);
		}
		
		public function CleanseInput_GetQuery_Cleanse($args) {
			$input = $args[input];
			
				// Handle Input
			
			$cleansed_input = $input;
			
				// HTML Entities
			
			$cleanse_input_html_entities_args = [
				'input'=>$cleansed_input,
				'format'=>$this->CleanseInput_Format(),
			];
			
			$cleansed_input = $this->html_entity_characters->CleanseInput_HTMLEntities($cleanse_input_html_entities_args)[cleansedinput];
			
				// UTF-8 Conversion
			
			$cleanse_input_utf8_args = [
				'input'=>$cleansed_input,
				'format'=>$this->CleanseInput_Format(),
			];
			
			$cleansed_input = $this->utf8_characters->CleanseInput_UTF8($cleanse_input_utf8_args);
			$cleansed_input = $cleansed_input[cleansedinput];
			
				// Return Results
			
			$cleanse_input_results = [
				'cleansedinput'=>$cleansed_input,
			];
			
			return $cleanse_input_results;
		}
		
		public function CleanseInput_Format() {
			return 'UTF-8';
		}
	}

?>