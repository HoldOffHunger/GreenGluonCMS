<?php

	class ORM
	{
		
			// Construction
			// -------------------------------------------------
		
		public function __construct($args)
		{
			$this->dbaccessobject = $args[dbaccessobject];
		}
		
		public function GetAllEntryRecordTypes()
		{
			$entry_record_types = [
				'Entry'=>'entry',
				'EntryTranslation'=>'entrytranslation',
				'Description'=>'description',
				'Quote'=>'quote',
				'TextBody'=>'textbody',
				'Image'=>'image',
				'ImageTranslation'=>'imagetranslation',
				'Tag'=>'tag',
				'Link'=>'link',
				'EventDate'=>'eventdate',
				'AvailabilityDateRange'=>'availabilitydaterange',
				'Assignment'=>'assignment',
				'Association'=>'association',
				'EntryPermission'=>'entrypermission',
			];
			
			return $entry_record_types;
		}
		
		public function GetStandardEntryRecordTypes()
		{
			$entry_record_types = [
				'EntryTranslation'=>'entrytranslation',
				'Description'=>'description',
				'Quote'=>'quote',
				'TextBody'=>'textbody',
				'Image'=>'image',
				'ImageTranslation'=>'imagetranslation',
				'Tag'=>'tag',
				'Link'=>'link',
				'EventDate'=>'eventdate',
				'Association'=>'association',
				'AvailabilityDateRange'=>'availabilitydaterange',
			];
			
			return $entry_record_types;
		}
		
		public function SearchForEntries($args)
		{
			$fieldname = $args[fieldname];
			
			if(
				($fieldname == 'id') ||
				($fieldname == 'Title') ||
				($fieldname == 'Subtitle') ||
				($fieldname == 'Code')
			)
			{
				return $this->SearchForEntries_ByRecordField($args);
			}
			
			return $this->SearchForEntries_ByChildField($args);
		}
		
		public function SearchForEntries_ByChildField($args)
		{
			$child_records = $this->SearchForEntries_ByChildField_ChildRecords($args);
			
			$args[childrecords] = $child_records;
			
			$entry_records = $this->SearchForEntries_ByChildField_EntryRecords($args);
			
			$args[entryrecords] = $entry_records;
			
			$entry_records = $this->SearchForEntries_ByChildField_SortRecords($args);
			
			$args[entryrecords] = $entry_records;
			
			$entry_records = $this->SearchForEntries_ByChildField_ParentRecords($args);
			
			return $entry_records;
		}
		
		public function SearchForEntries_ByChildField_ParentRecords($args)
		{
			$entry_records = $args[entryrecords];
			
			$entry_records_with_parents = [];
			
			foreach($entry_records as $entry_record)
			{
				$get_entry_parents_args = [
					entry=>$entry_record,
				];
				$parents_results = $this->GetEntryParents($get_entry_parents_args);
				$entry_record[parents] = $parents_results[parents];
				$entry_record[assignment] = $parents_results[assignment];
				
				$entry_records_with_parents[] = $entry_record;
			}
			
			return $entry_records_with_parents;
		}
		
		public function GetRecordTypeByField($args)
		{
			$field = $args[field];
			
			switch($field)
			{
				case 'EntryTranslation':
				case 'Description':
				case 'Quote':
				case 'Image':
				case 'ImageTranslation':
				case 'Link':
				case 'TextBody':
				case 'Tag':
				case 'EventDate':
				case 'Association':
				case 'AvailabilityStart':
				case 'AvailabilityEnd':
					$recordtype = $field;
					break;
			}
			
			return $recordtype;
		}
		
		public function SearchForEntries_ByChildField_SortRecords($args)
		{
			$child_records = $args[childrecords];
			$entry_records = $args[entryrecords];
			$field_name = $args[fieldname];
			
			$record_type_args = [
				field=>$field_name,
			];
			
			$record_type = $this->GetRecordTypeByField($record_type_args);
			$record_type_key = strtolower($record_type);
			
			$new_entries = $entry_records;
			
			foreach ($entry_records as $entry)
			{
				foreach ($child_records as $child_record)
				{
					if($child_record[Entryid] == $entry[id])
					{
						$entry[$record_type_key] = [];
						$entry[$record_type_key][] = $child_record;
						
						$new_entries[] = $entry;
					}
				}
			}
			
			return $entry_records;
		}
		
		public function SearchForEntries_ByChildField_EntryRecords($args)
		{
			$child_records = $args[childrecords];
			
			$entry_ids = [];
			
			foreach ($child_records as $child_record)
			{
				$entry_ids[] = $child_record['Entryid'];
			}
			
			$entry_ids = array_unique($entry_ids);
			
			$question_marks = array_fill(0, count($entry_ids), '?');
			$question_marks_imploded = implode(', ', $question_marks);
			$sql = 'SELECT * FROM Entry WHERE id IN(' . $question_marks_imploded . ')';
			
			$sql_bind_string = str_repeat('i', count($entry_ids));
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>$sql_bind_string,
				recordvalues=>$entry_ids,
			];
			
			$record_results = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
			
			return $record_results;
		}
		
		public function SearchForEntries_ByChildField_ChildRecords($args)
		{
			$fieldname = $args[fieldname];
			$fieldvalue = $args[fieldvalue];
			$matchlike = $args[matchlike];
			
			$record_type_args = [
				field=>$fieldname,
			];
			
			$recordtype = $this->GetRecordTypeByField($record_type_args);
			
			$sql = 'SELECT * FROM ' . $recordtype . ' WHERE ' . $fieldname . ' ';
			
			if($matchlike)
			{
				$sql .= 'RLIKE';
			}
			else
			{
				$sql .= '=';
			}
			
			$sql .= ' ?';
			
			$bind_string = 's';
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>$bind_string,
				recordvalues=>[$fieldvalue],
			];
			
			$record_results = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
			
			return $record_results;
		}
		
		public function SearchForEntries_ByRecordField($args)
		{
			$fieldname = $args[fieldname];
			$fieldvalue = $args[fieldvalue];
			$matchlike = $args[matchlike];
			
			$sql = 'SELECT * from Entry WHERE ' . $fieldname . ' ';
			
			if($matchlike)
			{
				$sql .= 'RLIKE ';
			}
			else
			{
				$sql .= '= ';
			}
			
			$sql .= '?';
			
			$get_description_args = [
				type=>'Entry',
			];
			$record_description = $this->dbaccessobject->GetRecordDescription($get_description_args);
			
			$record_results = [];
			
			if($record_description && $record_description[$fieldname])
			{
				if($record_description[$fieldname]['TypeBase'] == 'int')
				{
					$bind_string = 'i';
				}
				else
				{
					$bind_string = 's';
				}
				
				$record_values = [$fieldvalue];
				
				$fill_arrays_from_db_args = [
					query=>$sql,
					sqlbindstring=>$bind_string,
					recordvalues=>$record_values,
				];
				
				$record_results = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
			}
			
			if($record_results && count($record_results))
			{
				$new_record_results = [];
				
				foreach ($record_results as $record_result)
				{
					$get_parents_args = [
						'entry'=>$record_result,
						'assignmentid'=>$args['assignmentid'],
					];
					$parents_results = $this->GetEntryParents($get_parents_args);
					$record_result['assignment'] = $parents_results['assignment'];
					$record_result['parents'] = $parents_results['parents'];
					
					$new_record_results[] = $record_result;
				}
				
				$record_results = $new_record_results;
			}
			
			return $record_results;
		}
		
		public function GetEntryParents($args)
		{
			$parents = $this->GetEntryParents_GetRecords($args);
			$args['parents'] = $parents;
			
			$child_assignment = [
				id=>$parents['Assignment_1_id'],
				Parentid=>$parents['Assignment_1_Parentid'],
				Childid=>$parents['Assignment_1_Childid'],
			];
			
			$args['entry']['assignment'] = $child_assignment;
			
			$parents = $this->GetEntryParents_SortRecords($args);
			
			return [
				parents=>$parents,
				assignment=>$child_assignment,
			];
		}
		
		public function GetEntryParents_GetRecords($args)
		{
			$entry = $args[entry];
			
			$ids = [$entry[id]];
			
			$sql = 'SELECT ';
			
			$sql .= 'Assignment1.id as Assignment_1_id, Assignment1.Parentid as Assignment_1_Parentid, Assignment1.Childid as Assignment_1_Childid ';
			
			$joins = [];
			$selects = [
				'Entry1.id as Entry_1_id',
				'Entry1.Title as Entry_1_Title',
				'Entry1.Subtitle as Entry_1_Subtitle',
				'Entry1.ListTitle as Entry_1_ListTitle',
				'Entry1.Code as Entry_1_Code',
				'Entry1.OriginalCreationDate as Entry_1_OriginalCreationDate',
				'Entry1.LastModificationDate as Entry_1_LastModificationDate',
			];
			
			$max_depth = 10;
			
			for($i = 2; $i < $max_depth; $i++)
			{
				$previous_index = $i - 1;
				
				$selects[] = 'Assignment' . $i . '.id as Assignment_' . $i . '_id';
				$selects[] = 'Assignment' . $i . '.Parentid as Assignment_' . $i . '_Parentid';
				$selects[] = 'Assignment' . $i . '.Childid as Assignment_' . $i . '_Childid';
				
				$selects[] = 'Entry' . $i . '.id as Entry_' . $i . '_id';
				$selects[] = 'Entry' . $i . '.Title as Entry_' . $i . '_Title';
				$selects[] = 'Entry' . $i . '.Subtitle as Entry_' . $i . '_Subtitle';
				$selects[] = 'Entry' . $i . '.ListTitle as Entry_' . $i . '_ListTitle';
				$selects[] = 'Entry' . $i . '.Code as Entry_' . $i . '_Code';
				$selects[] = 'Entry' . $i . '.OriginalCreationDate as Entry_' . $i . '_OriginalCreationDate';
				$selects[] = 'Entry' . $i . '.LastModificationDate as Entry_' . $i . '_LastModificationDate';
				
				$joins[] = 'LEFT JOIN Assignment AS Assignment' . $i . ' ON Assignment' . $i . '.Childid = Entry' . $previous_index . '.id';
				$joins[] = 'LEFT JOIN Entry AS Entry' . $i . ' ON Assignment' . $i . '.Parentid = Entry' . $i . '.id';
			}
			
			if(count($selects))
			{
				$sql .= ', ' . implode(', ', $selects) . ' ';
			}
			$sql .= 'FROM Assignment Assignment1 ';
			$sql .= 'LEFT JOIN Entry AS Entry1 ON Entry1.id = Assignment1.Parentid ';
			
			$sql .= implode(' ', $joins);
			$sql .= ' WHERE Assignment1.Childid = ?';
			
			$bind_string = 'i';
			
			if($args['assignmentid'])
			{
				$sql .= ' AND Assignment1.id = ?';
				$bind_string .= 'i';
				$ids[] = $args['assignmentid'];
			}
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>$bind_string,
				recordvalues=>$ids,
			];
			
			$parents = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
			
			return $parents[0];
		}
		
		public function GetEntryParents_SortRecords($args)
		{
			$entry = $args['entry'];
			$parents = $args['parents'];
			$parents_count = count($parents);
			
			$parent_objects = [];
			
			for($i = 1; $i <= $parents_count; $i++)
			{
				$next_increment = $i + 1;
				$assignment_id = $parents['Assignment_' . $next_increment . '_id'];
				
				if($assignment_id)
				{
					$assignment_parentid = $parents['Assignment_' . $next_increment . '_Parentid'];
					$assignment_childid = $parents['Assignment_' . $next_increment . '_Childid'];
					
					$entry_id = $parents['Entry_' . $i . '_id'];
					$entry_title = $parents['Entry_' . $i . '_Title'];
					$entry_subtitle = $parents['Entry_' . $i . '_Subtitle'];
					$entry_listtitle = $parents['Entry_' . $i . '_ListTitle'];
					$entry_code = $parents['Entry_' . $i . '_Code'];
					$entry_originalcreationdate = $parents['Entry_' . $i . '_OriginalCreationDate'];
					$entry_latsmodificationdate = $parents['Entry_' . $i . '_LastModificationDate'];
					
					$parent = [
						id=>$entry_id,
						Title=>$entry_title,
						Subtitle=>$entry_subtitle,
						ListTitle=>$entry_listtitle,
						Code=>$entry_code,
						OriginalCreationDate=>$entry_originalcreationdate,
						LastModificationDate=>$entry_latsmodificationdate,
						assignment=>[
							id=>$assignment_id,
							Parentid=>$assignment_parentid,
							Childid=>$assignment_childid,
						],
					];
					
					$parent_objects[] = $parent;
				}
				else
				{
					$i = $parents_count + 1;
				}
			}
			
			$parent_objects = array_reverse($parent_objects);
			
			$parent_objects[] = $entry;
			
			return $parent_objects;
		}
		
		public function GetMasterRecord()
		{
			$sql = 'SELECT ';
			
			$sql .= 
				'Entry.id as Entry_id, ' .
				'Entry.Title as Entry_Title, ' .
				'Entry.Subtitle as Entry_Subtitle, ' .
				'Entry.ListTitle as Entry_ListTitle, ' .
				'Entry.Code as Entry_Code, ' .
				'Entry.OriginalCreationDate as Entry_OriginalCreationDate, ' .
				'Entry.LastModificationDate as Entry_LastModificationDate, ' .
				'Assignment.id as Assignment_id, ' .
				'Assignment.Parentid as Assignment_Parentid, ' .
				'Assignment.Childid as Assignment_Childid ' ;
			
			$sql .= 'FROM Entry JOIN Assignment ON Assignment.Parentid = Entry.id AND Assignment.Childid = 0;';
			
			$bind_string = '';
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>$bind_string,
				recordvalues=>[],
			];
			
			$master_records = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
			
			$new_master_records = [];
			
			foreach($master_records as $master_record)
			{
				$new_master_record = [
					id=>$master_record['Entry_id'],
					Title=>$master_record['Entry_Title'],
					Subtitle=>$master_record['Entry_Subtitle'],
					ListTitle=>$master_record['Entry_ListTitle'],
					Code=>$master_record['Entry_Code'],
					OriginalCreationDate=>$master_record['Entry_OriginalCreationDate'],
					LastModificationDate=>$master_record['Entry_LastModificationDate'],
					assignment=>[
						id=>$master_record['Assignment_id'],
						Parentid=>$master_record['Assignment_Parentid'],
						Childid=>$master_record['Assignment_Childid'],
					],
				];
				
				$get_child_record_args = [
					entrieslist=>[
						$new_master_record,
					],
				];
				
				$new_master_record = $this->GetRecordTree_GetEntryChildRecords($get_child_record_args);
				$new_master_records[] = $new_master_record[0];
			}
			
			return $new_master_records;
		}
		
		public function GetRecordTree($args)
		{
			$entries_list = $this->GetRecordTree_GetEntries($args);
			
			$entries_list_args = $args;
			$entries_list_args[entrieslist] = $entries_list;
			
			$entries_list = $this->GetRecordTree_StructureRecords($entries_list_args);
			
			$entries_list_args[entrieslist] = $entries_list;
			
			$entries_list = $this->GetRecordTree_GetEntryChildRecords($entries_list_args);
			
			return $entries_list;
		}
		
		public function GetRecordTree_GetEntries($args)
		{
			$code_list = $args['codelist'];
			$availability_limit = $args['availabilitylimit'];
			
			$code_list_count = count($code_list);
			
			$code_index = 1;
			$joins = [];
			$wheres = [];
			
			$get_base_select_args = [
				index=>$code_index,
			];
			
			$selects = $this->GetRecordTree_GetEntries_GetBaseSelect($get_base_select_args);
			
			$joins[] = 'JOIN Assignment AS Assignment' . $code_index . ' ON Assignment1.Childid = Entry' . $code_index . '.id';
			
			if($code_list_count)
			{
				$wheres[] = 'Entry' . $code_index . '.Code = ?'; #. $code_list[0];
			}
			
			$code_index++;
			
			$parseable_code_list = $code_list;
			array_shift($parseable_code_list);
			
			foreach ($parseable_code_list as $code)
			{
				$previous_code_index = $code_index - 1;
				
				$get_base_select_args = [
					'index'=>$code_index,
					'list'=>$selects,
				];
				
				$selects = $this->GetRecordTree_GetEntries_GetBaseSelect($get_base_select_args);
				
				$joins[] = 'JOIN Assignment AS Assignment' . $code_index . ' ON Assignment' . $code_index . '.Parentid = Entry' . $previous_code_index . '.id';
				$joins[] = 'JOIN Entry AS Entry' . $code_index . ' ON Assignment' . $code_index . '.Childid = Entry' . $code_index . '.id';
				
				$wheres[] = 'Entry' . $code_index . '.Code = ?'; # . $code_list[$previous_code_index];
				
				$code_index++;
			}
			
			$sql = 'SELECT ';
			$sql .= implode(', ', $selects) . ' ';
			$sql .= 'FROM ';
			$sql .= 'Entry as Entry1 ';
			$sql .= implode(' ', $joins) . ' ';
			
			if($code_list_count)
			{
				$sql .= 'WHERE ';
				$sql .= implode(' AND ', $wheres);
			}
			
			$sql_bind_string = str_repeat('s', $code_list_count);
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>$sql_bind_string,
				recordvalues=>$code_list,
			];
			
			return $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
		}
		
		public function GetRecordTree_StructureChildRecords($args)
		{
			$entries_list = $args[entrieslist];
			$entries_list_count = count($entries_list);
			
			if($args['extraselect'])
			{
				$new_select = explode(',',$args['extraselect']);
			}
			
			$new_entries_list = [];
			
			for($i = 0; $i < $entries_list_count; $i++)
			{
				$entry = $entries_list[$i];
				
				$new_entry = [
					id=>$entry['Entry_1_id'],
					Title=>$entry['Entry_1_Title'],
					Subtitle=>$entry['Entry_1_Subtitle'],
					ListTitle=>$entry['Entry_1_ListTitle'],
					Code=>$entry['Entry_1_Code'],
					OriginalCreationDate=>$entry['Entry_1_OriginalCreationDate'],
					LastModificationDate=>$entry['Entry_1_LastModificationDate'],
					assignment=>[
						[
							id=>$entry['Assignment_1_id'],
							Parentid=>$entry['Assignment_1_Parentid'],
							Childid=>$entry['Assignment_1_Childid'],
						],
					],
				];
				
				if($new_select)
				{
					foreach($new_select as $select_field)
					{
						$select_pieces = explode(' AS ', $select_field);
						$new_entry[$select_pieces[1]] = $entry[$select_pieces[1]];
					}
				}
				
				$new_entries_list[] = $new_entry;
			}
			
			return $new_entries_list;
		}
		
		public function GetRecordTree_StructureRecords($args)
		{
			$entries_list = $args[entrieslist];
			$code_list = $args[codelist];
			$entry_data = $entries_list[0];
			$code_list_count = count($code_list);
			
			$new_entries_list = [];
			
			for($i = 1; $i <= $code_list_count; $i++)
			{
				if($entry_data['Entry_' . $i . '_id'])
				{
					$new_entries_list[] = [
						id=>$entry_data['Entry_' . $i . '_id'],
						Title=>$entry_data['Entry_' . $i . '_Title'],
						Subtitle=>$entry_data['Entry_' . $i . '_Subtitle'],
						ListTitle=>$entry_data['Entry_' . $i . '_ListTitle'],
						Code=>$entry_data['Entry_' . $i . '_Code'],
						OriginalCreationDate=>$entry_data['Entry_' . $i . '_OriginalCreationDate'],
						LastModificationDate=>$entry_data['Entry_' . $i . '_LastModificationDate'],
						assignment=>[
							[
								id=>$entry_data['Assignment_' . $i . '_id'],
								Parentid=>$entry_data['Assignment_' . $i . '_Parentid'],
								Childid=>$entry_data['Assignment_' . $i . '_Childid'],
							],
						],
					];
				}
			}
			
			return $new_entries_list;
		}
		
		public function GetRecordChildrenCount($args)
		{
			$entry = $args[entry];
			$where = $args[where];
			
			$sql = 'SELECT COUNT(Entry1.id) AS ChildRecordCount ';
			$sql .= 'FROM ';
			$sql .= 'Entry AS Entry1 ';
			$sql .= 'JOIN Assignment as Assignment1 ON Assignment1.Parentid = ? AND Assignment1.Childid = Entry1.id ';
			
			$sql_bind_string = 'i';
			$sql_bind_values = [$entry['id']];
			
			if($where && count($where))
			{
				$sql .= $where['sql'];
				$sql_bind_string .= $where['bind'];
				foreach($where['value'] as $where_value)
				{
					$sql_bind_values[] = $where_value;
				}
			}
			
			$sql .= ';';
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>$sql_bind_string,
				recordvalues=>$sql_bind_values,
			];
			
			$child_record_count = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
			return $child_record_count[0][ChildRecordCount];
		}
		
		public function GetUserCommentsCount($args)
		{
			$user = $args[user];
			
			$sql = 'SELECT COUNT(Comment.id) AS CommentCount ';
			$sql .= 'FROM ';
			$sql .= 'Comment ';
			$sql .= 'WHERE Comment.Userid = ? AND Approved = 1 AND Rejected = 0;';
			
			$sql_bind_string = 'i';
			$sql_bind_values = [$user['id']];
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>$sql_bind_string,
				recordvalues=>$sql_bind_values,
			];
			
			$comment_record_count = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
			
			return $comment_record_count[0][CommentCount];
		}
		
		public function GetUserLikesCount($args)
		{
			$user = $args[user];
			
			$sql = 'SELECT COUNT(LikeDislike.id) AS LikeDislikeCount ';
			$sql .= 'FROM ';
			$sql .= 'LikeDislike ';
			$sql .= 'WHERE LikeDislike.Userid = ? AND LikeDislike.LikeOrDislike = 1;';
			
			$sql_bind_string = 'i';
			$sql_bind_values = [$user['id']];
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>$sql_bind_string,
				recordvalues=>$sql_bind_values,
			];
			
			$likedislikes_record_count = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
			
			return $likedislikes_record_count[0][LikeDislikeCount];
		}
		
		public function GetUserDisLikesCount($args)
		{
			$user = $args[user];
			
			$sql = 'SELECT COUNT(LikeDislike.id) AS LikeDislikeCount ';
			$sql .= 'FROM ';
			$sql .= 'LikeDislike ';
			$sql .= 'WHERE LikeDislike.Userid = ? AND LikeDislike.LikeOrDislike = 0;';
			
			$sql_bind_string = 'i';
			$sql_bind_values = [$user['id']];
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>$sql_bind_string,
				recordvalues=>$sql_bind_values,
			];
			
			$likedislikes_record_count = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
			
			return $likedislikes_record_count[0][LikeDislikeCount];
		}
		
		public function GetRecordChildren($args)
		{
			$entry = $args[entry];
			$start_index = $args[startindex];
			$end_index = $args[endindex];
			$order_by = $args[orderby];
			$where = $args[where];
			
			$selects = $this->GetRecordTree_GetEntries_GetBaseSelect([index=>1, noassignment=>$args['noassignment']]);
			
			$sql = 'SELECT ';
			$sql .= implode(', ', $selects) . ' ';
			
			if($args['extraselect'])
			{
				$sql .= ',' . $args['extraselect'] . ' ';
			}
			
			$sql .= 'FROM ';
			$sql .= 'Entry as Entry1 ';
			
			if(!$args['noassignment'])
			{
				$sql .= 'JOIN Assignment as Assignment1 ON Assignment1.Parentid = ? AND Assignment1.Childid = Entry1.id ';
				$sql_bind_string = 'i';
				$sql_bind_values = [$entry['id']];
			}
			
			if($where && count($where))
			{
				$sql .= $where['sql'];
				$sql_bind_string .= $where['bind'];
				foreach($where['value'] as $where_value)
				{
					$sql_bind_values[] = $where_value;
				}
			}
		#	print_r($sql_bind_values);
		#	print_r($sql);
			if($start_index && $end_index)
			{
				if($order_by)
				{
					$sql .= 'ORDER BY ';
					if($order_by == 'RAND()')
					{	
						$sql .= 'RAND() ';
					}
					else
					{
						$sql .= 'Entry1.' . $order_by . ' ';
					}
				}
				
				$sql .= 'LIMIT ' . ($start_index - 1) . ',' . ($end_index) ;
			}
#			print("BT:");
#			print_r($sql);
			$sql .= ';';
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>$sql_bind_string,
				recordvalues=>$sql_bind_values,
			];
			
			$child_entries = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
#			print_r($child_entries);
#			print_r($sql_bind_values);
#						print_r($sql);
			$child_entries = $this->GetRecordTree_StructureChildRecords([entrieslist=>$child_entries, extraselect=>$args['extraselect']]);
			$no_textbodies = 1;		
			if($args['alltext'])
			{
				$no_textbodies = 0;
			}
#			print_r($args);
			$child_entries = $this->GetRecordTree_GetEntryChildRecords([entrieslist=>$child_entries, notextbodies=>$no_textbodies]);
			
			return $child_entries;
		}
		
		public function GetRecordAndChildren($args)
		{
			$entry = $args['entry'];
			$where = $args['where'];
			
			$selects = $this->GetRecordTree_GetEntries_GetBaseSelect([index=>1, noassignment=>1]);
			
			$sql = 'SELECT ';
			$sql .= implode(', ', $selects) . ' ';
			$sql .= 'FROM ';
			$sql .= 'Entry as Entry1 ';
			
			$sql_bind_string = '';
			$sql_bind_values = [];
			
			if($entry && $entry['id'])
			{
				$sql .= 'WHERE Entry1.id = ? ';
				$sql_bind_string .= 'i';
				$sql_bind_values[] = $entry['id'];
			}
			
			if($where && count($where))
			{
				$sql .= $where['sql'];
				$sql_bind_string .= $where['bind'];
				foreach($where['value'] as $where_value)
				{
					$sql_bind_values[] = $where_value;
				}
			}
			
			$sql .= ';';
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>$sql_bind_string,
				recordvalues=>$sql_bind_values,
			];
			
			$child_entries = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
			$child_entries = $this->GetRecordTree_StructureChildRecords([entrieslist=>$child_entries]);
			$no_textbodies = 1;			
			if($args['alltext'])
			{
				$no_textbodies = 0;
			}
			$child_entries = $this->GetRecordTree_GetEntryChildRecords([entrieslist=>$child_entries, notextbodies=>$no_textbodies]);
			
			return $child_entries;
		}
		
		public function GetSiblings($args)
		{
			$entry = $args['entry'];
			$parent = $args['parent'];
			
			$selects = $this->GetRecordTree_GetEntries_GetBaseSelect([index=>1, noassignment=>1]);
			
			$siblings = [];
			$types = [
				'younger'=>'<',
				'older'=>'>',
			];
			
			foreach($types as $type_key => $type_operator)
			{
				$sql = 'SELECT ';
				$sql .= implode(', ', $selects) . ' ';
				$sql .= 'FROM ';
				$sql .= 'Entry AS Entry1 ';
				
				$sql .= 'JOIN Assignment AS Assignment1 ON Assignment1.Childid = Entry1.id AND Assignment1.Parentid = ? ';
				
				$sql .= 'WHERE Entry1.ListTitle ' . $type_operator . ' ? ';
				
				$sql .= 'ORDER BY Entry1.ListTitle ';
				
				if($type_operator == '<')
				{
					$sql .= ' DESC ';
				}
				
				$sql .= 'LIMIT 10;';
				
				$sql_bind_string = 'is';
				$sql_bind_values = [
					$parent['id'],
					$entry['ListTitle'],
				];
				
				$fill_arrays_from_db_args = [
					query=>$sql,
					sqlbindstring=>$sql_bind_string,
					recordvalues=>$sql_bind_values,
				];
				
				$type_siblings = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
				$type_siblings = $this->GetRecordTree_StructureChildRecords(['entrieslist'=>$type_siblings]);
				$type_siblings = $this->GetRecordTree_GetEntryChildRecords(['entrieslist'=>$type_siblings, 'notextbodies'=>1]);
				
				$siblings[$type_key] = $type_siblings;
			}
			
			return $siblings;
		}
		
		public function GetChildRecordTypes()
		{
			return [
				'EntryTranslation',
				'Description',
				'Quote',
				'TextBody',
				'Image',
				'ImageTranslation',
				'Tag',
				'Link',
				'EventDate',
				'AvailabilityDateRange',
				'Association',
			];
		}
		
		public function GetRecordTree_GetEntryChildRecords($args)
		{
			$entries_list = $args[entrieslist];
			$no_textbodies = $args[notextbodies];
			$child_records = [];
			
			if(count($entries_list))
			{
				$queries = [];
				$query_values = [];
				$query_bindstrings = [];
				
				$bindstring = '';
				
				$ids = [];
				foreach($entries_list as $entry)
				{
					$ids[] = $entry['id'];
					$bindstring .= 'i';
				}
				
				$question_marks = array_fill(0, count($entries_list), '?');
				$question_mark_string = implode(', ', $question_marks);
				
				$tables = $this->GetChildRecordTypes();
				
				foreach($tables as $table)
				{
					$sql = 'SELECT ';
					
					if($table == 'TextBody' && $no_textbodies)
					{
						$sql .= 'id, substring(Text,1,1000) as FirstThousandCharacters, Language, WordCount, CharacterCount, Source, Entryid, OriginalCreationDate, LastModificationDate ';
					}
					else
					{
						$sql .= '* ';
					}
					
					$sql .= 'from ' . $table . ' WHERE Entryid IN(' . $question_mark_string . ')';
					
					$queries[$table] =  $sql;
				}
				
				$queries['Associated'] = 'SELECT * from Association WHERE ChosenEntryid IN(' . $question_mark_string . ')';
				$tables[] = 'Associated';
				
				$query_results = [];
				
				foreach ($queries as $table => $query)
				{
					$fill_arrays_from_db_args = [
						query=>$query,
						sqlbindstring=>$bindstring,
						recordvalues=>$ids,
					];
					
					$query_results[$table] = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
				}
			
				$query_results_by_entryid_and_table = [];
				
				foreach ($query_results as $table => $query_result)
				{
					$query_results_by_entryid_and_table[$table] = [];
					foreach ($query_result as $record_result)
					{
						$record_key = 'Entryid';
						
						if($table == 'Associated')
						{
							$record_key = 'ChosenEntryid';
						}
						
						if(!$query_results_by_entryid_and_table[$table][$record_result[$record_key]])
						{
							$query_results_by_entryid_and_table[$table][$record_result[$record_key]] = [];
						}
						
						$query_results_by_entryid_and_table[$table][$record_result[$record_key]][] = $record_result;
					}
				}
				
				foreach ($entries_list as $entry)
				{
					foreach($tables as $table)
					{
						$entry[strtolower($table)] = $query_results_by_entryid_and_table[$table][$entry['id']];
					}
					
					$new_entries_list[] = $entry;
				}
				
#				print_r($new_entries_list);
				
				$entries_list = $new_entries_list;
			}
			else
			{
			#	print("GET ZERO ENTRY LIST ENTRIES!");
			}
			
			return $entries_list;
		}
		
		public function GetRecordTree_GetEntries_GetBaseSelect($args)
		{
			$index = $args['index'];
			
			if($args['list'])
			{
				$selects = $args['list'];
			}
			else
			{
				$selects = [];
			}
			
			$selects[] = 'Entry' . $index . '.id as Entry_' . $index . '_id';
			$selects[] = 'Entry' . $index . '.Title as Entry_' . $index . '_Title';
			$selects[] = 'Entry' . $index . '.Subtitle as Entry_' . $index . '_Subtitle';
			$selects[] = 'Entry' . $index . '.ListTitle as Entry_' . $index . '_ListTitle';
			$selects[] = 'Entry' . $index . '.Code as Entry_' . $index . '_Code';
			$selects[] = 'Entry' . $index . '.OriginalCreationDate as Entry_' . $index . '_OriginalCreationDate';
			$selects[] = 'Entry' . $index . '.LastModificationDate as Entry_' . $index . '_LastModificationDate';
			
			if(!$args['noassignment'])
			{
				$selects[] = 'Assignment' . $index . '.id as Assignment_' . $index . '_id';
				$selects[] = 'Assignment' . $index . '.Parentid as Assignment_' . $index . '_Parentid';
				$selects[] = 'Assignment' . $index . '.Childid as Assignment_' . $index . '_Childid';
			}
			
			return $selects;
		}
		
		public function DeleteEntry($args)
		{
			$entry = $args[entry];
			
			$sql = 'DELETE FROM Entry WHERE id = ' . $entry['id'] . ';';
			$sql_bind_string = '';
			$record_values = [];
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>$sql_bind_string,
				recordvalues=>$record_values,
			];
			
			return $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
		}
		
		public function DeleteChildRecords($args)
		{
			$entry = $args[parent];
			$record_type = $args[recordtype];
			$record_ids_to_keep = $args[recordidstokeep];
			
			if($record_type == 'Association')
			{
				$sql = 'DELETE FROM ' . $record_type;
				
				$sql .= ' WHERE ChosenEntryid = ' . $entry['id'];
				
				if(count($record_ids_to_keep))
				{
					$sql .= ' AND id NOT IN (' ;
					
					$sql .= implode(', ', array_fill(0, count($record_ids_to_keep), '?'));
				
					$sql .= ')';
					
					$sql_bind_string = str_repeat('i', count($record_ids_to_keep));
				}
				else
				{
					$sql_bind_string = '';
				}
				$fill_arrays_from_db_args = [
					query=>$sql,
					sqlbindstring=>$sql_bind_string,
					recordvalues=>$record_ids_to_keep,
				];
				
				if($this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args)['line'])
				{
					return FALSE;
				}
			}
			
			$sql = 'DELETE FROM ' . $record_type;
			
			$sql .= ' WHERE Entryid = ' . $entry['id'];
			
			if(count($record_ids_to_keep))
			{
				$sql .= ' AND id NOT IN (' ;
				
				$sql .= implode(', ', array_fill(0, count($record_ids_to_keep), '?'));
			
				$sql .= ')';
				
				$sql_bind_string = str_repeat('i', count($record_ids_to_keep));
			}
			else
			{
				$sql_bind_string = '';
			}
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>$sql_bind_string,
				recordvalues=>$record_ids_to_keep,
			];
			
			if($this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args)['line'])
			{
				return FALSE;
			}
			
			return TRUE;
		}
		
		public function GetLastChildAdded($args)
		{
			$entry = $args['entry'];
			
			$sql = 'SELECT * FROM Entry ';
			$sql .= 'JOIN Assignment ON Parentid = ? and Childid = Entry.id ';
			$sql .= 'ORDER BY Entry.OriginalCreationDate DESC LIMIT 1';
			
			$sql_bind_string = 'i';
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>$sql_bind_string,
				recordvalues=>[$entry['id']],
			];
			
			$results = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
			
			if($results)
			{
				return $results[0];
			}
			
			return FALSE;
		}
		
		public function GetLastChildEdited($args)
		{
			$entry = $args['entry'];
			
			$sql = 'SELECT * FROM Entry ';
			$sql .= 'JOIN Assignment ON Parentid = ? and Childid = Entry.id ';
			$sql .= 'ORDER BY Entry.LastModificationDate DESC LIMIT 1';
			
			$sql_bind_string = 'i';
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>$sql_bind_string,
				recordvalues=>[$entry['id']],
			];
			
			$results = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
			
			if($results)
			{
				return $results[0];
			}
			
			return FALSE;
		}
		
		public function GetTagCounts($args)
		{
			$tags = $args['tags'];
			$entry = $args['entry'];
			
			$sql = 'SELECT DISTINCT Tag, Count(Tag.id) AS Count ';
			$sql .= 'FROM Tag ';
			$sql .= 'JOIN Entry Child ON Child.id = Tag.Entryid ';
			$sql .= 'JOIN Assignment ON Assignment.Childid = Child.id AND Assignment.Parentid = ? ';
			$sql .= 'WHERE Tag.Tag IN(';

			$question_marks = array_fill(0, count($tags), '?');
			$question_mark_string = implode(', ', $question_marks);
			$sql .= $question_mark_string;
			
			$sql .= ') ';
			$sql .= 'GROUP BY Tag.Tag ';
			$sql .= 'ORDER BY Tag.Tag;';
			
			$sql_bind_string = 'i' . str_repeat('s', count($tags));
			
			$sql_args = [];
			$sql_args[] = $entry['id'];
			foreach($tags as $tag)
			{
				$sql_args[] = $tag;
			}
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>$sql_bind_string,
				recordvalues=>$sql_args,
			];
			
			$tag_counts = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
			
			$tag_counts_hash = [];
			
			foreach($tag_counts as $tag_count)
			{
				$tag_counts_hash[$tag_count['Tag']] = $tag_count['Count'];
			}
			
			return $tag_counts_hash;
		}
	}

?>
