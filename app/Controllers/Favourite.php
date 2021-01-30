<?php namespace App\Controllers;


use App\Models\CategoryModel;
use App\Models\ProductModel;

class Favourite extends BaseController
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


	public function favouriteadd()
	{
		helper('cookie');
		$id = $this->request->getPost('id');
		$modelProduct = new ProductModel();
		$cookie = get_cookie('favourite');
		if (!$cookie) {
			$arrCC = [];
		} else {
			$arrCC = explode(',', $cookie);
		}

		if ($id) {
			if (!in_array($id, $arrCC)) {
				$arrCC[] = $id;
				$text = implode(',', $arrCC);
				set_cookie([
					'name' => 'favourite',
					'value' => $text,
					'expire' => 1000000,
					'httponly' => false
				]);
			} else {
				$pos = array_search($id, $arrCC);
				unset($arrCC[$pos]);
				$text = implode(',', $arrCC);
				set_cookie([
					'name' => 'favourite',
					'value' => $text,
					'expire' => 1000000,
					'httponly' => false
				]);

			}
		}

		$count = explode(',', $cookie);

		echo json_encode(count($arrCC));
	}
	//--------------------------------------------------------------------

}
