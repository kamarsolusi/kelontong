<?php namespace App\Models;
use CodeIgniter\Model;

class Carts_model extends Model{
    protected $table = 'carts';
    protected $primaryKey = 'cart_id';
    protected $allowedFields = [
        'cart_id','user_id','product_id','qty','catatan'
    ];

    public function getCart($id = false){
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['cart_id' => $id])->getRowArray();
        }
    }

    public function insertCart($data){
        return $this->db->table($this->table)->insert($data);
    }

    public function updateCart($data, $id){
        return $this->db->table($this->table)->update($data, ['cart_id' => $id]);
    }
}