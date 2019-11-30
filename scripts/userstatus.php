<?php
	
	require('../traits/scripts/DBAdminFunctions.php');
	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/SimpleErrors.php');
	require('../traits/scripts/SimpleLookupLists.php');
	require('../traits/scripts/SimpleForms.php');
	require('../traits/scripts/SimpleORM.php');

	class userstatus extends basicscript
	{
					// Class Information
					// --------------------------------------------------------------
					
				// Traits
				
		use DBAdminFunctions;
		use DBFunctions;
		use SimpleErrors;
		use SimpleForms;
		use SimpleLookupLists;
		use SimpleOrm;
		
				// Security
		
		public function IsSecure()
		{
			return TRUE;
		}
		
		public function RequiresLogin()
		{
			return TRUE;
		}
		
		public function AdminOnly()
		{
			return TRUE;
		}
		
						// Comments
						// ---------------------------------------------
						// ---------------------------------------------
						// ---------------------------------------------
	
					// Review Pending Comments
					// ---------------------------------------------
		
		public function ReviewComments()
		{
			$this->SetOrmBasics();
			$this->SetDBAdmin();
			$this->SetComments();
			$this->SaveCommentChanges();
			
			return TRUE;
		}
		
		public function SetComments()
		{
			$comments = $this->SetComments_GetRecords();
			$comments = $this->SetRecordUsers([records=>$comments]);
			$comments = $this->SetRecordEntries([records=>$comments]);
			
			return $this->comments = $comments;
		}
		
		public function SetComments_GetRecords()
		{
			$comment_get_args = [
				type=>'Comment',
				definition=>[
					Rejected=>0,
					Approved=>0,
				],
			];
			
			$unapproved_comment_records = $this->db_access_object->GetRecords($comment_get_args);
			
			return $unapproved_comment_records;
		}
		
		public function SaveCommentChanges()
		{
			$comments = $this->comments;
			
			foreach($comments as $comment_key => $comment)
			{
				$query_comment_key = 'accept_reject_comment_' . $comment['id'];
				$decision = $this->Param($query_comment_key);
				
				if($decision)
				{
					$new_accept = 0;
					$new_reject = 0;
					if($decision == 'Accept')
					{
						$new_accept = 1;
					}
					elseif($decision == 'Reject')
					{
						$new_reject = 1;
					}
					
					if($new_accept != $comment['Approved'] || $new_reject != $comment['Rejected'])
					{
						$comment['Approved'] = $new_accept;
						$comment['Rejected'] = $new_reject;
					
						$comment_update_args = [
							type=>'Comment',
							update=>[
								'Approved'=>$comment['Approved'],
								'Rejected'=>$comment['Rejected'],
							],
							where=>[
								id=>$comment['id'],
							],
						];
						
						$new_comment = $this->db_access_object->UpdateRecord($comment_update_args);
						
						unset($this->comments[$comment_key]);
					}
				}
			}
			
			return TRUE;
		}
	
					// Review Rejected Comments
					// ---------------------------------------------
		
		public function ReviewRejectedComments()
		{
			$this->SetOrmBasics();
			$this->SetDBAdmin();
			$this->SetRejectedComments();
			$this->SaveCommentChanges();
			
			return TRUE;
		}
		
		public function SetRejectedComments()
		{
			$comments = $this->SetRejectedComments_GetRecords();
			$comments = $this->SetRecordUsers([records=>$comments]);
			$comments = $this->SetRecordEntries([records=>$comments]);
			
			return $this->comments = $comments;
		}
		
		public function SetRejectedComments_GetRecords()
		{
			$comment_get_args = [
				type=>'Comment',
				definition=>[
					Rejected=>1,
					Approved=>0,
				],
			];
			
			$rejected_comment_records = $this->db_access_object->GetRecords($comment_get_args);
			
			return $rejected_comment_records;
		}
	
					// Review Accepted Comments
					// ---------------------------------------------
		
		public function ReviewAcceptedComments()
		{
			$this->SetOrmBasics();
			$this->SetDBAdmin();
			$this->SetAcceptedComments();
			$this->SaveCommentChanges();
			
			return TRUE;
		}
		
		public function SetAcceptedComments()
		{
			$comments = $this->SetAcceptedComments_GetRecords();
			$comments = $this->SetRecordUsers([records=>$comments]);
			$comments = $this->SetRecordEntries([records=>$comments]);
			
			return $this->comments = $comments;
		}
		
		public function SetAcceptedComments_GetRecords()
		{
			$comment_get_args = [
				type=>'Comment',
				definition=>[
					Rejected=>0,
					Approved=>1,
				],
			];
			
			$accepted_comment_records = $this->db_access_object->GetRecords($comment_get_args);
			
			return $accepted_comment_records;
		}
		
						// Suggestions
						// ---------------------------------------------
						// ---------------------------------------------
						// ---------------------------------------------
	
					// Review Pending Suggestions
					// ---------------------------------------------
		
		public function ReviewSuggestions()
		{
			$this->SetOrmBasics();
			$this->SetDBAdmin();
			$this->SetSuggestions();
			$this->SaveSuggestionChanges();
			
			return TRUE;
		}
		
		public function SetSuggestions()
		{
			$suggestions = $this->SetSuggestions_GetRecords();
			$suggestions = $this->SetRecordUsers([records=>$suggestions]);
			$suggestions = $this->SetRecordEntries([records=>$suggestions]);
			
			return $this->suggestions = $suggestions;
		}
		
		public function SetSuggestions_GetRecords()
		{
			$suggestion_get_args = [
				type=>'Suggestion',
				definition=>[
					Rejected=>0,
					Approved=>0,
				],
			];
			
			$unapproved_suggestion_records = $this->db_access_object->GetRecords($suggestion_get_args);
			
			return $unapproved_suggestion_records;
		}
		
		public function SaveSuggestionChanges()
		{
			$suggestions = $this->suggestions;
			
			foreach($suggestions as $suggestion_key => $suggestion)
			{
				$query_suggestion_key = 'accept_reject_suggestion_' . $suggestion['id'];
				$decision = $this->Param($query_suggestion_key);
				
				if($decision)
				{
					$new_accept = 0;
					$new_reject = 0;
					if($decision == 'Accept')
					{
						$new_accept = 1;
					}
					elseif($decision == 'Reject')
					{
						$new_reject = 1;
					}
					
					if($new_accept != $suggestion['Approved'] || $new_reject != $suggestion['Rejected'])
					{
						$suggestion['Approved'] = $new_accept;
						$suggestion['Rejected'] = $new_reject;
					
						$suggestion_update_args = [
							type=>'Suggestion',
							update=>[
								'Approved'=>$suggestion['Approved'],
								'Rejected'=>$suggestion['Rejected'],
							],
							where=>[
								id=>$suggestion['id'],
							],
						];
						
						$new_suggestion = $this->db_access_object->UpdateRecord($suggestion_update_args);
						
						unset($this->suggestions[$suggestion_key]);
					}
				}
			}
			
			return TRUE;
		}
	
					// Review Rejected Suggestions
					// ---------------------------------------------
		
		public function ReviewRejectedSuggestions()
		{
			$this->SetOrmBasics();
			$this->SetDBAdmin();
			$this->SetRejectedSuggestions();
			$this->SaveSuggestionChanges();
			
			return TRUE;
		}
		
		public function SetRejectedSuggestions()
		{
			$suggestions = $this->SetRejectedSuggestions_GetRecords();
			$suggestions = $this->SetRecordUsers([records=>$suggestions]);
			$suggestions = $this->SetRecordEntries([records=>$suggestions]);
			
			return $this->suggestions = $suggestions;
		}
		
		public function SetRejectedSuggestions_GetRecords()
		{
			$suggestion_get_args = [
				type=>'Suggestion',
				definition=>[
					Rejected=>1,
					Approved=>0,
				],
			];
			
			$rejected_suggestion_records = $this->db_access_object->GetRecords($suggestion_get_args);
			
			return $rejected_suggestion_records;
		}
	
					// Review Accepted Suggestions
					// ---------------------------------------------
		
		public function ReviewAcceptedSuggestions()
		{
			$this->SetOrmBasics();
			$this->SetDBAdmin();
			$this->SetAcceptedSuggestions();
			$this->SaveSuggestionChanges();
			
			return TRUE;
		}
		
		public function SetAcceptedSuggestions()
		{
			$suggestions = $this->SetAcceptedSuggestions_GetRecords();
			$suggestions = $this->SetRecordUsers([records=>$suggestions]);
			$suggestions = $this->SetRecordEntries([records=>$suggestions]);
			
			return $this->suggestions = $suggestions;
		}
		
		public function SetAcceptedSuggestions_GetRecords()
		{
			$suggestion_get_args = [
				type=>'Suggestion',
				definition=>[
					Rejected=>0,
					Approved=>1,
				],
			];
			
			$accepted_suggestion_records = $this->db_access_object->GetRecords($suggestion_get_args);
			
			return $accepted_suggestion_records;
		}
		
						// Statistics
						// ---------------------------------------------
						// ---------------------------------------------
						// ---------------------------------------------
	
					// Page Statistics
					// ---------------------------------------------
		
		public function PageStatistics()
		{
			$this->SetDBAdmin();
			ini_set('memory_limit','400M');
			
			$this->SetPrimaryHostList();
			$this->primary_host_options = $this->GetPrimaryHostSelectList();
			
			$submission = $this->Param('view-statistics');
			
			if($submission)
			{
				$this->submission = $submission;
				$host_name = $this->Param('hostname');
				$date_range = $this->Param('daterange');
				
				if($host_name && $date_range)
				{
					$this->host_name = $host_name;
					$this->date_range = $date_range;
					
					$statistics_logs = [];
					
					if($host_name == 'allhosts')
					{
						$statistics_location = '../stats/';
						switch($this->date_range)
						{
							case 'lastmonth':
								$time_formatted = date('o-M', $this->time->time);
								
								foreach($this->primary_hosts as $primary_host)
								{
									$folder_location = $statistics_location . $primary_host;
									if(is_dir($folder_location))
									{
										$file_location = $folder_location . '/' . $time_formatted . '.txt';
										$statistics_logs[$primary_host] = file($file_location);
									}
								}
								
								break;
								
							case 'lastyear':
								$time_formatted = date('o', $this->time->time);
								
								foreach($this->primary_hosts as $primary_host)
								{
									$statistics_logs[$primary_host] = [];
									foreach(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] as $month)
									{
										$file_location = $statistics_location . $primary_host . '/' . $time_formatted . '-' . $month . '.txt';
										if(is_file($file_location))
										{
											$statistics_logs[$primary_host] = array_merge($statistics_logs[$primary_host], file($file_location));
										}
									}
								}
								
								break;
								
							case 'alltime':
								foreach($this->primary_hosts as $primary_host)
								{
									$statistics_logs[$primary_host] = [];
									
									$primary_host_statistics_location = $statistics_location . $primary_host . '/';
									
									if(is_dir($primary_host_statistics_location))
									{
										$files = scandir($primary_host_statistics_location);
										$checked_years = [];
										
										foreach($files as $file)
										{
											if($file != '.' && $file != '..')
											{
												$file_pieces = explode('-', $file);
												$file_year = $file_pieces[0];
												
												if(!$checked_years[$file_year])
												{
													foreach(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] as $month)
													{
														$file_location = $primary_host_statistics_location . $file_year . '-' . $month . '.txt';											
														if(is_file($file_location))
														{
															$statistics_logs[$primary_host] = array_merge($statistics_logs[$primary_host], file($file_location));
														}
													}
													$checked_years[$file_year] = TRUE;
												}
											}
										}
									}
								}
								
								break;
						}
					}
					else
					{
						$statistics_location = '../stats/' . $this->host_name . '/';
						
						switch($this->date_range)
						{
							case 'lastmonth':
								$time_formatted = date('o-M', $this->time->time);
								$file_location = $statistics_location . $time_formatted . '.txt';
								$statistics_logs = file($file_location);
								
								break;
								
							case 'lastyear':
								$time_formatted = date('o', $this->time->time);
								
								foreach(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] as $month)
								{
									$file_location = $statistics_location . $time_formatted . '-' . $month . '.txt';
									if(is_file($file_location))
									{
										$statistics_logs = array_merge($statistics_logs, file($file_location));
									}
								}
								
								break;
								
							case 'alltime':
								$files = scandir($statistics_location);
								$checked_years = [];
								
								foreach($files as $file)
								{
									if($file != '.' && $file != '..')
									{
										$file_pieces = explode('-', $file);
										$file_year = $file_pieces[0];
										
										if(!$checked_years[$file_year])
										{
											foreach(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] as $month)
											{
												$file_location = $statistics_location . $file_year . '-' . $month . '.txt';											
												if(is_file($file_location))
												{
													$statistics_logs = array_merge($statistics_logs, file($file_location));
												}
											}
											$checked_years[$file_year] = TRUE;
										}
									}
								}
								
								break;
						}
					}
					
					if($statistics_logs && count($statistics_logs))
					{
						$page_statistics = [];
						
						if($host_name == 'allhosts')
						{
							foreach($this->primary_hosts as $primary_host)
							{
								if($statistics_logs[$primary_host])
								{
									$page_statistics[$primary_host] = [];
									
									$date_hits = [];
									$date_uniques = [];
									
									foreach($statistics_logs[$primary_host] as $statistics_log)
									{
										#  2016-Sep-05 17:57:00 [1473123420] 68.228.147.96 / (en:English)
										$statistics_log_pieces = explode(' ', $statistics_log);
										
										$statistics_log_date = $statistics_log_pieces[0];
										$statistics_log_time = $statistics_log_pieces[1];
										$statistics_log_epoch = $statistics_log_pieces[2];
										$statistics_log_ip = $statistics_log_pieces[3];
										$statistics_log_location = $statistics_log_pieces[4];
										$statistics_log_language = $statistics_log_pieces[5];
										
										if($date_hits[$statistics_log_date])
										{
											$date_hits[$statistics_log_date]++;
										}
										else
										{
											$date_hits[$statistics_log_date] = 1;
										}
										
										if($date_uniques[$statistics_log_date][$statistics_log_ip])
										{
											$date_uniques[$statistics_log_date][$statistics_log_ip]++;
										}
										else
										{
											if(!$date_uniques[$statistics_log_date])
											{
												$date_uniques[$statistics_log_date] = [];
											}
											$date_uniques[$statistics_log_date][$statistics_log_ip] = 1;
										}
									}
									
									if(count($date_hits))
									{
										$page_statistics[$primary_host][] = [
											'Date',
											'Hits',
											'Uniques',
										];
									}
									
									foreach($date_hits as $date_hit_day => $date_hit_count)
									{
										$unique_count = count($date_uniques[$date_hit_day]);
										$page_statistics[$primary_host][] = [
											$date_hit_day,
											$date_hit_count,
											$unique_count,
										];
									}
								}
							}
						}
						else
						{
							$page_statistics[] = [
								'Date',
								'Hits',
								'Uniques',
							];
							
							$date_hits = [];
							$date_uniques = [];
							
							foreach($statistics_logs as $statistics_log)
							{
								#  2016-Sep-05 17:57:00 [1473123420] 68.228.147.96 / (en:English)
								$statistics_log_pieces = explode(' ', $statistics_log);
								
								$statistics_log_date = $statistics_log_pieces[0];
								$statistics_log_time = $statistics_log_pieces[1];
								$statistics_log_epoch = $statistics_log_pieces[2];
								$statistics_log_ip = $statistics_log_pieces[3];
								$statistics_log_location = $statistics_log_pieces[4];
								$statistics_log_language = $statistics_log_pieces[5];
								
								if($date_hits[$statistics_log_date])
								{
									$date_hits[$statistics_log_date]++;
								}
								else
								{
									$date_hits[$statistics_log_date] = 1;
								}
								
								if($date_uniques[$statistics_log_date][$statistics_log_ip])
								{
									$date_uniques[$statistics_log_date][$statistics_log_ip]++;
								}
								else
								{
									if(!$date_uniques[$statistics_log_date])
									{
										$date_uniques[$statistics_log_date] = [];
									}
									$date_uniques[$statistics_log_date][$statistics_log_ip] = 1;
								}
						#		print($statistics_log);
							}
							
							foreach($date_hits as $date_hit_day => $date_hit_count)
							{
								$unique_count = count($date_uniques[$date_hit_day]);
								$page_statistics[] = [
									$date_hit_day,
									$date_hit_count,
									$unique_count,
								];
							}
						}
						
						$this->page_statistics = $page_statistics;
						
						$this->stats_retrieved = TRUE;
					}
				}
			}
			
		#	print("|" . $submission . "|");
			
			return TRUE;
		}
	}
	
?>