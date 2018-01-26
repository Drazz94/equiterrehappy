<?php 

ob_start();

if($_GET['page'] == 'lo'){
   require('../m/aj_reservation.php');
    echo $html;
}
else if($_GET['page'] == 'em'){
 require('../m/aj_reservation.php');
    echo $html;}
else if($_GET['page'] == 'ch'){
 require('../m/aj_reservation.php');
    echo "" ;}

$resa_cal = ob_get_clean();
?>