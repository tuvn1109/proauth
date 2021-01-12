<?php namespace App\Controllers;


use App\Models\PropertiesDetailModel;
use App\Models\PropertiesModel;
use App\Models\CategoryModel;
use App\Models\ColorModel;
use App\Models\SettingsModel;
use App\Models\SizeModel;
use App\Models\TagModel;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use App\Models\ProductColorModel;
use App\Models\ProductTagModel;

class Category extends BaseController
{
	public function index($slug)
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

		if ($id) {
			$infoCate = $modelCategory->where('id', $id)->first();
			$listCate = $modelProduct->join('categories', 'categories.id = products.type', 'left')->where('slug', $infoCate['slug'])->paginate(20, 'gr1', $page);
			$count = $modelProduct->where('type', $id)->countAllResults(false);
			$sort = $modelCategory->where('parent', $id)->findAll();
			$data['temp'] = 'category/index';
			$data['title'] = $infoCate['value'];
			$data['infoCate'] = $infoCate;
			$data['menu'] = $modelCategory->where('parent', '0')->findAll();
			$data['listCate'] = $listCate;
			$data['countListCate'] = $count;
			$data['banner'] = $banner;
			$data['sort'] = $sort;
			$data['cart'] = session('cart');
			$data['user'] = session('user');
			$data['arrFavourite'] = explode(',', get_cookie('favourite'));
			echo view('layout', $data);

		} else {
			$data['temp'] = 'error404';
			echo view('layout', $data);

		}

	}

	public function product($slugcat, $slug)
	{
		helper(['filesystem', 'cookie']);
		$modelCategory = new CategoryModel();
		$modelProduct = new ProductModel();
		$modelSetting = new SettingsModel();
		$banner = $modelSetting->where('type', 'bannerads')->findAll();
		$banner = array_column($banner, 'value', 'filed');
		$id = $modelCategory->getIdBySlug($slugcat)['id'];
		$idPro = $modelProduct->getIdBySlug($slug)['id'];
		$infoCate = $modelCategory->where('id', $id)->first();
		$infoPro = $modelProduct->where('id', $idPro)->first();
		$maybelike = $modelProduct->join('categories', 'categories.id = products.type', 'left')->where('type', $id)->findAll(6, 0);

		$cateImage = directory_map('./images-pro');


		if ($infoCate && $infoPro) {
			$modelProduct = new ProductModel();
			$modelProductSize = new ProductSizeModel();
			$modelProductColor = new ProductColorModel();
			$modelCategory = new CategoryModel();
			$modelColor = new ColorModel();
			$modelSize = new SizeModel();
			$uri = current_url(true);

			//$id = $uri->getSegment(3);
			$product = $modelProduct->find($idPro);
			$sizes = $modelProductSize->join('sizes', 'sizes.id = product_size.size_id', 'left')->where('product_id', $idPro)->findAll();

			$db = \Config\Database::connect();
			$builder = $db->table('product_color');;
			$builder->select('product_color.id as id,code,layout,product_id,back,colors.id as idcolor');
			$builder->join('colors', 'colors.id = product_color.color_id', 'left');
			$builder->where('product_id', $idPro);
			$colors = $builder->get()->getResultArray();


			//$query = $modelProductColor->select('(SELECT product_color.id as id,code as code LEFT JOIN colors ON colors.id = product_color.color_id FROM product_color WHERE product_id = "' . $idPro . '"', FALSE)->findAll();

			//$colors = $modelProductColor->join('colors', 'colors.id = product_color.color_id', 'left')->where('product_id', $idPro)->findAll();


			$image = directory_map(WRITEPATH . 'uploads/product/' . $idPro . '/image/' . $colors[0]['idcolor']);


			$data['temp'] = 'product/index';
			$data['title'] = $infoPro['name'];
			$data['info'] = $product;
			$data['menu'] = $modelCategory->where('parent', '0')->findAll();
			$data['menuactive'] = $slugcat;
			$data['cateImage'] = $cateImage;
			$data['size'] = $sizes;
			$data['color'] = $colors;
			$data['image'] = $image;
			$data['banner'] = $banner;
			$data['user'] = session('user');
			$data['maybelike'] = $maybelike;
			$data['arrFavourite'] = explode(',', get_cookie('favourite'));

			$data['cart'] = session('cart');
			echo view('layout_product', $data);
		} else {
			var_dump('404');
		}


	}

	public function colorlayout()
	{
		helper(['filesystem', 'cookie']);

		$modelProductColor = new ProductColorModel();
		$id = $this->request->getPost('id');
		$idpro = $this->request->getPost('idpro');
		$idcolor = $this->request->getPost('idcolor');

		$cateImage = directory_map('./images-pro');
		$imageShow = directory_map(WRITEPATH . 'uploads/product/' . $idpro . '/image/' . $idcolor);


		$colors = $modelProductColor->where('id', $id)->first();
		$colors['cateImage'] = $cateImage;
		$colors['imageShow'] = $imageShow;

		echo json_encode($colors);

	}
	//--------------------------------------------------------------------

}
