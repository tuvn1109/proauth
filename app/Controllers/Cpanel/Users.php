<?php namespace App\Controllers\Cpanel;

use App\Models\UsersModel;

class Users extends CpanelController
{
	public function index()
	{
		$data['title'] = 'List user';
		$data['temp'] = 'cpanel/users';
		echo view('cpanel/layout', $data);
	}


	public function loaddata()
	{
		$model = new UsersModel();

		// data
		$page = $this->request->getGet('pagination[page]');
		$perpage = $this->request->getGet('pagination[perpage]');
		$search = $this->request->getGet('query[0]');

		if ($search) {
			$list = [
				'username' => $search,
				'email' => $search,
				'name' => $search,
				'fullname' => $search,
				'phone' => $search,
			];
			$count = $model->groupStart()->orLike($list)->groupEnd()->countAllResults(false);
			$listUser = $model->paginate($perpage, 'gr1', $page);
		} else {
			$count = $model->countAllResults(false);
			$listUser = $model->paginate($perpage, 'gr1', $page);
		}


		$pages = number_format($count / $perpage);
		if ($pages < 1) {
			$pages = 1;
		}

		$Arr = [];

		$stt = 0;
		foreach ($listUser as $listUser1):
			$stt++;
			$Arr['data'][] = [
				"#" => $listUser1['Id'],
				"Họ tên" => $listUser1['fullname'],
				"SĐT" => $listUser1['phone'],
				"Email" => $listUser1['email'],
				"Tài khoản" => $listUser1['username'],
				"Mật khẩu" => $listUser1['password'],
				"Action" => '<span style="overflow: visible; position: relative; width: 125px;"><a href="/users/edit/' . $listUser1['Id'] . '" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">	                            <span class="svg-icon svg-icon-md">	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">	                                        <rect x="0" y="0" width="24" height="24"></rect>	                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>	                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>	                                    </g>	                                </svg>	                            </span>							</a><a href="javascript:;" onclick="deleteuser(' . $listUser1['Id'] . ')" class="btn btn-sm btn-clean btn-icon" title="Delete">	                            <span class="svg-icon svg-icon-md">	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">	                                        <rect x="0" y="0" width="24" height="24"></rect>	                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>	                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>	                                    </g>	                                </svg>	                            </span>							</a>						</span>',
			];
		endforeach;
		$Arr['meta'] = [
			"page" => $page,
			"pages" => $pages,
			"perpage" => $perpage,
			"total" => $count,
			"sort" => "desc",
			"field" => "#",
		];


		echo json_encode($Arr);
	}

	public function edit()
	{
		$model = new UsersModel();
		$uri = current_url(true);
		$id = $uri->getSegment(3);
		$user = $model->find($id);
		$helper = helper('filesystem');
		$files = directory_map(WRITEPATH . 'uploads/user' . $id . '/');
		$user['id'] = $id;
		$data['temp'] = 'edit';
		$data['data'] = $user;
		$data['files'] = $files;
		echo view('layout', $data);

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
		$id = $this->request->getPost('id');
	}

	public function submitedit()
	{
		$model = new UsersModel();
		$fullname = $this->request->getPost('fullname');
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$email = $this->request->getPost('email');
		$phone = $this->request->getPost('phone');
		$id = $this->request->getPost('id');

		$data = [
			'fullname' => $fullname,
			'username' => $username,
			'password' => $password,
			'email' => $email,
			'phone' => $phone,
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

	}
	//--------------------------------------------------------------------

}
