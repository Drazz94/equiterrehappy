<!DOCTYPE html>

<html>
	<head>
		<title>Facture</title>
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
			.jumbotron {
				color: black;
				background: #384452;
				min-width: 1200px;
			}
			#f {
				padding-top: 10px;
				padding-bottom: 70px;
				text-align: center;
			}
			.invoice-box {
	        max-width: 800px;
	        margin: auto;
	        padding: 30px;
	        border: 1px solid #eee;
	        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
	        font-size: 16px;
	        line-height: 24px;
	        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
	        color: #555;
	    }

	    .invoice-box table {
	        width: 100%;
	        line-height: inherit;
	        text-align: left;
	    }

	    .invoice-box table td {
	        padding: 5px;
	        vertical-align: top;
	    }

	    .invoice-box table tr td:nth-child(2) {
	        text-align: right;
	    }

	    .invoice-box table tr.top table td {
	        padding-bottom: 20px;
	    }

	    .invoice-box table tr.top table td.title {
	        font-size: 45px;
	        line-height: 45px;
	        color: #333;
	    }

	    .invoice-box table tr.information table td {
	        padding-bottom: 40px;
	    }

	    .invoice-box table tr.heading td {
	        background: #eee;
	        border-bottom: 1px solid #ddd;
	        font-weight: bold;
	    }

	    .invoice-box table tr.details td {
	        padding-bottom: 20px;
	    }

	    .invoice-box table tr.item td{
	        border-bottom: 1px solid #eee;
	    }

	    .invoice-box table tr.item.last td {
	        border-bottom: none;
	    }

	    .invoice-box table tr.total td:nth-child(2) {
	        border-top: 2px solid #eee;
	        font-weight: bold;
	    }

	    @media only screen and (max-width: 600px) {
	        .invoice-box table tr.top table td {
	            width: 100%;
	            display: block;
	            text-align: center;
	        }

	        .invoice-box table tr.information table td {
	            width: 100%;
	            display: block;
	            text-align: center;
	        }
	    }

	    /** RTL **/
	    .rtl {
	        direction: rtl;
	        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
	    }

	    .rtl table {
	        text-align: right;
	    }

	    .rtl table tr td:nth-child(2) {
	        text-align: left;
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
