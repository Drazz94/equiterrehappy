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
			.navbar-inverse .navbar-nav>li>a {
				color: #000;
			}
			.navbar-inverse .navbar-brand {
				color: #000;
			}
			.navbar-inverse {
				background-color : #1CC90E;
			}
			a:link, a:visited {
				background-color: #1CC90E;
				color: white;
				padding: 14px 25px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
			}
			body {
				font-weight: bold;
			}
			.lien_navbar:link, .lien_navbar:visited {
				background-color: #90EE90;
				color: black;

			}
			.lien_navbar:hover, .lien_navbar:active {
				background-color: white;
			}
			h1 {
				color: FORESTGREEN;
			}
			.jumbotron {
				color: black;
				background: #1CC90E;
				min-width: 1200px;
			}
			#f {
				padding-top: 10px;
				padding-bottom: 70px;
				text-align: center;
			}
  
		</style>
	</head>

	<body>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="accueil.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;&nbsp;&nbsp;EquiTerreHappy</a>
    </div>
    <ul class="nav navbar-nav">
          <li><a class="lien_navbar" href="../v/clients.php">CLIENTS</a></li>
          <li><a class="lien_navbar" href="../v/chevaux.php">CHEVAUX</a></li>
          <li><a class="lien_navbar" href="../v/produits.php">PRODUITS</a></li>
		  <li><a class="lien_navbar" href="../v/employes.php">EMPLOYÉS</a></li>
		  <li><a class="lien_navbar" href="../v/locations.php">LOCATIONS</a></li>
		  <li><a class="lien_navbar" href="../v/fournisseurs.php">FOURNISSEURS</a></li>
		  <li><a class="lien_navbar" href="../v/prestataires.php">PRESTATAIRES</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../c/deconnexion.php"><span class="glyphicon glyphicon-log-in"></span> Se déconnecter</a></li>
    </ul>
  </div>
</nav>
		
	<div class="container">
		<div class="jumbotron">
			<center><h1><u>EQUITERREHAPPY</u></h1><br>
                Bienvenue <?= $_SESSION['pseudo'];?>
            </center>
		</div>
		
        <div class="container">
  <ul class="nav nav-tabs">
    <li><a class="planning" href="../v/accueil.php?page=lo">Planning des Location</a></li>
    <li><a class="planning" href="../v/accueil.php?page=em">Planning des employés</a></li>
    <li><a class="planning" href="../v/accueil.php?page=ch">Planning des chevaux</a></li>
  </ul>
  <br>
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
	</body>
</html>