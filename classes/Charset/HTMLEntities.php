<?php

	class HTMLEntities
	{
		
		public function CleanseInput_HTMLEntities($args)
		{
			$input = $args[input];
			$format = $args[format];
			
			$cleansed_input = htmlentities($input, $this->CleanseInput_HTMLEntities_Flags(), $format);
			
			$cleansed_input_results = array(
				'cleansedinput'=>$cleansed_input,
			);
			
			return $cleansed_input_results;
		}
		
		public function CleanseInput_HTMLEntities_Flags()
		{
			return ENT_COMPAT | ENT_HTML401;
		}
	}

?>