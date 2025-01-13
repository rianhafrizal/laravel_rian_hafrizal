<div id="form_outlet">
    <input type="hidden" class="form-control form-control-sm" id="t_id">

    <label class="form-label">Nama RS</label>
    <div class="input-group mb-3">
        <select type="text" class="form-control form-control-sm" id="t_id_outlet">

        </select>
    </div>

    <label class="form-label">Nama Pasien</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control form-control-sm" id="t_nama">
    </div>

    <label class="form-label">Alamat</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control form-control-sm" id="t_alamat">
    </div>

    <div class="row">
        <div class="col">
            <label class="form-label">Email</label>
            <div class="input-group mb-3">
                <input type="email" class="form-control form-control-sm" id="t_email">
            </div>
        </div>
        <div class="col">
            <label class="form-label">Telepon</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" id="t_telp">
            </div>
        </div>
    </div>



    <button type="button" class="btn btn-primary btn-sm" id="btn_batal"
    onclick="Cancel();">Cancel</button> &NonBreakingSpace;
    <button type="button" class="btn btn-primary btn-sm" id="btn_save"
        onclick="Simpan_outlet();">Save</button>&NonBreakingSpace;
    <button type="button" class="btn btn-primary btn-sm" id="btn_update" onclick="update_outlet();">Update</button>


</div>