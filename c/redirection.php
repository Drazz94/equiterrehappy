<?php
	ob_start();
    if(!isset($_SESSION['id'])){
        echo 'vous n\'êtes pas connecté(e)';
        header('location: /eval_fin/index.php');
    }
	$redirection = ob_get_clean();
?>
