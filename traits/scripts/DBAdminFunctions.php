<?php

	trait DBAdminFunctions {
		public function ViewMySQLInformationSchemaBase($args) {
			$this->SetDBAdmin();
			$information_schema_function_name = 'GetMySQL' . $args['field'];
			return $this->StatusDataArray = $this->db_admin->$information_schema_function_name();
		}
		
		public function SetDBAdmin() {
			require('../classes/Database/DBAdmin.php');
			$this->db_admin = new DBAdmin([
				'dbaccessobject'=>$this->db_access_object,
				'globals'=>$this->globals,
			]);
		}
		
		public function DBAdminDetectBlankListTitles($args)
		{
			return $this->db_admin->DetectBlankListTitles($args);
		}
		
		public function DBAdminClonePrimaryHostDatabase($args)
		{
			return $this->db_admin->ClonePrimaryHostDatabase($args);
		}
		
		public function DBAdminCloneAdminAccountsToNewDatabase($args)
		{
			return $this->db_admin->CloneAdminAccountsToNewDatabase($args);
		}
		
		public function DBAdminCloneFilesToNewDatabase($args)
		{
			return $this->db_admin->CloneFilesToNewDatabase($args);
		}
		
		public function CloneStatsToNewDatabase($args) {
			return $this->db_admin->CloneStatsToNewDatabase($args);
		}
		
		public function CloneDataToNewDatabase($args) {
			return $this->db_admin->CloneDataToNewDatabase($args);
		}
		
		public function SetPrimaryHostList()
		{
			$this->primary_hosts = $this->db_admin->ViewAllPrimaryHosts();
		}
		
		public function GetPrimaryHostSelectList()
		{
			$primary_host_options = [];
			
			foreach($this->primary_hosts as $primary_host)
			{
				if($primary_host != 'clonefrom.com')
				{
					$primary_host_options[] = [
						'optiontitle'=>$primary_host,
						'optionvalue'=>$primary_host,
						'optionmouseover'=>'See Statistics For ' . $primary_host,
					];
				}
			}
			
			$primary_host_options[] = [
				'optiontitle'=>'All Hosts',
				'optionvalue'=>'allhosts',
				'optionmouseover'=>'See Statistics For All Hosts',
			];
			
			return $primary_host_options;
		}
	}

?>