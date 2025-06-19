<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KonsultasiModel;
use App\Models\PercakapanModel;
use App\Models\TrendhargaModel;
use Exception;
use CodeIgniter\API\ResponseTrait;

class Ajax extends BaseController
{
    use ResponseTrait;
    public function kirimChat()
    {
        $model = new PercakapanModel();
        $message = $this->request->getPost('message');
        $konsultasi = $this->request->getPost('konsultasi');

        $data = [
            'pesan' => $message,
            'konsultasi_id' => $konsultasi,
            'pengguna_id' => session('user')->user_id,
        ];

        $kModel = new KonsultasiModel();
        $konsultasi = $kModel->find($konsultasi);
        if ($konsultasi->status == 'close')
            return $this->fail('Chat closed');
        // throw new Exception('Chat konsultasi sudah ditutup');
        if ($id = $model->insert($data)) {
            $data = [
                'percakapan' => $model->where('percakapan_id', $id)->findAll()
            ];
            $chat = view('chatbox', $data);
            $json = [
                'lastchat_id' => $id,
                'chat' => $chat
            ];
            echo json_encode($json);
        } else {
            // $this->response->fail;
            throw new Exception(json_encode($model->errors()));
        }
    }

    function getChat()
    {
        $model = new PercakapanModel();
        $latest = $this->request->getGet('latest');
        if ($latest == null)
            $latest = 0;
        $konsultasi = $this->request->getGet('konsultasi');
        $kModel = new KonsultasiModel();
        $datakonsultasi = $kModel->getKonsultasi($konsultasi);
        $percakapan = $model->where('konsultasi_id', $konsultasi)->where('percakapan_id >', $latest, false)->orderBy('percakapan_id', 'asc')->findAll();

        $end = end($percakapan);
        if ($end) {
            $latest = $end->percakapan_id;
        }
        if ($percakapan != null) {
            $data = [
                'percakapan' => $percakapan,
                'konsultasi' => $datakonsultasi
            ];
            foreach ($percakapan as $key => $chat) {
                $model->where('percakapan_id', $chat->percakapan_id);
                $model->set(['status_read' => 1]);
                $model->update();
            }
            $chat = view('chatbox', $data);
            $json = [
                'lastchat_id' => $latest,
                'chat' => $chat
            ];
            echo json_encode($json);
        }
    }
    function getHarga()
    {
        $latest = $this->request->getGet('latest');
        $model = new TrendhargaModel();
        $model->orderBy('trendharga_id', 'desc');
        $harga = $model->first();
        // if ($latest != $harga->trendharga_id) {
        if ($harga == null)
            echo json_encode([
                'harga_id' => null,
                'harga' => 0
            ]);
        else {
            $data = [
                'harga_id' => $harga->trendharga_id,
                'harga' => $harga->harga_trend
            ];
            echo json_encode($data);
        }
        // } else
        // echo null;
    }
}
