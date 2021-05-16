<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AproposModel;

class Apropos extends BaseController
{
    public function index()
    {
        return view('admin/apropos');
    }

    public function ajouter()
    {
        error_reporting();
        $apropos =new  AproposModel();
        $randomeName = '';

        $image = $this->request->getFile('image');
        if (!empty($image) && $image->getSize() > 0) {
            $randomeName = $image->getRandomName();
            $image->move('./public/apropos', $randomeName);
        }else {
            $imageName = $image->getError();
        }

            $data = [
                'id_apropos' => $this->request->getVar('id_apropos'),
                'text' => $this->request->getVar('text'),
                'image' =>$randomeName
            ];
         $enregistrer = $apropos->save($data);
            echo json_decode($enregistrer);
    }

    public function lister(){
        $apropos = new AproposModel();
        $data = $apropos->findAll();
        if (count($data)>0) {
            foreach ($data as $key) {
                $action = "
                <a href='javascript:void(0)' class='badge badge-danger' onclick=\"supprimer('".$key['id_apropos']."')\"><i class='fa fa-trash' style='font-size : 1rem'></i></a>";
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
        $apropos = new  AproposModel();
        $id = $this->request->getVar('id_apropos');
        echo json_encode($apropos->find($id));

    }
    
    public function supprimer()
    {
        if ($this->request->getVar('id_apropos')) {
            $id_apropos = $this->request->getVar('id_apropos');
            $apropos = new  AproposModel();
            $data = $apropos->where('id_partenaire', $id_apropos)->delete($id_apropos);
            echo json_encode($data);
        }
    }
}


?>