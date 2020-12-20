<?php 
namespace App\Controllers\Api;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Categories_model;


class Categories extends ResourceController{
    protected $format = "json";
    protected $category_model;
    public function __construct()
    {
        $this->category_model = new Categories_model();
    }

    public function index(){
        $categories = $this->category_model->findAll();
        $data['categories']= $categories;
        return $this->respond($data, 200);
    }
}