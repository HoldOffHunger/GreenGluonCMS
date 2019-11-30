<?php

	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/SimpleErrors.php');
	require('../traits/scripts/SimpleForms.php');
	require('../traits/scripts/SimpleLookupLists.php');
	require('../traits/scripts/SimpleORM.php');
	require('../traits/scripts/SimpleSocialMedia.php');

	class play extends basicscript
	{
						// Traits
						// ---------------------------------------------
		
		use DBFunctions;
		use SimpleErrors;
		use SimpleForms;
		use SimpleLookupLists;
		use SimpleORM;
		use SimpleSocialMedia;
		
						// Security Data
						// ---------------------------------------------
		
		public function IsSecure()
		{
			return FALSE;
		}
		
		public function RequiresLogin()
		{
			return FALSE;
		}
		
						// Word Search Game
						// ---------------------------------------------
		
		public function WordSearch()
		{
			return $this->GameBasics();
		}
		
						// Crossword Puzzle Game
						// ---------------------------------------------
		
		public function CrosswordPuzzle()
		{
			return $this->GameBasics();
		}
		
						// Word Guess Game
						// ---------------------------------------------
		
		public function WordGuessGame()
		{
			return $this->GameBasics();
		}
		
						// Typing Game
						// ---------------------------------------------
		
		public function TypingGame()
		{
			return $this->GameBasics();
		}
		
						// All Game Basics
						// ---------------------------------------------
		
		public function GameBasics()
		{
			$this->SetORMBasics();
			$this->SetRecordTree();
			$this->SetPrimaryHostRecords();
			
			if(!$this->ValidateOrm())
			{
				return FALSE;	# 404
			}
			$this->SetChildRecords([]);
			$this->SetChildRecordCount();
			$this->SetSiblings([]);
			
			$this->FormatErrors();
			
			return TRUE;
		}
	}
	
?>