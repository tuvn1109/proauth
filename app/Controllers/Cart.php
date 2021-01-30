<?php namespace App\Controllers;

use App\Models\PropertiesDetailModel;
use App\Models\PropertiesModel;
use App\Models\CategoryModel;
use App\Models\ColorModel;
use App\Models\SizeModel;
use App\Models\TagModel;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use App\Models\ProductColorModel;
use App\Models\ProductTagModel;

class Cart extends BaseController
{
	public function index()
	{
		helper(['filesystem', 'cookie']);
		$modelProduct = new ProductModel();
		$modelCategory = new CategoryModel();
		$modelProductSize = new ProductSizeModel();
		$modelProductColor = new ProductColorModel();
		$cookie = get_cookie('cart');
		$arrCC = [];
		$arrCC = explode(',', $cookie);
		$listOrder = $modelProduct->whereIn('id', $arrCC)->findAll();
		$data['temp'] = 'order/index';
		$data['menu'] = $modelCategory->where('parent', '0')->findAll();;
		$data['menuactive'] = 'ttt';
		$data['listCart'] = session('cart');
		$data['title'] = 'Cart';
		$data['cart'] = session('cart');
		$data['arrFavourite'] = explode(',', get_cookie('favourite'));
		$data['listOrder'] = $listOrder;
		$data['user'] = session('user');
		echo view('layout_product', $data);
		//	session()->destroy('cart');

	}


	public function listcart()
	{
		helper('cookie');
		$quantity = $this->request->getPost('quantity');
		$loca = $this->request->getPost('loca');
		$listCart = session('cart');

		if ($quantity) {
			$listCart[$loca]['quantity'] = $quantity;
			//session()->destroy('cart');
			session()->set(['cart' => $listCart]);
		}


		echo json_encode($listCart);

	}

	public function addcart()
	{
		helper('cookie');
		$modelPro = new ProductModel();
		$id = $this->request->getPost('id');
		$size = $this->request->getPost('size');
		$color = $this->request->getPost('color');
		$front = $this->request->getPost('front');
		$back = $this->request->getPost('back');
		$quantity = $this->request->getPost('quantity');
		if ($quantity) {
			if ($quantity <= 0) {
				$quantity = 1;
			}
		} else {
			$quantity = 1;
		}
		if ($id) {
			$info = $modelPro->find($id);
			if ($info) {
				$info['size_od'] = $size;
				$info['color_od'] = $color;
				$info['front'] = $front;
				$info['back'] = $back;
				$info['quantity'] = $quantity;
				//	session()->set(['cart' => '']);
				if (!session('cart')) {
					$arrCC[] = $info;
					session()->set(['cart' => $arrCC]);

				} else {
					$arrCC = session('cart');
					$arrCC[] = $info;
					session()->set(['cart' => $arrCC]);

				}

				echo json_encode(count($arrCC));
			}
		}
	}

	public function uncart()
	{
		$id = $this->request->getPost('id');
		$arrCC = session('cart');
		array_splice($arrCC, $id, 1);
		session()->set(['cart' => $arrCC]);
		echo json_encode(1);
	}

	public function favourite()
	{
		$id = $this->request->getPost('id');
		$modelProduct = new ProductModel();
		$cookie = get_cookie('favourite');
		if (!$cookie) {
			$arrCC = [];
		} else {
			$arrCC = explode(',', $cookie);
		}

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

		echo json_encode($cookie);
	}
	//--------------------------------------------------------------------

}
