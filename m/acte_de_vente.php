<?php
	function acte_de_vente($id) {
		include '../c/liaison_bdd.php';
		
		$req = $bdd->prepare('SELECT * FROM clients WHERE id = :id');
		$req->execute(array(
			'id' => $id
		));
		$res = $req->fetch();
		
		return $res;
	}
?>