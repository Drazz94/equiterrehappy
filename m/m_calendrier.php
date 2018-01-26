<?php require('../m/m_init.php');?>
<?php require('../c/c_moove.php');?>
<?php require('../c/c_resize.php');?>
<?php require('../c/c_delete.php');?>
<?php require('../c/mod_cal.php');?>

<script>
    <?php ob_start()?>

    $(document).ready(function() {
	
	<?php if($_SESSION['nom_page'] == 'em' || $_SESSION['nom_page'] =='lo'){ echo $modale; } else{ echo "";}; ?>
    <?= $init ?>
    <?= $moove ?>
    <?= $resize ?>
    <?= $delete ?>

    });
    });

    <?php $head = ob_get_clean();?>

</script>
<?php require('../v/v_cal.php');?>
