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
			return [
				'1,000'=>'1000',
				'1,100'=>'1100',
				'1,200'=>'1200',
				
				'1800mm'=>'1,800 mm',
				
				'I900'=>'1900',
				'19OO'=>'1900',
			];
		}
	}
	
?>