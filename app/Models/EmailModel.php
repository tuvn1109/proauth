<?php namespace App\Models;

use CodeIgniter\Model;

class EmailModel extends Model
{
	protected $table = 'email';
	protected $primaryKey = 'id';
	protected $returnType = 'array';
	protected $useSoftDeletes = false;
	protected $allowedFields = [];
	protected $useTimestamps = false;
	protected $protectFields = false;
	protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';
	protected $validationRules = [];
	protected $validationMessages = [];
	protected $skipValidation = false;
	protected $selectFields = ['*'];


	public function getInfoEmail($id=1)
	{
		$query = $this->select($this->selectFields);
		return $query->getWhere(['Id' => $id])->getRowArray();
	}
}

?>
