<?php
	$title = $_POST['nom'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	 
	include '../c/liaison_bdd.php';
	 
	$sql = "INSERT INTO evenement (title, start, end) VALUES (:title, :start, :end)";
	$q = $bdd->prepare($sql);
	$q->execute(array(
		':title'=>$title,
		':start'=>$start,
		':end'=>$end
	));

	header('location:../v/accueil.php');
?>