<?php

error_log('img'.$_FILES['img']['name']);

	include ('../c/liaison_bdd.php');
	require ('../m/ajout.php');
	
	$page = $_POST['page'];
	
	include('../v/'.$page.'.php');
	
	if ($page == 'clients') {
		if(empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['adresse']) || empty($_POST['mail'])|| empty($_POST['tel']) ){
					
			echo '<div class="container">ATTENTION ! Vous n\'avez pas rempli tous les champs</div>';
				
		} else {
			$resultat = ajout($page);
			
			echo $resultat;
		}
	} else if ($page == 'chevaux') {
		$nbproprio = $_POST['nbproprio'];
		if($nbproprio == 1) {
			if(empty($_POST['nom']) || empty($_POST['age']) || empty($_POST['besoins'])|| empty($_POST['proprio1']) || empty($_POST['pourcentage1'])) {
				
				echo '<div class="container">ATTENTION ! Vous n\'avez pas rempli tous les champs</div>';
				
			} else {
				$resultat = ajout($page);
				
				echo $resultat;
			}
		} else if ($nbproprio == 2) {
			if(empty($_POST['nom']) || empty($_POST['age']) || empty($_POST['besoins'])|| empty($_POST['proprio1']) || empty($_POST['pourcentage1']) || empty($_POST['proprio2']) || empty($_POST['pourcentage2'])) {
				
				echo '<div class="container">ATTENTION ! Vous n\'avez pas rempli tous les champs</div>';
				
			} else {
				$resultat = ajout($page);
				
				echo $resultat;
			}
		} else {
			if(empty($_POST['nom']) || empty($_POST['age']) || empty($_POST['besoins'])|| empty($_POST['proprio1']) || empty($_POST['pourcentage1']) || empty($_POST['proprio2']) || empty($_POST['pourcentage2']) || empty($_POST['proprio3']) || empty($_POST['pourcentage3'])) {
				
				echo '<div class="container">ATTENTION ! Vous n\'avez pas rempli tous les champs</div>';
				
			} else {
				$resultat = ajout($page);
				
				echo $resultat;
			}
		}
	} else if ($page == 'employes') {
		if(empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['adresse']) || empty($_POST['mail'])|| empty($_POST['tel']) ){
			
            echo '<div class="container">ATTENTION ! Vous n\'avez pas rempli tous les champs</div>';
			
        } else {
			$resultat = ajout($page);
			
			echo $resultat;
		}
	} else if ($page == 'produits') {
		if(empty($_POST['designation']) || empty($_POST['quantite']) || empty($_POST['fournisseur'])) {
			
			echo '<div class="container">ATTENTION ! Vous n\'avez pas rempli tous les champs</div>';
			
		} else {
         
			$resultat = ajout($page);
			
			echo $resultat;
		}
	} else if ($page == 'fournisseurs') {
		if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail'])) {
			
			echo '<div class="container">ATTENTION ! Vous n\'avez pas rempli tous les champs</div>';
			
			
		} else {
			$resultat = ajout($page);
			
			echo $resultat;
		}
	} else if ($page == 'prestataires') {
		if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail'])) {
			
			echo '<div class="container"> ATTENTION ! Vous n\'avez pas rempli tous les champs</div>';
			
		} else {
			$resultat = ajout($page);
			
			echo $resultat;
		}
	} else if ($page == 'locations') {
		if(empty($_POST['nom'])||empty($_POST['type'])||empty($_POST['prix'])){
			
            echo '<div class="container">Attention vous n\'avez pas rempli tous les champs</div>';
			
        } else {
			$resultat = ajout($page);
			
			echo $resultat;
		}
	}
?>