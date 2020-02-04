<?php
	
	class Handler {
		public $access;
		public $redirect;
		
		public $authentication;
		public $version_object;
		public $cleanser;
		public $db_access;
		public $domain;
		public $desired_script;
		public $desired_action;
		
		public $object_code;
		public $object_list;
		
		public $script;
		public $script_name;
		public $script_file;
		public $script_extension;
		public $script_format;
		public $script_location;
		
		public function __construct() {
			$this->Construct_SetErrorLogging();
			$this->Construct_SetDevelopmentVersion();
			$this->Construct_Cleanser();
			$this->Construct_Domain();
			$this->Construct_Time();
			$this->Construct_Cookie();
			$this->Construct_Query();
			$this->Construct_Language();
			$this->Construct_Globals();
			$this->Construct_DBAccess();
			$this->Construct_Dictionaries();
			$this->Construct_Action();
			$this->Construct_PresetAuthentication();
			$this->Construct_ObjectsAndScripts();
			$this->Construct_ScriptName();
			
			if($this->script_name) {
				$this->Construct_ScriptFileAndExtension();
				$this->Construct_ScriptClassname();
				$this->Construct_ScriptFormat();
				$this->Construct_ScriptLocation();
				$this->Construct_SocialMedia();
			}
			
			return TRUE;
		}
		
		public function __destruct() {
			return $this->db_access->DBEnd();
		}
		
		public function Construct_SetErrorLogging() {
			$this->error_logging = new ErrorLogging(['handler'=>$this]);
			$this->issue_logging = new IssueLogging(['handler'=>$this]);
			return TRUE;
		}
		
		public function Construct_SetDevelopmentVersion() {
			return $this->version_object = new Version();
		}
		
		public function Construct_PresetAuthentication() {
			$this->access = 0;
			$this->redirect = '';
			
			$authentication_args = [
				'cookie'=>$this->cookie,
				'dbaccess'=>$this->db_access,
				'globals'=>$this->globals,
				'domain'=>$this->domain,
				'time'=>$this->time,
			];
			
			$authentication = new Authentication($authentication_args);
			return $this->authentication = $authentication;
		}
		
		public function CheckSecurity() {
			$authenticate_args = [
				'script'=>$this->script,
			];
			$authentication = $this->authentication;
			$authentication->Authenticate($authenticate_args);
			
			$this->access = $authentication->access_granted;
			$this->redirect = $authentication->redirect;
			
			if($this->script->script->isSecure()) {
				$this->authentication->ReAuthenticate();
			}
		}
		
		public function Construct_Cleanser() {
			$cleanser = new HandleInput();
			$this->cleanser = $cleanser;
		}
		
		public function Construct_Domain() {
			$domain = new Domain();
			$this->domain = $domain;
		}
		
		public function Construct_Cookie() {
			$cookie_args = [
				domain=>$this->domain,
				time=>$this->time,
				cleanser=>$this->cleanser,
			];
			
			$cookie = new Cookie($cookie_args);
			
			return $this->cookie = $cookie;
		}
		
		public function Construct_Globals() {
			require('../classes/Globals/clonefrom.php');
			$base_globals_classname = $this->domain->host . '.php';
			
			$client_globals_location = '../classes/Globals/' . $base_globals_classname;
			
			if(is_file($client_globals_location)) {
				require($client_globals_location);
				$globals = new globals([]);
			} else {
				$globals = new defaultglobals([]);
			}
			
			return $this->globals = $globals;
		}
		
		public function Construct_Query() {
			$query_args = [
				cleanser=>$this->cleanser,
			];
			$query = new Query($query_args);
			
			return $this->query = $query;
		}
		
		public function Construct_Language() {
			$language_args = [
				domain=>$this->domain,
				cookie=>$this->cookie,
				query=>$this->query,
			];
			$language = new Language($language_args);
			
			return $this->language = $language;
		}
		
		public function Construct_Dictionaries() {
			$dictionary = new Dictionary([
				'dbaccess'=>$this->db_access,
				'globals'=>$this->globals,
			]);
			
			return $this->dictionary = $dictionary;
		}
		
		public function Construct_Time() {
			$time = new Time([]);
			return $this->time = $time;
		}
		
		public function Construct_DBAccess() {
			$db_access = new DBAccess([
				'cleanser'=>$this->cleanser,
				'time'=>$this->time,
				'domain'=>$this->domain,
				'globals'=>$this->globals,
			]);
			$this->db_access = $db_access;
			return $this->db_access->DBStart();
		}
		
		public function Construct_Action() {
			$cleanser_args = [
				'input'=>$this->query->Parameter(['parameter'=>'action']),
			];
			
			$this->desired_action = $this->cleanser->CleanseInput($cleanser_args)[cleansedinput];
			
			if(!strlen($this->desired_action)) {
				$this->desired_action = 'display';
			}
		}
		
		public function Construct_ObjectsAndScripts() {
			$this->object_list = explode('/', ltrim($_SERVER[REDIRECT_URL], '/'));
#			print("BT: URL???" . $_SERVER[REDIRECT_URL] . "|");
			$this->desired_script = array_pop($this->object_list);
			$object_list_count = count($this->object_list);
			if($object_list_count > 0) {
				$this->object_code = $this->object_list[$object_list_count - 1];
				
				if($object_list_count > 1) {
					$this->object_parent = $this->object_list[$object_list_count - 2];
				}
			}
		}
		
		public function Construct_ScriptName() {
			$cleanser_args = [
				'input'=>$this->desired_script,
			];
			
			$this->script_name = $this->cleanser->CleanseInput($cleanser_args)[cleansedinput];
			
			if(!$this->script_name) {
				$permalink_id = (int)$this->query->Parameter(['parameter'=>'id']);
				if($permalink_id) {
					$assignment_record_args = [
						'type'=>'Assignment',
						'definition'=>[
							'id'=>$permalink_id,
						],
					];
					
					$assignment = $this->db_access->GetRecords($assignment_record_args);
					
					if($assignment && $assignment[0] && $assignment[0]['id']) {
						require('../classes/Database/ORM.php');
						$this->orm = new ORM(['dbaccessobject'=>$this->db_access]);
						
						$assignment = $assignment[0];
						
						$entry_records = $this->orm->SearchForEntries([
							'fieldname'=>'id',
							'fieldvalue'=>$assignment['Childid'],
							'assignmentid'=>$permalink_id,
						])[0];
						
						$redirect_url = '';
						
						if($_SERVER[HTTPS] == 'on') {
							$redirect_url .= 'https://www.';
						} else {
							$redirect_url .= 'http://www.';
						}
						
						$redirect_url .= $this->domain->primary_domain;
						
						$entry_record_count = count($entry_records['parents']);
						for($i = 0; $i < $entry_record_count; $i++) {
							$entry_record = $entry_records['parents'][$i];
							$redirect_url .= '/' . $entry_record['Code'];
						}
						
						$action = $this->query->Parameter(['parameter'=>'action']);
						
						if($action == 'Edit') {
							$redirect_url .= '/modify.php';
						} else {
							$redirect_url .= '/view.php';
						}
						
						if($this->desired_action) {
							$redirect_url .= '?action=' . $this->desired_action;
						}
						
						$this->redirect_url = $redirect_url;
						return FALSE;
					} else {
						$this->issue_logging->createLog([
							'issuetype'=>'BadPermalink',
							'description'=>'Invalid Permalink ID: ' . $permalink_id,
						]);
					//	return FALSE;
					}
				}
				
				$this->Construct_ScriptName_SetScriptNameDefault();
			}
		}
		
		public function Construct_ScriptFileAndExtension() {
			$script_name_pieces = explode('.', $this->script_name);
			
			$this->script_file = array_shift($script_name_pieces);
			$this->script_extension = array_pop($script_name_pieces);
		}
		
		public function Construct_ScriptClassname() {
			$this->script_classname = str_replace('-', '', $this->script_file);
		}
		
		public function Construct_ScriptFormat() {
			$this->script_format = $this->Construct_ScriptFormat_DetermineScriptFormat();
			$this->script_format_lower = $this->Construct_ScriptFormatLower_DetermineScriptFormatLower();
		}
		
		public function Construct_ScriptLocation() {
			switch($this->script_format) {
				case 'CSS':
					$this->script_location = '../scripts/style.php';
					break;
				
				default:
					$this->script_location = '../scripts/' . $this->script_file . '.php';
					break;
			}
		}
		
		public function Construct_SocialMedia() {
			$this->google_api = new Google([
				'domainobject'=>$this->domain,
				'dbaccessobject'=>$this->db_access,
				'authenticationobject'=>$this->authentication,
				'globals'=>$this->globals,
				'cookie'=>$this->cookie,
			]);
			
			$google_token_id = $this->query->Parameter(['parameter'=>'google_token_id']);
			$google_log_results = $this->google_api->AuthenticateOrDisauthenticateWithGoogle([
				'token'=>$google_token_id,
				'logout'=>$this->query->Parameter(['parameter'=>'logout']),
			]);
			
			if($google_log_results['action'] == 'logout') {
				$this->logout_results = TRUE;
			}
			
			return TRUE;
		}
		
		public function Construct_ScriptName_SetScriptNameDefault() {
			return $this->script_name = 'view.php';
		}
		
		public function Construct_ScriptFormat_DetermineScriptFormat() {
			switch ($this->script_extension) {
				case 'php':
				case 'cgi':
				case 'asp':
				case 'htm':
				case 'html':
					return 'HTML';
					
				case 'css':
					return 'CSS';
					
				case 'xml':
					return 'XML';
					
				case 'txt':
					return 'TXT';
					
				case 'js':
					return 'JS';
				
				case 'pdf':
					return 'PDF';
					
				case 'rtf':
					return 'RTF';
					
				case 'epub':
					return 'EPub';
					
				case 'daisy':
					return 'DAISY';
					
				case 'json':
					return 'JSON';
					
				case 'csv':
					return 'CSV';
					
				case 'sgml':
					return 'SGML';
					
				case 'tex':
					return 'TEX';
					
				case 'opds':
					return 'OPDS';
					
				case 'rdf':
					return 'RDF';
					
				default:
					return '';
			}
		}
		
		public function Construct_ScriptFormatLower_DetermineScriptFormatLower() {
			switch ($this->script_extension) {
				case 'php':
				case 'cgi':
				case 'asp':
				case 'htm':
				case 'html':
					return 'html';
					
				case 'css':
					return 'css';
					
				case 'xml':
					return 'xml';
					
				case 'txt':
					return 'txt';
					
				case 'js':
					return 'js';
					
				case 'pdf':
					return 'pdf';
					
				case 'rtf':
					return 'rtf';
					
				case 'epub':
					return 'epub';
					
				case 'daisy':
					return 'daisy';
				
				case 'json':
					return 'json';
					
				case 'csv':
					return 'csv';
					
				case 'sgml':
					return 'sgml';
					
				case 'tex':
					return 'tex';
					
				case 'opds':
					return 'opds';
					
				case 'rdf':
					return 'rdf';
					
				default:
					return '';
			}
		}
		
		public function HandleRequest() {
			if($this->SecureRequired()) {
				return $this->SecureRedirect();
			}
			
			if(!$this->ValidateReferrals()) {
				return FALSE;
			}
			
			if($this->redirect_url) {
				http_response_code(200);
				header('Location: ' . $this->redirect_url);
				return TRUE;
			}
			
			if(!$this->HandleRequest_Content()) {
				$this->HandleRequest_Error_404();
			}
			
			$this->RecordUserStatistics();
			
			return TRUE;
		}
		
		public function SecureRequired() {
			if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
				if($_COOKIE['loggedin']) {
					return TRUE;
				}
			}
			
			return FALSE;
		}
		
		public function SecureRedirect() {
			$location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			header('Location: ' . $location);
			
			return TRUE;
		}
		
		public function ValidateReferrals() {
			if(!$this->domain->ValidateReferringWebsite()) {
				print('Error 403 - You done been smote.');
				return FALSE;
			}
			
			return TRUE;
		}
		
		public function RecordUserStatistics() {
			require('../classes/Networking/UserTracking.php');
			$user_tracking_args = [
				'domain'=>$this->domain,
				'time'=>$this->time,
				'language'=>$this->language,
				'scriptformatlower'=>$this->script_format_lower,
			];
			$this->user_tracking = new UserTracking($user_tracking_args);
			
			$this->user_tracking->RecordUserTracking();
		}
		
		public function HandleRequest_Content() {
			$client_location = '../' . $this->domain->primary_domain . $_SERVER['SCRIPT_URL'];
			
			$shared_location = '../clonefrom.com' . $_SERVER['SCRIPT_URL'];
			
			if(!is_file($client_location) && is_file($shared_location)) {
				require('../classes/Networking/MIMEType.php');
				$mimetype = new MIMEType;
				$mimetypes = $mimetype->GetMIMETypeCodes();
				
				$desired_content_header = $mimetypes[$this->script_extension];
				
				if($desired_content_header) {
					$header_text = 'Content-type: ' . $desired_content_header . '; charset=utf-8';
					header($header_text);
				}
				
				if($desired_content_header == 'text/html') {
					return require($shared_location);
				} else {
					return readfile($shared_location);
				}
			}
			
			if(!is_file($this->script_location) || !$this->script_format) {
				return FALSE;
			}
			
			$this->HandleRequest_Content_Format_GetFormatObject();
			$this->script = $this->HandleRequest_Content_Format_InstantiateFormatObject();
			
			if($this->script->CanAccess()) {
				return $this->HandleRequest_Content_Format();
			}
			
			return FALSE;
		}
		
		public function HandleRequest_Content_Format() {
			$this->CheckSecurity();
			
			if($this->access) {
				if(method_exists($this->script->script, $this->desired_action)) {
					$desired_action = $this->desired_action;
					
					return $this->script->Display();
				}
			} else {
				if($this->authentication->redirect) {
						# handle security-triggered redirect
					$other_script_args = $this->HandleRequest_Content_Format_InstantiateFormatObject_PartialArgs();
					$other_script_args['redirect'] = $this->script->redirect_object;
					return ($this->authentication->RedirectToNewURL($other_script_args));
				}
			}
			
			return FALSE;
		}
		
		public function HandleRequest_Content_Format_GetFormatObject() {
			$format_class_location = '../classes/Format/' . $this->script_format . '.php';
			
			require($format_class_location);
		}
		
		public function HandleRequest_Content_Format_InstantiateFormatObject() {
			$script_format_args = $this->HandleRequest_Content_Format_InstantiateFormatObject_Args();
			
			return (new $this->script_format($script_format_args));
		}
		
		public function HandleRequest_Content_Format_InstantiateFormatObject_Args() {
			return [
				'firstcall'=>1,
				'authentication'=>$this->authentication,
				'versionobject'=>$this->version_object,
				'cleanser'=>$this->cleanser,
				'query'=>$this->query,
				'dbaccess'=>$this->db_access,
				'globals'=>$this->globals,
				'domain'=>$this->domain,
				'time'=>$this->time,
				'cookie'=>$this->cookie,
				'language'=>$this->language,
				'desiredscript'=>$this->desired_script,
				'desiredaction'=>$this->desired_action,
				'dictionary'=>$this->dictionary,
				'objectlist'=>$this->object_list,
				'objectcode'=>$this->object_code,
				'objectparent'=>$this->object_parent,
				'scriptname'=>$this->script_name,
				'scriptfile'=>$this->script_file,
				'scriptclassname'=>$this->script_classname,
				'scriptextension'=>$this->script_extension,
				'scriptformat'=>$this->script_format,
				'scriptformatlower'=>$this->script_format_lower,
				'scriptlocation'=>$this->script_location,
				'googleapi'=>$this->google_api,
			];
		}
		
		public function HandleRequest_Content_Format_InstantiateFormatObject_PartialArgs() {
			return [
				'firstcall'=>0,
				'cleanser'=>$this->cleanser,
				'dbaccess'=>$this->db_access,
				'language'=>$this->language,
				'globals'=>$this->globals,
				'domain'=>$this->domain,
				'objectcode'=>$this->object_code,
				'objectlist'=>$this->object_list,
				'scriptclassname'=>$this->script_classname,
				'scriptextension'=>$this->script_extension,
				'scriptformat'=>$this->script_format,
			];
		}
		
		public function HandleRequest_Error_404() {
			require('../classes/Networking/Error404.php');
			
			$error_404 = new Error404;
			$error_404_display_args = $this->HandleRequest_Error_404_Args();
			$error_404->Display($error_404_display_args);
			
			$this->issue_logging->createLog([
				'issuetype'=>'404',
				'description'=>'404 URL',
			]);
			
			return TRUE;
		}
		
		public function HandleRequest_Error_404_Args() {
			return [
				'cleanser'=>$this->cleanser,
				'scriptname'=>$this->script_name,
				'scriptfile'=>$this->script_file,
				'scriptclassname'=>$this->script_classname,
				'scriptextension'=>$this->script_extension,
				'scriptformat'=>$this->script_format,
			];
		}
	}

?>