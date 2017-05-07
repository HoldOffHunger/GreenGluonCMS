<?php

	class Domain
	{
		public $primary_domain;
		public $primary_domain_lowercased;
		public $protocol;
		public $secure;
		
		public function __construct()
		{
			$this->SetPrimaryDomain();
			
			if($_SERVER[HTTPS] == 'on')
			{
				$this->protocol = 'https';
			}
			else
			{
				$this->protocol = 'http';
			}
		}
		
		public function SetPrimaryDomain()
		{
			$server_name = $_SERVER['SERVER_NAME'];
			$server_name_pieces = explode('.', $server_name);
			$server_name_pieces_count = count($server_name_pieces);
			for($i = 0; $i < $server_name_pieces_count; $i++)
			{
				$server_name_piece = $server_name_pieces[$i];
				if($server_name_piece != 'www')
				{
					$server_base_name = $server_name_piece;
					$i = $server_name_pieces_count;
				}
			}
			$this->host = $server_base_name;
			
			$primary_domain = $server_name;
			
			if(preg_match("#^www\.#i", $primary_domain))
			{
				$primary_domain = preg_replace("#^www\.#i", "", $primary_domain);
			}
			
			$this->primary_domain = $primary_domain;
			$this->primary_domain_lowercased = $primary_domain;
		}
		
		public function GetPrimaryDomain($args)
		{
			$primary_domain = '';
			
			if(($this->GetHTTPSConnection() || $args[secure]) && !$args[insecure])
			{
				$primary_domain .= 'https://';
			}
			else
			{
				$primary_domain .= 'http://';
			}
			
			if($args[www])
			{
				$primary_domain .= 'www.';
			}
			
			if($args[domain]) {
				$primary_domain .= $args[domain];
			}
			elseif($args[lowercased])
			{
				$primary_domain .= $this->primary_domain;
			}
			else
			{
				$primary_domain .= $this->primary_domain_lowercased;
			}
			
			return $primary_domain;
		}
		
		public function GetHTTPSConnection()
		{
			return $_SERVER['HTTPS'];
		}
	}

?>