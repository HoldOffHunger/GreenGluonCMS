<?php

	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/SimpleErrors.php');
	require('../traits/scripts/SimpleForms.php');
	require('../traits/scripts/SimpleGeography.php');
	require('../traits/scripts/SimpleLookupLists.php');
	require('../traits/scripts/SimpleORM.php');

	class languages extends basicscript
	{
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
		
		public function IsSecure()
		{
			return FALSE;
		}
		
		public function RequiresLogin()
		{
			return FALSE;
		}
		
						// Functionality
						// ---------------------------------------------
		
		public function display()
		{
			$this->SetORM();
			$this->SetRecordTree();
			$this->SetPrimaryHostRecords();
			
			if(!$this->ValidateOrm())
			{
				return FALSE;	# 404
			}
			
			$this->SetMasterRecord();
			$this->SetGeographyBasics();
			
			$this->FormatErrors();
			
			return TRUE;
		}
		
						// HTML Data
						// ---------------------------------------------
		
		public function GetHTMLFormatData_Title()
		{
			if(!$this->parent['id'] && $this->master_record && $this->master_record['id'])
			{
				if($this->language_object->getLanguageCode() == 'en')
				{
					$header_title_text = 'Select Language For ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
				}
				else
				{
					$contact_header_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesHeader']);
					
					if($contact_header_language_translations[$this->language_object->getLanguageCode()])
					{
						$header_title_text = $contact_header_language_translations[$this->language_object->getLanguageCode()];
					}
					else
					{
						$header_title_text = 'Select Language For ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					}
				}
				
				return $this->header_title_text = $header_title_text;
			}
			return FALSE;
		}
	}

?>