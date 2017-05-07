<?php

	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/SimpleForms.php');
	require('../traits/scripts/SimpleLookupLists.php');

	class masterc extends basicscript
	{
		use DBFunctions;
		use SimpleForms;
		use SimpleLookupLists;
		
			// Security Data
		
		public function IsSecure()
		{
			return TRUE;
		}
		
		public function RequiresLogin()
		{
			return TRUE;
		}
		
		public function AdminOnly()
		{
			return TRUE;
		}
		
		public function Display()
		{
			$this->SetPrimaryHostRecords();
			
			return TRUE;
		}
		
			// Special Action
			
		public function Special()
		{
			$this->results = 'No special functionality for the wizard today.';
			
			return TRUE;
		}
		
		public function Special_UpdateFieldsAndMoveFilesForImageSubdirectoryMove
			$this->SetPrimaryHostRecords();
			
			$bad_image_directory_where = [
				'type'=>'Image',
				'definition'=>[
			//		'FileDirectory'=>'',
				],
			];
			
			$bad_image_directories = $this->db_access_object->GetRecords($bad_image_directory_where);
			$bad_image_directories_count = count($bad_image_directories);
			
			$base = new Base();
			$image_subdirectory_depth = 4;
			
			$results = '';
			
			for($i = 0; $i < $bad_image_directories_count; $i++)
			{
				$bad_image_directory = $bad_image_directories[$i];
				
				if(!$bad_image_directory['FileDirectory'])
				{
					$image_hash = hash_file('sha512', 'image/' . $bad_image_directory['FileName']);
					$base_conversion_args = [
						'startingbase'=>'Hexadecimal',
						'endingbase'=>'Base32',
						'value'=>$image_hash,
					];
					$full_image_hash = $base->ConvertBase($base_conversion_args);
					$file_directory = substr($full_image_hash, 0, $image_subdirectory_depth);
					$new_image_directory = $this->UpdateImagesDirectory(['subdir'=>$file_directory]);
					
					$bad_image_directory['FileDirectory'] = $file_directory;
					
					$object_update_args = [
						type=>'Image',
						update=>$bad_image_directory,
						where=>[
							id=>$bad_image_directory['id'],
						],
					];
					
					$object = $this->db_access_object->UpdateRecord($object_update_args);
					
					$results .= $bad_image_directory['FileName'] . ' / ' . $bad_image_directory['IconFileName'] . ' (' . $bad_image_directory['FileDirectory'] . ' : ' . $file_directory . ')<br>';
				}
				else
				{
					$old_file_location = 'image/' . $bad_image_directory['FileName'];
					if(is_file($old_file_location))
					{
						$subdirectories = str_split($bad_image_directory['FileDirectory']);
						$subdirectories_linkable = implode('/', $subdirectories) . '/';
						
						$new_file_location = 'image/' . $subdirectories_linkable . $bad_image_directory['FileName'];
						rename($old_file_location, $new_file_location);
						
						$old_icon_location = 'image/' . $bad_image_directory['IconFileName'];
						$new_icon_location = 'image/' . $subdirectories_linkable . $bad_image_directory['IconFileName'];
						rename($old_icon_location, $new_icon_location);
						
						$results .= $bad_image_directory['FileName'] . ' / ' . $bad_image_directory['IconFileName'] . ' (' . $new_file_location . ' : ' . $old_file_location . ') MOVED!<br>';
					}
				}
			}
			
			$this->results = $results;
			
			return TRUE;
		}
		
		public function UpdateImagesDirectory($args)
		{
			$subdir = $args['subdir'];
			
			$subdirectories = str_split($subdir);
			$subdirectories_count = count($subdirectories);
			
			$full_directory = 'image/';
			
			for($i = 0; $i < $subdirectories_count; $i++)
			{
				$single_subdirectory = $subdirectories[$i];
				
				$full_directory .= $single_subdirectory . '/';
				
				if(!is_dir($full_directory))
				{
					if(!mkdir($full_directory))
					{
						return FALSE;
					}
				}
			}
			
			return $full_directory;
		}
			
		
				// ** HTML FORMAT DATA ** //
		
			// Title
		
		public function GetHTMLFormatData_Title()
		{
			return 'Sup?  This the MASTER-c here!';
		}
	}

?>