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

	public function getIdBySlug($slug)
	{
		$query = $this->select('id');
		return $query->getWhere(['slug_pro' => $slug])->getRowArray();

	}
}

?>
