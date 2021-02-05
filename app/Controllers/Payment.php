<?php namespace App\Controllers;

use App\Models\AddressUserModel;
use App\Models\PaymentMethodModel;
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
use App\Models\UsersModel;

class Payment extends BaseController
{
	public function index()
	{
		helper('cookie');
		$modelProduct = new ProductModel();
		$modelCategory = new CategoryModel();
		$modelShipping = new ShippingMethodModel();
		$modelUser = new UsersModel();
		$modelAddressUser = new AddressUserModel();
		$modelPaymentMethod = new PaymentMethodModel();
		if (session('user')) {
			$infoU = $modelUser->find(session('user')['id']);
			$shipping_add = $modelAddressUser->where('cus_id', $infoU['id'])->findAll();
			$data['shipping_add'] = $shipping_add;
			$data['user'] = $infoU;

		}
		if (!session('cart')) {
			return redirect()->to('/order');
		}
		$data['listOrder'] = session('cart');
		$data['temp'] = 'payment/index';
		$data['title'] = 'Payment';
		$data['menu'] = $modelCategory->where('parent', '0')->findAll();;
		$data['menuactive'] = 'ttt';
		$data['cart'] = session('cart');
		$data['listShippingMethod'] = $modelShipping->findAll();
		$data['listPayMethod'] = $modelPaymentMethod->findAll();
		echo view('layout_product', $data);

	}


	public function smpayment()
	{

	}

	//--------------------------------------------------------------------

}
