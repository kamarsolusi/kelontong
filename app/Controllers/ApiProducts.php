<?php 
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Pictures_model;
use App\Models\Products_model;

class ApiProducts extends ResourceController{
    protected $format = "json";
    protected $product_model;
    protected $picture_model;

    public function __construct()
    {
        $this->product_model = new Products_model();
        $this->picture_model = new Pictures_model();
    }

    public function index(){
        $product = $this->product_model->join('pictures', 'pictures.product_id = products.product_id', 'left')->groupBy('products.name')->findAll();

        $data['product'] = $product;
        return $this->respond($data, 200);
    }

    public function show($id=NULL)
    {
        $product = $this->product_model->where('product_id', $id)->findAll();
        $picture = $this->picture_model->where('product_id', $id)->get()->getRowArray();
        $product[0]['thumbnail'] = base_url('upload/products'). '/' . $picture['picture_name'];
        $data = [
            'product'       => $product,
        ];
        return $this->respond($data, 200);
    }
}
?>