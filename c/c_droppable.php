<script>
    <?php ob_start()?>
    $('#external-events .fc-event').each(function() {
        var title = {
            title: $.trim($(this).text())

        };


        var test = $(this).data('title', title);

        $(this).draggable({
            zIndex: 999,
            revert: true,
            revertDuration: 0
        });

    });
    <?php $droppable = ob_get_clean();?>

</script>
