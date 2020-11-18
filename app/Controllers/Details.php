<?php namespace App\Controllers;

class Details extends BaseController
{
	public function index()
	{
		$data['temp'] = 'details';
		$data['title'] = 'Details';
		echo view('details', $data);

	}

	//--------------------------------------------------------------------

}
