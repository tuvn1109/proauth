<?php

namespace App\Controllers\Cpanel;

use App\Models\OrdersModel;
use App\Models\SubscribesModel;

class Home extends CpanelController
{
	public function index()
	{
		//return redirect()->to('/');
		$data['temp'] = 'cpanel/home/index';
		$data['title'] = 'Home';
		$data['menu'] = 'home';
		$user = session('user');

		if (isset($user) and $user['role'] == 'admin') {
			echo view('cpanel/layout', $data);
		} else {
			return redirect()->to('/error');
		}

	}

	public function charthome()
	{
		$subModel = new SubscribesModel();
		$orderModel = new OrdersModel();


		$today = date('Y-m-d');
		for ($i = 0; $i <= 6; $i++) {
			$date = date("Y-m-d", strtotime("-" . $i . " day", strtotime($today)));
			$order = $orderModel->listWhere(['date(order_date)' => $date]);
			$sub = $subModel->listWhere(['date(created_at)' => $date]);
			$totalMoney = array_column($order, 'order_price');

			$arrOD[$date]['totalOD'] = count($order);
			$arrOD[$date]['revenueOD'] = array_sum($totalMoney);
			$arrOD[$date]['totalSub'] = count($sub);


		}

		echo json_encode($arrOD);

	}

	//--------------------------------------------------------------------

}
