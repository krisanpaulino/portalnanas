<?= $this->extend('layout_admin'); ?>
<?= $this->section('content') ?>
<div class="page-content">
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
    </div>
    <!-- Container-fluid starts-->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Daftar Berita</h5><span></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Topik Konsultasi</th>
                                    <th>Pengguna</th>
                                    <th>Admin</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($konsultasi as $row) : ?>
                                    <tr class="<?= ($row->status == 'open') ? 'bg-light-success' : '' ?>">
                                        <td><?= $no++ ?></td>
                                        <td><?= $row->topik ?></td>
                                        <td><?= $row->nama_pengguna ?></td>
                                        <td><?= $row->nama_admin ?></td>
                                        <td><?= $row->status ?></td>
                                        <td>
                                            <?php if ($row->admin_id == 0 && $row->status == 'open') : ?>
                                                <a href="<?= base_url('admin/terima-chat/' . $row->konsultasi_id) ?>" class="badge bg-primary">Terima Chat<?php if ($count = unreadChat($row->konsultasi_id) > 0): ?><span class="badge rounded-pill bg-danger">+<?= $count ?> </span><?php endif ?></a>
                                            <?php else : ?>
                                                <?php if ($row->admin_id == session('user')->user_id && $row->status == 'open') : ?>
                                                    <a href="<?= base_url('admin/chat/' . $row->konsultasi_id) ?>" class="badge bg-warning">Buka Chat<?php if ($count = unreadChat($row->konsultasi_id) > 0): ?><span class="badge rounded-pill bg-danger">+<?= $count ?> </span><?php endif ?></a>
                                                <?php else : ?>
                                                    <a href="<?= base_url('admin/chat/' . $row->konsultasi_id) ?>" class="badge bg-secondary">Lihat Chat</a>
                                                <?php endif ?>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
<?= $this->endSection(); ?>