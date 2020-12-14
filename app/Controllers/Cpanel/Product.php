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
		$id =  $this->request->getPost('id');
		$image = directory_map(WRITEPATH . 'uploads/product/' . $id.'/image');
		$thumb = directory_map(WRITEPATH . 'uploads/product/' . $id.'/thumb');
		$layout = directory_map(WRITEPATH . 'uploads/product/' . $id.'/layout');
		$data['image'] = $image;
		$data['thumb'] = $thumb;
		$data['layout'] = $layout;
		echo json_encode($data);

	}

	public function insert()
	{
			$modelProduct = new ProductModel();
			$modelProductSize = new ProductSizeModel();
			$modelProductColor = new ProductColorModel();
			$modelProductTag = new ProductTagModel();
			$modelTag = new TagModel();

			$arrTag = [];
			$name =  $this->request->getPost('name');
			$type =  $this->request->getPost('type');
			$price =  $this->request->getPost('price');
			$price_sale =  $this->request->getPost('price_sale');
			$manufactur =  $this->request->getPost('manufactur');
			$delivery =  $this->request->getPost('delivery');
			$tags =  $this->request->getPost('tags');
			$description =  $this->request->getPost('description');
			$description_detail =  $this->request->getPost('description_detail');
			$size =  $this->request->getPost('size');
			$test = $this->request->getPost('test');

			$tags =  \json_decode($this->request->getPost('tags'),true);

			foreach($tags as $tags1):
				$arrTag[] = $tags1['value'];
			endforeach;
	
			$tagText = \implode(",",$arrTag);
	
			$jsonLayout = \json_decode($test,true);
			$file =  $this->request->getFiles();
			$imgPro = $file['fileImgPro'];		
	
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
			];
			$id = $modelProduct->insert($dataInsert);


			// SIZE 
			if($size){
			foreach($size as $size1):
				$dataS = [
					'product_id' => $id,
					'size_id' => $size1,
				];

			$modelProductSize->insert($dataS);
			endforeach;
			}
			// TAG 
			if($tags){
				foreach($tags as $tags1):
					$check = $modelTag->checkValue($tags1['value']);
					if(!$check){
						$dataTag = [
							'value' => $tags1['value'],
						];
						$idTag = $modelTag->insert($dataTag);

						$dataTagPro = [
							'tag_id' => $idTag,
							'product_id' => $id,
						];
						$modelProductTag->insert($dataTagPro);
					}else{

						$dataTagPro = [
							'tag_id' => $check,
							'product_id' => $id,
						];
						$modelProductTag->insert($dataTagPro);
					}
				endforeach;
			}
			// thumbnail 
			$thumbnail =  $this->request->getFile('thumbnail');
			if ($thumbnail->isValid() && !$thumbnail->hasMoved()) {
				//$newName = $img->getRandomName();
				if (!is_dir(WRITEPATH . 'uploads/product/' . $id)) {
					mkdir(WRITEPATH . 'uploads/product/' . $id, 0777, TRUE);
				}

				$thumbnail->move(WRITEPATH . 'uploads/product/' . $id);

				$dataThumb = [
					'thumbnail' => 'product/' . $id . '/'. $thumbnail->getName(),
				];
				$modelProduct->update($id, $dataThumb);
			}

			if($imgPro){
				foreach($imgPro as $imgPro1):

					if ($imgPro1->isValid() && !$imgPro1->hasMoved()) {
						//$newName = $img->getRandomName();
						if (!is_dir(WRITEPATH . 'uploads/product/' . $id.'/image')) {
							mkdir(WRITEPATH . 'uploads/product/' . $id.'/image', 0777, TRUE);
						}

						$imgPro1->move(WRITEPATH . 'uploads/product/' . $id.'/image');

					}

				endforeach;
			}
			if($jsonLayout){
				foreach($jsonLayout as $jsonLayout):
					$img =  $this->request->getFile('fileUpload'.$jsonLayout['color']);

					if ($img->isValid() && !$img->hasMoved()) {
						//$newName = $img->getRandomName();
						if (!is_dir(WRITEPATH . 'uploads/product/' . $id.'/layout')) {
							mkdir(WRITEPATH . 'uploads/product/' . $id.'/layout', 0777, TRUE);
						}

						$img->move(WRITEPATH . 'uploads/product/' . $id.'/layout');

						$detail = [
							'product_id' => $id,
							'color_id' => $jsonLayout['color'],
							'type' => $jsonLayout['type'],
							'layout' => 'product/' . $id . '/layout/' . $img->getName(),
						];
						$modelProductColor->insert($detail);
					}

				endforeach;
			}
			$return = [
				'code' => 'fetch_user_success',
				'msg' => 'Success',
				'stt' => true,
				'data' => []
			];
			echo json_encode($return);

	}


	public function edit()
	{
		$modelProduct = new ProductModel();
		$modelProductSize = new ProductSizeModel();
		$modelProductColor = new ProductColorModel();
		$modelCategory = new CategoryModel();
		$modelColor = new ColorModel();
		$modelSize = new SizeModel();
		
		$uri = current_url(true);
		$id = $uri->getSegment(4);
		$product = $modelProduct->find($id);
		$colors = $modelProductColor->join('colors', 'colors.id = product_color.color_id', 'left')->where('product_id', $id)->findAll();
		$sizes = $modelProductSize->where('product_id', $id)->findAll();

		$data['temp'] = 'cpanel/product/edit/index';
		$data['title'] = 'Product edit';
		$data['menu'] = 'product';
		$data['info'] = $product;
		$data['layout'] = $colors;
		$data['sizes'] = $sizes;
		$data['listcategory'] = $modelCategory->findAll();
		$data['listcolor'] = $modelColor->findAll();
		$data['listsize'] = $modelSize->findAll();
		echo view('cpanel/layout', $data);
	}


	
	public function update()
	{
		helper('filesystem');
		$modelProduct = new ProductModel();
		$modelProductSize = new ProductSizeModel();
		$modelProductColor = new ProductColorModel();
		$modelProductTag = new ProductTagModel();
		$modelTag = new TagModel();

		$arrTag = [];
		$id =  $this->request->getPost('id');
		$name =  $this->request->getPost('name');
		$type =  $this->request->getPost('type');
		$price =  $this->request->getPost('price');
		$price_sale =  $this->request->getPost('price_sale');
		$manufactur =  $this->request->getPost('manufactur');
		$delivery =  $this->request->getPost('delivery');
		$tags =  $this->request->getPost('tags');
		$description =  $this->request->getPost('description');
		$description_detail =  $this->request->getPost('description_detail');
		$size =  $this->request->getPost('size');
		$arrDelete =  \json_decode($this->request->getPost('arrDelete'),true);
		$jsonLayout = \json_decode($this->request->getPost('test'),true);
		$file =  $this->request->getFiles();

		//$imgPro = $file['fileImgPro'];	
		$tags = \json_decode($this->request->getPost('tags'),true);
			

		foreach($tags as $tags1):
			$arrTag[] = $tags1['value'];
		endforeach;

		$tagText = \implode(",",$arrTag);


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
		];
		$modelProduct->update($id,$dataInsert);



			// SIZE 
			if($size){
				$modelProductSize->where('product_id', $id)->delete();

				foreach($size as $size1):
	
					$dataS = [
						'product_id' => $id,
						'size_id' => $size1,
					];
	
				$modelProductSize->insert($dataS);
				endforeach;
			}
				// TAG 
			if($tags){
				$modelProductTag->where('product_id', $id)->delete();
				
				foreach($tags as $tags1):
					$check = $modelTag->checkValue($tags1['value']);
					if(!$check){
						$dataTag = [
							'value' => $tags1['value'],
						];
						$idTag = $modelTag->insert($dataTag);

						$dataTagPro = [
							'tag_id' => $idTag,
							'product_id' => $id,
						];
						$modelProductTag->insert($dataTagPro);
					}else{

						$dataTagPro = [
							'tag_id' => $check,
							'product_id' => $id,
						];
						$modelProductTag->insert($dataTagPro);
					}
				endforeach;
			}



			$thumbnail =  $this->request->getFile('thumbnail');

			if($thumbnail){
	
			delete_files(WRITEPATH . 'uploads/product/' . $id.'/thumb');


			if ($thumbnail->isValid() && !$thumbnail->hasMoved()) {
				//$newName = $img->getRandomName();
				if (!is_dir(WRITEPATH . 'uploads/product/' . $id.'/thumb')) {
					mkdir(WRITEPATH . 'uploads/product/' . $id.'/thumb', 0777, TRUE);
				}

				$thumbnail->move(WRITEPATH . 'uploads/product/' . $id.'/thumb');

				$dataThumb = [
					'thumbnail' => 'product/' . $id . '/thumb/'. $thumbnail->getName(),
				];
				$modelProduct->update($id, $dataThumb);
			}


			}


			if($arrDelete){
				foreach($arrDelete as $arrDelete1){
					unlink(WRITEPATH . 'uploads/product/' . $id.'/image/'.$arrDelete1);
					echo WRITEPATH . 'uploads/product/' . $id.'/image/'.$arrDelete1.'<br>';
				}
			}
	
	
			if($file){
				$imgPro = $file['fileImgPro'];	

				foreach($imgPro as $imgPro1):

					if ($imgPro1->isValid() && !$imgPro1->hasMoved()) {
						//$newName = $img->getRandomName();
						if (!is_dir(WRITEPATH . 'uploads/product/' . $id.'/image')) {
							mkdir(WRITEPATH . 'uploads/product/' . $id.'/image', 0777, TRUE);
						}

						$imgPro1->move(WRITEPATH . 'uploads/product/' . $id.'/image');

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