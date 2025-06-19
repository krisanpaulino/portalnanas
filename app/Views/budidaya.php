<?= $this->extend('layout_front'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="container">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <!-- <div class="breadcrumb-title pe-3"><?= $title ?></div> -->
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Beranda</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                    </ol>
                </nav>
            </div>
        </div>
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
        <h1>BUDIDAYA NANAS</h1>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3 row-cols-xl-3">
            <?php foreach ($budidaya as $row) : ?>
                <div class="col">
                    <div class="card">
                        <a href="#!" class="thumb-post"><img class="card-img-top " src="<?= base_url('assets/images/' . $row->gambar) ?>" height="300px" alt="Gambar" /></a>
                        <div class="card-body">
                            <div>
                                <h5 class="card-title"><?= $row->judul ?></h5>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="small text-muted">Ditulis oleh : <?= ($row->user_id != null) ? $row->nama_lengkap : 'Admin' ?></span>
                                </div>
                            </div>
                            <p class="card-text"><?= substr(strip_tags(preg_replace("/<img[^>]+\>/i", "", $row->isi)), 0, 250) ?> ...</p> <a href="<?= base_url('budidaya/' . $row->budidaya_id) ?>" class="text-primary">Lihat Selengkapnya >></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>