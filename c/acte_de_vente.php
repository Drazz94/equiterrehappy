<?php
	include ('../v/acte_de_vente.php');
	require ('../m/acte_de_vente.php');
	require ('../m/fonctions_service.php');
	require ('../c/test.php');

	$id = $_POST['id'];

	$resultat = acte_de_vente($id);

	$date = date('d/m/Y');
	$date1 = date('H:i');

	$nom = $resultat['nom'];
	$prenom = $resultat['prenom'];
	$mail = $resultat['mail'];
	$telephone = $resultat['telephone'];

	echo '<div class="droite"><u>Date :</u> '.$date.' '.$date1.'</div>';
	echo '<div class="gauche"><u>Nom :</u> '.$nom.' '.$prenom.'<br>';
	echo '<u>Adresse mail :</u> '.$mail.'<br>';
	echo '<u>N°Téléphone :</u> '.$telephone.'<br>';

	$req = choisir_service();

	echo '<br>
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
								echo '
									<input type="checkbox" name="service[]" value="'.$resultat['designation'].'">'.$resultat['designation'].'<br>
								';
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
	';
?>
