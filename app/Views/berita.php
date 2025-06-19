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
        <div class="text-center">
            <h1>Berita</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah"><i class='bx bx-message-dots'></i>Tambah Galeri</button>
        </div>
        <div class="row">
            <div class="col-12 col-lg-9 mx-auto">
                <!-- <h6 class="mb-0 text-uppercase">Basic Media Object</h6> -->
                <hr />
                <?php foreach ($berita as $row) : ?>
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="<?= base_url('assets/images/' . $row->berita_gambar) ?>" class="rounded-circle p-1 border" width="90" height="90" alt="...">
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mt-0"><?= $row->berita_judul ?></h5>
                                    <span class="text-muted small"><?= $row->berita_tanggal ?></span>
                                    <p class="mb-0" <?= substr(strip_tags(preg_replace("/<img[^>]+\>/i", "", $row->berita_isi)), 0, 250) ?> ...</p> <a href="<?= base_url('berita/' . $row->berita_id) ?>" class="text-primary">Lihat Selengkapnya >></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>