<?php

	trait SimpleORM {
		public function SetOrmBasics()
		{
			$this->SetORM();
			$this->SetMasterRecord();
			$this->SetRecordTree();
			if(count($this->record_list)) {
				$this->SetEntryParentTable();
				
				if(count($this->record_list) > 1)
				{
					$this->parent = $this->record_list[count($this->record_list) - 2];
				}
				$this->entry = $this->GetCurrentEntry([recordslist=>$this->record_list]);
			}
			else
			{
				$this->parent = $this->master_record;
				$this->parentid = $this->master_record['id'];
				$this->entry = $this->parent;
			}
		}
		
		public function SetORM()
		{
			require('../classes/Database/ORM.php');
			
			$this->orm = new ORM([dbaccessobject=>$this->db_access_object]);
		}
		
		public function SetRecordTree()
		{
			return $this->record_list = $this->orm->GetRecordTree([codelist=>$this->object_list, availabilitylimit=>1]);
		}
		
		public function SetTagCounts()
		{
			$tag_counts = [];
			
			if($this->entry || $this->user)
			{
				if($this->entry['tag'] && $this->parent)
				{
					$tags = [];
					$entry_tags = $this->entry['tag'];
					$entry_tags_count = count($entry_tags);
					
					if($entry_tags_count)
					{
						for($i = 0; $i < $entry_tags_count; $i++)
						{
							$entry_tag = $entry_tags[$i];
							$tags[] = $entry_tag['Tag'];
						}
					}
					
					$entry_tag_counts = $this->orm->GetTagCounts(['tags'=>$tags, 'entry'=>$this->parent]);
					$tag_counts['entry'] = $entry_tag_counts;
				}
				
				if($this->entry && $this->entry['association'])
				{
					$associations = $this->entry['association'];
					$association_count = count($associations);
					
					if($association_count)
					{
						$parents = [];
						for($i = 0; $i < $association_count; $i++)
						{
							$association = $associations[$i];
							$entry = $association['entry'];
							$tags = $entry['tag'];
							$tags_count = count($tags);
							
							$entry_parents = $entry['parents'];
							$entry_parents_count = count($entry_parents);
								
							if($entry_parents_count)
							{
								$first_parent = $entry_parents[$entry_parents_count - 2];
								
								if(!$first_parent)
								{
									$first_parent = $entry_parents[$entry_parents_count - 1];
								}
								
								if($parents[$first_parent['id']])
								{
									$temp_tags = $parents[$first_parent['id']]['tags'];
								}
								else
								{
									$temp_tags = [];
								}
								
								for($j = 0; $j < $tags_count; $j++)
								{
									$association_tag = $tags[$j];
									
									$temp_tags[] = $association_tag['Tag'];
								}
								
								$first_parent['tags'] = $temp_tags;
								
								$parents[$first_parent['id']] = $first_parent;
							}
#							print("<PRE>");
#							print_r($association);
#							print("</PRE>");
						}
#						print("<PRE>");
#						print_r($parents);
#						print("</PRE>");
						
						if(count($parents))
						{
							$tag_counts['associations'] = [];
							
							foreach($parents as $parent_id => $parent)
							{
								$tags = $parent['tags'];
								$entry_tag_counts = $this->orm->GetTagCounts(['tags'=>$tags, 'entry'=>$parent]);
								$tag_counts['associations'][$parent['Code']] = $entry_tag_counts;
							}
						}
					}
				}
				$likes_dislikes = $this->likedislikes;
				
				if($likes_dislikes)
				{
					$likes_dislikes_count = count($likes_dislikes);
					
					if($likes_dislikes_count)
					{
						$parents = [];
						for($i = 0; $i < $likes_dislikes_count; $i++)
						{
							$like_dislike = $likes_dislikes[$i];
							$like_dislike_entry = $like_dislike['entry'];
							$like_dislike_tags = $like_dislike_entry['tag'];
							$like_dislike_tags_count = count($like_dislike_tags);
							
							$like_dislike_parents = $like_dislike_entry['parents'];
							$like_dislike_parents_count = count($like_dislike_parents);
							
							if($like_dislike_parents_count)
							{
								$like_dislike_first_parent = $like_dislike_parents[$like_dislike_parents_count - 2];
								
								if(!$like_dislike_first_parent)
								{
									$like_dislike_first_parent = $like_dislike_parents[$like_dislike_parents_count - 1];
								}
								
								if($parents[$like_dislike_first_parent['id']])
								{
									$temp_tags = $parents[$like_dislike_first_parent['id']]['tags'];
								}
								else
								{
									$temp_tags = [];
								}
								
								for($j = 0; $j < $like_dislike_tags_count; $j++)
								{
									$like_dislike_tag = $like_dislike_tags[$j];
									
									$temp_tags[] = $like_dislike_tag['Tag'];
								}
								
								$like_dislike_first_parent['tags'] = $temp_tags;
								
								$parents[$like_dislike_first_parent['id']] = $like_dislike_first_parent;
							}
						}
						
						if(count($parents))
						{
							$tag_counts['likesdislikes'] = [];
							
							foreach($parents as $parent_id => $parent)
							{
								$tags = $parent['tags'];
								$entry_tag_counts = $this->orm->GetTagCounts(['tags'=>$tags, 'entry'=>$parent]);
								$tag_counts['likesdislikes'][$parent['Code']] = $entry_tag_counts;
							}
						}
					}
				}
				
				$comments = $this->comments;
				
				if($comments)
				{
					$comments_count = count($comments);
					
					if($comments_count)
					{
						$parents = [];
						for($i = 0; $i < $comments_count; $i++)
						{
							$comment = $comments[$i];
							$comment_entry = $comment['entry'];
							$comment_entry_tags = $comment_entry['tag'];
							$comment_entry_tags_count = count($comment_entry_tags);
							
							$comment_parents = $comment_entry['parents'];
							$comment_parents_count = count($comment_parents);
							
							if($comment_parents_count)
							{
								$comment_first_parent = $comment_parents[$comment_parents_count - 2];
								
								if(!$comment_first_parent)
								{
									$comment_first_parent = $comment_parents[$comment_parents_count - 1];
								}
								
								if($parents[$comment_first_parent['id']])
								{
									$temp_tags = $parents[$comment_first_parent['id']]['tags'];
								}
								else
								{
									$temp_tags = [];
								}
								
								for($j = 0; $j < $comment_entry_tags_count; $j++)
								{
									$comment_entry_tag = $comment_entry_tags[$j];
									
									$temp_tags[] = $comment_entry_tag['Tag'];
								}
								
								$comment_first_parent['tags'] = $temp_tags;
								$parents[$comment_first_parent['id']] = $comment_first_parent;
							}
						}
						
						if(count($parents))
						{
							$tag_counts['comments'] = [];
							
							foreach($parents as $parent_id => $parent)
							{
								$tags = $parent['tags'];
								$entry_tag_counts = $this->orm->GetTagCounts(['tags'=>$tags, 'entry'=>$parent]);
								$tag_counts['comments'][$parent['Code']] = $entry_tag_counts;
							}
						}
					}
				}
				
				if($this->entry['associated'])
				{
					$parents_collection = [];
					$parent_tags = [];
					$associated_entries = $this->entry['associated'];
					$associated_entries_count = count($associated_entries);
					
					if($associated_entries_count)
					{
						for($i = 0; $i < $associated_entries_count; $i++)
						{
							$associated_entry = $associated_entries[$i];
							$first_parent = $associated_entry['entry']['parents'][0];
							if(!$parent_tags[$first_parent['id']])
							{
								$parent_tags[$first_parent['id']] = [];
								$parents_collection[$first_parent['id']] = $first_parent;
							}
							$associated_entry_tags = $associated_entry['entry']['tag'];
							if($associated_entry_tags)
							{
								$associated_entry_tags_count = count($associated_entry_tags);
								
								if($associated_entry_tags_count)
								{
									for($j = 0; $j < $associated_entry_tags_count; $j++)
									{
										$associated_entry_tag = $associated_entry_tags[$j];
										$parent_tags[$first_parent['id']][] = $associated_entry_tag['Tag'];
									}
								}
							}
						}
					}
					
					$tag_counts['associated'] = [];
					
					foreach($parent_tags as $parent_id => $tags)
					{
						$entry_tag_counts = $this->orm->GetTagCounts(['tags'=>$tags, 'entry'=>['id'=>$parent_id]]);
						$parent = $parents_collection[$parent_id];
						$tag_counts['associated'][$parent['Code']] = $entry_tag_counts;
					}
				}
				
				if($this->children)
				{
					if($this->entry)
					{
						$children_records = $this->children;
						$children_record_count = count($children_records);
						
						$children_tags = [];
						
						if($children_record_count)
						{
							for($i = 0; $i < $children_record_count; $i++)
							{
								$child_record = $children_records[$i];
								$child_tags = $child_record['tag'];
								$child_tag_count = count($child_tags);
								
								for($j = 0; $j < $child_tag_count; $j++)
								{
									$child_tag = $child_tags[$j];
									$children_tags[] = $child_tag['Tag'];
								}
							}
						}
						
						$children_random_records = $this->children_random;
						
						if($children_random_records)
						{
							$children_random_records_count = count($children_random_records);
							
							if($children_random_records_count)
							{
								for($i = 0; $i < $children_random_records_count; $i++)
								{
									$random_child = $children_random_records[$i];
									$random_child_tags = $random_child['tag'];
									$random_child_tag_count = count($random_child_tags);
									
									for($j = 0; $j < $random_child_tag_count; $j++)
									{
										$random_child_tag = $random_child_tags[$j];
										$children_tags[] = $random_child_tag['Tag'];
									}
								}
							}
						}
						
						$tags_random_records = $this->tags_random;
						
						if($tags_random_records)
						{
							$tags_random_records_count = count($tags_random_records);
							
							for($i = 0; $i < $tags_random_records_count; $i++)
							{
								$tag_random_record = $tags_random_records[$i];
								$children_tags[] = $tag_random_record['Tag'];
							}
						}
						
						if($children_tags && count($children_tags))
						{
							$tag_counts['children'] = $this->orm->GetTagCounts(['tags'=>$children_tags, 'entry'=>$this->entry]);
						}
					}
					else
					{
						$children_records = $this->children;
						$children_record_count = count($children_records);
						
						if($children_record_count)
						{
							$parents = [];
							
							for($i = 0; $i < $children_record_count; $i++)
							{
								$child = $children_records[$i];
								$child_tags = $child['tag'];
								$child_tags_count = count($child_tags);
								
								$child_parents = $child['parents'];
								$child_parents_count = count($child_parents);
								
								if($child_parents_count)
								{
									$child_first_parent = $child_parents[$child_parents_count - 2];
									
									if(!$child_first_parent)
									{
										$child_first_parent = $child_parents[$child_parents_count - 1];
									}
									
									if($parents[$child_first_parent['id']])
									{
										$temp_tags = $parents[$child_first_parent['id']]['tags'];
									}
									else
									{
										$temp_tags = [];
									}
									
									for($j = 0; $j < $child_tags_count; $j++)
									{
										$child_tag = $child_tags[$j];
										
										$temp_tags[] = $child_tag['Tag'];
									}
									
									$child_first_parent['tags'] = $temp_tags;
									$parents[$child_first_parent['id']] = $child_first_parent;
								}
							}
							
							if(count($parents))
							{
								$tag_counts['children'] = [];

								foreach($parents as $parent_id => $parent)
								{
									$tags = $parent['tags'];
									$entry_tag_counts = $this->orm->GetTagCounts(['tags'=>$tags, 'entry'=>$parent]);
									$tag_counts['children'][$parent['Code']] = $entry_tag_counts;
								}
							}
						}
					}
				}
			}
			
			if($this->master_record && $this->children)
			{
				$children_records = $this->children;
				$children_record_count = count($children_records);
				
				$grand_children_tags = [];
				
				if($children_record_count)
				{
					for($i = 0; $i < $children_record_count; $i++)
					{
						$child_record = $children_records[$i];
						$child_tags = $child_record['tag'];
						$child_tag_count = count($child_tags);
						
						for($j = 0; $j < $child_tag_count; $j++)
						{
							$child_tag = $child_tags[$j];
							$children_tags[] = $child_tag['Tag'];
						}
						
						$grand_children = $child_record['children'];
						
						if($grand_children)
						{
							$grand_children_count = count($grand_children);
							
							$grand_children_tag_array = [];
							
							for($j = 0; $j < $grand_children_count; $j++)
							{
								$grand_child = $grand_children[$j];
								$grand_child_tags = $grand_child['tag'];
								
								foreach($grand_child_tags as $grand_child_tag)
								{
									$grand_children_tag_array[] = $grand_child_tag['Tag'];
								}
							}
							if(count($grand_children_tag_array))
							{
								$grand_children_tags[$child_record['Code']] = $this->orm->GetTagCounts(['tags'=>$grand_children_tag_array, 'entry'=>$child_record]);
							}
						}
					}
				}
				
				if($grand_children_tags && count($grand_children_tags))
				{
					$tag_counts['grandchildren'] = $grand_children_tags;
				}
			}
			
			return $this->tag_counts = $tag_counts;
		}
		
		public function CheckRecordTree($args)
		{
		#	return count($this->object_list) == count($this->record_list);
			return $this->orm->GetRecordTree([codelist=>$args['recordlist'], availabilitylimit=>$args['availabilitylimit']]);
		}
		
		public function GetCurrentEntry($args)
		{	
			$records_list = $args[recordslist];
			$records_count = count($records_list);
			$current_record_index = $records_count - 1;
			return $records_list[$current_record_index];
		}
		
		public function SetEntryParentTable()
		{
			$record_list_count = count($this->record_list);
			
			if($record_list_count)
			{
				if(
					($this->desired_action == 'Add') ||
					($this->desired_action == 'Save') ||
					($this->desired_action == 'Select') ||
					($this->desired_action == 'Edit') ||
					($this->desired_action == 'Update')
				)
				{
					$last_record_index = $record_list_count - 1;
					
					$this->parent = $this->record_list[$last_record_index];
					return $this->parentid = $this->record_list[$last_record_index][id];
				}
			}
			
			if($this->master_record && $this->master_record['id']) {
				$this->parent = $this->master_record;
				
				return $this->parentid = $this->master_record['id'];
			}
			
			$this->parent = [
				id=>'0',
				Title=>'MasterDomainRecord',
				Subtitle=>'DomainsOfTheMaster',
				ListTitle=>'Master,OfTheDomains',
				Code=>'',
			];
			$this->parentid = 0;
			
			return TRUE;
		}
		
		public function SetChildRecords($args)
		{
			$entry = $this->entry;
			
			if(!$entry || !$entry['id'])
			{
				$entry = $this->parent;
			}
			
			if($this->desired_action == 'browse' || $this->desired_action == 'browseByTag' || $this->desired_action == 'browseComments' || $this->desired_action == 'browseLikes')
			{
				$orderby = 'ListTitle,Title';
				$start_index = $this->child_record_start_index;
				$end_index = $this->perpage;
			}
			elseif($this->object_code && $this->desired_action == 'index')
			{
				$start_index = 1;
				$end_index = 5;
				$orderby = 'OriginalCreationDate DESC';
			}
			else
			{
				$orderby = 'ListTitle,Title';
				$start_index = 0;
				$end_index = 0;
			}
			
		#	print("BT: START INDEX" . $end_index);
			
			$where = [];
			
			if($this->where)
			{
				$where = $this->where;
			}
			
			$get_record_children_args = [
				entry=>$entry,
				startindex=>$start_index,
				endindex=>$end_index,
				orderby=>$orderby,
				where=>$where,
				alltext=>$args['alltext'],
				noassignment=>$args['noassignment'],
				extraselect=>$this->where['extraselect'],
			];
			
			return $this->children = $this->orm->GetRecordChildren($get_record_children_args);
		}
		
		public function SetFullChildRecords()
		{
			return $this->SetChildRecords([alltext=>1]);
		}
		
		public function GetRecordAndChildren($args)
		{
			return $this->orm->GetRecordAndChildren($args);
		}
		
		public function SetAssociationRecords()
		{
			$associations = $this->entry['association'];
			if($associations && is_array($associations))
			{
				$association_count = count($associations);
				
				if($association_count)
				{
					for($i = 0; $i < $association_count; $i++)
					{
						$this->entry['association'][$i]['entry'] = $this->GetRecordAndChildren([entry=>['id'=>$this->entry['association'][$i]['ChosenEntryid']]])[0];
						$this->entry['association'][$i]['entry']['parents'] = $this->GetEntryParents([entry=>['id'=>$this->entry['association'][$i]['ChosenEntryid']]])['parents'];
					}
				}
			}
			
			$associateds = $this->entry['associated'];
			if($associateds && is_array($associateds))
			{
				$associated_count = count($associateds);
				
				if($associated_count)
				{
					for($i = 0; $i < $associated_count; $i++)
					{
						$this->entry['associated'][$i]['entry'] = $this->GetRecordAndChildren([entry=>['id'=>$this->entry['associated'][$i]['Entryid']]])[0];
						$this->entry['associated'][$i]['entry']['parents'] = $this->GetEntryParents([entry=>['id'=>$this->entry['associated'][$i]['Entryid']]])['parents'];
					}
				}
			}
			
			return TRUE;
		}
		
		public function SetChildAssociationRecords()
		{
			$child_count = count($this->children);
			
			for($i = 0; $i < $child_count; $i++)
			{
				$associations = $this->children[$i]['association'];
				if($associations && is_array($associations))
				{
					$association_count = count($associations);
					
					if($association_count)
					{
						for($j = 0; $j < $association_count; $j++)
						{
							$this->children[$i]['association'][$j]['entry'] = $this->GetRecordAndChildren([entry=>['id'=>$this->children[$i]['association'][$j]['ChosenEntryid']]])[0];
							$this->children[$i]['association'][$j]['entry']['parents'] = $this->GetEntryParents([entry=>['id'=>$this->children[$i]['association'][$j]['ChosenEntryid']]])['parents'];
						}
					}
				}
				
				$associateds = $this->children[$i]['associated'];
				if($associateds && is_array($associateds))
				{
					$associated_count = count($associateds);
					
					if($associated_count)
					{
						for($j = 0; $j < $associated_count; $j++)
						{
							$this->children[$i]['associated'][$j]['entry'] = $this->GetRecordAndChildren([entry=>['id'=>$this->children[$i]['associated'][$j]['Entryid']]])[0];
							$this->children[$i]['associated'][$j]['entry']['parents'] = $this->GetEntryParents([entry=>['id'=>$this->children[$i]['associated'][$j]['Entryid']]])['parents'];
						}
					}
				}
			}
			
			$child_count = count($this->children_random);
			
			for($i = 0; $i < $child_count; $i++)
			{
				$associations = $this->children_random[$i]['association'];
				if($associations && is_array($associations))
				{
					$association_count = count($associations);
					
					if($association_count)
					{
						for($j = 0; $j < $association_count; $j++)
						{
							$this->children_random[$i]['association'][$j]['entry'] = $this->GetRecordAndChildren([entry=>['id'=>$this->children_random[$i]['association'][$j]['ChosenEntryid']]])[0];
							$this->children_random[$i]['association'][$j]['entry']['parents'] = $this->GetEntryParents([entry=>['id'=>$this->children_random[$i]['association'][$j]['ChosenEntryid']]])['parents'];
						}
					}
				}
				
				$associateds = $this->children_random[$i]['associated'];
				if($associateds && is_array($associateds))
				{
					$associated_count = count($associateds);
					
					if($associated_count)
					{
						for($j = 0; $j < $associated_count; $j++)
						{
							$this->children_random[$i]['associated'][$j]['entry'] = $this->GetRecordAndChildren([entry=>['id'=>$this->children_random[$i]['associated'][$j]['Entryid']]])[0];
							$this->children_random[$i]['associated'][$j]['entry']['parents'] = $this->GetEntryParents([entry=>['id'=>$this->children_random[$i]['associated'][$j]['Entryid']]])['parents'];
						}
					}
				}
			}
			
			return TRUE;
		}
		
		public function SetGrandChildAssociationRecords()
		{
			$child_count = count($this->children);
			
			for($i = 0; $i < $child_count; $i++)
			{
				$grand_children = $this->children[$i]['children'];
				$grand_children_count = count($grand_children);

				for($j = 0; $j < $grand_children_count; $j++)
				{
					$associations = $this->children[$i]['children'][$j]['association'];
					if($associations && is_array($associations))
					{
						$association_count = count($associations);
						
						if($association_count)
						{
							for($k = 0; $k < $association_count; $k++)
							{
								$this->children[$i]['children'][$j]['association'][$k]['entry'] = $this->GetRecordAndChildren([entry=>['id'=>$this->children[$i]['children'][$j]['association'][$k]['ChosenEntryid']]])[0];
								$this->children[$i]['children'][$j]['association'][$k]['entry']['parents'] = $this->GetEntryParents([entry=>['id'=>$this->children[$i]['children'][$j]['association'][$k]['ChosenEntryid']]])['parents'];
								
							}
						}
					}
					
					$associateds = $this->children[$i]['children'][$j]['associated'];
					if($associateds && is_array($associateds))
					{
						$associateds_count = count($associateds);
						
						if($associateds_count)
						{
							for($k = 0; $k < $associateds_count; $k++)
							{
								$this->children[$i]['children'][$j]['associated'][$k]['entry'] = $this->GetRecordAndChildren([entry=>['id'=>$this->children[$i]['children'][$j]['associated'][$k]['Entryid']]])[0];
								$this->children[$i]['children'][$j]['associated'][$k]['entry']['parents'] = $this->GetEntryParents([entry=>['id'=>$this->children[$i]['children'][$j]['associated'][$k]['Entryid']]])['parents'];
							}
						}
					}
				}
			}
			
			return TRUE;
		}
		
		public function SetGrandChildRecordsOfChildren()
		{
			$start_index = 1;
			$end_index = 5;
			$orderby = 'RAND()';
			
			foreach($this->children as $child_key => $child)
			{
				foreach($this->children[$child_key]['children'] as $grand_child_key => $grand_child)
				{
					$get_record_children_args = [
						entry=>$grand_child,
						startindex=>$start_index,
						endindex=>$end_index,
						orderby=>$orderby,
					];
					
					$this->children[$child_key]['children'][$grand_child_key]['children'] = $this->orm->GetRecordChildren($get_record_children_args);
				}
			}
			
			return TURE;
		}
		
		public function SetFullChildRecordsOfChildren()
		{
			$start_index = 0;
			$end_index = 0;
			$orderby = '';
			
			foreach($this->children as $child_key => $child)
			{
				$get_record_children_args = [
					entry=>$child,
					startindex=>$start_index,
					endindex=>$end_index,
					orderby=>$orderby,
					alltext=>TRUE,
				];
				$this->children[$child_key]['children'] = $this->orm->GetRecordChildren($get_record_children_args);
			}
			
			if($this->entry['associated'])
			{
				foreach($this->entry['associated'] as $associated_key => $associated_item)
				{
					$entry = $associated_item['entry'];
					$get_record_children_args = [
						entry=>$entry,
						startindex=>$start_index,
						endindex=>$end_index,
						orderby=>$orderby,
						alltext=>TRUE,
					];
					
					$this->entry['associated'][$associated_key]['entry']['children'] = $this->orm->GetRecordChildren($get_record_children_args);
				}
			}
			
			return TRUE;
		}
		
		public function SetChildRecordsOfChildren()
		{
			$start_index = 1;
			$end_index = 5;
			$orderby = 'RAND()';
#
			foreach($this->children as $child_key => $child)
			{
				$get_record_children_args = [
					entry=>$child,
					startindex=>$start_index,
					endindex=>$end_index,
					orderby=>$orderby,
				];
				
				$this->children[$child_key]['children'] = $this->orm->GetRecordChildren($get_record_children_args);
			}
			
			if($this->children_random && is_array($this->children_random))
			{
				foreach($this->children_random as $child_key => $child)
				{
					$get_record_children_args = [
						entry=>$child,
						startindex=>$start_index,
						endindex=>$end_index,
						orderby=>$orderby,
					];
					
					$this->children_random[$child_key]['children'] = $this->orm->GetRecordChildren($get_record_children_args);
				}
			}
			
			if($this->entry['associated'])
			{
				foreach($this->entry['associated'] as $associated_key => $associated_item)
				{
					$entry = $associated_item['entry'];
					$get_record_children_args = [
						entry=>$entry,
						startindex=>$start_index,
						endindex=>$end_index,
						orderby=>$orderby,
					];
				#	print("BT: ASSOC!" . $entry['Title'] . "<BR><BR>");
					$this->entry['associated'][$associated_key]['entry']['children'] = $this->orm->GetRecordChildren($get_record_children_args);
				#	print_r($this->entry['associated'][$associated_key]['entry']['tag']);
				#	print("<BR><BR>");
				}
			}
			
			return TRUE;
		}
		
		public function SetChildRecordCount()
		{
			$entry = $this->entry;
			
			if(!$entry || !$entry['id'])
			{
				$entry = $this->parent;
			}
			
			$where = [];
			
			if($this->where)
			{
				$where = $this->where;
			}
			
			return $this->children_count = $this->orm->GetRecordChildrenCount([entry=>$entry, where=>$where]);
		}
		
		public function GetCommentsCount($args)
		{
			return $this->comments_count = $this->orm->GetUserCommentsCount($args);
		}
		
		public function GetLikesDislikesCount($args)
		{
			$this->likes_count = $this->orm->GetUserLikesCount($args);
			$this->dislikes_count = $this->orm->GetUserDislikesCount($args);
			
			$this->total_likes_count = ($this->likes_count + $this->dislikes_count);
			
			return TRUE;
		}
		
		public function GetEntryLikesDislikesCount($args)
		{
			$entry = $args['entry'];
			
			if(!$entry || !$entry['id'])
			{
				$entry = $this->entry;
			}
			
			$likes_where = [
				'type'=>'LikeDislike',
				'select'=>'Count(id) as count',
				'definition'=>[
					'LikeOrDislike'=>1,
					'Entryid'=>$entry['id'],
				],
			];
			
			$likes_count = $this->db_access_object->GetRecords($likes_where)[0]['count'];
			
			$dislikes_where = [
				'type'=>'LikeDislike',
				'select'=>'Count(id) as count',
				'definition'=>[
					'LikeOrDislike'=>0,
					'Entryid'=>$entry['id'],
				],
			];
			
			$dislikes_count = $this->db_access_object->GetRecords($dislikes_where)[0]['count'];
			
			return [
				'likes'=>$likes_count,
				'dislikes'=>$dislikes_count,
			];
		}
		
		public function SetEntryChildRecordStats($args)
		{
			$entry = $args['entry'];
			
			if(!$entry || !$entry['id'])
			{
				$entry = $this->entry;
				
				if(!$entry || !$entry['id'])
				{
					$entry = $this->master_record;
				}
			}
			
#			print_r($entry);
			
			if(!$entry || !$entry['id'])
			{
				return FALSE;
			}
			
			if(!$this->ormstats)
			{
				if(!$this->SetOrmStats())
				{
					return FALSE;
				}
			}
			
			$stats_record_args = [
				'type'=>'ChildRecordStats',
				'definition'=>[
					'Entryid'=>$entry['id'],
				],
				'limit'=>1,
			];
			
			$child_record_stats_records = $this->db_access_object->GetRecords($stats_record_args);
			
			if($child_record_stats_records && count($child_record_stats_records))
			{
				$child_record_stats = $child_record_stats_records[0];
				
				$now = time();
				$then = strtotime($child_record_stats['LastModificationDate']);
				$time_difference = $now - $then;
				
				if($time_difference >= (60 * 60 * 24) || ($this->authentication_object->user_session['UserAdmin.id'] && $this->Param('refreshstats')))
				{
					$regenerated_child_record_stats = $this->ormstats->GenerateChildRecordStats([entry=>$entry]);
					
					$child_record_stats_child_definition = [
						'ChildRecordCount'=>$regenerated_child_record_stats['TotalRecordCount'],
						'ChildWordCount'=>$regenerated_child_record_stats['TotalWordCount'],
						'ChildCharacterCount'=>$regenerated_child_record_stats['TotalCharacterCount'],
					];
					
					$child_record_stats_update_args = [
						'type'=>'ChildRecordStats',
						'update'=>$child_record_stats_child_definition,
						'where'=>[
							'id'=>$child_record_stats['id'],
						],
					];
					
					$child_record_stats = $this->db_access_object->UpdateRecord($child_record_stats_update_args)[0];
				}
	#			print('Seconds difference?' . ($now - $then) . "|");
#				print($now);
			}
			else
			{
				$child_record_stats = $this->ormstats->GenerateChildRecordStats([entry=>$entry]);
				
				$child_record_stats_child_definition = [
					'ChildRecordCount'=>$child_record_stats['TotalRecordCount'],
					'ChildWordCount'=>$child_record_stats['TotalWordCount'],
					'ChildCharacterCount'=>$child_record_stats['TotalCharacterCount'],
					'Entryid'=>$entry['id'],
				];
				
				$child_record_stats_insert_args = [
					'type'=>'ChildRecordStats',
					definition=>$child_record_stats_child_definition,
				];
				
				$child_record_stats = $this->db_access_object->CreateRecord($child_record_stats_insert_args);
			}
			
			return $this->child_record_stats = $child_record_stats;
		}
		
		public function SetEntryAssociatedRecordStats($args)
		{
			$entry = $args['entry'];
			
			if(!$entry || !$entry['id'])
			{
				$entry = $this->entry;
				
				if(!$entry || !$entry['id'])
				{
					$entry = $this->master_record;
				}
			}
			
#			print_r($entry);
			
			if(!$entry || !$entry['id'])
			{
				return FALSE;
			}
			
			$stats_record_args = [
				'type'=>'AssociatedRecordStats',
				'definition'=>[
					'Entryid'=>$entry['id'],
				],
				'limit'=>1,
			];
			
			$associated_record_stats_records = $this->db_access_object->GetRecords($stats_record_args);
			
			if($associated_record_stats_records && count($associated_record_stats_records))
			{
				$associated_record_stats = $associated_record_stats_records[0];
				
				$now = time();
				$then = strtotime($associated_record_stats['LastModificationDate']);
				$time_difference = $now - $then;
				
				if($time_difference >= (60 * 60 * 24) || ($this->authentication_object->user_session['UserAdmin.id'] && $this->Param('refreshstats')))
				{
					$regenerated_associated_record_stats = $this->ormstats->GenerateAssociatedRecordStats([entry=>$entry]);
					
					$associated_record_stats_child_definition = [
						'AssociatedRecordCount'=>$regenerated_associated_record_stats['TotalRecordCount'],
						'AssociatedWordCount'=>$regenerated_associated_record_stats['TotalWordCount'],
						'AssociatedCharacterCount'=>$regenerated_associated_record_stats['TotalCharacterCount'],
					];
					
					$associated_record_stats_update_args = [
						'type'=>'AssociatedRecordStats',
						'update'=>$associated_record_stats_child_definition,
						'where'=>[
							'id'=>$associated_record_stats['id'],
						],
					];
					
					$associated_record_stats = $this->db_access_object->UpdateRecord($associated_record_stats_update_args)[0];
				}
			}
			else
			{
				$associated_record_stats = $this->ormstats->GenerateAssociatedRecordStats([entry=>$entry]);
				
				$associated_record_stats_child_definition = [
					'AssociatedRecordCount'=>$associated_record_stats['TotalRecordCount'],
					'AssociatedWordCount'=>$associated_record_stats['TotalWordCount'],
					'AssociatedCharacterCount'=>$associated_record_stats['TotalCharacterCount'],
					'Entryid'=>$entry['id'],
				];
				
				$associated_record_stats_insert_args = [
					'type'=>'AssociatedRecordStats',
					definition=>$associated_record_stats_child_definition,
				];
				
				$associated_record_stats = $this->db_access_object->CreateRecord($associated_record_stats_insert_args);
			#	print_r($associated_record_stats);
			}
			
			return $this->associated_record_stats = $associated_record_stats;
		}
		
		public function SetOrmStats()
		{
			require('../classes/Database/ORMStats.php');
			
			return $this->ormstats = new ORMStats([dbaccessobject=>$this->db_access_object]);
		}
		
		public function SetIndexChildRecords($args)
		{
				// Set Child Records (sorted by date)
				// ------------------------------------------------------------
				
			$this->SetChildRecords([]);
			
			$exclude_ids = [];
			
			foreach($this->children as $child)
			{
				$exclude_ids[] = $child['id'];
			}
			
			$this->where = [
				sql=>'WHERE Entry1.id NOT IN(' . implode(',', array_fill(0, count($exclude_ids), '?')) .  ') ',
				bind=>str_repeat('i', count($exclude_ids)),
				value=>$exclude_ids,
			];
			
				// Set Child Records (sorted randomly)
				// ------------------------------------------------------------
			
			$this->SetRandomChildRecords();
			
			foreach($this->children_random as $child)
			{
				$exclude_ids[] = $child['id'];
			}
			
			$this->where = [
				sql=>'WHERE Entry1.id NOT IN(' . implode(',', array_fill(0, count($exclude_ids), '?')) .  ') ',
				bind=>str_repeat('i', count($exclude_ids)),
				value=>$exclude_ids,
			];
			
			#bt sort here
			
				// Set Image Records
				// ------------------------------------------------------------
			
			$this->SetRandomImageRecords();
			
				// Set Tag Records
				// ------------------------------------------------------------
			
			$this->SetRandomTagRecords();
			
		#	foreach($this->tags_random as $tag)
		#	{
		#		$exclude_ids[] = $tag['Entryid'];
		#	}
			
				// Set Quote Records
				// ------------------------------------------------------------
			
			$this->SetRandomQuoteRecords();
			
				// Set Description Records
				// ------------------------------------------------------------
			
			$this->SetRandomDescriptionRecords();
			
				// Set Textbody Records
				// ------------------------------------------------------------
			
			$this->SetRandomTextBodyRecords();
			
				// Set EventDate Records
				// ------------------------------------------------------------
			
			$this->SetRandomEventDateRecords();
			
				// Set Like Records
				// ------------------------------------------------------------
			
			$this->SetRandomLikeRecords();
			
			return TRUE;
		}
		
		public function SetRandomLikeRecords()
		{
			$get_record_where = [
				type=>'LikeDislike',
				'definition'=>[
					'LikeOrDislike'=>1,
					'RAW'=>[
						Entryid=>[
							'NOT IN',
							'(' . implode(',', $this->where['value']) . ')',
						],
					],
				],
				'joins'=>[
					'JOIN'=>[
						'Assignment'=>'Assignment.Parentid = ' . $this->entry['id'] . ' AND Assignment.Childid = LikeDislike.Entryid',
						'Entry'=>'Entry.id = LikeDislike.Entryid',
					],
				],
				limit=>'5',
				orderby=>'RAND()',
			];
			$likes_random = $this->db_access_object->GetRecords($get_record_where);
			
			foreach($likes_random as $likes_random_key => $random_like)
			{
				$likes_counts = $this->GetEntryLikesDislikesCount([entry=>[id=>$random_like['Entryid']]]);
				$random_like['counts'] = $likes_counts;
				$likes_random[$likes_random_key] = $random_like;
			}
			
			return $this->likes_random = $this->FilterValidChildren([children=>$likes_random]);
		}
		
		public function SetRandomEventDateRecords()
		{
			$get_record_where = [
				type=>'EventDate',
				'definition'=>[
					'RAW'=>[
						Entryid=>[
							'NOT IN',
							'(' . implode(',', $this->where['value']) . ')',
						],
					],
				],
				'joins'=>[
					'JOIN'=>[
						'Assignment'=>'Assignment.Parentid = ' . $this->entry['id'] . ' AND Assignment.Childid = EventDate.Entryid',
						'Entry'=>'Entry.id = EventDate.Entryid',
					],
				],
				limit=>'5',
				orderby=>'RAND()',
			];
			$eventdates_random = $this->db_access_object->GetRecords($get_record_where);
			return $this->eventdates_random = $this->FilterValidChildren([children=>$eventdates_random]);
		}
		
		public function SetRandomTextBodyRecords()
		{
			$get_record_where = [
				type=>'TextBody',
				'definition'=>[
					'RAW'=>[
						Entryid=>[
							'NOT IN',
							'(' . implode(',', $this->where['value']) . ')',
						],
					],
				],
				'joins'=>[
					'JOIN'=>[
						'Assignment'=>'Assignment.Parentid = ' . $this->entry['id'] . ' AND Assignment.Childid = TextBody.Entryid',
						'Entry'=>'Entry.id = TextBody.Entryid',
					],
				],
				limit=>'5',
				orderby=>'RAND()',
			];
			$textbodies_random = $this->db_access_object->GetRecords($get_record_where);
			
			return $this->textbodies_random = $this->FilterValidChildren([children=>$textbodies_random]);
		}
		
		public function SetRandomDescriptionRecords()
		{
			$get_record_where = [
				type=>'Description',
				'definition'=>[
					'RAW'=>[
						Entryid=>[
							'NOT IN',
							'(' . implode(',', $this->where['value']) . ')',
						],
					],
				],
				'joins'=>[
					'JOIN'=>[
						'Assignment'=>'Assignment.Parentid = ' . $this->entry['id'] . ' AND Assignment.Childid = Description.Entryid',
						'Entry'=>'Entry.id = Description.Entryid',
					],
				],
				limit=>'5',
				orderby=>'RAND()',
			];
			$descriptions_random = $this->db_access_object->GetRecords($get_record_where);
			
			return $this->descriptions_random = $this->FilterValidChildren([children=>$descriptions_random]);
		}
		
		public function SetRandomQuoteRecords()
		{
			$get_record_where = [
				type=>'Quote',
				'definition'=>[
					'RAW'=>[
						Entryid=>[
							'NOT IN',
							'(' . implode(',', $this->where['value']) . ')',
						],
					],
				],
				'joins'=>[
					'JOIN'=>[
						'Assignment'=>'Assignment.Parentid = ' . $this->entry['id'] . ' AND Assignment.Childid = Quote.Entryid',
						'Entry'=>'Entry.id = Quote.Entryid',
					],
				],
				limit=>'5',
				orderby=>'RAND()',
			];
			$quotes_random = $this->db_access_object->GetRecords($get_record_where);
			
			return $this->quotes_random = $this->FilterValidChildren([children=>$quotes_random]);
		}
		
		public function SetRandomImageRecords()
		{
			$get_record_where = [
				type=>'Image',
				'definition'=>[
					'RAW'=>[
						Entryid=>[
							'NOT IN',
							'(' . implode(',', $this->where['value']) . ')',
						],
					],
				],
				'joins'=>[
					'JOIN'=>[
						'Assignment'=>'Assignment.Parentid = ' . $this->entry['id'] . ' AND Assignment.Childid = Image.Entryid',
						'Entry'=>'Entry.id = Image.Entryid',
					],
				],
				limit=>'20',
				orderby=>'RAND()',
			];
			$images_random = $this->db_access_object->GetRecords($get_record_where);
			
			return $this->images_random = $this->FilterValidChildren([children=>$images_random]);
		}
		
		public function SetRandomTagRecords()
		{
			$get_record_where = [
				type=>'Tag',
				'definition'=>[
					'RAW'=>[
						Entryid=>[
							'NOT IN',
							'(' . implode(',', $this->where['value']) . ')',
						],
					],
				],
				'joins'=>[
					'JOIN'=>[
						'Assignment'=>'Assignment.Parentid = ' . $this->entry['id'] . ' AND Assignment.Childid = Tag.Entryid',
					],
				],
				limit=>'40',
				orderby=>'RAND()',
				groupby=>'Tag',
			];
			$tags_random = $this->db_access_object->GetRecords($get_record_where);
			
			return $this->tags_random = $this->FilterValidChildren([children=>$tags_random]);
		}
		
		public function SetRandomChildRecords()
		{
			$entry = $this->entry;
			
			if(!$entry || !$entry['id'])
			{
				$entry = $this->parent;
			}
			
			if($this->object_code)
			{
				$start_index = 1;
				$end_index = 5;
				$orderby = 'RAND()';
			}
			else
			{
				$orderby = '';
				$start_index = 0;
				$end_index = 0;
			}
			
			$where = [];
			
			if($this->where)
			{
				$where = $this->where;
			}
			
			$get_record_children_args = [
				entry=>$entry,
				startindex=>$start_index,
				endindex=>$end_index,
				orderby=>$orderby,
				where=>$where,
			];
			
			$children_random = $this->orm->GetRecordChildren($get_record_children_args);
			
			return $this->children_random = $this->FilterValidChildren([children=>$children_random]);
		}
		
		public function FilterValidChildren($args)
		{
			$children = $args['children'];
			
			$new_children = [];
			
			foreach($children as $child)
			{
				if($child && is_array($child) && $child['id'])
				{
					$new_children[] = $child;
				}
			}
			
			return $new_children;
		}
		
		public function GetEntryDisplayName($args)
		{
			$entry = $args[entry];
			
			$entry_display = $entry['Title'];
			
			if(strlen($entry['Subtitle']))
			{
				if(strlen($entry_display))
				{
					$entry_display .= ': ';
				}
				
				$entry_display .= $entry['Subtitle'];
			}
			
			return $entry_display;
		}
		
		public function GetEntryViewURL($args)
		{
			$entry_list = $args[entrylist];
			$script = $args[scriptname];
			
			if(!$script)
			{
				$script = 'view.php';
			}
			
			$url = $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]);
			
			if($this->parent['id'] && count($entry_list))
			{
				$locations = [];
				
				foreach ($entry_list as $entry)
				{
					$locations[] = $entry['Code'];
				}
				
				$location = implode('/', $locations) . '/';
			}
			else
			{
				$location = '';
			}
			
			$url .= '/' . $location . $script;
			
			return $url;
		}
		
		public function GetHyperlinkedEntryView($args)
		{
			$entry = $args[entry];
			
			if(!strlen($entry[id]))
			{
				return $this->GetHyperlinkedMainIndex($args);
			}
			
			$entry_list = $args[entrylist];
			
			$entry_title_args = [
				entry=>$entry,
			];
			
			$entry_title = $this->GetEntryDisplayName($entry_title_args);
			
			$entry_view_url_args = [
				entrylist=>$entry_list,
				scriptname=>$args['scriptname'],
			];
			
			$entry_url = $this->GetEntryViewURL($entry_view_url_args);
			
			return '<a href="' . $entry_url . '">' . $entry_title . '</a>';
		}
		
		public function GetHyperlinkedMainIndex($args)
		{
			return '<a href="' . $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/' . '">Main Site</a>';
		}
		
		public function ValidateOrm()
		{
			if(count($this->object_list) != count($this->record_list))
			{
				$this->errors[] = ['This is not a valid combination of record codes: ' . implode(', ', $this->object_list) . '.'];
				return FALSE;
			}
			
			return TRUE;
		}
		
		public function SearchForEntries($args)
		{
			return $this->orm->SearchForEntries($args);
		}
		
		public function SetEntryFromCode()
		{
			if($this->entry)
			{
				return $this->entry;
			}
			
			if($this->parent && $this->parent['id'])
			{
				return $this->entry = [
					'id'=>$this->parent['id'],
					'Title'=>$this->parent['Title'],
					'Subtitle'=>$this->parent['Subtitle'],
					'ListTitle'=>$this->parent['ListTitle'],
					'Code'=>$this->parent['Code'],
				];
			}
			else
			{
				$this->entry = $this->master_record;
				return TRUE;
			}
		}
		
		public function SetMasterRecord()
		{
			$master_records = $this->orm->GetMasterRecord();
			
			if($master_records && count($master_records))
			{
				$master_record = $master_records[0];
			}
			else
			{
				$master_record = [
					'id'=>0,
					'Title'=>'Untitled',
					'Subtitle'=>'',
					'ListTitle'=>'',
					'Code'=>'',
				];
			}
			
			$this->master_record = $master_record;
			
			if($this->master_record && $this->master_record['id'] && $this->master_record['Code'])
			{
				if(mb_strtolower($this->master_record['Code']) == $this->domain_object->primary_domain_lowercased)
				{
					$this->domain_object->primary_domain = $this->master_record['Code'];
				}
			}
		}
		
		public function CleanseRecordFromQuery($args)
		{
			$variable_name = $args[variablename];
			$data_structure = $args[datastructure];
			
			$original_name = $variable_name . '_original';
			
			$this->$original_name = $this->$variable_name;
			$array = $this->$variable_name;
			
			if(is_array($this->$variable_name) && is_array($array))
			{
				$new_record_array = [];
				
				foreach ($this->$variable_name as $record)
				{
					$new_record = [];
					
					foreach ($data_structure as $record_field)
					{
						$new_record[$record_field] = $record[$record_field];
					}
					
					$new_record_array[] = $new_record;
				}
				
				$this->$variable_name = $new_record_array;
			}
			else
			{
				$this->$variable_name = [];
				
				$new_record = [];
				
				foreach ($data_structure as $record_field)
				{
					$new_record[$record_field] = $this->CleanseForDisplay($new_record[$record_field]);
				}
				$this->$variable_name = $new_record;
			}
			
			return $this->$variable_name;
		}
		
		public function SetRecordFromQuery($args)
		{
			$variable_name = $args[variablename];
			$file = $args[file];
			$object_definition = $args[objectdefinition];
			
			$variable_name_unset = $variable_name . '_unset';
			$this->$variable_name_unset = $this->$variable_name;
			
			$new_records = [];
			
			foreach($object_definition as $field)
			{
				$queryed_value = $this->Param($field);
				
				$i = 0;
				
				if(is_array($queryed_value) && count($queryed_value))
				{
					foreach($queryed_value as $record_value)
					{
						if(!$new_records[$i])
						{
							$new_records[$i] = [];
						}
						
						$save_field = $field;
						
						$save_field = preg_replace('/^' . $variable_name . '_/', '', $save_field);
						
						$new_records[$i][$save_field] = $record_value;
						$i++;
					}
				}
				else
				{
					switch($field)
					{
						case 'AvailabilityStartDate':
						case 'AvailabilityEndDate':
							$new_records[$i][$field] = '0000-00-00';
							break;
							
						case 'AvailabilityStartTime':
						case 'AvailabilityEndTime':
							$new_records[$i][$field] = '00:00:00';
							break;
							
						default:
							$new_records[$i][$field] = '';
							break;
					}
				}
			}
			
			if($file)
			{
				$file_variable_name = $variable_name . '_files';
				
				$files = [];
				$uploaded_files = $_FILES[$file];
				
				for($i = 0; $i < count($new_records); $i++)
				{
					$new_file = [
						name=>$uploaded_files['name'][$i],
						type=>$uploaded_files['type'][$i],
						tmp_name=>$uploaded_files['tmp_name'][$i],
						error=>$uploaded_files['error'][$i],
						size=>$uploaded_files['size'][$i],
					];
					
					if($uploaded_files['name'][$i])
					{
						if(isset($new_records[$i][FileName]))
						{
							if(!strlen($new_records[$i][FileName]))
							{
								$new_records[$i][FileName] = $uploaded_files['name'][$i];
							}
							
							$selected_filename_pieces = explode(".", $new_records[$i][FileName]);
							$uploaded_filename_pieces = explode(".", $uploaded_files['name'][$i]);
							
							$last_selected_filename_piece = $selected_filename_pieces[count($selected_filename_pieces) - 1];
							$last_uploaded_filename_piece = $uploaded_filename_pieces[count($uploaded_filename_pieces) - 1];
							
							if($last_selected_filename_piece != $last_uploaded_filename_piece)
							{
								$new_file[icon_name] = $new_records[$i][FileName] . '-icon.' . $last_uploaded_filename_piece;
								$new_records[$i][FileName] .= '.' . $last_uploaded_filename_piece;
							}
							else
							{
								if(count($selected_filename_pieces) > 1)
								{
									unset($selected_filename_pieces[count($selected_filename_pieces) - 1]);
								}
								$selected_filename_imploded = implode(".", $selected_filename_pieces);
								$new_file[icon_name] = $selected_filename_imploded . '-icon.' . $last_uploaded_filename_piece;
							}
						}
						else
						{
							$uploaded_filename_pieces = explode(".", $uploaded_files['name'][$i]);
							$last_uploaded_filename_piece = $uploaded_file_pieces[count($uploaded_file_pieces) - 1];
							if(count($uploaded_filename_pieces) > 1)
							{
								unset($uploaded_filename_pieces[count($uploaded_filename_pieces) - 1]);
							}
							$uploaded_filename_imploded = implode(".", $uploaded_filename_pieces);
							$new_file[icon_name] = $uploaded_filename_imploded . '-icon.' . $last_uploaded_filename_piece;
						}
					}
					
					$files[] = $new_file;
				}
				
				$this->$file_variable_name = $files;
			}
			
			return $this->$variable_name = $new_records;
		}
		
		public function OrderAndFillChildRecords()
		{
			$this->FillChildRecords();
			$this->OrderChildRecords();
		}
		
		public function SaveComments()
		{
			if($this->entry && $this->entry['id'])
			{
				if($this->authentication_object->user_session['User.id'])
				{
					$comments = trim($this->Param('Comments'));
					
					if($comments)
					{
						$comment_definition = [
							Entryid=>$this->entry['id'],
							Userid=>$this->authentication_object->user_session['User.id'],
							Comment=>$comments,
							Language=>$this->language_object->getLanguageCode(),
						];
						
						$comment_get_args = [
							type=>'Comment',
							definition=>$comment_definition,
						];
						
						$comment_records = $this->db_access_object->GetRecords($comment_get_args);
						
						if(!count($comment_records))
						{
							$comment_definition['Approved'] = 0;
							$comment_definition['IPAddress'] = $_SERVER['REMOTE_ADDR'];
							
							if(!$this->authentication_object->user_session['User.Username'])
							{
								$new_username = strip_tags($this->Param('Username'));
								
								if($new_username)
								{
									$user_get_args = [
										type=>'User',
										definition=>[
											Username=>$new_username,
										],
									];
									
									$user_records = $this->db_access_object->GetRecords($user_get_args);
									
									if(count($user_records))
									{
										$this->username_record_conflict = $user_records;
									}
									else
									{
										$user_update_args = [
											type=>'User',
											update=>[
												Username=>$new_username,
											],
											where=>[
												id=>$this->authentication_object->user_session['User.id'],
											],
										];
										
										$updated_user = $this->db_access_object->UpdateRecord($user_update_args);
										
										if($updated_user)
										{
											$this->authentication_object->user_session['User.Username'] = $new_username;
										}
									}
								}
							}
							
							if($this->authentication_object->user_session['User.Username'])
							{
								$comment_insert_args = [
									type=>'Comment',
									definition=>$comment_definition,
								];
								
								return $this->comment_results = $this->db_access_object->CreateRecord($comment_insert_args);
							}
						}
					}
				}
			}
			
			return TRUE;
		}
		
		public function SetComments()
		{
			if($this->entry && $this->entry['id'])
			{
				$comment_definition = [
					Entryid=>$this->entry['id'],
					Approved=>1,
					Rejected=>0,
				];
				
				$comment_get_args = [
					type=>'Comment',
					definition=>$comment_definition,
				];
				
				$comments = $this->db_access_object->GetRecords($comment_get_args);
				
				$this->comments = $this->SetCommentUsers([comments=>$comments]);
			}
			
			return TRUE;
		}
		
		public function SetSiblings($args)
		{
			if(count($this->record_list))
			{
				$siblings = $this->GetSiblings($args);
				
				$younger_siblings = $siblings['younger'];
				$older_siblings = $siblings['older'];
				
				$younger_siblings = $this->GetChildrenForRecords([records=>$younger_siblings]);
				$older_siblings = $this->GetChildrenForRecords([records=>$older_siblings]);
				
				$this->younger_siblings = $younger_siblings;
				$this->older_siblings = $older_siblings;
			}
			
			return TRUE;
		}
		
		public function GetChildrenForRecords($args)
		{
			$records = $args['records'];
			
			$records_count = count($records);
			
			for($i = 0; $i < $records_count; $i++)
			{
				$record = $records[$i];
				$get_record_children_args = [
					'entry'=>$record,
				];
				
				$record_children = $this->orm->GetRecordChildren($get_record_children_args);
				$record_children = $this->FilterValidChildren([children=>$record_children]);
				
				$records[$i]['children'] = $record_children;
			}
			
			return $records;
		}
		
		public function GetSiblings($args)
		{
			$entry = $args['entry'];
			$parent = $args['parent'];
			
			if(!$entry || !$entry['id'])
			{
				$entry = $this->entry;
			}
			
			if(!$parent || !$parent['id'])
			{
				$parent = $this->parent;
			}
			
			if(!$parent || !$parent['id'])
			{
				$parent = $this->master_record;
			}
			
			if(!$entry || !$entry['id'] || !$parent || !$parent['id'])
			{
				return FALSE;
			}
			
			return $this->orm->GetSiblings(['entry'=>$entry, 'parent'=>$parent]);
		}
		
		public function SetCommentUsers($args)
		{
			$comments = $args['comments'];
			
			if(count($comments) < 1)
			{
				return [];
			}
			$useridlist = [];
			
			foreach($comments as $comment)
			{
				$useridlist[$comment['Userid']] = $comment['Userid'];
			}
			
			$userids = [];
			
			foreach($useridlist as $userid)
			{
				$userids[] = $userid;
			}
		
			$user_args = [
				'type'=>'User',
				'definition'=>[
					'RAW'=>[
						id=>[
							'IN',
							'(' . implode(',', $userids) . ')',
						],
					],
				],
			];
			
			$users = $this->db_access_object->GetRecords($user_args);
			
			$userlist = [];
			
			foreach($users as $user)
			{
				if($user && $user['id'])
				{
					unset($user['Password']);
				}
				$userlist[$user['id']] = $user;
			}
			
			foreach($comments as $comment_key => $comment_record)
			{
				$comment_record['user'] = $userlist[$comment_record['Userid']];
				$comments[$comment_key] = $comment_record;
			}
			
			return $comments;
		}
		
		public function SetRecordEntries($args)
		{
			$comments = $args['records'];
			
			if(count($comments) < 1)
			{
				return [];
			}
			
			$entryidlist = [];
			
			foreach($comments as $comment)
			{
				$entryidlist[$comment['Entryid']] = $comment['Entryid'];
			}
			
			$entryids = [];
			
			foreach($entryidlist as $entryid)
			{
				$entryids[] = $entryid;
			}
			
			$entry_args = [
				'type'=>'Entry',
				'definition'=>[
					'RAW'=>[
						id=>[
							'IN',
							'(' . implode(',', $entryids) . ')',
						],
					],
				],
			];
			
			$entries = $this->db_access_object->GetRecords($entry_args);
			$entries = $this->GetChildRecords([entries=>$entries]);
			$this->children = $entries;
			$this->SetChildRecordsOfChildren();
			$entries = $this->children;
			
			$entrylist = [];
			
			foreach($entries as $entry)
			{
				if($entry && $entry['id'])
				{
					unset($entry['Password']);
					
					$entry_parents = $this->orm->GetEntryParents([entry=>$entry]);
					
					$entry['parents'] = $entry_parents['parents'];
				}
				$entrylist[$entry['id']] = $entry;
			}
			
			foreach($comments as $comment_key => $comment_record)
			{
				$comment_record['entry'] = $entrylist[$comment_record['Entryid']];
				$comments[$comment_key] = $comment_record;
			}
			
			return $comments;
		}
		
		public function SaveRecordFromQuery_Base($args)
		{
			$object_name = $args[objectname];
			$object_type = $args[objecttype];
			
			$unsaved_object_name = $object_name . '_unsaved';
			$this->$unsaved_object_name = $this->$object_name;
			
			$object = $this->$object_name;
			
			if(is_array($object) && is_array($object[0]))
			{
				$objects_saved = [];
				
				foreach($object as $object_item)
				{
					$save = 0;
					
					foreach($object_item as $object_key => $object_value)
					{
						if(strlen($object_item[$object_key]) && ($object_key != 'EventDateTime' && $object_item[$object_key] != '0000-00-00 00:00:00') && $object_key != 'Language' && $object_key != 'id' && $object_key != 'Entryid')
						{
							$save = 1;
						}
					}
					
					if($save)
					{
						if($object_item['id'])
						{
							$object_update_args = [
								type=>$object_type,
								update=>$object_item,
								where=>[
									id=>$object_item['id'],
								],
							];
							
							$object = $this->db_access_object->UpdateRecord($object_update_args);
							
							if($object[error])
							{
								$this->admin_errors[] = $object;
								$this->errors[] = ['There was a problem with saving the ' . $object_type . '.'];
								
								return FALSE;
							}
							else
							{
								$objects_saved[] = $object[0];
							}
						}
						else
						{
							if(!$args[noentryid])
							{
								$object_item[Entryid] = $this->entry[id];
							}
							$object_insert_args = [
								type=>$object_type,
								definition=>$object_item,
							];
							
							$object = $this->db_access_object->CreateRecord($object_insert_args);
							
							if($object[error])
							{
								$this->admin_errors[] = $object;
								$this->errors[] = ['There was a problem with saving the ' . $object_type . '.'];
								
								return FALSE;
							}
							else
							{
								$objects_saved[] = $object;
							}
						}
					}
					else
					{
						$object_item['id'] = 0;
						$objects_saved[] = $object_item;
					}
				}
				
				if(count($objects_saved))
				{
					$this->$object_name = $objects_saved;
				}
			}
			else
			{
				$save = 0;
				
				foreach($object as $object_key => $object_value)
				{
					if(strlen($object[$object_key]))
					{
						$save = 1;
					}
				}
				
				if($save)
				{
			#		print("BT: *B* Object type...|" . $object_type . "|...has an id of...|" . $object['id'] . "|<BR><BR>");
					if($object['id'])
					{
			#			print("(BETA) UPDATE FOR TYPE...|" . $object_type . "|<br><br>");
						$object_update_args = [
							type=>$object_type,
							update=>$object,
							where=>[
								id=>$object['id'],
							],
						];
						
						$object = $this->db_access_object->UpdateRecord($object_update_args);
						if($object[error])
						{
							$this->admin_errors[] = $object;
							$this->errors[] = ['There was a problem with saving the ' . $object_type . '.'];
							
							return FALSE;
						}
						else
						{
							$this->$object_name = $object[0];
						}
					}
					else
					{
						if(!$args[noentryid])
						{
							$object[Entryid] = $this->entry[id];
						}
						
						$object_insert_args = [
							type=>$object_type,
							definition=>$object,
						];
							
						$object = $this->db_access_object->CreateRecord($object_insert_args);
						if($object[error])
						{
							$this->admin_errors[] = $object;
							$this->errors[] = ['There was a problem with saving the ' . $object_type . '.'];
							
							return FALSE;
						}
						else
						{
							$this->$object_name = $object;
						}
					}
				}
			}
			
		#	print("<PRE>");
		#	print_r($this->$object_name);
		#	print("</PRE>");
			
			return TRUE;
		}
		
		public function FillChildRecords()
		{
			$child_records = $this->GetChildRecords(['entries'=>[$this->entry]]);
			
		#	print("BT: !");
		#	print("<PRE>");
		#	print_r($this->GetChildRecords());
		#	print("</PRE>");
			
			$child_record_types = [
				'entrytranslation',
				'description',
				'quote',
				'textbody',
				'image',
				'imagetranslation',
				'tag',
				'link',
				'eventdate',
				'availabilitydaterange',
				'association',
				'entrypermission',
			];
			
			foreach($child_record_types as $child_record_type)
			{
				$this->$child_record_type = $child_records[0][$child_record_type];
				
				if(!count($this->$child_record_type))
				{
					$this->$child_record_type = [];
				}
			}
		}
		
		public function FillBlankChildRecords()
		{
			if(!$this->description || !count($this->description))
			{
				$this->description = [
					[
						Description=>'',
					],
				];
			}
			
			if(!$this->quote || !count($this->quote))
			{
				$this->quote = [
					[
						Quote=>'',
					],
				];
			}
			
			if(!$this->textbody || !count($this->textbody))
			{
				$this->textbody = [
					[
						Text=>'',
					],
				];
			}
			
			return TRUE;
		}
		
		public function OrderChildRecords()
		{
			$this->OrderChildRecords_AvailabilityDateRange();
			$this->OrderChildRecords_EventDate();
		}
		
		public function OrderChildRecords_AvailabilityDateRange()
		{
			$new_availability_date_ranges = [];
			
			foreach($this->availabilitydaterange as $availability_date_range)
			{
				$availability_date_range_start_time_pieces = explode(' ', $availability_date_range[AvailabilityStart]);
				$availability_date_range[AvailabilityStartDate] = $availability_date_range_start_time_pieces[0];
				$availability_date_range[AvailabilityStartTime] = $availability_date_range_start_time_pieces[1];
				
				$availability_date_range_end_time_pieces = explode(' ', $availability_date_range[AvailabilityEnd]);
				$availability_date_range[AvailabilityEndDate] = $availability_date_range_end_time_pieces[0];
				$availability_date_range[AvailabilityEndTime] = $availability_date_range_end_time_pieces[1];
				
				$new_availability_date_ranges[] = $availability_date_range;
			}
			
			$this->availabilitydaterange = $new_availability_date_ranges;
		}
		
		public function OrderChildRecords_EventDate()
		{
			$new_event_dates = [];
			
			foreach($this->eventdate as $event_date)
			{
				$event_date_time_pieces = explode(' ', $event_date['EventDateTime']);
				$event_date['EventDate'] = $event_date_time_pieces[0];
				$event_date['EventTime'] = $event_date_time_pieces[1];
				
				$new_event_dates[] = $event_date;
			}
			
			$this->eventdate = $new_event_dates;
		}
		
		public function GetChildRecords($args)
		{
			$entries = $args['entries'];
			
			$get_entry_child_records_args = [
				entrieslist=>$entries,
			];
			
			return $this->orm->GetRecordTree_GetEntryChildRecords($get_entry_child_records_args);
		}
		
		public function GetCreatedRecordsList()
		{
			$entry_record_types = $this->GetEntryRecordTypes();
			$entry_record_types['Assignment'] = 'assignment';
			
		#	print("<PRE>");
		#	print_r($entry_record_types);
		#	print("</PRE>");
			
		#	return "GetCreatedRecordsList()!!!";
			$created_records_list = [];
			
			foreach($entry_record_types as $entry_table_name => $entry_attribute_name)
			{
				$full_table_name = $entry_attribute_name . '_unformatted';
				$record = $this->$full_table_name;
				
				if(!$record)
				{
					$record = $this->$entry_attribute_name;
				}
				
				if($entry_attribute_name == 'entry' || $entry_attribute_name == 'assignment')
				{
					if($record['id'])
					{
						$created_records_list[] = [[
							contents=>$this->Bullet() . ' ' . $entry_table_name . ' ~ id #' . $record['id'],
							mouseover=>$this->RecordToString([record=>$record]),
						]];
					}
				}
				else
				{
					if(count($record))
					{
						foreach($record as $record_multiple)
						{
							if($record_multiple['id'])
							{
								$created_records_list[] = [[
									contents=>$this->Bullet() . ' ' . $entry_table_name . ' ~ id #' . $record_multiple['id'],
									mouseover=>$this->RecordToString([record=>$record_multiple]),
								]];
							}
						}
					}
				}
			}
			
			return $created_records_list;
		}
		
		public function RecordToString($args)
		{
			$record = $args[record];
			
			$record_string_pieces = [];
			
			foreach ($record as $field => $value)
			{
				$record_string_pieces[] = $field . ' : ' . $value;
			}
			
			$record_string = implode(' -- ', $record_string_pieces);
			
			return $record_string;
		}
		
		public function FormatSavedRecordFromQuery_Base($args)
		{
			$record_type = $args[recordtype];
			$record_fields = $args[recordfields];
			
			$unformatted_record_name = $record_type . '_unformatted';
			$this->$unformatted_record_name = $this->$record_type;
			$record = $this->$record_type;
			
			if(is_array($record) && is_array($record[0]))
			{
				foreach($record as $record_key => $record_object)
				{
					foreach ($record_fields as $record_field)
					{
						if(strlen($record_object[$record_field]))
						{
							$text_to_format_args = [
								texttoformat=>$record[$record_key][$record_field],
							];
							
							$record[$record_key][$record_field] = $this->FormatSavedRecordFromQuery_Base_SingleLine($text_to_format_args);
						}
					}
				}
			}
			elseif ($record)
			{
				foreach ($record_fields as $record_field)
				{
					$text_to_format_args = [
						texttoformat=>$record[$record_field],
					];
					
					$record[$record_field] = $this->FormatSavedRecordFromQuery_Base_SingleLine($text_to_format_args);
				}
			}
			
			$this->$record_type = $record;
			
			return $this->$record_type;
		}
		
		public function GetEntryRecordTypes()
		{
			return $this->orm->GetAllEntryRecordTypes();
		}
		
		public function DeleteEntry()
		{
			$delete_entry_args = [
				entry=>$this->entry,
			];
			
			return $this->orm->DeleteEntry($delete_entry_args);
		}
		
		public function DeleteRecordTree($args)
		{
			return $this->orm->DeleteRecordTree($args);
		}
		
		public function GetChildRecordTypes()
		{
			$child_record_types = [
				'entrytranslation',
				'description',
				'quote',
				'textbody',
				'image',
				'imagetranslation',
				'availabilitydaterange',
				'tag',
				'link',
				'eventdate',
				'association',
				'entrypermission',
			];
			
			return $child_record_types;
		}
		
		public function GetStandardChildRecordTypes()
		{
			return $this->orm->GetStandardEntryRecordTypes();
		}
		
		public function GetEntryParents($args)
		{
			return $this->orm->GetEntryParents($args);
		}
		
		public function SetLastAdd($args)
		{
			$entry = $args['entry'];
			
			if(!$entry || !$entry['id'])
			{
				$entry = $this->entry;
			}
			
			if(!$entry || !$entry['id'])
			{
				return FALSE;
			}
			
			return $this->last_added_entry = $this->orm->GetLastChildAdded([entry=>$entry]);
		}
		
		public function SetLastEdit($args)
		{
			$entry = $args['entry'];
			
			if(!$entry || !$entry['id'])
			{
				$entry = $this->parent;
			}
			
			if(!$entry || !$entry['id'])
			{
				return FALSE;
			}
			
			return $this->last_edited_entry = $this->orm->GetLastChildEdited([entry=>$entry]);
		}
	}
?>