
<?php
	ob_start();
    if(!isset($_SESSION['id'])){
        echo 'vous netes pas co';
        header('location:/eth/index.html');
    }
	$redirection = ob_get_clean();
?>
