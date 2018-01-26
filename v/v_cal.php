<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Calendrier</title>
    
 
    
	<link rel="stylesheet" href="../css/modale.css">
    <link rel="stylesheet" href="../css/fullcalendar.css">
    <link rel="stylesheet" href="../css/calendrier.css">
    <link rel="stylesheet" href="../css/fullcalendar.min.css">
    <link rel="stylesheet" href="../css/fullcalendar.print.min.css" media="print">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/moment.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/fullcalendar.js"></script>
    <script src="../js/locale-all.js"></script>
     <script src="../bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script>
        
        <?= $head ?>

    </script>
</head>

<body>
    <?php require('../c/resa_cal.php');?>
    <?php require('../v/v_mod_on_click.php');?>
    <?php require('../v/v_mod_info_client.php');?>
    <?= $resa_cal ?>
    <?=$mod1 ?>
    <?=$mod2?>
</body>

</html>
