<?php

	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/SimpleErrors.php');
	require('../traits/scripts/SimpleForms.php');
	require('../traits/scripts/SimpleLookupLists.php');
	require('../traits/scripts/SimpleORM.php');
	require('../traits/scripts/SimpleSocialMedia.php');

	class suggest extends basicscript
	{
						// Traits
						// ---------------------------------------------
		
		use DBFunctions;
		use SimpleErrors;
		use SimpleForms;
		use SimpleLookupLists;
		use SimpleORM;
		use SimpleSocialMedia;
		
						// Security Data
						// ---------------------------------------------
		
		public function IsSecure()
		{
			return TRUE;
		}
		
		public function RequiresLogin()
		{
			return FALSE;
		}
		
						// View Functionality
						// ---------------------------------------------
		
		public function display()
		{
			$this->SetORMBasics();
			$this->SetRecordTree();
			$this->SetPrimaryHostRecords();
			
			if(!$this->ValidateOrm())
			{
				return FALSE;	# 404
			}
			
			$this->SetSuggestion();
			
			if(strlen($this->suggestion) > 0 && strlen($this->suggestiontype) > 0) {
				// make suggestion record
				
				$user_id = $this->authentication_object->user_session['User.id'];
				
				if($user_id && $this->entry['id']) {
					$suggestion_create_args = [
						type=>'Suggestion',
						definition=>[
							'Userid'=>$user_id,
							'Entryid'=>$this->entry['id'],
							'Suggestion'=>$this->suggestion,
							'Explanation'=>$this->suggestionexplanation,
							'SuggestionType'=>$this->suggestiontype,
						],
					];
					
					$this->suggestion_definition = $suggestion_create_args;
					$this->suggestion_record = $this->db_access_object->CreateRecord($suggestion_create_args);
				}
			}
			
			return TRUE;
		}
		
		public function SetSuggestion()
		{
			$this->suggestion = $this->Param('suggestion');
			$this->suggestionexplanation = $this->Param('suggestionexplanation');
			$this->suggestiontype = $this->Param('suggestiontype');
		}
	}

?>