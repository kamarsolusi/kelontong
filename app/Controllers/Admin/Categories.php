<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\Categories_model;

class Categories extends BaseController
{
	protected $categories_model;
	public function __construct()
	{
		$this->categories_model = new Categories_model();
		helper(['form']);
	}
	public function index()
	{
		$data['title'] = 'Manage Categories';
		return view('admin/category/index', $data);
	}

	public function show()
	{
		$model = new Categories_model();
		$data['results'] = $model->getCategories();

		return json_encode($data);
	}

	public function categoryActive(){
		$model = new Categories_model();
		$data['results'] = $model->where('category_status','ACTIVE')->findall();

		return json_encode($data);
	}

	public function add()
	{

		$validation = \Config\Services::validation();

		$model = new Categories_model();
		$name = $this->request->getPost('category_name');
		$status = $this->request->getPost('category_status');
		$newName ='';
		if(!empty($this->request->getFiles())){
			$image = $this->request->getFiles();
			if($image['file']->isValid() && ! $image['file']->hasMoved()){
				$newName = $image['file']->getRandomName();
	
				$image['file']->move(FCPATH . 'upload/category', $newName);
			}
		}else{
			$newName ='no_image.png';
		}
		
		
		$data = [
			'category_name'		=> $name,
			'category_status'	=> $status,
			'category_image'	=> $newName,
		];
		
		if($model->insertCategory($data)){
			$respone = [
				'status'		=> 200,
				'error'			=> false,
				'data'			=> 'success'
			];
		}else{
			$respone = [
				'status'	=> 500,
				'error'		=> true,
				'data'		=> 'error'
			];
		}
			
		return json_encode($respone);

	}
	public function edit($id = null)
	{
		$model = new Categories_model();
		$get = $model->getCategories($id);

		if ($get) {
			return json_encode($get);
		} else {
			return json_encode('Nothing');
		}
	}

	public function delete($id = null)
	{
		$model = new Categories_model();
		$category = $model->where('category_id', $id)->get()->getRowArray();
		$hapus = $model->deleteCategory($id);
		
		if($category['category_image'] != 'no_image.png'){
			unlink(FCPATH . 'upload/category/' . $category['category_image']);
		}
		
		if ($hapus) {
			echo "Deleted Sucessfully";
		}
	}

	public function update($id = null)
	{
		$validation = \Config\Services::validation();

		$model = new Categories_model();

		$category_id = $id;
		$categories = $model->getCategories($category_id);
		$name = $this->request->getPost('category_name');
		$status = $this->request->getPost('category_status');
		var_dump($categories['category_image'] != 'no_image.png');
		if(!empty($this->request->getFiles())){
			$image = $this->request->getFiles();
			if($image['file']->isValid() && ! $image['file']->hasMoved()){
				if($categories['category_image'] != 'no_image.png'){
					unlink(FCPATH . '/upload/category/' . $categories['category_image']);
				}
			
					$newName = $image['file']->getRandomName();
					$image['file']->move(FCPATH . 'upload/category', $newName);
							
			}
		}else{
			$newName = 'no_image.png';
		}	

		$data = [
			'category_name'		=> $name,
			'category_status'	=> $status,
			'category_image'	=> $newName,
		];

		if($model->updateCategory($data, $id)){
			$msg = ['message' => 'Update Category Succesffuly'];
			$respone = [
				'status'		=> 200,
				'error'			=> false,
				'data'			=> $msg
			];
		}else{

			$respone = [
				'status'	=> 500,
				'error'		=> true,
				'data'		=> 'error'
			];
		}
		return json_encode($respone);
		
	}

	public function load(){
		$categories_id = $this->request->getVar('categories_id');
		$categories = $this->categories_model->where('category_id',$categories_id)->get()->getRowArray();
        $path = FCPATH . 'upload/category/';
        $file_list = array();
        
        if(!empty($categories)){
			$file = $categories['category_image'];
			$file_path = $path . $file;
			if(file_exists($file_path)){
				$size = filesize($file_path);
			}else{
				$file = 'no_image.png';
				$size = filesize($path. $file);
			}
			$file_list[] = array('name' => $file, 'size' => $size, 'path' => base_url('upload/category'). '/'.$file);

            $data = [
                'file_list' => $file_list,
                'categories'  => $categories
            ];
        }else{
            $data = [
                'empty' => 'data empty',
            ];
        }

        return json_encode($data);
	}

	public function remove_image(){
		$category_id = $this->request->getPost('category_id');
		$categories = $this->categories_model->where('category_id', $category_id)->get()->getRowArray();

		if($categories['category_image']!='no_image.png'){
			$data['category_image'] = 'no_image.png';
			if(unlink(FCPATH . 'upload/category/' . $categories['category_image'])){
				$removeImage = $this->categories_model->updateCategory($data, $category_id);
			}
			
			$response = [
				'response'	=> 200
			];
		}else{
			$response = [
				'response'	=> 200
			];
		}

		
		return json_encode($response);
	}
	//--------------------------------------------------------------------

}
