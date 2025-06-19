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
                    </li>
                    </li>
                    <li class="breadcrumb-item"><a href="<?= base_url(session('user')->user_type) ?>/budidaya">Data Budidaya</a>
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
    <div class="card">
        <div class="card-body">
            <h6 class="mb-0 text-uppercase"><?= $form_title ?></h6>
            <hr />
            <?php if ($budidaya->budidaya_id == null) : ?>
                <?= form_open(session('user')->user_type . '/budidaya/store') ?>
                <input type="hidden" name="budidaya_id" value="<?= $budidaya->budidaya_id ?>">
            <?php else : ?>
                <?= form_open(session('user')->user_type . '/budidaya/update') ?>
                <input type="hidden" name="budidaya_id" value="<?= $budidaya->budidaya_id ?>">
            <?php endif ?>

            <div class="form-group mb-4">
                <label for="judul">Judul Budidaya</label>
                <input type="text" class="form-control <?= (isset(session('errors')['judul'])) ? 'is-invalid' : '' ?>" id="judul" name="judul" value="<?= old('judul', $budidaya->judul) ?>">
                <div class="invalid-feedback">
                    <?php if (isset(session('errors')['judul'])) : ?>
                        <?= session('errors')['judul'] ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="isi">Isi Budidaya</label>
                <textarea id="editor" name="isi" aria-hidden="true" style="display: none;" required><?= old('isi', $budidaya->isi) ?></textarea>
                <div class="invalid-feedback">
                    <?php if (isset(session('errors')['isi'])) : ?>
                        <?= session('errors')['isi'] ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan Budidaya</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('scripts'); ?>
<script>
    CKEDITOR.replace('editor');
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
</script>
<?= $this->endSection(); ?>