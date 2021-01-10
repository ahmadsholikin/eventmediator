<div class="card">
    <div class="card-header">
        Formulir Entrian Kategori Event
    </div>
    <div class="card-body">
        <form method="POST" action="<?= backend_url('/kategori-event/insert'); ?>"  data-toggle="validator" role="form">
            <?= csrf_field() ?>
            <div class="form-row">
                <div class="col form-group">
                    <label>Nama Kategori</label>
                    <input class="form-control form-control-sm <?= ($validation->hasError('kategori_nama'))? 'is-invalid':'' ;?>" 
                            name="kategori_nama" 
                            type="text"
                            pattern="^[A-z0-9\s/@]{1,}$" 
                            data-parsley-error-message="Maaf, entrian hanya berupa huruf dan angka"
                            required >
                    <div class="help-block with-errors"></div>
                    <small class="text-danger"><?= $validation->getError('kategori_nama');?></small>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="window.history.back();">Kembali</button>
        </form>
    </div>
</div>