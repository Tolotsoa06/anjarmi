<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PartenaireModel;

class Partenaire extends BaseController
{
    public function index()
    {
        return view('admin/partenaire');
    }

    public function ajouterPartenaire()
    {
        
        error_reporting();
        $partenaire =new  PartenaireModel();
        $randomeName = '';

        $image = $this->request->getFile('image');
        if (!empty($image) && $image->getSize() > 0) {
            $randomeName = $image->getRandomName();
            $image->move('./public/partenaire', $randomeName);
        }else {
            $imageName = $image->getError();
        }

            $data = [
                'id_partenaire' => $this->request->getVar('id_partenaire'),
                'nom' => $this->request->getVar('nom'),
                'image' =>$randomeName
            ];
         $enregistrer = $partenaire->save($data);
            echo json_decode($enregistrer);
    }

    public function lister(){
        $partenaire = new PartenaireModel();
        $data = $partenaire->findAll();
        if (count($data)>0) {
            foreach ($data as $key) {
                $action = "
                <a href='javascript:void(0)' class='badge badge-danger' onclick=\"supprimerPart('".$key['id_partenaire']."')\"><i class='fa fa-trash' style='font-size : 1rem'></i></a>";
                $afficher['data'][] = array(
                    'nom' => $key['nom'],
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
        $partenaire = new  PartenaireModel();
        $id = $this->request->getVar('id_partenaire');
        echo json_encode($partenaire->find($id));

    }
    
    public function supprimer()
    {
        if ($this->request->getVar('id_partenaire')) {
            $id_partenaire = $this->request->getVar('id_partenaire');
            $partenaire = new  PartenaireModel();
            $data = $partenaire->where('id_partenaire', $id_partenaire)->delete($id_partenaire);
            echo json_encode($data);
        }
    }
}


?>