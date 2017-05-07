<?php

	class DBAdmin
	{
		
			// Construction
			// -------------------------------------------------
		
		public function __construct($args)
		{
			$this->dbaccessobject = $args[dbaccessobject];
		}
		
			// Information Schema Functions ~ SHOW
			// -------------------------------------------------------------
		
				// Information Schema Functions ~ Base Function
				// -------------------------------------------------------------
		
		public function GetMySQLSchemaBase($args)
		{
			return $this->dbaccessobject->FetchAllRows([query=>'SHOW ' . $args[show] . ';']);
		}
		
				// Information Schema Functions ~ Individual Functions
				// -------------------------------------------------------------
		
		public function GetMySQLDatabases() { return $this->GetMySQLSchemaBase([show=>'DATABASES']); }
		public function GetMySQLInformationSchemaTables() { return $this->GetMySQLSchemaBase([show=>'TABLES FROM INFORMATION_SCHEMA']); }
		public function GetMySQLFunctionStatus() { return $this->GetMySQLSchemaBase([show=>'FUNCTION STATUS']); }
		public function GetMySQLCollation() { return $this->GetMySQLSchemaBase([show=>'COLLATION']); }
		public function GetMySQLOpenTables() { return $this->GetMySQLSchemaBase([show=>'OPEN TABLES']); }
		public function GetMySQLProcedureStatus() { return $this->GetMySQLSchemaBase([show=>'PROCEDURE STATUS']); }
		public function GetMySQLTableStatus() { return $this->GetMySQLSchemaBase([show=>'TABLE STATUS']); }
		public function GetMySQLVariables() { return $this->GetMySQLSchemaBase([show=>'VARIABLES']); }
		
			// Information Schema Functions ~ SELECT * FROM INFORMATION_SCHEMA
			// -------------------------------------------------------------
		
				// Information Schema Functions ~ Base Function
				// -------------------------------------------------------------
		
		public function GetMySQLInformationSchemaBase($args)
		{
			return $this->dbaccessobject->FetchAllRows([query=>'SELECT * FROM INFORMATION_SCHEMA.' . $args[table] . ';']);
		}
		
				// Information Schema Functions ~ Individual Functions
				// -------------------------------------------------------------
		
		public function GetMySQLCharacterSets() { return $this->GetMySQLInformationSchemaBase([table=>'CHARACTER_SETS']); }
		public function GetMySQLCollationCharacterSetApplicability() { return $this->GetMySQLInformationSchemaBase([table=>'COLLATION_CHARACTER_SET_APPLICABILITY']); }
		public function GetMySQLCollations() { return $this->GetMySQLInformationSchemaBase([table=>'COLLATIONS']); }
		public function GetMySQLColumnPrivileges() { return $this->GetMySQLInformationSchemaBase([table=>'COLUMN_PRIVILEGES']); }
		public function GetMySQLColumns() { return $this->GetMySQLInformationSchemaBase([table=>'COLUMNS']); }
		public function GetMySQLEngines() { return $this->GetMySQLInformationSchemaBase([table=>'ENGINES']); }
		public function GetMySQLEvents() { return $this->GetMySQLInformationSchemaBase([table=>'EVENTS']); }
		public function GetMySQLFiles() { return $this->GetMySQLInformationSchemaBase([table=>'FILES']); }
		public function GetMySQLGlobalStatus() { return $this->GetMySQLInformationSchemaBase([table=>'GLOBAL_STATUS']); }
		public function GetMySQLGlobalVariables() { return $this->GetMySQLInformationSchemaBase([table=>'GLOBAL_VARIABLES']); }
		public function GetMySQLKeyColumnUsage() { return $this->GetMySQLInformationSchemaBase([table=>'KEY_COLUMN_USAGE']); }
		public function GetMySQLOptimizerTrace() { return $this->GetMySQLInformationSchemaBase([table=>'OPTIMIZER_TRACE']); }
		public function GetMySQLParameters() { return $this->GetMySQLInformationSchemaBase([table=>'PARAMETERS']); }
		public function GetMySQLPartitions() { return $this->GetMySQLInformationSchemaBase([table=>'PARTITIONS']); }
		public function GetMySQLPlugins() { return $this->GetMySQLInformationSchemaBase([table=>'PLUGINS']); }
		public function GetMySQLProcessList() { return $this->GetMySQLInformationSchemaBase([table=>'PROCESSLIST']); }
		public function GetMySQLProfiling() { return $this->GetMySQLInformationSchemaBase([table=>'PROFILING']); }
		public function GetMySQLReferentialConstraints() { return $this->GetMySQLInformationSchemaBase([table=>'REFERENTIAL_CONSTRAINTS']); }
		public function GetMySQLRoutines() { return $this->GetMySQLInformationSchemaBase([table=>'ROUTINES']); }
		public function GetMySQLSchemaPrivileges() { return $this->GetMySQLInformationSchemaBase([table=>'SCHEMA_PRIVILEGES']); }
		public function GetMySQLSchemata() { return $this->GetMySQLInformationSchemaBase([table=>'SCHEMATA']); }
		public function GetMySQLSessionStatus() { return $this->GetMySQLInformationSchemaBase([table=>'SESSION_STATUS']); }
		public function GetMySQLSessionVariables() { return $this->GetMySQLInformationSchemaBase([table=>'SESSION_VARIABLES']); }
		public function GetMySQLStatistics() { return $this->GetMySQLInformationSchemaBase([table=>'STATISTICS']); }
		public function GetMySQLStatus() { return $this->GetMySQLInformationSchemaBase([table=>'STATUS']); }
		public function GetMySQLSystemVariables() { return $this->GetMySQLInformationSchemaBase([table=>'SYSTEM_VARIABLES']); }
		public function GetMySQLTableConstraints() { return $this->GetMySQLInformationSchemaBase([table=>'TABLE_CONSTRAINTS']); }
		public function GetMySQLTablePrivileges() { return $this->GetMySQLInformationSchemaBase([table=>'TABLE_PRIVILEGES']); }
		public function GetMySQLTables() { return $this->GetMySQLInformationSchemaBase([table=>'TABLES']); }
		public function GetMySQLTableSpaces() { return $this->GetMySQLInformationSchemaBase([table=>'TABLESPACES']); }
		public function GetMySQLTriggers() { return $this->GetMySQLInformationSchemaBase([table=>'TRIGGERS']); }
		public function GetMySQLUserPrivileges() { return $this->GetMySQLInformationSchemaBase([table=>'USER_PRIVILEGES']); }
		public function GetMySQLViews() { return $this->GetMySQLInformationSchemaBase([table=>'VIEWS']); }
		
			// MySQL Cleanup DB MySQL
			// -------------------------------------------------
		
		public function GetSyntaxForDBRecordCleaning($args)
		{
			$tables = $args['tables'];
			$record_cleaning_statements = [];
			
			foreach($tables as $table_name => $variable_name)
			{
				$record_cleaning_statements[] = ['DELETE FROM ' . $table_name . ';'];
			}
			
			return $record_cleaning_statements;
		}
		
			// MySQL Table Equivalent
			// -------------------------------------------------
		
		public function GetTableMySQL()
		{
			$tables = $this->GetTableNames();
			
			$create_table_basic_syntax = 'SHOW CREATE TABLE ';
			
			$table_mysql = [];
			
			foreach ($tables as $table)
			{
				$create_table_query = $create_table_basic_syntax . $table;
				
				$query_result = $this->dbaccessobject->db_link->query($create_table_query);
				if($query_result)
				{
					while ($row = $query_result->fetch_assoc())
					{
						$table_mysql[$table] = array_pop($row);
					}
				}
				
			}
			
			return $table_mysql;
		}
		
			// MySQL Table Names
			// -------------------------------------------------
		
		public function GetTableNames()
		{
			$get_table_names_query = 'SHOW TABLES;';
			
			$objects = [];
			
			$query_result = $this->dbaccessobject->db_link->query($get_table_names_query);
			if($query_result)
			{
				while ($row = $query_result->fetch_assoc())
				{
					$objects[] = array_pop($row);
				}
			}
			
			return $objects;
		}
		
			// MySQL Table Schemas
			// -------------------------------------------------
		
		public function GetTableSchemas()
		{
			$tables = $this->GetTableNames();
			
			$table_schemas = [];
			
			foreach($tables as $table)
			{
				$table_data = [];
				
				$table_data[] = ['Field', 'Type', 'Null', 'Key', 'Default', 'Extra'];
				
				$get_record_description_args = [
					type=>$table,
				];
				
				$table_description = $this->GetRecordDescription($get_record_description_args);
				
				foreach($table_description as $field => $field_description)
				{
					$record_type = $field_description['Type'];
					$record_null = $field_description['Null'];
					$record_key = $field_description['Key'];
					$record_default = $field_description['Default'];
					$record_extra = $field_description['Extra'];
					
					$table_data[] = array($field, $record_type, $record_null, $record_key, $record_default, $record_extra);
				}
				
				$table_schemas[$table] = $table_data;
			}
			
			return $table_schemas;
		}
		
			// View All Primary Hosts
			// -------------------------------------------------
			
		public function ViewAllPrimaryHosts()
		{
			$primary_directory_location = '../';
			
			$primary_directory_location_contents = scandir($primary_directory_location);
			
			$primary_hosts = [];
			$acceptable_host_extensions = ['com'];
			
			foreach($primary_directory_location_contents as $primary_item)
			{
				if($primary_item != '.' && $primary_item != '..')
				{
					foreach($acceptable_host_extensions as $acceptable_host_extension)
					{
						if(preg_match("#\." . $acceptable_host_extension . "$#", $primary_item))
						{
							$primary_hosts [] = $primary_item;
						}
					}
				}
			}
			
			return $primary_hosts;
		}
		
			// View Primary Host Status
			// -------------------------------------------------
			
		public function ViewPrimaryHostStatus()
		{
			$primary_hosts = $this->ViewAllPrimaryHosts();
			$acceptable_host_extensions = ['com'];
			
			$primary_host_status = [];
			
			$clonefrom_access_args = [
				database=>'clonefrom',
			];
			
			$clonefrom_access = new DBAccess($clonefrom_access_args);
			$clonefrom_access->DBStart();
			
			$clonefrom_directory_location = '../clonefrom.com/';
			
			$previous_db_access = $this->dbaccessobject;
			$this->dbaccessobject = $clonefrom_access;
			
			$clonefrom_mysql_equivalent = $this->GetTableMySQL();
			
			foreach($primary_hosts as $primary_host)
			{
				$primary_host_status[$primary_host] = [];
				
					// Does Database Exist?
					// -------------------------------------------
				
				$primary_host_database_name = $primary_host;
				
				foreach($acceptable_host_extensions as $acceptable_host_extension)
				{
					$primary_host_database_name = preg_replace("#\." . $acceptable_host_extension . "$#", "", $primary_host_database_name);
				}
				
				$primary_db_access_args = [
					database=>$primary_host_database_name,
				];
				
				$primary_host_access = new DBAccess($primary_db_access_args);
				$db_start_results = $primary_host_access->DBStart();
				
				$primary_host_status[$primary_host]['database_status'] = $db_start_results;
				
					// Is the Schema Valid?
					// -------------------------------------------
				
				if($db_start_results['results'])
				{
					$this->dbaccessobject = $primary_host_access;
					
					$primary_host_mysql_equivalent = $this->GetTableMySQL();
					
					if(count($clonefrom_mysql_equivalent))
					{
						if(count($primary_host_mysql_equivalent))
						{
							$match_results = 1;
							$match_failures = [];
							
							foreach($clonefrom_mysql_equivalent as $clonefrom_mysql_statement)
							{
								$primary_host_comparable_mysql_statement = array_shift($primary_host_mysql_equivalent);
								
								$primary_host_comparable_mysql_statement = preg_replace("# AUTO_INCREMENT=[\d]*#", "", $primary_host_comparable_mysql_statement);
								$clonefrom_mysql_statement = preg_replace("# AUTO_INCREMENT=[\d]*#", "", $clonefrom_mysql_statement);
								
								if($primary_host_comparable_mysql_statement != $clonefrom_mysql_statement)
								{
									$match_results = 0;
									$match_failures[] = 'Error with statement...|' . $primary_host_comparable_mysql_statement . '|...compared to...|' . $clonefrom_mysql_statement . '|';
								}
							}
							
							$errors = [];
							
							if(!$match_results) {
								$match_failure_message = implode('; ', $match_failures);
								$errors[] = [
									[
										errornumber=>1,
										errormessage=>$match_failure_message,
									],
								];
							}
							
							$db_schema_results = [
								results=>$match_results,
								errors=>$errors,
							];
						}
						else
						{
							$db_schema_results = [
								results=>0,
								errors=>[
									[
										errornumber=>2,
										errormessage=>'Database being cloned to has no tables.',
									],
								],
							];
						}
					}
					else
					{
						$db_schema_results = [
							results=>0,
							errors=>[
								[
									errornumber=>3,
									errormessage=>'Database being cloned from has no tables.',
								]
							],
						];
					}
				}
				else
				{
					$db_schema_results = [
						results=>0,
						errors=>[
							[
								errornumber=>0,
								errormessage=>'Database does not exist.',
							],
						],
					];
				}
				
				$primary_host_status[$primary_host]['schema_status'] = $db_schema_results;
				
					// Admin Accounts?
					// -------------------------------------------
				
				if($db_start_results['results'])
				{
					$user_accounts = $this->GetAdminUserAccounts();
					
					if($user_accounts && (count($user_accounts)))
					{
						$admin_account_results = [
							results=>1,
							errors=>[],
							useraccounts=>$user_accounts,
						];
					}
					else
					{
						$admin_account_results = [
							results=>0,
							errors=>[
								[
									errornumber=>4,
									errormessage=>'There are no admin user accounts.',
								],
							],
						];
					}
				}
				else
				{
					$admin_account_results = [
						results=>0,
						errors=>[
							[
								errornumber=>0,
								errormessage=>'Database does not exist.',
							],
						],
					];
				}
				
				$primary_host_status[$primary_host]['admin_account_status'] = $admin_account_results;
				
					// Static Files?
					// -------------------------------------------
					
			#	print("BT: Files???...|" . $primary_host . "|");
				
				if($primary_host != 'clonefrom.com')
				{
					$primary_host_directory_location = '../' . $primary_host . '/';
					
					if(is_dir($primary_host_directory_location))
					{
						if(is_dir($clonefrom_directory_location))
						{
							$compare_directory_args = [
								firstdirectory=>$clonefrom_directory_location,
								seconddirectory=>$primary_host_directory_location,
							];
							
							$static_files_results = $this->CompareTwoDirectories($compare_directory_args);
						}
						else
						{
							$static_files_results = [
								results=>0,
								errors=>[
									[
										errornumber=>6,
										errormessage=>'Cloned from directory does not exist.',
									],
								],
							];
						}
					}
					else
					{
						$static_files_results = [
							results=>0,
							errors=>[
								[
									errornumber=>5,
									errormessage=>'Primary host directory does not exist.',
								],
							],
						];
					}
				}
				else
				{
					$static_files_results = [
						results=>1,
						errors=>[],
					];
				}
				
				$primary_host_status[$primary_host]['static_files_status'] = $static_files_results;
				
					// Master Entry Record?
					// -------------------------------------------
					
				if($db_start_results['results'])
				{
					$orm = new ORM([dbaccessobject=>$this->dbaccessobject]);
					
					$master_records = $orm->GetMasterRecord();
					
					if($master_records && count($master_records))
					{
						$primary_master_record = $master_records[0];
						
						$master_entry_results = [
							results=>1,
							errors=>[],
							primary_record=>$primary_master_record,
						];
					}
					else
					{
						$master_entry_results = [
							results=>0,
							errors=>[
								[
									errornumber=>8,
									errormessage=>'No master records exist for ' . $primary_host . '.',
								],
							],
						];
					}
				}
				else
				{
					$master_entry_results = [
						results=>0,
						errors=>[
							[
								errornumber=>0,
								errormessage=>'Database does not exist.',
							],
						],
					];
				}
				
				$primary_host_status[$primary_host]['master_entry_status'] = $master_entry_results;
				
					// Stats Directory?
					// -------------------------------------------
				
				if($primary_host != 'clonefrom.com')
				{
					$primary_host_stats_location = '../stats/' . $primary_host . '/';
					
					if(!is_dir($primary_host_stats_location))
					{
						mkdir($primary_hosts_stats_location, 0777);
					}
				}
			}
			
			$this->dbaccessobject = $previous_db_access;
			
		#	print("BT:");
		#	print("<PRE>");
		#	print_r($primary_host_status);
			#print_r($primary_hosts);
		#	print_r($primary_directory_location_contents);
		#	print("</PRE>");
			
		#	return ['something'];
			return $primary_host_status;
		}
		
			// Compare Two Directories
			// -------------------------------------------------
		
		public function CompareTwoDirectories($args)
		{
			$first_directory = $args['firstdirectory'];
			$second_directory = $args['seconddirectory'];
			
			$first_directory_contents = scandir($first_directory);
			
			$valid_comparison = 1;
			$errors = [];
			
			foreach($first_directory_contents as $first_item)
			{
				$first_item_location = $first_directory . $first_item;
				$second_item_location = $second_directory . $first_item;
				if($first_item != '.' && $first_item != '..')
				{
					if(is_dir($first_item))
					{
						$compare_two_directories_args = [
							firstdirectory=>$first_item_location . '/',
							seconddirectory=>$second_item_location . '/',
						];
						$first_item_results = $this->CompareTwoDirectories($compare_two_directories_args);
						
						if(!$first_item_results[results])
						{
							$valid_comparison = 0;
						}
						
						$first_item_results_errors = $first_item_results[errors];
						
						if(count($first_item_results_errors))
						{
							foreach($first_item_results_errors as $first_item_results_error)
							{
								$errors[] = $first_item_results_error;
							}
						}
					}
					else
					{
						$compare_two_files_args = [
							firstfile=>$first_item_location,
							secondfile=>$second_item_location,
						];
						
						$file_comparison_results = $this->CompareTwoFiles($compare_two_files_args);
						
						if(!$file_comparison_results)
						{
							$valid_comparison = 0;
							$errors[] = [
								errornumber=>7,
								errormessage=>'Error in comparing the two files...|' . $first_item_location . '|...and...|' . $second_item_location . '|',
							];
						}
					}
				}
			}
			
			return [
				results=>$valid_comparison,
				errors=>$errors,
			];
		}
		
		public function CompareTwoFiles($args)
		{
			$first_file = $args['firstfile'];
			$second_file = $args['secondfile'];
				  // Check if filesize is different
			if(!is_file($first_file) || !is_file($second_file))
			{
				return false;
			}
		
				// Check if content is different
			$first_file_handle = fopen($first_file, 'rb');
			$second_file_handle = fopen($second_file, 'rb');
		
			$comparison_result = true;
			
			while(!feof($first_file_handle))
			{
				if(fread($first_file_handle, 8192) != fread($second_file_handle, 8192))
				{
					$comparison_result = false;
					break;
				}
			}
		
			fclose($first_file_handle);
			fclose($second_file_handle);
		
			return $comparison_result;
		}
		
		public function CloneAdminAccountsToNewDatabase($args)
		{
			$host = $args[host];
			$clone_from = $args[clonefrom];
			
			$primary_db_access_args = [
				database=>$clone_from,
			];
			
			$primary_host_access = new DBAccess($primary_db_access_args);
			$primary_host_access->DBStart();
			
			$previous_db_access = $this->dbaccessobject;
			$this->dbaccessobject = $primary_host_access;
			
			$user_accounts = $this->GetAdminUserAccounts();
			
			$errors = [];
			
			if($user_accounts && count($user_accounts))
			{
				$secondary_db_access_args = [
					database=>$host,
				];
				
				$secondary_host_access = new DBAccess($secondary_db_access_args);
				$secondary_host_access->DBStart();
				
				$this->dbaccessobject = $secondary_host_access;
				
				$account_creations = [];
				$admin_creations = [];
				
				foreach ($user_accounts as $user_account)
				{
					$new_user_account_definition = [
						id=>$user_account['id'],
						Username=>$user_account['Username'],
						Password=>pack("H*", $user_account['Password']),
						EmailAddress=>$user_account['EmailAddress'],
					];
					
					$user_record_args = [
						'type'=>User,
						'definition'=>$new_user_account_definition,
						'joins'=>[
							'JOIN'=>[
								'UserAdmin'=>'UserAdmin.Userid = User.id',
							],
						],
					];
					
					$admin_acount = $this->dbaccessobject->GetRecords($user_record_args);
					
					if(!$admin_account || !count($admin_account))
					{
						$user_account_insert_args = [
							type=>User,
							definition=>$new_user_account_definition,
						];
						
						$account_creations[] = $this->dbaccessobject->CreateRecord($user_account_insert_args);
						
						$user_admin_insert_args = [
							type=>UserAdmin,
							definition=>[
								id=>$user_account['UserAdmin.id'],
								Userid=>$user_account['UserAdmin.Userid'],
							],
						];
						
						$admin_creations[] = $this->dbaccessobject->CreateRecord($user_admin_insert_args);
					}
					else
					{
						$errors[] = 'Admin account already cloned: User' . $user_account['id'] . ' (' . $user_account['Username'] . ' : ' . $user_account['Password'] . ').';
					}
				}
				
				$secondary_host_access->DBEnd();
			}
			else
			{
				$errors[] = 'There were no valid user admin accounts available to clone.';
			}
			
			$primary_host_access->DBEnd();
			$this->dbaccessobject = $previous_db_access;
			
			return [
				cloneresults=>TRUE,
				clonedfromaccounts=>$user_accounts,
				userscreated=>$account_creations,
				adminscreated=>$admin_creations,
				errors=>$errors,
			];
		}
		
			// Get All Admin Accounts
			// -------------------------------------------------
		
		public function GetAdminUserAccounts()
		{
			$user_record_args = [
				'type'=>User,
				'definition'=>[
				],
				'joins'=>[
					'JOIN'=>[
						'UserAdmin'=>'UserAdmin.Userid = User.id',
					],
				],
			];
			
			$user_accounts = $this->dbaccessobject->GetRecords($user_record_args);
			
			return $user_accounts;
		}
		
			// Clone Files to New Host
			// -------------------------------------------------
		
		public function CloneFilesToNewDatabase($args)
		{
			$host = $args[host];
			$clone_from = $args[clonefrom];
			
			$clone_to_directory_name = $host . '.com';
			$clone_to_directory_location = '../' . $clone_to_directory_name;
			
			if(!is_dir($clone_to_directory_location))
			{
				mkdir($clone_to_directory_location, 0777);
			}
			
			$clone_from_directory_name = $clone_from . '.com';
			$clone_from_directory_location = '../' . $clone_from_directory_name;
			
			$clone_files_to_directory_args = [
				todirectory=>$clone_to_directory_location,
				fromdirectory=>$clone_from_directory_location,
			];
			
			$this->CloneFilesToDirectory($clone_files_to_directory_args);
			
			return [
				cloneresults=>TRUE,
			];
		}
		
		public function CloneFilesToDirectory($args)
		{
			$to_directory = $args['todirectory'];
			$from_directory = $args['fromdirectory'];
			
			$from_directory_contents = scandir($from_directory);
			
			foreach($from_directory_contents as $from_directory_item)
			{
				if($from_directory_item != '.' && $from_directory_item != '..' && $from_directory_item != 'javascript' && $from_directory_item != 'css' && $from_directory_item != 'image')
				{
					$old_item_location = $from_directory . '/' . $from_directory_item;
					$new_item_location = $to_directory . '/' . $from_directory_item;
					
					if(is_file($old_item_location))
					{
						copy($old_item_location, $new_item_location);
					}
					elseif(is_dir($old_item_location) && $from_directory_item != 'javascript' && $from_directory_item != 'css')
					{
						mkdir($new_item_location, 0777);
						$clone_files_to_directory_args = [
							todirectory=>$new_item_location,
							fromdirectory=>$old_item_location,
						];
						$this->CloneFilesToDirectory($clone_files_to_directory_args);
					}
				}
			}
		}
		
			// Clone Host Database from Primary Database
			// -------------------------------------------------
		
		public function ClonePrimaryHostDatabase($args)
		{
			$host = $args[host];
			$clone_from = $args[clonefrom];
			
			$primary_db_access_args = [
				database=>$clone_from,
			];
			
			$primary_host_access = new DBAccess($primary_db_access_args);
			$primary_host_access->DBStart();
			
			$previous_db_access = $this->dbaccessobject;
			$this->dbaccessobject = $primary_host_access;
			
			$create_database_args = [
				database=>$host,
			];
			
			$create_database_results = $this->CreateDatabase($create_database_args);
			
			if($create_database_results && !$create_database_results['error'])
			{
				$table_sql = $this->GetTableMySQL();
				$secondary_db_access_args = [
					database=>$host,
				];
				
				$secondary_host_access = new DBAccess($secondary_db_access_args);
				$secondary_host_access->DBStart();
				
				$this->dbaccessobject = $secondary_host_access;
				
				foreach ($table_sql as $create_table)
				{
					$fill_arrays_from_db_args = [
						query=>$create_table,
						sqlbindstring=>'',
						recordvalues=>[],
					];
					
					$this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
				}
				
				$secondary_host_access->DBEnd();
			}
			else
			{
				# something went wrong
			}
			
			$primary_host_access->DBEnd();
			$this->dbaccessobject = $previous_db_access;
			
			return [
				cloneresults=>TRUE,
				tablesql=>$table_sql,
			];
		}
		
			// Create Database
			// -------------------------------------------------
			
			// NOTE: Presently disallowed by DreamHost.
		
		public function CreateDatabase($args)
		{
			return TRUE;	# Currently disallowed by hosting service.
			
			$host = $args[database];
			
			$previous_db_access = $this->dbaccessobject;
			
			$sql = 'CREATE DATABASE IF NOT EXISTS ?;';
			
			$no_database_db_access_args = [
				database=>'',	# temporary
		#		database=>'primary',
			];
			
			$no_database_access = new DBAccess($no_database_db_access_args);
			$no_database_access->DBStart();
			$this->dbaccessobject = $no_database_access;
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>'s',
				recordvalues=>[$host],
			];
			
			$create_database_results = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
			
			$no_database_access->DBEnd();
			
			$this->dbaccessobject = $previous_db_access;
			
			return $create_database_results;
		}
	}

?>