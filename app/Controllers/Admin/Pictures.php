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

    public function upload($id){
        var_dump($_POST);
        die();
    }
}
?>