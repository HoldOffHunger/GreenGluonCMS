<?php

	class module_socialmediasharelinks extends module_spacing {
		public function __construct($args) {
			$this->globals = $args['globals'];
			$this->text_only = $args['textonly'];
			$this->language_object = $args['languageobject'];
			$this->divider = $args['divider'];
			$this->domain_object = $args['domainobject'];
			$this->social_media_object = $args['socialmedia'];
			$this->social_media_share_link_args = $args['socialmediasharelinkargs'];
			$this->share_text = $this->globals->functionality['sharing']['text']['Share'][$this->language_object->getLanguageCode()];
			$this->share_with_text = $this->globals->functionality['sharing']['text']['Share With'][$this->language_object->getLanguageCode()];
			
			if(!$this->social_media_object) {
				require('../classes/API/SocialMedia.php');
				
				$this->social_media_object = new SocialMedia();
			}
			
			return TRUE;
		}
		
		public function display() {
						// Start Div
						// -------------------------------------------------------
			
			$divider = $this->divider;
			
			if($this->share_text) {
				$divider_language_area_start_args = [
					'class'=>'width-90percent horizontal-center margin-top-14px border-1px',
				];
				
				$divider->displaystart($divider_language_area_start_args);
				
							// Start Div
							// -------------------------------------------------------
				
				$divider_language_area_start_args = [
					'class'=>'display-inline-block',
				];
				
				$divider->displaystart($divider_language_area_start_args);
				
						// Display "Share" Text
						// -------------------------------------------------------
				
				print('<table border="0" class="padding-0px margin-0px">');
				print('<tr valign="top">');
				print('<td valign="top">');
				print('<div class="font-family-tahoma font-size-150percent margin-10px border-2px background-color-gray10"><span class="margin-5px"><nobr>' . $this->share_text . ' :</nobr></span></div>');
				print('</td>');
				print('<td>');
			}
			
						// Display Social Media
						// -------------------------------------------------------
			
			$current_language_code = $this->language_object->getLanguageCode();
			
			$social_media_share_links = $this->social_media_object->GetSocialMediaSiteLinks_WithShareLinks($this->social_media_share_link_args);
			$social_media_nice_names = $this->social_media_object->GetSocialMediaSites_NiceNames();
			
			foreach($this->social_media_object->GetSocialMediaSites_WithShareLinks_OrderedByPopularity() as $social_media_code)
			{
							// Gather Data
							// -------------------------------------------------------
							
				$social_media_share_link = $social_media_share_links[$social_media_code];
				$social_media_nice_name = $social_media_nice_names[$social_media_code];
				
							// Start Div
							// -------------------------------------------------------
				
				$divider_language_area_start_args = [
					'class'=>'border-1px float-left margin-2px',
					'title'=>$this->share_with_text . ' ' . $social_media_nice_name,
				];
				
				$divider->displaystart($divider_language_area_start_args);
				
							// Display Language Option
							// -------------------------------------------------------
				
				if($this->text_only)
				{
					print('<p class="font-family-tahoma margin-2px">');
					print('<a href="' . $social_media_share_link . '" target="_blank">');
					print('Share on ' . $social_media_nice_name);
				}
				else
				{
					print('<p class="font-family-tahoma margin-0px">');
					print('<a href="' . $social_media_share_link . '" target="_blank">');
					print('<img src="' . $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '/image/social-media/' . $social_media_code . '.jpg" style="margin:0px;" width="64" height="64">');
				}
				
				print('</a>');
				
				print('</p>');
				#print($native_language_key . "|" . $native_language_name . "|" . $language_flag_filename . "<BR><BR>");
				
							// End Div
							// -------------------------------------------------------
				
				$divider->displayend($divider_end_args);
			}
			
						// Start Div
						// -------------------------------------------------------
			
			$divider_language_area_start_args = [
				'class'=>'clear-float',
			];
			
			$divider->displaystart($divider_language_area_start_args);
			
						// End Div
						// -------------------------------------------------------
			
			$divider->displayend($divider_end_args);
			
						// Conclude Table
						// -------------------------------------------------------
			
			if($this->share_text)
			{
				print('</td>');
				print('</tr>');
				print('</table>');
				
							// Start Div
							// -------------------------------------------------------
				
				$divider_language_area_start_args = [
					'class'=>'clear-float',
				];
				
				$divider->displaystart($divider_language_area_start_args);
				
							// End Div
							// -------------------------------------------------------
				
				$divider->displayend($divider_end_args);
				
							// End Div
							// -------------------------------------------------------
				
				$divider->displayend($divider_end_args);
				
							// End Div
							// -------------------------------------------------------
				
				$divider->displayend($divider_end_args);
			}
		}
	}

?>