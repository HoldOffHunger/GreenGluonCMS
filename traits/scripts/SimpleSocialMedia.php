<?php

	trait SimpleSocialMedia {
		public function SetSocialMediaBasics()
		{
			require('../classes/API/SocialMedia.php');
			
			$this->social_media = new SocialMedia();
		}
	}
	
?>