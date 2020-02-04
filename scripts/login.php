<?php

	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/URLs.php');
	require('../traits/scripts/SimpleForms.php');
	require('../traits/scripts/SimpleLookupLists.php');
	require('../traits/scripts/SimpleORM.php');

	class login extends basicscript {
		use DBFunctions;
		use URLs;
		use SimpleForms;
		use SimpleLookupLists;
		use SimpleORM;
		
			// Security Data
		
		public function IsSecure() {
			return TRUE;
		}
		
		public function RequiresLogin() {
			return FALSE;
		}
		
			// Login
			//
			// Just show the login screen, i.e., username/password.
			//
			// ---------------------------------------------
		
		public function Display() {
			$this->SetPrimaryHostRecords();		# Returns false if none are found.
			
			return TRUE;
		}
		
			// Authenticate
			//
			// Actually authenticate a login attempt.
			//
			// ---------------------------------------------
		
		public function Authenticate() {
			if($this->Param('google_token_id')) {
					// Google Login?  We must already be authenticated, hook it up.
				$this->login_results = [
					'status'=>'Success',
					'useraccount'=>$this->authentication_object->user_session,
				];
				return TRUE;
			}
			$this->SetPrimaryHostRecords();
			
			$username = $this->param('username');
			$password = $this->param('password');
			
			$login_args = [
				'username'=>$username,
				'password'=>$password,
			];
			
			return $this->login_results = $this->authentication_object->Login($login_args);
		}
		
		public function HTMLHeadDisplayExtra_HTTPEquivalents() {
			$redirect_url = '';
			
			if($this->login_results['status'] == 'Success') {
				$redirect = $this->param('redirect');
				
				if($this->validateRedirect(['url'=>$redirect])) {
					$redirect_url = $redirect;
				} else {
					$user_admin_account = $this->login_results['useraccount'];
					
					if($user_admin_account['UserAdmin.id']) {
						$redirect_url = 'master-c.' . $this->script_extension;
					} else {
						$redirect_url = 'user-panel.' . $this->script_extension;
					}
				}
			} elseif($this->login_results['status'] == 'Failure') {
				$redirect_url = 'login.' . $this->script_extension .
						'?failure=1' ;
			}
			
			if($redirect_url) {
				print("\n\t");
				print('<meta http-equiv="refresh" content="3; url=' . $redirect_url . '">');
			}
			
			return TRUE;
		}
		
				// ** HTML FORMAT DATA ** //
		
			// Title
		
		public function GetHTMLFormatData_Title() {
			$this->SetORM();
			$this->SetMasterRecord();
			return 'Login to ' . $this->master_record['Code'];
		}
	}

?>