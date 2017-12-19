<?php ob_start()?>
    <div id='external-events'>
		<h4>Draggable Events</h4>
        <?php  
			require '../c/liaison_bdd.php';
			$reponse = $bdd->query('SELECT nom FROM locations');
			while($donnees = $reponse->fetch()){
		?>

		<div class='fc-event'>
			<?= $donnees['nom']?>
		</div>
		
		<?php
		}
		?>

	</div>

	<div id='calendar'></div>
<?php 
	$content = ob_get_clean();
?>
