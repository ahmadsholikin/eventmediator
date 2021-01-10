<section class="py-5">
    <div class="container py-5">
        <div class="row">
            <!-- Filter-->
            <div class="col-lg-3 order-2 order-lg-1">
                <h2 class="h3 mb-4 pb-1">Filter</h2>
                <form action="#">
                    <div class="card border-0 shadow-sm mb-4 p-2">
                        <div class="card-body">
                            <h6 class="h6 mb-2">Pilihan Kategori</h6>
                            <?php foreach ($kategori as $rowkategori) : ?>
                            <div class="custom-control custom-checkbox mb-2">
                                <input class="custom-control-input" id="customCheck2" type="checkbox">
                                <label class="custom-control-label" style="font-weight: 500;" for="customCheck2"><?=$rowkategori['kategori_nama'];?></label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="card border-0 shadow-sm mb-4 p-2">
                        <div class="card-body">
                            <h2 class="h6 mb-2">Choose tag</h2>
                            <div class="custom-control custom-checkbox mb-2">
                                <input class="custom-control-input" id="customCheckbox0" type="checkbox" checked>
                                <label class="custom-control-label" style="font-weight: 500;" for="customCheckbox0">Semua</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-2">
                                <input class="custom-control-input" id="customCheckbox1" type="checkbox">
                                <label class="custom-control-label" style="font-weight: 500;" for="customCheckbox1">Free</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-2">
                                <input class="custom-control-input" id="customCheckbox2" type="checkbox">
                                <label class="custom-control-label" style="font-weight: 500;" for="customCheckbox2">Paid</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-2">
                                <input class="custom-control-input" id="customCheckbox3" type="checkbox">
                                <label class="custom-control-label" style="font-weight: 500;" for="customCheckbox3">Promo</label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">
                        <i class="fas fa-search mr-2 small"></i>Search
                    </button>
                </form>
            </div>
            <!-- Listing-->
            <div class="col-lg-9 mb-5 mb-lg-0 order-1 order-lg-2">
                <!-- Listing sorting-->
                <div class="row mb-4 align-items-center">
                    <div class="col-md-7">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item my-1 my-lg-0">
                                <select class="selectpicker" name="sort" data-style="btn btn-light shadow-xs bg-white border" data-title="Sort By" data-width="180">
                                    <option value="alphapitcally">Urutkan Abjad</option>
                                    <option value="latest">Terbaru</option>
                                    <option value="top-rated">Paling Diminati</option>
                                </select>
                            </li>
                            <li class="list-inline-item my-1 my-lg-0">
                                <select class="selectpicker" name="type" data-title="Show As" data-style="btn btn-light shadow-xs bg-white border" data-width="180">
                                    <option value="tools">Kuota Tersedia</option>
                                    <option value="resources">Belum Berakhir</option>
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
                    <?php foreach($events as $rowevents):?>
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow-sm border-0 reset-anchor d-block hover-transition">
                            <a class="d-block dark-overlay card-img-top overflow-hidden tool-trending" href="<?=base_url('/event-detail?id='.$rowevents['event_id']);?>">
                                <div class="tool-thumb rounded-circle" href="<?=base_url('/event-detail?id='.$rowevents['event_id']);?>">
                                    <img class="img-fluid rounded-circle" src="<?=base_url('/public/frontend/img/tool-thumb-5.jpg');?>" alt="..." width="40">
                                </div>
                                <div class="featured-badge" style="right:1rem" rel="tooltip" data-placement="top" title="IDR <?=rp($rowevents['event_harga']);?>">
                                    <label for="" class="mb-0">IDR <?=rp($rowevents['event_harga']);?></label>
                                </div>
                                <div class="overlay-content">
                                    <img class="img-fluid" style="height:250px;object-fit: cover;width: 100%;" src="<?= base_file($rowevents['event_gambar'], NULL)->url; ?>" alt="...">
                                </div>
                            </a>
                            <div class="card-body p-3">
                                <h3 class="h6">
                                    <a class="stretched-link reset-anchor" href="<?=base_url('/event-detail?id='.$rowevents['event_id']);?>"><?=$rowevents['event_nama'];?></a>
                                </h3>
                                <p class="text-muted text-small mb-0"><?=substr($rowevents['event_deskripsi'],0,170);?>...</p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- Pagination-->
                <hr >
                <nav class="mt-5" aria-label="Page navigation example">
                    <ul class="pagination justify-content-end mb-0">
                        <li class="page-item mx-1">
                            <a class="page-link rounded border-0 shadow-sm px-3" href="#" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                            </a>
                        </li>
                        <li class="page-item mx-1 active">
                            <a class="page-link rounded border-0 shadow-sm px-3" href="#">1</a>
                        </li>
                        <li class="page-item mx-1">
                            <a class="page-link rounded border-0 shadow-sm px-3" href="#">2</a>
                        </li>
                        <li class="page-item mx-1">
                            <a class="page-link rounded border-0 shadow-sm px-3" href="#">3</a>
                        </li>
                        <li class="page-item mx-1">
                            <a class="page-link rounded border-0 shadow-sm px-3" href="#" aria-label="Next">
                                <span aria-hidden="true">»</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>