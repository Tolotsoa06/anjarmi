<?php namespace App\Controllers\Login;

use App\Controllers\BaseController;
use App\Models\LoginModel;
use CodeIgniter\Database\Config;

class Users extends BaseController
{
    public function index()
    {
        return view('login/users');
    }

    public function login()
    {
        $db = \Config\Database::connect();
        $login = $db->table('users');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $requete = $login ->select("SELECT * FROM users WHERE (username = $username) AND (password = $password)");
        echo json_encode($requete);

    }
}
