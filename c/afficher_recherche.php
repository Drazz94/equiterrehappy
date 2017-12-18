<?php
	include '../c/liaison_bdd.php';
	include '../m/recherche.php';

	$page = $_POST['page'];
	
	include '../v/'.$page.'.php';
	
	$donnees = recherche($page);
	
	if(empty($donnees)){
		echo '<div class="container">Aucun résultat.</div>';
	} else {
		if($page == 'clients') {
			echo '
			<div class="container">
				<div class="row">
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
						<tbody>
							<td>&nbsp'.$donnees['id'].'&nbsp</td>
							<td>&nbsp'.$donnees['nom'].'&nbsp</td>
							<td>&nbsp'.$donnees['prenom'].'&nbsp</td>
							<td>&nbsp'.$donnees['mail'].'&nbsp</td>
							<td>&nbsp'.$donnees['telephone'].'&nbsp</td>
							<td>&nbsp'.$donnees['adresse'].'&nbsp</td>
						</tbody>
					</table>
				</div>
			</div>';
		} else if($page == 'chevaux') {
			echo '
				<div class="container">
					<div class="row">
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
							<tbody>
								<td>&nbsp'.$donnees['id'].'&nbsp</td>
								<td>&nbsp'.$donnees['1'].'&nbsp</td>
								<td>&nbsp'.$donnees['age'].'&nbsp</td>
								<td>&nbsp'.$donnees['besoins'].'&nbsp</td>
								<td>&nbsp'.$donnees['pourcentage'].'&nbsp</td>
								<td>&nbsp'.$donnees['clients_id'].'&nbsp</td>
								<td>&nbsp'.$donnees['6'].'&nbsp</td>
							</tbody>
						</table>
					</div>
				</div>';
		} else if($page == 'produits') {
			echo '
				<div class="container">
					<div class="row">
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
							<tbody>
								<td>&nbsp'.$donnees['0'].'&nbsp</td>
								<td>&nbsp'.$donnees['designation'].'&nbsp</td>
								<td>&nbsp'.$donnees['quantite'].'&nbsp</td>
								<td>&nbsp'.$donnees['prix_vente'].'&nbsp</td>
								<td>&nbsp'.$donnees['prix_achat'].'&nbsp</td>
								<td>&nbsp'.$donnees['mail'].'&nbsp</td>
							</tbody>
						</table>
					</div>
				</div>';
		} else if ($page == 'employes') {
			echo '
				<div class="container">
					<div class="row">
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
							<tbody>
								<td>&nbsp'.$donnees['id'].'&nbsp</td>
								<td>&nbsp'.$donnees['nom'].'&nbsp</td>
								<td>&nbsp'.$donnees['prenom'].'&nbsp</td>
								<td>&nbsp'.$donnees['mail'].'&nbsp</td>
								<td>&nbsp'.$donnees['telephone'].'&nbsp</td>
								<td>&nbsp'.$donnees['adresse'].'&nbsp</td>
							</tbody>
						</table>
					</div>
				</div>';
		
		} else if ($page == 'locations') {
			echo '
				<div class="container">
					<div class="row">
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
							<tbody>
								<td>&nbsp'.$donnees['id'].'&nbsp</td>
								<td>&nbsp'.$donnees['nom'].'&nbsp</td>
								<td>&nbsp'.$donnees['etat'].'&nbsp</td>
								<td>&nbsp'.$donnees['prix'].'&nbsp</td>
								<td>&nbsp'.$donnees['designation'].'&nbsp</td>
							</tbody>
						</table>
					</div>
				</div>';
		
		} else if ($page == 'fournisseurs') {
			echo '
				<div class="container">
					<div class="row">
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
							<tbody>
								<td>&nbsp'.$donnees['id'].'&nbsp</td>
								<td>&nbsp'.$donnees['nom'].'&nbsp</td>
								<td>&nbsp'.$donnees['prenom'].'&nbsp</td>
								<td>&nbsp'.$donnees['adresse'].'&nbsp</td>
								<td>&nbsp'.$donnees['mail'].'&nbsp</td>
								<td>&nbsp'.$donnees['telephone'].'&nbsp</td>
							</tbody>
						</table>
					</div>
				</div>';
		
		} else if ($page == 'prestataires') {
					echo '
				<div class="container">
					<div class="row">
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
							<tbody>
								<td>&nbsp'.$donnees['id'].'&nbsp</td>
								<td>&nbsp'.$donnees['nom'].'&nbsp</td>
								<td>&nbsp'.$donnees['prenom'].'&nbsp</td>
								<td>&nbsp'.$donnees['adresse'].'&nbsp</td>
								<td>&nbsp'.$donnees['entreprise'].'&nbsp</td>
								<td>&nbsp'.$donnees['mail'].'&nbsp</td>
								<td>&nbsp'.$donnees['telephone'].'&nbsp</td>
								<td>&nbsp'.$donnees['prix_deplacement'].'&nbsp</td>
							</tbody>
						</table>
					</div>
				</div>';	
		}
	}
?>
