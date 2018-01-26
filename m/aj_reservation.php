<?php ob_start();

include '../c/liaison_bdd.php';
include('../c/c_value_nom_res.php');
?>

<button id="myBtn">Réservation</button>

<div id="myModal" class="modal">


<div class="modal-content">
    <div class="modal-header">
        <span class="close">&times;</span>
        <h2>RESERVATION</h2>
    </div>
    <div class="modal-body">
        <form action="../c/add_events.php" method="post">
            debut : <input type="date" name="start" placeholder="AAAA-MM-JJ">
            fin :  <input type="date" name="end" placeholder="AAAA-MM-JJ"><br>
            
        <?=$value_nom?>

    <br><input type="submit" name="valider" value="confirmer">
        </form>
      </div>
      <div class="modal-footer">
        <h3>EquiTerreHappy</h3>
      </div>
  </div>

</div>


<?php $html=ob_get_clean();?>