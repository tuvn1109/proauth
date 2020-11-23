<?php

namespace App\Controllers\Cpanel;

use App\Models\OrdersModel;

class Orders extends CpanelController
{
	public function index()
	{
		$model = new OrdersModel();
		$status = $model->get_enum_values('orders','order_status');
		$pay = $model->get_enum_values('orders','order_payment');


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

	public function delete()
	{
		$model = new OrdersModel();
		$id = $this->request->getPost('id');
		$model->delete($id);
		echo json_encode(1);
	}
	//--------------------------------------------------------------------

}
