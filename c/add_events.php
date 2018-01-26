<?php

require('../m/new_reservation.php');

session_start();

if($_SESSION['nom_page'] == 'lo'){
if(!empty($_POST['nom'])||!empty($_POST['start'])||!empty($_POST['end'])||!empty($_POST['mail'])){
    echo $post_res;
    header('location:../v/accueil.php');
}

}
else if($_SESSION['nom_page'] == 'em'){
    if(!empty($_POST['start'])||!empty($_POST['end'])||!empty($_POST['qui'])){
        echo $planning_em;
        header('location:../v/accueil.php?page=em');
        echo'aa';
    }
}
else if($_SESSION['nom_page'] == 'ch'){
    echo 'ok';
}



?>