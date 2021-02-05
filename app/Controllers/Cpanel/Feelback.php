<?php

namespace App\Controllers\Cpanel;

use App\Models\ColorModel;
use App\Models\ProductFeelbackModel;

class Feelback extends CpanelController
{
	public function index()
	{
		$data['temp'] = 'cpanel/feelback/index';
		$data['title'] = 'Feelback';
		$data['menu'] = 'feelback';
		echo view('cpanel/layout', $data);
	}


	public function loaddata()
	{
		$model = new ProductFeelbackModel();
		// data
		$page = $this->request->getGet('page');
		$draw = $this->request->getGet('draw');
		$perpage = $this->request->getGet('length');
		$search = $this->request->getGet('search[value]');
		$orderColId = $this->request->getVar('order')[0]['column'];
		$orderType = $this->request->getVar('order')[0]['dir'];
		$orderCol = $this->request->getVar('columns')[$orderColId]['data'];
		if ($page == 1) {
			$page = 0;
		} elseif ($page > 1) {
			$page = ($page - 1) * $perpage;
		}
		$dataList = $model->getListAll(10, $page);
		$data['recordsFiltered'] = $model->countAllResults(false);
		$data['draw'] = $draw;
		$data['data'] = $dataList;
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

	public function insert()
	{
		$value = $this->request->getPost('value');
		$code = $this->request->getPost('code');
		$model = new ProductFeelbackModel();
		$data = [
			'value' => $value,
			'code' => $code,
		];
		$id = $model->insert($data);

		echo json_encode($id);
	}

	public function update()
	{
		$model = new ProductFeelbackModel();
		$id = $this->request->getPost('id');
		$onsite = $this->request->getPost('onsite');
		$dataInsert = [
			'onsite' => $onsite,
		];
		$model->update($id, $dataInsert);
		$return = [
			'code' => 'fetch_user_success',
			'msg' => 'Update success ',
			'stt' => true,
			'data' => []
		];
		echo json_encode($return);

	}


	public function delete()
	{
		$model = new ProductFeelbackModel();
		$id = $this->request->getPost('id');
		$model->delete($id);
		echo json_encode(1);
	}
	//--------------------------------------------------------------------

}
