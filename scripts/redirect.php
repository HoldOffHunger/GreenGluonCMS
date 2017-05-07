<?php

	require('../traits/scripts/SimpleForms.php');

	class redirect extends basicscript
	{
		use SimpleForms;
		public function HTMLHeadDisplayExtra_HTTPEquivalents()
		{
			$redirect_url = $this->script_args[redirecturl];
			
			if($redirect_url)
			{
				print("\n\t");
				print('<meta http-equiv="refresh" content="1; url=' . $redirect_url . '">');
			//	print("<direct it! $redirect_url>");
			}
		}
		
		public function redirecttologin()
		{
		}
		
		public function redirecttoasecuredconnection()
		{
		}
		
			// Security Data
		
		public function IsAccessible()
		{
			return FALSE;
		}
		
				// ** HTML FORMAT DATA ** //
		
			// Title
		
		public function GetHTMLFormatData_Title()
		{
			return 'Redirecting';
		}
	}

?>