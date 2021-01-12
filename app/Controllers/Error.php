<?php namespace App\Controllers;

class Error extends BaseController
{
	public function index()
	{
		echo view('error404');

	}

}
