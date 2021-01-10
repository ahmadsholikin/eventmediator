<div class="card">
    <div class="card-header">
        Formulir Edit Event
    </div>
    <div class="card-body">
        <form method="POST" action="<?= backend_url('/event/update'); ?>" enctype="multipart/form-data" data-toggle="validator" role="form">
            <?= csrf_field() ?>
            <input type="hidden" name="event_id" value="<?= $row[0]['event_id']; ?>"/>  
            <div class="form-row">
                <div class="col form-group">
                    <label>Kategori</label>
                    <select class="form-control form-control-sm autosearch" name="kategori_id">
                        <?php foreach($event_kategori as $value) : ?>
                            <option value="<?=$value['kategori_id'];?>" <?=selected($value['kategori_id'],$row[0]['event_kategori']); ?> ><?=$value['kategori_nama'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Nama</label>
                    <input class="form-control form-control-sm <?= ($validation->hasError('event_nama'))? 'is-invalid':'' ;?>" 
                            name="event_nama" 
                            type="text"
                            pattern="^[A-z0-9\s/@]{1,}$" 
                            data-parsley-error-message="Maaf, entrian hanya berupa huruf dan angka"
                            required 
                            value="<?= $row[0]['event_nama']; ?>">
                    <div class="help-block with-errors"></div>
                    <small class="text-danger"><?= $validation->getError('event_nama');?></small>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Deskripsi</label>
                    <input class="form-control form-control-sm <?= ($validation->hasError('event_deskripsi'))? 'is-invalid':'' ;?>" 
                            name="event_deskripsi" 
                            type="text"
                            required
                            value="<?= $row[0]['event_deskripsi']; ?>">
                    <div class="help-block with-errors"></div>
                    <small class="text-danger"><?= $validation->getError('event_deskripsi');?></small>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Kuota</label>
                    <input class="form-control form-control-sm <?= ($validation->hasError('event_kuota'))? 'is-invalid':'' ;?>" 
                            name="event_kuota" 
                            type="text"
                            pattern="^[0-9]{1,}$"
                            data-parsley-error-message="Maaf, entrian hanya berupa angka"
                            required 
                            value="<?= $row[0]['event_kuota']; ?>">
                    <div class="help-block with-errors"></div>
                    <small class="text-danger"><?= $validation->getError('event_kuota');?></small>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Harga</label>
                    <input class="form-control form-control-sm <?= ($validation->hasError('event_harga'))? 'is-invalid':'' ;?>" 
                            name="event_harga" 
                            type="text"
                            pattern="^[0-9]{1,}$"
                            data-parsley-error-message="Maaf, entrian hanya berupa angka"
                            required
                            value="<?= $row[0]['event_harga']; ?>">
                    <div class="help-block with-errors"></div>
                    <small class="text-danger"><?= $validation->getError('event_harga');?></small>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Tanggal Mulai</label>
                    <input class="form-control form-control-sm tanggal" 
                            name="event_mulai" 
                            type="text" 
                            value="<?= tanggal_dMY($row[0]['event_mulai']); ?>">
                </div>
                <div class="col form-group">
                    <label>Tanggal Selesai</label>
                    <input class="form-control form-control-sm tanggal" 
                            name="event_selesai" 
                            type="text" 
                            value="<?= tanggal_dMY($row[0]['event_selesai']); ?>">
                </div>
            </div>
            <div class="form-row">        
                <div class="col-md-4 col-sm-4 form-group">
                    <label>Gambar</label>
                    <input name="event_gambar" 
                            type="file" 
                            class="form-control dropify" data-default-file="<?= base_file($row[0]['event_gambar'], NULL)->url; ?>" accept="image/*;capture=camera">
                    <div class="help-block with-errors"></div>
                    <small class="text-danger"><?= $validation->getError('event_gambar');?></small>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="window.history.back();">Kembali</button>
        </form>
    </div>
</div>