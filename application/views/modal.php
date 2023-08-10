<!-- Default Size -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Are you sure?</h4>
            </div>
            <div class="modal-body">
                Data yang dihapus tidak akan bisa dikembalikan.
            </div>
            <div class="modal-footer">
                <a id="btn-delete" class="btn btn-danger waves-effect" href="#">DELETE</a>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
            </div>
        </div>
    </div>
</div>

<!-- Default Size -->
<div class="modal fade" id="backModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Are you sure?</h4>
            </div> -->
            <div class="modal-body">
                Data Akan Menghilang Jika Anda Kembali. Apa Kamu Yakin ?
            </div>
            <div class="modal-footer">
                <a id="btn-back" class="btn btn-danger waves-effect" href="#">KEMBALI</a>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
            </div>
        </div>
    </div>
</div>

<!-- Default Size -->
<div class="modal fade" id="saveModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Are you sure?</h4>
            </div> -->
            <div class="modal-body">
                Data Paket Belum Diisi, Apa Kamu Yakin Untuk Menyimpan Data ?
            </div>
            <div class="modal-footer">
                <button id="btn-save" class="btn btn-success waves-effect" onclick="save('<?=site_url('transaksi/insert_trans')?>')">Save</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
            </div>
        </div>
    </div>
</div>

<!-- Default Size -->
<div class="modal fade" id="validateForm" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Are you sure?</h4>
            </div> -->
            <div class="modal-body">
                Form Data Belum Lengkap, Mohon Dilengkapi Terlebih Dahulu
            </div>
            <div class="modal-footer">
                <!-- <button id="btn-save" class="btn btn-success waves-effect" onclick="save('<?//=site_url('transaksi/insert_trans')?>')">Save</button> -->
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
            </div>
        </div>
    </div>
</div>