<?php namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\SettingsModel;

class Category extends BaseController
{
	public function index($slug = 't-shirt')
	{
		helper(['filesystem', 'cookie']);
		$modelCategory = new CategoryModel();
		$modelProduct = new ProductModel();
		$modelSetting = new SettingsModel();
		$banner = $modelSetting->where('type', 'bannerads')->findAll();
		$banner = array_column($banner, 'value', 'filed');
		$page = $this->request->getGet('page');
		if (!$page) {
			$page = 1;
		}
		$id = $modelCategory->getIdBySlug($slug);
		$infoCate = $modelCategory->where('id', $id)->first();
		$listCate = $modelProduct->where('type', $id)->paginate(20, 'gr1', $page);
		$count = $modelProduct->where('type', $id)->countAllResults(false);


		$data['temp'] = 'category/index';
		$data['title'] = 'CA';
		$data['infoCate'] = $infoCate;
		$data['listCate'] = $listCate;
		$data['countListCate'] = $count;
		$data['banner'] = $banner;
		$data['arrFavourite'] = explode(',', get_cookie('favourite'));

		echo view('layout', $data);

	}

	public function product($slugcat, $slug)
	{
		$modelCategory = new CategoryModel();
		$modelProduct = new ProductModel();
		$id = $modelCategory->getIdBySlug($slugcat);
		$infoCate = $modelCategory->where('id', $id)->first();
		$data['temp'] = 'category/index';
		$data['title'] = 'CA';
		$data['infoCate'] = $infoCate;
		echo view('layout_product', $data);


	}


	//--------------------------------------------------------------------

}
