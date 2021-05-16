<?php namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\ActiviteModel;

class Activite extends BaseController
{
    public function index()
    {
        return view('client/activites');
    }

    public function getAll()
    {

        $activite = new ActiviteModel();
        if (isset($_POST['getActivite'])) {
            $data = $activite->findAll();
        }

        echo json_encode($data);
        
    }
}