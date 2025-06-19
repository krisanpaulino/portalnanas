<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'galeri';
    protected $primaryKey       = 'galeri_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul',
        'gambar',
        'isi',
        // 'user_id',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'judul' => 'required',
        // 'gambar' => 'required',
        'isi' => 'required',
        // 'user_id' => 'required',
        // 'galeri_perawatan'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function findCount()
    {
        $this->select('count(*) as jumlah');
        return $this->first()->jumlah;
    }
    function byBudidaya($galeri_id)
    {
        $this->join('galeri', 'galeri.galeri_id = galeri.galeri_id', 'left');
        $this->where('galeri.galeri_id', $galeri_id);
        return $this->find();
    }
    function getAll()
    {
        // $this->join('user', 'user.user_id = galeri.user_id', 'left');
        return $this->findAll();
    }
    function getSingle($galeri_id)
    {
        $this->where('galeri_id', $galeri_id);
        $this->join('galeri', 'galeri.galeri_id = galeri.galeri_id', 'left');
        return $this->first();
    }
    function search($search = null)
    {
        $this->select('galeri.*, galeri.*, count(komentar.komentar_id) as jumlahkomentar');
        $this->join('galeri', 'galeri.galeri_id = galeri.galeri_id', 'left');
        $this->join('komentar', 'komentar.galeri_id = galeri.galeri_id', 'left');
        $this->groupBy('galeri.galeri_id');
        if ($search != null)
            $this->like('galeri_nama', $search);
        return $this->find();
    }
}
