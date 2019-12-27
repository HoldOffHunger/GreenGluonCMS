<?php

	trait CodeOfConductTrait {
		public function getCodeOfConduct() {
			$code_of_conduct_paragraphs = $this->getCodeOfConductParagraphs();
			
			$code_of_conduct = implode("\n\n", $code_of_conduct_paragraphs);
			
			return $code_of_conduct;
		}
		
		public function getCodeOfConductImages() {
			$images = [
							# image 1
				'mission'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/premium-icon/megaphone_13809',
					'original-source'=>'https://www.freepik.com/free-icon/promoting_754744.htm',
					'filename'=>'mission.jpg',
				],
							# image 2
				'table-of-contents'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/list_130291',
					'original-source'=>'https://www.freepik.com/free-icon/list_942266.htm',
					'filename'=>'table-of-contents.jpg',
				],
							# image 3
				'what-data'=>[
					'creator'=>'Gregor Cresnar from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/id-card_126352',
					'original-source'=>'https://www.freepik.com/free-icon/id-card_934346.htm',
					'filename'=>'what-data.jpg',
				],
							# image 4
				'when-collected'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/business-presentation_66520',
					'original-source'=>'https://www.freepik.com/free-icon/business-presentation_772506.htm',
					'filename'=>'when-collected.jpg',
				],
							# image 5
				'how-long-stored'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/shelf-full_32152',
					'original-source'=>'https://www.freepik.com/free-icon/shelf-full_740180.htm',
					'filename'=>'how-long-stored.jpg',
				],
							# image 6
				'who-processes'=>[
					'creator'=>'Gregor Cresnar from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/networking_126309',
					'original-source'=>'https://www.freepik.com/free-icon/networking_934303.htm',
					'filename'=>'who-processes.jpg',
				],
							# image 7
				'data-portability'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/wallet_31368',
					'original-source'=>'https://www.freepik.com/free-icon/wallet_739397.htm',
					'filename'=>'data-portability.jpg',
				],
							# image 8
				'data-editability'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/businessman-paper-of-the-application-for-a-job_30382',
					'original-source'=>'https://www.freepik.com/free-icon/businessman-paper-of-the-application-for-a-job_738304.htm',
					'filename'=>'data-editability.jpg',
				],
							# image 9
				'erase-data'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/safe-box_31074',
					'original-source'=>'https://www.freepik.com/free-icon/safe-box_739062.htm',
					'filename'=>'erase-data.jpg',
				],
							# image 10
				'privacy-violation'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/balance_122112',
					'original-source'=>'https://www.freepik.com/free-icon/balance_924648.htm',
					'filename'=>'privacy-violation.jpg',
				],
							# image 11
				'contact-events'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/open-mail_18635',
					'original-source'=>'https://www.freepik.com/free-icon/open-envelope-with-letter_750512.htm',
					'filename'=>'contact-events.jpg',
				],
							# image 12
				'avoided-site-activity'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/insurance_122057',
					'original-source'=>'https://www.freepik.com/free-icon/insurance_924593.htm',
					'filename'=>'avoided-site-activity.jpg',
				],
							# image 13
				'privacy-policy-license'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/open-hanging-signal_44957',
					'original-source'=>'https://www.freepik.com/free-icon/open-hanging-signal_724429.htm',
					'filename'=>'privacy-policy-license.jpg',
				],
			];
			
			return $images;
		}
		
						// Privacy Policy Paragraphs
						// ---------------------------------------------
		
		public function getCodeOfConductParagraphs() {
			$header_index = 1;
			
			$images = $this->getCodeOfConductImages();
			
			$code_of_conduct_paragraphs = [];
			
			$code_of_conduct_paragraphs =
				array_merge($code_of_conduct_paragraphs,
					$this->getPrefaceSection([
						'image'=>$images['preface'],
					])
				);
			
			$code_of_conduct_paragraphs =
				array_merge($code_of_conduct_paragraphs,
					$this->getIntroductionSection([
						'image'=>$images['introduction'],
						'headerindex'=>$header_index++,
					])
				);
			
			$code_of_conduct_paragraphs =
				array_merge($code_of_conduct_paragraphs,
					$this->getTableOfContentsSection([
						'image'=>$images['table-of-contents'],
						'headerindex'=>$header_index++,
					])
				);
			
			$code_of_conduct_paragraphs =
				array_merge($code_of_conduct_paragraphs,
					$this->getWhatIsEncouragedSection([
						'image'=>$images['what-is-encouraged'],
						'headerindex'=>$header_index++,
					])
				);
			
			$code_of_conduct_paragraphs =
				array_merge($code_of_conduct_paragraphs,
					$this->getWhatIsUnacceptableSection([
						'image'=>$images['what-is-unacceptable'],
						'headerindex'=>$header_index++,
					])
				);
			
			$code_of_conduct_paragraphs =
				array_merge($code_of_conduct_paragraphs,
					$this->getWhatIsUnaccountableSection([
						'image'=>$images['what-is-unaccountable'],
						'headerindex'=>$header_index++,
					])
				);
			
			$code_of_conduct_paragraphs =
				array_merge($code_of_conduct_paragraphs,
					$this->getHowWeEnforceCommunityStandardsSection([
						'image'=>$images['how-we-enforce-community-standards'],
						'headerindex'=>$header_index++,
					])
				);
			
			$code_of_conduct_paragraphs =
				array_merge($code_of_conduct_paragraphs,
					$this->getLicensingSection([
						'image'=>$images['licensing'],
						'headerindex'=>$header_index++,
					])
				);
			
			$code_of_conduct_paragraphs =
				array_merge($code_of_conduct_paragraphs,
					$this->getInspirationSection([
						'image'=>$images['inspiration'],
						'headerindex'=>$header_index++,
					])
				);
			
			return $code_of_conduct_paragraphs;
		}
		
						// Individual Privacy Policy Sections
						// ---------------------------------------------
		
		public function getPrefaceSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$preface_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'Preface' .
						'</h3>';
					
					$preface_section[] =
						'<p>Version 1.0, May 22, 2018, by HoldOffHunger</p>';
					break;
					
				case 'de':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>Version 1.0, May 22, 2018, by HoldOffHunger</p>';
					break;
					
				case 'es':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>Version 1.0, May 22, 2018, by HoldOffHunger</p>';
					break;
					
				case 'fr':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>Version 1.0, May 22, 2018, by HoldOffHunger</p>';
					break;
					
				case 'ja':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>Version 1.0, May 22, 2018, by HoldOffHunger</p>';
					break;
					
				case 'it':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>Version 1.0, May 22, 2018, by HoldOffHunger</p>';
					break;
					
				case 'nl':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>Version 1.0, May 22, 2018, by HoldOffHunger</p>';
					break;
					
				case 'pl':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>Version 1.0, May 22, 2018, by HoldOffHunger</p>';
					break;
					
				case 'pt':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>Version 1.0, May 22, 2018, by HoldOffHunger</p>';
					break;
					
				case 'ru':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>Version 1.0, May 22, 2018, by HoldOffHunger</p>';
					break;
					
				case 'tr':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>Version 1.0, May 22, 2018, by HoldOffHunger</p>';
					break;
					
				case 'zh':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>Version 1.0, May 22, 2018, by HoldOffHunger</p>';
					break;
			}
			
			return $preface_section;
		}
		
		public function getIntroductionSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$introduction_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introduction</h3>';
					
					$introduction_section[] =
						'<p>Everyone expects a standard of behavior. And everyone will react to the behavior of others.</p>' .
						'<p>This is always true -- whether or not people are working together under a common agreement.</p>' .
						'<p>But by having an agreement, at least discussion should be easier.</p>';
					break;
					
				case 'de':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introduction</h3>';
					
					$introduction_section[] =
						'<p>Everyone expects a standard of behavior. And everyone will react to the behavior of others.</p>' .
						'<p>This is always true -- whether or not people are working together under a common agreement.</p>' .
						'<p>But by having an agreement, at least discussion should be easier.</p>';
					break;
					
				case 'es':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introduction</h3>';
					
					$introduction_section[] =
						'<p>Everyone expects a standard of behavior. And everyone will react to the behavior of others.</p>' .
						'<p>This is always true -- whether or not people are working together under a common agreement.</p>' .
						'<p>But by having an agreement, at least discussion should be easier.</p>';
					break;
					
				case 'fr':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introduction</h3>';
					
					$introduction_section[] =
						'<p>Everyone expects a standard of behavior. And everyone will react to the behavior of others.</p>' .
						'<p>This is always true -- whether or not people are working together under a common agreement.</p>' .
						'<p>But by having an agreement, at least discussion should be easier.</p>';
					break;
					
				case 'ja':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introduction</h3>';
					
					$introduction_section[] =
						'<p>Everyone expects a standard of behavior. And everyone will react to the behavior of others.</p>' .
						'<p>This is always true -- whether or not people are working together under a common agreement.</p>' .
						'<p>But by having an agreement, at least discussion should be easier.</p>';
					break;
					
				case 'it':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introduction</h3>';
					
					$introduction_section[] =
						'<p>Everyone expects a standard of behavior. And everyone will react to the behavior of others.</p>' .
						'<p>This is always true -- whether or not people are working together under a common agreement.</p>' .
						'<p>But by having an agreement, at least discussion should be easier.</p>';
					break;
					
				case 'nl':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introduction</h3>';
					
					$introduction_section[] =
						'<p>Everyone expects a standard of behavior. And everyone will react to the behavior of others.</p>' .
						'<p>This is always true -- whether or not people are working together under a common agreement.</p>' .
						'<p>But by having an agreement, at least discussion should be easier.</p>';
					break;
					
				case 'pl':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introduction</h3>';
					
					$introduction_section[] =
						'<p>Everyone expects a standard of behavior. And everyone will react to the behavior of others.</p>' .
						'<p>This is always true -- whether or not people are working together under a common agreement.</p>' .
						'<p>But by having an agreement, at least discussion should be easier.</p>';
					break;
					
				case 'pt':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introduction</h3>';
					
					$introduction_section[] =
						'<p>Everyone expects a standard of behavior. And everyone will react to the behavior of others.</p>' .
						'<p>This is always true -- whether or not people are working together under a common agreement.</p>' .
						'<p>But by having an agreement, at least discussion should be easier.</p>';
					break;
					
				case 'ru':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introduction</h3>';
					
					$introduction_section[] =
						'<p>Everyone expects a standard of behavior. And everyone will react to the behavior of others.</p>' .
						'<p>This is always true -- whether or not people are working together under a common agreement.</p>' .
						'<p>But by having an agreement, at least discussion should be easier.</p>';
					break;
					
				case 'tr':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introduction</h3>';
					
					$introduction_section[] =
						'<p>Everyone expects a standard of behavior. And everyone will react to the behavior of others.</p>' .
						'<p>This is always true -- whether or not people are working together under a common agreement.</p>' .
						'<p>But by having an agreement, at least discussion should be easier.</p>';
					break;
					
				case 'zh':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introduction</h3>';
					
					$introduction_section[] =
						'<p>Everyone expects a standard of behavior. And everyone will react to the behavior of others.</p>' .
						'<p>This is always true -- whether or not people are working together under a common agreement.</p>' .
						'<p>But by having an agreement, at least discussion should be easier.</p>';
					break;
			}
			
			return $introduction_section;
		}
		
		public function getTableOfContentsSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$toc_paragraphs = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Table of Contents</h3>',
						
						'<p>The Anarchist Code of Conduct is organized into the following sections :</p>' ,
						
						'<ul>',
							'<li><a href="#preface">' .
								$this->getImageIconMarkup(['image'=>$images['preface']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Preface</a></li>',
							'<li><a href="#introduction">' .
								$this->getImageIconMarkup(['image'=>$images['introduction']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Introduction</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Table of Contents</a></li>',
							'<li><a href="#what-is-encouraged">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-encouraged']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : What Is Encouraged</a></li>',
							'<li><a href="#what-is-unacceptable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unacceptable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : What Is Unacceptable</a></li>',
							'<li><a href="#what-is-unaccountable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unaccountable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : What Is Unaccountable</a></li>',
							'<li><a href="#how-we-enforce-community-standards">' .
								$this->getImageIconMarkup(['image'=>$images['how-we-enforce-community-standards']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : How We Enforce Community Standards</a></li>',
							'<li><a href="#licensing">' .
								$this->getImageIconMarkup(['image'=>$images['licensing']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Licensing of this Document</a></li>',
							'<li><a href="#inspiration">' .
								$this->getImageIconMarkup(['image'=>$images['inspiration']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Inspiration for this Document</a></li>',
						'</ul>',
					];
					break;
					
				case 'de':
					break;
					
				case 'es':
					break;
					
				case 'fr':
					break;
					
				case 'ja':
					break;
					
				case 'it':
					break;
					
				case 'nl':
					break;
					
				case 'pl':
					break;
					
				case 'pt':
					break;
					
				case 'ru':
					break;
					
				case 'tr':
					break;
					
				case 'zh':
					break;
			}
			
			return $toc_paragraphs;
		}
		
		public function getWhatIsEncouragedSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$what_is_encouraged_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$what_is_encouraged_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introduction</h3>';
					
					$what_is_encouraged_section[] =
						'<h3>Cooperative participation, especially when it is :</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>Inclusive,</li>' .
							'<li>Cooperative,</li>' .
							'<li>Community-oriented,</li>' .
							'<li>Active,</li>' .
							'<li>Considerate,</li>' .
							'<li>Respectful,</li>' .
							'<li>Collaborative,</li>' .
							'<li>Authentic,</li>' .
							'<li>And when all of these approaches are attempted before conflict.</li>' .
						'</ul>';
					
					$what_is_encouraged_section[] =
						'<h3>Voluntary interaction, especially when it includes :</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>Inclusive language and behavior,</li>' .
							'<li>Welcoming attitude and approach,</li>' .
							'<li>Rational debate and discussion,</li>' .
							'<li>Genuine exchanges of ideas,</li>' .
							'<li>Spreading useful or enlightening information,</li>' .
							'<li>Community-driven and built projects,</li>' .
							'<li>Political, social, or economic progress,</li>' .
							'<li>Identifying with a community-oriented cause,</li>' .
							'<li>Solidarity and a sense of interest in the community.</li>' .
						'</ul>';
					break;
					
				case 'de':
					break;
					
				case 'es':
					break;
					
				case 'fr':
					break;
					
				case 'ja':
					break;
					
				case 'it':
					break;
					
				case 'nl':
					break;
					
				case 'pl':
					break;
					
				case 'pt':
					break;
					
				case 'ru':
					break;
					
				case 'tr':
					break;
					
				case 'zh':
					break;
			}
			
			return $what_is_encouraged_section;
		}
		
		public function getWhatIsUnacceptableSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$what_is_unacceptable_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$what_is_unacceptable_section[] =
						'<h3><a name="what-is-unacceptable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : What is Unacceptable</h3>';
					
					$what_is_unacceptable_section[] =
						'<h3>Degrading, disrespecting, or insulting another person or group of people, because of their :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Gender or Gender Identity,</li>' .
							'<li>Ethnicity,</li>' .
							'<li>Immigrant status,</li>' .
							'<li>Religion,</li>' .
							'<li>Sexuality,</li>' .
							'<li>Language,</li>' .
							'<li>Physical appearance or body size,</li>' .
							'<li>Political opinion,</li>' .
							'<li>Substance or medicinal use,</li>' .
							'<li>Disability,</li>' .
							'<li>Age,</li>' .
							'<li>Acceptance of any unfavorable or disfavorable group, whether this group is political, economic, social, or cultural.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Harassment :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Abuse of any type,</li>' .
							'<li>Bullying, stalking, intimidating, following,</li>' .
							'<li>Harassing photographing or filming,</li>' .
							'<li>Inappropriate physical contact,</li>' .
							'<li>Inappropriate sexualized imagery,</li>' .
							'<li>Unwelcome sexual attention,</li>' .
							'<li>Any persistent and undesired action involving the personal space of another.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Unwanted intrusion in public or private atmospheres :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Spam and commercialism,</li>' .
							'<li>Interruptions based on unrelated or distracting material.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Political, social, or economic domination, such as threatening to or non-consensually revealing another's personal information to the following :</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>An employer or potential employer.</li>' .
							'<li>A government, an agency empowered by the government, or an agent or police officer empowered by the government.</li>' .
							'<li>Any censuring organization, such as religious, social, cultural, economic, or political institutions, such as family, friends, churches, newspapers, publishers, radio stations, etc..</li>' .
							'<li>Any third party without their direct consent.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Authoritarianism, or the spread of behavior that is designed to overturn the standards described so far, such as attempts to advance, support, or aid any of the following :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'Sexism,' .
							'Racism,' .
							'White Supremacy (or any ethnic-supremacy),' .
							'Homophobia (or any sexuality-phobia),' .
							'Fascism,' .
							'Genocide,' .
							'Drug-phobia,' .
							'Ethnic-, gender-, sexuality-, ableist-, etc., based slurs,' .
							'Oath-taking or pledge-taking.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Advocating or encouraging any of the above.</h3>';
					break;
					
				case 'de':
					break;
					
				case 'es':
					break;
					
				case 'fr':
					break;
					
				case 'ja':
					break;
					
				case 'it':
					break;
					
				case 'nl':
					break;
					
				case 'pl':
					break;
					
				case 'pt':
					break;
					
				case 'ru':
					break;
					
				case 'tr':
					break;
					
				case 'zh':
					break;
			}
			
			return $what_is_unacceptable_section;
		}
		
		public function getWhatIsUnaccountableSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$what_is_unaccountable_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : What is Unaccountable</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>We are one community organization. If your complaint is severe enough, you may need to elevate it beyond what this agreement provides for. You are authorized and encouraged to this if you do not think your complaint can be met with satisfaction.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>You may not cite this document as reason, when :</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Passing or repealing government laws,</li>' .
							'<li>Hiring or discharging workers,</li>' .
							'<li>Refusing to cooperate with the investigation of a legitimate, Humans Rights, Non-Government Organization.</li>' .
						'</ul>';
					break;
					
				case 'de':
					break;
					
				case 'es':
					break;
					
				case 'fr':
					break;
					
				case 'ja':
					break;
					
				case 'it':
					break;
					
				case 'nl':
					break;
					
				case 'pl':
					break;
					
				case 'pt':
					break;
					
				case 'ru':
					break;
					
				case 'tr':
					break;
					
				case 'zh':
					break;
			}
			
			return $what_is_unaccountable_section;
		}
		
		public function getHowWeEnforceCommunityStandardsSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$how_we_enforce_community_standards_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : How we Enforce Community Standards</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>If you witness or experience any violation of this Code of Conduct, you are urged to immediately contact official organizers within the community.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>In response to violations of unacceptable behavior, we may respond to the offender as follows :</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Warning,</li>' .
							'<li>Temporary ban,</li>' .
							'<li>Permanent expulsion.</li>' .
						'</ul>';
					break;
					
				case 'de':
					break;
					
				case 'es':
					break;
					
				case 'fr':
					break;
					
				case 'ja':
					break;
					
				case 'it':
					break;
					
				case 'nl':
					break;
					
				case 'pl':
					break;
					
				case 'pt':
					break;
					
				case 'ru':
					break;
					
				case 'tr':
					break;
					
				case 'zh':
					break;
			}
			
			return $how_we_enforce_community_standards_section;
		}
		
		public function getLicensingSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$introduction_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$introduction_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Licensing of this Document</h3>';
					
					$introduction_section[] =
						'<p>This document is released under the Creative Commons Attribution 3.0 License.</p>';
					break;
					
				case 'de':
					break;
					
				case 'es':
					break;
					
				case 'fr':
					break;
					
				case 'ja':
					break;
					
				case 'it':
					break;
					
				case 'nl':
					break;
					
				case 'pl':
					break;
					
				case 'pt':
					break;
					
				case 'ru':
					break;
					
				case 'tr':
					break;
					
				case 'zh':
					break;
			}
			
			return $introduction_section;
		}
		
		public function getInspirationSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$inspiration_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$inspiration_section[] =
						'<h3><a name="inspiration"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inspiration for this Document</h3>';
					
					$inspiration_section[] =
						'<p>This document was inspired by a wide number of other materials, and I owe them all my gratitude! Thank you :</p>';
					
					$inspiration_section[] =
						'<ul>' .
							'<li>Reddit Anarchism Rules</li>' .
							'<li>Anti-Authoritarian Academic Code of Conduct</li>' .
							'<li>Geek Feminism Conference Anti-Harassment Policy</li>' .
							'<li>The Constitution of the Rojava Cantons : Modern, Anarchist Constitution (2014)</li>' .
							"<li>Workers' Solidarity Movement : WSM Code of Conduct</li>" .
							'<li>Industrial Workers of the World : Code of Ethics</li>' .
							'<li>The French Declaration of Rights of Man : Classical, Socialist Declaration (1789)</li>' .
							'<li>The Citizen Code of Conduct</li>' .
							'<li>The Contributor Covenant</li>' .
							'<li>The Tao Teh Ching, by Lao Tzu (400-600 BCE)</li>' .
						'</ul>';
					break;
					
				case 'de':
					break;
					
				case 'es':
					break;
					
				case 'fr':
					break;
					
				case 'ja':
					break;
					
				case 'it':
					break;
					
				case 'nl':
					break;
					
				case 'pl':
					break;
					
				case 'pt':
					break;
					
				case 'ru':
					break;
					
				case 'tr':
					break;
					
				case 'zh':
					break;
			}
			
			return $inspiration_section;
		}
		
						// Helper Functions
						// ---------------------------------------------
		
		public function getSectionText($args) {
			$header_index = $args['headerindex'];
			
			$section_text = '';
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$section_text = 'Section ' . $header_index;
					break;
					
				case 'de':
					$section_text = 'Abschnitt ' . $header_index;
					break;
					
				case 'es':
					$section_text = 'Sección ' . $header_index;
					break;
				
				case 'fr':
					$section_text = 'Section ' . $header_index;
					break;
					
				case 'ja':
					$section_text = '第' . $header_index . '節';
					break;
					
				case 'it':
					$section_text = 'Sezione ' . $header_index;
					break;
					
				case 'nl':
					$section_text = 'Sectie ' . $header_index;
					break;
					
				case 'pl':
					$section_text = 'Sekcja ' . $header_index;
					break;
				
				case 'pt':
					$section_text = 'Seção ' . $header_index;
					break;
					
				case 'ru':
					$section_text = 'Секция ' . $header_index;
					break;
				
				case 'tr':
					$section_text = 'Bölüm ' . $header_index;
					break;
					
				case 'zh':
					$section_text = '第' . $header_index . '节';
					break;
			}
			
			if(	($this->script_format_lower != 'pdf')) {
				$section_text = ' ' . $section_text;
			}
			
			return $section_text;
		}
		
		public function getImageBaseDirectory() {
			$base_directory = '/image/privacy/';
			
			if(	($this->script_format_lower == 'pdf') ||
				($this->script_format_lower == 'rtf')) {
				$base_directory = 'https://www.' . $this->domain_object->host . '.com' . $base_directory;
			}
			
			return $base_directory;
		}
		
		public function getImageMarkup($args) {
			$image = $args['image'];
			
			if($this->mobile_friendly) {
				return '';
			}
			
			$base_directory = $this->getImageBaseDirectory();
			
			$markup =
				'<img src="' . $base_directory .
				$image['filename'] .
				'" title="Icon designed by ' .
				$image['creator'] . ', ' .
				$image['license'] . ' License, from ' .
				$image['source'] .
				'"height="50" width="50" class="border-2px"> '
			;
			$markup .= "\n";
			
			return $markup;
		}
		
		public function getImageIconMarkup($args) {
			$image = $args['image'];
			
			if($this->mobile_friendly || ($this->script_format_lower == 'pdf')) {
				return '';
			}
			
			$base_directory = $this->getImageBaseDirectory();
			
			$markup =
				'<img src="' . $base_directory .
				$image['filename'] .
				'" title="Icon designed by ' .
				$image['creator'] . ', ' .
				$image['license'] . ' License, from ' .
				$image['source'] .
				'"height="15" width="15" class="border-2px"> '
			;
			
			return $markup;
		}
		
						// HTML Data
						// ---------------------------------------------
		
		public function GetHTMLFormatData_Title()
		{
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$header_title_text = 'Privacy Policy for ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'de':
					$header_title_text = 'Datenschutzerklärung für ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'es':
					$header_title_text = 'Política de privacidad de ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'fr':
					$header_title_text = 'Politique de confidentialité pour ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'ja':
					$header_title_text = $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'] . 'のプライバシーポリシー';
					break;
					
				case 'it':
					$header_title_text = 'Informativa sulla privacy per ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'nl':
					$header_title_text = 'Privacybeleid voor ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'pl':
					$header_title_text = 'Polityka prywatności dla ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'pt':
					$header_title_text = 'Política de Privacidade para ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'ru':
					$header_title_text = 'Политика конфиденциальности для ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'tr':
					$header_title_text = $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'] . ' için Gizlilik Politikası';
					break;
					
				case 'zh':
					$header_title_text = $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'] . '的隱私政策';
					break;
			}
			
			return $this->header_title_text = $header_title_text;
		}
	}
	
?>