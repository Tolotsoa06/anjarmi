<?php namespace App\Controllers\Client;

use App\Models\AccueilModel;
use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        return view('client/acceuil');
    }

    public function getAll()
    {
        if (isset($_POST['getAll'])) {
            $accueil = new AccueilModel();
            $data = $accueil->findAll();
            echo json_encode($data);
        }
    }
}
