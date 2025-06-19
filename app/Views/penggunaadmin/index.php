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
                        <form action="<?= base_url('admin/user/store') ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nama Lengkap</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control <?= (isset(session('errors')['nama_lengkap'])) ? 'is-invalid' : '' ?>" id="nama_lengkap" name="nama_lengkap" value="<?= old('nama_lengkap') ?>">
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
                                        <input type="text" class="form-control <?= (isset(session('errors')['username'])) ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= old('username') ?>">
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
                                        <input type="email" class="form-control <?= (isset(session('errors')['email'])) ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= old('email') ?>">
                                        <div class="invalid-feedback">
                                            <?php if (isset(session('errors')['email'])) : ?>
                                                <?= session('errors')['email'] ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" class="form-control <?= (isset(session('errors')['user_password'])) ? 'is-invalid' : '' ?>" id="user_password" name="user_password" value="<?= old('user_password') ?>">
                                        <div class="invalid-feedback">
                                            <?php if (isset(session('errors')['user_password'])) : ?>
                                                <?= session('errors')['user_password'] ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Konfirmasi Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" class="form-control <?= (isset(session('errors')['password_confirmation'])) ? 'is-invalid' : '' ?>" id="password_confirmation" name="password_confirmation" value="<?= old('password_confirmation') ?>">
                                        <div class="invalid-feedback">
                                            <?php if (isset(session('errors')['password_confirmation'])) : ?>
                                                <?= session('errors')['password_confirmation'] ?>
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
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Foto</th>
                            <th>Actopm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($user as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->nama_lengkap ?></td>
                                <td><?= $row->username ?></td>
                                <td><?= $row->email ?></td>
                                <td><img style="height: 100px;" src="<?= base_url('assets/img/profile/' . $row->foto) ?>" alt="" class="img-thumbnail"></td>
                                <td>
                                    <form action="<?= base_url('admin/user/delete') ?>" method="post">
                                        <input type="hidden" name="user_id" value="<?= $row->user_id ?>">
                                        <a href="<?= base_url('admin/user/' . $row->user_id) ?>" class="badge bg-info">Detail</a>
                                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus user?')" class="badge bg-danger border">Hapus</button>
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