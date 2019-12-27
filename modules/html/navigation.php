<?php

	class module_navigation extends module_spacing {
		public function __construct($args) {
			$this->globals = $args['globals'];
			$this->language_object = $args['languageobject'];
			$this->divider = $args['divider'];
		//	$this->text = $args['text'];
			$this->domain_object = $args['domainobject'];
		//	$this->calling_template = $args['callingtemplate'];
		//		'searchready'=>false,
			
			return true;
		}
		
		public function DisplayBottomNavigation($args) {
			$divider = $this->divider;
			
			$divider_navigation_args = [
				'class'=>'width-95percent horizontal-center margin-top-14px border-2px',
			];
			
			$divider->displaystart($divider_navigation_args);
			
			print('<div class="padding-10px horizontal-center font-family-arial background-color-' . $this->globals->styling['PrimaryColor'] . '"><span class="font-family-verdana">');
			
			print($this->DisplayBottomNavigation_Links($args));
			
			print('</span></div>');
			
			$divider->displayend($divider_end_args);
		}
		
		public function DisplayBottomNavigation_Links($args) {
			$this_page = $args['thispage'];
			$url_divider = '<span class="padding-left-15px padding-right-15px">|</span>';
			$primary_url = $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]);
			
			$display_text = '';
			
			if($this->globals->mainmenu['home']['enabled']) {
				$home_content_text = $this->DisplayBottomNavigation_Links_HomeText();
				
				if($this_page != 'Home')
				{
					$display_text .= '<a href="' . $primary_url . '/">' . $home_content_text . '</a>';
				}
				else
				{
					$display_text .= $home_content_text;
				}
			}
			
			if($this->globals->mainmenu['about']['enabled']) {
				$display_text .= $url_divider;
				
				$about_content_text = $this->DisplayBottomNavigation_Links_AboutText();
				
				if($this_page != 'About')
				{
					$display_text .= '<a href="' . $primary_url . '/about.php">' . $about_content_text . '</a>';
				}
				else
				{
					$display_text .= $about_content_text;
				}
			}
			
			if($this->globals->mainmenu['contact']['enabled']) {
				$display_text .= $url_divider;
				
				$contact_content_text = $this->DisplayBottomNavigation_Links_ContactText();
				
				if($this_page != 'Contact')
				{
					$display_text .= '<a href="' . $primary_url . '/contact.php">' . $contact_content_text . '</a>';
				}
				else
				{
					$display_text .= $contact_content_text;
				}
			}
			
			if($this->globals->mainmenu['search']['enabled']) {
				$display_text .= $url_divider;
				
				$search_content_text = $this->DisplayBottomNavigation_Links_SearchText();
				
				if($this_page != 'Search')
				{
					$display_text .= '<a href="' . $primary_url . '/search.php">' . $search_content_text . '</a>';
				}
				else
				{
					$display_text .= $search_content_text;
				}
			}
			
			if($this->globals->mainmenu['languages']['enabled']) {
				$display_text .= $url_divider;
				
				$languages_content_text = $this->DisplayBottomNavigation_Links_LanguagesText();
				
				if($this_page != 'Languages')
				{
					$display_text .= '<a href="' . $primary_url . '/languages.php">' . $languages_content_text . '</a>';
				}
				else
				{
					$display_text .= $languages_content_text;
				}
			}
			
			if($this->globals->mainmenu['privacypolicy']['enabled']) {
				$display_text .= $url_divider;
				
				$privacy_content_text = $this->DisplayBottomNavigation_Links_PrivacyText();
				
				if($this_page != 'Privacy')
				{
					$display_text .= '<a href="' . $primary_url . '/privacy.php">' . $privacy_content_text . '</a>';
				}
				else
				{
					$display_text .= $privacy_content_text;
				}
			}
			
			return $display_text;
		}
		
		public function DisplayBottomNavigation_Links_HomeText () {
			return $this->globals->mainmenu['home']['text'][$this->language_object->getLanguageCode()];
		}
		
		public function DisplayBottomNavigation_Links_AboutText () {
			return $this->globals->mainmenu['about']['text'][$this->language_object->getLanguageCode()];
		}
		
		public function DisplayBottomNavigation_Links_ContactText () {
			return $this->globals->mainmenu['contact']['text'][$this->language_object->getLanguageCode()];
		}
		
		public function DisplayBottomNavigation_Links_LanguagesText () {
			return $this->globals->mainmenu['languages']['text'][$this->language_object->getLanguageCode()];
		}
		
		public function DisplayBottomNavigation_Links_SearchText () {
			return $this->globals->mainmenu['search']['text'][$this->language_object->getLanguageCode()];
		}
		
		public function DisplayBottomNavigation_Links_PrivacyText() {
			return $this->globals->mainmenu['privacypolicy']['text'][$this->language_object->getLanguageCode()];
		}
	}

?>