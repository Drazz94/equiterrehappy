<?php
	// session_start();
	
	include '../v/clients.html';
	include '../c/liaison_bdd.php';		
		$id = 3;
		
		//On supprime le client de la bdd
		$req = $bdd->prepare('SELECT * FROM posseder WHERE clients_id = :id');
		$req -> execute(array(
				'id' => $id
		));

		$result = $req->fetch();
		
		if(!empty($result)) {
			$res = $bdd->query('DELETE FROM posseder WHERE clients_id = '.$id);
			
			$req2 = $bdd -> prepare('DELETE FROM clients WHERE id = :id');
			$req2-> execute(array(
				'id' => $id
			));
			
			echo 'ok';
		}

?>