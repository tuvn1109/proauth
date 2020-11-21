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
			echo view('cpanel/layout', $data);
	}

	//--------------------------------------------------------------------

}
