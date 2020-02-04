<?php
				
				/* EnglishMisspellingsWords_U
					
					Class for English-Misspellings for all words beginning with : U.
					
				*/

	class EnglishMisspellingsWords_U {
			/* __construct($args)
			
				Constructor.
				
				Nothing to do here.
			
			*/
			
		public function __construct($args) {
			return TRUE;
		}
		
			/* EnglishMisspellingsWords()
			
				List of English misspellings for words starting with : U.
			
			*/

		public function EnglishMisspellingsWords() {
			return [
				'undertook'=>['undertok',],
				'unexpectedly'=>['unexpectadly',],
				'unforeseen'=>['unforseen',],
				'uninterrupted'=>'uninterupted',
				'united'=>[
					'unitesd',
					'unitd',
				],
				'united states'=>[				
					'unitd states',
					'united staes',
					'united stats',
				],
				'universities'=>['univerisities',],
				'unmanageable'=>'umnanageable',
				'unmistakable'=>'unmistakeable',
				'upon'=>'apon',
			];
		}
	}
	
?>