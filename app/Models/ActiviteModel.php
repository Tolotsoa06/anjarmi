<?php namespace App\Models;

use CodeIgniter\Model;

class ActiviteModel extends Model
{
    protected $table = 'activite';
    protected $primaryKey = 'id_activite';
    protected $returnType = 'array';
    protected $allowedFields = [
        'titre',
        'description',
        'image'

    ];
    protected $createdAt = 'created_at';
    protected $updatedAt = 'updated_at';
    protected $deletedAt = 'deleted_at';
}



?>