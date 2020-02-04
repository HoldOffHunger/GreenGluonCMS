<?php

	class Authentication {
		public $access_granted;
		public $redirect;
		public $protocol;
		public $user_account;
		public $user_session;
		
		public $script;
		public $db_access;
		public $domain;
		public $cookie;
		public $time;
		
		public function __construct($args) {
			$this->db_access = $args[dbaccess];
			$this->domain = $args[domain];
			$this->cookie = $args[cookie];
			$this->time = $args[time];
			
			$this->access_granted = 0;
			$this->redirect = 0;
			$this->protocol = '';
		}
		
		public function Authenticate($args) {
			$this->script = $args[script];
			if($this->script->script) {
				$this->DetectHTTPS();
				if($this->protocol == 'ssl')
				{
					$this->CheckCurrentAuthentication();
				}
				if($this->script->script->IsSecure())
				{
					$this->DetectHTTPS();
					if($this->protocol == 'ssl')
					{
						if($this->script->script->RequiresLogin())
						{
							if ($this->user_session)
							{
								if(!$this->script->script->AdminOnly() || $this->user_session['UserAdmin.id'])
								{
									if($this->CheckAuthenticationForCurrentObject())
									{
										$this->access_granted = 1;
									}
									else
									{
										$this->redirect = 1;
										$this->redirect_type = 'login';
										$this->access_granted = 0;
									}
								}
								else
								{
								//	REDIRECT TO LOGIN SCREEN
									$this->redirect = 1;
									$this->redirect_type = 'login';
									$this->access_granted = 0;
								}
								//IF (USER IS AUTHENTICATED FOR OBJECT)
								//{
								//}
								//else
								//{
									//$this->access_granted = 0;
								//}
							}
							else
							{
							//	REDIRECT TO LOGIN SCREEN
								$this->redirect = 1;
								$this->redirect_type = 'login';
								$this->access_granted = 0;
							}
						}
						else
						{
							$this->access_granted = 1;
						}
					}
					else
					{
						$this->redirect = 1;
						$this->redirect_type = 'ssl';
						$this->access_granted = 0;
					}
				}
				else
				{
					$this->access_granted = 1;
				}
			}
			else
			{
				$this->access_granted = 1;
			}
		}
		
		public function ReAuthenticate() {
			if(!$this->user_session)
			{
				$this->CheckCurrentAuthentication();
			}
			
			if($this->user_session)
			{
				$last_login = strtotime($this->user_session[LastAccess]);
				$now = $this->time->time;
				
				if(($now - (60 * 15)) >= $last_login)
				{
					return $this->RefreshAuthentication();
				}
			}
			
			return TRUE;
		}
		
		public function RefreshAuthentication() {
			return $this->Login_Successful([useraccount=>$this->user_account, refresh=>1]);
		}
		
		public function CheckAuthenticationForCurrentObject() {
			if($this->CheckAuthenticationForCurrentObject_IsAdmin() || $this->CheckAuthenticationForCurrentObject_IsOwner())
			{
				return TRUE;
			}
			
			return FALSE;
		}
		
		public function CheckAuthenticationForCurrentObject_IsAdmin() {
			if($this->user_session && $this->user_session['UserAdmin.id'])
			{
				return TRUE;
			}
			
			return FALSE;
		}
		
		public function CheckAuthenticationForCurrentObject_IsOwner() {
			return FALSE;
		}
		
		public function CheckCurrentAuthentication() {
			$authentication_token = $this->cookie_token;
			
			if(!$authentication_token) {
				$authentication_token = $this->cookie->GetCookie(['cookie'=>'AuthenticationToken']);
			}
			
			if($authentication_token) {
				$user_session_record_args = [
					'type'=>'UserSession',
					'definition'=>[
						'CookieToken'=>$authentication_token,
						'RAW'=>[
							'LastAccess'=>[
								'<',
								'DATE_ADD(UserSession.LastAccess, INTERVAL 160 HOUR)',
							],
						],
					],
					'limit'=>1,
					'joins'=>[
						'LEFT JOIN'=>[
							'User'=>'User.id = UserSession.Userid',
							'UserAdmin'=>'UserAdmin.Userid = UserSession.Userid',
						],
					],
				];
				
				$user_session = $this->db_access->GetRecords($user_session_record_args);
				if($user_session) {
					$this->user_session = $user_session[0];
					return TRUE;
				}
			}
			
			return 0;
		}
		
		public function Login($args) {
			$username = $args[username];
			$password = $args[password];
			
			$hashed_password = hash('sha256', $password);
			
			$user_record_args = [
				'type'=>User,
				'definition'=>[
					'Username'=>$username,
					'RAW'=>[
						'Password'=>[
							'=',
							'UNHEX(\'' . $hashed_password . '\')',
						],
					],
				],
				'limit'=>1,
				'joins'=>[
					'LEFT JOIN'=>[
						'UserAdmin'=>'UserAdmin.Userid = User.id',
					],
				],
			];
			
			$user_account = $this->db_access->GetRecords($user_record_args);
			
			if($user_account) {
				$this->user_account = $user_account;
				$login_successful_args = [
					'useraccount'=>$user_account,
				];
				return $this->Login_Successful($login_successful_args);
			} else {
				$login_failure_args = [
					'username'=>$username,
					'password'=>$password,
					'hashedpassword'=>$hashed_password,
				];
				return $this->Login_Failure($login_failure_args);
			}
		}
		
		public function Logout() {
			$user_session = $this->user_session;
			
			$this->Logout_ResetCookie();
			$this->Logout_ResetDatabase();
			
			unset($this->user_session);
			unset($this->user_account);
			
			return $user_session;
		}
		
		public function Logout_ResetDatabase() {
			$authentication_token = $this->cookie->GetCookie(['cookie'=>'AuthenticationToken']);
			
			$user_session_update_args = [
				'type'=>'UserSession',
				'update'=>[
					'CookieToken'=>'',
					'LastAccess'=>'00:00:00 0000-00-00',
				],
				'where'=>[
					'CookieToken'=>$authentication_token,
				],
			];
			
			return $this->db_access->UpdateRecord($user_session_update_args);
		}
		
		public function Logout_ResetCookie() {
			$set_authentication_cookie_args = [
				'secure'=>TRUE,
				'key'=>'AuthenticationToken',
				'value'=>null,
			];
			
			$this->cookie->SetCookie($set_authentication_cookie_args);
		}
		
		public function GenerateCookieToken($args) {
			return $this->GenerateCookieToken_Secure($args);
		}
		
		public function GenerateCookieToken_Secure($args) {
			$user_account = $args['useraccount'];
			
			$hash_values = [];
			$hash_values[] = $user_account['Username'];
			$hash_values[] = $this->AuthenticationToken_Salt1();
			$hash_values[] = $this->time->time;
			$hash_values[] = $this->AuthenticationToken_Salt2();
			
			$hash_plaintext = implode('',$hash_values);
			$hash_token = password_hash($hash_plaintext, CRYPT_BLOWFISH);
			
			$base_object = new Base();
			$this->base_object = $base_object;
			
			$convert_base_args = [
				'value'=>$hash_token,
				'startingbase'=>'Hexadecimal',
				'endingbase'=>'Base64',
			];
			
			$hash_token_base64 = $base_object->ConvertBase($convert_base_args);
			
			return $hash_token_base64;
		}
		
		public function AuthenticationToken_Salt1() {
			return 'Ehtdetohda80d2)*08';
		}
		
		public function AuthenticationToken_Salt2() {
			return ';d79d(:Ddaddhr]LS-';
		}
		
		public function GenerateCookieToken_Random() {
			$random_class_location = '../classes/Math/Random.php';
			require($random_class_location);
			$this->random = new Random();
			$random_string_args = [
				stringlength=>60,
				usenumbers=>1,
				useuppercaseletters=>1,
				uselowercaseletters=>1,
			];
			$cookie_token = $this->random->GetRandomString($random_string_args);
			return $cookie_token;
		}
		
		public function Login_Successful($args) {
			$user_account = $args['useraccount'];
			$user_session = $this->user_session;
			$first_user_account = $user_account[0];
			
			$userid = $first_user_account[id];
			
			if(!$userid) {
				$userid = $user_session['Userid'];
			}
				
			$cookie_token_args = [
				'useraccount'=>$first_user_account,
			];
			$cookie_token = $this->GenerateCookieToken($cookie_token_args);
			
			if(!$this->AllowMultipleDeviceLogin() || $args['refresh']) {
				$user_session_where_args = [
					'type'=>'UserSession',
					'definition'=>[
						'Userid'=>$userid,
					],
					'limit'=>1,
				];
				
				if($args['refresh']) {
					$user_session_where_args['definition']['CookieToken'] = $user_session['CookieToken'];
				}
				
				$user_session = $this->db_access->GetRecords($user_session_where_args);
				
				if($user_session) {
					$first_user_session = $user_session[0];
					$new_user_session = $first_user_session;
					$new_user_session['CookieToken'] = $cookie_token;
					$new_user_session['LastAccess'] = 'NOW()';
					
					$user_session_update_args = [
						type=>UserSession,
						update=>[
							CookieToken=>$cookie_token,
							RAW=>[
								LastAccess=>[
									'=',
									'NOW()',
								],
							],
						],
						where=>[
							id=>$new_user_session[id],
						],
					];
					
					$user_session_update_results = $this->db_access->UpdateRecord($user_session_update_args);
					
					$user_session_returnable = $new_user_session;
					$user_session_returnable = $user_session_update_results[0];
				}
			}
			
			if(!$user_session_returnable) {
				$user_session_insert_args = [
					type=>UserSession,
					definition=>[
						Userid=>$first_user_account[id],
						CookieToken=>$cookie_token,
						RAW=>[
							LastAccess=>[
								'=',
								'NOW()',
							],
						],
					],
				];
				
				$user_session_creation_results = $this->db_access->CreateRecord($user_session_insert_args);
				
				$user_session_returnable = $user_session_creation_results;
			}
			
			$set_authentication_cookie_args = [
				secure=>TRUE,
				key=>'AuthenticationToken',
				value=>$cookie_token,
			];
			
			$this->cookie->SetCookie($set_authentication_cookie_args);
			$this->cookie_token = $cookie_token;
			
			return [
				status=>'Success',
				useraccount=>$first_user_account,
				usersession=>$user_session_returnable,
			];
		}
		
		public function Login_Failure($args) {
			$username = $args[username];
			$password = $args[password];
			$hashed_password = $args[hashed_password];
			
			return [
				status=>'Failure',
				useraccount=>[],
			];
		}
		
		public function AllowMultipleDeviceLogin() {
			return TRUE;
		}
		
		public function RedirectToNewURL($args) {
			$redirect_object = $args['redirect'];
			unset($args['redirect']);
			
			switch($this->redirect_type) {
				case 'ssl':
					return $redirect_object->RedirectToSecuredConnection($args);
					break;
					
				case 'login':
					return $redirect_object->RedirectToLogin($args);
					break;
					
				case 'invalidaccess':
					return $redirect_object->RedirectToInvalidAccess($args);
					break;
			}
			
			return FALSE;
		}
		
		public function DetectHTTPS() {
			if($_SERVER['HTTPS'] == 'on') {
				$this->protocol = 'ssl';
			} else {
				$this->protocol = 'unencrypted';
			}
		}
	}

?>