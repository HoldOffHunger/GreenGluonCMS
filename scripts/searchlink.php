<?php

	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/SimpleErrors.php');
	require('../traits/scripts/SimpleForms.php');
	require('../traits/scripts/SimpleLookupLists.php');
	require('../traits/scripts/SimpleORM.php');
	require('../traits/scripts/SimpleSocialMedia.php');

	class searchlink extends basicscript
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
			return FALSE;
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
			
			$this->SetEntryChildRecordStats([]);
			
			$this->SetSearchTerm();
			
			if($this->search_term)
			{
				$this->SetORMSearch();
				$this->PerformSearch();
				$search_results_count = count($this->search_results);
				$this->search_results_count = $search_results_count;
				if($this->search_results)
				{
					if($search_results_count) {
						$this->SetSearchEntries();
						$this->SetSearchEntryChildRecords();
						$this->SetEntryParents();
						$this->FormatSearchTermInput();
					}
				}
			}
			
			return TRUE;
		}
		
		public function SetSearchEntryChildRecords()
		{
			return $this->entries = $this->GetChildRecords(['entries'=>$this->entries]);
		}
		
		public function SetEntryParents()
		{
			foreach($this->entries as $entry_key => $entry)
			{
				$this->entries[$entry_key]['parents'] = $this->GetEntryParents([entry=>$entry])['parents'];
			}
			
			return TRUE;
		}
		
		public function FormatSearchTermInput()
		{
			$search_term = $this->search_term;
			$search_term_pieces = explode(' ', $search_term);
			
			foreach($search_term_pieces as $search_term_piece_key => $search_term_piece)
			{
				$search_term_pieces[$search_term_piece_key] = trim($search_term_pieces[$search_term_piece_key]);
				
				if(!$search_term_pieces[$search_term_piece_key])
				{
					unset($search_term_pieces[$search_term_piece_key]);
				}
			}
			
			return $this->search_term_pieces = $search_term_pieces;
		}
		
		public function SetSearchTerm()
		{
			$this->search_term = $this->Param('search');
		}
		
		public function SetORMSearch()
		{
			require('../classes/Database/ORMSearchURL.php');
			
			return $this->orm_search = new ORMSearchURL([dbaccessobject=>$this->db_access_object]);
		}
		
		public function PerformSearch() {
			return $this->search_results = $this->orm_search->Search([
				url=>$this->search_term,
			]);
		}
		
		public function SetSearchEntries()
		{
			$search_results_count = count($this->search_results);
			
			$search_results = $this->search_results;
			$entry_ids = [];
			
			for($i = 0; $i < $search_results_count; $i++)
			{
				$search_result = $search_results[$i];
				
				$entry_ids[] = $search_result['Entryid'];
			}
			
			$get_record_where = [
				type=>'Entry',
				'definition'=>[
					'RAW'=>[
						id=>[
							'IN',
							'(' . implode(',', $entry_ids) . ')',
						],
					],
				],
				limit=>count($entry_ids),
			];
			
			return $this->entries = $this->db_access_object->GetRecords($get_record_where);
		}
	}

?>