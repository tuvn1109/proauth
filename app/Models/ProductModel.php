<?php namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
	protected $table = 'products';
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


	// getCompiledSelect


	public function getIdBySlug($slug)
	{
		$query = $this->select('id');
		return $query->getWhere(['slug_pro' => $slug])->getRowArray();

	}

	public function getBestSelling($type, $limit)
	{
		//$query = $this->select('id');
		$this->select('*,categories.id as cate_id,products.id as id');
		$this->join('categories', 'categories.id = products.type', 'left');
		$this->where('bestselling', 'yes');
		$this->where('type', $type);
		$this->limit($limit);
		return $this->get()->getResultArray();

	}

	public function getListByType($type, $limit)
	{
		//$query = $this->select('id');
		$this->select('*,categories.id as cate_id,products.id as id');
		$this->join('categories', 'categories.id = products.type', 'left');
		$this->where('type', $type);
		$this->limit($limit);
		return $this->get()->getResultArray();

	}

	public function getList($slug, $limit, $page)
	{
		//$query = $this->select('id');
		$this->select('*,categories.id as cate_id,products.id as id');
		$this->join('categories', 'categories.id = products.type', 'left');
		$this->where('slug', $slug);
		$this->limit($limit, $page);
		//$this->paginate($limit, 'gr1', $page);
		//return $this->getCompiledSelect();
		return $this->get()->getResultArray();
	}

	public function getListSearch($slug,$page,$limit)
	{
		if ($page == 1) {
			$page = 0;
		} elseif ($page > 1) {
			$page = ($page - 1) * $limit;
		}
		//$query = $this->select('id');
		$this->select('*,categories.id as cate_id,products.id as id');
		$this->join('categories', 'categories.id = products.type', 'left');
		$this->like('name', $slug);
		$this->orLike('tag', $slug);
		$this->orLike('status', $slug);
		$this->limit($limit, $page);
		//$this->paginate($limit, 'gr1', $page);
		//return $this->getCompiledSelect();
		return $this->get()->getResultArray();
	}


	public function getListAll($limit, $page)
	{
		//$limit = '' ;
		//$query = $this->select('id');
		$this->select('*,categories.id as cate_id,products.id as id,products.created_at as created_at');
		$this->join('categories', 'categories.id = products.type', 'left');
		$this->orderBy('products.id', 'DESC');
		$this->limit($limit, $page);

		//$this->paginate($limit, 'gr1', $page);
		//return $this->getCompiledSelect();
		return $this->get()->getResultArray();
	}

	public function getListById($id = [])
	{
		//$query = $this->select('id');
		$this->select('*,categories.id as cate_id,products.id as id');
		$this->join('categories', 'categories.id = products.type', 'left');
		$this->whereIn('products.id', json_decode($id));
		//$this->paginate($limit, 'gr1', $page);
		//return $this->getCompiledSelect();
		return $this->get()->getResultArray();
	}
}

?>
