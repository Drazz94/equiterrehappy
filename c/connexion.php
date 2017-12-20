<?php
	session_start();
    session_id();
	// echo $_SESSION['id'];
	
	include '../index.html';
	
	if(isset($_POST['connexion'])){
		if(isset($_SESSION['mail'])){
			echo '<div class="container">Vous etes deja connecté</div>';
		}
		else{
		   if(empty($_POST['id'])) {
			  echo '<div class="container">Le champ Pseudo est vide.</div>';
		   } 
			else {
			  if(empty($_POST['pwd'])) {
				 echo '<div class="container">Le champ Mot de passe est vide.</div>';
			  } 
			  else {       
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
					echo '<div class="container">Le pseudo ou le mot de passe est incorrect, le compte n\'a pas été trouvé.</div>';
				} 
				else {
					$id = session_id();
					$_SESSION['id'] = $id;
					$_SESSION['pseudo'] = $_POST['id'];
					header('location:../v/accueil.php');
				}
			}
		}
	}
}

?>