<?php namespace App\Controllers;
use App\Models\Products_model;
use App\Models\Pictures_model;
use App\Models\Categories_model;
use App\Models\Banner_model;

class Home extends BaseController
{
	protected $product_model;
	protected $picture_model;
	protected $category_model;
	protected $banner_model;

	public function __construct()
	{
		$this->banner_model = new Banner_model();
		$this->product_model = new Products_model();
		$this->picture_model = new Pictures_model();
		$this->category_model = new Categories_model();
	}
	public function index()
	{
		$banner = $this->banner_model->findAll();
		$produkLaris = $this->product_model->join('pictures', 'pictures.product_id = products.product_id', 'left')->where('product_status', 'ACTIVE')->groupBy('products.name')->orderBy('products.product_id', 'RANDOM')->findAll(16,0);
		$produkBaru = $this->product_model->join('pictures', 'pictures.product_id = products.product_id')->where('product_status', 'ACTIVE')->groupBy('products.name')->orderBy('products.product_id', 'DESC')->findAll(4,0);
		
		$data['title'] = 'Selamat Datang di Website Kelontongku';
		$data = [
			'banner'		=> $banner,
			'produkLaris'	=> $produkLaris,
			'produkBaru'	=> $produkBaru,
		];
		return view('home/index', $data);
	}

	//--------------------------------------------------------------------

}
