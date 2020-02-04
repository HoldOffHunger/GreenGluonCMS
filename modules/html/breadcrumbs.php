<?php

	class module_breadcrumbs extends module_spacing {
		public function __construct($args) {
			$this->that = $args['that'];
			$this->title = $args['title'];
			
			if(strlen($this->title) < 1) {
				$this->title = $this->that->entry['ListTitle'];
			}
			
			$this->record_list_count = count($this->that->record_list);
			
			return TRUE;
		}
		
		public function Display() {
			$this->DisplayBlockStart();
			$this->DisplayAllBreadcrumbRecords();
			$this->DisplayBlockEnd();
			
			return TRUE;
		}
		
		public function DisplayAllBreadcrumbRecords() {
			$this->DisplayFirstBreadcrumbRecord();
			$this->DisplayIntermediateBreadcrumbRecords();
			$this->DisplayLastEntryBreadcrumbRecord();
			
			return TRUE;
		}
		
		public function DisplayFirstBreadcrumbRecord() {
			if($this->that->master_record) {
				if($this->record_list_count || $this->title) {
					print('<a href="' . $this->that->domain_object->GetPrimaryDomain(['lowercase'=>1, 'www'=>1]) . '">');
				}
				
				print($this->that->master_record['Title']);
				
				if($this->record_list_count || $this->title) {
					print('</a>');
				}
			}
			
			return TRUE;
		}
		
		public function DisplayIntermediateBreadcrumbRecords() {
			$link_list = '';
			
		#	print_r($this->that->record_list);
			
			for($i = 0; $i < $this->record_list_count; $i++) {
				$record = $this->that->record_list[$i];
				if($record['id'] != $this->that->entry['id'] || $this->title != $this->that->entry['ListTitle']) {
					print(' &gt;&gt; ');
					
					$link_list .= '/' . $record['Code'];
					
					print('<a href="' . $this->that->domain_object->GetPrimaryDomain(['lowercase'=>1, 'www'=>1]) . $link_list . '/view.php');
					
					if($i == 0) {
						print('?action=index');
					}
					
					print('">');
					
					print($record['Title']);
					
					print('</a>');
				}
			}
		}
		
		public function DisplayLastEntryBreadcrumbRecord() {
			if(strlen($this->title)) {
				print(' &gt;&gt; ');
				
				print($this->title);
			}
			
			return TRUE;
		}
		
		public function DisplayBlockStart() {
			print('<div class="float-left border-2px background-color-gray13">');
			print('<p class="font-family-arial margin-5px">');
			
			return TRUE;
		}
		
		public function DisplayBlockEnd() {
			print('</p>');
			print('</div>');
			
			return TRUE;
		}
	}
?>