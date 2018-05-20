<?php

class vendor_img_util {
  private $image;
  private $image_type;

	private function load($filename) {
		$image_info = getimagesize($filename);
		$this->image_type = $image_info[2];
		switch ($this->image_type) {
			case IMAGETYPE_JPEG:
				$this->image = imagecreatefromjpeg($filename);
        		break;
			case IMAGETYPE_GIF:
				$this->image = imagecreatefromgif($filename);
        		break;
			case IMAGETYPE_PNG:
				$this->image = imagecreatefrompng($filename);
        		break;
      default:
        break;
		}
	}

	private function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
		switch ($image_type) {
			case IMAGETYPE_JPEG:
				imagejpeg($this->image,$filename,$compression);
        		break;
			case IMAGETYPE_GIF:
				imagegif($this->image,$filename);
        		break;
			case IMAGETYPE_PNG:
				imagepng($this->image,$filename);
        		break;
		    default:
		        break;
		}
		if( $permissions != null) {
			chmod($filename,$permissions);
		}
	}

	private function output($image_type=IMAGETYPE_JPEG) {
		switch ($image_type) {
			case IMAGETYPE_JPEG:
				imagejpeg($this->image);
        		break;
			case IMAGETYPE_GIF:
				imagegif($this->image,$filename);
        		break;
			case IMAGETYPE_PNG:
				imagepng($this->image,$filename);
        		break;
		    default:
		        break;
		}
	}

	function getWidth() { return imagesx($this->image); }
	function getHeight() { return imagesy($this->image); }

	function resizeToHeight($height) {
		$ratio = $height / $this->getHeight();
		$width = $this->getWidth() * $ratio;
		$this->resize($width,$height);
  }

	function resizeToWidth($width) {
		$ratio = $width / $this->getWidth();
		$height = $this->getheight() * $ratio;
		$this->resize($width,$height);
	}

	function scale($scale) {
		$width = $this->getWidth() * $scale/100;
		$height = $this->getheight() * $scale/100;
		$this->resize($width,$height);
	}

	function resize($width,$height) {
		$new_image = imagecreatetruecolor($width, $height);
		imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
		$this->image = $new_image;
  }

  public function uploadImg($flies, $newSize = null) {
		$time = time();
		$allowedExts = ["gif", "jpeg", "jpg", "png"];
		$temp = explode(".", $flies["image"]["name"]);
    $extension = end($temp);
    // var_dump($flies);

		if ((($flies["image"]["type"] == "image/gif")
			|| ($flies["image"]["type"] == "image/jpeg")
			|| ($flies["image"]["type"] == "image/jpg")
			|| ($flies["image"]["type"] == "image/pjpeg")
			|| ($flies["image"]["type"] == "image/x-png")
			|| ($flies["image"]["type"] == "image/png"))
			&& ($flies["image"]["size"] < 200000000)
      && in_array($extension, $allowedExts)
    ) {
			if ($flies["image"]["error"] > 0) { return ['status' => false, 'message' => 'Error in image']; }
			$ulfd = RootURI . UploadREL .'/';
			$newfn = time().rand(10000,99999) . '.' . $extension;
      if (file_exists($ulfd . $newfn)) { return ['status' => false, 'message' => 'File exists']; }
      else {
        move_uploaded_file($flies["image"]["tmp_name"], $ulfd . $newfn);
        // $simpleImg = new vendor_simpleImage_component();
        // $simpleImg->load($ulfd.$newfn);

        // if(isset($newSize['height']) && !isset($newSize['width'])) { $simpleImg->resizeToHeight($newW); }
        // else {
        //   $newW = 200;
        //   if(isset($newSize['width'])) { $newW = $newSize['width']; }
        //   $simpleImg->resizeToWidth($newW);
        // }
        // $simpleImg->save($ulfd.$newfn);
        return ['status' => true, 'filename' => $newfn, 'url' => UploadREL . $newfn];
      }
    }

    return ['status' => false, 'message' => 'Invalid file'];
	}
}