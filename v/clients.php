<?php 
	session_start();
	require('../c/redirection.php');
?>
<?= $redirection ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Clients</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>		
			th {
				text-align: center;
				border: 2px solid black;
				height: 30px;
				background-color: #90EE90;
				color: black;				
			}
			body {
				font-weight: bold;
				text-align: center;
			}
			label {
				width: 110px;
				display: inline-block;
				vertical-align: top;
				font-weight: 900;
				text-align: center;
			}
			fieldset {
				margin-bottom: 15px;
				padding: 10px;
			}
			row {
				margin-top: -220px;
				align: right;
			}
			.pagination a {
				color: green;
				float: left;
				padding: 8px 16px;
				text-decoration: none;
				transition: background-color .3s;
			}
			.lien_id:link, .lien_id:visited {
				background-color: #7FFF00;
				color: white;
				padding: 3px 3px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
			}
			.lien_id:hover, .lien_id:active {
				background-color: green;
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
      <li><a href="../c/deconnexion.php"><span class="glyphicon glyphicon-log-in"></span> Se déconnecter</a></li>
    </ul>
  </div>
</nav>
	<div class="container">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<form action="../c/ajouter_objet.php" method="post">
						<input type="hidden" name="page" value="clients">
						<label for="nom" class="inline">nom : </label><input type="text" name="nom" value=""><br> 
						<label for="prenom" class="inline">prenom : </label><input type="text" name="prenom" value=""><br> 
						<label for="adresse" class="inline">adresse : </label><input type="text" name="adresse" value=""><br> 
						<label for="mail" class="inline">mail : </label><input type="text" name="mail" value=""><br> 
						<label for="tel" class="inline">N° de telephone :  </label><input type="text" name="tel" value=""><br>
						<br><input class="btn btn-primary" type="submit" name="valider" value="valider">
					</form>
					<br>
				</div>
				
				<div class="col-md-4">
					<form action="../c/afficher_tout.php?n_page=" method="GET">
						<input type="hidden" name="page" value="clients">
						<input class="btn btn-primary" type="submit" name="valider" value="Afficher tous les clients">
						<br>Triez par :
						<input type="radio" name="tri" value="id" checked>id
						<input type="radio" name="tri" value="nom">nom
						<input type="radio" name="tri" value="prenom">prenom
					</form>
				</div>
				<div class="col-md-4">
					<form action="../c/afficher_recherche.php" method="POST">
						<input type="hidden" name="page" value="clients">
						<select name="champ" size="1">
							<option value="id">id
							<option value="nom">nom
							<option value="telephone">n°tel
							<option value="mail">mail
						</select>
						<input type="textarea" name="recherche"><br><br>
						<input class="btn btn-primary" type="submit" name="rechercher" value="Rechercher">
					</form>
				</div>
			</div>
		</div>
	</div>
    </body>
    </html>