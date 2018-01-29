<style>
    .img{
          width:150px;
          height:150px;
    }
</style>

<?php

	$page = $_GET['page'];
	$tri = $_GET['tri'];

	include '../v/'.$page.'.php';
	include '../c/liaison_bdd.php';
	require '../m/afficher.php';
	require '../c/pop_up_fiche.php';

	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

if ($page == 'clients') {

		$req = afficher($page, $tri);
		echo '
			<div class="container">
				<div class="row">
				<div class="col-md-offset-1 col-md-11">
					<br>
					<table border="1" >
						<thead>
							<tr>
								<th>&nbspid&nbsp</th>
								<th>&nbspNom&nbsp</th>
								<th>&nbspPrenom&nbsp</th>
								<th>&nbspMail&nbsp</th>
								<th>&nbspTelephone&nbsp</th>
								<th>&nbspAdresse&nbsp</th>
							</tr>
						</thead><tbody>';

		while($donnees = $req->fetch()){
			$clic = pop_up_fiche($page,$donnees);
			echo
				'
					<tr>
					<td class="popup">&nbsp'.$clic.'&nbsp</td>
					<td>&nbsp'.$donnees['nom'].'&nbsp</td>
					<td>&nbsp'.$donnees['prenom'].'&nbsp</td>
					<td>&nbsp'.$donnees['mail'].'&nbsp</td>
					<td>&nbsp'.$donnees['telephone'].'&nbsp</td>
					<td>&nbsp'.$donnees['adresse'].'&nbsp</td>
					</tr>
				';
		}
		echo '</div></div></div></tbody></table>';


	}
	else if($page == 'chevaux') {

		$req = afficher($page, $tri);

		echo '
			<div class="container">
				<div class="row">
				<div class="col-md-offset-1 col-md-11">
					<br>
					<table  border= >
						<thead>
							<tr>
								<th>&nbspid&nbsp</th>
								<th>&nbspNom&nbsp</th>
								<th>&nbspAge&nbsp</th>
								<th>&nbspBesoins&nbsp</th>
								<th>&nbspPourcentage&nbsp</th>
								<th>&nbspNom Propriétaire&nbsp</th>
							</tr>
					</thead><tbody>';

		while($donnees = $req->fetch()) {
			$clic = pop_up_fiche($page,$donnees);
			// print_r($donnees);
			echo
			'
			<tr>
				<td class="popup">&nbsp'.$clic.'&nbsp</td>
				<td>&nbsp'.$donnees['1'].'&nbsp</td>
				<td>&nbsp'.$donnees['age'].'&nbsp</td>
				<td>&nbsp'.$donnees['besoins'].'&nbsp</td>
				<td>&nbsp'.$donnees['pourcentage'].'&nbsp</td>
				<td>&nbsp'.$donnees['nom'].'&nbsp</td>
			</tr>
			';
		}
		echo '</div></div></div></tbody></table>';

	} else if($page == 'produits') {

		$req = afficher($page, $tri);

		echo '
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-11">
					<br>
					<table border="">
					<thead>
						<tr>
							<th>&nbspid&nbsp</th>
							<th>&nbspDesignation&nbsp</th>
                            <th>&nbspImage&nbsp</th>
							<th>&nbspQuantité&nbsp</th>
							<th>&nbspPrix vente&nbsp</th>
							<th>&nbspPrix achat&nbsp</th>
							<th>&nbspEmail Fournisseur&nbsp</th>
						</tr>
					</thead><tbody>';

		while($donnees = $req->fetch()){
			$clic = pop_up_fiche($page,$donnees);
			echo
			'
				<tr>
					<td class="popup">&nbsp'.$clic.'&nbsp</td>
					<td>&nbsp'.$donnees['designation'].'&nbsp</td>
					<td>&nbsp<img src="'.$donnees['img'].'" class="img">&nbsp</td>
					<td>&nbsp'.$donnees['quantite'].'&nbsp</td>
					<td>&nbsp'.$donnees['prix_vente'].'&nbsp</td>
					<td>&nbsp'.$donnees['prix_achat'].'&nbsp</td>
					<td>&nbsp'.$donnees['mail'].'&nbsp</td>
				</tr>
			';
		}
		echo '</div></div></div></tbody></table>';

	} else if($page == 'employes') {

		$req = afficher($page, $tri);

		echo '
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-11">
					<br>
					<table border="">
					<thead>
					<tr>
						<th>&nbspid&nbsp</th>
						<th>&nbspNom&nbsp</th>
						<th>&nbspPrenom&nbsp</th>
						<th>&nbspMail&nbsp</th>
						<th>&nbspTelephone&nbsp</th>
						<th>&nbspAdresse&nbsp</th>
					</tr>
				</thead><tbody>';


		while($donnees = $req->fetch()){
			$clic = pop_up_fiche($page,$donnees);
			echo '
				<tr>
					<td class="popup">&nbsp'.$clic.'&nbsp</td>
					<td>&nbsp'.$donnees['nom'].'&nbsp</td>
					<td>&nbsp'.$donnees['prenom'].'&nbsp</td>
					<td>&nbsp'.$donnees['mail'].'&nbsp</td>
					<td>&nbsp'.$donnees['telephone'].'&nbsp</td>
					<td>&nbsp'.$donnees['adresse'].'&nbsp</td>
				</tr>';
		}
		echo '</div></div></div></tbody></table>';

	} else if($page == 'fournisseurs') {

		$req = afficher($page, $tri);

		echo'
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-11">
					<br>
					<table border="">
					<thead>
					<tr>
							<th>&nbspid&nbsp</th>
							<th>&nbspNom&nbsp</th>
							<th>&nbspPrenom&nbsp</th>
							<th>&nbspAdresse&nbsp</th>
							<th>&nbspMail&nbsp</th>
							<th>&nbspTelephone&nbsp</th>
						</tr>
					</thead><tbody>
					';


		while($donnees = $req->fetch()){
			$clic = pop_up_fiche($page,$donnees);
			echo'
			<tr>
				<td class="popup">&nbsp'.$clic.'&nbsp</td>
				<td>&nbsp'.$donnees['nom'].'&nbsp</td>
				<td>&nbsp'.$donnees['prenom'].'&nbsp</td>
				<td>&nbsp'.$donnees['adresse'].'&nbsp</td>
				<td>&nbsp'.$donnees['mail'].'&nbsp</td>
				<td>&nbsp'.$donnees['telephone'].'&nbsp</td>
			</tr>';

		}
		echo '</div></div></div></tbody></table>';

	} else if($page == 'prestataires') {

		$req = afficher($page, $tri);

		echo'
			<div class="container">
				<div class="row">
					<div class="col-md-10">
					<br>
					<table border="">
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
					</thead><tbody>
				';
		while($donnees = $req->fetch()){
			$clic = pop_up_fiche($page,$donnees);
			echo'
				<tr>
					<td class="popup">&nbsp'.$clic.'&nbsp</td>
					<td>&nbsp'.$donnees['nom'].'&nbsp</td>
					<td>&nbsp'.$donnees['prenom'].'&nbsp</td>
					<td>&nbsp'.$donnees['adresse'].'&nbsp</td>
					<td>&nbsp'.$donnees['entreprise'].'&nbsp</td>
					<td>&nbsp'.$donnees['mail'].'&nbsp</td>
					<td>&nbsp'.$donnees['telephone'].'&nbsp</td>
					<td>&nbsp'.$donnees['prix_deplacement'].'&nbsp</td>
				</tr>';
		}
		echo '</div></div></div></tbody></table>';

	} else if($page == 'locations') {

		$req = afficher($page, $tri);

		echo '
			<div class="container">
				<div class="row">
					<div class="col-md-offset-2 col-md-10">
					<br>
					<table border="">
					<thead>
						<tr>
							<th>&nbspid&nbsp</th>
							<th>&nbspNom&nbsp</th>
							<th>&nbspEtat&nbsp</th>
							<th>&nbspPrix&nbsp</th>
							<th>&nbspType&nbsp</th>
						</tr>
					</thead><tbody>';


		while($donnees = $req->fetch()){
			$clic = pop_up_fiche($page,$donnees);
			echo '
				<tr>
					<td class="popup">&nbsp'.$clic.'&nbsp</td>
					<td>&nbsp'.$donnees['nom'].'&nbsp</td>
					<td>&nbsp'.$donnees['etat'].'&nbsp</td>
					<td>&nbsp'.$donnees['prix'].'&nbsp</td>
					<td>&nbsp'.$donnees['designation'].'&nbsp</td>
				</tr>
			';
		}
		echo '</div></div></div></tbody></table>';

	}
?>
