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
        <div class="row">
            <!--end breadcrumb-->
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                <?php foreach ($galeri as $row) : ?>
                    <div class="col">
                        <h6 class="mb-0 text-uppercase"><?= $row->judul ?></h6>
                        <hr />
                        <div class="card">
                            <div class="card-body">
                                <p><?= getExt(('assets/img/galeri/' . $row->gambar)) ?></p>
                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <?php $ext = getExt(('assets/img/galeri/' . $row->gambar)) ?>
                                            <?php if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg'): ?>
                                                <img src="<?= base_url('assets/img/galeri/' . $row->gambar) ?>" class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-md-block" style="background-color: rgb(0 0 0 / 0.5)">
                                                    <p><?= $row->isi ?></p>
                                                </div>
                                            <?php else: ?>
                                                <video controls class="d-block w-100">
                                                    <source src="<?= base_url('assets/img/galeri/' . $row->gambar) ?>" type="video/mp4">
                                                </video>
                                            <?php endif ?>

                                        </div>
                                    </div>
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