<?php namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\ActiviteModel;
use App\Models\ActualiteModel;

class Actualite extends BaseController
{
    public function index()
    {
        return view('client/actualite');
    }

    public function getAll()
    {

        $actualite = new ActualiteModel();
        if (isset($_POST['getActualite'])) {
            $data = $actualite->findAll();
        }

        echo json_encode($data);
        
    }
}