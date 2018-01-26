<?php
  require('../m/facture.php');
  include('../v/facture.php');

  $id = $_POST['id'];
  $date = $_POST['date'];
  $date1 = $_POST['heure'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $mail = $_POST['mail'];
  $telephone = $_POST['telephone'];
  $service = $_POST['service'];

  $informations = array(
    'id' => $id,
    'date' => $date,
    'heure' => $date1,
    'nom' => $nom,
    'prenom' => $prenom,
    'mail' => $mail,
    'telephone' => $telephone,
    'service' => $service
  );

  for($i=0; $i<COUNT($service); $i++) {
    if($service[$i] == 'soins') {
      $cheval_soin = $_POST['cheval_soin'];
      $type_soin = $_POST['type_soin'];
      $prestataire = $_POST['prestataire'];
      $start = $_POST['start'];
      $end = $_POST['end'];

      $info_soins = array(
        'cheval_soin' => $cheval_soin,
        'type_soin' => $type_soin,
        'prestataire' => $prestataire,
        'end' => $end,
        'start' => $start
      );
      $informations = array_merge($informations,$info_soins);
    }
    if($service[$i] == 'location') {
      $location = $_POST['location'];
      $date_debut = $_POST['date_debut'];
      $date_fin = $_POST['date_fin'];

      $info_location = array(
        'location' => $location,
        'date_debut' => $date_debut,
        'date_fin' => $date_fin
      );
      $informations = array_merge($informations,$info_location);
    }
    if($service[$i] == 'vente') {
      $produit = $_POST['produit'];
      $quantite = $_POST['quantite'];

      $info_vente = array(
        'produit' => $produit,
        'quantite' => $quantite
      );
      $informations = array_merge($informations,$info_vente);
    }
    if($service[$i] == 'pension') {
      $cheval_pension = $_POST['cheval_pension'];
      $nb_pension = $_POST['nb_pension'];
      $pension = $_POST['pension'];

      $info_pension = array(
        'cheval_pension' => $cheval_pension,
        'nb_pension' => $nb_pension
      );
      $informations = array_merge($informations,$info_pension);
    }
    if($service[$i] == 'nourrir') {
      $cheval_nourrir = $_POST['cheval_nourrir'];
      $nb_nourrir = $_POST['nb_nourrir'];

      $info_nourrir = array(
        'cheval_nourrir' => $cheval_nourrir,
        'nb_nourrir' => $nb_nourrir
      );
      $informations = array_merge($informations,$info_nourrir);
    }
    if($service[$i] == 'travail') {
      $cheval_travail = $_POST['cheval_travail'];
      $nbtravail = $_POST['nbtravail'];

      $info_travail = array(
        'cheval_travail' => $cheval_travail,
        'nbtravail' => $nbtravail
      );
      $informations = array_merge($informations,$info_travail);
    }
  }

  // creer_facture($informations);

  
?>
