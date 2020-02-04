<?php

	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/SimpleErrors.php');
	require('../traits/scripts/SimpleForms.php');
	require('../traits/scripts/SimpleImages.php');
	require('../traits/scripts/SimpleLanguages.php');
	require('../traits/scripts/SimpleLookupLists.php');
	require('../traits/scripts/SimpleORM.php');
	require('../traits/scripts/UserAccounts.php');
	
	class modify extends basicscript {
						// Traits
						// ---------------------------------------------
		
		use DBFunctions;
		use SimpleErrors;
		use SimpleForms;
		use SimpleImages;
		use SimpleLanguages;
		use SimpleLookupLists;
		use SimpleORM;
		use UserAccounts;
		
						// Security Data
						// ---------------------------------------------
		
		public function IsSecure() {
			return TRUE;
		}
		
		public function RequiresLogin() {
			return TRUE;
		}
		
						// Add Entry Form
						// ---------------------------------------------
		
		public function Add() {
			$this->SetOrmBasics();
			
			if(!$this->ValidateOrm())
			{
				return FALSE;	# Causes 404
			}
			
			$this->SetSelectableLanguages();
			$this->SetLastAdd([]);
			
			$this->FormatErrors();
			
			return TRUE;
		}
		
						// Edit Selected Entry
						// ---------------------------------------------
		
//		public function display() {
//			$this->desired_action = 'Edit';
//			return $this->Edit();
//		}
		
		public function Edit() {
			$this->SetOrmBasics();
			
			if(!$this->ValidateOrm()) {
				return FALSE;	# Trigger 404
			}
			
			$this->SetEntryFromCode();
			$this->OrderAndFillChildRecords();
			$this->FillBlankChildRecords();
			$this->SetSelectableLanguages();
			$this->SetLastEdit([]);
			
			$this->FormatErrors();
			
			return TRUE;
		}
		
						// Update Selected Entry
						// ---------------------------------------------
		
		public function Update() {
			if($this->Param('Delete')) {
				return $this->Delete();
			}
			
			$this->SetOrmBasics();
			
			if(!$this->ValidateOrm()) {
				return FALSE;	# Causes 404
			}
			
			if(!$this->parent['id'] && (!$this->master_record || !$this->master_record['id'])) {
				return $this->Save();
			}
			
			$this->entryid = $this->entry[id];
			$this->SetEntryFromCode();
			$this->OrderAndFillChildRecords();
			$this->SetRecordFromQueryForAll();
			$this->CleanseRecordFromQueryForAll();
			$this->RealignEntryIDsForRecordUpdate();
			$this->SetSelectableLanguages();
			
			if($this->ValidateForSavingForAll()) {
				$this->saveaccepted = TRUE;
				if($this->PrepareRecordForSavingForAll()) {
					$this->savepreparedresults = TRUE;
					
					if($this->BackupOldRecord()) {
						if($this->SaveRecordFromQueryForUpdate()) {
							$this->FormatSavedRecordFromQueryForAll();
							if($this->DeleteChildRecordsForUpdate()) {
								
								$temporary_hyperlinked_record_list = $this->record_list;
								$temporary_hyperlinked_record_list[(count($temporary_hyperlinked_record_list) - 1)] = $this->entry;
								
								$get_hyperlinked_entry_view_args = [
									'entry'=>$this->entry,
									'entrylist'=>$temporary_hyperlinked_record_list,
									'scriptname'=>'view.php',
								];
								
								$matching_record_view_link = $this->GetHyperlinkedEntryView($get_hyperlinked_entry_view_args);
								
								$get_hyperlinked_entry_edit_args = [
									'entry'=>$this->entry,
									'entrylist'=>$temporary_hyperlinked_record_list,
									'scriptname'=>'modify.php?action=Edit',
								];
								
								$matching_record_edit_link = $this->GetHyperlinkedEntryView($get_hyperlinked_entry_edit_args);
								
								$this->saveattemptresults = TRUE;
								$this->save_status = 'Update successful.  You may see the result here, ' . $matching_record_view_link . '.  You may also edit this here, ' . $matching_record_edit_link . '.  Add another entry here: <a href="modify.php?action=Add">Add Entry</a>.';
							} else {
								$this->saveattemptresults = FALSE;
								$this->save_status = 'Update of old record(s) attempted, but failed.';
							}
						} else {
							$this->saveattemptresults = FALSE;
							$this->save_status = 'Update attempted, but failed.';
						}
					} else {
						$this->saveattemptresults = FALSE;
						$this->save_status = 'Update attempted, but failed while backing up the old record.';
					}
				} else {
					$this->savepreparedresults = FALSE;
					$this->save_status = 'Update was considered valid, but failed while preparing to save.';
				}
			} else {
				$this->saveaccepted = FALSE;
				$this->save_status = 'Update not attempted, because the input was invalid.';
			}
			
			$this->FormatErrors();
			
			return TRUE;
		}
		
						// Delete Entry
						// ---------------------------------------------
		
		public function Delete() {
			$this->SetOrmBasics();
			
			if(!$this->ValidateOrm()) {
				return FALSE;	# Causes 404
			}
			
			$this->delete_in_progress = 1;
			
			$this->OrderAndFillChildRecords();
			
			$this->save_status = 'Delete attempted.';
			
			if($this->DeleteChildRecordsForUpdate()) {
				$this->DeleteEntry();
				
				$this->save_status = 'Delete successful.  The information deleted is available below as a confirmation of what was deleted.';
				$this->saveattemptresults = TRUE;
			}
			
			return TRUE;
		}
		
						// Save Entry
						// ---------------------------------------------
		
		public function Save() {
			set_time_limit(60);
			$this->save_status = 'Save attempted.';
		
			$this->saveattempted = TRUE;
			
			if(!$this->orm) {
				$this->SetOrmBasics();
			}
			
			if(!$this->ValidateOrm()) {
				return FALSE;	# Trigger 404
			}
			
			if($this->entry) {
				$this->parent = $this->entry;
				unset($this->entry);
			}
			
			$this->SetRecordFromQueryForAll();
			$this->CleanseRecordFromQueryForAll();
			$this->SetSelectableLanguages();
			
			if($this->ValidateForSavingForAll()) {
				$this->saveaccepted = TRUE;
				if($this->PrepareRecordForSavingForAll()) {
					$this->savepreparedresults = TRUE;
					
					if($this->SaveRecordFromQueryForAll()) {
						$this->FormatSavedRecordFromQueryForAll();
						
						$record_list_to_link = $this->record_list;
						$record_list_to_link[] = $this->entry;
						
						$get_hyperlinked_entry_view_args = [
							entry=>$this->entry,
							entrylist=>$record_list_to_link,
							scriptname=>'view.php',
						];
						
						$matching_record_view_link = $this->GetHyperlinkedEntryView($get_hyperlinked_entry_view_args);
						
						$get_hyperlinked_entry_edit_args = [
							entry=>$this->entry,
							entrylist=>$record_list_to_link,
							scriptname=>'modify.php?action=Edit',
						];
						
						$matching_record_edit_link = $this->GetHyperlinkedEntryView($get_hyperlinked_entry_edit_args);
						
					#	print("<PRE>");
					#	print_r($record_list_to_link);
					#	print("</PRE>");
						
						$this->saveattemptresults = TRUE;
						$this->save_status = 'Save successful.  You may see the result here, ' . $matching_record_view_link . '.  You may also edit this here, ' . $matching_record_edit_link . '.  Add another entry here: <a href="modify.php?action=Add">Add Entry</a>.';
					} else {
						$this->saveattemptresults = FALSE;
						$this->save_status = 'Save attempted, but failed.';
					}
				} else {
					$this->savepreparedresults = FALSE;
					$this->save_status = 'Save was considered valid, but failed while preparing to save.';
				}
			} else {
				$this->saveaccepted = FALSE;
				$this->save_status = 'Save not attempted, because the input was invalid.';
			}
			
			$this->FormatErrors();
			
			return TRUE;
		}
		
						// Save Entry ~ 'For All' Helpers
						// ---------------------------------------------
		
		public function SetRecordFromQueryForAll() {
			$set_results = TRUE;
			
			if(!$this->SetRecordFromQuery_Entry()) {
				$set_results = FALSE;
			}
			
			if(!$this->SetRecordFromQuery_EntryTranslation()) {
				$set_results = FALSE;
			}
			
			if(!$this->SetRecordFromQuery_Description()) {
				$set_results = FALSE;
			}
			
			if(!$this->SetRecordFromQuery_Quote()) {
				$set_results = FALSE;
			}
			
			if(!$this->SetRecordFromQuery_TextBody()) {
				$set_results = FALSE;
			}
			
			if(!$this->SetRecordFromQuery_Image()) {
				$set_results = FALSE;
			}
			
			if(!$this->SetRecordFromQuery_ImageTranslation()) {
				$set_results = FALSE;
			}
			
			if(!$this->SetRecordFromQuery_Tag()) {
				$set_results = FALSE;
			}
			
			if(!$this->SetRecordFromQuery_Link()) {
				$set_results = FALSE;
			}
			
			if(!$this->SetRecordFromQuery_EventDate()) {
				$set_results = FALSE;
			}
			
			if(!$this->SetRecordFromQuery_Association()) {
				$set_results = FALSE;
			}
			
			if(!$this->SetRecordFromQuery_AvailabilityDates()) {
				$set_results = FALSE;
			}
			
			if(!$this->SetRecordFromQuery_Definition()) {
				$set_results = FALSE;
			}
			
			return $set_results;
		}
		
		public function CleanseRecordFromQueryForAll() {
			$cleanse_results = TRUE;
			
			if(!$this->CleanseRecordFromQuery_Entry()) {
				$cleanse_results = FALSE;
			}
			
			if(!$this->CleanseRecordFromQuery_EntryTranslation()) {
				$cleanse_results = FALSE;
			}
			
			if(!$this->CleanseRecordFromQuery_Description()) {
				$cleanse_results = FALSE;
			}
			
			if(!$this->CleanseRecordFromQuery_Quote()) {
				$cleanse_results = FALSE;
			}
			
			if(!$this->CleanseRecordFromQuery_TextBody()) {
				$cleanse_results = FALSE;
			}
			
			if(!$this->CleanseRecordFromQuery_Image()) {
				$cleanse_results = FALSE;
			}
			
			if(!$this->CleanseRecordFromQuery_ImageTranslation()) {
				$cleanse_results = FALSE;
			}
			
			if(!$this->CleanseRecordFromQuery_Tag()) {
				$cleanse_results = FALSE;
			}
			
			if(!$this->CleanseRecordFromQuery_Link()) {
				$cleanse_results = FALSE;
			}
			
			if(!$this->CleanseRecordFromQuery_EventDate()) {
				$cleanse_results = FALSE;
			}
			
			if(!$this->CleanseRecordFromQuery_Association()) {
				$cleanse_results = FALSE;
			}
			
			if(!$this->CleanseRecordFromQuery_AvailabilityDates()) {
				$cleanse_results = FALSE;
			}
			
			if(!$this->CleanseRecordFromQuery_EntryPermission()) {
				$cleanse_results = FALSE;
			}
			
			if(!$this->CleanseRecordFromQuery_Definition()) {
				$cleanse_results = FALSE;
			}
			
			return $cleanse_results;
		}
		
		public function ValidateForSavingForAll() {
			$save_results = TRUE;
			
			if(!$this->ValidateRecordForSaving_Entry()) {
				$save_results = FALSE;
			}
			
			if(!$this->ValidateRecordForSaving_EntryTranslation()) {
				$save_results = FALSE;
			}
			
			if(!$this->ValidateRecordForSaving_Description()) {
				$save_results = FALSE;
			}
			
			if(!$this->ValidateRecordForSaving_Quote()) {
				$save_results = FALSE;
			}
			
			if(!$this->ValidateRecordForSaving_TextBody()) {
				$save_results = FALSE;
			}
			
			if(!$this->ValidateRecordForSaving_Image()) {
				$save_results = FALSE;
			}
			
			if(!$this->ValidateRecordForSaving_ImageTranslation()) {
				$save_results = FALSE;
			}
			
			if(!$this->ValidateRecordForSaving_Tag()) {
				$save_results = FALSE;
			}
			
			if(!$this->ValidateRecordForSaving_Link()) {
				$save_results = FALSE;
			}
			
			if(!$this->ValidateRecordForSaving_EventDate()) {
				$save_results = FALSE;
			}
			
			if(!$this->ValidateRecordForSaving_Association()) {
				$save_results = FALSE;
			}
			
			if(!$this->ValidateRecordForSaving_AvailabilityDates()) {
				$save_results = FALSE;
			}
			
			if(!$this->ValidateRecordForSaving_Assignment()) {
				$save_results = FALSE;
			}
			
			if(!$this->ValidateRecordForSaving_EntryPermission()) {
				$save_results = FALSE;
			}
			
			if(!$this->ValidateRecordForSaving_Definition()) {
				$save_results = FALSE;
			}
			
			return $save_results;
		}
		
		public function PrepareRecordForSavingForAll() {
			$prepare_results = TRUE;
			
			if(!$this->PrepareRecordForSaving_Entry()) {
				$prepare_results = FALSE;
			}
			
			if(!$this->PrepareRecordForSaving_EntryTranslation()) {
				$prepare_results = FALSE;
			}
			
			if(!$this->PrepareRecordForSaving_Description()) {
				$prepare_results = FALSE;
			}
			
			if(!$this->PrepareRecordForSaving_Quote()) {
				$prepare_results = FALSE;
			}
			
			if(!$this->PrepareRecordForSaving_TextBody()) {
				$prepare_results = FALSE;
			}
			
			if(!$this->PrepareRecordForSaving_Image()) {
				$prepare_results = FALSE;
			}
			
			if(!$this->PrepareRecordForSaving_ImageTranslation()) {
				$prepare_results = FALSE;
			}
			
			if(!$this->PrepareRecordForSaving_Tag()) {
				$prepare_results = FALSE;
			}
			
			if(!$this->PrepareRecordForSaving_Link()) {
				$prepare_results = FALSE;
			}
			
			if(!$this->PrepareRecordForSaving_EventDate()) {
				$prepare_results = FALSE;
			}
			
			if(!$this->PrepareRecordForSaving_Association()) {
				$prepare_results = FALSE;
			}
			
			if(!$this->PrepareRecordForSaving_AvailabilityDates()) {
				$prepare_results = FALSE;
			}
			
			if(!$this->PrepareRecordForSaving_Assignment()) {
				$prepare_results = FALSE;
			}
			
			if(!$this->PrepareRecordForSaving_EntryPermission()) {
				$prepare_results = FALSE;
			}
			
			if(!$this->PrepareRecordForSaving_Definition()) {
				$prepare_results = FALSE;
			}
			
			return $prepare_results;
		}
		
		public function RealignEntryIDsForRecordUpdate() {
			$realign_results = TRUE;
			
			$child_record_types = $this->GetChildRecordTypes();
			
			foreach($child_record_types as $child_record_type) {
				$child_record_type_unset = $child_record_type . '_unset';
				$new_child_record_types = [];
				
				$child_record_index = 0;
				$unset_child_records = $this->$child_record_type_unset;
				$child_records = $this->$child_record_type;
				
				foreach($child_records as $child_record) {
					$unset_child_record_version = $unset_child_records[$child_record_index];
					$child_record['id'] = $unset_child_record_version['id'];
					$child_record_index++;
					$new_child_record_types[] = $child_record;
				}
				
				$this->$child_record_type = $new_child_record_types;
			}
			
			return $realign_results;
		}
		
		public function SaveRecordFromQueryForAll() {
			$save_results = TRUE;
			
			if(!$this->SaveRecordFromQuery_Entry()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Entry.'];
			}
			
			if(!$this->SaveRecordFromQuery_EntryTranslation()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Entry Translation.'];
			}
			
			if(!$this->SaveRecordFromQuery_Description()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Description.'];
			}
			
			if(!$this->SaveRecordFromQuery_Quote()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Quote.'];
			}
			
			if(!$this->SaveRecordFromQuery_TextBody()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Text Body.'];
			}
			
			if(!$this->SaveRecordFromQuery_Image()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Image.'];
			}
			
			if(!$this->SaveRecordFromQuery_ImageTranslation()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Image Translation.'];
			}
			
			if(!$this->SaveRecordFromQuery_Tag()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Tag.'];
			}
			
			if(!$this->SaveRecordFromQuery_Link()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Link.'];
			}
			
			if(!$this->SaveRecordFromQuery_EventDate()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Event Date.'];
			}
			
			if(!$this->SaveRecordFromQuery_AvailabilityDates()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Availability Date Range.'];
			}
			
			if(!$this->SaveRecordFromQuery_Association()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Association.'];
			}
			
			if(!$this->SaveRecordFromQuery_Assignment()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Assignment.'];
			}
			
			if(!$this->SaveRecordFromQuery_EntryPermission()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the User Permission.'];
			}
			
			if(!$this->SaveRecordFromQuery_Definition()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Definition.'];
			}
			
			return $save_results;
		}
		
		public function GetRecordTypes() {
			$record_types = array_merge(['Entry'=>'entry'], $this->GetStandardChildRecordTypes());
			
			return $record_types;
		}
		
		public function BackupOldRecord() {
			$entry = $this->entry;
			$backup_record = $this->entry_unset;
			
		#	print("BT: backup old record!");
			
		##	print_r($this->entry_unset['image']);
			
	#		print("<BR><BR>");
	#		print_r($this->entry);
			
			$child_record_types = $this->GetRecordTypes();
			$primary_record_fields = $this->GetRecordsPrimaryFields();
			
		//	print_r($primary_record_fields);
			/*
			$fields = $primary_record_fields['Entry'];
			$changed_records = $this->DetectChangedRecords([
				'recordtype'=>'Entry',
				'records'=>[$backup_record],
				'fields'=>$fields,
			]);
			
		#	print_r($backup_record);
			
			print("BT: CHANGES COUNT???Entry:::" . (count($changed_records)) . "|<BR><BR>");
			*/
			#print("<PRE>");
			#print_r($changed_records);
			#print("</PRE>");
			
			foreach($child_record_types as $formal_type => $child_record_type) {
			//	print("<BR>");
			//	print("BT: RECORD!" . $formal_type . "<BR><BR>");
				$records = $this->entry_unset[$child_record_type];
				if($child_record_type == 'entry') {
				//	print_r($this->entry_unset);
					$records = [$this->entry_unset];
				}
				$fields = $primary_record_fields[$formal_type];
			//	print("BT: RECORD COUNT!" . count($records) . "<BR><BR>");
				
				$changed_records = $this->DetectChangedRecords([
					'recordtype'=>$child_record_type,
					'records'=>$records,
					'fields'=>$fields,
				]);
				
			#	print("BT: CHANGES COUNT???" . $child_record_type . ":::" . (count($changed_records)) . "|<BR><BR>");
				
				#if($child_record_type == 'entry') {
				#	print("BT: CHANGES COUNT???" . $child_record_type . ":::" . (count($changed_records)) . "|<BR><BR>");
				#		print_r($this->entry_unset['Title']);
				#		print(' ------- ');
				#		print_r($this->entry_unset['id']);
					#print_r($fields);
				#	print_r($changed_records);
				#}
				
				$changed_records_count = count($changed_records);
				
				if($changed_records_count > 0) {
				#	print("BT: CHANGES!" . $formal_type . ' ::: ' . $changed_records_count . "<BR><BR>");
					
					for($i = 0; $i < $changed_records_count; $i++) {
						$changed_record = $changed_records[$i];
						$conflicting_field = $changed_record['conflictingfield'];
						
					//	print("BT: OLD VALUE TO BACKUP!" . $formal_type . ' - ' . $conflicting_field . ':::' . $changed_record[$conflicting_field] . "|<BR><BR>");
						$backup_insert_args = [
							'type'=>'RecordChange',
							'definition'=>[
								'Entryid'=>$entry['id'],
								'Userid'=>$this->authentication_object->user_session['id'],
								'RecordField'=>$conflicting_field,
								'Recordid'=>$changed_record['id'],
								'RecordType'=>$formal_type,
								'OldValue'=>$changed_record[$conflicting_field],
							],
						];
						
						$backup = $this->db_access_object->CreateRecord($backup_insert_args);
					}
				}
				
			//	print_r($fields);
				
				//foreach($records as $record) {
				//	print_r(array_keys($record));
				//	print("<BR>");
				//}
			}
			
		#	print("<PRE>");
		#	print_r($backup_record);
		#	print("</PRE>");
			
			return TRUE;
		}
		
		public function DetectChangedRecords($args) {
			$record_type = $args['recordtype'];
			$old_records = $args['records'];
			$fields = $args['fields'];
			
			$record_count = count($old_records);
			
			$record_type_lc = strtolower($record_type);
			$new_records = $this->$record_type_lc;
			
			if($new_records['id']) {
				$new_records = [$new_records];
			}
			
			$new_record_count = count($new_records);
			
			if($record_count == 0 && $new_record_count == 0) {
				return [];
			}
			
			$fields_count = count($fields);
			
			$old_record_data = [];
			$new_record_data = [];
			
			foreach($old_records as $old_record) {
				$old_record_data[$old_record['id']] = $old_record;
			}
			
			foreach($new_records as $new_record) {
				$new_record_data[$new_record['id']] = $new_record;
			}
			
			$conflicts = [];
			
			foreach($old_record_data as $old_record_id => $old_record) {
				$comparable_record = $new_record_data[$old_record_id];
				
				if($old_record['id'] >= 1) {
					if(!$comparable_record) {
						$conflicts[$old_record['id']] = $old_record;
					} else {
						for($i = 0; $i < $fields_count; $i++) {
							$field = $fields[$i];
							
							if($old_record[$field] != $comparable_record[$field]) {
								$old_record['conflictingfield'] = $field;
								$conflicts[] = $old_record;
							}
						}
					}
				}
			}
			
			return $conflicts;
		}
		
		public function GetRecordsPrimaryFields() {
			return [
				'Entry'=>['Title'],
				'EntryTranslation'=>['Title'],
				'Description'=>['Description'],
				'Quote'=>['Quote'],
				'TextBody'=>['Text'],
				'Image'=>['Title'],
				'ImageTranslation'=>['Title'],
				'Tag'=>['Tag'],
				'Link'=>['URL'],
				'EventDate'=>['Title'],
				'Association'=>['Childid'],
		#		'AvailabilityDateRange'=>'',
				'Definition'=>['Term'],
			];
		}
		
		public function SaveRecordFromQueryForUpdate() {
			$save_results = TRUE;
			
			if(!$this->SaveRecordFromQuery_Entry()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Entry.'];
			}
			
			if(!$this->SaveRecordFromQuery_EntryTranslation()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Entry Translation.'];
			}
			
			if(!$this->SaveRecordFromQuery_Description()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Description.'];
			}
			
			if(!$this->SaveRecordFromQuery_Quote()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Quote.'];
			}
			
			if(!$this->SaveRecordFromQuery_TextBody()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Text Body.'];
			}
			
			if(!$this->SaveRecordFromQuery_Image()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Image.'];
			}
			
			if(!$this->SaveRecordFromQuery_ImageTranslation()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Image Translation.'];
			}
			
			if(!$this->SaveRecordFromQuery_Tag()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Tag.'];
			}
			
			if(!$this->SaveRecordFromQuery_Link()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Link.'];
			}
			
			if(!$this->SaveRecordFromQuery_EventDate()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Event Date.'];
			}
			
			if(!$this->SaveRecordFromQuery_AvailabilityDates()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Availability Date Range.'];
			}
			
			if(!$this->SaveRecordFromQuery_Association()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Association.'];
			}
			
			if(!$this->SaveRecordFromQuery_Definition()) {
				$save_results = FALSE;
				$this->errors[] = ['There was a problem with saving the Association.'];
			}
			
			return $save_results;
		}
		
		public function DeleteChildRecordsForUpdate() {
			$delete_child_record_results = TRUE;
			
			$child_record_types = $this->GetStandardChildRecordTypes();
			
			foreach($child_record_types as $child_record_index => $child_record_type) {
				$unformatted_saved_records = $this->$child_record_type;
				
				$records_to_delete = [];
				$record_ids_to_keep = [];
				
				if(is_array($unformatted_saved_records) && count($unformatted_saved_records) && !$this->delete_in_progress) {
					foreach($unformatted_saved_records as $unformatted_saved_record) {
						if($unformatted_saved_record && $unformatted_saved_record['id']) {
							$record_ids_to_keep[] = $unformatted_saved_record['id'];
						} else {
							$records_to_delete[] = $unformatted_saved_record;
						}
					}
					
					$delete_record_tree_args = [
						'parent'=>$this->entry,
						'recordtype'=>$child_record_index,
						'recordidstokeep'=>$record_ids_to_keep,
					];
					
					if(!$this->orm->DeleteChildRecords($delete_record_tree_args)) {
						die("Record delete error.");
					}
				} else {
					$delete_record_tree_args = [
						'parent'=>$this->entry,
						'recordtype'=>$child_record_index,
						'recordidstokeep'=>$record_ids_to_keep,
					];
					
					if(!$this->orm->DeleteChildRecords($delete_record_tree_args)) {
						die("Record delete error.");
					}
					
					$records_to_delete = $unformatted_saved_records;
				}
				
				if($child_record_type == 'image') {
					for($i = 0; $i < count($records_to_delete); $i++) {
						$record_to_delete = $records_to_delete[$i];
						
						if($record_to_delete && $record_to_delete['FileName']) {
						/*
							$uploaded_filename_pieces = explode(".", $record_to_delete['FileName']);
							
							$last_uploaded_filename_piece = $uploaded_filename_pieces[count($uploaded_filename_pieces) - 1];
							
							if(count($uploaded_filename_pieces) > 1)
							{
								unset($uploaded_filename_pieces[count($uploaded_filename_pieces) - 1]);
							}
							
							$uploaded_icon_filename = implode(".", $uploaded_filename_pieces) . '-icon.' . $last_uploaded_filename_piece;
						*/
							
							$original_image_location_pieces = str_split($record_to_delete['FileDirectory']);
							$dir_pieces = implode('/', $original_image_location_pieces);
							
							$image_file_location = 'image/' . $dir_pieces . '/' . $record_to_delete['FileName'];
							$icon_file_location = 'image/' . $dir_pieces . '/' . $record_to_delete['IconFileName'];
							
			//				$image_file_location = 'image/' . $record_to_delete['FileName'];
			//				$icon_file_location = 'image/' . $record_to_delete['IconFileName'];
							
						//	$icon_file_location = 'image/' . $uploaded_icon_filename;
							
							unlink($icon_file_location);
							unlink($image_file_location);
						}
					}
				}
			}
			
			return $delete_child_record_results;
		}
		
		public function FormatSavedRecordFromQueryForAll() {
			$format_results = TRUE;
			
			if(!$this->FormatSavedRecordFromQuery_Entry()) {
				$format_results = FALSE;
			}
			
			if(!$this->FormatSavedRecordFromQuery_EntryTranslation()) {
				$format_results = FALSE;
			}
			
			if(!$this->FormatSavedRecordFromQuery_Description()) {
				$format_results = FALSE;
			}
			
			if(!$this->FormatSavedRecordFromQuery_Quote()) {
				$format_results = FALSE;
			}
			
			if(!$this->FormatSavedRecordFromQuery_TextBody()) {
				$format_results = FALSE;
			}
			
			if(!$this->FormatSavedRecordFromQuery_Image()) {
				$format_results = FALSE;
			}
			
			if(!$this->FormatSavedRecordFromQuery_ImageTranslation()) {
				$format_results = FALSE;
			}
			
			if(!$this->FormatSavedRecordFromQuery_Tag()) {
				$format_results = FALSE;
			}
			
			if(!$this->FormatSavedRecordFromQuery_Link()) {
				$format_results = FALSE;
			}
			
			if(!$this->FormatSavedRecordFromQuery_EventDate()) {
				$format_results = FALSE;
			}
			
			if(!$this->FormatSavedRecordFromQuery_AvailabilityDates()) {
				$format_results = FALSE;
			}
			
			if(!$this->FormatSavedRecordFromQuery_EntryPermission()) {
				$format_results = FALSE;
			}
			
			if(!$this->FormatSavedRecordFromQuery_Definition()) {
				$format_results = FALSE;
			}
			
			return $format_results;
		}
		
						// Record Setting
						// ---------------------------------------------
		
		public function SetRecordFromQuery_Entry() {
			$this->entry_unset = $this->entry;
			$this->entry = [
				'Title'=>$this->Param('Title'),
				'Subtitle'=>$this->Param('Subtitle'),
				'ListTitle'=>$this->Param('ListTitle'),
				'ListTitleSortKey'=>$this->Param('ListTitleSortKey'),
				'Code'=>$this->Param('Code'),
				'ChildAdjective'=>$this->Param('ChildAdjective'),
				'ChildNoun'=>$this->Param('ChildNoun'),
				'ChildNounPlural'=>$this->Param('ChildNounPlural'),
			];
			
			if($this->entry_unset['id']) {
				$this->entry['id'] = $this->entry_unset['id'];
			}
			
			if(!$this->entry['Code']) {
				$this->entry['Code'] = $this->GenerateEntryCode();
			}
			
			return TRUE;
		}
		
		public function SetRecordFromQuery_EntryTranslation() {
			$this->entrytranslation_unset = $this->entrytranslation;
			
			$set_record_from_query_args = [
				'variablename'=>'entrytranslation',
				'objectdefinition'=>[
					'entrytranslation_Title',
					'entrytranslation_Subtitle',
					'entrytranslation_ListTitle',
					'entrytranslation_Language',
				],
			];
			
			return $this->SetRecordFromQuery($set_record_from_query_args);
		}
		
		public function SetRecordFromQuery_Description() {
			$this->description_unset = $this->description;
			$set_record_from_query_args = [
				'variablename'=>'description',
				'objectdefinition'=>[
					'Description',
					'description_Source',
					'description_Language',
				],
			];
			return $this->SetRecordFromQuery($set_record_from_query_args);
		}
		
		public function SetRecordFromQuery_Quote() {
			$this->quote_unset = $this->quote;
			$set_record_from_query_args = [
				'variablename'=>'quote',
				'objectdefinition'=>[
					'Quote',
					'quote_Source',
					'quote_Language',
				],
			];
			return $this->SetRecordFromQuery($set_record_from_query_args);
		}
		
		public function SetRecordFromQuery_TextBody() {
			$this->textbody_unset = $this->textbody;
			$set_record_from_query_args = [
				'variablename'=>'textbody',
				'objectdefinition'=>[
					'Text',
					'textbody_Source',
					'textbody_Language',
				],
			];
			return $this->SetRecordFromQuery($set_record_from_query_args);
		}
		
		public function SetRecordFromQuery_Image() {
			$this->image_unset = $this->image;
			
			$set_record_from_query_args = [
				'variablename'=>'image',
				'file'=>'Image',
				'objectdefinition'=>[
					'image_Title',
					'image_Description',
					'image_FileName',
				],
			];
			
			return $this->SetRecordFromQuery($set_record_from_query_args);
		}
		
		public function SetRecordFromQuery_ImageTranslation() {
			$this->imagetranslation_unset = $this->imagetranslation;
			
			$set_record_from_query_args = [
				'variablename'=>'imagetranslation',
				'objectdefinition'=>[
					'imagetranslation_Title',
					'imagetranslation_Description',
					'imagetranslation_FileName',
					'imagetranslation_Language',
				],
			];
			
			return $this->SetRecordFromQuery($set_record_from_query_args);
		}
		
		public function SetRecordFromQuery_Tag() {
			$this->tag_unset = $this->tag;
			$set_record_from_query_args = [
				'variablename'=>'tag',
				'objectdefinition'=>[
					'Tag',
					'tag_Language',
				],
			];
			return $this->SetRecordFromQuery($set_record_from_query_args);
		}
		
		public function SetRecordFromQuery_Link() {
			$this->link_unset = $this->link;
			$set_record_from_query_args = [
				'variablename'=>'link',
				'objectdefinition'=>[
					'link_Title',
					'URL',
					'link_Language',
				],
			];
			$this->SetRecordFromQuery($set_record_from_query_args);
		}
		
		public function SetRecordFromQuery_EventDate() {
			$this->eventdate_unset = $this->eventdate;
			$set_record_from_query_args = [
				'variablename'=>'eventdate',
				'objectdefinition'=>[
					'EventDate',
					'EventTime',
					'eventdate_Title',
					'eventdate_Description',
					'eventdate_Language',
				],
			];
			$this->SetRecordFromQuery($set_record_from_query_args);
		}
		
		public function SetRecordFromQuery_Association() {
			$this->association_unset = $this->association;
			$set_record_from_query_args = [
				'variablename'=>'association',
				'objectdefinition'=>[
					'ChosenEntryid',
					'association_Type',
					'association_SubType',
				],
			];
			$this->SetRecordFromQuery($set_record_from_query_args);
		}
		
		public function SetRecordFromQuery_AvailabilityDates() {
			$this->availabilitydaterange_unset = $this->availabilitydaterange;
			$set_record_from_query_args = [
				'variablename'=>'availabilitydaterange',
				'objectdefinition'=>[
					'AvailabilityStartDate',
					'AvailabilityStartTime',
					'AvailabilityEndDate',
					'AvailabilityEndTime',
				],
			];
			return $this->SetRecordFromQuery($set_record_from_query_args);
		}
		
		public function SetRecordFromQuery_Definition() {
			$this->definition_unset = $this->definition;
			$set_record_from_query_args = [
				'variablename'=>'definition',
				'objectdefinition'=>[
					'Term',
					'definition_Definition',
				],
			];
			return $this->SetRecordFromQuery($set_record_from_query_args);
		}
		
						// Record Cleansing
						// ---------------------------------------------
		
		public function CleanseRecordFromQuery_Entry() {
			$this->entry_original = $this->entry;
			$this->entry = [
				'Title'=>$this->entry_original['Title'],
				'Subtitle'=>$this->entry_original['Subtitle'],
				'ListTitle'=>$this->entry_original['ListTitle'],
				'ListTitleSortKey'=>$this->entry_original['ListTitleSortKey'],
				'Code'=>$this->entry_original['Code'],
				'ChildAdjective'=>$this->entry_original['ChildAdjective'],
				'ChildNoun'=>$this->entry_original['ChildNoun'],
				'ChildNounPlural'=>$this->entry_original['ChildNounPlural'],
			];
			
			if($this->entry_original['id']) {
				$this->entry['id'] = $this->entry_original['id'];
			}
			
			return TRUE;
		}
		
		public function CleanseRecordFromQuery_EntryTranslation() {
			$cleanse_record_from_query_args = [
				'variablename'=>'entrytranslation',
				'datastructure'=>[
					'Title',
					'Subtitle',
					'ListTitle',
					'Language',
				],
			];
			
			return $this->CleanseRecordFromQuery($cleanse_record_from_query_args);
		}
		
		public function CleanseRecordFromQuery_Description() {
			$cleanse_record_from_query_args = [
				'variablename'=>'description',
				'datastructure'=>[
					'Description',
					'Source',
					'Language',
				],
			];
			return $this->CleanseRecordFromQuery($cleanse_record_from_query_args);
		}
		
		public function CleanseRecordFromQuery_Quote() {
			$cleanse_record_from_query_args = [
				'variablename'=>'quote',
				'datastructure'=>[
					'Quote',
					'Source',
					'Language',
				],
			];
			return $this->CleanseRecordFromQuery($cleanse_record_from_query_args);
		}
		
		public function CleanseRecordFromQuery_TextBody() {
			$cleanse_record_from_query_args = [
				'variablename'=>'textbody',
				'datastructure'=>[
					'Text',
					'Source',
					'Language',
				],
			];
			return $this->CleanseRecordFromQuery($cleanse_record_from_query_args);
		}
		
		public function CleanseRecordFromQuery_Image() {
			$cleanse_record_from_query_args = [
				'variablename'=>'image',
				'datastructure'=>[
					'Title',
					'FileName',
					'Description',
				],
			];
			return $this->CleanseRecordFromQuery($cleanse_record_from_query_args);
		}
		
		public function CleanseRecordFromQuery_ImageTranslation() {
			$cleanse_record_from_query_args = [
				'variablename'=>'imagetranslation',
				'datastructure'=>[
					'Title',
					'FileName',
					'Description',
					'Language',
				],
			];
			return $this->CleanseRecordFromQuery($cleanse_record_from_query_args);
		}
		
		public function CleanseRecordFromQuery_Tag() {
			$cleanse_record_from_query_args = [
				'variablename'=>'tag',
				'datastructure'=>[
					'Tag',
					'Language',
				],
			];
			return $this->CleanseRecordFromQuery($cleanse_record_from_query_args);
		}
		
		public function CleanseRecordFromQuery_Link() {
			$cleanse_record_from_query_args = [
				'variablename'=>'link',
				'datastructure'=>[
					'Title',
					'URL',
					'Language',
				],
			];
			return $this->CleanseRecordFromQuery($cleanse_record_from_query_args);
		}
		
		public function CleanseRecordFromQuery_EventDate() {
			$cleanse_record_from_query_args = [
				'variablename'=>'eventdate',
				'datastructure'=>[
					'EventDate',
					'EventTime',
					'Title',
					'Description',
					'Language',
				],
			];
			return $this->CleanseRecordFromQuery($cleanse_record_from_query_args);
		}
		
		public function CleanseRecordFromQuery_Association() {
			$cleanse_record_from_query_args = [
				'variablename'=>'association',
				'datastructure'=>[
					'ChosenEntryid',
					'Type',
					'SubType',
				],
			];
			return $this->CleanseRecordFromQuery($cleanse_record_from_query_args);
		}
		
		public function CleanseRecordFromQuery_AvailabilityDates() {
			$cleanse_record_from_query_args = [
				'variablename'=>'availabilitydaterange',
				'datastructure'=>[
					'AvailabilityStartDate',
					'AvailabilityStartTime',
					'AvailabilityEndDate',
					'AvailabilityEndTime',
				],
			];
			return $this->CleanseRecordFromQuery($cleanse_record_from_query_args);
		}
		
		public function CleanseRecordFromQuery_Definition() {
			$cleanse_record_from_query_args = [
				'variablename'=>'definition',
				'datastructure'=>[
					'Term',
					'Definition',
				],
			];
			return $this->CleanseRecordFromQuery($cleanse_record_from_query_args);
		}
		
		public function CleanseRecordFromQuery_EntryPermission() {
			$entry_permission = [
				'Userid'=>$this->authentication_object->user_session['id'],
			];
			$entry_permissions = [
				$entry_permission,
			];
			
			return	$this->entrypermission =
				$this->entrypermission_unset =
				$this->entrypermission_unformatted =
				$entry_permissions;
		}
		
						// Record Validating
						// ---------------------------------------------
		
		public function ValidateRecordForSaving_Entry() {
			$validation_results = TRUE;
			
			if(!strlen($this->entry['Title'])) {
				$this->errors[] = ['You must enter a Title.'];
				$validation_results = FALSE;
			}
			
			if(!strlen($this->entry['Code'])) {
				$this->errors[] = ['You must enter a Code.'];
				$validation_results = FALSE;
			}
			
			if(strlen($this->entry['Title']) > 255) {
				$this->errors[] = ['The Title may not be longer than 255 characters.'];
				$validation_results = FALSE;
			}
			
			if(strlen($this->entry['Subtitle']) > 255) {
				$this->errors[] = ['The Subtitle may not be longer than 255 characters.'];
				$validation_results = FALSE;
			}
			
			if(strlen($this->entry['ListTitle']) > 255) {
				$this->errors[] = ['The ListTitle may not be longer than 255 characters.'];
				$validation_results = FALSE;
			}
			
			if(strlen($this->entry['ListTitleSortKey']) > 255) {
				$this->errors[] = ['The ListTitleSortkey may not be longer than 255 characters.'];
				$validation_results = FALSE;
			}
			
			if(strlen($this->entry['Code']) > 255) {
				$this->errors[] = ['The Code may not be longer than 255 characters.'];
				$validation_results = FALSE;
			}
			
			if(strlen($this->entry['ChildAdjective']) > 255) {
				$this->errors[] = ['The ChildAdjective may not be longer than 255 characters.'];
				$validation_results = FALSE;
			}
			
			if(strlen($this->entry['ChildNoun']) > 255) {
				$this->errors[] = ['The ChildNoun may not be longer than 255 characters.'];
				$validation_results = FALSE;
			}
			
			if(strlen($this->entry['ChildNounPlural']) > 255) {
				$this->errors[] = ['The ChildNounPlural may not be longer than 255 characters.'];
				$validation_results = FALSE;
			}
			
			if(
				$this->parent['id'] &&					// Is it a non-master record entry?
				!$this->ValidateRecordForSaving_Entry_Code()) {		// Is the code claimed by another entry?
				$check_record_results_count = count($this->check_record_results);
				$check_record_results_index = $check_record_results_count - 1;
				
				$get_hyperlinked_entry_view_args = [
					entry=>$this->check_record_results[$check_record_results_index],
					entrylist=>$this->check_record_results,
				];
				
				$matching_record_link = $this->GetHyperlinkedEntryView($get_hyperlinked_entry_view_args);
				
				$error_message = 'The Code you have entered is already in use by ' . $matching_record_link . '.';
				
				$this->errors[] = [$error_message];
				$validation_results = FALSE;
			}
			
			return $validation_results;
		}
		
		public function ValidateRecordForSaving_Entry_Code() {
			$record_list_to_check_code = $this->object_list;
			
			if($this->desired_action == 'Save') {
				$record_list_to_check_code[] = $this->entry['Code'];
			}
			
			$check_record_args = [
				'recordlist'=>$record_list_to_check_code,
				'availabilitylimit'=>1,
			];
			
			$duplicate_results = $this->CheckRecordTree($check_record_args);
			$results_count = count($duplicate_results);
			$results_index = $results_count - 1;
			
			$this->check_record_results = $duplicate_results;
			
			if(count($duplicate_results) && $duplicate_results[$results_index]['id'] != $this->entry['id']) {
				return FALSE;
			}
			
			return TRUE;
		}
		
		public function ValidateRecordForSaving_EntryTranslation() {
			$validation_results = TRUE;
			
			foreach($this->entrytranslation as $entry_translation) {
				if(strlen($this->entry_translation['Title']) > 255) {
					$this->errors[] = ['The Entry Translation\'s Title may not be longer than 255 characters.'];
					$validation_results = FALSE;
				}
				
				if(strlen($this->entry_translation['Subtitle']) > 255) {
					$this->errors[] = ['The Entry Translation\'s Subtitle may not be longer than 255 characters.'];
					$validation_results = FALSE;
				}
				
				if(strlen($this->entry_translation['ListTitle']) > 255) {
					$this->errors[] = ['The Entry Translation\'s ListTitle may not be longer than 255 characters.'];
					$validation_results = FALSE;
				}
			}
			
			return $validation_results;
		}
		
		public function ValidateRecordForSaving_Description() {
			$validation_results = TRUE;
			
			foreach($this->description as $description) {
				if(strlen($description['Description']) > 512) {
					$this->errors[] = ['The Description may not be longer than 512 characters.'];
					$validation_results = FALSE;
				}
				
				if(strlen($description['Source']) > 512) {
					$this->errors[] = ['The Description\'s Source may not be longer than 512 characters.'];
					$validation_results = FALSE;
				}
			}
			
			return $validation_results;
		}
		
		public function ValidateRecordForSaving_Quote() {
			$validation_results = TRUE;
			
			foreach($this->quote as $quote) {
				if(strlen($quote['Quote']) > 2048) {
					$this->errors[] = ['The Quote may not be longer than 2,048 characters.'];
					$validation_results = FALSE;
				}
				if(strlen($quote['Source']) > 1024) {
					$this->errors[] = ['The Quote\'s Source may not be longer than 1,024 characters.'];
					$validation_results = FALSE;
				}
			}
			
			return $validation_results;
		}
		
		public function ValidateRecordForSaving_TextBody() {
			$validation_results = TRUE;
			
			foreach($this->textbody as $textbody) {
				if(strlen($textbody['Source']) > 512) {
					$this->errors[] = ['The Text\'s Source may not be longer than 512 characters.'];
					$validation_results = FALSE;
				}
			}
			
			return $validation_results;
		}
		
		public function ValidateRecordForSaving_Image() {
			$validation_results = TRUE;
			
			$i = 0;
			
			foreach ($this->image as $image) {
				$file = $this->image_files[$i];
				$original_image = $this->image_unset[$i];
				$i++;
				
				$validation_results = $this->ValidateSingleImage([
					'image'=>$image,
					'entrytype'=>'Image',
					'validationresults'=>$validation_results,
				]);
				
				if($file['name']) {	// New File Upload
					$new_file_location = 'image/' . $image['FileName'];
					$new_icon_file_location = 'image/' . $file['icon_name'];
					$new_standard_file_location = 'image/' . $file['standard_name'];
					
					if($image['FileName'] != $original_image['FileName']) {
						$taken_file_names = [];
						
						if(is_file($new_file_location)) {
							$taken_file_names[] = $new_file_location;
						}
						
						if(is_file($new_icon_file_location)) {
							$taken_file_names[] = $new_icon_file_location;
						}
						
						if(is_file($new_standard_file_location)) {
							$taken_file_names[] = $new_icon_file_location;
						}
						
						if(count($taken_file_names)) {
							$this->errors[] = ['The filename (' . implode(', ', $taken_file_names) . ') is taken.  Please choose another filename.'];
							$validation_results = FALSE;
						}
					}
				} else {
					if($image['FileName'] != $original_image['FileName']) {		// Rename/Move Old File Upload
						$uploaded_filename_pieces = explode(".", $image['FileName']);
						
						$last_uploaded_filename_piece = $uploaded_filename_pieces[count($selected_filename_pieces) - 1];
						
						if(count($uploaded_filename_pieces) > 1) {
							unset($uploaded_filename_pieces[count($selected_filename_pieces) - 1]);
						}
						
						$uploaded_icon_filename = implode(".", $uploaded_filename_pieces) . '-icon.' . $last_uploaded_filename_piece;
						$uploaded_standard_filename = implode(".", $uploaded_filename_pieces) . '-standard.' . $last_uploaded_filename_piece;
						
						$new_file_location = 'image/' . $image['FileName'];
						$new_icon_file_location = 'image/' . $uploaded_icon_filename;
						$new_standard_file_location = 'image/' . $uploaded_standard_filename;
						
						$taken_file_names = [];
						
						if(is_file($new_file_location)) {
							$taken_file_names[] = $new_file_location;
						}
						
						if(is_file($new_icon_file_location)) {
							$taken_file_names[] = $new_icon_file_location;
						}
						
						if(is_file($new_standard_file_location)) {
							$taken_file_names[] = $new_standard_file_location;
						}
						
						if(count($taken_file_names)) {
							$this->errors[] = ['The filename (' . implode(', ', $taken_file_names) . ') is taken.  Please choose another filename.'];
							$validation_results = FALSE;
						}
					}
				}
			}
			
			return $validation_results;
		}
		
		public function ValidateRecordForSaving_ImageTranslation() {
			$validation_results = TRUE;
			
			foreach ($this->imagetranslation as $image_translation) {
				$validation_results = $this->ValidateSingleImage([
					'image'=>$image_translation,
					'entrytype'=>'Image Translation',
					'validationresults'=>$validation_results,
				]);
			}
			
			return $validation_results;
		}
		
		public function ValidateSingleImage($args) {
			$image = $args['image'];
			$entry_type = $args['entrytype'];
			$validation_results = $args['validationresults'];
			
			if(strlen($image['Title']) > 255) {
				$this->errors[] = [$entry_type . ' Titles may not be longer than 255 characters.'];
				$validation_results = FALSE;
			}
			
			if(strlen($image['Description']) > 1023) {
				$this->errors[] = [$entry_type . ' Descriptions may not be longer than 1,023 characters.'];
				$validation_results = FALSE;
			}
			
			if(strlen($image['FileName']) > 255) {
				$this->errors[] = [$entry_type . ' FileNames may not be longer than 255 characters.'];
				$validation_results = FALSE;
			}
			
			if(preg_match('/advert/i', $image['FileName'])) {
				$this->errors[] = [$entry_type . ' FileNames may not contain the text "advert", because they may cause them to be blocked by ad-blocking software.'];
				$validation_results = FALSE;
			}
			
			if(preg_match('/%/i', $image['FileName'])) {
				$this->errors[] = [$entry_type . ' FileNames may not contain the "%" character, as this character is reserved as an escape character for http URLs (i.e., "%20" is a space, " ", etc.).'];
				$validation_results = FALSE;
			}
			
			return $validation_results;
		}
		
		public function ValidateRecordForSaving_Tag() {
			$validation_results = TRUE;
			
			foreach ($this->tag as $tag) {
				if(strlen($tag['Tag']) > 255) {
					$this->errors[] = ['Tags may not be longer than 255 characters.'];
					$validation_results = FALSE;
				}
			}
			
			return $validation_results;
		}
		
		public function ValidateRecordForSaving_Link() {
			$validation_results = TRUE;
			
			foreach ($this->link as $link) {
				if(strlen($link['link_Title']) > 255) {
					$this->errors[] = ['Link Titles may not be longer than 255 characters.'];
					$validation_results = FALSE;
				}
				
				if(strlen($link['URL']) > 255) {
					$this->errors[] = ['URLs may not be longer than 255 characters.'];
					$validation_results = FALSE;
				}
			}
			
			return $validation_results;
		}
		
		public function ValidateRecordForSaving_EventDate() {
			$validation_results = TRUE;
			
			foreach ($this->eventdate as $eventdate) {
				if(strlen($eventdate['eventdate_Title']) > 255) {
					$this->errors[] = ['Event Date Titles may not be longer than 255 characters.'];
					$validation_results = FALSE;
				}
				
				if(strlen($eventdate['eventdate_Description']) > 255) {
					$this->errors[] = ['Event Date Descriptions may not be longer than 255 characters.'];
					$validation_results = FALSE;
				}
			}
			
			return $validation_results;
		}
		
		public function ValidateRecordForSaving_Association() {
			$validation_results = TRUE;
			
			foreach ($this->association as $association) {
				if(strlen($association['Type']) > 255) {
					$this->errors[] = ['Association Types may not be longer than 255 characters.'];
					$validation_results = FALSE;
				}
				
				if(strlen($association['SubType']) > 255) {
					$this->errors[] = ['Association SubTypes may not be longer than 255 characters.'];
					$validation_results = FALSE;
				}
			}
			
			return $validation_results;
		}
		
		public function ValidateRecordForSaving_AvailabilityDates() {
			return TRUE;
		}
		
		public function ValidateRecordForSaving_Assignment() {
			return TRUE;
		}
		
		public function ValidateRecordForSaving_EntryPermission() {
			$userid = $this->authentication_object->user_session['id'];
			
			$useridintval = intval($userid);
			if(!(strlen($userid)) || ($useridintval !== $userid)) {
				$this->errors[] = ['You may only save information if you are logged in, which you may do here: ' . $this->GetLoginURL() . '.'];
				return FALSE;
			}
			
			return TRUE;
		}
		
		public function ValidateRecordForSaving_Definition() {
			$validation_results = TRUE;
			
			foreach ($this->definition as $definition) {
				if(strlen($definition['Term']) > 255) {
					$this->errors[] = ['Definition Terms may not be longer than 255 characters.'];
					$validation_results = FALSE;
				}
			}
			
			return $validation_results;
		}
		
						// Record Preparing
						// ---------------------------------------------
		
		public function PrepareRecordForSaving_Entry() {
			$this->entry_unprepared = $this->entry;
			
			if(!strlen($this->entry['ListTitle'])) {
				$this->entry['ListTitle'] = $this->GenerateEntryListTitle([]);
			}
			
			if(	!$this->parent['id'] &&			// Is it a new master record?
				$this->master_record['id'] &&		// Do we already have a master record?
				$this->desired_action != 'Update')	// Is it a non-new-record-creating action?
			{
				$this->errors[] = ['You may presently only have one master entry record.'];	// Then don't save it.
				return FALSE;
			}
			
			return TRUE;
		}
		
		public function PrepareRecordForSaving_EntryTranslation() {
			return TRUE;
		}
		
		public function PrepareRecordForSaving_Description() {
			return TRUE;
		}
		
		public function PrepareRecordForSaving_Quote() {
			return TRUE;
		}
		
		public function PrepareRecordForSaving_TextBody() {
			$this->textbody_unprepared = $this->textbody;
			$new_textbodies = [];
			
			$strip_urls = $this->Param('textbody_StripURLs');
			$americanize_vocabularies = $this->Param('textbody_AmericanizeVocabulary');
			$american_british_spellings = 0;
			$index = 0;
			
			foreach($this->textbody as $textbody) {
				if($textbody['Text']) {
					$strip_url = $strip_urls[$index];
					$americanize_vocabulary = $americanize_vocabularies[$index];
					
					$dom = new DOMDocument;
					try {
						@$dom->loadHTML(mb_convert_encoding($textbody['Text'], 'HTML-ENTITIES', 'UTF-8'));
					} catch (Exception $e) {
						
					}
					
					$xpath = new DOMXPath($dom);
					$nodes = $xpath->query('//@*');
					
					if($strip_url) {
						foreach ($nodes as $node_key => $node) {
							if(
								!($node->parentNode->tagName == 'img' && $node->nodeName == 'src') &&
								!($node->parentNode->tagName == 'div' && $node->nodeName == 'class') &&
								!($node->parentNode->tagName == 'img' && $node->nodeName == 'class') &&
								!($node->parentNode->tagName == 'img' && $node->nodeName == 'alt') &&
								!($node->parentNode->tagName == 'div' && $node->nodeName == 'title')
							)
							{
								$node->parentNode->removeAttribute($node->nodeName);
							}
						}
					} else {
						foreach ($nodes as $node_key => $node) {
							if(
								!($node->parentNode->tagName == 'a' && $node->nodeName == 'href') &&
								!($node->parentNode->tagName == 'a' && $node->nodeName == 'name') &&
								!($node->parentNode->tagName == 'img' && $node->nodeName == 'src') &&
								!($node->parentNode->tagName == 'div' && $node->nodeName == 'class') &&
								!($node->parentNode->tagName == 'img' && $node->nodeName == 'class') &&
								!($node->parentNode->tagName == 'img' && $node->nodeName == 'alt') &&
								!($node->parentNode->tagName == 'div' && $node->nodeName == 'title')
							)
							{
								$node->parentNode->removeAttribute($node->nodeName);
							}
						}
					}
					
					/*
					$nodes = $xpath->query('//tt');
				#	foreach ($dom->getElementsByTagName('tt') as $dom_piece)
					foreach ($nodes as $node_key => $node)
					{
						$node_children = $xpath->query('//@*', $node);
						
						foreach($node_children as $node_child)
						{
							$node->parentNode->parentNode->appendChild($node_child);
						}
						$node->parentNode->removeChild($node);
						#$node->parentNode->replaceChild(, $node);
				#		$dom_piece->parentNode->removeChild($dom_piece);
					}
					
				#	print_r($dom);
					*/
					#print_r($dom->saveHTML());
					$textbody['Text'] = preg_replace('/^<!DOCTYPE.+?>/', '', str_replace( array('<html>', '</html>', '<body>', '</body>'), array('', '', '', ''),$dom->saveHTML()));
				#	print_r($textbody['Text']);
					$textbody['WordCount'] = str_word_count(strip_tags($textbody['Text']));
					$textbody['CharacterCount'] = strlen($textbody['Text']);
					
					$textbody['Text'] = preg_replace("/<tt>/i", "", $textbody['Text']);
					$textbody['Text'] = preg_replace("/<\/tt>/i", "", $textbody['Text']);
					
					$textbody['Text'] = preg_replace("/<span>/i", "", $textbody['Text']);
					$textbody['Text'] = preg_replace("/<\/span>/i", "", $textbody['Text']);
					
					$textbody['Text'] = preg_replace("/<div>/i", "<p>", $textbody['Text']);
					$textbody['Text'] = preg_replace("/<\/div>/i", "</p>", $textbody['Text']);
					
					if($americanize_vocabulary) {
						if(!$american_british_spellings) {
							require('../classes/Language/AmericanBritishSpellings.php');
							$american_british_spellings = new AmericanBritishSpellings();
						}
						
						$textbody['Text'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$textbody['Text']]);
					}
				}
				
				$new_textbodies[] = $textbody;
				$index++;
			}
			
			return $this->textbody = $new_textbodies;
		}
		
		public function PrepareRecordForSaving_Image() {
			return TRUE;
		}
		
		public function PrepareRecordForSaving_ImageTranslation() {
			return TRUE;
		}
		
		public function PrepareRecordForSaving_Tag() {
			return TRUE;
		}
		
		public function PrepareRecordForSaving_Link() {
			return TRUE;
		}
		
		public function PrepareRecordForSaving_EventDate() {
			$this->eventdate_unprepared = $this->eventdate;
			
			$new_event_dates = [];
			
			foreach($this->eventdate as $eventdate) {
				$eventdate['EventDateTime'] = $eventdate['EventDate'];
				
				$event_date_pieces = explode('-', $eventdate['EventDate']);
				
				if(count($event_date_pieces) == 1) {
					$eventdate['EventDateTime'] .= '-00-00';
				} elseif(count($event_date_pieces) == 2) {
					$eventdate['EventDateTime'] .= '-00';
				}
				
				if($eventdate['EventTime']) {
					$eventdate['EventDateTime'] .= ' ' . date("H:i:00", strtotime($eventdate['EventTime']));
				} else {
					$eventdate['EventDateTime'] .= ' ' . '00:00:00';
				}
				
				unset($eventdate['EventDate']);
				unset($eventdate['EventTime']);
				
				$new_event_dates[] = $eventdate;
			}
			
			return $this->eventdate = $new_event_dates;
		}
		
		public function PrepareRecordForSaving_Association() {
			return TRUE;
		}
		
		public function PrepareRecordForSaving_AvailabilityDates() {
			$this->availabilitydaterange_unprepared = $this->availabilitydaterange;
			
			$new_availability_date_ranges = [];
			
			foreach($this->availabilitydaterange as $availabilitydaterange) {
				$availabilitydaterange['AvailabilityStart'] = $availabilitydaterange['AvailabilityStartDate'];
				
				if($availabilitydaterange['AvailabilityStartTime']) {
					$availabilitydaterange['AvailabilityStart'] .= ' ' . date("H:i:00", strtotime($availabilitydaterange['AvailabilityStartTime']));
				} else {
					$availabilitydaterange['AvailabilityStart'] .= ' ' . '00:00:00';
				}
				
				$availabilitydaterange['AvailabilityEnd'] = $availabilitydaterange['AvailabilityEndDate'];
				
				if($availabilitydaterange['AvailabilityEndTime']) {
					$availabilitydaterange['AvailabilityEnd'] .= ' ' . date("H:i:00", strtotime($availabilitydaterange['AvailabilityEndTime']));
				} else {
					$availabilitydaterange['AvailabilityEnd'] .= ' ' . '00:00:00';
				}
				
				unset($availabilitydaterange['AvailabilityStartDate']);
				unset($availabilitydaterange['AvailabilityStartTime']);
				unset($availabilitydaterange['AvailabilityEndDate']);
				unset($availabilitydaterange['AvailabilityEndTime']);
				
				$new_availability_date_ranges[] = $availabilitydaterange;
			}
			
			return $this->availabilitydaterange = $new_availability_date_ranges;
		}
		
		public function PrepareRecordForSaving_Assignment() {
			$this->assignment = [];
			
			if($this->desired_action == 'Save' && $this->entry['id']) {
				$this->assignment['Parentid'] = $this->entry['id'];
			} elseif($this->parent['id']) {		// Populate Parentid if it's a non-master record?
				$this->assignment['Parentid'] = $this->parent['id'];
			}
			
			return TRUE;
		}
		
		public function PrepareRecordForSaving_EntryPermission() {
			return TRUE;
		}
		
		public function PrepareRecordForSaving_Definition() {
			return TRUE;
		}
		
						// Record Saving
						// ---------------------------------------------
		
		public function SaveRecordFromQuery_Entry() {
			$this->entry_unsaved = $this->entry;
			
			$entry = $this->entry;
			
		#	print("BT: SaveRecordFromQuery_Entry().");
		#	print("<PRE>");
		#	print_r($entry);
		#	print("</PRE>");
			
			if($entry['id']) {			// Update Old Entry Record
				$entry_update_args = [
					'type'=>'Entry',
					'update'=>$entry,
					'where'=>[
						'id'=>$entry['id'],
					],
				];
				
				return $this->entry = $this->db_access_object->UpdateRecord($entry_update_args)[0];
			} else {					// Create New Entry Record
				$entry_insert_args = [
					'type'=>'Entry',
					'definition'=>$this->entry,
				];
				
				return $this->entry = $this->db_access_object->CreateRecord($entry_insert_args);
			}
		}
		
		public function SaveRecordFromQuery_EntryTranslation() {
			$save_record_from_query_args = [
				'objectname'=>'entrytranslation',
				'objecttype'=>'EntryTranslation',
			];
			
			return $this->SaveRecordFromQuery_Base($save_record_from_query_args);
		}
		
		public function SaveRecordFromQuery_Description() {
			$save_record_from_query_args = [
				'objectname'=>'description',
				'objecttype'=>'Description',
			];
			
			return $this->SaveRecordFromQuery_Base($save_record_from_query_args);
		}
		
		public function SaveRecordFromQuery_Quote() {
			$save_record_from_query_args = [
				'objectname'=>'quote',
				'objecttype'=>'Quote',
			];
			
			return $this->SaveRecordFromQuery_Base($save_record_from_query_args);
		}
		
		public function SaveRecordFromQuery_TextBody() {
			$save_record_from_query_args = [
				'objectname'=>'textbody',
				'objecttype'=>'TextBody',
			];
			
			return $this->SaveRecordFromQuery_Base($save_record_from_query_args);
		}
		
		public function SaveRecordFromQuery_Image() {
			$save_record_from_query_args = [
				'objectname'=>'image',
				'objecttype'=>'Image',
			];
			
			$save_image_results = $this->SaveRecordFromQuery_Base($save_record_from_query_args);
			
			if($save_image_results) {
				$i = 0;
				$imagick = new Imagick();
				for($i = 0; $i < count($this->image); $i++) {
					$image = $this->image[$i];
					$file = $this->image_files[$i];
					$original_image = $this->image_unset[$i];
					
					$original_image_location_pieces = str_split($original_image['FileDirectory']);
					$dir_pieces = implode('/', $original_image_location_pieces);
					$original_image_location = $dir_pieces . '/';
					
					if($file['name']) {	// New File Upload
						$old_file_location = 'image/' . $original_image_location . $original_image['FileName'];
						$old_icon_file_location = 'image/' . $original_image_location . $original_image['IconFileName'];
						$old_standard_file_location = 'image/' . $original_image_location . $original_image['StandardFileName'];
						
						if(is_file($old_file_location)) {
							unlink($old_file_location);
						}
						if(is_file($old_icon_file_location)) {
							unlink($old_icon_file_location);
						}
						if(is_file($old_standard_file_location)) {
							unlink($old_standard_file_location);
						}
						
						$image_subdirectory_depth = 4;
						$image_hash = hash_file('sha512', $file['tmp_name']);
						$base = new Base();
						$base_conversion_args = [
							'startingbase'=>'Hexadecimal',
							'endingbase'=>'Base32',
							'value'=>$image_hash,
						];
						$full_image_hash = $base->ConvertBase($base_conversion_args);
						$file_directory = substr($full_image_hash, 0, $image_subdirectory_depth);
						$new_image_directory = $this->UpdateImagesDirectory(['subdir'=>$file_directory]);
						
						$new_file_location = $new_image_directory . $image['FileName'];
						$new_icon_file_location = $new_image_directory . $file['icon_name'];
						$new_standard_file_location = $new_image_directory . $file['standard_name'];
						
						move_uploaded_file($file['tmp_name'], $new_file_location);
						
						$resize_args = [
							'filelocation'=>$new_file_location,
							'resizedlocation'=>$new_icon_file_location,
						];
						$icon_results = $this->makeIcon($resize_args);
						
						$resize_args['resizedlocation'] = $new_standard_file_location;
						$standard_results = $this->makeStandardImage($resize_args);
						
						$this->image[$i]['IconFileName'] = $file['icon_name'];
						$this->image[$i]['StandardFileName'] = $file['standard_name'];
						$this->image[$i]['PixelHeight'] = $icon_results['originalheight'];
						$this->image[$i]['PixelWidth'] = $icon_results['originalwidth'];
						$this->image[$i]['IconPixelHeight'] = $icon_results['resizedheight'];
						$this->image[$i]['IconPixelWidth'] = $icon_results['resizedwidth'];
						$this->image[$i]['StandardPixelHeight'] = $standard_results['resizedheight'];
						$this->image[$i]['StandardPixelWidth'] = $standard_results['resizedwidth'];
						$this->image[$i]['FileDirectory'] = $file_directory;
						
						$save_image_results = $this->SaveRecordFromQuery_Base($save_record_from_query_args);
					} else {
						if(strlen($image['FileName']) > 0) {
							if($image['FileName'] != $original_image['FileName']) {		// Rename/Move Old File Upload
								$original_file_location = 'image/' . $original_image_location . $original_image['FileName'];
								$new_file_location = 'image/' . $original_image_location . $image['FileName'];
								
								rename($original_file_location, $new_file_location);
								
								$alternate_old_filenames = $this->makeAlternateFileNames(['filename'=>$original_image['FileName']]);
								$alternate_new_filenames = $this->makeAlternateFileNames(['filename'=>$image['FileName']]);
								
								$original_file_icon_location = 'image/' . $original_image_location . $alternate_old_filenames['icon_name'];
								$new_file_icon_location = 'image/' . $original_image_location . $alternate_new_filenames['icon_name'];
								
								rename($original_file_icon_location, $new_file_icon_location);
								
								$original_file_standard_location = 'image/' . $original_image_location . $alternate_old_filenames['standard_name'];
								$new_file_standard_location = 'image/' . $original_image_location . $alternate_new_filenames['standard_name'];
								
								rename($original_file_standard_location, $new_file_standard_location);
								
								$this->image[$i]['FileName'] = $image['FileName'];
								$this->image[$i]['IconFileName'] = $alternate_new_filenames['icon_name'];
								$this->image[$i]['StandardFileName'] = $alternate_new_filenames['standard_name'];
								
								$save_image_results = $this->SaveRecordFromQuery_Base($save_record_from_query_args);
							}
						} else {
							unset($this->image[$i]);
							
							$files = [
								'image/' . $original_image_location . $original_image['FileName'],
								'image/' . $original_image_location . $original_image['StandardFileName'],
								'image/' . $original_image_location . $original_image['IconFileName'],
							];
							
							$this->DeleteFiles(['files'=>$files]);
						}
					}
				}
			}
			
			return $save_image_results;
		}
		
		public function DeleteFiles($args) {
			$files = $args['files'];
			
			foreach($files as $file) {
				unlink($file);
			}
			
			return TRUE;
		}
		
		public function UpdateImagesDirectory($args) {
			$subdir = $args['subdir'];
			
			$subdirectories = str_split($subdir);
			$subdirectories_count = count($subdirectories);
			
			$full_directory = 'image/';
			
			for($i = 0; $i < $subdirectories_count; $i++) {
				$single_subdirectory = $subdirectories[$i];
				
				$full_directory .= $single_subdirectory . '/';
				
				if(!is_dir($full_directory)) {
					if(!mkdir($full_directory)) {
						return FALSE;
					}
				}
			}
			
			return $full_directory;
		}
		
		public function SaveRecordFromQuery_ImageTranslation() {
			$save_record_from_query_args = [
				'objectname'=>'imagetranslation',
				'objecttype'=>'ImageTranslation',
			];
			
			return $this->SaveRecordFromQuery_Base($save_record_from_query_args);
		}
		
		public function SaveRecordFromQuery_Tag() {
			$save_record_from_query_args = [
				'objectname'=>'tag',
				'objecttype'=>'Tag',
			];
			
			return $this->SaveRecordFromQuery_Base($save_record_from_query_args);
		}
		
		public function SaveRecordFromQuery_Link() {
			$save_record_from_query_args = [
				'objectname'=>'link',
				'objecttype'=>'Link',
			];
			
			return $this->SaveRecordFromQuery_Base($save_record_from_query_args);
		}
		
		public function SaveRecordFromQuery_EventDate() {
			$save_record_from_query_args = [
				'objectname'=>'eventdate',
				'objecttype'=>'EventDate',
			];
			
			return $this->SaveRecordFromQuery_Base($save_record_from_query_args);
		}
		
		public function SaveRecordFromQuery_AvailabilityDates() {
			$save_record_from_query_args = [
				'objectname'=>'availabilitydaterange',
				'objecttype'=>'AvailabilityDateRange',
			];
			
			return $this->SaveRecordFromQuery_Base($save_record_from_query_args);
		}
		
		public function SaveRecordFromQuery_Association() {
			$save_record_from_query_args = [
				'objectname'=>'association',
				'objecttype'=>'Association',
			];
			
			return $this->SaveRecordFromQuery_Base($save_record_from_query_args);
		}
		
		public function SaveRecordFromQuery_Assignment() {
			if($this->parent['id']) {		// Standard Entry Record
				$this->assignment['Childid'] = $this->entry[id];
			} else {				// Master Entry Record
				$this->assignment['Parentid'] = $this->entry[id];
			}
			
			$save_record_from_query_args = [
				'objectname'=>'assignment',
				'objecttype'=>'Assignment',
				'noentryid'=>1,
			];
			
			return $this->SaveRecordFromQuery_Base($save_record_from_query_args);
		}
		
		public function SaveRecordFromQuery_EntryPermission() {
			$save_record_from_query_args = [
				'objectname'=>'entrypermission',
				'objecttype'=>'EntryPermission',
			];
			
			return $this->SaveRecordFromQuery_Base($save_record_from_query_args);
		}
		
		public function SaveRecordFromQuery_Definition() {
			$save_record_from_query_args = [
				'objectname'=>'definition',
				'objecttype'=>'Definition',
			];
			
			return $this->SaveRecordFromQuery_Base($save_record_from_query_args);
		}
		
						// Saved Record Display Formatting
						// ---------------------------------------------
		
		public function FormatSavedRecordFromQuery_Entry() {
			$format_args = [
				'recordtype'=>'entry',
				'recordfields'=>['Title', 'Subtitle', 'ListTitle', 'ListTitleSortKey', 'Code', 'ChildAdjective', 'ChildNoun', 'ChildNounPlural',],
			];
			
			return $this->FormatSavedRecordFromQuery_Base($format_args);
		}
		
		public function FormatSavedRecordFromQuery_EntryTranslation() {
			$format_args = [
				'recordtype'=>'entry',
				'recordfields'=>['Title', 'Subtitle', 'ListTitle', 'Language'],
			];
			
			return $this->FormatSavedRecordFromQuery_Base($format_args);
		}
		
		public function FormatSavedRecordFromQuery_Description() {
			$format_args = [
				'recordtype'=>'description',
				'recordfields'=>['Description', 'Source', 'Language'],
			];
			
			return $this->FormatSavedRecordFromQuery_Base($format_args);
		}
		
		public function FormatSavedRecordFromQuery_Quote() {
			$format_args = [
				'recordtype'=>'quote',
				'recordfields'=>['Quote', 'Source', 'Language'],
			];
			
			return $this->FormatSavedRecordFromQuery_Base($format_args);
		}
		
		public function FormatSavedRecordFromQuery_TextBody() {
			$format_args = [
				'recordtype'=>'textbody',
				'recordfields'=>['Text', 'Source', 'Language'],
			];
			
			return $this->FormatSavedRecordFromQuery_Base($format_args);
		}
		
		public function FormatSavedRecordFromQuery_Image() {
			$format_args = [
				'recordtype'=>'image',
				'recordfields'=>['Title', 'Description', 'FileName'],
			];
			return $this->FormatSavedRecordFromQuery_Base($format_args);
		}
		
		public function FormatSavedRecordFromQuery_ImageTranslation() {
			$format_args = [
				'recordtype'=>'image',
				'recordfields'=>['Title', 'Description', 'FileName', 'Language'],
			];
			
			return $this->FormatSavedRecordFromQuery_Base($format_args);
		}
		
		public function FormatSavedRecordFromQuery_Tag() {
			$format_args = [
				'recordtype'=>'tag',
				'recordfields'=>['Tag', 'Language'],
			];
			
			return $this->FormatSavedRecordFromQuery_Base($format_args);
		}
		
		public function FormatSavedRecordFromQuery_Link() {
			$format_args = [
				'recordtype'=>'link',
				'recordfields'=>['Title', 'Description', 'URL', 'Language'],
			];
			
			return $this->FormatSavedRecordFromQuery_Base($format_args);
		}
		
		public function FormatSavedRecordFromQuery_EventDate() {
			$format_args = [
				'recordtype'=>'eventdate',
				'recordfields'=>['EventDateTime', 'Title', 'Description', 'Language'],
			];
			
			return $this->FormatSavedRecordFromQuery_Base($format_args);
		}
		
		public function FormatSavedRecordFromQuery_AvailabilityDates() {
			if(is_array($this->availabilitydaterange_unprepared) && $availabilitydaterange_unprepared->tag[0]['id']) {
				$availabilitydateranges = $this->availabilitydaterange_unprepared;
				$newavailabilitydateranges = [];
				
				foreach($availabilitydateranges as $availabilitydaterange) {
					if(strlen($availabilitydaterange['AvailabilityStartTime'])) {
						$availabilitydaterange['AvailabilityStart'] .= ' (' . $availabilitydaterange['AvailabilityStartTime'] . ')';
					}
					
					if(strlen($availabilitydaterange['AvailabilityEndTime'])) {
						$availabilitydaterange['AvailabilityEnd'] .= ' (' . $availabilitydaterange['AvailabilityEndTime'] . ')';
					}
					
					$newavailabilitydateranges[] = $availabilitydaterange;
				}
				
				$this->availabilitydateranges = $newavailabilitydateranges;
			} else {
				if(strlen($this->availabilitydaterange_unprepared['AvailabilityStartTime'])) {
					$this->availabilitydaterange['AvailabilityStart'] .= ' (' . $this->availabilitydaterange_unprepared['AvailabilityStartTime'] . ')';
				}
				
				if(strlen($this->availabilitydaterange_unprepared['AvailabilityEndTime'])) {
					$this->availabilitydaterange['AvailabilityEnd'] .= ' (' . $this->availabilitydaterange_unprepared['AvailabilityEndTime'] . ')';
				}
			}
			
			return TRUE;
		}
		
		public function FormatSavedRecordFromQuery_EntryPermission() {
			$format_args = [
				'recordtype'=>'entrypermission',
				'recordfields'=>['Userid'],
			];
			
			return $this->FormatSavedRecordFromQuery_Base($format_args);
		}
		
		public function FormatSavedRecordFromQuery_Definition() {
			$format_args = [
				'recordtype'=>'definition',
				'recordfields'=>['Term', 'Definition'],
			];

			$autogenerate_definitions = $this->Param('autogenerate-definitions');
			if($autogenerate_definitions) {
				$autogenerated_definition_sources = [];
				
				foreach($this->textbody as $textbody) {
					$autogenerated_definition_sources[] = $textbody['Text'];
			//		print_r($textbody);
				}
				
				$autogenerated_definition_sources_count = count($autogenerated_definition_sources);
				
				if($autogenerated_definition_sources_count) {
					require('../classes/Language/Grammar.php');
					$this->grammar = new Grammar();
					
					require('../classes/Language/TextCleanup.php');
					$this->textcleanup = new TextCleanup(['grammar'=>$this->grammar]);
					
					require('../classes/Language/Definition.php');
					$this->definition_object = new Definition(['grammar'=>$this->grammar, 'textcleanup'=>$this->textcleanup]);
					
				//	print_r($this->definition);
					$definition_hash = [];
					
					foreach($this->definition as $defined_piece) {
						$definition_hash[$defined_piece['Term']] = TRUE;
					}
					
					$full_definition_list = [];
					
					for($i = 0; $i < $autogenerated_definition_sources_count; $i++) {
						$autogenerated_definition_source = $autogenerated_definition_sources[$i];
						$definitions_found = $this->definition_object->GetDefinitions([text=>strip_tags($autogenerated_definition_source)]);
						
				//		print_r($definitions_found);
						
						foreach($definitions_found as $term => $definition_list) {
							if(!$definition_hash[$term]) {
								if(!$full_definition_list[$term]) {
									$full_definition_list[$term] = [];
								}
								
								$full_definition_list[$term] = array_merge($full_definition_list[$term], $definition_list);
							}
						}
					}
			#		print_r($full_definition_list);
					
					foreach($full_definition_list as $term => $multiple_definitions) {
						foreach($multiple_definitions as $single_definition) {
							$definition_record = [
								'Term'=>$term,
								'Definition'=>$single_definition,
								'Entryid'=>$this->entry['id'],
							];
							
							$definition_insert_args = [
								'type'=>'Definition',
								'definition'=>$definition_record,
							];
							
							$new_definition_record = $this->db_access_object->CreateRecord($definition_insert_args);
							$this->definition[] = $new_definition_record;
						}
					}
				}
			}
			
			return $this->FormatSavedRecordFromQuery_Base($format_args);
		}
	}

?>