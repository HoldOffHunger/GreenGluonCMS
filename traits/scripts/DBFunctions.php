<?php

	trait DBFunctions {
		public function GetAllTablesMySQLSelect() {
			$this->mysql_tables = $this->db_admin->GetTableNames();
			$this->mysql_tables_select = [];
			
			foreach ($this->mysql_tables as $mysql_table_order => $mysql_table)
			{
				$this->mysql_tables_select[] = [
					'optionvalue'=>$mysql_table,
					'optiontitle'=>$mysql_table,
					'optionmouseover'=>'Dump the ' . $mysql_table . ' Table.',
				];
			}
		}
		
		public function SetPrimaryHostRecords() {
			$mysql_table_args = [
				'type'=>'PrimaryHostRecord',
				'definition'=>[
				],
				'orderby'=>'RecordKey',
			];
			
			$primary_host_records = $this->db_access_object->GetRecords($mysql_table_args);
			
			$singular_primary_host_record_hash = [];
			
			foreach($primary_host_records as $primary_host_record)
			{
				if($singular_primary_host_record_hash[$primary_host_record['RecordKey']])
				{
					if(is_array($singular_primary_host_record_hash[$primary_host_record['RecordKey']]))
					{
						$singular_primary_host_record_hash[$primary_host_record['RecordKey']][] = $primary_host_record['RecordValue'];
					}
					else
					{
						$singular_primary_host_record_hash[$primary_host_record['RecordKey']] = [$singular_primary_host_record_hash[$primary_host_record['RecordKey']]];
						
						$singular_primary_host_record_hash[$primary_host_record['RecordKey']][] = $primary_host_record['RecordValue'];
					}
				}
				else
				{
					$singular_primary_host_record_hash[$primary_host_record['RecordKey']] = $primary_host_record['RecordValue'];
				}
			}
			
			ksort($singular_primary_host_record_hash);
			$this->primary_host_record = $singular_primary_host_record_hash;
			
			return $this->primary_host_records = $primary_host_records;
		}
	}

?>