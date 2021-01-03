<?php namespace App\Models;
use CodeIgniter\Model;

class Detail_transactions_model extends Model{
    protected $table = 'detail_transactions';
    protected $allowedFields = [
        'transaction_id', 'product_id','qty','catatan'
    ];

    
    public function tambahDetailTrx($data){
        return $this->db->table($this->table)->insert($data);
    }
    // public function tambahDetailTrx($data){
    //     return $this->db->table($this->table)->insert($data);
    // }

}