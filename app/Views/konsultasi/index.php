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
                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form">Tambah</button>
            <!-- Modal -->
            <div class="modal fade" id="form" tabindex="-1" aria-labelledby="formLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formLabel">Tambah Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('admin/user/store') ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group mb-4">
                                    <label for="user_email">Email</label>
                                    <input type="text" class="form-control <?= (isset(session('errors')['user_email'])) ? 'is-invalid' : '' ?>" id="user_email" name="user_email" value="<?= old('user_email') ?>">
                                    <div class="invalid-feedback">
                                        <?php if (isset(session('errors')['user_email'])) : ?>
                                            <?= session('errors')['user_email'] ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control <?= (isset(session('errors')['user_password'])) ? 'is-invalid' : '' ?>" id="user_password" name="user_password" value="<?= old('user_password') ?>">
                                    <div class="invalid-feedback">
                                        <?php if (isset(session('errors')['user_password'])) : ?>
                                            <?= session('errors')['user_password'] ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input type="password" class="form-control <?= (isset(session('errors')['password_confirmation'])) ? 'is-invalid' : '' ?>" id="password_confirmation" name="password_confirmation" value="<?= old('password_confirmation') ?>">
                                    <div class="invalid-feedback">
                                        <?php if (isset(session('errors')['password_confirmation'])) : ?>
                                            <?= session('errors')['password_confirmation'] ?>
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
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <hr />
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Email Login</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $user->user_email ?></td>
                                <td>
                                    <form action="<?= base_url('admin/user/delete') ?>" method="post">
                                        <input type="hidden" name="user_id" value="<?= $user->user_id ?>">
                                        <button type="submit" class="badge bg-danger border">Hapus</button>
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