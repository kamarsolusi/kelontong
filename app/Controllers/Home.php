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
		$produkLaris = $this->product_model->join('pictures', 'pictures.product_id = products.product_id')->groupBy('products.name')->orderBy('products.product_id', 'RANDOM')->findAll(16,0);
		$produkBaru = $this->product_model->join('pictures', 'pictures.product_id = products.product_id')->groupBy('products.name')->orderBy('products.product_id', 'DESC')->findAll(8,0);
		
		$data['title'] = 'Selamat Datang di Website Kelontongku';
		$data = [
			'produkLaris'	=> $produkLaris,
			'produkBaru'	=> $produkBaru,
		];
		return view('home/index', $data);
	}

	//--------------------------------------------------------------------

}
