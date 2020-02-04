<?php
				
				/* EnglishMisspellingsWords_0
					
					Class for English-Misspellings for all words beginning with : (numbers).
					
				*/

	class IntensiveEnglishMisspellingsWords_0 {
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
			$dynamic_misspellings = $this->EnglishMisspellingsWords_dynamicData();
			$static_misspellings = $this->EnglishMisspellingsWords_staticData();
			
			$misspellings = [];
			
			foreach($dynamic_misspellings as $word => $misspelling) {
				if(!$misspellings[$word]) {
					$misspellings[$word] = [];
				}
				$misspellings[$word] = array_merge($misspellings[$word], $misspelling);
			}
			
			foreach($static_misspellings as $word => $misspelling) {
				if(!$misspellings[$word]) {
					$misspellings[$word] = [];
				}
				$misspellings[$word] = array_merge($misspellings[$word], $misspelling);
			}
			
			#print("<PRE>");
		#	print_r($misspellings);
		#	print("</PRE>");
			
			return $misspellings;
		}
		
		public function EnglishMisspellingsWords_dynamicData() {
			$misspellings = [];
			
			$skip = [
				'i.e',
			];
			
			$left_space_misspelling_hash = [
				',',
				'.',
				')',
			];
			
			$right_space_misspelling_hash = [
				'(',
			];
			
			$alphas = range('a', 'z');
			$alphas = array_merge($alphas, range('0', '9'));
			
			foreach($left_space_misspelling_hash as $char) {
				foreach($alphas as $alpha) {
					$correct_string = $char . ' ' . $alpha;
					$incorrect_string = $char . $alpha;
					
					if($char == '.') {
						$incorrect_string = '[^A-Z0-1]' . $incorrect_string;
					}
					
					if(!$misspellings[$correct_string]) {
						$misspellings[$correct_string] = [];
					}
					
					$misspellings[$correct_string][] = $incorrect_string;
				}
			}
			
			foreach($right_space_misspelling_hash as $char) {
				foreach($alphas as $alpha) {
					$correct_string = $alpha . ' ' . $char;
					$incorrect_string = $alpha . $char;
					
					if(!$misspellings[$correct_string]) {
						$misspellings[$correct_string] = [];
					}
					
					$misspellings[$correct_string][] = $incorrect_string;
				}
			}
			
			return $misspellings;
		}
		
		public function EnglishMisspellingsWords_staticData() {
			return [
				','=>[
					' ,',
					',,',
				],
				'.'=>[
					' .',
				],
				'!'=>[
					' !',
				],
				'?'=>[
					' ?',
				],
				'--'=>[
					'---',
					'----',
					'-----',
					'------',
					'-------',
					'--------',
					'[a-z0-9]--[a-z0-9]',
					'[a-z0-9]- ',
					' -[a-z0-9]',
				],
			];
		}
	}
	
?>