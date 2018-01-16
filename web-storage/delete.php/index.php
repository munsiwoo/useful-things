<?php
	error_reporting(0);
	$dir = "../files/";
	
	function my_basename($argv){
		return preg_replace('/^.+[\\\\\\/]/', '', $argv);
	}

	if(isset($_GET['submit'])){
		
		### confirm password - start ###
 		$password = md5(sha1(md5($_GET['password']).'_'));
		$get_pass = file_get_contents("password.txt");
		if($get_pass !== $password){
			echo 'nope!'; exit;
		}
		### confirm password - end ###

		$count = count($_GET['files']);
		echo '<pre>';
		for($i=0;$i<$count;++$i){
			$basename = my_basename($_GET['files'][$i]);
			$deletefile = $dir.$basename;
			if(file_exists($deletefile)){
				unlink($deletefile);
			}
		}
		echo '</pre>';
		echo '<script>location.href="?"</script>';
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>File list</h1>
	<form>
		<?php
			$opendir = opendir($dir);
			echo '<pre>';
			while($filename = readdir($opendir)){
			    if($filename == "." || $filename == ".."){
			        continue;
			    }
			    if(is_file($dir.$filename)){
			    	echo $filename.' : ';
			    	echo '<input type="checkbox" name="files[]" value="'.$filename.'"">';
			    	echo '<br>';
			    }
			}
			echo 'end';
			echo '</pre>';
		?>
		<hr>
		<input type="password" name="password" placeholder="confirm password">
		<input type="submit" name="submit" value="delete">
	</form>
</body>
</html>