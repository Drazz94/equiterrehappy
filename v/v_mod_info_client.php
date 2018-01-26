<?php ob_start()?>

<div id="Modal" class="modal">


<div class="modal-content">
    <div class="modal-header">
        <span class="closea">&times;</span>
        <h2>Info clients</h2>
    </div>
    <div class="modal-body">
       <?php 
        $requete = $bdd->prepare('SELECT * FROM clients WHERE id = :id');
        $requete->execute(array('id'=> $_SESSION['test']));
        $donne= $requete->fetch();
    echo $donne['prenom'].' '.$donne['nom'].'<br>'.$donne['mail'].'<br>'.$donne['telephone'].'<br>';
       
        ?>
      </div>
      <div class="modal-footer">
        <h3>EquiTerreHappy</h3>
      </div>
  </div>

</div>

<div id='calendar'></div>
<?php $mod2 = ob_get_clean();?>