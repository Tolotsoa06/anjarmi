<?php namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\ForumModel;

class Forum extends BaseController
{
    public function index()
    {
        return view('client/forum');
    }

    public function getAll()
    {

        $forum = new ForumModel();
        if (isset($_POST['getForum'])) {
            $data = $forum->findAll();
        }

        echo json_encode($data);
        
    }
}