<?php

namespace App\Models;

use CodeIgniter\Model;

class BudidayaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'budidaya';
    protected $primaryKey       = 'budidaya_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul',
        'gambar',
        'isi',
        'user_id',
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
        'gambar' => 'required',
        'isi' => 'required',
        'user_id' => 'required',
        // 'budidaya_perawatan'
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
    function byBudidaya($budidaya_id)
    {
        $this->join('budidaya', 'budidaya.budidaya_id = budidaya.budidaya_id', 'left');
        $this->where('budidaya.budidaya_id', $budidaya_id);
        return $this->find();
    }
    function getAll()
    {
        $this->join('user', 'user.user_id = budidaya.user_id', 'left');
        return $this->find();
    }
    function getSingle($budidaya_id)
    {
        $this->where('budidaya_id', $budidaya_id);
        $this->join('user', 'user.user_id = budidaya.user_id', 'left');
        return $this->first();
    }
    function search($search = null)
    {
        $this->join('user', 'user.user_id = budidaya.user_id', 'left');
        if ($search != null)
            $this->like('judul', $search);
        $res = $this->find();
        return $res;
    }
}
