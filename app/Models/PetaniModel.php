<?php

namespace App\Models;

use CodeIgniter\Model;

class PetaniModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'petani';
    protected $primaryKey       = 'petani_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'petani_nama',
        'petani_jk',
        'petani_alamat',
        'petani_hp',
        'petani_foto',
        'petani_tempatlahir',
        'petani_tgllahir',
        'user_id'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'petani_nama' => 'required',
        'petani_jk' => 'required',
        'petani_alamat' => 'required',
        'petani_hp' => 'required',
        'petani_foto' => 'required',
        'petani_tempatlahir' => 'required',
        'petani_tgllahir' => 'required',
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

    public function findPetani($petani_id)
    {
        $this->join('user', 'user.user_id = petani.user_id');
        return $this->find($petani_id);
    }
    public function findCount()
    {
        $this->select('count(*) as jumlah');
        return $this->first()->jumlah;
    }
}
