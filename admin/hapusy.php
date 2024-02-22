<!-- modal_hapus.php -->

<div class="modal fade" id="hapusModal<?php echo $result['id_film']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus Film</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus film <?php echo $result['nama_film']; ?>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="hapus.php?id_film=<?php echo $result['id_film']; ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
