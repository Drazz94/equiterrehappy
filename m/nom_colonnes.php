<?php
	
	function nom_colonnes($page) {
		
		include '../c/liaison_bdd.php';
		
		$req = $bdd->query('SELECT column_name
			FROM information_schema.columns
			WHERE table_name="'.$page.'"');
			
		return $req;
	};
			
?>