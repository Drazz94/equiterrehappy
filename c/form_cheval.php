<?php 
	include '../v/chevaux.php';
	$nbproprio = $_POST['nbproprio'];
	if ($nbproprio == 1) {
		echo '
		<div class="container">
			<form action="../c/ajouter_objet.php" method="post">
				<input type="hidden" name="page" value="chevaux">
				<input type="hidden" name="nbproprio" value="'.$nbproprio.'">
				<input type="text" name="nom" placeholder="Nom" value=""> 
				<input type="number" name="age" placeholder="Age" value=""><br>  
				<input type="text" name="besoins" placeholder="Besoins" value="">
				<input type="text" name="proprio1" placeholder="Email du Propriétaire" value=""><br>
				<input type="number" name="pourcentage1" placeholder="% Possession" value=""><br>
				<br><input class="btn" type="submit" name="valider" value="Ajouter">
			</form>
		</div><br>';
		
		
	} else {
		echo '<div class="container">
		<form action="../c/ajouter_objet.php" method="post">
				<input type="hidden" name="page" value="chevaux">
				<input type="hidden" name="nbproprio" value="'.$nbproprio.'">
				<input type="text" name="nom" placeholder="Nom" value=""><br> 
				<input type="number" name="age" placeholder="Age" value=""><br>  
				<input type="textarea" name="besoins" placeholder="Besoins" value=""><br>';
		for ($i=0; $i<$nbproprio; $i++) {
			$j=$i+1;
			echo '
				<input type="text" name="proprio'.$j.'" placeholder="Email du Propriétaire n°'.$j.'" value="">
				<input type="number" name="pourcentage'.$j.'" placeholder="% Possession n°'.$j.'" value=""><br>';
		}
		echo '<div class="container">
				<br><input class="btn" type="submit" name="valider" value="Ajouter">
			</form>
			</div>';
	}

?>