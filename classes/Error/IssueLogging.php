<?php

	class IssueLogging {
		public $handler;
		
		public function __construct($args) {
			$this->handler = $args['handler'];
			
			return TRUE;
		}
		
		public function createLog($args) {
			$internal_server_issue_insert_args = [
				type=>'InternalServerIssue',
				definition=>[
					IssueType=>$args['issuetype'],
					URL=>$_SERVER['REQUEST_URI'],
					Description=>$args['description'],
					Resolved=>0,
					ServerVariable=>print_r($_SERVER, TRUE),
					PostVariable=>print_r($_POST, TRUE),
					GetVariable=>print_r($_GET, TRUE),
				],
			];
			
			return $this->internal_server_issue = $this->handler->db_access->CreateRecord($internal_server_issue_insert_args);
		}
	}

?>