<?php namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\SettingsModel;

class Home extends BaseController
{
	public function index()
	{
		helper('filesystem');
		$modelProduct = new ProductModel();
		$modelSetting = new SettingsModel();

		$settings = $modelSetting->where('type', 'homepage')->findAll();
		$settings = array_column($settings, 'value', 'filed');

		$banner = $modelSetting->where('type', 'bannerads')->findAll();
		$banner = array_column($banner, 'value', 'filed');

		$bestsell = $modelProduct->where('bestselling', 'yes')->findAll('8', 0);
		$tshirt = $modelProduct->where('type', '1')->orderBy('created_at', 'DESC')->findAll($settings['section_category1_limit'], 0);
		$accessories = $modelProduct->whereIn('type', [2, 3])->orderBy('created_at', 'DESC')->findAll($settings['section_category2_limit'], 0);

		$data['temp'] = 'home/index';
		$data['title'] = 'Home';
		$data['user'] = session('user');
		$data['bestsell'] = $bestsell;
		$data['tshirt'] = $tshirt;
		$data['accessories'] = $accessories;
		$data['setting'] = $settings;
		$data['banner'] = $banner;
		echo view('layout', $data);

	}

	public function loaddata()
	{
		$modelProduct = new ProductModel();
		$modelCategory = new CategoryModel();
		$value = $this->request->getPost('type');
		$idtype = $modelCategory->getId($value);
		$data = $modelProduct->where('type', $idtype)->findAll('10', 0);
		echo json_encode($data);
	}

	public function about()
	{
		$data['temp'] = 'about';
		$data['title'] = 'About Us';
		echo view('layout', $data);

	}

	//--------------------------------------------------------------------

}