<?php namespace App\Models;

use CodeIgniter\Model;

class CouponModel extends Model
{
	protected $table = 'coupon';
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


	public function checkValue($value)
	{
		$query = $this->select('id');
		$query = $query->where('value', $value);
		return $query->get()->getRowArray();
	}
}

?>
