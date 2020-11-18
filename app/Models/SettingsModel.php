<?php namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
	protected $table = 'settings';
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


	public function getList($type)
	{
		$query = $this->select($this->selectFields);
		$query = $query->where('type', $type);
		return $query->get()->getRowArray();
	}

	public function getUserByName($username)
	{
		$query = $this->select($this->selectFields);
		return $query->getWhere(['username' => $username])->getRowArray();
	}

	public function getUserByEmail($email)
	{
		$query = $this->select($this->selectFields);
		return $query->getWhere(['email' => $email])->getRowArray();
	}

}

?>
