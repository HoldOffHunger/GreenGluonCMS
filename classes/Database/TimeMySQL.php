<?php

	class TimeMySQL
	{
		public function __construct()
		{
		}
		
		public function ConvertTimeFromEpochToMySQLFormat($epoch_time)
		{
			return date ("Y-m-d H:i:s", $epoch_time);
		}
	}

?>