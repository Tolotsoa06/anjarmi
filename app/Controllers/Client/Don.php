<?php namespace App\Controllers\Client;

use App\Models\DonModel;
use CodeIgniter\Controller;


class Don extends Controller
{
    public function index()
    {
        return view('client/don');
    }

    public function save()
    {
        $don = new DonModel();
        $data  =[
            'id_don' => $this->request->getVar('id_don'),
            'type_don' => $this->request->getVar('type_don'),
            'type_payement' => $this->request->getVar('type_payement'),
            'nom' => $this->request->getVar('nom'),
            'adresse' => $this->request->getVar('adresse'),
            'telephone' => $this->request->getVar('telephone'),
            'email' => $this->request->getVar('email'),
        ];
        $enregistrer = $don->save($data);
        echo json_encode($enregistrer);

    }
}


?>