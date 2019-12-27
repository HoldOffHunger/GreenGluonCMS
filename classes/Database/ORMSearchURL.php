<?php

/*
SELECT Entry.id, Entry.Title, TextBody.id as TextBody_id, TextBody.Source as TextBody_Source, MATCH (TextBody.Text) AGAINST ('vegetarian' IN NATURAL LANGUAGE MODE) AS score
FROM TextBody
JOIN Entry ON Entry.id = TextBody.Entryid
HAVING score > 0
ORDER BY score DESC;

ALTER TABLE TextBody ADD FULLTEXT INDEX `Text`  (`Text` DESC); 

*/

	class ORMSearchURL
	{
		
			// Construction
			// -------------------------------------------------
		
		public function __construct($args)
		{
			$this->dbaccessobject = $args[dbaccessobject];
		}
		
		public function Search($args)
		{
			$url = $args['url'];
			
			$passable_url_values = $this->getSearchURLS($args);
			
			$question_marks = array_fill(0, count($passable_url_values), '?');
			$question_marks_string = join(',', $question_marks);
			
			$sql = 'SELECT * ';
			
			$sql .= 'FROM Link ';
			$sql .= 'WHERE Link.URL IN (' . $question_marks_string . ') ';
			$sql .= 'ORDER BY id ASC ';
			
			$sql .= ';';
			
			$sql_bind_string = str_repeat('s', count($passable_url_values));
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>$sql_bind_string,
				recordvalues=>$passable_url_values,
			];
			
			$matching_entries = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
		#	print_r($matching_entries);
			return $matching_entries;
		}
		
		public function getSearchURLS($args) {
			$isolated_url = $this->getIsolatedURL($args);
			
			$full_urls = [$isolated_url];
			
			$protocols = $this->getSearchProtocols();
			$subdomains = $this->getSubDomains();
			
			foreach($protocols as $protocol) {
				$full_urls[] = $protocol . '://' . $isolated_url;
				$full_urls[] = $protocol . '://' . $isolated_url . '/';
				
				foreach($subdomains as $subdomain) {
					$full_urls[] = $protocol . '://' . $subdomain . '.' . $isolated_url;
					$full_urls[] = $protocol . '://' . $subdomain . '.' . $isolated_url . '/';
				}
			}
			
			return $full_urls;
		}
		
		public function getIsolatedURL($args) {
			$url = trim($args['url']);
			
			$url_protocol_pieces = explode('//', $url);
			
			if(count($url_protocol_pieces) > 1) {
				$isolated_url = $url_protocol_pieces[1];
			} else {
				$isolated_url = $url_protocol_pieces[0];
			}
			
			$subdomains = $this->getSubDomains();
			
			foreach($subdomains as $subdomain) {
				$isolated_url = ltrim($isolated_url, $subdomain . '.');
			}
			
			$isolated_url = rtrim($isolated_url, '/');
			
			return $isolated_url;
		}
		
		public function getSearchProtocols() {
			return [
				'ftp',
				'http',
				'https',
				'sftp',
			];
		}
		
		public function getSubDomains() {
			return [
				'www',
				'www0',
				'www1',
				'www2',
				'www3',
				'www4',
				'www5',
				'www6',
				'www7',
				'www8',
				'www9',
			];
		}
	}

?>