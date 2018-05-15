<!DOCTYPE html>
<html lang="fi_FI">
<head>
<title>Download & Upload</title>
<meta charset="utf-8">
</head>

<body>
<?php
	// Tiedoston lataaminen.
	echo '<form method="get" action="download.php">
		<input type="hidden" name="dl" value="a.txt">
		<button type="submit">Download</button>
	</form>';
	echo '<br>';

	// Tiedoston lähettäminen.
	echo '<form action="upload.php" method="post" enctype="multipart/form-data">
		Valitse tiedosto
		<input type="file" name="fileToUpload" id="fileToUpload">
		<input type="submit" value="Lähetä" name="submit">
	</form>';

	// Tiedostolista.
	$files = glob('uploads/' . "*.*");
	foreach ($files as $file)
	{
		echo $file.'<br>';
	}

	// Latauslista.
	foreach ($files as $file)
	{
		$pathfile = $file;
		$nopathfile2 = str_replace("uploads/", "", $file);
		$nospacefile = str_replace(" ", "%20", $file);
		$nopathfile = str_replace("uploads/", "", $nospacefile);
		echo '<a href=download.php?dl='.$nopathfile.'>Download '.$pathfile.'</a><br>';

		echo '<form method="get" action="download.php">
			<input type="hidden" name="dl" value='.$nopathfile.'>
			<button type="submit">'.$nopathfile2.'</button>
		</form>';
	}
?>
</body>
</html>