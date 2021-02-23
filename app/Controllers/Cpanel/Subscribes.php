<?php

namespace App\Controllers\Cpanel;

use App\Models\ColorModel;
use App\Models\ProductFeelbackModel;
use App\Models\SubscribesModel;

class Subscribes extends CpanelController
{
	public function index()
	{
		$data['temp'] = 'cpanel/subscribes/index';
		$data['title'] = 'Subscribes';
		$data['menu'] = 'subscribes';
		echo view('cpanel/layout', $data);
	}


	public function loaddata()
	{
		$model = new SubscribesModel();
		// data
		$page = $this->request->getGet('page');
		$draw = $this->request->getGet('draw');
		$perpage = $this->request->getGet('length');
		$search = $this->request->getGet('search[value]');
		$orderColId = $this->request->getVar('order')[0]['column'];
		$orderType = $this->request->getVar('order')[0]['dir'];
		$orderCol = $this->request->getVar('columns')[$orderColId]['data'];
		if ($search) {
			$list = [
				'value' => $search,
			];
			$count = $model->groupStart()->orLike($list)->groupEnd()->countAllResults(false);
			$data['data'] = $model->paginate($perpage, 'gr1', $page);
		} else {
			$count = $model->countAllResults(false);
			$data['data'] = $model->paginate($perpage, 'gr1', $page);
		}
		$dataList = $model->findAll();
		$data['recordsFiltered'] = $model->countAllResults(false);
		$data['draw'] = $draw;
		$data['recordsTotal'] = count($data['data']);


		echo json_encode($data);

		exit;
		$model->orderBy($orderCol, $orderType);

		if ($search) {
			$list = [
				'value' => $search,
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
		$model = new SubscribesModel();
		$id = $this->request->getPost('id');
		$model->delete($id);
		echo json_encode(1);
	}
	//--------------------------------------------------------------------

}
