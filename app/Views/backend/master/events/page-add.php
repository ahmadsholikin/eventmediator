<div class="card">
    <div class="card-header">
        Formulir Entrian Event
    </div>
    <div class="card-body">
        <form method="POST" action="<?= backend_url('/event/insert'); ?>" enctype="multipart/form-data" data-toggle="validator" role="form">
            <?= csrf_field() ?>
            <div class="form-row">
                <div class="col form-group">
                    <label>Kategori Event</label>
                    <select class="form-control form-control-sm autosearch" name="kategori_id">
                        <?php foreach($event_kategori as $value) : ?>
                            <option value="<?=$value['kategori_id'];?>"><?=$value['kategori_nama'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Nama Event</label>
                    <input class="form-control form-control-sm <?= ($validation->hasError('event_nama'))? 'is-invalid':'' ;?>" 
                            name="event_nama" 
                            type="text"
                            pattern="^[A-z0-9\s/@]{1,}$" 
                            data-parsley-error-message="Maaf, entrian hanya berupa huruf dan angka"
                            required >
                    <div class="help-block with-errors"></div>
                    <small class="text-danger"><?= $validation->getError('event_nama');?></small>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control summernote" 
                        name="event_deskripsi" 
                        id="event_deskripsi"
                        required></textarea>
                    <small class="text-danger"><?= $validation->getError('event_deskripsi');?></small>
                    <div class="help-block with-errors"></div>
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
                            required >
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
                            required
                            pattern="^[0-9]{1,}$"
                            data-parsley-error-message="Maaf, entrian hanya berupa angka">
                    <div class="help-block with-errors"></div>
                    <small class="text-danger"><?= $validation->getError('event_harga');?></small>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Tanggal Mulai Event</label>
                    <input class="form-control form-control-sm tanggal" 
                            name="event_mulai" 
                            type="text" 
                            value="<?=date('d M Y');?>">
                </div>
                <div class="col form-group">
                    <label>Tanggal Selesai Event</label>
                    <input class="form-control form-control-sm tanggal" 
                            name="event_selesai" 
                            type="text" 
                            value="<?=date('d M Y');?>">
                </div>
            </div>
            <div class="form-row">        
                <div class="col-md-4 col-sm-4 form-group">
                    <label>Gambar</label>
                    <input name="event_gambar" 
                            type="file" 
                            class="form-control dropify" data-default-file="" accept="image/*;capture=camera"
                            required>
                    <div class="help-block with-errors"></div>
                    <small class="text-danger"><?= $validation->getError('event_gambar');?></small>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="window.history.back();">Kembali</button>
        </form>
    </div>
</div>