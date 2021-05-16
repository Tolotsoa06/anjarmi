<?php namespace App\Models;

use CodeIgniter\Model;


class AccueilModel extends Model
{
    protected $table = 'acceuil';
    protected $primaryKey = 'id_accueil';
    protected $returnType = 'array';
    protected $allowedFields = [
        'text',
        'image'

    ];
    protected $createdAt = 'created_at';
    protected $updatedAt = 'updated_at';
    protected $deletedAt = 'deleted_at';
}



?>