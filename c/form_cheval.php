<?php 
	include '../v/chevaux.php';
	$nbproprio = $_POST['nbproprio'];
	if ($nbproprio == 1) {
		echo '<div class="container">
		<form action="../c/ajouter_objet.php" method="post">
			<input type="hidden" name="page" value="chevaux">
			<input type="hidden" name="nbproprio" value="'.$nbproprio.'">
            <label for="nom">nom : </label><input type="text" name="nom" value=""><br> 
			<label for="age">age : </label><input type="number" name="age" value=""><br>  
			<label for="besoins">besoins : </label><input type="textarea" name="besoins" value=""><br>
			<label for="proprio1">mail du proprietaire : </label><input type="text" name="proprio1" value=""><br>
			<label for="pourcentage">pourcentage d\'appartenance : </label><input type="number" name="pourcentage1" value="100"><br>
			<br><input class="btn btn-primary" type="submit" name="valider" value="confirmer">
        </form></div>';
		
	} else {
		echo '<div class="container">
		<form action="../c/ajouter_objet.php" method="post">
				<input type="hidden" name="page" value="chevaux">
				<input type="hidden" name="nbproprio" value="'.$nbproprio.'">
				<label for="nom">nom : </label><input type="text" name="nom" value=""><br> 
				<label for="age">age : </label><input type="number" name="age" value=""><br>  
				<label for="besoins">besoins : </label><input type="textarea" name="besoins" value=""><br>';
		for ($i=0; $i<$nbproprio; $i++) {
			$j=$i+1;
			echo '
				<label for="proprio'.$j.'">mail du proprietaire n°'.$j.' : </label><input type="text" name="proprio'.$j.'" value=""><br>
				<label for="pourcentage'.$j.'">pourcentage d\'appartenance : </label><input type="number" name="pourcentage'.$j.'" value=""><br>';
		}
		echo '<div class="container">
			<br><input class="btn btn-primary" type="submit" name="valider" value="confirmer">
			</form></div>';
	}

?>