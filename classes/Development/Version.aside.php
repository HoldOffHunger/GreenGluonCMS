<?php

	class Version
	{
			// Constants
		public function GetSoftwareDesigner()
		{
			return 'Andy Carloff (AKA: Punkerslut)';
		}
		
		public function GetSoftwareName()
		{
			return 'Bakunin Cannabis Engine';
		}
		
		public function GetSoftwareAcronym()
		{
			return 'BCE';
		}
		
		public function GetSoftwareVersion()
		{
			return '3.00';
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