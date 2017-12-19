<?php
	session_start();

	$page = $_GET['page'];

	include 'c:/wamp64/www/eth/v/'.$page.'.html';
	include 'c:/wamp64/www/eth/c/liaison_bdd.php';
	include 'c:/wamp64/www/eth/c/affichage_par_page.php';
	
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	
	$nb_lignes = 20;
	$count = $bdd->query('SELECT COUNT(*) AS nb_message FROM '.$_GET['page']);

	$tri = $_GET['tri'];

	$nb_page = calcul_nb_page($nb_lignes, $count, $tri, $page);

	if($page == 'clients') {
		$req = $bdd->query('
			SELECT * 
			FROM clients 
			ORDER BY '.$tri.' 
			LIMIT '.$mess_un.','.$nb_lignes);
		
		echo '
			<div class="container">
				<table border="1">
					<thead>
						<tr>
							<th>&nbspid&nbsp</th>
							<th>&nbspNom&nbsp</th>
							<th>&nbspPrenom&nbsp</th>
							<th>&nbspMail&nbsp</th>
							<th>&nbspTelephone&nbsp</th>
							<th>&nbspAdresse&nbsp</th>
						</tr>
					</thead>
			</div>';
		
		while($donnees = $req->fetch()){
			echo
				'<tbody>
					<td>&nbsp'.pop_up_fiche($page,$donnees).'&nbsp</td>
					<td>&nbsp'.pop_up_fiche($page,$donnees).'&nbsp</td>
					<td>&nbsp'.pop_up_fiche($page,$donnees).'&nbsp</td>
					<td>&nbsp'.pop_up_fiche($page,$donnees).'&nbsp</td>
					<td>&nbsp'.pop_up_fiche($page,$donnees).'&nbsp</td>
					<td>&nbsp'.pop_up_fiche($page,$donnees).'&nbsp</td>
				</tbody>';
		}
		echo '</table>';
	} 
	else if($page == 'chevaux') {
		$req = $bdd->query('
			SELECT ch.id, ch.nom, ch.age, ch.besoins, p.pourcentage, p.clients_id, c.nom
			FROM chevaux ch JOIN posseder p ON ch.id = p.chevaux_id JOIN clients c ON c.id = p.clients_id 
			ORDER BY ch.'.$tri.' 
			LIMIT ' . $mess_un .' , ' . $nb_lignes);
		
		echo '
			<div class="container">
				<table border="1">
					<thead>
						<tr>
							<th>&nbspid&nbsp</th>
							<th>&nbspNom&nbsp</th>
							<th>&nbspAge&nbsp</th>
							<th>&nbspBesoins&nbsp</th>
							<th>&nbspPourcentage&nbsp</th>
							<th>&nbspNum Propriétaire&nbsp</th>
							<th>&nbspNom Propriétaire&nbsp</th>
						</tr>
					</thead>
			</div>';
			
		while($donnees = $req->fetch()) {
			echo 
			'<tbody>
				<td>&nbsp'.$donnees['id'].'&nbsp</td>
				<td>&nbsp'.$donnees['1'].'&nbsp</td>
				<td>&nbsp'.$donnees['age'].'&nbsp</td>
				<td>&nbsp'.$donnees['besoins'].'&nbsp</td>
				<td>&nbsp'.$donnees['pourcentage'].'&nbsp</td>
				<td>&nbsp'.$donnees['clients_id'].'&nbsp</td>
				<td>&nbsp'.$donnees['6'].'&nbsp</td>
			</tbody>';
		}
		echo '</table>';
    
	} else if($page == 'produits') {
		$reponse = $bdd->query('
			SELECT pr.id, pr.designation, pr.quantite, pr.prix_vente, pr.prix_achat, f.id, f.mail
			FROM produits pr JOIN fournir fo ON pr.id = fo.produits_id JOIN fournisseurs f on f.id = fo.fournisseurs_id ORDER BY pr.'.$tri.' 
			LIMIT ' . $mess_un .' , ' . $nb_lignes);

		echo '	
			<div class="container">
				<table border="1">
					<thead>
						<tr>
							<th>&nbspid produit&nbsp</th>
							<th>&nbspDesignation&nbsp</th>
							<th>&nbspQuantité&nbsp</th>
							<th>&nbspPrix vente&nbsp</th>
							<th>&nbspPrix achat&nbsp</th>
							<th>&nbspMail du fournisseur&nbsp</th>
						</tr>
					</thead>
			</div>';

		while($donnees = $reponse->fetch()){
			echo 
			'<tbody>
				<td>&nbsp'.$donnees['0'].'&nbsp</td>
				<td>&nbsp'.$donnees['designation'].'&nbsp</td>
				<td>&nbsp'.$donnees['quantite'].'&nbsp</td>
				<td>&nbsp'.$donnees['prix_vente'].'&nbsp</td>
				<td>&nbsp'.$donnees['prix_achat'].'&nbsp</td>
				<td>&nbsp'.$donnees['mail'].'&nbsp</td>
			</tbody>';
		}
		echo '</table>';

	} else if($page == 'employes') {
		$reponse = $bdd->query('
			SELECT * 
			FROM employes 
			ORDER BY '.$tri.' 
			LIMIT ' . $mess_un .' , ' . $nb_lignes);

		echo '	
		<div class="container">
			<table border="1">
				<thead>
					<tr>
						<th>&nbspid&nbsp</th>
						<th>&nbspNom&nbsp</th>
						<th>&nbspPrenom&nbsp</th>
						<th>&nbspMail&nbsp</th>
						<th>&nbspTelephone&nbsp</th>
						<th>&nbspAdresse&nbsp</th>
					</tr>
				</thead>
		</div>';
		
		while($donnees = $reponse->fetch()){
			echo '
			<tbody>
				<td>&nbsp'.$donnees['id'].'&nbsp</td>
				<td>&nbsp'.$donnees['nom'].'&nbsp</td>
				<td>&nbsp'.$donnees['prenom'].'&nbsp</td>
				<td>&nbsp'.$donnees['mail'].'&nbsp</td>
				<td>&nbsp'.$donnees['telephone'].'&nbsp</td>
				<td>&nbsp'.$donnees['adresse'].'&nbsp</td>
			</tbody>';
		}
		echo '</table>';
	
	} else if($page == 'fournisseurs') {
		$reponse = $bdd->query('
			SELECT * 
			FROM fournisseurs ORDER BY '.$tri.' LIMIT ' . $mess_un .' , ' . $nb_lignes);	

		echo'
			<div class="container">
				<table border="1">
					<thead>
						<tr>
							<th>&nbspid&nbsp</th>
							<th>&nbspNom&nbsp</th>
							<th>&nbspPrenom&nbsp</th>
							<th>&nbspAdresse&nbsp</th>
							<th>&nbspMail&nbsp</th>
							<th>&nbspTelephone&nbsp</th>
						</tr>
					</thead>
			</div>';
		while($donnees = $reponse->fetch()){
			echo'
			<tbody>
				<td>&nbsp'.$donnees['id'].'&nbsp</td>
				<td>&nbsp'.$donnees['nom'].'&nbsp</td>
				<td>&nbsp'.$donnees['prenom'].'&nbsp</td>
				<td>&nbsp'.$donnees['adresse'].'&nbsp</td>
				<td>&nbsp'.$donnees['mail'].'&nbsp</td>
				<td>&nbsp'.$donnees['telephone'].'&nbsp</td>
			</tbody>';		
		}
		echo '</table>';
		
	} else if($page == 'prestataires') {
		$reponse = $bdd->query('
			SELECT *
			FROM prestataires ORDER BY '.$tri.' LIMIT ' . $mess_un .' , ' . $nb_lignes);
			
		echo'
			<div class="container">
				<table border="1">
					<thead>
						<tr>
							<th>&nbspid&nbsp</th>
							<th>&nbspNom&nbsp</th>
							<th>&nbspPrenom&nbsp</th>
							<th>&nbspAdresse&nbsp</th>
							<th>&nbspEntreprise&nbsp</th>
							<th>&nbspMail&nbsp</th>
							<th>&nbspTelephone&nbsp</th>
							<th>&nbspPrix_deplacement&nbsp</th>
						</tr>
					</thead>
			</div>';
		while($donnees = $reponse->fetch()){
			echo'
				<tbody>
					<td>&nbsp'.$donnees['id'].'&nbsp</td>
					<td>&nbsp'.$donnees['nom'].'&nbsp</td>
					<td>&nbsp'.$donnees['prenom'].'&nbsp</td>
					<td>&nbsp'.$donnees['adresse'].'&nbsp</td>
					<td>&nbsp'.$donnees['entreprise'].'&nbsp</td>
					<td>&nbsp'.$donnees['mail'].'&nbsp</td>
					<td>&nbsp'.$donnees['telephone'].'&nbsp</td>
					<td>&nbsp'.$donnees['prix_deplacement'].'&nbsp</td>
				</tbody>';
		}
		echo '</table>';
	
	} else if($page == 'locations') {
		$reponse = $bdd->query('
		SELECT l.id, l.nom, l.etat, l.prix, t.designation 
		FROM locations l JOIN types t ON t.id = l.types_id 
		ORDER BY l.'.$tri.' LIMIT '. $mess_un .' , ' . $nb_lignes);

		echo '
			<div class="container">
				<table border="1">
					<thead>
						<tr>
							<th>&nbspid&nbsp</th>
							<th>&nbspNom&nbsp</th>
							<th>&nbspEtat&nbsp</th>
							<th>&nbspPrix&nbsp</th>
							<th>&nbspType&nbsp</th>
						</tr>
					</thead>
			</div>';

		while($donnees = $reponse->fetch()){
			echo '
			<tbody>
				<strong>
					<td>&nbsp'.$donnees['id'].'&nbsp</td>
					<td>&nbsp'.$donnees['nom'].'&nbsp</td>
					<td>&nbsp'.$donnees['etat'].'&nbsp</td>
					<td>&nbsp'.$donnees['prix'].'&nbsp</td>
					<td>&nbsp'.$donnees['designation'].'&nbsp</td>
				</strong>
			</tbody>';
		}
		echo '</table>';

	}
?>