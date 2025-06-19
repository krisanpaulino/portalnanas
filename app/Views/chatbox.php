<?php foreach ($percakapan as $chat) : ?>
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
                <img src="<?= base_url('assets/img/profile/' . $konsultasi->foto_pengguna) ?>" width="48" height="48" class="rounded-circle" alt="" />
                <div class="flex-grow-1 ms-2">
                    <p class="mb-0 chat-time">Admin, <?= $chat->waktu_pesan ?></p>
                    <p class="chat-left-msg"><?= $chat->pesan ?></p>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach ?>