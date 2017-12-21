<?php 
	session_start();
	require('../c/redirection.php');
?>
<?= $redirection ?>


<!DOCTYPE html>
<html>
	<head>
		<title>Produits</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
			th {
				text-align: center;
				border: 2px solid black;
				height: 30px				
			}
			body {
				font-weight: bold;
				text-align: center;
			}
			label {
				width: 110px;
				display: inline-block;
				vertical-align: top;
				margin: 6px;
			}			
			fieldset {
				margin-bottom: 15px;
				padding: 10px;
			}
			legend {
				padding: 0px 3px;
				font-weight: bold;
				font-variant: small-caps;
			}
			.lien_id:link, .lien_id:visited {
				background-color: #000000;
				color: white;
				padding: 3px 3px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
			}
			.lien_id:hover, .lien_id:active {
				background-color: grey;
			}
		</style>
	</head>

	<body>
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
			<input type="hidden" name="page" value="produits">
			<label for="designation">designation : </label><input type="text" name="designation" value=""><br>  
			<label for="quantite">quantité : </label><input type="number" name="quantite" value=""><br>
			<label for="prix_vente">prix de vente : </label><input type="float" name="prix_vente" value=""><br>
			<label for="prix_achat">prix d'achat : </label><input type="float" name="prix_achat" value=""><br>
			<label for="fournisseur">mail du fournisseur : </label><input type="text" name="fournisseur" value=""><br>
            <br><input class="btn btn-primary" type="submit" name="valider" value="confirmer">
        </form>
		</div>
				<div class="col-md-4">
        <form action="../c/afficher_tout.php" method="GET">
			<input type="hidden" name="page" value="produits">
            <input class="btn btn-primary" type="submit" name="valider" value="Afficher la liste des produits"><br>
			Triez par :
			<input type="radio" name="tri" value="designation" checked>designation
			<input type="radio" name="tri" value="prix_vente">prix de vente
        </form>
		</div>
				<div class="col-md-4">
		<form action="../c/afficher_recherche.php" method="POST">
			<input type="hidden" name="page" value="produits">
			<select name="champ" size="1">
				<option value="id">id
				<option value="designation">designation
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
