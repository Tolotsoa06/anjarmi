<?php namespace App\Controllers\Client;


use App\Models\PartenaireModel;
use CodeIgniter\Controller;

class Partenaire extends Controller
{
    public function index()
    {
        return view('client/partenaire');
    }

    public function afficherPartenaire()
    {
        $partenaire = new PartenaireModel();
        if (isset($_POST['getPartenaire'])) {
            $affiche = $partenaire->find();
        }
        echo json_encode($affiche);
    }
}

