<?php namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\AproposModel;

class Apropos extends BaseController
{
    public function index()
    {
        return view('client/apropos');
    }

    public function getAll()
    {
        $apropos = new AproposModel();
        if (isset($_POST['getAll'])) {
            $data = $apropos->findAll();
        }

        echo json_encode($data);
        
    }
}