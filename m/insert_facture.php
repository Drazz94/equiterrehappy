<?php
  function insert_montant ($montant_facture,$id_facture) {
    include ('../c/liaison_bdd.php');

    $req = $bdd->prepare('UPDATE factures SET montant = :montant WHERE id = :id');
    $req->execute(array(
      'montant' => $montant_facture,
      'id' => $id_facture
    ));
  }
?>
