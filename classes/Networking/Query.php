<?php

	class Query
	{
		public $post_data;
		public $get_data;
		
		public $cleanser;
		
		public $parameter_data;
		
		public function __construct($args)
		{
			$this->post_data = $_POST;
			$this->get_data = $_GET;
			
			$this->cleanser = $args[cleanser];
			
			$this->Construct_Parameters();
		}
		
		public function Construct_Parameters()
		{
			foreach ($this->post_data as $key => $value)
			{
				$add_single_parameter_args = [
					key=>$key,
					value=>$value,
				];
				$this->Construct_Parameters_AddSingleParameter($add_single_parameter_args);
			}
			
			foreach ($this->get_data as $key => $value)
			{
				if(!$this->parameter_data[$key])
				{
					$add_single_parameter_args = [
						key=>$key,
						value=>$value,
					];
					$this->Construct_Parameters_AddSingleParameter($add_single_parameter_args);
				}
			}
		}
		
		public function Construct_Parameters_AddSingleParameter($args)
		{
			$key = $args[key];
			$value = $args[value];
			$convertentities = $args[convertentities];
			
			if(is_array($value))
			{
				$this->parameter_data[$key] = [];
				foreach ($value as $valueoption)
				{
					$cleanse_input_utf8_args = [
						input=>$valueoption,
						convertentities=>$convertentities,
					];
					
					$cleansed_data = $this->cleanser->utf8_characters->CleanseInput_UTF8($cleanse_input_utf8_args);
					$this->parameter_data[$key][] = $cleansed_data['cleansedinput'];
				}
			}
			else
			{
				$cleanse_input_utf8_args = [
					input=>$value,
				];
				
				$cleansed_data = $this->cleanser->utf8_characters->CleanseInput_UTF8($cleanse_input_utf8_args);
				$this->parameter_data[$key] = $cleansed_data['cleansedinput'];
			}
		}
		
		public function Parameter($args)
		{
			$parameter = $args[parameter];
			
			return $this->parameter_data[$parameter];
		}
	}

?>