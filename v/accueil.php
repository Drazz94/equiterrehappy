<?php 
	session_start();
	require('../c/redirection.php');
?>
<?= $redirection ?>

<!DOCTYPE html>

<html>
	<head>
		<title>Accueil</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
			td {
				background-color: #f2f2f2;
			}
			.btn {
				display: inline-block;
				background-color: #81F79F;
				color: black;
				padding: 11px;
				font-size: 16px;
				border: 1 px solid;
				text-decoration: none;
				font-weight: bold;
			}
			.dropbtn {
				border-radius: 6px;
				background-color: light grey;
				color: dark green;
				padding: 6px 4px 6px 4px;
				font-size: 16px;
				border: 1px solid green;
				text-decoration: none;
			}
			.dropbtn2 {
				border-radius: 6px;
				background-color: light green;
				color: black;
				padding: 7px 4px 8px 4px;
				font-size: 16px;
				border: 1 px solid;
				text-decoration: none;
			}
			.dropbtn3	 {
				border-radius: 6px;
				background-color: light green;
				color: black;
				padding: 6px 4px 6px 4px;
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
				padding: 12px 12px;
				text-decoration: none;
				display: block;
			}

			.dropdown-content a:hover {
				background-color: #EFFBEF
			}

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
				background-color: #f2f2f2;
				text-decoration: none;
			}
			tbody:nth-child(odd) {
				background: #f2f2f2;
			}		
			th {
				text-align: center;
				border: 2px solid black;
				height: 30px;
				background-color: #81F79F;
				color: black;	
			}
			.popup {
				background-color: #81F79F;
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
				background-color: #81F79F;
				color: black;
				padding: 3px 10px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
			}
			.lien_id:hover, .lien_id:active {
				background-color: #EFFBEF;
			}


		

			li a {
				border-radius: 6px;
				display: inline-block;
				color: white;
				text-align: center;
				text-decoration: none;
				background-color: #E6E6E6;
				padding: 6px 4px 6px 4px;
				font-size: 16px;
				border: 1px solid red;
			
			}
			
			a:hover {
					background-color: #EFFBEF;
					text-decoration: none;
			}

			.active {
				background-color: #DF0101;
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

			}

			.jumbotron {
				overflow: hidden;
				color: black;
				background-color: #81F79F;
				min-width: 860px;
				height: 130px;

			}
			#f {
				padding-top: 10px;
				padding-bottom: 70px;
				text-align: center;
			}
  
		</style>
	</head>

	<body>
	
	<ul class="nav nav-tabs">
		<li>
		<div class="dropdown">
			<a   class="active" href="../v/accueil.php"><img src ="../ressources/icon_maison.png">&nbspEQUITERREHAPPY</a>
		</div>
		<li>
		<div class="dropdown">
		  <a class="dropbtn" href=""><img src ="../ressources/icon_cheval.png">&nbspGESTION CHEVAUX</a>
		  <div class="dropdown-content">
			<a href="../v/chevaux.php">Chevaux</a>
			<a href="../v/prestataires.php">Prestataires</a>
			<a href="../v/accueil.php?page=ch">Planning</a>
		  </div>
		</div>
		</li>
		<li>
		<div class="dropdown">
		  <a class="dropbtn2" href=""><img src ="../ressources/icon_magasin.png">&nbspGESTION MAGASIN</a>
		  <div class="dropdown-content">
			<a href="../v/produits.php">Produits</a>
			<a href="../v/fournisseurs.php">Fournisseurs</a>
		  </div>
		</div>
		</li>
		<li>
		<div class="dropdown">
		  <a class="dropbtn" href=""><img src ="../ressources/icon_location.png">&nbspGESTION LOCATIONS</a>
		  <div class="dropdown-content">
			<a href="../v/locations.php">Locations</a>
			<a href="../v/accueil.php?page=lo">Planning</a>
		  </div>
		</div>
		</li>
		<li>
		<div class="dropdown">
			<a class="dropbtn" href="../v/clients.php"><img src ="../ressources/icon_client.png">&nbspCLIENTS</a>
		</div>
		</li>
		<?php
		if($_SESSION['pseudo']=="Ajulie") {
			echo '
				<li>
				<div class="dropdown">
					<a class="dropbtn3" href="../v/employes.php"><img src="../ressources/icon_employe.png">&nbspEMPLOYÉS</a>
				</div>
				</li>';
		}
		?>
		<li style="float:right">
		<div class="dropdown">
			<a class="active" href="../c/deconnexion.php"><img src="../ressources/icon_deco.png">&nbspDECONNEXION</a>
		</div>	
		</li>
    </ul>
	</br>

	<div class="container">
		<div class="row">
			<div class="col-md-2">
					<ul class="nav nav-tabs">
						<li><a  href="../v/accueil.php?page=lo">Planning Locations</a></li><br>
						<li><a  href="../v/accueil.php?page=em">Planning Employés</a></li><br>
						<li><a class="bouton_planning" href="../v/accueil.php?page=ch">Planning Chevaux</a></li><br>
					</ul>
				</div>
				<div class="col-md-9">
					<div class="jumbotron">
						<center>
							Bienvenue <?= $_SESSION['pseudo'];?>
						</center>
					</div>
				</div>
  <br>
		<div class="row">
			<div class="col-md-offset-2 col-md-9">
				<?php 
						
					if(!isset($_GET['page'])){
						$_GET['page'] = 'lo';
					}
								$_SESSION['nom_page'] = $_GET['page'];

					include'../m/m_calendrier.php';
					
					if(isset($_POST['sess'])){
							  $requete = $bdd->prepare('SELECT * FROM clients WHERE id = :id');
					$requete->execute(array('id'=> $_SESSION['test']));
					$donne= $requete->fetch();
					echo '<br>'.$donne['prenom'].' '.$donne['nom'].'<br>'.$donne['mail'].'<br>'.$donne['telephone'].'<br>';
			   
					}   
				?>
			</div>
		</div>
		</div>
	</div>
	</body>
</html>