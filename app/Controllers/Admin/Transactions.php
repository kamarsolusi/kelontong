<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Users_model;
use App\Models\Products_model;
use App\Models\Carts_model;
use App\Models\Banner_model;
use App\Models\Detail_products_model;
use CodeIgniter\CLI\Console;
use App\Models\Transaction_model;
use App\Models\Detail_transactions_model;
use App\Models\Toko_detail_model;

class Transactions extends BaseController
{
    protected $transaction_model;
    protected $toko_detail_model;
    protected $detail_transactions_model;
    public function __construct()
    {
        $this->detail_transactions_model = new Detail_transactions_model();
        $this->toko_detail_model = new Toko_detail_model();
        $this->transaction_model = new Transaction_model();
    }

    public function index(){
        $data = [
            'title'     => 'Manage Transaction | Kelontong',
        ];


        return view('admin/transaction/index', $data);
    }

    public function show(){
        $transaction = $this->transaction_model->select('transaction_id,transaction_number, users.firstname, users.lastname,penerima, grand_total, transactions.status')->join('users','users.id = transactions.user_id')->findAll();
        $data['results'] = $transaction;
        
        return json_encode($data);
    }

    public function detail($transaction_number){
        $transactionToDetail = 'detail_transactions.transaction_id = transactions.transaction_id';
        $transactionToUsers = 'users.id = transactions.user_id';
        $detailToProducts = 'products.product_id = detail_transactions.product_id';
        $transaction = $this->transaction_model->select('*, transactions.transaction_id')->join('detail_transactions', $transactionToDetail)->join('users', $transactionToUsers)->where('transaction_number', $transaction_number)->get()->getRowArray();
        $detailTransaction = $this->detail_transactions_model->join('products', $detailToProducts)->where('transaction_id', $transaction['transaction_id'])->findAll();
        $toko = $this->toko_detail_model->get()->getRowArray();

        $data = [
            'title'         => 'Detail Transaction ' . $transaction_number . ' | Kelontong.xyz',
            'transaction'   => $transaction,
            'detailTransaction' => $detailTransaction,
            'toko'              => $toko
        ];
        // $detailTransaction = $this->detail_transactions_model->join('products', $detailToProducts)->where('transaction_id', $transaction['transaction_id'])->findAll();

        return view('admin/transaction/detail', $data);
    }

    public function edit($transaction_id){
        $transaction = $this->transaction_model->select('transaction_id,transaction_number, status')->where('transaction_id', $transaction_id)->get()->getRowArray();
       
        if($transaction){
            $reponse = [
                'status'    => 200,
                'results'   => $transaction
            ];

        }else{
            $reponse = [
                'status'    => 500
            ];
        }

        return json_encode($reponse);
    }

    public function update($transaction_id){
        $transaction = $this->transaction_model->where('transaction_id', $transaction_id)->get()->getRowArray();
        $status = $this->request->getRawInput();

        $data = [
            'status'    => $status['status'],
        ];

        if($this->transaction_model->update($transaction['transaction_id'], $data)){
            $response = [
                'status'    => 200,
            ];
        }

        return json_encode($response);
        
    }

    public function delete($transaction_id){
        if($this->transaction_model->delete($transaction_id)){
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