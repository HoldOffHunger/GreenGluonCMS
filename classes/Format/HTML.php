<?php

	class HTML
	{
		public $html_data;
		
		public $desired_script;
		public $desired_action;
		public $desired_function;
		
		public $object_code;
		public $object_list;
		
		public $script_name;
		public $script_classname;
		public $script_file;
		public $script_extension;
		public $script_format;
		public $script_args;
		public $google_api;
		
		public $authentication_object;
		public $cleanser_object;
		public $query_object;
		public $db_access_object;
		public $domain_object;
		public $time;
		public $cookie;
		public $language;
		public $dictionary;
		public $formats_object;
		public $version_object;
		public $redirect_object;
		public $css_object;
		public $javascript_object;
		public $clientsideincludes_object;
		public $navigation_object;
		
		public function __construct($args)
		{
			$this->script_location = $args[scriptlocation];
			
			$this->authentication_object = $args[authentication];
			$this->cleanser_object = $args[cleanser];
			$this->query_object = $args[query];
			$this->db_access_object = $args[dbaccess];
			$this->domain_object = $args[domain];
			$this->time = $args[time];
			$this->cookie = $args[cookie];
			$this->language = $args[language];
			$this->dictionary = $args[dictionary];
			$this->desired_script = $args[desiredscript];
			$this->desired_action = $args[desiredaction];
			$this->desired_function = $args[desiredfunction];
			
			$this->object_code = $args[objectcode];
			$this->object_parent = $args[objectparent];
			$this->object_list = $args[objectlist];
			
			$this->script_name = $args[scriptname];
			$this->script_file = $args[scriptfile];
			$this->script_classname = $args[scriptclassname];
			$this->script_extension = $args[scriptextension];
			$this->script_format = $args[scriptformat];
			$this->script_format_lower = $args[scriptformatlower];
			$this->script_args = $args[scriptargs];
			$this->google_api = $args[googleapi];
			
			if($args[firstcall])
			{
				$this->Construct_Requires();
			}
			
			$this->formats_object = new Formats();
			$this->version_object = $args['versionobject'];
			
			$redirect_args = [
				'cleanser'=>$this->cleanser_object,
				'domainobject'=>$this->domain_object,
				'formats'=>$this->formats_object,
				'scriptfile'=>$this->script_file,
				'language'=>$this->language,
			];
			$this->redirect_object = new HTML_Redirect($redirect_args);
			
			$navigation_object_args = [
				'domainobject'=>$this->domain_object,
			];
			$this->navigation_object = new HTML_Navigation($navigation_object_args);
			
			$this->css_object = new CSS($args);
			
			$this->javascript_object = new Javascript();
			
			$constructor_args = [
				'desiredscript'=>$this->desired_script,
				'desiredaction'=>$this->desired_action,
				'objectcode'=>$this->object_code,
				'objectparent'=>$this->object_parent,
				'objectlist'=>$this->object_list,
				'scriptlocation'=>$this->script_location,
				'scriptname'=>$this->script_name,
				'scriptfile'=>$this->script_file,
				'scriptextension'=>$this->script_extension,
				'scriptformat'=>$this->script_format,
				'scriptformatlower'=>$this->script_format_lower,
				'scriptargs'=>$this->script_args,
				'googleapi'=>$this->google_api,
				'yahooapi'=>$this->yahoo_api,
				'authenticationobject'=>$this->authentication_object,
				'cleanserobject'=>$this->cleanser_object,
				'queryobject'=>$this->query_object,
				'dbaccessobject'=>$this->db_access_object,
				'domainobject'=>$this->domain_object,
				'languageobject'=>$this->language,
				'dictionary'=>$this->dictionary,
				'time'=>$this->time,
				'cookie'=>$this->cookie,
				'formatsobject'=>$this->formats_object,
				'versionobject'=>$this->version_object,
				'redirectobject'=>$this->redirect_object,
			];
			
			require($this->script_location);
			$this->script = new $this->script_classname($constructor_args);
			
			$js_and_css_args = [
				'desiredaction'=>$this->desired_action,
				'scriptfile'=>$this->script_file,
				'domainobject'=>$this->domain_object,
				'securescript'=>$this->domain_object->GetHTTPSConnection(),
				'language'=>$this->language,
				'googleapi'=>$this->google_api,
			];
			
			$this->clientsideincludes_object = new ClientSideIncludes($js_and_css_args);
			
			return TRUE;
		}
		
		public function CanAccess()
		{
			return ($this->script && $this->script->IsAccessible());
		}
		
			// Construct ~ Requires
			// -----------------------------------------------
		
		public function Construct_Requires()
		{
			require('../scripts/Format/' . $this->script_format . '/basicscript.php');
			require('../classes/Format/Formats.php');
			require('../classes/Format/HTML/Redirect.php');
			require('../classes/Format/HTML/Navigation.php');
			require('../classes/Format/CSS.php');
			require('../classes/Format/Javascript.php');
			require('../classes/Format/HTML/ClientSideIncludes.php');
		}
		
			// Display HTML
			// -----------------------------------------------
		
		public function Display()
		{
			$desired_action = $this->desired_action;
			
			$client_method_found = 0;
			if($this->domain_object->host)
			{
				$host_desired_action = $desired_action . '_' . $this->domain_object->host;
				
				if(method_exists($this->script, $host_desired_action))
				{
					$display_results = $this->script->$host_desired_action();
					$client_method_found = 1;
				}
			}
			
			if(!$client_method_found)
			{
				$display_results = $this->script->$desired_action();
			}
			
			if(!$display_results)
			{
				return FALSE;
			}
			$this->html_data = $this->script->GetHTMLFormatData();
			
			$this->StartHTML();
			$this->script->DisplayTemplates();
			$this->FinishHTML();
			
			return TRUE;
		}
		
		public function StartHTML()
		{
			$this->StartHTML_HTML_Start();
			$this->StartHTML_Head();
			$this->StartHTML_Body_Start();
			$this->StartHTML_Navigation();
		}
		
		public function StartHTML_Navigation()
		{
			if($this->script->navigation)
			{
				$this->navigation_object->Display();
			}
		}
		
			// HTML Start
			// -----------------------------------------------
		
		public function StartHTML_HTML_Start()
		{
			require('../format/html/head/html.php');
		}
		
			// HTML Head
			// -----------------------------------------------
			
				// Head ~ Handle Templates
				// -----------------------------------------------
		
		public function StartHTML_Head()
		{
			$this->StartHTML_Head_Start();
			$this->StartHTML_Head_Title();
			
			$this->printerfriendly = $this->query_object->Parameter([parameter=>'printerfriendly']);
			$this->invertedcolors = $this->query_object->Parameter([parameter=>'invertedcolors']);
			
			if(!$this->printerfriendly)
			{
				$this->StartHTML_Head_HTTPEquivalents();
				$this->StartHTML_Head_ArticleInformation();
				$this->StartHTML_Head_AuthorInformation();
				$this->StartHTML_Head_LanguageInformation();
				$this->StartHTML_Head_SearchEngineData();
				$this->StartHTML_Head_Classifications();
				$this->StartHTML_Head_ServerAndTechnicalCredits();
				$this->StartHTML_Head_ServerAndTechnicalDetails();
				$this->StartHTML_Head_DublinCore();
				$this->StartHTML_Head_WebAppInformation();
				$this->StartHTML_Head_FaviconInformation();
				$this->StartHTML_Head_AlternateVersions();
				$this->StartHTML_Head_CSSandJavascript();
			}
			else
			{
				$this->StartHTML_Head_HTTPEquivalents();
				$this->StartHTML_Head_SearchEngineData();
				$this->StartHTML_Head_LanguageInformation();
				$this->StartHTML_Head_CSS();
				$this->script->HTMLHeadDisplayExtra_CSS();
			}
				
			$this->StartHTML_Head_End();
		}
		
		public function StartHTML_Head_Start()
		{
			$this->DisplayDoubleReturns();
			require('../format/html/head/head_start.php');
			$this->script->HTMLHeadDisplayExtra_Start();
		}
		
		public function StartHTML_Head_Title()
		{
			$this->DisplayDoubleReturns();
			require('../format/html/head/title.php');
			$this->script->HTMLHeadDisplayExtra_Title();
		}
		
		public function StartHTML_Head_HTTPEquivalents()
		{
			$this->DisplayDoubleReturns();
			require('../format/html/head/http_equivalents.php');
			$this->script->HTMLHeadDisplayExtra_HTTPEquivalents();
		}
		
		public function StartHTML_Head_ArticleInformation()
		{
			$this->DisplayDoubleReturns();
			require('../format/html/head/article_information.php');
			$this->script->HTMLHeadDisplayExtra_ArticleInformation();
		}
		
		public function StartHTML_Head_AuthorInformation()
		{
			$this->DisplayDoubleReturns();
			require('../format/html/head/author_information.php');
			$this->script->HTMLHeadDisplayExtra_AuthorInformation();
		}
		
		public function StartHTML_Head_LanguageInformation()
		{
			$this->DisplayDoubleReturns();
			require('../format/html/head/language.php');
			$this->script->HTMLHeadDisplayExtra_LanguageInformation();
		}
		
		public function StartHTML_Head_SearchEngineData()
		{
			$this->DisplayDoubleReturns();
			require('../format/html/head/search_engine_data.php');
			$this->script->HTMLHeadDisplayExtra_SearchEngineData();
		}
		
		public function StartHTML_Head_Classifications()
		{
			$this->DisplayDoubleReturns();
			require('../format/html/head/classifications.php');
			$this->script->HTMLHeadDisplayExtra_Classifications();
		}
		
		public function StartHTML_Head_ServerAndTechnicalCredits()
		{
			$this->DisplayDoubleReturns();
			require('../format/html/head/server_credits.php');
			$this->script->HTMLHeadDisplayExtra_ServerAndTechnicalCredits();
		}
		
		public function StartHTML_Head_ServerAndTechnicalDetails()
		{
			$this->DisplayDoubleReturns();
			require('../format/html/head/server_details.php');
			$this->script->HTMLHeadDisplayExtra_ServerAndTechnicalDetails();
		}
		
		public function StartHTML_Head_DublinCore()
		{
			$this->DisplayDoubleReturns();
			require('../format/html/head/dublin_core.php');
			$this->script->HTMLHeadDisplayExtra_DublinCore();
		}
		
		public function StartHTML_Head_AlternateVersions()
		{
			$this->DisplayDoubleReturns();
			require('../format/html/head/alternate_versions.php');
			$this->DisplayDoubleReturns();
			
			$this->redirect_object->PrintAllVersionURLs([script=>$this->script]);
			$this->script->HTMLHeadDisplayExtra_AlternateVersions();
		}
		
		public function StartHTML_Head_WebAppInformation()
		{
			$this->DisplayDoubleReturns();
			require('../format/html/head/webapp_information.php');
		}
		
		public function StartHTML_Head_FaviconInformation()
		{
			$this->DisplayDoubleReturns();
			require('../format/html/head/favicon_information.php');
		}
		
		public function StartHTML_Head_CSSandJavascript()
		{
			$this->StartHTML_Head_CSS();
			$this->script->HTMLHeadDisplayExtra_CSS();
			require('../format/html/basics/spacing/return.html');
			$this->StartHTML_Head_Javascript();
			$this->script->HTMLHeadDisplayExtra_Javascript();
		}
		
		public function StartHTML_Head_CSS()
		{
			$headers_args = [
				includetype=>'css',
				headerlocation=>$this->css_object->CSS_HeaderLocation(),
				includelocation=>$this->css_object->CSS_IncludeLocation(),
				unavailablelocation=>$this->css_object->CSS_UnavailableLocation(),
			];
			
			if(!$this->css_object->OneCSSFilePerPage())
			{
				$this->clientsideincludes_object->Headers($headers_args);
			}
			else
			{
				$this->clientsideincludes_object->Headers_Simple($headers_args);
			}
		}
		
		public function StartHTML_Head_Javascript()
		{
			$headers_args = [
				includetype=>'javascript',
				headerlocation=>$this->javascript_object->Javascript_HeaderLocation(),
				includelocation=>$this->javascript_object->Javascript_IncludeLocation(),
				unavailablelocation=>$this->javascript_object->Javascript_UnavailableLocation(),
			];
			$this->clientsideincludes_object->Headers($headers_args);
		}
		
		public function StartHTML_Head_End()
		{
			$this->DisplayDoubleReturns();
			require('../format/html/head/head_end.php');
		}
		
			// HTML Body
			// -----------------------------------------------
		
		public function StartHTML_Body_Start()
		{
			$this->DisplayDoubleReturns();
			require('../format/html/body/body_start.php');
			$this->DisplayDoubleReturns();
		}
		
			// HTML Finish
			// -----------------------------------------------
		
		public function FinishHTML()
		{
			require('../format/html/body/body_end.php');
			$this->DisplayDoubleReturns();
			require('../format/html/body/html_end.php');
		}
		
			// HTML Spacing
			// -----------------------------------------------
		
		public function DisplayDoubleReturns()
		{
			require('../format/html/basics/spacing/return.html');
			require('../format/html/basics/spacing/return.html');
		}
	}

?>