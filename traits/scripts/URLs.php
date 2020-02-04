<?php

	trait URLs {
		public function validateRedirect($args) {
			$url = $args['url'];
			
			$redirect_domain = parse_url($url, PHP_URL_HOST);
			$primary_domain = $this->domain_object->primary_domain_lowercased;
			
			$redirect_domain = preg_replace('/^www\./', '', $redirect_domain);
			
			if($redirect_domain == $primary_domain) {
				return TRUE;
			}
			
			return FALSE;
		}
	}

?>