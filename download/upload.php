<meta charset="utf-8">
<?php
	// Näytä virheet lopussa jos tiedoston lähtettäminen epäonnistuu.
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	$UploadFile = "uploads/" . basename($_FILES['fileToUpload']['name']);
	$UploadFailed = 0;

	if(file_exists($UploadFile)) // Tiedosto on jo olemassa.
	{
		echo basename($_FILES['fileToUpload']['name'])." on jo olemassa.<br>";
		$UploadFailed = 1;
	}
	if($_FILES["fileToUpload"]['size']>50000000) // Liian iso tiedosto.
	{
		echo "Liian iso.<br>";
		$UploadFailed = 1;
	}
	if($UploadFailed == 1)
		echo "Tiedoston lähtettäminen epäonnistui.<br>"; // Tiedoston lähettäminen epäonnistui.
	else
	{
		if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$UploadFile)) // Lähetä tiedosto uploads kansioon.
		{
			echo basename($_FILES['fileToUpload']['name']." lähtettäminen onnistui.");
			header('Location: testi.php'); // Palaa takaisin etusivulle.
		}
		else
			echo "Virhe. Tiedoston lähtettäminen kielletty.<br>";
	}

	// Debug.
	echo $UploadFile.'<br>';
	print_r($_FILES);
	echo '<br>';
	echo $_FILES['fileToUpload']['tmp_name'].'<br>';
	echo $UploadFile.'<br>';
	echo basename($_FILES['fileToUpload']['name']).'<br>';
?>
