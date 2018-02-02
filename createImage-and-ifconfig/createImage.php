<?php
	# if 500 error occurs, do it install php7.0-gd (sudo apt-get install php7.0-gd)
	# php.ini : "extension=php_gd2.dll" (remove the semicolon)
	# made by munsiwoo
	header('Content-Type: image/png');

	$im = imagecreatetruecolor(500, 100);
	$white = imagecolorallocate($im, 255, 255, 255);
	$black = imagecolorallocate($im, 0, 0, 0);
	imagefilledrectangle($im, 0, 0, 500, 100, $white);

	$ip_api = "http://ip-api.com/json/".$_SERVER['REMOTE_ADDR'];
	
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $ip_api);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_HEADER, 0);
	$array = (array) json_decode(curl_exec($curl));

	$text = $array['query'].PHP_EOL;

	if($array['status'] == "success") {
		$text .= $array['country'].PHP_EOL;
		$text .= $array['isp'].PHP_EOL;
	}

	$font = './NanumGothicLight.ttf';

	imagettftext($im, 20, 0, 10, 25, $black, $font, $text);

	imagepng($im);
	imagedestroy($im);