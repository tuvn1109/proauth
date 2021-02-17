<?php namespace App\Models;

use CodeIgniter\Model;

class ProductFeelbackModel extends Model
{
	protected $table = 'product_feelback';
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


	public function getListAll($limit = 0, $page = 0, $where = [])
	{
		//$limit = '' ;
		//$query = $this->select('id');
		$this->select('*,product_feelback.id as id,products.id as product_id,products.name as product_name,users.id as customer_id,product_feelback.created_at as created_at,');
		$this->join('products', 'products.id = product_feelback.product_id', 'left');
		$this->join('users', 'users.id = product_feelback.customer_id', 'left');
		$this->orderBy('product_feelback.id', 'DESC');
		if ($where) {
			foreach ($where as $key => $val):
				$this->where($key, $val);
			endforeach;
		}
		if ($limit != 0 && $page != 0) {
			$this->limit($limit, $page);
		}
		//$this->paginate($limit, 'gr1', $page);
		//return $this->getCompiledSelect();
		return $this->get()->getResultArray();
	}
}

?>
