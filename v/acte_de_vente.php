<!DOCTYPE html>

<html>
	<head>
		<title>Acte de vente</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
			body {
				font-weight: bold;
			}
			h1 {
				color: FORESTGREEN;
			}
			.gauche {
				float: left;
				margin-left: 50px;
			}
			.droite {
				float: right;
				margin-right: 50px;
			}
			.centre {
				float: left;
				position:absolute;
		    top: 35%;
		    width: 200px;
		    height: 200px;
		    margin-left: 50px;
			}
			.ajout {
				float: middle;
				position: absolute;
				margin-left: 40%;
				margin-right: 50%;
				margin-top: -70px;
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
					  <li><a href="../v/clients.php">CLIENTS</a></li>
					  <li><a href="../v/chevaux.php">CHEVAUX</a></li>
					  <li><a href="../v/produits.php">PRODUITS</a></li>
					  <li><a href="../v/employes.php">EMPLOYÉS</a></li>
					  <li><a href="../v/locations.php">LOCATIONS</a></li>
					  <li><a href="../v/fournisseurs.php">FOURNISSEURS</a></li>
					  <li><a href="../v/prestataires.php">PRESTATAIRES</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="../c/deconnexion.php"><span class="glyphicon glyphicon-log-in"></span> Se déconnecter</a></li>
				</ul>
			</div>
		</nav>

	</body>
</html>
