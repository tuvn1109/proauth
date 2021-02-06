<?php namespace App\Controllers;


use App\Models\OrdersDetailModel;
use App\Models\OrdersModel;
use App\Models\ProductFeelbackModel;
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
		$pager = \Config\Services::pager();
		helper(['filesystem', 'cookie']);
		$modelCategory = new CategoryModel();
		$modelProduct = new ProductModel();
		$modelSetting = new SettingsModel();
		$banner = $modelSetting->where('type', 'bannerads')->findAll();
		$banner = array_column($banner, 'value', 'filed');
		$page = $this->request->getGet('page');
		if (!$page) {
			$page = 0;
		} elseif ($page == 1) {
			$page = 0;
		} else {
			$page = $page * 10;
		}
		$id = $modelCategory->getIdBySlug($slug);

		if ($id) {
			$infoCate = $modelCategory->where('id', $id)->first();

			$test = $modelProduct->getList($infoCate['slug'], 20, $page);

			$listCate = $modelProduct->join('categories', 'categories.id = products.type', 'left')->where('slug', $infoCate['slug'])->paginate(20, 'gr1', $page);
			$count = $modelProduct->join('categories', 'categories.id = products.type', 'left')->where('slug', $infoCate['slug'])->countAllResults(false);
			$sort = $modelCategory->where('parent', $id)->findAll();
			$data['temp'] = 'category/index';
			$data['title'] = $infoCate['value'];
			$data['infoCate'] = $infoCate;
			$data['menu'] = $modelCategory->where('parent', '0')->findAll();
			$data['listCate'] = $test;
			$data['countListCate'] = $count;
			$data['banner'] = $banner;
			$data['sort'] = $sort;
			$data['pagenow'] = $page;
			$data['cart'] = session('cart');
			$data['user'] = session('user');
			$data['arrFavourite'] = explode(',', get_cookie('favourite'));
			echo view('layout', $data);

		} else {
			echo view('error404');

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
			$modelFeelback = new ProductFeelbackModel();
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

			$feelback = $modelFeelback->getListAll(0, 0, ['product_id' => $idPro]);
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
			$data['feelback'] = $feelback;
			$data['cart'] = session('cart');
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

	public function addreview()
	{

		$modelFeelback = new ProductFeelbackModel();
		$modelOrder = new OrdersDetailModel();
		$id = $this->request->getPost('id');
		$star = $this->request->getPost('star');
		$content = $this->request->getPost('content');
		$files = $this->request->getFiles();
		$photo = $files['photorw'];


		if (session('user')) {
			$idCus = session('user')['id'];
			// check order
			$check = $modelOrder->infoOrder($idCus, $id);
			if ($check) {

				$data = [
					'product_id' => $id,
					'customer_id' => $idCus,
					'content' => $content,
					'rate' => $star,
				];
				$modelFeelback->insert($data);


				foreach ($photo as $val):
					if ($val->isValid() && !$val->hasMoved()) {
						$newName = $val->getRandomName();
						// $val->getName($newName);
						if (!is_dir(WRITEPATH . 'uploads/product/' . $id . '/review')) {
							mkdir(WRITEPATH . 'uploads/product/' . $id . '/review', 0777, TRUE);
						}

						if (!is_dir(WRITEPATH . 'uploads/product/' . $id . '/review/' . $idCus)) {
							mkdir(WRITEPATH . 'uploads/product/' . $id . '/review/' . $idCus, 0777, TRUE);
						}
						$val->move(WRITEPATH . 'uploads/product/' . $id . '/review/' . $idCus, $newName);
					}
				endforeach;


				$return = [
					'code' => 'fetch_user_success',
					'msg' => 'Thank you for rating our products',
					'stt' => true,
					'data' => [
						'name' => session('user')['fullname'],
					]
				];
			} else {
				$return = [
					'code' => 'fetch_user_success',
					'msg' => 'You cannot rate products that are not yet owned',
					'stt' => false,
					'data' => []
				];

			}


		} else {
			$return = [
				'code' => 'fetch_user_success',
				'msg' => 'Please log in to rate products',
				'stt' => false,
				'data' => []
			];

		}
		//echo json_encode($colors);

		echo json_encode($return);
	}
	//--------------------------------------------------------------------

}
