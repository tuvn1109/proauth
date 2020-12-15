<?php namespace App\Controllers;

use App\Models\ProductModel;
class Home extends BaseController
{
	public function index()
	{
		helper('filesystem');
		$modelProduct = new ProductModel();

		$bestsell = $modelProduct->where('bestselling', 'yes')->findAll('8',0);
		$tshirt = $modelProduct->where('type', '1')->orderBy('created_at', 'DESC')->findAll('10',0);
		$accessories = $modelProduct->whereIn('type',[2,3])->orderBy('created_at', 'DESC')->findAll('10',0);

		$data['temp'] = 'home/index';
		$data['title'] = 'Home';
		$data['user'] = session('user');
		$data['bestsell'] = $bestsell;
		$data['tshirt'] = $tshirt;
		$data['accessories'] = $accessories;
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