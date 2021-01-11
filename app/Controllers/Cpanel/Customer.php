<?php namespace App\Controllers\Cpanel;

use App\Models\UsersModel;

class Customer extends CpanelController
{
	public function index()
	{
		$data['title'] = 'List user';
		$data['temp'] = 'cpanel/customer/index';
		$data['menu'] = 'customer';
		$data['user'] = session('user');
		echo view('cpanel/layout', $data);
	}


	public function loaddata()
	{
		$model = new UsersModel();

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
				'username' => $search,
				'email' => $search,
				'name' => $search,
				'fullname' => $search,
				'phone' => $search,
				'role' => $search,
				'status' => $search,
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
		$model = new UsersModel();
		$id = $this->request->getPost('id');
		$model->delete($id);
		echo json_encode(1);
	}

	//--------------------------------------------------------------------

}
