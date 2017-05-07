<?php

	class EscapeMySQL
	{
		public $cleanser;
		
		public function __construct($args)
		{
			$this->cleanser = $args[cleanser];
		}
		
			// Readable Results from 'Select *'
			// -------------------------------------------------
		
		public function GetRecordFullSelectStatement($args)
		{
			$record_type = $args[recordtype];
			$record_description = $args[recorddescription];
			
			$record_select_all_terms = array();
			
			foreach ($record_description as $field => $description)
			{
				switch($description[TypeBase])
				{
					case 'binary':
						$record_select_all_terms[] = 'HEX(' . $record_type . '.' . $field . ') as ' . $field;
						break;
						
					default:
						$record_select_all_terms[] = $record_type . '.' . $field . ' as ' . $field;
				}
			}
			
			$full_select = implode(', ', $record_select_all_terms);
			
			return $full_select;
		}
		
		public function GetRecordFullTableSelectStatement($args)
		{
			$record_type = $args[recordtype];
			$record_description = $args[recorddescription];
			
			$record_select_all_terms = array();
			
			foreach ($record_description as $field => $description)
			{
				switch($description[TypeBase])
				{
					case 'binary':
						$record_select_all_terms[] = 'HEX(' . $record_type . '.' . $field . ') as \'.' . $record_type . '.' . $field . '\'';
						break;
						
					default:
						$record_select_all_terms[] = $record_type . '.' . $field . ' as \'' . $record_type . '.' . $field . '\'';
				}
			}
			
			$full_select = implode(', ', $record_select_all_terms);
			
			return $full_select;
		}
		
			// Escape Query
			// -------------------------------------------------
		
		public function EscapeMySQLQuery($args)
		{
			$type_base = $args[typebase];
			$query = $args[query];
			$db_link = $args[dblink];
			
			$escape_args = array(
				query=>$query,
				dblink=>$db_link,
			);
			
			$escaped_query = '';
			
			switch($type_base)
			{
					// Escape Numbers
					// -------------------------------------------------
				
				case 'bigint':
				case 'int':
				case 'mediumint':
				case 'smallint':
				case 'tinyint':
				case 'year':
					$escaped_query = $this->EscapeMySQLQuery_EscapeInteger($escape_args);
					break;
					
			#	case 'decimal':
			#	case 'numeric':
			#		break;
				
			#	case 'double':
			#	case 'float':
			#		break;
					
					// Escape Time
					// -------------------------------------------------
					
				case 'datetime':
				case 'timestamp':
					$escaped_query = $this->EscapeMySQLQuery_EscapeDateTime($escape_args);
					break;
					
				case 'date':
					$escaped_query = $this->EscapeMySQLQuery_EscapeDate($escape_args);
					break;
					
				case 'time':
					$escaped_query = $this->EscapeMySQLQuery_EscapeTime($escape_args);
					break;
					
					// Escape Text
					// -------------------------------------------------
					
				case 'char':
				case 'varchar':
				case 'text':
					$escaped_query = $this->EscapeMySQLQuery_EscapeText($escape_args);
					break;
					
					// Escape Binary and Bytes
					// -------------------------------------------------
				
			#	case 'bit':
			#		break;
					
				case 'binary':
					$escaped_query = $this->EscapeMySQLQuery_EscapeBinary($escape_args);
					break;
					
			#	case 'blob':
			#		break;
					
					// Escape Enums and Sets
					// -------------------------------------------------
					
			#	case 'enum':
			#		break;
					
			#	case 'set':
			#		break;
					
					// Escape Spatial Types
					// -------------------------------------------------
					
			#	case 'geometry':
			#		break;
					
			#	case 'point':
			#		break;
					
			#	case 'linestring':
			#		break;
					
			#	case 'polygon':
			#		break;
					
			#	case 'multipoint':
			#		break;
					
			#	case 'multilinestring':
			#		break;
				
			#	case 'multipolygon':
			#		break;
					
			#	case 'geometrycollection':
			#		break;
					
					// Default: Return Blank
					// -------------------------------------------------
				
				default:
					$escaped_query = '';
			}
			
			return $escaped_query;
		}
		
			// Escape Query ~ Helping Functions
			// -------------------------------------------------
		
		public function EscapeMySQLQuery_EscapeInteger ($args)
		{
			$query = $args[query];
			
			$cleanse_integer_args = array(
				input=>$query,
			);
			$cleansed_query_results = $this->cleanser->CleanseInput_Integer($cleanse_integer_args);
			
			$cleansed_query = $cleansed_query_results[cleansedinput];
			$formatted_query = $cleansed_query;
			
			return $formatted_query;
		}
		
		public function EscapeMySQLQuery_EscapeText ($args)
		{
			$query = $args[query];
			$db_link = $args[dblink];
			
			$cleansed_query = mysqli_real_escape_string($db_link, $query);
			$formatted_query = '\'' . $cleansed_query . '\'';
			
			return $formatted_query;
		}
		
		public function EscapeMySQLQuery_EscapeDate ($args)
		{
			$query = $args[query];
			
			if(!(strcasecmp($query, 'CURDATE()')) || !(strcasecmp($query, 'CURDATE')))
			{
				$cleansed_query = $query;
			}
			else
			{
				$escaped_date_args = array(
					date=>$query,
				);
				
				$query_date_cleansed = $this->EscapeMySQLQuery_EscapeDateTime_EscapeDate($escaped_date_args);
				
				$cleansed_query = '\'' . $query_date_cleansed . '\'';
			}
			
			return $cleansed_query;
		}
		
		public function EscapeMySQLQuery_EscapeTime ($args)
		{
			$query = $args[query];
			
			if(!(strcasecmp($query, 'CURTIME()')) || !(strcasecmp($query, 'CURTIME')))
			{
				$cleansed_query = $query;
			}
			else
			{
				$escaped_time_args = array(
					time=>$query,
				);
				
				$query_time_cleansed = $this->EscapeMySQLQuery_EscapeDateTime_EscapeTime($escaped_time_args);
				
				$cleansed_query = '\'' . $query_time_cleansed . '\'';
			}
			
			return $cleansed_query;
		}
		
		public function EscapeMySQLQuery_EscapeDateTime ($args)
		{
			$query = $args[query];
			str_ireplace('NOW','NOW',$query,$query_dynamic_now_syntax_count);
			str_ireplace('DATE','DATE',$query,$query_dynamic_date_syntax_count);
			
			if($query_dynamic_now_syntax_count || $query_dynamic_date_syntax_count)
			{
				$cleansed_query = $query;
			}
			else
			{
				$query_date_and_time_explosion = explode(' ', $query);
				
				$query_date = $query_date_and_time_explosion[0];
				$query_time = $query_date_and_time_explosion[1];
				
				$escaped_date_args = array(
					date=>$query_date,
				);
				
				$query_date_cleansed = $this->EscapeMySQLQuery_EscapeDateTime_EscapeDate($escaped_date_args);
				
				$escaped_time_args = array(
					time=>$query_time,
				);
				
				$query_time_cleansed = $this->EscapeMySQLQuery_EscapeDateTime_EscapeTime($escaped_time_args);
				
				$cleansed_query = '\'' . $query_date_cleansed . ' ' . $query_time_cleansed . '\'';
			}
			
			return $cleansed_query;
		}
		
		public function EscapeMySQLQuery_EscapeDateTime_EscapeDate ($args)
		{
			$query_date = $args[date];
			$date_separator = '-';
			$query_date_explosion = explode($date_separator, $query_date);
			
			$query_date_year = $query_date_explosion[0];
			$query_date_month = $query_date_explosion[1];
			$query_date_day = $query_date_explosion[2];
			
			$cleansed_date = array();
			
			$cleanse_integer_args = array(
				input=>$query_date_year,
			);
			$cleansed_query_results = $this->cleanser->CleanseInput_Integer($cleanse_integer_args);
			
			$cleansed_date[] = sprintf("%04d", $cleansed_query_results[cleansedinput]);
			
			$cleanse_integer_args = array(
				input=>$query_date_month,
			);
			$cleansed_query_results = $this->cleanser->CleanseInput_Integer($cleanse_integer_args);
			
			$cleansed_date[] = sprintf("%02d", $cleansed_query_results[cleansedinput]);
			
			$cleanse_integer_args = array(
				input=>$query_date_day,
			);
			$cleansed_query_results = $this->cleanser->CleanseInput_Integer($cleanse_integer_args);
			
			$cleansed_date[] = sprintf("%02d", $cleansed_query_results[cleansedinput]);
			
			return implode($date_separator, $cleansed_date);
		}
		
		public function EscapeMySQLQuery_EscapeDateTime_EscapeTime ($args)
		{
			$query_time = $args[time];
			$time_separator = ':';
			$query_time_explosion = explode($time_separator, $query_time);
			
			$query_time_hour = $query_time_explosion[0];
			$query_time_minute = $query_time_explosion[1];
			$query_time_second = $query_time_explosion[2];
			
			$cleansed_time = array();
			
			$cleanse_integer_args = array(
				input=>$query_time_hour,
			);
			$cleansed_query_results = $this->cleanser->CleanseInput_Integer($cleanse_integer_args);
			
			$cleansed_time[] = sprintf("%02d", $cleansed_query_results[cleansedinput]);
			
			$cleanse_integer_args = array(
				input=>$query_time_minute,
			);
			$cleansed_query_results = $this->cleanser->CleanseInput_Integer($cleanse_integer_args);
			
			$cleansed_time[] = sprintf("%02d", $cleansed_query_results[cleansedinput]);
			
			$cleanse_integer_args = array(
				input=>$query_time_second,
			);
			$cleansed_query_results = $this->cleanser->CleanseInput_Integer($cleanse_integer_args);
			
			$cleansed_time[] = sprintf("%02d", $cleansed_query_results[cleansedinput]);
			return implode($time_separator, $cleansed_time);
		}
		
		public function EscapeMySQLQuery_EscapeBinary ($args)
		{
			$query = $args[query];
			$db_link = $args[dblink];
			
			$cleansed_query = mysqli_real_escape_string($db_link, $query);
			
			if(ctype_xdigit($cleansed_query))
			{
				$formatted_query  = 'UNHEX(\'' . $cleansed_query . '\')';
			}
			else
			{
				$formatted_query = '';
			}
			
			return $formatted_query;
		}
	}
		
?>