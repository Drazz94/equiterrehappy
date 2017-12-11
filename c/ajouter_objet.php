<?php
	include './liaison_bdd.php';
	
	$page = $_POST['page'];
	
	if($page == 'clients') {
		include('c:/wamp64/www/eth/v/clients.html');
		
        if(empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['adresse']) || empty($_POST['mail'])|| empty($_POST['tel']) ){
			
            echo '<div class="container">ATTENTION ! Vous n\'avez pas rempli tous les champs</div>';
			
        } else if(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i', $_POST['mail']) && preg_match("#^0[0-9]([_. ]?[0-9]{2}){4}$#", $_POST['tel'])){
            $prenom = htmlspecialchars($_POST['prenom']);
            $nom = htmlspecialchars($_POST['nom']);
            $adresse = htmlspecialchars($_POST['adresse']);
            $mail = htmlspecialchars($_POST['mail']);
            $tel = htmlspecialchars($_POST['tel']);
            
            $req = $bdd->prepare('SELECT mail FROM clients WHERE mail = :mail');
            $req -> execute(array(
                    'mail' => $mail
                ));
            $result = $req->fetch();
			if(!empty($result)){
				echo 'Le client existe deja dans la base de données.';
			}
			else{
				$req = $bdd ->prepare('INSERT INTO clients(nom, prenom, adresse, mail, telephone) VALUES(:nom, :prenom, :adresse, :mail, :telephone)');
				$req->execute(array(
					'nom' => $nom,
					'prenom' => $prenom,
					'adresse' => $adresse,
					'mail' => $mail,
					'telephone' =>$tel
				));
			}
			
		} else{
			echo 'Adresse mail ou n°de telephone non valide';
		}
		
	} else if($page == 'chevaux') {
		include('c:/wamp64/www/eth/v/chevaux.html');
		
		if(empty($_POST['nom']) || empty($_POST['age']) || empty($_POST['besoins'])|| empty($_POST['proprio']) || empty($_POST['pourcentage'])) {
			
			echo '<div class="container">ATTENTION ! Vous n\'avez pas rempli tous les champs</div>';
			
		} else if(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i', $_POST['proprio'])){
			$nom = htmlspecialchars($_POST['nom']);				
			$age = htmlspecialchars($_POST['age']);
			$besoins = htmlspecialchars($_POST['besoins']);
			$proprio = htmlspecialchars($_POST['proprio']);
			$pourcentage = htmlspecialchars($_POST['pourcentage']);
			
			$req = $bdd->prepare('SELECT c.mail,c.nom,ch.nom
					FROM clients c 
					JOIN posseder p on c.id = p.clients_id
					JOIN chevaux ch on ch.id = p.chevaux_id
					WHERE c.mail = :mail
					AND ch.nom = :nom');
			$req -> execute(array(
					'mail' => $proprio,
					'nom' => $nom
				));
			$result = $req->fetch();
			
			if(!empty($result)){
			
				echo 'Le cheval existe deja dans la base de données.';
			
			} else{
				//on ajoute le cheval dans la base de données
				$req = $bdd ->prepare('INSERT INTO chevaux(nom, age, besoins) VALUES(:nom, :age, :besoins)');
				$req->execute(array(
					'nom' => $nom,
					'age' => $age,
					'besoins' => $besoins
				));
				
				//on va chercher l'id du client
				$req1 = $bdd->prepare('SELECT id FROM clients WHERE mail = :proprio');
				$req1 -> execute(array(
						'proprio' => $proprio
					));
				$c_id = $req1->fetch();
				
				//on va chercher l'id du cheval qui vient d'être ajouté
				$req2 = $bdd->prepare('SELECT id FROM chevaux WHERE nom = :nom');
				$req2 -> execute(array(
						'nom' => $nom
				));
				$ch_id = $req2->fetch();
				
				//on ajoute le pourcentage d'appartenance
				$req3 = $bdd->prepare('INSERT INTO posseder(clients_id,chevaux_id,pourcentage) VALUES (:c_id,:ch_id,:pourcentage)');
				$req3 -> execute(array(
						'c_id' => $c_id['id'],
						'ch_id' => $ch_id['id'],
						'pourcentage' => $pourcentage
				));
			}
		} else{
			echo 'Adresse mail non valide';
		}
		
	} else if($page == 'produits') {
		include('c:/wamp64/www/eth/v/produits.html');
		
		if(empty($_POST['designation']) || empty($_POST['quantite']) || empty($_POST['fournisseur'])) {
			echo '<div class="container">ATTENTION ! Vous n\'avez pas rempli tous les champs</div>';
		} else if(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i', $_POST['fournisseur'])){
			$designation = htmlspecialchars($_POST['designation']);				
			$quantite = htmlspecialchars($_POST['quantite']);
			$fournisseur = htmlspecialchars($_POST['fournisseur']);
			$prix_vente = htmlspecialchars($_POST['prix_vente']);
			$prix_achat = htmlspecialchars($_POST['prix_achat']);
			
			$req = $bdd->prepare('SELECT pr.designation
					FROM produits pr
					JOIN fournir fo ON pr.id = fo.produits_id
					JOIN fournisseurs f ON f.id = fo.fournisseurs_id
					WHERE pr.designation = :designation
					AND f.mail = :mail');
			$req -> execute(array(
				'designation' => $designation,
				'mail' => $fournisseur
			));
			$result = $req->fetch();
			
			if(!empty($result)){
				echo 'Le produit existe deja dans la base de données.';
			} else{
				//on ajoute le produit dans la base de données
				$req = $bdd ->prepare('INSERT INTO produits(designation, quantite, prix_vente, prix_achat) VALUES(:designation, :quantite, :prix_vente, :prix_achat)');
				$req->execute(array(
					'designation' => $designation,
					'quantite' => $quantite,
					'prix_vente' => $prix_vente,
					'prix_achat' => $prix_achat
				));
				
				//on va chercher l'id du fournisseur
				$req1 = $bdd->prepare('SELECT id FROM fournisseurs WHERE mail = :fournisseur');
				$req1 -> execute(array(
						'fournisseur' => $fournisseur
					));
				$f_id = $req1->fetch();
				
				//on va chercher l'id du produit qui vient d'être ajouté
				$req2 = $bdd->prepare('SELECT id FROM produits WHERE designation = :designation');
				$req2 -> execute(array(
						'designation' => $designation
				));
				$pr_id = $req2->fetch();
				
				//on ajoute le pourcentage d'appartenance
				$req3 = $bdd->prepare('INSERT INTO fournir(produits_id,fournisseurs_id) VALUES (:pr_id,:f_id)');
				$req3 -> execute(array(
						'pr_id' => $pr_id['id'],
						'f_id' => $f_id['id']
				));
			}
		} else{
			echo 'Adresse mail non valide';
		}
	} else if($page == 'employes') {
		
		include('c:/wamp64/www/eth/v/employes.html');
		
        if(empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['adresse']) || empty($_POST['mail'])|| empty($_POST['tel']) ){
            echo '<div class="container">ATTENTION ! Vous n\'avez pas rempli tous les champs</div>';
        } else if(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i', $_POST['mail']) && preg_match("#^0[0-9]([_. ]?[0-9]{2}){4}$#", $_POST['tel'])){
            $prenom = htmlspecialchars($_POST['prenom']);
            $nom = htmlspecialchars($_POST['nom']);
            $adresse = htmlspecialchars($_POST['adresse']);
            $mail = htmlspecialchars($_POST['mail']);
            $tel = htmlspecialchars($_POST['tel']);
            
            $req = $bdd->prepare('SELECT mail FROM employes WHERE mail = :mail');
            $req -> execute(array(
                    'mail' => $mail
                ));
            $result = $req->fetch();
			if(!empty($result)){
				echo 'L\'employé existe deja dans la base de données.';
			} else{
				$req = $bdd ->prepare('INSERT INTO clients(nom, prenom, adresse, mail, telephone) VALUES(:nom, :prenom, :adresse, :mail, :telephone)');
				$req->execute(array(
					'nom' => $nom,
					'prenom' => $prenom,
					'adresse' => $adresse,
					'mail' => $mail,
					'telephone' =>$tel
				));
			}
			
		} else{
			echo 'Adresse mail ou n°de telephone non valide';
		}
	} else if($page == 'fournisseurs') {
		include 'c:/wamp64/www/eth/v/fournisseurs.html';
		
		if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail'])) {
			echo '<div class="container">ATTENTION ! Vous n\'avez pas rempli tous les champs</div>';
			
		} else if (preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i', $_POST['mail']) && preg_match("#^0[0-9]([_. ]?[0-9]{2}){4}$#", $_POST['telephone'])){ 
			$nom = htmlspecialchars($_POST['nom']);				
			$prenom = htmlspecialchars($_POST['prenom']);
			$adresse = htmlspecialchars($_POST['adresse']);
			$mail = htmlspecialchars($_POST['mail']);
			$telephone = htmlspecialchars($_POST['telephone']);
			
			$req = $bdd-> prepare('SELECT mail FROM fournisseurs WHERE mail = :mail');
			$req -> execute(array(
				'mail' => $mail
			));
			$result = $req->fetch();
			
			if(!empty($result)){
				echo 'Le fournisseur existe déjà dans la base de données.';
			} else {
				//On insert le nouveau fournisseur dans la bdd
				$req = $bdd -> prepare('INSERT INTO fournisseurs(nom, prenom, adresse, mail, telephone) VALUES(:nom, :prenom, :adresse, :mail, :telephone)');
				$req-> execute(array(
					'nom' => $nom,
					'prenom' => $prenom,
					'adresse' => $adresse,
					'mail' => $mail,
					'telephone' => $telephone
				));
			}
		} else {
			echo 'Adresse Mail ou numéro de téléphone non valide';
		}
	} else if($page == 'prestataires') {
		include 'c:/wamp64/www/eth/v/prestataires.html';
		if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail'])) {
			echo '<div class="container"> ATTENTION ! Vous n\'avez pas rempli tous les champs</div>';
		
		} else if (preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i', $_POST['mail']) && preg_match("#^0[0-9]([_. ]?[0-9]{2}){4}$#", $_POST['telephone'])){ 
			$nom = htmlspecialchars($_POST['nom']);				
			$prenom = htmlspecialchars($_POST['prenom']);
			$adresse = htmlspecialchars($_POST['adresse']);
			$entreprise = htmlspecialchars($_POST['entreprise']);
			$mail = htmlspecialchars($_POST['mail']);
			$telephone = htmlspecialchars($_POST['telephone']);
			$prix_deplacement = htmlspecialchars($_POST['prix_deplacement']);
			
			$req = $bdd-> prepare('SELECT mail FROM prestataires WHERE mail = :mail');
			$req -> execute(array(
				'mail' => $mail
			));
			$result = $req->fetch();
			
			if(!empty($result)){
				echo 'Le fournisseur existe déjà dans la base de données.';
			} else {
				//On insert le nouveau fournisseur dans la bdd
				$req = $bdd -> prepare('INSERT INTO prestataires (nom, prenom, adresse, entreprise, mail, telephone, prix_deplacement) VALUES(:nom, :prenom, :adresse, :entreprise, :mail, :telephone, :prix_deplacement)');
				$req-> execute(array(
					'nom' => $nom,
					'prenom' => $prenom,
					'adresse' => $adresse,
					'entreprise' => $entreprise,
					'mail' => $mail,
					'telephone' => $telephone,
					'prix_deplacement' => $prix_deplacement
				));
			}
		} else {
			echo 'Adresse Mail ou numéro de téléphone non valide';
		}
		
	} else if($page == 'locations') {
		include'c:/wamp64/www/eth/v/locations.html';
		
        if(empty($_POST['nom'])||empty($_POST['type'])||empty($_POST['prix'])){
            echo '<div class="container">Attention vous n\'avez pas rempli tous les champs</div>';
        } else {
            $nom = htmlspecialchars($_POST['nom']);
            $type = htmlspecialchars($_POST['type']);
            $prix = htmlspecialchars($_POST['prix']);
            
            $req = $bdd->prepare('SELECT nom FROM locations WHERE nom = :nom');
            $req -> execute(array(
                'nom'=>$nom
            ));
            
            $result = $req->fetch();
            if(!empty($result)){
                echo 'Le batiment existe deja dans la base de donnée';
            } else {
                $req = $bdd -> prepare('SELECT id FROM types WHERE designation = :type');
                $req -> execute(array(
                    'type' => $type
                   ));
                
                $ty_id = $req->fetch();
                
                $req1 = $bdd->prepare('INSERT INTO locations(nom, etat, prix, types_id) VALUES(:nom, 0, :prix, :type)');
                $req1->execute(array(
                    'nom'=>$nom,
                    'prix'=>$prix,
                    'type'=>$ty_id['id']
                ));
                
                echo 'Le batiments a bien été ajouté';
            }
        }
	}
?>