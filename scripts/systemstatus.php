<?php
	
	require('../traits/scripts/BaseConversion.php');
	require('../traits/scripts/CryptographicFunctions.php');
	require('../traits/scripts/SimpleForms.php');
	
	class systemstatus extends basicscript
	{
					// Class Information
					// --------------------------------------------------------------
					
				// Traits
					
		use BaseConversion;
		use CryptographicFunctions;
		use SimpleForms;
		
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
			$title = 'System Status Diagnostics';
			
			$good_action = $this->GetGoodFunctionName();
			if($good_action)
			{
				$title .= ' : ' . $good_action;
			}
			
			return $title;
		}
					// Function Information
					// --------------------------------------------------------------
		
				// Function Data
		
		public function SetScriptAttributes()
		{
			require('../classes/Script/PHPSet.php');
			
			$get_php_command_args = [
				ShortSpacelessFunctionName=>$this->desired_action,
			];
			
			$php_command = new PHPCommand($get_php_command_args);
			
			$this->good_function_name = $php_command->ShortFunctionName;
			$this->php_command = $php_command;
			
			return TRUE;
		}
					
					// No-Action Behaviors
					// --------------------------------------------------------------
		
		public function PHPInfo()
		{
			return TRUE;
		}
		
		public function PHPCredits()
		{
			return TRUE;
		}
					
					// IFrame Behaviors
					// --------------------------------------------------------------
		
		public function PHPInfo_IFrameDisplay()
		{
			return $this->IFrameDisplayWithoutNavigation();
		}
		
		public function PHPCredits_IFrameDisplay()
		{
			return $this->IFrameDisplayWithoutNavigation();
		}
					
					// Simple-One-Piece-of-Data Behaviors
					// --------------------------------------------------------------
		
		public function ApacheGetVersion() { return $this->DisplayOnePieceOfData(); }
		public function CLIGetProcessTitle() { return $this->DisplayOnePieceOfData(); }
		public function FuncNumArgs() { return $this->DisplayOnePieceOfData(); }
		public function GCEnabled() { return $this->DisplayOnePieceOfData(); }
		public function GetCalledClass() { return $this->DisplayOnePieceOfData(); }
		public function GetCurrentUser() { return $this->DisplayOnePieceOfData(); }
		public function GetHostName() { return $this->DisplayOnePieceOfData(); }
		public function GetIncludePath() { return $this->DisplayOnePieceOfData(); }
		public function GetLastMod() { return $this->DisplayOnePieceOfData(); }
		public function GetMagicQuotesGPC() { return $this->DisplayOnePieceOfData(); }
		public function GetMagicQuotesRuntime() { return $this->DisplayOnePieceOfData(); }
		public function GetMyGid() { return $this->DisplayOnePieceOfData(); }
		public function GetMyInode() { return $this->DisplayOnePieceOfData(); }
		public function GetMyUID() { return $this->DisplayOnePieceOfData(); }
		public function HeadersSent() { return $this->DisplayOnePieceOfData(); }
		public function HTTPResponseCode() { return $this->DisplayOnePieceOfData(); }
		public function MemoryGetPeakUsage() { return $this->DisplayOnePieceOfData(); }
		public function MemoryGetUsage() { return $this->DisplayOnePieceOfData(); }
		public function MHashCount() { return $this->DisplayOnePieceOfData(); }
		public function PHPINILoadedFile() { return $this->DisplayOnePieceOfData(); }
		public function PHPINIScannedFiles() { return $this->DisplayOnePieceOfData(); }
		public function PHPSapiName() { return $this->DisplayOnePieceOfData(); }
		public function PHPUname() { return $this->DisplayOnePieceOfData(); }
		public function PHPVersion() { return $this->DisplayOnePieceOfData(); }
		public function SysGetTempDir() { return $this->DisplayOnePieceOfData(); }
					
					// Numbered-List-of-Strings Data Behaviors
					// --------------------------------------------------------------
		
						// Normal
		
		public function ApacheGetModules() { return $this->DisplayNumberedArrayOfData(); }
		public function FuncGetArgs() { return $this->DisplayNumberedArrayOfData(); }
		public function GetDeclaredClasses() { return $this->DisplayNumberedArrayOfData(); }
		public function GetDeclaredInterfaces() { return $this->DisplayNumberedArrayOfData(); }
		public function GetDeclaredTraits() { return $this->DisplayNumberedArrayOfData(); }
		public function GetIncludedFiles() { return $this->DisplayNumberedArrayOfData(); }
		public function GetLoadedExtensions() { return $this->DisplayNumberedArrayOfData(); }
		public function GetRequiredFiles() { return $this->DisplayNumberedArrayOfData(); }
		public function HashAlgos() { return $this->DisplayNumberedArrayOfData(); }
		public function HeadersList() { return $this->DisplayNumberedArrayOfData(); }
					
					// Keyed-List-of-Strings Data Behaviors
					// --------------------------------------------------------------
					
						// Normal
		
		public function ApacheRequestHeaders() { return $this->DisplayKeyedArrayOfData(); }
		public function ApacheResponseHeaders() { return $this->DisplayKeyedArrayOfData(); }
		public function GetAllHeaders() { return $this->DisplayKeyedArrayOfData(); }
		public function GetDefinedConstants() { return $this->DisplayKeyedArrayOfData(); }
		public function GetDefinedVars() { return $this->DisplayKeyedArrayOfData(); }
		public function GetRUsage() { return $this->DisplayKeyedArrayOfData(); }
					
						// Special
		
		public function ViewCookieVariable()
		{
			$get_list_from_keys_args = array(
				'list'=>$_COOKIE,
			);
			
			$this->StatusDataArray = $this->DisplayListFromKeys($get_list_from_keys_args);
			
			return TRUE;
		}
		
		public function ViewServerVariable()
		{
			$get_list_from_keys_args = array(
				'list'=>$_SERVER,
			);
			
			$this->StatusDataArray = $this->DisplayListFromKeys($get_list_from_keys_args);
			
			return TRUE;
		}
		
		public function ViewPostVariable()
		{
			$get_list_from_keys_args = array(
				'list'=>$_POST,
			);
			
			$this->StatusDataArray = $this->DisplayListFromKeys($get_list_from_keys_args);
			
			return TRUE;
		}
		
		public function ViewGetVariable()
		{
			$get_list_from_keys_args = array(
				'list'=>$_GET,
			);
			
			$this->StatusDataArray = $this->DisplayListFromKeys($get_list_from_keys_args);
			
			return TRUE;
		}
					
					// Complex-List-of-Strings Data Behaviors
					// --------------------------------------------------------------
		
		public function GetDefinedFunctions()
		{
			$this->StatusDataArray = array();
			
			$defined_functions = get_defined_functions();
			$internal_functions = $defined_functions[internal];
			$user_functions = $defined_functions[user];
			
			$get_files_args = array(
				arrayofstrings=>$internal_functions,
			);
			
			$this->StatusDataArray[] = $this->NumberArrayOfStrings($get_files_args);
			
			$get_files_args = array(
				arrayofstrings=>$user_functions,
			);
			
			$this->StatusDataArray[] = $this->NumberArrayOfStrings($get_files_args);
			
			return TRUE;
		}
		
		public function INIGetAll()
		{
			$all_options = ini_get_all();
			
			$get_function_results = array();
			
			foreach ($all_options as $option_key => $option_value)
			{
				$current_row_array = array();
				$current_row_array[] = array(
					'Option',
					$option_key,
				);
				
				foreach($option_value as $sub_option_key => $sub_option_value)
				{
					$current_row_array[] = array(
						$sub_option_key,
						$sub_option_value,
					);
				}
				
				$get_function_results[] = $current_row_array;
			}
			
			$this->StatusDataArray = $get_function_results;
			
			return TRUE;
		}

		public function ShowMasterVariables()
		{
			require('../classes/System/BCE.php');
			
			$bce = new bce();
			
			$master_variable_args = [
				object=>$this,
			];
			
			$master_variables = $bce->GetMasterVariablesForObject($master_variable_args);
			
			$this->StatusDataArray = [];
			foreach ($master_variables as $master_variable_key => $master_variable_value)
			{
				if(is_array($master_variable_value))
				{
					$good_master_variable_value = implode(', ', $master_variable_value);
				}
				else
				{
					$good_master_variable_value = $master_variable_value;
				}
				
				$this->StatusDataArray[] = [
					'<nobr>' . $master_variable_key . '</nobr>',
					$good_master_variable_value,
				];
			}
			/*
			print_r($master_variables);
			
			$this->StatusDataArray = [
				[
					'<nobr>Desired Script:</nobr>',
					$this->desired_script,
				],
				[
					'<nobr>Desired Action:</nobr>',
					$this->desired_action,
				],
				[
					'<nobr>Object Code:</nobr>',
					$this->object_code,
				],
				[
					'<nobr>Object List:</nobr>',
					implode(' <br> ', $this->object_list),
				],
				[
					'<nobr>Script Location:</nobr>',
					$this->script_location,
				],
				[
					'<nobr>Script Name:</nobr>',
					$this->script_name,
				],
				[
					'<nobr>Script File:</nobr>',
					$this->script_file,
				],
				[
					'<nobr>Script Object:</nobr>',
					$this->script_object,
				],
				[
					'<nobr>Script Type:</nobr>',
					$this->script_type,
				],
				[
					'<nobr>Script Format:</nobr>',
					$this->script_format,
				],
			];*/
			
			return TRUE;
		}
		
					// Simple-One-Piece-of-Input-to-One-Output Form Behaviors
					// --------------------------------------------------------------
		
		public function ApacheGetEnv() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function ApacheLookupURI() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function BoolVal() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function ClassExists() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function EmptyFunc() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function ExtensionLoaded() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function FloatVal() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function FunctionExists() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function GetCFGVar() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function GetHostByAddr() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function GetHostByName() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function GetOpt() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function GetParentClass() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function GetProtoByName() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function GetProtoByNumber() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function GetResourceType() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function GetType() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function INetNTop() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function INetPTon() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function InterfaceExists() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function IntVal() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function IP2Long() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function IsArray() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function IsBool() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function IsCallable() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function IsDouble() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function IsFloat() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function IsLong() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function IsNull() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function IsNumeric() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function IsObject() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function IsResource() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function IsScalar() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function IsString() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function Long2IP() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function MHashGetBlockSize() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function RandomBytes() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		public function TraitExists() { return $this->DisplaySingleResultFunctionForOnePieceOfInput(); }
		
					// Simple-One-Piece-of-Input-to-List-Of-Output Form Behaviors
					// --------------------------------------------------------------
		
		public function GetHostByNameL() { return $this->DisplayListFunctionForOnePieceOfInput(); }
		public function GetExtensionFuncs() { return $this->DisplayListFunctionForOnePieceOfInput(); }
					
					// Complex-One-Piece-Of-Input-Form Behaviors
					// --------------------------------------------------------------
		
		public function GetMXRR()
		{
			$set_input_and_function_results = array(
				'displaytext'=>$this->GetGoodFunctionName(),
				'parameter'=>'mxrr',
				'function'=>'getmxrr',
				'arrays'=>2,
			);
			
			return $this->SetInputAndFunctionArrayResults($set_input_and_function_results);
		}
		
		public function GetClassVars()
		{
			$set_input_and_function_results = array(
				'displaytext'=>$this->GetGoodFunctionName(),
				'parameter'=>'class',
				'function'=>'get_class_vars',
				'desiredoutput'=>'list',
			);
			
			$this->SetInputAndFunctionListResults($set_input_and_function_results);
			
			return TRUE;
		}
		
		public function GetClassMethods()
		{
			$set_input_and_function_results = array(
				'displaytext'=>$this->GetGoodFunctionName(),
				'parameter'=>'class',
				'function'=>'get_class_methods',
				'desiredoutput'=>'list',
			);
			
			$this->SetInputAndFunctionListResults($set_input_and_function_results);
			
			return TRUE;
		}
		
		public function BinaryIncrementBinaryValue()
		{
			$binary = new Binary();
			$set_input_and_function_results = array(
				'displaytext'=>'Binary',
				'parameter'=>'binary',
				'function'=>'IncrementBinaryValue',
				'object'=>$binary,
				'arguments'=>'binary',
			);
			
			$this->SetInputAndMethodResults($set_input_and_function_results);
			
			$this->SetConversionBases();
			
			return TRUE;
		}
		
		public function BinaryDecrementBinaryValue()
		{
			$binary = new Binary();
			$set_input_and_function_results = array(
				'displaytext'=>'Binary',
				'parameter'=>'binary',
				'function'=>'DecrementBinaryValue',
				'object'=>$binary,
				'arguments'=>'binary',
			);
			
			$this->SetInputAndMethodResults($set_input_and_function_results);
			
			$this->SetConversionBases();
			
			return TRUE;
		}
		
		public function MHashGetHashName()
		{
			$set_input_and_function_results = array(
				'displaytext'=>$this->GetGoodFunctionName(),
				'parameter'=>'mhash-hash-name',
				'function'=>'mhash_get_hash_name',
			);
			
			$this->SetInputAndFunctionResults($set_input_and_function_results);
			$this->SetSelectableMHashValues();
			
			return TRUE;
		}
		
		public function DNSGetRecord()
		{
			$parameter = 'dns-record';
			$function = 'dns_get_record';
			
			$this->SubmittedValue = $this->Param($parameter);
			
			if(isset($this->SubmittedValue))
			{
				$this->SubmittedValuePrintable = $this->cleanser_object->EscapeHTML([input=>$this->SubmittedValue])[cleansedinput];
				
				$dns_query_resource_results = array();
				$dns_query_additional_results = array();
				$primary_dns_query_results = $function($this->SubmittedValue, DNS_ANY, $dns_query_resource_results, $dns_query_additional_results);
				
				$all_records = array_merge($primary_dns_query_results, $dns_query_resource_results, $dns_query_additional_results);
				
				$get_function_results = array();
				foreach ($all_records as $record)
				{
					$current_table_array = array();
					
					foreach ($record as $recordkey => $recordvalue)
					{
						$current_table_array[] = array(
							$recordkey,
							$recordvalue,
						);
					}
					
					$get_function_results[] = $current_table_array;
				}
				
				$this->StatusDataArray = $get_function_results;
			}
			
			return $this->StatusDataArray;
		}
		
		public function AssertOptions()
		{
			$this->SubmittedValue = $this->Param('assert-option');
			if(isset($this->SubmittedValue))
			{
				switch($this->SubmittedValue)
				{
					case 'ASSERT_ACTIVE':
						$this->SubmittedValuePrintable = 'ASSERT_ACTIVE (assert.active)';
						$assert_results = assert_options(ASSERT_ACTIVE);
						
						break;
						
					case 'ASSERT_WARNING':
						$this->SubmittedValuePrintable = 'ASSERT_WARNING (assert.warning)';
						$assert_results = assert_options(ASSERT_WARNING);
						
						break;
						
					case 'ASSERT_BAIL':
						$this->SubmittedValuePrintable = 'ASSERT_BAIL (assert.bail)';
						$assert_results = assert_options(ASSERT_BAIL);
						
						break;
						
					case 'ASSERT_QUIET_EVAL':
						$this->SubmittedValuePrintable = 'ASSERT_QUIET_EVAL (assert.quiet_eval)';
						$assert_results = assert_options(ASSERT_QUIET_EVAL);
						
						break;
						
					case 'ASSERT_CALLBACK':
						$this->SubmittedValuePrintable = 'ASSERT_CALLBACK (assert.callback)';
						$assert_results = assert_options(ASSERT_CALLBACK);
						
						break;
				}
				
				if(isset($this->SubmittedValuePrintable))
				{
					if(!$assert_results)
					{
						$assert_results = 0;
					}
					
					$this->StatusDataArray = array(
						array(
							$this->GetNonLineBreakGoodFunctionName(),
							$assert_results,
						),
					);
				}
			}
			
			return TRUE;
		}
				
					// Multiple-Pieces-Of-Input-Form Behaviors
					// --------------------------------------------------------------
		
		public function MHash()
		{
			$set_input_and_function_results = array(
				'displaytext'=>array(
					'MHash Hash',
					'Plaintext',
				),
				'parameter'=>array(
					'mhash-hash',
					'plaintext',
				),
				'function'=>'mhash',
			);
			
			$this->SetInputAndFunctionResults($set_input_and_function_results);
			$this->SetSelectableMHashValues();
			
			return TRUE;
		}
		
		public function GetServByPort()
		{
			$set_input_and_function_results = array(
				'displaytext'=>$this->GetGoodFunctionName(),
				'parameter'=>'service-by-port',
				'function'=>'getservbyport',
				'arguments'=>array(
					'tcp',
					'udp',
				),
			);
			
			$this->SetInputAndFunctionResults($set_input_and_function_results);
			
			return TRUE;
		}
		
		public function GetServByName()
		{
			$set_input_and_function_results = array(
				'displaytext'=>$this->GetGoodFunctionName(),
				'parameter'=>'service-by-name',
				'function'=>'getservbyname',
				'arguments'=>array(
					'tcp',
					'udp',
				),
			);
			
			$this->SetInputAndFunctionResults($set_input_and_function_results);
			
			return TRUE;
		}
		
		public function PropertyExists()
		{
			$set_input_and_function_results = array(
				'displaytext'=>array(
					'Class',
					'Property',
				),
				'parameter'=>array(
					'class',
					'property',
				),
				'function'=>'property_exists',
			);
			
			$this->SetInputAndFunctionResults($set_input_and_function_results);
			
			return TRUE;
		}
		
		public function RandomInt()
		{
			$set_input_and_function_results = array(
				'displaytext'=>array(
					'Minimum',
					'Maximum',
				),
				'parameter'=>array(
					'minimum',
					'maximum',
				),
				'function'=>'random_int',
			);
			
			$this->SetInputAndFunctionResults($set_input_and_function_results);
			
			return TRUE;
		}
		
		public function Hash()
		{
			$set_input_and_function_results = array(
				'displaytext'=>array(
					'Hashing Algorithm',
					'Plaintext',
				),
				'parameter'=>array(
					'hashing-algorithm',
					'plaintext',
				),
				'function'=>'hash',
			);
			
			$this->SetInputAndFunctionResults($set_input_and_function_results);
			
			$this->SetHashingAlgorithms();
			
			return TRUE;
		}
		
		public function BaseConvertBase()
		{
			$base = new Base();
			$set_input_and_function_results = array(
				'displaytext'=>array(
					'Starting Base',
					'Ending Base',
					'Value',
				),
				'parameter'=>array(
					'starting-base',
					'ending-base',
					'value',
				),
				'function'=>'ConvertBase',
				'object'=>$base,
				'arguments'=>array(
					'startingbase'=>'starting-base',
					'endingbase'=>'ending-base',
					'value'=>'value',
				),
				
			);
			
			$this->SetInputAndMethodResults($set_input_and_function_results);
			
			$this->SetConversionBases();
			
			return TRUE;
		}
		
		public function HashFile()
		{
			$set_input_and_function_results = array(
				'displaytext'=>array(
					'Hashing Algorithm',
					'File',
				),
				'parameter'=>array(
					'hashing-algorithm',
					'file',
				),
				'function'=>'hash_file',
			);
			
			$this->SetInputAndFunctionResults($set_input_and_function_results);
			
			$this->SetHashingAlgorithms();
			
			return TRUE;
		}
		
		public function MethodExists()
		{
			$set_input_and_function_results = array(
				'displaytext'=>array(
					'Object',
					'Method Name',
				),
				'parameter'=>array(
					'object',
					'method-name',
				),
				'function'=>'method_exists',
			);
			
			$this->SetInputAndFunctionResults($set_input_and_function_results);
			
			return TRUE;
		}
		
		public function IsSubclassOf()
		{
			$set_input_and_function_results = array(
				'displaytext'=>array(
					'Object',
					'Class Name',
				),
				'parameter'=>array(
					'object',
					'class-name',
				),
				'function'=>'is_subclass_of',
			);
			
			$this->SetInputAndFunctionResults($set_input_and_function_results);
			
			return TRUE;
		}
					
					// Complex-Form Behaviors
					// --------------------------------------------------------------
		
		public function CheckDNSRR()
		{
			$dns_parameter = 'dns-rr';
			
			$this->SubmittedValue = $this->Param($dns_parameter);
			
			if(isset($this->SubmittedValue))
			{
				require('../classes/Networking/DNSRecord.php');
				
				$dns_record = new DNSRecord();
				
				$dns_types = $dns_record->GetDNSRecordTypes();
				$this->SubmittedValuePrintable = $this->cleanser_object->EscapeHTML([input=>$this->SubmittedValue])[cleansedinput];
				
				$get_function_results = array();
				
				foreach($dns_types as $dns_type)
				{
					$dns_type_query_results = checkdnsrr($this->SubmittedValue, $dns_type);
					
					if(!$dns_type_query_results)
					{
						$dns_type_query_results = 0;
					}
					
					$get_function_results[] = array(
						$dns_type,
						$dns_type_query_results,
					);
				}
				
				$this->StatusDataArray = $get_function_results;
			}
			
			return TRUE;
		}
	}

?>