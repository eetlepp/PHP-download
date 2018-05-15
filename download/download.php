<?php
	$download = $_GET['dl'];
	$download = str_replace("%20", " ", $download);
	header('Content-type: text/plain');
	header('Content-Transfer-Encoding: binary');
	header("Content-Length: " . filesize($download));
	header("Content-Disposition: attachment; filename=\"".$download);
	$f = file_get_contents($download);
	$f = str_replace("\r\n", "\n", $f);
	$f = str_replace("\r", "\n", $f);
	$f = str_replace("\n", "\r\n", $f);
	echo $f;
	//readfile("uploads/".$download);
?>
