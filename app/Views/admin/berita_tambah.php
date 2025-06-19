<?= $this->extend('layout_admin'); ?>
<?= $this->section('content') ?>
<div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><?= $title ?></div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="bx bx-home-alt"></i></a>
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/berita') ?>">Berita</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>
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
    <!-- Container-fluid starts-->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0 mb-1">
                    <h5>Form Tambah Berita</h5><span></span>
                </div>
                <div class="card-body">
                    <div class="mb-4 mt-1">
                        <p class="txt-info">Isian yang memiliki tanda (<span class="txt-danger">*</span>) wajib diisi</p>
                    </div>
                    <form action="<?= base_url('admin/berita/insert') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <!-- ISBN -->
                        <!-- Judul -->
                        <div class="form-group mb-4">
                            <label for="berita_judul"><span class="txt-danger">*</span>Judul</label>
                            <input type="text" class="form-control <?= (isset(session('errors')['berita_judul'])) ? 'is-invalid' : '' ?>" id="berita_judul" name="berita_judul" value="<?= old('berita_judul') ?>">
                            <div class="invalid-feedback">
                                <?php if (isset(session('errors')['berita_judul'])) : ?>
                                    <?= session('errors')['berita_judul'] ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="berita_isi"><span class="txt-danger">*</span>Isi</label>
                            <textarea rows="30" class="form-control <?= (isset(session('errors')['berita_isi'])) ? 'is-invalid' : '' ?>" id="editor2" name="berita_isi"><?= old('berita_isi') ?></textarea>
                            <div class="invalid-feedback">
                                <?php if (isset(session('errors')['berita_isi'])) : ?>
                                    <?= session('errors')['berita_isi'] ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <button type="submit" class="btn btn-primary">Simpan Berita</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
<?= $this->endSection(); ?>
<?= $this->section('plugincss'); ?>
<!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin') ?>/css/select2.css"> -->
<?= $this->endSection(); ?>
<?= $this->section('plugins'); ?>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
    $('#hapus').on('show.bs.modal', function(event) {
        var kode = $(event.relatedTarget).data('id');
        $(this).find('#iditemhapus').attr("value", kode);
    });
    CKEDITOR.replace('editor2');
</script>
<?= $this->endSection(); ?>