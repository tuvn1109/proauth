<?php namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class Category extends BaseController
{
	public function index($slug)
	{
		$modelCategory = new CategoryModel();
		$modelProduct = new ProductModel();
		$id = $modelCategory->getIdBySlug($slug);
		$infoCate = $modelCategory->where('id', $id)->first();
		$data['temp'] = 'category/index';
		$data['title'] = 'CA';
		$data['infoCate'] = $infoCate;
		echo view('layout', $data);

	}
	public function product($slugcat,$slug)
	{
		$modelCategory = new CategoryModel();
		$modelProduct = new ProductModel();
		$id = $modelCategory->getIdBySlug($slugcat);
		$infoCate = $modelCategory->where('id', $id)->first();
		$data['temp'] = 'category/index';
		$data['title'] = 'CA';
		$data['infoCate'] = $infoCate;
				echo view('layout_product', $data);


	}


	//--------------------------------------------------------------------

}
