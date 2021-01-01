<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Users_model;
use App\Models\Products_model;
use App\Models\Carts_model;
use App\Models\Banner_model;
use CodeIgniter\CLI\Console;

class Transactions extends BaseController
{
    protected $banner_model;
    protected $product_model;
    protected $carts_model;
    public function __construct()
    {
        helper(['form']);
        $this->product_model = new Products_model();
        $this->banner_model = new Banner_model();
        $this->carts_model = new Carts_model();
    }

    public function index($slug=null){
        if($slug==null){
            $cart = $this->carts_model->select('*, qty, pictures.picture_name, products.product_id')->where('user_id', user()->id)->join('products', 'products.product_id = carts.product_id')->join('detail_products','detail_products.product_id = products.product_id','left')->join('pictures','pictures.product_id = products.product_id', 'left')->groupBy('products.product_id')->orderBy('cart_id','DESC')->findAll();
            $data =[
                'title'     => 'Carts',
                'product'   => $cart
            ];
        }else{
            $product = $this->product_model->select('*, products.product_id')->join('pictures', 'pictures.product_id = products.product_id','right')->get()->getRowArray();
            
            if($this->carts_model->where('product_id', $product['product_id'])->where('user_id', user()->id)->findAll()){
                $cartGet[] = $this->carts_model->join('products','products.product_id = carts.product_id')->join('pictures','pictures.product_id = products.product_id','left')->join('detail_products','detail_products.product_id = products.product_id','left')->where('carts.product_id', $product['product_id'])->where('user_id', user()->id)->get()->getRowArray();
            }else{
                $dataCart = [
                    'user_id'   => user()->id,
                    'product_id'    => $product['product_id'],
                    'qty'           => 1,
                ];
                $cartAdd = $this->carts_model->insert($dataCart);
                $cartGet[] = $this->carts_model->join('products','products.product_id = carts.product_id')->join('pictures','pictures.product_id = products.product_id','left')->join('detail_products','detail_products.product_id = products.product_id','left')->where('carts.product_id', $product['product_id'])->where('user_id', user()->id)->get()->getRowArray();
                $cartGet[]['qty'] = 1;
            }

            $data =[
                'title'     => 'Carts',
                'product'   => $cartGet,
            ];
        }
        return view('frontend/form-order', $data);
    }

    public function showCart($slug=null){

    }
}