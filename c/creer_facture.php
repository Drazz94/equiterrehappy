<?php
  require('../m/facture.php');
  include('../v/facture.php');
  require('../m/insert_facture.php');

  $id = $_POST['id'];
  $date = $_POST['date'];
  $date1 = $_POST['heure'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $mail = $_POST['mail'];
  $telephone = $_POST['telephone'];
  $service = $_POST['service'];
  $adresse = $_POST['adresse'];

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
        'pension' => $pension,
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
    if($service[$i] == 'copeaux') {
      $cheval_copeaux = $_POST['cheval_copeaux'];
      $info_copeaux = array('cheval_copeaux' => $cheval_copeaux);
      $informations = array_merge($informations,$info_copeaux);
    }
  }
  $facture = creer_facture($informations);
  $montant_facture = 0;

  echo '<br>
  <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                              EQUITERREHAPPY !
                            </td>
                            <td>
                                <h2>Facture #'.$facture['id_facture'].'</h2><br>
                                Créée le: '.$date.' '.$date1.'<br>
                            </td>
                        </tr>
                        <tr class="information">
                          <td colspan="2">
                              <table>
                                  <tr>
                                      <td>
                                          '.$nom.' '.$prenom.'<br>
                                          '.$adresse.'<br>
                                          '.$mail.'<br>
                                          '.$telephone.'<br>
                                      </td>
                                      <td>
                                          EQUITERREHAPPY<br>
                                          74 rue Maurice Thorez<br>
                                          94200 IVRY-SUR-SEINE<br>
                                      </td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                    </table>
                </td>
            </tr>';
    echo '
         <tr class="heading">
              <td>
                  Description
              </td>
              <td>
                  Prix (en €)
              </td>
          </tr>';
    for($i=0; $i<COUNT($service); $i++) {
      if($service[$i] == 'soins') {
        echo '
          <tr class="item">
          <td>SOINS<br>'.$facture['prestation'].' (par '.$facture['nom_pr'].' '.$facture['prenom_pr'].')<br>
          Concerne : '.$facture['cheval_soins'].'<br>
          Comprend : ('.$facture['prix_deplacement'].'€ de déplacement et '.$facture['prix_refacture'].'€ de soins)</td>
          <td>'.$facture['montant_soin'].'</td></tr>';
        $montant_facture = $montant_facture + $facture['montant_soin'];
      }
      if($service[$i] == 'pension') {
        echo '
          <tr class="item">
          <td>PENSION<br>'.$facture['pension'].'<br>
          Concerne : '.$facture['cheval_pension'].'<br>
        <td>'.$facture['prix'].'</td></tr>';
        $montant_facture = $montant_facture + $facture['prix'];
      }
      if($service[$i] == 'location') {
        echo '
          <tr class="item">
            <td>Location de : '.$facture['location'].'<br>
            Sur la période du '.$facture['debut'].' au '.$facture['fin'].'</td>
          <td>'.$facture['montant_loc'].'</td></tr>';
          $montant_facture = $montant_facture + $facture['montant_loc'];
      }
      if($service[$i] == 'vente') {
        echo '
          <tr class="item">
          <td>VENTE<br>'.$facture['produit'].'<br>
          Quantité : '.$facture['quantite'].'</td>
          <td>'.$facture['montant_vente'].'</td></tr>';
          $montant_facture = $montant_facture + $facture['montant_vente'];
      }
      if($service[$i] == 'copeaux') {
        echo '<tr class="item">
          <td>SUPPLÉMENT COPEAUX<br>
          Concerne : '.$facture['cheval_copeaux'].'</td>
          <td>'.$facture['montant_copeaux'].'</td></tr>';
          $montant_facture = $montant_facture + $facture['montant_copeaux'];
      }
    }
          echo '
            <tr class="total">
              <td></td>
              <td><h3><u>Total TTC :</u> '.$montant_facture.'</h3></td>
            </tr>
          </table>
      </div><br><br>
      <center><a href="../v/accueil.php"><button>Retour à l\'accueil</button></a></center>
      <br><br>
    </body>
    </html>
    ';
    insert_montant($montant_facture,$facture['id_facture']);
?>
