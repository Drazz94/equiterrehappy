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
    <script>
        <?= $head ?>

    </script>
</head>

<body>
    <?php require('../m/aj_reservation.php');?>
    <?= $html ?>
</body>

</html>
