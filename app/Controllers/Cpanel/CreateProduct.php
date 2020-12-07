<?php

namespace App\Controllers\Cpanel;

use App\Models\ProtypeModel;
use App\Models\PropertiesModel;
use App\Models\PropertiesDetailModel;
class CreateProduct extends CpanelController
{
	public function index()
	{
		$modelProperties = new PropertiesModel();
		$data['temp'] = 'cpanel/product/create/index';
		$data['title'] = 'Create product';
		$data['menu'] = 'createpro';
		$data['listProperties'] = $modelProperties->findAll();
		echo view('cpanel/layout', $data);
	}


	public function loaddetail(){
		$modelPropertiesDetail = new PropertiesDetailModel();
		$id = $this->request->getPost('id');
		$listDetail = $modelPropertiesDetail->where('properties_id', $id)->findAll();
		echo \json_encode($listDetail);
	}




	public function loaddata()
	{
		$model = new ProtypeModel();
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
		$value = $this->request->getPost('value');
		$model = new ProtypeModel();
		$data = [
			'value' => $value,
		];
		$id = $model->insert($data);

		echo json_encode($id);
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
