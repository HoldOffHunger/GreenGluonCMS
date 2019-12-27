<?php
				
				/* AmericanBritishSpellings_Words
					
					Class for building word lists for converting UK/US english dialects.
					
				*/

	class EnglishMisspellings_Words {
			/* __construct($args)
			
				Constructor.
				
				Nothing to do here.
				
			*/
			
		public function __construct($args) {
			return TRUE;
		}
		
			/* GetAmericanToBritishSpellings()
			
				Build a mapping of Misspellings from the /Language/Words/EnglishMisspellings/ classes.
			
			*/

		public function GetEnglishMisspellings() {
			$word_hash = [];
			
			$word_directory = '../classes/Language/Words/EnglishMisspellings/';
			
			$letters = ['0'];
			$letters = array_merge($letters, range('A', 'Z'));
			
			foreach($letters as $letter) {
				$word_class = 'EnglishMisspellingsWords_' . $letter;
				$word_file = $word_class . '.php';
				$word_file_location = $word_directory . $word_file;
				require($word_file_location);
				$word_object = new $word_class([]);
				
				$words = $word_object->EnglishMisspellingsWords();
				
				$word_hash = array_merge($word_hash, $words);
			}
			
			return $word_hash;
		}
	}		
?>