<?php

namespace App\Controllers\Cpanel;

use App\Models\CategoryModel;

class Category extends CpanelController
{
	public function index()
	{
		$data['temp'] = 'cpanel/category/index';
		$data['title'] = 'Product type';
		$data['menu'] = 'category';
		echo view('cpanel/layout', $data);
	}


	public function loaddata()
	{
		$model = new CategoryModel();
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
		helper('comment');
		$value = $this->request->getPost('value');
		$icon = $this->request->getFile('iconcate');
		$model = new CategoryModel();
		$data = [
			'value' => $value,
			'slug' => create_slug($value),
			'icon' => '',
		];
		$id = $model->insert($data);


		if ($icon->isValid() && !$icon->hasMoved()) {
			//$newName = $img->getRandomName();
			if (!is_dir(WRITEPATH . 'uploads/category/' . $id)) {
				mkdir(WRITEPATH . 'uploads/category/' . $id, 0777, TRUE);
			}
			$icon->move(WRITEPATH . 'uploads/category/' . $id);

			$link = 'category/' . $id . '/' . $icon->getName();
			$dataIcon = [
				'icon' => $link,
			];
			$model->update($id, $dataIcon);
		}


		echo json_encode($id);
	}


	public function edit()
	{
		helper('filesystem');
		$value = $this->request->getPost('value');
		$icon = $this->request->getFile('iconcate');
		$model = new CategoryModel();
		$id = $this->request->getPost('id');

		$link = '';

		if ($icon->isValid() && !$icon->hasMoved()) {
			delete_files(WRITEPATH . 'uploads/category/' . $id);
			if (!is_dir(WRITEPATH . 'uploads/category/' . $id)) {
				mkdir(WRITEPATH . 'uploads/category/' . $id, 0777, TRUE);
			}
			$icon->move(WRITEPATH . 'uploads/category/' . $id);
			$link = 'category/' . $id . '/' . $icon->getName();
		}
		$data = [
			'value' => $value,
			'icon' => $link,
		];
		$model->update($id, $data);

		echo json_encode($id);
	}

	public function delete()
	{
		helper('filesystem');
		$model = new CategoryModel();
		$id = $this->request->getPost('id');
		delete_files(WRITEPATH . 'uploads/category/' . $id);
		//unlink(WRITEPATH . 'uploads/category/' . $id);
		$model->delete($id);
		echo json_encode(1);
	}
	//--------------------------------------------------------------------

}
