<?php

use App\Models\KonsultasiModel;
use App\Models\PercakapanModel;
use App\Models\PetaniModel;
use App\Models\TrendhargaModel;
use App\Models\UserModel;

function petani()
{
    $model = new PetaniModel();
    $model->join('user', 'user.user_id = petani.user_id');
    return $model->where('petani.user_id', session('user')->user_id)->first();
}
function admin()
{
    $model = new UserModel();
    return  $model->where('user_id', session('user')->user_id)->first();
}
function getGejalaID($detaildiagnosa)
{
    if ($detaildiagnosa == null)
        return null;
    $gejala = [];
    foreach ($detaildiagnosa as $key => $diagnosa) {
        $gejala[$key] = $diagnosa->gejala_kode;
    }
    return $gejala;
}
function type()
{
    return session('user')->user_type;
}
function unreadChat($konsultasi_id)
{
    $model = new PercakapanModel();
    $count = $model->where('konsultasi_id', $konsultasi_id)->where('pengguna_id <>', session('user')->user_id)->where('status_read', '0')->countAllResults();
    return $count;
}
function newKonsul()
{
    $model = new KonsultasiModel();
    $count = $model->where('admin_id', 0)->countAllResults();
    return $count;
}
function getHarga()
{
    $model = new TrendhargaModel();
    $model->orderBy('trendharga_id', 'desc');
    $harga = $model->first();
    if ($harga == null)
        return 0;
    return $harga->harga_trend;
}
