<?= $this->extend('layout_admin'); ?>
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
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?= base_url('admin/user') ?>">user</a></li>
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
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-8">
                    <form action="<?= base_url('admin/user/update') ?>" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data User</h5>
                                <hr />
                                <input type="hidden" name="user_id" value="<?= $user->user_id ?>">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nama Lengkap</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control <?= (isset(session('errors')['nama_lengkap'])) ? 'is-invalid' : '' ?>" id="nama_lengkap" name="nama_lengkap" value="<?= old('nama_lengkap', $user->nama_lengkap) ?>">
                                        <div class="invalid-feedback">
                                            <?php if (isset(session('errors')['nama_lengkap'])) : ?>
                                                <?= session('errors')['nama_lengkap'] ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Username</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control <?= (isset(session('errors')['username'])) ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= old('username', $user->username) ?>">
                                        <div class="invalid-feedback">
                                            <?php if (isset(session('errors')['username'])) : ?>
                                                <?= session('errors')['username'] ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="email" class="form-control <?= (isset(session('errors')['email'])) ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= old('email', $user->email) ?>">
                                        <div class="invalid-feedback">
                                            <?php if (isset(session('errors')['email'])) : ?>
                                                <?= session('errors')['email'] ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="file">Foto</label>
                                    <input type="file" class="form-control <?= (isset(session('errors')['file'])) ? 'is-invalid' : '' ?>" id="file" name="file" value="<?= old('file') ?>">
                                    <div class="invalid-feedback">
                                        <?php if (isset(session('errors')['file'])) : ?>
                                            <?= session('errors')['file'] ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Simpan Perubahan" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>