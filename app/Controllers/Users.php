<?php namespace App\Controllers;

use App\Models\Users_model;

class Users extends BaseController
{
    protected $user_model;

    public function __construct()
    {
        $this->user_model = new Users_model();
    }

	public function index()
	{
		$data['title'] = 'Selamat Datang di Website Kelontongku';
		return view('home/index', $data);
	}

    public function profile($username){
        $data['dataUser'] = $this->user_model->where('username', $username)->get()->getResult();


        return view('/admin/users/profile', $data);
    }
	//--------------------------------------------------------------------

}
