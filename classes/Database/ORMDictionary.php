<?php

	class ORMDictionary
	{
			// Construction
			// -------------------------------------------------
		
		public function __construct($args)
		{
			$this->dbaccessobject = $args['dbaccess'];
		}
		
		public function GetDictionary($args)
		{
			$entry = $args['entry'];
			
			$sql = 'SELECT ';
			
//			$sql .= 'Entry1.Title AS Entry1_Title, ';
//			$sql .= 'Entry1.Code AS Entry1_Code, ';
			$sql .= 'Entry2.Title AS Entry2_Title, ';
		//	$sql .= 'Entry2.Code AS Entry2_Code, ';
			$sql .= 'Definition2.Term, ';
			$sql .= 'Definition2.Definition, ';
			$sql .= 'AssociatedEntry2.Title, ';
			$sql .= 'AssociatedEntry2.Code, ';
			$sql .= 'EventDate2.EventDateTime AS EventDate2_EventDateTime, ';
			$sql .= 'EventDate2.Title AS EventDate2_Title, ';
			$sql .= 'Assignment1.id AS Assignment1_id ';
			
			$sql .= 'FROM Entry AS Entry1 ';
			
			$sql .= 'LEFT JOIN Assignment AS Assignment1 ON Assignment1.Parentid = Entry1.id ';
			$sql .= 'JOIN Entry AS Entry2 ON Assignment1.Childid = Entry2.id ';
			$sql .= 'LEFT JOIN Association AS Association2 ON Association2.Entryid = Entry2.id ';
			$sql .= 'LEFT JOIN Entry AS AssociatedEntry2 ON AssociatedEntry2.id = Association2.ChosenEntryid ';
			$sql .= 'LEFT JOIN EventDate EventDate2 ON EventDate2.Entryid = Entry2.id ';
			$sql .= 'JOIN Definition AS Definition2 ON Definition2.Entryid = Entry2.id ';
			
			$sql .= 'WHERE Entry1.id = ? GROUP BY Definition2.id, AssociatedEntry2.id';
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>'i',
				recordvalues=>[$entry['id']],
			];
			
			$dictionary = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
			
			return $dictionary;
		}
		
		public function GetDictionary_prototype($args)
		{
			$entry = $args['entry'];
			
			$sql = 'SELECT DISTINCT ';
			
			$selects = [];
			for($i = 1; $i <= 3; $i++) {
				$select  = 'Entry' . $i . '.Title AS Entry' . $i . '_Title, ';
				$select .= 'Entry' . $i  . '.Code AS Entry' . $i . '_Code, ';
				$select .= 'Definition' . $i . '.Term AS Definition' . $i . '_Term, ';
				$select .= 'Definition' . $i . '.Definition AS Definition' . $i . '_Definition ';
				
				$selects[] = $select;
			}
			
			$sql .= implode(', ', $selects);
			$sql .= 'FROM Entry AS Entry1 ';
			
			$sql .= 'LEFT JOIN Definition AS Definition1 ON Definition1.Entryid = Entry1.id ';
			$sql .= 'LEFT JOIN Assignment AS Assignment1 ON Assignment1.Parentid = Entry1.id ';
			
			for($i = 2; $i <= 3; $i++) {
				$previous = $i - 1;
				$sql .= 'LEFT JOIN Entry AS Entry' . $i . ' ON Assignment' . $previous . '.Childid ';
				$sql .= 'LEFT JOIN Definition AS Definition' . $i . ' ON Definition' . $i . '.Entryid = Entry' . $i . '.id ';
				$sql .= 'LEFT JOIN Assignment AS Assignment' . $i . ' ON Assignment1.Parentid = Entry' . $i . '.id ';
			}
			
			$sql .= 'WHERE Entry1.id = ? AND (Definition1.id IS NOT NULL || Definition2.id IS NOT NULL || Definition3.id IS NOT NULL) GROUP BY Definition1.id, Definition2.id, Definition3.id ';
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>'i',
				recordvalues=>[$entry['id']],
			];
			
			$dictionary = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
			
			return $dictionary;
		}
	}

?>