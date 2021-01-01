<?php namespace App\Models;
use CodeIgniter\Model;

class Detail_products_model extends Model{
    protected $table = 'detail_products';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'product_id', 'berat', 'detail'
    ];

}