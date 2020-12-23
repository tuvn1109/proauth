<?php

namespace App\Controllers\Cpanel;

use App\Models\ShippingMethodModel;
use App\Models\SizeModel;

class ShippingMethod extends CpanelController
{
	public function index()
	{
		$data['temp'] = 'cpanel/shippingmethod/index';
		$data['title'] = 'Shipping method';
		$data['menu'] = 'shippingmethod';
		echo view('cpanel/layout', $data);
	}


	public function loaddata()
	{
		$model = new ShippingMethodModel();
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
				'name' => $search,
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
		$model = new ShippingMethodModel();

		$name = $this->request->getPost('name');
		$price = $this->request->getPost('price');
		$data = [
			'name' => $name,
			'price' => $price,
		];
		$id = $model->insert($data);

		$logo = $this->request->getFile('inputfile');
		if ($logo->isValid() && !$logo->hasMoved()) {
			//$newName = $img->getRandomName();
			if (!is_dir(WRITEPATH . 'uploads/shippingmethod/' . $id)) {
				mkdir(WRITEPATH . 'uploads/shippingmethod/' . $id, 0777, TRUE);
			}

			$logo->move(WRITEPATH . 'uploads/shippingmethod/' . $id);

			$dataThumb = [
				'logo' => 'shippingmethod/' . $id . '/' . $logo->getName(),
			];
			$model->update($id, $dataThumb);
		}
		echo json_encode($id);
	}


	public function edit()
	{
		helper('filesystem');
		$model = new ShippingMethodModel();
		$name = $this->request->getPost('name');
		$price = $this->request->getPost('price');
		$id = $this->request->getPost('id');
		$logo = $this->request->getFile('inputfile');
		$info = $model->find($id);
		$link = $info['logo'];

		if ($logo->isValid() && !$logo->hasMoved()) {
			//$newName = $img->getRandomName();
			delete_files(WRITEPATH . 'uploads/shippingmethod/' . $id);
			if (!is_dir(WRITEPATH . 'uploads/shippingmethod/' . $id)) {
				mkdir(WRITEPATH . 'uploads/shippingmethod/' . $id, 0777, TRUE);
			}

			$logo->move(WRITEPATH . 'uploads/shippingmethod/' . $id);

			$link = 'shippingmethod/' . $id . '/' . $logo->getName();
		}
		$data = [
			'name' => $name,
			'price' => $price,
			'logo' => $link,
		];
		$model->update($id, $data);


		echo json_encode($id);
	}

	public function delete()
	{
		helper('filesystem');

		$model = new ShippingMethodModel();
		$id = $this->request->getPost('id');
		delete_files(WRITEPATH . 'uploads/shippingmethod/' . $id);
		$model->delete($id);
		echo json_encode(1);
	}
	//--------------------------------------------------------------------

}
