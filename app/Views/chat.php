<?= $this->extend('layout_front'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="container">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <!-- <div class="breadcrumb-title pe-3"><?= $title ?></div> -->
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Beranda</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?= base_url('konsultasi') ?>">Konsultasi</a>
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
        <div class="text-center">
            <h1>Chat Konsultasi</h1>

        </div>
        <input type="hidden" name="konsultasi" id="konsultasi" value="<?= $konsultasi->konsultasi_id ?>">
        <div class="row">
            <div class="col-9">
                <div class="chat-wrapper my-5">
                    <div class="chat-header d-flex align-items-center">
                        <div class="chat-toggle-btn"><i class='bx bx-menu-alt-left'></i>
                        </div>
                        <div>
                            <h4 class="mb-1 font-weight-bold"><?= $konsultasi->nama_admin ?></h4>
                            <div class="list-inline d-sm-flex mb-0 d-none"> <a href="javascript:;" class="list-inline-item d-flex align-items-center text-secondary"><small class='bx bxs-circle me-1 chart-<?= ($konsultasi->status == 'open') ? 'online' : 'offline' ?>'></small><?= $konsultasi->topik ?>(<?= $konsultasi->status ?>)</a>

                            </div>
                        </div>
                    </div>
                    <div class="chat-content">
                        <?php if ($percakapan == null): ?>
                            <input type="hidden" name="lastchat_id" id="lastchat_id" value="0">
                        <?php endif ?>

                        <?php foreach ($percakapan as $key => $chat) : ?>
                            <?php if ($key + 1 == count($percakapan)): ?>
                                <input type="hidden" name="lastchat_id" id="lastchat_id" value="<?= $chat->percakapan_id ?>">
                            <?php endif ?>

                            <?php if ($chat->pengguna_id == session('user')->user_id) : ?>
                                <div class="chat-content-rightside">
                                    <div class="d-flex ms-auto">
                                        <div class="flex-grow-1 me-2">
                                            <p class="mb-0 chat-time text-end">you, <?= $chat->waktu_pesan ?></p>
                                            <p class="chat-right-msg"><?= $chat->pesan ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="chat-content-leftside">
                                    <div class="d-flex">
                                        <img src="<?= base_url('assets/img/profile/' . $konsultasi->foto_admin) ?>" width="48" height="48" class="rounded-circle" alt="" />
                                        <div class="flex-grow-1 ms-2">
                                            <p class="mb-0 chat-time">Admin, <?= $chat->waktu_pesan ?></p>
                                            <p class="chat-left-msg"><?= $chat->pesan ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach ?>
                    </div>
                    <div class="chat-footer d-flex align-items-center">
                        <div class="flex-grow-1 pe-2">
                            <div class="input-group">
                                <input type="text" id="message" class="form-control" placeholder="Type a message">
                            </div>
                        </div>
                        <div class="chat-footer-menu">
                        </div>
                    </div>
                    <!--start chat overlay-->
                    <div class="overlay chat-toggle-btn-mobile"></div>
                    <!--end chat overlay-->
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->section('scripts'); ?>
<script>
    //s new PerfectScrollbar('.chat-list');
    new PerfectScrollbar('.chat-content');
    $('#message').keypress(function(e) {
        if (e.which == 13) {
            var message = $('#message').val()
            var konsultasi = $('#konsultasi').val()
            if (message != null && message != '') {
                // $('#choose').remove();
                $('#message').attr('disabled', 'disabled')
                $.ajax({
                    url: '<?= base_url('ajax/kirimchat') ?>',
                    type: 'POST',
                    data: {
                        konsultasi: konsultasi,
                        message: message,
                    },
                    success: function(data) {

                        $('#message').val('');
                        $('#message').prop('disabled', false)

                        $('#lastchat_id').val(data.lastchat_id)
                        $('.chat-content').append(data.chat)
                    },
                    error: function(e) {
                        console.log(e);
                        $('#message').prop('disabled', false)
                        dangerToast('gagal mengirim pesan! ' + e.responseJSON.messages.error);
                    },
                    dataType: "json"
                });
            } else {

            }
        }
    });

    <?php if ($konsultasi->status == 'open'):  ?>
        retrieveChat()
    <?php endif ?>

    function retrieveChat() {
        var latest = $('#lastchat_id').val()
        console.log(latest);

        var konsultasi = $('#konsultasi').val()
        // console.log(konsultasi);

        $.ajax({
            url: '<?= base_url('ajax/getchat') ?>',
            type: 'GET',
            data: {
                latest: latest,
                konsultasi: konsultasi,
            },
            success: function(data) {
                if (data.lastchat_id != null) {
                    $('#lastchat_id').val(data.lastchat_id)
                    $('.chat-content').append(data.chat)
                }
            },
            error: function(e) {
                console.log(e);
            },
            dataType: "json"
        });
        // Retry after a second
        setTimeout(retrieveChat, 5000);
    }
</script>
<?= $this->endSection(); ?>