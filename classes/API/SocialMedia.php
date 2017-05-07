<?php

	class SocialMedia
	{
		# yah!: https://www.searchenginejournal.com/50-social-bookmarking-sites-importance-of-user-generated-tags-votes-and-links/6066/
		# eh: http://www.instantshift.com/2008/10/19/list-of-top-social-media-network-sites/
		# more eh: http://www.practicalecommerce.com/articles/86264-91-Leading-Social-Networks-Worldwide
		# everything: q
			
					# All Social Media Sites
					# -------------------------------------------------
		
				# All Social Media Sites
				# -------------------------------------------------
				
		public function GetSocialMediaSites_OrderedByAlphabet()
		{
			return [
				'bizsugar.com',
				'buffer.com',
				'del.icio.us',
				'deviantart.com',
				'digg.com',
				'dribbble.com',
				'dropbox.com',
				'evernote.com',
				'facebook.com',
				'flickr.com',
				'instagram.com',
				'kik.com',
				'last.fm',
				'linkedin.com',
				'livejournal.com',
				'medium.com',
				'metacafe.com',
				'musical.ly',
				'periscope.tv',
				'pinterest.com',
				'plus.google.com',
				'qzone.com',
				'reddit.com',
				'renren.com',
				'sharethis.com',
				'shazam.com',
				'shots.com',
				'slack.com',
				'slideshare.com',
				'soundcloud.com',
				'snapchat.com',
				'stumbleupon.com',
				'telegram.me',
				'twitter.com',
				'typepad.com',
				'vimeo.com',
				'vine.com',
				'vk.com',
				'whatsapp.com',
				'wordpress.com',
				'xing.com',
				'yikyak.com',
				'youtube.com',
			];
		}
		
				# All Social Media Sites ~ Nice Names
				# -------------------------------------------------
				
		public function GetSocialMediaSites_NiceNames()
		{
			return [
				'baidu.com'=>'Baidu',
				'blogger.com'=>'Blogger',
				'buffer.com'=>'Buffer',
				'del.icio.us'=>'Delicious',
				'digg.com'=>'Digg',
				'douban.com'=>'Douban',
				'evernote.com'=>'EverNote',
				'getpocket.com'=>'Pocket',
				'facebook.com'=>'FaceBook',
				'flipboard.com'=>'FlipBoard',
				'friendfeed.com'=>'FriendFeed',
				'instapaper.com'=>'InstaPaper',
				'line.me'=>'Line.me',
				'linkedin.com'=>'LinkedIn',
				'livejournal.com'=>'LiveJournal',
				'myspace.com'=>'MySpace',
				'newsvine.com'=>'NewsVine',
				'ok.ru'=>'OK.ru',
				'pinterest.com'=>'Pinterest',
				'plus.google.com'=>'GooglePlus',
				'qzone.com'=>'QZone',
				'reddit.com'=>'Reddit',
				'renren.com'=>'RenRen',
				'skype.com'=>'Skype',
				'stumbleupon.com'=>'StumbleUpon',
				'telegram.me'=>'Telegram.me',
				'tumblr.com'=>'Tumblr',
				'twitter.com'=>'Twitter',
				'viber.com'=>'Viber',
				'vk.com'=>'VK',
				'weibo.com'=>'Weibo',
				'whatsapp.com'=>'WhatsApp',
				'xing.com'=>'Xing',
				'yahoo.com'=>'Yahoo',
			];
		}
				
		public function GetSocialMediaSites_ByLanguage_en()
		{
			return $this->GetSocialMediaSites();
		}
			
					# Social Media Sites By Link Type
					# -------------------------------------------------
		
				# Social Media Sites With Subscribe Links
				# -------------------------------------------------
		
		public function GetSocialMediaSites_WithSubscribeLinks()
		{
			return [];
		}
		
				# Social Media Sites With Like Links
				# -------------------------------------------------
		
		public function GetSocialMediaSites_WithLikeLinks()
		{
			return [];
		}
		
				# Social Media Sites With Share Links
				# -------------------------------------------------
		
		public function GetSocialMediaSites_WithShareLinks_OrderedByPopularity()
		{
			return [
				'facebook.com',
				'twitter.com',
				'plus.google.com',
				'reddit.com',
				'linkedin.com',
				'pinterest.com',
				'stumbleupon.com',
				'digg.com',
				'tumblr.com',
				'blogger.com',
				'livejournal.com',
				'myspace.com',
				'yahoo.com',
				'friendfeed.com',
				'newsvine.com',
				'buffer.com',
				'del.icio.us',
				'evernote.com',
				'getpocket.com',
				'flipboard.com',
				'instapaper.com',
				'line.me',
				'skype.com',
				'viber.com',
				'whatsapp.com',
				'telegram.me',
				'vk.com',
				'ok.ru',
				'douban.com',
				'baidu.com',
				'qzone.com',
				'xing.com',
				'renren.com',
				'weibo.com',
			];
		}
		
		public function GetSocialMediaSites_WithShareLinks_OrderedByAlphabet()
		{
			return [
				'baidu.com',
				'blogger.com',
				'buffer.com',
				'del.icio.us',
				'digg.com',
				'douban.com',
				'evernote.com',
				'getpocket.com',
				'facebook.com',
				'flipboard.com',
				'friendfeed.com',
				'instapaper.com',
				'line.me',
				'linkedin.com',
				'livejournal.com',
				'myspace.com',
				'newsvine.com',
				'ok.ru',
				'pinterest.com',
				'plus.google.com',
				'qzone.com',
				'reddit.com',
				'renren.com',
				'skype.com',
				'stumbleupon.com',
				'telegram.me',
				'tumblr.com',
				'twitter.com',
				'viber.com',
				'vk.com',
				'weibo.com',
				'whatsapp.com',
				'xing.com',
				'yahoo.com',
			];
		}
			
					# Social Media Site Links by Link Type
					# -------------------------------------------------
		
				# Social Media Site Links With Subscribe Links
				# -------------------------------------------------
		
		public function GetSocialMediaSiteLinks_WithSubscribeLinks($args)
		{
			return [];
		}
		
				# Social Media Site Links With Like Links
				# -------------------------------------------------
		
		public function GetSocialMediaSiteLinks_WithLikeLinks($args)
		{
			return [];
		}
		
				# Social Media Site Links With Share Links
				# -------------------------------------------------
		
		public function GetSocialMediaSiteLinks_WithShareLinks($args)
		{
			$url = urlencode($args['url']);
			$img = urlencode($args['img']);
			$title = urlencode($args['title']);
			$desc = urlencode($args['desc']);
			$app_id = urlencode($args['appid']);
			$redirect_url = urlencode($args['redirecturl']);
			$via = urlencode($args['via']);
			$hashtags = urlencode($args['hashtags']);
			$provider = urlencode($args['provider']);
			$is_video = urlencode($args['isvideo']);
			
			$text = $title;
			
			if($desc)
			{
				$text .= '%20%3A%20';	# " : "
				$text .= $desc;
			}
			
			return [
				'baidu.com'=>'http://cang.baidu.com/do/add?it=' . $text . '&iu=' . $url,
				'blogger.com'=>'https://www.blogger.com/blog-this.g?u=' . $url . '&n=' . $title . '&t=' . $desc,
				'buffer.com'=>'https://buffer.com/add?text=' . $text . '&url=' . $url,
				'del.icio.us'=>'https://del.icio.us.com/save?v=5&provider=' . $provider . '&noui&jump=close&url=' . $url . '&title=' . $text,
				'digg.com'=>'http://digg.com/submit?url=' . $url . '&title=' . $text,
				'douban.com'=>'http://www.douban.com/recommend/?url=' . $url . '&title=' . $text,
				'evernote.com'=>'http://www.evernote.com/clip.action?url=' . $url,
				'getpocket.com'=>'https://getpocket.com/save?url=' . $url,
				'facebook.com'=>'http://www.facebook.com/sharer.php?u=' . $url,
				'flipboard.com'=>'https://share.flipboard.com/bookmarklet/popout?v=2&title=' . $text . '&url=' . $url, 
				'friendfeed.com'=>'http://friendfeed.com/?url=' . $url,
				'instapaper.com'=>'http://www.instapaper.com/edit?url=' . $url . '&title=' . $title . '&description=' . $desc,
				'line.me'=>'http://line.me/R/msg/text/?' . $text . '%20' . $url,
				'linkedin.com'=>'https://www.linkedin.com/shareArticle?url=' . $url . '&title=' . $text,
				'livejournal.com'=>'http://www.livejournal.com/update.bml?subject=' . $text . '&event=' . $url,
				'myspace.com'=>'https://myspace.com/post?u=' . $url . '&t=' . $title . '&c=' . $desc,
				'newsvine.com'=>'http://www.newsvine.com/_tools/seed&save?u=' . $url,
				'ok.ru'=>'https://connect.ok.ru/dk?st.cmd=WidgetSharePreview&st.shareUrl=' . $url . '&title=' . $text,
				'pinterest.com'=>'https://pinterest.com/pin/create/bookmarklet/?media=' . $img . '&url=' . $url . '&is_video=' . $is_video . '&description=' . $text,
				'plus.google.com'=>'https://plus.google.com/share?url=' . $url,
				'qzone.com'=>'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=' . $url,
				'reddit.com'=>'https://reddit.com/submit?url=' . $url . '&title=' . $title,
				'renren.com'=>'http://widget.renren.com/dialog/share?resourceUrl=' . $url . '&srcUrl=' . $url . '&title=' . $text,
				'skype.com'=>'https://web.skype.com/share?url=' . $url,
				'stumbleupon.com'=>'http://www.stumbleupon.com/submit?url=' . $url . '&title=' . $text,
				'telegram.me'=>'https://telegram.me/share/url?url=' . $url . '&text=' . $text,
				'tumblr.com'=>'https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . $url . '&title=' . $title . '&caption=' . $desc,
				'twitter.com'=>'https://twitter.com/intent/tweet?url=' . $url . '&text=' . $text . '&via=' . $via . '&hashtags=' . $hashtags,
				'viber.com'=>'viber://forward?text=' . $url,
				'vk.com'=>'http://vk.com/share.php?url=' . $url,
				'weibo.com'=>'http://service.weibo.com/share/share.php?url=' . $url . '&appkey=&title=' . $text . '&pic=&ralateUid=',
				'whatsapp.com'=>'whatsapp://send?text=' . $url,
				'xing.com'=>'https://www.xing.com/app/user?op=share&url=' . $url . '&title=' . $text,
				'yahoo.com'=>'http://compose.mail.yahoo.com/?body=' . $url,
			];
		}
			
					# Social Media Site Link Arguments
					# -------------------------------------------------
		
		public function GetSocialMediaSiteArguments_SubscribeLinks()
		{
			return [];
		}
		
		public function GetSocialMediaSiteArguments_LikeLinks()
		{
			return [];
		}
		
		public function GetSocialMediaSiteArguments_ShareLinks()
		{
			return [
				'url',
				'img',
				'title',
				'desc',
				'app_id',
				'redirect_url',
				'via',
				'hashtags',
				'provider',
				'is_video',
			];
		}
	}

?>