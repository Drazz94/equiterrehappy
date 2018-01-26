<?php
	include('../v/acte_de_vente.php');
	require('../m/fonctions_service.php');

	$id = $_POST['id'];
	$date = $_POST['date'];
	$date1 = $_POST['heure'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$mail = $_POST['mail'];
	$telephone = $_POST['telephone'];

	$req = choisir_service();
	$req1 = cheval($id);
	$req2 = type_soin();
	$req3 = produit();
	$req4 = location();
	$req5 = prestataire();
	$req6 = type_pension();

//ENTETE
	echo '
	<div class="droite"><u>Date :</u> '.$date.' '.$date1.'</div>

	<div class="gauche"><u>Nom :</u> '.$nom.' '.$prenom.'<br>
		<u>Adresse mail :</u> '.$mail.'<br>
		<u>N°Téléphone :</u> '.$telephone.'<br>
		<br>
		<div class="ajout">
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Ajouter un service...</button>
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"><i>Choisissez...</i></h4>
						</div>
						<div class="modal-body">
								<form action="../c/ajouter_service.php" method="POST">
									<input type="hidden" name="id" value="'.$id.'">
									<input type="hidden" name="nom" value="'.$nom.'">
									<input type="hidden" name="prenom" value="'.$prenom.'">
									<input type="hidden" name="mail" value="'.$mail.'">
									<input type="hidden" name="telephone" value="'.$telephone.'">
									<input type="hidden" name="date" value="'.$date.'">
									<input type="hidden" name="heure" value="'.$date1.'">
									<label>Services : </label><br>
									';
		while($resultat=$req->fetch()) {
									echo '<input type="checkbox" name="service[]" value="'.$resultat['designation'].'">'.$resultat['designation'].'
										<br>';
		}
		echo '				<br>
									<input type="submit" name="valider" value="Ajouter un service">
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	';

//Centre de la page
echo '
	<div class="centre">
		<form action="../c/creer_facture.php" method="POST">
			<input type="hidden" name="id" value="'.$id.'">
			<input type="hidden" name="nom" value="'.$nom.'">
			<input type="hidden" name="prenom" value="'.$prenom.'">
			<input type="hidden" name="mail" value="'.$mail.'">
			<input type="hidden" name="telephone" value="'.$telephone.'">
			<input type="hidden" name="date" value="'.$date.'">
			<input type="hidden" name="heure" value="'.$date1.'">
	';
	$service = $_POST['service'];

	for($i=0; $i<COUNT($service); $i++) {

//SI "SOINS" EST CHOISI
		if($service[$i] == 'soins') {
			echo '<table border="1">
				<thead>
					<tr>
						<th>Services</th>
						<th>N°cheval</th>
						<th>Type de Soins</th>
						<th>Prestataire</th>
						<th>Date début</th>
						<th>Date fin</th>
					</tr>
				</thead>
				<tbody>';
			echo '<td align="center"><input type="text" name="service[]" value="'.$service[$i].'"></td>
				<td>
					<select name="cheval_soin">';
			while($donnees = $req1->fetch()) {
				echo '<option value='.$donnees['id'].'>'.$donnees['nom'].'</option>';
			}
			echo '
					</select>
				</td>
					<td>
						<select name="type_soin">';
			while($donnees = $req2->fetch()) {
				echo '<option value='.$donnees['designation'].'>'.$donnees['designation'].'</option>';
			}
			echo '
						</select>
					</td>
					<td>
						<select name="prestataire">';
			while($donnees = $req5->fetch()) {
				echo '<option value='.$donnees['id'].'>'.$donnees['nom'].' '.$donnees['prenom'].'</option>';
			}
			echo '
						</select>
						</td>
						<td><input type="date" name="start"></td>
						<td><input type="date" name="end"></td>
					</tbody>
				</table><br>
			';
		}

//SI "TRAVAIL" EST CHOISI
		if($service[$i] == 'travail') {
			$req1 = cheval($id);
			echo	'	<table border="1">
						<thead>
							<tr>
								<th>Services</th>
								<th>N°cheval</th>
								<th>Qté/semaine</th>
							</tr>
						</thead>
						<tbody>';
						echo '<td align="center"><input type="text" name="service[]" value="'.$service[$i].'"></td>
							<td>
								<select name="cheval_travail">';
			while($donnees1 = $req1->fetch()) {
				echo '<option value='.$donnees1['id'].'>'.$donnees1['nom'].'</option>';
			}
			echo '
								</select>
							</td>
							<td><input type="number" name="nbtravail"></td>
						</tbody>
					</table><br>';
		}

// SI "NOURRITURE" EST CHOISI
		if($service[$i] == 'nourrir') {
			$req1 = cheval($id);
			echo	'	<table border="1">
						<thead>
							<tr>
								<th>Services</th>
								<th>N°cheval</th>
								<th>Quantité(en mois)</th>
							</tr>
						</thead>
						<tbody>';
			echo '<td align="center"><input type="text" name="service[]" value="'.$service[$i].'"></td>
				<td>
					<select name="cheval_nourrir">';
			while($donnees2 = $req1->fetch()) {
				echo '<option value='.$donnees2['id'].'>'.$donnees2['nom'].'</option>';
			}
			echo '
								</select>
							</td>
							<td><input type="number" name="nb_nourrir"></td>
						</tbody>
						</table><br>';
		}

//SI "PENSION" EST CHOISI
		if($service[$i] == 'pension') {
			$req1 = cheval($id);
			echo	'	<table border="1">
						<thead>
							<tr>
								<th>Services</th>
								<th>Type de pension</th>
								<th>N°cheval</th>
								<th>Quantité(en mois)</th>
							</tr>
						</thead>
						<tbody>';
			echo '<td align="center"><input type="text" name="service[]" value="'.$service[$i].'"></td>
				<td>
					<select name="pension">';
			while($donnees5 = $req6->fetch()) {
				echo '<option value="'.$donnees5['id'].'">'.$donnees5['nom'].'</option>';
			}
			echo '
					</select>
				</td>
				<td>
					<select name="cheval_pension">';
			while($donnees3 = $req1->fetch()) {
				echo '<option value='.$donnees3['id'].'>'.$donnees3['nom'].'</option>';
			}
			echo '
								</select>
							</td>
							<td><input type="number" name="nb_pension"></td>
						</tbody>
						</table><br>';
		}

//SI "VENTE" EST CHOISI
		if($service[$i] == 'vente') {
				echo '<table border="1">
					<thead>
						<tr>
							<th>Services</th>
							<th>Produit</th>
							<th>Quantité</th>
						</tr>
					</thead>
					<tbody>';
				echo '<td align="center"><input type="text" name="service[]" value="'.$service[$i].'"></td>
					<td>
						<select name="produit">';
				while($donnees = $req3->fetch()) {
					echo '<option value='.$donnees['id'].'>'.$donnees['designation'].'</option>';
				}
				echo '
						</select>
					</td>
					<td><input type="number" name="quantite" value=""></td>
					</form>
					</tbody>
					</table><br>
				';
		}
//SI "LOCATION" EST CHOISI
		if($service[$i] == 'location') {
			echo '<table border="1">
				<thead>
					<tr>
						<th>Services</th>
						<th>Location</th>
						<th>Date début</th>
						<th>Date fin</th>
					</tr>
				</thead>
				<tbody>';
			echo '<td align="center"><input type="text" name="service[]" value="'.$service[$i].'"></td>
				<td>
					<select name="location">';
			while($donnees = $req4->fetch()) {
				echo '<option value='.$donnees['id'].'>'.$donnees['nom'].'</option>';
			}
			echo '
					</select>
				</td>
				<td><input type="date" name="date_debut"</td>
				<td><input type="date" name="date_fin"></td>
				</tbody>
				</table><br>
			';
		}
		if($service[$i] == 'copeaux') {
			echo '<table border="1">
				<thead>
					<tr>
						<th>Services</th>
						<th>Cheval</th>
					</tr>
				</thead>
				<tbody>';
			$req7 = cheval($id);
			echo '<td align="center"><input type="text" name="service[]" value="'.$service[$i].'"></td>
					<td>
						<select name="cheval_copeaux">';
			while($donnees = $req7->fetch()) {
				echo '<option value='.$donnees['id'].'>'.$donnees['nom'].'</option>';
			}
			echo '	</select>
						</td>
					</tbody>
				</table><br>';
		}
	}
	echo '
		<input type="submit" name="creer" value="Créer la facture">
	</form>
	</div>';
?>
