<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ActiviteModel;
use Config\Database;

class Activite extends BaseController
{
    public function index()
    {
        return view('admin/activites');
    }

    public function nouveau()
    {
        $activite = new ActiviteModel();
        $imageData = '';
        $imageActivite = $this->request->getFile('image');
        if (!empty($imageActivite) && $imageActivite->getSize() >0) {
           $imageData = $imageActivite->getRandomName();
           $imageActivite->move('./upload/activite', $imageData);
        }else {
            $images = $imageActivite->getError();
        }

        $data = [
            'id_activite' => $this->request->getVar('id_activite'),
            'titre' => $this->request->getVar('titre'),
            'description' => $this->request->getVar('description'),
            'image' => $imageData
        ];

        $save = $activite->save($data);
        echo json_encode($save);
    }

    public function lister()
    {
        $activite = new ActiviteModel();
        $data = $activite->findAll();  
        if (count($data)>0) {
            foreach ($data as $key) {
                $action = "
                <a href='javascript:void(0)' class='badge badge-danger' onclick=\"supprimer('".$key['id_activite']."')\"><i class='fa fa-trash' style='font-size : 1rem'></i></a>";
                $afficher['data'][] = array(
                    'titre' => $key['titre'], 
                    'description' => $key['description'], 
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
        $activite = new  ActiviteModel();
        $id = $this->request->getVar('id_activite');
        echo json_encode($activite->find($id));

    }
    
    public function supprimer()
    {
        if ($this->request->getVar('id_activite')) {
            $id_activite = $this->request->getVar('id_activite');
            $activite = new  ActiviteModel();
            $data = $activite->where('id_activite', $id_activite)->delete($id_activite);
            echo json_encode($data);
        }
    }
}



?>