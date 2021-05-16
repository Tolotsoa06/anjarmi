<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DonModel;

class Don extends BaseController
{
    public function index()
    {
        return view('admin/don');
    }

    public function lister(){
        $don = new DonModel();
        $data = $don->findAll();
        if (count($data)>0) {
            foreach ($data as $key) {
                 $afficher['data'][] = array(
                    'nom' => $key['nom'],
                    'adresse' => $key['adresse'],
                    'telephone' => $key['telephone'],
                    'email' => $key['email'],
                    'type_don' => $key['type_don'],
                    'type_payement' => $key['type_payement'],
                 );
            }
        }else {
            $afficher['data'][] = null;
        }
        echo json_encode($afficher);
    }

    public function modifier()
    {
        
    }
}


?>