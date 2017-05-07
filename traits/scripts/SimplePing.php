<?php

	trait SimplePing {
		public function SetCurlStatus($args)
		{
			$this->SetCurlStatus_RequireFiles();
			
			$curl_resource = $args[curlresource];
			
			$http_code = curl_getinfo($curl_resource, CURLINFO_HTTP_CODE);
			
			$curl_status = [];
			$curl_status_options = $this->GetCurlOptions();
			
			foreach($curl_status_options as $curl_option_label => $curl_option_constant)
			{
				$curl_status[$curl_option_label] = curl_getinfo($curl_resource, $curl_option_constant);
			}
			
			return $this->curl_status = $curl_status;
		}
		
		public function SetCurlStatus_RequireFiles()
		{
			require('../classes/Networking/Curl.php');
			$curl = new Curl;
			
			$this->curl = $curl;
			
			require('../classes/Networking/NetworkStatusCode.php');
			$network_status_code = new NetworkStatusCode;
			
			$this->network_status_code = $network_status_code;
		}
		
		public function GetCurlOptions()
		{
			return $this->curl->GetCurlOptions();
		}
		
		public function GetNetworkStatusCodes()
		{
			return $this->network_status_code->GetNetworkStatusCodes();
		}
	}
?>