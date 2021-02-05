<?php namespace App\Models;

use CodeIgniter\Model;

class OrdersDetailModel extends Model
{
	protected $table = 'orders_detail';
	protected $primaryKey = 'id';
	protected $returnType = 'array';
	protected $useSoftDeletes = false;
	protected $allowedFields = [];
	protected $useTimestamps = true;
	protected $protectFields = false;
	protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';
	protected $validationRules = [];
	protected $validationMessages = [];
	protected $skipValidation = false;
	protected $selectFields = ['*'];


	function listData($orderID)
	{
		$this->select('*,sizes.id as size_id,colors.id as color_id,colors.value as color,sizes.value as size,');
		$this->join('sizes', 'sizes.id = orders_detail.order_detail_size', 'left');
		$this->join('colors', 'colors.id = orders_detail.order_detail_color', 'left');
		$this->where('order_id', $orderID);
		//$this->paginate($perpage, 'gr1', $page);
		return $this->get()->getResultArray();
		//return $this->getCompiledSelect();
	}


	function infoOrder($idcus, $idpro)
	{
		$this->select('*');
		$this->join('orders', 'orders.id = orders_detail.order_id', 'left');
		$this->where('product_id', $idpro);
		$this->where('order_cus', $idcus);
		//$this->paginate($perpage, 'gr1', $page);
		return $this->get()->getResult('array');
	}

}

?>
