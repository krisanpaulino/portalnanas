<?= $this->extend('layout_front'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="container">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Berita</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Berita</li>
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
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body p-5">
                        <div>
                            <h5 class="card-title"><?= $berita->berita_judul ?></h5>
                            <span class="text-muted small"><?= $berita->berita_tanggal ?></span>
                            <span class="small text-muted">Ditulis oleh : <?= ($berita->user_id != null) ? $berita->nama_lengkap : 'Admin' ?></span>
                        </div>
                        <?= $berita->berita_isi ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>