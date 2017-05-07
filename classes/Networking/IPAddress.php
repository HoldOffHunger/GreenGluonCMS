<?php

	class IPAddress
	{
		public function GetRawIPAddressSource()
		{
			return($_SERVER['REMOTE_ADDR']);
		}
		
		public function GetIPAddress()
		{
			return($this->GetRawIPAddressSource());
		}
		
		public function GetIPAddressForDatabase()
		{
			$raw_ip_address = $this->GetRawIPAddressSource();
			
			$converted_ip_address_args = array(
				'ipaddress'=>$raw_ip_address,
			);
			
			$converted_ip_address = $this->ConvertIPAddressForDatabase($converted_ip_address_args);
			
			return($converted_ip_address);
		}
		
		public function ConvertIPAddressForDatabase($args)
		{
			$raw_ip_address = $args[ipaddress];
			
			$ip_conversion_args = array(
				'ipaddress'=>$raw_ip_address,
			);
			
			$converted_ip_address = '';
			
			if($this->IsIPv4Address($ip_conversion_args))
			{
				$converted_ip_address = $this->ConvertIPv4AddressToIPv6Address($ip_conversion_args);
			}
			elseif($this->IsIPv6Address($ip_conversion_args))
			{
				$converted_ip_address = $this->CleanseIPv6ForDatabase($ip_conversion_args);
			}
			
			return ($converted_ip_address);
		}
		
		public function ConvertIPv4AddressToIPv6Address($args)
		{
			$ipv4_address = $args[ipaddress];
			
			$ipv6_address_prefix = $this->GetIPv4ToIPv6Prefix();
			$ipv6_address_suffix = '';
			
			$ipv4_address_pieces = explode('.', $ipv4_address);
			
			foreach($ipv4_address_pieces as $ipv4_octet)
			{
				$ipv6_piece = dechex($ipv4_octet);
				$ipv6_piece = str_pad($ipv6_piece, 2, '0', STR_PAD_LEFT);
				$ipv6_address_suffix .= $ipv6_piece;
			}
			
			$ipv6_address = $ipv6_address_prefix . $ipv6_address_suffix;
			return ($ipv6_address);
		}
		
		public function CleanseIPv6ForDatabase ($args)
		{
			$ipv4_address = $args[ipaddress];
			$ipv4_address_cleansed = str_replace(':', '', $ipv4_address);
			return $ipv4_address_cleansed;
		}
		
		public function GetIPv4ToIPv6Prefix()
		{
			return ('200200000000000000000000');
		}
		
		public function IsIPv4Address($args)
		{
			$ip_address = $args[ipaddress];
			
			if(strstr($ip_address, '.'))
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		
		public function IsIPv6Address($args)
		{
			$ip_address = $args[ipaddress];
			
			if(strstr($ip_address, ':'))
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
	}

?>