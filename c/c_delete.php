<script>
    <?php ob_start()?>

    eventClick: function(event, element) {
            console.log(event);
            console.log(event.id);
            if (!confirm('Voulez-vous supprimer cette dispo?')) {
                revertFunc();
            } else {
                $('#calendar').fullCalendar('removeEvents', event.id);
                $.ajax('../c/delete_events.php', {
                    data: 'id=' + event.id,
                    type: "POST",
                    success: function(json) {
                        alert("OK - size");

                    }
                });
            }

        },

        <?php $delete = ob_get_clean();?>

</script>
