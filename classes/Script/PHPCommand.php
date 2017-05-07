<?php

	class PHPCommand extends PHP
	{
		public function __construct($args)
		{
			$all_php_function_information = $this->GetAllPHPFunctionInformation();
			$function_attributes = $this->GetFunctionAttributes();
			foreach ($function_attributes as $function_attribute)
			{
				$defined_attribute = $args[$function_attribute];
				
				if($defined_attribute)
				{
					foreach ($all_php_function_information as $php_function_information)
					{
						if($defined_attribute == $php_function_information[$function_attribute])
						{
							$set_php_function_information_args = [
								'functiondata'=>$php_function_information,
							];
							
							$this->SetPHPFunctionInformation($set_php_function_information_args);
							continue;
						}
					}
					
					if($this->FullFunctionName)
					{
						continue;
					}
				}
			}
		}
		
		public function SetPHPFunctionInformation($args)
		{
			$function_data = $args['functiondata'];
			$function_attributes = $this->GetFunctionAttributes();
			
			foreach ($function_attributes as $function_attribute)
			{
				$this->$function_attribute = $function_data[$function_attribute];
			}
		}
		
		public function GetPHPFunctionInformation()
		{
			$attributes = [];
			$function_attributes = $this->GetFunctionAttributes();
			
			foreach ($function_attributes as $function_attribute)
			{
				$attributes[$function_attribute] = $this->$function_attribute;
			}
			
			return $attributes;
		}
		
		/*
		
						// 
						
				[
					'FullFunctionName'=>'',
					'ShortFunctionName'=>'',
					'ShortSpacelessFunctionName'=>'',
					'CallableFunctionName'=>'',
					'PrettyCallableFullFunctionName'=>'',
					'FunctionStylesName'=>'',
					'FunctionExpectedInput'=>'',
				],
		
		*/
	}

?>