<?php
ob_start();


if($_SESSION['nom_page'] == 'lo'){
    $reponse = $bdd->query('SELECT nom FROM locations');
    while($donnees = $reponse->fetch()){
        echo $donnees['nom'];
?>
        <input type="radio" name="nom" value="<?php echo $donnees['nom'];?>"><br>
		
		  <?php
		  }  
          ?>
        Mail : <input type="text" name="mail" placeholder="juliea@blabla.fr">

<?php
    
}
else if($_SESSION['nom_page'] == 'em'){
    $reponse1 = $bdd->query('SELECT CONCAT(nom, " ", prenom) AS qui, id FROM employes');
        while($donnees = $reponse1->fetch()){
            echo $donnees['qui'];
            ?>
            <input type="hidden" name="id_em" value="<?php echo $donnees['id'];?>">
            <input type="checkbox" name="qui" value="<?php echo $donnees['qui'];?>"><br>
<?php
        }
    
}
else if($_SESSION['nom_page'] == 'ch'){
    $reponse2 = $bdd->query('SELECT ch.nom AS ch_nom, CONCAT(c.prenom, " ", c.nom) AS cl FROM chevaux ch JOIN posseder p ON p.chevaux_id = ch.id 
    JOIN clients c ON c.id = p.clients_id');
    ?>
        Cheval : <select name="chevaux">
<?php
    while($donnees = $reponse2->fetch()){
        ?>
        <option value="<?php echo $donnees['ch_nom'].'-'.$donnees['cl'];?>"><?php echo $donnees['ch_nom'].'--'.$donnees['cl'];?></option><br>
        <?php
    }
       ?> </select><?php
    
    $reponse3 = $bdd->query('SELECT designation FROM services');
    ?>
   <br>Service : <select name="services">
    <?php
    
    while($donnees1 = $reponse3->fetch()){
        echo 'aa'.$donnees1['designation'];
        ?>
    <option value="<?php echo $donnees1['designation'];?>"><?php echo $donnees1['designation'];?></option><br>
    <?php
    }
    ?>
</select>
<?php
    
    
    $reponse4 = $bdd->query('SELECT CONCAT (prenom, " ", nom, "=>", entreprise) AS pres FROM prestataires');
    ?>
    <br>Prestataire : <select name="prestataires">
        <?php
    while($donnees = $reponse4->fetch()){
        ?>
        <option value="<?php echo $donnees['pres'];?>"><?php echo $donnees['pres'];?></option>
        <?php
    }
    ?>
</select>
<?php
}

$value_nom = ob_get_clean();
?>