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
		$data['category'] = $modelCategory->findAll();
		$data['color'] = $modelColor->findAll();
		$data['size'] = $modelSize->findAll();
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

		$data['recordsFiltered'] = $count;
		$data['draw'] = $draw;
		$data['recordsTotal'] = count($data['data']);

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

		foreach ($tags as $tags1):
			$arrTag[] = $tags1['value'];
		endforeach;

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
			'description' => $description,
			'description_detail' => $description_detail,
			'slug_pro' => $slug,
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


		if ($jsonLayout) {
			foreach ($jsonLayout as $jsonLayout1):
				// layout front
				$img = $this->request->getFile('fileUpload' . $jsonLayout1);
				if ($img->isValid() && !$img->hasMoved()) {
					//$newName = $img->getRandomName();
					if (!is_dir(WRITEPATH . 'uploads/product/' . $id . '/layout')) {
						mkdir(WRITEPATH . 'uploads/product/' . $id . '/layout', 0777, TRUE);
					}

					$img->move(WRITEPATH . 'uploads/product/' . $id . '/layout');

				}

				// layout back
				$imgback = $this->request->getFile('fileUploadback' . $jsonLayout1);
				if ($imgback->isValid() && !$imgback->hasMoved()) {
					//$newName = $img->getRandomName();
					if (!is_dir(WRITEPATH . 'uploads/product/' . $id . '/layout')) {
						mkdir(WRITEPATH . 'uploads/product/' . $id . '/layout', 0777, TRUE);
					}
					$imgback->move(WRITEPATH . 'uploads/product/' . $id . '/layout');
				}

				if (!is_dir(WRITEPATH . 'uploads/product/' . $id . '/image')) {
					mkdir(WRITEPATH . 'uploads/product/' . $id . '/image', 0777, TRUE);
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
					'layout' => 'product/' . $id . '/layout/' . $img->getName(),
					'back' => 'product/' . $id . '/layout/' . $imgback->getName(),
				];
				$modelProductColor->insert($detail);
			endforeach;
		}
		$return = [
			'code' => 'fetch_user_success',
			'msg' => 'Success',
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
		$tags = $this->request->getPost('tags');
		$description = $this->request->getPost('description');
		$description_detail = $this->request->getPost('description_detail');
		$size = $this->request->getPost('size');
		$arrDelete = \json_decode($this->request->getPost('arrDelete'), true);
		$jsoncolor = $this->request->getPost('jsoncolor');
		$jsonLayout = \json_decode($jsoncolor, true);

		$file = $this->request->getFiles();
		$slug = create_slug($name);
		$checkSlug = $modelProduct->where('name', $name)
			->findAll();
		//$imgPro = $file['fileImgPro'];	
		$tags = \json_decode($this->request->getPost('tags'), true);


		foreach ($tags as $tags1):
			$arrTag[] = $tags1['value'];
		endforeach;

		$tagText = \implode(",", $arrTag);


		$dataInsert = [
			'name' => $name,
			'type' => $type,
			'price' => $price,
			'price_sale' => $price_sale,
			'manufactur' => $manufactur,
			'delivery' => $delivery,
			'tag' => $tagText,
			'description' => $description,
			'description_detail' => $description_detail,
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

			delete_files(WRITEPATH . 'uploads/product/' . $id . '/thumb');


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

				if ($file) {
					$tesst = $file['fileImgShow' . $jsonLayout1];
					if ($tesst) {
						$imgShow = $file['fileImgShow' . $jsonLayout1];
					} else {
						$imgShow = null;
					}

					echo "<pre>";
					print_r($tesst);
					echo "</pre>";
				}
				echo "<pre>";
				print_r($file);
				echo "</pre>";

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


				echo "<pre>";
				print_r($detail);
				echo "</pre>";

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
		$modelProduct = new ProductModel();
		$modelProperties = new PropertiesModel();
		$modelProDetail = new PropertiesDetailModel();
		$id = $this->request->getPost('id');
		$modelProduct->delete($id);
		//	$modelProDetail->where('properties_id', $id)->delete();


		echo json_encode(1);
	}
	//--------------------------------------------------------------------

}