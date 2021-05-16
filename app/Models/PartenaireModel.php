<?php namespace App\Models;


use CodeIgniter\Model;

class PartenaireModel extends Model
{
    protected $table = 'partenaire';
    protected $primaryKey = 'id_partenaire';
    protected $returnType = 'array';
    protected $allowedFields = [
        'nom',
        'image'
    ];

    protected $createdField= 'created_at';
    protected $updatedField = 'updated_at';
}

?>