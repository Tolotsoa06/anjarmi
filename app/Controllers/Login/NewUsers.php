<?php namespace App\Controllers\Login;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class NewUsers extends BaseController
{
    public function index()
    {
        return view('login/new_users');
    }

    public function nouveau()
    {
        $model =new  LoginModel();
        $randomeName = '';

        $image = $this->request->getFile('profile_image');
        if (!empty($image) && $image->getSize() > 0) {
            $randomeName = $image->getRandomName();
            $image->move('./public/upload', $randomeName);
        }else {
            $imageName = $image->getError();
        }

            $data = [
                'id_users' => $this->request->getVar('id_users'),
                'nom_users' => $this->request->getVar('nom_users'),
                'username' => $this->request->getVar('usersname'),
                'password' => md5($this->request->getVar('pass')),
                'profile_image' =>$randomeName
            ];
        
        $save = $model->save($data);
        echo json_encode($save);
    }
}