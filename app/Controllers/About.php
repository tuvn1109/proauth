<?php namespace App\Controllers;

class About extends BaseController
{
	public function index()
	{
		$data['temp'] = 'about';
		$data['title'] = 'About Us';
		echo view('layout', $data);

	}

	//--------------------------------------------------------------------

}
