<?php namespace App\Models\Master;
use CodeIgniter\Model;

class EventKategori extends Model
{
    protected $table              = 'event_kategori';
    protected $primaryKey         = 'kategori_id';
    protected $useSoftDeletes     = false;
    protected $returnType         = 'array';
    protected $useTimestamps      = true;
    protected $createdField       = 'created_at';
    protected $updatedField       = 'updated_at';
    protected $deletedField       = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    //SHOW COLUMNS FROM event_kategori;
    protected $allowedFields      = [
                                        'kategori_id',
                                        'kategori_nama',
                                        'is_active',
                                        'created_at',
                                        'created_by',
                                        'updated_at',
                                        'updated_by',
                                        'deleted_at',
                                        'deleted_by',
                                    ];

    public function get($id=false)
    {
        if($id === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->where($id)->find();
        }
    }
}