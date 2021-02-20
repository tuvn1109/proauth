<?php

namespace App\Controllers\Cpanel;

class Home extends CpanelController
{
	public function index()
	{
		//return redirect()->to('/');
		$data['temp'] = 'cpanel/home/index';
		$data['title'] = 'Home';
		$data['menu'] = 'home';
		$user = session('user');

		if (isset($user) AND $user['role'] == 'admin') {
			echo view('cpanel/layout', $data);
		} else {
			return redirect()->to('/error');
		}

	}

	//--------------------------------------------------------------------

}
