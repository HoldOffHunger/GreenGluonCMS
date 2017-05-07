<?php

	class module_navigation extends module_spacing
	{
		public function __construct($args)
		{
			$this->language_object = $args['languageobject'];
			$this->divider = $args['divider'];
			$this->text = $args['text'];
			$this->domain_object = $args['domainobject'];
			$this->calling_template = $args['callingtemplate'];
			$this->search = !$this->calling_template->primary_host_record['NotReadyForSearch'];
			$this->language = !$this->calling_template->primary_host_record['NotReadyForLanguages'];
			
			$this->background_color = $args['backgroundcolor'];
			
			if(!$this->background_color)
			{
				$this->background_color = $this->calling_template->primary_host_record['SecondaryColor'];
			}
			
			if(!$this->background_color)
			{
				$this->background_color = 'C2DFFF';
			}
		}
		
		public function DisplayBottomNavigation($args)
		{
			$divider = $this->divider;
			$text = $this->text;
			
			$divider_navigation_args = [
				'class'=>'width-95percent horizontal-center margin-top-14px border-2px',
			];
			
			$divider->displaystart($divider_navigation_args);
			
			$element_text_args = [
				text=>'<div class="padding-10px horizontal-center font-family-arial background-color-' . $this->background_color . '"><span class="font-family-verdana">',
				indentlevel=>5,
			];
			$text->Display($element_text_args);
			
			$element_text_args = [
				text=>$this->DisplayBottomNavigation_Links($args),
				indentlevel=>5,
			];
			$text->Display($element_text_args);
			
			$element_text_args = [
				text=>'</span></div>',
				indentlevel=>5,
			];
			$text->Display($element_text_args);
			
			$divider->displayend($divider_end_args);
		}
		
		public function DisplayBottomNavigation_Links($args)
		{
			$this_page = $args['thispage'];
			$url_divider = '<span class="padding-left-15px padding-right-15px">|</span>';
			$primary_url = $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]);
			
			$display_text = '';
			
			$home_content_text = $this->DisplayBottomNavigation_Links_HomeText();
			
			if($this_page != 'Home')
			{
				$display_text .= '<a href="' . $primary_url . '/">' . $home_content_text . '</a>';
			}
			else
			{
				$display_text .= $home_content_text;
			}
			
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
			
			if($this->search)
			{
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
			
			if($this->language)
			{
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
			
			return $display_text;
		}
		
		public function DisplayBottomNavigation_Links_HomeText ()
		{
			if($this->language_object->getLanguageCode() == 'en')
			{
				$home_content_text = 'Home';
			}
			else
			{
				$home_language_list = $this->calling_template->getListAndItems(['ListTitle'=>'LanguagesBottomNavigationHome']);
				
				if($home_language_list[$this->language_object->getLanguageCode()])
				{
					$home_content_text = $home_language_list[$this->language_object->getLanguageCode()];
				}
				else
				{
					$home_content_text = 'Home';
				}
			}
			
			return $home_content_text;
		}
		
		public function DisplayBottomNavigation_Links_AboutText ()
		{
			if($this->language_object->getLanguageCode() == 'en')
			{
				$about_content_text = 'About';
			}
			else
			{
				$about_language_list = $this->calling_template->getListAndItems(['ListTitle'=>'LanguagesBottomNavigationAbout']);
				
				if($about_language_list[$this->language_object->getLanguageCode()])
				{
					$about_content_text = $about_language_list[$this->language_object->getLanguageCode()];
				}
				else
				{
					$about_content_text = 'About';
				}
			}
			
			return $about_content_text;
		}
		
		public function DisplayBottomNavigation_Links_ContactText ()
		{
			if($this->language_object->getLanguageCode() == 'en')
			{
				$contact_content_text = 'Contact';
			}
			else
			{
				$contact_language_list = $this->calling_template->getListAndItems(['ListTitle'=>'LanguagesBottomNavigationContact']);
				
				if($contact_language_list[$this->language_object->getLanguageCode()])
				{
					$contact_content_text = $contact_language_list[$this->language_object->getLanguageCode()];
				}
				else
				{
					$contact_content_text = 'Contact';
				}
			}
			
			return $contact_content_text;
		}
		
		public function DisplayBottomNavigation_Links_LanguagesText ()
		{
			if($this->language_object->getLanguageCode() == 'en')
			{
				return 'Languages';
			}
			
			$languages_list = $this->calling_template->getListAndItems(['ListTitle'=>'LanguagesBottomNavigationLanguages']);
			
			if($languages_list[$this->language_object->getLanguageCode()])
			{
				$languages_content_text = $languages_list[$this->language_object->getLanguageCode()];
			}
			else
			{
				$languages_content_text = 'Languages';
			}
			
			if($languages_list && count($languages_list))
			{
				$languages = array_values($languages_list);
				$languages_content_text =
					'<span title="' . implode(' ~ ', $languages) . '">' .
					$languages_content_text .
					'</span>';
			}
			
			return $languages_content_text;
		}
		
		public function DisplayBottomNavigation_Links_SearchText ()
		{
			if($this->language_object->getLanguageCode() == 'en')
			{
				return 'Search';
			}
			
			$search_list = $this->calling_template->getListAndItems(['ListTitle'=>'LanguagesBottomNavigationSearch']);
			
			if($search_list[$this->language_object->getLanguageCode()])
			{
				$search_content_text = $search_list[$this->language_object->getLanguageCode()];
			}
			else
			{
				$search_content_text = 'Search';
			}
			
			return $search_content_text;
		}
	}

?>