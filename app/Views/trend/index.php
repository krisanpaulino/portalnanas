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
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah"><i class='bx bx-list-plus'></i>Tambah Trend</button>
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
    <h6 class="mb-0 text-uppercase">Trend Harga</h6>
    <hr />

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <hr />
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Trend</th>
                            <th>Harga Trend</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($trend as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->tanggal_trend ?></td>
                                <td><?= number_format($row->harga_trend) ?></td>
                                <td>
                                    <a href="javascript:;" data-id="<?= $row->trendharga_id ?>" data-harga=<?= $row->harga_trend ?> data-bs-toggle="modal" data-bs-target="#edit" class="badge bg-info">Edit</a>
                                    <a data-id="<?= $row->trendharga_id ?>" data-harga=<?= $row->harga_trend ?> data-bs-toggle="modal" data-bs-target="#hapus" class="badge bg-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form" action="<?= base_url('admin/trend-harga/hapus') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="trendharga_id" id="kodeitemhapus" value="">
                <div class="modal-body">
                    <h5>Yakin ingin mengapus data trend harga ini ?</h5>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="formLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formLabel">Tambah Trend Harga</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/trend-harga/store') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="judul">Harga Terbaru</label>
                        <input type="number" class="form-control <?= (isset(session('errors')['harga_trend'])) ? 'is-invalid' : '' ?>" name="harga_trend" value="<?= old('harga_trend') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['harga_trend'])) : ?>
                                <?= session('errors')['harga_trend'] ?>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="formLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formLabel">Edit Galeri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/trend-harga/update') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="trendharga_id" id="kodeitemedit">
                    <div class="form-group mb-4">
                        <label for="judul">Harga Terbaru</label>
                        <input type="number" class="form-control <?= (isset(session('errors')['harga_trend'])) ? 'is-invalid' : '' ?>" name="harga_trend" id="harga">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['harga_trend'])) : ?>
                                <?= session('errors')['harga_trend'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('scripts'); ?>
<script>
    $('#hapus').on('show.bs.modal', function(event) {
        var kode = $(event.relatedTarget).data('id');
        $(this).find('#kodeitemhapus').attr("value", kode);
    });

    $('#edit').on('show.bs.modal', function(event) {
        var kode = $(event.relatedTarget).data('id');
        var harga = $(event.relatedTarget).data('harga');

        $(this).find('#kodeitemedit').attr("value", kode);
        $(this).find('#harga').attr("value", harga);
    });
</script>
<?= $this->endSection(); ?>