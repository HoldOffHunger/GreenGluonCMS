<?php

	class BCE
	{
		public function GetMasterVariablesForObject($args)
		{
			$object = $args[object];
			
			$master_variable_names_for_object = [];
			$master_variable_names = $this->GetMasterVariableNames();
			
			foreach ($master_variable_names as $master_variable_name)
			{
				$master_variable_names_for_object[$master_variable_name['FullName']] = $object->$master_variable_name['AttributeName'];
			}
			
			return $master_variable_names_for_object;
		}
		
		public function GetMasterVariableNames()
		{
			return [
				[
					'FullName'=>'Desired Script',
					'AttributeName'=>'desired_script',
				],
				[
					'FullName'=>'Desired Action',
					'AttributeName'=>'desired_action',
				],
				[
					'FullName'=>'Object Code',
					'AttributeName'=>'object_code',
				],
				[
					'FullName'=>'Object Parent',
					'AttributeName'=>'object_parent',
				],
				[
					'FullName'=>'Object List',
					'AttributeName'=>'object_list',
				],
				[
					'FullName'=>'Script Location',
					'AttributeName'=>'script_location',
				],
				[
					'FullName'=>'Script Name',
					'AttributeName'=>'script_name',
				],
				[
					'FullName'=>'Script File',
					'AttributeName'=>'script_file',
				],
				[
					'FullName'=>'Script Extension',
					'AttributeName'=>'script_extension',
				],
				[
					'FullName'=>'Script Format',
					'AttributeName'=>'script_format',
				],
				[
					'FullName'=>'Script Format Lower',
					'AttributeName'=>'script_format_lower',
				],
			];
		}
	}

?>