<?php

	trait UserAccounts {
		public function GetLoginURL()
		{
			$url = $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]);
			
			if(count($this->object_list))
			{
				$location = implode('/', $this->object_list) . '/';
			}
			else
			{
				$location = '';
			}
			
			$url .= '/' . $location . 'login.php';
			
			return '<a href="' . $url . '">Login</a>';
		}
	}

?>