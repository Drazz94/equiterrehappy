	<?php

ob_start();

    $title = $_POST['nom'];
	$start = $_POST['start'];
	$end = $_POST['end'];
    $mail_client = $_POST['mail'];

echo $mail_client;

	include '../c/liaison_bdd.php';
	 

$requete = $bdd->prepare('SELECT id FROM clients WHERE mail = :mail');
$requete->execute(array('mail'=>$mail_client));
$id_client = $requete->fetch();
echo'bb'.$id_client['id'];

	$sql = "INSERT INTO evenement (title, start, end, id_client, type) VALUES (:title, :start, :end, :id, 'lo')";
	$q = $bdd->prepare($sql);
	$q->execute(array(
		'title'=>$title,
		'start'=>$start,
		'end'=>$end,
        'id'=>$id_client['id']
	));
    $id_ev = $bdd->lastInsertId();
echo 'je'.$id_ev;



$requete4 = $bdd->prepare('SELECT prix FROM locations WHERE nom = :nom');
$requete4->execute(array('nom'=>$title));
$prix_loc = $requete4->fetch();

$requete1= $bdd->prepare('INSERT INTO factures (clients_id, etat, montant) VALUES(:id, 0, :prix)');
$requete1->execute(array('id'=>$id_client['id'], 'prix'=>$prix_loc['prix']));
$id_facture = $bdd->lastInsertId();
echo 'a'.$id_facture;

$requete2 = $bdd->prepare('INSERT INTO participer (services_id, evenement_id) VALUES (3, :id)');
$requete2->execute(array('id'=>$id_ev));

$requete3 = $bdd->prepare('INSERT INTO choisir_service (factures_id, services_id) VALUES (:id, 3)');
$requete3->execute(array('id'=>$id_facture));

$post_res = ob_get_clean();
//////////////////////////////////////////////////////
ob_start();

$start = $_POST['start'];
$end = $_POST['end'];
$qui = $_POST['qui'];
$id_em = $_POST['id_em'];

$requete5 = $bdd->prepare('INSERT INTO evenement (title, start, end, id_client, type) VALUES (:title, :start, :end, :id, "em")');
$requete5->execute(array(
                        'title'=>$qui,
                        'start'=>$start,
                        'end'=>$end,
                        'id'=>$id_em));
$id_ev_em = $bdd->lastInsertId();

$requete6 = $bdd->prepare('INSERT INTO consulter (employes_id, agenda_id) VALUES (:id_em, :id_ev)');
$requete6->execute(array(
                        'id_em'=>$id_em,
                        'id_ev'=>$id_ev_em));

$planning_em = ob_get_clean();

/////////////////////////////////////////
?>