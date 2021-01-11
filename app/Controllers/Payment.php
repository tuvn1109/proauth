<?php namespace App\Controllers;

use App\Models\PropertiesDetailModel;
use App\Models\PropertiesModel;
use App\Models\CategoryModel;
use App\Models\ColorModel;
use App\Models\ShippingMethodModel;
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
		$modelCategory = new CategoryModel();
		$modelShipping = new ShippingMethodModel();

		$data['temp'] = 'payment/index';
		$data['title'] = 'Payment';
		$data['listOrder'] = session('cart');
		$data['menu'] = $modelCategory->where('parent', '0')->findAll();;
		$data['menuactive'] = 'ttt';
		$data['listShippingMethod'] = $modelShipping->findAll();
		echo view('layout_product', $data);

	}


	public function smpayment()
	{

	}

	//--------------------------------------------------------------------

}
