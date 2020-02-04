<?php

/*
SELECT Entry.id, Entry.Title, TextBody.id as TextBody_id, TextBody.Source as TextBody_Source, MATCH (TextBody.Text) AGAINST ('vegetarian' IN NATURAL LANGUAGE MODE) AS score
FROM TextBody
JOIN Entry ON Entry.id = TextBody.Entryid
HAVING score > 0
ORDER BY score DESC;

ALTER TABLE TextBody ADD FULLTEXT INDEX `Text`  (`Text` DESC); 

*/

	class ORMSearch {
		
			// Construction
			// -------------------------------------------------
		
		public function __construct($args) {
			$this->dbaccessobject = $args['dbaccessobject'];
		}
		
		public function Search($args) {
			$search_terms = $args['searchterms'];
			$start_index = $args['startindex'];
			$end_index = $args['endindex'];
			$mode = $args['mode'];
			
			if(!$mode) {
				$mode = 'NATURAL LANGUAGE';
			}
			
			$sql = 'SELECT ';
			
			$sql .= 'TextBody.id as TextBody_id, ';
			$sql .= 'TextBody.Entryid as TextBody_Entryid, ';
			/*
			$sql .= 'TextBody.Text as TextBody_Text, ';
			$sql .= 'TextBody.Source as TextBody_Source, ';
			$sql .= 'TextBody.WordCount as TextBody_WordCount, ';
			$sql .= 'TextBody.CharacterCount as TextBody_CharacterCount, ';
			$sql .= 'TextBody.Language as TextBody_Language, ';
			$sql .= 'TextBody.OriginalCreationDate as TextBody_OriginalCreationDate, ';
			$sql .= 'TextBody.LastModificationDate as TextBody_LastModificationDate, ';
			
			$sql .= 'Entry.id as Entry_id, ';
			$sql .= 'Entry.Title as Entry_Title, ';
			$sql .= 'Entry.Subtitle as Entry_Subtitle, ';
			$sql .= 'Entry.ListTitle as Entry_ListTitle, ';
			$sql .= 'Entry.Code as Entry_Code, ';
			$sql .= 'Entry.OriginalCreationDate as Entry_OriginalCreationDate, ';
			$sql .= 'Entry.LastModificationDate as Entry_LastModificationDate, ';
			*/
			$sql .= 'MATCH (TextBody.Text) AGAINST (? IN ' . $mode . ' MODE) AS score ';
			
			$sql .= 'FROM TextBody ';
			$sql .= 'JOIN Entry ON Entry.id = TextBody.Entryid ';
			
			$where = $args['where'];
			
			if($where) {
				$sql .= 'WHERE ' . $where;
			}
			
			$sql .= 'HAVING score > 0 ';
			$sql .= 'ORDER BY score DESC ';
			
			if($start_index && $end_index) {
				$sql .= 'LIMIT ' . ($start_index - 1) . ',' . ($end_index) ;
			}
			
			if(count($search_terms) > 1) {
				$search_terms = [implode(' ', $search_terms)];
			}
			
			$sql .= ';';
			
			$fill_arrays_from_db_args = [
				'query'=>$sql,
				'sqlbindstring'=>'s',
				'recordvalues'=>$search_terms,
			];
			
			$codes = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
			
			return $codes;
		}
		
		public function SearchResultsCount($args) {
			$search_term = $args['searchterm'];
			
			$sql = 'SELECT COUNT(*) as count ';
			
			$sql .= 'FROM TextBody ';
			$sql .= 'JOIN Entry ON Entry.id = TextBody.Entryid ';
			$sql .= 'WHERE MATCH(Text) AGAINST (? IN NATURAL LANGUAGE MODE) ';
			
			$sql .= ';';
			
			$fill_arrays_from_db_args = [
				'query'=>$sql,
				'sqlbindstring'=>'s',
				'recordvalues'=>[$search_term],
			];
			
			$results = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
			
			return $results[0]['count'];
		}
	}

?>