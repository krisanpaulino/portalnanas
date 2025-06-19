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
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah"><i class='bx bx-list-plus'></i>Tambah Galeri</button>
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
    <h6 class="mb-0 text-uppercase">Data Galeri</h6>
    <hr />

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4">
        <?php foreach ($galeri as $row) : ?>
            <div class="col-md-4">
                <div class="card border-primary border-bottom border-3 border-0">
                    <img src="<?= base_url('assets/img/galeri/' . $row->gambar) ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-primary"><?= $row->judul ?></h5>
                        <p class="card-text"><?= $row->isi ?>.</p>
                        <hr>
                        <div class="d-flex align-items-center gap-2">
                            <a href="javascript:;" class="btn btn-inverse-primary" data-bs-toggle="modal" data-bs-target="#edit" data-id="<?= $row->galeri_id ?>" data-isi="<?= $row->isi ?>" data-judul="<?= $row->judul ?>"><i class='bx bx-pencil'></i>Edit</a>
                            <a href="javascript:;" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus" data-id="<?= $row->galeri_id ?>"><i class='bx bx-trash'></i>Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <!--end row-->
</div>
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form" action="<?= base_url('admin/galeri/hapus') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="galeri_id" id="kodeitemhapus" value="">
                <div class="modal-body">
                    <h5>Yakin ingin mengapus galeri ?</h5>
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
                <h5 class="modal-title" id="formLabel">Tambah Galeri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/galeri/store') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['judul'])) ? 'is-invalid' : '' ?>" name="judul" value="<?= old('judul') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['judul'])) : ?>
                                <?= session('errors')['judul'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="file">Gambar</label>
                        <input type="file" class="form-control <?= (isset(session('errors')['file'])) ? 'is-invalid' : '' ?>" name="file" value="<?= old('file') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['file'])) : ?>
                                <?= session('errors')['file'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="isi">Deskripsi</label>
                        <textarea class="form-control <?= (isset(session('errors')['isi'])) ? 'is-invalid' : '' ?>" name="isi"><?= old('isi') ?></textarea>
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['isi'])) : ?>
                                <?= session('errors')['isi'] ?>
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
            <form action="<?= base_url('admin/galeri/update') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="galeri_id" id="kodeitemedit">
                    <div class="form-group mb-4">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['judul'])) ? 'is-invalid' : '' ?>" id="judul" name="judul" value="">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['judul'])) : ?>
                                <?= session('errors')['judul'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="file">Gambar <span class="text-warning">Kosongkan jika tidak ingin mengubah file</span></label>
                        <input type="file" class="form-control <?= (isset(session('errors')['file'])) ? 'is-invalid' : '' ?>" id="file" name="file">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['file'])) : ?>
                                <?= session('errors')['file'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="isi">Deskripsi</label>
                        <textarea class="form-control <?= (isset(session('errors')['isi'])) ? 'is-invalid' : '' ?>" id="isi" name="isi"></textarea>
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['isi'])) : ?>
                                <?= session('errors')['isi'] ?>
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
        var judul = $(event.relatedTarget).data('judul');
        var isi = $(event.relatedTarget).data('isi');
        console.log(isi);

        $(this).find('#kodeitemedit').attr("value", kode);
        $(this).find('#judul').attr("value", judul);
        $(this).find('#isi').text(isi);
    });
</script>
<?= $this->endSection(); ?>