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

class Payment extends BaseController
{
	public function index()
	{
		helper('cookie');
		$modelProduct = new ProductModel();
		$modelProductSize = new ProductSizeModel();
		$modelProductColor = new ProductColorModel();
		$cookie = get_cookie('cart');
		$arrCC = [];
		$arrCC = explode(',', $cookie);
		$listOrder = $modelProduct->whereIn('id', $arrCC)->findAll();
		$data['temp'] = 'payment/index';
		$data['title'] = 'CA';
		$data['listOrder'] = $listOrder;
		echo view('layout_product', $data);

	}

	//--------------------------------------------------------------------

}
