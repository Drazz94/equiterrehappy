<script>
    <?php ob_start()?>
    var calendar = $("#calendar").fullCalendar({

                header: {
                    right: 'title',
                    center: 'prev,next, today',
                    left: 'month,agendaWeek,agendaDay',

                },

                footer: {
                    right: 'listDay,listWeek'
                },

                views: {
                    month: {
                        buttonText: 'Mois'
                    },
                    agendaWeek: {
                        buttonText: 'Semaine'
                    },
                    agendaDay: {
                        buttonText: 'Jour'
                    },
                    listDay: {
                        buttonText: 'Liste jour'
                    },
                    listWeek: {
                        buttonText: 'Liste semaine'
                    }
                },

                slotLabelFormat: 'HH:mm',
                firstDay: 1,
                weekNumbers: true,
                locale: 'fr-ch',
                nowIndicator: true,
                weekNumberTitle: 'n° sem',
                navLinks: true,
                selectable: true,
                selectHelper: true,
                events: '../m/events.php',
                droppable: true,
                editable: true,

                <?php $init = ob_get_clean();?>

</script>
