<?php namespace App\Models;
use CodeIgniter\Model;

class Pictures_model extends Model{
    protected $table = 'pictures';
    // protected $allowedField = [
    //     'firstname', 'lastname', 'profile_picture', 'username', 'active', 'created_at', 'updated_at', 'deleted_at',
    // ];

    public function getPictures($id = false){
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['picture_id' => $id])->getRowArray();
        }
    }

    public function insertPictures($data){
        return $this->db->table($this->table)->insert($data);
    }
}
?>