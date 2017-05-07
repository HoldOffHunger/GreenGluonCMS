<?php

	class UserTracking
	{
		public $domain;
		public $time;
		public $language;
		public $script_format;
		
		public function __construct($args)
		{
			$this->domain = $args[domain];
			$this->time = $args[time];
			$this->language = $args[language];
			$this->script_format_lower = $args[scriptformatlower];
		}
		
		public function RecordUserTracking()
		{
			if($this->script_format_lower != 'html')
			{
				return FALSE;
			}
			
			$log_string = $this->RecordUserTracking_getLogString();
			$filename = $this->RecordUserTracking_getLogFilename();
			
			return $this->RecordUserTracking_saveLog([
				logstring=>$log_string,
				filename=>$filename,
			]);
		}
		
		public function RecordUserTracking_getLogString()
		{
			$information_pieces = [
				date('o-M-d H:i:s', $this->time->time),
				'[' . $this->time->time . ']',
				$_SERVER['REMOTE_ADDR'],
				$_SERVER['REQUEST_URI'],
				'(' . $this->language->GetLanguageCode() . ':' . $this->language->GetLanguage() . ')',
			];
			
			return implode(' ', $information_pieces) . "\n";
		}
		
		public function RecordUserTracking_getLogFilename()
		{
			return '../stats/' . $this->domain->primary_domain_lowercased . '/' . date('o-M', $this->time->time) . '.txt';
		}
		
		public function RecordUserTracking_saveLog ($args)
		{
			$log_string = $args[logstring];
			$filename = $args[filename];
			
			$filename_handle = fopen($filename, 'a+');
					
			while (!flock($filename_handle, LOCK_EX ))
			{
				usleep(round(rand(0, 100)*1000)); //0-100 milliseconds
			}
			
			chmod($filename, 0755);
			fwrite($filename_handle, $log_string);
			
			flock($filename_handle, LOCK_UN);
			fclose($filename_handle);
		}
	}

?>