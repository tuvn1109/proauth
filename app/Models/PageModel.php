<?php namespace App\Models;

use CodeIgniter\Model;

class PageModel extends Model
{
	protected $table = 'pages';
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

	public function getInfoBySlug($slug)
	{
		$query = $this->select('*');
		return $query->getWhere(['slug' => $slug])->getRowArray();

	}

	function listData($orderCol, $orderType, $perpage, $page)
	{
		if ($orderCol == 'id') {
			$orderCol = 'order_id';
		}
		$this->select('*,users.Id as cus_id,orders.id as order_id,shipping_method.id as shipping_method_id');
		$this->join('users', 'users.Id = orders.order_cus', 'left');
		$this->join('shipping_method', 'shipping_method.id = orders.order_shipping', 'left');
		$this->orderBy($orderCol, $orderType);
		//$this->paginate($perpage, 'gr1', $page);
		return $this->get()->getResultArray();
		//return $this->getCompiledSelect();
	}

}

?>
