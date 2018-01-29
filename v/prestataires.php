<?php 
	session_start();
	require('../c/redirection.php');
?>
<?= $redirection ?>

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
						.dropbtn {
				display: inline-block;
				background-color: #81F79F;
				color: black;
				padding: 11px;
				font-size: 16px;
				border: 1 px solid;
				text-decoration: none;
			}

			.dropdown {
				position: relative;
				display: inline-block;
			}

			.dropdown-content {
				display: none;
				position: absolute;
				background-color: #f9f9f9;
				min-width: 160px;
				box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
				z-index: 1;
			}

			.dropdown-content a {
				color: black;
				padding: 12px 16px;
				text-decoration: none;
				display: block;
			}

			.dropdown-content a:hover {background-color: #EFFBEF}

			.dropdown:hover .dropdown-content {
				display: block;
			}

			.dropdown:hover .dropbtn {
				background-color: #EFFBEF;
			}
			 ul, .dropdown {
				list-style-type: none;
				margin: 0;
				padding: 0;
				border: 1px solid #e7e7e7;
				background-color: #81F79F;
				text-decoration: none;
			}

			li {
				float: left;
				border-right:1px solid #bbb;
				text-decoration: none;
			}

			li:last-child {
				border-right: none;
			}

			li a {
				
				display: inline-block;
				color: black;
				text-align: center;
				text-decoration: none;
				background-color: #81F79F;
				color: black;
				padding: 11px;
				font-size: 16px;
				border: 1px solid;
			
			}
			
			a:hover {
					background-color: #EFFBEF;
					text-decoration: none;
			}

			.active {
				background-color: #088A4B;
				text-decoration: none;
			}
	

			body {
				background-image:url(../ressources/eth_logo.png);
				background-position: right bottom;
				background-repeat:no-repeat;

				background-size: 35%;
				background-attachment:fixed;
				background-color: #FFF;
				font-weight: bold;

			
			th {
				text-align: center;
				border: 2px solid black;
				height: 30px;
				background-color: #90EE90;
				color: black;	
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
			.lien_id:link, .lien_id:visited {
				background-color: #90EE90;
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
	<ul class="nav nav-tabs">
		<li>
		<div class="dropdown">
			<a class="active" href="../v/accueil.php"><span class="glyphicon glyphicon-home"></span>&nbsp&nbspEQUITERREHAPPY</a>
		</div>
		<li>
		<div class="dropdown">
		  <a class="dropbtn" href="">GESTION CHEVAUX</a>
		  <div class="dropdown-content">
			<a href="../v/chevaux.php">Chevaux</a>
			<a href="../v/prestataires.php">Prestataires</a>
			<a href="../v/accueil.php?page=ch">Planning</a>
		  </div>
		</div>
		</li>
		<li>
		<div class="dropdown">
		  <a class="dropbtn" href="">GESTION MAGASIN</a>
		  <div class="dropdown-content">
			<a href="../v/produits.php">Produits</a>
			<a href="../v/fournisseurs.php">Fournisseurs</a>
		  </div>
		</div>
		</li>
		<li>
		<div class="dropdown">
		  <a class="dropbtn" href="">GESTION LOCATIONS</a>
		  <div class="dropdown-content">
			<a href="../v/locations.php">Locations</a>
			<a href="../v/accueil.php?page=lo">Planning</a>
		  </div>
		</div>
		</li>
		<li>
		<div class="dropdown">
			<a class="dropbtn" href="../v/clients.php">CLIENTS</a>
		</div>
		</li>
		<li>
		<div class="dropdown">
			<a class="dropbtn" href="../v/employes.php">EMPLOYÉS</a>
		</div>
		</li>

		<li style="float:right">
		<div class="dropdown">
			<a class="active" href="../c/deconnexion.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp&nbspDECONNEXION</a>
		</div>	
		</li>
    </ul>
	</br>
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