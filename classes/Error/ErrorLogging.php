<?php

	class ErrorLogging
	{
		public $handler;
		
		public function __construct($args)
		{
			$this->handler = $args['handler'];
		}
		
		public function InitiateLogging()
		{
			set_error_handler(array($this,'errorHandler'));
			register_shutdown_function(array($this,'shutdownHandler'));
		}
		
		public function errorHandler($error_level, $error_message, $error_file, $error_line, $error_context)
		{
			$error = "lvl: " . $error_level . " | msg:" . $error_message . " | file:" . $error_file . " | ln:" . $error_line;
			switch ($error_level) {
			    case E_ERROR:
			    case E_CORE_ERROR:
			    case E_COMPILE_ERROR:
			    case E_PARSE:
			        $this->mylog($error, "fatal");
			        break;
			    case E_USER_ERROR:
			    case E_RECOVERABLE_ERROR:
			         $this->mylog($error, "error");
			        break;
			    case E_WARNING:
			    case E_CORE_WARNING:
			    case E_COMPILE_WARNING:
			    case E_USER_WARNING:
			         $this->mylog($error, "warn");
			        break;
			    case E_NOTICE:
			    case E_USER_NOTICE:
			         $this->mylog($error, "info");
			        break;
			    case E_STRICT:
			         $this->mylog($error, "debug");
			        break;
			    default:
			         $this->mylog($error, "warn");
			}
		}
		
		public function shutdownHandler() //will be called when php script ends.
		{
			$lasterror = error_get_last();
			switch ($lasterror['type'])
			{
			    case E_ERROR:
			    case E_CORE_ERROR:
			    case E_COMPILE_ERROR:
			    case E_USER_ERROR:
			    case E_RECOVERABLE_ERROR:
			    case E_CORE_WARNING:
			    case E_COMPILE_WARNING:
			    case E_PARSE:
			        $error = "[SHUTDOWN] lvl:" . $lasterror['type'] . " | msg:" . $lasterror['message'] . " | file:" . $lasterror['file'] . " | ln:" . $lasterror['line'];
			        $this->mylog($error, "fatal");
			}
		}
		
		public function mylog($error, $errlvl)
		{
			if($errlvl == 'fatal')
			{
				http_response_code(500);
				print('<p>We are sorry, but there was an error!  Please contact the system administrator to have this sorted out!  Thank you!</p>');
				
				if($_SERVER[HTTPS] == 'on')
				{
					$authentication_token = $_COOKIE['AuthenticationToken'];
					
					if($authentication_token)
					{
						$user_session_record_args = [
							'type'=>UserSession,
							'definition'=>[
								CookieToken=>$authentication_token,
								'RAW'=>[
									LastAccess=>[
										'<',
										'DATE_ADD(UserSession.LastAccess, INTERVAL 4 HOUR)',
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
						$user_session = $this->handler->db_access->GetRecords($user_session_record_args)[0];
					}
					if($user_session['UserAdmin.id'])
					{
						print("ERROR : <BR><BR>" . $error);
					}
				}
				
				$internal_server_error_insert_args = [
					type=>'InternalServerError',
					definition=>[
						Resolved=>0,
						ErrorMessage=>$error,
						ServerVariable=>print_r($_SERVER, TRUE),
						PostVariable=>print_r($_POST, TRUE),
						GetVariable=>print_r($_GET, TRUE),
						EnvironmentVariables=>print_r($this->handler, TRUE),
					],
				];
				
				return $this->internal_server_error = $this->handler->db_access->CreateRecord($internal_server_error_insert_args);
			}
		}
	}

?>