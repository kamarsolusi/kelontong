<?php namespace App\Models;
use CodeIgniter\Model;

class Transaction_model extends Model{
    protected $table = 'transactions';
    protected $primaryKey = 'transaction_id';
    protected $allowedFields = [
        'transaction_number', 'user_id','email','sub_total','ongkir','grand_total','status','lokasi','penerima','provinsi','kabupaten','kecamatan','kelurahan','kode_pos','kurir','layanan','metode_pembayaran'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}