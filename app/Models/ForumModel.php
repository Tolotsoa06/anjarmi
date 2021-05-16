<?php namespace App\Models;

use CodeIgniter\Model;

class ForumModel extends Model
{
    protected $table = 'forum';
    protected $primaryKey = 'id_forum';
    protected $returnType = 'array';
    protected $allowedFields = [
        'sujet',
        'lieu',
        'date_forum',
        'heure'

    ];
    protected $createdAt = 'created_at';
    protected $updatedAt = 'updated_at';
    protected $deletedAt = 'deleted_at';
}



?>