<?php

namespace App\Controllers\Cpanel;

use App\Models\ColorModel;
use App\Models\CouponModel;

class Coupon extends CpanelController
{
	public function index()
	{
		$data['temp'] = 'cpanel/coupon/index';
		$data['title'] = 'Coupon';
		$data['menu'] = 'coupon';
		echo view('cpanel/layout', $data);
	}


	public function loaddata()
	{
		$model = new CouponModel();
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
				'coupon' => $search,
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
		$code = $this->request->getPost('code');
		$date = $this->request->getPost('date');
		$discount = $this->request->getPost('discount');
		$model = new CouponModel();
		$data = [
			'code' => $code,
			'expiration_date' => $date,
			'discount' => $discount,
		];
		$id = $model->insert($data);

		echo json_encode($id);
	}


	public function edit()
	{
		$model = new CouponModel();
		$code = $this->request->getPost('code');
		$date = $this->request->getPost('date');
		$id = $this->request->getPost('id');
		$discount = $this->request->getPost('discount');

		$data = [
			'code' => $code,
			'expiration_date' => $date,
			'discount' => $discount,
		];
		$model->update($id, $data);

		echo json_encode($id);
	}


	public function usecoupon()
	{
		$model = new CouponModel();
		$coupon = $this->request->getPost('coupon');
		$amount = $this->request->getPost('amount');
		$info = $model->where('code', $coupon)->first();
		$cart = session('cart');

		$total = 0;


		$today = date('Y-m-d');
		if ($info) {
			if ($info['expiration_date'] >= $today) {
				foreach ($cart as $val):
					if ($val['sale'] == 'yes') {
						$price = $val['price_sale'];
					} else {
						$price = $val['price'];
					}
					$total += $price;
				endforeach;

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

	public function delete()
	{
		$model = new CouponModel();
		$id = $this->request->getPost('id');
		$model->delete($id);
		echo json_encode(1);
	}
	//--------------------------------------------------------------------

}
