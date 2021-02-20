<?php

namespace App\Controllers\Cpanel;

use App\Models\AddressUserModel;
use App\Models\CustomerModel;
use App\Models\OrdersDetailModel;
use App\Models\OrdersModel;
use App\Models\UsersModel;

class Orders extends CpanelController
{
	public function index()
	{
		$model = new OrdersModel();
		$status = $model->get_enum_values('orders', 'order_status');
		$pay = $model->get_enum_values('orders', 'order_payment');


		$data['temp'] = 'cpanel/orders/index';
		$data['title'] = 'Orders';
		$data['menu'] = 'orders';
		echo view('cpanel/layout', $data);
	}


	public function loaddata()
	{
		$model = new OrdersModel();

		// data
		$page = $this->request->getGet('page');
		$draw = $this->request->getGet('draw');
		$perpage = $this->request->getGet('length');
		$search = $this->request->getGet('search[value]');
		$orderColId = $this->request->getVar('order')[0]['column'];
		$orderType = $this->request->getVar('order')[0]['dir'];
		$orderCol = $this->request->getVar('columns')[$orderColId]['data'];
		$test = $model->listData($orderCol, $orderType, $perpage, $page);

		//$model->join('users', 'users.id = orders.order_cus', 'left');

		if ($search) {
			$list = [
				'order_code' => $search,
				'order_date' => $search,
			];
			$count = $model->groupStart()->orLike($list)->groupEnd()->countAllResults(false);
			$data['data'] = $model->paginate($perpage, 'gr1', $page);
		} else {
			$count = $model->countAllResults(false);
			$data['data'] = $model->paginate($perpage, 'gr1', $page);
		}
		$data['data'] = $test;
		$data['recordsFiltered'] = $count;
		$data['draw'] = $draw;
		$data['recordsTotal'] = count($data['data']);

		echo json_encode($data);

	}

	public function loadstatus()
	{

		$a = ['value' => 'New', 'text' => 'New'];
		$b = ['value' => 'Receive', 'text' => 'Receive'];
		$c = ['value' => 'Transport', 'text' => 'Transport'];
		$d = ['value' => 'Done', 'text' => 'Done'];
		$data[] = $a;
		$data[] = $b;
		$data[] = $c;
		$data[] = $d;

		echo json_encode($data);

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


	public function update()
	{
		$orderMD = new OrdersModel();
		$orderDetailMD = new OrdersDetailModel();
		$customerMD = new CustomerModel();
		$id = $this->request->getPost('pk');
		$value = $this->request->getPost('value');
		$data = [
			'order_status' => $value,
		];
		$orderMD->update($id, $data);
		echo json_encode(1);

	}

	public function delete()
	{
		$model = new OrdersModel();
		$id = $this->request->getPost('id');
		$model->delete($id);
		echo json_encode(1);
	}
	//--------------------------------------------------------------------

}
