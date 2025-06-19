<?= $this->extend('layout_pakar'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Total Diagnosa</p>
                            <h4 class="my-1 text-success"><?= $jumlah_diagnosa ?></h4>
                            <p class="mb-0 font-13"><b><a href="<?= base_url('pakar/diagnosa') ?>" class="text-primary">Lihat >></a></b></p>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="bx bxs-bar-chart-alt-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Jumlah Penyakit</p>
                            <h4 class="my-1 text-warning"><?= $jumlah_penyakit ?></h4>
                            <p class="mb-0 font-13"><b><a href="<?= base_url('pakar/penyakit') ?>" class="text-primary">Lihat >></a></b></p>
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