<?php

	trait SimpleGeography {
		public function SetGeographyBasics()
		{
			$this->SetCountryGeography();
		}
		
		public function SetCountryGeography()
		{
			require('../classes/Geography/Country.php');
			
			$this->country = new Country();
		}
	}
	
?>