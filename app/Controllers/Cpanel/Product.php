<?php

namespace App\Controllers\Cpanel;

use App\Models\PropertiesDetailModel;
use App\Models\PropertiesModel;
use App\Models\CategoryModel;
use App\Models\ColorModel;
use App\Models\SizeModel;
use App\Models\TagModel;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use App\Models\ProductColorModel;
use App\Models\ProductTagModel;

class Product extends CpanelController
{


	public function index()
	{
		$data['temp'] = 'cpanel/product/index';
		$data['title'] = 'Product';
		$data['menu'] = 'product';
		echo view('cpanel/layout', $data);
	}


	public function create()
	{
		$modelProperties = new PropertiesModel();
		$modelCategory = new CategoryModel();
		$modelColor = new ColorModel();
		$modelSize = new SizeModel();
		$data['temp'] = 'cpanel/product/create/index';
		$data['title'] = 'Create product';
		$data['menu'] = 'createproduct';
		$data['listProperties'] = $modelProperties->findAll();
		$data['listcategory'] = $modelCategory->findAll();
		$data['color'] = $modelColor->findAll();
		$data['listsize'] = $modelSize->findAll();
		$data['type'] = 'Create';
		echo view('cpanel/layout', $data);
	}


	public function loaddata()
	{
		$model = new ProductModel();
		// data
		$page = $this->request->getGet('page');
		$draw = $this->request->getGet('draw');
		$perpage = $this->request->getGet('length');
		$search = $this->request->getGet('search[value]');
		$orderColId = $this->request->getVar('order')[0]['column'];
		$orderType = $this->request->getVar('order')[0]['dir'];
		$orderCol = $this->request->getVar('columns')[$orderColId]['data'];
		if ($page == 1) {
			$page = 0;
		} elseif ($page > 1) {
			$page = ($page - 1) * $perpage;
		}
		$teest = $model->getListAll(10, $page);
		$data['recordsFiltered'] = $model->countAllResults(false);
		$data['draw'] = $draw;
		$data['data'] = $teest;
		$data['recordsTotal'] = count($data['data']);


		echo json_encode($data);

		exit;
		$model->orderBy($orderCol, $orderType);
		if ($search) {
			$list = [
				'Value' => $search,
			];
			$count = $model->groupStart()->orLike($list)->groupEnd()->countAllResults(false);
			$data['data'] = $model->paginate($perpage, 'gr1', $page);
		} else {
			$count = $model->countAllResults(false);
			$data['data'] = $model->paginate($perpage, 'gr1', $page);
		}


		echo json_encode($data);

	}

	public function loadimage()
	{
		helper('filesystem');
		$model = new ProductModel();
		$id = $this->request->getPost('id');
		$image = directory_map(WRITEPATH . 'uploads/product/' . $id . '/image');
		$thumb = directory_map(WRITEPATH . 'uploads/product/' . $id . '/thumb');
		$layout = directory_map(WRITEPATH . 'uploads/product/' . $id . '/layout');
		$data['image'] = $image;
		$data['thumb'] = $thumb;
		$data['layout'] = $layout;
		echo json_encode($data);

	}

	public function loadimagecolor()
	{
		helper('filesystem');
		function dirToArray($dir)
		{
			$result = array();
			$cdir = scandir($dir);
			foreach ($cdir as $key => $value) {
				if (!in_array($value, array(".", ".."))) {
					if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
						$result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
					} else {
						$result[] = $value;
					}
				}
			}
			return $result;
		}

		$modelProductColor = new ProductColorModel();

		$id = $this->request->getPost('id');

		$info = $modelProductColor->find($id);


		$dir = WRITEPATH . 'uploads/product/' . $info['product_id'] . '/image/' . $info['color_id'];

		$image = dirToArray($dir);

		$data['image'] = $image;
		$data['info'] = $info;
		echo json_encode($data);

	}

	public function insert()
	{
		helper('comment');

		$modelProduct = new ProductModel();
		$modelProductSize = new ProductSizeModel();
		$modelProductColor = new ProductColorModel();
		$modelProductTag = new ProductTagModel();
		$modelTag = new TagModel();

		$arrTag = [];
		$name = $this->request->getPost('name');
		$type = $this->request->getPost('type');
		$price = $this->request->getPost('price');
		$price_sale = $this->request->getPost('price_sale');
		$manufactur = $this->request->getPost('manufactur');
		$delivery = $this->request->getPost('delivery');
		$tags = $this->request->getPost('tags');
		$sale = $this->request->getPost('salestatus');
		$bestsell = $this->request->getPost('bestselling');
		if ($sale == 'on') {
			$sale = 'yes';
		}
		if ($bestsell == 'on') {
			$bestsell = 'yes';
		}

		$description = $this->request->getPost('description');
		$description_detail = $this->request->getPost('description_detail');
		$size = $this->request->getPost('size');
		$jsoncolor = $this->request->getPost('jsoncolor');
		$jsonLayout = \json_decode($jsoncolor, true);

		$slug = create_slug($name);
		$checkSlug = $modelProduct->where('name', $name)
			->findAll();
		$file = $this->request->getFiles();


		$tags = \json_decode($this->request->getPost('tags'), true);
		$tagText = '';
		if ($tags) {
			foreach ($tags as $tags1):
				$arrTag[] = $tags1['value'];
			endforeach;

			$tagText = \implode(",", $arrTag);
		}

		$dataInsert = [
			'name' => $name,
			'type' => $type,
			'price' => $price,
			'price_sale' => $price_sale,
			'manufactur' => $manufactur,
			'delivery' => $delivery,
			'tag' => $tagText,
			'sale' => $sale,
			'bestselling' => $bestsell,
			'description' => $description,
			//'description_detail' => $description_detail,
			'slug_pro' => $slug,
			'status' => 'new',
		];
		$id = $modelProduct->insert($dataInsert);

		// update slug
		if (count($checkSlug) > 0) {
			$slug = create_slug($name) . '-' . $id;
			$dataSlug = [
				'slug_pro' => $slug,
			];
			$modelProduct->update($id, $dataSlug);
		}

		// SIZE
		if ($size) {
			foreach ($size as $size1):
				$dataS = [
					'product_id' => $id,
					'size_id' => $size1,
				];

				$modelProductSize->insert($dataS);
			endforeach;
		}
		// TAG
		if ($tags) {
			foreach ($tags as $tags1):
				$check = $modelTag->checkValue($tags1['value']);
				if (!$check) {
					$dataTag = [
						'value' => $tags1['value'],
					];
					$idTag = $modelTag->insert($dataTag);

					$dataTagPro = [
						'tag_id' => $idTag,
						'product_id' => $id,
					];
					$modelProductTag->insert($dataTagPro);
				} else {

					$dataTagPro = [
						'tag_id' => $check,
						'product_id' => $id,
					];
					$modelProductTag->insert($dataTagPro);
				}
			endforeach;
		}
		// thumbnail
		$thumbnail = $this->request->getFile('thumbnail');
		if ($thumbnail->isValid() && !$thumbnail->hasMoved()) {
			$newName = $thumbnail->getRandomName();
			if (!is_dir(WRITEPATH . 'uploads/product/' . $id . '/thumb')) {
				mkdir(WRITEPATH . 'uploads/product/' . $id . '/thumb', 0777, TRUE);
			}
			//$name = $thumbnail->getName();


			$path = $thumbnail->move(WRITEPATH . 'uploads/product/' . $id . '/thumb', $newName);
			$explodeName = explode(".", $newName);
			$nameAuth = $explodeName[0];
			$type = $explodeName[1];

			$image = \Config\Services::image()
				->withFile(WRITEPATH . 'uploads/product/' . $id . '/thumb/' . $newName)
				->fit(375, 480, 'center')
				->save(WRITEPATH . 'uploads/product/' . $id . '/thumb/' . $nameAuth . '375480.' . $type);

			$image = \Config\Services::image()
				->withFile(WRITEPATH . 'uploads/product/' . $id . '/thumb/' . $newName)
				->fit(476, 690, 'center')
				->save(WRITEPATH . 'uploads/product/' . $id . '/thumb/' . $nameAuth . '476690.' . $type, 100);
			$image = \Config\Services::image()
				->withFile(WRITEPATH . 'uploads/product/' . $id . '/thumb/' . $newName)
				->fit(308, 343, 'center')
				->save(WRITEPATH . 'uploads/product/' . $id . '/thumb/' . $nameAuth . '308343.' . $type);

			$dataThumb = [
				'thumbnail' => 'product/' . $id . '/thumb/' . $thumbnail->getName(),
			];
			$modelProduct->update($id, $dataThumb);
		}
		if (!is_dir(WRITEPATH . 'uploads/product/' . $id . '/layout')) {
			mkdir(WRITEPATH . 'uploads/product/' . $id . '/layout', 0777, TRUE);
		}
		if (!is_dir(WRITEPATH . 'uploads/product/' . $id . '/image')) {
			mkdir(WRITEPATH . 'uploads/product/' . $id . '/image', 0777, TRUE);
		}

		if ($jsonLayout) {
			foreach ($jsonLayout as $jsonLayout1):
				// layout front
				$img = $this->request->getFile('fileUpload' . $jsonLayout1);
				if ($img) {
					if ($img->isValid() && !$img->hasMoved()) {
						//$newName = $img->getRandomName();

						$img->move(WRITEPATH . 'uploads/product/' . $id . '/layout');

					}
					$pathFront = 'product/' . $id . '/layout/' . $img->getName();
				} else {
					$pathFront = '/logo/noimg.jpg';
				}
				// layout back
				$imgback = $this->request->getFile('fileUploadback' . $jsonLayout1);

				if ($imgback) {
					if ($imgback->isValid() && !$imgback->hasMoved()) {
						//$newName = $img->getRandomName();
						if (!is_dir(WRITEPATH . 'uploads/product/' . $id . '/layout')) {
							mkdir(WRITEPATH . 'uploads/product/' . $id . '/layout', 0777, TRUE);
						}
						$imgback->move(WRITEPATH . 'uploads/product/' . $id . '/layout');
					}

					$pathBack = 'product/' . $id . '/layout/' . $imgback->getName();
				} else {
					$pathBack = '/logo/noimg.jpg';

				}


				// image show

				if ($file) {
					$imgShow = $file['fileImgShow' . $jsonLayout1];

				}

				foreach ($imgShow as $imgShow1):
					if ($imgShow1->isValid() && !$imgShow1->hasMoved()) {
						//$newName = $img->getRandomName();

						if (!is_dir(WRITEPATH . 'uploads/product/' . $id . '/image/' . $jsonLayout1)) {
							mkdir(WRITEPATH . 'uploads/product/' . $id . '/image/' . $jsonLayout1, 0777, TRUE);
						}
						$imgShow1->move(WRITEPATH . 'uploads/product/' . $id . '/image/' . $jsonLayout1);
					}
				endforeach;

				$detail = [
					'product_id' => $id,
					'color_id' => $jsonLayout1,
					'layout' => $pathFront,
					'back' => $pathBack,
				];
				$modelProductColor->insert($detail);
			endforeach;
		}
		$return = [
			'code' => 'fetch_user_success',
			'msg' => 'Success',
			'id' => $id,
			'stt' => true,
			'data' => []
		];
		echo json_encode($return);
		exit;
		if ($file) {
			$imgPro = $file['fileImgPro'];
		}
		if ($imgPro == 'botamthoi') {
			foreach ($imgPro as $imgPro1):

				if ($imgPro1->isValid() && !$imgPro1->hasMoved()) {
					//$newName = $img->getRandomName();
					if (!is_dir(WRITEPATH . 'uploads/product/' . $id . '/image')) {
						mkdir(WRITEPATH . 'uploads/product/' . $id . '/image', 0777, TRUE);
					}

					$imgPro1->move(WRITEPATH . 'uploads/product/' . $id . '/image');

				}

			endforeach;
		}
	}


	public function edit()
	{
		helper('filesystem');

		$modelProduct = new ProductModel();
		$modelProductSize = new ProductSizeModel();
		$modelProductColor = new ProductColorModel();
		$modelCategory = new CategoryModel();
		$modelColor = new ColorModel();
		$modelSize = new SizeModel();
		$uri = current_url(true);
		$id = $uri->getSegment(4);
		$product = $modelProduct->find($id);

		//$colors = $modelProductColor->where('product_id', $id)->findAll();
		$sizes = $modelProductSize->where('product_id', $id)->findAll();
		$db = \Config\Database::connect();
		$builder = $db->table('product_color');;
		$builder->select('*,product_color.id as id');
		$builder->join('colors', 'colors.id = product_color.color_id', 'left');
		$builder->where('product_id', $id);
		$colors = $builder->get()->getResultArray();

		$dir = WRITEPATH . 'uploads/product/' . $id . '/image';

		function dirToArray($dir)
		{
			$result = array();
			$cdir = scandir($dir);
			foreach ($cdir as $key => $value) {
				if (!in_array($value, array(".", ".."))) {
					if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
						$result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
					} else {
						$result[] = $value;
					}
				}
			}
			return $result;
		}

		$image = dirToArray($dir);

		$data['temp'] = 'cpanel/product/edit/index';
		$data['title'] = 'Product edit';
		$data['menu'] = 'product';
		$data['info'] = $product;
		$data['layout'] = $colors;
		$data['imageshow'] = $image;
		$data['sizes'] = $sizes;
		$data['listcategory'] = $modelCategory->findAll();
		$data['color'] = $modelColor->findAll();
		$data['listsize'] = $modelSize->findAll();
		$data['type'] = 'Update';

		echo view('cpanel/layout', $data);
	}


	public function update()
	{
		helper(['filesystem', 'comment']);
		$modelProduct = new ProductModel();
		$modelProductSize = new ProductSizeModel();
		$modelProductColor = new ProductColorModel();
		$modelProductTag = new ProductTagModel();
		$modelTag = new TagModel();
		$arrTag = [];
		$id = $this->request->getPost('id');
		$name = $this->request->getPost('name');
		$type = $this->request->getPost('type');
		$price = $this->request->getPost('price');
		$price_sale = $this->request->getPost('price_sale');
		$manufactur = $this->request->getPost('manufactur');
		$delivery = $this->request->getPost('delivery');
		$sale = $this->request->getPost('salestatus');
		$bestsell = $this->request->getPost('bestselling');
		$date_end_flash = $this->request->getPost('date_end_flash');

		if ($sale == 'on') {
			$sale = 'yes';
		}

		if ($bestsell == 'on') {
			$bestsell = 'yes';
		}
		$tags = $this->request->getPost('tags');
		$description = $this->request->getPost('description');
		$description_detail = $this->request->getPost('description_detail');
		$size = $this->request->getPost('size');
		$arrDelete = \json_decode($this->request->getPost('arrDelete'), true);
		$arrDeleteColor = \json_decode($this->request->getPost('arrdeletecolor'), true);


		if ($arrDeleteColor) {
			foreach ($arrDeleteColor as $idcolor):

				$modelProductColor->where('color_id', $idcolor)->where('product_id', $id)->delete();
				delete_files(WRITEPATH . 'uploads/product/' . $id . '/image/' . $idcolor);
			endforeach;
		}

		$jsoncolor = $this->request->getPost('jsoncolor');
		$jsonLayout = \json_decode($jsoncolor, true);

		$file = $this->request->getFiles();
		$slug = create_slug($name);
		$checkSlug = $modelProduct->where('name', $name)
			->findAll();
		//$imgPro = $file['fileImgPro'];	
		$tags = \json_decode($this->request->getPost('tags'), true);

		if ($tags) {
			foreach ($tags as $tags1):
				$arrTag[] = $tags1['value'];
			endforeach;
		}

		$tagText = \implode(",", $arrTag);


		$dataInsert = [
			'name' => $name,
			'type' => $type,
			'price' => $price,
			'price_sale' => $price_sale,
			'manufactur' => $manufactur,
			'delivery' => $delivery,
			'tag' => $tagText,
			'sale' => $sale,
			'bestselling' => $bestsell,
			'description' => $description,
			'date_end_flash' => $date_end_flash,
			//	'description_detail' => $description_detail,
			'slug_pro' => create_slug($name),

		];
		$modelProduct->update($id, $dataInsert);

// update slug
		if (count($checkSlug) > 0) {
			$slug = create_slug($name) . '-' . $id;
			$dataSlug = [
				'slug_pro' => $slug,
			];
			$modelProduct->update($id, $dataSlug);
		}
		// SIZE
		if ($size) {
			$modelProductSize->where('product_id', $id)->delete();

			foreach ($size as $size1):

				$dataS = [
					'product_id' => $id,
					'size_id' => $size1,
				];

				$modelProductSize->insert($dataS);
			endforeach;
		}
		// TAG
		if ($tags) {
			$modelProductTag->where('product_id', $id)->delete();

			foreach ($tags as $tags1):
				$check = $modelTag->checkValue($tags1['value']);
				if (!$check) {
					$dataTag = [
						'value' => $tags1['value'],
					];
					$idTag = $modelTag->insert($dataTag);

					$dataTagPro = [
						'tag_id' => $idTag,
						'product_id' => $id,
					];
					$modelProductTag->insert($dataTagPro);
				} else {

					$dataTagPro = [
						'tag_id' => $check,
						'product_id' => $id,
					];
					$modelProductTag->insert($dataTagPro);
				}
			endforeach;
		}


		$thumbnail = $this->request->getFile('thumbnail');

		if ($thumbnail) {


			if ($thumbnail->isValid() && !$thumbnail->hasMoved()) {
				delete_files(WRITEPATH . 'uploads/product/' . $id . '/thumb');

				$newName = $thumbnail->getRandomName();
				if (!is_dir(WRITEPATH . 'uploads/product/' . $id . '/thumb')) {
					mkdir(WRITEPATH . 'uploads/product/' . $id . '/thumb', 0777, TRUE);
				}
				//$name = $thumbnail->getName();


				$path = $thumbnail->move(WRITEPATH . 'uploads/product/' . $id . '/thumb', $newName);
				$explodeName = explode(".", $newName);
				$nameAuth = $explodeName[0];
				$type = $explodeName[1];

				$image = \Config\Services::image()
					->withFile(WRITEPATH . 'uploads/product/' . $id . '/thumb/' . $newName)
					->fit(200, 245, 'center')
					->save(WRITEPATH . 'uploads/product/' . $id . '/thumb/' . $nameAuth . '200245.' . $type);

				$image = \Config\Services::image()
					->withFile(WRITEPATH . 'uploads/product/' . $id . '/thumb/' . $newName)
					->fit(275, 400, 'center')
					->save(WRITEPATH . 'uploads/product/' . $id . '/thumb/' . $nameAuth . '275400.' . $type);
				$image = \Config\Services::image()
					->withFile(WRITEPATH . 'uploads/product/' . $id . '/thumb/' . $newName)
					->fit(165, 180, 'center')
					->save(WRITEPATH . 'uploads/product/' . $id . '/thumb/' . $nameAuth . '165180.' . $type);

				$dataThumb = [
					'thumbnail' => 'product/' . $id . '/thumb/' . $thumbnail->getName(),
				];
				$modelProduct->update($id, $dataThumb);
			}

			/*
						if ($thumbnail->isValid() && !$thumbnail->hasMoved()) {
							//$newName = $img->getRandomName();
							if (!is_dir(WRITEPATH . 'uploads/product/' . $id . '/thumb')) {
								mkdir(WRITEPATH . 'uploads/product/' . $id . '/thumb', 0777, TRUE);
							}

							$thumbnail->move(WRITEPATH . 'uploads/product/' . $id . '/thumb');

							$dataThumb = [
								'thumbnail' => 'product/' . $id . '/thumb/' . $thumbnail->getName(),
							];
							$modelProduct->update($id, $dataThumb);
						}
			*/

		}


		if ($arrDelete) {
			foreach ($arrDelete as $arrDelete1) {
				//unlink(WRITEPATH . 'uploads/product/' . $id . '/image/' . $arrDelete1);
				//echo WRITEPATH . 'uploads/product/' . $id . '/image/' . $arrDelete1 . '<br>';
			}
		}
		if ($jsonLayout) {
			foreach ($jsonLayout as $jsonLayout1):
				$detail = [];
				$img = $this->request->getFile('fileUpload' . $jsonLayout1);
				if ($img) {
					if ($img->isValid() && !$img->hasMoved()) {
						//$newName = $img->getRandomName();
						if (!is_dir(WRITEPATH . 'uploads/product/' . $id . '/layout')) {
							mkdir(WRITEPATH . 'uploads/product/' . $id . '/layout', 0777, TRUE);
						}
						$img->move(WRITEPATH . 'uploads/product/' . $id . '/layout');

						$detail['layout'] = 'product/' . $id . '/layout/' . $img->getName();
					}
				}

				$imgback = $this->request->getFile('fileUploadback' . $jsonLayout1);
				if ($imgback) {
					if ($imgback->isValid() && !$imgback->hasMoved()) {
						//$newName = $img->getRandomName();
						if (!is_dir(WRITEPATH . 'uploads/product/' . $id . '/layout')) {
							mkdir(WRITEPATH . 'uploads/product/' . $id . '/layout', 0777, TRUE);
						}
						$imgback->move(WRITEPATH . 'uploads/product/' . $id . '/layout');
						$detail['back'] = 'product/' . $id . '/layout/' . $imgback->getName();
					}
				}


				$imgShow = null;
				if (isset($file['fileImgShow' . $jsonLayout1])) {
					$imgShow = $file['fileImgShow' . $jsonLayout1];;
				}

				if ($imgShow) {
					foreach ($imgShow as $imgShow1):
						if ($imgShow1->isValid() && !$imgShow1->hasMoved()) {
							//$newName = $img->getRandomName();

							if (!is_dir(WRITEPATH . 'uploads/product/' . $id . '/image/' . $jsonLayout1)) {
								mkdir(WRITEPATH . 'uploads/product/' . $id . '/image/' . $jsonLayout1, 0777, TRUE);
							}
							$imgShow1->move(WRITEPATH . 'uploads/product/' . $id . '/image/' . $jsonLayout1);
						}
					endforeach;

				}


				//check co mau nay chua//
				$checkColor = $modelProductColor->where('product_id', $id)->where('color_id', $jsonLayout1)->first();
				if ($checkColor && ($img || $imgback)) {
					$modelProductColor->update($checkColor['id'], $detail);
				} elseif (!$checkColor) {
					$detail['color_id'] = $jsonLayout1;
					$detail['product_id'] = $id;
					$modelProductColor->insert($detail);
				}

			endforeach;
		}

		$return = [
			'code' => 'fetch_user_success',
			'msg' => 'Update success ',
			'stt' => true,
			'data' => []
		];
		echo json_encode($return);


		exit;
		if ($file) {
			$imgPro = $file['fileImgPro'];

			foreach ($imgPro as $imgPro1):

				if ($imgPro1->isValid() && !$imgPro1->hasMoved()) {
					//$newName = $img->getRandomName();
					if (!is_dir(WRITEPATH . 'uploads/product/' . $id . '/image')) {
						mkdir(WRITEPATH . 'uploads/product/' . $id . '/image', 0777, TRUE);
					}

					$imgPro1->move(WRITEPATH . 'uploads/product/' . $id . '/image');

				}

			endforeach;
		}

	}

	public function updatesale()
	{
		helper(['filesystem', 'comment']);
		$modelProduct = new ProductModel();
		$id = $this->request->getPost('id');
		$sale = $this->request->getPost('salestatus');
		if ($sale == 'on') {
			$sale = 'yes';
		}

		$dataInsert = [
			'sale' => $sale,
		];
		$modelProduct->update($id, $dataInsert);
		$return = [
			'code' => 'fetch_user_success',
			'msg' => 'Update success ',
			'stt' => true,
			'data' => []
		];
		echo json_encode($return);

	}

	public function updatebest()
	{
		helper(['filesystem', 'comment']);
		$modelProduct = new ProductModel();
		$id = $this->request->getPost('id');
		$best = $this->request->getPost('bestselling');

		$dataInsert = [
			'bestselling' => $best,
		];
		$modelProduct->update($id, $dataInsert);
		$return = [
			'code' => 'fetch_user_success',
			'msg' => 'Update success ',
			'stt' => true,
			'data' => []
		];
		echo json_encode($return);

	}


	public function edit2()
	{
		$model = new ProtypeModel();
		$value = $this->request->getPost('value');
		$id = $this->request->getPost('id');
		$data = [
			'value' => $value,
		];
		$model->update($id, $data);

		echo json_encode($id);
	}

	public function delete()
	{
		helper(['filesystem']);

		$modelProduct = new ProductModel();
		$modelProductColor = new ProductColorModel();
		$modelProductSize = new ProductSizeModel();
		$modelProductTag = new ProductTagModel();
		$id = $this->request->getPost('id');


		$modelProduct->delete($id);
		$modelProductColor->where('product_id', $id)->delete();
		$modelProductSize->where('product_id', $id)->delete();
		$modelProductTag->where('product_id', $id)->delete();


		delete_files(WRITEPATH . 'uploads/product/' . $id . '/thumb');
		delete_files(WRITEPATH . 'uploads/product/' . $id . '/layout');
		delete_files(WRITEPATH . 'uploads/product/' . $id . '/image');

		//	$modelProDetail->where('properties_id', $id)->delete();


		echo json_encode(1);
	}
	//--------------------------------------------------------------------

}