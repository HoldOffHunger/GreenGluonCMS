<?php

	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/SimpleErrors.php');
	require('../traits/scripts/SimpleForms.php');
	require('../traits/scripts/SimpleLookupLists.php');
	require('../traits/scripts/SimpleORM.php');
	require('../traits/scripts/SimpleSocialMedia.php');

	class users extends basicscript
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
			
		#	print("USERS!");
			# BT: Total users page here goes.
			
			return FALSE;
		}
		
						// View Functionality
						// ---------------------------------------------
		
		public function viewuser()
		{
			$this->SetORMBasics();
			$this->SetRecordTree();
			$this->SetPrimaryHostRecords();
			
			if(!$this->ValidateOrm())
			{
				return FALSE;	# 404
			}
			
			if(!$this->SetUser())
			{
				return FALSE;	# 404
			}
			
			$this->SetUserComments([
				'limit'=>3,
			]);
			$this->SetUserCommentsCount();
			
			$this->SetUserLikesDislikes([
				'limit'=>3,
			]);
			$this->SetUserLikesDislikesCount();
			
			$this->SetTagCounts();
			
			return TRUE;
		}
		
						// Export User Functionality
						// ---------------------------------------------
		
		public function exportuser()
		{
			$this->SetORMBasics();
			$this->SetRecordTree();
			$this->SetPrimaryHostRecords();
			
			if(!$this->ValidateOrm())
			{
				return FALSE;	# 404
			}
			
			if(!$this->SetUser())
			{
				return FALSE;	# 404
			}
			
			$this->SetUserComments([]);
			$this->SetUserCommentsCount();
			
			$this->SetUserLikesDislikes([]);
			$this->SetUserLikesDislikesCount();
			
		//	print_r($this->comments);
			
		//	print("<BR><BR>");
			
		//	print_r($this->likedislikes);
			
			return TRUE;
		}
		
		public function SetUser()
		{
			$username = trim(urldecode($this->Param('user')));
			if($username)
			{
				$user_get_args = [
					type=>'User',
					definition=>[
						Username=>$username,
					],
				];
				
				$user = $this->db_access_object->GetRecords($user_get_args)[0];
	#			print_r($user);
				if($user && $user['id'])
				{
					return $this->user = $user;
				}
			}
			
			$userid = ((int)$this->Param('userid'));
			if($userid)
			{
				$user_get_args = [
					type=>'User',
					definition=>[
						id=>$userid,
					],
				];
				
				$user = $this->db_access_object->GetRecords($user_get_args)[0];
	#			print_r($user);
				if($user && $user['id'])
				{
					$user['Username'] = 'User #' . $user['id'];
					return $this->user = $user;
				}
			}
			
			return FALSE;
		}
		
		public function SetUserComments($args)
		{
			$comment_definition = [
				Userid=>$this->user['id'],
				Approved=>1,
				Rejected=>0,
			];
			
			$comment_get_args = [
				type=>'Comment',
				definition=>$comment_definition,
				orderby=>'OriginalCreationDate DESC',
			];
			
			if(isset($args['limit'])) {
				$comment_get_args['limit'] = $args['limit'];
			}
			
			$comments = $this->db_access_object->GetRecords($comment_get_args);
			
			if(isset($args['limit'])) {
				$this->comments = $this->SetRecordEntries(['records'=>$comments]);
			} else {
				$this->comments = $this->SetLimitedRecordEntries(['records'=>$comments]);
			}
			
			return TRUE;
		}
		
		public function SetUserLikesDislikes($args)
		{
			$likedislike_definition = [
				'Userid'=>$this->user['id'],
				'LikeOrDislike'=>1,
			];
			
			$likedislike_get_args = [
				type=>'LikeDislike',
				definition=>$likedislike_definition,
				orderby=>'OriginalCreationDate DESC',
			];

			if(isset($args['limit'])) {
				$likedislike_get_args['limit'] = $args['limit'];
			}
			
			$likedislikes = $this->db_access_object->GetRecords($likedislike_get_args);
			
			if(isset($args['limit'])) {
				$this->likedislikes = $this->SetRecordEntries(['records'=>$likedislikes]);
			} else {
				$this->likedislikes = $this->SetLimitedRecordEntries(['records'=>$likedislikes]);
			}
			
			return TRUE;
		}
		
		public function SetUserCommentsCount()
		{
			return $this->GetCommentsCount([user=>$this->user]);
		}
		
		public function SetUserLikesDislikesCount()
		{
			return $this->GetLikesDislikesCount([user=>$this->user]);
		}
		
						// Browse Comments Functionality
						// ---------------------------------------------
		
		public function browseComments()
		{
			$this->SetORMBasics();
			$this->SetRecordTree();
			$this->SetPrimaryHostRecords();
			
			if(!$this->ValidateOrm())
			{
				return FALSE;	# 404
			}
			
			if(!$this->SetUser())
			{
				return FALSE;	# 404
			}
			
			$this->SetCommentParameters();
			$this->SetUserCommentsCount();
			$this->SetBrowseParameters();
			$this->SetChildRecords([noassignment=>1]);
			$this->SetChildParents();
			
			$this->SetTagCounts();
			
			return TRUE;
		}
		
						// Browse Likes Functionality
						// ---------------------------------------------
		
		public function browseLikes()
		{
			$this->SetORMBasics();
			$this->SetRecordTree();
			$this->SetPrimaryHostRecords();
			
			if(!$this->ValidateOrm())
			{
				return FALSE;	# 404
			}
			
			if(!$this->SetUser())
			{
				return FALSE;	# 404
			}
			
			$this->SetLikeParameters();
			$this->SetUserLikesDislikesCount();
			$this->SetBrowseParameters();
			$this->SetChildRecords([noassignment=>1]);
			$this->SetChildParents();
			$this->SetChildRecordsOfChildren();
			
			$this->SetTagCounts();
			
			return TRUE;
		}
		
						// Browse Helper Functionality
						// ---------------------------------------------
		
		public function SetChildParents()
		{
			foreach($this->children as $child_key => $child)
			{
				$this->children[$child_key]['parents'] = $this->GetEntryParents([entry=>$child])['parents'];
			}
			
			return $this->children;
		}
		
		public function SetCommentParameters()
		{
			$this->where = [
				sql=>'JOIN Comment ON Comment.Entryid = Entry1.id AND Comment.Approved = 1 AND Comment.Rejected = 0 AND Comment.Userid = ? ',
				bind=>'i',
				value=>[$this->user['id']],
				extraselect=>'Comment.Comment AS Comment, Comment.LastModificationDate AS CommentLastModificationDate, Comment.OriginalCreationDate AS CommentOriginalCreationDate',
			];
		}
		
		public function SetLikeParameters()
		{
			$this->where = [
				sql=>'JOIN LikeDislike ON LikeDislike.Entryid = Entry1.id AND LikeDislike.LikeOrDislike = 1 AND LikeDislike.Userid = ? ',
				bind=>'i',
				value=>[$this->user['id']],
				extraselect=>'LikeDislike.LastModificationDate AS LikeDislikeModificationDate, LikeDislike.OriginalCreationDate AS LikeDislikeOriginalCreationDate',
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
			
			$count = $this->comments_count;
			
			if($this->likes_count && !$count)
			{
				$count = $this->likes_count;
			}
			
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
			if($child_record_start_index > $count)
			{
				$this->page = 1;
				$this->perpage = $this->browse_DefaultPerPage();
				$child_record_start_index = 1;
			}
			$child_record_end_index = $child_record_start_index + $this->perpage - 1;
			
			if($child_record_end_index > $count)
			{
				$child_record_end_index = $count;
			}
			
			$this->child_record_start_index = $child_record_start_index;
			$this->child_record_end_index = $child_record_end_index;
		}
		
		public function SetBrowseParameters_TotalPages()
		{
			$count = $this->comments_count;
			
			if($this->likes_count && !$count)
			{
				$count = $this->likes_count;
			}
			
			$this->total_pages = ceil($count / $this->perpage);
		}
		
		public function SetBrowseParameters_RemainingPages()
		{
			$this->total_children_viewed = $this->perpage * ($this->page - 1);
			$this->total_children_left = $this->comments_count - $this->total_children_viewed - ($this->child_record_end_index - $this->child_record_start_index + 1);
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