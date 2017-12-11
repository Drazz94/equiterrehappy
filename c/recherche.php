<?php
	function recherche($page) {	
		include 'c:/wamp64/www/eth/c/liaison_bdd.php';
		
		$champ = $_POST['champ'];
		$recherche = $_POST['recherche'];

		$req = $bdd->prepare('SELECT * from '.$_POST['page'].' where '.$_POST['champ'].' LIKE :recherche');
		$req->execute(array(
			'recherche' => $recherche
			));
			
		$donnees = $req->fetch(); 
		return $donnees;
	};
?>