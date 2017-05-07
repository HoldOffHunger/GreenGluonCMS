<?php

	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/SimpleErrors.php');
	require('../traits/scripts/SimpleForms.php');
	require('../traits/scripts/SimpleLookupLists.php');
	require('../traits/scripts/SimpleORM.php');
	require('../traits/scripts/SimpleSocialMedia.php');

	class search extends basicscript
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
				$this->SetSearchResultCount();
				$this->SetBrowseParameters();
				$this->PerformSearch();
				if($this->search_results)
				{
					$search_results_count = count($this->search_results);
					
					if($search_results_count)
					{
						$this->SetSearchEntries();
						$this->SetEntryScoreList();
						$this->SetSearchEntryScores();
						$this->SetSearchEntryChildRecords();
						$this->SetEntryParents();
						$this->FormatSearchTermInput();
						$this->SetEntrySearchText();
						$this->SetTagCounts();
					}
				}
			}
			
			return TRUE;
		}
		
		public function SetSearchTerm()
		{
			return $this->search_term = urldecode($this->Param('search'));
		}
		
		public function SetORMSearch()
		{
			require('../classes/Database/ORMSearch.php');
			
			return $this->orm_search = new ORMSearch([dbaccessobject=>$this->db_access_object]);
		}
		
		public function SetSearchResultCount()
		{
			return $this->search_results_count = $this->orm_search->SearchResultsCount([
				searchterm=>$this->search_term,
			]);
		}
		
		public function PerformSearch()
		{
			return $this->search_results = $this->orm_search->Search([
				searchterm=>$this->search_term,
				startindex=>$this->search_record_start_index,
				endindex=>$this->perpage,
			]);
		}
		
		public function SetEntryScoreList()
		{
			$entry_scores = [];
			
			foreach($this->search_results as $search_result)
			{
				$entry_scores[$search_result['TextBody_Entryid']] = $search_result['score'];
			}
			
			return $this->entry_scores = $entry_scores;
		}
		
		public function SetSearchEntryScores()
		{
			$entry_scores = $this->entry_scores;
			
			foreach($this->entries as $entry_key => $entry)
			{
				$this->entries[$entry_key]['score'] = $entry_scores[$entry['id']];
			}
			
			return TRUE;
		}
		
		public function SetSearchEntries()
		{
			$search_results_count = count($this->search_results);
			
			$search_results = $this->search_results;
			$entry_ids = [];
			
			for($i = 0; $i < $search_results_count; $i++)
			{
				$search_result = $search_results[$i];
				
				$entry_ids[] = $search_result['TextBody_Entryid'];
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
		
		public function SetEntryParents()
		{
			foreach($this->entries as $entry_key => $entry)
			{
				$this->entries[$entry_key]['parents'] = $this->GetEntryParents([entry=>$entry])['parents'];
			}
			
			return TRUE;
		}
		
		public function SetSearchEntryChildRecords()
		{
			return $this->entries = $this->GetChildRecords(['entries'=>$this->entries]);
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
		
		public function SetEntrySearchText()
		{
			foreach($this->entries as $entry_key => $entry)
			{
				$text = $entry['textbody'][0]['Text'];
				unset($this->entries[$entry_key]['textbody'][0]['Text']);
				$this->entries[$entry_key]['matchedtext'] = $this->SetSingleEntrySearchText([text=>$text]);
				
				$parents = $entry['parents'];
				
				foreach($parents as $parent_key => $parent)
				{
					unset($parents[$parent_key]['textbody'][0]['Text']);
				}
				
				$this->entries[$entry_key]['parents'] = $parents;
			}
			
			return TRUE;
		}
		
		public function SetSingleEntrySearchText($args)
		{
			$text = trim(html_entity_decode(strip_tags($args['text'])));
			$search_term = $this->search_term;
			
			$text_pieces = preg_split('/' . $search_term . '/i', $text);
			$text_pieces_count = count($text_pieces);
			
			$search_text = '';
			
			$string_length = 350;
			
			if($text_pieces_count > 1)
			{
				$text_left_side = $text_pieces[0];
				$text_right_side = $text_pieces[1];
				
				$search_text =
					substr($text_left_side, (-1 * $string_length)) .
					'<strong><em>' .
					$search_term .
					'</em></strong>' .
					substr($text_right_side, 0, $string_length);
				
				$search_text = '...' . trim($search_text) . '...';
				
				$earlyexit = 0;
				for($i = 2; $i < $text_pieces_count; $i++)
				{
					if(strlen($search_text) < (2 * $string_length) && $text_pieces[$i])
					{
						$text_right_side = $text_pieces[$i];
						
						$search_text .=
							'<strong><em>' .
							$search_term .
							'</em></strong>' .
							substr($text_right_side, 0, $string_length);
							
						$search_text .= '...';
					}
					else
					{
						$i = $text_pieces_count;
						$earlyexit = 1;
					}
				}
			}
			else
			{
				$search_term_pieces = $this->search_term_pieces;
				$search_term_piece_count = count($search_term_pieces);
				
				for($i = 0; $i < $search_term_piece_count; $i++)
				{
					$search_term_piece = $search_term_pieces[$i];
					
					$search_term_piece_text_pieces = preg_split('/' . $search_term_piece . '/i', $text);
					$search_term_piece_text_pieces_count = count($search_term_piece_text_pieces);
					
					if($search_term_piece_text_pieces_count > 1)
					{
						$text_left_side = $search_term_piece_text_pieces[0];
						$text_right_side = $search_term_piece_text_pieces[1];
						$search_term_text =
							substr($text_left_side, (-1 * $string_length)) .
							'<strong><em>' .
							$search_term_piece .
							'</em></strong>' .
							substr($text_right_side, 0, $string_length);
						
						$search_term_text = '...' . trim($search_term_text) . '...';
						
						$earlyexit = 0;
						for($i = 2; $i < $search_term_piece_text_pieces_count; $i++)
						{
							if(strlen($search_term_text) < (2 * $string_length) && $search_term_piece_text_pieces[$i])
							{
								$text_left_side = $search_term_piece_text_pieces[$i - 1];
								$text_right_side = $search_term_piece_text_pieces[$i];
								
								$search_term_text .=
									substr($text_left_side, (-1 * $string_length)) .
									'<strong><em>' .
									$search_term_piece .
									'</em></strong>' .
									substr($text_right_side, 0, $string_length) . '...';
							}
							else
							{
								$i = $search_term_piece_text_pieces_count;
								$earlyexit = 1;
							}
						}
						
						$search_text .= $search_term_text;
					}
				}
			}
			
			return $search_text;
		}
		
		public function SetBrowseParameters()
		{
			$this->SetBrowseParameters_PageAndPerPage();
			$this->SetBrowseParameters_TotalPages();
			$this->SetBrowseParameters_RemainingPages();
		}
		
		public function SetBrowseParameters_PageAndPerPage()
		{
			$this->page = (int)$this->Param('page');
			$possible_per_page = $this->Param('perpage');
			if($possible_per_page == 'custom')
			{
				$this->custom_per_page_selected = true;
				$possible_per_page = $this->Param('CustomPerPage');
			}
			$this->perpage = (int)$possible_per_page;
			
			if($this->page < 1)
			{
				$this->page = 1;
			}
			
			if($this->perpage < 0)
			{
				$this->perpage = $this->browse_DefaultPerPage();
			}
			
			if($this->perpage < $this->browse_MinPerPage())
			{
				$this->perpage = $this->browse_DefaultPerPage();
			}
			elseif($this->perpage > $this->browse_MaxPerPage())
			{
				$this->perpage = $this->browse_MaxPerPage();
			}
			
			$search_record_start_index = ($this->page - 1) * $this->perpage + 1;
			if($search_record_start_index > $this->search_results_count)
			{
				$this->page = 1;
				$this->perpage = $this->browse_DefaultPerPage();
				$search_record_start_index = 1;
			}
			$search_record_end_index = $search_record_start_index + $this->perpage - 1;
			
			if($search_record_end_index > $this->search_results_count)
			{
				$search_record_end_index = $this->search_results_count;
			}
			
			$this->search_record_start_index = $search_record_start_index;
			$this->search_record_end_index = $search_record_end_index;
		}
		
		public function SetBrowseParameters_TotalPages()
		{
			$this->total_pages = ceil($this->search_results_count / $this->perpage);
		}
		
		public function SetBrowseParameters_RemainingPages()
		{
			$this->total_results_viewed = $this->perpage * ($this->page - 1);
			$this->total_results_left = $this->search_results_count - $this->total_results_viewed - ($this->search_record_end_index - $this->search_record_start_index + 1);
		}
		
		public function browse_DefaultPerPage()
		{
			return 10;
		}
		
		public function browse_MinPerPage()
		{
			return 1;
		}
		
		public function browse_MaxPerPage()
		{
			return 200;
		}
	}

?>