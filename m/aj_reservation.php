<?php ob_start();

include '../c/liaison_bdd.php';
?>

<button id="myBtn">Réservation</button>

<div id="myModal" class="modal">


<div class="modal-content">
    <div class="modal-header">
        <span class="close">&times;</span>
        <h2>LOCATIONS DE BATIMENTS</h2>
    </div>
    <div class="modal-body">
        <form action="../c/add_events.php" method="post">
            debut : <input type="date" name="start" placeholder="AAAA-MM-JJ">
            fin :  <input type="date" name="end" placeholder="AAAA-MM-JJ"><br>
            
            <?php     
			$reponse = $bdd->query('SELECT nom FROM locations');
			while($donnees = $reponse->fetch()){
                echo $donnees['nom'];
		  ?>

        <input type="radio" name="nom" value="<?php echo $donnees['nom'];?>"><br>
		
		  <?php
		  }  
          ?>
    <br><input type="submit" name="valider" value="confirmer">
        </form>
      </div>
      <div class="modal-footer">
        <h3>EquiTerreHappy</h3>
      </div>
  </div>

</div>


<div id='calendar'></div>
<?php $html=ob_get_clean();?>