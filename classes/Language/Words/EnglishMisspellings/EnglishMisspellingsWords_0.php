<?php
				
				/* EnglishMisspellingsWords_0
					
					Class for English-Misspellings for all words beginning with : (numbers).
					
				*/

	class EnglishMisspellingsWords_0 {
			/* __construct($args)
			
				Constructor.
				
				Nothing to do here.
			
			*/
			
		public function __construct($args) {
			return TRUE;
		}
		
			/* EnglishMisspellingsWords()
			
				List of English misspellings for words starting with : (numbers).
			
			*/

		public function EnglishMisspellingsWords() {
		
				/* TODO
				
					1870s=>1870's
					
					https://www.oreilly.com/library/view/mysql-cookbook/0596001452/ch04s13.html
					
				*/
		
			return $this->GenerateNumberOCRProblems();
		}
		
		public function GetOCRMatchups() {
			$matchups = [
				'0'=>'O',
				'1'=>'I',
		#		'5'=>'S',
		#		'8'=>'S',
		#		'9'=>'S',
			];
			
			return $matchups;
		}
		
		public function GenerateNumberOCRProblems() {
			$misspelled_words = [];
			$matchups = $this->GetOCRMatchups();
			
			$numberth_separators = ['', ' '];
			
			for($i = 0; $i < 1000; $i++) {
				foreach($numberth_separators as $numberth_separator) {
					$modulo = $i % 10;
					if($modulo == 1) {
						$word = $i . $numberth_separator . 'st';
					} elseif($modulo == 2) {
						$word = $i . $numberth_separator . 'nd';
					} elseif($modulo == 3) {
						$word = $i . $numberth_separator . 'rd';
					} else {
						$word = $i . $numberth_separator . 'th';
					}
					
					$interpolated_options = $this->InterpolateStrings(['matchups'=>$matchups, 'number'=>$word]);
					
					if(count($interpolated_options)) {
						$misspelled_words[$word] = $interpolated_options;
					}
				}
			}
			
			$min = 1;
			$max = 10000;
			
			for($i = $min; $i < $max; $i++) {
				$interpolated_options = $this->InterpolateStrings(['matchups'=>$matchups, 'number'=>$i]);
				
				if(count($interpolated_options)) {
					$misspelled_words[$i] = $interpolated_options;
				}
				
				if($i >= 1000) {
				//	$misspelled_words[$i][] = $i;
				}
			}
			
		//	$misspelled_words['[sic]'] = [
		//		'[sic]',
		//		'(sic)',
		//	];
			
		#	print("<PRE>");
		#	print_r($misspelled_words);
		#	print("</PRE>");
			#die("why");
			return $misspelled_words;
		}
		
		public function InterpolateStrings($args) {
			$number = $args['number'];
			$matchups = $args['matchups'];
			
			$possible_chars = str_split($number);
			$possible_chars_count = count($possible_chars);
			$interoperable_chars = [];
			
			for($i = 0; $i < $possible_chars_count; $i++) {
				$possible_char = $possible_chars[$i];
				
				if($matchups[$possible_char]) {
					$interoperable_chars[] = $possible_char;
				}
			}
			
			$interoperable_chars_count = count($interoperable_chars);
			$max_interpolations = pow(2, $interoperable_chars_count);
			
			if($interoperable_chars_count == 0) {
				return [];
			}
			
			$pad_length = $interoperable_chars_count;
			$matchup_keys = array_keys($matchups);
			
			$interpolated_strings = [];
			
			for($i = 1; $i < $max_interpolations; $i++) {
				$binary = decbin($i);
				$full_binary = str_pad($binary, $pad_length, '0', STR_PAD_LEFT);
				
				$binary_chars = str_split($full_binary);
				$binary_index = 0;
				
				$interpreted_string = (string)$number;
				
				$binary_char = $binary_chars[0];
				for($j = 0; $j < $possible_chars_count; $j++) {
					$possible_char = $possible_chars[$j];
					if($matchups[$possible_char]) {
						#print("SOY!" . $possible_char . "|\n\n");
						
						if($binary_chars[$binary_index]) {
							$matchup = $matchups[$possible_char];
							$interpreted_string[$j] = $matchup;
						}
						$binary_index++;
						$binary_char = $binary_chars[$binary_index];
					}
				}
				
				if(preg_match('/[0-9]/', $interpreted_string)) {
					$interpolated_strings[] = $interpreted_string;
				}
			}
			
			return $interpolated_strings;
		}
	}
	
?>