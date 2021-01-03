<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Users_model;
use App\Models\Products_model;
use App\Models\Carts_model;
use App\Models\Banner_model;

class Carts extends BaseController
{
    protected $session;
    protected $user_model;
    protected $product_model;
    protected $cart_model;
    protected $banner_model;

    public function __construct()
    {
        $this->banner_model = new Banner_model();
        $this->cart_model = new Carts_model();
        $this->user_model = new Users_model();
        $this->product_model = new Products_model();
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index(){
        $banner = $this->banner_model->findAll();
        $data =[
            'title'     => 'Carts',
            'banner'    => $banner
        ];
        return view('frontend/cart-order', $data);
    }
    public function show()
    {
        if(!empty(user()->username)){
            $username = user()->username;
        }
        $user = $this->user_model->select('id')->where('username', $username)->get()->getRowArray();
        $cart = $this->cart_model->select('cart_id, catatan,products.name, products.product_slug, carts.qty,products.harga, products.harga_baru, pictures.picture_name ')->where('user_id', $user['id'])->join('products', 'products.product_id = carts.product_id')->join('pictures','pictures.product_id = products.product_id', 'left')->groupBy('products.product_id')->orderBy('cart_id','DESC')->findAll();

        $total = count($cart);

        if(empty($total)){
            $data = [
                'total' => $total,
                'results'   => ''
            ];
        }else{
            $data = [
                'total'     => $total,
                'results' => $cart 
            ];
        }

        return json_encode($data);
    }
  

    public function add()
    {
        $sku = $this->request->getPost('sku');
        $product_id = $this->product_model->select('product_id,stok')->where('sku', $sku)->get()->getRowArray();
        $username = $this->request->getPost('username');
        $user = $this->user_model->select('id')->where('username', $username)->get()->getRowArray();
        $qty = 1;

        
        if(!empty($this->cart_model->where('product_id', $product_id['product_id'])->where('user_id', $user['id'])->get()->getResultArray())){
            $cartId = $this->cart_model->select('cart_id, qty')->where('product_id', $product_id['product_id'])->where('user_id', $user['id'])->get()->getRowArray();
            $cartData = [
                'user_id'       => $user['id'],
                'product_id'    => $product_id['product_id'],
                'qty'           => $cartId['qty'] + 1,
            ];
            $save = $this->cart_model->updateCart($cartData, $cartId['cart_id']);
            
        }else{
            
            $cartData = [
                'user_id'       => $user['id'],
                'product_id'    => $product_id['product_id'],
                'qty'           => $qty,
            ];
            $save = $this->cart_model->insertCart($cartData);
        }

        if($save){
            $data['response'] = 200;
        }else{
            $data['response'] = 500;
        }


        return json_encode($data);
    }

    public function plus($id){
        $qty = $this->request->getPost('qty');
        $cartProductId = $this->cart_model->select('product_id')->where('cart_id', $id)->get()->getRowArray();
        $productStok = $this->product_model->select('product_id,stok')->where('product_id', $cartProductId['product_id'])->get()->getRowArray();
        
        if($qty > $productStok['stok']){
            $response = [
                'status'    => 500,
                'message'   => 'Out of Stock !'
            ];
        }else{

            $data = [
                'qty' => $qty
            ];
            
            $update = $this->cart_model->updateCart($data,$id);
            if($update){
                $response = [
                    'status'    => 200
                ];
            }else{
                $response = [
                    'status'    => 500
                ];
            }
        }

        return json_encode($response);
        
    }

    public function delete($id=null){

        if($id){
            $deleteCart = $this->cart_model->delete($id);
            if($deleteCart){
                $reponse = [
                    'status' => 200,
                ];
            }else{
                $reponse = [
                    'status'    => 500,
                ];
            }
        }else{
            $cart = $this->cart_model->where('user_id', user()->id)->findAll();
            foreach($cart as $key => $value){
                $deleteCart = $this->cart_model->delete($value['cart_id']);
            }

            if($deleteCart){
                $reponse = [
                    'status' => 200,
                ];
            }else{
                $reponse = [
                    'status'    => 500,
                ];
            }
        }

        return json_encode($reponse);
    }

    public function updateCatatan($id){
        $catatan = $this->request->getPost('catatan');
        $data = [
            'catatan' => $catatan
        ];

        $update = $this->cart_model->updateCart($data,$id);
        if($update){
            $response = [
                'status'    => 200
            ];
        }else{
            $response = [
                'status'    => 500
            ];
        }

        return json_encode($response);
    }
}