<div id="form_pasien">
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

 
            <label class="form-label">Telepon</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" id="t_telp">
            </div>
     


    <button type="button" class="btn btn-primary btn-sm" id="btn_batal" onclick="Cancel();">Cancel</button>
    &NonBreakingSpace;
    <button type="button" class="btn btn-primary btn-sm" id="btn_save"
        onclick="add_pasien();">Save</button>&NonBreakingSpace;
    <button type="button" class="btn btn-primary btn-sm" id="btn_update" onclick="update_pasien();">Update</button>


</div>