<?php

	trait SimpleImages {
		public function makeIcon($args)
		{
			$file = $args['file'];
			$file_location = $args['filelocation'];
			$new_icon_location = $args['newiconlocation'];
			
			$image = new Imagick();
			
			$image_filehandle = fopen($file_location, 'a+');
			$image->readImageFile($image_filehandle);
			
			$max_height = 200;
			$max_width = 200;
			
			$image_height = $image->getImageHeight();
			$image_width = $image->getImageWidth();
			
			if($image_height > $max_height || $image_width > $max_width)
			{
				if($image_height > $image_width)
				{
				#	$new_ratio = $image_height / $max_height;
					$new_height = 200;
					$new_width = ceil($image_width * ($max_height / $image_height));
				}
				else
				{
				#	$new_ratio = $image_width / $max_width;
					$new_width = 200;
					$new_height = ceil($image_height * ($max_width / $image_width));
				}
				
#				$image->scaleImage($new_height, $new_width);
				$image->scaleImage($new_width, $new_height);
				#$image->scaleImage($image_height / $new_ratio, $image_width / $new_ratio);
			}
			
			$image_icon_filehandle = fopen($new_icon_location, 'w+');
			$image->writeImageFile($image_icon_filehandle);
			
			$icon_results = [
				originalheight=>$image_height,
				originalwidth=>$image_width,
				iconheight=>$new_height,
				iconwidth=>$new_width,
			];
			
			return $icon_results;
		}
	}

?>