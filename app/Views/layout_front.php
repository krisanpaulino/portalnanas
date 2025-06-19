<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?= base_url() ?>/assets/images/fav.png" type="image/png" />
    <!--plugins-->
    <link href="<?= base_url() ?>/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- loader-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/css/pace.min.css" rel="stylesheet" />
    <script src="<?= base_url() ?>/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/petani/css/app.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/css/icons.css" rel="stylesheet">

    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/petani/css/header-colors.css" />
    <title><?= $title ?> | Portal Sayur</title>
    <style>
        .thumb-post img {
            object-fit: scale-down;
            /* Do not scale the image */
            object-position: center;
            /* Center the image within the element */
            width: 100%;
            max-height: 500px;
            margin-bottom: 1rem;
            background: rgb(1, 5, 36);
        }

        .nav-item:hover {
            background: rgb(217, 186, 13);
        }

        .bg-warning2 {
            background: #ffe96b;
        }
    </style>
</head>

<body style="<?= ($title == 'Dashboard') ? "background-image: url(" . base_url('assets/images/bg.png') . ");" : '' ?>">
    <!--wrapper-->
    <div class="wrapper">
        <!--start header -->

        <!--end header -->
        <!--navigation-->
        <header class="nav-container primary-menu topbar">
            <div>
                <span class="fs-3 text-dark">PORTAL KULTIVASI NANAS</span>
            </div>
            <nav class="navbar navbar-expand-xl w-50">
                <ul class="navbar-nav justify-content-end flex-grow-1 gap-1">
                    <li class="nav-item dropdown">
                        <a href="<?= base_url() ?>" class="nav-link">
                            <!-- <div class="parent-icon"><i class='bx bx-home-circle'></i>
                            </div> -->
                            <div class="menu-title text-dark">Beranda</div>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="<?= base_url('budidaya') ?>" class="nav-link">
                            <!-- <div class="parent-icon"><i class='bx bx-home-circle'></i>
                            </div> -->

                            <div class="menu-title text-dark">Budidaya</div>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="<?= base_url('berita') ?>" class="nav-link">
                            <!-- <div class="parent-icon"><i class='bx bx-home-circle'></i>
                            </div> -->

                            <div class="menu-title text-dark">Berita</div>
                        </a>
                    </li>
                    <?php if (!session()->has('user') || !session('user')->user_type == 'pengguna'):  ?>
                        <li class="nav-item dropdown">
                            <a href="<?= (!session()->has('user')) ? base_url('auth') : base_url(session('user')->user_type) ?>" class="nav-link">
                                <!-- <div class="parent-icon"><i class='bx bx-home-circle'></i>
                            </div> -->

                                <div class="menu-title text-dark">Member Area</div>
                            </a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item dropdown">
                            <a href="<?= base_url('konsultasi') ?>" class="nav-link">
                                <!-- <div class="parent-icon"><i class='bx bx-home-circle'></i>
                            </div> -->

                                <div class="menu-title text-dark">Konsultasi</div>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                                <!-- <div class="parent-icon"><i class='bx bx-home-circle'></i>
                            </div> -->

                                <div class="menu-title text-dark">Log Out</div>
                            </a>
                        </li>
                    <?php endif ?>
                    <!-- <li class="nav-item dropdown">
                        <a href="<?= base_url('petani/penyakit') ?>" class="nav-link">
                            <div class="parent-icon"><i class="bx bx-category"></i>
                            </div>
                            <div class="menu-title text-light">Data Penyakit</div>
                        </a>
                    </li> -->
                </ul>
            </nav>
        </header>
        <!--end navigation-->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="fixed-top" style="right: 10px; top:250px">
                <div class="row row-cols-1 row-cols-md-4 row-cols-xl-6 d-flex justify-content-end">
                    <div class="col-2">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="widgets-icons rounded-circle mx-auto bg-light-primary text-primary mb-3"><img src="<?= base_url('assets/images/analytics.gif') ?>" alt="" class="img-fluid">
                                    </div>
                                    <input type="hidden" id="harga_id">
                                    <h4 class="my-1" id="harga"><?= number_format(getHarga()) ?></h4>
                                    <p class="mb-0 text-secondary">Trend Harga Nanas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->renderSection('content'); ?>

        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->
    <!--start switcher-->
    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="<?= base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
            AOS.init({
                duration: 650,
                once: true
            });
        });

        function dangerToast(message) {
            Toastify({
                'text': message,
                style: {
                    background: '#fd2e64',
                }
            }).showToast()
        }

        function successToast(message) {
            Toastify({
                'text': message,
            }).showToast()
        }
        getHarga()

        function getHarga() {
            var latest = $('#harga_id').val()

            $.ajax({
                url: '<?= base_url('ajax/getharga') ?>',
                type: 'GET',
                data: {
                    latest: latest,
                },
                success: function(data) {
                    console.log(data);
                    if (data != null) {
                        var harga = parseInt(data.harga)
                        $('#lastchat_id').val(data.harga_id)
                        $('#harga').text(harga.toLocaleString('en-US'))
                    }
                },
                error: function(e) {
                    console.log(e);
                },
                dataType: "json"
            });
            // Retry after a second
            setTimeout(getHarga, 5000);
        }
    </script>
    <!--app JS-->
    <script src="<?= base_url() ?>/assets/petani/js/app.js"></script>
    <?= $this->renderSection('scripts'); ?>
</body>

</html>