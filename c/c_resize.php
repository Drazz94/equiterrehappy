<script>
    <?php ob_start()?>

    eventResize: function(event, delta) {
            if (!confirm("Valider la modification ?")) {

                revertFunc();

            } else {
                start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                $.ajax('../c/update_events.php', {
                    data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                    type: "POST",
                    success: function(json) {
                        alert("OK - size");

                    }
                });
            }

        },

        <?php $resize =ob_get_clean();?>

</script>
