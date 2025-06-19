<?= $this->extend('layout_petani'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <!--breadcrumb-->
    <!--end breadcrumb-->
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
            <div class="text-white"><?= session('success') ?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <?php if (session()->has('danger')) : ?>
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
            <div class="text-white"><?= session('danger') ?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <!-- <div class="d-flex justify-content-center"> -->
    <div class="row d-flex justify-content-center mb-4">
        <div class="col-md-12 text-center">
            <div class="">
                <div class="">
                    <!--container-->
                    <div class="container py-2">
                        <h2 class="font-weight-light text-center text-muted py-3">SELAMAT DATANG DI SISTEM PAKAR DIAGNOSA PENYAKIT TANAMAN BUNCIS <br><span class="text-primary"> KELOMPOK TANI DABALULIK</span></h2>
                        <!-- timeline item 1 -->
                        <div class="row g-0">
                            <div class="col-sm">
                                <!--spacer-->
                            </div>
                            <!-- timeline item 1 center dot -->
                            <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                                <div class="row h-50">
                                    <div class="col">&nbsp;</div>
                                    <div class="col">&nbsp;</div>
                                </div>
                                <h5 class="m-2">
                                    <span class="badge rounded-pill bg-primary border">&nbsp;</span>
                                </h5>
                                <div class="row h-50">
                                    <div class="col border-end border-primary">&nbsp;</div>
                                    <div class="col">&nbsp;</div>
                                </div>
                            </div>
                            <!-- timeline item 1 event content -->
                            <div class="col-sm py-2">
                                <div class="card radius-15">
                                    <div class="card-body">
                                        <h4 class="card-title text-muted">Dabalulik</h4>
                                        <p class="card-text">Kelompok Tani Dabalulik Tempatnya Di Nusa Tengara Timur, Kabupaten Belu,Kecamatan Kakulu Mesak,Desa Kabuna.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <!-- timeline item 2 -->
                        <div class="row g-0">
                            <div class="col-sm py-2">
                                <div class="card shadow radius-15">
                                    <div class="card-body">
                                        <h4 class="card-title text-muted">Tanaman Di Kelompok Tani Dabalulik</h4>
                                        <p class="card-text">Tanaman yang sering di tanam oleh kelompok tani dabalulik ada bermacam-macam tanaman yaitu :</p>
                                        <div>Buncis</div>
                                        <div>Kacang Panjang</div>
                                        <div>Tomat</div>
                                        <div>Mentimun</div>
                                        <!-- <div class="collapse border show" id="t22_details">
                                            <div class="p-2 text-monospace">

                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                                <div class="row h-50">
                                    <div class="col border-end border-primary">&nbsp;</div>
                                    <div class="col">&nbsp;</div>
                                </div>
                                <h5 class="m-2">
                                    <span class="badge rounded-pill bg-primary">&nbsp;</span>
                                </h5>
                            </div>
                            <div class="col-sm">
                                <!--spacer-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->

    <!-- <div class="row">
        <div class="col-lg-4 col-md-3">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="<?= base_url('assets/img/profile/' . $petani->petani_foto) ?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                        <div class="mt-3">
                            <h4><?= $petani->petani_nama ?></h4>
                            <p class="text-secondary mb-1">Petani</p>
                            <p class="text-muted font-size-sm"><?= $petani->petani_alamat ?></p>
                            <a class="btn btn-outline-primary" href="<?= base_url('petani/profil') ?>">Edit Profil</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card radius-10">
                <div class="card-body">
                    <h5 class="card-title">Diagnosa Anda</h5>
                    <hr />
                    <?php if (!empty($diagnosa)) : ?>
                        <table class="table mb-4">
                            <tr>
                                <th>Tanggal</th>
                                <th>Hasil</th>
                            </tr>
                            <?php foreach ($diagnosa as $diag) : ?>
                                <tr>
                                    <td><?= $diag->diagnosa_tgl ?></td>
                                    <td><?= $diag->penyakit_nama ?></td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                        <div class="d-flex justify-content-end">
                            <a href="<?= base_url('petani/diagnosa') ?>" class="text-primary">Lihat Selengkapnya >></a>
                        </div>
                    <?php else : ?>
                        <p class="text-center">Anda Belum memiliki riawayat diagnosa. Pergi ke menu <b>Diagnosa</b> untuk mulai melakukan diagnosa.</p>
                    <?php endif ?>
                </div>
            </div>
        </div>

    </div> -->
    <div class="row text-center">
        <h2 class="font-weight-light text-center py-3">INFORMASI DI KELOMPOK TANI DABALULIK</h2>
    </div>
    <div class="row d-flex justify-content-center">
        <?php foreach ($berita as $b) : ?>
            <div class="col-3">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="<?= base_url('assets/img/profile/' . $b->berita_thumbnail) ?>" alt="" class="img-thumbnail">
                            <br>
                            <a href="<?= base_url('petani/berita/' . $b->berita_id) ?>">
                                <h3><?= $b->berita_judul ?></h3>
                            </a>
                            <p class="card-text"><?= substr($b->berita_isi, 0, 100) ?> ...</p> <a href="<?= base_url('petani/berita/' . $b->berita_id) ?>" class="text-primary">Lihat Selengkapnya >></a>
                        </div>

                    </div>
                </div>

            </div>
        <?php endforeach ?>
    </div>
</div>
<?= $this->endSection(); ?>