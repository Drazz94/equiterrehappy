<?php require('../c/redirection.php');?>
<?= $redirection ?>
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Connexion</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
			body {
				font-weight: bold;
			}			
			label {
				width: 110px;
				display: inline-block;
				vertical-align: top;
				margin: 6px;
			}
		</style>
	</head>

	<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../v/accueil.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;&nbsp;&nbsp;EquiTerreHappy</a>
    </div>
    <ul class="nav navbar-nav">
          <li><a href="/eth/v/clients.php">CLIENTS</a></li>
          <li><a href="/eth/v/chevaux.php">CHEVAUX</a></li>
          <li><a href="/eth/v/produits.php">PRODUITS</a></li>
		  <li><a href="/eth/v/employes.php">EMPLOYÉS</a></li>
		  <li><a href="/eth/v/locations.php">LOCATIONS</a></li>
		  <li><a href="/eth/v/fournisseurs.php">FOURNISSEURS</a></li>
		  <li><a href="/eth/v/prestataires.php">PRESTATAIRES</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/eth/index.php"><span class="glyphicon glyphicon-log-in"></span> Se déconnecter</a></li>
    </ul>
  </div>
</nav>

	<div class="container">
	<div class="container-fluid">
	<div class="row">
				<div class="col-md-4">
	<fieldset>
        <form action="../c/ajouter_objet.php" method="post">
			<input type="hidden" name="page" value="chevaux">
            <label for="nom">nom : </label><input type="text" name="nom" value=""><br> 
			<label for="age">age : </label><input type="number" name="age" value=""><br>  
			<label for="besoins">besoins : </label><input type="textarea" name="besoins" value=""><br>
			<label for="proprio">mail du proprietaire : </label><input type="text" name="proprio" value=""><br>
			<label for="pourcentage">pourcentage d'appartenance : </label><input type="number" name="pourcentage" value=""><br>
            <br><input class="btn btn-primary" type="submit" name="valider" value="confirmer">
        </form>
		</div>
		<div class="col-md-4">
        <form action="../c/afficher_tout.php?n_page" method="GET">
			<input type="hidden" name="page" value="chevaux">
            <input class="btn btn-primary" type="submit" name="valider" value="Afficher la liste des chevaux"><br>
			Triez par :
			<input type="radio" name="tri" value="id" checked>id
			<input type="radio" name="tri" value="nom">nom
        </form>
		</div>
		<div class="col-md-4">
		<form action="../c/afficher_recherche.php" method="POST">
			<input type="hidden" name="page" value="chevaux">
			<select name="champ" size="1">
				<option value="id">id
				<option value="nom">nom
			</select>
			<input type="textarea" name="recherche">
			<input class="btn btn-primary" type="submit" name="rechercher" value="Rechercher">
		</form>
		</div>
		</div>
		</div>
		</div>
    </body>
</html>