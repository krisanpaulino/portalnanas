<?= $this->extend('layout_petani'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">


        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Jumlah Tanaman</p>
                            <h4 class="my-1 text-warning"><?= $jumlah_tanaman ?></h4>
                            <p class="mb-0 font-13"><b><a href="<?= base_url('petani/tanaman') ?>" class="text-primary">Lihat >></a></b></p>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class="bx bxs-category"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>