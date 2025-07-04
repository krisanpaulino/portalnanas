<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\BudidayaModel;
use App\Models\DiagnosaModel;
use App\Models\GaleriModel;
use App\Models\KomentarModel;
use App\Models\KonsultasiModel;
use App\Models\PakarModel;
use App\Models\PenyakitModel;
use App\Models\PercakapanModel;
use App\Models\PetaniModel;
use App\Models\TanamanModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new BudidayaModel();
        $budidaya = $model->orderBy('created_at', 'desc')->findAll();
        $model = new BeritaModel();
        $berita = $model->orderBy('berita_id', 'desc')->limit(5)->find();
        $data = [
            'title' => 'Home',
            'budidaya' => $budidaya,
            'berita' => $berita,
        ];
        return view('home', $data);
    }
    public function budidaya()
    {
        $search = $this->request->getVar('search');
        $model = new BudidayaModel();
        $budidaya = $model->search(urldecode($search));
        $data = [
            'title' => 'Budidaya Nanas',
            'budidaya' => $budidaya,
        ];
        return view('budidaya', $data);
    }
    public function berita()
    {
        $search = $this->request->getVar('search');
        $model = new BeritaModel();
        $berita = $model->search(urldecode($search));
        $data = [
            'title' => 'Budidaya Nanas',
            'berita' => $berita,
        ];
        return view('berita', $data);
    }
    public function detailBudidaya($budidaya)
    {
        $model = new BudidayaModel();
        $budidaya = $model->getSingle($budidaya);
        // $kmodel = new KomentarModel();
        // $komentar = $kmodel->getKomentar($budidaya);
        $data = [
            'title' => 'Detail Budidaya',
            'budidaya' => $budidaya,
            // 'komentar' => $komentar,
        ];

        return view('budidaya_detail', $data);
    }
    public function detailBerita($berita)
    {
        $model = new BeritaModel();
        $berita = $model->getSingle($berita);
        // $kmodel = new KomentarModel();
        // $komentar = $kmodel->getKomentar($berita);
        $data = [
            'title' => 'Detail Berita',
            'berita' => $berita,
            // 'komentar' => $komentar,
        ];

        return view('berita_detail', $data);
    }
    function komentar()
    {
        $data = $this->request->getPost();
        $model = new KomentarModel();
        $model->insert($data);
        return redirect()->back();
    }
    public function admin()
    {
        $data['title'] = 'Dashboard';

        $model = new BeritaModel();
        $data['berita'] = $model->countAllResults();
        $model = new BudidayaModel();
        $data['budidaya'] = $model->countAllResults();
        $model = new KonsultasiModel();
        $data['open'] = $model->where('status', 'open')->countAllResults();
        $data['close'] = $model->where('status', 'close')->countAllResults();

        return view('dashboard/admin', $data);
    }
    public function konsultasi()
    {
        $data['title'] = 'Konsultasi';
        $model = new KonsultasiModel();
        $konsultasi = $model->byPengguna(session('user')->user_id);
        $data['konsultasi'] = $konsultasi;
        return view('konsultasi', $data);
    }
    function startKonsultasi()
    {
        $data = [
            'topik' => $this->request->getPost(),
            'status' => 'open',
            'pengguna_id' => session('user')->user_id
        ];
        $model = new KonsultasiModel();
        $konsultasi_id = $model->insert($data, true);

        return redirect()->to('konsultasi/' . $konsultasi_id);
    }

    function chat($konsultasi_id)
    {
        $data['title'] = 'Percakapan';
        $model = new KonsultasiModel();
        $konsultasi = $model->getKonsultasi($konsultasi_id);

        $model = new PercakapanModel();
        $percakapan = $model->byKonsultasi($konsultasi_id);

        foreach ($percakapan as $key => $chat) {
            if ($chat->pengguna_id != session('user')->user_id) {
                $model->where('percakapan_id', $chat->percakapan_id);
                $model->set(['status_read' => 1]);
                $model->update();
            }
        }
        $data['konsultasi'] = $konsultasi;
        $data['percakapan'] = $percakapan;
        return view('chat', $data);
    }
    function galeri($id = null)
    {
        $data['title'] = 'Galeri';
        $model = new GaleriModel();
        $data['galeri'] = $model->orderBy('galeri_id', 'desc')->find();
        return view('galeri', $data);
    }
}
