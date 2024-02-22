<!-- modal_sinopsis.php -->

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
            <div class="modal-footer">
                <!-- Tombol Beli -->
                <a href="pesanan_pembeli.php?id_film=<?php echo $result['id_film']; ?>" class="btn btn-success btn-sm">Beli</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

