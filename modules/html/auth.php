<?php

	class module_auth extends module_spacing {
		public function __construct($args) {
			$this->that = $args['that'];
			
			if($this->that->authentication_object->user_session['User.Username']) {
				$this->username = $this->that->authentication_object->user_session['User.Username'];
			} else {
				$this->username = $this->that->authentication_object->user_session['User.EmailAddress'];
			}
			
			$this->redirect_url = urlencode('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
			
			return TRUE;
		}
		
		public function Display() {
			$this->DisplayBlockStart();
			
			if($this->that->authentication_object->user_session) {
				$this->DisplayLoggedInStatus();
				$this->DisplayLogoutLink();
			} else {
				$this->DisplayLoginLink();
			}
			
			$this->DisplayBlockEnd();
			
			return TRUE;
		}
		
		public function DisplayBlockStart() {
			print('<div class="float-right border-2px background-color-gray13">');
			print('<p class="font-family-arial margin-5px">');
			
			return TRUE;
		}
		
		public function DisplayBlockEnd() {
			print('</p>');
			print('</div>');
			
			return TRUE;
		}
		
		public function DisplayLoggedInStatus() {
			print('logged in: ');
			
			print('<b>' . $this->username . '</b>');
			
			return TRUE;
		}
		
		public function DisplayLoginLink() {
			print('<a href="' . $this->that->domain_object->GetPrimaryDomain(['lowercase'=>1, 'www'=>1, 'secure'=>1]) . '/login.php?redirect=' . $this->redirect_url . '">Not Logged In: Login?</a>');
			
			return TRUE;
		}
		
		public function DisplayLogoutLink() {
			print(' <a href="../logout.php?redirect=' . $this->redirect_url . '">(logout)</a>');
			
			return TRUE;
		}
	}
?>