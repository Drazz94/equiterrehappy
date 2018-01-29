<?php

  function creer_facture ($informations) {
    include('../c/liaison_bdd.php');

    $id = $_POST['id'];
    $date = $_POST['date'];
    $date1 = $_POST['heure'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $telephone = $_POST['telephone'];
    $service = $_POST['service'];

    $req = $bdd->query('INSERT INTO factures(clients_id,etat) VALUES('.$id.',0)');
    $id_facture = $bdd->lastInsertId();

    $facture = array('id_facture' => $id_facture);

    for($i=0; $i<COUNT($service); $i++) {
      if($service[$i] == 'soins') {
        $cheval = $informations['cheval_soin'];
        $prestation = $informations['type_soin'];
        $prestataire = $informations['prestataire'];
        $start = $informations['start'];
        $end = $informations['end'];

//RECUPERE L'ID PRESTATION ET INSERT DANS CONCERNER
        $requete = $bdd->query('SELECT id FROM prestations WHERE designation = "'.$prestation.'"');
        $result = $requete->fetch();
        $id_prestation = $result['id'];

        $req = $bdd->prepare('INSERT INTO concerner(chevaux_id,prestations_id) VALUES(:cheval,:prestation)');
        $req->execute(array(
          'cheval' => $cheval,
          'prestation' => $id_prestation
        ));

//RECUPERE ID DU SERVICE SOIN ET INSERT DANS CHOISIR SERVICE
        $req1 = $bdd->query('SELECT id FROM services WHERE designation = "'.$service[$i].'"');
        $res1 = $req1->fetch();

        $req2 = $bdd->prepare('INSERT INTO choisir_service(factures_id,services_id) VALUES(:facture,:service)');
        $req2->execute(array(
          'facture' => $id_facture,
          'service' => $res1['id']
        ));

//RECUPERE LE NOM DU CHEVAL ET INSERT DANS EVENEMENT
        $requete1 = $bdd->query('SELECT nom FROM chevaux WHERE id = "'.$cheval.'"');
        $result1 = $requete1->fetch();
        $nom_cheval = $result1['nom'];

        $title = $prestation.'_'.$nom_cheval;
        $req3 = $bdd->prepare('INSERT INTO evenement(title,start,end,id_client,type) VALUES(:title,:start,:end,:id_client,"ch")');
        $req3->execute(array(
          'title' => $title,
          'start' => $start,
          'end' => $end,
          'id_client' => $id
        ));
        $id_evenement = $bdd->lastInsertId();

//INSERT DANS PARTICIPER
        $req4 = $bdd->prepare('INSERT INTO participer(services_id,evenement_id) VALUES (:service,:evenement)');
        $req4->execute(array(
          'service' => $service[$i],
          'evenement' => $id_evenement
        ));

        $req5 = $bdd->prepare('SELECT prix_refacture
          FROM prestations
          WHERE id = :id_prestations');
        $req5->execute(array(
          'id_prestations' => $id_prestation,
        ));
        $result = $req5->fetch();

        $req6 = $bdd->query('SELECT prix_deplacement FROM prestataires WHERE id = '.$prestataire);
        $resultat = $req6->fetch();

        $prix_refacture = $result['prix_refacture'];
        $prix_deplacement = $resultat['prix_deplacement'];
        $montant_soin = $prix_refacture+$prix_deplacement;

        $requ = $bdd->query('SELECT * FROM prestataires WHERE id = '.$prestataire);
        $resu = $requ->fetch();
        $pr_nom = $resu['nom'];
        $pr_prenom = $resu['prenom'];

        $infos_soins = array(
          'montant_soin' => $montant_soin,
          'prix_refacture' => $prix_refacture,
          'prix_deplacement' => $prix_deplacement,
          'prestataire' => $prestataire,
          'prestation' => $prestation,
          'cheval_soins' => $nom_cheval,
          'nom_pr' => $pr_nom,
          'prenom_pr' => $pr_prenom
        );
        $facture = array_merge($facture,$infos_soins);
      }
      if($service[$i] == 'location') {
        $location = $informations['location'];
        $date_debut = $informations['date_debut'];
        $date_fin = $informations['date_fin'];

        $req = $bdd->query('SELECT * FROM locations WHERE id = '.$location);
        $res = $req->fetch();

        $req1 = $bdd->query('SELECT id FROM services WHERE designation = "'.$service[$i].'"');
        $res1 = $req1->fetch();
        $id_service = $res1['id'];
        $nom_loc = $res['nom'];

        $req2 = $bdd->prepare('INSERT INTO louer(locations_id,services_id) VALUES(:location,:service)');
        $req2->execute(array(
          'location' => $location,
          'service' => $id_service
        ));

        $req3 = $bdd->prepare('INSERT INTO choisir_service(factures_id,services_id) VALUES(:facture,:service)');
        $req3 -> execute(array(
          'facture' => $id_facture,
          'service' => $id_service
        ));

        $title = $location.'_'.$nom.'_'.$prenom;
        $req4 = $bdd->prepare('INSERT INTO evenement(title,start,end,id_client,type) VALUES(:title,:start,:end,:id_client,"lo")');
        $req4->execute(array(
          'title' => $title,
          'start' => $date_debut,
          'end' => $date_fin,
          'id_client' => $id
        ));
        $id_evenement = $bdd->lastInsertId();

        $req5 = $bdd->prepare('INSERT INTO participer(services_id,evenement_id) VALUES(:service,:evenement)');
        $req5->execute(array(
          'service' => $id_service,
          'evenement' => $id_evenement
        ));
        $req6 = $bdd->query('SELECT prix FROM locations WHERE id = '.$location);
        $result = $req6->fetch();
        $prix_loc = $result['prix'];

        $datetime1 = date_create($date_debut);
        $datetime2 = date_create($date_fin);
        $duree = date_diff($datetime1,$datetime2);
        $duree = $duree->format('%a');
        $montant_location = $prix_loc * $duree;

        $infos_loc = array(
          'location' => $nom_loc,
          'debut' => $date_debut,
          'fin' => $date_fin,
          'montant_loc' => $montant_location
        );

        $facture = array_merge($facture,$infos_loc);
      }
      if($service[$i] == 'vente') {
        $produit = $informations['produit'];
        $quantite = $informations['quantite'];

        $req1 = $bdd->query('SELECT id FROM services WHERE designation = "'.$service[$i].'"');
        $res1 = $req1->fetch();
        $id_service = $res1['id'];

        $req = $bdd->query('SELECT * FROM produits WHERE id = '.$produit);
        $res = $req->fetch();
        $nom_produit = $res['designation'];
        $prix_vente = $res['prix_vente'];

        $req2 = $bdd->prepare('INSERT INTO contenir(factures_id,produits_id) VALUES(:facture,:produit)');
        $req2->execute(array(
          'facture' => $id_facture,
          'produit' => $produit
        ));

        $req3 = $bdd->prepare('INSERT INTO choisir_service(services_id,factures_id) VALUES(:service,:facture)');
        $req3->execute(array(
          'service' => $id_service,
          'facture' => $id_facture
        ));
        $montant_vente = $prix_vente * $quantite;
        $infos_vente = array(
          'produit' => $nom_produit,
          'montant_vente' => $montant_vente,
          'quantite' => $quantite
        );
        $facture = array_merge($facture,$infos_vente);
      }
      if($service[$i] == 'pension') {
        $cheval_pension = $informations['cheval_pension'];
        $nb_pension = $informations['nb_pension'];
        $id_pension = $informations['pension'];

        $req1 = $bdd->prepare('SELECT id FROM services WHERE designation = "pension"');
        $res1 = $req1->fetch();
        $id_service = $res1['id'];

        $req = $bdd->query('SELECT * FROM locations WHERE id = '.$id_pension);
        $res = $req->fetch();
        $pension = $res['nom'];
        $prix = $res['prix'];

        $req2 = $bdd->prepare('INSERT INTO louer(locations_id,services_id) VALUES(:location,:service)');
        $req2->execute(array(
          'location' => $id_pension,
          'service' => $id_service
        ));
        $req3 = $bdd->prepare('INSERT INTO choisir_service(factures_id,services_id) VALUES(:facture,:service)');
        $req3->execute(array(
          'facture' => $id_facture,
          'service' => $id_service
        ));

        $req4 = $bdd->query('SELECT nom FROM chevaux WHERE id = '.$cheval_pension);
        $result = $req4->fetch();

        $infos_pension = array(
          'prix_pension' => $prix,
          'pension' => $pension,
          'prix' => $prix,
          'duree' => $nb_pension,
          'cheval_pension' => $result['nom']
        );
        $facture = array_merge($facture,$infos_pension);
      }
      if($service[$i] == 'copeaux') {
        $cheval_copeaux = $informations['cheval_copeaux'];

        $req = $bdd->query('SELECT nom FROM chevaux WHERE id = '.$cheval_copeaux);
        $res = $req->fetch();
        $infos_copeaux = array('montant_copeaux' => 30, 'cheval_copeaux' => $res['nom']);
        $facture = array_merge($facture,$infos_copeaux);
      }
    }
    return $facture;
  };
?>
