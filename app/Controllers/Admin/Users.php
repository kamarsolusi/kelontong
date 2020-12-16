<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\Users_model;

class Users extends BaseController
{
    protected $user;

	public function __construct()
	{
		helper(['form']);
        $this->user = new Users_model();
    }

    public function index(){
        $data = [
            
            'title'     => 'Manage User | Kelontong',
        ];


        return view('admin/users/index', $data);
    }

    public function show(){
        $data = [
            'results'  => $this->user->select("id, profile_picture, CONCAT(firstname, ' ' ,lastname) as fullname, username,email, active")->findAll(),
        ];

        return json_encode($data);
    }

    public function detail($id){
        $user = $this->user->getUsers($id);
        if($user){
            $response = [
                'results'   => $user,
            ];

            return json_encode($response);
        }else{
            $response = [
                'results' => [
                    'status'    => 500,
                    'error'     => false,
                    'message'   => 'Data Not Found!',
                ],
            ];

            return json_encode($response);
        }
    }

    public function update($id){
        $this_time = date("Y-m-d H:i:s");
        $data = $this->request->getRawInput();
        $user = [
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'username' => $data['username'],
            'active' => $data['active'],
            'updated_at' => $this_time,
        ];

        $update = $this->user->updateUser($id, $user);

        if($update){
            $response = [
                'status'    => 200,
                'error'     => false,
                'message'   => 'Data Updated Successfully!'
            ];

            return json_encode($response);
        }else{
            $response = [
                'status'    => 500,
                'error'     => true,
                'message'   => $update
            ];

            return json_encode($response);
        }
    }

    public function delete($id){
        $result = $this->user->delete($id);
        if($result){
            $response = [
                'status'    => 200,
                'error'     => false,
                'message'   => 'Deleted Successfully!'
            ];
            return json_encode($response);
        }else{
            $msg = $result;
            $response = [
                'status'    => 500,
                'error'     => true,
                'message'   => $msg
            ];
            return json_encode($response);
        }
    }
}