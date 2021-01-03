<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\Categories_model;
use App\Models\Products_model;
use App\Models\Pictures_model;
use App\Models\Detail_products_model;

class Products extends BaseController
{
    protected $product_model;
    protected $picture_model;
    protected $detail_products_model;
    public function __construct()
    {
        helper(['form']);
        $this->detail_products_model = new Detail_products_model();
        $this->product_model = new Products_model();
        $this->picture_model = new Pictures_model();
    }
    public function index()
    {
		$data['title'] = 'Manage Products';
        return view('admin/products/index', $data);
    }

    public function show(){
        $products = $this->product_model->join('categories','categories.category_id = products.category_id')->join('detail_products', 'detail_products.product_id = products.product_id', 'left')->findAll();
        
        $data['results'] = $products;
        
        return json_encode($data);
    }

    public function add(){
        $model = new Products_model();

        $sku = $this->request->getPost('sku');
        $name = $this->request->getPost('name');
        $productSlug = str_replace(' ', '-', $name);
        $categoryId = $this->request->getPost('category_id');
        $harga = $this->request->getPost('harga');
        $stok = $this->request->getPost('stok');
        $status = $this->request->getPost('status');
        $berat = $this->request->getPost('berat');
        $detail = nl2br($this->request->getVar('detail')) ;

        $data = [
            'sku'           => $sku,
            'name'          => $name,
            'product_slug'  => $productSlug,
            'category_id'   => $categoryId,
            'harga'         => $harga,
            'harga_baru'    => $harga,
            'stok'          => $stok,
            'product_status'        => $status,
        ];

        $simpan = $model->insertProducts($data);
        if($simpan){
            $productId = $this->product_model->select('product_id')->where('sku', $sku)->get()->getRowArray();
            $dataBerat = [
                'product_id'    => $productId['product_id'],
                'berat'         => $berat,
                'detail'        => $detail
            ];

            $this->detail_products_model->insert($dataBerat);
            $msg = ['message' => 'Product Created Successfully'];
            $response = [
                'status'    => 200,
                'error'     => false,
                'data'      => $msg
            ];
            return json_encode($response);
        }
    }

    public function edit($id = null){

        $product = $this->product_model->select('*, products.product_id')->join('detail_products','detail_products.product_id = products.product_id', 'left')->where('sku', $id)->get()->getResultArray();
        $modelCategory = new Categories_model();
        $getCategory = $modelCategory->where('category_status', 'ACTIVE')->findall();

        $data = [
            'product'   => $product,
            'category'  => $getCategory,
        ];
        if($data){
            return json_encode($data);
        }
        
    }

    public function update($id = null){
        $model = new Products_model();

        $hargaLama = $model->select('harga_baru')->where('product_id', $id)->get()->getRowArray();
        $sku = $this->request->getPost('sku');
        $name = $this->request->getPost('name');
        $productSlug = str_replace(' ', '-', $name);
        $categoryId = $this->request->getPost('category_id');
        $hargaBaru = $this->request->getPost('harga');
        $stok = $this->request->getPost('stok');
        $status = $this->request->getPost('status');
        $berat = $this->request->getPost('berat');
        $detail = nl2br($this->request->getPost('detail'));
        

        $data = [
            'sku'           => $sku,
            'name'          => $name,
            'product_slug'  => $productSlug,
            'category_id'   => $categoryId,
            'harga'         => $hargaLama['harga_baru'],
            'harga_baru'    => $hargaBaru,
            'stok'          => $stok,
            'product_status'=> $status,
        ];
        
        if($id){
            
            $simpan = $model->updateProduct($data, $id);
            if($simpan){
                $detailProduct = $this->detail_products_model->select('id')->where('product_id', $id)->get()->getRowArray();

                if(!empty($detailProduct)){
                    $dataDetail = [
                        'berat'     => $berat,
                        'detail'    => $detail
                    ];
                    $this->detail_products_model->update($detailProduct['id'], $dataDetail);
                }else{
                    $dataDetail = [
                        'product_id'    => $id,
                        'berat'         => $berat,
                        'detail'        => $detail
                    ];
                    $this->detail_products_model->insert($dataDetail);
                }
                
                $msg = ['message' => 'Product Created Successfully'];
                $response = [
                    'status'    => 200,
                    'error'     => false,
                    'data'      => $msg
                ];
                return json_encode($response);
            }
        }
    }

    public function delete($id = null){
        $model = new Products_model();
        $result = $model->deleteProduct($id);

        if($result){
            $msg = ['message' => 'Product Deleted Successfully'];
            $response['results'] = [
                'status'    => 200,
                'error'     => false,
                'data'      => $msg
            ];

            
        }

        return json_encode($response);

    }



    //--------------------------------------------------------------------

}
