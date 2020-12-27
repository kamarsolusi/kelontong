<?php namespace App\Controllers;
use App\Models\Products_model;
use App\Models\Pictures_model;
use App\Models\Categories_model;
use App\Models\Banner_model;
use App\Models\Carts_model;

class Home extends BaseController
{
	protected $product_model;
	protected $picture_model;
	protected $category_model;
	protected $banner_model;
	protected $cart_model;

	public function __construct()
	{
		$this->cart_model = new Carts_model();
		$this->banner_model = new Banner_model();
		$this->product_model = new Products_model();
		$this->picture_model = new Pictures_model();
		$this->category_model = new Categories_model();
	}

	public function index()
	{
		$banner = $this->banner_model->findAll();
		$produkLaris = $this->product_model->select('products.product_id, products.sku, products.name, products.product_slug, products.category_id, products.harga, products.harga_baru, products.stok, products.product_status, pictures.picture_id, pictures.picture_name, pictures.token')->join('pictures', 'pictures.product_id = products.product_id', 'left')->where('product_status', 'ACTIVE')->groupBy('products.name')->orderBy('products.product_id', 'RANDOM')->findAll(16,0);
		$produkBaru = $this->product_model->join('pictures', 'pictures.product_id = products.product_id')->where('product_status', 'ACTIVE')->groupBy('products.name')->orderBy('products.product_id', 'DESC')->findAll(4,0);
		$categories = $this->category_model->where('category_status', 'ACTIVE')->findAll();
		$flashsale = $this->product_model->join('pictures', 'pictures.product_id = products.product_id','left')->where('harga_baru < harga')->where('product_status', 'ACTIVE')->groupBy('products.name')->orderBy('products.product_id', 'DESC')->findAll();

		$data = [
			'title'			=> 'Selamat Datang di Website Kelontongku',
			'banner'		=> $banner,
			'produkLaris'	=> $produkLaris,
			'produkBaru'	=> $produkBaru,
			'categories'	=> $categories,
			'flashsale'		=> $flashsale,
		];

		return view('home/index', $data);
	}

	public function detail($product_slug){
		$product = $this->product_model->join('categories', 'categories.category_id = products.category_id')->where('product_slug', $product_slug)->where('product_status', 'ACTIVE')->get()->getRowArray();
		if(empty($product)){
			return redirect()->to(base_url());
		}
		$productTerkait = $this->product_model->join('pictures', 'pictures.product_id = products.product_id')->where('category_id', $product['category_id'])->where('product_status', 'ACTIVE')->groupBy('products.name')->findAll();
		$picture = $this->picture_model->where('pictures.product_id', $product['product_id'])->findAll();

		$data = [
			'pictures'	=> $picture,
			'product'	=> $product,
			'productTerkait'	=> $productTerkait
		];
		return view('frontend/detail', $data);

	}

	//--------------------------------------------------------------------

}
