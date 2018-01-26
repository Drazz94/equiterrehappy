<?php
	function choisir_service () {
		require('../c/liaison_bdd.php');

		$req = $bdd->query('SELECT designation FROM services');

		return $req;
	};

	function type_pension () {
		require('../c/liaison_bdd.php');

		$req = $bdd->query('SELECT * FROM locations');

		return $req;
	};

	function cheval ($id) {
		require('../c/liaison_bdd.php');

		$req=$bdd->query('
			SELECT ch.nom,ch.id
			FROM chevaux ch JOIN posseder p ON ch.id = p.chevaux_id
			JOIN clients cl ON cl.id = p.clients_id
			WHERE cl.id = '.$id
		);
		return $req;
	};

	function type_soin() {
		require('../c/liaison_bdd.php');

		$req=$bdd->query('SELECT * FROM prestations');

		return $req;
	};
	function produit () {
		require('../c/liaison_bdd.php');

		$req=$bdd->query('SELECT * FROM produits');

		return $req;
	};
	function location() {
		require('../c/liaison_bdd.php');

		$req=$bdd->query('SELECT * FROM locations');

		return $req;
	};

	function prestataire() {
		require('../c/liaison_bdd.php');

		$req = $bdd->query('SELECT * FROM prestataires');

		return $req;
	};

?>
