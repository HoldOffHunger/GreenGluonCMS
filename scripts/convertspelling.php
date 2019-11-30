<?php
	require('../traits/scripts/DBAdminFunctions.php');
	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/SimpleForms.php');
	require('../traits/scripts/SimpleLookupLists.php');

	class convertspelling extends basicscript {
		use DBAdminFunctions;
		use DBFunctions;
		use SimpleLookupLists;
		use SimpleForms;
		
			// Security Data
		
		public function IsSecure() {
			return FALSE;
		}
		
		public function RequiresLogin() {
			return FALSE;
		}
		
		public function AdminOnly() {
			return FALSE;
		}
		
				// Primary Logic
				// ------------------------------------------------------------
		
		public function Display() {
			$text = $this->Param('text');
			$direction = $this->Param('direction');
			$this->SetPrimaryHostRecords();
			
			if($text && strlen($text) < 100000) {
				$text = trim($text);
								
				require('../classes/Language/AmericanBritishSpellings.php');
				$american_british_spellings = new AmericanBritishSpellings([]);
				
				if($direction == 'british-to-american') {
					$converted_text = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$text]);
				} else {
					$converted_text = $american_british_spellings->SwapAmericanSpellingsForBritishSpellings(['text'=>$text]);
				}
				
				$this->text = $this->CleanseForDisplay($text);
				$this->converted_text = $this->CleanseForDisplay($converted_text);
			}
			
			return TRUE;
		}
		
				// ** HTML FORMAT DATA ** //
		
			// Title
		
		public function GetHTMLFormatData_Title() {
			return 'British/American Spelling Converter';
		}
	}

?>