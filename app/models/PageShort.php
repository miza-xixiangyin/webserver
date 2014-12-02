<?php

class PageShort extends Eloquent {

	protected $table = 'page_short_url';

	public static $rules = array
	(
		'key' 	=> 'required|unique:page_short_url',
		'value' => 'required|unique:page_short_url',
	);

	public static function makeShortName($url) {       
		$base32 = array ('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h','i', 'j', 'k', 'l', 'm', 'n', 'o', 'p','q', 'r', 's', 't', 'u', 'v', 'w', 'x','y', 'z', '0', '1', '2', '3', '4', '5'); 

		$hex = md5('prefix' . $url . 'surfix');
		$hexLen = strlen($hex);
		$subHexLen = $hexLen / 8;
		$output = array();
		for ($i = 0; $i < $subHexLen; $i++) {
			$subHex = substr ($hex, $i * 8, 8);
			$int = 0x3FFFFFFF & (1 * ('0x'.$subHex));
			$out = '';
			for ($j = 0; $j < 6; $j++) {
				$val = 0x0000001F & $int;
				$out .= $base32[$val];
				$int = $int >> 5;
			}
			$output = $out;
		}
		return $output;
	}

	public static function makeQRcode($short)
	{
		$qr_path 	= public_path() . '/uploads/qr/';
		$qr_logo	= public_path() . '/images/qr_logo.png';
		$qr_bg 		= public_path() . '/images/qr_bg.jpg';
		$font_path 	= public_path() . '/images/qr_font.ttf';
		$qr_code 	= $qr_path . $short->key . '.jpg';

		// step one create qrcode
		// echo $short->value;
		QRcode::png($short->value, $qr_code, QR_ECLEVEL_L, 44, 0);

		// step two add logo to qrcode
		$QR 		= imagecreatefrompng($qr_code);
		$logo 		= imagecreatefromstring(file_get_contents($qr_logo));
		$QR_width 	= imagesx($QR);
		$QR_height 	= imagesy($QR);
		
		$logo_width = imagesx($logo);
		$logo_height= imagesy($logo);
		
		$logo_qr_width 	= $QR_width / 5;
		// $logo_qr_width	= 58;
		$scale 			= $logo_width / $logo_qr_width;
		$logo_qr_height = $logo_height / $scale;
		$from_width 	= ($QR_width - $logo_qr_width) / 2;
		
		imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
		imagejpeg($QR, $qr_code, 100);

		// step three add qrcode to bg
		$bg = imagecreatefromstring(file_get_contents($qr_bg));
		$QR = imagecreatefromjpeg($qr_code);
		$bg_width 	= imagesx($bg);
		$bg_height 	= imagesy($bg);
		$QR_width 	= imagesx($QR);
		$QR_height 	= imagesy($QR);
		$x = ($bg_width - $QR_width)/2;
		$y = 200;

		imagecopyresampled($bg, $QR, $x, $y, 0, 0, $QR_width, $QR_height, $QR_width, $QR_height);
		imagejpeg($bg, $qr_code, 100);

		// step four add text to bg
		$bg = imagecreatefromstring(file_get_contents($qr_code));
		$black = ImageColorAllocate($bg, 0, 0, 0);
		imagettftext($bg, 90, 0, 2200, 2200, $black, $font_path, $short->pwd);
		imagejpeg($bg, $qr_code, 100);

		$bg = imagecreatefromstring(file_get_contents($qr_code));
		$black = ImageColorAllocate($bg, 0, 0, 0);
		$text = "http://xixiangyin.cn/t/" . $short->key;
		imagettftext($bg, 90, 0, 1630, 2400, $black, $font_path, $text);
		imagejpeg($bg, $qr_code, 100);

		return $qr_code;
	}
}