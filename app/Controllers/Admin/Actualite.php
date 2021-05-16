<?php namespace App\Controllers\Admin;

use App\Models\ActiviteModel;
use App\Models\ActualiteModel;
use CodeIgniter\Controller;

class Actualite extends Controller
{
    public function index()
    {
        
        return view('admin/actualite');
    }

    public function getActivite()
    {
        if (isset($_POST['getActivite'])) {
            $activite = new ActiviteModel();
            $data = $activite->findAll(); 
        }

        echo json_encode($data);
        
    }

    public function nouveau()
    {
        $actualite = new ActualiteModel();
        $imageData = '';
        $imageActualite = $this->request->getFile('image');
        if (!empty($imageActualite) && $imageActualite->getSize() >0) {
           $imageData = $imageActualite->getRandomName();
           $imageActualite->move('./upload/actualite', $imageData);
        }else {
            $images = $imageActualite->getError();
        }

        $data = [
            'id_actualite' => $this->request->getVar('id_actualite'),
            'activite' => $this->request->getVar('activite'),
            'description' => $this->request->getVar('description'),
            'date_event' => $this->request->getVar('date_event'),
            'image' => $imageData
        ];

        $save = $actualite->save($data);
        echo json_encode($save);
    }

    public function lister(){
        $actualite = new ActualiteModel();
        $data = $actualite->findAll();
        if (count($data)>0) {
            foreach ($data as $key) {
                $action = "
                <a href='javascript:void(0)' class='badge badge-danger' onclick=\"supprimer('".$key['id_actualite']."')\"><i class='fa fa-trash' style='font-size : 1rem'></i></a>";
                $afficher['data'][] = array(
                    'activite' => $key['activite'],
                    'description' => $key['description'],
                    'date_event' => strftime("%d %b %Y",strtotime($key['date_event'])),
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
        $actualite = new  ActualiteModel();
        $id = $this->request->getPost('id_actualite');
        $data['actualite'] = $actualite->find($id);
        

    }

    public function modifier()
    {
        
    }
    
    public function supprimer()
    {
        if ($this->request->getVar('id_actualite')) {
            $id_actualite = $this->request->getVar('id_actualite');
            $actualite = new  ActualiteModel();
            $data = $actualite->where('id_actualite', $id_actualite)->delete($id_actualite);
            echo json_encode($data);
        }
    }
}



?>