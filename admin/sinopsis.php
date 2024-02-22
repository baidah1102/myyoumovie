<!-- modal_sinopsis.php -->

<div class="modal fade" id="sinopsisModal<?php echo $result['id_film']; ?>" tabindex="-1" role="dialog" aria-labelledby="sinopsisModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sinopsisModalLabel"><?php echo $result['nama_film']; ?> - Sinopsis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><?php echo $result['sinopsis']; ?></p>
            </div>
        </div>
    </div>
</div>
