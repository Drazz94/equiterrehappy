<?php
	try {
		
		$bdd = new PDO('mysql:host=localhost;dbname=eth;charset=utf8', 'root', '');
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		
	} catch (exception $e) {
		
		die('Erreur : '.$e->getMessage());
		
	}
?>
