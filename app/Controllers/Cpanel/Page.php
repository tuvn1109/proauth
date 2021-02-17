<?php

namespace App\Controllers\Cpanel;

use App\Models\CategoryModel;
use App\Models\EmailModel;
use App\Models\PageModel;
use App\Models\SettingsModel;

class Page extends CpanelController
{
	public function index()
	{

		$data['title'] = 'Page';
		$data['menu'] = 'page';
		$data['temp'] = 'cpanel/page/index';
		echo view('cpanel/layout', $data);
	}


	public function create()
	{
		$data['temp'] = 'cpanel/page/create/index';
		$data['title'] = 'Create Page';
		$data['menu'] = 'createpage';
		echo view('cpanel/layout', $data);
	}


	public function insert()
	{
		$model = new PageModel();
		$name = $this->request->getPost('name');
		$layout = $this->request->getPost('layout');
		$menu = $this->request->getPost('menu');
		$shows = $this->request->getPost('shows');
		$content = $this->request->getPost('content');

		$data = [
			'name' => $name,
			'layout' => $layout,
			'menu' => $menu,
			'shows' => $shows,
			'content' => $content,
		];

		$id = $model->insert($data);
		if ($id) {

			$return = [
				'code' => 'fetch_',
				'msg' => 'Success',
				'stt' => true,
				'data' => ['id' => $id]
			];

		} else {
			$return = [
				'code' => 'fetch_',
				'msg' => 'False',
				'stt' => false,
				'data' => []
			];
		}
		echo json_encode($return);
	}


	public function edit()
	{
		$modelPage = new PageModel();
		$uri = current_url(true);
		$id = $uri->getSegment(4);
		$info = $modelPage->find($id);

		$data['temp'] = 'cpanel/page/edit/index';
		$data['title'] = 'Page edit';
		$data['menu'] = 'page';
		$data['info'] = $info;
		echo view('cpanel/layout', $data);
	}


	public function update()
	{
		$model = new PageModel();
		$name = $this->request->getPost('name');
		$layout = $this->request->getPost('layout');
		$menu = $this->request->getPost('menu');
		$shows = $this->request->getPost('shows');
		$content = $this->request->getPost('content');
		$slug = $this->request->getPost('slug');
		$id = $this->request->getPost('id');

		$data = [
			'name' => $name,
			'layout' => $layout,
			'menu' => $menu,
			'shows' => $shows,
			'slug' => $slug,
			'content' => $content,
		];


		$id = $model->update($id, $data);
		if ($id) {

			$return = [
				'code' => 'fetch_',
				'msg' => 'Success',
				'stt' => true,
				'data' => ['id' => $id]
			];

		} else {
			$return = [
				'code' => 'fetch_',
				'msg' => 'False',
				'stt' => false,
				'data' => []
			];
		}
		echo json_encode($return);
	}


	public function loaddata()
	{
		$model = new PageModel();
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
				'title' => $search,
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
		$model = new PageModel();
		$id = $this->request->getPost('id');
		$model->delete($id);
		echo json_encode(1);
	}

}
