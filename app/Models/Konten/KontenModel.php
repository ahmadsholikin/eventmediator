<?php namespace App\Models\Konten;
use CodeIgniter\Model;

class KontenModel extends Model
{
    protected $table              = 'konten';
    protected $primaryKey         = 'konten_id';
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
                                        'konten_id',
                                        'konten_nama',
                                        'konten_kategori',
                                        'konten_sub',
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

    public function getJoin($id=false)
    {
        $this->select('konten.*, konten_kategori.kategori_nama AS kategori');
        $this->join('konten_kategori', 'konten_kategori = kategori_id');

        if($id === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->where($id)->first();
        }
    }
}