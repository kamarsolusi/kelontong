<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\Banner_model;

class Banner extends BaseController
{
    protected $banner_model;
    public function __construct()
    {
        helper(['form']);
        $this->banner_model = new Banner_model();
    }

    public function index(){
        $data['title'] = "Banner Image | Kelontong";
        
        return view('admin/banner/index', $data);
    }

    public function load(){
        $banner = $this->banner_model->getBanner();
        $path = FCPATH . 'upload/banner/';
        $file_list = array();
        
        
        if(!empty($banner)){
            foreach($banner as $key => $value){
                $file = $value['banner_name'];
                $file_path = $path . $file;
                if(file_exists($file_path)){
                    $size = filesize($file_path);
                }else{
                    $file = 'no_image.png';
                    $size = filesize($path. $file);
                }
                $file_list[] = array('name' => $file, 'size' => $size, 'path' => base_url('upload/banner'). '/'.$file);
            }

            $data = [
                'file_list' => $file_list,
                'pictures'  => $banner
            ];
        }else{
            $data = [
                'empty' => 'data empty',
            ];
        }

        return json_encode($data);
    }

    public function process_upload(){
        $path = FCPATH. 'upload/banner/';
        $files = $this->request->getFiles();
        $token = $this->request->getPost('token');
        foreach($files as $key => $value){
            
            if($value->isValid() && ! $value->hasMoved()){

                $newName = $value->getRandomName();
                $data =[
                    'banner_name'   => $newName,
                    'token'         => $token,
                ];
                $value->move(FCPATH. 'upload/banner/', $newName);
                $save = $this->banner_model->insertBanner($data);
            }

            if($save){
                $data['status'] = 200;
                return json_encode($data);
            }else{
                $data['status'] = 500;
                return json_encode($data);
            }
        }

    }

    public function delete($token){
        $nameFile = $this->banner_model->select('banner_id, banner_name')->where('token',$token)->get()->getRowArray();
        if(file_exists(FCPATH . 'upload/banner/' . $nameFile['banner_name'])){
            unlink(FCPATH . 'upload/banner/' . $nameFile['banner_name']);
            $delete = $this->banner_model->delete($nameFile['banner_id']);
        }else{
            $delete = $this->banner_model->delete($nameFile['banner_id']);
        }
        
        
        if($delete){
            $data['status'] = 200;
            return json_encode($data);
        }else{
            $data['status'] = 500;
            return json_encode($data);
        }
    }
}
?>