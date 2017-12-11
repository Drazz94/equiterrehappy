<?php
	function recherche($page) {	
		include 'c:/wamp64/www/eth/c/liaison_bdd.php';
		
		$champ = $_POST['champ'];                                             
		$recherche = $_POST['recherche'];
		
		if($page == 'clients' || $page == 'employes' || $page == 'fournisseurs' || $page == 'prestataires') {
			$req = $bdd->prepare('SELECT * from '.$_POST['page'].' where '.$_POST['champ'].' LIKE :recherche');
			$req->execute(array(
				'recherche' => $recherche
				));
		} else if($page == 'chevaux') {
			$req = $bdd->prepare('
			SELECT ch.id, ch.nom, ch.age, ch.besoins, p.pourcentage, p.clients_id, c.nom
			FROM chevaux ch JOIN posseder p ON ch.id = p.chevaux_id JOIN clients c ON c.id = p.clients_id
			WHERE ch.'.$_POST['champ'].' LIKE :recherche');
			$req->execute(array(
				'recherche' => $recherche
				));
		} else if($page == 'produits') {
			$req = $bdd->prepare('
			SELECT pr.id, pr.designation, pr.quantite, pr.prix_vente, pr.prix_achat, f.id, f.mail
			FROM produits pr JOIN fournir fo ON pr.id = fo.produits_id JOIN fournisseurs f on f.id = fo.fournisseurs_id
			WHERE pr.'.$_POST['champ'].' LIKE :recherche');
			$req->execute(array(
				'recherche' => $recherche
				));
		} else if($page == 'locations') {
			$req = $bdd->prepare('
			SELECT l.id, l.nom, l.etat, l.prix, t.designation 
			FROM locations l JOIN types t ON t.id = l.types_id
			WHERE l.'.$_POST['champ'].' LIKE :recherche');
			$req->execute(array(
				'recherche' => $recherche
				));
		}
		
		$donnees = $req->fetch(); 
		return $donnees;
	};
?>