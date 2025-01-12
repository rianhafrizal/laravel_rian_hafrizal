<div class="modal fade" id="modal-form-outlet">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-outlet-judul">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
<!-- /.body -->

                <label for="nama-outlet">Nama outlet</label>
                <div class="input-group input-group-sm mb-3">
                   
                    <input type="text" class="form-control"  id="t_nama" name="=t_nama"  maxlength="10">
                    <input type="hidden" class="form-control"  id="t_id" name="=t_id">
                  </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="modal-outlet-btn-save" onclick="Simpan_outlet();">Save</button>
                <button type="button" class="btn btn-primary" id="modal-outlet-btn-update" onclick="update_outlet();">Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
