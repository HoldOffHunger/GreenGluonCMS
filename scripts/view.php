<?php

	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/SimpleErrors.php');
	require('../traits/scripts/SimpleForms.php');
	require('../traits/scripts/SimpleLookupLists.php');
	require('../traits/scripts/SimpleORM.php');
	require('../traits/scripts/SimpleSocialMedia.php');

	class view extends basicscript {
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
		
		public function IsSecure() {
			return FALSE;
		}
		
		public function RequiresLogin() {
			return FALSE;
		}
		
						// Select Entry by ID Form
						// ---------------------------------------------
		
		public function Select() {
			$this->SetOrmBasics();
			
			if(!$this->ValidateOrm()) {
				return FALSE;	# Causes 404
			}
			
			$this->by = $this->param('by');
			
			if(
				($this->by == 'id') ||
				($this->by == 'Title') ||
				($this->by == 'Code') ||
				($this->by == 'Description') ||
				($this->by == 'Quote') ||
				($this->by == 'Link') ||
				($this->by == 'TextBody') ||
				($this->by == 'Tag') ||
				($this->by == 'AvailabilityStart') ||
				($this->by == 'AvailabilityEnd') ||
				($this->by == 'Level')
			) {
				$this->fieldname_validity = 1;
				$this->select = $this->param('Select');	# Form Button
				
				if($this->select) {
					$fieldname = $this->param('fieldname');
					$this->urlaction = $this->param('urlaction');
					
					switch($this->urlaction) {
						case 'view':
							$this->script_name = 'view.php';
							break;
						
						case 'edit':
							$this->script_name = 'modify.php?action=Edit';
							break;
					}
					
					if($fieldname) {
						$this->fieldname = $fieldname;
						$this->matchlike = $this->param('matchlike');
						
						$orm_match_args = [
							fieldname=>$this->by,
							fieldvalue=>$this->fieldname,
							matchlike=>$this->matchlike,
						];
						
						$record_results = $this->SearchForEntries($orm_match_args);
					#	print_r($record_results);
						if($record_results['error']) {
							$this->admin_errors[] = $record_results;
						} else {
							$this->selections = $record_results;
							$this->StatusDataArray = [];
							foreach($this->selections as $entry) {
								$this->StatusDataArray[] = [
									$this->Bullet() .
									$this->NonBreakingSpace() .
									$this->GetHyperlinkedEntryView([
										entry=>$entry,
										entrylist=>$entry['parents'],
										scriptname=>$this->script_name,
										by=>$this->by,
									])
								];
							}
						}
					} else {
						$this->errors[] = ['You must enter some search term in order to search.'];
					}
				}
			} else {
				$this->errors[] = ['The selected fieldname, "' . $this->CleanseForDisplay($this->by) . '", is invalid.'];
				$this->fieldname_validity = 0;
			}
			
			$this->FormatErrors();
			
			return TRUE;
		}
		
						// User Functionality
						// ---------------------------------------------
			
							// Main Browse Functionality
							// ---------------------------------------------
		
		public function viewUserLikes()
		{
			$this->SetORMBasics();
		#	$this->SetRecordTree();
			$this->SetPrimaryHostRecords();
			
			if(!$this->ValidateOrm())
			{
				return FALSE;	# 404
			}
			
			$this->getEntryLikesAndDislikes();
			
			$this->FormatErrors();
			
			return TRUE;
		}
		
		public function getEntryLikesAndDislikes()
		{
			$likedislike_get_args = [
				type=>'LikeDislike',
				definition=>[
					'LikeOrDislike'=>1,
					'Entryid'=>$this->entry['id'],
				],
				'joins'=>[
					'JOIN'=>[
						'User'=>'User.id = LikeDislike.Userid',
					],
				],
				orderby=>'OriginalCreationDate DESC',
			];
			
			return $this->likes = $this->db_access_object->GetRecords($likedislike_get_args);
		}
		
						// Browse Functionality
						// ---------------------------------------------
			
							// Main Browse Functionality
							// ---------------------------------------------
		
		public function browse()
		{
			$this->SetORMBasics();
		#	$this->SetRecordTree();
			$this->SetPrimaryHostRecords();
			
			if(!$this->ValidateOrm())
			{
				return FALSE;	# 404
			}
			$this->SetChildRecordCount();
			$this->entry_count = $this->children_count;
			/*
			if($this->entry_count > 50) {
				ini_set('memory_limit','150M');
			} else if($this->entry_count > 100) {
				ini_set('memory_limit','200M');
			} else if($this->entry_count > 150) {
				ini_set('memory_limit','250M');
			}
			*/
			$this->SetBrowseParameters();
			$this->SetChildRecords([]);
			$this->SetEntryChildRecordStats([]);
			$this->SetEntryAssociatedRecordStats([]);
			
			$this->SetSimpleChildAssociationRecords();
			$this->SetChildRecordsOfChildren();
			
			$this->SetTagCounts();
			$this->SetSocialMediaBasics();
			
			$this->FormatErrors();
			
			return TRUE;
		}
		
							// Specialized Browse Functionality
							// ---------------------------------------------
		
		public function browseByTag()
		{
			$this->SetORMBasics();
		#	$this->SetRecordTree();
			$this->SetPrimaryHostRecords();
			
			$this->SetTagParameters();
			//SetChildRecordCount
			$this->SetEntryRecordCount();
			$this->SetBrowseParameters();
			$this->SetChildRecords(['noassignment'=>TRUE]);
			$this->children = $this->GetEntriesParents(['entries'=>$this->children]);
		//	print_r($this->children);
		//	$this->SetEntryRecords([]);
		//	$this->children = $this->entries;	// yargh
			
			if(!$this->ValidateOrm())
			{
				return FALSE;	# 404
			}
			
			$this->SetSimpleChildAssociationRecords();
			$this->SetChildRecordsOfChildren();
			$this->SetSocialMediaBasics();
			
			$this->SetTagCounts();
			
			$this->SetEntryChildRecordStats([]);
			$this->SetEntryAssociatedRecordStats([]);
			
			$this->FormatErrors();
			
			return TRUE;
		}
		
							// Browse Helper Functionality
							// ---------------------------------------------
		
		public function SetTagParameters()
		{
			$this->tag = $this->Param('tag');
			$this->tag_cleansed = $this->CleanseForDisplay($this->tag);
			$this->where = [
				sql=>'JOIN Tag ON Tag.Entryid = Entry1.id AND Tag.Tag = ? ',
				bind=>'s',
				value=>[$this->tag],
			];
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
			
			$child_record_start_index = ($this->page - 1) * $this->perpage + 1;
			if($child_record_start_index > $this->entry_count)
			{
				$this->page = 1;
				$this->perpage = $this->browse_DefaultPerPage();
				$child_record_start_index = 1;
			}
			$child_record_end_index = $child_record_start_index + $this->perpage - 1;
			
			if($child_record_end_index > $this->entry_count)
			{
				$child_record_end_index = $this->entry_count;
			}
			
			$this->child_record_start_index = $child_record_start_index;
			$this->child_record_end_index = $child_record_end_index;
		}
		
		public function SetBrowseParameters_TotalPages()
		{
			$this->total_pages = ceil($this->entry_count / $this->perpage);
		}
		
		public function SetBrowseParameters_RemainingPages()
		{
			$this->total_children_viewed = $this->perpage * ($this->page - 1);
			$this->total_children_left = $this->entry_count - $this->total_children_viewed - ($this->child_record_end_index - $this->child_record_start_index + 1);
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
			
			$this->FormatText();
			
			$this->SaveComments();
			$this->SetComments();
			
			$this->SetChildRecordCount();
			
			if($this->children_count > 400) {
				$this->desired_action = 'index';	// you don't want this page
				return $this->index();
			}
			
			$this->SetChildRecords([]);
			$this->SetEntryChildRecordStats([]);
			$this->SetEntryAssociatedRecordStats([]);
			
			$this->SetLikeDislikeRecords();
			$this->SetAssociationRecords();
			$this->SetChildRecordsOfChildren();
			
			$this->HandleMainPage();
			
			$this->CompactDefinitions();
			$this->SetTagCounts();
			$this->SetSocialMediaBasics();
			$this->SetSiblings([]);
			
			$this->FormatErrors();
			
			return TRUE;
		}
		
		public function FormatText() {
			if($this->entry['textbody'] && $this->entry['textbody'][0] && $this->entry['textbody'][0]['id'] && $this->entry['textbody'][0]['Text']) {
				$text = $this->formatImageText([
					'text'=>$this->entry['textbody'][0]['Text'],
					'images'=>$this->entry['image'],
				]);
				$this->entry['textbody'][0]['Text'] = $text;
			}
			return TRUE;
		}
		
		public function formatImageText($args) {
			$text = $args['text'];
			$images = $args['images'];
			
			if ($this->script_format_lower == 'pdf') {
				$text = preg_replace('/Image::(\d+)/', '', $text); 
				return $text;
			}
			
			$dom = preg_split('/Image::(\d+)/', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
			$dom_length = count($dom);
			
			if($dom_length > 1) {
				$orientation = 'right';
				$mobile_friendly = $this->Param('mobilefriendly');
				
				$max_image_height = 400;
				$max_image_width = 500;
				
				for($i = 1; $i < $dom_length; $i += 2) {
					$dom_piece = $dom[$i];
					$number = (int)$dom_piece;
					$image = $images[$number - 1];
					
					if($mobile_friendly || !$image) {
						$dom[$i] = '';
					} else {
						$real_height = 0;
						$real_width = 0;
						
						if((int)$image['PixelHeight'] > (int)$image['PixelWidth'] && (int)$image['PixelHeight'] > $max_image_height) {
							$real_height = $max_image_height;
						} elseif((int)$image['PixelWidth'] > $max_image_width) {
							$real_width = $max_image_width;
						}
						
						$image_code = '';
						
						$image_code .= '<div class="document-image-holder document-image-holder-';
						$image_code .= $orientation;
						$image_code .= '" ';
						$image_code .= 'title="';
						$image_code .= $image['Title'];
						$image_code .= ' ';
						$image_code .= ' - (Click to View Full Image)';
						$image_code .= '" ';
						$image_code .= '>';
						
						$image_directory = '/image/' . implode('/', str_split($image['FileDirectory'])) . '/';
						
						$image_code .= '<a href="';
						$image_code .= $image_directory;
						$image_code .= $image['FileName'];
						$image_code .= '" target="_blank">';
						
						$image_code .= '<img ';
						$image_code .= 'class="document-image" ';
						$image_code .= 'src="';
						$image_code .= $image_directory;
						$image_code .= $image['StandardFileName'];
						$image_code .= '" ';
						
						$image_code .= 'alt=" ';
						$image_code .= $image['Title'];
						$image_code .= '" ';
						
						$image_code .= 'style="margin:0px;" ';
						
						if($real_height > 0) {
							$image_code .= 'height="' . $real_height . '" ';
						} elseif($real_width > 0) {
							$image_code .= 'width="' . $real_width . '" ';
						}
						
						$image_code .= '>';
						
						$image_code .= '</a>';
						
						$image_code .= '<p class="margin-2px font-family-arial font-size-75percent horizontal-center" style="font-size:12px;">';
						$image_title = $image['Title'];
						$image_title = str_replace(', CC ', ',<BR>CC ', $image_title);
						$image_code .= $image_title;
						$image_code .= '</p>';
						
						$image_code .= '</div>';
						
						$new_dom_piece = $image_code;
						$dom[$i] = $new_dom_piece;
						
						if($orientation == 'left') {
							$orientation = 'right';
						} else {
							$orientation = 'left';
						}
					}
				}
				$text = implode('', $dom);
			}
			
			return $text;
		}
		
		public function HandleMainPage() {
			if($this->IsMainPage()) {
				$this->SetGrandChildAssociationRecords();
				$this->SetGrandChildRecordsOfChildren();
				$this->SetNewestChildren();
			}
			
			return TRUE;
		}
		
		public function SetNewestChildren() {
			$get_record_where = [
				type=>'Entry',
				limit=>'10',
				orderby=>'Entry.OriginalCreationDate DESC',
			];
			$newest_entries = $this->db_access_object->GetRecords($get_record_where);
			$newest_entries = $this->GetEntriesParents(['entries'=>$newest_entries]);
			
			$this->newest_entries = $newest_entries;
			
			return TRUE;
		}
		
		public function IsMainPage() {
			if(count($this->record_list) < 1) {
				return TRUE;
			}
			
			return FALSE;
		}
		
		public function display_wordweight()
		{
			if(count($this->record_list) > 1)
			{
				return FALSE;
			}
			
			$this->SetORMBasics();
			$this->SetPrimaryHostRecords();
			
			if(count($this->object_list))
			{
				$this->word = $this->object_code;
				$this->definitions = $this->dictionary->LookupWords([words=>[$this->word]])[strtolower($this->word)];
				
				$this->definition_count = count($this->definitions);
				
				if(!$this->definition_count)
				{
					return FALSE;
				}
			}
			
			$this->SetSocialMediaBasics();
			
			$this->search_term = $this->Param('search');
			
			if($this->search_term)
			{
				$this->definitions = $this->dictionary->LookupWords([words=>[$this->search_term]])[strtolower($this->search_term)];
				
				$this->definition_count = count($this->definitions);
				
				if($this->definition_count)
				{
					return header('Location: ' . $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/' . $this->search_term . '/view.php');
				}
			}
			
			return TRUE;
		}
		
						// Index Functionality
						// ---------------------------------------------
		
		public function index()
		{
			if(!$this->orm)
			{
				$this->SetORMBasics();
			#	$this->SetRecordTree();
				$this->SetPrimaryHostRecords();
			}
			
			if(!$this->ValidateOrm())
			{
				return FALSE;	# 404
			}
			
			$this->SetIndexChildRecords([]);
			$this->SetChildRecordsOfChildren();
			$this->where = [];
			$this->SetChildRecordCount();
			$this->SetEntryChildRecordStats([]);
			$this->SetEntryAssociatedRecordStats([]);
			
			$this->SetChildAssociationRecords();
			
			$this->SetTagCounts();
			$this->SetSocialMediaBasics();
			
			$this->FormatErrors();
			
			return TRUE;
		}
		
						// Dictionary Functionality
						// ---------------------------------------------
		
		public function dictionary()
		{
			$this->SetORMBasics();
			$this->SetRecordTree();
			$this->SetPrimaryHostRecords();
			
			if(!$this->ValidateOrm())
			{
				return FALSE;	# 404
			}
			
			require('../classes/Database/ORMDictionary.php');
			$this->dictionary = new ORMDictionary(['dbaccess'=>$this->db_access_object]);
			$entry_dictionary = $this->dictionary->GetDictionary(['entry'=>$this->entry]);
			$entry_dictionary_count = count($entry_dictionary);
			
			$defined_words = [];
			
			$cache_file_location = '../data/dictionary/' . $this->domain_object->host . '/' . $this->entry['id'] . '.json';
			if($this->authentication_object->CheckAuthenticationForCurrentObject_IsAdmin() && $this->Param('godmode')) {
				ini_set('memory_limit','500M');		// God says "Move aside, little ones."
				for($i = 0; $i < $entry_dictionary_count; $i++) {
					$entry_definition = $entry_dictionary[$i];
					
					$term = $entry_definition['Term'];
					
					if(!$defined_words[$term]) {
						$defined_words[$term] = [];
					}
					
					$publication_date = FALSE;
					
					if($entry_definition['EventDate2_EventDateTime']) {
						$date_time_pieces = explode(' ', $entry_definition['EventDate2_EventDateTime']);
						$date_pieces = explode('-', $date_time_pieces[0]);
						
						if($date_pieces[0] && $date_pieces[0] != '0000') {
							$full_date = $date_pieces[0];
							
							if($date_pieces[1] && $date_pieces[2] && $date_pieces[1] != '00' && $date_pieces[2] != '00') {
								$full_date .= '-' . $date_pieces[1] . '-' . $date_pieces[2];
							}
							$publication_date = $full_date;
						}
					}
					
					$defined_words[$term][] = [
						'Definition'=>$entry_definition['Definition'],
						'Author'=>$entry_definition['Title'],
						'AuthorCode'=>$entry_definition['Code'],
						'Source'=>$entry_definition['Entry2_Title'],
						'SourcePermaid'=>$entry_definition['Assignment1_id'],
						'PublicationDate'=>$publication_date,
					];
				}
				
				$this->natksort($defined_words);
				
				$file_handle_for_source = fopen($cache_file_location, 'w+');
				fwrite($file_handle_for_source, json_encode($defined_words));
				fclose($file_handle_for_source);
			} else {
				$defined_words = json_decode(file_get_contents($cache_file_location), TRUE);
#				print_r($defined_words);
			}
			$this->entrydictionary = $defined_words;
		#	print_r();
			
			return TRUE;
		}
				
		function natksort(&$array) {
		    $keys = array_keys($array);
		    natcasesort($keys);
		
		    foreach ($keys as $k) {
		        $new_array[$k] = $array[$k];
		    }
		
		    $array = $new_array;
		    return true;
		}
		
						// Definitions Functionality
						// ---------------------------------------------
		
		public function definitions()
		{
			$this->SetORMBasics();
			$this->SetRecordTree();
			$this->SetPrimaryHostRecords();
			
			if(!$this->ValidateOrm())
			{
				return FALSE;	# 404
			}
			
			$this->SetChildRecords(['alltext'=>TRUE]);
			$this->SetAssociationRecords();
			
			require('../classes/Language/Grammar.php');
			$this->grammar = new Grammar();
			
			require('../classes/Language/TextCleanup.php');
			$this->textcleanup = new TextCleanup(['grammar'=>$this->grammar]);
			
			require('../classes/Language/Definition.php');
			$this->definition = new Definition(['grammar'=>$this->grammar, 'textcleanup'=>$this->textcleanup]);
			
			$text = '';
			
			if($this->entry['textbody'] && $this->entry['textbody'][0] && $this->entry['textbody'][0]['id'] && $this->entry['textbody'][0]['Text'])
			{
				$text = $this->entry['textbody'][0]['Text'];
			}
			else
			{
				if($this->children && count($this->children))
				{
					$child_count = count($this->children);
					for($i = 0; $i < $child_count; $i++)
					{
						$child = $this->children[$i];
						if($child['textbody'] && $child['textbody'][0] && $child['textbody'][0]['id'] && $child['textbody'][0]['Text'])
						{
							$text .= $child['textbody'][0]['Text'];
							
							if($i + 1 < $child_count)
							{
								$text .= ' ';
							}
						}
					}
				}
			}
			
			$text = trim(html_entity_decode(strip_tags($text)));
			
			$this->definitions_found = $this->definition->GetDefinitions([text=>$text]);
#			print_r($this->definitions_found);
			
			$this->SetChildRecords([]);
			
			$this->FormatErrors();
			
			return TRUE;
		}
		
						// Load Like/Dislike Functionality
						// ---------------------------------------------
		
		public function SetLikeDislikeRecords()
		{
			$likesdislikes_counts = $this->GetEntryLikesDislikesCount([]);
			
			$this->likes_count = $likesdislikes_counts['likes'];
			$this->dislikes_count = $likesdislikes_counts['dislikes'];
			
			$user_id = $this->authentication_object->user_session['User.id'];
			
			if($user_id)
			{
				$user_where = [
					'type'=>'LikeDislike',
					'definition'=>[
						'Userid'=>$user_id,
						'Entryid'=>$this->entry['id'],
					],
				];
				
				$this->user_likedislike = $this->db_access_object->GetRecords($user_where)[0];
			}
			
			return TRUE;
		}
		
						// JS Like/Dislike Functionality
						// ---------------------------------------------
		
		public function upvote($args)
		{
			$this->SetUserAndEntry();
			$likedislike = $this->GetUserLike([]);
			$likedislike = $this->SetUserLike(['likedislike'=>$likedislike, 'liked'=>1]);
			
			return $this->rpc_results = [
				'Success'=>1,
			];
		}
		
		public function undoupvote($args)
		{
			$this->SetUserAndEntry();
			$likedislike = $this->GetUserLike([]);
			$this->RemoveUserVote(['likedislike'=>$likedislike]);
			
			return $this->rpc_results = [
				'Success'=>1,
			];
		}
		
		public function downvote($args) {
			$this->SetUserAndEntry();
			$likedislike = $this->GetUserLike([]);
			$likedislike = $this->SetUserLike(['likedislike'=>$likedislike, 'liked'=>0]);
			
			return $this->rpc_results = [
				'Success'=>1,
			];
		}
		
		public function undodownvote($args) {
			$this->SetUserAndEntry();
			$likedislike = $this->GetUserLike([]);
			$this->RemoveUserVote(['likedislike'=>$likedislike]);
			
			return $this->rpc_results = [
				'Success'=>1,
			];
		}
		
		public function SetUserAndEntry($args) {
			$user_id = $this->authentication_object->user_session['User.id'];
			
			if(!$user_id) {
				return FALSE;
			}
			
			$this->user_id = $user_id;
			
			if(!$this->orm) {
				$this->SetORMBasics();
			}
			
			if(!$this->entry || !$this->entry['id']) {
				return FALSE;
			}
			
			return TRUE;
		}
		
		public function GetUserLike($args) {
			$user_id = $this->user_id;
			
			$user_upvote_args = [
				'type'=>'LikeDislike',
				'definition'=>[
					'Userid'=>$user_id,
					'Entryid'=>$this->entry['id'],
				],
			];
			
			$user_vote = $this->db_access_object->GetRecords($user_upvote_args);
			
			return $user_vote[0];
		}
		
		public function SetUserLike($args)
		{
			$user_id = $this->user_id;
			$likedislike = $args['likedislike'];
			$liked = $args['liked'];
			
			if($likedislike)
			{
				if($likedislike['LikeOrDislike'] != $liked)
				{
					$likedislike['LikeOrDislike'] = $liked;
					
					$likedislike_update_args = [
						type=>'LikeDislike',
						update=>[
							LikeOrDislike=>$liked,
						],
						where=>[
							id=>$likedislike['id'],
						],
					];
					
					$likedislike = $this->db_access_object->UpdateRecord($likedislike_update_args)[0];
				}
			}
			else
			{
				$likedislike_update_args = [
					type=>'LikeDislike',
					definition=>[
						'Userid'=>$user_id,
						'Entryid'=>$this->entry['id'],
						'LikeOrDislike'=>$liked,
					],
				];
				
				$likedislike = $this->db_access_object->CreateRecord($likedislike_update_args)[0];
			}
			
			return $likedislike;
		}
		
		public function RemoveUserVote($args)
		{
			$likedislike = $args['likedislike'];
			
			$likedislike_delete_args = [
				type=>'LikeDislike',
				wherevalues=>[$likedislike['id']],
				where=>'id = ?',
				sqlbindstring=>'i',
			];
			
			return $this->db_access_object->DeleteRecords($likedislike_delete_args);
		}
	}

?>