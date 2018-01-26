<?php

session_start();

$id= $_SESSION['idd'];
error_log('azeeee'.$_SESSION['idd']);

error_log('qqq'.$_SESSION['nom_page']);


// connexion à la base de données
include '../c/liaison_bdd.php';
 
if($_SESSION['nom_page'] == 'lo' || $_SESSION['nom_page'] =='ch'){
$requete = $bdd->prepare('DELETE FROM participer WHERE evenement_id = :id');
$requete->execute(array('id'=>$id));


}
else if($_SESSION['nom_page'] == 'em'){
    $requete1 = $bdd->prepare('DELETE FROM consulter WHERE agenda_id = :id');
    $requete1->execute(array('id'=>$id));
    error_log($_SESSION['idd']);

}

    $sql = "DELETE FROM evenement WHERE id = :id"; 
$q = $bdd->prepare($sql);                                                        
$q->execute(array(
    'id'=>$id));
header('location:../v/accueil.php?page='.$_SESSION['nom_page']);