<?php

	function ajout($page) {
		
		include '../c/liaison_bdd.php';
		
		if($page == 'clients') {
			
			if(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i', $_POST['mail']) && preg_match("#^0[0-9]([_. ]?[0-9]{2}){4}$#", $_POST['tel'])){
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
					$resultat = '<div class="container">Le client existe deja dans la base de données.</div>';
				} else {
					$req = $bdd->prepare('INSERT INTO clients(nom, prenom, adresse, mail, telephone) VALUES(:nom, :prenom, :adresse, :mail, :telephone)');
					$req->execute(array(
						'nom' => $nom,
						'prenom' => $prenom,
						'adresse' => $adresse,
						'mail' => $mail,
						'telephone' =>$tel
					));
					
					$resultat = '<div class="container"><u>Enregistrement terminé</u></div>';
				}
			} else {
				$resultat = '<div class="container">Adresse mail ou n°de telephone non valide</div>';
			}
		} else if($page == 'chevaux') {
			
			if(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i', $_POST['proprio1'])){
				$nom = htmlspecialchars($_POST['nom']);				
				$age = htmlspecialchars($_POST['age']);
				$besoins = htmlspecialchars($_POST['besoins']);
				
				$nbproprio = $_POST['nbproprio'];
				$proprio1 = $_POST['proprio1'];
				$pourcentage1 = $_POST['pourcentage1'];
				
				//RECHERCHE SI LE PROPRIETAIRE EXISTE DANS LA BASE DE DONNEES
				$req1 = $bdd->prepare('SELECT * FROM clients WHERE mail = :mail');
				$req1 -> execute(array(
					'mail' => $proprio1
					));
				$res = $req1->fetch();
				
				if (empty($res)) {
					
					$resultat = '<div class="container">Le propriétaire n\'existe pas !</div>';
					
				} else {
					
					//RECHERCHE SI LE CHEVAL N'EXISTE PAS DEJA DANS LA BASE DE DONNEES
					$req = $bdd->prepare('SELECT c.mail,c.nom,ch.nom
							FROM clients c 
							JOIN posseder p on c.id = p.clients_id
							JOIN chevaux ch on ch.id = p.chevaux_id
							WHERE c.mail = :mail
							AND ch.nom = :nom');
					$req -> execute(array(
							'mail' => $proprio1,
							'nom' => $nom
						));
						
					$result = $req->fetch();
					
					if(!empty($result)){
					
						$resultat = '<div class="container">Le cheval existe deja dans la base de données.</div>';
					
					} else {
						//on ajoute le cheval dans la base de données
						$req = $bdd ->prepare('INSERT INTO chevaux(nom, age, besoins) VALUES(:nom, :age, :besoins)');
						$req->execute(array(
							'nom' => $nom,
							'age' => $age,
							'besoins' => $besoins
						));
			
						//on va chercher l'id du cheval qui vient d'être ajouté
						$req2 = $bdd->prepare('SELECT id FROM chevaux WHERE nom = :nom');
						$req2 -> execute(array(
								'nom' => $nom
						));
						$ch_id = $req2->fetch();
						
						if ($nbproprio == 1) { //IL N'Y A QU'UN PROPRIETAIRE
						
							//on va chercher l'id du client
							$proprio1 = htmlspecialchars($_POST['proprio1']);
							
							$req1 = $bdd->prepare('SELECT id FROM clients WHERE mail = :proprio');
							$req1 -> execute(array(
									'proprio' => $proprio1
								));
							$c_id = $req1->fetch();
							
							//on ajoute le pourcentage d'appartenance
							$req3 = $bdd->prepare('INSERT INTO posseder(clients_id,chevaux_id,pourcentage) VALUES (:c_id,:ch_id,:pourcentage)');
							$req3 -> execute(array(
									'c_id' => $c_id['id'],
									'ch_id' => $ch_id['id'],
									'pourcentage' => $pourcentage1
							));
							
						} else if ($nbproprio == 2) { //IL Y A DEUX PROPRIETAIRE
						
							$proprio1 = htmlspecialchars($_POST['proprio1']);
							$proprio2 = htmlspecialchars($_POST['proprio2']);
							$pourcentage1 = htmlspecialchars($_POST['pourcentage1']);
							$pourcentage2 = htmlspecialchars($_POST['pourcentage2']);
							
							//RECHERCHE ID DES CLIENTS
							$req1 = $bdd->prepare('SELECT id
								FROM clients
								WHERE mail = :mail');
							$req1 -> execute(array(
								'mail' => $proprio1
							));
							$res1 = $req1->fetch();
							
							$req2 = $bdd->prepare('SELECT id
								FROM clients
								WHERE mail = :mail');
							$req2 -> execute(array(
								'mail' => $proprio2
							));
							
							$res2 = $req2->fetch();
							
							//INSERTION DE LA RELATION ENTRE LE CHEVAL ET LE 1ER PROPRIO
							$req3 = $bdd->prepare('INSERT INTO posseder(clients_id,chevaux_id,pourcentage) VALUES (:c_id,:ch_id,:pourcentage)');
							$req3 -> execute(array(
									'c_id' => $res1['id'],
									'ch_id' => $ch_id['id'],
									'pourcentage' => $pourcentage1
							));
							
							//INSERTION DE LA RELATION ENTRE LE CHEVAL ET LE 2EME PROPRIO
							$req4 = $bdd->prepare('INSERT INTO posseder(clients_id,chevaux_id,pourcentage) VALUES (:c_id,:ch_id,:pourcentage)');
							$req4 -> execute(array(
									'c_id' => $res2['id'],
									'ch_id' => $ch_id['id'],
									'pourcentage' => $pourcentage2
							));
						} else {
							$proprio1 = htmlspecialchars($_POST['proprio1']);
							$proprio2 = htmlspecialchars($_POST['proprio2']);
							$proprio3 = htmlspecialchars($_POST['proprio3']);
							$pourcentage1 = htmlspecialchars($_POST['pourcentage1']);
							$pourcentage2 = htmlspecialchars($_POST['pourcentage2']);
							$pourcentage3 = htmlspecialchars($_POST['pourcentage3']);
							
							$req1 = $bdd->prepare('SELECT id
								FROM clients
								WHERE mail = :mail');
							$req1 -> execute(array(
								'mail' => $proprio1
							));
							
							$res1 = $req1->fetch();
							
							$req2 = $bdd->prepare('SELECT id
								FROM clients
								WHERE mail = :mail');
							$req2 -> execute(array(
								'mail' => $proprio2
							));
							
							$res2 = $req2->fetch();
							
							$req3 = $bdd->prepare('SELECT id
								FROM clients
								WHERE mail = :mail');
							$req3 -> execute(array(
								'mail' => $proprio3
							));
							
							$res3 = $req3->fetch();
							
							$req4 = $bdd->prepare('INSERT INTO posseder(clients_id,chevaux_id,pourcentage) VALUES (:c_id,:ch_id,:pourcentage)');
							$req4 -> execute(array(
									'c_id' => $res1['id'],
									'ch_id' => $ch_id['id'],
									'pourcentage' => $pourcentage1
							));
							$req5 = $bdd->prepare('INSERT INTO posseder(clients_id,chevaux_id,pourcentage) VALUES (:c_id,:ch_id,:pourcentage)');
							$req5 -> execute(array(
									'c_id' => $res2['id'],
									'ch_id' => $ch_id['id'],
									'pourcentage' => $pourcentage2
							));
							$req5 = $bdd->prepare('INSERT INTO posseder(clients_id,chevaux_id,pourcentage) VALUES (:c_id,:ch_id,:pourcentage)');
							$req5 -> execute(array(
									'c_id' => $res3['id'],
									'ch_id' => $ch_id['id'],
									'pourcentage' => $pourcentage3
							));
						}
						$resultat = '<div class="container">Enregistrement terminé</div>';
					}
				}
			} else {
				$resultat = '<div class="container">Adresse mail non valide</div>';
			}
		} else if($page == 'produits') {
			
			if(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i', $_POST['fournisseur'])){
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
					$resultat = '<div class="container">Le produit existe deja dans la base de données.</div>';
				} else {
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
					$resultat = '<div class="container">Enregistrement terminé</div>';
				}
			} else {
				$resultat = '<div class="container">Adresse mail non valide';
			}
		} else if($page == 'employes') {
			if(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i', $_POST['mail']) && preg_match("#^0[0-9]([_. ]?[0-9]{2}){4}$#", $_POST['tel'])){
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
					$resultat = '<div class="container">L\'employé existe deja dans la base de données.</div>';
				} else {
					$req = $bdd ->prepare('INSERT INTO employes(nom, prenom, adresse, mail, telephone) VALUES(:nom, :prenom, :adresse, :mail, :telephone)');
					$req->execute(array(
						'nom' => $nom,
						'prenom' => $prenom,
						'adresse' => $adresse,
						'mail' => $mail,
						'telephone' =>$tel
					));
					$resultat = '<div class="container">Enregistrement terminé</div>';
				}
				
			} else {
				$resultat = '<div class="container">Adresse mail ou n°de telephone non valide</div>';
			}
		
		} else if($page == 'fournisseurs') {
			if (preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i', $_POST['mail']) && preg_match("#^0[0-9]([_. ]?[0-9]{2}){4}$#", $_POST['telephone'])){ 
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
					$resultat = '<div class="container">Le fournisseur existe déjà dans la base de données.</div>';
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
					$resultat = '<div class="container">Enregistrement terminé</div>';
				}
			} else {
				$resultat = '<div class="container">Adresse Mail ou numéro de téléphone non valide.</div>';
			}
			
		} else if($page == 'prestataires') {
			if (preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i', $_POST['mail']) && preg_match("#^0[0-9]([_. ]?[0-9]{2}){4}$#", $_POST['telephone'])){ 
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
					$resultat = '<div class="container">Le fournisseur existe déjà dans la base de données.</div>';
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
					$resultat = '<div class="container">Enregistrement terminé</div>';
				}
			} else {
				$resultat = '<div class="container">Adresse Mail ou numéro de téléphone non valide</div>';
			}
			
		} else if($page == 'locations') {
			$nom = htmlspecialchars($_POST['nom']);
            $type = htmlspecialchars($_POST['type']);
            $prix = htmlspecialchars($_POST['prix']);
            
            $req = $bdd->prepare('SELECT nom FROM locations WHERE nom = :nom');
            $req -> execute(array(
                'nom'=>$nom
            ));
            
            $result = $req->fetch();
            if(!empty($result)){
                $resultat = '<div class="container">Le batiment existe deja dans la base de données</div>';
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
                
                $resultat = '<div class="container">Le batiments a bien été ajouté</div>';
            }
		}
		return $resultat;
	};
?>