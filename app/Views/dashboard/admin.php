<?= $this->extend('layout_admin'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Berita</p>
                            <h4 class="my-1 text-info"><?= $berita ?> Entry</h4>
                            <p class="mb-0 font-13"><a href="{{ route('transaksi.verify') }}" class="text-success">Lihat
                                    Selengkapnya</a></p>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                class="bx bxs-news"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Informasi Budidaya</p>
                            <h4 class="my-1 text-info"><?= $budidaya ?> Entry</h4>
                            <p class="mb-0 font-13"><a href="{{ route('transaksi.ship') }}" class="text-success">Lihat
                                    Selengkapnya</a></p>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i
                                class="lni lni-leaf"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Konsultasi Open</p>
                            <h4 class="my-1 text-info"><?= $open ?> Chat</h4>
                            <p class="mb-0 font-13"><a href="{{ route('transaksi.shipping') }}" class="text-success">Lihat
                                    Selengkapnya</a></p>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i
                                class="lni lni-comments"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Konsultasi Selesai</p>
                            <h4 class="my-1 text-info"><?= $close ?> Chat</h4>
                            <p class="mb-0 font-13"><a href="{{ route('transaksi.finished') }}" class="text-success">Lihat
                                    Selengkapnya</a></p>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i
                                class="bx bxs-message-rounded-check"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>