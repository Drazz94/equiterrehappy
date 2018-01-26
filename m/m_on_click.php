<?php
session_start();
?>
<div id="test"><?php
$_SESSION['test'] = $_POST['id_c'];
    ?></div><?php
error_log($_SESSION['test']);
$_SESSION['idd']=$_POST['id'];
$_SESSION['title']=$_POST['title'];
$_SESSION['start']=$_POST['start'];
$_SESSION['end']=$_POST['end'];

?>
<div id="testt"><?php $_SESSION['test']?></div> 
<?php

if(isset($_POST['delete'])){
   
 header('location:../c/delete_events.php');
}
?>