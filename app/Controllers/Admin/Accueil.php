<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AccueilModel;

class Accueil extends BaseController
{
    public function index()
    {
        return view('admin/accueil');
    }

    public function ajouter()
    {
        error_reporting();
        $accueil =new  AccueilModel();
        $randomeName = '';

        $image = $this->request->getFile('image');
        if (!empty($image) && $image->getSize() > 0) {
            $randomeName = $image->getRandomName();
            $image->move('./public/accueil', $randomeName);
        }else {
            $imageName = $image->getError();
        }

            $data = [
                'id_accueil' => $this->request->getVar('id_accueil'),
                'text' => $this->request->getVar('text'),
                'image' =>$randomeName
            ];
         $enregistrer = $accueil->save($data);
            echo json_decode($enregistrer);
    }

    public function lister(){
        $accueil = new AccueilModel();
        $data = $accueil->findAll();
        if (count($data)>0) {
            foreach ($data as $key) {
                $action = "
                <a href='javascript:void(0)' class='badge badge-danger' onclick=\"supprimer('".$key['id_accueil']."')\"><i class='fa fa-trash' style='font-size : 1rem'></i></a>";
                $afficher['data'][] = array(
                    'text' => $key['text'],
                    'image' => "<img src='".$key['image']."'>",
                    'action' => $action
                 );
            }
        }else {
            $afficher['data'][] = null;
        }
        echo json_encode($afficher);
    }

    public function getOne()
    {
        $accueil = new  AccueilModel();
        $id = $this->request->getVar('id_accueil');
        echo json_encode($accueil->find($id));

    }
    
    public function supprimer()
    {
        if ($this->request->getVar('id_accueil')) {
            $id_accueil = $this->request->getVar('id_accueil');
            $accueil = new  AccueilModel();
            $data = $accueil->where('id_accueil', $id_accueil)->delete($id_accueil);
            echo json_encode($data);
        }
    }
}


?>