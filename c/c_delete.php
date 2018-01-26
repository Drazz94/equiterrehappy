<script>
    <?php ob_start()?>

       eventClick: function(event, element) {
        $('#modalTitle').html(event.title);
            $('#modalBody').html(event.description);
            $('#fullCalModal').modal();
            var current_url = window.location.href;
            var new_url = current_url + '?id_c=' + event.id_client;
                
            alert(event.id);
           
          $.ajax('../m/m_on_click.php', {
                    data:'id_c=' + event.id_client + '&id=' + event.id,
                    type: "POST",
                   success: function(json) {
                       alert(event.id_client);
                  //  $('#fullCalModal').load(current_url, new_url );


                    }
                    });
           

                 
          /* $.ajax(new_url,{

          type: "get",

          data: "id_c=" + event.id_client,

          success: function(data){
            $('#fullCalModal').load('../m/m_on_click');

          },
      
        });
 */
       },

 
        <?php $delete = ob_get_clean();?>

</script>
