<?php

	trait SimpleErrors {
		public function FormatErrors()
		{
			$this->FormatErrors_Base([errortype=>'admin_errors']);
			$this->FormatErrorsNoKeys_Base([errortype=>'errors']);
		}
		
		public function FormatErrors_ErrorNumberAndMessage($args)
		{
			$errors = $args['errors'];
			
			$total_errors = [];
			
			foreach($errors as $error)
			{
				$error_number = $error[errornumber];
				$error_message = $error[errormessage];
				
				$error_display = '#' . $error_number . ' : ' . $error_message;
				
				$total_errors[] = $error_display;
			}
			
			$error_display = implode(' ; ', $total_errors);
			
			return $error_display;
		}
		
		public function FormatErrorsNoKeys_Base($args)
		{
			$error_type = $args[errortype];
			$error_display_type = $error_type . '_display';
			
			$errors_display = [];
			
			$errors = $this->$error_type;
			
			foreach($errors as $error)
			{
				$error_temporary = [];
				
				foreach ($error as $error_value)
				{
					$error_temporary[] = [$this->NonBreakingSpace() . $this->Bullet() . $this->NonBreakingSpace() . $error_value];
				}
				
				$errors_display[] = $error_temporary;
			}
			
			return $this->$error_display_type = $errors_display;
		}
		
		public function FormatErrors_Base($args)
		{
			$error_type = $args[errortype];
			$error_display_type = $error_type . '_display';
			
			$errors_display = [];
			
			$errors = $this->$error_type;
			
			foreach($errors as $error)
			{
				$error_temporary = [];
				
				foreach ($error as $error_key => $error_value)
				{
					if(is_array($error_value))
					{
						if(is_array($error_value[0]))
						{
							$error_display = '';
							
							foreach ($error_value as $single_error_piece)
							{
								foreach($single_error_piece as $piece_key => $piece_value)
								{
									if(is_array($piece_value))
									{
										$error_display .= $piece_key . ' : ' . $this->PreFormattedStart() . $this->CleanseForDisplay(print_r($piece_value, 1)) . $this->PreFormattedEnd();
									}
									else
									{
										$error_display .= $piece_key . ' : ' . $this->CleanseForDisplay($piece_value) . "\n";
									}
								}
								$error_display .= "\n";
							}
						}
						else
						{
							$error_display = implode(', ', $error_value);
						}
					}
					else
					{
						$error_display = $error_value;
					}
					
					$text_to_format_args = [
						texttoformat=>$error_display,
					];
					
					$error_display = $this->FormatSavedRecordFromQuery_Base_SingleLine($text_to_format_args);
					
					$error_temporary[] = [$error_key, $error_display];
				}
				
				$errors_display[] = $error_temporary;
			}
			
			return $this->$error_display_type = $errors_display;
		}
	}

?>