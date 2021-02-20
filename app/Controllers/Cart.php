<?php namespace App\Controllers;

use App\Models\AddressUserModel;
use App\Models\CouponModel;
use App\Models\CustomerModel;
use App\Models\OrdersDetailModel;
use App\Models\OrdersModel;
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
use App\Models\UsersModel;

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
	public function usecoupon()
	{
		$model = new CouponModel();
		$coupon = $this->request->getPost('coupon');
		$amount = $this->request->getPost('amount');
		$info = $model->where('code', $coupon)->first();
		$cart = session('cart');

		$total = 0;
		foreach ($cart as $val):
			if ($val['sale'] == 'yes') {
				$price = $val['price_sale'];
			} else {
				$price = $val['price'];
			}
			$total += $price;
		endforeach;


		if ($coupon == 'cancel') {
			$return = [
				'code' => 'coupou_cancel',
				'msg' => 'Successfully',
				'stt' => true,
				'data' => ['discount' => 0, 'afterDiscount' => $total]
			];

			echo json_encode($return);
			return;
		}


		$today = date('Y-m-d');
		if ($info) {
			if ($info['expiration_date'] >= $today) {


				$discount = $total * $info['discount'] / 100;
				$af_Discount = $total - $discount;

				$return = [
					'code' => 'coupou_success',
					'msg' => 'Successfully',
					'stt' => true,
					'data' => ['discount' => $discount, 'afterDiscount' => $af_Discount]
				];
			} else {
				$return = [
					'code' => 'coupou_success',
					'msg' => 'Coupon code is expired',
					'stt' => false,
				];
			}
		} else {
			$return = [
				'code' => 'coupou_success',
				'msg' => 'Coupon code is not available',
				'stt' => false,
			];
		}

		echo json_encode($return);
	}


	public function insert()
	{
		helper('filesystem');
		$orderMD = new OrdersModel();
		$orderDetailMD = new OrdersDetailModel();
		$customerMD = new CustomerModel();
		$userModel = new UsersModel();
		$userAddressModel = new AddressUserModel();
		$fullname = $this->request->getPost('fullname');
		$phone = $this->request->getPost('phone');
		$email = $this->request->getPost('email');
		$country = $this->request->getPost('country');
		$city = $this->request->getPost('city');
		$postalcode = $this->request->getPost('postalcode');
		$ship = $this->request->getPost('shipping_method');
		$type_ship = $this->request->getPost('type_ship_address');
		$address = $this->request->getPost('address');
		$paymethod = $this->request->getPost('radiopaymethod');
		$test = session('cart');
		$user = session('user');

		if (!$user) {
			$dataUser = [
				'username' => $email,
				'password' => 1234,
				'fullname' => $fullname,
				'phone' => $phone,
				'email' => $email,
				'country' => $country,
				'city' => $city,
				'postalcode' => $postalcode,
				'address' => $address,
				'status' => 'active',
				'role' => 'user',

			];
			$idCustom = $userModel->insert($dataUser);

			$addressUser = [
				'cus_id' => $idCustom,
				'country' => $country,
				'city' => $city,
				'postalcode' => $postalcode,
				'address' => $address,
			];

			$userAddressModel->insert($addressUser);
			$addresTexT = $country . '&nbsp;' . $city . '&nbsp;' . $postalcode . '&nbsp;' . $address;
		} else {
			// type_ship_address
			$idCustom = $user['id'];
			if ($type_ship == 'new') {
				$countryN = $this->request->getPost('country_new');
				$cityN = $this->request->getPost('city_new');
				$postalcodeN = $this->request->getPost('postalcode_new');
				$addressN = $this->request->getPost('address_new');

				$addressNEW = [
					'cus_id' => $idCustom,
					'country' => $countryN,
					'city' => $cityN,
					'postalcode' => $postalcodeN,
					'address' => $addressN,
				];
				$userAddressModel->insert($addressNEW);
				$addresTexT = $countryN . '&nbsp;' . $cityN . '&nbsp;' . $postalcodeN . '&nbsp;' . $addressN;

			} else {
				$idAddress = $this->request->getPost('idaddress');
				$infoAddress = $userAddressModel->find($idAddress);

				$addresTexT = $infoAddress['country'] . '&nbsp;' . $infoAddress['city'] . '&nbsp;' . $infoAddress['postalcode'] . '&nbsp;' . $infoAddress['address'];

			}


		}


		$dataOrder = [
			'order_cus' => $idCustom,
			'order_status' => 'New',
			'order_code' => $idCustom . date('Ymd') . date('is'),
			'order_date' => date('Y-m-d H:i:s'),
			'order_shipping' => $ship,
			'order_address' => $addresTexT,
			'order_payment_method' => $paymethod,
			//'order_date' => date(),
		];
		$idOrder = $orderMD->insert($dataOrder);
		$listCart = session('cart');

		$total = 0;
		$i = 0;
		foreach ($listCart as $val):
			$i++;

			if ($val['sale'] == 'yes') {
				$price = $val['price_sale'];
			} else {
				$price = $val['price'];
			}

			$image_parts = explode(";base64,", $val['front']);
			$image_type_aux = explode("image/", $image_parts[0]);
			$image_type = $image_type_aux[1];
			$image_baseFront = base64_decode($image_parts[1]);
			$fileFront = WRITEPATH . '/uploads/order/' . $idOrder . '/front' . $i . '.' . $image_type;
			$pathFront = '/order/' . $idOrder . '/front' . $i . '.' . $image_type;
			$image_parts = explode(";base64,", $val['back']);
			$image_type_aux = explode("image/", $image_parts[0]);
			$image_type = $image_type_aux[1];
			$image_baseBack = base64_decode($image_parts[1]);

			$fileBack = WRITEPATH . '/uploads/order/' . $idOrder . '/back' . $i . '.' . $image_type;
			$pathBack = '/order/' . $idOrder . '/back' . $i . '.' . $image_type;


			if (!is_dir(WRITEPATH . 'uploads/order/' . $idOrder)) {
				mkdir(WRITEPATH . 'uploads/order/' . $idOrder, 0777, TRUE);
			}
			file_put_contents($fileFront, $image_baseFront);
			file_put_contents($fileBack, $image_baseBack);

			$total += $price;
			$dataOrderDetail = [
				'order_id' => $idOrder,
				'order_detail_size' => $val['size_od'],
				'order_detail_color' => $val['color_od'],
				'order_detail_price' => $price,
				'order_detail_image_front' => $pathFront,
				'order_detail_image_back' => $pathBack,
				'product_id' => $val['id'],
			];
			$orderDetailMD->insert($dataOrderDetail);

		endforeach;

		$upTotalPrice = [
			'order_price' => $total,
		];
		$orderMD->update($idOrder, $upTotalPrice);

		unset($_SESSION['cart']);
		echo json_encode($idCustom . date('Ymd') . date('is'));
	}

}
