<?php namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\SiteModel;

class Site extends BaseController
{
    public function index()
    {
        return view('client/site_intervention');
    }

    public function getAll()
    {
        $site = new SiteModel();
        if (isset($_POST['getAll'])) {
            $data = $site->findAll();
        }

        echo json_encode($data);
        
    }
}