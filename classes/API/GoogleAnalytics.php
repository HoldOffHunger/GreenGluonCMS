<?php

			// https://analytics.google.com/analytics/web/

	class GoogleAnalytics
	{
		public function __construct($args)
		{
			$this->domain_object = $args['domainobject'];
			
			$base_code = $this->GoogleAnalyticsBaseCode();
			
			switch($this->domain_object->host)
			{
				case 'copyleftlicense':
					$this->configgtag = $base_code . '4';
					break;
					
				case 'earthfluent':
					$this->configgtag = $base_code . '1';
					break;
				
				case 'listkeywords':
					$this->configgtag = $base_code . '5';
					break;
				
				case 'pronouncethat':
					$this->configgtag = $base_code . '6';
					break;
				
				case 'removeblanklines':
					$this->configgtag = $base_code . '7';
					break;
				
				case 'removeduplicatelines':
					$this->configgtag = $base_code . '8';
					break;
				
				case 'removespacing':
					$this->configgtag = $base_code . '9';
					break;
				
				case 'revoltlib':
					$this->configgtag = $base_code . '2';
					break;
					
				case 'revoltlink':
					$this->configgtag = $base_code . '3';
					break;
				
				case 'sortwords':
					$this->configgtag = $base_code . '10';
					break;
				
				case 'wordweight':
					$this->configgtag = $base_code . '11';
					break;
			}
		}
		
		public function GoogleAnalyticsBaseCode()
		{
			return 'UA-106871476-';
		}
	}

?>