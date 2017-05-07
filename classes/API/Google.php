<?php

	class Google
	{
		public function __construct($args)
		{
			$this->domain_object = $args['domainobject'];
			$this->db_access_object = $args['dbaccessobject'];
			$this->authentication_object = $args['authenticationobject'];
			
			switch($this->domain_object->host)
			{
				case 'earthfluent':
					$this->client_id = 'public key!';
					$this->client_secret = 'private key!';
					break;
					
				case 'copyleftlicense':
					$this->client_id = 'public key!';
					$this->client_secret = 'private key';
					break;
			}
			
			require('../app/Google/vendor/autoload.php');
		}
		
		public function AuthenticateOrDisauthenticateWithGoogle($args)
		{
			$google_token_id = $args['token'];
			$logout = $args['logout'];
			
			$results = [];
			
			if($google_token_id)
			{
				$client = new Google_Client([
					'client_id'=>$this->client_id,
				]);
				$payload = $client->verifyIdToken($google_token_id);
				
				if($payload)
				{
					$email_address = $payload['email'];
					
					$user_record_args = [
						'type'=>User,
						'definition'=>[
							'EmailAddress'=>$email_address,
						],
						'limit'=>1,
						'joins'=>[
							'LEFT JOIN'=>[
								'UserAdmin'=>'UserAdmin.Userid = User.id',
							],
						],
					];
					
					$user_account = $this->db_access_object->GetRecords($user_record_args);
					
					if($user_account[0] && $user_account[0]['id'])
					{
						$this->authentication_object->user_account = $user_account;
						$this->authentication_object->Login_Successful([useraccount=>$user_account]);
						$results['newuser'] = 0;
					}
					else
					{
						$hashed_password = hash('sha256', 'do you believe in magic?  any young girl would!');
						$user_record_args = [
							'type'=>User,
							'definition'=>[
								'EmailAddress'=>$email_address,
								'RAW'=>[
									'Password'=>[
										'=',
										'UNHEX(\'' . $hashed_password . '\')',
									],
								],
							],
						];
						
						$user_creation_results = $this->db_access_object->CreateRecord($user_record_args);
						
						$this->authentication_object->user_account = [$user_creation_results];
						$this->authentication_object->Login_Successful([useraccount=>[$user_account]]);
						$results['newuser'] = 1;
					}
					
					$this->authentication_object->CheckCurrentAuthentication();
					$results['action'] = 'login';
				}
			}
			
			if($logout)
			{
				$this->Logout();
				$results['action'] = 'logout';
			}
			
			return $results;
		}
		
		public function Logout()
		{
			return $this->authentication_object->Logout();
		}
	}

?>