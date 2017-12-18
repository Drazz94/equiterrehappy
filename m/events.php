<?php

 $json = array();
 $requete = "SELECT * FROM evenement ORDER BY id";
 
include '../c/liaison_bdd.php';
$resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
 
 echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));
 
?>
