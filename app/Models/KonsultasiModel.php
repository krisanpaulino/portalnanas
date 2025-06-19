<?php

namespace App\Models;

use CodeIgniter\Model;

class KonsultasiModel extends Model
{
    protected $table            = 'konsultasi';
    protected $primaryKey       = 'konsultasi_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'pengguna_id',
        'admin_id',
        'status',
        'topik',
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
        'pengguna_id' => 'required',
        // 'admin_id' => 'required',
        'status' => 'required',
        'topik' => 'required',
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

    function byPengguna($pengguna_id)
    {
        $this->select('*');
        $this->where('pengguna_id', $pengguna_id);
        return $this->find();
    }
    function getKonsultasi($id = null)
    {
        $this->select('konsultasi.*, a.nama_lengkap as nama_pengguna, b.nama_lengkap as nama_admin, b.foto as foto_admin, a.foto as foto_pengguna');
        $this->join('user a', 'a.user_id = konsultasi.pengguna_id', 'left');
        $this->join('user b', 'b.user_id = konsultasi.admin_id', 'left');
        $this->orderBy('konsultasi_id', 'desc');
        if ($id != null) {
            $this->where('konsultasi_id', $id);
            return $this->first();
        }
        return $this->find();
    }
}
