<?php namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class Testlayout extends BaseController
{
	public function index()
	{
		helper('cookie');
		$modelPro = new ProductModel();
		$modelCategory = new CategoryModel();
		$data['menu'] = $modelCategory->where('parent', '0')->findAll();;
		$data['temp'] = 'testlayout/index';
		$data['menuactive'] = 'ttt';
		echo view('testlayout/layout_test', $data);

	}

	//--------------------------------------------------------------------

}
