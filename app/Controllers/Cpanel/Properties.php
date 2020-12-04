<?php

namespace App\Controllers\Cpanel;

use App\Models\PropertiesDetailModel;
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

	public function image()
	{
		$path = $this->request->getVar('name');
		$filepath = $checkpath = WRITEPATH . 'uploads/' . $path;
		if (!file_exists($checkpath)) {
			$filepath = WRITEPATH . 'uploads/default/img-not-found.png';
		}
		if (!is_readable($checkpath)) {
			$filepath = WRITEPATH . 'uploads/default/img-not-found.png';
		}
		http_response_code(200);
		header('Content-Length: ' . filesize($filepath));
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$fileinfo = pathinfo($filepath);
		header('Content-Type: ' . finfo_file($finfo, $filepath));
		finfo_close($finfo);
		header('Content-Disposition: attachment; filename="' . basename($fileinfo['basename']) . '"'); // feel free to change the suggested filename
		ob_clean();
		flush();
		readfile($filepath);
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
		$modelProDetail = new PropertiesDetailModel();
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
		$modelProperties = new PropertiesModel();
		$modelProDetail = new PropertiesDetailModel();
		$uri = current_url(true);
		$id = $uri->getSegment(4);
		$properties = $modelProperties->find($id);
		$detail = $modelProDetail->where('properties_id', $id)->findAll();

		$data['temp'] = 'cpanel/properties/edit';
		$data['title'] = 'Properties edit';
		$data['menu'] = 'properties';
		$data['info'] = $properties;
		$data['detail'] = $detail;
		echo view('cpanel/layout', $data);
	}

	public function edit2()
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
		$modelProperties = new PropertiesModel();
		$modelProDetail = new PropertiesDetailModel();
		$id = $this->request->getPost('id');
		$modelProperties->delete($id);
		$modelProDetail->where('properties_id', $id)->delete();


		echo json_encode(1);
	}
	//--------------------------------------------------------------------

}
