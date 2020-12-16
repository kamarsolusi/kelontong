<?php namespace App\Models;
use CodeIgniter\Model;

class Users_model extends Model{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $deletedField = 'deleted_at';
    protected $updatedField = 'updated_at';
    // protected $allowedField = [
    //     'firstname', 'lastname', 'profile_picture', 'username', 'active', 'created_at', 'updated_at', 'deleted_at',
    // ];

    public function getUsers($id = false){
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['id' => $id])->getRowArray();
        }
    }

    public function updateUser($id, $data)
    {
        $where = $this->db->table($this->table)->where(['id' => $id]);

        if($where){
            return $where->update($data);
        }
    }
}
?>