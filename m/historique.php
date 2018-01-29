<?php
  function historique($id) {
    require('../c/liaison_bdd.php');

    $req = $bdd->query(
      'SELECT
      FROM
    ');
    $res = $req->fetch();

    return $res;
  };
?>
