<?php

	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/SimpleErrors.php');
	require('../traits/scripts/SimpleForms.php');
	require('../traits/scripts/SimpleGeography.php');
	require('../traits/scripts/SimpleLookupLists.php');
	require('../traits/scripts/SimpleORM.php');

	class spellchecker extends basicscript {
						// Traits
						// ---------------------------------------------
		
		use DBFunctions;
		use SimpleErrors;
		use SimpleForms;
		use SimpleGeography;
		use SimpleLookupLists;
		use SimpleORM;
		
						// Security Data
						// ---------------------------------------------
		
		public function IsSecure() {
			return FALSE;
		}
		
		public function RequiresLogin() {
			return FALSE;
		}
		
						// Functionality
						// ---------------------------------------------
		
		public function display() {
			$this->SetORM();
			$this->SetRecordTree();
			$this->SetPrimaryHostRecords();
			
			if(!$this->ValidateOrm()) {
				return FALSE;	# 404
			}
			
			$this->SetMasterRecord();
			$this->SetGeographyBasics();
			
			$this->FormatErrors();
			require('../classes/Language/EnglishMisspellings.php');
			$this->misspellings = new EnglishMisspellings();
			$this->misspelled_words = $this->misspellings->GetWords_Misspelled();
			
			return TRUE;
		}
	}

?>