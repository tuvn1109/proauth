<?php

namespace App\Controllers\Cpanel;

use App\Models\PropertiesDetailModel;
use App\Models\PropertiesModel;
use App\Models\CategoryModel;
use App\Models\ColorModel;
use App\Models\SizeModel;

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

			$dataInsert = [
				'name' => $name,
				'type' => $type,
				'thumbnail' => $thumbnail,
				'price' => $price,
				'price_sale' => $price_sale,
				'manufactur' => $manufactur,
				'delivery' => $delivery,
				'tag' => $tag,
				'description' => $description,
				'description_detail' => $description_detail,
			];
			$id = $modelProduct->insert($dataInsert);
	}


	public function edit()
	{
		$modelProperties = new PropertiesModel();
		$modelProDetail = new PropertiesDetailModel();
		$uri = current_url(true);
		$id = $uri->getSegment(4);
		$properties = $modelProperties->find($id);
		$detail = $modelProDetail->where('properties_id', $id)->findAll();

		$data['temp'] = 'cpanel/properties/edit';
		$data['title'] = 'Properties edit';
		$data['menu'] = 'properties';
		$data['info'] = $properties;
		$data['detail'] = $detail;
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