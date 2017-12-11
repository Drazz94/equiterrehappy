<?php
	session_start();
	
	include 'c:/wamp64/www/eth/index.html';
	
	if(empty($_POST['id'])) {
		echo "Le champ Pseudo est vide.";
	} else {
		if(empty($_POST['pwd'])) {
			echo "Le champ Mot de passe est vide.";
		} else {       
			include './liaison_bdd.php';
			$pseudo = $_POST['id'];
			$pwd = $_POST['pwd'];
			
			$req = $bdd->prepare('SELECT * FROM employes WHERE pseudo = :pseudo AND mdp = :mdp');
			
			$req -> execute (array(
			'pseudo' => $pseudo,
			'mdp' => $pwd)
			);
			
			$resultat = $req->fetch();
			
			if(empty($resultat)) {
				echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
			} else {
				header('location:/eth/v/accueil.html');
			}
		}
	}

?>