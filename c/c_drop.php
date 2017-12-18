<script>
    <?php ob_start()?>

    drop: function(date) {
            var eventObject = $(this).data('title');
            var copie_title = $.extend({}, eventObject);
            copie_title.start = date;

            if (copie_title) {

                if (!confirm("Valider l'ajout ?")) {

                    revertFunc();

                } else {

                    start = $.fullCalendar.formatDate(copie_title.start, "Y-MM-DD HH:mm:ss");

                    $.ajax('../c/add_events.php', {
                        data: 'title=' + copie_title.title + '&start=' + start,
                        type: 'POST',
                        success: function(json) {
                            alert('OK');
                        }
                    });

                    calendar.fullCalendar('renderEvent', {
                            title: copie_title.title,
                            start: start,



                        },
                        true
                    );
                }

                calendar.fullCalendar('unselect');
            }


        },

        <?php $drop = ob_get_clean();?>

</script>
