<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SiteModel;

class Site extends BaseController
{
    public function index()
    {
        return view('admin/site');
    }

    public function ajouter()
    {
        error_reporting();
        $site =new  SiteModel();
        $randomeName = '';

        $image = $this->request->getFile('image');
        if (!empty($image) && $image->getSize() > 0) {
            $randomeName = $image->getRandomName();
            $image->move('./public/site', $randomeName);
        }else {
            $imageName = $image->getError();
        }

            $data = [
                'id_site' => $this->request->getVar('id_site'),
                'zone' => $this->request->getVar('zone'),
                'image' =>$randomeName
            ];
         $enregistrer = $site->save($data);
            echo json_decode($enregistrer);
    }

    public function lister(){
        $site = new SiteModel();
        $data = $site->findAll();
        if (count($data)>0) {
            foreach ($data as $key) {
                $action = "
                <a href='javascript:void(0)' class='badge badge-danger' onclick=\"supprimer('".$key['id_site']."')\"><i class='fa fa-trash' style='font-size : 1rem'></i></a>";
                $afficher['data'][] = array(
                    'zone' => $key['zone'],
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
        $site = new  SiteModel();
        $id = $this->request->getVar('id_site');
        echo json_encode($site->find($id));

    }

    public function modifier()
    {
        $site = new  SiteModel();
        $id = $this->request->getVar('id_site');
        $data = [
            'zone' => $this->request->getVar('zone'),
            'image' => $this->request->getVar('image'),
            
        ];
        $request = $site->update($data, $id);
        echo json_encode($request);
    }
    
    public function supprimer()
    {
        if ($this->request->getVar('id_site')) {
            $id_site = $this->request->getVar('id_site');
            $site = new  SiteModel();
            $data = $site->where('id_site', $id_site)->delete($id_site);
            echo json_encode($data);
        }
    }
}


?>