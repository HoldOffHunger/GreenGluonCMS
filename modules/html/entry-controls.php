<?php

	class module_entrycontrols extends module_spacing {
		public function Display() {
			print('<div class="horizontal-center width-95percent margin-top-5px border-2px">');
					// "Controls" Header
				
				// -------------------------------------------------------------
				
			print('<center>');
			print('<div class="horizontal-center width-90percent">');
			print('<div class="border-2px background-color-gray15 margin-5px float-left">');
			print('<h2 class="horizontal-left margin-5px font-family-arial">');
			print('Controls for Entry ' . $this->entry['id']);
			print('</h2>');
			print('</div>');
			print('</div>');
			print('</center>');
			
					// Finish Admin Controls
				
				// -------------------------------------------------------------
				
			print('<div class="clear-float">');
			print('</div>');
			
					// "Add" / "Edit" Option
				
				// -------------------------------------------------------------
			
			print('<div class="horizontal-center width-95percent margin-top-5px">');
			
			print('<div class="float-left margin-5px border-2px background-color-gray13">');
			print('<p class="font-family-arial margin-5px">');
			print('<a href="modify.php?action=Edit">EDIT</a>');
			print('</p>');
			print('</div>');
			
			print('<div class="float-left margin-5px border-2px background-color-gray13">');
			print('<p class="font-family-arial margin-5px">');
			print('<a href="modify.php?action=Add">ADD</a>');
			print('</p>');
			print('</div>');
			
			print('<div class="float-left margin-5px border-2px background-color-gray13">');
			print('<p class="font-family-arial margin-5px">');
			print('<a href="transfer.php">TRANSFER</a>');
			print('</p>');
			print('</div>');
			
			print('</div>');
		
					// Section
				
				// -------------------------------------------------------------
			
			print('<div class="clear-float">');
			print('</div>');
			
					// "View" / "Index" Option
				
				// -------------------------------------------------------------
			
			print('<div class="horizontal-center width-95percent margin-top-5px">');
			
			print('<div class="float-left margin-5px border-2px background-color-gray13">');
			print('<p class="font-family-arial margin-5px">');
			print('<a href="view.php">VIEW</a>');
			print('</p>');
			print('</div>');
			
			print('<div class="float-left margin-5px border-2px background-color-gray13">');
			print('<p class="font-family-arial margin-5px">');
			print('<a href="view.php?action=index">INDEX</a>');
			print('</p>');
			print('</div>');
			
			print('</div>');
			
					// Finish Admin Controls
				
				// -------------------------------------------------------------
					
			print('<div class="clear-float">');
			print('</div>');
			
			print('</div>');
		}
	}

?>