<?php namespace App\Controllers\Admin;

use App\Models\ForumModel;
use CodeIgniter\Controller;

class Forum extends Controller
{
    public function index()
    {
        return view('admin/forum');
    }

    public function ajouterForum()
    {
        $forum = new ForumModel();
        $data = [
            'id_forum' => $this->request->getVar('id_forum'),
            'sujet' => $this->request->getVar('sujet'),
            'lieu' => $this->request->getVar('lieu'),
            'date_forum' => $this->request->getVar('date_forum'),
            'heure' => $this->request->getVar('heure')
        ];
        $enregistrer = $forum->save($data);
        echo json_encode($enregistrer);
    }

    public function lister()
    {
        $forum = new ForumModel();
        $data = $forum->findAll();
        if (count($data)>0) {
            foreach ($data as $key) {
                $action = "<a href='javascript:void(0)' class='badge badge-danger' onclick=\"supprimer('".$key['id_forum']."')\"><i class='fa fa-trash' style='font-size : 1rem'></i></a>";
                $afficher['data'][] = array(
                    'sujet' => $key['sujet'],
                    'lieu' => $key['lieu'],
                    'heure' => $key['heure'],
                    'date' => strftime("%d %b %Y",strtotime($key['date_forum'])),
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
        $forum = new  ForumModel();
        $id = $this->request->getVar('id_forum');
        echo json_encode($forum->find($id));

    }
    
    public function supprimer()
    {
        if ($this->request->getVar('id_forum')) {
            $id_forum = $this->request->getVar('id_forum');
            $forum = new  ForumModel();
            $data = $forum->where('id_forum', $id_forum)->delete($id_forum);
            echo json_encode($data);
        }
    }
}


?>