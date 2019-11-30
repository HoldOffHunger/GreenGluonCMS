<?php

	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/SimpleForms.php');
	require('../traits/scripts/SimpleLookupLists.php');
	require('../traits/scripts/SimpleORM.php');

	class login extends basicscript
	{
		use DBFunctions;
		use SimpleForms;
		use SimpleLookupLists;
		use SimpleORM;
		
			// Security Data
		
		public function IsSecure()
		{
			return TRUE;
		}
		
		public function RequiresLogin()
		{
			return FALSE;
		}
		
		public function Display()
		{
			$this->SetPrimaryHostRecords();		# Returns false if none are found.
			
			return TRUE;
		}
		
			// Authenticate
		
		public function Authenticate()
		{
			$this->SetPrimaryHostRecords();
			
			$username = $this->query_object->Parameter(['parameter'=>'username']);
			$password = $this->query_object->Parameter(['parameter'=>'password']);
			
			$login_args = [
				'username'=>$username,
				'password'=>$password,
			];
			
			return $this->login_results = $this->authentication_object->Login($login_args);
		}
		
		public function HTMLHeadDisplayExtra_HTTPEquivalents()
		{
			$redirect_url = '';
			
			if($this->login_results[status] == 'Success')
			{
				$user_admin_account = $this->login_results[useraccount];
				
				if($user_admin_account['UserAdmin.id'])
				{
					$redirect_url = 'master-c.' . $this->script_extension;
				}
				else
				{
					$redirect_url = 'user-panel.' . $this->script_extension;
				}
			}
			elseif($this->login_results[status] == 'Failure')
			{
				$redirect_url = 'login.' . $this->script_extension .
						'?failure=1' ;
			}
			
			if($redirect_url)
			{
				print("\n\t");
				print('<meta http-equiv="refresh" content="3; url=' . $redirect_url . '">');
			}
		}
		
				// ** HTML FORMAT DATA ** //
		
			// Title
		
		public function GetHTMLFormatData_Title()
		{
			$this->SetORM();
			$this->SetMasterRecord();
			return 'Login to ' . $this->master_record['Code'];
		}
	}

?>