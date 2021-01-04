<?php namespace App\Models;
use CodeIgniter\Model;

class Toko_detail_model extends Model{
    protected $table = 'toko_detail';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'telphone', 'provinsi', 'kota', 'kecamatan','kelurahan','kode_pos','alamat'
    ];

}