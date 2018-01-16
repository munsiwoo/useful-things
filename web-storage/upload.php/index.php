<?php
	error_reporting(0);

	if(isset($_FILES['userfile']) && $_FILES['userfile']['error'] == 0){
		$basename = preg_replace( '/^.+[\\\\\\/]/', '', $_FILES['userfile']['name']);
		$filename = preg_replace("/\.(php|pht|htm|hta|cgi|inc)/i", "$0-x", $basename);
		$uploadfile = "../files/".$filename;

		if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){
			echo '{"status":"success"}'; exit;
		}
		else {
			echo '{"status":"error"}'; exit;
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>upload.php</title>
		<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />
		<link href="./assets/css/style.css" rel="stylesheet" />
	</head>
	<body>
		<form id="upload" method="post" enctype="multipart/form-data">
			<center>
				<h1>UPLOAD.PHP</h1>
			</center>
			<div id="drop">
				Uploaded file
				<p>: [ HERE ]</p>
				<a>Browse</a>
				<input type="file" name="userfile" multiple />
			</div>
			<ul>
			</ul>
		</form>

		<script src="./assets/js/jquery.min.js"></script>
		<script src="./assets/js/jquery.knob.js"></script>

		<script src="./assets/js/jquery.ui.widget.js"></script>
		<script src="./assets/js/jquery.iframe-transport.js"></script>
		<script src="./assets/js/jquery.fileupload.js"></script>

		<script src="./assets/js/script.js"></script>
        <script src="./assets/js/v1.js" async></script>
	</body>
</html>