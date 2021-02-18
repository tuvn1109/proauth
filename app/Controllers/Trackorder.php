<?php namespace App\Controllers;


use App\Models\CategoryModel;
use App\Models\OrdersDetailModel;
use App\Models\OrdersModel;

class Trackorder extends BaseController
{
	public function index()
	{
		$modelCategory = new CategoryModel();
		$data['temp'] = 'trackorder/index';
		$data['title'] = 'Track Order';
		$data['menu'] = $modelCategory->where('parent', '0')->findAll();
		$data['menuactive'] = 'trackorder';
		echo view('layout_product', $data);

	}


	public function track()
	{
		$order = new OrdersModel();
		$details = new OrdersDetailModel();
		$code = $this->request->getPost('code');
		$email = $this->request->getPost('email');
		$info = $order->info(['order_code' => $code,'email' => $email]);

		if ($info) {
			$data['stt'] = true;
			$data['info'] = $info;
			$data['details'] = $details->listData($info['order_id']);

		} else {
			$data['stt'] = false;
		}

		echo json_encode($data);

	}

	//--------------------------------------------------------------------

}
