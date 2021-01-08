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
		helper('cookie');
		$modelPro = new ProductModel();
		$id = $this->request->getPost('id');
		$size = $this->request->getPost('size');
		$color = $this->request->getPost('color');
		$front = $this->request->getPost('front');
		$back = $this->request->getPost('back');

		$info = $modelPro->find($id);

		$info['size_od'] = $size;
		$info['color_od'] = $color;
		$info['front'] = $front;
		$info['back'] = $back;
	//	session()->set(['cart' => '']);
		if (!session('cart')) {
			$arrCC[] = $info;
			session()->set(['cart' => $arrCC]);

		} else {
			$arrCC = session('cart');
			$arrCC[] = $info;
			session()->set(['cart' => $arrCC]);

		}

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
