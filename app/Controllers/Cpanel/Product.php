<?php

namespace App\Controllers\Cpanel;

use App\Models\PropertiesDetailModel;
use App\Models\PropertiesModel;
use App\Models\CategoryModel;
use App\Models\ColorModel;
use App\Models\SizeModel;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use App\Models\ProductColorModel;

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
		$model = new PropertiesModel();
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

	public function insert()
	{
			$modelProduct = new ProductModel();
			$modelProductSize = new ProductSizeModel();
			$modelProductColor = new ProductColorModel();


			$name =  $this->request->getPost('name');
			$type =  $this->request->getPost('type');
			$thumbnail =  $this->request->getPost('thumbnail');
			$price =  $this->request->getPost('price');
			$price_sale =  $this->request->getPost('price_sale');
			$manufactur =  $this->request->getPost('manufactur');
			$delivery =  $this->request->getPost('delivery');
			$tag =  $this->request->getPost('tag');
			$description =  $this->request->getPost('description');
			$description_detail =  $this->request->getPost('description_detail');

			$size =  $this->request->getPost('size');
			$test = $this->request->getPost('test');
			$jsonLayout = \json_decode($test,true);
					
			


			$dataInsert = [
				'name' => $name,
				'type' => $type,
				'thumbnail' => $thumbnail,
				'price' => $price,
				'price_sale' => $price_sale,
				'manufactur' => $manufactur,
				'delivery' => $delivery,
				//'tag' => $tag,
				'description' => $description,
				'description_detail' => $description_detail,
			];
			$id = $modelProduct->insert($dataInsert);


			// SIZE 
			foreach($size as $size1):

				$dataS = [
					'product_id' => $id,
					'size_id' => $size1,
				];

			$modelProductSize->insert($dataS);
			endforeach;



			foreach($jsonLayout as $jsonLayout):
				$img =  $this->request->getFile('fileUpload'.$jsonLayout['color']);

				if ($img->isValid() && !$img->hasMoved()) {
					//$newName = $img->getRandomName();
					if (!is_dir(WRITEPATH . 'uploads/product' . $id)) {
						mkdir(WRITEPATH . 'uploads/product' . $id, 0777, TRUE);
					}

					$img->move(WRITEPATH . 'uploads/product' . $id);

					$detail = [
						'product_id' => $id,
						'color_id' => $jsonLayout['color'],
						'layout' => 'product' . $id . '/' . $img->getName(),
					];
					$modelProductColor->insert($detail);
				}

			endforeach;



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
		$colors = $modelProductColor->where('product_id', $id)->findAll();
		$sizes = $modelProductSize->where('product_id', $id)->findAll();

		$data['temp'] = 'cpanel/product/edit/index';
		$data['title'] = 'Product edit';
		$data['menu'] = 'product';
		$data['info'] = $product;
		$data['colors'] = $colors;
		$data['sizes'] = $sizes;
		$data['category'] = $modelCategory->findAll();
		$data['color'] = $modelColor->findAll();
		$data['size'] = $modelSize->findAll();
		echo view('cpanel/layout', $data);
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
		$modelProperties = new PropertiesModel();
		$modelProDetail = new PropertiesDetailModel();
		$id = $this->request->getPost('id');
		$modelProperties->delete($id);
		$modelProDetail->where('properties_id', $id)->delete();


		echo json_encode(1);
	}
	//--------------------------------------------------------------------

}