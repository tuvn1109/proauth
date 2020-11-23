<?php namespace App\Controllers\Cpanel;

use App\Models\UsersModel;

class Users extends CpanelController
{
	public function index()
	{
		$data['title'] = 'List user';
		$data['temp'] = 'cpanel/users/index';
		$data['menu'] = 'users';
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

	public function edit()
	{
		$model = new UsersModel();
		$uri = current_url(true);
		$id = $uri->getSegment(4);
		$user = $model->find($id);
		$helper = helper('filesystem');
		$files = directory_map(WRITEPATH . 'uploads/user' . $id . '/');
		if ($user) {
			$user['id'] = $id;
		}
		$data['title'] = 'Edit user';
		$data['menu'] = 'users';
		$data['temp'] = 'cpanel/users/edit';
		$data['user'] = session('user');
		$data['data'] = $user;
		$data['files'] = $files;
		echo view('cpanel/layout', $data);

	}

	public function deleteFile()
	{
		$helper = helper('filesystem');
		$fileName = $this->request->getPost('filename');
		$id = $this->request->getPost('id');
		$path = (WRITEPATH . 'uploads\user' . $id . '/' . $fileName . '');
		$DEL = unlink($path);
		if ($DEL) {
			echo json_encode(1);
		}
	}

	public function deleteuser()
	{
		$model = new UsersModel();
		$id = $this->request->getPost('id');
		$model->delete($id);
		echo json_encode(1);
	}

	public function submitedit()
	{
		$model = new UsersModel();
		$fullname = $this->request->getPost('fullname');
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$email = $this->request->getPost('email');
		$phone = $this->request->getPost('phone');
		$role = $this->request->getPost('role');
		$status = $this->request->getPost('status');
		$id = $this->request->getPost('id');

		if ($id) {
			$data = [
				'fullname' => $fullname,
				'username' => $username,
				'password' => $password,
				'email' => $email,
				'phone' => $phone,
				'role' => $role,
				'status' => $status,
			];

			$model->update($id, $data);


			$files = $this->request->getFiles();

			if ($files) {
				foreach ($files['files'] as $img) {

					if ($img->isValid() && !$img->hasMoved()) {
						//$newName = $img->getRandomName();
						if (!is_dir('uploads/user' . $id)) {
							mkdir('./uploads/user' . $id, 0777, TRUE);
						}
						$img->move(WRITEPATH . 'uploads/user' . $id);

					}

				}
			}


			$JSON = [
				'stt' => true,
				'msg' => 'Update successful',
				'error' => 0,
			];
		} else {
			$JSON = [
				'stt' => false,
				'msg' => 'Error, please try again',
				'error' => 0,
			];
		}
		echo json_encode($JSON);
	}
	//--------------------------------------------------------------------

}
