<?php namespace App\Models;

use CodeIgniter\Model;


class SiteModel extends Model
{
    protected $table = 'site';
    protected $primaryKey = 'id_site';
    protected $returnType = 'array';
    protected $allowedFields = [
        'zone',
        'image'

    ];
    protected $createdAt = 'created_at';
    protected $updatedAt = 'updated_at';
    protected $deletedAt = 'deleted_at';
}



?>