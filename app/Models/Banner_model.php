<?php namespace App\Models;
use CodeIgniter\Model;

class Banner_model extends Model{
    protected $table = 'banner';
    protected $primaryKey = 'banner_id';
    // protected $allowedField = [
    //     'firstname', 'lastname', 'profile_picture', 'username', 'active', 'created_at', 'updated_at', 'deleted_at',
    // ];

    public function getBanner($id = false){
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['banner_id' => $id])->getRowArray();
        }
    }

    public function insertBanner($data){
        return $this->db->table($this->table)->insert($data);
    }
}
?>