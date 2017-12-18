<?php
 
$id=$_POST['id'];
$title=$_POST['title'];
$start=$_POST['start'];
$end=$_POST['end'];


// connexion à la base de données
include '../c/liaison_bdd.php';
 
$sql = "DELETE FROM evenement WHERE id = :id";
$q = $bdd->prepare($sql);                                                                                                                   
$q->execute(array(
    'id'=>$id));
