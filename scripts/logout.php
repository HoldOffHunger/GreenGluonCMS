<?php

	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/URLs.php');
	require('../traits/scripts/SimpleForms.php');

	class logout extends basicscript {
		use DBFunctions;
		use URLs;
		use SimpleForms;
		
			// Security Data
		
		public function IsSecure() {
			return TRUE;
		}
		
		public function RequiresLogin() {
			return FALSE;
		}
		
		public function Display() {
			$this->logout_results = $this->authentication_object->Logout();
			
			if($this->logout_results['Userid']) {
				$this->logout_status = 'Success';
			} else {
				$this->logout_status = 'Failure';
			}
			
			return TRUE;
		}
		
		public function HTMLHeadDisplayExtra_HTTPEquivalents() {
			$redirect_url = 'login.' . $this->script_extension;
			
			if($redirect_url) {
					# because logout stuff, we need to do this actually in the javascript, AFTER the google api widget receives an "accepted action" notice from the logout api
			#	print("\n\t");
			#	print('<meta http-equiv="refresh" content="3; url=' . $redirect_url . '">');
			}
		}
		
				// ** HTML FORMAT DATA ** //
		
			// Title
		
		public function GetHTMLFormatData_Title() {
			return 'Logout of OurUprising';
		}
	}

?>