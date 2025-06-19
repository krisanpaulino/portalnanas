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
            <h1>Konsultasi</h1>

        </div>
        <div class="row">
            <div class="col-12 col-lg-9 mx-auto">
                <!-- <h6 class="mb-0 text-uppercase">Basic Media Object</h6> -->
                <hr />
                <div class="mb-4 text-center"><button class="btn btn-outline-primary px-5 radius-30 btn-lg" data-bs-toggle="modal" data-bs-target="#tambah"><i class='bx bx-message-dots'></i>Mulai Percakapan</button></div>
                <div class="card radius-10">
                    <div class="card-body">
                        <table id="example" class="table table-stripped style=" width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Topik</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($konsultasi as $row) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row->waktu_konsultasi ?></td>
                                        <td><?= $row->topik ?></td>
                                        <td>
                                            <div class="badge rounded-pill p-2 text-uppercase px-3 <?= ($row->status == 'open') ? ' text-success bg-light-success ' : 'text-secondary bg-light-secondary' ?>"><i class="bx bxs-circle me-1"></i><?= $row->status ?></div>

                                        </td>
                                        <td>
                                            <a href="<?= base_url('konsultasi/' . $row->konsultasi_id) ?>" class="btn btn-warning text-light position-relative radius-30 "><i class="bx bx-chat"></i>Open Chat<?php if ($count = unreadChat($row->konsultasi_id) > 0): ?><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">+<?= $count ?> </span><?php endif ?></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="formLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formLabel">Tambah Galeri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('konsultasi/create') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="topik" class="text-dark">Topik</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['topik'])) ? 'is-invalid' : '' ?>" name="topik" value="<?= old('topik') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['topik'])) : ?>
                                <?= session('errors')['topik'] ?>
                            <?php endif; ?>
                        </div>
                        <p class="text-primay small">Silahkan mengisi topik sesuai dengan pertanyaan / konsultasi <br> yang ingin anda ajukan!</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Mulai Chat</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>