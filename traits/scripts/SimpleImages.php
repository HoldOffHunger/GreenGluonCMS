<?php

	trait SimpleImages {
		public function makeIcon($args) {
			$args['maxheight'] = 200;
			$args['maxwidth'] = 200;
			
			return $this->resizeAndSaveFile($args);
		}
		
		public function makeStandardImage($args) {
			$args['maxheight'] = 1000;
			$args['maxwidth'] = 1000;
			
			return $this->resizeAndSaveFile($args);
		}
		
		public function resizeAndSaveFile($args) {
			$file_location = $args['filelocation'];
			$new_icon_location = $args['resizedlocation'];
			$max_height = $args['maxheight'];
			$max_width = $args['maxwidth'];
			
			$image = new Imagick();
			
			$image_filehandle = fopen($file_location, 'a+');
			$image->readImageFile($image_filehandle);
			
			$image_height = $image->getImageHeight();
			$image_width = $image->getImageWidth();
			
			if($image_height > $max_height || $image_width > $max_width) {
				if($image_height > $image_width) {
					$new_height = $max_height;
					$new_width = ceil($image_width * ($max_height / $image_height));
				} else {
					$new_width = $max_width;
					$new_height = ceil($image_height * ($max_width / $image_width));
				}
				
				$image->scaleImage($new_width, $new_height);
			} else {	# image is smaller than absolute icon limits, so, this is its new size.
				$new_height = $image_height;
				$new_width = $image_width;
			}
			
			$image_icon_filehandle = fopen($new_icon_location, 'w+');
			$image->writeImageFile($image_icon_filehandle);
			
			$icon_results = [
				'originalheight'=>$image_height,
				'originalwidth'=>$image_width,
				'resizedheight'=>$new_height,
				'resizedwidth'=>$new_width,
			];
			
			return $icon_results;
		}
	}

?>