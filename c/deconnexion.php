<?php session_start();

if(isset($_SESSION['id'])){
        echo $_SESSION['id'];
        session_unset();
        header('location:../v/deconnecter.php');
}
?>
