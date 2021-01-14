<section class="py-5">
    <div class="container py-5">
        <form action="<?=base_url();?>/event" method="GET">
            <div class="row">
                <!-- Filter-->
                <div class="col-lg-3 order-2 order-lg-1">
                    <h2 class="h3 mb-4 pb-1">Filter</h2>
                    <div class="card border-0 shadow-sm mb-4 p-2">
                        <div class="card-body">
                            <h6 class="h6 mb-2">Pilihan Kategori</h6>
                            <?php foreach ($kategori as $rowkategori) : ?>
                            <div class="custom-control custom-checkbox mb-2">
                                <input onChange="this.form.submit()" class="custom-control-input" name="kategori[]" <?php if(in_array($rowkategori['kategori_id'], $inkategori)) { echo "checked"; } ?> value="<?=$rowkategori['kategori_id'];?>"  id="customCheck_<?=$rowkategori['kategori_id'];?>" type="checkbox">
                                <label class="custom-control-label" style="font-weight: 500;" for="customCheck_<?=$rowkategori['kategori_id'];?>"><?=$rowkategori['kategori_nama'];?></label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="card border-0 shadow-sm mb-4 p-2">
                        <div class="card-body">
                            <h2 class="h6 mb-2">Choose tag</h2>
                            <div class="custom-control custom-checkbox mb-2">
                                <input onChange="this.form.submit()" <?php if('AVAILABLE'== $type) { echo "checked"; } ?> class="custom-control-input" id="customCheckbox1" type="checkbox" name="type[]" value="AVAILABLE">
                                <label class="custom-control-label" style="font-weight: 500;" for="customCheckbox1">Kuota Tersedia</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-2">
                                <input onChange="this.form.submit()" <?php if('READY'== $type) { echo "checked"; } ?> class="custom-control-input" id="customCheckbox2" type="checkbox" name="type[]" value="READY">
                                <label class="custom-control-label" style="font-weight: 500;" for="customCheckbox2">Belum Berakhir</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Listing-->
                <div class="col-lg-9 mb-5 mb-lg-0 order-1 order-lg-2">
                    <!-- Listing sorting-->
                    <div class="row mb-4 align-items-center">
                        <div class="col-md-7">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item my-1 my-lg-0">
                                    <select class="selectpicker" id="sort" name="sort" data-style="btn btn-light shadow-xs bg-white border" data-title="Sort By" data-width="200">
                                        <option <?=selected($sort,'ASC');?> value="ASC">Urutkan Abjad</option>
                                        <option <?=selected($sort,'LATEST');?> value="LATEST">Terbaru</option>
                                        <option <?=selected($sort,'PRICE');?> value="PRICE">Biaya</option>
                                    </select>
                                </li>
                                <li class="list-inline-item my-1 my-lg-0">
                                    <select class="selectpicker" id="price" name="price" data-title="Biaya" data-style="btn btn-light shadow-xs bg-white border" data-width="200">
                                        <option <?=selected($price,'');?> value="">Semua</option>
                                        <option <?=selected($price,'free');?> value="free">Free</option>
                                        <option <?=selected($price,'paid');?> value="paid">Berbayar</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-5 text-md-right">
                            <p class="h6 mb-0 p-3 p-md-0">Show <?=count($events);?> results</p>
                        </div>
                    </div>
                    
                    <!-- Listing items-->
                    <div class="row mb-4">
                        <div class="p-2 rounded shadow-sm bg-white col-12">
                            <div class="input-group">
                                <input class="form-control border-0 mr-2" type="search" name="keyword" placeholder="Contoh, ketik : Mediasi Administrasi Publik" value="<?=$keyword;?>">
                                <div class="input-group-append rounded">
                                    <button class="btn btn-primary rounded" type="submit"  id="btnSubmit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <?php foreach($events as $rowevents):?>
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow-sm border-0 reset-anchor d-block hover-transition">
                                <a class="d-block dark-overlay card-img-top overflow-hidden tool-trending" href="<?=base_url('/event-detail?id='.$rowevents['event_id']);?>">
                                    <div class="featured-badge" style="right:1rem" rel="tooltip" data-placement="top" title="IDR <?=rp($rowevents['event_harga']);?>">
                                        <label for="" class="mb-0">IDR <?=rp($rowevents['event_harga']);?></label>
                                    </div>
                                    <div class="overlay-content">
                                        <img class="img-fluid" style="height:250px;object-fit: cover;width: 100%;" src="<?= base_file($rowevents['event_gambar'], NULL)->url; ?>" alt="...">
                                    </div>
                                </a>
                                <div class="card-body p-3">
                                    <h3 class="h6">
                                        <a class="stretched-link reset-anchor" href="<?=base_url('/event-detail?id='.$rowevents['event_id']);?>">"<?=$rowevents['event_nama'];?>"</a>
                                    </h3>
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <label class="mb-0">Kategori : <?=($rowevents['kategori']);?></label>
                                            <p class="text-small text-muted mb-2"><?=tanggal_dMY($rowevents['event_mulai']);?> - <?=tanggal_dMY($rowevents['event_selesai']);?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Pagination-->
                    <hr >
                    <div class="row mb-5 mt-3">
                        <div class="col-12 mb-4">
                            <?php echo $pager->links('show', 'p') ?> 
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script>
    $( "#sort" ).change(function() {
        $("#btnSubmit").click();
    });

    $( "#price" ).change(function() {
        $("#btnSubmit").click();
    });
</script>