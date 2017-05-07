<?php

	class Version
	{
			// Constants
		public function GetSoftwareDesigner()
		{
			return 'Benjamin Tepolt';
		}
		
		public function GetSoftwareName()
		{
			return 'Green Gluon CMS';
		}
		
		public function GetSoftwareAcronym()
		{
			return 'GG-CMS';
		}
		
		public function GetSoftwareVersion()
		{
			return '1.00';
		}
		
			// Constant-Based Functions
		public function GetSoftwareNameAcronymAndVersion()
		{
			return $this->GetSoftwareName() . ' (' . $this->GetSoftwareAcronym() . '): Version ' . $this->GetSoftwareVersion();
		}
		
		public function GetSoftwareNameAndAcronym()
		{
			return $this->GetSoftwareName() . ' (' . $this->GetSoftwareAcronym() . ')';
		}
		
		public function GetSoftwareAcronymAndVersion()
		{
			return $this->GetSoftwareAcronym() . ' V. ' . $this->GetSoftwareVersion();
		}
	}

?>