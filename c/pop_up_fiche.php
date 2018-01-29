<?php

	function pop_up_fiche ($page, $donnees) {

		include '../c/liaison_bdd.php';
		require_once '../m/nom_colonnes.php';

		$req = nom_colonnes($page);

		while($fetch = $req->fetch()) {
			$champs[] = $fetch['column_name'];
		}
		$clic = '<a class="lien_id" href = "" data-toggle="modal" data-target="#'.$donnees['id'].'">'.$donnees['id'].'</a>';

		echo
			'<td>
				<div class="modal fade" id="'.$donnees['id'].'" tabindex="-1" role="dialog"  aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"><strong>Fiche '.$page.'</strong></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>';
							if ($page=="clients") {
							echo '
							<div class="modal-body">
								<form action="../c/acte_de_vente.php" method="POST">
									<input type="hidden" name="id" value="'.$donnees['id'].'">
									<input type="submit" name="valider" value="Acte de vente">
								</form>
								<br>';
							};
							echo '
								<form action="../c/modifier_objet.php" method="POST">
									<input type="hidden" value="'.$donnees['id'].'" name="id">
									<input type="hidden" value="'.$page.'" name="page">';
									for($i = 1;$i<count($champs);$i++) {

										if (!preg_match("#id#", $champs[$i])) {
											echo '<label for="'.$champs[$i].'" >'.$champs[$i].' : </label>
												<input type="text" name="'.$champs[$i].'" value="'.$donnees[$i].'"><br>';
										}
									}
									echo '</br>
									<button type="submit">
										<span class="glyphicon glyphicon-edit"></span> Modifier
									</button>
								</form>
								</br>
								<form action="../c/supprimer.php" method="POST">
									<input type="hidden" value="'.$donnees['id'].'" name="id">
									<input type="hidden" value="'.$page.'" name="page">
									<button type="submit">
										<span class="glyphicon glyphicon-remove"></span> Supprimer
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			<td>';
		return $clic;
	};
?>
