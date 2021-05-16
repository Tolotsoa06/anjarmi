<?php namespace App\Models;

use CodeIgniter\Model;


class AproposModel extends Model
{
    protected $table = 'apropos';
    protected $primaryKey = 'id_apropos';
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