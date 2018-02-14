<?php
# made by munsiwoo
/////////////////////////////////////////

function pagination($page, $limit, $count) {
	echo "<style>a { text-decoration:none; color:black; }</style>";
	for($x = ($page-1); ($x%$limit) != 0; --$x);
	
	if(($page-1) >= $limit) {
		echo "<a href=\"?page={$x}\">&lt;Prev</a> ";
	}

	$limit = (($x+$limit) > $count) ? $count : $x+$limit;
	
	for($p = ($x+1); $p <= $limit; ++$p) {
		if($p == $page) echo "<b><a href=\"?page={$p}\">{$p}</a></b> ";
		else echo "<a href=\"?page={$p}\">{$p}</a> ";
	}

	if($p <= $count) {
		echo "<a href=\"?page={$p}\">Next&gt;</a>";
	}
}

//////////////////////////////////////////

if(!isset($_GET['page']) || $_GET['page'] < 1) {
	header('Location: ?page=1');
}

$page = (int)$_GET['page']; // select page
$limit = 5; // divide
$count = 23; // total number of pages

echo '<pre>';
echo "total page : {$count}".PHP_EOL;
pagination($page, $limit, $count);
echo '</pre>';
