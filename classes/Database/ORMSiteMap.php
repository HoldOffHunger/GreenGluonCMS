<?php

	class ORMSiteMap
	{
		
			// Construction
			// -------------------------------------------------
		
		public function __construct($args)
		{
			$this->dbaccessobject = $args[dbaccessobject];
		}
		
		/*
		
			SELECT
			
			E1.Code as E1_Code,
			E2.Code as E2_Code,
			E3.Code as E3_Code,
			E4.Code as E4_Code,
			E5.Code as E5_Code,
			E6.Code as E6_Code,
			E7.Code as E7_Code
			
			FROM Assignment as A1
			
			JOIN Entry E1 ON A1.Childid = 0 and A1.Parentid = E1.id
			
			LEFT JOIN Assignment A2 ON A2.Parentid = E1.id
			LEFT JOIN Entry E2 ON A2.Childid = E2.id
			
			LEFT JOIN Assignment A3 ON A3.Parentid = E2.id
			LEFT JOIN Entry E3 ON A3.Childid = E3.id
			
			LEFT JOIN Assignment A4 ON A4.Parentid = E3.id
			LEFT JOIN Entry E4 ON A4.Childid = E4.id
			
			LEFT JOIN Assignment A5 ON A5.Parentid = E4.id
			LEFT JOIN Entry E5 ON A5.Childid = E5.id
			
			LEFT JOIN Assignment A6 ON A6.Parentid = E5.id
			LEFT JOIN Entry E6 ON A6.Childid = E6.id
			
			LEFT JOIN Assignment A7 ON A7.Parentid = E6.id
			LEFT JOIN Entry E7 ON A7.Childid = E7.id
		
		*/
		
		public function GetEntrySiteMapCodes()
		{
			$sql = 'SELECT ';
			
			$sql .= 'E1.Code as E1_Code, E1.Title as E1_Title, E1.Subtitle as E1_Subtitle, E1.ListTitle as E1_ListTitle, E1.LastModificationDate as E1_LastModificationDate, ';
			$sql .= 'E2.Code as E2_Code, E2.Title as E2_Title, E2.Subtitle as E2_Subtitle, E2.ListTitle as E2_ListTitle, E2.LastModificationDate as E2_LastModificationDate, ';
			$sql .= 'E3.Code as E3_Code, E3.Title as E3_Title, E3.Subtitle as E3_Subtitle, E3.ListTitle as E3_ListTitle, E3.LastModificationDate as E3_LastModificationDate, ';
			$sql .= 'E4.Code as E4_Code, E4.Title as E4_Title, E4.Subtitle as E4_Subtitle, E4.ListTitle as E4_ListTitle, E4.LastModificationDate as E4_LastModificationDate, ';
			$sql .= 'E5.Code as E5_Code, E5.Title as E5_Title, E5.Subtitle as E5_Subtitle, E5.ListTitle as E5_ListTitle, E5.LastModificationDate as E5_LastModificationDate, ';
			$sql .= 'E6.Code as E6_Code, E6.Title as E6_Title, E6.Subtitle as E6_Subtitle, E6.ListTitle as E6_ListTitle, E6.LastModificationDate as E6_LastModificationDate, ';
			$sql .= 'E7.Code as E7_Code, E7.Title as E7_Title, E7.Subtitle as E7_Subtitle, E7.ListTitle as E7_ListTitle, E7.LastModificationDate as E7_LastModificationDate ';
			
			$sql .= 'FROM Assignment as A1 ';
			
			$sql .= 'JOIN Entry E1 ON A1.Childid = 0 and A1.Parentid = E1.id ';
			
			$sql .= 'JOIN Assignment A2 ON A2.Parentid = E1.id ';
			$sql .= 'JOIN Entry E2 ON A2.Childid = E2.id ';
			
			$sql .= 'LEFT JOIN Assignment A3 ON A3.Parentid = E2.id ';
			$sql .= 'LEFT JOIN Entry E3 ON A3.Childid = E3.id ';
			
			$sql .= 'LEFT JOIN Assignment A4 ON A4.Parentid = E3.id ';
			$sql .= 'LEFT JOIN Entry E4 ON A4.Childid = E4.id ';
			
			$sql .= 'LEFT JOIN Assignment A5 ON A5.Parentid = E4.id ';
			$sql .= 'LEFT JOIN Entry E5 ON A5.Childid = E5.id ';
			
			$sql .= 'LEFT JOIN Assignment A6 ON A6.Parentid = E5.id ';
			$sql .= 'LEFT JOIN Entry E6 ON A6.Childid = E6.id ';
			
			$sql .= 'LEFT JOIN Assignment A7 ON A7.Parentid = E6.id ';
			$sql .= 'LEFT JOIN Entry E7 ON A7.Childid = E7.id ';
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>'',
				recordvalues=>[],
			];
			
			$codes = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
			
			return $codes;
		}
	}

?>