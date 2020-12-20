<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\Products_model;
use App\Models\Pictures_model;

class Pictures extends BaseController
{
    protected $productModel;
    protected $pictureModel;
    public function __construct()
    {
        helper(['form']);
        $this->productModel = new Products_model();
        $this->pictureModel = new Pictures_model();
    }

    public function index($sku){
        $data['title'] = "Product Image | Kelontong";
        
        $product = $this->productModel->select('product_id, sku, name')->where('sku', $sku)->get()->getRowArray();
        $pictures = $this->pictureModel->where($product['product_id'])->findAll();


        if(!empty($pictures)){
            $data['product'] = $product;
            $data['pictures'] = $pictures;
        }else{
            $data['product'] = $product;
        }

        return view('admin/pictures/index', $data);
    }

    public function load(){
        $sku = $this->request->getGet('sku');
        $productId = $this->productModel->select('product_id')->where('sku', $sku)->get()->getRowArray();
        $path = FCPATH . 'upload/products/';
        $file_list = array();
        $pictures = $this->pictureModel->where('product_id', $productId['product_id'])->orderBy('picture_name', 'asc')->findAll();
        
        if(!empty($pictures)){
            foreach($pictures as $key => $value){
                $file = $value['picture_name'];
                $file_path = $path . $file;
                if(file_exists($file_path)){
                    $size = filesize($file_path);
                }else{
                    $file = 'no_image.png';
                    $size = filesize($path. $file);
                }
                $file_list[] = array('name' => $file, 'size' => $size, 'path' => base_url('upload/products'). '/'.$file);
            }

            $data = [
                'file_list' => $file_list,
                'pictures'  => $pictures
            ];
        }else{
            $data = [
                'empty' => 'data empty',
            ];
        }

        return json_encode($data);
    }

    public function process_upload(){
        $path = FCPATH. 'upload/products/';
        $files = $this->request->getFiles();
        $token = $this->request->getPost('token');
        $sku = $this->request->getPost('sku');
        $productId = $this->productModel->select('product_id')->where('sku', $sku)->get()->getRowArray();

        foreach($files as $key => $value){
            if($value->isValid() && ! $value->hasMoved()){

                $newName = $value->getRandomName();
                $data =[
                    'product_id'    => $productId['product_id'],
                    'picture_name'  => $newName,
                    'token'         => $token,
                ];
                $value->move(FCPATH. 'upload/products/', $newName);
                $save = $this->pictureModel->insertPictures($data);
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
        $nameFile = $this->pictureModel->select('picture_id, picture_name')->where('token',$token)->get()->getRowArray();
        if(file_exists(FCPATH . 'upload/products/' . $nameFile['picture_name'])){
            unlink(FCPATH . 'upload/products/' . $nameFile['picture_name']);
            $delete = $this->pictureModel->delete($nameFile['picture_id']);
        }else{
            $delete = $this->pictureModel->delete($nameFile['picture_id']);
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