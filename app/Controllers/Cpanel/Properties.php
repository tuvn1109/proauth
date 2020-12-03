<?php

namespace App\Controllers\Cpanel;

use App\Models\PropertiesDetail;
use App\Models\PropertiesModel;
use App\Models\ProtypeModel;

class Properties extends CpanelController
{
	public function index()
	{
		$data['temp'] = 'cpanel/properties/index';
		$data['title'] = 'Properties';
		$data['menu'] = 'properties';
		echo view('cpanel/layout', $data);
	}


	public function loaddata()
	{
		$model = new PropertiesModel();
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
				'Value' => $search,
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
		$modelProperties = new PropertiesModel();
		$modelProDetail = new PropertiesDetail();
		$files = $this->request->getFiles();
		$name = $this->request->getPost('value');

		$data = [
			'name' => $name,
		];
		$id = $modelProperties->insert($data);


		if ($files) {
			foreach ($files['fileUpload'] as $img) {

				if ($img->isValid() && !$img->hasMoved()) {
					//$newName = $img->getRandomName();
					if (!is_dir(WRITEPATH . 'uploads/properties' . $id)) {
						mkdir(WRITEPATH . 'uploads/properties' . $id, 0777, TRUE);
					}

					$img->move(WRITEPATH . 'uploads/properties' . $id);
					$detail = [
						'properties_id' => $id,
						'value' => WRITEPATH . 'uploads/properties' . $id . '/' . $img->getName(),
					];
					$modelProDetail->insert($detail);
				}
			}
		}

	}


	public function edit()
	{
		$model = new ProtypeModel();
		$value = $this->request->getPost('value');
		$id = $this->request->getPost('id');
		$data = [
			'value' => $value,
		];
		$model->update($id, $data);

		echo json_encode($id);
	}

	public function delete()
	{
		$model = new ProtypeModel();
		$id = $this->request->getPost('id');
		$model->delete($id);
		echo json_encode(1);
	}
	//--------------------------------------------------------------------

}
