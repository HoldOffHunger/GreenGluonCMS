<?php

	class InvalidReferralDomains {
		public function __construct() {
		}
		
		public function GetInvalidReferralDomainsHash() {
			$invalid_domains = $this->GetInvalidReferralDomains();
			
			return $this->DomainListToHash([
				'domains'=>$invalid_domains,
			]);
		}
		
		public function GetInvalidReferralTopLevelDomainsHash() {
			$invalid_tld_domains = $this->GetInvalidReferralTopLevelDomains();
			
			return $this->DomainListToHash([
				'domains'=>$invalid_tld_domains,
			]);
		}
		
		public function DomainListToHash($args) {
			$domains = $args['domains'];
			
			$domains_count = count($domains);
			
			$domains_hash = [];
			
			for($i = 0; $i < $domains_count; $i++) {
				$domain = $domains[$i];
				
				$domains_hash[$domain] = TRUE;
			}
			
			return $domains_hash;
		}
		
				# TO TEST: Add -->
				
					#	'listkeywords.com',
				# on "AUGUST"!
		public function GetInvalidReferralDomains() {
			return [
	#				'sortwords.com',
			
				'1-best-seo.com',	# checked, tested
				'15-reasons-for-seo.com',
				'99-reasons-for-seo.com',
				'500-good-starts.xyz',
				'ads-seoservices.com',
				'auto-seo-service.org',	# checked, tested
				'blog2019.top',
				'check-pro1.xyz',	# checked, tested, reported
				'dailyseo.xyz',
				'display-yourism-ads-here.info',
				'foroo-marketers.info',
				'getde-click.info',
				'great-n1.xyz',		# checked, tested, reported
				'greatblog.top',
				'growthty-hacking.info',
				'krumble-adsive.info',
				'krumbleair-ads.info',
				'krumblely-advertising.info',
				'leadershipise-articles.info',
				'makeinternetnoise.com',	# checked, tested
				'marketingblog.top',
				'nubuilderti.info',	# checked, tested
				'performiz-like-alibaba.info',
				'reach-publisheral.info',
				'seo-b2b.com',
				'worldwide-seo-services.com',
			];
		}
		
		public function GetInvalidReferralTopLevelDomains() {
			return [
				'xyz',
			];
		}
	}

?>