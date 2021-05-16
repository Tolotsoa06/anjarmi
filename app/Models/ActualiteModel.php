<?php namespace App\Models;

use CodeIgniter\Model;


class ActualiteModel extends Model
{
    protected $table = 'actualite';
    protected $primaryKey = 'id_actualite';
    protected $returnType = 'array';
    protected $allowedFields = [
        'activite',
        'description',
        'date_event',
        'image'

    ];
    protected $createdAt = 'created_at';
    protected $updatedAt = 'updated_at';
    protected $deletedAt = 'deleted_at';
}



?>