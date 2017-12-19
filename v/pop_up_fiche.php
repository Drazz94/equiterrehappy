
<?php
	
	function pop_up_fiche ($page, $donnees) {
		
		include 'c:/wamp64/www/eth/c/liaison_bdd.php';
		require_once 'c:/wamp64/www/eth/m/nom_colonnes.php';
		
		$req = nom_colonnes($page);
			
		while($fetch = $req->fetch()) {
			$champs[] = $fetch['column_name'];
		}
		
		 echo
				'<td>
					<a href = "" data-toggle="modal" data-target="#'.$donnees['id'].'">'.$donnees['id'].'</a>
					<div class="modal fade" id="'.$donnees['id'].'" tabindex="-1" role="dialog"  aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title"><strong>Fiche '.$page.'</strong></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="/eth/c/modifier_objet.php" method="POST">
										<input type="hidden" value="'.$donnees['id'].'" name="id">
										<input type="hidden" value="'.$page.'" name="page">';
										for($i = 1;$i<count($champs);$i++) {
										
											echo '<label for="'.$champs[$i].'" >'.$champs[$i].' : </label><input type="text" name="'.$champs[$i].'" value="'.$donnees[$i].'"><br>';
										
										}
										echo '</br>
										<button type="submit">
											<span class="glyphicon glyphicon-edit"></span> Modifier
										</button>
									</form>
									</br>
									<form action="/eth/c/supprimer.php" method="POST">
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
				</td>';	
			
	};
?>