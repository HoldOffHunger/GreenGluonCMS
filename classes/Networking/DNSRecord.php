<?php

	class DNSRecord
	{
		public function GetDNSRecordTypes()
		{
			$dns_types = [
				'A',
				'MX',
				'NS',
				'SOA',
				'PTR',
				'CNAME',
				'AAAA',
				'A6',
				'SRV',
				'NAPTR',
				'TXT',
				'ANY',
			];
			
			return $dns_types;
		}
	}

?>