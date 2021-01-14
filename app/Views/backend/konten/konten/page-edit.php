<div class="card">
    <div class="card-header">
        Formulir Entrian konten
    </div>
    <div class="card-body">
        <form method="POST" action="<?= backend_url('/konten/update'); ?>" enctype="multipart/form-data" data-toggle="validator" role="form">
            <?= csrf_field() ?>
            <input type="hidden" name="konten_id" value="<?= $row[0]['konten_id']; ?>"/> 
            <div class="form-row">
                <div class="col form-group">
                    <label>Kategori</label>
                    <select class="form-control form-control-sm autosearch" name="kategori_id">
                        <?php foreach($konten_kategori as $value) : ?>
                            <option value="<?=$value['kategori_id'];?>" <?=selected($value['kategori_id'],$row[0]['konten_kategori']); ?> ><?=$value['kategori_nama'];?></option>
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
                              required><?= $row[0]['konten_nama']; ?>
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
                        <option <?=selected('TIDAK',$row[0]['konten_sub']); ?> value="TIDAK">TIDAK</option>
                        <option <?=selected('YA',$row[0]['konten_sub']); ?> value="YA">YA</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="window.history.back();">Kembali</button>
        </form>
    </div>
</div>