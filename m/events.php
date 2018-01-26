<?php

session_start();
error_log('yo'.$_SESSION['nom_page']);

//if($_SESSION['nom_page']=='lo'){ 
 $json = array();
 $requete = "SELECT * FROM evenement WHERE type = :type ORDER BY id";
 
include '../c/liaison_bdd.php';
$resultat = $bdd->prepare($requete) or die(print_r($bdd->errorInfo()));
$resultat->execute(array('type'=>$_SESSION['nom_page']));
 
 echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));
 /*}
else if($_SESSION['nom_page'] == 'em'){
     $json = array();
 $requete = "SELECT * FROM evenement WHERE type = 'em' ORDER BY id";
 
include '../c/liaison_bdd.php';
$resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
 
 echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));
}
else if($_SESSION['nom_page']=='ch'){
     $json = array();
 $requete = "SELECT * FROM evenement WHERE type = 'ch' ORDER BY id";
 
include '../c/liaison_bdd.php';
$resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
 
 echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));
}*/

?>
