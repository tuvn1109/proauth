<?php namespace App\Controllers;

class Product extends BaseController
{
	public function index()
	{
		$data['temp'] = 'product/index';
		$data['title'] = 'CA';
		echo view('layout_product', $data);

	}

	//--------------------------------------------------------------------

}
