<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['temp'] = 'home/index';
		$data['title'] = 'Home';
		$data['user'] = session('user');
		echo view('layout', $data);

	}

	public function about()
	{
		$data['temp'] = 'about';
		$data['title'] = 'About Us';
		echo view('layout', $data);

	}

	//--------------------------------------------------------------------

}
