<!-- Searching section-->
<section class="hero-home py-5">
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center">
                <p class="h6 text-uppercase text-primary mb-3">Temukan beragam informasi event seputar mediasi di portal ini dan upgrade pengetahuanmu</p>
                <h3 class="mb-5">EVENT PUSAT MEDIASI INDONESIA </h3>
                <form class="p-2 rounded shadow-sm bg-white" action="#">
                    <div class="input-group">
                        <input class="form-control border-0 mr-2" type="search" placeholder="Contoh, ketik : Mediasi Administrasi Publik">
                        <div class="input-group-append rounded">
                            <button class="btn btn-primary rounded" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <header class="text-center mb-5 mt-3">
            <p class="text-muted text-small">Ketik pencarian menggunakan kata kunci yang ingin kamu cari.</p>
        </header>
    </div>
</section>
<!-- kategory -->
<section class="pb-5">
    <div class="container pb-5">
        <div class="row text-center">
            <?php foreach($kategori as $rowkategori): ?>
            <div class="col-lg-3 px-lg-2" >
                <div class="categories-item card border-0 shadow mb-4 reset-anchor hover-transition">
                    <div class="card-body px-4 py-5" style="height: 250px;">
                        <svg class="svg-icon svg-icon-big mb-3" style="height: 80px;">
                            <use xlink:href="#stack-1"> </use>
                        </svg>
                        <h6 class="h6"> <a class="stretched-link reset-anchor-inherit" href="<?=base_url('/event-kategori?kategori_id='.$rowkategori['kategori_id']);?>"><?=$rowkategori['kategori_nama'];?></a></h6>
                        <p class="categories-item-number small mb-0">5 Events</p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <div class="col-lg-12 text-center pt-4"><a class="btn btn-danger" href="#">FREE REGISTER NOW</a></div>
        </div>
    </div>
</section>
<!-- list event  -->
<section class="py-5" style="background: #FFF;">
    <div class="container pb-5">
        <header class="text-center mb-5">
            <h4 class="mb-1">Eksplorasi aneka ragam event yang cocok untukmu</h4>
            <p class="text-muted text-small">Kami menyiapkan agenda event berkualitas untuk meningkatkan pengetahuan dan kemajuan bersama.</p>
        </header>
        <div class="row">
            <?php foreach($events as $rowevents): ?>
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow hover-transition">
                    <a href="#"><img class="card-img-top img-fluid" style="height:200px;object-fit: cover;" src="<?= base_file($rowevents['event_gambar'], NULL)->url; ?>" alt="..."></a>
                    <div class="card-body px-4 pb-3 pt-4">
                        <h5 class="h6"><a class="stretched-link reset-anchor" href="<?=base_url('/event-detail?id='.$rowevents['event_id']);?>"><?=$rowevents['event_nama'];?></a></h5>
                        <p class="text-small text-muted"><?=substr($rowevents['event_deskripsi'],0,160);?>...</p>
                        <div class="media align-items-center">
                            <svg class="svg-icon">
                                <use xlink:href="#pie-chart-1"> </use>
                            </svg>
                            <div class="media-body ml-3">
                                <label class="mb-0">Mediasi Sengketa Tanah</label>
                                <p class="text-small text-muted mb-2"><?=tanggal_dMY($rowevents['event_mulai']);?> - <?=tanggal_dMY($rowevents['event_selesai']);?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <div class="col-lg-12 text-center pt-4"><a class="btn btn-primary" href="<?=base_url('/event');?>">See more Events...</a></div>
        </div>
    </div>
</section>