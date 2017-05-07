<?php
	
	require('../traits/scripts/BaseConversion.php');
	require('../traits/scripts/DBAdminFunctions.php');
	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/SimpleAPI.php');
	require('../traits/scripts/SimpleErrors.php');
	require('../traits/scripts/SimpleLookupLists.php');
	require('../traits/scripts/SimpleForms.php');
	require('../traits/scripts/SimpleORM.php');

	class dbstatus extends basicscript
	{
					// Class Information
					// --------------------------------------------------------------
					
				// Traits
					
		use BaseConversion;
		use DBAdminFunctions;
		use DBFunctions;
		use SimpleAPI;
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
				arrayofstrings=>$this->db_admin->GetTableNames(),
			];
			
			$this->StatusDataArray = $this->NumberArrayOfStrings($get_files_args);
			
			return TRUE;
		}
		
		public function ShowTablesListSchemasTable()
		{
			$this->SetDBAdmin();
			return $this->StatusDataArray = $this->db_admin->GetTableSchemas();
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
		
		public function ClonePrimaryHostDatabase()
		{
			$this->SetDBAdmin();
			
			$new_host_to_clone = $this->Param('newhost');
			
			if(strlen($new_host_to_clone))
			{
				$this->new_host_to_clone = $new_host_to_clone;
				
				$clone_from = $this->Param('clonefrom');
				
				if($clone_from)
				{
					$this->clone_from = $clone_from;
				}
				
				$clone_primary_host_database_args = [
					host=>$new_host_to_clone,
					clonefrom=>$clone_from,
				];
				
				$db_admin_cloning_results = $this->DBAdminClonePrimaryHostDatabase($clone_primary_host_database_args);
				
				$this->clone_success = $db_admin_cloning_results['cloneresults'];
				$this->create_tables = $db_admin_cloning_results['tablesql'];
				
				if($this->clone_success)
				{
					$this->clone_results = 'Cloning of "' . $new_host_to_clone . '" was successful.';
					
					$insert_master_admin_account = $this->Param('insert_master_admin_account');
					
					if(strlen($insert_master_admin_account))
					{
						$this->insert_master_admin_account = $insert_master_admin_account;
						
						$insert_master_admin_account_results = $this->DBAdminCloneAdminAccountsToNewDatabase($clone_primary_host_database_args);
						
						if($insert_master_admin_account_results['cloneresults'])
						{
							$this->clone_results .= ' Cloning of admin accounts was successful.';
						}
						else
						{
							$this->clone_results .= ' Cloning of admin accounts failed.';
						}
					}
					else
					{
						$this->insert_master_admin_account = 0;
					}
					
					$clone_files_from_clonefrom = $this->Param('clone_files_from_clonefrom');
					
					if(strlen($clone_files_from_clonefrom))
					{
						$this->clone_files_from_clonefrom = $clone_files_from_clonefrom;
						
						$clone_files_from_clonefrom_results = $this->DBAdminCloneFilesToNewDatabase($clone_primary_host_database_args);
						
						if($clone_files_from_clonefrom_results['cloneresults'])
						{
							$this->clone_results .= ' Cloning of files was successful.';
						}
						else
						{
							$this->clone_results .= ' Cloning of files failed.';
						}
					}
					else
					{
						$this->clone_files_from_clonefrom = 0;
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