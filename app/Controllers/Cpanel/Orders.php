<?php

namespace App\Controllers\Cpanel;

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

	public function insert()
	{
		helper('filesystem');
		$orderMD = new OrdersModel();
		$orderDetailMD = new OrdersDetailModel();
		$customerMD = new CustomerModel();
		$userModel = new UsersModel();
		$fullname = $this->request->getPost('fullname');
		$phone = $this->request->getPost('phone');
		$email = $this->request->getPost('email');
		$country = $this->request->getPost('country');
		$city = $this->request->getPost('city');
		$postalcode = $this->request->getPost('postalcode');
		$ship = $this->request->getPost('shipping_method');
		$address = $this->request->getPost('address');


		$test = session('cart');


		$dataCus = [
			'fullname' => $fullname,
			'phone' => $phone,
			'email' => $email,
			'country' => $country,
			'city' => $city,
			'postalcode' => $postalcode,
			'address' => $address,
		];
		//$idCustom = $customerMD->insert($dataCus);

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
		$idCustom = $userModel->insert($dataCus);

		$dataOrder = [
			'order_cus' => $idCustom,
			'order_status' => 'New',
			'order_code' => $idCustom . date('Ymd') . date('is'),
			'order_date' => date('Y-m-d H:i:s'),
			'order_shipping' => $ship,
			//'order_date' => date(),
		];
		$idOrder = $orderMD->insert($dataOrder);

		$listCart = session('cart');
		$total = 0;
		foreach ($listCart as $val):
			if ($val['sale'] == 'yes') {
				$price = $val['price_sale'];
			} else {
				$price = $val['price'];
			}

			$image_parts = explode(";base64,", $val['front']);
			$image_type_aux = explode("image/", $image_parts[0]);
			$image_type = $image_type_aux[1];
			$image_baseFront = base64_decode($image_parts[1]);
			$fileFront = WRITEPATH . '/uploads/order/' . $idOrder . '/front.' . $image_type;
			$pathFront = '/order/' . $idOrder . '/front.' . $image_type;

			$image_parts = explode(";base64,", $val['back']);
			$image_type_aux = explode("image/", $image_parts[0]);
			$image_type = $image_type_aux[1];
			$image_baseBack = base64_decode($image_parts[1]);

			$fileBack = WRITEPATH . '/uploads/order/' . $idOrder . '/back.' . $image_type;
			$pathBack = '/order/' . $idOrder . '/back.' . $image_type;

			if (!is_dir(WRITEPATH . 'uploads/order/' . $idOrder)) {
				mkdir(WRITEPATH . 'uploads/order/' . $idOrder, 0777, TRUE);
				file_put_contents($fileFront, $image_baseFront);
				file_put_contents($fileBack, $image_baseBack);

			}


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
			$idOrder = $orderDetailMD->insert($dataOrderDetail);

		endforeach;

		$upTotalPrice = [
			'order_price' => $total,
		];
		$orderMD->update($idOrder, $upTotalPrice);


		echo json_encode(1);
	}


	public function update()
	{
		$orderMD = new OrdersModel();
		$orderDetailMD = new OrdersDetailModel();
		$customerMD = new CustomerModel();
		$id = $this->request->getPost('id');

		$orderMD->join('customers', 'customers.customer_id = orders.order_cus', 'left');
		$infoOD = $orderMD->find($id);

		$details = $orderDetailMD->where('order_id', $id)->findAll();

		$data['infoOD'] = $infoOD;
		$data['details'] = $details;
		echo json_encode($data);

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
