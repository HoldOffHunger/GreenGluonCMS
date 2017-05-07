<?php

/*

			// Stats for the "anarchism" top-parent in revoltlib.com

SELECT

COUNT(DISTINCT Assignment1.id) AS "Generation1ChildCount",
COUNT(DISTINCT Assignment2.id) AS "Generation2ChildCount",
COUNT(DISTINCT Assignment3.id) AS "Generation3ChildCount",
COUNT(DISTINCT Assignment4.id) AS "Generation4ChildCount",
COUNT(DISTINCT Assignment5.id) AS "Generation5ChildCount",
COUNT(DISTINCT Assignment6.id) AS "Generation6ChildCount",
COUNT(DISTINCT Assignment7.id) AS "Generation7ChildCount",

SUM(TextBody1.WordCount) AS "Generation1WordCount",
SUM(TextBody2.WordCount) AS "Generation2WordCount",
SUM(TextBody3.WordCount) AS "Generation3WordCount",
SUM(TextBody4.WordCount) AS "Generation4WordCount",
SUM(TextBody5.WordCount) AS "Generation5WordCount",
SUM(TextBody6.WordCount) AS "Generation6WordCount",
SUM(TextBody7.WordCount) AS "Generation7WordCount",

SUM(TextBody1.CharacterCount) AS "Generation1CharacterCount",
SUM(TextBody2.CharacterCount) AS "Generation2CharacterCount",
SUM(TextBody3.CharacterCount) AS "Generation3CharacterCount",
SUM(TextBody4.CharacterCount) AS "Generation4CharacterCount",
SUM(TextBody5.CharacterCount) AS "Generation5CharacterCount",
SUM(TextBody6.CharacterCount) AS "Generation6CharacterCount",
SUM(TextBody7.CharacterCount) AS "Generation7CharacterCount",

COUNT(DISTINCT Assignment1.id) + 
COUNT(DISTINCT Assignment2.id) + 
COUNT(DISTINCT Assignment3.id) + 
COUNT(DISTINCT Assignment4.id) + 
COUNT(DISTINCT Assignment5.id) + 
COUNT(DISTINCT Assignment6.id) + 
COUNT(DISTINCT Assignment7.id) AS "TotalRecordCount",

SUM(IFNULL(TextBody1.WordCount,0)) +
SUM(IFNULL(TextBody2.WordCount,0)) +
SUM(IFNULL(TextBody3.WordCount,0)) +
SUM(IFNULL(TextBody4.WordCount,0)) +
SUM(IFNULL(TextBody5.WordCount,0)) +
SUM(IFNULL(TextBody6.WordCount,0)) +
SUM(IFNULL(TextBody7.WordCount,0)) AS "TotalWordCount",

SUM(IFNULL(TextBody1.CharacterCount,0)) +
SUM(IFNULL(TextBody2.CharacterCount,0)) +
SUM(IFNULL(TextBody3.CharacterCount,0)) +
SUM(IFNULL(TextBody4.CharacterCount,0)) +
SUM(IFNULL(TextBody5.CharacterCount,0)) +
SUM(IFNULL(TextBody6.CharacterCount,0)) +
SUM(IFNULL(TextBody7.CharacterCount,0)) AS "TotalCharacterCount"

FROM Assignment AS Assignment1
LEFT JOIN Assignment AS Assignment2 ON Assignment2.Parentid = Assignment1.Childid
LEFT JOIN Assignment AS Assignment3 ON Assignment3.Parentid = Assignment2.Childid
LEFT JOIN Assignment AS Assignment4 ON Assignment4.Parentid = Assignment3.Childid
LEFT JOIN Assignment AS Assignment5 ON Assignment5.Parentid = Assignment4.Childid
LEFT JOIN Assignment AS Assignment6 ON Assignment6.Parentid = Assignment5.Childid
LEFT JOIN Assignment AS Assignment7 ON Assignment7.Parentid = Assignment6.Childid

LEFT JOIN TextBody AS TextBody1 ON TextBody1.Entryid = Assignment1.Childid
LEFT JOIN TextBody AS TextBody2 ON TextBody2.Entryid = Assignment2.Childid
LEFT JOIN TextBody AS TextBody3 ON TextBody3.Entryid = Assignment3.Childid
LEFT JOIN TextBody AS TextBody4 ON TextBody4.Entryid = Assignment4.Childid
LEFT JOIN TextBody AS TextBody5 ON TextBody5.Entryid = Assignment5.Childid
LEFT JOIN TextBody AS TextBody6 ON TextBody6.Entryid = Assignment6.Childid
LEFT JOIN TextBody AS TextBody7 ON TextBody7.Entryid = Assignment7.Childid

WHERE Assignment1.Parentid = 4

*/

	class ORMStats
	{
		
			// Construction
			// -------------------------------------------------
		
		public function __construct($args)
		{
			$this->dbaccessobject = $args[dbaccessobject];
		}
		
		public function GenerateChildRecordStats($args)
		{
			$entry = $args['entry'];
			
			$sql = 'SELECT ';
			
			/*
			$sql .=
				'COUNT(DISTINCT Assignment1.id) AS "Generation1ChildCount", ' .
				'COUNT(DISTINCT Assignment2.id) AS "Generation2ChildCount", ' .
				'COUNT(DISTINCT Assignment3.id) AS "Generation3ChildCount", ' .
				'COUNT(DISTINCT Assignment4.id) AS "Generation4ChildCount", ' .
				'COUNT(DISTINCT Assignment5.id) AS "Generation5ChildCount", ' .
				'COUNT(DISTINCT Assignment6.id) AS "Generation6ChildCount", ' .
				'COUNT(DISTINCT Assignment7.id) AS "Generation7ChildCount", ' ;
			
			$sql .=
				'SUM(TextBody1.WordCount) AS "Generation1WordCount", ' .
				'SUM(TextBody2.WordCount) AS "Generation2WordCount", ' .
				'SUM(TextBody3.WordCount) AS "Generation3WordCount", ' .
				'SUM(TextBody4.WordCount) AS "Generation4WordCount", ' .
				'SUM(TextBody5.WordCount) AS "Generation5WordCount", ' .
				'SUM(TextBody6.WordCount) AS "Generation6WordCount", ' .
				'SUM(TextBody7.WordCount) AS "Generation7WordCount", ' ;
			
			$sql .=	
				'SUM(TextBody1.CharacterCount) AS "Generation1CharacterCount", ' .
				'SUM(TextBody2.CharacterCount) AS "Generation2CharacterCount", ' .
				'SUM(TextBody3.CharacterCount) AS "Generation3CharacterCount", ' .
				'SUM(TextBody4.CharacterCount) AS "Generation4CharacterCount", ' .
				'SUM(TextBody5.CharacterCount) AS "Generation5CharacterCount", ' .
				'SUM(TextBody6.CharacterCount) AS "Generation6CharacterCount", ' .
				'SUM(TextBody7.CharacterCount) AS "Generation7CharacterCount", ' ;
			*/
			$sql .=
				'COUNT(DISTINCT Assignment1.id) + ' .
				'COUNT(DISTINCT Assignment2.id) + ' .
				'COUNT(DISTINCT Assignment3.id) + ' .
				'COUNT(DISTINCT Assignment4.id) + ' .
				'COUNT(DISTINCT Assignment5.id) + ' .
				'COUNT(DISTINCT Assignment6.id) + ' .
				'COUNT(DISTINCT Assignment7.id) AS "TotalRecordCount", ' ;
			
			$sql .=
				'SUM(IFNULL(TextBody1.WordCount,0)) + ' .
				'SUM(IFNULL(TextBody2.WordCount,0)) + ' .
				'SUM(IFNULL(TextBody3.WordCount,0)) + ' .
				'SUM(IFNULL(TextBody4.WordCount,0)) + ' .
				'SUM(IFNULL(TextBody5.WordCount,0)) + ' .
				'SUM(IFNULL(TextBody6.WordCount,0)) + ' .
				'SUM(IFNULL(TextBody7.WordCount,0)) AS "TotalWordCount", ' ;
			
			$sql .=
				'SUM(IFNULL(TextBody1.CharacterCount,0)) + ' .
				'SUM(IFNULL(TextBody2.CharacterCount,0)) + ' .
				'SUM(IFNULL(TextBody3.CharacterCount,0)) + ' .
				'SUM(IFNULL(TextBody4.CharacterCount,0)) + ' .
				'SUM(IFNULL(TextBody5.CharacterCount,0)) + ' .
				'SUM(IFNULL(TextBody6.CharacterCount,0)) + ' .
				'SUM(IFNULL(TextBody7.CharacterCount,0)) AS "TotalCharacterCount" ' ;
			
			$sql .=
				'FROM Assignment AS Assignment1 ' . 
				'LEFT JOIN Assignment AS Assignment2 ON Assignment2.Parentid = Assignment1.Childid ' .
				'LEFT JOIN Assignment AS Assignment3 ON Assignment3.Parentid = Assignment2.Childid ' .
				'LEFT JOIN Assignment AS Assignment4 ON Assignment4.Parentid = Assignment3.Childid ' .
				'LEFT JOIN Assignment AS Assignment5 ON Assignment5.Parentid = Assignment4.Childid ' .
				'LEFT JOIN Assignment AS Assignment6 ON Assignment6.Parentid = Assignment5.Childid ' .
				'LEFT JOIN Assignment AS Assignment7 ON Assignment7.Parentid = Assignment6.Childid ' ;
			
			$sql .=
				'LEFT JOIN TextBody AS TextBody1 ON TextBody1.Entryid = Assignment1.Childid ' .
				'LEFT JOIN TextBody AS TextBody2 ON TextBody2.Entryid = Assignment2.Childid ' .
				'LEFT JOIN TextBody AS TextBody3 ON TextBody3.Entryid = Assignment3.Childid ' .
				'LEFT JOIN TextBody AS TextBody4 ON TextBody4.Entryid = Assignment4.Childid ' .
				'LEFT JOIN TextBody AS TextBody5 ON TextBody5.Entryid = Assignment5.Childid ' .
				'LEFT JOIN TextBody AS TextBody6 ON TextBody6.Entryid = Assignment6.Childid ' .
				'LEFT JOIN TextBody AS TextBody7 ON TextBody7.Entryid = Assignment7.Childid ' ;
				
			$sql .=
				'WHERE Assignment1.Parentid = ? ;';
#			print_r($sql);
#			print($entry['id']);
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>'i',
				recordvalues=>[$entry['id']],
			];
			
			$child_record_stats = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args)[0];
			
			return $child_record_stats;
		}
		
		public function GenerateAssociatedRecordStats($args)
		{
#			print("BT: Associated!");
			$entry = $args['entry'];
			
			$sql = 'SELECT ';
			
			$sql .=
				'COUNT(DISTINCT Association1.id) + ' .
				'COUNT(DISTINCT Assignment1.id) + ' .
				'COUNT(DISTINCT Assignment2.id) + ' .
				'COUNT(DISTINCT Assignment3.id) + ' .
				'COUNT(DISTINCT Assignment4.id) + ' .
				'COUNT(DISTINCT Assignment5.id) + ' .
				'COUNT(DISTINCT Assignment6.id) + ' .
				'COUNT(DISTINCT Assignment7.id) AS "TotalRecordCount", ' ;
			
			$sql .=
				'SUM(IFNULL(TextBody0.WordCount,0)) + ' .
				'SUM(IFNULL(TextBody1.WordCount,0)) + ' .
				'SUM(IFNULL(TextBody2.WordCount,0)) + ' .
				'SUM(IFNULL(TextBody3.WordCount,0)) + ' .
				'SUM(IFNULL(TextBody4.WordCount,0)) + ' .
				'SUM(IFNULL(TextBody5.WordCount,0)) + ' .
				'SUM(IFNULL(TextBody6.WordCount,0)) + ' .
				'SUM(IFNULL(TextBody7.WordCount,0)) AS "TotalWordCount", ' ;
			
			$sql .=
				'SUM(IFNULL(TextBody0.CharacterCount,0)) + ' .
				'SUM(IFNULL(TextBody1.CharacterCount,0)) + ' .
				'SUM(IFNULL(TextBody2.CharacterCount,0)) + ' .
				'SUM(IFNULL(TextBody3.CharacterCount,0)) + ' .
				'SUM(IFNULL(TextBody4.CharacterCount,0)) + ' .
				'SUM(IFNULL(TextBody5.CharacterCount,0)) + ' .
				'SUM(IFNULL(TextBody6.CharacterCount,0)) + ' .
				'SUM(IFNULL(TextBody7.CharacterCount,0)) AS "TotalCharacterCount" ' ;
			
			$sql .=
				'FROM Association AS Association1 ' .
				'LEFT JOIN Assignment AS Assignment1 ON Assignment1.Parentid = Association1.Entryid ' .
				'LEFT JOIN Assignment AS Assignment2 ON Assignment2.Parentid = Assignment1.Childid ' .
				'LEFT JOIN Assignment AS Assignment3 ON Assignment3.Parentid = Assignment2.Childid ' .
				'LEFT JOIN Assignment AS Assignment4 ON Assignment4.Parentid = Assignment3.Childid ' .
				'LEFT JOIN Assignment AS Assignment5 ON Assignment5.Parentid = Assignment4.Childid ' .
				'LEFT JOIN Assignment AS Assignment6 ON Assignment6.Parentid = Assignment5.Childid ' .
				'LEFT JOIN Assignment AS Assignment7 ON Assignment7.Parentid = Assignment6.Childid ' ;
			
			$sql .= 'LEFT JOIN TextBody AS TextBody0 ON TextBody0.Entryid = Association1.Entryid ' .
				'LEFT JOIN TextBody AS TextBody1 ON TextBody1.Entryid = Assignment1.Childid ' .
				'LEFT JOIN TextBody AS TextBody2 ON TextBody2.Entryid = Assignment2.Childid ' .
				'LEFT JOIN TextBody AS TextBody3 ON TextBody3.Entryid = Assignment3.Childid ' .
				'LEFT JOIN TextBody AS TextBody4 ON TextBody4.Entryid = Assignment4.Childid ' .
				'LEFT JOIN TextBody AS TextBody5 ON TextBody5.Entryid = Assignment5.Childid ' .
				'LEFT JOIN TextBody AS TextBody6 ON TextBody6.Entryid = Assignment6.Childid ' .
				'LEFT JOIN TextBody AS TextBody7 ON TextBody7.Entryid = Assignment7.Childid ' ;
				
			$sql .=
				'WHERE Association1.ChosenEntryid = ?;';
			
			$fill_arrays_from_db_args = [
				query=>$sql,
				sqlbindstring=>'i',
				recordvalues=>[$entry['id']],
			];
			
#			print_r($sql);
			
			$associated_record_stats = $this->dbaccessobject->FillArraysFromDB($fill_arrays_from_db_args)[0];
			
			return $associated_record_stats;
		}
	}

?>