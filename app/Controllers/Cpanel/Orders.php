<?php

namespace App\Controllers\Cpanel;

use App\Models\CustomerModel;
use App\Models\OrdersDetailModel;
use App\Models\OrdersModel;

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
		$model->orderBy($orderCol, $orderType);

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

		$data['recordsFiltered'] = $count;
		$data['draw'] = $draw;
		$data['recordsTotal'] = count($data['data']);

		echo json_encode($data);

	}

	public function insert()
	{
		$orderMD = new OrdersModel();
		$orderDetailMD = new OrdersDetailModel();
		$customerMD = new CustomerModel();
		$fullname = $this->request->getPost('fullname');
		$phone = $this->request->getPost('phone');
		$email = $this->request->getPost('email');
		$country = $this->request->getPost('country');
		$city = $this->request->getPost('city');
		$postalcode = $this->request->getPost('postalcode');
		$address = $this->request->getPost('address');

		$dataCus = [
			'fullname' => $fullname,
			'phone' => $phone,
			'email' => $email,
			'country' => $country,
			'city' => $city,
			'postalcode' => $postalcode,
			'address' => $address,
		];
		$idCustom = $customerMD->insert($dataCus);


		$dataOrder = [
			'order_cus' => $idCustom,
			'order_status' => 'New',
			'order_code' => $idCustom.date('Ymd').date('is'),
			'order_date' => date('Y-m-d H:i:s'),
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
			$total += $price;
			$dataOrderDetail = [
				'order_id' => $idOrder,
				'order_detail_size' => $val['size_od'],
				'order_detail_color' => $val['color_od'],
				'order_detail_price' => $price,
				'product_id' => $val['id'],
			];
			$idOrder = $orderDetailMD->insert($dataOrderDetail);

		endforeach;

		echo "<pre>";
		print_r($listCart);
		echo "</pre>";


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
