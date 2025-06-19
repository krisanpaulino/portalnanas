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

                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="<?= base_url(session('user')->user_type) ?>/budidaya/tambah" type="button" class="btn btn-primary">Tambah</a>
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
            <h5 class="card-title"></h5>
            <hr />
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Thumbnail</th>
                            <th>Penulis</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($budidaya as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->judul ?></td>
                                <td><img style="height: 100px;" src="<?= base_url('assets/images/' . $row->gambar) ?>" alt="" class="img-thumbnail"></td>
                                <td><?= $row->nama_lengkap ?></td>
                                <td>
                                    <form action="<?= base_url(session('user')->user_type . '/budidaya/delete') ?>" method="post">
                                        <input type="hidden" name="budidaya_id" value="<?= $row->budidaya_id ?>">
                                        <a href="<?= base_url(session('user')->user_type . '/budidaya/' . $row->budidaya_id) ?>" class="badge bg-info">Edit</a>
                                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus budidaya?')" class="badge bg-danger border">Hapus</button>
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