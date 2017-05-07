<?php

			// DEPRECATED BY YAHOO

	class Yahoo
	{
		public function __construct($args)
		{
			$this->domain_object = $args['domainobject'];
			$this->db_access_object = $args['dbaccessobject'];
			$this->authentication_object = $args['authenticationobject'];
			
			switch($this->domain_object->host)
			{
				case 'earthfluent':
					$this->client_id = 'dj0yJmk9Vm5wc1hLck5BeFd3JmQ9WVdrOWJuVnVaSEl3TXpZbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD1mNg--';
					$this->client_secret = '11120ffeeef3bfe938b95bcb8cf934c18bfdb2c5';
					break;
			}
		}
		
		public function getImageSearchUrl($args)
		{
			$oauth_version = '1.0';
			$oauth_timestamp = time();
			$oauth_nonce = hash('sha256', $oauth_timestamp);
			$oauth_consumer_key = $this->client_id;
			$oauth_signature_method = 'HMAC-SHA1';
			$oauth_method = 'GET';
			
			$search_term = $args['searchterm'];
			
			$parameter_string = '';
			$parameter_string .= 'oauth_consumer_key=' . $oauth_consumer_key;
			$parameter_string .= '&oauth_nonce=' . $oauth_nonce;
			$parameter_string .= '&oauth_signature_method=' . $oauth_signature_method;
			$parameter_string .= '&oauth_timestamp=' . $oauth_timestamp;
			$parameter_string .= '&oauth_version=' . $oauth_version;
			$parameter_string .= '&q=' . $search_term;
			
			$yahoo_image_search_url = 'https://yboss.yahooapis.com/ysearch/images';		# ending '/' unnecessary
			
			$payload = $oauth_method . '&' . urlencode($yahoo_image_search_url) . '&' . urlencode($parameter_string);
			$signature_key = $this->client_secret . '&';		# client secret + '&' + value of 'token' parameter
			$oauth_signature = base64_encode(hash_hmac('sha1', $payload, $signature_key, TRUE));
			
			$full_url = $yahoo_image_search_url . '?' . $parameter_string;
			$queryable_full_url = $full_url . '&oauth_signature=' . urlencode($oauth_signature);	
			
			return $queryable_full_url;
		}
	}

?>