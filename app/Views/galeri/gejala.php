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

                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="<?= base_url(session('user')->user_type) ?>/penyakit/<?= $penyakit->penyakit_kode ?>/tambah-gejala" type="button" class="btn btn-primary">Tambah</a>
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
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Gejala Penyakit <?= $penyakit->penyakit_nama ?></h5>
            <hr />
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gejala</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($petagejala as $gejala) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $gejala->gejala_nama ?></td>
                                <td>
                                    <form action="<?= base_url(session('user')->user_type . '/penyakit/delete-gejala') ?>" method="post">
                                        <input type="hidden" name="petagejala_id" value="<?= $gejala->petagejala_id ?>">
                                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus gejala dari penyakit?')" class="badge bg-danger border">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>