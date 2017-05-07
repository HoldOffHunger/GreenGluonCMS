<?php

	class security extends basicscript
	{
			// Security Data
		
		public function IsSecure()
		{
			return FALSE;
		}
		
		public function IsAccessible()
		{
			return FALSE;
		}
		
				// ** HTML FORMAT DATA ** //
		
			// Title
		
		public function GetHTMLFormatData_Title()
		{
			return 'Security';
		}
	}

?>