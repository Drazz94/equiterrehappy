<?php
 
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];

 
include '../c/liaison_bdd.php';
 
$sql = "INSERT INTO evenement (title, start, end) VALUES (:title, :start, null)";
$q = $bdd->prepare($sql);
$q->execute(array(':title'=>$title, ':start'=>$start));
?>
