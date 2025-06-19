<?= $this->extend('layout_' . session('user')->user_type); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><?= $title ?></div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="bx bx-home-alt"></i></a>

                    <li class="breadcrumb-item"><a href="<?= base_url(session('user')->user_type . '/penyakit') ?>">Data Penyakit</a>
                    <li class="breadcrumb-item"><a href="<?= base_url(session('user')->user_type . '/penyakit/' . $penyakit->penyakit_kode . '/gejala') ?>">Gejala <?= $penyakit->penyakit_nama ?></a>

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
    <?php if (session()->has('warning')) : ?>
        <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show">
            <div class="text-white"><?= session('warning') ?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Gejala Penyakit <?= $penyakit->penyakit_nama ?></h5>
            <hr />
            <?= form_open(session('user')->user_type . '/penyakit/store-gejala') ?>
            <div class="table-responsive">
                <input type="hidden" name="penyakit_kode" value="<?= $penyakit->penyakit_kode ?>">
                <table id="" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Pilih</th>
                            <th>Gejala</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($petagejala as $gejala) : ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="gejala[]" id="" class="form-check-input" value="<?= $gejala->gejala_kode ?>">
                                </td>
                                <td><?= $gejala->gejala_nama ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Gejala</button>
            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>