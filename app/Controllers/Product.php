<?php namespace App\Controllers;

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

class Product extends BaseController
{
	public function index()
	{
		helper('filesystem');
		$modelProduct = new ProductModel();
		$modelProductSize = new ProductSizeModel();
		$modelProductColor = new ProductColorModel();
		$modelCategory = new CategoryModel();
		$modelColor = new ColorModel();
		$modelSize = new SizeModel();
		
		$uri = current_url(true);
		//$id = $uri->getSegment(3);
		$id = 24;
		$product = $modelProduct->find($id);
		$sizes = $modelProductSize->join('sizes', 'sizes.id = product_size.size_id', 'left')->where('product_id', $id)->findAll();
		$colors = $modelProductColor->join('colors', 'colors.id = product_color.color_id', 'left')->where('product_id', $id)->findAll();

		$image = directory_map(WRITEPATH . 'uploads/product/' . $id.'/image');
		$data['temp'] = 'product/index';
		$data['title'] = 'CA';
		$data['info'] = $product;
		$data['size'] = $sizes;
		$data['color'] = $colors;
		$data['image'] = $image;
		echo view('layout_product', $data);

	}

	//--------------------------------------------------------------------

}
