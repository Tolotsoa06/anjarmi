<?php namespace App\Models;

use CodeIgniter\Model;


class DonModel extends Model
{
    protected $table = 'don';
    protected $primaryKey = 'id_don';
    protected $returnType = 'array';
    protected $allowedFields = [
        'nom',
        'adresse',
        'telephone',
        'email',
        'type_don',
        'type_payement',

    ];
    protected $createdAt = 'created_at';
    protected $updatedAt = 'updated_at';
    protected $deletedAt = 'deleted_at';
}



?>