<?php namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\PageModel;
use App\Models\UsersModel;

class User extends BaseController
{
	public function index()
	{
		$modelUser = new UsersModel();
		$modelCategory = new CategoryModel();
		//$info = $modelUser->getInfoBySlug();
		$ssUser = session('user');

		$data['temp'] = 'user/index';
		$data['menu'] = $modelCategory->where('parent', '0')->findAll();;
		$data['menuactive'] = 'none';
		$data['title'] = 'User';
		$data['user'] = $ssUser;
		echo view('layout_product', $data);

	}

	//--------------------------------------------------------------------

}
