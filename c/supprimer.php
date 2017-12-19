<?php
	
	$page = $_POST['page'];
	$id = $_POST['id'];
	
	include '../c/liaison_bdd.php';
	include '../v/'.$page.'.php';
	
	if ($page == 'clients') {
		$req = $bdd->query('SELECT * FROM posseder WHERE clients_id = '.$id);

		$result = $req->fetch();
		
		if(!empty($result)) {
			
			$req1 = $bdd->query('SELECT ch.id FROM chevaux ch JOIN posseder p ON ch.id = p.chevaux_id JOIN clients c ON c.id = p.clients_id  WHERE c.id = '.$id);
		
			$req2 = $req1->fetch();
		
			$req3 = $bdd->query('DELETE FROM chevaux WHERE id = '.$req2['id']);
			
			$req4 = $bdd->query('DELETE FROM posseder WHERE clients_id = '.$id);
			
			$req5 = $bdd->query('DELETE FROM clients WHERE id = '.$id);			
			
			echo 'Suppression du lien dans posseder et du client et du cheval associé';

		}
		else if (empty($result)) {
			
			$req3 = $bdd->query('DELETE FROM clients WHERE id = '.$id);
			
			echo 'Suppression du client';
			
		}
	}
	else if ($page == 'chevaux') {
		
		$req = $bdd->query('SELECT * FROM posseder WHERE chevaux_id = '.$id);

		$result = $req->fetch();
		
		if(!empty($result)) {
			
			$req1 = $bdd->query('DELETE FROM posseder WHERE chevaux_id = '.$id);
			
			$req2 = $bdd->query('DELETE FROM chevaux WHERE id = '.$id);
			
			echo 'Suppression du lien posseder et du cheval';

		}
		else if (empty($result)) {
			
			$req3 = $bdd->query('DELETE FROM chevaux WHERE id = '.$id);
			
			echo 'Suppression du cheval';
			
		}	
	}
	else if ($page == 'produits') {
		
		$req = $bdd->query('SELECT * FROM fournir WHERE produits_id = '.$id);

		$result = $req->fetch();
		
		if(!empty($result)) {
			
			$req1 = $bdd->query('DELETE FROM fournir WHERE produits_id = '.$id);
			
			$req2 = $bdd->query('DELETE FROM produits WHERE id = '.$id);
			
			echo 'Suppression de founir et produits';

		}
		else if (empty($result)) {
			
			$req3 = $bdd->query('DELETE FROM produits WHERE id = '.$id);
			
			echo 'Suppression de produits';
			
		}	
	}
	else if ($page == 'prestataires') {
		
		$req = $bdd->query('SELECT * FROM effectuer WHERE prestataires_id = '.$id);

		$result = $req->fetch();
		
		if(!empty($result)) {
			
			$req1 = $bdd->query('DELETE FROM effectuer WHERE prestataires_id = '.$id);
			
			$req2 = $bdd->query('DELETE FROM prestataires WHERE id = '.$id);
			
			echo 'Suppression de effecteur et prestataires';

		}
		else if (empty($result)) {
			
			$req3 = $bdd->query('DELETE FROM prestataires WHERE id = '.$id);
			
			echo 'Suppression de prestataires';
			
		}	
	}
	else if ($page == 'fournisseurs') {
		
		$req = $bdd->query('SELECT * FROM fournir WHERE fournisseurs_id = '.$id);

		$result = $req->fetch();
		
		if(!empty($result)) {
			
			$req1 = $bdd->query('SELECT p.id FROM produits p JOIN fournir f ON p.id = f.produits_id JOIN fournisseurs feurs ON feurs.id = f.fournisseurs_id WHERE feurs.id = '.$id);
			
			$req2 = $req1->fetch();
			
			$req3 = $bdd->query('DELETE FROM produits WHERE id = '.$req2['id']);
			
			$req4 = $bdd->query('DELETE FROM fournir WHERE fournisseurs_id = '.$id);
			
			$req5 = $bdd->query('DELETE FROM fournisseurs WHERE id = '.$id);
			
			echo 'Suppression de fournir et fournisseurs';

		}
		else if (empty($result)) {
			
			$req3 = $bdd->query('DELETE FROM fournisseurs WHERE id = '.$id);
			
			echo 'Suppression de fournisseurs';
			
		}	
	}
	else if ($page == 'locations') {
		
		$req = $bdd->query('SELECT * FROM louer WHERE locations_id = '.$id);

		$result = $req->fetch();
		
		if(!empty($result)) {
			
			$req1 = $bdd->query('DELETE FROM louer WHERE locations_id = '.$id);
			
			$req2 = $bdd->query('DELETE FROM locations WHERE id = '.$id);
			
			echo 'Suppression de louer et locations';

		}
		else if (empty($result)) {
			
			$req3 = $bdd->query('DELETE FROM locations WHERE id = '.$id);
			
			echo 'Suppression de locations';
			
		}	
	}
	else if ($page == 'employes') {
		
		$req1 = $bdd->query('DELETE FROM employes WHERE id = '.$id);
		
		echo 'Suppression d\'employes';
		
	}
?>