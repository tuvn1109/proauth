<?php namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\PageModel;
use App\Models\ProductModel;

class Search extends BaseController
{
	public function index()
	{
		helper(['cookie']);

		$modelPro = new ProductModel();
		$modelCategory = new CategoryModel();
		$page = $this->request->getGet('page');
		$textS = $this->request->getGet('texts');
		if ($textS) {
			$list = $modelPro->getListSearch($textS, $page, 10);
			$count = $modelPro->countAll();
			$data['list'] = $list;

		}
		$data['user'] = session('user');
		$data['temp'] = 'search/index';
		$data['menu'] = $modelCategory->where('parent', '0')->findAll();;
		$data['menuactive'] = 'none';
		$data['title'] = 'Search';
		$data['textSearch'] = $textS;
		$data['arrFavourite'] = explode(',', get_cookie('favourite'));

		echo view('layout', $data);

	}

	public function search($slug)
	{
		helper(['cookie']);

		$modelPro = new ProductModel();
		$modelCategory = new CategoryModel();
		$page = $this->request->getGet('page');
		$textS = $this->request->getGet('search');

		$list = $modelPro->getListSearch($slug, 2, 10);

		$data['temp'] = 'search/index';
		$data['title'] = 'Search';
		$data['menu'] = $modelCategory->where('parent', '0')->findAll();
		$data['menuactive'] = 'none';
		$data['list'] = $list;
		$data['textSearch'] = $slug;
		$data['arrFavourite'] = explode(',', get_cookie('favourite'));

		echo view('layout', $data);

	}

	//--------------------------------------------------------------------

}
