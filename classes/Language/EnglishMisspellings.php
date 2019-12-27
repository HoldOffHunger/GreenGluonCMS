<?php
				
				/* EnglishMisspellings
					
					Class for converting detecting misspellings in English.
					
				*/
				
				
	class EnglishMisspellings {
			/* __construct($args)
			
				Constructor.
				
				Load the words into the converter class for ready use.
			
			*/
		
		public function __construct($args) {
			require('../classes/Language/EnglishMisspellings_Words.php');
			$this->words = new EnglishMisspellings_Words([]);
			$this->misspellings = $this->words->GetEnglishMisspellings();
			return TRUE;
		}
	}
?>