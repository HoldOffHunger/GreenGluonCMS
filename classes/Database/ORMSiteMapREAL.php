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
		
		public function GetEntrySiteMapCodeCount()
		{
			$sql = 'SELECT COUNT(A1.id) AS EntryCount ';
			
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
			
			$count = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args)[0]['EntryCount'];
			
			return $count;
		}
		
		public function GetSitemapPages($args)
		{
			PRINT("DREAMHOSTING FAILED.");
			die ("DREAMHOST FAILURE");
			$per_page = $args['perpage'];
			$index = 0;
			$results = [];
			
			$keep_looping = true;
			
			while($keep_looping)
			{
				$sql = 'SELECT * FROM ';
				
					// #1
				
				$sql .= '(SELECT * FROM ';
				$sql .= '(SELECT ';
				
				$sql .= 'E1.LastModificationDate as maxitem1 ';
				
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
				
				$sql .= 'WHERE E1.LastModificationDate IS NOT NULL ';
				
				$sql .= 'ORDER BY E1.LastModificationDate DESC ';
				
				$sql .= 'LIMIT ' . ($index * $per_page) . ', ' . $per_page;
				
				$sql .= ') as t1 ';
				$sql .= ') as tt1, ';
				
					// #2
				
				$sql .= '(SELECT * FROM ';
				$sql .= '(SELECT ';
				
				$sql .= 'E2.LastModificationDate as maxitem2 ';
				
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
				
				$sql .= 'WHERE E2.LastModificationDate IS NOT NULL ';
				
				$sql .= 'ORDER BY E2.LastModificationDate DESC ';
				
				$sql .= 'LIMIT ' . ($index * $per_page) . ', ' . $per_page;
				
				$sql .= ') as t2 ';
				$sql .= ') as tt2, ';
				
					// #3
				
				$sql .= '(SELECT * FROM ';
				$sql .= '(SELECT ';
				
				$sql .= 'E3.LastModificationDate as maxitem3 ';
				
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
				
				$sql .= 'WHERE E3.LastModificationDate IS NOT NULL ';
				
				$sql .= 'ORDER BY E3.LastModificationDate DESC ';
				
				$sql .= 'LIMIT ' . ($index * $per_page) . ', ' . $per_page;
				
				$sql .= ') as t3 ';
				$sql .= ') as tt3, ';
				
					// #4
				
				$sql .= '(SELECT * FROM ';
				$sql .= '(SELECT ';
				
				$sql .= 'E4.LastModificationDate as maxitem4 ';
				
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
				
				$sql .= 'WHERE E4.LastModificationDate IS NOT NULL ';
				
				$sql .= 'ORDER BY E4.LastModificationDate DESC ';
				
				$sql .= 'LIMIT ' . ($index * $per_page) . ', ' . $per_page;
				
				$sql .= ') as t4 ';
				$sql .= ') as tt4, ';
				
					// #5
				
				$sql .= '(SELECT * FROM ';
				$sql .= '(SELECT ';
				
				$sql .= 'E5.LastModificationDate as maxitem5 ';
				
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
				
				$sql .= 'WHERE E5.LastModificationDate IS NOT NULL ';
				
				$sql .= 'ORDER BY E5.LastModificationDate DESC ';
				
				$sql .= 'LIMIT ' . ($index * $per_page) . ', ' . $per_page;
				
				$sql .= ') as t5 ';
				$sql .= ') as tt5, ';
				
					// #6
				
				$sql .= '(SELECT * FROM ';
				$sql .= '(SELECT ';
				
				$sql .= 'E6.LastModificationDate as maxitem6 ';
				
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
				
				$sql .= 'WHERE E6.LastModificationDate IS NOT NULL ';
				
				$sql .= 'ORDER BY E6.LastModificationDate DESC ';
				
				$sql .= 'LIMIT ' . ($index * $per_page) . ', ' . $per_page;
				
				$sql .= ') as t6 ';
				$sql .= ') as tt6, ';
				
					// #7
				
				$sql .= '(SELECT * FROM ';
				$sql .= '(SELECT ';
				
				$sql .= 'E7.LastModificationDate as maxitem7 ';
				
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
				
				$sql .= 'WHERE E7.LastModificationDate IS NOT NULL ';
				
				$sql .= 'ORDER BY E7.LastModificationDate DESC ';
				
				$sql .= 'LIMIT ' . ($index * $per_page) . ', ' . $per_page;
				
				$sql .= ') as t7 ';
				$sql .= ') as tt7 ';
				
				$sql .= 'LIMIT 1';
				/*
					// #2
				
				$sql .= '(SELECT ';
				
				$sql .= 'MAX(IFNULL(E2.LastModificationDate, "1000-01-01")) as maxitem2 ';
				
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
				
				$sql .= 'LIMIT ' . ($index * $per_page) . ', ' . $per_page;
				
				$sql .= ') as t2, ';
				
					// #3
				
				$sql .= '(SELECT ';
				
				$sql .= 'MAX(IFNULL(E3.LastModificationDate, "1000-01-01")) as maxitem3 ';
				
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
				
				$sql .= 'LIMIT ' . ($index * $per_page) . ', ' . $per_page;
				
				$sql .= ') as t3, ';
				
					// #4
				
				$sql .= '(SELECT ';
				
				$sql .= 'MAX(IFNULL(E4.LastModificationDate, "1000-01-01")) as maxitem4 ';
				
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
				
				$sql .= 'LIMIT ' . ($index * $per_page) . ', ' . $per_page;
				
				$sql .= ') as t4, ';
				
					// #5
				/*
				$sql .= '(SELECT ';
				
				$sql .= 'MAX(E5.LastModificationDate) as maxitem5 ';
				
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
				
				$sql .= 'WHERE E5.LastModificationDate != "1000-01-01" ';
				
				$sql .= 'LIMIT ' . ($index * $per_page) . ', ' . $per_page;
				
				$sql .= ') as t5, ';
				
					// #6
				
				$sql .= '(SELECT ';
				
				$sql .= 'MAX(IFNULL(E6.LastModificationDate, "1000-01-01")) as maxitem6 ';
				
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
				
				$sql .= 'LIMIT ' . ($index * $per_page) . ', ' . $per_page;
				
				$sql .= ') as t6, ';
				
					// #7
				
				$sql .= '(SELECT ';
				
				$sql .= 'MAX(IFNULL(E7.LastModificationDate, "1000-01-01")) as maxitem7 ';
				
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
				
				$sql .= 'LIMIT ' . ($index * $per_page) . ', ' . $per_page;
				
				$sql .= ') as t7 ';
				*/
				/*
				$sql = 'SELECT ';
				
				$sql .= 'MAX(';
				$sql .= 'SELECT ';
				
				$sql .= 'E1.LastModificationDate as E1_LastModificationDate, ';
				$sql .= 'E2.LastModificationDate as E2_LastModificationDate, ';
				$sql .= 'E3.LastModificationDate as E3_LastModificationDate, ';
				$sql .= 'E4.LastModificationDate as E4_LastModificationDate, ';
				$sql .= 'E5.LastModificationDate as E5_LastModificationDate, ';
				$sql .= 'E6.LastModificationDate as E6_LastModificationDate, ';
				$sql .= 'E7.LastModificationDate as E7_LastModificationDate ';
				
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
				
				$sql .= 'LIMIT ' . ($index * $per_page) . ', ' . $per_page;
				$sql .= ') as t1';
				*/
				
				/*
				
				$sql = 'SELECT ';
				
				$sql .= 'GREATEST(';
				$sql .= 'MAX(IFNULL(E1.LastModificationDate, "1000-01-01")), ';
				$sql .= 'MAX(IFNULL(E2.LastModificationDate, "1000-01-01")), ';
				$sql .= 'MAX(IFNULL(E3.LastModificationDate, "1000-01-01")), ';
				$sql .= 'MAX(IFNULL(E4.LastModificationDate, "1000-01-01")), ';
				$sql .= 'MAX(IFNULL(E5.LastModificationDate, "1000-01-01")), ';
				$sql .= 'MAX(IFNULL(E6.LastModificationDate, "1000-01-01")), ';
				$sql .= 'MAX(IFNULL(E7.LastModificationDate, "1000-01-01"))';
				
				$sql .= ') as LastModificationDate ';
				
				$sql .= 'FROM (';
				
				$sql .= 'SELECT ';
				
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
				
				$sql .= 'LIMIT ' . ($index * $per_page) . ', ' . $per_page;
				$sql .= ') as t1';
				*/
				
				$fill_arrays_from_db_args = [
					query=>$sql,
					sqlbindstring=>'',
					recordvalues=>[],
				];
				print($sql);
				$results[$index] = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args);
				print_r($results[$index]);
				if(!$results[$index][0]['LastModificationDate']) {
					$keep_looping = false;
				} else {
					$index++;
				}
			}
			
			return $results;
		}
	}

?>