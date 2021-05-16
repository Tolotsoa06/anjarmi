<?php namespace App\Controllers\Client;

use App\Controllers\BaseController;

class Contact extends BaseController
{
    public function index()
    {
        return view('client/contact');
    }
}
