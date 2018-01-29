<?php

//nb_ligne c'est le nb de ligne que l'on veut par page
//count c'est la requete sql qui permet de savoir combien la table contient de ligne
function calcul_nb_page ($nb_ligne, $count, $tri, $page){

    $donnees = $count->fetch();
    $nb_mess = max($donnees);
    $nb_page = ceil($nb_mess/$nb_ligne);

	$table = $page;
	
	if($page == "clients") {
		echo '<div class="row"><div class=" col-md-1"><div class="nbpage"><ul class="pagination">';
	}
	else {

		echo '<div class="row"><div class="col-md-offset-4 col-md-2"><div class="nbpage"><ul class="pagination">';
	}
    for($i=1; $i<=$nb_page; $i++){
      echo '<li class="page-item">
        <a class="page-link" href="afficher_tout.php?n_page='.$i.'&page='.$table.'&tri='.$tri.'">'.$i.'</a></li>';
    }
	echo '</div></div></div>';

	if(isset($_GET['n_page'])){
		$n_page = $_GET['n_page'];
	} else {
		$n_page = 1;
	}
	global $mess_un;
    $mess_un= ($n_page-1)* $nb_ligne;

    return $mess_un;

}
?>
