<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="card border-0 shadow-sm mb-4 mb-lg-5 p-2 p-lg-0">
                    <div class="card-body p-lg-4">
                        <h2 class="h4 mb-4"><?=strtoupper($events[0]['event_nama']);?></h2>
                        <img src="<?= base_file($events[0]['event_gambar'], NULL)->url; ?>" style="width: 100%; border-radius:5px" class="img-fluid img-responsive mb-4" alt="">
                        <p><?=$events[0]['event_deskripsi'];?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="card border-0 shadow-sm mb-4 mb-lg-5 p-2 p-lg-0">
                    <div class="card-body p-lg-4">
                        <h2 class="h5 mb-4">Informasi Event</h2>
                        <p>Berlangsung pada tanggal <?=tanggal_dFY($events[0]['event_mulai']);?> sampai <?=tanggal_dFY($events[0]['event_mulai']);?></p>
                        <p>Lokasi : <b><?=$events[0]['event_lokasi'];?></b></p>
                        <p>Jumlah Kuota : <?=$events[0]['event_kuota'];?> Peserta</p>
                        <p>Jumlah Pendaftar : 0 Peserta</p>
                        <p>Biaya : <b>IDR <?=rp($events[0]['event_harga']);?></b></p>
                        <button class="btn btn-success btn-md btn-block">Register Now</button>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mb-4 mb-lg-5 p-2 p-lg-0">
                    <div class="card-body p-lg-4">
                        <h2 class="h5 mb-4">Tags Terkait</h2>
                        <ul class="list-inline mb-0">
                        <li class="list-inline-item m-1"><a class="btn btn-light" href="#">Adminsitrasi Publik</a></li>
                        <li class="list-inline-item m-1"><a class="btn btn-light" href="#">Mediasi</a></li>
                        <li class="list-inline-item m-1"><a class="btn btn-light" href="#">Bisnis</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mb-4 mb-lg-5 p-2 p-lg-0">
                    <div class="card-body p-lg-5">
                        <h2 class="h5 mb-4">Share to Social links</h2>
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a class="social-link whatsapp" href="#"><i class="fab fa-whatsapp"></i></a></li>
                            <li class="list-inline-item"><a class="social-link telegram" href="#"><i class="fab fa-telegram"></i></a></li>
                            <li class="list-inline-item"><a class="social-link facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a class="social-link twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a class="social-link instagram" href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>