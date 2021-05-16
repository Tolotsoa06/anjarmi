<?php namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_users';
    protected $returnType = 'array';
    protected $allowedFields = [
        'nom_users',
        'username',
        'password',
        'profile_image'
    ];

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
