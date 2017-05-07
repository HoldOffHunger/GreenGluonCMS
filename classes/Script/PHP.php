<?php

	class PHP
	{
		public function GetFunctionAttributes()
		{
			$attributes = [
				'FullFunctionName',
				'ShortFunctionName',
				'ShortSpacelessFunctionName',
				'CallableFunctionName',
				'PrettyCallableFunctionName',
				'FunctionStylesName',
				'Parameters',
			];
			return $attributes;
		}
		
		public function GetAllPHPFunctionInformation()
		{
			$php_function_names = [
						// phpinfo()
				
				[
					'FullFunctionName'=>'PHP Information',
					'ShortFunctionName'=>'PHP Info',
					'ShortSpacelessFunctionName'=>'PHPInfo',
					'CallableFunctionName'=>'phpinfo',
					'PrettyCallableFullFunctionName'=>'PHPInfo',
					'FunctionStylesName'=>'php-info',
					'Parameters'=>'',
				],
				
						// phpcredits()
						
				[
					'FullFunctionName'=>'PHP Credits',
					'ShortFunctionName'=>'PHP Credits',
					'ShortSpacelessFunctionName'=>'PHPCredits',
					'CallableFunctionName'=>'phpcredits',
					'PrettyCallableFullFunctionName'=>'PHPCredits',
					'FunctionStylesName'=>'php-credits',
					'Parameters'=>'',
				],
				
						// phpversion()
						
				[
					'FullFunctionName'=>'PHP Version',
					'ShortFunctionName'=>'PHP Version',
					'ShortSpacelessFunctionName'=>'PHPVersion',
					'CallableFunctionName'=>'phpversion',
					'PrettyCallableFullFunctionName'=>'PHPVersion',
					'FunctionStylesName'=>'php-version',
					'Parameters'=>'',
				],
		
						// mhash_count()
						
				[
					'FullFunctionName'=>'MHash Count',
					'ShortFunctionName'=>'MHash Count',
					'ShortSpacelessFunctionName'=>'MHashCount',
					'CallableFunctionName'=>'mhash_count',
					'PrettyCallableFullFunctionName'=>'MHash_Count',
					'FunctionStylesName'=>'mhash-count',
					'Parameters'=>'',
				],
		
						// php_uname()
						
				[
					'FullFunctionName'=>'PHP Uname',
					'ShortFunctionName'=>'PHP Uname',
					'ShortSpacelessFunctionName'=>'PHPUname',
					'CallableFunctionName'=>'php_uname',
					'PrettyCallableFullFunctionName'=>'PHP_UName',
					'FunctionStylesName'=>'php-uname',
					'Parameters'=>'',
				],
		
						// random_bytes()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Random Bytes',
					'ShortSpacelessFunctionName'=>'RandomBytes',
					'CallableFunctionName'=>'random_bytes',
					'PrettyCallableFullFunctionName'=>'Random_Bytes',
					'FunctionStylesName'=>'random-bytes',
					'Parameters'=>'length',
				],
				
						// php_sapi_name()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'PHP Sapi Name',
					'ShortSpacelessFunctionName'=>'PHPSapiName',
					'CallableFunctionName'=>'php_sapi_name',
					'PrettyCallableFullFunctionName'=>'PHP_Sapi_Name',
					'FunctionStylesName'=>'php-sapi-name',
					'Parameters'=>'',
				],
		
						// php_ini_scanned_files()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'PHP INI Scanned Files',
					'ShortSpacelessFunctionName'=>'PHPINIScannedFiles',
					'CallableFunctionName'=>'php_ini_scanned_files',
					'PrettyCallableFullFunctionName'=>'PHP_INI_Scanned_Files',
					'FunctionStylesName'=>'php-ini-scanned-files',
					'Parameters'=>'',
				],
		
						// php_ini_loaded_file()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'PHP INI Loaded File',
					'ShortSpacelessFunctionName'=>'PHPINILoadedFile',
					'CallableFunctionName'=>'php_ini_loaded_file',
					'PrettyCallableFullFunctionName'=>'PHP_INI_Loaded_File',
					'FunctionStylesName'=>'php-ini-loaded-file',
					'Parameters'=>'',
				],
		
						// func_num_args()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Func Num Args',
					'ShortSpacelessFunctionName'=>'FuncNumArgs',
					'CallableFunctionName'=>'func_num_args',
					'PrettyCallableFullFunctionName'=>'Func_Num_Args',
					'FunctionStylesName'=>'func-num-args',
					'Parameters'=>'',
				],
		
						// memory_get_usage()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Memory Get Usage',
					'ShortSpacelessFunctionName'=>'MemoryGetUsage',
					'CallableFunctionName'=>'memory_get_usage',
					'PrettyCallableFullFunctionName'=>'Memory_Get_Usage',
					'FunctionStylesName'=>'memory-get-usage',
					'Parameters'=>'',
				],
		
						// memory_get_peak_usage()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Memory Get Peak Usage',
					'ShortSpacelessFunctionName'=>'MemoryGetPeakUsage',
					'CallableFunctionName'=>'memory_get_peak_usage',
					'PrettyCallableFullFunctionName'=>'Memory_Get_Peak_Usage',
					'FunctionStylesName'=>'memory-get-peak-usage',
					'Parameters'=>'',
				],
		
						// getmyuid()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'INI Get All',
					'ShortSpacelessFunctionName'=>'INIGetAll',
					'CallableFunctionName'=>'ini_get_all',
					'PrettyCallableFullFunctionName'=>'INI_Get_All',
					'FunctionStylesName'=>'ini-get-all',
					'Parameters'=>'',
				],
		
						// checkdnsrr()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Check DNS RR',
					'ShortSpacelessFunctionName'=>'CheckDNSRR',
					'CallableFunctionName'=>'checkdnsrr',
					'PrettyCallableFullFunctionName'=>'CheckDNSRR',
					'FunctionStylesName'=>'check-dns-rr',
					'Parameters'=>'',
				],
		
						// getrusage()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get R Usage',
					'ShortSpacelessFunctionName'=>'GetRUsage',
					'CallableFunctionName'=>'getrusage',
					'PrettyCallableFullFunctionName'=>'GetRUsage',
					'FunctionStylesName'=>'get-r-usage',
					'Parameters'=>'',
				],
		
						// getopt()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Opt',
					'ShortSpacelessFunctionName'=>'GetOpt',
					'CallableFunctionName'=>'getopt',
					'PrettyCallableFullFunctionName'=>'GetOpt',
					'FunctionStylesName'=>'get-opt',
					'Parameters'=>'option',
				],
		
						// function_exists()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Function Exists',
					'ShortSpacelessFunctionName'=>'FunctionExists',
					'CallableFunctionName'=>'function_exists',
					'PrettyCallableFullFunctionName'=>'',
					'FunctionStylesName'=>'function-exists',
					'Parameters'=>'function',
				],
		
						// trait_exists()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Trait Exists',
					'ShortSpacelessFunctionName'=>'TraitExists',
					'CallableFunctionName'=>'trait_exists',
					'PrettyCallableFullFunctionName'=>'Trait_Exists',
					'FunctionStylesName'=>'trait-exists',
					'Parameters'=>'trait',
				],
		
						// property_exists()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Property Exists',
					'ShortSpacelessFunctionName'=>'PropertyExists',
					'CallableFunctionName'=>'property_exists',
					'PrettyCallableFullFunctionName'=>'Property_Exists',
					'FunctionStylesName'=>'property-exists',
					'Parameters'=>'',
				],
		
						// random_int()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Random Int',
					'ShortSpacelessFunctionName'=>'RandomInt',
					'CallableFunctionName'=>'random_int',
					'PrettyCallableFullFunctionName'=>'Random_Int',
					'FunctionStylesName'=>'random-int',
					'Parameters'=>'',
				],
		
						// hash()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Hash',
					'ShortSpacelessFunctionName'=>'Hash',
					'CallableFunctionName'=>'hash',
					'PrettyCallableFullFunctionName'=>'Hash',
					'FunctionStylesName'=>'hash',
					'Parameters'=>'',
				],
		
						// hash_file()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Hash File',
					'ShortSpacelessFunctionName'=>'HashFile',
					'CallableFunctionName'=>'hash_file',
					'PrettyCallableFullFunctionName'=>'Hash_File',
					'FunctionStylesName'=>'hash-file',
					'Parameters'=>'',
				],
		
						// method_exists()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Method Exists',
					'ShortSpacelessFunctionName'=>'MethodExists',
					'CallableFunctionName'=>'method_exists',
					'PrettyCallableFullFunctionName'=>'Method_Exists',
					'FunctionStylesName'=>'method-exists',
					'Parameters'=>'',
				],
		
						// is_subclass_of()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Is Subclass Of',
					'ShortSpacelessFunctionName'=>'IsSubclassOf',
					'CallableFunctionName'=>'is_subclass_of',
					'PrettyCallableFullFunctionName'=>'Is_Subclass_Of',
					'FunctionStylesName'=>'is-subclass-of',
					'Parameters'=>'',
				],
		
						// getmyuid()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get My UID',
					'ShortSpacelessFunctionName'=>'GetMyUID',
					'CallableFunctionName'=>'getmyuid',
					'PrettyCallableFullFunctionName'=>'GetMyUID',
					'FunctionStylesName'=>'get-my-uid',
					'Parameters'=>'',
				],
		
						// getmyinode()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get My Inode',
					'ShortSpacelessFunctionName'=>'GetMyInode',
					'CallableFunctionName'=>'getmyinode',
					'PrettyCallableFullFunctionName'=>'GetMyInode',
					'FunctionStylesName'=>'get-my-inode',
					'Parameters'=>'',
				],
		
						// getmygid()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get My Gid',
					'ShortSpacelessFunctionName'=>'GetMyGid',
					'CallableFunctionName'=>'getmygid',
					'PrettyCallableFullFunctionName'=>'GetMyGid',
					'FunctionStylesName'=>'get-my-gid',
					'Parameters'=>'',
				],
		
						// getlastmod()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Last Mod',
					'ShortSpacelessFunctionName'=>'GetLastMod',
					'CallableFunctionName'=>'getlastmod',
					'PrettyCallableFullFunctionName'=>'GetLastMod',
					'FunctionStylesName'=>'get-last-mod',
					'Parameters'=>'',
				],
		
						// get_required_files()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Required Files',
					'ShortSpacelessFunctionName'=>'GetRequiredFiles',
					'CallableFunctionName'=>'get_required_files',
					'PrettyCallableFullFunctionName'=>'Get_Required_Files',
					'FunctionStylesName'=>'get-required-files',
					'Parameters'=>'',
				],
		
						// func_get_args()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Func Get Args',
					'ShortSpacelessFunctionName'=>'FuncGetArgs',
					'CallableFunctionName'=>'func_get_args',
					'PrettyCallableFullFunctionName'=>'Func_Get_Args',
					'FunctionStylesName'=>'func-get-args',
					'Parameters'=>'',
				],
		
						// get_magic_quotes_runtime()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Magic Quotes Runtime',
					'ShortSpacelessFunctionName'=>'GetMagicQuotesRuntime',
					'CallableFunctionName'=>'get_magic_quotes_runtime',
					'PrettyCallableFullFunctionName'=>'Get_Magic_Quotes_Runtime',
					'FunctionStylesName'=>'get-magic-quotes-runtime',
					'Parameters'=>'',
				],
		
						// get_magic_quotes_gpc()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Magic Quotes GPC',
					'ShortSpacelessFunctionName'=>'GetMagicQuotesGPC',
					'CallableFunctionName'=>'get_magic_quotes_gpc',
					'PrettyCallableFullFunctionName'=>'Get_Magic_Quotes_GPC',
					'FunctionStylesName'=>'get-magic-quotes-gpc',
					'Parameters'=>'',
				],
		
						// get_called_class()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Called Class',
					'ShortSpacelessFunctionName'=>'GetCalledClass',
					'CallableFunctionName'=>'get_called_class',
					'PrettyCallableFullFunctionName'=>'Get_Called_Class',
					'FunctionStylesName'=>'get-called-class',
					'Parameters'=>'',
				],
		
						// get_loaded_extensions()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Loaded Extensions',
					'ShortSpacelessFunctionName'=>'GetLoadedExtensions',
					'CallableFunctionName'=>'get_loaded_extensions',
					'PrettyCallableFullFunctionName'=>'Get_Loaded_Extensions',
					'FunctionStylesName'=>'get-loaded-extensions',
					'Parameters'=>'',
				],
		
						// hash_algos()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Hash Algos',
					'ShortSpacelessFunctionName'=>'HashAlgos',
					'CallableFunctionName'=>'hash_algos',
					'PrettyCallableFullFunctionName'=>'Hash_Algos',
					'FunctionStylesName'=>'hash-algos',
					'Parameters'=>'',
				],
		
						// get_defined_vars()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Defined Vars',
					'ShortSpacelessFunctionName'=>'GetDefinedVars',
					'CallableFunctionName'=>'get_defined_vars',
					'PrettyCallableFullFunctionName'=>'Get_Defined_Vars',
					'FunctionStylesName'=>'get-defined-vars',
					'Parameters'=>'',
				],
		
						// get_included_files()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Included Files',
					'ShortSpacelessFunctionName'=>'GetIncludedFiles',
					'CallableFunctionName'=>'get_included_files',
					'PrettyCallableFullFunctionName'=>'Get_Included_Files',
					'FunctionStylesName'=>'get-included-files',
					'Parameters'=>'',
				],
		
						// get_defined_functions()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Defined Functions',
					'ShortSpacelessFunctionName'=>'GetDefinedFunctions',
					'CallableFunctionName'=>'get_defined_functions',
					'PrettyCallableFullFunctionName'=>'Get_Defined_Functions',
					'FunctionStylesName'=>'get-defined-functions',
					'Parameters'=>'',
				],
		
						// get_extension_funcs()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Extension Funcs',
					'ShortSpacelessFunctionName'=>'GetExtensionFuncs',
					'CallableFunctionName'=>'get_extension_funcs',
					'PrettyCallableFullFunctionName'=>'Get_Extension_Funcs',
					'FunctionStylesName'=>'get-extension-funcs',
					'Parameters'=>'extension',
				],
		
						// get_include_path()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Include Path',
					'ShortSpacelessFunctionName'=>'GetIncludePath',
					'CallableFunctionName'=>'get_include_path',
					'PrettyCallableFullFunctionName'=>'Get_Include_Path',
					'FunctionStylesName'=>'get-include-path',
					'Parameters'=>'',
				],
		
						// get_current_user()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Current User',
					'ShortSpacelessFunctionName'=>'GetCurrentUser',
					'CallableFunctionName'=>'get_current_user',
					'PrettyCallableFullFunctionName'=>'Get_Current_User',
					'FunctionStylesName'=>'get-current-user',
					'Parameters'=>'',
				],
		
						// gethostname()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Host Name',
					'ShortSpacelessFunctionName'=>'GetHostName',
					'CallableFunctionName'=>'gethostname',
					'PrettyCallableFullFunctionName'=>'GetHostName',
					'FunctionStylesName'=>'get-host-name',
					'Parameters'=>'',
				],
		
						// get_cfg_var()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get CFG Var',
					'ShortSpacelessFunctionName'=>'GetCFGVar',
					'CallableFunctionName'=>'get_cfg_var',
					'PrettyCallableFullFunctionName'=>'Get_CFG_Var',
					'FunctionStylesName'=>'get-cfg-var',
					'Parameters'=>'get-cfg-var',
				],
		
						// mhash_get_block_size()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'MHash Get Block Size',
					'ShortSpacelessFunctionName'=>'MHashGetBlockSize',
					'CallableFunctionName'=>'mhash_get_block_size',
					'PrettyCallableFullFunctionName'=>'MHash_Get_Block_Size',
					'FunctionStylesName'=>'mhash-get-block-size',
					'Parameters'=>'mhash-block-size',
				],
		
						// mhash_get_hash_name()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'MHash Get Hash Name',
					'ShortSpacelessFunctionName'=>'MHashGetHashName',
					'CallableFunctionName'=>'mhash_get_hash_name',
					'PrettyCallableFullFunctionName'=>'MHash_Get_Hash_Name',
					'FunctionStylesName'=>'mhash-get-hash-name',
					'Parameters'=>'',
				],
		
						// mhash()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'MHash',
					'ShortSpacelessFunctionName'=>'MHash',
					'CallableFunctionName'=>'mhash',
					'PrettyCallableFullFunctionName'=>'MHash',
					'FunctionStylesName'=>'mhash',
					'Parameters'=>'',
				],
		
						// is_string()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Is String',
					'ShortSpacelessFunctionName'=>'IsString',
					'CallableFunctionName'=>'is_string',
					'PrettyCallableFullFunctionName'=>'Is_String',
					'FunctionStylesName'=>'is-string',
					'Parameters'=>'is-string',
				],
		
						// is_scalar()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Is Scalar',
					'ShortSpacelessFunctionName'=>'IsScalar',
					'CallableFunctionName'=>'is_scalar',
					'PrettyCallableFullFunctionName'=>'Is_Scalar',
					'FunctionStylesName'=>'is-scalar',
					'Parameters'=>'is-scalar',
				],
		
						// is_resource()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Is Resource',
					'ShortSpacelessFunctionName'=>'IsResource',
					'CallableFunctionName'=>'is_resource',
					'PrettyCallableFullFunctionName'=>'Is_Resource',
					'FunctionStylesName'=>'is-resource',
					'Parameters'=>'is-resource',
				],
		
						// is_object()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Is Object',
					'ShortSpacelessFunctionName'=>'IsObject',
					'CallableFunctionName'=>'is_object',
					'PrettyCallableFullFunctionName'=>'Is_Object',
					'FunctionStylesName'=>'is-object',
					'Parameters'=>'is-object',
				],
		
						// is_numeric()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Is Numeric',
					'ShortSpacelessFunctionName'=>'IsNumeric',
					'CallableFunctionName'=>'is_numeric',
					'PrettyCallableFullFunctionName'=>'Is_Numeric',
					'FunctionStylesName'=>'is-numeric',
					'Parameters'=>'is-numeric',
				],
		
						// is_null()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Is Null',
					'ShortSpacelessFunctionName'=>'IsNull',
					'CallableFunctionName'=>'is_null',
					'PrettyCallableFullFunctionName'=>'Is_Null',
					'FunctionStylesName'=>'is-null',
					'Parameters'=>'is-null',
				],
		
						// is_long()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Is Long',
					'ShortSpacelessFunctionName'=>'IsLong',
					'CallableFunctionName'=>'is_long',
					'PrettyCallableFullFunctionName'=>'Is_Long',
					'FunctionStylesName'=>'is-long',
					'Parameters'=>'is-long',
				],
		
						// is_float()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Is Float',
					'ShortSpacelessFunctionName'=>'IsFloat',
					'CallableFunctionName'=>'is_float',
					'PrettyCallableFullFunctionName'=>'Is_Float',
					'FunctionStylesName'=>'is-float',
					'Parameters'=>'is-float',
				],
		
						// is_double()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Is Double',
					'ShortSpacelessFunctionName'=>'IsDouble',
					'CallableFunctionName'=>'is_double',
					'PrettyCallableFullFunctionName'=>'Is_Double',
					'FunctionStylesName'=>'is-double',
					'Parameters'=>'is-double',
				],
		
						// is_callable()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Is Callable',
					'ShortSpacelessFunctionName'=>'IsCallable',
					'CallableFunctionName'=>'is_callable',
					'PrettyCallableFullFunctionName'=>'Is_Callable',
					'FunctionStylesName'=>'is-callable',
					'Parameters'=>'is-callable',
				],
		
						// is_bool()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Is Bool',
					'ShortSpacelessFunctionName'=>'IsBool',
					'CallableFunctionName'=>'is_bool',
					'PrettyCallableFullFunctionName'=>'Is_Bool',
					'FunctionStylesName'=>'is-bool',
					'Parameters'=>'is-bool',
				],
		
						// is_array()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Is Array',
					'ShortSpacelessFunctionName'=>'IsArray',
					'CallableFunctionName'=>'is_array',
					'PrettyCallableFullFunctionName'=>'Is_Array',
					'FunctionStylesName'=>'is-array',
					'Parameters'=>'is-array',
				],
		
						// intval()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Int Val',
					'ShortSpacelessFunctionName'=>'IntVal',
					'CallableFunctionName'=>'intval',
					'PrettyCallableFullFunctionName'=>'IntVal',
					'FunctionStylesName'=>'int-value',
					'Parameters'=>'int-value',
				],
		
						// gettype()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Type',
					'ShortSpacelessFunctionName'=>'GetType',
					'CallableFunctionName'=>'gettype',
					'PrettyCallableFullFunctionName'=>'GetType',
					'FunctionStylesName'=>'get-type',
					'Parameters'=>'get-type',
				],
		
						// get_resource_type()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Resource Type',
					'ShortSpacelessFunctionName'=>'GetResourceType',
					'CallableFunctionName'=>'get_resource_type',
					'PrettyCallableFullFunctionName'=>'Get_Resource_Type',
					'FunctionStylesName'=>'get-resource-type',
					'Parameters'=>'get-resource-type',
				],
		
						// floatval()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Float Val',
					'ShortSpacelessFunctionName'=>'FloatVal',
					'CallableFunctionName'=>'floatval',
					'PrettyCallableFullFunctionName'=>'FloatVal',
					'FunctionStylesName'=>'float-value',
					'Parameters'=>'float-value',
				],
		
						// empty()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Empty Func',
					'ShortSpacelessFunctionName'=>'EmptyFunc',
					'CallableFunctionName'=>'empty',
					'PrettyCallableFullFunctionName'=>'Empty',
					'FunctionStylesName'=>'empty',
					'Parameters'=>'empty',
				],
		
						// boolval()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Bool Val',
					'ShortSpacelessFunctionName'=>'BoolVal',
					'CallableFunctionName'=>'boolval',
					'PrettyCallableFullFunctionName'=>'BoolVal',
					'FunctionStylesName'=>'bool-value',
					'Parameters'=>'bool-value',
				],
		
						// class_exists()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Class Exists',
					'ShortSpacelessFunctionName'=>'ClassExists',
					'CallableFunctionName'=>'class_exists',
					'PrettyCallableFullFunctionName'=>'Class_Exists',
					'FunctionStylesName'=>'class-exists',
					'Parameters'=>'class',
				],
		
						// interface_exists()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Interface Exists',
					'ShortSpacelessFunctionName'=>'InterfaceExists',
					'CallableFunctionName'=>'interface_exists',
					'PrettyCallableFullFunctionName'=>'Interface_Exists',
					'FunctionStylesName'=>'interface-exists',
					'Parameters'=>'interface-exists',
				],
		
						// get_parent_class()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Parent Class',
					'ShortSpacelessFunctionName'=>'GetParentClass',
					'CallableFunctionName'=>'get_parent_class',
					'PrettyCallableFullFunctionName'=>'Get_Parent_Class',
					'FunctionStylesName'=>'get-parent-class',
					'Parameters'=>'parent-class',
				],
		
						// get_declared_traits()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Declared Traits',
					'ShortSpacelessFunctionName'=>'GetDeclaredTraits',
					'CallableFunctionName'=>'get_declared_traits',
					'PrettyCallableFullFunctionName'=>'Get_Declared_Traits',
					'FunctionStylesName'=>'get-declared-traits',
					'Parameters'=>'',
				],
		
						// get_declared_interfaces()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Declared Interfaces',
					'ShortSpacelessFunctionName'=>'GetDeclaredInterfaces',
					'CallableFunctionName'=>'get_declared_interfaces',
					'PrettyCallableFullFunctionName'=>'Get_Declared_Interfaces',
					'FunctionStylesName'=>'get-declared-interfaces',
					'Parameters'=>'',
				],
		
						// get_declared_classes()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Declared Classes',
					'ShortSpacelessFunctionName'=>'GetDeclaredClasses',
					'CallableFunctionName'=>'get_declared_classes',
					'PrettyCallableFullFunctionName'=>'Get_Declared_Classes',
					'FunctionStylesName'=>'get-declared-classes',
					'Parameters'=>'',
				],
		
						// get_class_vars()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Class Vars',
					'ShortSpacelessFunctionName'=>'GetClassVars',
					'CallableFunctionName'=>'get_class_vars',
					'PrettyCallableFullFunctionName'=>'Get_Class_Vars',
					'FunctionStylesName'=>'get-class-vars',
					'Parameters'=>'',
				],
		
						// get_class_methods()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Class Methods',
					'ShortSpacelessFunctionName'=>'GetClassMethods',
					'CallableFunctionName'=>'get_class_methods',
					'PrettyCallableFullFunctionName'=>'Get_Class_Methods',
					'FunctionStylesName'=>'get-class-methods',
					'Parameters'=>'',
				],
		
						// gc_enabled()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'GC Enabled',
					'ShortSpacelessFunctionName'=>'GCEnabled',
					'CallableFunctionName'=>'gc_enabled',
					'PrettyCallableFullFunctionName'=>'GC_Enabled',
					'FunctionStylesName'=>'gc-enabled',
					'Parameters'=>'',
				],
		
						// http_response_code()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'HTTP Response Code',
					'ShortSpacelessFunctionName'=>'HTTPResponseCode',
					'CallableFunctionName'=>'http_response_code',
					'PrettyCallableFullFunctionName'=>'HTTP_Response_Code',
					'FunctionStylesName'=>'http-response-code',
					'Parameters'=>'',
				],
		
						// headers_sent()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Headers Sent',
					'ShortSpacelessFunctionName'=>'HeadersSent',
					'CallableFunctionName'=>'headers_sent',
					'PrettyCallableFullFunctionName'=>'Headers_Sent',
					'FunctionStylesName'=>'headers-sent',
					'Parameters'=>'',
				],
		
						// extension_loaded()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Extension Loaded',
					'ShortSpacelessFunctionName'=>'ExtensionLoaded',
					'CallableFunctionName'=>'extension_loaded',
					'PrettyCallableFullFunctionName'=>'Extension_Loaded',
					'FunctionStylesName'=>'extension-loaded',
					'Parameters'=>'extension',
				],
		
						// getprotobynumber()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Proto By Number',
					'ShortSpacelessFunctionName'=>'GetProtoByNumber',
					'CallableFunctionName'=>'getprotobynumber',
					'PrettyCallableFullFunctionName'=>'GetProtoByNumber',
					'FunctionStylesName'=>'get-proto-by-number',
					'Parameters'=>'protocol-by-number',
				],
		
						// getprotobyname()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Proto By Name',
					'ShortSpacelessFunctionName'=>'GetProtoByName',
					'CallableFunctionName'=>'getprotobyname',
					'PrettyCallableFullFunctionName'=>'GetProtoByName',
					'FunctionStylesName'=>'get-proto-by-name',
					'Parameters'=>'protocol-by-name',
				],
		
						// sys_get_temp_dir()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Sys Get Temp Dir',
					'ShortSpacelessFunctionName'=>'SysGetTempDir',
					'CallableFunctionName'=>'sys_get_temp_dir',
					'PrettyCallableFullFunctionName'=>'Sys_Get_Temp_Dir',
					'FunctionStylesName'=>'sys-get-temp-dir',
					'Parameters'=>'',
				],
		
						// cli_get_process_title()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'CLI Get Process Title',
					'ShortSpacelessFunctionName'=>'CLIGetProcessTitle',
					'CallableFunctionName'=>'cli_get_process_title',
					'PrettyCallableFullFunctionName'=>'CLI_Get_Process_Title',
					'FunctionStylesName'=>'cli-get-process-title',
					'Parameters'=>'',
				],
		
						// apache_response_headers()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Apache Response Headers',
					'ShortSpacelessFunctionName'=>'ApacheResponseHeaders',
					'CallableFunctionName'=>'apache_response_headers',
					'PrettyCallableFullFunctionName'=>'Apache_Response_Headers',
					'FunctionStylesName'=>'apache-response-headers',
					'Parameters'=>'',
				],
		
						// getservbyport()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Serv By Port',
					'ShortSpacelessFunctionName'=>'GetServByPort',
					'CallableFunctionName'=>'getservbyport',
					'PrettyCallableFullFunctionName'=>'GetServByPort',
					'FunctionStylesName'=>'get-serv-by-port',
					'Parameters'=>'',
				],
		
						// getservbyname()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Serv By Name',
					'ShortSpacelessFunctionName'=>'GetServByName',
					'CallableFunctionName'=>'getservbyname',
					'PrettyCallableFullFunctionName'=>'GetServByName',
					'FunctionStylesName'=>'get-serv-by-name',
					'Parameters'=>'',
				],
		
						// headers_list()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Headers List',
					'ShortSpacelessFunctionName'=>'HeadersList',
					'CallableFunctionName'=>'headers_list',
					'PrettyCallableFullFunctionName'=>'Headers_List',
					'FunctionStylesName'=>'headers-list',
					'Parameters'=>'',
				],
		
						// apache_request_headers()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Apache Request Headers',
					'ShortSpacelessFunctionName'=>'ApacheRequestHeaders',
					'CallableFunctionName'=>'apache_request_headers',
					'PrettyCallableFullFunctionName'=>'Apache_Request_Headers',
					'FunctionStylesName'=>'apache-request-headers',
					'Parameters'=>'',
				],
		
						// get_defined_constants()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Defined Constants',
					'ShortSpacelessFunctionName'=>'GetDefinedConstants',
					'CallableFunctionName'=>'get_defined_constants',
					'PrettyCallableFullFunctionName'=>'Get_Defined_Constants',
					'FunctionStylesName'=>'get-defined-constants',
					'Parameters'=>'',
				],
		
						// assert_options()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Assert Options',
					'ShortSpacelessFunctionName'=>'AssertOptions',
					'CallableFunctionName'=>'assert_options',
					'PrettyCallableFullFunctionName'=>'Assert_Options',
					'FunctionStylesName'=>'assert-options',
					'Parameters'=>'',
				],
		
						// getallheaders()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get All Headers',
					'ShortSpacelessFunctionName'=>'GetAllHeaders',
					'CallableFunctionName'=>'getallheaders',
					'PrettyCallableFullFunctionName'=>'GetAllHeaders',
					'FunctionStylesName'=>'get-all-headers',
					'Parameters'=>'',
				],
		
						// getmxrr()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get MXRR',
					'ShortSpacelessFunctionName'=>'GetMXRR',
					'CallableFunctionName'=>'getmxrr',
					'PrettyCallableFullFunctionName'=>'GetMXRR',
					'FunctionStylesName'=>'get-mxrr',
					'Parameters'=>'',
				],
		
						// gethostbynamel()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Host By Name L',
					'ShortSpacelessFunctionName'=>'GetHostByNameL',
					'CallableFunctionName'=>'gethostbynamel',
					'PrettyCallableFullFunctionName'=>'GetHostByNameL',
					'FunctionStylesName'=>'get-host-by-name-l',
					'Parameters'=>'host-by-name-l',
				],
		
						// apache_lookup_uri()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Apache Lookup URI',
					'ShortSpacelessFunctionName'=>'ApacheLookupURI',
					'CallableFunctionName'=>'apache_lookup_uri',
					'PrettyCallableFullFunctionName'=>'Apache_Lookup_URI',
					'FunctionStylesName'=>'apache-lookup-uri',
					'Parameters'=>'apache-lookup-uri',
				],
		
						// gethostbyname()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Host By Name',
					'ShortSpacelessFunctionName'=>'GetHostByName',
					'CallableFunctionName'=>'gethostbyname',
					'PrettyCallableFullFunctionName'=>'GetHostByName',
					'FunctionStylesName'=>'get-host-by-name',
					'Parameters'=>'host-by-name',
				],
		
						// apache_getenv()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Apache Get Env',
					'ShortSpacelessFunctionName'=>'ApacheGetEnv',
					'CallableFunctionName'=>'apache_getenv',
					'PrettyCallableFullFunctionName'=>'Apache_GetEnv',
					'FunctionStylesName'=>'apache-get-env',
					'Parameters'=>'apache-get-env',
				],
		
						// gethostbyaddr()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Get Host By Addr',
					'ShortSpacelessFunctionName'=>'GetHostByAddr',
					'CallableFunctionName'=>'gethostbyaddr',
					'PrettyCallableFullFunctionName'=>'GetHostByAddr',
					'FunctionStylesName'=>'get-host-by-addr',
					'Parameters'=>'host-by-address',
				],
		
						// inet_pton()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'INet PTon',
					'ShortSpacelessFunctionName'=>'INetPTon',
					'CallableFunctionName'=>'inet_pton',
					'PrettyCallableFullFunctionName'=>'INet_PTon',
					'FunctionStylesName'=>'inet-pton',
					'Parameters'=>'inet-pton',
				],
		
						// inet_ntop()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'INet NTop',
					'ShortSpacelessFunctionName'=>'INetNTop',
					'CallableFunctionName'=>'inet_ntop',
					'PrettyCallableFullFunctionName'=>'INet_NTop',
					'FunctionStylesName'=>'inet-ntop',
					'Parameters'=>'inet-ntop',
				],
		
						// ip2long()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'IP 2 Long',
					'ShortSpacelessFunctionName'=>'IP2Long',
					'CallableFunctionName'=>'ip2long',
					'PrettyCallableFullFunctionName'=>'IP2Long',
					'FunctionStylesName'=>'ip-2-long',
					'Parameters'=>'ip-2-long',
				],
		
						// long2ip()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Long 2 IP',
					'ShortSpacelessFunctionName'=>'Long2IP',
					'CallableFunctionName'=>'long2ip',
					'PrettyCallableFullFunctionName'=>'Long2IP',
					'FunctionStylesName'=>'long-2-ip',
					'Parameters'=>'long-2-ip',
				],
		
						// apache_get_version()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Apache Get Version',
					'ShortSpacelessFunctionName'=>'ApacheGetVersion',
					'CallableFunctionName'=>'apache_get_version',
					'PrettyCallableFullFunctionName'=>'Apache_Get_Version',
					'FunctionStylesName'=>'apache-get-version',
					'Parameters'=>'',
				],
		
						// apache_get_modules()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'Apache Get Modules',
					'ShortSpacelessFunctionName'=>'ApacheGetModules',
					'CallableFunctionName'=>'apache_get_modules',
					'PrettyCallableFullFunctionName'=>'Apache_Get_Modules',
					'FunctionStylesName'=>'apache-get-modules',
					'Parameters'=>'',
				],
		
						// dns_get_record()
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'DNS Get Record',
					'ShortSpacelessFunctionName'=>'DNSGetRecord',
					'CallableFunctionName'=>'dns_get_record',
					'PrettyCallableFullFunctionName'=>'DNS_Get_Record',
					'FunctionStylesName'=>'dns-get-record',
					'Parameters'=>'',
				],
			];
			
			return $php_function_names;
		}
	}

?>