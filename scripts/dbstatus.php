<?php
	
	require('../traits/scripts/BaseConversion.php');
	require('../traits/scripts/DBAdminFunctions.php');
	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/SimpleImages.php');
	require('../traits/scripts/SimpleAPI.php');
	require('../traits/scripts/SimpleErrors.php');
	require('../traits/scripts/SimpleLookupLists.php');
	require('../traits/scripts/SimpleForms.php');
	require('../traits/scripts/SimpleORM.php');
	require('../traits/scripts/SimpleORMSiteMap.php');

	class dbstatus extends basicscript {
					// Class Information
					// --------------------------------------------------------------
					
				// Traits
					
		use BaseConversion;
		use DBAdminFunctions;
		use DBFunctions;
		use SimpleAPI;
		use SimpleErrors;
		use SimpleForms;
		use SimpleImages;
		use SimpleLookupLists;
		use SimpleOrm;
		use SimpleORMSiteMap;
		
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
		
					// HTML Formatting
					// --------------------------------------------------------------
				
				// Title
				
		public function GetHTMLFormatData_Title()
		{
			$title = 'DB Status Diagnostics';
			
			$good_action = $this->GetGoodFunctionName();
			if($good_action)
			{
				$title .= ' : ' . $good_action;
			}
			
			return $title;
		}
					// Function Information
					// --------------------------------------------------------------
					
						// BCE-Informational Functions
						// --------------------------------------------------------------
		
		public function DumpTables()
		{
			$this->SetDBAdmin();
			$requested_mysql_tables = $this->Param('MySQLTables');
			
			if($requested_mysql_tables)
			{
				$this->StatusDataArray = [];
				
				$requested_mysql_tables = $this->Param('MySQLTables');
				$this->SelectedMySQLTables = $requested_mysql_tables;
				
				foreach ($requested_mysql_tables as $requested_mysql_table)
				{
					$mysql_table_args = [
						'type'=>$requested_mysql_table,
						'definition'=>[
						],
					];
					
					$mysql_table_results = $this->db_access_object->GetRecords($mysql_table_args);
					$this->StatusDataArray[$requested_mysql_table] = $mysql_table_results;
				}
			}
			
			$this->GetAllTablesMySQLSelect();
			
			return TRUE;
		}
		
		public function MySQLDBEquivalent()
		{
			$this->SetDBAdmin();
			$table_mysql_commands = $this->db_admin->GetTableMySQL();
			$table_mysql_commands_pre_escaped = [];
			
			foreach ($table_mysql_commands as $table_mysql)
			{
				$table_mysql_commands_pre_escaped[] = '<pre>' . $table_mysql . '</pre>';
			}
			
			$get_files_args = [
				arrayofstrings=>$table_mysql_commands_pre_escaped,
			];
			
			$this->StatusDataArray = [];
			$this->StatusDataArray[] = $this->NumberArrayOfStrings($get_files_args);
			$this->StatusDataArray[] = [['<pre>' . implode($table_mysql_commands, "\n\n") . '</pre>']];
			
			return TRUE;
		}
		
		public function ShowTablesListNames()
		{
			$this->SetDBAdmin();
			$get_files_args = [
				'arrayofstrings'=>$this->db_admin->GetTableNames(),
			];
			
			$this->StatusDataArray = $this->NumberArrayOfStrings($get_files_args);
			
			return TRUE;
		}
		
		public function ShowTablesListSchemasTable()
		{
			$this->SetDBAdmin();
			return $this->StatusDataArray = $this->db_admin->GetTableSchemas();
		}
		
		public function EntrySymmetryCheck()
		{
			$master_table = $this->Param('master-table');
			
			$entry_code_count = 0;
			$entry_data = [];
			
			if($master_table)
			{
				$this->master_table = $master_table;
				
				ini_set('memory_limit','400M');
				
				$this->SetORMSiteMapObject();
				
				$entry_codes = $this->ormsitemap->GetEntrySiteMapCodes();
				
				$entry_code_count = count($entry_codes);
				$full_code_tree = [];
				
				if($entry_code_count)
				{
					for($i = 0; $i < $entry_code_count; $i++)
					{
						$entry_code = $entry_codes[$i];
						
						$field = 'Code';
						
						$e2_code = $entry_code['E2_' . $field];
						$e3_code = $entry_code['E3_' . $field];
						$e4_code = $entry_code['E4_' . $field];
						$e5_code = $entry_code['E5_' . $field];
						$e6_code = $entry_code['E6_' . $field];
						$e7_code = $entry_code['E7_' . $field];
						
						if($e2_code && !$full_code_tree[$e2_code])
						{
							$full_code_tree[$e2_code] = [];
						}
						
						if($e3_code && !$full_code_tree[$e2_code][$e3_code])
						{
							$full_code_tree[$e2_code][$e3_code] = [];
						}
						
						if($e4_code && !$full_code_tree[$e2_code][$e3_code][$e4_code])
						{
							$full_code_tree[$e2_code][$e3_code][$e4_code] = [];
						}
						
						if($e5_code && !$full_code_tree[$e2_code][$e3_code][$e4_code][$e5_code])
						{
							$full_code_tree[$e2_code][$e3_code][$e4_code][$e5_code] = [];
						}
						
						if($e6_code && !$full_code_tree[$e2_code][$e3_code][$e4_code][$e5_code][$e6_code])
						{
							$full_code_tree[$e2_code][$e3_code][$e4_code][$e5_code][$e6_code] = [];
						}
						
						if($e7_code && !$full_code_tree[$e2_code][$e3_code][$e4_code][$e5_code][$e6_code][$e7_code])
						{
							$full_code_tree[$e2_code][$e3_code][$e4_code][$e5_code][$e6_code][$e7_code] = [];
						}
					}
					
					unset($entry_codes);
					
					$master_tree = $full_code_tree[$master_table];
					
					if($master_tree)
					{
						foreach($full_code_tree as $e2_key => $e2_children)
						{
							if($e2_key != $master_table)
							{
								foreach($master_tree as $e3_key => $e3_children)
								{
									if(!isset($full_code_tree[$e2_key][$e3_key]))
									{
										$entry_data[] = $e2_key . '/' . $e3_key;
									}
									else
									{
										foreach($e3_children as $e4_key => $e4_children)
										{
											if(!isset($full_code_tree[$e2_key][$e3_key][$e4_key]))
											{
												$entry_data[] = $e2_key . '/' . $e3_key . '/' . $e4_key;
											}
											else
											{
												foreach($e4_children as $e5_key => $e5_children)
												{
													if(!isset($full_code_tree[$e2_key][$e3_key][$e4_key][$e5_key]))
													{
														$entry_data[] = $e2_key . '/' . $e3_key . '/' . $e4_key . '/' . $e5_key;
													}
													else
													{
														foreach($e5_children as $e6_key => $e6_children)
														{
															if(!isset($full_code_tree[$e2_key][$e3_key][$e4_key][$e5_key][$e6_key]))
															{
																$entry_data[] = $e2_key . '/' . $e3_key . '/' . $e4_key . '/' . $e5_key . '/' . $e6_key;
															}
															else
															{
																foreach($e6_children as $e7_key => $e7_children)
																{
																	if(!isset($full_code_tree[$e2_key][$e3_key][$e4_key][$e5_key][$e6_key][$e7_key]))
																	{
																		$entry_data[] = $e2_key . '/' . $e3_key . '/' . $e4_key . '/' . $e5_key . '/' . $e6_key . '/' . $e7_key;
																	}
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
				
				#$entry_data = ['green', 'bean'];
			}
			
			$this->StatusDataArray = $entry_data;
			$this->entry_code_count = $entry_code_count;
			
			return TRUE;
		}
		
		public function GetCleanupDBMySQL()
		{
			$this->SetDBAdmin();
			$this->SetORM();
			
			return $this->StatusDataArray = $this->db_admin->GetSyntaxForDBRecordCleaning([tables=>$this->orm->GetAllEntryRecordTypes()]);
		}
		
		public function ManagePrimaryHostRecords()
		{
			$this->SetPrimaryHostRecords();
			
			if($this->Param('Save'))
			{
				$record_keys = $this->Param('RecordKey');
				$record_values = $this->Param('RecordValue');
				
			#	print("BT: Key to values???");
			#	print("<PRE>");
			#	print_r($record_keys);
			#	print_r($record_values);
			#	print("</PRE>");
				
				$primary_host_records = $this->primary_host_records;
				$new_primary_host_records = [];
				
				if(!is_array($record_keys))
				{
					$record_keys = [$record_keys];
					$record_values = [$record_values];
				}
				
				foreach($primary_host_records as $primary_host_record)
				{
					$primary_host_record['RecordKey'] = array_shift($record_keys);
					$primary_host_record['RecordValue'] = array_shift($record_values);
					$new_primary_host_records[] = $primary_host_record;
				}
				
				$this->primary_host_records = $new_primary_host_records;
				$primary_host_records = $new_primary_host_records;
				
				if(count($record_keys))
				{
					foreach($record_keys as $record_key)
					{
						$primary_host_records[] = [
							'RecordKey'=>$record_key,
							'RecordValue'=>array_pop($record_values),
						];
					}
				}
				
				$primary_host_record_ids = [];
				
				foreach($primary_host_records as $primary_host_record)
				{
					if($primary_host_record['RecordKey'] || $primary_host_record['RecordValue'])
					{
						if($primary_host_record['id'])			// Update Old Primary Host Record
						{
							$primary_host_record_update_args = [
								type=>'PrimaryHostRecord',
								update=>$primary_host_record,
								where=>[
									id=>$primary_host_record['id'],
								],
							];
							
							$primary_host_record = $this->db_access_object->UpdateRecord($primary_host_record_update_args)[0];
						}
						else						// Create New Primary Host Record
						{
							$primary_host_record_insert_args = [
								type=>'PrimaryHostRecord',
								definition=>$primary_host_record,
							];
							
							$primary_host_record = $this->db_access_object->CreateRecord($primary_host_record_insert_args);
						}
						
						$primary_host_record_ids[] = $primary_host_record['id'];
					}
				}
				
				$delete_other_records_args = [
					type=>'PrimaryHostRecord',
					field=>'id',
					fieldtype=>'int',
					notin=>$primary_host_record_ids,
				];
				
				$this->db_access_object->DeleteOtherRecords($delete_other_records_args);
				
				$this->primary_host_records = $primary_host_records;
			#	print("BT: Save Primary Host Records!!!");
			#	print("<PRE>");
			#	print_r($this->primary_host_records);
			#	print("</PRE>");
			}
			
			return TRUE;
		}
		
		public function ViewAllPrimaryHosts()
		{
			$this->SetDBAdmin();
			
			$primary_host_information = $this->db_admin->ViewAllPrimaryHosts();
			$primary_host_displayable_information = [
				[
					'<nobr>Index</nobr>',
					'<nobr>Primary Host</nobr>',
					'<nobr>MCP</nobr>',
				],
			];
			
			$i = 1;
			
			foreach($primary_host_information as $primary_host_name)
			{
				$primary_domain_url = $this->domain_object->GetPrimaryDomain([www=>1, secure=>1, domain=>$primary_host_name]) . '/';
				$primary_public_domain_url = $this->domain_object->GetPrimaryDomain([www=>1, insecure=>1, domain=>$primary_host_name]) . '/';
				
				if($primary_host_name != 'clonefrom.com')
				{
					$primary_domain_index_link = '<a href="' . $primary_public_domain_url . '" target="_blank">' . $primary_host_name . '</a>';
					$primary_domain_master_control_program_link = '<a href="' . $primary_domain_url . 'master-c.php" target="_blank">MCP</a>';
				}
				else
				{
					$primary_domain_index_link = $primary_host_name;
					$primary_domain_master_control_program_link = 'N/A';
				}
				
				$primary_host_displayable_information[] = [
					$i++,
					$primary_domain_index_link,
					$primary_domain_master_control_program_link,
				];
			}
			
			return $this->StatusDataArray = $primary_host_displayable_information;
		#	$this->StatusDataArray = $this->db_admin->ViewAllPrimaryHosts();
			
		#	return $this->StatusDataArray = [
		#		['tah', 'dah']
		#	];
		}
		
		public function ViewPrimaryHostStatus()
		{
			$this->SetORM();
			$this->SetDBAdmin();
			
			$primary_host_information = $this->db_admin->ViewPrimaryHostStatus();
			
			$primary_host_displayable_information = [
				[
					'<nobr>Index</nobr>',
					'<nobr>Primary Host</nobr>',
					'<nobr>MCP</nobr>',
					'<nobr>Database</nobr>',
					'<nobr>Schema</nobr>',
					'<nobr>Admin Accounts</nobr>',
					'<nobr>Static Files</nobr>',
					'<nobr>Primary Entry</nobr>',
				],
			];
			
			$index = 1;
			
			foreach($primary_host_information as $primary_host_name => $primary_host_data)
			{
				$primary_domain_url = $this->domain_object->GetPrimaryDomain([www=>1, secure=>1, domain=>$primary_host_name]) . '/';
				$primary_public_domain_url = $this->domain_object->GetPrimaryDomain([www=>1, insecure=>1, domain=>$primary_host_name]) . '/';
				
				if($primary_host_name != 'clonefrom.com')
				{
					$primary_domain_index_link = '<a href="' . $primary_public_domain_url . '" target="_blank">' . $primary_host_name . '</a>';
					$primary_domain_master_control_program_link = '<a href="' . $primary_domain_url . 'master-c.php" target="_blank">MCP</a>';				
				}
				else
				{
					$primary_domain_index_link = $primary_host_name;
					$primary_domain_master_control_program_link = 'N/A';
				}
				
				if($primary_host_data[database_status][results])
				{
					$primary_domain_database_results = 'PASS';
				}
				else
				{
					$error_number_and_message_args = [
						errors=>$primary_host_data[database_status][errors],
					];
					
					$full_error_display = $this->FormatErrors_ErrorNumberAndMessage($error_number_and_message_args);
					
					$primary_domain_database_results = '<span title="' . $full_error_display . '">FAIL</span>';
				}
				
				if($primary_host_data[schema_status][results])
				{
					$primary_domain_schema_results = 'PASS';
				}
				else
				{
					$error_number_and_message_args = [
						errors=>$primary_host_data[schema_status][errors],
					];
					
					$full_error_display = $this->FormatErrors_ErrorNumberAndMessage($error_number_and_message_args);
					
					$primary_domain_schema_results = '<span title="' . $full_error_display . '">FAIL</span>';
				}
				
				if($primary_host_data[admin_account_status][results])
				{
					$primary_domain_admin_results = 'PASS';
				}
				else
				{
					$error_number_and_message_args = [
						errors=>$primary_host_data[admin_account_status][errors],
					];
					
					$full_error_display = $this->FormatErrors_ErrorNumberAndMessage($error_number_and_message_args);
					
					$primary_domain_admin_results = '<span title="' . $full_error_display . '">FAIL</span>';
				}
				
				if($primary_host_data[static_files_status][results])
				{
					$primary_domain_files_results = 'PASS';
				}
				else
				{
					$error_number_and_message_args = [
						errors=>$primary_host_data[static_files_status][errors],
					];
					
					$full_error_display = $this->FormatErrors_ErrorNumberAndMessage($error_number_and_message_args);
					
					$primary_domain_files_results = '<span title="' . $full_error_display . '">FAIL</span>';
				}
				
				if($primary_host_data[master_entry_status][results])
				{
					$primary_domain_master_entry_results = 'PASS';
				}
				else
				{
					$error_number_and_message_args = [
						errors=>$primary_host_data[master_entry_status][errors],
					];
					
					$full_error_display = $this->FormatErrors_ErrorNumberAndMessage($error_number_and_message_args);
					
					$primary_domain_master_entry_results = '<span title="' . $full_error_display . '">FAIL</span>';
				}
				
				$primary_host_displayable_information[] = [
					$index++,
					$primary_domain_index_link,
					$primary_domain_master_control_program_link,
					$primary_domain_database_results,
					$primary_domain_schema_results,
					$primary_domain_admin_results,
					$primary_domain_files_results,
					$primary_domain_master_entry_results,
				];
			}
			
			return $this->StatusDataArray = $primary_host_displayable_information;
		#	$this->StatusDataArray = $this->db_admin->ViewAllPrimaryHosts();
			
		#	return $this->StatusDataArray = [
		#		['tah', 'dah']
		#	];
		}
		
		public function ViewPrimaryHostSEOStatus()
		{
			return $this->StatusDataArray = [
				[
					'Favicon? (deploy favicon generated from realfavicongenerator.net)',
				],
				[
					'Master record field lengths?',
				],
				[
					'Tag / link counts?',
				],
				[
					'Primary Host Level Records?',
				],
				[
					'Do these: https://www.quotes.uk.com/web-design/meta-tags.php',
				],
				[
					'Can these be implemented?: https://github.com/audreyr/favicon-cheat-sheet',
				],
			];
		}
		
		public function GenerateSearchEngineSitemapSubmissionLinks()
		{
			$this->SetDBAdmin();
			$this->SetAPI();
			
			$sitemap_submission_links = [];
			$sitemap_submission_links_count = 0;
			
			$language_codes = $this->language_object->GetListOfLanguageCodes();
			$primary_hosts = $this->db_admin->ViewAllPrimaryHosts();
			
		#	foreach($primary_hosts as $primary_host)
		#	{
				$primary_host = $this->domain_object->primary_domain_lowercased;
				$sitemap_submission_links[$primary_host] = [];
				
				foreach($language_codes as $language_code => $language_name)
				{
					$search_engines_function = 'GetSearchEngines_byLanguage_' . $language_code;
					$search_engines = $this->search_engine->$search_engines_function();
					
					$sitemap_submission_links_count += count($search_engines);
					
					$sitemap_submission_links[$primary_host][$language_code] = [];
					
					foreach($search_engines as $search_engine)
					{
						$sitemap_submission_link = 'http://' . $search_engine . '/ping?sitemap=' . 'http://www.' . $primary_host . '/sitemap.xml?language=' . $language_code;
						$sitemap_submission_link_encoded = urlencode($sitemap_submission_link);
						$curl_submission_link = 'domain curl ping';
						
						if($primary_host != 'clonefrom.com')
						{
							if($primary_host == $this->domain_object->primary_domain_lowercased)
							{
								$curl_submission_link_display =
									'<nobr>' .
									'<a href="https://www.' .
									$primary_host .
									'/ping.php?url=' .
									$sitemap_submission_link_encoded .
									'&action=Curl' .
									'">' .
									$curl_submission_link .
									'</a>' .
									'</nobr>'
								;
							}
							else
							{
								$curl_submission_link_display =
									'<nobr title="You must issue this request from the master-c panel for this particular domain.">' .
									'N/A' .
									'</nobr>'
								;
							}
						}
						else
						{
							$curl_submission_link_display =
								'<nobr title="You may not issue this request for the clonefrom.com domain, as this domain is not valid.">' .
								'N/A' .
								'</nobr>'
							;
						}
						
						if($primary_host != 'clonefrom.com')
						{
							$sitemap_submission_link_display =
								' &bull; ' .
								$sitemap_submission_link
							;
						}
						else
						{
							$sitemap_submission_link_display =
								' &bull; ' .
								$sitemap_submission_link
							;
						}
						
						if($primary_host != 'clonefrom.com')
						{
							$curl_backup_link = $this->domain_object->primary_domain_lowercased . '/curl/' . $sitemap_submission_link_encoded;
							$curl_backup_file = '../' . $curl_backup_link;
							
							if(is_file($curl_backup_file))
							{
								$curl_backup_link_display =
									'<nobr>' .
									'<a href="http://www.' .
									$primary_host . '/curl/' . urlencode($sitemap_submission_link_encoded) .
									'">Backup Curl Request</a>' .
									'</nobr>'
								;
								
								$curl_submission_link_display =
									'<nobr>' .
									'<span title="https://www.' .
									$primary_host .
									'/ping.php?url=' .
									$sitemap_submission_link_encoded .
									'&action=Curl' .
									'">' .
									$curl_submission_link .
									'</span>' .
									'</nobr>'
								;
								
								$sitemap_submission_link_display = '(already done)';
							}
							else
							{
								$curl_backup_link_display =
									'<span title="' .
									$curl_backup_link .
									'">' .
									'N/A' .
									'</span>'
								;
							}
						}
						else
						{
							$curl_backup_link_display = 'N/A';
						}
						
						$sitemap_submission_links[$primary_host][$language_code][] = [
							$curl_submission_link_display,
							$curl_backup_link_display,
							$sitemap_submission_link_display,
						];
					}
				}
		#	}
			
			$this->sitemap_submission_links = $sitemap_submission_links;
			$this->sitemap_submission_links_count = $sitemap_submission_links_count;
			
			return TRUE;
		}
		
		public function ClonePrimaryHostDatabase() {
			$this->SetDBAdmin();
			
			$new_host_to_clone = $this->Param('newhost');
			
			if(strlen($new_host_to_clone)) {
			//	print("BT: CLONE!" . $new_host_to_clone);
				$this->new_host_to_clone = $new_host_to_clone;
				
				$clone_from = $this->Param('clonefrom');
				
				if($clone_from) {
					$this->clone_from = $clone_from;
				}
				
				$clone_primary_host_database_args = [
					'host'=>$new_host_to_clone,
					'clonefrom'=>$clone_from,
					'globals'=>$this->globals,
				];
				
			//	PRINT("BT: DO IT!" . $clone_from);
		//		print_r($this->globals);
				
				$db_admin_cloning_results = $this->DBAdminClonePrimaryHostDatabase($clone_primary_host_database_args);
			//	print("BT DONE");
				
				$this->clone_success = $db_admin_cloning_results['cloneresults'];
				$this->create_tables = $db_admin_cloning_results['tablesql'];
				
				if($this->clone_success) {
					$this->clone_results = 'Cloning of "' . $new_host_to_clone . '" was successful.';
					
					$insert_master_admin_account = $this->Param('insert_master_admin_account');
					
					if(strlen($insert_master_admin_account))
					{
						$this->insert_master_admin_account = TRUE;
						print("DFO TI ILAST!<BR><BR>");
						print_r($clone_primary_host_database_args);
						$insert_master_admin_account_results = $this->DBAdminCloneAdminAccountsToNewDatabase($clone_primary_host_database_args);
						
						if($insert_master_admin_account_results['cloneresults'])
						{
							$this->clone_results .= ' Cloning of admin accounts was successful.';
						}
						else
						{
							$this->clone_results .= ' Cloning of admin accounts failed.';
						}
					} else {
						$this->insert_master_admin_account = FALSE;
					}
					
					$clone_files_from_clonefrom = $this->Param('clone_files_from_clonefrom');
					
					if(strlen($clone_files_from_clonefrom))
					{
						$this->clone_files_from_clonefrom = TRUE;
						
						$clone_files_from_clonefrom_results = $this->DBAdminCloneFilesToNewDatabase($clone_primary_host_database_args);
						
						if($clone_files_from_clonefrom_results['cloneresults'])
						{
							$this->clone_results .= ' Cloning of files was successful.';
						}
						else
						{
							$this->clone_results .= ' Cloning of files failed.';
						}
					} else {
						$this->clone_files_from_clonefrom = FALSE;
					}
					
					$clone_stats_from_clonefrom = $this->Param('clone_stats_from_clonefrom');
					
					if(strlen($clone_stats_from_clonefrom))
					{
						$this->clone_stats_from_clonefrom = TRUE;
						
						$clone_stats_from_clonefrom_results = $this->CloneStatsToNewDatabase($clone_primary_host_database_args);
						
						if($clone_stats_from_clonefrom_results['cloneresults'])
						{
							$this->clone_results .= ' Cloning of stats was successful.';
						}
						else
						{
							$this->clone_results .= ' Cloning of stats failed.';
						}
					} else {
						$this->clone_stats_from_clonefrom = FALSE;
					}
					
					$clone_data_folders = $this->Param('clone_data_folders');
					
					if(strlen($clone_data_folders))
					{
						$this->clone_data_folders = TRUE;
						
						$clone_data_folders_results = $this->CloneDataToNewDatabase($clone_primary_host_database_args);
						
						if($clone_data_folders_results['cloneresults'])
						{
							$this->clone_results .= ' Cloning of data directories was successful.';
						}
						else
						{
							$this->clone_results .= ' Cloning of data directories failed.';
						}
					} else {
						$this->clone_data_folders = FALSE;
					}
				}
				else
				{
					$this->clone_results = 'Cloning of "' . $new_host_to_clone . '" failed.';
				}
			}
			
			return TRUE;
		}
					
						// List Management Functions
						// --------------------------------------------------------------
		
		public function CreateList()
		{
			$title = $this->Param('Title');
			
			if($title)
			{
				$this->title = $title;
				
				$lookup_list_create_args = [
					type=>'LookupList',
					definition=>[
						Title=>$title,
					],
				];
				
				$lookup_list = $this->db_access_object->CreateRecord($lookup_list_create_args);
				$this->lookup_list = $lookup_list;
				
				$items = [];
				
				$item_keys = $this->Param('ItemKey');
				$item_values = $this->Param('ItemValue');
				
				$lookup_list_items = [];
				
				foreach($item_keys as $item_key)
				{
					$item_value = array_shift($item_values);
					
					$lookup_list_item_create_args = [
						type=>'LookupListItem',
						definition=>[
							ItemKey=>$item_key,
							ItemValue=>$item_value,
							LookupListid=>$lookup_list['id'],
						],
					];
					
					$lookup_list_item = $this->db_access_object->CreateRecord($lookup_list_item_create_args);
					$lookup_list_items[] = $lookup_list_item;
					
					$mouseover = 'LookupListItem ' . $lookup_list_item['id'];
					
					$mouseover_detail =
						'id: ' . $lookup_list_item['id'] . '; ' .
						'ItemKey: ' . $lookup_list_item['ItemKey'] . '; ' .
						'ItemValue: ' . $lookup_list_item['ItemValue'] . '; ' .
						'Disabled: ' . $lookup_list_item['Disabled'] . '; ' .
						'LookupListid: ' . $lookup_list_item['LookupListid'] . '; ' .
						'OriginalCreationDate: ' . $lookup_list_item['OriginalCreationDate'] . '; ' .
						'LastModificationDate: ' . $lookup_list_item['LastModificationDate'] . '.';
					
					$mouseover .= ' (' . $mouseover_detail . ')';
					
					$items[] = [
						[
							'contents'=>$item_key,
							'mouseover'=>$mouseover,
						],
						[
							'contents'=>$item_value,
							'mouseover'=>$mouseover,
						],
					];
				}
				
				$this->items = $items;
				$this->lookup_list_items = $lookup_list_items;
			}
			
			return TRUE;
		}
		
		public function ImportList()
		{
			$import_list = $this->Param('ImportList');
			
			if($import_list)
			{
				$this->import_list = $import_list;
				
				$client = $this->Param('Client');
				
				if($client)
				{
					$this->client = $client;
					
					$title = $this->Param('Title');
					if($title)
					{
						$this->title = $title;
					}
					
					$client_db_args = [
						cleanser=>$this->cleanser_object,
						time=>$this->time,
						domain=>$this->domain_object,
						database=>$client,
					];
					
				#	print("BT: CONNECT to...|" . $client . "|");
					$client_db = new DBAccess($client_db_args);
				#	print("<PRE>");
				#	print_r($client_db);
				#	print("</PRE>");
				#	print("BT: CONNECT COMPLETE.");
					
					if($client_db)
					{
						if($client_db->DBStart())
						{
							$imported_lookup_lists = [];
							$imported_lookup_list_counts = [];
							$imported_lookup_list_counts_display = [];
							$imported_lookup_list_items = [];
							
							if($title)
							{
								$definition = [
									Title=>$title,
								];
							}
							else
							{
								$definition = [];
							}
							
							$lookup_list_args = [
								'type'=>'LookupList',
								'definition'=>$definition,
							];
							
							$lookup_lists = $client_db->GetRecords($lookup_list_args);
							
							if($lookup_lists && count($lookup_lists))
							{
								foreach($lookup_lists as $lookup_list)
								{
								#	print("LIST???...|" . $lookup_list['Title'] . "|<BR><BR>");
									
									$lookup_list_where_args = [
										'type'=>'LookupList',
										'definition'=>[
											Title=>$lookup_list['Title'],
										],
									];
									
									$current_client_lookup_lists = $this->db_access_object->GetRecords($lookup_list_where_args);
									
									if($current_client_lookup_lists && count($current_client_lookup_lists) && !$current_client_lookup_lists[errors])
									{
									#	print("DO NOT ADD.<BR>");
									}
									else
									{
										$lookup_list_insert_args = [
											type=>'LookupList',
											definition=>[
												Title=>$lookup_list['Title'],
											],
										];
										
										$lookup_list_saved = $this->db_access_object->CreateRecord($lookup_list_insert_args);
										$imported_lookup_lists[] = $lookup_list_saved;
										
										$lookup_list_item_where_args = [
											'type'=>'LookupListItem',
											'definition'=>[
												LookupListid=>$lookup_list['id'],
											],
										];
										
										$lookup_list_items = $client_db->GetRecords($lookup_list_item_where_args);
										
										if($lookup_list_items && count($lookup_list_items) && !$lookup_list_items[errors])
										{
											$imported_lookup_list_counts[$lookup_list['Title']] = count($lookup_list_items);
											$imported_lookup_list_counts_display[] = [$lookup_list['Title'], count($lookup_list_items) . ' item(s)'];
											
											foreach($lookup_list_items as $lookup_list_item)
											{
												$lookup_list_item_insert_args = [
													type=>'LookupListItem',
													definition=>[
														ItemKey=>$lookup_list_item['ItemKey'],
														ItemValue=>$lookup_list_item['ItemValue'],
														LookupListid=>$lookup_list_saved['id'],
													],
												];
												
												$lookup_list_item_saved = $this->db_access_object->CreateRecord($lookup_list_item_insert_args);
												$imported_lookup_list_items[] = $lookup_list_item_saved;
											}
										}
										
									#	print("ADD.<br>");
										$this->import_status = 1;
									}
									
								}
							}
							
							$this->lookup_lists_found = $lookup_lists;
							$this->imported_lookup_lists = $imported_lookup_lists;
							$this->imported_lookup_list_counts = $imported_lookup_list_counts;
							$this->imported_lookup_list_counts_display = $imported_lookup_list_counts_display;
							$this->imported_lookup_list_items = $imported_lookup_list_items;
							
						#	print("BT: FOUND...|" . (count($lookup_lists)) . "|...lists.");
							$client_db->DBEnd();
						}
					}
				}
			}
			
			return TRUE;
		}
		
		public function ViewAllLists()
		{
			$lookup_list_args = [
				'type'=>'LookupList',
				'definition'=>[
				],
			];
			
			$lookup_lists = $this->db_access_object->GetRecords($lookup_list_args);
			$new_lookup_lists = [];
			
			foreach($lookup_lists as $lookup_list)
			{
				$lookup_list_item_args = [
					'type'=>'LookupListItem',
					'definition'=>[
						LookupListid=>$lookup_list['id'],
					],
				];
				
				$lookup_list_items = $this->db_access_object->GetRecords($lookup_list_item_args);
				
				$lookup_list['itemscount'] = count($lookup_list_items);
				
				if($new_lookup_lists[$lookup_list['Title']])
				{
					$i = 1;
					
					while($new_lookup_lists[$lookup_list['Title'] . ' (' . $i . ')'])
					{
						$i++;
					}
					
					$lookup_list['Title'] .= ' (' . $i . ')';
				}
				
				$new_lookup_lists[$lookup_list['Title']] = $lookup_list;
			}
			
			ksort($new_lookup_lists);
			
			$this->lookup_lists = $new_lookup_lists;
			
			return TRUE;
		}
		
		public function EditList()
		{
			$lookup_list_id = $this->Param('LookupListid');
			
			if($lookup_list_id)
			{
				$lookup_list_args = [
					'type'=>'LookupList',
					'definition'=>[
						id=>$lookup_list_id,
					],
				];
				
				$lookup_list = $this->db_access_object->GetRecords($lookup_list_args)[0];
				
				if($lookup_list && $lookup_list['id'])
				{
					$this->lookup_list = $lookup_list;
					
					$lookup_list_item_args = [
						'type'=>'LookupListItem',
						'definition'=>[
							LookupListid=>$lookup_list['id'],
						],
					];
					
					$lookup_list_items = $this->db_access_object->GetRecords($lookup_list_item_args);
					
					$title = $this->Param('Title');
					$delete = $this->Param('DeleteList');
					
					#print("DELETE" . $delete);
					
					if($delete)
					{
						$delete_other_args = [
							type=>'LookupListItem',
							where=>'LookupListid = ?',
							sqlbindstring=>'i',
							wherevalues=>[$lookup_list['id']],
						];
						
						$this->db_access_object->DeleteRecords($delete_other_args);
						
						$delete_list_args = [
							type=>'LookupList',
							where=>'id = ?',
							sqlbindstring=>'i',
							wherevalues=>[$lookup_list['id']],
						];
						
						$this->db_access_object->DeleteRecords($delete_list_args);
						
						$this->delete = $delete;
						
						$this->lookup_list_items = $lookup_list_items;
					}
					else
					{
						if($title)
						{
							$this->Title = $title;
							
							if($title != $lookup_list['Title'])
							{
								$lookup_list_update_args = [
									type=>'LookupList',
									update=>[
										Title=>$title,
									],
									where=>[
										id=>$lookup_list['id'],
									],
								];
								
								$lookup_list_saved = $this->db_access_object->UpdateRecord($lookup_list_update_args)[0];
								
								$this->lookup_list_old = $lookup_list;
								$this->lookup_list = $lookup_list_saved;
								$lookup_list = $lookup_list_saved;
							}
							
							$this->lookup_list_items_old = $lookup_list_items;
							
							$item_keys = $this->Param('ItemKey');
							$item_values = $this->Param('ItemValue');
								
							$lookup_list_item_count = count($lookup_list_items);
							
							$new_lookup_list_items = [];
							
							for($i = 0; $i < $lookup_list_item_count; $i++)
							{
								if(count($item_keys) && count($item_values))
								{
									$lookup_list_item = $lookup_list_items[$i];
									$item_key = array_shift($item_keys);
									$item_value = array_shift($item_values);
									
									if($item_key && $item_value)
									{
										$lookup_list_item['ItemKey'] = $item_key;
										$lookup_list_item['ItemValue'] = $item_value;
										
										$new_lookup_list_items[] = $lookup_list_item;
									}
								}
								else
								{
									$i = $lookup_list_item_count;
								}
							}
							
							if(count($item_keys) && count($item_values))
							{
								foreach($item_keys as $item_key)
								{
									$item_value = array_shift($item_values);
									
									if($item_key && $item_value)
									{
										$lookup_list_item = [];
										$lookup_list_item['id'] = 0;
										$lookup_list_item['ItemKey'] = $item_key;
										$lookup_list_item['ItemValue'] = $item_value;
										$lookup_list_item['LookupListid'] = $lookup_list['id'];
										
										$new_lookup_list_items[] = $lookup_list_item;
									}
								}
							}
							
							$this->lookup_list_items_unsaved = $new_lookup_list_items;
							$lookup_list_items_saved = [];
							$lookup_list_item_ids_saved = [];
							
							foreach($new_lookup_list_items as $new_lookup_list_item)
							{
								if($new_lookup_list_item['id'])
								{
									$lookup_list_item_update_args = [
										type=>'LookupListItem',
										update=>$new_lookup_list_item,
										where=>[
											id=>$new_lookup_list_item['id'],
										],
									];
									
									$lookup_list_item_saved = $this->db_access_object->UpdateRecord($lookup_list_item_update_args)[0];
								}
								else
								{
									$lookup_list_item_insert_args = [
										type=>'LookupListItem',
										definition=>$new_lookup_list_item,
									];
									
									$lookup_list_item_saved = $this->db_access_object->CreateRecord($lookup_list_item_insert_args);
								}
								
								$lookup_list_items_saved[] = $lookup_list_item_saved;
								$lookup_list_item_ids_saved[] = $lookup_list_item_saved['id'];
							}
							
							$this->lookup_list_items = $lookup_list_items_saved;
							
							$delete_item_args = [
								type=>'LookupListItem',
								field=>'id',
								fieldtype=>'i',
								notin=>$lookup_list_item_ids_saved,
								extrawhere=>'LookupListid = ' . $lookup_list['id'],
							];
							
							$delete_results = $this->db_access_object->DeleteOtherRecords($delete_item_args);
						}
						else
						{
							$this->lookup_list_items = $lookup_list_items;
						}
					}
					
					return $lookup_list['id'];
				}
			}
			
			return FALSE;
		}
		
		public function ViewAllListsAndItems()
		{
			$lookup_list_args = [
				'type'=>'LookupList',
				'definition'=>[
				],
			];
			
			$lookup_lists = $this->db_access_object->GetRecords($lookup_list_args);
			
			$this->lookup_lists = $lookup_lists;
			$loaded_lookup_lists = [];
			
			foreach($lookup_lists as $lookup_list)
			{
				$lookup_list_item_args = [
					'type'=>'LookupListItem',
					'definition'=>[
						LookupListid=>$lookup_list['id'],
					],
				];
				
				$lookup_list_items = $this->db_access_object->GetRecords($lookup_list_item_args);
				$lookup_list[items] = $lookup_list_items;
				$items_to_display = [];
				
				foreach($lookup_list_items as $lookup_list_item)
				{
					$items_to_display[] = [$lookup_list_item['ItemKey'], $lookup_list_item['ItemValue']];
				}
				
				$lookup_list[itemsdisplay] = $items_to_display;
				
				if($loaded_lookup_lists[$lookup_list['Title']])
				{
					$i = 1;
					
					while($loaded_lookup_lists[$lookup_list['Title'] . ' (' . $i . ')'])
					{
						$i++;
					}
					
					$lookup_list['Title'] .= ' (' . $i . ')';
				}
								
				$loaded_lookup_lists[$lookup_list['Title']] = $lookup_list;
			}
			
			ksort($loaded_lookup_lists);
			
			$this->loaded_lookup_lists = $loaded_lookup_lists;
			
			return TRUE;
		}
		
		public function DetectAndFixBlankListTitles()
		{
			$this->SetDBAdmin();
			$this->broken_entries = $this->DBAdminDetectBlankListTitles();
			$this->broken_entries_count = count($this->broken_entries);
			
			$run_fixing = $this->Param('fix');
			
			if($run_fixing)
			{
				#print("BT: FIX!");
				$broken_entries = $this->broken_entries;
				for($i = 0; $i < $this->broken_entries_count; $i++)
				{
					$broken_entry = $broken_entries[$i];
					
					$entry_update_args = [
						type=>'Entry',
						update=>[
							'ListTitle'=>$this->GenerateEntryListTitle([entry=>$broken_entry]),
						],
						where=>[
							id=>$broken_entry['id'],
						],
					];
					
					$this->db_access_object->UpdateRecord($entry_update_args);
				}
			}
			
			return TRUE;
		}
		
		public function DetectAndFixBritishSpellings() {
			$this->SetDBAdmin();
			
			$run_fixing = $this->Param('fix');
			
			if($run_fixing)
			{
				$record_type = $this->Param('record-type');
				$specific_record = $this->Param('specific-record');
				
				$this->recordtype = $record_type;
				$this->specificrecord = $specific_record;
				
				ini_set('memory_limit','400M');
				set_time_limit(120);
				
				require('../classes/Language/AmericanBritishSpellings.php');
				$american_british_spellings = new AmericanBritishSpellings();
				
				$mysql_table_args = [
					'type'=>$record_type,
					'definition'=>[],
				];
				
				if($specific_record != 0) {
					$specific_record_pieces = explode('-', $specific_record);
					$specific_record_pieces_count = count($specific_record_pieces);
					
					if($specific_record_pieces_count == 2) {
						$min_id = (int)$specific_record_pieces[0];
						$max_id = (int)$specific_record_pieces[1];
						
						$mysql_table_args['definition'] =
							[
								'RAW'=>[
									'id'=>[
										'>= ' . $min_id . ' AND id <= ',	# DB Accessor, I'm comin' for you!
										$max_id,
									],
								],
							];
					} else {
						$mysql_table_args['definition']['id'] = $specific_record;
					}
				}
				
				$mysql_table_results = $this->db_access_object->GetRecords($mysql_table_args);
				$fix_results = [];
				
				foreach ($mysql_table_results as $mysql_table_result) {
		//			print("BT: I have results!!!" . $mysql_table_result['id'] . "|<BR><BR>");
					$update_record = FALSE;
					$new_mysql_row = $mysql_table_result;
					switch($record_type) {
						case 'Entry':
							$new_mysql_row['Title'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Title']]);
							$new_mysql_row['Subtitle'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Subtitle']]);
							$new_mysql_row['ListTitle'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['ListTitle']]);
							$code_pieces = explode('-', $new_mysql_row['Code']);
							
							$new_code_pieces = [];
							
							foreach ($code_pieces as $code_piece) {
								$new_code_pieces[] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['ListTitle']]);
							}
							
							$new_mysql_row['Code'] = implode('-', $new_code_pieces);
							
							if(
								($new_mysql_row['Title'] != $mysql_table_result['Title']) ||
								($new_mysql_row['Subtitle'] != $mysql_table_result['Subtitle']) ||
								($new_mysql_row['ListTitle'] != $mysql_table_result['ListTitle']) ||
								($new_mysql_row['Code'] != $mysql_table_result['Code']) ||
							0) {
								$update_record = TRUE;
							}
							
							break;
							
						case 'EntryTranslation':
							$new_mysql_row['Title'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Title']]);
							$new_mysql_row['Subtitle'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Subtitle']]);
							$new_mysql_row['ListTitle'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['ListTitle']]);
							
							if(
								($new_mysql_row['Title'] != $mysql_table_result['Title']) ||
								($new_mysql_row['Subtitle'] != $mysql_table_result['Subtitle']) ||
								($new_mysql_row['ListTitle'] != $mysql_table_result['ListTitle']) ||
							0) {
								$update_record = TRUE;
							}
							
							break;
							
						case 'TextBody':
							$new_mysql_row['Text'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Text']]);
							$new_mysql_row['Source'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Source']]);
							
							if(
								($new_mysql_row['Text'] != $mysql_table_result['Text']) ||
								($new_mysql_row['Source'] != $mysql_table_result['Source']) ||
							0) {
								$update_record = TRUE;
							}
							
							break;
						
						case 'Tag':
							$new_mysql_row['Tag'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Tag']]);
							
							if(
								($new_mysql_row['Tag'] != $mysql_table_result['Tag']) ||
							0) {
								$update_record = TRUE;
							}
							
							break;
							
						case 'Description':
							$new_mysql_row['Description'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Description']]);
							$new_mysql_row['Source'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Source']]);
							
							if(
								($new_mysql_row['Description'] != $mysql_table_result['Description']) ||
								($new_mysql_row['Source'] != $mysql_table_result['Source']) ||
							0) {
								$update_record = TRUE;
							}
							
							break;
							
						case 'Link':
							$new_mysql_row['Title'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Title']]);
							
							if(
								($new_mysql_row['Title'] != $mysql_table_result['Title']) ||
							0) {
								$update_record = TRUE;
							}
							
							break;
							
						case 'Image':
							$new_mysql_row['Title'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Title']]);
							$new_mysql_row['Description'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Description']]);
							
							if(
								($new_mysql_row['Title'] != $mysql_table_result['Title']) ||
								($new_mysql_row['Description'] != $mysql_table_result['Description']) ||
							0) {
								$update_record = TRUE;
							}
							
							break;
							
						case 'ImageTranslation':
							$new_mysql_row['Title'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Title']]);
							$new_mysql_row['Description'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Description']]);
							
							if(
								($new_mysql_row['Title'] != $mysql_table_result['Title']) ||
								($new_mysql_row['Description'] != $mysql_table_result['Description']) ||
							0) {
								$update_record = TRUE;
							}
							
							break;
						
						case 'Quote':
							$new_mysql_row['Quote'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Quote']]);
							$new_mysql_row['Source'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Source']]);
							
							if(
								($new_mysql_row['Quote'] != $mysql_table_result['Quote']) ||
								($new_mysql_row['Source'] != $mysql_table_result['Source']) ||
							0) {
								$update_record = TRUE;
							}
							
							break;
							
						case 'EventDate':
							$new_mysql_row['Title'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Title']]);
							$new_mysql_row['Description'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Description']]);
							
							if(
								($new_mysql_row['Title'] != $mysql_table_result['Title']) ||
								($new_mysql_row['Description'] != $mysql_table_result['Description']) ||
							0) {
								$update_record = TRUE;
							}
							
							break;
							
						case 'Definition':
							$new_mysql_row['Term'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Term']]);
							$new_mysql_row['PartOfSpeech'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['PartOfSpeech']]);
							$new_mysql_row['Etymology'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Etymology']]);
							$new_mysql_row['Definition'] = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$new_mysql_row['Definition']]);
							
							if(
								($new_mysql_row['Term'] != $mysql_table_result['Term']) ||
								($new_mysql_row['PartOfSpeech'] != $mysql_table_result['PartOfSpeech']) ||
								($new_mysql_row['Etymology'] != $mysql_table_result['Etymology']) ||
								($new_mysql_row['Definition'] != $mysql_table_result['Definition']) ||
							0) {
								$update_record = TRUE;
							}
							
							break;
					}
					
					if($update_record) {
						if(!$fix_results[$record_type]) {
							$fix_results[$record_type] = [];
						}
						
						$fix_results[$record_type][$new_mysql_row['id']] = $new_mysql_row;
						
						unset($new_mysql_row['id']);
						$entry_update_args = [
							type=>$record_type,
							update=>$new_mysql_row,
							where=>[
								id=>$mysql_table_result['id'],
							],
						];
						$this->db_access_object->UpdateRecord($entry_update_args);
					}
				}
				$this->fixresults = $fix_results;
				
			//	$fixed = $american_british_spellings->SwapBritishSpellingsForAmericanSpellings(['text'=>$textbody['Text']]);
			}
			
			return TRUE;
		}
		
		public function ArchiveURLDetect() {
			return $this->DetectURLIssue([
				'definition'=>[
					'Title'=>[
						'= "Archive" AND URL RLIKE \'\\\\*\'',
					],
				],
			]);
		}
		
		public function ArchivesURLDetect() {
			return $this->DetectURLIssue([
				'definition'=>[
					'Title'=>[
						'= "Archives" AND URL != "http://www.oocities.org/" AND URL NOT RLIKE \'\\\\*\'',
					],
				],
			]);
		}
		
		public function CustomDelimitedDBSDetect() {
			return $this->DetectURLIssue([
				'definition'=>[
					'URL'=>[
						'RLIKE " ~ "',
					],
				],
			]);
		}
		
		public function DeactivatedSiteDetect() {
			return $this->DetectURLIssue([
				'definition'=>[
					'URL'=>[
						'RLIKE \'facebook.com|myspace.com|yahoo.com|.wayback.\'',
					],
				],
			]);
		}
		
		public function CopyPasteIssuesURLsDetect() {
			return $this->DetectURLIssue([
				'definition'=>[
					'URL'=>[
						'RLIKE \'^[^http|ftp]\'',
					],
				],
			]);
		}
		
		public function DetectURLIssue($args) {
			$this->SetORMBasics();
			$do_detection = $this->Param('do-detection');
			
			if($do_detection) {
				$this->do_detection = $do_detection;
				
				$definition = $args['definition'];
				$link_args = [
					'type'=>'Link',
					'definition'=>[
						RAW=>$definition
					],
				];
				
				$bad_links = $this->db_access_object->GetRecords($link_args);
			//	print_r($bad_links);
				$entryids = [];
				$bad_link_entryid_hash = [];
				
				$bad_links_length = count($bad_links);
				
				if($bad_links_length == 0) {
					$this->StatusDataArray = [];
					
					return TRUE;
				}
				
				for($i = 0; $i < $bad_links_length; $i++) {
					$bad_link = $bad_links[$i];
					$entryids[] = (int) $bad_link[Entryid];
					$bad_link_entryid_hash[$bad_link[Entryid]] = $bad_link;
				}
				
				$entryidstring = implode(',', $entryids);
				
				$get_record_where = [
					type=>'Entry',
					'definition'=>[
						'RAW'=>[
							id=>[
								'IN',
								'(' . $entryidstring . ')',
							],
						],
					],
				];
				
				$entries = $this->db_access_object->GetRecords($get_record_where);
				$entries_count = count($entries);
				
				for($i = 0; $i < $entries_count; $i++) {
					$entry = $entries[$i];
					$bad_link = $bad_link_entryid_hash[$entry['id']];
					
					$entry['badlink'] = $bad_link;
					$entries[$i] = $entry;
				}
				
				#print("<PRE>");
				$entries = $this->GetEntriesParents(['entries'=>$entries]);
				
				#print_r();
				#print("</PRE>");
				
				$this->StatusDataArray = $entries;
			}
			
			return TRUE;
		}
		
				// Images
				// -----------------------------------
				// -----------------------------------
				// -----------------------------------
		
		public function DetectBlankImageFields() {
			$definition = 'StandardFileName = ""';# OR StandardPixelWidth = 0 OR StandardPixelHeight = 0';
			$mysql_table_args = [
				'type'=>'Image',
				'definition'=>[
					RAW=>$definition,
				],
			];
			
			$mysql_table_results = $this->db_access_object->GetRecords($mysql_table_args);
			
			$this->broken_records = $mysql_table_results;
			$this->broken_entries_count = count($this->broken_records);
			$image_fields = [
				'id',
				'Title',
				'Description',
				'FileName',
				'FileDirectory',
				'IconFileName',
				'StandardFileName',
				'Entryid',
				'PixelWidth',
				'PixelHeight',
				'IconPixelWidth',
				'IconPixelHeight',
				'StandardPixelWidth',
				'StandardPixelHeight',
				'OriginalCreationDate',
				'LastModificationDate',
			];
			array_unshift($this->broken_records, $image_fields);
			
			return TRUE;
		}
		
		public function DetectMissingImageFiles() {
			if(!$this->Param('fix')) {
				return TRUE;
			}
			
			$mysql_table_args = [
				'type'=>'Image',
				'definition'=>[
				],
			];
			
			$images = $this->db_access_object->GetRecords($mysql_table_args);
			
			$image_count = count($images);
			
			$this->image_count = $image_count;
			
			$images_dir = 'image/';
			
			$error_images = [];
			
			for($i = 0; $i < $image_count; $i++) {
				$image = $images[$i];
				$image_directory = $image['FileDirectory'];
				
				$image_hash_pieces = str_split($image_directory);
				$image_dir = implode('/', $image_hash_pieces);
				
				$original_image_location = $images_dir . $image_dir . '/' . $image['FileName'];
				$icon_image_location = $images_dir . $image_dir . '/' . $image['IconFileName'];
				$standard_image_location = $images_dir . $image_dir . '/' . $image['StandardFileName'];
				
				if(!is_file($original_image_location)) {
					$image['CAUSE OF ERROR'] = 'Missing file for, "Image.FileName".';
					$error_images[] = $image;
				}
				
				if(!is_file($icon_image_location)) {
					$image['CAUSE OF ERROR'] = 'Missing file for, "Image.IconFileName".';
					$error_images[] = $image;
				}
				
				if(!is_file($standard_image_location)) {
					$image['CAUSE OF ERROR'] = 'Missing file for, "Image.StandardFileName".';
					$error_images[] = $image;
				}
			}
			$this->broken_entries_count = count($error_images);
			
			$image_fields = [
				'id',
				'Title',
				'Description',
				'FileName',
				'FileDirectory',
				'IconFileName',
				'StandardFileName',
				'Entryid',
				'PixelWidth',
				'PixelHeight',
				'IconPixelWidth',
				'IconPixelHeight',
				'StandardPixelWidth',
				'StandardPixelHeight',
				'OriginalCreationDate',
				'LastModificationDate',
				'Cause of Error',
			];
			
			array_unshift($error_images, $image_fields);
			
			$this->broken_records = $error_images;
			
			return TRUE;
		}
		
		public function FixBlankImageFields() {
			if(!$this->Param('fix')) {
				return TRUE;
			}
			
			$definition = 'StandardFileName = ""';# OR StandardPixelWidth = 0 OR StandardPixelHeight = 0';
			$mysql_table_args = [
				'type'=>'Image',
				'definition'=>[
					RAW=>$definition,
				],
			];
			
			$blank_image_records = $this->db_access_object->GetRecords($mysql_table_args);
			$blank_image_records_count = count($blank_image_records);
			
			for($i = 0; $i < $blank_image_records_count; $i++) {
				$blank_image_record = $blank_image_records[$i];
				
				$alternate_old_filenames = $this->makeAlternateFileNames(['filename'=>$blank_image_record['FileName']]);
				
				if(!$blank_image_record['StandardFileName']) {
					$image_update_args = [
						type=>'Image',
						update=>[
							'StandardFileName'=>$alternate_old_filenames['standard_name'],
						],
						where=>[
							id=>$blank_image_record['id'],
						],
					];
					
					$this->db_access_object->UpdateRecord($image_update_args);
				}
			}
			
			$this->broken_records = $blank_image_records;
			$this->broken_entries_count = $blank_image_records_count;
			$image_fields = [
				'id',
				'Title',
				'Description',
				'FileName',
				'FileDirectory',
				'IconFileName',
				'StandardFileName',
				'Entryid',
				'PixelWidth',
				'PixelHeight',
				'IconPixelWidth',
				'IconPixelHeight',
				'StandardPixelWidth',
				'StandardPixelHeight',
				'OriginalCreationDate',
				'LastModificationDate',
			];
			array_unshift($this->broken_records, $image_fields);
			
			return TRUE;
		}
		
		public function FixMissingImages() {
			if(!$this->Param('fix')) {
				return TRUE;
			}
			
			ini_set('memory_limit','400M');
			ini_set('max_execution_time', 120);
			$mysql_table_args = [
				'type'=>'Image',
				'definition'=>[
				],
			];
			
			$images = $this->db_access_object->GetRecords($mysql_table_args);
			
			$image_count = count($images);
			
			$this->image_count = $image_count;
			
			$images_dir = 'image/';
			
			$error_images = [];
			
			for($i = 0; $i < $image_count; $i++) {
				$image = $images[$i];
				$image_directory = $image['FileDirectory'];
				
				$image_hash_pieces = str_split($image_directory);
				$image_dir = implode('/', $image_hash_pieces);
				
				$original_image_location = $images_dir . $image_dir . '/' . $image['FileName'];
				$icon_image_location = $images_dir . $image_dir . '/' . $image['IconFileName'];
				$standard_image_location = $images_dir . $image_dir . '/' . $image['StandardFileName'];
				
				if(!is_file($original_image_location)) {
					$image['CAUSE OF ERROR'] = 'Missing file for, "Image.FileName".';
					$error_images[] = $image;
				}
				
				if(!is_file($icon_image_location)) {
					$image['CAUSE OF ERROR'] = 'Missing file for, "Image.IconFileName".';
					$error_images[] = $image;
				}
				
				if(!is_file($standard_image_location) || $image['StandardPixelWidth'] == 0 || $image['StandardPixelHeight'] == 0) {
					$resize_args = [
						'filelocation'=>$original_image_location,
						'resizedlocation'=>$standard_image_location,
					];
					$standard_results = $this->makeStandardImage($resize_args);
					
					if(!$standard_results['resizedwidth']) {
						$standard_results['resizedwidth'] = $standard_results['originalwidth'];
					}
					
					if(!$standard_results['resizedheight']) {
						$standard_results['resizedheight'] = $standard_results['originalheight'];
					}
					
					$image_update_args = [
						type=>'Image',
						update=>[
							'StandardPixelWidth'=>$standard_results['resizedwidth'],
							'StandardPixelHeight'=>$standard_results['resizedheight'],
						],
						where=>[
							id=>$image['id'],
						],
					];
					
					$this->db_access_object->UpdateRecord($image_update_args);
					
					$image['CAUSE OF ERROR'] = 'Missing file for, "Image.StandardFileName".';
					$error_images[] = $image;
				}
			}
			
			$this->broken_records = $error_images;
			$this->broken_entries_count = count($error_images);
			$image_fields = [
				'id',
				'Title',
				'Description',
				'FileName',
				'FileDirectory',
				'IconFileName',
				'StandardFileName',
				'Entryid',
				'PixelWidth',
				'PixelHeight',
				'IconPixelWidth',
				'IconPixelHeight',
				'StandardPixelWidth',
				'StandardPixelHeight',
				'OriginalCreationDate',
				'LastModificationDate',
			];
			array_unshift($this->broken_records, $image_fields);
			
			return TRUE;
		}
		
		public function DetectMissingDates() {
			$args = [
				'missingtype'=>'EventDate',
			];
			
			return $this->DetectMissingAnything($args);
		}
		
		public function DetectMissingImages() {
			$args = [
				'missingtype'=>'Image',
			];
			
			return $this->DetectMissingAnything($args);
		}
		
		public function DetectMissingTags() {
			$args = [
				'missingtype'=>'Tag',
			];
			
			return $this->DetectMissingAnything($args);
		}
		
		public function DetectMissingLinks() {
			$args = [
				'missingtype'=>'Link',
			];
			
			return $this->DetectMissingAnything($args);
		}
		
		public function DetectMissingTextBodies() {
			$args = [
				'missingtype'=>'TextBody',
			];
			
			return $this->DetectMissingAnything($args);
		}
		
		public function DetectMissingDescriptions() {
			$args = [
				'missingtype'=>'Description',
			];
			
			return $this->DetectMissingAnything($args);
		}
		
		public function DetectMissingQuotes() {
			$args = [
				'missingtype'=>'Quote',
			];
			
			return $this->DetectMissingAnything($args);
		}
		
		public function DetectMissingAssociations() {
			$args = [
				'missingtype'=>'Association',
			];
			
			return $this->DetectMissingAnything($args);
		}
		
		public function DetectMissingAnything($args) {
			if(!$this->Param('fix')) {
				return TRUE;
			}
			
			$entry_level = (int)$this->Param('level');
			
			if(!$entry_level) {
				return TRUE;
			}
			
			$missing_type = $args['missingtype'];
			
			$this->SetOrmBasics();
			
			$left_join = '';
			
			if($entry_level == 1) {
				$left_join = 'LEFT JOIN ' . $missing_type . ' ON ' . $missing_type . '.Entryid = Entry.id WHERE ISNULL(' . $missing_type . '.id)';
			}
			
			$entries = $this->getPrimaryEntries(['extrawhere'=>$left_join]);
			
			for($i = 1; $i < $entry_level; $i++) {
				$entry_ids = [];
				$entry_count = count($entries);
				
				for($j = 0; $j < $entry_count; $j++) {
					$entry = $entries[$j];
					$entry_ids[] = $entry['Childid'];
				}
				
				$entry_id_string = implode(',', $entry_ids);
				
				$left_join = '';
				
				if($i + 1 == $entry_level) {
					$left_join = 'LEFT JOIN ' . $missing_type . ' ON ' . $missing_type . '.Entryid = Entry.id WHERE ISNULL(' . $missing_type . '.id)';
				}
				
				$entries = $this->db_access_object->RunQuery([
					'sql'=>'SELECT Entry.*, ass.id AS Assignmentid, ass.Childid from Entry JOIN Assignment ass ON ass.Parentid IN(' . $entry_id_string . ') AND ass.Childid = Entry.id ' .
					$left_join,
				]);
			}
			
			$entries_count = count($entries);
			
			for($i = 0; $i < $entries_count; $i++) {
				$entry = $entries[$i];
				$entry['Title'] = '<a href="/?id=' . $entry['Assignmentid'] . '">' . $entry['Title'] . '</a>';
				$entries[$i] = $entry;
			}
			
			$this->broken_records = $entries;
			$this->broken_records_count = $entries_count;
			
			$entry_fields = [
				'id',
				'Title',
				'Subtitle',
				'ListTitle',
				'Code',
				'OriginalCreationDate',
				'LastModificationDate',
				'Assignment.id',
				'Assignment.Childid',
			];
			array_unshift($this->broken_records, $entry_fields);
			
			return TRUE;
		}
		
		public function getPrimaryEntries($args) {
			$sql = 'SELECT Entry.*, ass.Childid from Entry JOIN Assignment ass ON ass.Parentid = ' . $this->master_record['id'] . ' AND ass.Childid = Entry.id';
			
			$extra_where = $args['extrawhere'];
			
			$sql .= ' ' . $extra_where;
			
			return $this->db_access_object->RunQuery([
				'sql'=>$sql,
			]);
		}
		
		public function DetectEntryCodeLength($args) {
			if(!$this->Param('fix')) {
				return TRUE;
			}
			
			$length = (int)$this->Param('length');
			
			if(!$length) {
				return TRUE;
			}
			
			$missing_type = $args['missingtype'];
			
			$this->SetOrmBasics();
			
			$entries = $this->db_access_object->RunQuery([
				'sql'=>'SELECT Entry.*, ass.id AS Assignmentid, ass.Childid from Entry JOIN Assignment ass ON ass.Childid = Entry.id ' .
				'WHERE LENGTH(Entry.Code) > ' . $length,
			]);
			
			$entries_count = count($entries);
			
			for($i = 0; $i < $entries_count; $i++) {
				$entry = $entries[$i];
				$entry['Title'] = '<a href="/?id=' . $entry['Assignmentid'] . '">' . $entry['Title'] . '</a>';
				$entries[$i] = $entry;
			}
			
			$this->broken_records = $entries;
			$this->broken_records_count = $entries_count;
			
			$entry_fields = [
				'id',
				'Title',
				'Subtitle',
				'ListTitle',
				'Code',
				'OriginalCreationDate',
				'LastModificationDate',
				'Assignment.id',
				'Assignment.Childid',
			];
			array_unshift($this->broken_records, $entry_fields);
			
			return TRUE;
		}
		
		public function DetectBadText() {
			$type = $this->Param('type');
			
			$algorithm = $this->Param('algorithm');
			$this->algorithm = $algorithm;
			$correction_start_id = (int)$this->Param('correction-id-start');
			$correction_end_id = (int)$this->Param('correction-id-last');
			
			$this->correction_start_id = $correction_start_id;
			$this->correction_end_id = $correction_end_id;
			
			require('../classes/Language/EnglishMisspellings.php');
			$this->misspellings = new EnglishMisspellings();
			$misspellings = $this->misspellings->GetWords_Misspelled();
			$this->misspellingscount = count($misspellings);
			
			require('../classes/Language/IntensiveEnglishMisspellings.php');
			$this->intensivemisspellings = new IntensiveEnglishMisspellings();
			$intensive_misspellings = $this->intensivemisspellings->GetWords_Misspelled();
			$this->intensivemisspellingscount = count($intensive_misspellings);
			
				// VALIDATE, if start/end is higher than valid
				
			$this->maxmin = $this->getMinMaxForField(['table'=>'Entry', 'field'=>'id']);
			
			if($type) {
				$this->type = $type;
				
				$correction_start_id = (int)$this->Param('correction-id-start');
				$correction_end_id = (int)$this->Param('correction-id-last');
				$entry_start_id = (int)$this->Param('entry-id-start');
				$entry_end_id = (int)$this->Param('entry-id-last');
				
				$this->entry_start = $entry_start_id;
				$this->entry_end = $entry_end_id;
				
				$type_pieces = split('_', $type);
				
				$record_type = $type_pieces[0];
				$record_field = $type_pieces[1];
				
				$this->recordtype = $record_type;
				$this->recordfield = $record_field;
				
				ini_set('memory_limit','400M');	# hold onto yer butts
				ini_set('max_execution_time', 120);
				
				$misspellings = array_splice($misspellings, $correction_start_id, $correction_end_id - $correction_start_id);
				
				
				if($record_type == 'TextBody') {
					$search_args = [
						'entrystartid'=>$entry_start_id,
						'entryendid'=>$entry_end_id,
					];
					if($algorithm == 'standard') {
						$search_args['misspellings'] = $misspellings;
						$this->standardTextBodySearch($search_args);
					} elseif($algorithm == 'intensive') {
						$search_args['misspellings'] = $intensive_misspellings;
						$this->intensiveTextBodySearch($search_args);
					}
				} elseif($record_type == 'Entry') {
					$valid_entry_fields = [
						'Title'=>TRUE,
						'Subtitle'=>TRUE,
						'ListTitle'=>TRUE,
						'ListTitleSortKey'=>TRUE,
						'Code'=>TRUE,
					];
					if($valid_entry_fields[$record_field]) {
						$new_misspellings = [];
						
						foreach($misspellings as $misspelling) {
							$misspelling = str_replace('*', '\\\\*', $misspelling);
							$new_misspellings[] = '[[:<:]]' . $misspelling . '[[:>:]]';
						}
						
						$misspellings = $new_misspellings;
						
						
						$misspelling_string = implode('|', $misspellings);
						$sql = 'SELECT * FROM Entry WHERE ' . $record_field . ' REGEXP "' . $misspelling_string . '"';
						
						if($where) {
							$sql .= ' AND ' . $where;
						}
						
						$entries = $this->db_access_object->RunQuery([
							'sql'=>$sql,
						]);
						
						$this->search_results = $entries;
						$this->search_header = [['id', 'xyz']];
					}
				}
				
				$this->search_results_count = count($this->search_results);
			}
			
			return TRUE;
		}
		
		public function standardTextBodySearch($args) {
			$misspellings = $args['misspellings'];
			$entry_start_id = $args['entrystartid'];
			$entry_end_id = $args['entryendid'];
			
			$where = 'Entry.id >= ' . $entry_start_id . ' AND Entry.id <= ' . $entry_end_id . ' ';
			
			$new_misspellings = [];
			
			foreach($misspellings as $misspelling) {
				if(preg_match('/\s/', $misspelling)) {
					$misspelling = '"' . $misspelling . '"';
				}
				$misspelling = str_replace('*', '\*', $misspelling);
				//print($misspelling);
				$new_misspellings[] = $misspelling;
			}
			
			$misspellings = $new_misspellings;
		
			$this->SetORMSearch();
			
			$search_results = $this->orm_search->Search([
				'searchterms'=>$misspellings,
				'where'=>$where,
			]);
			
			$textbody_id_list = [];
			$entry_id_list = [];
			
			foreach($search_results as $search_index => $search_result) {
				$textbody_id_list[] = $search_result['TextBody_id'];
				$entry_id_list[] = $search_result['TextBody_Entryid'];
			}
			
			$textbody_id_string = join(',', $textbody_id_list);
			
			$sql = 'SELECT * FROM TextBody WHERE ID IN(' . $textbody_id_string . ')';
			
			$texts = $this->db_access_object->RunQuery([
				'sql'=>$sql,
			]);
			
			$entry_id_string = join(',', $entry_id_list);
			
			$sql = 'SELECT * FROM Assignment WHERE Childid IN(' . $entry_id_string . ')';
			
			$assignments = $this->db_access_object->RunQuery([
				'sql'=>$sql,
			]);
			
			$assignment_lookup = [];
			
			foreach($assignments as $assignment) {
				$assignment_lookup[$assignment['Childid']] = $assignment;
			}
			
			$text_lookup = [];
			
			foreach($texts as $text) {
				$text_lookup[$text['id']] = $text;
			}
			
			foreach($search_results as $search_index => $search_result) {
				$text = $text_lookup[$search_results[$search_index]['TextBody_id']];
				$assignment = $assignment_lookup[$search_results[$search_index]['TextBody_Entryid']];
				
				$matched_words = [];
				
				foreach($misspellings as $misspelling) {
					$testable_misspelling = str_replace('"', '', $misspelling);
					$testable_misspelling = str_replace(' ', '\s', $testable_misspelling);
					if(preg_match('/\b' . $testable_misspelling . '\b/i', $text['Text'])) {
						$matched_words[] = $misspelling;
					}
				}
		
				$matched_count = count($matched_words);
				
				if($matched_count > 0) {
					unset($search_results[$search_index]['TextBody_id']);
					unset($search_results[$search_index]['score']);
					
					$search_results[$search_index][] = join(', ', $matched_words);
					$search_results[$search_index][] = '<a href="/?id=' . $assignment['id'] . '">View</a>';
					$search_results[$search_index][] = '<a href="/?id=' . $assignment['id'] . '&action=Edit">Edit</a>';
				} else {
					unset($search_results[$search_index]);
				}
			}
			
			$this->search_results = $search_results;
			$this->search_header = [['Entryid', 'Words', 'View', 'Edit']];
			
			return TRUE;
		}
		
		public function intensiveTextBodySearch($args) {
			$misspellings = $args['misspellings'];
			$entry_start_id = $args['entrystartid'];
			$entry_end_id = $args['entryendid'];
			
			$where = 'Entryid >= ' . $entry_start_id . ' AND Entryid <= ' . $entry_end_id . ' ';
			
			$sql = 'SELECT Text, Entryid FROM TextBody WHERE ' . $where;
			
			$texts = $this->db_access_object->RunQuery([
				'sql'=>$sql,
			]);
		
			$entry_id_list = [];
			
			foreach($texts as $text) {
				$entry_id_list[] = $text['Entryid'];
			}
			
			$entry_id_string = join(',', $entry_id_list);
			
			$sql = 'SELECT * FROM Assignment WHERE Childid IN(' . $entry_id_string . ')';
			#print("BT: SQL!" . $sql . "|<BR><BR>");
			$assignments = $this->db_access_object->RunQuery([
				'sql'=>$sql,
			]);
			
			$assignment_lookup = [];
			
			foreach($assignments as $assignment) {
				$assignment_lookup[$assignment['Childid']] = $assignment;
			}
			
			$lookup_results = [];
			
			$skip = [
				'i.e'=>TRUE,
			];
			
			foreach($texts as $text) {
				foreach($misspellings as $misspelling) {
					$testable_misspelling = str_replace('"', '', $misspelling);
					$testable_misspelling = str_replace(' ', '\s', $testable_misspelling);
					$testable_misspelling = str_replace('.', '\.', $testable_misspelling);
					$testable_misspelling = str_replace('?', '\?', $testable_misspelling);
					$testable_misspelling = str_replace('!', '\!', $testable_misspelling);
					
					$results = preg_match('/' . $testable_misspelling . '/', $text['Text'], $matched);
					
					if($results) {
						$good = TRUE;
						foreach($matched as $match) {
							if($skip[$match]) {
								$good = FALSE;
							}
						}
						
						if($good) {
							if(!$search_results[$text['Entryid']]) {
								$lookup_results[$text['Entryid']] = [];
							}
							
							foreach($matched as $match) {
								$lookup_results[$text['Entryid']][] = $match;
							}
						}
					}
				}
			}
			
			$search_results = [];
			
			foreach($lookup_results as $entry_id => $lookup_result) {
				$assignment = $assignment_lookup[$entry_id];
				$misspelling_string = join(', ', $lookup_result);
				$search_results[] = [
					$entry_id,
					$misspelling_string,
					'<a href="/?id=' . $assignment['id'] . '">View</a>',
					'<a href="/?id=' . $assignment['id'] . '&action=Edit">Edit</a>',
				];
			}
			
			$this->search_results = $search_results;
			$this->search_header = [['Entryid', 'Words', 'View', 'Edit']];
			
			return TRUE;
		}
		
		public function getMinMaxForField($args) {
			$field = $args['field'];
			$table = $args['table'];
			
			$sql = 'SELECT MAX(' . $field . ') max, MIN(' . $field . ') min ';
			$sql .= 'FROM ' . $table;
			
			$max_min = $this->db_access_object->RunQuery([
				'sql'=>$sql,
			])[0];
			
			return $max_min;
		}
		
		public function SetORMSearch() {
			require('../classes/Database/ORMSearch.php');
			
			return $this->orm_search = new ORMSearch(['dbaccessobject'=>$this->db_access_object]);
		}
		
		public function PerformSearch($args) {
			return $this->search_results = $this->orm_search->Search([
				'searchterms'=>$args['search_terms'],
			]);
		}
		
		public function SetEntryScoreList() {
			$entry_scores = [];
			
			foreach($this->search_results as $search_result)
			{
				$entry_scores[$search_result['TextBody_Entryid']] = $search_result['score'];
			}
			
			return $this->entry_scores = $entry_scores;
		}
		
						// INFORMATION_SCHEMA Functions
						// --------------------------------------------------------------
		
		public function ViewMySQLCharacterSetsTable() { return $this->ViewMySQLInformationSchemaBase([field=>'CharacterSets']); }
		public function ViewMySQLCollationCharacterSetApplicabilityTable() { return $this->ViewMySQLInformationSchemaBase([field=>'CollationCharacterSetApplicability']); }
		public function ViewMySQLCollationsTable() { return $this->ViewMySQLInformationSchemaBase([field=>'Collations']); }
		public function ViewMySQLColumnPrivilegesTable() { return $this->ViewMySQLInformationSchemaBase([field=>'ColumnPrivileges']); }
		public function ViewMySQLColumnsTable() { return $this->ViewMySQLInformationSchemaBase([field=>'Columns']); }
		public function ViewMySQLDatabases() { return $this->ViewMySQLInformationSchemaBase([field=>'Databases']); }
		public function ViewMySQLEnginesTable() { return $this->ViewMySQLInformationSchemaBase([field=>'Engines']); }
		public function ViewMySQLEventsTable() { return $this->ViewMySQLInformationSchemaBase([field=>'Events']); }
		public function ViewMySQLFilesTable() { return $this->ViewMySQLInformationSchemaBase([field=>'Files']); }
		public function ViewMySQLGlobalStatusTable() { return $this->ViewMySQLInformationSchemaBase([field=>'GlobalStatus']); }
		public function ViewMySQLGlobalVariablesTable() { return $this->ViewMySQLInformationSchemaBase([field=>'GlobalVariables']); }
		public function ViewMySQLInformationSchemaTables() { return $this->ViewMySQLInformationSchemaBase([field=>'InformationSchemaTables']); }
		public function ViewMySQLKeyColumnUsageTable() { return $this->ViewMySQLInformationSchemaBase([field=>'KeyColumnUsage']); }
		public function ViewMySQLOptimizerTraceTable() { return $this->ViewMySQLInformationSchemaBase([field=>'OptimizerTrace']); }
		public function ViewMySQLParametersTable() { return $this->ViewMySQLInformationSchemaBase([field=>'Parameters']); }
		public function ViewMySQLPartitionsTable() { return $this->ViewMySQLInformationSchemaBase([field=>'Partitions']); }
		public function ViewMySQLPluginsTable() { return $this->ViewMySQLInformationSchemaBase([field=>'Plugins']); }
		public function ViewMySQLProcessListTable() { return $this->ViewMySQLInformationSchemaBase([field=>'ProcessList']); }
		public function ViewMySQLProfilingTable() { return $this->ViewMySQLInformationSchemaBase([field=>'Profiling']); }
		public function ViewMySQLReferentialConstraintsTable() { return $this->ViewMySQLInformationSchemaBase([field=>'ReferentialConstraints']); }
		public function ViewMySQLRoutinesTable() { return $this->ViewMySQLInformationSchemaBase([field=>'Routines']); }
		public function ViewMySQLSchemaPrivilegesTable() { return $this->ViewMySQLInformationSchemaBase([field=>'SchemaPrivileges']); }
		public function ViewMySQLSchemataTable() { return $this->ViewMySQLInformationSchemaBase([field=>'Schemata']); }
		public function ViewMySQLSessionStatusTable() { return $this->ViewMySQLInformationSchemaBase([field=>'SessionStatus']); }
		public function ViewMySQLSessionVariablesTable() { return $this->ViewMySQLInformationSchemaBase([field=>'SessionVariables']); }
		public function ViewMySQLStatisticsTable() { return $this->ViewMySQLInformationSchemaBase([field=>'Statistics']); }
		public function ViewMySQLStatusTable() { return $this->ViewMySQLInformationSchemaBase([field=>'Status']); }
		public function ViewMySQLTableConstraintsTable() { return $this->ViewMySQLInformationSchemaBase([field=>'TableConstraints']); }
		public function ViewMySQLTablePrivilegesTable() { return $this->ViewMySQLInformationSchemaBase([field=>'TablePrivileges']); }
		public function ViewMySQLTableSpacesTable() { return $this->ViewMySQLInformationSchemaBase([field=>'TableSpaces']); }
		public function ViewMySQLTablesTable() { return $this->ViewMySQLInformationSchemaBase([field=>'Tables']); }
		public function ViewMySQLTriggersTable() { return $this->ViewMySQLInformationSchemaBase([field=>'Triggers']); }
		public function ViewMySQLUserPrivilegesTable() { return $this->ViewMySQLInformationSchemaBase([field=>'UserPrivileges']); }
		public function ViewMySQLViewsTable() { return $this->ViewMySQLInformationSchemaBase([field=>'Views']); }
		public function ViewMySQLFunctionStatusTable() { return $this->ViewMySQLInformationSchemaBase([field=>'FunctionStatus']); }
		public function ViewMySQLCollationTable() { return $this->ViewMySQLInformationSchemaBase([field=>'Collation']); }
		public function ViewMySQLOpenTablesTable() { return $this->ViewMySQLInformationSchemaBase([field=>'OpenTables']); }
		public function ViewMySQLProcedureStatusTable() { return $this->ViewMySQLInformationSchemaBase([field=>'ProcedureStatus']); }
		public function ViewMySQLTableStatusTable() { return $this->ViewMySQLInformationSchemaBase([field=>'TableStatus']); }
		public function ViewMySQLVariablesTable() { return $this->ViewMySQLInformationSchemaBase([field=>'Variables']); }
	}

?>