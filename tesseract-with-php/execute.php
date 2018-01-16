<?php
error_reporting(0);
# tesseract with php

if(isset($_FILES['image'])){
	$chars_array = array_merge(range(0,9), range('a','z'), range('A','Z'));
	shuffle($chars_array);
	$filename = substr(implode('', $chars_array), 0, 10).".png";

	if(move_uploaded_file($_FILES['image']['tmp_name'], $filename)){
	    echo '<pre>';	
	    echo `tesseract {$filename} stdout`;
	    echo '</pre>';
	    unlink($filename); exit;
	}
	echo "failed";
}
?>
