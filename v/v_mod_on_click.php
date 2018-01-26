<?php ob_start();?>

<div id="fullCalModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
           
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <div id="modalBody" class="modal-body">
                 <form action="../c/delete_events.php" method="post">
                <input type="submit" name="delete" value="Supprimer">
                </form>
              
                <form action="../v/accueil.php" method="post">
                <input type="hidden" name="session">
                <input type="submit" name="sess" value="Info client"> 
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>


    
<?php $mod1 = ob_get_clean();?>