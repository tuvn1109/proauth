<?php namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductFeelbackModel;
use App\Models\ProductModel;
use App\Models\SettingsModel;
use App\Models\SubscribesModel;
use App\Models\UsersModel;

class Home extends BaseController
{
	public function index()
	{
		helper(['filesystem', 'cookie']);
		$modelProduct = new ProductModel();
		$modelSetting = new SettingsModel();
		$modelCategory = new CategoryModel();
		$modelUser = new UsersModel();
		$modelFeelback = new ProductFeelbackModel();
		$settings = $modelSetting->where('type', 'homepage')->findAll();
		$settings = array_column($settings, 'value', 'filed');
		$menu = $modelCategory->where('parent', '0')->findAll();

		$banner = $modelSetting->where('type', 'bannerads')->findAll();
		$banner = array_column($banner, 'value', 'filed');
		$sectionCateType1 = $modelCategory->whereIn('id', json_decode($settings['section_category1_type']))->orderBy('id', 'DESC')->findAll('2', 0);
		$sectionCateType2 = $modelCategory->whereIn('id', json_decode($settings['section_category2_type']))->orderBy('id', 'DESC')->findAll('2', 0);

		//$bestSellTshirt = $modelProduct->join('categories', 'categories.id = products.type', 'left')->where('bestselling', 'yes')->whereIn('type', [4, 5])->findAll('2', 0);
		//$bestSellMug = $modelProduct->join('categories', 'categories.id = products.type', 'left')->where('bestselling', 'yes')->where('type', '2')->findAll('3', 0);
		//$bestSellCase = $modelProduct->join('categories', 'categories.id = products.type', 'left')->where('bestselling', 'yes')->where('type', '3')->findAll('2', 0);
		//$sectionCate1 = $modelProduct->join('categories', 'categories.id = products.type', 'left')->where('type', json_decode($settings['section_category1_type'], true)[0])->findAll($settings['section_category1_limit'], 0);
		//$sectionCate2 = $modelProduct->join('categories', 'categories.id = products.type', 'left')->where('type', json_decode($settings['section_category2_type'], true)[0])->findAll($settings['section_category2_limit'], 0);
		$accessories = $modelProduct->where('type', json_decode($settings['section_category2_type'])[0])->orderBy('created_at', 'DESC')->findAll($settings['section_category2_limit'], 0);

		$sectionCate1 = $modelProduct->getListByType(json_decode($settings['section_category1_type'], true)[0], 10);
		$sectionCate2 = $modelProduct->getListByType(json_decode($settings['section_category2_type'], true)[0], 10);


		$bestSellTshirt = $modelProduct->getBestSelling(4, 2);
		$bestSellMug = $modelProduct->getBestSelling(2, 3);
		$bestSellCase = $modelProduct->getBestSelling(3, 3);

		$feelback = $modelFeelback->getListAll(0, 0, ['onsite' => 'yes']);

		// INFO USER
		//$infoUser =

		if (get_cookie('favourite')) {
			$data['arrFavourite'] = explode(',', get_cookie('favourite'));

		} else {
			$data['arrFavourite'] = [];

		}
		$data['test'] = json_decode($settings['section_category1_type'], true);
		$data['temp'] = 'home/index';
		$data['title'] = 'Home';
		$data['cart'] = session('cart');
		$data['user'] = session('user');
		$data['menu'] = $menu;
		$data['besttshirt'] = $bestSellTshirt;
		$data['bestmug'] = $bestSellMug;
		$data['bestcase'] = $bestSellCase;
		$data['feelback'] = $feelback;
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


		$count = explode(',', $cookie);

		echo json_encode(count($arrCC));
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
		//$data = $modelProduct->where('type', $idtype)->findAll('10', 0);
		$data = $modelProduct->getListByType($idtype, 10);
		echo json_encode($data);
	}

	public function about()
	{
		$data['temp'] = 'about';
		$data['title'] = 'About Us';
		echo view('layout', $data);

	}


	public function subscribes()
	{
		$model = new SubscribesModel();
		$email = $this->request->getPost('email');

		$check = $model->where('email', $email)->first();
		if (!$check) {
			$data = [
				'email' => $email,
			];
			$model->insert($data);
		}
		echo json_encode(1);

	}


	public function photofeelback()
	{
		helper(['filesystem', 'cookie']);

		$model = new SubscribesModel();
		$modelFeelback = new ProductFeelbackModel();

		$email = $this->request->getPost('email');
		$feelback = $modelFeelback->getListAll(0, 0, ['onsite' => 'yes'], 'product_feelback.product_id');

		$arrPT = [];
		foreach ($feelback as $feelback1):
			$idPro = $feelback1['product_id'];
			$photoRV = directory_map(WRITEPATH . 'uploads/product/' . $idPro . '/review/', FALSE, TRUE);

			foreach ($photoRV as $key => $val) {
				$rep = substr($key, 0, -1);

				foreach ($val as $key2 => $val2) {
					$key2 = substr($key2, 0, -1);
					$arrPT[$rep][$key2] = $val2;
				}
			}

		endforeach;
		echo "<pre>";
		print_r($arrPT);
		echo "</pre>";

		exit;


		echo json_encode(1);

	}

	//--------------------------------------------------------------------

}