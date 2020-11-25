<?php namespace App\Controllers;

class Category extends BaseController
{
	public function index()
	{
		$data['temp'] = 'category/index';
		$data['title'] = 'CA';
		echo view('layout', $data);

	}

	//--------------------------------------------------------------------

}
