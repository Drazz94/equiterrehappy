<?php require('../c/redirection.php');?>
<?= $redirection ?>
?>

<!DOCTYPE html>

<html>
	<head>
	
		<title> Prestataires </title>
		<meta charset = "utf-8">
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
			fieldset {
				margin-bottom: 15px;
				padding: 10px;
			}
			row {
				margin-top: -220px;
				align: right;
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
      <li><a href="/eth/index.php"><span class="glyphicon glyphicon-log-in"></span> Se déconnecter</a></li>
    </ul>
  </div>
</nav>
<div class="container">
<div class="container-fluid">
			<div class="col-md-4">	
		<form method = "post" action = "/eth/c/ajouter_objet.php">
				<input type="hidden" name="page" value="prestataires">
				<label for = "lnom"> Nom : </label> 
				<input type = "text" name = "nom" id = "lnom" value = ""/><br/>
				<label for = "lprenom"> Prenom : </label> 
				<input type = "text" name = "prenom" id = "lprenom" value = ""/><br/>
				<label for = "ladresse"> Adresse : </label> 
				<input type = "text" name = "adresse" id = "ladresse" value = ""/><br/>
				<label for = "lentreprise"> Entreprise : </label> 
				<input type = "text" name = "entreprise" id = "lentreprise" value = ""/><br/>
				<label for = "lmail"> Email : </label> 
				<input type = "text" name = "mail" id = "lmail" value = ""/><br/>
				<label for = "ltelephone"> Téléphone : </label> 
				<input type = "text" name = "telephone" id = "ltelephone" value = ""/><br/>
				<label for = "ltelephone"> Prix Dép : </label> 
				<input type = "text" name = "prix_deplacement" id = "lprix_deplacement" value = ""/><br/>
				<input class="btn btn-primary" type = "submit" name = "valider" value = "Ajouter" /><br/>
		</form>
		</div>
		<div class="col-md-4">
		<form method = "GET" action = "/eth/c/afficher_tout.php">
				<input type="hidden" name="page" value="prestataires">
				<input class="btn btn-primary" type = "submit" name = "valider" value = "Liste des prestataires"><br>
				Trier par : 
				<input type = "radio" name = "tri" value = "id" checked>ID
				<input type = "radio" name = "tri" value = "nom" >Nom
				<input type = "radio" name = "tri" value = "prenom"/>Prenom
        </form>
		</div>
		<div class="col-md-4">
		<form action="../c/afficher_recherche.php" method="POST">
			<input type="hidden" name="page" value="prestataires">
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
	</body>

</html>