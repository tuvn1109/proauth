<?php namespace App\Models;

use CodeIgniter\Model;

class ForgetpassModel extends Model
{
	protected $table = 'log_forgetpass';
	protected $primaryKey = 'id';
	protected $returnType = 'array';
	protected $useSoftDeletes = false;
	protected $allowedFields = [];
	protected $useTimestamps = false;
	protected $protectFields = false;
	protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
	protected $deletedField = '';
	protected $validationRules = [];
	protected $validationMessages = [];
	protected $skipValidation = false;
	protected $selectFields = ['*'];



	public function getInfoForget($code)
	{
		$query = $this->select($this->selectFields);
		return $query->getWhere(['code' => $code])->getRowArray();
	}

}

?>
