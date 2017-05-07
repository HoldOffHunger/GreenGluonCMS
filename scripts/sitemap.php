<?php

	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/SimpleErrors.php');
	require('../traits/scripts/SimpleForms.php');
	require('../traits/scripts/SimpleLookupLists.php');
	require('../traits/scripts/SimpleORM.php');
	
	class sitemap extends basicscript
	{
						// Traits
						// ---------------------------------------------
		
		use DBFunctions;
		use SimpleErrors;
		use SimpleForms;
		use SimpleLookupLists;
		use SimpleORM;
		
						// Security Data
						// ---------------------------------------------
		
		public function IsSecure()
		{
			return FALSE;
		}
		
		public function RequiresLogin()
		{
			return FALSE;
		}
		
						// Functionality
						// ---------------------------------------------
		
		public function display()
		{
			$this->SetORM();
			$this->SetRecordTree();
			$this->SetPrimaryHostRecords();
			
			if(!$this->ValidateOrm())
			{
				return FALSE;	# 404
			}
			
			$this->SetMasterRecord();
			
			$this->SetORMSiteMapObject();
			$this->SetSiteMap();
			
			$this->humanreadable = $this->Param('humanreadable');
			
			$this->FormatErrors();
			
			return TRUE;
		}
		
		public function SetORMSiteMapObject()
		{
			require('../classes/Database/ORMSiteMap.php');
			
			return $this->ormsitemap = new ORMSiteMap([dbaccessobject=>$this->db_access_object]);
		}
		
		public function SetSiteMap()
		{
			$sitemap = $this->SetSiteMap_BaseScriptLinks();
			$sitemap = $this->SetSiteMap_EntryScriptLinks([sitemap=>$sitemap]);
			
			$this->sitemap = $sitemap;
		}
		
		public function SetSiteMap_EntryScriptLinks($args)
		{
			$sitemap = $args['sitemap'];
			
			$entry_codes = $this->ormsitemap->GetEntrySiteMapCodes();
			
			$entry_code_count = count($entry_codes);
			
			if($entry_code_count)
			{
				for($i = 0; $i < $entry_code_count; $i++)
				{
					$entry_code = $entry_codes[$i];
					$priority = 1.0;
					
					$entry_title = '';
					$action = '';
					$change_freq = '';
					$last_modified = '0000-00-00 00:00:00';
					$entry_code_list = [];
					
					if($entry_code['E2_Code'])
					{
						$entry_code_list[] = $entry_code['E2_Code'];
						$entry_title = $entry_code['E2_Title'];
						if($entry_code['E2_Subtitle'])
						{
							$entry_title .= ' : ';
							$entry_title .= $entry_code['E2_Subtitle'];
						}
						$last_modified = $entry_code['E2_LastModificationDate'];
						$priority -= 0.1;
						$change_freq = 'daily';
						$action = 'index';
					}
					
					if($entry_code['E3_Code'])
					{
						$entry_code_list[] = $entry_code['E3_Code'];
						$entry_title = $entry_code['E3_Title'];
						if($entry_code['E3_Subtitle'])
						{
							$entry_title .= ' : ';
							$entry_title .= $entry_code['E3_Subtitle'];
						}
						$last_modified = $entry_code['E3_LastModificationDate'];
						$priority -= 0.1;
						$change_freq = 'weekly';
						$action = '';
					}
					
					if($entry_code['E4_Code'])
					{
						$entry_code_list[] = $entry_code['E4_Code'];
						$entry_title = $entry_code['E4_Title'];
						if($entry_code['E4_Subtitle'])
						{
							$entry_title .= ' : ';
							$entry_title .= $entry_code['E4_Subtitle'];
						}
						$last_modified = $entry_code['E4_LastModificationDate'];
						$priority -= 0.1;
						$change_freq = 'monthly';
						$action = '';
					}
					
					if($entry_code['E5_Code'])
					{
						$entry_code_list[] = $entry_code['E5_Code'];
						$entry_title = $entry_code['E5_Title'];
						if($entry_code['E5_Subtitle'])
						{
							$entry_title .= ' : ';
							$entry_title .= $entry_code['E5_Subtitle'];
						}
						$last_modified = $entry_code['E5_LastModificationDate'];
						$priority -= 0.1;
						$change_freq = 'monthly';
						$action = '';
					}
					
					if($entry_code['E6_Code'])
					{
						$entry_code_list[] = $entry_code['E6_Code'];
						$entry_title = $entry_code['E6_Title'];
						if($entry_code['E6_Subtitle'])
						{
							$entry_title .= ' : ';
							$entry_title .= $entry_code['E6_Subtitle'];
						}
						$last_modified = $entry_code['E6_LastModificationDate'];
						$priority -= 0.1;
						$change_freq = 'monthly';
						$action = '';
					}
					
					if($entry_code['E7_Code'])
					{
						$entry_code_list[] = $entry_code['E7_Code'];
						$entry_title = $entry_code['E7_Title'];
						if($entry_code['E7_Subtitle'])
						{
							$entry_title .= ' : ';
							$entry_title .= $entry_code['E7_Subtitle'];
						}
						$last_modified = $entry_code['E7_LastModificationDate'];
						$priority -= 0.1;
						$change_freq = 'monthly';
						$action = '';
					}
					
					$new_sitemap_item = '';
					$url = $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/' . implode('/', $entry_code_list) . '/view.php';
					
					if($action)
					{
						$url .= '?action=' . $action;
					}
					
					if($this->script_format_lower == 'xml')
					{
						$new_sitemap_item = [url=>[
							loc=>$url,
							lastmod=>$last_modified,
							changefreq=>$change_freq,
							priority=>$priority,
						]];
					}
					elseif($this->script_format_lower == 'txt')
					{
						$new_sitemap_item =
							$url .
							' (lastmod: ' .
							$last_modified .
							'; changefreq: ' .
							$change_freq .
							'; priority: ' .
							$priority .
							')';
					}
					else
					{
						$new_sitemap_item = [[
							'contents'=>
								$this->NonBreakingSpace() . $this->Bullet() . $this->NonBreakingSpace() .
								'<a href="' . $url . '">' .
								$entry_title .
								'</a>'
							,
							'mouseover'=>
								'Location (loc): ' . $url . '; ' .
								'Last Modified (lastmod): ' . $last_modified . '; ' .
								'Change Frequency (changefreq): ' . $change_freq . '; ' .
								'Priority (priority): ' . $priority . '.'
							,
						]];
					}
					
					if($new_sitemap_item)
					{
						$sitemap[] = $new_sitemap_item;
					}
				}
			}
	#		print("BT: COUNT!" . count($entry_codes) . "|");
	#		print_r($entry_codes);
			
			return $sitemap;
		}
		
		public function SetSiteMap_BaseScriptLinks()
		{
			$sitemap_args = [];
			
			if($this->script_format_lower == 'xml')
			{
				$sitemap = $this->SetSiteMap_GetEntries($sitemap_args);
			}
			elseif($this->script_format_lower == 'txt')
			{
				$sitemap = $this->SetSiteMap_GetEntries($sitemap_args);
				
				$new_sitemap = [];
				
				foreach($sitemap as $sitemap_url_block)
				{
					$url_information = $sitemap_url_block['url'];
					
					$new_sitemap_item =
						$url_information['loc'] .
						' (lastmod: ' .
						$url_information['lastmod'] .
						'; changefreq: ' .
						$url_information['changefreq'] .
						'; priority: ' .
						$url_information['priority'] .
						')';
					
					$new_sitemap[] = $new_sitemap_item;
				}
				
				$sitemap = $new_sitemap;
			}
			else
			{
				$xml_sitemap = $this->SetSiteMap_GetEntriesWithTitles();
				
				$sitemap = [];
				
				foreach($xml_sitemap as $xml_url_piece)
				{
					$sitemap[] = [[
						'contents'=>
							$this->NonBreakingSpace() . $this->Bullet() . $this->NonBreakingSpace() .
							'<a href="' . $xml_url_piece['url']['loc'] . '">' .
							$xml_url_piece['url']['title'] .
							'</a>'
						,
						'mouseover'=>
							'Location (loc): ' . $xml_url_piece['url']['loc'] . '; ' .
							'Last Modified (lastmod): ' . $xml_url_piece['url']['lastmod'] . '; ' .
							'Change Frequency (changefreq): ' . $xml_url_piece['url']['changefreq'] . '; ' .
							'Priority (priority): ' . $xml_url_piece['url']['priority'] . '.'
						,
					]];
				}
			}
			
			return $sitemap;
		}
		
		public function SetSiteMap_GetEntriesWithTitles()
		{
			$home_language_list_args = [
				ListTitle=>'LanguagesMainHeader',
			];
			$home_language_list = $this->getListAndItems($home_language_list_args);
			
			$about_language_list_args = [
				ListTitle=>'LanguagesAboutHeader',
			];
			$about_language_list = $this->getListAndItems($about_language_list_args);
			
			$contact_language_list_args = [
				ListTitle=>'LanguagesContactHeader',
			];
			$contact_language_list = $this->getListAndItems($contact_language_list_args);
			
			$language_list_args = [
				ListTitle=>'LanguagesHeader',
			];
			$language_list = $this->getListAndItems($language_list_args);
			
			$search_list_args = [
				ListTitle=>'LanguagesSearchHeader',
			];
			$search_list = $this->getListAndItems($search_list_args);
			
			$get_entries_args = [
				homelanguagelist=>$home_language_list,
				aboutlanguagelist=>$about_language_list,
				contactlanguagelist=>$contact_language_list,
				languagelist=>$language_list,
				searchlist=>$search_list,
			];
			
			$entries_with_titles = $this->SetSiteMap_GetEntries($get_entries_args);
			$entry_titles = $this->SetSiteMap_GetEntryTitles($get_entries_args);
			
			$new_entries_with_titles = [];
			
			foreach ($entries_with_titles as $entry_with_title)
			{
				$entry_with_title[url][title] = array_shift($entry_titles);
				$new_entries_with_titles[] = $entry_with_title;
			}
			
			return $new_entries_with_titles;
		}
		
		public function SetSiteMap_GetEntryTitles($args)
		{
			$home_language_list = $args[homelanguagelist];
			$about_language_list = $args[aboutlanguagelist];
			$contact_language_list = $args[contactlanguagelist];
			$language_list = $args[languagelist];
			$search_list = $args[searchlist];
			
			if(!$home_language_list)
			{
				$home_language_list_args = [
					ListTitle=>'LanguagesMainHeader',
				];
				$home_language_list = $this->getListAndItems($home_language_list_args);
			}
			
			if(!$about_language_list)
			{
				$about_language_list_args = [
					ListTitle=>'LanguagesAboutHeader',
				];
				$about_language_list = $this->getListAndItems($about_language_list_args);
			}
			
			if(!$contact_language_list)
			{
				$contact_language_list_args = [
					ListTitle=>'LanguagesContactHeader',
				];
				$contact_language_list = $this->getListAndItems($contact_language_list_args);
			}
			
			if(!$language_list)
			{
				$language_list_args = [
					ListTitle=>'LanguagesHeader',
				];
				$language_list = $this->getListAndItems($language_list_args);
			}
			
			if(!$search_list)
			{
				$search_language_list_args = [
					ListTitle=>'LanguagesSearchHeader',
				];
				$search_language_list = $this->getListAndItems($search_language_list_args);
			}
			
			$link_titles = [
				$this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'],
				'About ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'],
				'Contact ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'],
			];
			
			if(!$this->primary_host_record['NotReadyForLanguages'])
			{
				$link_titles[] = 'Select Language for ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
			}
			
			if(!$this->primary_host_record['NotReadyForSearch'])
			{
				$link_titles[] = 'Search ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
			}
			
			if($home_language_list && count($home_language_list))
			{
				$link_titles[] = $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'] . ' [English]';
			}
			
			if($about_language_list && count($about_language_list))
			{
				$link_titles[] = 'About ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'] . ' [English]';
			}
			
			if($contact_language_list && count($contact_language_list))
			{
				$link_titles[] = 'Contact ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'] . ' [English]';
			}
			
			if(!$this->primary_host_record['NotReadyForLanguages'] && $language_list && count($language_list))
			{
				$link_titles[] = 'Select Language for ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'] . ' [English]';
			}
			
			if(!$this->primary_host_record['NotReadyForSearch'])
			{
				$link_titles[] = 'Search ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'] . ' [English]';
			}
			
			$native_languages_list = $this->language_object->GetListOfNativeLanguageNames();
			
			foreach($this->language_object->GetListOfLanguageCodes() as $language_code => $language)
			{
				if($home_language_list[$language_code])
				{
					$link_titles[] = $home_language_list[$language_code] . ' [' . $native_languages_list[$language_code] . ' / ' . $language . ']';
				}
				
				if($about_language_list[$language_code])
				{
					$link_titles[] = $about_language_list[$language_code] . ' [' . $native_languages_list[$language_code] . ' / ' . $language . ']';
				}
				
				if($contact_language_list[$language_code])
				{
					$link_titles[] = $contact_language_list[$language_code] . ' [' . $native_languages_list[$language_code] . ' / ' . $language . ']';
				}
				
				if($language_list[$language_code])
				{
					$link_titles[] = $language_list[$language_code] . ' [' . $native_languages_list[$language_code] . ' / ' . $language . ']';
				}
				
				if($search_language_list[$language_code])
				{
					$link_titles[] = $search_language_list[$language_code] . ' [' . $native_languages_list[$language_code] . ' / ' . $language . ']';
				}
			}
			
			return $link_titles;
		}
		
		public function SetSiteMap_GetEntries($args)
		{
			$home_language_list = $args[homelanguagelist];
			$about_language_list = $args[aboutlanguagelist];
			$contact_language_list = $args[contactlanguagelist];
			$language_list = $args[languagelist];
			$search_language_list = $args[searchlanguagelist];
			
			if(!$home_language_list)
			{
				$home_language_list_args = [
					ListTitle=>'LanguagesMainHeader',
				];
				$home_language_list = $this->getListAndItems($home_language_list_args);
			}
			
			if(!$about_language_list)
			{
				$about_language_list_args = [
					ListTitle=>'LanguagesAboutHeader',
				];
				$about_language_list = $this->getListAndItems($about_language_list_args);
			}
			
			if(!$contact_language_list)
			{
				$contact_language_list_args = [
					ListTitle=>'LanguagesContactHeader',
				];
				$contact_language_list = $this->getListAndItems($contact_language_list_args);
			}
			
			if(!$language_list)
			{
				$language_list_args = [
					ListTitle=>'LanguagesHeader',
				];
				$language_list = $this->getListAndItems($language_list_args);
			}
			
			if(!$search_language_list)
			{
				$search_language_list_args = [
					ListTitle=>'LanguagesSearchHeader',
				];
				$search_language_list = $this->getListAndItems($search_language_list_args);
			}
			
			$home_list_args = [
				ListTitle=>'HomePageInfo',
			];
			$home_list = $this->getListAndItems($home_list_args);
			
			$contact_list_args = [
				ListTitle=>'ContactPageInfo',
			];
			$contact_list = $this->getListAndItems($contact_list_args);
			
			$about_list_args = [
				ListTitle=>'AboutPageInfo',
			];
			$about_list = $this->getListAndItems($about_list_args);
			
			$language_about_list_args = [
				ListTitle=>'LanguagesPageInfo',
			];
			$language_about_list = $this->getListAndItems($language_about_list_args);
			
			$search_list_args = [
				ListTitle=>'SearchPageInfo',
			];
			$search_list = $this->getListAndItems($search_list_args);
			
			$home_last_mod = $home_list['HomeLastMod'];
			$about_last_mod = $about_list['AboutLastMod'];
			$contact_last_mod = $contact_list['ContactLastMod'];
			$languages_last_mod = $language_about_list['LanguagesLastMod'];
			$search_last_mod = $search_list['SearchLastMod'];
			
			if(!$home_last_mod)
			{
				$home_last_mod = '0000-00-00';
			}
			
			if(!$about_last_mod)
			{
				$about_last_mod = '0000-00-00';
			}
			
			if(!$contact_last_mod)
			{
				$contact_last_mod = '0000-00-00';
			}
			
			if(!$language_last_mod)
			{
				$languages_last_mod = '0000-00-00';
			}
			
			if(!$search_last_mod)
			{
				$search_last_mod = '0000-00-00';
			}
			
			$home_change_freq = $home_list['HomeChangeFreq'];
			$about_change_freq = $about_list['AboutChangeFreq'];
			$contact_change_freq = $contact_list['ContactChangeFreq'];
			$languages_change_freq = $language_about_list['LanguagesChangeFreq'];
			$search_change_freq = $search_list['SearchChangeFreq'];
			
			if(!$home_change_freq)
			{
				$home_change_freq = 'weekly';
			}
			
			if(!$about_change_freq)
			{
				$about_change_freq = 'weekly';
			}
			
			if(!$contact_change_freq)
			{
				$contact_change_freq = 'weekly';
			}
			
			if(!$languages_change_freq)
			{
				$languages_change_freq = 'weekly';
			}
			
			if(!$search_change_freq)
			{
				$search_change_freq = 'weekly';
			}
			
			$home_priority = $home_list['HomePriority'];
			$about_priority = $about_list['AboutPriority'];
			$contact_priority = $contact_list['ContactPriority'];
			$languages_priority = $language_about_list['LanguagesPriority'];
			$search_priority = $search_list['SearchPriority'];
			
			if(!$home_priority)
			{
				$home_priority = '1.0';
			}
			
			if(!$about_priority)
			{
				$about_priority = '0.5';
			}
			
			if(!$contact_priority)
			{
				$contact_priority = '0.2';
			}
			
			if(!$languages_priority)
			{
				$languages_priority = '0.1';
			}
			
			if(!$search_priority)
			{
				$search_priority = '0.9';
			}
						
			$links = [
				[
					url=>[
						loc=>$this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/',
						lastmod=>$home_last_mod,
						changefreq=>$home_change_freq,
						priority=>$home_priority,
					],
				],
				[
					url=>[
						loc=>$this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/about.php',
						lastmod=>$about_last_mod,
						changefreq=>$about_change_freq,
						priority=>$about_priority,
					],
				],
				[
					url=>[
						loc=>$this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/contact.php',
						lastmod=>$contact_last_mod,
						changefreq=>$contact_change_freq,
						priority=>$contact_priority,
					],
				],
			];
			
			if(!$this->primary_host_record['NotReadyForLanguages'])
			{
				$links[] = [
					url=>[
						loc=>$this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/languages.php',
						lastmod=>$languages_last_mod,
						changefreq=>$languages_change_freq,
						priority=>$languages_priority,
					],
				];
			}
			
			if(!$this->primary_host_record['NotReadyForSearch'])
			{
				$links[] = [
					url=>[
						loc=>$this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/search.php',
						lastmod=>$search_last_mod,
						changefreq=>$search_change_freq,
						priority=>$search_priority,
					],
				];
			}
			
			if($home_language_list && count($home_language_list))
			{
				$links[] = [
					url=>[
						loc=>$this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/?language=en',
						lastmod=>$home_last_mod,
						changefreq=>$home_change_freq,
						priority=>$home_priority,
					],
				];
			}
			
			if($about_language_list && count($about_language_list))
			{
				$links[] = [
					url=>[
						loc=>$this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/about.php?language=en',
						lastmod=>$about_last_mod,
						changefreq=>$about_change_freq,
						priority=>$about_priority,
					],
				];
			}
			
			if($contact_language_list && count($contact_language_list))
			{
				$links[] = [
					url=>[
						loc=>$this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/contact.php?language=en',
						lastmod=>$contact_last_mod,
						changefreq=>$contact_change_freq,
						priority=>$contact_priority,
					],
				];
			}
			
			if($language_list && count($language_list))
			{
				$links[] = [
					url=>[
						loc=>$this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/languages.php?language=en',
						lastmod=>$language_last_mod,
						changefreq=>$language_change_freq,
						priority=>$language_priority,
					],
				];
			}
			
			if($search_language_list && count($search_language_list))
			{
				$links[] = [
					url=>[
						loc=>$this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/search.php?language=en',
						lastmod=>$search_last_mod,
						changefreq=>$search_change_freq,
						priority=>$search_priority,
					],
				];
			}
			
			foreach($this->language_object->GetListOfLanguageCodes() as $language_code => $language)
			{
				if($home_language_list[$language_code])
				{
					$links[] = [
						url=>[
							loc=>$this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/?language=' . $language_code,
							lastmod=>$home_last_mod,
							changefreq=>$home_change_freq,
							priority=>$home_priority,
						],
					];
				}
				
				if($about_language_list[$language_code])
				{
					$links[] = [
						url=>[
							loc=>$this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/about.php?language=' . $language_code,
							lastmod=>$about_last_mod,
							changefreq=>$about_change_freq,
							priority=>$about_priority,
						],
					];
				}
				
				if($contact_language_list[$language_code])
				{
					$links[] = [
						url=>[
							loc=>$this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/contact.php?language=' . $language_code,
							lastmod=>$contact_last_mod,
							changefreq=>$contact_change_freq,
							priority=>$contact_priority,
						],
					];
				}
				
				if($language_list[$language_code])
				{
					$links[] = [
						url=>[
							loc=>$this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/languages.php?language=' . $language_code,
							lastmod=>$languages_last_mod,
							changefreq=>$languages_change_freq,
							priority=>$languages_priority,
						],
					];
				}
				
				if($search_list[$language_code])
				{
					$links[] = [
						url=>[
							loc=>$this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/search.php?language=' . $language_code,
							lastmod=>$search_last_mod,
							changefreq=>$search_change_freq,
							priority=>$search_priority,
						],
					];
				}
			}
			
			return $links;
		}
		
		public function DisplayTemplates()
		{
			if($this->script_format_lower == 'xml')
			{
				if($this->humanreadable)
				{
					print("\n");
				}
				print('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">');
				
				if($this->humanreadable)
				{
					print("\n\n");
				}
				
				$this->HandleRequires();
				print('</urlset>');
				return TRUE;
			}
			
			return $this->HandleRequires();
		}
		
						// HTML Data
						// ---------------------------------------------
		
		public function GetHTMLFormatData_Title()
		{
			if(!$this->parent['id'] && $this->master_record && $this->master_record['id'])
			{
				if($this->language_object->getLanguageCode() == 'en')
				{
					$header_title_text = 'Sitemap for ' . $this->master_record['Code'] . ' : ' . $this->master_record['Subtitle'];
				}
				else
				{
					$sitemap_header_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesSitemapHeader']);
					
					if($sitemap_header_language_translations[$this->language_object->getLanguageCode()])
					{
						$header_title_text = $sitemap_header_language_translations[$this->language_object->getLanguageCode()];
					}
					else
					{
						$header_title_text = 'Sitemap for ' . $this->master_record['Code'] . ' : ' . $this->master_record['Subtitle'];
					}
				}
				
				return $this->header_title_text = $header_title_text;
			}
			
			return FALSE;
		}
	}

?>