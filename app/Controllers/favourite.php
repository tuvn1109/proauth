<?php namespace App\Controllers;


use App\Models\CategoryModel;
use App\Models\ProductModel;

class favourite extends BaseController
{
	public function index()
	{
		helper(['filesystem', 'cookie']);
		$modelProduct = new ProductModel();
		$modelCategory = new CategoryModel();
		$cookie = get_cookie('favourite');
		$arrCC = [];
		$arrCC = explode(',', $cookie);
		$arrID = json_encode($arrCC);

		$list = $modelProduct->getListById($arrID);
		$data['temp'] = 'favourite/index';
		$data['menu'] = $modelCategory->where('parent', '0')->findAll();;
		$data['menuactive'] = 'favourite';
		$data['title'] = 'Favourite';
		$data['arrFavourite'] = $arrCC;
				$data['cart'] = session('cart');
		$data['list'] = $list;
		$data['user'] = session('user');
		echo view('layout', $data);

	}


	//--------------------------------------------------------------------

}
