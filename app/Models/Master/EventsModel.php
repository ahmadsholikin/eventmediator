<?php namespace App\Models\Master;
use CodeIgniter\Model;

class EventsModel extends Model
{
    protected $table              = 'events';
    protected $primaryKey         = 'event_id';
    protected $useSoftDeletes     = false;
    protected $returnType         = 'array';
    protected $useTimestamps      = true;
    protected $createdField       = 'created_at';
    protected $updatedField       = 'updated_at';
    protected $deletedField       = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    //SHOW COLUMNS FROM events;
    protected $allowedFields      = [
                                        'event_id',
                                        'event_nama',
                                        'event_kategori',
                                        'event_deskripsi',
                                        'event_gambar',
                                        'event_harga',
                                        'event_mulai',
                                        'event_selesai',
                                        'event_kuota',
                                        'event_slug',
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