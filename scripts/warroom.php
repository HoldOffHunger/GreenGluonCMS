<?php
	require('../traits/scripts/DBAdminFunctions.php');
	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/SimpleForms.php');

	class warroom extends basicscript {
		use DBAdminFunctions;
		use DBFunctions;
		use SimpleForms;
		
			// Security Data
		
		public function IsSecure() {
			return TRUE;
		}
		
		public function RequiresLogin() {
			return TRUE;
		}
		
		public function AdminOnly() {
			return TRUE;
		}
		
				// Primary Logic
				// ------------------------------------------------------------
		
		public function Display() {
			ini_set('memory_limit', '400M');
			$this->SetPrimaryHostRecords();
			$this->SetDBAdmin();
			
			$select_sql = 'SELECT * FROM ';
			$order_sql = $this->getOrderBySQL();
			
			$comment_sql = $select_sql . 'Comment WHERE Approved = 0 AND Rejected = 0 ' . $order_sql;
			$suggestion_sql = $select_sql . 'Suggestion WHERE Approved = 0 AND Rejected = 0 ' . $order_sql;
			$error_sql = $select_sql . 'InternalServerError WHERE Resolved = 0 ' . $order_sql;
			$issue_sql = $select_sql . 'InternalServerIssue WHERE Resolved = 0 ' . $order_sql;
			
			$primary_hosts = $this->getPrimaryHosts();
			$primary_hosts_count = count($primary_hosts);
			
			$comments = [];
			$suggestions = [];
			$errors = [];
			$issues = [];
			
			for($i = 0; $i < $primary_hosts_count; $i++) {
				$primary_host = $primary_hosts[$i];
				
				$client_db = $this->getPrimaryHostDB(['primaryhost'=>$primary_host]);
				
				$comments[$primary_host] = $client_db->RunQuery([
					'sql'=>$comment_sql,
				]);
				
				$suggestions[$primary_host] = $client_db->RunQuery([
					'sql'=>$suggestion_sql,
				]);
				
				$errors[$primary_host] = $client_db->RunQuery([
					'sql'=>$error_sql,
				]);
				
				$issues[$primary_host] = $client_db->RunQuery([
					'sql'=>$issue_sql,
				]);
			}
			
			$this->primary_hosts = $primary_hosts;
			$this->primary_hosts_count = $primary_hosts_count;
			
			$this->comments = $comments;
			$this->suggestions = $suggestions;
			$this->errors = $errors;
			$this->issues = $issues;
			
			return TRUE;
		}
		
		public function getPrimaryHostDB($args) {
			$primary_host = $args['primaryhost'];
			
			$primary_host_pieces = explode('.', $primary_host);
			$primary_host_usable = $primary_host_pieces[0];
			
			$client_db_args = [
				'cleanser'=>$this->cleanser_object,
				'time'=>$this->time,
				'domain'=>$this->domain_object,
				'database'=>$primary_host_usable,
				'globals'=>$this->globals,
			];
			
			$client_db = new DBAccess($client_db_args);
			$client_db->DBStart();
			
			return $client_db;
		}
		
		public function getPrimaryHosts() {
			$selected_primary_host = $this->Param('host');
			
			$primary_hosts = $this->db_admin->ViewAllPrimaryHosts();
			$primary_hosts_count = count($primary_hosts);
			
			for($i = 0; $i < $primary_hosts_count; $i++) {
				$primary_host = $primary_hosts[$i];
				$primary_host_pieces = explode('.', $primary_host);
				$primary_host_comparable = $primary_host_pieces[0];
				
				if($primary_host_comparable == $selected_primary_host) {
					$primary_hosts = [
						$primary_host
					];
					$i = $primary_hosts_count;
				}
			}
			
			return $primary_hosts;
		}
		
		public function getOrderBySQL() {
			$order_sql = 'ORDER BY OriginalCreationDate DESC ';
			
			$limit = (int) $this->Param('limit');
			
			if($limit > 0 && $limit < 1001) {
				$order_sql .= 'LIMIT ' . $limit;
			}
			
			return $order_sql;
		}
		
				// Type Handlers
				// ------------------------------------------------------------
			
					// Error Handlers
					// ------------------------------------------------------------
		
		public function viewError() {
			$client_and_id = $this->getClientAndId();
			
			if(!$client_and_id) {
				return FALSE;
			}
			
			$client = $client_and_id['client'];
			$id = $client_and_id['id'];
			
			$client_db = $this->getClientDB(['client'=>$client]);
			
			$error_sql = 'SELECT * FROM InternalServerError WHERE id = ' . $id;
			
			$error = $client_db->RunQuery([
				'sql'=>$error_sql,
			])[0];
			
			if(!$error || !$error['id']) {
				return FALSE;
			}
			
			$this->error = $error;
			
			return TRUE;
		}
		
		public function resolveError() {
			$client_and_id = $this->getClientAndId();
			
			if(!$client_and_id) {
				return FALSE;
			}
			
			$client = $client_and_id['client'];
			$id = $client_and_id['id'];
			
			$client_db = $this->getClientDB(['client'=>$client]);
			
			$error_sql = 'UPDATE InternalServerError SET Resolved = TRUE WHERE id = ' . $id;
			
			$error = $client_db->RunQuery([
				'sql'=>$error_sql,
			])[0];
			
			if(!$error || !$error['id']) {
				return FALSE;
			}
			
			$this->error = $error;
			
			return TRUE;
		}
			
					// Comment Handlers
					// ------------------------------------------------------------
		
		public function viewComment() {
			$client_and_id = $this->getClientAndId();
			
			if(!$client_and_id) {
				return FALSE;
			}
			
			$client = $client_and_id['client'];
			$id = $client_and_id['id'];
			
			$client_db = $this->getClientDB(['client'=>$client]);
			
			$comment_sql = 'SELECT * FROM Comment WHERE id = ' . $id;
			
			$comment = $client_db->RunQuery([
				'sql'=>$comment_sql,
			])[0];
			
			if(!$comment || !$comment['id']) {
				return FALSE;
			}
			
			$this->comment = $comment;
			
			return TRUE;
		}
		
		public function acceptComment() {
			$client_and_id = $this->getClientAndId();
			
			if(!$client_and_id) {
				return FALSE;
			}
			
			$client = $client_and_id['client'];
			$id = $client_and_id['id'];
			
			$client_db = $this->getClientDB(['client'=>$client]);
			
			$comment_sql = 'UPDATE Comment SET Approved = TRUE WHERE id = ' . $id;
			
			$comment = $client_db->RunQuery([
				'sql'=>$comment_sql,
			])[0];
			
			if(!$comment || !$comment['id']) {
				return FALSE;
			}
			
			$this->comment = $comment;
			
			return TRUE;
		}
		
		public function rejectComment() {
			$client_and_id = $this->getClientAndId();
			
			if(!$client_and_id) {
				return FALSE;
			}
			
			$client = $client_and_id['client'];
			$id = $client_and_id['id'];
			
			$client_db = $this->getClientDB(['client'=>$client]);
			
			$comment_sql = 'UPDATE Comment SET Approved = FALSE WHERE id = ' . $id;
			
			$comment = $client_db->RunQuery([
				'sql'=>$comment_sql,
			])[0];
			
			if(!$comment || !$comment['id']) {
				return FALSE;
			}
			
			$this->comment = $comment;
			
			return TRUE;
		}
			
					// Suggestion Handlers
					// ------------------------------------------------------------
		
		public function viewSuggestion() {
			$client_and_id = $this->getClientAndId();
			
			if(!$client_and_id) {
				return FALSE;
			}
			
			$client = $client_and_id['client'];
			$id = $client_and_id['id'];
			
			$client_db = $this->getClientDB(['client'=>$client]);
			
			$suggestion_sql = 'SELECT * FROM Suggestion WHERE id = ' . $id;
			
			$suggestion = $client_db->RunQuery([
				'sql'=>$suggestion_sql,
			])[0];
			
			if(!$suggestion || !$suggestion['id']) {
				return FALSE;
			}
			
			$this->suggestion = $suggestion;
			
			return TRUE;
		}
		
		public function acceptSuggestion() {
			$client_and_id = $this->getClientAndId();
			
			if(!$client_and_id) {
				return FALSE;
			}
			
			$client = $client_and_id['client'];
			$id = $client_and_id['id'];
			
			$client_db = $this->getClientDB(['client'=>$client]);
			
			$suggestion_sql = 'UPDATE Suggestion SET Approved = TRUE WHERE id = ' . $id;
			
			$suggestion = $client_db->RunQuery([
				'sql'=>$suggestion_sql,
			])[0];
			
			if(!$suggestion || !$suggestion['id']) {
				return FALSE;
			}
			
			$this->suggestion = $suggestion;
			
			return TRUE;
		}
		
		public function rejectSuggestion() {
			$client_and_id = $this->getClientAndId();
			
			if(!$client_and_id) {
				return FALSE;
			}
			
			$client = $client_and_id['client'];
			$id = $client_and_id['id'];
			
			$client_db = $this->getClientDB(['client'=>$client]);
			
			$suggestion_sql = 'UPDATE Suggestion SET Approved = FALSE WHERE id = ' . $id;
			
			$suggestion = $client_db->RunQuery([
				'sql'=>$suggestion_sql,
			])[0];
			
			if(!$suggestion || !$suggestion['id']) {
				return FALSE;
			}
			
			$this->suggestion = $suggestion;
			
			return TRUE;
		}
		
				// Utilities
				// ------------------------------------------------------------
		
		public function getClientAndId() {
			$client = $this->getPrimaryHost();
			$id = (int)$this->Param('id');
			
			if(!$client || !$id) {
				return FALSE;
			}
			
			$this->client = $client;
			$this->id = $id;
			
			return [
				'client'=>$client,
				'id'=>$id,
			];
		}
		
		public function getPrimaryHost() {
			$client = $this->Param('client');
			$client_hash = $this->getPrimaryHostsHash();
			
			if($client_hash[$client]) {
				return $client;
			}
			
			return FALSE;
		}
		
		public function getPrimaryHostsHash() {
			$hash = [];
			
			$primary_hosts = $this->db_admin->ViewAllPrimaryHosts();
			$primary_hosts_count = count($primary_hosts);
			
			for($i = 0; $i < $primary_hosts_count; $i++) {
				$primary_host = $primary_hosts[$i];
				
				$hosh[$primary_host] = TRUE;
			}
			
			return $hash;
		}
		
		public function getClientDB($args) {
			$client = $args['client'];
			$client_db_args = [
				cleanser=>$this->cleanser_object,
				time=>$this->time,
				domain=>$this->domain_object,
				database=>$client,
			];
			
			$client_db = new DBAccess($client_db_args);
			
			return $client_db;
		}
		
				// ** HTML FORMAT DATA ** //
		
			// Title
		
		public function GetHTMLFormatData_Title() {
			return 'No Fighting in the War Room';
		}
	}

?>