<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Users_model;
use App\Models\Products_model;
use App\Models\Carts_model;
use App\Models\Banner_model;
use App\Models\Detail_products_model;
use CodeIgniter\CLI\Console;
use App\Models\Transaction_model;
use App\Models\Detail_transactions_model;

class Transactions extends BaseController
{
    protected $banner_model;
    protected $product_model;
    protected $carts_model;
    protected $transaction_model;
    protected $detail_transactions_model;
    public function __construct()
    {
        helper(['form']);
        $this->detail_transactions_model = new Detail_transactions_model();
        $this->transaction_model = new Transaction_model();
        $this->product_model = new Products_model();
        $this->banner_model = new Banner_model();
        $this->carts_model = new Carts_model();
    }

    public function index($slug=null){
        $transactionNumber = $this->transaction_model->select('transaction_number')->orderBy('transaction_id','DESC')->get()->getRowArray();
        
        if(empty($transactionNumber)){
            $transactionNumber['transaction_number'] = 0;
            $transactionNumber['transaction_number'] = date('dmY') . ''. $transactionNumber['transaction_number'];
        }else{
            $trxSubstr = substr($transactionNumber['transaction_number'],0,8);
            $transactionNumber['transaction_number'] = str_replace($trxSubstr,'',$transactionNumber['transaction_number']);
            $transactionNumber['transaction_number'] += 1;
            $transactionNumber['transaction_number'] = date('dmY') . ''. $transactionNumber['transaction_number'];
        }


        if($slug==null){
            $cart = $this->carts_model->select('*, qty, pictures.picture_name, products.product_id')->where('user_id', user()->id)->join('products', 'products.product_id = carts.product_id')->join('detail_products','detail_products.product_id = products.product_id','left')->join('pictures','pictures.product_id = products.product_id', 'left')->groupBy('products.product_id')->orderBy('cart_id','DESC')->findAll();
            if(empty($cart)){
                return redirect()->to(base_url());
            }
            $data =[
                'title'     => 'Carts',
                'product'   => $cart,
                'transaction_number'    => $transactionNumber,
            ];
        }else{  
            $product = $this->product_model->where('product_slug', $slug)->get()->getRowArray();
            
            if($this->carts_model->where('product_id', $product['product_id'])->where('user_id', user()->id)->findAll()){
                $cartGet[] = $this->carts_model->join('products','products.product_id = carts.product_id')->join('pictures','pictures.product_id = products.product_id','left')->join('detail_products','detail_products.product_id = products.product_id','left')->where('carts.product_id', $product['product_id'])->where('user_id', user()->id)->get()->getRowArray();
            }else{
                $dataCart = [
                    'user_id'   => user()->id,
                    'product_id'    => $product['product_id'],
                    'qty'           => 1,
                ];
                $this->carts_model->insert($dataCart);
                $cartGet[] = $this->carts_model->join('products','products.product_id = carts.product_id')->join('pictures','pictures.product_id = products.product_id','left')->join('detail_products','detail_products.product_id = products.product_id','left')->where('carts.product_id', $product['product_id'])->where('user_id', user()->id)->get()->getRowArray();
                $cartGet[]['qty'] = 1;
            }

            $data =[
                'title'     => 'Carts',
                'product'   => $cartGet,
                'transaction_number'    => $transactionNumber,
            ];
        }

        return view('frontend/form-order', $data);
    }

   
    public function addTransaction(){
        $transactionNumber = $this->transaction_model->select('transaction_number')->orderBy('transaction_id','DESC')->get()->getRowArray();

        if(empty($transactionNumber)){
            $transactionNumber['transaction_number'] = 0;
            $transactionNumber['transaction_number'] = date('dmY') . ''. $transactionNumber['transaction_number'];
        }else{
            $trxSubstr = substr($transactionNumber['transaction_number'],0,8);
            $transactionNumber['transaction_number'] = str_replace($trxSubstr,'',$transactionNumber['transaction_number']);
            $transactionNumber['transaction_number'] += 1;
            $transactionNumber['transaction_number'] = date('dmY') . ''. $transactionNumber['transaction_number'];
        }

        $product_slug = explode(",", $this->request->getPost('product_slug'));
        $alamat = $this->request->getVar('alamat');
        $penerima = $this->request->getVar('penerima');
        $email = $this->request->getVar('email');
        $no_telphone = $this->request->getVar('no_telphone');
        $provinsi = $this->request->getVar('provinsi');
        $kabupaten = $this->request->getVar('kabupaten');
        $kecamatan = $this->request->getVar('kecamatan');
        $kelurahan = $this->request->getVar('kelurahan');
        $kurir = $this->request->getVar('kurir');
        $layanan = $this->request->getVar('service');
        $kode_pos = $this->request->getVar('kode_pos');
        $metode_pembayaran = $this->request->getVar('metode_pembayaran');
        $subTotal = $this->request->getVar('subTotal');
        $grandTotal = $this->request->getVar('grandTotal');
        $ongkir = $this->request->getVar('ongkir');
       

        $data = [
            'transaction_number'    => $transactionNumber['transaction_number'],
            'user_id'               => user()->id,
            'email'                 => $email,
            'sub_total'             => $subTotal,
            'grand_total'           => $grandTotal,
            'ongkir'                => $ongkir,
            'lokasi'                => $alamat,
            'penerima'              => $penerima,
            'provinsi'              => $provinsi,
            'kabupaten'             => $kabupaten,
            'kecamatan'             => $kecamatan,
            'kelurahan'             => $kelurahan,
            'kode_pos'              => $kode_pos,
            'kurir'                 => $kurir,
            'layanan'               => $layanan,
            'metode_pembayaran'     => $metode_pembayaran,
            'no_telphone'           => $no_telphone,
        ];
        
        $this->transaction_model->insert($data);
        $transactionId = $this->transaction_model->select('transaction_id,transaction_number')->where('transaction_number', $transactionNumber['transaction_number'])->get()->getRowArray();

        foreach($product_slug as $key => $value){
            $cart = $this->carts_model->join('products','products.product_id = carts.product_id')->where('product_slug', $value)->where('user_id', user()->id)->get()->getRowArray();
                        
            $dataDetailTrx = [
                'transaction_id'    => $transactionId['transaction_id'],
                'product_id'        => $cart['product_id'],
                'qty'               => $cart['qty'],
                'catatan'           => $cart['catatan']
            ];
            $this->detail_transactions_model->insert($dataDetailTrx);
            $this->carts_model->delete($cart['cart_id']);
            $qtyProduct = $this->product_model->select('stok, product_id')->where('product_slug', $value)->get()->getRowArray();
            $data=[
                'stok' => $qtyProduct['stok'] - $cart['qty'],
            ];
            $this->product_model->updateProduct($data, $qtyProduct['product_id']);
        }

        $response = [
            'status'    => 200,
            'transaction_number'    => $transactionNumber['transaction_number']
        ];
        
        return json_encode($response);
    }

    public function show(){
        $transaction = $this->transaction_model->where('user_id', user()->id)->findAll();
        $data = [
            'transaction'   => $transaction
        ];
        return view('frontend/transaction', $data);
    }


    public function success(){
        
    }
}