<?php
	include ('c:/wamp64/www/eth/c/liaison_bdd.php');
	require ('c:/wamp64/www/eth/m/modifier.php');
	
	$page = $_POST['page'];
	$id = $_POST['id'];
	
	include('c:/wamp64/www/eth/v/'.$page.'.html');
	
	if ($page == 'clients') {
		if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['adresse']) || empty($_POST['mail'])|| empty($_POST['telephone']) ){
					
			echo '<div class="container">ATTENTION ! Vous n\'avez pas rempli tous les champs</div>';
				
		} else {
			
			$resultat = modifier($page, $id);

			echo $resultat;
		}
	} else if ($page == 'chevaux') {
		if(empty($_POST['nom']) || empty($_POST['age']) || empty($_POST['besoins'])|| empty($_POST['proprio']) || empty($_POST['pourcentage'])) {
			
			echo '<div class="container">ATTENTION ! Vous n\'avez pas rempli tous les champs</div>';
			
		} else {
			
			$resultat = modifier($page, $id);
			
			echo $resultat;
		}
	} else if ($page == 'employes') {
		if(empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['adresse']) || empty($_POST['mail'])|| empty($_POST['tel']) ){
			
            echo '<div class="container">ATTENTION ! Vous n\'avez pas rempli tous les champs</div>';
			
        } else {
			$resultat = modifier($page, $id);
			
			echo $resultat;
		}
	} else if ($page == 'produits') {
		if(empty($_POST['designation']) || empty($_POST['quantite']) || empty($_POST['fournisseur'])) {
			
			echo '<div class="container">ATTENTION ! Vous n\'avez pas rempli tous les champs</div>';
			
		} else {
			$resultat = modifier($page, $id);
			
			echo $resultat;
		}
	} else if ($page == 'fournisseurs') {
		if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail'])) {
			
			echo '<div class="container">ATTENTION ! Vous n\'avez pas rempli tous les champs</div>';
			
			
		} else {
			$resultat = modifier($page, $id);
			
			echo $resultat;
		}
	} else if ($page == 'prestataires') {
		if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail'])) {
			
			echo '<div class="container"> ATTENTION ! Vous n\'avez pas rempli tous les champs</div>';
			
		} else {
			$resultat = modifier($page, $id);
			
			echo $resultat;
		}
	} else if ($page == 'locations') {
		if(empty($_POST['nom'])||empty($_POST['type'])||empty($_POST['prix'])){
			
            echo '<div class="container">Attention vous n\'avez pas rempli tous les champs</div>';
			
        } else {
			$resultat = modifier($page, $id);
			
			echo $resultat;
		}
	}
?>