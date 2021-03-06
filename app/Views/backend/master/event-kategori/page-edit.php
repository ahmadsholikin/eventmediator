<div class="card">
    <div class="card-header">
        Formulir Edit Kategori Event
    </div>
    <div class="card-body">
        <form method="POST" action="<?= backend_url('/kategori-event/update'); ?>" enctype="multipart/form-data" data-toggle="validator" role="form">
            <?= csrf_field() ?>
            <input type="hidden" name="kategori_id" value="<?= $row[0]['kategori_id']; ?>"/>   
            <div class="form-row">
                <div class="col form-group">
                    <label>Nama Kategori</label>
                    <input class="form-control form-control-sm <?= ($validation->hasError('kategori_nama'))? 'is-invalid':'' ;?>" 
                            name="kategori_nama" 
                            type="text"
                            value="<?= $row[0]['kategori_nama']; ?>"
                            pattern="^[A-z0-9\s/@]{1,}$" 
                            data-parsley-error-message="Maaf, entrian hanya berupa huruf dan angka"
                            required >
                    <div class="help-block with-errors"></div>
                    <small class="text-danger"><?= $validation->getError('kategori_nama');?></small>
                </div>
            </div>
            <div class="form-row">        
                <div class="col-md-4 col-sm-4 form-group">
                    <label>Gambar Ikon</label>
                    <input name="kategori_ikon" 
                            type="file" 
                            class="form-control dropify" data-default-file="<?= base_file($row[0]['kategori_ikon'], NULL)->url; ?>" accept="image/*;capture=camera">
                    <div class="help-block with-errors"></div>
                    <small class="text-danger"><?= $validation->getError('kategori_ikon');?></small>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="window.history.back();">Kembali</button>
        </form>
    </div>
</div>