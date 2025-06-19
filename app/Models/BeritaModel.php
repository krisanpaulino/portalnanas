<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table            = 'berita';
    protected $primaryKey       = 'berita_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'berita_tanggal',
        'berita_judul',
        'berita_gambar',
        'berita_isi',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'berita_tanggal' => 'required',
        'berita_judul' => 'required',
        // 'berita_gambar'=> 'required',
        'berita_isi' => 'required',
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

    function search($search = null)
    {
        // $this->join('user', 'user.user_id = berita.user_id', 'left');
        if ($search != null)
            $this->like('judul', $search);
        $res = $this->find();
        return $res;
    }
    function getSingle($berita_id)
    {
        $this->where('berita_id', $berita_id);
        $this->join('user', 'user.user_id = berita.user_id', 'left');
        return $this->first();
    }
}
