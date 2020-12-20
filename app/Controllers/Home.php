<?php namespace App\Controllers;
use App\Models\Products_model;
use App\Models\Pictures_model;
use App\Models\Categories_model;

class Home extends BaseController
{
	protected $product_model;
	protected $picture_model;
	protected $category_model;

	public function __construct()
	{
		$this->product_model = new Products_model();
		$this->picture_model = new Pictures_model();
		$this->category_model = new Categories_model();
	}
	public function index()
	{
		$productJoin = $this->product_model->join('pictures', 'pictures.product_id = products.product_id')->groupBy('products.name')->orderBy('products.product_id', 'desc')->findAll();
		$data['title'] = 'Selamat Datang di Website Kelontongku';
		$data['productJoin'] = $productJoin;
		return view('home/index', $data);
	}

	//--------------------------------------------------------------------

}
