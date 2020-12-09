<?php

namespace App\Controllers\Cpanel;

use App\Models\ColorModel;

class Color extends CpanelController
{
	public function index()
	{
		$data['temp'] = 'cpanel/color/index';
		$data['title'] = 'Color';
		$data['menu'] = 'colors';
		echo view('cpanel/layout', $data);
	}


	public function loaddata()
	{
		$model = new ColorModel();
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
		$model = new ColorModel();
		$data = [
			'value' => $value,
			'code' => $code,
		];
		$id = $model->insert($data);

		echo json_encode($id);
	}


	public function edit()
	{
		$model = new ColorModel();
		$value = $this->request->getPost('value');
		$code = $this->request->getPost('code');
		$id = $this->request->getPost('id');
		$data = [
			'value' => $value,
			'code' => $code,
		];
		$model->update($id, $data);

		echo json_encode($id);
	}

	public function delete()
	{
		$model = new ColorModel();
		$id = $this->request->getPost('id');
		$model->delete($id);
		echo json_encode(1);
	}
	//--------------------------------------------------------------------

}
