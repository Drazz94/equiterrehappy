<?php
	function afficher ($page, $tri) {
		include '../c/liaison_bdd.php';
		require '../c/affichage_par_page.php';
		
		$nb_lignes = 20;
		$count = $bdd->query('SELECT COUNT(*) AS nb_message FROM '.$page);
		
		$mess_un = calcul_nb_page($nb_lignes, $count, $tri, $page);
		
		if($page == 'clients') {
			$req = $bdd->query('
				SELECT * 
				FROM clients 
				ORDER BY '.$tri.' 
				LIMIT '.$mess_un.','.$nb_lignes
			);
		} 
		else if ($page == 'chevaux') {
			$req = $bdd->query('
				SELECT DISTINCT ch.id, ch.nom, ch.age, ch.besoins, p.chevaux_id, p.clients_id, p.id AS posseder_id, p.pourcentage, c.nom
				FROM chevaux ch JOIN posseder p ON ch.id = p.chevaux_id JOIN clients c ON c.id = p.clients_id 
				ORDER BY ch.'.$tri.' 
				LIMIT ' . $mess_un .' , ' . $nb_lignes
			);
		} 
		else if ($page == 'employes') {
			$req = $bdd->query('
				SELECT * 
				FROM employes 
				ORDER BY '.$tri.' 
				LIMIT ' . $mess_un .' , ' . $nb_lignes
			);
		}
		else if ($page == 'produits') {
			$req = $bdd->query('
				SELECT pr.id, pr.designation, pr.quantite, pr.prix_vente, pr.prix_achat, pr.img, f.mail
				FROM produits pr JOIN fournir fo ON pr.id = fo.produits_id JOIN fournisseurs f on f.id = fo.fournisseurs_id ORDER BY pr.'.$tri.' 
				LIMIT ' . $mess_un .' , ' . $nb_lignes
			);
		}
		else if ($page == 'fournisseurs') {
			$req = $bdd->query('
				SELECT * 
				FROM fournisseurs ORDER BY '.$tri.' LIMIT ' . $mess_un .' , ' . $nb_lignes
			);	
		}
		else if ($page == 'prestataires') {
			$req = $bdd->query('
				SELECT *
				FROM prestataires ORDER BY '.$tri.' LIMIT ' . $mess_un .' , ' . $nb_lignes
			);
		}
		else if ($page == 'locations') {
			$req = $bdd->query('
				SELECT l.id, l.nom, l.etat, l.prix, t.designation 
				FROM locations l JOIN types t ON t.id = l.types_id 
				ORDER BY l.'.$tri.' LIMIT '. $mess_un .' , ' . $nb_lignes
			);
		}
		return $req;
	};
?>