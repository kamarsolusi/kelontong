<?php namespace App\Models;
use CodeIgniter\Model;

class Carts_model extends Model{
    protected $table = 'carts';
    protected $primaryKey = 'cart_id';
    // protected $allowedField = [
    //     'firstname', 'lastname', 'profile_picture', 'username', 'active', 'created_at', 'updated_at', 'deleted_at',
    // ];

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