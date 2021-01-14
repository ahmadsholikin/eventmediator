<div class="card">
    <div class="card-header">
        Formulir Entrian konten
    </div>
    <div class="card-body">
        <form method="POST" action="<?= backend_url('/konten/insert'); ?>" enctype="multipart/form-data" data-toggle="validator" role="form">
            <?= csrf_field() ?>
            <div class="form-row">
                <div class="col form-group">
                    <label>Kategori</label>
                    <select class="form-control form-control-sm autosearch" name="kategori_id">
                        <?php foreach($konten_kategori as $value) : ?>
                            <option value="<?=$value['kategori_id'];?>"><?=$value['kategori_nama'];?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Konten</label>
                    <textarea class="form-control summernote" 
                              name="konten_nama" 
                              id="konten_nama"
                              required>
                    </textarea>
                    <small class="text-danger"><?= $validation->getError('konten_nama');?></small>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Sub Konten</label>
                    <select class="form-control form-control-sm" 
                            name="konten_sub">
                        <option value="TIDAK">TIDAK</option>
                        <option value="YA">YA</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="window.history.back();">Kembali</button>
        </form>
    </div>
</div>