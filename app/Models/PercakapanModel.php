<?php

namespace App\Models;

use CodeIgniter\Model;

class PercakapanModel extends Model
{
    protected $table            = 'percakapan';
    protected $primaryKey       = 'percakapan_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'konsultasi_id',
        'pesan',
        'waktu_pesan',
        'pengguna_id',
        'status_read',
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
        'konsultasi_id' => 'required',
        'pesan' => 'required',
        'pengguna_id' => 'required',
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

    function byKonsultasi($konsultasi_id)
    {
        // $this->select('*');
        $this->join('user', 'percakapan.pengguna_id = user.user_id');
        $this->where('konsultasi_id', $konsultasi_id);
        return $this->find();
    }
}
