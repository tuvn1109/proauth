<?php namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\OrdersModel;
use App\Models\PageModel;
use App\Models\UsersModel;

class Account extends BaseController
{
	public function index()
	{
		$modelUser = new UsersModel();
		$modelCategory = new CategoryModel();
		$ssUser = session('user');

		$info = $modelUser->find($ssUser['id']);


		$data['temp'] = 'account/index';
		$data['menu'] = $modelCategory->where('parent', '0')->findAll();;
		$data['menuactive'] = 'none';
		$data['title'] = 'Account information';
		$data['user'] = $info;
		echo view('layout_product', $data);

	}


	public function order()
	{
		$modelUser = new UsersModel();
		$modelCategory = new CategoryModel();
		$modelOrder = new OrdersModel();
		$ssUser = session('user');


		$test = $modelOrder->listDataWhere('order_cus', $ssUser['id']);
		$data['temp'] = 'account/order/index';
		$data['menu'] = $modelCategory->where('parent', '0')->findAll();;
		$data['menuactive'] = 'none';
		$data['list'] = $test;
		$data['title'] = 'Account information';

		echo view('layout_product', $data);

	}


	public function changepass()
	{
		$modelUser = new UsersModel();
		$id = $this->request->getPost('id');
		$current = $this->request->getPost('currentpassword');
		$newpassword = $this->request->getPost('newpassword');
		$confirm = $this->request->getPost('confirm');

		$return = [
			'code' => 'fetch_user_pass',
			'msg' => 'Success',
			'stt' => true,
		];


		// check current
		$check = $modelUser->currentpass($id, $current);
		if ($check) {
			if ($newpassword == $confirm) {
				$data = [
					'password' => $confirm,
				];

				$modelUser->update($id, $data);
				$return['msg'] = 'Password update successfully';

			} else {
				$return['stt'] = false;
				$return['msg'] = 'Password confirmation is incorrect';
			}
		} else {
			$return['stt'] = false;
			$return['msg'] = 'Current password is incorrect';
		}


		echo json_encode($return);
	}

	public function update()
	{
		$model = new UsersModel();
		$fullname = $this->request->getPost('fullname');
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$email = $this->request->getPost('email');
		$phone = $this->request->getPost('phone');
		$country = $this->request->getPost('country');
		$city = $this->request->getPost('city');
		$postalcode = $this->request->getPost('postalcode');
		$address = $this->request->getPost('address');
		$gender = $this->request->getPost('gender');
		$id = $this->request->getPost('id');

		if ($id) {
			$data = [
				'fullname' => $fullname,
				'username' => $email,
				//'password' => $password,
				'email' => $email,
				'phone' => $phone,
				'country' => $country,
				'city' => $city,
				'postalcode' => $postalcode,
				'address' => $address,
				'gender' => $gender,
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
