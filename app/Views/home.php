<?= $this->extend('layout_front'); ?>
<?= $this->section('content'); ?>
<!-- <div class="page-content"> -->
<!--breadcrumb-->
<!-- <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><?= $title ?></div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>
        </div>
    </div> -->
<!--end breadcrumb-->
<div class="fixed-top" style="right: 10px; top:250px">
    <div class="row-cols-6 d-flex justify-content-end">
        <div class="col-2">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="text-center">
                        <div class="widgets-icons rounded-circle mx-auto bg-light-primary text-primary mb-3"><img src="<?= base_url('assets/images/analytics.gif') ?>" alt="" class="img-fluid">
                        </div>
                        <input type="hidden" id="harga_id">
                        <h4 class="my-1" id="harga"><?= number_format(getHarga()) ?></h4>
                        <p class="mb-0 text-secondary">Trend Harga Nanas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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


<section id="recent-posts" class="recent-posts">
    <div class="container" data-aos="fade-up">
        <h1>PORTAL WEB KULTIVASI NANAS</h1>
        <div class="row mt-4 mb-4">
            <div class="col-md-4">
                <form action="<?= base_url('budidaya') ?>" method="get">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Cari budidaya..." aria-label="Cari budidaya..." aria-describedby="button-search" name="search" />
                        <button type="submit" class="btn btn-warning" id="button-search" type="button">Cari!</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row gy-5">

            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="1">
                <div class="post-box">
                    <div class="post-img"><img src="<?= base_url('assets/petani/beranda1.jpeg') ?>" class="img-fluid" alt=""></div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="post-box">
                    <div class="post-img"><img src="<?= base_url('assets/petani/beranda2.jpg') ?>" class="img-fluid" alt=""></div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="post-box">
                    <div class="post-img"><img src="<?= base_url('assets/petani/beranda3.jpg') ?>" class="img-fluid" alt=""></div>
                </div>
            </div>


        </div>

    </div>
</section>
<!-- <div class="row d-flex justify-content-between">
        <div class="col-md-4">
            <img src="<?= base_url('assets/petani/beranda1.jpg') ?>" alt="" class="img-fluid">
        </div>
        <div class="col-md-4">
            <img src="<?= base_url('assets/petani/beranda2.jpg') ?>" alt="" class="img-fluid">
        </div>
        <div class="col-md-4">
            <img src="<?= base_url('assets/petani/beranda3.jpg') ?>" alt="" class="img-fluid">
        </div>
    </div> -->
<section id="why-us" class="why-us ">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>
                Tentang Portal
            </h2>

        </div>

        <div class="row g-0" data-aos="fade-up" data-aos-delay="200">

            <div class="col-xl-5 img-bg" style="background-image: url('assets/petani/about1.webp')"></div>
            <div class="col-xl-7 slides  position-relative" style="background-color:rgb(255, 251, 231);">

                <div class=" swiper">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="item">
                                <p class="blockquote">Portal ini hadir sebagai solusi inovatif untuk mendukung pengembangan perkebunan nanas di Indonesia. Nanas merupakan komoditas tropis yang memiliki potensi besar dalam meningkatkan produktivitas lahan, menyediakan sumber nutrisi lokal, serta menambah pendapatan petani. Namun, berbagai tantangan seperti keterbatasan informasi budidaya, pengendalian hama, dan akses pasar masih menjadi hambatan utama.

                                </p>
                                <p class="blockquote">
                                    Melalui pemanfaatan teknologi informasi, kami menghadirkan platform yang menyediakan informasi terkini seputar teknik budidaya nanas, harga pasar, tren permintaan, hingga peluang pemasaran. Tujuan kami adalah membantu petani meningkatkan kualitas dan hasil panen, mengurangi risiko gagal panen, serta mendorong pertumbuhan ekonomi lokal.

                                    Kami percaya bahwa dengan akses informasi yang tepat, petani nanas dapat lebih sejahtera dan potensi perkebunan nanas dapat dioptimalkan secara berkelanjutan.
                                </p>
                            </div>
                        </div><!-- End slide item -->


                    </div>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Why Choose Us Section -->
<section id="features" class="features">
    <div class="container" data-aos="fade-up">
        <div class="row d-flex justify-content-center">
            <div class="col-4 text-center">
                <div class="section-header">
                    <h2>
                        Galeri
                    </h2>
                </div>
                <p class="blockquote">Galeri kultivasi perkebunan nanas.
                </p>
            </div>
            <div class="col-7">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php foreach ($galeri as $key => $row): ?>
                            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $key ?>" class="<?= ($key == 0) ? 'active' : '' ?>"></li>
                        <?php endforeach ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php foreach ($galeri as $key => $row): ?>
                            <div class="carousel-item <?= ($key == 0) ? 'active' : '' ?>">
                                <img src="<?= base_url('assets/img/galeri/' . $row->gambar) ?>" class="d-block w-100" alt="...">
                            </div>
                        <?php endforeach ?>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="details" style="background-color:rgb(255, 251, 231);">
        <div class="container" data-aos="fade-up" data-aos-delay="300">
            <div class="row">
                <div class="col-md-6">
                    <h4>Misi Kami</h4>
                    <p>Menjadi platform digital terdepan dalam mendukung pengembangan perkebunan nanas berkelanjutan melalui penyediaan informasi, edukasi, dan akses pasar untuk meningkatkan kesejahteraan petani dan pertumbuhan ekonomi lokal.</p>
                </div>
                <div class="col-md-6">
                    <h4>Visi Kami</h4>
                    <ol>
                        <li>Menyediakan informasi terkini dan terpercaya seputar teknik budidaya nanas yang efektif dan ramah lingkungan.</li>

                        <li>Memberikan akses mudah bagi petani terhadap data harga pasar, tren permintaan, serta peluang distribusi dan pemasaran.</li>

                        <li>Menjadi jembatan antara petani, pelaku industri, dan konsumen untuk membentuk ekosistem pertanian nanas yang saling mendukung.</li>

                        <li> Mendorong pemanfaatan teknologi informasi dalam kegiatan pertanian guna meningkatkan produktivitas dan kualitas hasil panen.</li>

                        <li>Berkontribusi dalam peningkatan pendapatan petani dan pembangunan ekonomi daerah berbasis potensi lokal.</li>


                    </ol>
                </div>
            </div>
            <div class="row">

            </div>

        </div>
    </div>

</section><!-- End Features Section -->
<!-- </div> -->
<?= $this->endSection(); ?>