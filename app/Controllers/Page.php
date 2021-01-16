<?php namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\PageModel;

class Page extends BaseController
{
	public function index($slug)
	{
		helper(['filesystem', 'cookie']);
		$modelPage = new PageModel();
		$modelCategory = new CategoryModel();



		$info = $modelPage->getInfoBySlug($slug);


		$data['temp'] = 'page/index';
		$data['menu'] = $modelCategory->where('parent', '0')->findAll();;
		$data['menuactive'] = 'none';
		$data['title'] = $info['name'];
		$data['info'] = $info;
		echo view('layout_product', $data);

	}

	//--------------------------------------------------------------------

}
