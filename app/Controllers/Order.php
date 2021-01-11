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

class Order extends BaseController
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
		$data['listOrder'] = $listOrder;
		echo view('layout_product', $data);

	}

	//--------------------------------------------------------------------

}
