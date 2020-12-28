<?php namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\SettingsModel;

class Home extends BaseController
{
	public function index()
	{
		helper(['filesystem', 'cookie']);
		$modelProduct = new ProductModel();
		$modelSetting = new SettingsModel();
		$modelCategory = new CategoryModel();
		$settings = $modelSetting->where('type', 'homepage')->findAll();
		$settings = array_column($settings, 'value', 'filed');

		$banner = $modelSetting->where('type', 'bannerads')->findAll();
		$banner = array_column($banner, 'value', 'filed');
		$sectionCateType1 = $modelCategory->whereIn('id', json_decode($settings['section_category1_type']))->orderBy('id', 'DESC')->findAll('2', 0);
		$sectionCateType2 = $modelCategory->whereIn('id', json_decode($settings['section_category2_type']))->orderBy('id', 'DESC')->findAll('2', 0);


		$bestSellTshirt = $modelProduct->where('bestselling', 'yes')->whereIn('type', [4, 5])->findAll('2', 0);
		$bestSellMug = $modelProduct->where('bestselling', 'yes')->where('type', '2')->findAll('3', 0);
		$bestSellCase = $modelProduct->where('bestselling', 'yes')->where('type', '3')->findAll('2', 0);
		$sectionCate1 = $modelProduct->join('categories', 'categories.id = products.type', 'left')->where('type', json_decode($settings['section_category1_type'], true)[0])->findAll($settings['section_category1_limit'], 0);

		echo "<pre>";
		print_r($sectionCate1);
		echo "</pre>";

exit;
		$sectionCate2 = $modelProduct->join('categories', 'categories.id = products.type', 'left')->where('type', json_decode($settings['section_category2_type'], true)[0])->findAll($settings['section_category2_limit'], 0);
		$accessories = $modelProduct->where('type', json_decode($settings['section_category2_type'])[0])->orderBy('created_at', 'DESC')->findAll($settings['section_category2_limit'], 0);

		$data['test'] = json_decode($settings['section_category1_type'], true);
		$data['arrFavourite'] = explode(',', get_cookie('favourite'));
		$data['temp'] = 'home/index';
		$data['title'] = 'Home';
		$data['user'] = session('user');
		$data['besttshirt'] = $bestSellTshirt;
		$data['bestmug'] = $bestSellMug;
		$data['bestcase'] = $bestSellCase;
		$data['sectionCate1'] = $sectionCate1;
		$data['sectionCate2'] = $sectionCate2;
		$data['sectionCateType1'] = $sectionCateType1;
		$data['sectionCateType2'] = $sectionCateType2;
		$data['setting'] = $settings;
		$data['banner'] = $banner;
		echo view('layout', $data);

	}

	public function favourite()
	{
		helper('cookie');
		$id = $this->request->getPost('id');
		$modelProduct = new ProductModel();
		$cookie = get_cookie('favourite');
		if (!$cookie) {
			$arrCC = [];
		} else {
			$arrCC = explode(',', $cookie);
		}

		if (!in_array($id, $arrCC)) {
			$arrCC[] = $id;
			$text = implode(',', $arrCC);
			set_cookie([
				'name' => 'favourite',
				'value' => $text,
				'expire' => 1000000,
				'httponly' => false
			]);
		} else {
			$pos = array_search($id, $arrCC);
			unset($arrCC[$pos]);
			$text = implode(',', $arrCC);
			set_cookie([
				'name' => 'favourite',
				'value' => $text,
				'expire' => 1000000,
				'httponly' => false
			]);

		}

		echo json_encode($cookie);
	}

	public function addcart()
	{
		helper('cookie');
		$id = $this->request->getPost('id');
		$modelProduct = new ProductModel();
		$cookie = get_cookie('cart');
		if (!$cookie) {
			$arrCC = [];
		} else {
			$arrCC = explode(',', $cookie);
		}

		if (!in_array($id, $arrCC)) {
			$arrCC[] = $id;
			$text = implode(',', $arrCC);
			set_cookie([
				'name' => 'cart',
				'value' => $text,
				'expire' => 1000000,
				'httponly' => false
			]);
		} else {
			$pos = array_search($id, $arrCC);
			unset($arrCC[$pos]);
			$text = implode(',', $arrCC);
			set_cookie([
				'name' => 'cart',
				'value' => $text,
				'expire' => 1000000,
				'httponly' => false
			]);

		}

		echo json_encode($cookie);
	}

	public function loaddata()
	{
		$modelProduct = new ProductModel();
		$modelCategory = new CategoryModel();
		$idtype = $this->request->getPost('type');
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