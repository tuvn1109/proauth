<?php

namespace App\Controllers\Cpanel;

class Home extends CpanelController
{
	public function index()
	{
		if (session('user')) {
			//return redirect()->to('/');
			$data['temp'] = 'cpanel/home';
			$data['title'] = 'Home';
			$data['user'] = session('user');
			echo view('cpanel/layout', $data);

		} else {
			echo view('auth/signin/index');
		}
	}

	//--------------------------------------------------------------------

}
